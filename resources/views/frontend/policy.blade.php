@extends('frontend.layouts.master')
@section('title','Privacy Policy')
@section('content')

@php
$data = App\Models\Setting::find(4);
@endphp
<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<div class="page-content" style="padding: 40px 0 40px 0;">
				@if($data->policy != null)
	                {!! $data->policy !!}
                @endif
			</div>
		</div>
	</div>
</div>
@endsection