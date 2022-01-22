<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Size;
use App\Models\Type;
use App\Models\Coupon;
use Cart;
use Auth;
use Session;

class CartController extends Controller
{

    public function index(){
        return view('frontend.cart');
    }

    public function store($id)
    {
        $product = Product::where('id', $id)->first();
        $data['id'] = $id;
        $data['name'] = $product->product_name;
        $data['qty'] = 1;
        if($product->price_active == 1){
            $data['price'] = $product->selling_price;
        }else{
            $data['price'] = $product->discount_price;
        }
        $data['weight'] = 0;
        $data['options']['image'] = $product->default_image;
        $data['options']['type_id'] = 1;
        $data['options']['size_id'] = 1;
    
        Cart::add($data);
        
        return response()->json(['success' => 'Successfully Added To Cart']);
    }

    public function cartCount(){
        $data = Cart::count();
       return response()->json($data);
    }

    public function cartData(){
        $data = Cart::content();
        return response()->json($data);
    }

    public function cartTotal(){
        $data = Cart::totalFloat();
       return response()->json($data);
    }

    public function applyCoupon(Request $request){

        // return 'add coupon';
        // $coupon = $request->coupon;
        // $check = Coupon::where('coupon',$coupon)->first();
        // if($check){
        //     Session::put('coupon',['name' => $check->coupon, 'discount' => $check->discount]);
        //     $notification = array(
        //         'message' => 'Successfully coupon applied!',
        //         'alert-type' => 'success'
        //     );
        //     return redirect()->back()->with($notification);
        // }else{
        //     $notification = array(
        //         'message' => 'Invalid Coupon!',
        //         'alert-type' => 'error'
        //     );
        //     return redirect()->back()->with($notification);
        // }

        $coupon = Coupon::where('coupon',$request->coupon)->first();
        // dd($coupon);

        if(!$coupon){

            $notification = array(
            'message' => 'Coupon Invalid',
            'alert-type' => 'success'
        );

            return redirect()->to('/checkout')->with($notification);
        }

        session()->put('coupon',[
            'coupon' => $coupon->coupon,
            'discount' => $coupon->discount,
        ]);

        $notification = array(
            'message' => 'Coupon Applied Successfully',
            'alert-type' => 'success'
        );

            return redirect()->to('/checkout')->with($notification);

    }

    // public function CouponApply(Request $request){
    //     $coupon = Coupon::where('coupon',$request->coupon)->first(); //database coupon will match requested coupon//
    //     if($coupon){
    //         Session::put('coupon',[ //sb value coupon e rakha hobe
    //             'coupon' => $coupon->coupon,
    //             'discount' => $coupon->discount,
    //             'discount_amount' => round(Cart::total() * $coupon->discount / 100),
    //             'total_amount' => round(Cart::total() - Cart::total() * $coupon->discount / 100)   //total - discount = total amount

    //         ]);

    //         return response()->json(array(
    //             'success' => 'coupon Applied Successfully'
    //         ));

    //     }else{
    //         return response()->json(['error' => 'Invalid Coupon']);
    //     }

    //     public function CouponCalculation(){
    //     if(Session::has('coupon')){
    //         return response()->json(array( //get and passing all data couponCalculation() function//jdi coupon take tahle ei data pass korbe
    //             'subtotal' => Cart::total(),
    //             'coupon' => session()->get('coupon')['coupon'],
    //             'discount' => session()->get('coupon')['discount'],
    //             'discount_amount' => session()->get('coupon')['discount_amount'],
    //             'total_amount' => session()->get('coupon')['total_amount'],

    //         ));
    //     }else{

    //         return response()->json(array( //jdi coupon na thtke tahle ei data pass korbe
    //             'total' => Cart::total(),
    //         ));
    //     }

    // }//end method

    public function couponRemove(){
        Session::forget('coupon');
        $notification = array(
            'message' => 'Coupon Removed!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }



}
