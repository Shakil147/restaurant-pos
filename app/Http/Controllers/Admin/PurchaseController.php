<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Stock;
use Auth;
use Str;
use Image;

class PurchaseController extends Controller
{
   
    var $path = 'admin.purchase';
    var $prifix = 'admin.purchase';
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        return view($this->path.'.index',['stocks'=>Stock::latest()->get(),'collapsedMenu'=>true]);       
    }
    public function get(Request $request)
    {
        $status = $request->status ==1 ? 1 :null;
       return response()->json(Stock::latest()->when($status==1, function ($query) use ($status) {
            $query->where('status',1);
        })->get());
    }
    public function create ()
    {
        return view($this->path.'.add',['collapsedMenu'=>true]);
    }
    public function edit($id)
    {
        return view($this->path.'.edit',['stock'=>Stock::findOrFail($id),'collapsedMenu'=>true]);
    }
    public function store(Request $request)
    {
         $this->validate($request,[
             'name'=>'required|min:2|max:190',
          ]);
          
        try {
            $request['status'] = $request->status;
            $stock = Stock::create($request->except('_token'));           
             notify()->success('Saved Successfully');
             
            if ($request->submit =='s&c') {
                return redirect(route($this->prifix.'.create'));
            }else{
                return redirect(route($this->prifix.'.index'));
            }

        }catch (\Exception $e) {
            $err_message = \Lang::get($e->getMessage());
            //return $err_message;
            notify()->error($err_message);
            return back();
        }
    }

    public function show($id)
    {
        return response()->json(Stock::findOrFail($id));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request,[
             'name'=>'required|min:2|max:190',
          ]);

        try {
            $request['status'] = $request->status;
            Stock::findOrFail($id)->update($request->except('_token'));
            $stock = Stock::findOrFail($id);

            notify()->success('Updated Successfully'); 
            
            if ($request->submit =='s&c') {
                return redirect(route($this->prifix.'.edit',$id));
            }else{
                return redirect(route($this->prifix.'.index'));
            }   
         return back();
        }catch (\Exception $e) {
            $err_message = \Lang::get($e->getMessage());
            notify()->error($err_message);
            return back();
        }
        
    }
    public function destroy($id)
    {
        try {
        $stock = Stock::findOrFail($id)->delete();                
        notify()->success('Removed Successfully');
        return redirect(route($this->prifix.'.index'));
        }catch (\Exception $e) {
            $err_message = \Lang::get($e->getMessage());
            notify()->error($err_message);
            return redirect(route($this->prifix.'.index'));
        }
    }
}
