@extends('frontend.layouts.master')
@section('title','How to order')
@section('content')

@php
$data = App\Models\Setting::find(4);
@endphp
<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<div class="page-content" style="padding: 40px 0 40px 0;">
				@if($data->how_to_order != null)
	                {!! $data->how_to_order !!}
                @endif
			</div>
		</div>
	</div>
</div>
@endsection