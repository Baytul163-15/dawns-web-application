@extends('frontend.layouts.master')
@section('title','Checkout')
@section('content')

<style>
    
    .btn{
        margin-bottom: 10px;
    }
</style>

<div role="main" class="main" id="checkout_mobile_main">
    @php $total = 0 @endphp
    @if(session('cart'))
        @foreach(session('cart') as $id => $details)
            @php $total += $details['price'] * $details['quantity'] @endphp
        @endforeach
    @endif
    <div class="checkout">
        <form method="POST" action="{{route('payment.process')}}" accept-charset="UTF-8" id="onepagecheckout_orderform" autocomplete="off">@csrf
            <div class="container">
                <h1 class="h2 heading-primary mt-lg mb-md clearfix">
                    Checkout
                </h1>
                <div class="checkout-menu clearfix">
                    <span id="returning">Returning Customer? <a style="font-weight: bold" href="{{route('user.login')}}">Click here to login</a></span>
                    <div class="dropdown pull-right checkout-review-dropdown">
                        <button class="btn btn-success mb-sm" id="reviewTable" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: #fff;
                        background-color: #08c;
                        border-color: #08c #08c #069;">
                        <i class="fa fa-shopping-cart"></i>
                        {{ $total }}৳</span>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="reviewTable">
                        <h3>Review Your Order</h3>
                        <table>
                            <thead>
                                <tr>
                                    <th class="hidden-xs">Image</th>
                                    <th>Product Name</th>
                                    <th class="text-center">Qty</th>
                                    <th class="text-right">Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $total = 0 @endphp
                                @if(session('cart'))
                                    @foreach(session('cart') as $id => $details)
                                        @php $total += $details['price'] * $details['quantity'] @endphp
                                <tr>
                                    <td class="hidden-xs class text-center">
                                        <a href="https://epharma.com.bd/product/140092" title="{{$details['name']}}">
                                            <img src="{{asset($details['image'])}}" width="30" height="50" alt="">
                                        </a>
                                    </td>
                                    <td>
                                        {{$details['name']}}<br>
                                        <strong>{{$details['price']}}৳</strong>
                                    </td>
                                    <td class="text-center">{{$details['quantity']}}</td>
                                    <td class="text-right">{{ $details['price'] * $details['quantity'] }}৳</td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                            <tfoot>
                                <tr>
                                    {{-- <td class="text-left hidden-xs">Saved Amount</td>
                                    <td class="text-left"><span class="hidden-lg hidden-md hidden-sm">Saved Amount&nbsp;&nbsp;</span>৳23.30</td> --}}
                                    <td></td>
                                    <td class="text-center">Subtotal</td>
                                    <td></td>
                                    <td class="text-right" >{{ $total }}৳</td>
                                </tr>
                            </tfoot>
                        </table>
                        @if($total = 0)
                        <div class="text-center empty-cart" style="height:100%;">
                            <h3>No product on your cart</h3>
                        </div>
                        @endif
                    </div>
                </div> 
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <div class="featured-box featured-box-primary featured-box-flat featured-box-text-left mt-md">
                        <div class="box-content">
                            <div class="form-col">
                                <h3><a>DELIVERY DETAILS</a></h3>
                                <div class="row">
                                    <div class="col-xs-12 col-md-6">
                                        <div class="form-group">
                                            <label>Name<span class="required">*</span></label>
                                            @guest
                                            <input type="text" name="billing_name" value="" title="User Name" class="form-control">
                                            @else
                                            <input type="text" name="billing_name" value="{{ Auth::user()->name }}" title="User Name" class="form-control">
                                            @endguest
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-6">
                                        <div class="form-group">
                                            <label>Mobile<span class="required">*</span></label>
                                            @guest
                                            <input type="text" name="billing_mobile" value="" title="Mobile" class="form-control mobile_number" placeholder="880">
                                            @else
                                            <input type="text" name="billing_mobile" value="" title="Mobile" class="form-control mobile_number" placeholder="880">
                                            @endguest
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-md-12">
                                        <div class="form-group wide">
                                            <label>Address<span class="required">*</span></label>
                                            @guest
                                            <input id="billing" type="text" class="form-control" name="billing_address" value="" placeholder="Apartment, house, road, area etc.">
                                            @else
                                            <input id="billing" type="text" class="form-control" name="billing_address" value="{{ Auth::user()->address }}" placeholder="Apartment, house, road, area etc.">
                                            @endguest
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-md-12">
                                        <div class="form-group wide" >
                                            <label >Email Address</label>
                                            @guest
                                            <input type="text" name="billing_email" value="" title="Email Address" class="form-control email_address" required="" />
                                            @else
                                            <input type="text" name="billing_email" value="{{ Auth::user()->email }}" title="Email Address" class="form-control email_address"  />
                                            @endguest
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-6 col-md-6">
                                        <div class="form-group">
                                            <label>District<span class="required">*</span></label>
                                            {{-- <select id="billing_region_id" class="form-control select2" name="billing_district"><option value="1">Dhaka</option><option value="2">Faridpur</option><option value="3">Gazipur</option><option value="4">Gopalganj</option><option value="5">Jamalpur</option><option value="6">Kishoreganj</option><option value="7">Madaripur</option><option value="8">Manikganj</option><option value="9">Munshiganj</option><option value="10">Mymensingh</option><option value="11">Narayanganj</option><option value="12">Narsingdi</option><option value="13">Netrokona</option><option value="14">Rajbari</option><option value="15">Shariatpur</option><option value="16">Sherpur</option><option value="17">Tangail</option><option value="18">Bogra</option><option value="19">Joypurhat</option><option value="20">Naogaon</option><option value="21">Natore</option><option value="22">Nawabganj</option><option value="23">Pabna</option><option value="24">Rajshahi</option><option value="25">Sirajgonj</option><option value="26">Dinajpur</option><option value="27">Gaibandha</option><option value="28">Kurigram</option><option value="29">Lalmonirhat</option><option value="30">Nilphamari</option><option value="31">Panchagarh</option><option value="32">Rangpur</option><option value="33">Thakurgaon</option><option value="34">Barguna</option><option value="35">Barisal</option><option value="36">Bhola</option><option value="37">Jhalokati</option><option value="38">Patuakhali</option><option value="39">Pirojpur</option><option value="40">Bandarban</option><option value="41">Brahmanbaria</option><option value="42">Chandpur</option><option value="43">Chittagong</option><option value="44">Comilla</option><option value="45">Cox&#039;s Bazar</option><option value="46">Feni</option><option value="47">Khagrachari</option><option value="48">Lakshmipur</option><option value="49">Noakhali</option><option value="50">Rangamati</option><option value="51">Habiganj</option><option value="52">Maulvibazar</option><option value="53">Sunamganj</option><option value="54">Sylhet</option><option value="55">Bagerhat</option><option value="56">Chuadanga</option><option value="57">Jessore</option><option value="58">Jhenaidah</option><option value="59">Khulna</option><option value="60">Kushtia</option><option value="61">Magura</option><option value="62">Meherpur</option><option value="63">Narail</option><option value="64">Satkhira</option><option value="65">Savar</option><option value="66">Keraniganj</option><option value="67">Dhamrai</option><option value="68">Demra</option><option value="69">Fatullah</option><option value="70">Shutrapur</option><option value="71">Shonir Akhra</option><option value="72">Jatrabari</option></select> --}}
                                            <select class="form-control form-control-sm m-0" name="billing_district" id="division_id" class="required">
                                            <option value="">Select District</option>
                                            @foreach($divisions as $division)
                                            <option value="{{$division->id}}" {{ old('division_id') == $division->id ? 'selected' : '' }}>{{$division->division_name}}</option>
                                            @endforeach
                                        </select>
                                        <div style='color:red; padding: 0 5px;'>{{($errors->has('division_id'))?($errors->first('division_id')):''}}</div>
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-md-6" id="area-div">
                                        <div class="form-group">
                                            <label>Area<span class="required">*</span></label>
                                            {{-- <select id="billing_area_id" class="form-control select2" name="billing_area"><option value="228">Abdullahpur</option><option value="229">Adabor</option><option value="230">Aftab Nagar</option><option value="231">Agargaon</option><option value="232">Airport</option><option value="233">Arambagh</option><option value="234">Asadgate</option><option value="235">Ashkona</option><option value="236">Azimpur</option><option value="237">Badda</option><option value="238">Baily Road</option><option value="239">Banani</option><option value="240">Banasree</option><option value="241">Bangshal</option><option value="242">Baridhara</option><option value="243">Baridhara DOHS</option><option value="244">Bashabo</option><option value="245">Bashundhara</option><option value="246">Bhashantek</option><option value="247">Bijoy Nagar</option><option value="248">Bijoy Sharani</option><option value="249">Cantonment Dhaka</option><option value="250">Madartek</option><option value="251">Chakbazar</option><option value="252">Darussalam</option><option value="253">Daskhinkhan</option><option value="255">Dhaka University</option><option value="256">Dhanmondi</option><option value="257">Dilkusha</option><option value="258">Elephant Road</option><option value="259">Eskaton</option><option value="260">Farmgate</option><option value="261">Gabtoli</option><option value="262">Gandaria</option><option value="263">Golapbag</option><option value="264">Gopibag</option><option value="266">Green Road</option><option value="267">Gulistan</option><option value="268">Gulshan</option><option value="269">Gulshan 2</option><option value="270">Hatirpool</option><option value="271">Hazaribag</option><option value="272">Ibrahimpur</option><option value="273">Indira road</option><option value="275">Jigatola</option><option value="276">Joar Shahara</option><option value="277">Kachukhet</option><option value="279">Kafrul</option><option value="280">Kakrail</option><option value="281">Kalabagan</option><option value="282">Kallyanpur</option><option value="283">Kalshi</option><option value="284">Kamlapur</option><option value="285">Karwan bazar</option><option value="286">Katabon</option><option value="287">Kathalbagan</option><option value="288">Kazipara</option><option value="289">Khilgaon</option><option value="290">Khilkhet</option><option value="291">Kolabagan</option><option value="292">Kotwali</option><option value="293">Kuril</option><option value="294">Kurmitola</option><option value="295">Lalbag</option><option value="296">Lalmatia</option><option value="297">Malibagh</option><option value="298">Manikdey</option><option value="299">Maniknagar</option><option value="300">Merul Badda</option><option value="301">Mirpur</option><option value="302">Mirpur 1</option><option value="303">Mirpur 10</option><option value="304">Mirpur 11</option><option value="305">Mirpur 12</option><option value="306">Mirpur 14</option><option value="307">Mirpur 2</option><option value="308">Mirpur DOHS</option><option value="309">Moghbazar</option><option value="310">Mohakhali</option><option value="311">Mohakhali DOHS</option><option value="312">Mohammadpur</option><option value="313">Monipur</option><option value="314">Monipuri para</option><option value="315">Motijheel</option><option value="316">Mugda</option><option value="317">Nawabpur</option><option value="318">Naya Paltan</option><option value="319">New Market</option><option value="320">Niketon</option><option value="321">Nikunja 1</option><option value="322">Nikunja 2</option><option value="323">Notun Bazar</option><option value="324">Paikpara</option><option value="325">Pallabi</option><option value="326">Panthapath</option><option value="327">Paribagh</option><option value="328">Pirerbag</option><option value="329">Purana Paltan</option><option value="330">Ramna</option><option value="331">Cantonment Mirpur</option><option value="332">Rampura</option><option value="333">Rayer bagh</option><option value="334">Raza Bazar</option><option value="335">Razarbagh</option><option value="336">Rupnagar</option><option value="337">Sabujbag</option><option value="338">Shah Ali Bag</option><option value="339">Shahbag</option><option value="340">Shaheen Bagh</option><option value="341">Shahjahanpur</option><option value="342">Shamoli</option><option value="343">Shantinagar</option><option value="344">Shekertek</option><option value="345">Sherebanglanagar</option><option value="346">Shewrapara</option><option value="347">Shukrabd</option><option value="348">Shyampur</option><option value="349">Siddheswari</option><option value="350">Sobhanbag</option><option value="351">South Badda</option><option value="353">Taltola</option><option value="354">Tejgaon</option><option value="355">Banani DOHS</option><option value="356">Tejkuni para</option><option value="357">Uttar Badda</option><option value="358">Uttara</option><option value="359">Uttarkhan</option><option value="360">Vatara</option><option value="361">Wari</option><option value="362">Mirpur 13</option><option value="363">Manikdi</option><option value="364">Kurmitola</option><option value="365">Banglamotor</option><option value="366">Bakshi Bazar</option></select> --}}
                                            <select class="form-control form-control-sm m-0" name="billing_area" id="district_id" class="required">
                                            <option value="">Select Area</option>
                                        </select>
                                        <div style='color:red; padding: 0 5px;'>{{($errors->has('district_id'))?($errors->first('district_id')):''}}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" id="dalivery-time">
                                    {{-- <div class="col-xs-12 col-md-6">
                                        <div class="form-group">
                                            <label>Delivery Date</label>
                                            <select name="billing_delivery_date" class="form-control" id="pickup_date">

                                                <option value="{{ date('Y-m-d') }}">{{ date('l, F d, Y') }}
                                                </option>
                                                <option value="{{ date('Y-m-d', strtotime('+1 days')) }}">{{ date('l, F d, Y', strtotime('+1 days')) }}
                                                </option>
                                                <option value="{{ date('Y-m-d', strtotime('+2 days')) }}">{{ date('l, F d, Y', strtotime('+2 days')) }}
                                                </option>
                                                <option value="{{ date('Y-m-d', strtotime('+3 days')) }}">{{ date('l, F d, Y', strtotime('+3 days')) }}
                                                </option>
                                                <option value="{{ date('Y-m-d', strtotime('+4 days')) }}">{{ date('l, F d, Y', strtotime('+4 days')) }}
                                                </option>
                                                <option value="{{ date('Y-m-d', strtotime('+5 days')) }}">{{ date('l, F d, Y', strtotime('+5 days')) }}
                                                </option>
                                                <option value="{{ date('Y-m-d', strtotime('+6 days')) }}">{{ date('l, F d, Y', strtotime('+6 days')) }}
                                                </option>
                                            </select>
                                        </div>
                                    </div> --}}
                                    {{-- <div class="col-xs-12 col-md-6">
                                        <div class="form-group">
                                            <label>Delivery Type</label>
                                            <select name="billing_delivery_type" class="form-control" id="pickup_time" onchange="myFunction(event)">
                                                <option value="1">Regular Delivery</option>
                                                <option value="2">Urgent Delivery(3 hours)</option>
                                            </select>
                                        </div>
                                    </div> --}}
                                </div>
                                @guest
                                <div class="checkbox mb-sm">
                                    <label>
                                        <input type="checkbox" name="billing[register_account]" value="1" title="Create an account for later use" id="billing_register_account" class="checkbox" />
                                        Create an account for later use
                                    </label>
                                </div>
                                <div class="row" id="register-customer-password" style="display: none;">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="billing:customer_password" class="required"> Password<span class="required">*</span> </label>
                                            <div class="data_area">
                                                <input type="password" name="billing[customer_password]" id="billing:customer_password" title="Password" class="form-control" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="billing:confirm_password" class="required"> Confirm Password<span class="required">*</span> </label>
                                            <div class="data_area">
                                                <input type="password" name="billing[confirm_password]" title="Confirm Password" id="billing:confirm_password" class="form-control" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class='clr'></div>
                                </div>
                                @endguest
                            </div>
                        </div>
                    </div>
                     

                    {{-- <div class="featured-box featured-box-primary featured-box-flat featured-box-text-left mt-md">
                        <div class="box-content">


                            <div class="form-group">
                                <div class="col-sm-8">
                                    <label>Coupon code</label>
                                    <form action="{{ route('apply.coupon') }}" method="POST">
                                       {{ csrf_field() }} 
                                    <input type="text" name="coupon" id="coupon" class="form-control" placeholder="Please enter your coupon code" />
                                
                                    <button style="margin-top: 30px;color: #fff;
                                    background-color: #08c;
                                    border-color: #08c #08c #069; display: inline;" type="submit" title="Apply coupon" class="btn btn-success pull-right">Apply coupon</button>
                                </form>
                                </div>
                            </div>
                            


                            
                            <div class="form-group">
                                <label>Order Notes</label>
                                <textarea name="order_comment" class="form-control" rows="3"></textarea>
                            </div>
                            <hr>
                            <div class="form-col" id="ship_address_block" style="display: none">
                                <h3>New Shipping Address</h3>
                                <div class="row">
                                    <div class="col-xs-12 col-md-6">
                                        <div class="form-group">
                                            <label>Name<span class="required">*</span></label>
                                            <input type="text" name="shipping[firstname]" value="" title="User Name" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-6">
                                        <div class="form-group">
                                            <label>Mobile</label>
                                            <input type="text" name="shipping[mobile]" value="" title="Mobile" class="form-control" placeholder="880">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-md-12">
                                        <div class="form-group wide">
                                            <label>Address<span class="required">*</span></label>
                                            <input type="text" class="form-control" name="shipping[address]" value="" placeholder="Apartment, house, road, area etc.">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-md-12">
                                        <div class="form-group wide">
                                            <label>Email Address<span class="required">*</span></label>
                                            <input type="text" name="shipping[email]" value="" title="Email Address" class="form-control" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-md-12">
                                        <div class="form-group">
                                            <label>District<span class="required">*</span></label>
                                            <select id="billing:region_id" class="form-control" name="shipping[district]"><option value="1">Dhaka</option><option value="2">Faridpur</option><option value="3">Gazipur</option><option value="4">Gopalganj</option><option value="5">Jamalpur</option><option value="6">Kishoreganj</option><option value="7">Madaripur</option><option value="8">Manikganj</option><option value="9">Munshiganj</option><option value="10">Mymensingh</option><option value="11">Narayanganj</option><option value="12">Narsingdi</option><option value="13">Netrokona</option><option value="14">Rajbari</option><option value="15">Shariatpur</option><option value="16">Sherpur</option><option value="17">Tangail</option><option value="18">Bogra</option><option value="19">Joypurhat</option><option value="20">Naogaon</option><option value="21">Natore</option><option value="22">Nawabganj</option><option value="23">Pabna</option><option value="24">Rajshahi</option><option value="25">Sirajgonj</option><option value="26">Dinajpur</option><option value="27">Gaibandha</option><option value="28">Kurigram</option><option value="29">Lalmonirhat</option><option value="30">Nilphamari</option><option value="31">Panchagarh</option><option value="32">Rangpur</option><option value="33">Thakurgaon</option><option value="34">Barguna</option><option value="35">Barisal</option><option value="36">Bhola</option><option value="37">Jhalokati</option><option value="38">Patuakhali</option><option value="39">Pirojpur</option><option value="40">Bandarban</option><option value="41">Brahmanbaria</option><option value="42">Chandpur</option><option value="43">Chittagong</option><option value="44">Comilla</option><option value="45">Cox&#039;s Bazar</option><option value="46">Feni</option><option value="47">Khagrachari</option><option value="48">Lakshmipur</option><option value="49">Noakhali</option><option value="50">Rangamati</option><option value="51">Habiganj</option><option value="52">Maulvibazar</option><option value="53">Sunamganj</option><option value="54">Sylhet</option><option value="55">Bagerhat</option><option value="56">Chuadanga</option><option value="57">Jessore</option><option value="58">Jhenaidah</option><option value="59">Khulna</option><option value="60">Kushtia</option><option value="61">Magura</option><option value="62">Meherpur</option><option value="63">Narail</option><option value="64">Satkhira</option><option value="65">Savar</option><option value="66">Keraniganj</option><option value="67">Dhamrai</option><option value="68">Demra</option><option value="69">Fatullah</option><option value="70">Shutrapur</option><option value="71">Shonir Akhra</option><option value="72">Jatrabari</option></select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" id="area-div">
                                    <div class="col-xs-12 col-md-12">
                                        <div class="form-group">
                                            <label>Area<span class="required">*</span></label>
                                            <select id="billing_area_id" class="form-control" name="shipping[area]"><option value="228">Abdullahpur</option><option value="229">Adabor</option><option value="230">Aftab Nagar</option><option value="231">Agargaon</option><option value="232">Airport</option><option value="233">Arambagh</option><option value="234">Asadgate</option><option value="235">Ashkona</option><option value="236">Azimpur</option><option value="237">Badda</option><option value="238">Baily Road</option><option value="239">Banani</option><option value="240">Banasree</option><option value="241">Bangshal</option><option value="242">Baridhara</option><option value="243">Baridhara DOHS</option><option value="244">Bashabo</option><option value="245">Bashundhara</option><option value="246">Bhashantek</option><option value="247">Bijoy Nagar</option><option value="248">Bijoy Sharani</option><option value="249">Cantonment Dhaka</option><option value="250">Madartek</option><option value="251">Chakbazar</option><option value="252">Darussalam</option><option value="253">Daskhinkhan</option><option value="255">Dhaka University</option><option value="256">Dhanmondi</option><option value="257">Dilkusha</option><option value="258">Elephant Road</option><option value="259">Eskaton</option><option value="260">Farmgate</option><option value="261">Gabtoli</option><option value="262">Gandaria</option><option value="263">Golapbag</option><option value="264">Gopibag</option><option value="266">Green Road</option><option value="267">Gulistan</option><option value="268">Gulshan</option><option value="269">Gulshan 2</option><option value="270">Hatirpool</option><option value="271">Hazaribag</option><option value="272">Ibrahimpur</option><option value="273">Indira road</option><option value="275">Jigatola</option><option value="276">Joar Shahara</option><option value="277">Kachukhet</option><option value="279">Kafrul</option><option value="280">Kakrail</option><option value="281">Kalabagan</option><option value="282">Kallyanpur</option><option value="283">Kalshi</option><option value="284">Kamlapur</option><option value="285">Karwan bazar</option><option value="286">Katabon</option><option value="287">Kathalbagan</option><option value="288">Kazipara</option><option value="289">Khilgaon</option><option value="290">Khilkhet</option><option value="291">Kolabagan</option><option value="292">Kotwali</option><option value="293">Kuril</option><option value="294">Kurmitola</option><option value="295">Lalbag</option><option value="296">Lalmatia</option><option value="297">Malibagh</option><option value="298">Manikdey</option><option value="299">Maniknagar</option><option value="300">Merul Badda</option><option value="301">Mirpur</option><option value="302">Mirpur 1</option><option value="303">Mirpur 10</option><option value="304">Mirpur 11</option><option value="305">Mirpur 12</option><option value="306">Mirpur 14</option><option value="307">Mirpur 2</option><option value="308">Mirpur DOHS</option><option value="309">Moghbazar</option><option value="310">Mohakhali</option><option value="311">Mohakhali DOHS</option><option value="312">Mohammadpur</option><option value="313">Monipur</option><option value="314">Monipuri para</option><option value="315">Motijheel</option><option value="316">Mugda</option><option value="317">Nawabpur</option><option value="318">Naya Paltan</option><option value="319">New Market</option><option value="320">Niketon</option><option value="321">Nikunja 1</option><option value="322">Nikunja 2</option><option value="323">Notun Bazar</option><option value="324">Paikpara</option><option value="325">Pallabi</option><option value="326">Panthapath</option><option value="327">Paribagh</option><option value="328">Pirerbag</option><option value="329">Purana Paltan</option><option value="330">Ramna</option><option value="331">Cantonment Mirpur</option><option value="332">Rampura</option><option value="333">Rayer bagh</option><option value="334">Raza Bazar</option><option value="335">Razarbagh</option><option value="336">Rupnagar</option><option value="337">Sabujbag</option><option value="338">Shah Ali Bag</option><option value="339">Shahbag</option><option value="340">Shaheen Bagh</option><option value="341">Shahjahanpur</option><option value="342">Shamoli</option><option value="343">Shantinagar</option><option value="344">Shekertek</option><option value="345">Sherebanglanagar</option><option value="346">Shewrapara</option><option value="347">Shukrabd</option><option value="348">Shyampur</option><option value="349">Siddheswari</option><option value="350">Sobhanbag</option><option value="351">South Badda</option><option value="353">Taltola</option><option value="354">Tejgaon</option><option value="355">Banani DOHS</option><option value="356">Tejkuni para</option><option value="357">Uttar Badda</option><option value="358">Uttara</option><option value="359">Uttarkhan</option><option value="360">Vatara</option><option value="361">Wari</option><option value="362">Mirpur 13</option><option value="363">Manikdi</option><option value="364">Kurmitola</option><option value="365">Banglamotor</option><option value="366">Bakshi Bazar</option></select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}



                </div>

                <div class="col-md-6 col-sm-12 col-xs-12">
                    <div class="featured-box featured-box-primary featured-box-flat featured-box-text-left mt-md">
                        <div class="box-content">
                            <div class="form-col">
                                <h3>Payment Method</h3>
                                <div class="checkout-payment-method">
                                    <div class="radio" id="cash_on_delivary">
                                        <label>
                                            <input id="p_method_cashondelivery" type="radio" value="cod" name="payment_method" checked="checked" class="payment-card-check">
                                            Cash on delivery
                                        </label>
                                        <p id="cod-msg">Pay with cash upon delivery.</p>
                                    </div>



                                    <div class="radio">
                                        <label for="payment_method_bacs">
                                            <input id="payment_method_bacs" value="bkash" type="radio" name="payment_method" title="Bkash Payment" class="payment-card-check" />
                                            bKash Transfer
                                        </label>
                                        <p id="bcash-msg" style="display: none">Payment to our bKash Merchant Number(01933336655). Please use your Order Number as the payment reference.</p>
                                    </div>

                                    <div class="row" id="bkash_number" style="display: none;">
                                        <div class="col-xs-12 col-md-6">
                                            <div class="form-group">
                                                <label>Bkash Number<span class="required">*</span></label>
                                                <input type="text" class="form-control" name="number"> 
                                            </div> 
                                        </div>
                                        <div class="col-xs-12 col-md-6">
                                            <div class="form-group">
                                                <label>Amount<span class="required">*</span></label>
                                                <input type="number" name="amount" id="amount" class="form-control" placeholder="Enter Sent Amount">
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-md-12">
                                            <div class="form-group wide mb-md">
                                                <label>Transaction ID<span class="required">*</span></label>
                                                <input type="text" class="form-control" name="transaction_id">
                                            </div>
                                        </div>
                                    </div>                               
                                </div>
                                @php $total = 0 @endphp
                                @if(session('cart'))
                                    @foreach(session('cart') as $id => $details)
                                        @php $total += $details['price'] * $details['quantity'] @endphp
                                    @endforeach
                                @endif
                                <div class="checkout-review-action">
                                    <span class="sub-total" style="display: none">0.00</span>
                                    <span id="local-total" style="display: none">0</span>
                                    <span id="foreign-total" style="display: none">0</span>

                                    @if(!session()->has('coupon'))

                                    <h5>Order Total <span class="pull-right">{{ $total }}</span></h5>
                                    <input type="hidden" name="order_total" id="order_total" class="order_total" class="form-control" value="{{ $total }}" />
                                    <input type="hidden" name="dis_per" value="0" />

                                    @else

                                    <h5>Order Total <span class="pull-right">{{ $total }}</span></h5>
                                    <hr>
                                    <h5>New Total <span class="pull-right">{{ $total - $discount }}</span></h5>
                                    <input type="hidden" name="order_total" id="order_total" class="order_total" class="form-control" value="{{ $total - $discount }}" />
                                    <input type="hidden" name="dis_per" value="0" />

                                    @endif

                                    
                                    {{-- start coupon --}}
                                    @if(session()->has('coupon'))

                                    <hr id="cupon-hr">
                                    <h5 id="cupon-value">Coupon Discount ({{ session()->get('coupon')['coupon'] }}) 

                                        <input type="hidden" name="coupon_discount" id="coupon_discount" class="coupon_discount" class="form-control" value="{{ $discount }}" />
                                    
                                        {{-- <form action="{{ route('coupon.remove') }}" method="POST">
                                            {{ csrf_field() }}
                                            <button type="submit">Remove</button>
                                        </form> --}}
                                        

                                        {{-- <button type="submit" onclick="couponRemove()"><i class="fa fa-times"></i> </button> --}}

                                     <span class="pull-right cuppon-dis">{{ session()->get('coupon')['discount'] }}</span></h5> 
                                    <div id="Guser" style="color:gray; display:none;"></div>


                                    <div id="dbbl" style="display: none;">
                                        <hr>
                                        <h5>Discount for Bank Promotion <span class="pull-right bank-dis">0</span></h5>
                                    </div>
                                    <hr>

                                    @else

                                    <hr id="cupon-hr">
                                    <h5 id="cupon-value">Coupon Discount <span class="pull-right cuppon-dis">0</span></h5>

                                    <input type="hidden" name="coupon_discount" id="coupon_discount" class="coupon_discount" class="form-control" value="0" />

                                    <div id="Guser" style="color:gray; display:none;"></div>


                                    <div id="dbbl" style="display: none;">
                                        <hr>
                                        <h5>Discount for Bank Promotion <span class="pull-right bank-dis">0</span></h5>
                                    </div>
                                    <hr>

                                    @endif
                                    
                                    {{-- end coupon --}}


                                    @php 
                                    if(session('cart')){
                                     $delivery_charge=45;
                                    }else{
                                        $delivery_charge=0;
                                    }
                                    @endphp

                                    @if(!session()->has('coupon'))


                                    @if($total > 499)
                                    <h5 name="delivery_charge"><span style="margin-left: 0;" class="delivery_text" name="delivery_charge">Delivery Charge </span>
                                        <span class="pull-right">0</span>
                                    </h5> 
                                    @else
                                    <h5 ><span style="margin-left: 0;" class="delivery_text" name="delivery_charge">Delivery Charge </span>
                                        <span class="pull-right" >{{$delivery_charge}}</span>
                                    </h5> 

                                    <input type="hidden" name="delivery_charge" class="form-control" value="{{$delivery_charge}}" />
                                    
                                    @endif    

                                    @if($total > 499)
                                    <h5 style="border-top: 2px solid #555;">Grand Total <span class="pull-right" >{{ $total }}</h5>
                                    @else
                                    <h5 style="border-top: 2px solid #555;">Grand Total <span class="pull-right" >{{ $total+$delivery_charge }}</h5>
                                    @endif


                                    @else 


                                    @if($total > 499)
                                    <h5 name="delivery_charge"><span style="margin-left: 0;" class="delivery_text" name="delivery_charge">Delivery Charge </span>
                                        <span class="pull-right">0</span>
                                    </h5> 
                                    @else
                                    <h5 ><span style="margin-left: 0;" class="delivery_text" name="delivery_charge">Delivery Charge </span>
                                        <span class="pull-right" >{{$delivery_charge}}</span>
                                    </h5> 

                                    <input type="hidden" name="delivery_charge" class="form-control" value="{{$delivery_charge}}" />
                                    
                                    @endif    

                                    @if($total > 499)
                                    <h5 style="border-top: 2px solid #555;">Grand Total <span class="pull-right" >{{ $total-$discount }}</h5>
                                    @else
                                    <h5 style="border-top: 2px solid #555;">Grand Total <span class="pull-right" >{{ $total+$delivery_charge-$discount }}</h5>
                                    @endif


                                    @endif

                                    
                                    
                                </div> 

                                <button style="margin-top: 30px;color: #fff;
                                    background-color: #08c;
                                    border-color: #08c #08c #069;" id="place-order" name="submit" type="submit" title="Place Order now" class="btn btn-success pull-right">Place Order now</button>
                                    <span class="please-wait" id="review-please-wait" style="display:none;">Submitting order information... </span>

                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="col-xs-12">
                            <p style="margin-left: 15px;">By clicking/Tapping "Place Order Now", I agree <a href="policy.html" style="color: maroon; text-decoration: none; font-weight: bold;">Terms & Condition</a></p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </form>

    @if(! session()->has('coupon'))
    <div style="margin-left: 100px; margin-bottom: 20px;">
                            
                                <div class="col-sm-4" style="margin-bottom: 1 0px;margin-top: -150px;">
                                    <label>Coupon code</label>
                                    <form action="{{ route('apply.coupon') }}" method="POST">
                                       {{ csrf_field() }} 
                                    <input type="text" name="coupon" id="coupon" class="form-control" placeholder="Please enter your coupon code" />
                                
                                    <button style="margin-top: 30px;color: #fff;
                                    background-color: #08c;
                                    border-color: #08c #08c #069; display: inline;" type="submit" title="Apply coupon" class="btn btn-success pull-right">Apply coupon</button>
                                </form>
                                </div>
    </div>
    @endif


</div>



<div class="modal fade shop-login-modal" tabindex="-1" role="dialog" aria-labelledby="myLoginModal">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <form action="#">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="fa fa-times"></i></span></button>
                    <h4 class="modal-title" id="myLoginModal">Login to your Account</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="mb-xs">Email Address <span class="required">*</span></label>
                        <input type="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label class="mb-xs">Password <span class="required">*</span></label>
                        <input type="password" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-link pull-left" data-toggle="modal" data-target=".shop-fpass-modal" data-dismiss="modal">Forget Your Password?</a>
                    <input type="submit" class="btn btn-primary" value="Login">
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade shop-fpass-modal" tabindex="-1" role="dialog" aria-labelledby="myRecoverModal">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <form action="#">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="fa fa-times"></i></span></button>
                    <h4 class="modal-title" id="myRecoverModal">Recover your password</h4>
                </div>
                <div class="modal-body">
                    <p>Please enter your email address below. You will receive a link to reset your password.</p>
                    <div class="form-group">
                        <label class="mb-xs">Email Address <span class="required">*</span></label>
                        <input type="email" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-link pull-left" data-toggle="modal" data-target=".shop-login-modal" data-dismiss="modal"><i class="fa fa-angle-double-left mr-xs"></i>Back to Login</a>
                    <input type="submit" class="btn btn-primary" value="Recover">
                </div>
            </form>
        </div>
    </div>
</div>
</div>

<style type="text/css">
    .cart-box {
        display: none;
    }

</style>
<script type="text/javascript">
    var billing_register_account = document.getElementById('billing_register_account');
    billing_register_account.onchange = function() {
        if (billing_register_account.checked) {
            document.getElementById('register-customer-password').style.display = 'block';
        } else {
            document.getElementById('register-customer-password').style.display = 'none';
        }
    }
</script>
<script>
    // document.getElementById("delivery_charge").value = 45;
    // document.getElementById("delivery_charge_span").innerHTML="45";
    function myFunction(e) {
        var delivery_type = e.target.value;
        if (delivery_type == 2) {
            document.getElementById("delivery_charge").value = 125;
            document.getElementById("delivery_charge_span").innerHTML="125";
        }else{
            document.getElementById("delivery_charge").value = 45;
            document.getElementById("delivery_charge_span").innerHTML="45";
        }
    }
</script>
@endsection