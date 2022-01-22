<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Menu;
use App\Models\Setting;
use App\Models\Coupon;
use App\Models\District;
use App\Models\Division;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\Hash;
use DB;

class ApiController extends Controller
{
   public function getProducts(){
      $list =Product::paginate(20);
    //   $list =Product::whereNull('deleted_at')->paginate(20);
      // $list=$list->getProducts();
      //  foreach ($list as $item){
      //       $item['product_name']=strip_tags($item['product_name']);
      //       $item['product_name']=$Content = preg_replace("/&#?[a-z0-9]+;/i"," ",$item['product_name']); 
      //   }
        return response()->json($list);   

    }

    
    public function getBrands(){
     
      $brand1 = Setting::join('brands', 'brands.id', '=', 'settings.brand_id_1')
              ->get(['brands.id','brands.brand_name', 'settings.home_banner_1']);
              $brand2 = Setting::join('brands', 'brands.id', '=', 'settings.brand_id_2')
              ->get(['brands.id','brands.brand_name', 'settings.home_banner_2']);
              $brand3 = Setting::join('brands', 'brands.id', '=', 'settings.brand_id_3')
              ->get(['brands.id','brands.brand_name', 'settings.home_banner_3']);
              
          return response()->json(array($brand1,$brand2,$brand3));   

    }

    public function getCategories(){
        $list = Category::orderBy('category_name', 'ASC')->select('id','category_name','slug')->get();
        return response()->json($list);   
    }//end method

    public function getMenu(){
        
        // $list = new Menu();
        $list = Menu::where('parent_id', '=', 0)->select('id','title','parent_id','category_id','slug','class')->get();
           
        return response()->json($list);   
    }//end method
    
    public function SubCatProducts($id){  
       
     $list = Product::where('category_id', '=', $id)->get();

        return response()->json([
            'data' =>$list
        ]); 
        
    }//end method

    public function getOrder(){
        $list =Order::latest()->get();
      
        return response()->json($list);   
    }//end method

    public function getOrderDetails(){
        $list = OrderDetail::latest()->get();
      
        return response()->json($list);   
    }//end method

    public function getBrandDetails($id){
        // $categories = Category::latest()->get();
        $list = Product::where('status',1)->where('brand_id',$id)->select('id','category_id','brand_id','product_name','product_slug','product_code','product_quantity','selling_price','discount_type','discount','discount_price','unit','price_active','short_description','product_description','hot_deal','trend_product','hot_new','default_image')->orderBy('id','DESC')->get();
        return response()->json($list); 
    }
    
    public function Register(Request $request){
        $validateData = $request->validate([
            'name' => ['required','string','max:255'],
            'email' => ['required','string','email','max:255','unique:users'],
            'password' => ['required','string','max:255'],
            'mobile' => ['required','string','max:255'],
            'address' => ['required','string','max:255'],
            
        ]);

        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);
        $data['mobile'] = $request->mobile;
        $data['address'] = $request->address;
        DB::table('users')->insert($data);

        return response()->json(['success' => 'register successfully']);
    }//end method

    public function Coupon(Request $request){

        $data = array();
        $data['coupon'] = $request->coupon;
        $data['discount'] = $request->discount;
        

        DB::table('coupons')->insert($data);

        return response()->json(['success' => 'coupon add successfully']);
    }

}
