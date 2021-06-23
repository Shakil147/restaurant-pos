<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Darryldecode\Cart\CartCondition;
use Cart;
use Illuminate\Support\Str;

class CartController extends Controller
{

    var $path = 'admin.pos';
    var $prifix = 'admin.pos';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $product = Product::findOrFail($request->product_id);
             $item = Cart::get($product->id);
            if ($item) {
                Cart::update($product->id,[
                    'quantity' => 1,
                ]);
               $item = Cart::get($product->id);
                Cart::get($request->id,[
                    'attributes' => array( 
                        'note' => $item->attributes->note,
                        'discount' => $item->attributes->discount,
                        'type' => $item->attributes->type,
                        'amount' => $item->attributes->amount,
                        'subtotal' => $this->calSubtotal($item),
                    ),
                ]);
            }else{
                Cart::add(array(
                    'id' => $product->id,
                    'name' => $product->name,
                    'price' => $product->price,
                    'quantity' => 1,
                    'attributes' => array( // attributes field is optional
                        'note' => '',
                        'discount' => '0',
                        'type' => $this->checkDiscountType($request->discount),
                        'amount' => $request->discount,
                        'subtotal' => $product->price*1,
                    ),
                    'associatedModel' => $product,
                ));
            }
             
            
            

            return response()->json(['message'=>'Item Added','status'=>'success']);
        }catch (\Exception $e) {
            $err_message = \Lang::get($e->getMessage());
            notify()->error($err_message);
            return redirect(route($this->prifix.'.index'));
        }

    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request, [           
            'quantity' => 'required|min:1|integer',          
            'discount' => 'nullable|max:9999999',
            'note' => 'nullable|max:300|string',
        ]);

        Cart::update($request->id,[
            'quantity' => array(
                'relative' => false,
                'value' => $request->quantity,
            ),
            //'price' => $request->price,
            'attributes' => array(
                'discount' => 0,
                'note' => $request->note,
                'type' => 'plain',
                'amount' => $this->clean($request->discount),
                'subtotal' => $this->calSubtotal($request),
            ),
        ]);

        if ($request->discount) {
             
            Cart::update($request->id,[
                'attributes' => array( 
                    'note' => $request->note,
                    'discount' => $request->discount,
                    'type' => $this->checkDiscountType($request->discount),
                    'amount' => $this->clean($request->discount),
                    'subtotal' => $this->calSubtotal($request),
                ),
            ]);
        }
        
        return response()->json([
            'message'=>'Item Updated',
            'status'=>'success'
        ]);

    }

    public function checkDiscountType($value)
    {
       $type = Str::contains($value, '%');
       if ($type) {
         return 'percentage';
       }else{
        return 'plain';
       }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        try {
             Cart::remove($request->id);
            return response()->json(['message'=>'Item Removed','status'=>'success']);
        }catch (\Exception $e) {
            $err_message = \Lang::get($e->getMessage());
            notify()->error($err_message);
            return redirect(route($this->prifix.'.index'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function get()
    {
        //return $this->grand_total();
        // Cart::clear();
        $items = Cart::getContent();
        return response()->json($items);
    }
    public function getitem($id)
    {
        $item = Cart::get($id);
        return response()->json($item);
    }

    function calSubtotal($request){
        $price = $request->price;
        $quantity = $request->quantity;
        $total = $price * $quantity;

        if ($request->discount) {
            $type = $this->checkDiscountType($request->discount);
            $discount = $this->clean($request->discount);

            $subTotal = 0;

            if ($type=='percentage') {
                $subTotal = $total - $total * $discount/100;
            }else{
                $subTotal = $total - $discount;
            }
        }else{
            $subTotal = $total;
        }
        return $subTotal;
    }

    function clean($string) {
       $string = Str::replace('-', '', $string); // Replaces all spaces with hyphens.
       $string = Str::replace('+', '', $string); // Replaces all spaces with hyphens.

       $str = "QWERTYUIOPASDFGHJKLZXCVBNMqwertyuiopasdfghjklzxcvbnm!@#$%^&*()_+-=[{}]:;'<,\>?/|";
       $str = $str.'"';
       $arr = str_split($str);
       foreach ($arr as $key => $value) {
            $string = Str::replace($value, '', $string);
       }
       return  $string;
    }

    
}
