<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Shipping;
use Auth;
use App\Models\Payment;
use App\Models\Order;
use App\Models\OrderDetail;
use Cart;
use Session;

use Illuminate\Support\Facades\Mail;
use App\Mail\PlaceorderMailable;

class PaymentController extends Controller
{   
    public function placeorderMailable($request)
    {
        $order_data = [
            'name' => $request->input('billing_name'),
            'phone' => $request->input('billing_phone'),
            'email' => $request->input('billing_email'),
            'address' => $request->input('billing_address'),
        ];

        $cart = session()->get('cart');
        $items_in_cart = json_encode($cart, true);

        $to_customer_email = $request->input('billing_email');
        Mail::to($to_customer_email)->send(new PlaceorderMailable($order_data, $items_in_cart));
    }
    public function paymentProcess(Request $request)
    {   
        // $validatedData = $request->validate([
        //     'payment_method' => 'required',
        // ]);

        // $payment = new Payment();
        // $payment->payment_method = $request->payment_method;
        // $payment->transaction_no = $request->transaction_no;
        // $payment->save();

        $order = new Order();
        // $shippingId = Session::get('shippingId');
        if(!empty(Auth::user()->id)){
            $user_id = Auth::user()->id;
        }else{
            $user_id = 1;
        }
        $order->user_id = $user_id;
        $order->name = $request->billing_name;
        $order->mobile = $request->billing_mobile;
        $order->address = $request->billing_address;
        $order->email = $request->billing_email;
        $order->district = $request->billing_district;
        $order->area = $request->billing_area;
        $order->delivery_date = $request->billing_delivery_date;
        $order->delivery_type = $request->billing_delivery_type;
        $order->payment_method = $request->payment_method;
        $order->number = $request->number;
        $order->paying_amount = $request->amount;
        $order->transaction_id = $request->transaction_id;
        $order->card_order_id = 1;
        $order->subtotal = $request->order_total;
        $order->shipping_charge = $request->delivery_charge;
        $order->vat = 0;
        $order->coupon_discount = $request->coupon_discount;
        $order->total = $request->order_total+$request->delivery_charge;
        $order->notes = $request->notes;
        $order->date = date('d');
        $order->month = date('m');
        $order->year = date('Y');
        $order->status = 0;
        
        
        $request->session()->put('coupon_discount',$request->coupon_discount);
        $request->session()->put('name',$request->billing_name);
        $request->session()->put('email',$request->billing_email);
        $request->session()->put('mobile',$request->billing_mobile);
        // $request->session()->put('district',$request->billing_district);
        $request->session()->put('address',$request->billing_address);
        // $request->session()->put('area',$request->billing_area);
        $request->session()->put('paying_amount',$request->amount);
        $request->session()->put('grand_total',$request->order_total+$request->delivery_charge);
        $request->session()->put('payment_method',$request->payment_method);
        $request->session()->put('transaction_id',$request->transaction_id);
        $request->session()->put('delivery_charge',$request->delivery_charge);

        /*Order Number*/
        // $orderData = Order::orderBy('id','desc')->first();
        // if($orderData == null){
        //     $firstReg = '0';
        //     $order_no = $firstReg+1;
        // }else{
        //     $orderData = Order::orderBy('id','desc')->first()->order_no;
        //     $order_no = $orderData+1;
        // }
        // $order->order_no = $order_no;
        // $order->status = 0;
        $order->save();
        $order_id = $order->id;
        $request->session()->put('id',$order_id);

        $total = 0;
        if(!empty(session('cart'))){
            foreach(session('cart') as $id => $details){
                $total += $details['price'] * $details['quantity'];
            }
            foreach(session('cart') as $id => $details){
                $orderDetails = new OrderDetail();
                $orderDetails->order_id = $order_id;
                $orderDetails->product_id = $id;
                $orderDetails->product_name = $details['name'];
                $orderDetails->product_image = $details['image'];
                $orderDetails->qty = $details['quantity'];
                $orderDetails->singleprice = $details['price'];
                $orderDetails->totalprice = $details['quantity']*$details['price'];
                $orderDetails->save();
            }
        }

        

        // Cart::destroy();
        // $notification = array(
        //     'message' => 'Successfully order has been submited..',
        //     'alert-type' => 'success'
        // );
        // return redirect()->route('user.orders')->with($notification);
        $this->placeorderMailable($request);
        /////// send mail to admin start
        $data = array('name'=>"Dawn eCommerce");
        Mail::send('emails.order', $data, function($message) {
            $message->to('jabedakhter@gmail.com', 'Stationery Shop')->subject('New Order Received');
            $message->from('webmail@dawnsapps.com','Stationery Shop');
        });
        // echo "Confirmation Email Sent. Check your inbox.";
        /////// send mail to admin end
        $cart = session()->get('cart');
        if(isset($cart)) {
            Session::forget('cart');
        }
        
        if(Session::has('coupon')){
           Session::forget('coupon');
         }
         
        return redirect()->to('/')->with('message','Your order has been confirmed... Check your email... Thank you...');
        if(!empty(session('coupon_discount'))) { Session::forget('coupon_discount'); }
        if(!empty(session('name'))) { Session::forget('name'); }
        if(!empty(session('email'))) { Session::forget('email'); }
        if(!empty(session('mobile'))) { Session::forget('mobile'); }
        // if(!empty(session('district'))) { Session::forget('district'); }
        if(!empty(session('address'))) { Session::forget('address'); }
        // if(!empty(session('area'))) { Session::forget('area'); }
        if(!empty(session('paying_amount'))) { Session::forget('paying_amount'); }
        if(!empty(session('grand_total'))) { Session::forget('grand_total'); }
        if(!empty(session('payment_method'))) { Session::forget('payment_method'); }
        if(!empty(session('transaction_id'))) { Session::forget('transaction_id'); }
        if(!empty(session('delivery_charge'))) { Session::forget('delivery_charge'); }
    }
    public function stripeCharge(Request $request)
    {


        \Stripe\Stripe::setApiKey('sk_test_51IRtnOCYitchOLcaejRaLPEJ8VkMp3SoVsY0lFyEHXEII8fvjd3Zb7zeBNTK1xC54TqU7zz35XqytrKUlPNfVkz2005w7pmay9');

        $token = $_POST['stripeToken'];

        $charge = \Stripe\Charge::create([
            'amount' => $request->total*100,
            'currency' => 'usd',
            'description' => 'N/A',
            'source' => $token,
            'metadata' => ['order_id' => uniqid()],
        ]);

        //Orders
        $order = new Order();
        $order->user_id             = Auth::user()->id;
        $order->payment_method      = $charge->payment_method;
        $order->payment_type        = $request->payment_type;
        $order->paying_amount       = $charge->amount/100;
        $order->balance_transaction = $charge->balance_transaction;
        $order->card_order_id       = $charge->metadata->order_id;
        $order->subtotal            = Cart::subtotalFloat();
        $order->shipping_charge     = $request->shipping_charge;
        $order->vat                 = $request->vat;
        $order->coupon_discount     = $request->coupon_discount;
        $order->total               = $request->total;
        $order->date                = date('Y-m-d');
        $order->month               = date('Y-m');
        $order->year                = date('Y');
        $order->save();

        //Shipping
        $shipping = new Shipping();
        $shipping->order_id      = $order->id;
        $shipping->name          = $request->name;
        $shipping->email         = $request->email;
        $shipping->phone         = $request->phone;
        $shipping->division_id   = $request->division_id;
        $shipping->district_id   = $request->district_id;
        $shipping->address       = $request->address;
        $shipping->save();
        
        //Order Details
        foreach(Cart::content() as $row){
            $orderDetails = new OrderDetail();
            $orderDetails->order_id       = $order->id;
            $orderDetails->product_id     = $row->id;
            $orderDetails->type_id       = $row->options->type_id;
            $orderDetails->size_id        = $row->options->size_id;
            $orderDetails->qty            = $row->qty;
            $orderDetails->singleprice    = $row->price;
            $orderDetails->totalprice     = $row->total;
            $orderDetails->save();
        }

         Cart::destroy();
        if(Session::has('coupon')){
            Session::forget('coupon');
        }
        $notification = array(
            'message' => 'Your order has been submited!',
            'alert-type' => 'success'
        );
        return redirect()->route('user.dashboard')->with($notification);

    }

    public function tracking(Request $request){
        $order_no = $request->order_no;
        $data['order'] = Order::where('card_order_id',$order_no)->first();
        $data['orders'] = OrderDetail::where('order_id', $data['order']->id)->get();
        return view('frontend.tracking',$data);
        
    }
}