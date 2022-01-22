@extends('frontend.layouts.master')
@section('title','Request Product')
@section('content')
@include('frontend.header-bottom')
	<section class="form-section">
		<div class="container">
			<div class="col-sm-6 col-xs-12" style="float: none; margin: 0 auto;">
				<div class="featured-box featured-box-primary featured-box-flat featured-box-text-left mt-md">
					<div class="box-content">
						<div class="col-sm-12">
							<form id="refill-form">
								<div class="form-content">
									<h3 style="color: #0088cc !important" class="heading-text-color font-weight-normal">Refill Request From Previous Order </h3>
									<div class="clearfix"></div>
									<div class="form-group">
										<label class="font-weight-normal">Refill Order Id <span class="required">*</span></label>
										<input type="text" id="order_id" name="order_id" placeholder="Enter your refill order id" class="form-control" required>
									</div>
								</div>
								<div class="form-action clearfix">
									<button id="submit" class="btn btn-primary btn-lg">REFILL</button>
								</div>
							</form>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</section>
	<script src="{{ asset('theme/epharma/css/vendor/jquery/jquery.min.js') }}"></script>
	<script type="text/javascript">
    $('#refill-form').on('submit',function(e){
        e.preventDefault();
        var id = $('#order_id').val();
        $.ajax({
            type: "POST",
            url: "{{ url('ajax-refill-data') }}/" + id,
            data:{
	            "_token": "{{ csrf_token() }}",
	            id:id,
	        },
            success: function (res) {
                $.each(res, function (index, item) {
                    var pid = item.product_id;
		            $.ajax({
		                url: "{{ url('add-to-cart') }}/" + pid,
		                method: "GET",
		                dataType: "JSON",
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
        	},
        });
    });
    </script>
@endsection