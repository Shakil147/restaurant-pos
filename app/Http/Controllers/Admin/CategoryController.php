<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Auth;
use Str;
use Image;

class CategoryController extends Controller
{
    var $path = 'admin.category';
    var $prifix = 'admin.categories';
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        return view($this->path.'.index',['categories'=>Category::latest()->whereNull('parent_id')->get()]);       
    }
    public function get(Request $request)
    {
       return response()->json(Category::latest()->where('status',1)->get());
    }
    public function create ()
    {
    	return view($this->path.'.add');
    }
    public function edit($id)
    {
    	return view($this->path.'.edit',['category'=>Category::findOrFail($id)]);
    }
    public function store(Request $request)
    {
         $this->validate($request,[
             'name'=>'required|min:2|max:190',
             'slogan'=>'max:190',
             'image' => 'mimes:jpeg,jpg,png,gif|required|max:10000', // max 10000kb
          ]);
          

        try {
            $category = new Category;
            $category->name = $request->name;
            $category->slug = Str::slug($request->name);
            $category->parent_id = ($request->parent_id ==!0) ? $request->parent_id : null ;
            $category->text_1 = ($request->slogan ==!null) ? $request->slogan : $request->name ;
            $category->status = $request->status;
            $category->show_individual = $request->show_individual;
            $category->save();
            

            if ($request->file('image')) {
                $photoUrl = 'image'.time().'.png';
                $path = public_path().'/uploads/images/categories';
                $url = '/uploads/images/categories';

                $file = $request->file('image');
                $file->move($path,$photoUrl);
                $category->image = $url.'/'.$photoUrl;
                $category->save();                 
            }
            
             notify()->success('Category Saved Successfully');
             
            if ($request->submit =='s&c') {
                return redirect(route($this->prifix.'.create'));
            }else{
                return redirect(route($this->prifix.'.index'));
            }

        }catch (\Exception $e) {
            $err_message = \Lang::get($e->getMessage());
            notify()->error($err_message);
            return back();
        }
    }

    public function show($id)
    {
        return response()->json(Category::findOrFail($id));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request,[
             'name'=>'required|min:2|max:190',
             'slogan'=>'max:190',
             'image' => 'mimes:jpeg,jpg,png,gif|nullable|max:10000', // max 10000kb
          ]);

        try {
            $category = Category::findOrFail($id);
            $category->name = $request->name;
            $category->parent_id = ($request->parent_id ==!0) ? $request->parent_id : null ; 
            $category->text_1 = ($request->slogan ==!null) ? $request->slogan : $request->name ;
            $category->status = $request->status;
            $category->show_individual = $request->show_individual;
            $category->save();

            if ($request->file('image')) {
                $photoUrl = 'image'.time().'.png';
                $path = public_path().'/uploads/images/categories';
                $url = '/uploads/images/categories';

                $file = $request->file('image');
                $file->move($path,$photoUrl);
                $category->image = $url.'/'.$photoUrl;
                $category->save();                 
            }

            notify()->success('Category Updated Successfully'); 
            
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

        $category = Category::findOrFail($id);

        if ($category->image!=null and file_exists(public_path().$category->image)) {
                unlink(public_path().$category->image);
        }
        
        $category->delete();
        
        notify()->success('Category Removed Successfully');

         return redirect(route($this->prifix.'.index'));

        }catch (\Exception $e) {
            $err_message = \Lang::get($e->getMessage());
            notify()->error($err_message);
            return redirect(route($this->prifix.'.index'));
        }
    }
}
