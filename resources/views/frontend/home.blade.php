@extends('frontend.layouts.master')
@section('title','Checkout')
@section('content') 
@include('frontend.header-bottom') 
<style type="text/css">
    .col-md-10.col-md-offset-1 .form-group {
        margin-top: 15px;
    }
</style>

<style>
    
    @media only screen and (max-width: 575px){
        .fill {
            height: 200px;
            
        }
        #myCarousel {
    height: 165px;
}

    }

   

</style>

@php
$data = App\Models\Setting::find(4);

@endphp
            <div role="main" class="main">
                <header id="myCarousel" class="carousel slide">
                    <div class="carousel-buttons">
                        <div class="search">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-10 col-md-offset-1">
                                        <!--
                                        <div class="form-section">
                                            <!--
                                            <div class="row">
                                                <!--
                                                <div class="col-md-6">
                                                    <form id="search-form" action="{{ url('/searching') }}" method="POST">
                                                    @csrf
                                                    <div class="form-group search-box">
                                                        <div class="serchtile"></div>
                                                        <input type="text" name="search_product" id="search_text" placeholder="Search here..." class="form-control">
                                                    </div>
                                                    </form>
                                                </div>
                                            -->
                                                <!--
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <div class="serchtile"></div>
                                                        <select id="productCategory" name="categoryId" class="form-control">
                                                            <option value="1">Brand Name</option>
                                                            <option value="2">Generic Name</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            
                                                
                                                <div class="col-md-3">
                                                    <a href="{{url('prescription-upload')}}">
                                                        <button class="btn pull-right" style="background-color: #ED1C1C; color: #FFF; width: 100%; margin-top: 17px; line-height: 23px;">Upload Slip</button>
                                                    </a>
                                                </div>
                                            
                                            </div>
                                        
                                        </div>
                                    -->
                                        <div id="search-results" class="result"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-inner">
                        <div class="item active">
                            <div class="fill" style="background-image: url('{{asset($data->slider1)}}'); background-size: 100% 100%;"></div>
                        </div>
                        <div class="item ">
                            <div class="fill" style="background-image: url('{{asset($data->slider2)}}'); background-size: 100% 100%;"></div>
                        </div>
                        <div class="item ">
                            <div class="fill" style="background-image: url('{{asset($data->slider3)}}'); background-size: 100% 100%;"></div>
                        </div>
                    </div>

                    <a class="left carousel-control" href="#myCarousel" data-slide="prev">‹</a>
                    <a class="right carousel-control" href="#myCarousel" data-slide="next">›</a>
                </header>
                <div class="banners-wrapper">
                    <div class="banners-container">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-3 col-xs-6 "> 
                                    <a href="{{ route('view.banner.details',$data->brand_id_1)}}" class="banner">
                                        <img src="{{asset($data->home_banner_1)}}" alt="Banner">
                                    </a>

                                    <h5 style="text-align: center;">DOLLAR PRODUCTS</h5>
                                    
                                    {{-- @php
                                    $brand = App\Models\Brand::latest()->get();

                                    @endphp

                                    @if($data->brand_id_1 == $brand->id)
                                    <h5>{{ $brand->brand_name }}</h5>
                                    @else
                                    <h5>Unknown</h5>
                                    @endif --}}
                                    {{-- <a href="#" class="banner">
                                        <img src="{{asset($data->home_banner_1)}}" alt="Banner"style="height:300px;width: 275px;">
                                    </a> --}}
                                </div>
                                <div class="col-sm-3 col-xs-6 col-sm-push-6">
                                    <a href="{{ route('view.banner.details',$data->brand_id_3)}}" class="banner" >
                                        <img src="{{asset($data->home_banner_3)}}" alt="Banner">
                                    </a>
                                    
                                    <h5 style="text-align: center;">Others</h5>
                                    {{-- <a href="#" class="banner" >
                                        <img src="{{asset($data->home_banner_3)}}" alt="Banner"style="height:300px;width: 280px;">
                                    </a> --}}
                                </div>
                                <div class="clearfix visible-xs"></div>
                                <div class="col-sm-6 col-sm-pull-3" >
                                    <a href="{{ route('view.banner.details',$data->brand_id_2)}}" class="banner" style="margin-bottom: 13px;" >
                                        <img src="{{asset($data->home_banner_2)}}" alt="Banner"style="height: 270px;" >
                                    </a>
                                    <h5 style="text-align: center;">GUANGBO PRODUCTS</h5>

                                    {{-- <a href="category/100.html" class="banner">
                                        <img src="{{asset($data->home_banner_2)}}" alt="Banner" style="height:300px;width:558;" >
                                    </a> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @php
                // $featured = App\Models\Product::where('status',1)->latest()->get();
                $featured = App\Models\Product::where('status',1)->where('trend_product',1)->latest()->get();
                $new_arrival = App\Models\Product::where('status',1)->where('hot_new',1)->latest()->get();
                $hotdeals = App\Models\Product::where('status',1)->where('hot_deal',1)->latest()->get();

                // $food_suppliment_products = App\Models\Product::where('status',1)->where('category_id',49)->latest()->get();
                // $bestrated = App\Models\Product::where('status',1)->where('best_rated',1)->latest()->get();
                // $hotdeal = App\Models\Product::where('status',1)->where('hot_deal',1)->latest()->get();
                // $midslider = App\Models\Product::where('status',1)->where('mid_slider',1)->latest()->get();
                // $categories = App\Models\Category::all();
                @endphp
                <div class="container mb-lg">
                    <h2 class="slider-title">
                        <span class="inline-title">Feature Product</span>
                        <span class="line"></span>
                    </h2>
                    <div class="owl-carousel owl-theme manual new-products-carousel">
                        @foreach($featured as $product)
                        <div class="product">
                            <figure class="product-image-area">
                                <a href="{{ url('/product/details') }}/{{ $product->id }}" title="Product Name" class="product-image">
                                    <img src="{{asset($product->default_image)}}" alt="Product Name">
                                </a>

                                @php
                                  $amount = $product->selling_price - $product->discount_price;
                                  $discount = ($amount/$product->selling_price) * 100 ;
                                @endphp

                                <div class="product-label">
                                    @if ($product->discount_price == 0)
                                    <span class="new">0%</span>
                                    @else
                                    <span class="new">{{ round($discount)}}%</span>
                                    @endif
                                </div>

                                {{-- <div class="product-label">
                                    <span class="new">0%</span>
                                </div> --}}
                            </figure>
                            <div class="product-details-area">
                                <h2 class="product-name">
                                    <a href="{{route('product.details',$product->id)}}" title="Product Name" class="name-item">{{ Str::limit($product->product_name, 15) }}</a>
                                </h2>

                                <div class="product-price-box">
                                    @if ($product->discount_price == 0)
                                    <div class="product-price"><span class="price">{{$product->selling_price}}৳</span></div>
                                    @else
                                    <div class="product-price"><span class="price">{{$product->discount_price}}৳</span>   <span class="price-before-discount" style="text-decoration: line-through;">{{$product->selling_price}}৳</span></div>
                                    @endif

                                </div> 

                                {{-- <div class="product-price-box">
                                    <span class="product-price">{{$product->selling_price}}৳</span>
                                </div> --}}
                                <div class="product-actions">
                                    <button  data-id="{{$product->id}}" data-name="{{$product->product_name}}" data-price="{{$product->discount_price}}" data-image="{{$product->default_image}}" class="product_cart_button addcart addcart{{$product->id}}">Add to Bag</button>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="container mb-lg">
                    <h2 class="slider-title">
                        <span class="inline-title">New Arrivals</span>
                        <span class="line"></span>
                    </h2>
                    <div class="owl-carousel owl-theme manual new-products-carousel">
                        @foreach($new_arrival as $scproduct)
                        <div class="product">
                            <figure class="product-image-area">
                                <a href="{{ url('/product/details') }}/{{ $scproduct->id }}" title="Product Name" class="product-image">
                                    <img src="{{asset($scproduct->default_image)}}" alt="Product Name">
                                </a>

                                @php
                                  $amount = $scproduct->selling_price - $scproduct->discount_price;
                                  $discount = ($amount/$scproduct->selling_price) * 100 ;
                                @endphp

                                <div class="product-label">
                                    @if ($scproduct->discount_price == 0)
                                    <span class="new">0%</span>
                                    @else
                                    <span class="new">{{ round($discount)}}%</span>
                                    @endif
                                </div>

                                {{-- <div class="product-label">
                                    <span class="new">0%</span>
                                </div> --}}
                            </figure>
                            <div class="product-details-area">
                                <h2 class="product-name">
                                    <a href="{{route('product.details',$scproduct->id)}}" title="Product Name" class="name-item">{{ Str::limit($scproduct->product_name, 15) }}</a>
                                </h2>

                                <div class="product-price-box">
                                    @if ($scproduct->discount_price == 0)
                                    <div class="product-price"><span class="price">{{$scproduct->selling_price}}৳</span></div>
                                    @else
                                    <div class="product-price"><span class="price">{{$scproduct->discount_price}}৳</span> <span class="price-before-discount" style="text-decoration: line-through;">{{$scproduct->selling_price}}৳</span></div>
                                    @endif

                                </div> 

                                {{-- <div class="product-price-box">
                                    <span class="product-price">{{$scproduct->selling_price}}৳</span>
                                </div> --}}
                                <div class="product-actions">

                                    <button  data-id="{{$scproduct->id}}" data-name="{{$scproduct->product_name}}" data-price="{{$scproduct->selling_price}}" data-image="{{$scproduct->default_image}}" class="product_cart_button addcart addcart{{$scproduct->id}}">Add to Bag</button>

                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="container mb-lg">
                    <h2 class="slider-title">
                        <span class="inline-title">Hot Deals</span>
                        <span class="line"></span>
                    </h2>
                    <div class="owl-carousel owl-theme manual new-products-carousel">
                        @foreach($hotdeals as $hproduct)
                        <div class="product">
                            <figure class="product-image-area">
                                <a href="{{ url('/product/details') }}/{{ $hproduct->id }}" title="Product Name" class="product-image">
                                    <img src="{{asset($hproduct->default_image)}}" alt="Product Name">
                                </a>

                                @php
                                  $amount = $hproduct->selling_price - $hproduct->discount_price;
                                  $discount = ($amount/$hproduct->selling_price) * 100 ;
                                @endphp

                                <div class="product-label">
                                    @if ($hproduct->discount_price == 0)
                                    <span class="new">0%</span>
                                    @else
                                    <span class="new">{{ round($discount)}}%</span>
                                    @endif
                                </div>
                                
                                {{-- <div class="product-label">
                                    <span class="new">0%</span>
                                </div> --}}
                            </figure>
                            <div class="product-details-area">
                                <h2 class="product-name">
                                    <a href="{{route('product.details',$hproduct->id)}}" title="Product Name" class="name-item">{{ Str::limit($hproduct->product_name, 15) }}</a>
                                </h2>

                                <div class="product-price-box">
                                    @if ($hproduct->discount_price == 0)
                                    <div class="product-price"><span class="price">{{$hproduct->selling_price}}৳</span></div>
                                    @else
                                    <div class="product-price"><span class="price">{{$hproduct->discount_price}}৳</span> <span class="price-before-discount" style="text-decoration: line-through;">{{$hproduct->selling_price}}৳</span></div>
                                    @endif

                                </div> 

                                {{-- <div class="product-price-box">
                                    <span class="product-price">{{$hproduct->selling_price}}৳</span>
                                </div> --}}
                                <div class="product-actions">

                                    <button  data-id="{{$hproduct->id}}" data-name="{{$hproduct->product_name}}" data-price="{{$hproduct->selling_price}}" data-image="{{$hproduct->default_image}}" class="product_cart_button addcart addcart{{$hproduct->id}}">Add to Bag</button>

                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                {{-- <div class="container mb-lg">
                    <h2 class="slider-title">
                        <span class="inline-title">Food Suppliment</span>
                        <span class="line"></span>
                    </h2>
                    <div class="owl-carousel owl-theme manual new-products-carousel">
                        @foreach($food_suppliment_products as $fsproduct)
                        <div class="product">
                            <figure class="product-image-area">
                                <a href="{{ url('/product/details') }}/{{ $fsproduct->id }}" title="Product Name" class="product-image">
                                    <img src="{{asset($fsproduct->default_image)}}" alt="Product Name">
                                </a>
                                <div class="product-label">
                                    <span class="new">0%</span>
                                </div>
                            </figure>
                            <div class="product-details-area">
                                <h2 class="product-name">
                                    <a href="{{route('product.details',$fsproduct->id)}}" title="Product Name" class="name-item">{{ Str::limit($fsproduct->product_name, 15) }}</a>
                                </h2>

                                <div class="product-price-box">
                                    <span class="product-price">{{$fsproduct->selling_price}}৳</span>
                                </div>
                                <div class="product-actions">

                                    <button  data-id="{{$fsproduct->id}}" data-name="{{$fsproduct->product_name}}" data-price="{{$fsproduct->selling_price}}" data-image="{{$fsproduct->default_image}}" class="product_cart_button addcart addcart{{$fsproduct->id}}">Add to Bag</button>

                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div> --}}
@endsection

            