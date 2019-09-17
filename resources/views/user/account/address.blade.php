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
					@if (session('status'))
						<div class="alert alert-success" role="alert">
							<button type="button" class="close" data-dismiss="alert">x</button>
							{{ session('status') }}
						</div>
					@endif
					@if (session('success'))
						<div class="alert alert-success" role="alert">
							<button type="button" class="close" data-dismiss="alert">x</button>
							{{ session('success') }}
						</div>
					@endif
					@if (session('error'))
						<div class="alert alert-danger" role="alert">
							<button type="button" class="close" data-dismiss="alert">x</button>
							{{ session('error') }}
						</div>
					@endif
					<div class="card">
						<article class="card-body">
							<h4 class="card-title mb-4 mt-1 black">Update Address</h4>
							<form method="post" action="{{ route('user.post.address') }}">
								{{ csrf_field() }}
								<div class="form-group">
									<label for="phone">Full Name</label>
									<input type="text" class="form-control" id="phone" aria-describedby="phone" readonly
									       name="shipping_name" value="@if(auth()->check()){{auth()->user()->name}}@endif">
								</div>

								<div class="form-group">
									<label for="address">Address <span>*</span></label>
									<input type="text" class="form-control" id="address" aria-describedby="address" required
									       name="shipping_address" value="@if(!empty($shipping)){{$shipping->shipping_address}}@endif">
								</div>

								<div class="form-group">
									<label for="ctown">City / Town <span>*</span></label>
									<input type="text" class="form-control" id="address" aria-describedby="Town/City" required
									       name="shipping_city" value="@if(!empty($shipping)){{$shipping->shipping_city}}@endif">
								</div>

								<div class="form-group">
									<label for="email">Email <span>*</span></label>
									<input type="email" class="form-control" id="email" aria-describedby="email"
									       value="@if(auth()->check()){{auth()->user()->email}}@endif"
									       name="shipping_email" readonly>
								</div>

								<div class="form-group">
									<label for="phone">Phone <span>*</span></label>
									<input type="text" class="form-control" id="phone" aria-describedby="phone" required
									       name="shipping_phone" value="@if(!empty($shipping)){{$shipping->shipping_phone}}@endif">
								</div>

								<div class="form-group">
									<label for="order">Order Notes</label>
									<textarea class="form-control" id="order" rows="3"
									          name="shipping_notes">@if(!empty($shipping)){{$shipping->shipping_notes}}@endif</textarea>
								</div>

								<div class="form-group">
									<button type="submit" class="btn btn-info">
										<i class="fa fa-hand-point-right"></i>
										Update Address
									</button>
								</div>
							</form>
						</article>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End login Area =================-->


@endsection