<html lang="en">
<head itemscope="" itemtype="http://schema.org/WebSite">
	<title itemprop="name">Dawn Statinery</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="description" content="Preview Bootstrap snippets. company invoice. Copy and paste the html, css and js code for save time, build your app faster and responsive">
	<meta name="keywords" content="bootdey, bootstrap, theme, templates, snippets, bootstrap framework, bootstrap snippets, free items, html, css, js">
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport">
	<meta name="viewport" content="width=device-width">
	<link rel="shortcut icon" type="image/x-icon" href="https://www.bootdey.com/img/favicon.ico">
	<link rel="apple-touch-icon" sizes="135x140" href="https://www.bootdey.com/img/bootdey_135x140.png">
	<link rel="apple-touch-icon" sizes="76x76" href="https://www.bootdey.com/img/bootdey_76x76.png">
	<link rel="canonical" href="https://www.bootdey.com/snippets/preview/company-invoice" itemprop="url">
	<style type="text/css">
		.styled-table {
			border-collapse: collapse;
			margin: 25px 0;
			font-size: 0.9em;
			font-family: sans-serif;
			min-width: 400px;
			/*box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);*/
		}
		.styled-table thead tr {
			background-color: #009879;
			color: #ffffff;
			text-align: left;
		}
		.styled-table th,
		.styled-table td {
			padding: 12px 15px;
		}
		.styled-table tbody tr {
			border-bottom: 1px solid #dddddd;
		}

		.styled-table tbody tr:nth-of-type(even) {
			background-color: #f3f3f3;
		}

		.styled-table tbody tr:last-of-type {
			border-bottom: 2px solid #009879;
		}
		.styled-table tbody tr.active-row {
			font-weight: bold;
			color: #009879;
		}
		.text-90.order-first .col-5 {
			text-align: right;
		}
		.text-secondary-d1 {
			padding-right: 15px;
		}
	</style>
</head>
<body>
	<div id="snippetContent">
		<div class="page-content container">
			<div class="container px-0">
				<div class="row">
					<center>
						<a href="{{ url('/') }}" style="text-align: center;">
							<img alt="Dawn Stationery" src="{{ asset('theme/epharma/img/DAWN1.png')}}" height="50">
						</a>
					</center>
					<div class="col-12 col-lg-10 offset-lg-1">
						<table width="100%">
							<tr>
								<td width="50%">
									<div> 
										<span class="text-sm text-grey-m2 align-middle">To:</span> <span class="text-600 text-110 text-blue align-middle">{{ session('name') }}</span>
										<div class="text-grey-m2"> 
											<div class="my-1">Mobile: {{ session('mobile') }}</div>
											<div class="my-1">Email: {{ session('email') }}</div>
											<div class="my-1">Address: {{ session('address') }}</div>
										</div>
									</td>
									<td width="50%" style="text-align: right;">
										<div class="mt-1 mb-2 text-secondary-m1 text-600 text-125"> Invoice</div>
										<div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">ID:</span> #{{ session('id') }}
										</div>
										<div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">Issue Date:</span> {{ date('l F Y') }}
										</div>
										<div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">Status:</span> <span class="badge badge-warning badge-pill px-25">Processing</span>
										</div>
									</td>
								</tr>
							</table>
							<div class="mt-4">

								@php

								$discount = session('coupon_discount');

								@endphp

								<table class="styled-table" style="width: 100%">
									<thead>
										<tr>
											<th class="hidden-xs">Image</th>
											<th>Product Name</th>
											<th class="text-center">Qty</th>
											<th class="text-right">Subtotal</th>
											
										</tr>
									</thead>
									<tbody>
										@php $total = 0 @endphp
										@if(session('cart'))
										@foreach(session('cart') as $id => $details)
										@php $total += $details['price'] * $details['quantity'] @endphp
										<tr>
											<td class="hidden-xs class text-center">
												<a href="{{ url('/product/details') }}/{{$id}}" title="{{$details['name']}}">
													<img src="{{asset($details['image'])}}" height="50" alt="{{$details['name']}}">
												</a>
											</td>
											<td>
												{{$details['name']}}<br>
												<strong>{{$details['price']}}৳</strong>
											</td>
											<td class="text-center">{{$details['quantity']}}</td>

											

											<td class="text-right">{{ $details['price'] * $details['quantity'] }}৳</td>

											
											
										</tr>
										@endforeach
										@endif
									</tbody>
									<tfoot>
										
										<tr> 
											<td></td>
											<td class="text-center">Subtotal</td>
											
											<td></td>
											<td class="text-right" >{{ $total }}৳</td>
											
										</tr>

									</tfoot>
								</table>
								<br>
								<br>
								<table width="100%">
									<tr>
										<td width="50%">
											Payment Method: {{ session('payment_method') }}<br>
											Paid Amount: {{ session('paying_amount') }}৳<br>
											Transaction ID: {{ session('transaction_id') }}
										</td>
										<td width="50%" style="text-align: right;">
											Discount: {{$discount}} ৳<br>
											Subtotal: {{$total - $discount}} ৳<br>
											Delivery Charge: {{ session('delivery_charge') }}৳<br>
											Grand Total: {{ session('grand_total') }}৳
										</td>
									</tr>
								</table>
								<hr>
								<div style="width: 100%;text-align: center;">Thank you for your order!
								</div>
								</div
								>
							</div>
						</div>
					</div>
				</div>
				<style type="text/css">body{
					margin-top:20px;
					color: #484b51;
				}
				.text-secondary-d1 {
					color: #728299!important;
				}
				.page-header {
					margin: 0 0 1rem;
					padding-bottom: 1rem;
					padding-top: .5rem;
					border-bottom: 1px dotted #e2e2e2;
					display: -ms-flexbox;
					display: flex;
					-ms-flex-pack: justify;
					justify-content: space-between;
					-ms-flex-align: center;
					align-items: center;
				}
				.page-title {
					padding: 0;
					margin: 0;
					font-size: 1.75rem;
					font-weight: 300;
				}
				.brc-default-l1 {
					border-color: #dce9f0!important;
				}
				.ml-n1, .mx-n1 {
					margin-left: -.25rem!important;
				}
				.mr-n1, .mx-n1 {
					margin-right: -.25rem!important;
				}
				.mb-4, .my-4 {
					margin-bottom: 1.5rem!important;
				}
				hr {
					margin-top: 1rem;
					margin-bottom: 1rem;
					border: 0;
					border-top: 1px solid rgba(0,0,0,.1);
				}
				.text-grey-m2 {
					color: #888a8d!important;
				}
				.text-success-m2 {
					color: #86bd68!important;
				}
				.font-bolder, .text-600 {
					font-weight: 600!important;
				}
				.text-110 {
					font-size: 110%!important;
				}
				.text-blue {
					color: #478fcc!important;
				}
				.pb-25, .py-25 {
					padding-bottom: .75rem!important;
				}
				.pt-25, .py-25 {
					padding-top: .75rem!important;
				}
				.bgc-default-tp1 {
					background-color: rgba(121,169,197,.92)!important;
				}
				.bgc-default-l4, .bgc-h-default-l4:hover {
					background-color: #f3f8fa!important;
				}
				.page-header .page-tools {
					-ms-flex-item-align: end;
					align-self: flex-end;
				}
				.btn-light {
					color: #757984;
					background-color: #f5f6f9;
					border-color: #dddfe4;
				}
				.w-2 {
					width: 1rem;
				}
				.text-120 {
					font-size: 120%!important;
				}
				.text-primary-m1 {
					color: #4087d4!important;
				}
				.text-danger-m1 {
					color: #dd4949!important;
				}
				.text-blue-m2 {
					color: #68a3d5!important;
				}
				.text-150 {
					font-size: 150%!important;
				}
				.text-60 {
					font-size: 60%!important;
				}
				.text-grey-m1 {
					color: #7b7d81!important;
				}
				.align-bottom {
					vertical-align: bottom!important;
				}
			</style>
			<script type="text/javascript"></script>
		</div>
	</body>
	</html>