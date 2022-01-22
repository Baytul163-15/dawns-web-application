@extends('frontend.layouts.master')
@section('title','Request Product')
@section('content')
@include('frontend.header-bottom')
<section class="form-section">
<div class="container">
<div class="col-sm-9 col-xs-12" style="float: none; margin: 0 auto;">
<div class="featured-box featured-box-primary featured-box-flat featured-box-text-left mt-md">
<div class="box-content">
<div class="col-xs-12" style="border-bottom: 1px solid #eee; margin-bottom: 10px;">
<div class="form-group">
<span style="font-size: 16px; line-height: 35px; color: #0088cc" class="pull-left">Product inquiry / Request a product</span>
</div>
</div>
<div class="clearfix"></div>
<form role="form" method="POST" action="https://epharma.com.bd/store-product-request" enctype="multipart/form-data">
<div class="col-sm-12">
<div class="form-content">
<input type="hidden" name="_token" value="U5KOReblfGY5BIWCgim6jIzBpMXwMbgyxn6nUoQD">
<h3 style="color: #0088cc !important" class="heading-text-color font-weight-normal">User Info Form</h3>
<div class="clearfix"></div>
<div class="form-group">
<div class="col-sm-6 col-xs-12">
<label class="font-weight-normal">Full Name <span class="required">*</span></label>
<input type="text" name="full_name" class="form-control">
</div>
<div class="col-sm-6 col-xs-12">
<label class="font-weight-normal">Mobile <span class="required">*</span></label>
<input type="text" name="mobile" class="form-control">
</div>
<div class="clearfix"></div>
</div>
<div class="form-group">
<div class="col-sm-6 col-xs-12">
<label class="font-weight-normal">Email <span class="required">*</span></label>
<input type="email" name="email" class="form-control">
</div>
<div class="col-sm-6 col-xs-12">
<label class="font-weight-normal">Reference Prescription </label>
<input type="file" name="file" class="form-control" style="padding: 0;">
</div>
<div class="clearfix"></div>
</div>
<div class="form-group">
<div class="col-xs-12">
<label class="font-weight-normal">Product Details </label>
<textarea class="form-control" name="product_inquiry" rows="3"></textarea>
</div>
</div>
<p class="required">* Required Fields</p>
</div>
<div class="form-action clearfix">
<input type="submit" class="btn btn-primary btn-lg" value="Upload">
</div>
</div>
</form>
<div class="clearfix"></div>
</div>
<div class="clearfix"></div>
</div>
</div>
</div>
</section>
@endsection