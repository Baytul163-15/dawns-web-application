<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Shipping;
use App\Models\Division;
use App\Models\District;
use App\User;
use PDF;

class OrderController extends Controller
{
    public function pending()
    {
        $data['data'] = Order::where('status', 0)->orderBy('id','DESC')->latest()->get();
        return view('backend.order.pending', $data);
    }

    public function orderAccept()
    {
        $data['data'] = Order::where('status', 1)->latest()->get();
        return view('backend.order.accept',$data);
    }
    public function progressDelivery()
    {
        $data['data'] = Order::where('status', 2)->latest()->get();
        return view('backend.order.progress-delivery',$data);
    }
    public function successDelivery()
    {
        $data['data'] = Order::where('status', 3)->latest()->get();
        return view('backend.order.success-delivery',$data);
    }
    public function orderCancel()
    {
        $data['data'] = Order::where('status', 4)->latest()->get();
        return view('backend.order.cancel',$data);
    }

    public function details($id)
    {
        $user_id = Order::find($id)->user_id;
        $data['user'] = User::where('id', $user_id)->first();
        $data['orders'] = OrderDetail::where('order_id', $id)->get();
        $orders = OrderDetail::where('order_id', $id)->get();
        $data['order'] = Order::where('id', $id)->first();
        $orderd = Order::where('id', $id)->first();
        $data['shipping'] = Shipping::where('order_id', $id)->first();
        $divisions = Division::where('id', $orderd->district)->first();
        $districts = District::where('id', $orderd->area)->first();

        return view('backend.order.details', $data, compact('orders','divisions','districts'));
    }

    public function invoice($id)
    {   
        $user_id = Order::find($id)->user_id;
        $data['user'] = User::where('id', $user_id)->first();
        $data['orders'] = OrderDetail::where('order_id', $id)->get();
        // $orders = OrderDetail::where('order_id', $id)->get();
        $data['order'] = Order::where('id', $id)->first();
        // $data['orderd'] = Order::where('id', $id)->first();
        $data['shipping'] = Shipping::where('order_id', $id)->first();
        // $divisions = Division::where('id', $orderd->district)->first();
        // $districts = District::where('id', $orderd->area)->first();

        // $data = [
        //     'user' => $user,
        //     'orders' => $orders,
        //     'order' => $order,
        //     'orderd' => $orderd,
        //     'shipping' => $shipping,
        //     'divisions' => $divisions,
        //     'districts' => $districts
        // ];
        $pdf = PDF::loadView('backend.order.invoice', $data);

        return $pdf->download('invoice.pdf');

        // return view('backend.order.invoice', $data, compact('orders','divisions','districts'));
    }

    public function paymentAccept($id)
    {
        $order = Order::find($id);
        $order->status = 1;
        $order->save();
        $notification = array(
            'message' => 'Successfully Send To Progress Delivery!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
    public function paymentCancel($id)
    {
        $order = Order::find($id);
        $order->status = 4;
        $order->save();
        $notification = array(
            'message' => 'Payment Canceled!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
    public function deliveryProgress($id)
    {
        $order = Order::find($id);
        $order->status = 2;
        $order->save();
        $notification = array(
            'message' => 'Successfully Send To Delivery!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
    public function deliveryDone($id)
    {
        $order = Order::find($id);
        $order->status = 3;
        $order->save();
        $notification = array(
            'message' => 'Delivery Done!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

}
