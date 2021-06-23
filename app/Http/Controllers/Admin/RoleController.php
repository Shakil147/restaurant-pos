<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Auth;
use Str;
use DB;

class RoleController extends Controller
{

    public function index(Request $request)
    { 
       return view('admin.role.index',['roles'=>Role::latest()->get()]);
    }
    public function getRoles(Request $request)
    {
       return response()->json(Role::latest()->paginate(20));    
    }
    public function getallroles(Request $request)
    {
       return response()->json(Role::latest()->get());    
    }
    public function create ()
    {
        return view('admin.role.add',['permissions'=>Permission::get()]);
    }
    public function edit($id)
    {
        return view('admin.role.edit',[
            'role'=>Role::findOrFail($id),
            'permissions'=>Permission::get()
        ]);
    }
    public function store(Request $request)
    {
         $this->validate($request,[
             'name'=>'required|string|max:190|unique:roles,name',
             "permissions"    => "nullable|array|max:500",
            "permissions.*"  => "required|string|distinct|max:50",
          ]);

        try {

            $role = new Role;
            $role->name =  $request->name;
            $role->save();
            $role->syncRoles($request->permissions);

            if ($request->submit=='s&c') {
                return back()->with('success','Role Saved');
            }else{
                return redirect(route('admin.roles.index'))->with('success','Role Saved');
            }
        }catch (\Exception $e) {
            $err_message = \Lang::get($e->getMessage());
           
             return response()->json(['message'=>$err_message,'status'=>'error']);
        }
    }

    public function show($id)
    {
        return response()->json(Role::findOrFail($id));
    }


    public function update(Request $request, $id)
    {
         $this->validate($request,[
            "permissions"    => "nullable|array|max:500",
            "permissions.*"  => "required|string|distinct|max:50",
          ]);        
        try {
            $role = Role::findOrFail($id);
            $role->syncPermissions($request->permissions);

            if ($request->submit=='s&c') {
                return back()->with('success','Role Saved');
            }else{
                return redirect(route('admin.roles.index'))->with('success','Role Saved');
            }
            
            return response()->json(['data'=>$role,'message'=>'Successfully Updated','status'=>'success']);            
        }catch (\Exception $e) {
            $err_message = \Lang::get($e->getMessage());
            return response()->json($err_message); 
        }
        
    }
    public function destroy($id)
    {
        try {

            $role = Role::findOrFail($id);
            if ($role->name !== 'super-admin') {
                DB::table('role_has_permissions')->where('role_id',$role->id)->delete();
                $role->delete();
                
                return response()->json(['message'=>'Successfully Delted','status'=>'success']);
            }else{
                return response()->json(['message'=>'Can Not Process Request','status'=>'warning']);
            }
            
        }catch (\Exception $e) {
            $err_message = \Lang::get($e->getMessage());
            return response()->json(['message'=>$err_message,'status'=>'success']);
        }
    }
}
