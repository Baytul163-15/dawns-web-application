<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Http\Request;
use Auth;

class WishlistController extends Controller
{
    public function store($id)
    {

        if (Auth::check()) {
            $check = Wishlist::where('user_id', Auth::user()->id)->where('product_id', $id)->first();
            if ($check) {
                return response()->json(['error' => 'Product allready has on your wishlist!']);
            } else {
                $data = new Wishlist();
                $data->user_id = Auth::user()->id;
                $data->product_id = $id;
                $data->save();
                return response()->json(['success' => 'Successfully Added To Wishlist']);
            }
        } else {
            return response()->json(['error' => 'At first login your account!']);
        }
    }

    public function wishlistCount(){
        $data = Wishlist::where('user_id', Auth::user()->id)->count();
        return response()->json($data);
        
    }

    //////////////////////add to cart
    public function addToCart($id)
    {
        $product = Product::findOrFail($id);
          
        $cart = session()->get('cart', []);
  
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {

            if($product->discount_price == 0){
                $cart[$id] = [
                "name" => $product->product_name,
                "quantity" => 1,
                "price" => $product->selling_price,
                "image" => $product->default_image
            ];

            }else{
                $cart[$id] = [
                "name" => $product->product_name,
                "quantity" => 1,
                "price" => $product->discount_price,
                "image" => $product->default_image

             ];
            }
            
        }
          
        session()->put('cart', $cart);
        // return redirect()->back()->with('message','Product Added To Cart Successfully');
        return response()->json(['success' => 'Successfully Added To Cart']);
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function update(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
            return response()->json(['success' => 'Cart updated successfully']);
        }
    }

    public function cartData()
    {
        $data = session()->get('cart');
        return response()->json($data);
    }

    public function orderEmail()
    {
        return view('emails.order');
    }

    public function cartCount(){
        $data = count((array) session('cart'));
        return response()->json($data);
    }

    public function cartTotal(){
        $data = 0;
        if(session('cart'))
            foreach(session('cart') as $id => $details){
                $data += $details['price'] * $details['quantity'];
            }
            return response()->json($data);
        }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
            return response()->json(['success' => 'Product removed successfully']);
        }
    }
    /////////////////////////////add to cart end
}
