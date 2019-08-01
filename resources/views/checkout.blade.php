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
								<h3 class="title-section">Address Information</h3>
							</header>
							<div class="billing_details">
								<div class="col-lg-12">
									<div class="form-group">
										<label for="name">Full Name <span>*</span></label>
										<input type="text" class="form-control" id="name" aria-describedby="name"
										       value="@if(auth()->check()){{auth()->user()->name}}@endif" required
										       name="shipping_name">
									</div>
								</div>
								<div class="col-lg-12">
									<div class="form-group">
										<label for="address">Address <span>*</span></label>
										<input type="text" class="form-control" id="address" aria-describedby="address" required
										       name="shipping_address" value="@if(!empty($checkout)){{$checkout->shipping_address}}@endif">
									</div>
								</div>
								<div class="col-lg-12">
									<div class="form-group">
										<label for="ctown">City / Town <span>*</span></label>
										<input type="text" class="form-control" id="address" aria-describedby="Town/City" required
										       name="shipping_city" value="@if(!empty($checkout)){{$checkout->shipping_city}}@endif">
									</div>
								</div>
								<div class="col-lg-12">
									<div class="form-group">
										<label for="email">Email <span>*</span></label>
										<input type="email" class="form-control" id="email" aria-describedby="email"
										       value="@if(auth()->check()){{auth()->user()->email}}@endif"
										       name="shipping_email" required>
									</div>
								</div>
								<div class="col-lg-12">
									<div class="form-group">
										<label for="phone">Phone <span>*</span></label>
										<input type="text" class="form-control" id="phone" aria-describedby="phone" required
										       name="shipping_phone" value="@if(!empty($checkout)){{$checkout->shipping_phone}}@endif">
									</div>
								</div>
								<div class="col-lg-12">
									<div class="form-group">
										<label for="order">Order Notes <span>*</span></label>
										<textarea class="form-control" id="order" rows="3"
										          name="shipping_notes">@if(!empty($checkout)){{$checkout->shipping_notes}}@endif</textarea>
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
						<article class="list-group-item">
							<header class="filter-header">
								<a href="#" data-toggle="collapse" data-target="#collapse1" aria-expanded="true" class="">
									<i class="icon-action fa fa-chevron-down"></i>
									<h6 class="title">Process </h6>
								</a>
							</header>
							<div class="filter-content collapse show" id="collapse1" style="">
								<ol>
									<li>Click on shop local to visit our Ecommerce gallery</li>
									<li>Add the products you want purchased to your shopping cart</li>
									<li>submit order and checkout</li>
									<li>You can pay by Card, Mobile money or pay upon delivery</li>
								</ol>
							</div> <!-- collapse -filter-content  .// -->
						</article>
						<article class="list-group-item">
							<header class="filter-header">
								<a href="#" data-toggle="collapse" data-target="#collapse3" class="collapsed" aria-expanded="false">
									<i class="icon-action fa fa-chevron-down"></i>
									<h6 class="title">Benefits</h6>
								</a>
							</header>
							<div class="filter-content collapse" id="collapse3" style="">
								<ol>
									<li>We buy you the best products on the market at super prices</li>
									<li>Free normal delivery within 7 hours</li>
									<li>GHC 10 - 15 for express delivery within 2 hrs</li>
								</ol>
							</div>
						</article>
						<article class="list-group-item">
							<header class="filter-header">
								<a href="#" data-toggle="collapse" data-target="#importantPoints" class="collapsed" aria-expanded="false">
									<i class="icon-action fa fa-chevron-down"></i>
									<h6 class="title">Important Points</h6>
								</a>
							</header>
							<div class="filter-content collapse" id="importantPoints" style="">
								<ol>
									<li>You may be required to pay for the items on your shopping list before purchase</li>
									<li>Full payment will be required before package handover</li>
									<li>Cancelling order after delivery process has commenced comes at a cost</li>
									<li>Refunds to customers will be paid minus merchant transfer fees</li>
									<li> Shoptins requires that our users provide further specifications
										for selected products that come in varieties. This can be done in the comment box</li>
								</ol>
							</div>
						</article>

					</aside> <!-- col.// -->
				</div>
			</form>

		</div> <!-- container .//  -->
	</section>
	<!-- ========================= SECTION CONTENT END// ========================= -->

@endsection