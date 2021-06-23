<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderItem;
use Auth;
use Str;
use Cart;

class PosController extends Controller
{

    var $path = 'admin.pos';
    var $prifix = 'admin.pos';

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        return view($this->path.'.index',[
            'products'=>Product::latest()->get(),
            'categories'=>Category::latest()->where('status',1)->get()
        ]);       
    }
    public function create ()
    {
        return view($this->path.'.add',['categories'=>Category::latest()->where('status',1)->get()]);
    }
    public function searchProduct ()
    {
        //$products = Product::get();
        $products = Product::withFilters(
            request()->input('name'),
            request()->input('category_id'),
        )->get();
        return response()->json($products);
    }
    public function order_code()
    {
        $latestOrder = Order::orderBy('created_at','DESC')->first();
        $lastOrderId = ($latestOrder !=null) ? $latestOrder->id : 0;
        return '#'.Str::padLeft($lastOrderId + 1, 8, "0", STR_PAD_LEFT);
    }
    public function order_id()
    {
        $latestOrder = Order::orderBy('created_at','DESC')->first();
        $lastOrderId = ($latestOrder !=null) ? $latestOrder->id : 0;
        return $lastOrderId;
    }
    public function store(Request $request)
    {
       
        try {   
            $items = Cart::getContent();
            if (count($items)>0) {
                $order = new Order;
                $order->order_code = $this->order_code();
                $order->name = $request->name?:'name';
                $order->table = $request->table;
                $order->tax = $request->tax;
                $order->vat = $request->vat;
                $order->discount = $this->discount();
                $order->total_discount = $this->discount();
                $order->service_charge = 0;
                $order->total_item = count(Cart::getContent());
                $order->total = $this->total();
                $order->grand_total = $this->grand_total();
                $order->payment_status = 1;
                $order->status = 1;
                $order->user_id = Auth::id();
                $order->save();

                foreach($items as $key => $item){
                    $order_item = new OrderItem;
                    $order_item->order_id = $order->id;
                    $order_item->order_code = $order->order_code;
                    $order_item->product_id = $item->associatedModel->id;
                    $order_item->product_name = $item->associatedModel->name;
                    $order_item->price = $item->associatedModel->price;
                    $order_item->quantity = $item->quantity;
                    $order_item->discount = $item->attributes->amount;
                    $order_item->discount_type = $item->attributes->type;
                    $order_item->save();
                }
                Cart::clear();

                if ($request->type =='s&p') {
                    return response()->json(['message'=>'Saved','status'=>'success','print'=>$order->id]); 
                }else{
                    return response()->json(['message'=>'Saved','status'=>'success']);
                }
            }else{
                return response()->json(['message'=>'Saved','status'=>'success','print'=> $this->order_id()]); 
            }  

        }catch (\Exception $e) {
            $err_message = \Lang::get($e->getMessage());
            return response()->json(['message'=>$err_message,'status'=>'error','print'=>'false']);
        }
    }


    public function grand_total()
    {
        $items = Cart::getContent();
        $grand_total = 0;
            foreach($items as $key => $item){

                    $price = $item->price;
                    $quantity = $item->quantity;
                    $total = $price * $quantity;
                    $subTotal = 0;
                if ($item->attributes->discount) {
                    $type = $item->attributes->type;
                    $discount = $item->attributes->amount;
                   
                    if ($type=='percentage') {
                        $subTotal = $total - $total * $discount/100;
                    }else{
                        $subTotal = $total - $discount;
                    }
                }else{
                    $subTotal = $total;
                }
                $grand_total += $subTotal;
            }
        return $grand_total;
    }
    public function discount()
    {
        $items = Cart::getContent();
        $total_discount = 0;
            foreach($items as $key => $item){

                    $price = $item->price;
                    $quantity = $item->quantity;
                    $total = $price * $quantity;
                if ($item->attributes->discount) {
                    $type = $item->attributes->type;
                    $discount = $item->attributes->amount;
                    $get_discount = 0;
                    if ($type=='percentage') {
                        $get_discount =$total * $discount/100;
                    }else{
                        $get_discount =$discount;
                    }
                }else{
                    $get_discount =0;
                }

                $total_discount += $get_discount;
            }
        return $total_discount;
    }


    public function get()
    {
        return response()->json([
            'total_item'=>count(Cart::getContent()),
            'total'=>$this->total(),
            'discount'=>$this->discount(),
            'grand_total'=>$this->grand_total(),
        ]);
    }

    public function total()
    {
        $items = Cart::getContent();
        $sub_total = 0;
            foreach($items as $key => $item){

                    $price = $item->price;
                    $quantity = $item->quantity;
                    $total = $price * $quantity;
                
                    $sub_total += $total;
            }
        return $sub_total;
    }

    public function show($id)
    {
        return response()->json(Category::findOrFail($id));
    }

    public function edit($id)
    {
        $product = Product::find($id);
        return view($this->path.'.edit',[
            'product'=>Product::findOrFail($id),
            'categories'=>Category::latest()->get(),
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name'=>'required|min:2|max:190',
            "categories"    => "nullable|array|min:1",
            "categories.*"  => "required|string|distinct|min:1",
            'image' => 'mimes:jpeg,jpg,png,gif|nullable|max:10000', // max 10000kb
          ]);

        try {
            $product = Product::findOrFail($id);
            $product->name = $request->name;
            $product->description = $request->description;
            $product->price = $request->price;
            $product->stock = $request->stock;
            $product->status = $request->status;
            $product->save();

            if ($request->file('image')) {
                if ($product->image!=null and file_exists(public_path().$product->image)) {
                        unlink(public_path().$product->image);
                }
                $photoUrl = 'image'.time().'.png';
                $path = public_path().'/uploads/images/products';
                $url = '/uploads/images/products';

                $file = $request->file('image');
                $file->move($path,$photoUrl);
                $product->image = $url.'/'.$photoUrl;
                $product->save();                 
            }
            
            $this->syncCategories($request,$product->id);

            notify()->success('Product Updated successfully');
             
            if ($request->submit =='s&c') {
                    return redirect(route($this->prifix.'.edit',$id));
            }else{
                return redirect(route($this->prifix.'.index'));
            }
            return redirect(route($this->prifix.'.index'));
        }catch (\Exception $e) {
            $err_message = \Lang::get($e->getMessage());
            notify()->error($err_message);
            return redirect(route($this->prifix.'.edit',$id));
        }
        
    }


    public function destroy($id)
    {
        try {
            $product = Product::findOrFail($id);
            if ($product->image!=null and file_exists(public_path().$product->image)) {
                unlink(public_path().$product->image);
            }
            $product->delete();
            notify()->success('Successfully Delted');
            return redirect(route($this->prifix.'.index'));
        }catch (\Exception $e) {
            $err_message = \Lang::get($e->getMessage());
            notify()->error($err_message);
            return redirect(route($this->prifix.'.index'));
        }
    }
    public function print($id=null)
    {
        try {
            $order = Order::find($id);
            if ($order==null) {
                $order = Order::latest()->first();
            }
           
            return view('admin.pos.print.print',compact('order'));
        }catch (\Exception $e) {
            $err_message = \Lang::get($e->getMessage());
             return response()->json($err_message);
            notify()->error($err_message);
            return redirect(route($this->prifix.'.index'));
        }
    }
}
