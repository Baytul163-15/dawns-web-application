@extends('backend.layouts.master')
@section('title','Order Details')
@section('content')
<div id="content" class="content">
    <ol class="breadcrumb float-xl-right">
        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
        <li class="breadcrumb-item">Order</li>
        <li class="breadcrumb-item active">Order Details</li>
    </ol>
    <h1 class="page-header">Order</h1>
    <div class="row">
        <div class="col-12">
            <div class="panel panel-default">

                <div class="panel-heading">
                    <h4 class="panel-title">Order Details</h4>
                    <div class="panel-heading-btn">
                        <a href="{{url('admin/order/invoice')}}/{{$order->id}}" class="btn btn-primary"><i class="fa fa-pdf"></i> Generate Invoice</a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                        <!-- <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a> -->
                    </div>
                </div>
                <div class="panel-body table-responsive">
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="mb-3">Order Information :</h4>
                            <table class="table borderless table-striped">
                                <tr>
                                    <th style="width: 30%;">Name</th>
                                    <td>{{$order->name}}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>{{$order->email}}</td>
                                </tr>
                                <tr>
                                    <th>Mobile</th>
                                    <td>{{$order->mobile}}</td>
                                </tr>
                                <tr>
                                    <th>Address</th>
                                    <td>{{$order->address}}</td>
                                </tr>
                                {{-- <tr>
                                    <th>District</th>
                                    <td>{{$divisions->division_name}}</td>
                                </tr> --}}
                                {{-- <tr>
                                    <th>Area</th>
                                    <td>{{$districts->district_name}}</td>
                                </tr> --}}
                                {{-- <tr>
                                    <th>Delivery Date</th>
                                    <td>{{$order->delivery_date}}</td>
                                </tr>
                                <tr>
                                    <th>Delivery Type</th>
                                    @if($order->delivery_type=='1')
                                        <td>Regular Delivery</td>
                                        @else
                                        <td>Urgent Delivery (3 hours)</td>
                                    @endif
                                </tr> --}}
                            </table>
                        </div>
                        <div class="col-md-6">
                            <h4 class="mb-3">Payment Details :</h4>
                            <table class="table borderless table-striped">
                                <tr>
                                    <th>Payment Method</th>
                                    <td>{{$order->payment_method}}</td>
                                </tr>
                                <tr>
                                    <th>Transaction ID</th>
                                    <td>{{$order->transaction_id}}</td>
                                </tr>
                                <tr>
                                    <th>Amount Paid</th>
                                    <td>{{$order->paying_amount}}</td>
                                </tr>
                                <tr>
                                    <th>Discount</th>
                                    <td>{{$order->coupon_discount}}</td> 
                                </tr>
                                <tr>
                                    <th>Order Total</th>
                                    <td>{{$order->subtotal}}</td>
                                </tr>
                                <tr>
                                    <th>Delivery Charge</th>
                                    <td>{{$order->shipping_charge}}</td> 
                                </tr>
                                <tr>
                                    <th>Grand Total</th>
                                    <td>{{$order->total}}</td>
                                </tr>
                                                              
                                
                                <tr>
                                    <th>Date</th>
                                    <td> {{ \Carbon\Carbon::parse($order->created_at)->format('d M Y')}}</td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td>
                                        @if($order->status == 0)
                                        <span class="badge badge-warning">Pending</span>
                                        @elseif($order->status == 1)
                                        <span class="badge badge-info">Payment Accept</span>
                                        @elseif($order->status == 2)
                                        <span class="badge badge-info">Progress Delivery</span>
                                        @elseif($order->status == 3)
                                        <span class="badge badge-success">Delivered</span>
                                        @elseif($order->status == 4)
                                        <span class="badge badge-danger">Cancel</span>
                                        @endif
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="row mt-5">
                        <div class="col">
                            <h4 class="mb-3">Products :</h4>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-td-valign-middle">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                             <th class="text-nowrap">Image</th>
                                            {{--<th class="text-nowrap">Code</th> --}}
                                            <th class="text-nowrap">Name</th>
                                            {{-- <th class="text-nowrap">Color</th>
                                            <th class="text-nowrap">Size</th> --}}
                                            <th class="text-nowrap">Qty</th>
                                            <th class="text-nowrap">Price</th>
                                            <th class="text-nowrap">Subtotal</th>

                                        </tr>
                                    </thead>
                                    <tbody>


                                       

                                        @foreach($orders as $row)
                                        <tr class="odd gradeX">
                                            <td>{{$loop->iteration}}</td>
                                            <td><img style="width: 40px;" src="{{asset($row->product_image)}}" alt="image"></td>
                                            <td>{{$row->product_name}}</td>
                                            {{-- <td>{{$row->product_id}}</td> --}}
                                            <td>{{$row->qty}}</td>
                                            <td>{{$row->singleprice}}</td>
                                            <td>{{$row->qty*$row->singleprice}}</td>
                                        </tr>
                                        @endforeach

                                       
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row my-4">
                        @if($order->status == 0)
                        <div class="col-md-6">
                            <a id="order_status"  href="{{route('order.payment.cancel',$order->id)}}" class="btn btn-danger btn-block"><i class="fa fa-times"></i> Cancel</a>
                        </div>
                        <div class="col-md-6">
                            <a id="order_status" href="{{route('order.payment.accept',$order->id)}}" class="btn btn-info btn-block"><i class="fa fa-check"></i> Payment Accept</a>
                        </div>
                        @elseif($order->status == 1)
                        <div class="col-md-6">
                            
                        </div>
                        <div class="col-md-6">
                            <a id="order_status"  href="{{route('order.delivery.progress',$order->id)}}" class="btn btn-primary btn-block"><i class="fa fa-check"></i> Progress Delivery</a>
                        </div>
                        @elseif($order->status == 2)
                        <div class="col-md-6">

                        </div>
                        <div class="col-md-6">
                            <a id="order_status"  href="{{route('order.delivery.done',$order->id)}}" class="btn btn-success btn-block"><i class="fa fa-check"></i> Delivery Done</a>
                        </div>
                        @elseif($order->status == 3)
                        <div class="col">
                             <div class="alert alert-success  text-center"  style="font-size: 16px;">This Product are successfully Delivered</div>
                        </div>
                        @elseif($order->status == 4)
                        <div class="alert alert-danger">This product are not valid, It's Canceled !</div>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection