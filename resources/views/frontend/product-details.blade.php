@extends('frontend.layouts.master')
@section('title','Product Details')
@section('content')
<div role="main" class="main">
	{{-- @include('frontend.header-bottom') --}}
	<div class="container" style="padding-top: 30px;">
		<div class="row">
			@php
			$types = App\Models\ProductType::where('product_id', $product->id)->first();
			// $type = App\Models\Type::where('id', $types->type_id)->first();
			$sizes = App\Models\ProductSize::where('product_id', $product->id)->first();
			if($sizes != null){
				$size = App\Models\Size::where('id', $sizes->size_id)->first();
			}else{
				$size = null;
			}
			@endphp
			<div class="col-md-7">
				<div class="product-view">
					<div class="product-essential">
						<div class="row">
							<div class="product-img-box col-sm-5">
								<div class="product-img-box-wrapper">
									<div class="product-img-wrapper">
										<img src="{{asset($product->default_image)}}" data-zoom-image="{{asset($product->default_image)}}" alt="{{$product->product_name}}">
									</div>
								</div>
							</div>
							<div class="product-details-box col-sm-7">
								<h1 class="product-name" style="font-size: 22px; line-height: 25px;">
									{{$product->product_name}}
								</h1>
								<div class="product-rating-container">
									<div class="product-ratings">
										<div class="ratings-box">
											<div class="rating" style="width:0%"></div>
										</div>
									</div>
									<div class="review-link">
										<a href="#" class="review-link-in" rel="nofollow"> <span class="count">0.0 Out of 5</a> |
											<a href="#" id="button_lastdiv" onclick="return false" class="review-link-in" rel="nofollow"> <span class="count">0</span> customer review</a> |
											<a href="#" id="button_lastdiv2" class="review-link-in" rel="nofollow">Add a review</a>
										</div>
									</div>
									<div class="product-detail-info">
										<div class="product-price-box">
											
											{{-- <span class="product-price">{{$product->discount_price}}৳<b style="font-weight: normal; font-size: 12px; color: #777;">&nbsp;&nbsp;(Per Unit)</b></span> --}}

											@if ($product->discount_price == 0)
                                    <div class="product-price"><span class="price">{{$product->selling_price}}৳</span><span style="font-size:15px;color: black;">&nbsp;&nbsp;(Per {{$product->unit}})</span></div>
                                    @else
                                    <div class="product-price"><span class="price">{{$product->discount_price}}৳</span> <br><span class="price-before-discount" style="text-decoration: line-through;">{{$product->selling_price}}৳</span><span style="font-size:15px;color: black;">&nbsp;&nbsp;(Per {{$product->unit}})</span></div>
                                    @endif

											
										</div>
										<p class="availability">

											<div class="s-top" style="margin-top: 0.5em;"><p style="margin-bottom: 0.5em; line-height: 2em;">{!! $product->short_description !!}</p></div>
										</p>
									</div>
									<div class="product-actions">
										<!--<div class="product-detail-qty">-->
										<!--	<input type="hidden" id="minQty" value="1" />-->
										<!--	<input type="text" name="qty" maxlength="12" value="1" class="vertical-spinner" id="product-vqty">-->
										<!--	<input name="id" type="hidden" value="140072">-->
										<!--	<input type="hidden" name="price" value="980" />-->
										<!--	<input name="_token" type="hidden" value="uNBH1fYLF50pskZAVuzEknqL9QVyejIUH5Bu4PIu">-->
										<!--</div>-->
											{{-- <a href="{{ route('add.to.cart', $product->id) }}" class="btn btn-primary" title="Add to Bag">
												<i class="fa fa-shopping-cart"></i>
												<span>Add to Bag</span>
											</a> --}}
											<button  data-id="{{$product->id}}" data-name="{{$product->product_name}}" data-price="{{$product->selling_price}}" data-image="{{$product->default_image}}" class="btn btn-primary addcart addcart{{$product->id}}">Add to Bag</button>
										</div>
										<div class="product-detail-info">
											<p class="availability">
												<span class="font-weight-semibold">Categories:</span>
												<a href="{{ url('/category') }}/{{ $product->category_id }}">
													{{$product->category->category_name}}
												</a>
											</p>
											{{-- <p class="availability">
												<span class="font-weight-semibold">Type:</span>
												{{$type->type}}
											</p>
											@if($size != null)
											<p class="availability">
												<span class="font-weight-semibold">Pack Size:</span>
												{{$size->size}}
											</p>
											@endif
											<p class="availability">
												<span class="font-weight-semibold">Unit:</span>
												{{$product->unit}}
											</p> --}}
										</div>
									</div>
								</div>
							</div>
							@if($product->product_description != null)
							<div class="tabs product-tabs">
								<ul class="nav nav-tabs">
									<li class="active">
										<a href="#product-desc" data-toggle="tab">Description</a>
									</li>
								</ul>
								<div class="tab-content">
									<div id="product-desc" class="tab-pane active">
										<div class="product-desc-area">
											{!! $product->product_description !!}
										</div>
									</div>
								</div>
							</div>
							@endif
						</div>
						<h2 class="slider-title">
							<span class="inline-title">Relevent Products</span>
							<span class="line"></span>
						</h2>
						@php
						$same_category_products = App\Models\Product::where('category_id', $product->category_id)->where('status',1)->get();
						@endphp
						<div class="owl-carousel owl-theme" data-plugin-options="{'items':4, 'margin':20, 'nav':true, 'dots': false, 'loop': false}">
							@foreach($same_category_products as $same_pro)
							<div class="product">
								<figure class="product-image-area">
									<a href="{{ url('/product/details') }}/{{ $same_pro->id }}" title="{{ $same_pro->product_name }}" class="product-image">
										<img src="{{asset($same_pro->default_image)}}" alt="{{ $same_pro->product_name }}" />
									</a>
								</figure>
								<div class="product-details-area">
									<h2 class="product-name"><a href="{{ url('/product/details') }}/{{ $same_pro->id }}" title="{{ $same_pro->product_name }}">{{ $same_pro->product_name }}</a></h2>
									<div class="product-price-box">
										@if ($same_pro->discount_price == 0)
                                    <div class="product-price"><span class="price">{{$same_pro->selling_price}}৳</span></div>
                                    @else
                                    <div class="product-price"><span class="price">{{$same_pro->discount_price}}৳</span> <span class="price-before-discount" style="text-decoration: line-through;">{{$same_pro->selling_price}}৳</span></div>
                                    @endif
										{{-- <span class="product-price">{{ $same_pro->selling_price }}৳</span> --}}
									</div>
									<div class="product-actions">
										<button  data-id="{{$same_pro->id}}" data-name="{{$same_pro->product_name}}" data-price="{{$same_pro->selling_price}}" data-image="{{$same_pro->default_image}}" class="btn btn-primary addcart addcart{{$same_pro->id}}">Add to Bag</button>
										{{-- <a href="#" class="addtocart related-btn-cart" title="Add to Bag" rel_id="3018" price="40" rel_token="uNBH1fYLF50pskZAVuzEknqL9QVyejIUH5Bu4PIu" rel_qty="1">
											<i class="fa fa-shopping-cart"></i>
											<span>Add to Bag</span>
										</a> --}}
									</div>
								</div>
							</div>
							@endforeach
						</div>
						<div id="lastdiv">
							<div class="tabs product-tabs" style="padding: 20px; border: 1px solid #ccc; border-radius: 5px;">
								<div id="product-reviews" class="tab-pane">
									<div class="add-product-review">
										<h4 class="text-uppercase heading-text-color font-weight-semibold">REVIEW & RATTING</h4>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="row">
									<div class="col-xs-12">
										<p class="text-danger">There is no review for this product!</p>
									</div>
								</div>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>
					<aside class="col-md-5 sidebar product-sidebar">
						{{-- <h4>Probable Alternatives <span style="color: #98a4b1; font-size: 12px;"></span></h4>
						<style>
							.table > tbody > tr > td, .table > tbody > tr > th, .table > tfoot > tr > td, .table > tfoot > tr > th, .table > thead > tr > td, .table > thead > tr > th {
								padding: 5px; 
							}
						</style>
						@php
						$types = App\Models\ProductType::where('product_id', $product->id)->first();
						$type = App\Models\ProductType::where('type_id', $types->type_id)->first();
						$alternatives = App\Models\Product::where('id', $type->product_id)->get();
						@endphp
						<table class="table table-bordered table-condensed table-hover">
							<thead style="background-color: #b4b4b4;">
								<tr>
									<th style="font-size: 12px;">Name</th>
									<th style="font-size: 12px;">Form</th>
									<th style="font-size: 12px;">MRP</th>
								</tr>
							</thead>
							<tbody>
								@foreach($alternatives as $row)
								<tr>
									<td style="font-size: 12px;"><a href="{{ url('/product/details') }}/{{ $row->id }}"><b>{{$row->product_name }}</b></a><br>{{-- <span style="color: #959595;">Square Pharmaceuticals Ltd.</span> --}}</td>
									{{-- <td style="font-size: 12px;">Others</td>
									@if($row->discount_price == 0)
									<td style="font-size: 12px;">{{$row->selling_price }}৳</td>
									@else
									<td style="font-size: 12px;">{{$row->discount_price }}৳</td>
									@endif
								</tr>
								@endforeach --}}
							{{-- </tbody>
						</table>
						<br> --}}
						{{-- <div class="row text-center">
							<img style="width: 50%; margin-bottom: 10px;" alt="Payments" src="https://epharma.com.bd/theme/epharma/img/we_accept.jpg" class="footer-payment">
						</div> --}}
						{{-- <hr> --}}
						<h4>New Arrivals</h4>
						@php
						$featured = App\Models\Product::where('status',1)->where('hot_new',1)->latest()->get();
						@endphp
						@foreach($featured as $fproduct)
						<div>
							<div class="product product-sm" style="max-width: 350px;">
								<figure class="product-image-area">
									<a href="{{ url('/product/details') }}/{{ $fproduct->id }}" title="{{ Str::limit($fproduct->product_name, 15) }}" class="product-image">
										<img src="{{asset($fproduct->default_image)}}" alt="{{$fproduct->product_name }}">
									</a>
								</figure>
								<div class="product-details-area">
									<h2 class="product-name" style="height: 30px; margin-top: 10px;"><a href="{{ url('/product/details') }}/{{ $fproduct->id }}" title="{{ Str::limit($fproduct->product_name, 15) }}">{{ $fproduct->product_name }}</a></h2>
									<div class="product-price-box">

										@if ($fproduct->discount_price == 0)
                                    <div class="product-price"><span class="price">{{$fproduct->selling_price}}৳</span></div>
                                    @else
                                    <div class="product-price"><span class="price">{{$fproduct->discount_price}}৳</span> <br><span class="price-before-discount" style="text-decoration: line-through;">{{$fproduct->selling_price}}৳</span></div>
                                    @endif

										{{-- <span class="product-price">{{$fproduct->selling_price}}৳</span> --}}
									</div>
									<div class="product-actions">
										<button  data-id="{{$fproduct->id}}" data-name="{{$fproduct->product_name}}" data-price="{{$fproduct->selling_price}}" data-image="{{$fproduct->default_image}}" class="product_cart_button addcart addcart{{$fproduct->id}}">Add to Bag</button>
										{{-- <a href="#" class="addtocart feature-btn-cart" title="Add to Bag" fet_id="140037" price="300" fet_token="uNBH1fYLF50pskZAVuzEknqL9QVyejIUH5Bu4PIu" fet_qty="1">
											<i class="fa fa-shopping-cart"></i>
											<span>Add to Bag</span>
										</a> --}}
									</div>
								</div>
							</div>
						</div>
						@endforeach
					</aside>
				</div>
			</div>
		</div>
		<style>
			.nextprev {
				background-color: green;
				border-color: rgba(0, 0, 0, 0.3);
				border-radius: 4px;
				color: #fff;
				font-size: 15px;
				margin-right: 10px;
				padding: 6px 15px;
				text-shadow: 0 1px 0 rgba(0, 0, 0, 0.5);
			}
			.nextprev:hover {
				background-color: #4F87A2;
				border-color: rgba(0,0,0,0.5);
			}
			.nextprev2 {
				background-color: #00aeef;
				border-color: rgba(0, 0, 0, 0.3);
				border-radius: 4px;
				color: #fff;
				font-size: 15px;
				margin-right: 10px;
				padding: 6px 15px;
				text-shadow: 0 1px 0 rgba(0, 0, 0, 0.5);
			}
			.nextprev2:hover {
				background-color: #216a94;
				border-color: rgba(0,0,0,0.5);
			}
		</style>
		<style>
			.tagcloud ul{
				padding: 0;
				margin: 0;
			}
			.tagcloud ul li{
				list-style: none;
			}
			.tagcloud ul li a{
				text-decoration: none;
				font-size: 10pt;
				border: none;
			}
			.fa-meetup{
				color: #99ddff;
			}
			.gen_style{
				color: #333;
				font-size: 12px;
				line-height: 15px;
			}
			.ac-item-a{
				color: #3097D1;
			}
			.search-btn-cart{
				/*margin-top: 8px;*/
			}
		</style>
		@endsection