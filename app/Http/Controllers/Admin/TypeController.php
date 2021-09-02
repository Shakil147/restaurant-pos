<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Type;
use Auth;
use Str;
use Image;

class TypeController extends Controller
{
    
    var $path = 'admin.type';
    var $prifix = 'admin.types';
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        return view($this->path.'.index',['types'=>Type::latest()->get()]);       
    }
    public function get(Request $request)
    {
        $status = $request->status ==1 ? 1 :null;
       return response()->json(Type::latest()->when($status==1, function ($query) use ($status) {
            $query->where('status',1);
        })->get());
    }
    public function create ()
    {
        return view($this->path.'.add');
    }
    public function edit($id)
    {
        return view($this->path.'.edit',['type'=>Type::findOrFail($id)]);
    }
    public function store(Request $request)
    {
         $this->validate($request,[
             'name'=>'required|min:2|max:190',
             'image' => 'mimes:jpeg,jpg,png,gif|nullable|max:10000', // max 10000kb
          ]);
       // return $request;
          
        try {
            $type = Type::create($request->except('_token','image'));           

            if ($request->file('image')) {
                $photoUrl = 'image'.time().'.png';
                $path = public_path().'/uploads/images/types';
                $url = '/uploads/images/types';

                $file = $request->file('image');
                $file->move($path,$photoUrl);
                $type->image = $url.'/'.$photoUrl;
                $type->save();                 
            }
            
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
        return response()->json(Type::findOrFail($id));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request,[
             'name'=>'required|min:2|max:190',
             'image' => 'mimes:jpeg,jpg,png,gif|nullable|max:10000', // max 10000kb
          ]);

        try {
            $type = Type::findOrFail($id);
            $type->name = $request->name;
            $type->description = $request->description;
            $type->status = $request->status;
            $type->save();

            if ($request->file('image')) {
                if ($type->image and file_exists(public_path().$type->image)) {
                    unlink(public_path().$type->image);
                }
                $photoUrl = 'image'.time().'.png';
                $path = public_path().'/uploads/images/types';
                $url = '/uploads/images/types';

                $file = $request->file('image');
                $file->move($path,$photoUrl);
                $type->image = $url.'/'.$photoUrl;
                $type->save();                 
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
            return back();
        }
        
    }
    public function destroy($id)
    {
        try {
        $type = Type::findOrFail($id)->delete();                
        notify()->success('Removed Successfully');
        return redirect(route($this->prifix.'.index'));
        }catch (\Exception $e) {
            $err_message = \Lang::get($e->getMessage());
            notify()->error($err_message);
            return redirect(route($this->prifix.'.index'));
        }
    }
}
