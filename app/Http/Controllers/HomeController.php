<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class HomeController extends Controller
{

    var $path = 'admin.pos';
    var $prifix = 'admin.pos';

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        return view($this->path.'.index',[
            'products'=>Product::latest()->get(),
            'categories'=>Category::latest()->where('status',1)->get()
        ]);       
    }
}
