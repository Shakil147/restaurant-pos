<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Staff;
use App\Models\StaffType;
use Auth;
use Str;
use Image;

class StaffController extends Controller
{
    var $path = 'admin.staff';
    var $prifix = 'admin.staff';
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        return view($this->path.'.index',['staff'=>Staff::latest()->get()]);       
    }
    public function get(Request $request)
    {
        $status = $request->status;
        //return $request;
        $type_id = $request->type_id;
       return response()->json(Staff::latest()->when($request->status, function ($query) use ($status) {
            $query->where('status',$status);
        })->when($request->status, function ($query) use ($type_id) {
            $query->where('type_id',$type_id);
        })->get(),200);
    }
    public function getstaff($id)
    {
       return response()->json(Staff::findOrFail($id),200);
    }
    public function create ()
    {
        return view($this->path.'.add',[
            'types'=>StaffType::where('status',1)->get(),
        ]);
    }
    public function edit($id)
    {
        return view($this->path.'.edit',[
            'staff'=>Staff::findOrFail($id),
            'types'=>StaffType::where('status',1)->get(),
        ]);
    }
    public function store(Request $request)
    {
         $this->validate($request,[
             'name'=>'required|min:2|max:190',
             'phone'=>'required|max:25|unique:staff,phone',
             'email'=>'required|max:25|unique:staff,email',
             'address'=>'required|max:191',
             'description'=>'nullable|max:10000',
             'uid'=>'required|max:25',
             'uid_type'=>'required|max:25',
             'dob'=>'required|max:25',
             'join_date'=>'required|max:25',
             'staf_type_id'=>'required',
             'image' => 'mimes:jpeg,jpg,png,gif|nullable|max:10000', // max 10000kb
          ]);

        try {

            $staff = Staff::create($request->except('_token','image'));           

            if ($request->file('image')) {
                $photoUrl = 'image'.time().'.png';
                $path = public_path().'/uploads/images/staff';
                $url = '/uploads/images/staff';

                $file = $request->file('image');
                $file->move($path,$photoUrl);
                $staff->image = $url.'/'.$photoUrl;
                $staff->save();                 
            }

            notify()->success('Saved Successfully');
             
            if ($request->submit =='s&c') {
                return redirect(route($this->prifix.'.create'));
            }else{
                return redirect(route($this->prifix.'.index'));
            }

        }catch (\Exception $e) {
          return  $err_message = \Lang::get($e->getMessage());
            notify()->error($err_message);
            return back();
        }
    }

    public function show($id)
    {
        return response()->json(Staff::findOrFail($id));
    }


    public function update(Request $request, $id)
    {
        //return $request;
         $this->validate($request,[
             'name'=>'required|min:2|max:190',
             'phone'=>'required|max:25|unique:staff,phone,'.$id,
             'email'=>'required|max:25|unique:staff,email,'.$id,
             'address'=>'required|max:191',
             'description'=>'nullable|max:10000',
             'uid'=>'required|max:25',
             'uid_type'=>'required|max:25',
             'dob'=>'required|max:25',
             'join_date'=>'required|max:25',
             'staf_type_id'=>'required',
             'image' => 'mimes:jpeg,jpg,png,gif|nullable|max:10000', // max 10000kb
          ]);

        try {

            $request['status'] = $request->status;
            Staff::findOrFail($id)->update($request->except('_token','image'));
            $staff = Staff::findOrFail($id);

            if ($request->file('image')) {
                if ($staff->image and file_exists(public_path().$staff->image)) {
                    unlink(public_path().$staff->image);
                }
                $photoUrl = 'image'.time().'.png';
                $path = public_path().'/uploads/images/staff';
                $url = '/uploads/images/staff';

                $file = $request->file('image');
                $file->move($path,$photoUrl);
                $staff->image = $url.'/'.$photoUrl;
                $staff->save();                 
            }

            notify()->success('Updated Successfully'); 
            
            if ($request->submit =='s&c') {
                return redirect(route($this->prifix.'.edit',$id));
            }else{
                return redirect(route($this->prifix.'.index'));
            }   
         return back();
        }catch (\Exception $e) {
            return $err_message = \Lang::get($e->getMessage());
            notify()->error($err_message);
            return back();
        }
        
    }
    public function destroy($id)
    {
        try {
        $staff = Staff::findOrFail($id)->delete();                
        notify()->success('Removed Successfully');
        return redirect(route($this->prifix.'.index'));
        }catch (\Exception $e) {
            $err_message = \Lang::get($e->getMessage());
            notify()->error($err_message);
            return redirect(route($this->prifix.'.index'));
        }
    }
}
