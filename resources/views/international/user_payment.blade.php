@extends('user.masterint')

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
			<form method="post" action="{{route('user.int.order.place')}}">
				{{csrf_field()}}
				<div class="row" style="margin-top: 10px">
					<div class="col-md-12 mt-5">
						<div class="card">
							<div class="card-header">
								<h5 class="card-title">
									Mobile Money Payment Procedure<br>
									<small>Please be sure to choose the mode of
										payment by switching the button to confirm payment.</small>
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
													<li>Enter <b>{{session()->get('code')}}</b> as
														reference
													</li>
													<li>Enter your pin</li>
												</ol>
											</div>
											<div class="card-footer">
												<label class="switch">
													<input type="checkbox" checked name="payment_type" value="momo" required>
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
					<button class="btn btn-info btn-lg btn-block" type="submit" style="cursor: pointer">
						<i class="fa fa-hand-point-right"></i>
						Confirm Payment and Continue
					</button>
				</div>
			</form>


		</div>
	</section>
	<!--================End Track Area =================-->

@endsection