<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\WebInfo;
use Auth;
use Image;
use File;

class WebInfoController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
    	$web = WebInfo::first();
    	if ($web==null) {
    		$web = new WebInfo;
    		$web->save();
    	}
        return view('admin.web.index',compact('web'));
    }
    public function update(Request $request)
    {
      //return $request;
      $web = WebInfo::first();
      if ($web==null) {
         $web = new WebInfo;
         $web->save();
      }
      $web->name = $request->name;
      $web->address = $request->address;
      $web->service_charge = $request->service_charge;
      $web->vat = $request->vat;
      $web->tax = $request->tax;
      $web->email = $request->email;
      $web->phone = $request->phone;
      $web->fb = $request->fb;
      $web->twitter = $request->twitter;
      $web->instagram = $request->instagram;
      $web->youtube = $request->youtube;
      $web->iframe = $request->iframe;
      $web->about_us = $request->about_us;
      $web->text_3 = $request->text_3;
      $web->text_4 = $request->text_4;

        if ($request->logo !=null) {
           $web->logo = $this->uploadImage($request,'logo',null,null);
        }
        if ($request->icon !=null) {
           $web->icon = $this->uploadImage($request,'icon',null,null);
        }
        if ($request->banner_image !=null) {
           $web->banner_image = $this->uploadImage($request,'banner_image',null,null);
        }
    	
    	$web->save();

    	return back();
    }

    public function uploadImage($request,$type,$width,$hight)
    {
    	if ($request->$type !=null) {
             $photoUrl = 'image'.$type.'_'.time().'.png';
            $path = public_path().'/uploads/images/web/';
            $url = '/uploads/images/web/';
            Image::make(file_get_contents($request->$type))->save($path.$photoUrl);
          return $url.$photoUrl;
        }else{
        	return null;
        }
    }
}
