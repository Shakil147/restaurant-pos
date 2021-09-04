<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{

    var $path = 'admin.order';
    var $prifix = 'admin.orders';

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        return view($this->path.'.index');       
    }
    
    public function get(Request $request)
    {
        $perpage = $request->perpage? $request->perpage : 20;
        if ($perpage =='all') {
            $perpage = 999999999;
        }
        return response()->json(Order::withFilters(
            request()->input('name'),
            request()->input('start_date'),
            request()->input('end_date'),
        )->latest()->withCount('items')->paginate($perpage));
    }
    public function show($id)
    {
        return view($this->path.'.view',['order'=>$order = Order::with('items','user')->find($id)]);
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
