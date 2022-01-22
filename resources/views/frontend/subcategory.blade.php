@extends('frontend.layouts.master')
@section('title','Category')
@section('content')
	<div role="main" class="main">
		@include('frontend.header-bottom')
		<div class="container" style="padding-top: 30px;">
			<div class="row">
				<div class="col-md-9 col-md-push-3">
					<div class="toolbar mb-none">
						<div class="sorter">
							<div class="sort-by">
								<label>Sort by:</label>
								<select name="short_by">
									<option value="id" selected>Position</option>
									<option value="name">Name</option>
									<option value="price">Price</option>
								</select>

							</div>
							<div class="view-mode">
								<ul>
									<li class="act">
										<span href="#" id="list" title="List">
											<i class="fa fa-list-ul"></i>
										</span>
									</li>
									<li>
										<span id="grid" title="Grid">
											<i class="fa fa-th"></i>
										</span>
									</li>
								</ul>


							</div>
							<ul class="pagination">
								<li class="pagination active"><ul class="pagination">
									<li class="disabled"><span>&laquo;</span></li>
									<li class="active"><span>1</span></li>
									<li><a href="https://epharma.com.bd/category/49?page=2">2</a></li>
									<li><a href="https://epharma.com.bd/category/49?page=3">3</a></li>
									<li><a href="https://epharma.com.bd/category/49?page=4">4</a></li>
									<li><a href="https://epharma.com.bd/category/49?page=2" rel="next">&raquo;</a></li>
								</ul>
							</li>
						</ul>
						<div class="limiter">
							<label>Show:</label>
							<select id="billing:region_id" class="validate-select" name="limit"><option value="12" selected="selected">12</option><option value="24">24</option><option value="36">36</option></select>
						</div>
					</div>
				</div>

				<div id="grid-list-view">
					<ul class="products-list">
						@foreach($products as $prow)
						@php
						$types = App\Models\ProductType::where('product_id', $prow->id)->first();
						$type = App\Models\Type::where('id', $types->type_id)->first();
						@endphp
						<li>
							<div class="product product-sm">
								<figure class="product-image-area">
									<a href="{{ url('/product/details') }}/{{ $prow->id }}" title="{{$prow->product_name}}" class="product-image">
										<img src="{{asset($prow->default_image)}}" alt="{{$prow->product_name}}" />
									</a>
								</figure>
								<div class="product-details-area">
									<h2 class="product-name"><a href="{{ url('/product/details') }}/{{ $prow->id }}" title="{{$prow->product_name}}">{{$prow->product_name}}</a></h2>
									<div class="product-short-desc">
										<p clase="product-short-desc-sub">Generic : {{$type->type}}</p>
										<p clase="product-short-desc-sub">Company : {{$prow->brand->brand_name}}</p>
									</div>
									<div class="product-price-box">
										{{-- <span class="old-price">৳10</span> --}}
										<span class="product-price">{{$prow->selling_price}}৳</span>
									</div>
									<div class="product-actions">
										<button  data-id="{{$prow->id}}" data-name="{{$prow->product_name}}" data-price="{{$prow->selling_price}}" data-image="{{$prow->default_image}}" class="btn btn-primary addcart addcart{{$prow->id}}">Add to Bag</button>
										{{-- <a href="#" class="addtocart feature-btn-cart" title="Add to Bag" fet_id="5432" price="9.5" fet_token="cCBBlxHg4z0eTs4HKLbAHKIHdeIlaDtzJTrkKKh9" fet_qty="1">
											<i class="fa fa-shopping-cart"></i>
											<span>Add to Bag</span>
										</a> --}}
									</div>
								</div>
							</div>
						</li>
						@endforeach
					</ul>
					<ul class="products-grid columns4" style="display: none;">
						@foreach($products as $prow)
						<li>
							<div class="product">
								<figure class="product-image-area">
									<a href="{{ url('/product/details') }}/{{ $prow->id }}" title="{{$prow->product_name}}" class="product-image">
										<img src="{{asset($prow->default_image)}}" alt="{{$prow->product_name}}" />
									</a>
									{{-- <div class="product-label">
										<span class="new">5%</span>
									</div> --}}
								</figure>
								<div class="product-details-area">
									<h2 class="product-name"><a href="{{ url('/product/details') }}/{{ $prow->id }}" title="{{$prow->product_name}}">{{$prow->product_name}}</a></h2>

									<div class="product-price-box">
										{{-- <span class="old-price">৳10</span> --}}
										<span class="product-price">{{$prow->selling_price}}৳</span>
									</div>
									<div class="product-actions">
										<button  data-id="{{$prow->id}}" data-name="{{$prow->product_name}}" data-price="{{$prow->selling_price}}" data-image="{{$prow->default_image}}" class="btn btn-primary addcart addcart{{$prow->id}}">Add to Bag</button>
										{{-- <a href="#" class="addtocart related-btn-cart" title="Add to Bag" rel_id="5432" price="9.5" rel_token="cCBBlxHg4z0eTs4HKLbAHKIHdeIlaDtzJTrkKKh9" rel_qty="1">
											<i class="fa fa-shopping-cart"></i>
											<span>Add to Bag</span>
										</a> --}}
									</div>
								</div>
							</div>
						</li>
						@endforeach
					</ul>
				</div>
				<div class="toolbar-bottom">
					<div class="toolbar">
						<div class="sorter">
							<ul class="pagination">
								<li class="pagination active"><ul class="pagination">
									<li class="disabled"><span>&laquo;</span></li>
									<li class="active"><span>1</span></li>
									<li><a href="https://epharma.com.bd/category/49?page=2">2</a></li>
									<li><a href="https://epharma.com.bd/category/49?page=3">3</a></li>
									<li><a href="https://epharma.com.bd/category/49?page=4">4</a></li>
									<li><a href="https://epharma.com.bd/category/49?page=2" rel="next">&raquo;</a></li>
								</ul>
							</li>
						</ul>
						<div class="limiter">
							<label>Show:</label>
							<select id="billing:region_id" class="validate-select" name="limit"><option value="12" selected="selected">12</option><option value="24">24</option><option value="36">36</option></select>
						</div>
					</div>
				</div>
			</div>
			</div>
			<aside class="col-md-3 col-md-pull-9 sidebar shop-sidebar">
				<div class="panel-group">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title">
								<a class="accordion-toggle" data-toggle="collapse" href="#panel-filter-category">
									Categories
								</a>
							</h4>
						</div>
						<div id="panel-filter-category" class="accordion-body collapse in">
							<div class="panel-body">
								<ul>
									@foreach($categories as $row)
									<li>
										<a href="{{url('category',$row->id)}}">{{$row->category_name}}</a>
											<ul style="padding-left: 15px;">
												@php
												$subcategories = App\Models\Subcategory::where('category_id', $row->id)->get();
												@endphp
												@foreach($subcategories as $srow)
												<li><a href="{{url('subcategory',$srow->id)}}">{{$srow->subcategory_name}}</a></li>
												@endforeach
											</ul>
									</li>
									@endforeach
								</ul>
							</div>
						</div>
					</div>

				</aside>
			</div>
		</div>
	</div>
@endsection