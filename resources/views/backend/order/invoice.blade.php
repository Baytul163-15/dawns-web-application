<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dawn Stationery</title>
    <style>
        body{
            background-color: #F6F6F6; 
            margin: 0;
            padding: 0;
        }
        h1,h2,h3,h4,h5,h6{
            margin: 0;
            padding: 0;
        }
        p{
            margin: 0;
            padding: 0;
        }
        .container{
            width: 80%;
            margin-right: auto;
            margin-left: auto;
        }
        .brand-section{
           background-color: #eeeeee;
           padding: 10px 40px;
       }
       .logo{
        width: 50%;
    }

    .row{
        display: flex;
        flex-wrap: wrap;
    }
    .col-6{
        width: 50%;
        flex: 0 0 auto;
    }
    .text-white{
        color: #fff;
    }
    .company-details{
        float: right;
        text-align: right;
    }
    .body-section{
        padding: 16px;
        border: 1px solid #eeeeee;
    }
    .heading{
        font-size: 20px;
        margin-bottom: 08px;
    }
    .sub-heading{
        color: #262626;
        margin-bottom: 05px;
    }
    table{
        background-color: #fff;
        width: 100%;
        border-collapse: collapse;
    }
    table thead tr{
        background-color: #f2f2f2;
    }
    table td {
        vertical-align: middle !important;
        text-align: center;
    }
    table th, table td {
        padding-top: 08px;
        padding-bottom: 08px;
    }
    .text-right{
        text-align: end;
    }
    .w-20{
        width: 20%;
    }
    .float-right{
        float: right;
    }
</style>
<style type="text/css">
    .styled-table {
        border-collapse: collapse;
        margin: 25px 0;
        font-size: 0.9em;
        font-family: sans-serif;
        min-width: 400px;
        /*box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);*/
    }
    .styled-table thead tr {
        background-color: #009879;
        color: #ffffff;
        text-align: left;
    }
    .styled-table th,
    .styled-table td {
        padding: 12px 15px;
    }
    .styled-table tbody tr {
        border-bottom: 1px solid #dddddd;
    }

    .styled-table tbody tr:nth-of-type(even) {
        background-color: #f3f3f3;
    }

    .styled-table tbody tr:last-of-type {
        border-bottom: 2px solid #009879;
    }
    .styled-table tbody tr.active-row {
        font-weight: bold;
        color: #009879;
    }
    .text-90.order-first .col-5 {
        text-align: right;
    }
    .text-secondary-d1 {
        padding-right: 15px;
    }
</style>
</head>
<body>

    <div class="container">
        <div class="brand-section">
            <div class="row" style="width: 100%; text-align: center;display: block;margin-top: 10px;">
                {{-- <div class="col-6"> --}}
                    <a href="{{ url('/') }}" style="text-align: center;">
                        <img alt="Dawn-Stationery" src="{{ asset('theme/epharma/img/DAWN APP LOGO.png')}}" height="50">
                    </a>
                {{-- </div> --}}
                {{-- <div class="col-6">
                    <div class="company-details">
                        <p class="text-white">assdad asd  asda asdad a sd</p>
                        <p class="text-white">assdad asd asd</p>
                        <p class="text-white">+91 888555XXXX</p>
                    </div>
                </div> --}}
            </div>
        </div>

        <div class="body-section">
            <div class="row">
                <table width="100%">
                    <tr>
                        <td width="50%" style="text-align: left;">
                            <div> 
                                <span class="text-sm text-grey-m2 align-middle">To:</span> <span class="text-600 text-110 text-blue align-middle">{{ session('name') }}</span>
                                <div class="text-grey-m2"> 
                                    <div class="my-1">Mobile: {{$order->mobile}}</div>
                                    <div class="my-1">Email: {{$order->email}}</div>
                                    <div class="my-1">Address: {{$order->address}}</div>s
                                </div>
                            </td>
                            <td width="50%" style="text-align: right;">
                                <div class="mt-1 mb-2 text-secondary-m1 text-600 text-125"> Invoice</div>
                                <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">ID:</span> #{{$order->id}}
                                </div>
                                <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">Issue Date:</span> {{ date('l F Y') }}
                                </div>
                                <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">Status:</span>@if($order->status == 0)
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
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="body-section">
                <h5 class="heading" style="color: #333">Ordered Items</h5>
                <table class="styled-table">
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
                                            <td>{{$row->product->product_name}}</td>
                                            {{-- <td>{{$row->product_id}}</td> --}}
                                            <td>{{$row->qty}}</td>
                                            <td>{{$row->singleprice}}</td>
                                            <td>{{$row->qty*$row->singleprice}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot> 
                                        <tr>
                                            <td colspan="2"></td>
                                            <td class="text-center">Discount</td>
                                            <td colspan="2"></td>
                                            <td style="text-align: center;">{{$order->coupon_discount}} tk</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2"></td>
                                            <td class="text-center">Subtotal</td>
                                            <td colspan="2"></td>
                                            <td style="text-align: center;">{{$order->subtotal}} tk</td>
                                        </tr>
                                    </tfoot>
                                </table>
                                <br> 
                                <table width="100%"> 
                                    <tr>
                                        <td width="50%" style="text-align: left;">
                                            Payment Method: {{$order->payment_method}}<br>
                                            Paid Amount: {{$order->paying_amount}} tk<br>
                                            Transaction ID: {{$order->transaction_id}}
                                        </td>
                                        <td width="50%" style="text-align: right;">
                                            Discount: {{$order->coupon_discount}} tk<br>
                                            Subtotal: {{$order->subtotal}} tk<br>
                                            Delivery Charge: {{$order->shipping_charge}} tk<br>                                         
                                            Grand Total: {{$order->total}} tk
                                        </td>
                                    </tr>
                                </table>
                            </div>

                            <div class="body-section" style="text-align: center;">
                                <p>Copyright &copy; {{ date('Y') }} - Dawn Stationery. All rights reserved.
                                </p>
                            </div>      
                        </div>      

                    </body>
                    </html>