<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Image;
use File;
use Hash;

class AccountController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function edit()
    {
    	$user = User::find(Auth::id());
    	return view('admin.account.edit',compact('user'));
    }
    public function update(Request $request)
    {
    	//attempt login.
    	$id = Auth::id();
        $this->validate($request, [
            'email' => 'required|string|email|max:255|unique:users,email,'.$id,
        ]);

    	$user = User::find(Auth::id());
        if(Auth::attempt(['email' => $user->email, 'password' => $request->password])){
            //Authenticated
	            try {
		         $user->name =  $request->name;
		         $user->email =  $request->email;
		            if ($request->image !=null) {
		                 $photoUrl = 'image'.time().'.png';
		                $path = public_path().'/uploads/images/users/';
		                $url = '/uploads/images/users/';
		                Image::make(file_get_contents($request->image))->resize(200, 200)->save($path.$photoUrl);
		               $user->image =  $url.$photoUrl;
		            }
	            $user->save();

	            
	            toastr()->success('Profile Updated successfully');

	            return back();
	        }catch (\Exception $e) {
	            $err_message = \Lang::get($e->getMessage());
	            toastr()->warning($err_message);
	            return back();
	        }

        }else{          
        	toastr()->warning('Password Dose Not Match'); 
            return back();
        }    	
    	
    }
    public function change_password(Request $request)
    {

        $this->validate($request, [
            'new_password' => 'required|string|min:8|max:255',            
            'confirm_password' => 'required_with:password|same:new_password|min:6',
        ]);

    	//attempt login.
    	$user = User::find(Auth::id());
        if(Auth::attempt(['email' => $user->email, 'password' => $request->password])){
            //Authenticated
	            try {
	            $user->password = Hash::make($request->new_password);
	            $user->save();

	            toastr()->success('Password Changed successfully');

	            return back();
	        }catch (\Exception $e) {
	            $err_message = \Lang::get($e->getMessage());
	            toastr()->warning($err_message);
	            return back();
	        }

        }else{          
        	toastr()->warning('Password Dose Not Match'); 
            return back();
        }
    	
    }
}
