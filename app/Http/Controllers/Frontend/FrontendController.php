<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Setting;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Brand;
use App\Models\ProductSize;
use App\Models\ProductType;
use App\User;
use Auth;
use Validator;
use App\Models\Newslater;
use App\Models\Division;
use Redirect,Response,File;
use App\Models\Prescription;
use App\Models\Contactpage;
use Cart;

class FrontendController extends Controller
{
    public function index()
    {
        $data['products'] = Product::latest()->paginate(8);
        $data['categories'] = Product::select('category_id')->get();
        $data['brands'] = Product::select('brand_id')->get();
        // $brand1 = Setting::select('brand_id_1')->get();
        // $brand = Brand::select('id')->where($brand1)->get();
        // dd($brand);
        return view('frontend.home', $data);
    }
    public function checkout()
    {
        // if (Auth::check() && Auth::user()->role == 2) {
        //     $data['divisions'] = Division::all();
        //     return view('frontend.checkout', $data);
        // } else {
        //     $notification = array(
        //         'message' => 'Plese at first login',
        //         'alert-type' => 'error'
        //     );
        //     return redirect()->route('user.login')->with($notification);
        // }

        $discount = session()->get('coupon')['discount'] ?? 0;
        $newsubtotal = (Cart::subtotal() - $discount);
        

        if(session('cart')){
        $data['divisions'] = Division::all();
        
        return view('frontend.checkout', $data,compact('discount','newsubtotal'));
    }else{

        $notification = array(
                    'message' =>  'Shopping At list One Product',
                    'alert-type' => 'error'
                );
                return redirect()->to('/')->with($notification);
    }



    }
    public function cart()
    {
        return view('frontend.cart');
    }
    public function userLogin()
    {
        return view('frontend.login');
    }
    public function udashboard(Request $request)
    {
        return $request->input();
        // echo "udashboard";
    }
    public function userRegister()
    {
        return view('frontend.register');
    }
    public function productDetails($id)
    {
        $data['brands'] = Brand::all();
        $data['product'] = Product::where('id', $id)->first();
        return view('frontend.product-details', $data);
    }
    public function userStore(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'mobile' => 'required|unique:users,mobile',
            'email' => 'required|email|unique:users,email',
            'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:6',
        ]);

        $data = new User;
        $data->role = 2;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->mobile = $request->mobile;
        $data->password = bcrypt($request->password);
        $data->save();

        $notification = array(
            'message' => 'Registration Successfully!',
            'alert-type' => 'success'
        );
        Auth::login($data, true);
        $notification = array(
            'message' => 'Registration successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('user.dashboard')->with($notification);
    }

    public function newslaterStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|unique:newslaters,email',
        ]);
        if ($validator->fails()) {
            $notification = array(
                'message' => 'Something went wrong, Please try again!',
                'alert-type' => 'error'
            );
            return redirect()->back()->withErrors($validator)->withInput()->with($notification);
        }

        $data = new Newslater;
        $data->email = $request->email;
        $data->save();

        $notification = array(
            'message' => 'Thanks For Subscribing...',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function prescription_upload()
    {
        return view('frontend.prescription_upload');
    }

    public function prescription_store(Request $request)
    {   
        request()->validate([
         'name'  => 'required',
         'mobile'  => 'required',
         'file'  => 'required|mimes:jpg,png,gif,doc,docx,pdf,txt|max:2048',
       ]);
  
        if ($files = $request->file('file')) { 
            //store your file into database
            $prescription = new Prescription();
            $prescription->name = $request->name;
            $prescription->mobile = $request->mobile;
            $prescription->email = $request->email;
            $prescription->says = $request->says;

            $defaultImage = $request->file('file');
            if ($defaultImage) {
                $imageName = time() . '_' . uniqid() . '.' . $defaultImage->getClientOriginalExtension();
                $defaultImage->move(base_path('uploaded/product'), $imageName);
                $prescription->file = '/uploaded/product/' . $imageName;
            }

            $prescription->save();
              
            return response()->json(['success' => 'Prescription uploaded successfully.']);
  
        }
  
        return Response()->json([
                "success" => false,
                "file" => ''
          ]);
    }

    public function contact_store(Request $request)
    {   
        request()->validate([
         'name'  => 'required',
         'mobile'  => 'required',
       ]);
  
        if ($request->mobile) { 
            //store your file into database
            $contactpage = new Contactpage();
            $contactpage->name = $request->name;
            $contactpage->mobile = $request->mobile;
            $contactpage->email = $request->email;
            $contactpage->subject = $request->subject;
            $contactpage->message = $request->message;
            $contactpage->save();
            return response()->json(['success' => 'Message sent successfully.']);
        }
    }

    public function product_inquiry()
    {
        return view('frontend.request_product');
    }

    public function refill_request()
    {
        return view('frontend.refill_request');
    }

    public function how_to_order()
    {
        return view('frontend.how_to_order');
    }

    public function about_us()
    {
        return view('frontend.about_us');
    }

    public function news()
    {
        return view('frontend.news');
    }

    public function contact_us()
    {
        return view('frontend.contact_us');
    }

    public function policy()
    {
        return view('frontend.policy');
    }

    public function category($id)
    {   
        $data['categories'] = Category::all()->sortBy("category_name");
        $data['subcategories'] = Subcategory::all();
        $data['products'] = Product::where('category_id', $id)->paginate(8);
        return view('frontend.category', $data);
    }

    // public function subcategory($id)
    // {   
    //     $data['categories'] = Category::all();
    //     $data['subcategories'] = Subcategory::all();
    //     $data['products'] = Product::where('subcategory_id', $id)->get();
    //     return view('frontend.subcategory', $data);
    // }

    // public function ViewBannerDetails1($id){
    //     $products = Product::where('status',1)->where('brand_id',$id)->orderBy('id','DESC')->get();
    //     dd($products);
    //     return view('frontend.category',compact('products')); 
    // }

}
