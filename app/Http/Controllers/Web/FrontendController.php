<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Page;
use App\Models\Office;
use App\Models\Album;
use App\Models\Team;
use App\Models\Concern;
use App\Mail\ContactForward;
use App\Mail\NewsletterForward;
use App\Mail\ContactReplay;
use App\Mail\NewsletterReplay;
use App\Models\Category;
use App\Models\Product;
use App\Models\Contact;
use App\Models\Newsletter;
use Mail;

class FrontendController extends Controller
{
    public function index()
    {
        //return $_SERVER['REMOTE_ADDR'];
        $dsliders = Slider::where('status',1)->where('type',1)->get();
        $msliders = Slider::where('status',1)->where('type',2)->get();
        //dd($msliders);
    	return view('web.home.home',compact('dsliders','msliders'));
    }
    public function about_us()
    {
    	 return view('web.pages.about_us');
    }
    public function why()
    {
         return view('web.pages.why');
    }
    public function team()
    {
        $teams = Team::where('status',1)->take(20)->get();
         return view('web.pages.team',compact('teams'));
    }
    public function csr()
    {
        $albums = Album::where('status',1)->get();
        return view('web.gallery.gallery',compact('albums'));
    }
    public function csr_details($id)
    {
         $album = Album::where('id',$id)->firstOrFail();
         return view('web.gallery.gallery-in',compact('album'));         
    }
    public function concern($id)
    {
        $concern = Concern::where('id',$id)->firstOrFail();
        return view('web.pages.concern',compact('concern'));         
    }
    public function pages($slug)
    {
        $page = Page::where('slug',$slug)->firstOrFail();
        return view('web.pages.index',compact('page'));         
    }
    public function categories()
    {
        $categories = Category::where('status',1)->whereNull('parent_id')->get();
        return view('web.products.categories',compact('categories'));         
    }
    public function subcategories($slug)
    {
        //return $slug;
        $subcategory = Category::where('slug',$slug)
        ->with('products','parent')
        ->firstOrFail();

        $subcategories = Category::
        where('parent_id',$subcategory->parent_id)
        ->get();
        return view('web.products.subcategories',compact('subcategories','subcategory'));         
    }
    public function products($slug)
    {
        //return $slug;
        $product = Product::where('slug',$slug)
        ->with('category')
        ->firstOrFail();

        $similar_product = Product::latest()
        ->where('category_id',$product->category_id)->take(4)
        ->get();
        return view('web.products.products',compact('product','similar_product'));         
    }
    public function interior_design()
    {
        return view('web.design.interior');
    }
    public function exterior_design()
    {
        return view('web.design.exterior');
    }
    
    public function contact()
    {
        $all_office = Office::where('status', 1)->get();
         return view('web.contact.contact',compact('all_office'));
    }
    public function contact_store(Request $request)
    {
        $this->validate($request, [          
            'name' => 'required',               
            'phone' => 'required',               
            'email' => 'required',               
            'comments' => 'required',               
        ]);

        try {
            
            //return $request;
            $contact = new Contact;
            $contact->name = $request->name;
            $contact->phone = $request->phone;
            $contact->email = $request->email;
            $contact->message = $request->comments;
            $contact->save();
            
            $myEmail = 'hello.aquapaints@gmail.com';
            $details = [
                'name' => $request->name,
                'phone' => $request->phone,
                'email' => $request->email,
                'comments' => $request->comments
            ];
            Mail::to($myEmail)->send(new ContactForward($details));

            $frEmail = $request->email;
            Mail::to($frEmail)->send(new ContactReplay($details));
            //return $request;
            
            toastr()->success('Thank You For your Message');
            
            return back()->with('success','Thank You For your Message');


        }catch (\Exception $e) {
            $err_message = \Lang::get($e->getMessage());
           
            return back()->with('warning',$err_message);
            
        }
    }
    public function feedback_store(Request $request)
    {        
         $this->validate($request, [          
            'name' => 'required|max:255',               
            'phone' => 'required|max:255',               
            'email' => 'required|max:255',               
            'address' => 'required|max:255',               
            'subscription' => 'nullable|max:1',               
        ]);  
        $contact = new Newsletter;
            $contact->name = $request->name;
            $contact->phone = $request->phone;
            $contact->email = $request->email;
            $contact->address = $request->address;
            $contact->subscription = $request->subscription;
            $contact->save();

             $myEmail = 'hello.aquapaints@gmail.com';

            $details = [
                'name' => $request->name,
                'phone' => $request->phone,
                'email' => $request->email,
                'address' => $request->address
            ];
            Mail::to($myEmail)->send(new NewsletterForward($details));

            $frEmail = $request->email;
            Mail::to($frEmail)->send(new NewsletterReplay($details));  

        
            toastr()->success('Thank You');
            return back()->with('success','Thank You');  

        
        try {
            
            

        }catch (\Exception $e) {
            $err_message = \Lang::get($e->getMessage());
           
            return back()->with('warning',$err_message);
        }
            
    }
}

