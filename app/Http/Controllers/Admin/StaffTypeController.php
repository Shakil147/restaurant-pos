<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StaffType;
use Auth;
use Str;
use Image;

class StaffTypeController extends Controller
{
    
    
    var $path = 'admin.stafftype';
    var $prifix = 'admin.staff-types';
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        return view($this->path.'.index',['stafftypes'=>StaffType::latest()->get()]);       
    }
    public function get(Request $request)
    {
        $status = $request->status;
       return response()->json(StaffType::latest()->when($status, function ($query) use ($status) {
            $query->where('status',$status);
        })->get(),200);
    }
    public function getitem($id)
    {
       return response()->json(StaffTypefirstOrFail($id),200);
    }
    public function create ()
    {
        return view($this->path.'.add');
    }
    public function edit($id)
    {
        return view($this->path.'.edit',['stafftype'=>StaffType::findOrFail($id)]);
    }
    public function store(Request $request)
    {
         $this->validate($request,[
             'name'=>'required|min:2|max:190',
          ]);
          
        try {
            $request['status'] = $request->status;
            $type = StaffType::create($request->except('_token'));           

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
        return response()->json(StaffTypefindOrFail($id));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request,[
             'name'=>'required|min:2|max:190',
          ]);

        try {
            $request['status'] = $request->status;
            StaffType::findOrFail($id)->update($request->except('_token'));

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
        $type = StaffType::findOrFail($id)->delete();                
        notify()->success('Removed Successfully');
        return redirect(route($this->prifix.'.index'));
        }catch (\Exception $e) {
            $err_message = \Lang::get($e->getMessage());
            notify()->error($err_message);
            return redirect(route($this->prifix.'.index'));
        }
    }
}