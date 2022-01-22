@extends('frontend.layouts.master')
@section('title','User Register')
@section('content')

<div role="main" class="main">
    <section class="form-section">
        <div class="container">
            <div class="col-sm-6 col-xs-12" style="float: none; margin: 0 auto;">
                <div class="featured-box featured-box-primary featured-box-flat featured-box-text-left mt-md">
                    <div class="box-content">
                        <div class="col-xs-12" style="border-bottom: 1px solid #eee; margin-bottom: 10px;">
                            <div class="form-group">
                                <span style="font-size: 16px; line-height: 35px; color: #0088cc" class="pull-left">Already Registered Customer</span>
                                <a href="{{route('user.login')}}">
                                    <button class="btn btn-info pull-lg-right">Login</button>
                                </a>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <form action="{{route('user.store')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="">Full Name</label>
                                <input type="text" class="form-control" name="name" id="" placeholder="Full name" value="{{ old('name') }}">
                                <div style='color:red; padding: 0 5px;'>{{($errors->has('name'))?($errors->first('name')):''}}</div>
                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="text" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}">
                                <div style='color:red; padding: 0 5px;'>{{($errors->has('email'))?($errors->first('email')):''}}</div>
                            </div>
                            <div class="form-group">
                                <label for="">Mobile Number</label>
                                <input type="text" class="form-control" name="mobile" placeholder="Mobile number" value="{{ old('mobile') }}">
                                <div style='color:red; padding: 0 5px;'>{{($errors->has('mobile'))?($errors->first('mobile')):''}}</div>
                            </div>
                            <div class="form-group">
                                <label for="#">Password</label>
                                <input class="form-control" type="password" name="password" placeholder="Password" value="{{ old('password') }}">
                                <div style='color:red; padding: 0 5px;'>{{($errors->has('password'))?($errors->first('password')):''}}</div>
                            </div>
                            <div class="form-group">
                                <label for="#">Confirm Password</label>
                                <input class="form-control" type="password" name="password_confirmation" placeholder="Confirm password" value="{{ old('password_confirmation') }}">
                                <div style='color:red; padding: 0 5px;'>{{($errors->has('password_confirmation'))?($errors->first('password_confirmation')):''}}</div>
                            </div>

                            <div class="col-4 text-center mx-auto">
                                <input class="btn btn-primary btn-block" type="submit" value="Register">
                            </div>

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