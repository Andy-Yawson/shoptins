@extends('user.master')

@section('styles')
	<link type="text/css" rel="stylesheet" href="{{ asset('home/css/slider-button.css') }}">
@endsection

@section('content')

	<!-- ========================= SECTION PAGETOP ========================= -->
	<section class="section-pagetop bg-secondary">
		<div class="container clearfix">
			<h2 class="title-page">Payment Method</h2>
		</div> <!-- container //  -->
	</section>
	<!-- ========================= SECTION INTRO END// ========================= -->

	<!--================Track Area =================-->
	<section class="track_area p_100 mt-5">
		<div class="container">
			{{--<div class="track_inner">
				<div class="track_title">
					<h3>We only support cash on delivery and mobile money.</h3>
				</div>
				<form class="track_form row" method="post" action="{{route('user.shop.order.place')}}">
					{{csrf_field()}}
					<div class="col-lg-12 form-group">
						<label>Payment Option</label>
						<select name="payment_type" class="form-control">
							<option>Choose an option...</option>
							<option value="Cash on delivery">Cash on delivery</option>
							<option value="momo">Mobile Money</option>
						</select>
					</div>
					<div class="col-lg-12 form-group">
						<button type="submit" value="submit" class="btn subs_btn form-control"><i class="fa fa-arrow-right"></i> Proceed to checkout</button>
					</div>
				</form>
			</div>--}}
			<div class="row">
				<div class="col-md-6">
					<div class="card">
						<div class="card-header">
							<h5 class="card-title">Address Details</h5>
						</div>
						<div class="card-body">
                            <?php
                            $data = \App\Shipping::where('user_id', auth()->user()->id)->first();
                            ?>
							<h6>{{$data->shipping_name}}</h6>
							<p>{{$data->shipping_address}}</p>
							<p>{{$data->shipping_city}}</p>
							<p>{{$data->shipping_phone}}</p>
                            <?php
                            ?>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="card">
						<div class="card-header">
							<h5 class="card-title">Delivery Details</h5>
						</div>
						<div class="card-body">
							<h6>Home and Office Delivery</h6>
							<p>Our agent will call you to meet terms of delivery</p>
							<p>Your Payment Charge - <b><span style="color: orange">GH&#8373;{{ Cart::total() }}</span></b></p>
							{{--<p>Delivery Charge - <b><span style="color: orange">GH&#8373;12</span></b></p>--}}
						</div>
					</div>
				</div>
			</div>
			<form method="post" action="{{route('user.shop.order.place')}}">
				{{csrf_field()}}
				<div class="row" style="margin-top: 10px">
					<div class="col-md-12 mt-5">
						<div class="card">
							<div class="card-header">
								<h5 class="card-title">
									Payment Method <b>(CHOOSE JUST ONE)</b><br>
									<small>Please be sure to choose the mode of
										payment by switching the button.</small>
								</h5>
							</div>
							<div class="card-body">
								<div class="row">
									<div class="col-lg-4">
										<div class="card">
											<div class="card-header">
												<h4 class="card-title">MTN Mobile Money</h4>
											</div>
											<div class="card-body">
												<ol>
													<li>Dial *170#</li>
													{{--<li>Select Pay Bills</li>
													<li>Choose General Payment</li>
													<li>Enter <b>Shoptins</b> as Merchant</li>--}}
													<li>Transfer Money</li>
													<li>Dial <b>0542798664</b> as payment number</li>
													<li>Enter amount to pay</li>
													<li>Enter <b>{{session()->get('order_id')}}</b> as
														reference
													</li>
													<li>Enter your pin</li>
												</ol>
											</div>
											<div class="card-footer">
												<label class="switch">
													<input type="checkbox" name="payment_type" value="momo">
													<span class="slider round"></span>
												</label>
											</div>
										</div>
									</div>
									<div class="col-lg-4">
										<div class="card">
											<div class="card-header">
												<h4 class="card-title">Cash On Delivery</h4>
											</div>
											<div class="card-body">
												<ol>
													<li>An agent will contact you for confirmation.</li>
													<li>Please be sure to stay reachable.</li>
													<li>You need to ensure you have change or exact amount</li>
													<li>Call our support line if there is an emergency</li>
													<li>Arrangement will be made with you on how to receive package</li>
												</ol>
											</div>
											<div class="card-footer">
												<label class="switch">
													<input type="checkbox" name="payment_type" value="cash">
													<span class="slider round"></span>
												</label>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div style="margin-bottom: 10%" class="mt-4">
					<button class="btn btn-primary btn-lg btn-block" type="submit" style="cursor: pointer">
						<i class="fa fa-hand-point-right"></i>
						Place Your Order
					</button>
				</div>
			</form>


		</div>
	</section>
	<!--================End Track Area =================-->

@endsection