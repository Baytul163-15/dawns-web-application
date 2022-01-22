@php
$data = App\Models\Setting::find(4);
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Stationery Shop &#8211; your Online Stationery Shop</title>
    <meta name="keywords" content="Stationery" />
    <meta name="description" content="Your Online Stationery Shop" />
    <meta name="author" content="themessengerbd.com" />

    <link rel="shortcut icon" href="{{ asset('theme/epharma/img/favicon-32x32-1.png')}}" type="image/x-icon" />
    <link rel="apple-touch-icon" href="{{ asset('img/apple-touch-icon.html')}}">

    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">


    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800%7CShadows+Into+Light" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="{{ asset('theme/epharma/css/vendor/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('theme/epharma/css/vendor/bootstrap/css/style.scss')}}">

    <link rel="stylesheet" href="{{ asset('theme/epharma/css/full-slider.css')}}">
    <link rel="stylesheet" href="{{ asset('theme/epharma/css/vendor/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{ asset('theme/epharma/css/vendor/animate/animate.min.css')}}">
    <link rel="stylesheet" href="{{ asset('theme/epharma/css/vendor/simple-line-icons/css/simple-line-icons.min.css')}}">
    <link rel="stylesheet" href="{{ asset('theme/epharma/css/vendor/owl.carousel/assets/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{ asset('theme/epharma/css/vendor/owl.carousel/assets/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{ asset('theme/epharma/css/vendor/magnific-popup/magnific-popup.min.css')}}">

    <link rel="stylesheet" href="{{ asset('theme/epharma/css/theme.css')}}">
    <link rel="stylesheet" href="{{ asset('theme/epharma/css/theme-elements.css')}}">
    <link rel="stylesheet" href="{{ asset('theme/epharma/css/theme-blog.css')}}">
    <link rel="stylesheet" href="{{ asset('theme/epharma/css/theme-shop.css')}}">

    <link rel="stylesheet" href="{{ asset('theme/epharma/css/vendor/rs-plugin/css/settings.css')}}">
    <link rel="stylesheet" href="{{ asset('theme/epharma/css/vendor/rs-plugin/css/layers.css')}}">
    <link rel="stylesheet" href="{{ asset('theme/epharma/css/vendor/rs-plugin/css/navigation.css')}}">
    <link rel="stylesheet" href="{{ asset('theme/epharma/css/jquery-ui.css') }}">

    <link rel="stylesheet" href="{{ asset('theme/epharma/css/skins/skin-shop-4.css')}}">

    <link rel="stylesheet" href="{{ asset('theme/epharma/css/demos/demo-shop-4.css')}}">

    <link rel="stylesheet" href="{{ asset('theme/epharma/css/custom.css')}}">
    <link rel="stylesheet" href="{{ asset('theme/epharma/css/custombox.min.css')}}">

    <script src="{{ asset('theme/epharma/css/vendor/modernizr/modernizr.min.js')}}"></script>
    <link href="{{asset('defaults/toastr/toastr.min.css')}}" rel="stylesheet" />

    <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
            n.callMethod.apply(n,arguments):n.queue.push(arguments)};
            if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
            n.queue=[];t=b.createElement(e);t.async=!0;
            t.src=v;s=b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t,s)}(window, document,'script',
                '../connect.facebook.net/en_US/fbevents.js');
            fbq('init', '625992064474392');
            fbq('track', 'PageView');
        </script>
        <noscript>
            <img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=625992064474392&amp;ev=PageView&amp;noscript=1"/>
        </noscript>

        <style>
            #header .header-logo img {
                height: 60px;
                margin: 0 0px 0 0;
                width: auto;
            }
            .container-fluid {
                padding-right: 0px;
                padding-left: 0px;
                margin-right: auto;
                margin-left: auto;
            }
            a.cus_pad {
                padding: 13px 10px !important;
            }
            .product .product-image-area .product-image img {
                height: 165px;
            }
            .fa{
                line-height: 30px;
            }

            #mask {
                position: absolute;
                left: 0;
                top: 0;
                z-index: 9000;
                background-color: #000;
                display: none;
            }

            #boxes .window {
                position: absolute;
                left: 0;
                top: 0;
                width: 440px;
                height: 200px;
                display: none;
                z-index: 9999;
                padding: 20px;
                border-radius: 15px;
                text-align: center;
            }

            #boxes #dialog {
                width: 750px;
                height: 200px;
                padding: 10px;
                background-color: #ffffff;
                font-family: 'Segoe UI Light', sans-serif;
                font-size: 15pt;
            }

            #popupfoot {
                font-size: 16pt;
                position: absolute;
                bottom: 20px;
                width: 250px;
                left: 250px;
            }
            .product .product-name {
                height: 35px;
            }

            .mobile-nav {   
             background-color: #DB5246;
            }

            .mobile-side-menu li a {
                font-size: 17px;
    line-height: 63px;

    box-shadow: 0px 2px 0px 0px;

            }
            .mobile-side-menu li .mmenu-toggle:after {
                line-height: 45px;
            }
            .mobile-side-menu li li a {
                line-height: 40px;
            }
        </style>

        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-122693227-1"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'UA-122693227-1');
        </script>
        <!-- Add cart -->
    </head>
    @php $total = 0 @endphp
    @if(session('cart'))
    @foreach(session('cart') as $id => $details)
    @php $total += $details['price'] * $details['quantity'] @endphp
    @endforeach
    @endif
    <body class="cart-box-body">

        <div class="cart-box">
            <div class="cart-items text-center">
                <span class="cart-count">0</span><span>&nbsp;Items</span>
                {{-- {{ count((array) session('cart')) }}<span>&nbsp;Items</span> --}}
            </div>
            <div class="cart-bag text-center">
                <i style="color: #FFF" class="fa fa-shopping-bag fa-2x"></i>
            </div>
            <div class="cart-amount"> 
                <span class="cart-amount-span">0</span>৳
            </div>
        </div>
        <div class="cart-box-view">
            <div class="cart-box-inner-view">
                <div class="cart-header">
                    <div class="col-sm-5">
                        <img class="header-bag" src="{{ asset('theme/epharma/img/shopping-bag.png')}}" /><strong><span class="cart-count"></span> Item</strong>
                    </div>
                    <img class="pull-right cart-hide-btn" style="margin-right: 10px; margin-top: 5px;" src="{{ asset('theme/epharma/img/x-button.png')}}" />

                    <div class="clearfix"></div>
                </div>
                <div class="cart-body text-center">
                    <p class="text-danger background-color-tertiary minimum-qty" style="padding: 5px 0; margin: 0; display: none;">You must order this minimum quantity for this product!</p>
                    <p class="text-danger background-color-tertiary minimum-amount" style="padding: 5px 0; margin: 0; display: none;"></p>
                    <div class="cart-table-wrap" style="padding: 0; border-radius: 0; margin-bottom: 0;">
                        {{-- Cart items table --}}
                        <table style="width: 100%; font-size: 11px;" class="cart-table" id="cart">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Product</th>
                                    <th style="width:22%;">Qty</th>
                                    <th>Subtotal</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>


                    <div class="clearfix"></div>
                </div>
                <div class="cart-footer">
                    <a href="{{ url('/checkout') }}" style="border-radius: 6px 0 0 6px;" class="btn btn-success pull-left">Order Now</a>
                    <input type="hidden" value="0" name="cart-total" /> 
                    <span style="border-radius: 0 6px 6px 0;" class="btn btn-info"><span class="cart-amount-span"></span>৳</span>
                    <a id="empty_cart_button" href="#">
                        <i style="color: #000; margin-right: 15px;" class="fa fa-shopping-cart fa-2x pull-right"></i>
                    </a>
                    <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="body">
            @php $menus = App\Menu::where('parent_id', '=', 0)->get(); @endphp
            <header id="header" data-plugin-options="{'stickyEnabled': true, 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': false, 'stickyStartAt': 75, 'stickySetTop': '-75px', 'stickyChangeLogo': true}">
                <div class="header-body">

                    <div class="header-container container">
                        <div class="header-row">
                            <div class="col-md-2 col-sm-6 col-xs-6 logo_border" style="padding-left: 0;">
                                <div class="header-logo">
                                    <a href="{{ url('/') }}">
                                        <img alt="Medicine Shop"
                                        @if($data->setting_logo != null) 
                                        src="{{asset($data->setting_logo)}}" 
                                        @else 
                                        src="{{ asset('theme/epharma/img/mslogo.png')}}" 
                                        @endif>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-6">
                                <div class="row">
                                    <div class="header-search hidden-sm hidden-xs">
                                        <p style="color: #DFFF00; /*box-shadow: 2px 2px 5px 1px; */ display: block;  font-size: 20px; margin: 0; line-height: 40px; padding-left: 20px;">@if($data->header_title != null) {{ $data->header_title }} @endif</p>
                                    </div>
                                    <a href="#" class="mmenu-toggle-btn" title="Toggle menu">
                                        <i class="fa fa-bars"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-5 hidden-sm hidden-xs">
                                <div class="row">
                                    <div class="cart-area" style="margin-top: 0;">
                                        <div class="custom-block" style="line-height: 38px;">
                                            <div class="row">
                                                @if($data->header_phone1 != null)
                                                <i class="fa fa-phone" style="line-height: 25px;"></i>
                                                <span> {{ $data->header_phone1 }}</span>
                                                @endif
                                                @if($data->header_phone2 != null)
                                                <i class="fa fa-phone" style="line-height: 25px; margin-left: 20px;"></i>
                                                <span> {{ $data->header_phone2 }}</span>
                                                @endif
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="header-container header-nav">
                        <div class="container" style="padding-left: 0px;padding-right: 0px;">
                            <div class="header-nav-main">
                                <nav>
                                    <ul class="nav nav-pills" id="mainNav">
                                        @foreach($menus as $menu)
                                        <li style="margin-top: 2px;" class="dropdown dropdown-mega-small">
                                            <a href="{{ url('/') }}/category/{{ $menu->category_id }}" class="{{ count($menu->childs) ? 'dropdown-toggle' :'cus_pad' }}">
                                                <i style="line-height: 0; margin-right: 3px; margin-top: -1px;" class="{{ $menu->class }}"></i>{{ $menu->title }}
                                            </a>
                                            <ul class="dropdown-menu {{ count($menu->childs) ? '' :'hide' }}">
                                                <li>
                                                    <div class="dropdown-mega-content dropdown-mega-content-small">
                                                        <div class="row">
                                                            <div class="col-md-7">
                                                                <div class="row">
                                                                    <ul class="dropdown-mega-sub-nav">
                                                                        @if(count($menu->childs))
                                                                        @include('menu.menusub',['childs' => $menu->childs])
                                                                        @endif
                                                                        {{-- <div class="col-md-6">
                                                                            <li><a href="category/8.html">Skin Care</a></li>
                                                                        </div> --}}
                                                                        {{-- <div class="col-md-6">
                                                                            <li><a href="category/95.html">Skin Care (Bioderma)</a></li>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <li><a href="category/95.html">Beauty Care</a></li>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <li><a href="category/10.html">Eye &amp; Ear Care</a></li>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <li><a href="category/84.html">Hair Care</a></li>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <li><a href="category/33.html">Oral Care</a></li>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <li><a href="category/100.html">Food Supplements</a></li>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <li><a href="category/94.html">Weight maintenance</a></li>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <li><a href="category/42.html">Herbal</a></li>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <li><a href="category/45.html">Adult Diaper</a></li>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <li><a href="category/37.html">Healthcare Accessories</a></li>
                                                                        </div> --}}
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            @if(!empty($menu->default_image))
                                                            {{-- <div class="col-md-5 mega -banner-bg">
                                                                <img src="{{asset($menu->default_image)}}" alt="Banner bg">
                                                            </div> --}}

                                                            <div class="col-md-5 mega -banner-bg">
                                                                <img src="{{asset($menu->default_image)}}" alt="Banner bg" style="height: 220px; width:210px;">
                                                            </div>

                                                            @endif
                                                        </div>
                                                    </div>
                                                </li>
                                                <div class="clearfix"></div>
                                            </ul>
                                            <div class="clearfix"></div>
                                        </li>
                                        @endforeach
                                        {{-- <li style="margin-top: 2px;" class="dropdown dropdown-mega-small">
                                            <a href="category/86.html" class="dropdown-toggle">
                                                <i style="line-height: 0; margin-right: 3px; margin-top: -1px;" class="fa fa-archive"></i>Diabetic Care
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <div class="dropdown-mega-content dropdown-mega-content-small">
                                                        <div class="row">
                                                            <div class="col-md-7">
                                                                <div class="row">
                                                                    <ul class="dropdown-mega-sub-nav">
                                                                        <div class="col-md-6">
                                                                            <li><a href="category/22.html">Diabetic Medicines</a></li>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <li><a href="category/88.html">Glucose Meter</a></li>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <li><a href="category/86.html">Insulin Pen(Onetime)</a></li>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <li><a href="category/85.html">Insulin Pen(Reusable)</a></li>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <li><a href="category/87.html">Insulin Cartidge</a></li>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <li><a href="category/90.html">Insulin Vial</a></li>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <li><a href="category/89.html">Lancets</a></li>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <li><a href="category/91.html">Needle</a></li>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <li><a href="category/93.html">Strips</a></li>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <li><a href="category/38.html">Diabetic Accessories</a></li>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <li><a href="category/37.html">Healthcare Accessories</a></li>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <li><a href="category/100.html">Supplements</a></li>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <li><a href="category/44.html">Surgical</a></li>
                                                                        </div>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-5 mega -banner-bg">
                                                                <img src="{{ asset('storage/menu_image/diabetic_care.jpg')}}" alt="Banner bg">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <div class="clearfix"></div>
                                            </ul>
                                            <div class="clearfix"></div>
                                        </li>
                                        <li style="margin-top: 2px;" class="dropdown dropdown-mega-small">
                                            <a href="category/39.html" class="dropdown-toggle">
                                                <i style="line-height: 0; margin-right: 3px; margin-top: -1px;" class="fa fa-medkit"></i>Health Conditions
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <div class="dropdown-mega-content dropdown-mega-content-small">
                                                        <div class="row">
                                                            <div class="col-md-7">
                                                                <div class="row">
                                                                    <ul class="dropdown-mega-sub-nav">
                                                                        <div class="col-md-6">
                                                                            <li><a href="category/49.html">Anxiety</a></li>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <li><a href="category/51.html">Asthma</a></li>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <li><a href="category/55.html">Anaemia</a></li>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <li><a href="category/71.html">Blood Colt</a></li>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <li><a href="category/73.html">Bone Metabolism</a></li>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <li><a href="category/19.html">Cancer</a></li>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <li><a href="category/20.html">Cough &amp; Cold</a></li>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <li><a href="category/69.html">Constipation</a></li>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <li><a href="category/21.html">Depresson</a></li>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <li><a href="category/23.html">Diarrhoea</a></li>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <li><a href="category/22.html">Diabetes</a></li>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <li><a href="category/75.html">Fever</a></li>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <li><a href="category/52.html">Gastro</a></li>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <li><a href="category/47.html">Gout</a></li>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <li><a href="category/26.html">Heart Failure</a></li>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <li><a href="category/27.html">Cholesterol</a></li>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <li><a href="category/94.html">Weight maintenance</a></li>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <li><a href="category/28.html">Hypertension</a></li>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <li><a href="category/29.html">Infection</a></li>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <li><a href="category/30.html">Kidney</a></li>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <li><a href="category/53.html">Allergies</a></li>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <li><a href="category/31.html">Malarial</a></li>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <li><a href="category/32.html">Nasal</a></li>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <li><a href="category/34.html">Pain</a></li>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <li><a href="category/35.html">Vaccines</a></li>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <li><a href="category/56.html">Vomitting</a></li>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <li><a href="category/48.html">Hormonal</a></li>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <li><a href="category/50.html">Muscle Cramps</a></li>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <li><a href="category/70.html">Muscle Spasm</a></li>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <li><a href="category/54.html">Fungal</a></li>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <li><a href="category/56.html">Vomitting</a></li>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <li><a href="category/57.html">Pyrexia</a></li>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <li><a href="category/58.html">Scabies</a></li>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <li><a href="category/67.html">Urinary Retention</a></li>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <li><a href="category/68.html">Malarial</a></li>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <li><a href="category/74.html">Migraine</a></li>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <li><a href="category/64.html">Viral</a></li>
                                                                        </div>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-5 mega -banner-bg">
                                                                <img src="{{ asset('storage/menu_image/health_condition.jpg')}}" alt="Banner bg">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <div class="clearfix"></div>
                                            </ul>
                                            <div class="clearfix"></div>
                                        </li>
                                        <li style="margin-top: 2px;" class="dropdown dropdown-mega-small">
                                            <a href="category/102.html" class="dropdown-toggle">
                                                <i style="line-height: 0; margin-right: 3px; margin-top: -1px;" class="fa fa-female"></i>Women Care
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <div class="dropdown-mega-content dropdown-mega-content-small">
                                                        <div class="row">
                                                            <div class="col-md-7">
                                                                <div class="row">
                                                                    <ul class="dropdown-mega-sub-nav">
                                                                        <div class="col-md-6">
                                                                            <li><a href="category/46.html">Sanitary Pad</a></li>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <li><a href="category/40.html">Birth Control</a></li>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <li><a href="category/45.html">Adult Diapers</a></li>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <li><a href="category/95.html">Beauty Care</a></li>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <li><a href="category/8.html">Skin Care</a></li>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <li><a href="category/95.html">Skin Care -Bioderma</a></li>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <li><a href="category/84.html">Hair Care</a></li>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <li><a href="category/99.html">Pregnancy Test</a></li>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <li><a href="category/100.html">Food Supplements</a></li>
                                                                        </div>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-5 mega -banner-bg">
                                                                <img src="{{ asset('storage/menu_image/women_care.jpg')}}" alt="Banner bg">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <div class="clearfix"></div>
                                            </ul>
                                            <div class="clearfix"></div>
                                        </li>
                                        <li style="margin-top: 2px;" class="dropdown dropdown-mega-small">
                                            <a href="category/6.html" class="dropdown-toggle">
                                                <i style="line-height: 0; margin-right: 3px; margin-top: -1px;" class="fa fa-child"></i>Baby Care
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <div class="dropdown-mega-content dropdown-mega-content-small">
                                                        <div class="row">
                                                            <div class="col-md-7">
                                                                <div class="row">
                                                                    <ul class="dropdown-mega-sub-nav">
                                                                        <div class="col-md-6">
                                                                            <li><a href="category/11.html">Baby Diapers</a></li>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <li><a href="category/12.html">Baby Wipes</a></li>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <li><a href="category/13.html">Baby Milk</a></li>
                                                                        </div>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-5 mega -banner-bg">
                                                                <img src="{{ asset('storage/menu_image/baby_care.jpg')}}" alt="Banner bg">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <div class="clearfix"></div>
                                            </ul>
                                            <div class="clearfix"></div>
                                        </li>
                                        <li style="margin-top: 2px;" class="dropdown dropdown-mega-small">
                                            <a href="category/43.html" class="dcss">
                                                <i style="line-height: 0; margin-right: 3px; margin-top: -1px;" class="fa fa-heart"></i>Sexual Wellness
                                            </a>
                                            <div class="clearfix"></div>
                                        </li>
                                        <li>
                                            <a href="product-inquiry.html">
                                                <i class="fa fa-pencil-square-o"></i>
                                                Request Product
                                            </a>
                                        </li> --}}
                                        @guest
                                        <li class="pull-right">
                                            <a href="{{route('user.login')}}">
                                                <i class="fa fa-user-circle"></i>
                                                Login
                                            </a>
                                        </li>
                                        @else
                                        <li class="pull-right">
                                            <a class="text-primary" href="{{ route('logout') }}" onclick="event.preventDefault();  document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i> Logout</a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </li>
                                        <li class="pull-right">
                                            <a href="{{route('user.dashboard')}}">
                                                <i class="fa fa-user-circle"></i>
                                                My Account
                                            </a>
                                        </li>
                                        @endguest
                                        {{-- <li class="pull-right">
                                            <a href="{{url('refill-request')}}">
                                                <i class="fa fa-pencil-square-o"></i>
                                                Refill Request
                                            </a>
                                        </li>
                                        <li class="pull-right">
                                            <a href="{{url('prescription-upload')}}">
                                                <i class="fa fa-pencil-square-o"></i>
                                                Request Product
                                            </a>
                                        </li> --}}
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <div class="mobile-nav">
                <div class="mobile-nav-wrapper">
                    <ul class="mobile-side-menu">
                        @foreach($menus as $menu)
                        <li>
                            <span class="{{ count($menu->childs) ? 'mmenu-toggle' :'' }}"></span>
                            <a href="{{ url('/') }}/category/{{ $menu->category_id }}"><i style="line-height: 0; margin-right: 3px; margin-top: -1px;" class="{{ $menu->class }}"></i>{{ $menu->title }}</a>
                            <ul class="{{ count($menu->childs) ? '' :'hide' }}">
                                @if(count($menu->childs))
                                @include('menu.menusub',['childs' => $menu->childs])
                                @endif
                                {{-- <li><a href="category/8.html">Skin Care</a></li> --}}
                                
                                {{-- <li><a href="category/95.html">Skin Care (Bioderma)</a></li>
                                <li><a href="category/95.html">Beauty Care</a></li>
                                <li><a href="category/10.html">Eye &amp; Ear Care</a></li>
                                <li><a href="category/84.html">Hair Care</a></li>
                                <li><a href="category/33.html">Oral Care</a></li>
                                <li><a href="category/100.html">Food Supplements</a></li>
                                <li><a href="category/94.html">Weight maintenance</a></li>
                                <li><a href="category/42.html">Herbal</a></li>
                                <li><a href="category/45.html">Adult Diaper</a></li>
                                <li><a href="category/37.html">Healthcare Accessories</a></li> --}}
                            </ul>
                        </li>
                        @endforeach
                        {{-- <li>
                            <span class="mmenu-toggle"></span>
                            <a href="category/86.html"><i style="line-height: 0; margin-right: 3px; margin-top: -1px;" class="fa fa-archive"></i>Diabetic Care</a>
                            <ul>
                                <li><a href="category/22.html">Diabetic Medicines</a></li>
                                <li><a href="category/88.html">Glucose Meter</a></li>
                                <li><a href="category/86.html">Insulin Pen(Onetime)</a></li>
                                <li><a href="category/85.html">Insulin Pen(Reusable)</a></li>
                                <li><a href="category/87.html">Insulin Cartidge</a></li>
                                <li><a href="category/90.html">Insulin Vial</a></li>
                                <li><a href="category/89.html">Lancets</a></li>
                                <li><a href="category/91.html">Needle</a></li>
                                <li><a href="category/93.html">Strips</a></li>
                                <li><a href="category/38.html">Diabetic Accessories</a></li>
                                <li><a href="category/37.html">Healthcare Accessories</a></li>
                                <li><a href="category/100.html">Supplements</a></li>
                                <li><a href="category/44.html">Surgical</a></li>
                            </ul>
                        </li>
                        <li>
                            <span class="mmenu-toggle"></span>
                            <a href="category/39.html"><i style="line-height: 0; margin-right: 3px; margin-top: -1px;" class="fa fa-medkit"></i>Health Conditions</a>
                            <ul>
                                <li><a href="category/49.html">Anxiety</a></li>
                                <li><a href="category/51.html">Asthma</a></li>
                                <li><a href="category/55.html">Anaemia</a></li>
                                <li><a href="category/71.html">Blood Colt</a></li>
                                <li><a href="category/73.html">Bone Metabolism</a></li>
                                <li><a href="category/19.html">Cancer</a></li>
                                <li><a href="category/20.html">Cough &amp; Cold</a></li>
                                <li><a href="category/69.html">Constipation</a></li>
                                <li><a href="category/21.html">Depresson</a></li>
                                <li><a href="category/23.html">Diarrhoea</a></li>
                                <li><a href="category/22.html">Diabetes</a></li>
                                <li><a href="category/75.html">Fever</a></li>
                                <li><a href="category/52.html">Gastro</a></li>
                                <li><a href="category/47.html">Gout</a></li>
                                <li><a href="category/26.html">Heart Failure</a></li>
                                <li><a href="category/27.html">Cholesterol</a></li>
                                <li><a href="category/94.html">Weight maintenance</a></li>
                                <li><a href="category/28.html">Hypertension</a></li>
                                <li><a href="category/29.html">Infection</a></li>
                                <li><a href="category/30.html">Kidney</a></li>
                                <li><a href="category/53.html">Allergies</a></li>
                                <li><a href="category/31.html">Malarial</a></li>
                                <li><a href="category/32.html">Nasal</a></li>
                                <li><a href="category/34.html">Pain</a></li>
                                <li><a href="category/35.html">Vaccines</a></li>
                                <li><a href="category/56.html">Vomitting</a></li>
                                <li><a href="category/48.html">Hormonal</a></li>
                                <li><a href="category/50.html">Muscle Cramps</a></li>
                                <li><a href="category/70.html">Muscle Spasm</a></li>
                                <li><a href="category/54.html">Fungal</a></li>
                                <li><a href="category/56.html">Vomitting</a></li>
                                <li><a href="category/57.html">Pyrexia</a></li>
                                <li><a href="category/58.html">Scabies</a></li>
                                <li><a href="category/67.html">Urinary Retention</a></li>
                                <li><a href="category/68.html">Malarial</a></li>
                                <li><a href="category/74.html">Migraine</a></li>
                                <li><a href="category/64.html">Viral</a></li>
                            </ul>
                        </li>
                        <li>
                            <span class="mmenu-toggle"></span>
                            <a href="category/102.html"><i style="line-height: 0; margin-right: 3px; margin-top: -1px;" class="fa fa-female"></i>Women Care</a>
                            <ul>
                                <li><a href="category/46.html">Sanitary Pad</a></li>
                                <li><a href="category/40.html">Birth Control</a></li>
                                <li><a href="category/45.html">Adult Diapers</a></li>
                                <li><a href="category/95.html">Beauty Care</a></li>
                                <li><a href="category/8.html">Skin Care</a></li>
                                <li><a href="category/95.html">Skin Care -Bioderma</a></li>
                                <li><a href="category/84.html">Hair Care</a></li>
                                <li><a href="category/99.html">Pregnancy Test</a></li>
                                <li><a href="category/100.html">Food Supplements</a></li>
                            </ul>
                        </li>
                        <li>
                            <span class="mmenu-toggle"></span>
                            <a href="category/6.html"><i style="line-height: 0; margin-right: 3px; margin-top: -1px;" class="fa fa-child"></i>Baby Care</a>
                            <ul>
                                <li><a href="category/11.html">Baby Diapers</a></li>
                                <li><a href="category/12.html">Baby Wipes</a></li>
                                <li><a href="category/13.html">Baby Milk</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="category/43.html"><i style="line-height: 0; margin-right: 3px; margin-top: -1px;" class="fa fa-heart"></i>Sexual Wellness</a>
                        </li> --}}
                        {{-- <li>
                            <a href="{{url('prescription-upload')}}">
                                <i style="line-height: 0; margin-right: 3px; margin-top: -1px;" class="fa fa-clipboard-list"></i>
                                Request Product
                            </a>
                        </li>
                        <li>
                            <a href="{{url('prescription-upload')}}">
                                Upload Prescription
                            </a>
                        </li> --}}
                        @guest
                        <li>
                            <a href="{{route('user.login')}}">
                                <i class="fa fa-user-circle"></i>
                                Login
                            </a>
                        </li>
                        @else
                        <li>
                            <a class="text-primary" href="{{ route('logout') }}" onclick="event.preventDefault();  document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i> Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                        <li>
                            <a href="{{route('user.dashboard')}}">
                                <i class="fa fa-user-circle"></i>
                                My Account
                            </a>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>

            <div id="mobile-menu-overlay"></div>
            {{-- ////////////// search and upload prescription area starts --}}
            
            {{-- ////////////// search and upload prescription area ends --}}

            @yield('content')

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

                #footer .contact li {
                padding: 2px 0;
                line-height: 1.5;
                margin-bottom: 0px;
              }

              #footer h4 {
                font-size: 16px;
                font-weight: 400;
                margin-bottom: 9px;
            }

            @media (max-width: 991px)
#footer .footer-copyright .footer-payment {
    margin-bottom: 0px;
    margin-left: auto;
    margin-right: auto;
}




            </style>
            <footer id="footer">
                <div class="container">
                    <div class="row">
                        <div class="footer-ribbon">
                            <span>Get in Touch</span>
                        </div>
                        <div class="col-md-3" style="margin-bottom: 3px;">
                            <div class="contact-details">
                                <h4>Contact Information</h4>
                                <ul class="contact">
                                    @if($data->header_phone1 != null)
                                    <li><p><i class="fa fa-phone"></i> <strong>Phone:</strong><br> {{ $data->header_phone1 }}</p></li>
                                    @endif
                                    @if($data->header_phone2 != null)
                                    <li><span style='margin-left: 24px'>{{ $data->header_phone2 }}</span> </li>
                                    @endif
                                    @if($data->email != null)
                                    <li><p><i class="fa fa-envelope-o"></i> <strong>Email:</strong><br> <a href="mailto:{{ $data->email }}"><span class="__cf_email__">{{ $data->email }}</span></a></p></li>
                                    @endif
                                    @if($data->working_hour != null)
                                    <li><p><i class="fa fa-clock-o"></i> <strong>Delivery Days/Hours:</strong><br> {{ $data->working_hour }}</p></li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3" style="margin-bottom: 3px;">
                            <h4>Footer Menu</h4>
                            <div class="tagcloud">
                                <ul>
                                    <li><i class="fa fa-meetup"></i>&nbsp;<a href="{{url('how-to-order')}}">How To Order</a></li>
                                    <li><i class="fa fa-meetup"></i>&nbsp;<a href="{{url('policy')}}">Policy</a></li>
                                    {{-- <li><i class="fa fa-meetup"></i>&nbsp;<a href="{{url('news')}}">News</a></li> --}}
                                    <li><i class="fa fa-meetup"></i>&nbsp;<a href="{{url('about-us')}}">About Us</a></li>
                                    <li><i class="fa fa-meetup"></i>&nbsp;<a href="{{url('contact-us')}}">Contact Us</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3" style="margin-bottom: 3px;">
                            <h4 style="margin-left: 40px;">Mobile App</h4>
                            {{-- <a target="_blank" href="#">
                                <img src="{{ asset('theme/epharma/img/google_play1.png')}}" alt="Dawn" />
                            </a>
                            <a target="_blank" href="#" style="margin-right: 30px;">
                                <img style="height:120px;width:300px;" src="{{ asset('theme/epharma/img/ios.png')}}" alt="Epharma" />
                            </a> --}}
                            <a target="_blank" href="#">
                                <img style="height: 150px;width:220px;" src="{{ asset('theme/epharma/img/app.png')}}" alt="Epharma" />
                            </a>
                        </div>
                        <div class="col-md-3" style="margin-bottom: 3px;">
                            <div class="newsletter">
                                <h4>Follow Us</h4>
                                <ul class="social-icons">
                                    @if($data->footer_social_link1 != null)
                                    <li class="social-icons-facebook" style="color: #9e9e9e;">
                                        <a href="{{ $data->footer_social_link1 }}" target="_blank" title="Facebook"><i class="fa fa-facebook"></i></a>
                                    </li>
                                    @endif
                                    @if($data->footer_social_link2 != null)
                                    <li class="social-icons-linkedin"><a href="{{ $data->footer_social_link2 }}" target="_blank" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
                                    @endif
                                    @if($data->footer_social_link3 != null)
                                    <li class="social-icons-youtube"><a href="{{ $data->footer_social_link3 }}" target="_blank" title="Youtub"><i class="fa fa-youtube"></i></a></li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer-copyright">
                    <div class="container">
                        
                        @if($data->setting_logo != null)
                        <a href="{{ url('/') }}" class="logo" style="margin-right: 20px; margin-top:-29px;">
                            <img style="width: 200px;" alt="ePharma" class="img-responsive" 
                            @if($data->setting_logo != null) 
                            src="{{asset($data->setting_logo)}}" 
                            @else 
                            src="{{ asset('theme/epharma/img/mslogo.png')}}" 
                            @endif
                            >
                        </a>
                        @endif
                        <img style="height:60px;" alt="Payments" src="{{ asset('theme/epharma/img/Logo.wine.png')}}" class="footer-payment">
                        @if($data->footer_copyright != null)
                        <p class="copyright-text">{!! $data->footer_copyright !!}</p>
                        @endif
                    
                    </div>
                </div>
                </div>
            </footer>
        </div>
    </div>

        <script data-cfasync="false" src="cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="{{ asset('theme/epharma/css/vendor/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('theme/epharma/css/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('theme/epharma/css/vendor/jquery.appear/jquery.appear.min.js') }}"></script>
        <script src="{{ asset('theme/epharma/css/vendor/jquery.easing/jquery.easing.min.js') }}"></script>
        <script src="{{ asset('theme/epharma/css/vendor/jquery-cookie/jquery-cookie.min.js') }}"></script>
        <script src="{{ asset('theme/epharma/css/vendor/common/common.min.js') }}"></script>
        <script src="{{ asset('theme/epharma/css/vendor/jquery.validation/jquery.validation.min.js') }}"></script>
        <script src="{{ asset('theme/epharma/css/vendor/jquery.easy-pie-chart/jquery.easy-pie-chart.min.js') }}"></script>
        <script src="{{ asset('theme/epharma/css/vendor/jquery.gmap/jquery.gmap.min.js') }}"></script>
        <script src="{{ asset('theme/epharma/css/vendor/jquery.lazyload/jquery.lazyload.min.js') }}"></script>
        <script src="{{ asset('theme/epharma/css/vendor/isotope/jquery.isotope.min.js') }}"></script>
        <script src="{{ asset('theme/epharma/css/vendor/owl.carousel/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('theme/epharma/css/vendor/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
        <script src="{{ asset('theme/epharma/css/vendor/vide/vide.min.js') }}"></script>
        <script src="{{ asset('theme/epharma/js/select2.min.js') }}"></script>
        

        <script src="{{ asset('theme/epharma/js/theme.js') }}"></script>
        <script src="{{ asset('theme/epharma/css/vendor/rs-plugin/js/jquery.themepunch.tools.min.js') }}"></script>
        <script src="{{ asset('theme/epharma/css/vendor/rs-plugin/js/jquery.themepunch.revolution.min.js') }}"></script>

        <script src="{{ asset('theme/epharma/js/views/view.contact.js') }}"></script>
        <script src="{{ asset('theme/epharma/css/vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.js') }}"></script>
        <script src="{{ asset('theme/epharma/css/vendor/elevatezoom/jquery.elevatezoom.js') }}"></script>

        <script src="{{ asset('theme/epharma/js/demos/demo-shop-4.js') }}"></script>

        <script src="{{ asset('theme/epharma/js/custom.js') }}"></script>

        <script src="{{ asset('theme/epharma/js/theme.init.js') }}"></script>
        <script src="{{ asset('theme/epharma/js/jquery.star-rating-svg.js') }}"></script>

        <script src="{{ asset('theme/epharma/js/jquery-ui.js') }}"></script>
        <script src="{{ asset('theme/epharma/js/jquery.easy-autocomplete.min.js') }}"></script>
        <link rel="stylesheet" href="{{ asset('theme/epharma/css/easy-autocomplete.min.js') }}">
        <link rel="stylesheet" href="{{ asset('theme/epharma/css/easy-autocomplete.themes.min.js') }}">
        <script type="text/javascript" src="{{ asset('theme/epharma/social-share/jssocials.min.js') }}"></script>
        <link rel="stylesheet" type="text/css" 
        href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
        <script>
          @if(Session::has('message'))
          toastr.options =
          {
            "closeButton" : true,
            "progressBar" : true
        }
        toastr.success("{{ session('message') }}");
        @endif

        @if(Session::has('error'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
        toastr.error("{{ session('error') }}");
        @endif

        @if(Session::has('info'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
        toastr.info("{{ session('info') }}");
        @endif

        @if(Session::has('warning'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
        toastr.warning("{{ session('warning') }}");
        @endif
    </script>
    {{-- ////////////////////////Autocomplete search --}}
    <script type="text/javascript">
        $( function() {
            src = "{{ route('searchproductajax') }}";
            $( "#search_text" ).autocomplete({
              source: function(request, response){
                $.ajax({
                    url: src,
                    data: {
                        term: request.term
                    },
                    dataType: "json",
                    success: function(data) {
                        response(data);
                    }
                });
              },
              minLength: 1,
            });

            $(document).on('click','.ui-menu-item', function() {
                $('#search-form').submit();
            });
        } );
    </script>



    <script>
        //Cart Qty
        function cartCount() {
            $.ajax({
                url: "{{ url('cart-count') }}",
                success: function(data) {
                    $('.cart-count').html(data);
                    if(data==0||null){
                        $('.empty-cart').attr('style', "display:block");
                    } else {
                        $('.empty-cart').attr('style', "display:none");
                    }
                }
            })
        }

        //Wishlist
        function wishlistCount() {
            $.ajax({
                url: "{{ url('/wishlist/count') }}",
                success: function(data) {
                    $('.wishlistCount').html(data);
                }
            })
        }
        //Cart total
        function cartTotal() {
            $.ajax({
                url: "{{ url('cart-total') }}",
                success: function(data) {
                    $('.cart-amount-span').html(data);
                    $('.amnt_total').html(data);
                    $('.grand-total').html(data);
                }
            })
        }
        function cartData() {
            $.ajax({
                url: "{{ url('/cart-data') }}",
                success: function(response) {
                    var name = response;
                    var APP_URL = {!! json_encode(url('/')) !!};
                    table = ""; 
                    jQuery.each(name, function(i,data) {
                        table += ("<tr data-id='"+ i +"'><td data-th='Product'><img style='width: 30px; border: 1px solid skyblue; border-radius: 5px;' src='"+ APP_URL + data.image +"'>"+"</td><td data-th='Product'><span class='text-primary'>"+ data.name +"</span><br><strong style='font-size: 11px;'>"+ data.price +"৳</strong></td><td data-th='Quantity'><input type='number' min='1' id='quantity' value='"+ data.quantity +"' class='form-control quantity update-cart' /></td><td data-th='Subtotal' class='text-center'>"+ data.price * data.quantity +"৳</td><td class='actions' data-th=''><button class='text-danger remove-from-cart'><i class='fa fa-trash-o'></i></button></td></tr>");
                    });
                    $("#cart tbody").html(table);
                }
            })
        }
        cartData();
        cartCount();
        cartTotal();
    </script>


    <script type="text/javascript">
        $(document).ready(function () {
            $("#cart").on("click", ".remove-from-cart", function(e){
                e.preventDefault();
                var ele = $(this);
                if(confirm("Are you sure want to remove?")) {
                    $.ajax({
                        url: '{{ route('remove.from.cart') }}',
                        method: "DELETE",
                        data: {
                            _token: '{{ csrf_token() }}', 
                            id: ele.parents("tr").attr("data-id")
                        },
                        success: function (response) {
                            cartData();
                            cartTotal();
                            cartCount();
                            if ($.isEmptyObject(response.error)) {
                                toastr.success(response.success, 'Success', {
                                    timeOut: 3000
                                });
                            } else {
                                toastr.error(response.error, {
                                    timeOut: 3000
                                });
                            }
                        }
                    });
                }
            });

            $("#cart").on("change", ".update-cart", function(e){
                e.preventDefault();
                var ele = $(this);
                $.ajax({
                    url: '{{ route('update.cart') }}',
                    method: "patch",
                    data: {
                        _token: '{{ csrf_token() }}', 
                        id: ele.parents("tr").attr("data-id"), 
                        quantity: ele.parents("tr").find(".quantity").val()
                    },
                    success: function (response) {
                        cartData();
                        cartTotal();
                        cartCount();
                        if ($.isEmptyObject(response.error)) {
                            toastr.success(response.success, 'Success', {
                                timeOut: 3000
                            });
                        } else {
                            toastr.error(response.error, {
                                timeOut: 3000
                            });
                        }
                    }
                });
            });
        });
    </script>
    <script>


        $(document).on('click', '.addcart', function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            $.ajax({
                url: "{{ url('add-to-cart') }}/" + id,
                method: "GET",
                dataType: "JSON",
                beforeSend:function(){
                    $('.addcart'+ id).html('<i class="fa fa-spinner fa-spin"></i> Loading....');
                },
                complete:function(){
                    $('.addcart'+ id).html('Add To Bag');
                },
                success: function(data) {
                    cartData();
                    cartTotal();
                    cartCount();
                    if ($.isEmptyObject(data.error)) {
                        toastr.success(data.success, 'Success', {
                            timeOut: 3000
                        });
                    } else {
                        toastr.error(data.error, {
                            timeOut: 3000
                        });
                    }
                    
                },
                
            });
        });
    </script>

    <script>
        $(function() {
            $(document).on('change', '#division_id', function() {
                var division_id = $(this).val();
            // alert(division_id);
            $.ajax({
                type: "Get",
                url: "{{url('/get/division/')}}/" + division_id,
                dataType: "json",
                success: function(data) {
                    var html = '<option value="">Select Area</option>';
                    $.each(data, function(key, val) {
                        html += '<option value="' + val.id + '">' + val.district_name + '</option>';
                    });
                    $('#district_id').html(html);
                },

            });
        });
        });
    </script>

    <script>

        $(document).ready(function () {

            $('input[name="payment_method"]:radio').change(function () {
                var check_value = $('.payment-card-check:checked').val();
                if(check_value == "bkash"){
                    $('#bkash_number').attr('style', "display:block");
                } else {
                  $('#bkash_number').attr('style', "display:none");
              }
          });

            

            var id = '#dialog';
    //Get the screen height and width
    var maskHeight = $(document).height();
    var maskWidth = $(window).width();

    //Set heigth and width to mask to fill up the whole screen
    $('#mask').css({'width':maskWidth,'height':maskHeight});

    //transition effect
    $('#mask').fadeIn(500);
    $('#mask').fadeTo("slow",0.9); 

    //Get the window height and width
    var winH = $(window).height();
    var winW = $(window).width();

    //Set the popup window to center
    $(id).css('top',  winH/18-$(id).height()/18);
    $(id).css('left', winW/2-$(id).width()/2);

    //transition effect
    $(id).fadeIn(2000);  

    //if close button is clicked
    $('.window .close').click(function (e) {

    //Cancel the link behavior
    e.preventDefault();
    $('#mask').hide();
    $('.window').hide();
});

    //if mask is clicked
    $('#mask').click(function () {
        $(this).hide();
        $('.window').hide();
    });

    $('.select2').select2();

    $('.product-actions .btn-cart').on('click', function (e) {
        e.preventDefault();


        var checkLink = window.location;
        var conLink = "index.html";
        var qty = $('input[name=qty]').val();
        var id = $('input[name=id]').val();
        var price = $('input[name=price]').val();
        var token = $('input[name=_token]').val();
        var minQty = $('#minQty').val();
        if (minQty > qty) {
            alert('You must add minmum' + minQty + ' quntity!');
        } else {
            $.ajax({
                type: "POST",
                url: "https://epharma.com.bd/add-to-cart",
                data: {id: id, qty: qty, price: price, _token: token},
                success: function (res) {
                    var savedAmount = res.originalTotal - res.total;
//                window.location.href = checkLink;
$('span.saved-amount').text('৳ ' + savedAmount.toFixed(1));
$('span.cart-count').text(res.count);
$('span.cart-amount-span').text('৳ ' + res.total);
$('input[name = cart-total]').val(res.total);
var i = 0;
var table = '<table style="width: 100%; font-size: 11px;" class="cart-table">';
                    // NOTE!  I changed 'object' to 'value' here
                    // NOTE 2!  We added a JSON.parse on the 'data' variable to convert from JSON to JavaScript objects.
//                $.each(JSON.parse(res.content), function (key, value) {
    jQuery.each(res.content, function (key, value) {

        var subTotal = value.qty * value.price;

        var originalPrice = value.options.productPrice;

        var originalPriceTotal = value.options.productPrice * value.qty;
                        // We need to access the value variable in this loop because 'data' is the original array that we were iterating!
                        table += ('<tr>');
                        var path = "storage/index.html";
                        var imageUrl = path + "/" + value.options.img;
                        table += ('<td><img style="width: 30px; border: 1px solid skyblue; border-radius: 5px;" src="' + imageUrl + '"></td>');
                        if (originalPrice == value.price) {
                            table += ('<td><span class="text-primary">' + value.name + '</span><br><strong style="font-size: 11px;">৳ ' + originalPrice + '</strong></td>');
                        }else{
                            table += ('<td><span class="text-primary">' + value.name + '</span><br><del style="font-size: 11px; margin-right: 5px;">৳ '+ originalPrice +'</del><strong style="font-size: 11px;">৳ ' + value.price + '</strong></td>');
                        }
                        table += ('<td style="font-size: 13px; vertical-align: middle; padding: 8px 0;"><div class="qty-holder" style="width: 90px;"><a href="#" class="qty-dec-btn" rowId="' + value.rowId + '" title="Dec" style="width: 22px;">-</a><input style="width: 22px !important;" type="text" name="product_qty" id="product_qty" class="qty-input" value="' + value.qty + '"><a href="#" class="qty-inc-btn" rowId="' + value.rowId + '" title="Inc" style="width: 22px;">+</a></div></td>');
//                    if(originalPriceTotal == subTotal){
//                        table += ('<td><span><del>৳ '+ originalPriceTotal.toFixed(1) +'</del></span><br><span class="text-danger">৳ ' + subTotal.toFixed(1) + '</span></td>');
//                    else{
//                        table += ('<td><span class="text-danger">৳ ' + subTotal.toFixed(1) + '</span></td>');
//                    }
if (originalPriceTotal.toFixed(1) != subTotal.toFixed(1)) {
    table += ('<td><span class="text-primary"><del>৳ ' + originalPriceTotal.toFixed(1) + '</del></span><br><span class="text-danger">৳ ' + subTotal.toFixed(1) + '</span></td>');
} else {
    table += ('<td style="vertical-align: middle; padding: 8px 0;"><span class="text-danger">৳ ' + subTotal.toFixed(1) + '</span></td>');
}
table += ('<td class="product-delete" style="padding: 15px 5px;"><a href="#" title="Remove product" data-rowId="' + value.rowId + '"><i class="fa fa-times text-danger"></i></a></td>');
table += ('</tr>');

});

    table += '</table>';

    $('.cart-table-wrap').html(table);
    $(".cart-box").hide();
    $(".cart-box-view").show();
}
});
        }
    });
$('.product-actions .related-btn-cart').on('click', function (e) {
    e.preventDefault();

    var checkLink = window.location;
    var conLink = "index.html";
    var qty = $(this).attr('rel_qty');
    var id = $(this).attr('rel_id');
    var price = $(this).attr('price');
    var token = $(this).attr('rel_token');
    $.ajax({
        type: "POST",
        url: "https://epharma.com.bd/add-to-cart",
        data: {id: id, qty: qty, price: price, _token: token},
        success: function (res) {
            var savedAmount = res.originalTotal - res.total;
//                window.location.href = checkLink;
$('span.saved-amount').text('৳ ' + savedAmount.toFixed(1));
$('span.cart-count').text(res.count);
$('span.cart-amount-span').text('৳ ' + res.total);
$('input[name = cart-total]').val(res.total);
var i = 0;
var table = '<table style="width: 100%; font-size: 11px;" class="cart-table">';
                // NOTE!  I changed 'object' to 'value' here
                // NOTE 2!  We added a JSON.parse on the 'data' variable to convert from JSON to JavaScript objects.
//                $.each(JSON.parse(res.content), function (key, value) {
    jQuery.each(res.content, function (key, value) {

        var subTotal = value.qty * value.price;

        var originalPrice = value.options.productPrice;

        var originalPriceTotal = value.options.productPrice * value.qty;
                    // We need to access the value variable in this loop because 'data' is the original array that we were iterating!
                    table += ('<tr>');
                    var path = "storage/index.html";
                    var imageUrl = path + "/" + value.options.img;
                    table += ('<td><img style="width: 30px; border: 1px solid skyblue; border-radius: 5px;" src="' + imageUrl + '"></td>');
                    if (originalPrice == value.price) {
                        table += ('<td><span class="text-primary">' + value.name + '</span><br><strong style="font-size: 11px;">৳ ' + originalPrice + '</strong></td>');
                    }else{
                        table += ('<td><span class="text-primary">' + value.name + '</span><br><del style="font-size: 11px; margin-right: 5px;">৳ '+ originalPrice +'</del><strong style="font-size: 11px;">৳ ' + value.price + '</strong></td>');
                    }
                    table += ('<td style="font-size: 13px; vertical-align: middle; padding: 8px 0;"><div class="qty-holder" style="width: 90px;"><a href="#" class="qty-dec-btn" rowId="' + value.rowId + '" title="Dec" style="width: 22px;">-</a><input style="width: 22px !important;" type="text" name="product_qty" id="product_qty" class="qty-input" value="' + value.qty + '"><a href="#" class="qty-inc-btn" rowId="' + value.rowId + '" title="Inc" style="width: 22px;">+</a></div></td>');
//                    if(originalPriceTotal == subTotal){
//                        table += ('<td><span><del>৳ '+ originalPriceTotal.toFixed(1) +'</del></span><br><span class="text-danger">৳ ' + subTotal.toFixed(1) + '</span></td>');
//                    else{
//                        table += ('<td><span class="text-danger">৳ ' + subTotal.toFixed(1) + '</span></td>');
//                    }
if (originalPriceTotal.toFixed(1) != subTotal.toFixed(1)) {
    table += ('<td><span class="text-primary"><del>৳ ' + originalPriceTotal.toFixed(1) + '</del></span><br><span class="text-danger">৳ ' + subTotal.toFixed(1) + '</span></td>');
} else {
    table += ('<td style="vertical-align: middle; padding: 8px 0;"><span class="text-danger">৳ ' + subTotal.toFixed(1) + '</span></td>');
}
table += ('<td class="product-delete" style="padding: 15px 5px;"><a href="#" title="Remove product" data-rowId="' + value.rowId + '"><i class="fa fa-times text-danger"></i></a></td>');
table += ('</tr>');

});

    table += '</table>';

    $('.cart-table-wrap').html(table);
    $(".cart-box").hide();
    $(".cart-box-view").show();
}
});
    return false;

});

$('.product-actions .feature-btn-cart').on('click', function (e) {
    e.preventDefault();

    var checkLink = window.location;
    var conLink = "index.html";
    var qty = $(this).attr('fet_qty');
    var id = $(this).attr('fet_id');
    var price = $(this).attr('price');
    var token = $(this).attr('fet_token');
    $.ajax({
        type: "POST",
        url: "https://epharma.com.bd/add-to-cart",
        data: {id: id, qty: qty, price: price, _token: token},
        success: function (res) {
            var savedAmount = res.originalTotal - res.total;
//                window.location.href = checkLink;
$('span.saved-amount').text('৳ ' + savedAmount.toFixed(1));
$('span.cart-count').text(res.count);
$('span.cart-amount-span').text('৳ ' + res.total);
$('input[name = cart-total]').val(res.total);
var i = 0;
var table = '<table style="width: 100%; font-size: 11px;" class="cart-table">';
                // NOTE!  I changed 'object' to 'value' here
                // NOTE 2!  We added a JSON.parse on the 'data' variable to convert from JSON to JavaScript objects.
//                $.each(JSON.parse(res.content), function (key, value) {
    jQuery.each(res.content, function (key, value) {

        var subTotal = value.qty * value.price;

        var originalPrice = value.options.productPrice;

        var originalPriceTotal = value.options.productPrice * value.qty;
                    // We need to access the value variable in this loop because 'data' is the original array that we were iterating!
                    table += ('<tr>');
                    var path = "storage/index.html";
                    var imageUrl = path + "/" + value.options.img;
                    table += ('<td><img style="width: 30px; border: 1px solid skyblue; border-radius: 5px;" src="' + imageUrl + '"></td>');
                    if (originalPrice == value.price) {
                        table += ('<td><span class="text-primary">' + value.name + '</span><br><strong style="font-size: 11px;">৳ ' + originalPrice + '</strong></td>');
                    }else{
                        table += ('<td><span class="text-primary">' + value.name + '</span><br><del style="font-size: 11px; margin-right: 5px;">৳ '+ originalPrice +'</del><strong style="font-size: 11px;">৳ ' + value.price + '</strong></td>');
                    }
                    table += ('<td style="font-size: 13px; vertical-align: middle; padding: 8px 0;"><div class="qty-holder" style="width: 90px;"><a href="#" class="qty-dec-btn" rowId="' + value.rowId + '" title="Dec" style="width: 22px;">-</a><input style="width: 22px !important;" type="text" name="product_qty" id="product_qty" class="qty-input" value="' + value.qty + '"><a href="#" class="qty-inc-btn" rowId="' + value.rowId + '" title="Inc" style="width: 22px;">+</a></div></td>');
//                    if(originalPriceTotal == subTotal){
//                        table += ('<td><span><del>৳ '+ originalPriceTotal.toFixed(1) +'</del></span><br><span class="text-danger">৳ ' + subTotal.toFixed(1) + '</span></td>');
//                    else{
//                        table += ('<td><span class="text-danger">৳ ' + subTotal.toFixed(1) + '</span></td>');
//                    }
if (originalPriceTotal.toFixed(1) != subTotal.toFixed(1)) {
    table += ('<td><span class="text-primary"><del>৳ ' + originalPriceTotal.toFixed(1) + '</del></span><br><span class="text-danger">৳ ' + subTotal.toFixed(1) + '</span></td>');
} else {
    table += ('<td style="vertical-align: middle; padding: 8px 0;"><span class="text-danger">৳ ' + subTotal.toFixed(1) + '</span></td>');
}
table += ('<td class="product-delete" style="padding: 15px 5px;"><a href="#" title="Remove product" data-rowId="' + value.rowId + '"><i class="fa fa-times text-danger"></i></a></td>');
table += ('</tr>');

});

    table += '</table>';

    $('.cart-table-wrap').html(table);
    $(".cart-box").hide();
    $(".cart-box-view").show();
}
});
    return false;

});

$(".cart-box").click(function () {
    $(".cart-box").hide();
    $(".cart-box-view").show();
});
$(".cart-box-inner-view .cart-hide-btn").click(function () {
    $(".cart-box").show();
    $(".cart-box-view").hide();
});

$(".cart-table-wrap").on('click', '.qty-dec-btn', function (e) {
    e.defaultPrevented;
    var oldVlaue = $(this).next().val();

    if (oldVlaue > 0) {
        $(this).next().val(--oldVlaue);
//            $(".minimum-qty").show();
}
var token = 'd37hg6fhRwYd5FP0Dz3qPqxqyMjnctCiWLApepV9';
var qty = $(this).next().val();

var rowId = $(this).attr('rowId');
$.ajax({
    url: '/update-cart-item',
    type: 'post',
    data: {_token: token, rowId: rowId, qty: qty},
    success: function (res) {
        var savedAmount = res.originalTotal - res.total;
//                window.location.href = checkLink;
$('span.saved-amount').text('৳ ' + savedAmount.toFixed(1));
$('span.cart-count').text(res.count);
$('span.cart-amount-span').text('৳ ' + res.total);
$('input[name = cart-total]').val(res.total);
var i = 0;
var table = '<table style="width: 100%; font-size: 11px;" class="cart-table">';
                // NOTE!  I changed 'object' to 'value' here
                // NOTE 2!  We added a JSON.parse on the 'data' variable to convert from JSON to JavaScript objects.
//                $.each(JSON.parse(res.content), function (key, value) {
    jQuery.each(res.content, function (key, value) {

        var subTotal = value.qty * value.price;

        var originalPrice = value.options.productPrice;

        var originalPriceTotal = value.options.productPrice * value.qty;
                    // We need to access the value variable in this loop because 'data' is the original array that we were iterating!
                    table += ('<tr>');
                    var path = "storage/index.html";
                    var imageUrl = path + "/" + value.options.img;
                    table += ('<td><img style="width: 30px; border: 1px solid skyblue; border-radius: 5px;" src="' + imageUrl + '"></td>');
                    if (originalPrice == value.price) {
                        table += ('<td><span class="text-primary">' + value.name + '</span><br><strong style="font-size: 11px;">৳ ' + originalPrice + '</strong></td>');
                    }else{
                        table += ('<td><span class="text-primary">' + value.name + '</span><br><del style="font-size: 11px; margin-right: 5px;">৳ '+ originalPrice +'</del><strong style="font-size: 11px;">৳ ' + value.price + '</strong></td>');
                    }
                    table += ('<td style="font-size: 13px; vertical-align: middle; padding: 8px 0;"><div class="qty-holder" style="width: 90px;"><a href="#" class="qty-dec-btn" rowId="' + value.rowId + '" title="Dec" style="width: 22px;">-</a><input style="width: 22px !important;" type="text" name="product_qty" id="product_qty" class="qty-input" value="' + value.qty + '"><a href="#" class="qty-inc-btn" rowId="' + value.rowId + '" title="Inc" style="width: 22px;">+</a></div></td>');
//                    if(originalPriceTotal == subTotal){
//                        table += ('<td><span><del>৳ '+ originalPriceTotal.toFixed(1) +'</del></span><br><span class="text-danger">৳ ' + subTotal.toFixed(1) + '</span></td>');
//                    else{
//                        table += ('<td><span class="text-danger">৳ ' + subTotal.toFixed(1) + '</span></td>');
//                    }
if(originalPriceTotal.toFixed(1) != subTotal.toFixed(1)){
    table += ('<td><span class="text-primary"><del>৳ ' + originalPriceTotal.toFixed(1) + '</del></span><br><span class="text-danger">৳ '+ subTotal.toFixed(1) +'</span></td>');
}else{
    table += ('<td style="vertical-align: middle; padding: 8px 0;"><span class="text-danger">৳ ' + subTotal.toFixed(1) + '</span></td>');
}
table += ('<td class="product-delete" style="padding: 15px 5px;"><a href="#" title="Remove product" data-rowId="' + value.rowId + '"><i class="fa fa-times text-danger"></i></a></td>');
table += ('</tr>');

});

    table += '</table>';

    $('.cart-table-wrap').html(table);
    $(".cart-box").hide();
    $(".cart-box-view").show();
}
});
return false;
});

$(".cart-table-wrap").on('click', '.qty-inc-btn', function (e) {
    e.defaultPrevented;
    var oldVlaue = $(this).prev().val();
    $(this).prev().val(++oldVlaue);
//        $(".minimum-qty").hide();

var token = 'd37hg6fhRwYd5FP0Dz3qPqxqyMjnctCiWLApepV9';
var qty = $(this).prev().val();

var rowId = $(this).attr('rowId');
$.ajax({
    url: '/update-cart-item',
    type: 'post',
    data: {_token: token, rowId: rowId, qty: qty},
    success: function (res) {
        var savedAmount = res.originalTotal - res.total;
//                window.location.href = checkLink;
$('span.saved-amount').text('৳ ' + savedAmount.toFixed(1));
$('span.cart-count').text(res.count);
$('span.cart-amount-span').text('৳ ' + res.total);
$('input[name = cart-total]').val(res.total);
var i = 0;
var table = '<table style="width: 100%; font-size: 11px;" class="cart-table">';
                // NOTE!  I changed 'object' to 'value' here
                // NOTE 2!  We added a JSON.parse on the 'data' variable to convert from JSON to JavaScript objects.
//                $.each(JSON.parse(res.content), function (key, value) {
    jQuery.each(res.content, function (key, value) {

        var subTotal = value.qty * value.price;

        var originalPrice = value.options.productPrice;

        var originalPriceTotal = value.options.productPrice * value.qty;
                    // We need to access the value variable in this loop because 'data' is the original array that we were iterating!
                    table += ('<tr>');
                    var path = "storage/index.html";
                    var imageUrl = path + "/" + value.options.img;
                    table += ('<td><img style="width: 30px; border: 1px solid skyblue; border-radius: 5px;" src="' + imageUrl + '"></td>');
                    if (originalPrice == value.price) {
                        table += ('<td><span class="text-primary">' + value.name + '</span><br><strong style="font-size: 11px;">৳ ' + originalPrice + '</strong></td>');
                    }else{
                        table += ('<td><span class="text-primary">' + value.name + '</span><br><del style="font-size: 11px; margin-right: 5px;">৳ '+ originalPrice +'</del><strong style="font-size: 11px;">৳ ' + value.price + '</strong></td>');
                    }
                    table += ('<td style="font-size: 13px; vertical-align: middle; padding: 8px 0;"><div class="qty-holder" style="width: 90px;"><a href="#" class="qty-dec-btn" rowId="' + value.rowId + '" title="Dec" style="width: 22px;">-</a><input style="width: 22px !important;" type="text" name="product_qty" id="product_qty" class="qty-input" value="' + value.qty + '"><a href="#" class="qty-inc-btn" rowId="' + value.rowId + '" title="Inc" style="width: 22px;">+</a></div></td>');
//                    if(originalPriceTotal == subTotal){
//                        table += ('<td><span><del>৳ '+ originalPriceTotal.toFixed(1) +'</del></span><br><span class="text-danger">৳ ' + subTotal.toFixed(1) + '</span></td>');
//                    else{
//                        table += ('<td><span class="text-danger">৳ ' + subTotal.toFixed(1) + '</span></td>');
//                    }
if(originalPriceTotal.toFixed(1) != subTotal.toFixed(1)){
    table += ('<td><span class="text-primary"><del>৳ ' + originalPriceTotal.toFixed(1) + '</del></span><br><span class="text-danger">৳ '+ subTotal.toFixed(1) +'</span></td>');
}else{
    table += ('<td style="vertical-align: middle; padding: 8px 0;"><span class="text-danger">৳ ' + subTotal.toFixed(1) + '</span></td>');
}
table += ('<td class="product-delete" style="padding: 15px 5px;"><a href="#" title="Remove product" data-rowId="' + value.rowId + '"><i class="fa fa-times text-danger"></i></a></td>');
table += ('</tr>');

});

    table += '</table>';

    $('.cart-table-wrap').html(table);
    $(".cart-box").hide();
    $(".cart-box-view").show();
    var cart_total = $('input[name = cart-total]').val();
    if(cart_total >= 300){
        $(".minimum-amount").hide();
    }
}
});
return false;
});



$('#empty_cart_button').on('click', function () {
    $.ajax({
        type: "GET",
        url: "/destroy-cart",
        success: function (res) {
//                window.location.href = checkLink;
$('span.saved-amount').text('৳ ' + 0);
$('span.cart-count').text(0);
$('span.cart-amount-span').text('৳ ' + 0);
$(".minimum-amount").hide();
var path = "{{ asset('theme/epharma/img/empty_bag.png')}}";
var html = '<img src="' + path + '">';
html += '<span>Your shopping bag is empty. Start shopping now.</span>';

$('.cart-table-wrap').html(html);
//                location.reload();
}
});
});
$('.cart-table-wrap').on('click', '.product-delete a', function (e) {
    e.defaultPrevented;
    var token = 'd37hg6fhRwYd5FP0Dz3qPqxqyMjnctCiWLApepV9',
    rowId = $(this).data('rowid'),
    parent = $(this).parents('tr');
    $.ajax({
        url: '/remove-cart-item',
        type: 'post',
        data: {_token: token, rowId: rowId},
        success: function (res) {
            parent.remove();
            if (res.count > 0) {
                var savedAmount = res.originalTotal - res.total;
//                window.location.href = checkLink;
$('span.saved-amount').text('৳ ' + savedAmount.toFixed(1));
$('span.cart-count').text(res.count);
$('span.cart-amount-span').text('৳ ' + res.total);
$('input[name = cart-total]').val(res.total);
$(".cart-box").hide();
$(".cart-box-view").show();
} else {
    $('span.saved-amount').text('৳ 0');
    $('span.cart-count').text(0);
    $('span.cart-amount-span').text('৳ 0');
    $(".minimum-amount").hide();
    var path = "{{ asset('theme/epharma/img/empty_bag.png')}}";
    var html = '<img src="' + path + '">';
    html += '<span>Your shopping bag is empty. Start shopping now.</span>';

    $('.cart-table-wrap').html(html);
}
}
});
    return false;
});

    // Set search input value on click of result item
    $(document).on("click", ".result table tr td.show_name", function(){
        var text = $(this).children('span.col').text();
        $(this).parents(".search").find('#example-ajax-post').val(text);
        $(this).parents(".search").find(".result").empty();
    });
    
    $('.result').on('click', '.search-btn-cart', function (e) {
        e.preventDefault();

        var checkLink = window.location;
        var conLink = "index.html";
        var qty = $(this).attr('fet_qty');
        var id = $(this).attr('fet_id');
        var price = $(this).attr('price');
        var token = $(this).attr('fet_token');
        $.ajax({
            type: "POST",
            url: "https://epharma.com.bd/add-to-cart",
            data: {id: id, qty: qty, price: price, _token: token},
            success: function (res) {
                var savedAmount = res.originalTotal - res.total;
//                window.location.href = checkLink;
$('span.saved-amount').text('৳ ' + savedAmount.toFixed(1));
$('span.cart-count').text(res.count);
$('span.cart-amount-span').text('৳ ' + res.total);
$('input[name = cart-total]').val(res.total);
var i = 0;
var table = '<table style="width: 100%; font-size: 11px;" class="cart-table">';
                // NOTE!  I changed 'object' to 'value' here
                // NOTE 2!  We added a JSON.parse on the 'data' variable to convert from JSON to JavaScript objects.
//                $.each(JSON.parse(res.content), function (key, value) {
    jQuery.each(res.content, function (key, value) {

        var subTotal = value.qty * value.price;

        var originalPrice = value.options.productPrice;

        var originalPriceTotal = value.options.productPrice * value.qty;
                    // We need to access the value variable in this loop because 'data' is the original array that we were iterating!
                    table += ('<tr>');
                    var path = "storage/index.html";
                    var imageUrl = path + "/" + value.options.img;
                    table += ('<td><img style="width: 30px; border: 1px solid skyblue; border-radius: 5px;" src="' + imageUrl + '"></td>');
                    if (originalPrice == value.price) {
                        table += ('<td><span class="text-primary">' + value.name + '</span><br><strong style="font-size: 11px;">৳ ' + originalPrice + '</strong></td>');
                    }else{
                        table += ('<td><span class="text-primary">' + value.name + '</span><br><del style="font-size: 11px; margin-right: 5px;">৳ '+ originalPrice +'</del><strong style="font-size: 11px;">৳ ' + value.price + '</strong></td>');
                    }
                    table += ('<td style="font-size: 13px; vertical-align: middle; padding: 8px 0;"><div class="qty-holder" style="width: 90px;"><a href="#" class="qty-dec-btn" rowId="' + value.rowId + '" title="Dec" style="width: 22px;">-</a><input style="width: 22px !important;" type="text" name="product_qty" id="product_qty" class="qty-input" value="' + value.qty + '"><a href="#" class="qty-inc-btn" rowId="' + value.rowId + '" title="Inc" style="width: 22px;">+</a></div></td>');
//                    if(originalPriceTotal == subTotal){
//                        table += ('<td><span><del>৳ '+ originalPriceTotal.toFixed(1) +'</del></span><br><span class="text-danger">৳ ' + subTotal.toFixed(1) + '</span></td>');
//                    else{
//                        table += ('<td><span class="text-danger">৳ ' + subTotal.toFixed(1) + '</span></td>');
//                    }
if (originalPriceTotal.toFixed(1) != subTotal.toFixed(1)) {
    table += ('<td><span class="text-primary"><del>৳ ' + originalPriceTotal.toFixed(1) + '</del></span><br><span class="text-danger">৳ ' + subTotal.toFixed(1) + '</span></td>');
} else {
    table += ('<td style="vertical-align: middle; padding: 8px 0;"><span class="text-danger">৳ ' + subTotal.toFixed(1) + '</span></td>');
}
table += ('<td class="product-delete" style="padding: 15px 5px;"><a href="#" title="Remove product" data-rowId="' + value.rowId + '"><i class="fa fa-times text-danger"></i></a></td>');
table += ('</tr>');

});


    table += '</table>';

    $('.cart-table-wrap').html(table);
    $(".cart-box").hide();
    $(".cart-box-view").show();
}
});
        return false;
    });

$('.result').on('click', 'table tr td.show_name', function (e) {
    var ids = $(this).children('span').attr('ids');
    var url = "https://epharma.com.bd/product/"+ ids;
    e.preventDefault();
    window.open(url,"_self");
});

$('.result').on('click', '#see_all', function () {
    var search_text = $('#example-ajax-post').val();
    var search_type = $('#productCategory').val();
    var url = "https://epharma.com.bd/products?type="+search_type+"&text="+search_text;
    window.open(url,"_self");
});

$(document).on('click', function (e) {
    if($(e.target).attr('id') != "search-results") {
        $(".search").find(".result").empty();
    }
});
});
</script>
<script>
    $('.carousel').carousel({
                interval: 5000 //changes the speed
            })
        </script>
        <script type="text/javascript">
</script>
<script>
    $(document).ready(function () {
        $('select[name=short_by]').val(window.location.href.substring(window.location.href.lastIndexOf('?')+1))
        $('.view-mode ul li').click(function(){
            $('.act').removeClass('act');
            $(this).addClass('act')
        });
        
        $('select[name=limit]').bind('change', function () {
            var limit = $(this).val();
            var url = "/category/49?limit=" + limit;
            window.location = url;
        });

        $(".view-mode #list").click(function () {
            $("#grid-list-view .products-grid").hide();
            $("#grid-list-view .products-list").show();
        });
        $(".view-mode #grid").click(function () {
            $("#grid-list-view .products-grid").show();
            $("#grid-list-view .products-list").hide();
        });

        $('select[name=short_by]').bind('change', function () {
            var short = $(this).val();
            var url = "/category/49?short-by=" + short;
            window.location = url;
        });
    })
</script>

<script type="text/javascript"> 
        function applyCoupon(){
            var coupon = $('#coupon').val(); //id diea jei value pass krci seta eikhne variable e rakhlam
            $.ajax({
                type: 'POST', //cause i an=m passing data
                dataType: 'json',
                data:{coupon:coupon},  //varable name : value field id name //data hisebe pass hobe
                url: "{{ url('/coupon-apply') }}",
                success:function(data){
                    couponCalculation();
                    $('#couponField').hide(); //after apply coupon hide apply coupon field without loading page
                     //start msg
                     const Toast = Swal.mixin({
                                toast:true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000
                                })

                                if($.isEmptyObject(data.error)){
                                    Toast.fire({
                                        type: 'success',
                                        icon: 'success',
                                        title: data.success
                                    })
                                }else{
                                    Toast.fire({
                                        type: 'error',
                                        icon: 'error',
                                        title: data.error
                                    })
                                }
                    //end msg

                }
            })

        }

        function couponCalculation(){
            $.ajax({
                type: 'GET',
                url: "{{ url('/coupon-calculation') }}",
                dataType:'json',
                success:function(data){
                    if(data.total){ //jodi coupon na thke //else part of couponCalculation method in cart controller
                     $('#couponCalField').html(

                         `<tr>
                            <th>
                                <div class="cart-sub-total">
                                    Subtotal<span class="inner-left-md">$ ${data.total}</span>
                                </div>
                                <div class="cart-grand-total">
                                    Grand Total<span class="inner-left-md">$ ${data.total}</span>
                                </div>
                            </th>
                        </tr>`
                     )

                    }else{ //jdi coupon thke

                        $('#couponCalField').html( //if part data of couponCalculation method in cart controller

                                `<tr>
                                <th>
                                    <div class="cart-sub-total">
                                        Subtotal<span class="inner-left-md">$ ${data.subtotal}</span>
                                    </div>
                                    <div class="cart-sub-total">
                                        Coupon<span class="inner-left-md">$ ${data.coupon_name}</span>
                                        <button type="submit" onclick="couponRemove()"><i class="fa fa-times"></i> </button>
                                    </div>
                                    <div class="cart-sub-total">
                                        Discount Amount<span class="inner-left-md">$ ${data.discount_amount}</span>
                                    </div>
                                    <div class="cart-grand-total">
                                        Grand Total<span class="inner-left-md">$ ${data.total_amount}</span>
                                    </div>
                                </th>
                                </tr>`

                        )
                    }

                }//end data
            });
        }

        couponCalculation(); //load method to show data

    </script>

    <script type="text/javascript">
    function couponRemove(){
        $.ajax({
            type: 'GET',
            url: "{{ url('/coupon/remove') }}",
            dataType: 'json',
            success:function(data){
                // couponCalculation(); //without loading page coupon will remove
                // $('#couponField').show(); //to show coupon apply field after remove coupon without loading page
                // $('#coupon_name').val(''); //after removing coupon , coupon input field wil be empty without this it wil show old coupon

                //start msg
                const Toast = Swal.mixin({
                                toast:true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000
                                })

                                if($.isEmptyObject(data.error)){
                                    Toast.fire({
                                        type: 'success',
                                        icon: 'success',
                                        title: data.success
                                    })
                                }else{
                                    Toast.fire({
                                        type: 'error',
                                        icon: 'error',
                                        title: data.error
                                    })
                                }
                    //end msg

            }
        });
    }

</script>


</body>
</html>
