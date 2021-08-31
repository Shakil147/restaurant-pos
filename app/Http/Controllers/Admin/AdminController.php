<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Auth;
use Str;
use Image;
use Hash;
use DB;

class AdminController extends Controller
{

    public function index(Request $request)
    {
       return view('admin.admin.index');
    }
    public function getAdmins(Request $request)
    {
       return response()->json(User::latest()->paginate(15));    
    }
    public function getallAdmins(Request $request)
    {
       return response()->json(User::latest()->get());    
    }
    public function create ()
    {
        return view('admin.admin.add',['roles'=>Role::get()]);
    }
    public function store(Request $request)
    {
         $this->validate($request,[
             'name'=>'required|max:190',
             'email'=>'required|string|email|max:190|unique:users,email',
             'image' => 'nullable|max:10000', // max 10000kb
             'password' => 'required|string|min:8|max:255', // max 10000kb
          ]);

        try {

            $admin = new User;
            $admin->name =  $request->name;
            $admin->email =  $request->email;
            $admin->password = Hash::make($request->password);
            $admin->status = ($request->status ==true) ?  true :   false ;
            $admin->save();


            if ($request->admin_role) {
                DB::table('model_has_roles')->where('model_type','App\Models\User')->where('model_id',$admin->id)->delete();
                $admin->assignRole($request->admin_role);
            }

            if ($request->file('image') !=null) {
                $photoUrl = 'image'.time().'.png';
                $path = public_path().'/uploads/images/users/';
                $url = '/uploads/images/users/';
                Image::make(file_get_contents($request->image))->resize(200, 200)->save($path.$photoUrl);
               $admin->image =  $url.$photoUrl;
               $admin->save();
            }

            return response()->json(['message'=>'Successfully Stored','status'=>'success']);
        }catch (\Exception $e) {
            $err_message = \Lang::get($e->getMessage());
           
             return response()->json(['message'=>$err_message,'status'=>'error']);
        }
    }

    public function show($id)
    {
        return response()->json(User::findOrFail($id));
    }


    public function edit($id)
    {
        $admin =  User::findOrFail($id);
        $role = $admin->getRoleNames();

        //return $admin;
        return view('admin.admin.edit',[
            'admin'=>User::findOrFail($id),
            'admin_roles'=>$role,
            'roles'=>Role::get(),
        ]);
    }

    public function getRole($id)
    {
        $user =  User::findOrFail($id);
        $role = $user->getRoleNames();

        return response()->json($role);
    }


    public function update(Request $request, $id)
    {
       // return $request;
        $this->validate($request,[
             'name'=>'required|max:190',
             'email'=>'required|string|email|max:190|unique:users,email,'.$id,
             'image' => 'nullable|max:10000', // max 10000kb
          ]);

        try {
            $admin = User::findOrFail($id);
            $admin->name =  $request->name;
            $admin->email =  $request->email;
            $admin->status = ($request->status ==true) ?  true :   false ;
            $admin->save();

            if ($request->file('image') !=null) {
                if ($admin->image!=null and file_exists(public_path().$admin->image)) {
                    unlink(public_path().$admin->image);
                }
                 $photoUrl = 'image'.time().'.png';
                $path = public_path().'/uploads/images/users/';
                $url = '/uploads/images/users/';
                Image::make(file_get_contents($request->image))->resize(200, 200)->save($path.$photoUrl);
               $admin->image =  $url.$photoUrl;
               $admin->save();
            }

            $role = $admin->getRoleNames();
            $admin->admin_roles = $role;
            
            if ($request->admin_role != $role) {
                DB::table('model_has_roles')->where('model_type','App\Models\Admin')->where('model_id',$admin->id)->delete();
                $admin->assignRole($request->admin_role);
            }
            return response()->json(['data'=>$admin,'message'=>'Successfully Updated','status'=>'success']);            
        }catch (\Exception $e) {
            $err_message = \Lang::get($e->getMessage());
            return response()->json($err_message); 
        }
        
    }
    public function destroy($id)
    {
        
        $admin = User::findOrFail($id);
        try {

            if ($admin->image!=null and file_exists(public_path().$admin->image)) {
                unlink(public_path().$admin->image);
            }
            $admin->delete();
            
            return response()->json(['message'=>'Successfully Delted','status'=>'success']);
        }catch (\Exception $e) {
            $err_message = \Lang::get($e->getMessage());
            return response()->json(['message'=>$err_message,'status'=>'success']);
        }
    }
}
