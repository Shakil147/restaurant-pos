<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Supplier;
use Auth;
use Str;
use Image;

class SupplierController extends Controller
{
    
    
    var $path = 'admin.supplier';
    var $prifix = 'admin.suppliers';
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        return view($this->path.'.index',['suppliers'=>Supplier::latest()->get()]);       
    }
    public function get(Request $request)
    {
        $status = $request->status;
       return response()->json(Supplier::latest()->when($status, function ($query) use ($status) {
            $query->where('status',$status);
        })->get(),200);
    }
    public function create ()
    {
        return view($this->path.'.add');
    }
    public function edit($id)
    {
        return view($this->path.'.edit',['supplier'=>Supplier::findOrFail($id)]);
    }
    public function store(Request $request)
    {
         $this->validate($request,[
             'name'=>'required|min:2|max:190',
             'company'=>'nullable|max:190',
             'phone'=>'nullable|max:190',
             'email'=>'nullable|max:190',
             'address'=>'nullable|max:190',
             'warehouse'=>'nullable|max:190',
             'status'=>'nullable|max:1',
             'image' => 'mimes:jpeg,jpg,png,gif|nullable|max:10000', // max 10000kb
          ]);
          
        try {
            $request['status'] = $request->status;
            $supplier = Supplier::create($request->except('_token','image'));           

            if ($request->file('image')) {
                $photoUrl = 'image'.time().'.png';
                $path = public_path().'/uploads/images/suppliers';
                $url = '/uploads/images/suppliers';

                $file = $request->file('image');
                $file->move($path,$photoUrl);
                $supplier->image = $url.'/'.$photoUrl;
                $supplier->save();                 
            }
            
             notify()->success('Saved Successfully');
             
            if ($request->submit =='s&c') {
                return redirect(route($this->prifix.'.create'));
            }else{
                return redirect(route($this->prifix.'.index'));
            }

        }catch (\Exception $e) {
            $err_message = \Lang::get($e->getMessage());
            return $err_message;
            notify()->error($err_message);
            return back();
        }
    }

    public function show($id)
    {
        return response()->json(Supplier::findOrFail($id));
    }


    public function update(Request $request, $id)
    {
         $this->validate($request,[
             'name'=>'required|min:2|max:190',
             'company'=>'nullable|max:190',
             'phone'=>'nullable|max:190',
             'email'=>'nullable|max:190',
             'address'=>'nullable|max:190',
             'warehouse'=>'nullable|max:190',
             'status'=>'nullable|max:1',
             'image' => 'nullable|mimes:jpeg,jpg,png,gif||max:10000', // max 10000kb
          ]);

        try {
            $request['status'] = $request->status;
            $supplier = Supplier::findOrFail($id)->update($request->except('_token','image'));
            $supplier = Supplier::findOrFail($id);

            if ($request->file('image')) {
                if ($supplier->image and file_exists(public_path().$supplier->image)) {
                    unlink(public_path().$supplier->image);
                }
                $photoUrl = 'image'.time().'.png';
                $path = public_path().'/uploads/images/suppliers';
                $url = '/uploads/images/suppliers';

                $file = $request->file('image');
                $file->move($path,$photoUrl);
                $supplier->image = $url.'/'.$photoUrl;
                $supplier->save();                 
            }

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
            return $err_message;
        }
        
    }
    public function destroy($id)
    {
        try {
        $supplier = Supplier::findOrFail($id)->delete();                
        notify()->success('Removed Successfully');
        return redirect(route($this->prifix.'.index'));
        }catch (\Exception $e) {
            $err_message = \Lang::get($e->getMessage());
            notify()->error($err_message);
            return redirect(route($this->prifix.'.index'));
        }
    }
}
