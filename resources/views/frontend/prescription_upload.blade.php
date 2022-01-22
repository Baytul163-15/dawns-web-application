@extends('frontend.layouts.master')
@section('title','Prescription Upload')
@section('content')
@include('frontend.header-bottom')
<section class="form-section">
	<div class="container">
		<div class="col-sm-9 col-xs-12" style="float: none; margin: 0 auto;">
			<div class="featured-box featured-box-primary featured-box-flat featured-box-text-left mt-md">
				<div class="box-content">
					<div class="col-xs-12" style="border-bottom: 1px solid #eee; margin-bottom: 10px;">
						<div class="form-group">
							<span style="font-size: 16px; line-height: 35px; color: #0088cc" class="pull-left">Prescription Upload</span>
						</div>
					</div>
					<div class="clearfix"></div>
					<form role="form" id="prescription-upload" enctype="multipart/form-data">
						@csrf
						<div class="col-sm-12">
							<div class="form-content">
								<h3 style="color: #0088cc !important" class="heading-text-color font-weight-normal">User Info</h3>
								<div class="clearfix"></div>
								<div class="form-group">
									<div class="col-sm-6 col-xs-12">
										<label class="font-weight-normal">Name <span class="required">*</span></label>
										<input type="text" name="name" class="form-control">
									</div>
									<div class="col-sm-6 col-xs-12">
										<label class="font-weight-normal">Mobile <span class="required">*</span></label>
										<input type="text" name="mobile" class="form-control">
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="form-group">
									<div class="col-sm-6 col-xs-12">
										<label class="font-weight-normal">Email</label>
										<input type="email" name="email" class="form-control">
									</div>
									<div class="col-sm-6 col-xs-12">
										<label class="font-weight-normal">Doctor Prescription </label>
										<input type="file" name="file" class="form-control" style="padding: 0;">
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="form-group">
									<div class="col-xs-12">
										<label class="font-weight-normal">If Any Query </label>
										<textarea class="form-control" name="says" rows="3"></textarea>
									</div>
								</div>
								<div class="col-xs-12">
									<p class="required">* Required Fields</p>
								</div>
							</div>
							<div class="form-action clearfix">
								<div class="col-xs-12">
									<input type="submit" class="btn btn-primary btn-lg" value="Submit">
								</div>
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
<script src="{{ asset('theme/epharma/css/vendor/jquery/jquery.min.js') }}"></script>
<script type="text/javascript">
	$(document).ready(function (e) {
		$('#prescription-upload').submit(function(e) {
			e.preventDefault();
			var formData = new FormData(this);
			$.ajax({
				type:'POST',
				url: "{{ url('prescription-store')}}",
				data: formData,
				cache:false,
				contentType: false,
				processData: false,
				success: (data) => {
					this.reset();
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
				error: function(data){
					console.log(data);
				}
			});
		});
	});
</script>
@endsection