@extends('frontend.layouts.master')
@section('title','Login')
@section('content')
<div role="main" class="main">
    <!--@include('frontend.header-bottom')-->
    <section class="form-section">
        <div class="container">
            <div class="col-sm-6 col-xs-12" style="float: none; margin: 0 auto;">
                <div class="featured-box featured-box-primary featured-box-flat featured-box-text-left mt-md">
                    <div class="box-content">
                        <div class="col-xs-12" style="border-bottom: 1px solid #eee; margin-bottom: 10px;">
                            <div class="form-group">
                                <span style="font-size: 16px; line-height: 35px; color: #0088cc" class="pull-left">New Customer</span>
                                <a href="{{route('user.register')}}">
                                    <button class="btn btn-info pull-lg-right">Register</button>
                                </a>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <form action="{{ route('login') }}" method="post">
                            @csrf

                            <div class="form-group">
                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autofocus placeholder="Email/Mobile">
                                <div style='color:red; padding: 0 5px;'>{{($errors->has('username'))?($errors->first('username')):''}}</div>
                            </div>

                            {{-- <div class="form-group">
                                <input id="email" placeholder="Email" type="email" class="form-control" name="email" value="{{ old('email') }}" autocomplete="email">
                                <div style='color:red; padding: 0 5px;'>{{($errors->has('email'))?($errors->first('email')):''}}</div>
                            </div> --}}

                            <div class="form-group">
                                <input id="password" placeholder="Password" type="password" class="form-control" name="password" autocomplete="password">
                                <div style='color:red; padding: 0 5px;'>{{($errors->has('password'))?($errors->first('password')):''}}</div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                            <p class="my-3 text-center">
                                <a href="{{ route('password.request') }}">I forgot my password</a>
                            </p>
                        </form>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection