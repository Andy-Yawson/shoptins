@extends('user.master')
@section('content')
	<!-- ========================= SECTION PAGETOP ========================= -->
	<section class="section-pagetop bg-secondary">
		<div class="container clearfix">
			<h2 class="title-page">International Order</h2>
		</div> <!-- container //  -->
	</section>
	<!-- ========================= SECTION INTRO END// ========================= -->

	<!-- ========================= SECTION CONTENT ========================= -->
	<section class="section-content bg padding-y border-top">
		<div class="container">

				<div class="row">
					<main class="col-sm-8">
						@if($errors->all())
							<div class="alert alert-danger">
								@foreach($errors->all() as $error)
									<li>{{$error}}</li>
								@endforeach
							</div>
						@endif
						@if (session('success'))
							<div class="alert alert-success" role="alert">
								<button type="button" class="close" data-dismiss="alert">x</button>
								{{ session('success') }}
							</div>
						@endif
						<div class="card">
							<header class="section-heading" style="padding-left: 2%">
								<h3 class="title-section">
									Shop from overseas: Amazon, Ebay, Target, Zara
									and have your delivery in Ghana.
								</h3>
							</header>
							<form method="post" action="{{ route('user.int.place') }}">
								{{ csrf_field() }}
							<div class="billing_details">
								<div class="col-lg-12">
									<div class="form-group">
										<label for="p_link">Copy and paste URL of the items you want to buy <span>*</span></label>
										<input type="text" class="form-control" id="p_link" aria-describedby="name"
										       name="link" placeholder="https://example.com/laptop/1211111" required>
									</div>

									<div class="form-group">
										<label for="qty">Product Quantity <span>*</span></label>
										<input type="number" class="form-control" id="qty" aria-describedby="name"
										       name="quantity" min="1" required>
									</div>

									<div class="form-group">
										<label for="weight">Product Weight <span>*</span></label>
										<input type="text" class="form-control" id="weight" aria-describedby="name"
										       name="weight" placeholder="2kg" required>
									</div>

									<div class="form-group">
										<label for="origin">Product Origin <span>*</span></label>
										<input type="text" class="form-control" id="origin" aria-describedby="name"
										       name="origin" placeholder="USA or China" required>
									</div>

									<div class="form-group">
										<label for="origin">Product Destination <span>*</span></label>
										<input type="text" class="form-control" id="origin" aria-describedby="name"
										       name="destination" placeholder="Ghana" required>
									</div>

								</div>
								<div class="col-lg-12">
									<div class="form-group">
										<label for="order">Order Specification</label>
										<textarea class="form-control" id="order" rows="3"
										          name="other"></textarea>
									</div>

									<div class="form-group">
										<div class="custom-control custom-checkbox">
											<input type="checkbox" class="custom-control-input" id="shopper_assist" name="shopper_assist">
											<label class="custom-control-label" for="shopper_assist">
												Shopper Assist (If selected shoptins will buy on your behalf at a fee)
											</label>
										</div>
									</div>

									<div class="form-group">
										<div class="custom-control custom-checkbox">
											<input type="checkbox" class="custom-control-input" id="self_shopper" name="self_shopper">
											<label class="custom-control-label" for="self_shopper">
												Self Shopper (If selected shoptins will give you a free address to shop yourself)
											</label>
										</div>
									</div>

									<div class="form-group">
										<label for="order">Delivery Address (Optional)</label>
										<textarea class="form-control" id="order" rows="3" name="address"></textarea>
									</div>

									<div class="form-group">
										<button class="btn btn-success btn-block" type="submit">
											<i class="fa fa-cart-plus"></i>
											Add to cart
										</button>
									</div>

								</div>
							</div>
							</form>
						</div> <!-- card.// -->
					</main> <!-- col.// -->
			</form>
					<aside class="col-sm-4">
						<div class="card" style="width: 100%">
							<div class="card-body">
								<p class="alert alert-warning">
									Please be sure to fill all the information before proceeding to place your order.
								</p>

								<i class="fa fa-shopping-cart" style="color: #28a745"></i>
								@if(session()->has('code'))
									<span id="product-inter" style="color: #28a745"><b>{{ count(\App\International::where('code',session('code'))->get()) }} product added</b></span>
								@else
									<span id="product-inter" style="color: #28a745"><b>0 product(s) added</b></span>
								@endif

								<hr>
								<figure class="itemside mb-3">
									<aside class="aside">
										<a href="{{ route('user.int.order.place') }}">
											<button class="btn btn-primary">
												<i class="fa fa-hand-point-right"></i>
												Place your order
											</button>
										</a>

									</aside>
								</figure>
							</div>
						</div>
						<div class="list-group">
							<article class="list-group-item">
								<header class="filter-header">
									<a href="#" data-toggle="collapse" data-target="#collapse1" aria-expanded="true" class="">
										<i class="icon-action fa fa-chevron-down"></i>
										<h6 class="title">Process </h6>
									</a>
								</header>
								<div class="filter-content collapse show" id="collapse1" style="">
									<ol>
										<li>Click on shop international</li>
										<li>Provide details of what you want to purchase by filling form</li>
										<li>Submit order and receive quote</li>
										<li>Pay when your items arrive in Ghana</li>
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
										<li>Delivery within 5 -7 days</li>
										<li>Free insurance for items worth up to $100</li>
										<li>Option to purchase on behalf of client</li>
										<li>Best shipping rates on the planet. $20 for one Kg</li>
										<li>The bigger your package, the less you pay</li>
									</ol>
								</div>
							</article>
							<article class="list-group-item">
								<header class="filter-header">
									<a href="#" data-toggle="collapse" data-target="#importantPoints" class="collapsed" aria-expanded="false">
										<i class="icon-action fa fa-chevron-down"></i>
										<h6 class="title">Important points</h6>
									</a>
								</header>
								<div class="filter-content collapse" id="importantPoints" style="">
									<p>You may be required to show proof of purchase</p>
									<ol>
										<li>Please use Estimator to calculate your shipping cost before submitting order</li>
										<li>You may have to pay duties and taxes if your product is dutiable</li>
										<li>Full costs will have to be paid before your product is delivered
											to you or before documents are handed to you if you choose to clear yourself</li>
										<li>Processing charges may apply if you cancel order after making payment</li>
										<li>Returning a product to Supplier/Merchant at any stage and/or
											for reasons not caused by Shoptins or Affiliates may incur separate charges</li>
										<li>Our Delivery time is exclusive of the time it will take to receive item from Merchant/Store</li>
										<li>Free insurance is up to $100 of your item worth. Please contact us if you want to pay extra for full insurance</li>
										<li> For our Shopper Assist service please ensure the URL you share with us reflects the exact item you want
											and all specifications like weight and colour. You can contact us via support@shoptins.com to
											mention any additional requirements</li>
										<li>Providing an address to you to purchase online is free but purchasing online on your
											behalf comes with a GHC 50 admin fee</li>
										<li>Shipping fees are exclusive of import duty and handling charges</li>
									</ol>
								</div>
							</article>
							<article class="list-group-item">
								<header class="filter-header">
									<a href="#" data-toggle="collapse" data-target="#faq" class="collapsed" aria-expanded="false">
										<i class="icon-action fa fa-chevron-down"></i>
										<h6 class="title">FAQs</h6>
									</a>
								</header>
								<div class="filter-content collapse" id="faq" style="">
									<h4>Are there any Sign up fees?</h4>
									<p>No it is completely free to sign up</p><br>
									<h4>What is Merchant Shipping?</h4>
									<p>Merchant shipping is the cost of transporting the purchased item from
										the Merchants store/warehouse to our affiliate center at the origin.
										This is different from shipping cost.</p><br>
									<h4>What is shipping cost?</h4>
									<p>Shipping cost is the cost involved in transporting your purchased
										items from the origin to the destination. Please check shipping cost with
										estimator before you place order. Discounts may apply.</p><br>
									<h4>Duties & Taxes</h4>
									<p>Some items are duty free and so you wont have to pay duties, taxes and
										other clearing costs. Other items require duties, taxes and clearing charges.
										Dutiable and Non-Dutiable items are both determined by destination customs
										and so you will be informed about any obligations when your item(s) arrive.
										You can choose to clear yourself after you pay shipping cost, or let us clear
										on your behalf.</p><br>
									<h4>Delivery</h4>
									<p>You can come pickup your item(s) when they arrive in Ghana. If you want us to
										deliver to your doorstep be sure to select the option and provide delivery address</p>
								</div>
							</article>
						</div> <!-- list-group.// -->

					</aside> <!-- col.// -->
				</div>

		</div> <!-- container .//  -->
	</section>
	<!-- ========================= SECTION CONTENT END// ========================= -->

@endsection