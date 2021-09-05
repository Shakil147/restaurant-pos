<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Type;
use App\Models\Unit;
use App\Models\Item;
use Auth;
use Str;
use Image;

class ItemController extends Controller
{
    var $path = 'admin.item';
    var $prifix = 'admin.items';
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        return view($this->path.'.index',['items'=>Item::latest()->get()]);       
    }
    public function get(Request $request)
    {
        $status = $request->status;
        //return $request;
        $type_id = $request->type_id;
       return response()->json(Item::latest()->when($request->status, function ($query) use ($status) {
            $query->where('status',$status);
        })->when($request->status, function ($query) use ($type_id) {
            $query->where('type_id',$type_id);
        })->get(),200);
    }
    public function getitem($id)
    {
       return response()->json(Item::findOrFail($id),200);
    }
    public function create ()
    {
        return view($this->path.'.add',[
            'types'=>Type::where('status',1)->get(),
            'units'=>Unit::where('status',1)->get(),
        ]);
    }
    public function edit($id)
    {
        return view($this->path.'.edit',[
            'item'=>Item::findOrFail($id),
            'types'=>Type::where('status',1)->get(),
            'units'=>Unit::where('status',1)->get(),
        ]);
    }
    public function store(Request $request)
    {
         $this->validate($request,[
             'name'=>'required|min:2|max:190',
             'purchase_price'=>'required|min:1|numeric',
             'selling_price'=>'required|min:1|numeric',
             //'image' => 'mimes:jpeg,jpg,png,gif|nullable|max:10000', // max 10000kb
          ]);
        try {

            $request['status'] = $request->status;
            $item = Item::create($request->except('_token','image'));           

            if ($request->file('image')) {
                $photoUrl = 'image'.time().'.png';
                $path = public_path().'/uploads/images/items';
                $url = '/uploads/images/items';

                $file = $request->file('image');
                $file->move($path,$photoUrl);
                $item->image = $url.'/'.$photoUrl;
                $item->save();                 
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
        return response()->json(Item::findOrFail($id));
    }


    public function update(Request $request, $id)
    {
         // $this->validate($request,[
         //     'name'=>'required|min:2|max:190',
         //     'purchase_price'=>'required|min:1|numeric',
         //     'selling_price'=>'required|min:1|numeric',
         //     //'image' => 'mimes:jpeg,jpg,png,gif|nullable|max:10000', // max 10000kb
         //  ]);

        try {

            $request['status'] = $request->status;
            Item::findOrFail($id)->update($request->except('_token','image'));
            $item = Item::findOrFail($id);

            if ($request->file('image')) {
                if ($item->image and file_exists(public_path().$item->image)) {
                    unlink(public_path().$item->image);
                }
                $photoUrl = 'image'.time().'.png';
                $path = public_path().'/uploads/images/items';
                $url = '/uploads/images/items';

                $file = $request->file('image');
                $file->move($path,$photoUrl);
                $item->image = $url.'/'.$photoUrl;
                $item->save();                 
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
        $item = Item::findOrFail($id)->delete();                
        notify()->success('Removed Successfully');
        return redirect(route($this->prifix.'.index'));
        }catch (\Exception $e) {
            $err_message = \Lang::get($e->getMessage());
            notify()->error($err_message);
            return redirect(route($this->prifix.'.index'));
        }
    }
}
