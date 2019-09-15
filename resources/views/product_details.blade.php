@extends('user.master')
@section('content')

	<!-- ========================= SECTION PAGETOP ========================= -->
	<section class="section-pagetop bg-secondary">
		<div class="container clearfix">
			<h2 class="title-page">Product Detail</h2>
		</div> <!-- container //  -->
	</section>
	<!-- ========================= SECTION INTRO END// ========================= -->

	<!-- ========================= SECTION CONTENT ========================= -->
	<section class="section-content bg padding-y-sm">
		<div class="container">

			<div class="row">
				<div class="col-xl-12 col-md-12 col-sm-12">

					<main class="card">
						<div class="row no-gutters">
							<aside class="col-sm-6 border-right">
								<article class="gallery-wrap">
									<div class="img-big-wrap">
										<div>
											<a href="{{asset('images/product_images/'.$product->product_image)}}" data-fancybox="">
												<img src="{{asset('images/product_images/'.$product->product_image)}}">
											</a>
										</div>
									</div> <!-- slider-product.// -->
								</article> <!-- gallery-wrap .end// -->
							</aside>
							<aside class="col-sm-6">
								<article class="card-body">
									<!-- short-info-wrap -->
									<h3 class="title mb-3">{{$product->product_name}}</h3>

									<div class="mb-3">
										@if($product->stock == 1)
											<h6 style="color: #1c7430"><b>Available</b> In <span>Stock</span></h6>
										@else
											<h6 style="color: #ff0000"><b>Out</b> of <span>Stock</span></h6>
										@endif
										<var class="price h3 text-warning">
											@if($product->product_del > 0)
												<span class="currency">GH&#8373;{{ round((1 - ($product->product_del/100)) * $product->product_price) }}</span>
												<del class="price-old">GH&#8373;{{$product->product_price}}</del>
											@else
												<span class="currency">GH&#8373;{{$product->product_price}}</span>
											@endif
										</var>
									</div> <!-- price-detail-wrap .// -->
									<dl>
										<dt>Description</dt>
										<dd>
											{!! $product->product_short_description !!}
										</dd>
									</dl>
									<dl class="row">
										<dt class="col-sm-3">Color</dt>
										<dd class="col-sm-9">{{$product->product_color}}</dd>
									</dl>
									<div class="rating-wrap">
										<dl class="row">
											<dt class="col-sm-3">Ratings</dt>
											<dd class="col-sm-9">
												<ul class="rating-stars-detail">
													@if(count($reviews) > 0)
                                                        <?php $totalStar = 0 ?>
														@foreach($reviews as $review)
                                                            <?php $totalStar += intval($review->star) ?>
														@endforeach
                                                        <?php
                                                        $stars = $totalStar / count($reviews);

                                                        for ($i=1; $i <= round($stars); $i++){
                                                        ?>
														<li><a href="#"><i class="fa fa-star active"></i></a></li>
                                                        <?php
                                                        }
                                                        ?>

													@else
														<li><a href="#"><i class="fa fa-star"></i></a></li>
														<li><a href="#"><i class="fa fa-star"></i></a></li>
														<li><a href="#"><i class="fa fa-star"></i></a></li>
														<li><a href="#"><i class="fa fa-star"></i></a></li>
														<li><a href="#"><i class="fa fa-star"></i></a></li>
													@endif
												</ul>
											</dd>
										</dl>
										<div class="label-rating">
											{{count($reviews)}} review<?php echo count($reviews) > 1 ? "s" : ""; ?> so far
										</div>
									</div> <!-- rating-wrap.// -->
									<hr>

									<input type="hidden" id="product_id" value="{{$product->product_id}}">
									<div class="row">
										<div class="col-sm-5">
											<dl class="dlist-inline">
												<dt>Quantity:</dt>
												<dd>
													<input type="number" class="form-control form-control-sm"
													       style="width:70px;" id="qty" value="1" min="1">
												</dd>
											</dl>  <!-- item-property .// -->
										</div> <!-- col.// -->
										<div class="col-sm-7">
											<dl class="dlist-inline">
												<button class="btn btn-primary" id="addToCart">
													<i class="fa fa-cart-plus"></i> add to cart
												</button>
											</dl>  <!-- item-property .// -->
										</div> <!-- col.// -->
									</div> <!-- row.// -->

									<!-- short-info-wrap .// -->
								</article> <!-- card-body.// -->
							</aside> <!-- col.// -->
						</div> <!-- row.// -->
					</main> <!-- card.// -->

					<!-- PRODUCT DETAIL -->
					<article class="card mt-3">
						<div class="card-body">
							<ul class="nav nav-tabs" id="myTab" role="tablist">
								<li class="nav-item">
									<a class="nav-link active" id="home-tab" data-toggle="tab"
									   href="#description" role="tab" aria-controls="home" aria-selected="true">Detail
										overview</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="profile-tab" data-toggle="tab" href="#reviews"
									   role="tab" aria-controls="profile" aria-selected="false">Reviews ({{count($reviews)}})</a>
								</li>
							</ul>
							<div class="tab-content" id="myTabContent">
								<div class="tab-pane fade show active" id="description" role="tabpanel"
								     aria-labelledby="home-tab">
									{!! $product->product_long_description !!}
								</div>
								<div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="profile-tab">
									<div class="row">
										<div class="col-md-6">
											<div style="margin: 2% 5%">
												@if(count($reviews) > 0)
													@foreach($reviews as $review)
														<h4>{{$review->name}}</h4>
														<p>{{$review->review}}</p>
														<ul id="review-stars">
                                                            <?php
                                                            for ($i=1; $i <= $review->star; $i++){
                                                            ?>
															<li><a href="#"><i class="fa fa-star"></i></a></li>
                                                            <?php
                                                            }
                                                            ?>
														</ul>
														<hr>
													@endforeach
												@else
													<h4>No reviews made for this product yet</h4>
												@endif
											</div>
										</div>
										<div class="col-md-6">
											<div class="reviews-comment">
												@if(Auth::guest() === false)
													@if($errors->all())
														<div class="alert alert-danger">
															@foreach($errors->all() as $error)
																<li>{{$error}}</li>
															@endforeach
														</div>
													@endif
													@if (session('status'))
														<div class="alert alert-success" role="alert">
															<button type="button" class="close" data-dismiss="alert">x</button>
															{{ session('status') }}
														</div>
													@endif
													<form method="post" action="{{route('user.make.review')}}">
														{{csrf_field()}}
														<div class="form-group">
															<label for="exampleInputEmail1">Full Name</label>
															<input type="text" class="form-control" id="exampleInputEmail1"
															       placeholder="Enter Your name" name="name"
															       value="{{Auth::user()->name}}">
															<small id="emailHelp" class="form-text text-muted">
																Name is chosen from what you registered with
															</small>
														</div>

														<div class="form-group">
															<label for="exampleInputEmail1">Your Review Comment</label>
															<textarea name="comment" class="form-control" rows="5"></textarea>
														</div>

														<div class='rating-stars' style="padding: 10px;">
															<ul id='stars'>
																<li class='star' title='Poor' data-value='1'>
																	<i class='fa fa-star fa-fw'></i>
																</li>
																<li class='star' title='Fair' data-value='2'>
																	<i class='fa fa-star fa-fw'></i>
																</li>
																<li class='star' title='Good' data-value='3'>
																	<i class='fa fa-star fa-fw'></i>
																</li>
																<li class='star' title='Excellent' data-value='4'>
																	<i class='fa fa-star fa-fw'></i>
																</li>
																<li class='star' title='WOW!!!' data-value='5'>
																	<i class='fa fa-star fa-fw'></i>
																</li>
															</ul>
															<input type="hidden" name="rating" id="ratingVal">
															<input type="hidden" name="product_id" value="{{$product->product_id}}">
														</div>

														<button class="btn btn-primary" type="submit"><i class="fa fa-hand-o-right"></i> Submit Review</button>
													</form>
												@else
													<a href="{{ route('login') }}" class="btn btn-primary">Write a review</a>
												@endif
											</div>
										</div>
									</div>
								</div>
							</div>

						</div> <!-- card-body.// -->
					</article> <!-- card.// -->

					<!-- PRODUCT DETAIL .// -->

				</div> <!-- col // -->
				@if(count($others) > 0)
					<aside class="col-xl-12 col-md-12 col-sm-12">
						<div class="card mt-3">
							<div class="card-header">
								You may also like
							</div>
							<div class="card-body row">
								@foreach($others as $item)
									<div class="col-md-6 col-lg-3 col-sm-12 col-xs-12 item-slide p-2">
										<figure class="card card-product">
											@if($item->product_del > 0)
												<span class="badge-offer"><b> - {{$item->product_del}}%</b></span>
											@endif
											<div class="img-wrap">
												<img src="{{asset('images/product_images/'.$item->product_image)}}">
											</div>
											<figcaption class="info-wrap">
												<h4 class="title">{{$item->product_name}}</h4>
											</figcaption>
											<div class="bottom-wrap">
												<a href="{{route('user.shop.product.detail',$item->slug)}}"
												   class="btn btn-sm btn-primary float-right">Order Now</a>
												<div class="price-wrap h5">
													@if($item->product_del > 0)
														<span class="price-new">&#8373;{{ round((1 - ($item->product_del/100)) * $item->product_price) }}</span>
														<del class="price-old">&#8373;{{$item->product_price}}</del>
													@else
														<span class="price-new">&#8373;{{$item->product_price}}</span>
													@endif
												</div> <!-- price-wrap.// -->
											</div> <!-- bottom-wrap.// -->
										</figure>
									</div>
								@endforeach
							</div> <!-- card-body.// -->
						</div> <!-- card.// -->
					</aside> <!-- col // -->
				@endif
			</div> <!-- row.// -->

		</div><!-- container // -->
	</section>
	<!-- ========================= SECTION CONTENT .END// ========================= -->

	<!--============== Item Side ===================-->
	<section class="section-content padding-y bg">
		<div class="container">
			<div id="code_itemside_round">
				<div class="row">
					<div class="col-md-4">
						<article class="box">
							<figure class="itemside">
								<div class="aside align-self-center">
					<span class="icon-wrap icon-md round bg-warning">
						<i class="fa fa-lightbulb white"></i>
					</span>
								</div>
								<figcaption class="text-wrap">
									<h5 class="title">Sync across all devices</h5>
									<p class="text-muted">
										Access Shoptins via any platform and still get the same taste of easy shopping
									</p>
								</figcaption>
							</figure> <!-- iconbox // -->
						</article> <!-- panel-lg.// -->
					</div><!-- col // -->
					<div class="col-md-4">
						<article class="box">
							<figure class="itemside">
								<div class="aside align-self-center">
					<span class="icon-wrap icon-md round bg-danger">
						<i class="fa fa-lock white"></i>
					</span>
								</div>
								<figcaption class="text-wrap">
									<h5 class="title">Secured protocol</h5>
									<p class="text-muted">
										We keep you from any threats during shopping with us, its safe.
									</p>
								</figcaption>
							</figure> <!-- iconbox // -->
						</article> <!-- panel-lg.// -->
					</div><!-- col // -->
					<div class="col-md-4">
						<article class="box">
							<figure class="itemside">
								<div class="aside align-self-center">
					<span class="icon-wrap icon-md round bg-success">
						<i class="fa fa-credit-card white"></i>
					</span>
								</div>
								<figcaption class="text-wrap">
									<h5 class="title">Secured Payment</h5>
									<p class="text-muted">
										Our payment is made easy and secured with problems at all.
									</p>
								</figcaption>
							</figure> <!-- iconbox // -->
						</article> <!-- panel-lg.// -->
					</div><!-- col // -->
				</div> <!-- row.// -->
			</div> <!-- code-wrap.// -->
		</div>
	</section>
	<!--============== Item Side End===================-->


	<!-- Continue Shopping Modal -->
	<div class="modal fade" id="addToCartModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
	     aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">Product added to your cart successfully!</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-footer" align="center">
					<button type="button" class="btn btn-primary" data-dismiss="modal">
						<i class="fa fa-shopping-cart"></i>
						Continue Shopping
					</button>
					<a href="{{ route('user.shop.show.cart') }}">
						<button type="button" class="btn btn-success">
							<i class="fa fa-credit-card"></i>
							View cart and checkout
						</button>
					</a>
				</div>
			</div>
		</div>
	</div>

	{{-- Error Modal --}}
	<div class="modal fade" id="errorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
	     aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">Sorry there was a problem adding item!</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-footer" align="center">
					<button type="button" class="btn btn-primary" data-dismiss="modal">
						<i class="fa fa-shopping-cart"></i>
						Continue Shopping
					</button>
				</div>
			</div>
		</div>
	</div>

@endsection

@section('scripts')
	<script>
		$(document).ready(function () {

            var modal = $('#addToCartModal');
            var errorModal = $('#errorModal');

            $('#addToCart').click(function () {

				var product_id = $('#product_id').val();
				var qty = $('#qty').val();
                $.ajax({
                    type:'POST',
                    url:'{{route("user.ajax.add")}}',
                    data:{product_id:product_id, qty:qty},
                    success:function(data){
                        modal.modal('show');
                        $('#cart-badge').text(data);
                    },
	                error:function () {
		                errorModal.modal('show');
                    }

                });
            });
        })
	</script>
@endsection