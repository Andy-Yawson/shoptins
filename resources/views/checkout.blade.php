@extends('user.master')
@section('content')
	<!-- ========================= SECTION PAGETOP ========================= -->
	<section class="section-pagetop bg-secondary">
		<div class="container clearfix">
			<h2 class="title-page">Customer Checkout</h2>
		</div> <!-- container //  -->
	</section>
	<!-- ========================= SECTION INTRO END// ========================= -->

	<!-- ========================= SECTION CONTENT ========================= -->
	<section class="section-content bg padding-y border-top">
		<div class="container">
			<form method="post" action="{{route('user.create.shipping')}}">
				{{ csrf_field() }}
				<div class="row">
					<main class="col-sm-8">

						<div class="card">
							<header class="section-heading" style="padding-left: 2%">
								<h3 class="title-section">Billing Information</h3>
							</header>
							<div class="billing_details">
								<div class="col-lg-12">
									<div class="form-group">
										<label for="name">Full Name <span>*</span></label>
										<input type="text" class="form-control" id="name" aria-describedby="name"
										       value="{{auth()->user()->name}}"
										       name="shipping_name">
									</div>
								</div>
								<div class="col-lg-12">
									<div class="form-group">
										<label for="address">Address <span>*</span></label>
										<input type="text" class="form-control" id="address" aria-describedby="address"
										       name="shipping_address" value="@if($checkout){{$checkout->shipping_address}}@endif">
									</div>
								</div>
								<div class="col-lg-12">
									<div class="form-group">
										<label for="ctown">City / Town <span>*</span></label>
										<input type="text" class="form-control" id="address" aria-describedby="Town/City"
										       name="shipping_city" value="@if($checkout){{$checkout->shipping_city}}@endif">
									</div>
								</div>
								<div class="col-lg-12">
									<div class="form-group">
										<label for="email">Email <span>*</span></label>
										<input type="email" class="form-control" id="email" aria-describedby="email"
										       value="{{auth()->user()->email}}"
										       name="shipping_email">
									</div>
								</div>
								<div class="col-lg-12">
									<div class="form-group">
										<label for="phone">Phone <span>*</span></label>
										<input type="text" class="form-control" id="phone" aria-describedby="phone"
										       name="shipping_phone" value="@if($checkout){{$checkout->shipping_phone}}@endif">
									</div>
								</div>
								<div class="col-lg-12">
									<div class="form-group">
										<label for="order">Order Notes <span>*</span></label>
										<textarea class="form-control" id="order" rows="3"
										          name="shipping_notes">@if($checkout){{$checkout->shipping_notes}}@endif</textarea>
									</div>
								</div>
							</div>
						</div> <!-- card.// -->

					</main> <!-- col.// -->
					<aside class="col-sm-4">
						<div class="card" style="width: 100%">
							<div class="card-body">
								<p class="alert alert-success">
									Please be sure to fill all the billing information before proceeding to payment method
								</p>
								<dl class="dlist-align">
									<dt>Tax:</dt>
									<dd class="text-right">{{Cart::tax()}}</dd>
								</dl>
								<dl class="dlist-align">
									<dt>Total price:</dt>
									<dd class="text-right">GH&#8373;{{Cart::subtotal()}}</dd>
								</dl>
								<dl class="dlist-align h4">
									<dt>Total:</dt>
									<dd class="text-right"><strong>GH&#8373;{{Cart::subtotal()}}</strong></dd>
								</dl>
								<hr>
								<figure class="itemside mb-3">
									<aside class="aside">
										<button type="submit" class="btn btn-primary">
											<i class="fa fa-hand-point-right"></i>
											Proceed To Payment
										</button>
									</aside>
								</figure>
							</div>
						</div>

					</aside> <!-- col.// -->
				</div>
			</form>

		</div> <!-- container .//  -->
	</section>
	<!-- ========================= SECTION CONTENT END// ========================= -->

@endsection