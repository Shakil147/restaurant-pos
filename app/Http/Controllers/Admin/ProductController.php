<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductApplyStep;
use Auth;
use Str;
use Image;
use DB;

class ProductController extends Controller
{

    var $path = 'admin.product';
    var $prifix = 'admin.products';

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        return view($this->path.'.index',['products'=>Product::latest()->get()]);       
    }
    
    public function get(Request $request)
    {
        $perpage = $request->perpage? $request->perpage : 20;
        if ($perpage =='all') {
            $perpage = 999999999;
        }
        return response()->json(Product::withFilters(
            request()->input('name'),
            request()->input('category_id'),
            request()->input('start_date'),
            request()->input('end_date'),
        )->latest()->withCount('categories')->with('categories')->paginate($perpage));
    }
    public function create ()
    {
        return view($this->path.'.add',[
            'categories'=>Category::latest()->where('status',1)->get(),
            'novue'=>true,
        ]);
    }
    public function store(Request $request)
    {
         $this->validate($request,[
            'name'=>'required|min:2|max:190',
            'price'=>'required|max:190',
            'stok'=>'required|max:190',
            "categories"    => "nullable|array|min:1",
            "categories.*"  => "required|string|distinct|min:1",
            'image' => 'mimes:jpeg,jpg,png,gif|required|max:10000', // max 10000kb
          ]);

        try {
          
            $product = new Product;
            $product->name = $request->name;
            $product->slug = Str::slug(time().$request->name);
            $product->description = $request->description;
            $product->price = $request->price;
            $product->stock = $request->stock;
            $product->status = $request->status;
            $product->user_id = Auth::id();
            $product->save();

            if ($request->file('image')) {
                $photoUrl = 'image'.time().'.png';
                $path = public_path().'/uploads/images/products';
                $url = '/uploads/images/products';

                $file = $request->file('image');
                $file->move($path,$photoUrl);
                $product->image = $url.'/'.$photoUrl;
                $product->save();                 
            }

            $this->syncCategories($request,$product->id);

            notify()->success('Product Saved Successfully');
             
            if ($request->submit =='s&c') {
                    return redirect(route($this->prifix.'.create'));
            }else{
                return redirect(route($this->prifix.'.index'));
            }
            return redirect(route($this->prifix.'.index'));
        }catch (\Exception $e) {
            $err_message = \Lang::get($e->getMessage());
            notify()->error($err_message);
            return redirect(route($this->prifix.'.create'));
        }
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
            'novue'=>true,
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

    public function syncCategories($request ,$product_id)
    {
        DB::table('products_categories')->where('product_id',$product_id)->delete();
        if (count($request->categories)>0) {
            
            foreach ($request->categories as $key => $value) {
                DB::table('products_categories')
                ->insert([
                    'category_id'=>$value,
                    'product_id'=>$product_id,
                ]);
            }
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
}
