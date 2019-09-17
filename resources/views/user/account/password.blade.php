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
							<h4 class="card-title mb-4 mt-1 black">Change Password</h4>
							<form method="post" action="{{ route('user.password.change') }}">
								{{ csrf_field() }}
								<div class="form-group input-icon">
									<i class="fa fa-lock"></i>
									<input class="form-control" placeholder="Old Password" type="password" name="old_password" required>
								</div>
								<div class="form-group input-icon">
									<i class="fa fa-lock"></i>
									<input class="form-control" placeholder="New Password" type="password" name="password" required>
								</div>
								<div class="form-group input-icon">
									<i class="fa fa-lock"></i>
									<input class="form-control" placeholder="Confirm New Password" type="password"
									       name="confirm_password" required>
								</div>
								<div class="form-group">
									<button type="submit" class="btn btn-info">
										<i class="fa fa-hand-point-right"></i>
										Change Password
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