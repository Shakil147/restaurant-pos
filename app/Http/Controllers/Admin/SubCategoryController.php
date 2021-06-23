<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Auth;
use Str;
use Image;


class SubCategoryController extends Controller
{
    var $path = 'admin.subcategory';
    var $prifix = 'admin.subcategories';
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        return view($this->path.'.index',['categories'=>Category::latest()->whereNotNull('parent_id')->get()]);       
    }
    public function create ()
    {
    	return view($this->path.'.add',['categories'=>Category::latest()->whereNull('parent_id')->get()]);
    }
    public function edit($id)
    {
    	return view($this->path.'.edit',[
    		'category'=>Category::findOrFail($id),
    		'categories'=>Category::latest()->whereNull('parent_id')->get(),
    	]);
    }
    public function store(Request $request)
    {
         $this->validate($request,[
             'name'=>'required|min:2|max:190',
             'slogan'=>'max:190',
             'parent_id'=>'required',
             'image' => 'mimes:jpeg,jpg,png,gif|nullable|max:10000', // max 10000kb
          ]);

        try {
            $category = new Category;
            $category->name = $request->name;
            $category->slug = Str::slug(time().$request->name);
            $category->parent_id = ($request->parent_id ==!0) ? $request->parent_id : null ;
            $category->text_1 = ($request->slogan ==!null) ? $request->slogan : $request->name ;
            $category->status = $request->status ;
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

            notify()->success('Sub Category Saved successfully');

           if ($request->submit =='s&c') {

                return redirect(route($this->prifix.'.create'));
            }else{
                
                return redirect(route($this->prifix.'.index'));
            }
        }catch (\Exception $e) {
            $err_message = \Lang::get($e->getMessage());
            notify()->error($err_message);
            return redirect(route($this->prifix.'.index'));
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
             'parent_id'=>'required',
             'slogan'=>'max:190',
             'image' => 'mimes:jpeg,jpg,png,gif|nullable|max:10000', // max 10000kb
          ]);

        try {
            $category = Category::findOrFail($id);
            $category->name = $request->name;
            $category->parent_id = ($request->parent_id ==!0) ? $request->parent_id : null ; 
            $category->text_1 = ($request->slogan ==!null) ? $request->slogan : $request->name ;
            $category->status = $request->status ;
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
            notify()->success('Sub Category Updated Successfully');    
            if ($request->submit =='s&c') {

                return redirect(route($this->prifix.'.edit',$id));
            }else{
                
                return redirect(route($this->prifix.'.index'));
            }
        }catch (\Exception $e) {
            $err_message = \Lang::get($e->getMessage());
            notify()->error($err_message);
            
           return redirect(route($this->prifix.'.index'));
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
            notify()->success('Sub Category Removed Successfully');
            return back();
        }catch (\Exception $e) {
            $err_message = \Lang::get($e->getMessage());
            notify()->error($err_message);
           return redirect(route($this->prifix.'.index'));
        }
    }
}
