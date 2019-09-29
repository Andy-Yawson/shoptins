@extends('user.master')
@section('content')

	<!-- ========================= SECTION PAGETOP ========================= -->
	<section class="section-pagetop bg-secondary">
		<div class="container clearfix">
			<h2 class="title-page">My Account</h2>
		</div> <!-- container //  -->
	</section>
	<!-- ========================= SECTION INTRO END// ========================= -->

	<!--================login Area =================-->
	<section class="emty_cart_area p_100">
		<div class="container">
			<div class="row mt-5 mb-5">
				<div class="col-md-3">
					<aside class="mb-2">
						<div class="card">
							<header class="card-header white category-header">
								<i class="icon-menu"></i>
								Shoptins Account
							</header>
							@include('user.account.menu')
						</div> <!-- card.// -->
					</aside>
				</div>
				<div class="col-md-9">
						@if(count($orders) > 0)
							@if (session('status'))
								<div class="alert alert-success" role="alert">
									<button type="button" class="close" data-dismiss="alert">x</button>
									{{ session('status') }}
								</div>
							@endif
							<div>
								<h3 class="title">All Available Orders</h3>
							</div>
							<table id="dataTable" class="table table-striped" cellspacing="0"
							       width="100%">
								<thead>
								<tr>
									<th>Order Code</th>
									<th>Payment Type</th>
									<th>Payment</th>
									<th>Order Total</th>
									<th>Delivery Status</th>
									<th>Action</th>
								</tr>
								</thead>
								<tbody>
								@foreach($orders as $order)
									<tr>
										<td>{{$order->order_code}}</td>
										<td>{{$order->payment_method}}</td>
										<td>
											@if($order->payment_status == 0)
												<button class="btn btn-info">unpaid</button>
											@else
												<button class="btn btn-success">Paid</button>
											@endif
										</td>
										<td>&#8373;{{$order->order_total}}</td>
										<td>
											@if($order->order_status == 0)
												<button class="btn btn-info">Pending</button>
											@elseif($order->order_status == 1)
												<button class="btn btn-primary">Confirmed</button>
											@elseif($order->order_status == 2)
												<button class="btn btn-primary">Delivered</button>
											@elseif($order->order_status == 3)
												<button class="btn btn-danger">Declined</button>
											@endif
										</td>
										<td align="center">
											<a href="{{route('user.account.detail',$order->order_id)}}" class="btn btn-primary" title="View Order Detail">
												View Detail
											</a>
										</td>
									</tr>
								@endforeach
								</tbody>
							</table>
						@else
							<h3>You have not made any local orders yet</h3>
						@endif
						@if(count($int_orders))
							<hr>
							<h3>Your International Orders</h3>
								<table id="dataTable" class="table table-striped" cellspacing="0"
								       width="100%">
									<thead>
									<tr>
										<th>Order Code</th>
										<th>Payment</th>
										<th>Order Total</th>
										<th>Action</th>
									</tr>
									</thead>
									<tbody>
									@foreach($int_orders as $order)
										<tr>
											<td>{{ $order->order_code }}</td>
											<td>
												@if($order->payment == 0)
													<button class="btn btn-warning">Not Paid</button>
												@elseif($order->payment == 1)
													<button class="btn btn-success">Paid</button>
												@endif
											</td>
											<td>
												<?php
												$checks = \Illuminate\Support\Facades\DB::table('international')
													->where('code',$order->order_code)
													->sum('price');

												echo $checks;
												?>
											</td>
											<td>
												@if($order->status == 1)
													<button class="btn btn-success">Approved</button>
												@elseif($order->status == 0)
													<button class="btn btn-info">Pending</button>
												@elseif($order->status == 2)
													<button class="btn btn-danger">Declined</button>
												@endif
												<a href="{{ route('user.account.detail.int',$order->order_code) }}"
												   class="btn btn-info" title="View Detail">
													View Detail
												</a>
											</td>
										</tr>
									@endforeach
									</tbody>
								</table>
						@endif
				</div>
			</div>
		</div>
	</section>
	<!--================End login Area =================-->


@endsection