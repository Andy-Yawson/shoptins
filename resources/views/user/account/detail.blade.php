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
					<div class="row">
						<div class="col-md-12">
							<div class="bgc-white bd bdrs-3 p-20 mB-20">
								<h4 class="c-grey-900 mB-20">Order Details</h4>
								<table class="table table-striped" cellspacing="0"
								       width="100%">
									<thead>
									<tr>
										<th>Product Name</th>
										<th>Product Price</th>
										<th>Product Sales Quantity</th>
										<th>Product SubTotal</th>
									</tr>
									</thead>
									<tbody>
									@foreach($order_detail as $detail)
										<tr>
											<td>{{$detail->product_name}}</td>
											<td>&#8373;{{$detail->product_price}}</td>
											<td>{{$detail->product_sales_quantity}}</td>
											<td>&#8373;{{intval($detail->product_price) * intval($detail->product_sales_quantity) }}</td>
										</tr>
									@endforeach
									</tbody>
									<tfoot>
									<tr>
										<td colspan="3">Total With VAT:</td>
										<td><strong>= &#8373;{{$order_detail[0]->order_total}}</strong></td>
									</tr>
									<tr>
										<td colspan="3"></td>
										<td>
											@if($detail->order_status == 3)
												<a href="{{route('user.replace.order',$order_detail[0]->order_id)}}"><button class="btn btn-success">Re-Place Order</button></a>
											@else
												<a href="{{route('user.decline.order',$order_detail[0]->order_id)}}"><button class="btn btn-danger">Cancel Order</button></a>
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