<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Unit;
use Auth;
use Str;
use Image;

class UnitsController extends Controller
{
    var $path = 'admin.unit';
    var $prifix = 'admin.units';
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        return view($this->path.'.index',['units'=>Unit::latest()->get()]);       
    }
    public function get(Request $request)
    {
        $status = $request->status ==1 ? 1 :null;
       return response()->json(Unit::latest()->when($status==1, function ($query) use ($status) {
            $query->where('status',1);
        })->get());
    }
    public function create ()
    {
        return view($this->path.'.add');
    }
    public function edit($id)
    {
        return view($this->path.'.edit',['unit'=>Unit::findOrFail($id)]);
    }
    public function store(Request $request)
    {
         $this->validate($request,[
             'name'=>'required|min:2|max:190',
          ]);
          
        try {
            $unit = Unit::create($request->except('_token'));           
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
        return response()->json(Unit::findOrFail($id));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request,[
             'name'=>'required|min:2|max:190',
          ]);

        try {
            Unit::findOrFail($id)->update($request->except('_token'));
            $unit = Unit::findOrFail($id);

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
        $unit = Unit::findOrFail($id)->delete();                
        notify()->success('Removed Successfully');
        return redirect(route($this->prifix.'.index'));
        }catch (\Exception $e) {
            $err_message = \Lang::get($e->getMessage());
            notify()->error($err_message);
            return redirect(route($this->prifix.'.index'));
        }
    }
}
