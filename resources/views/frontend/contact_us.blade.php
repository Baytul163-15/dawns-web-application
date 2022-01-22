@extends('frontend.layouts.master')
@section('title','Contact Us')
@section('content')

@php
$data = App\Models\Setting::find(4);
@endphp
<div class="section-contact-area" style="margin-top: 30px;">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<h2 class="heading-text-color">Leave a <strong>Message</strong></h2>
				<form role="form" id="contact-page-form" class="contact-form" enctype="multipart/form-data">
					@csrf
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label>Name *</label>
								<input name="name" type="text" value="" data-msg-required="Please enter your name." maxlength="100" class="form-control" id="name">
							</div>
							<div class="form-group">
								<label>Mobile *</label>
								<input name="mobile" type="number" value="" data-msg-required="Please enter your mobile number." data-msg-email="Please enter a valid mobile number." maxlength="13" class="form-control" id="mobile" required>
							</div>
							<div class="form-group">
								<label>Email </label>
								<input name="email" type="email" value="" data-msg-required="Please enter your email address." data-msg-email="Please enter a valid email address." maxlength="100" class="form-control" id="email">
							</div>
							<div class="form-group">
								<label>Subject</label>
								<input name="subject" type="text" value="" data-msg-required="Please enter the subject." maxlength="100" class="form-control" id="subject" required="">
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group mb-lg">
								<label>Message *</label>
								<textarea name="message" maxlength="5000" data-msg-required="Please enter your message." rows="5" class="form-control" id="message" required=""></textarea>
							</div>
							<input type="submit" value="Send Message" class="btn btn-primary mb-xlg send-mail" data-loading-text="Loading...">
						</div>
					</div>
				</form>
			</div>
			<div class="col-md-4">
				<h2 class="heading-text-color">Contact <strong>Details</strong></h2>
				<ul class="list-unstyled list-contact">
					@if($data->header_phone1 != null)
					<li>
						<i class="fa fa-phone"></i>
						<div>{{ $data->header_phone1 }}</div>
						<div><br></div>
					</li>
					@endif
					@if($data->header_phone2 != null)
					<li>
						<i class="fa fa-phone"></i>
						<div>{{ $data->header_phone2 }}</div>
						<div><br></div>
					</li>
					@endif
					@if($data->email != null)
					<li>
						<i class="fa fa-envelope"></i>
						<div>{{ $data->email }}</div>
						<div><br></div>
					</li>
					@endif
					@if($data->footer_social_link1 != null)
					<li>
						<i class="fa fa-facebook"></i>
						<div>{{ $data->footer_social_link1 }}</div>
						<div><br></div>
					</li>
					@endif
				</ul>
			</div>
		</div>
	</div>
</div>
<script src="{{ asset('theme/epharma/css/vendor/jquery/jquery.min.js') }}"></script>
<script type="text/javascript">
	$(document).ready(function (e) {
		$('#contact-page-form').submit(function(e) {
			e.preventDefault();
			var formData = new FormData(this);
			$.ajax({
				type:'POST',
				url: "{{ url('contact-store')}}",
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