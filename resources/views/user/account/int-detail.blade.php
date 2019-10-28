@extends('user.masterint')
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
					<div class="row">
						<div class="col-md-12">
							<div class="bgc-white bd bdrs-3 p-20 mB-20">
								<h4 class="c-grey-900 mB-20">Order Details For International</h4>
								<table class="table table-striped" cellspacing="0"
								       width="100%">
									<thead>
									<tr>
										<th>Product Link</th>
										<th>Origin</th>
										<th>Quantity</th>
										<th>Weight</th>
										<th>SubTotal</th>
									</tr>
									</thead>
									<tbody>
									@foreach($order_detail as $detail)
										<tr>
											<td>
												<a href="{{$detail->link}}" target="_blank">{{ \Illuminate\Support\Str::limit($detail->link,35,'...') }}</a>
											</td>
											<td>{{ $detail->origin }}</td>
											<td>{{ $detail->quantity }}</td>
											<td>{{ $detail->weight }}</td>
											<td>{{ $detail->price * $detail->quantity }}</td>
										</tr>
									@endforeach
									</tbody>
									<tfoot>
									<tr>
										<td colspan="4">Total With Admin Fee:</td>
										<td>
											<strong>
                                                <?php $total = 0;$check = false; ?>
												@foreach($order_detail as $detail)
                                                    <?php $total = ($total + $detail->price) * $detail->quantity  ?>
												@endforeach
												@foreach($order_detail as $detail)
													@if($detail->shopper_assist == 1)
                                                        <?php $check = true; ?>
													@endif
												@endforeach
												@if($check)
													= &#8373;{{ $total + 50 }}
												@else
													= &#8373;{{ $total }}
												@endif
											</strong>
										</td>
									</tr>
									<tr>
										<td colspan="4"></td>
										<td>
											@if($order->status == 2)
												<a href="{{route('user.int.replace.order',$order->order_code)}}"><button class="btn btn-success">Re-Place Order</button></a>
											@else
												<a href="{{route('user.int.decline.order',$order->order_code)}}"><button class="btn btn-danger">Cancel Order</button></a>
											@endif
										</td>
									</tr>
									</tfoot>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End login Area =================-->


@endsection