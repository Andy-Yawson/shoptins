@extends('user.master')
@section('content')


<!-- ========================= SECTION MAIN ========================= -->
<section class="section-main bg padding-top-sm">
    <div class="container">

        <div class="row row-sm">
            <aside class="col-md-3 mb-2">
                <div class="card">
                    <header class="card-header white category-header">
                        <i class="icon-menu"></i>
                        Categories
                    </header>
                    <ul class="menu-category">
                        <?php $categories = \App\Category::orderBy('created_at','asc')->limit(6)->get(); ?>
                        @foreach($categories as $category)
                            <li>
                                <a href="{{route('user.shop.category',$category->category_slug)}}">
                                    {{$category->category_name}}
                                </a>
                            </li>
                        @endforeach
                        <li><a href="{{route('user.shop')}}">Show All Categories</a></li>
                    </ul>
                </div>
            </aside>
            <div class="col-md-9">
                <div id="carousel2_indicator" class="carousel slide carousel-fade" data-ride="carousel">
                    <div class="carousel-inner">
                        @foreach($slider as $slide)
                            <div class="carousel-item @if($loop->iteration == 1) active @else '' @endif">
                                <img class="d-block w-100" src="{{asset('images/slider_images/'.$slide->slider_image)}}"
                                     alt="slide image" height="390px">
                                {{--<article class="carousel-caption" style="background: rgba(0,0,0,0.5)">
                                    <h4>{{ $slide->slider_name }}</h4>
                                    <p>{{ $slide->slider_description }}</p>
                                </article>--}}
                            </div>
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#carousel2_indicator" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carousel2_indicator" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div> <!-- col.// -->

        </div>
    </div> <!-- container .//  -->
</section>
<!-- ========================= SECTION MAIN END// ========================= -->

<!--============== Item Side ===================-->
<section class="section-content padding-y bg">
	<div class="container">
		<div id="code_itemside_round">
			<div class="row">
				<div class="col-md-6">
					<article class="list-group-item">
						<header class="filter-header">
							<a href="#" data-toggle="collapse" data-target="#collapse1" aria-expanded="true" class="collapsed">
								<i class="icon-action fa fa-chevron-down"></i>
								<h6 class="title">Benefits </h6>
							</a>
						</header>
						<div class="filter-content collapse" id="collapse1" style="">
							<ol>
								<li>We buy you the best products on the market at super prices</li>
								<li>Free  normal delivery within 7 hours</li>
								<li>GHC 10 -15 for express delivery within 2 hrs</li>
							</ol>
						</div> <!-- collapse -filter-content  .// -->
					</article>
				</div><!-- col // -->
				<div class="col-md-6">
					<article class="list-group-item">
						<header class="filter-header">
							<a href="#" data-toggle="collapse" data-target="#importantPoints" aria-expanded="true" class="collapsed">
								<i class="icon-action fa fa-chevron-down"></i>
								<h6 class="title">Important points</h6>
							</a>
						</header>
						<div class="filter-content collapse" id="importantPoints" style="">
							<ol>
								<li>You may be required to pay for the items on your shopping list before purchase</li>
								<li> Full payment will be required before package handover</li>
								<li>Cancelling order after delivery process has commenced comes at a cost</li>
								<li> Refunds to customers will be paid minus merchant transfer fees</li>
								<li>Shoptins requires that our users provide further specifications for selected products that come in varieties. This can be done in the comment box</li>
								<li>The Shoptins service cannot be used to purchase any illegal items</li>
							</ol>
						</div> <!-- collapse -filter-content  .// -->
					</article>
				</div><!-- col // -->

			</div> <!-- row.// -->
		</div> <!-- code-wrap.// -->
	</div>
</section>
<!--============== Item Side End===================-->


<!-- ========================= SECTION LATEST CONTENT ========================= -->
<section class="section-content padding-y bg">
    <div class="container">

        <div class="card mb-3">
            <div class="card-body">

                <header class="section-heading">
                    <h3 class="title-section">Our Products</h3>
                </header>

                <div class="row">
                    @foreach($product as $item)
                        <div class="col-lg-3 mb-3">
                            <div class="card">
                                <figure class="itemside">
                                    <div class="aside">
                                        <div class="img-wrap img-sm border-right">
                                            <img src="{{asset('images/product_images/'.$item->product_image)}}">
                                        </div>
                                    </div>
                                    <figcaption class="p-3">
                                        <h6 class="title">
                                            <a href="{{route('user.shop.product.detail',$item->slug)}}">
                                                {{$item->product_name}}
                                            </a>
                                        </h6>
                                        <div class="price-wrap">
                                            @if($item->product_del > 0)
                                                <span class="price-new">&#8373;{{ round((1 - ($item->product_del/100)) * $item->product_price) }}</span>
                                                <del class="price-old">&#8373;{{$item->product_price}}</del>
                                            @else
                                                <span class="price-new">&#8373;{{$item->product_price}}</span>
                                            @endif
                                        </div>
                                    </figcaption>
                                </figure>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div> <!-- card-body .// -->
        </div> <!-- card.// -->


    </div> <!-- container .//  -->
</section>
<!-- ========================= SECTION LATEST CONTENT END// ========================= -->


<!-- ========================= SECTION FEATURED CONTENT ========================= -->
<section class="section-content padding-y bg">
    <div class="container">
        <div class="card mb-3">
            <div class="card-body">

                <header class="section-heading">
                    <h3 class="title-section">Our Featured Products</h3>
                </header>
                <div class="row">
                    @foreach($featured as $item)
                        <div class="col-lg-3 mb-3">
                            <div class="card">
                                <figure class="itemside">
                                    <div class="aside">
                                        <div class="img-wrap img-sm border-right">
                                            <img src="{{asset('images/product_images/'.$item->product_image)}}">
                                        </div>
                                    </div>
                                    <figcaption class="p-3">
                                        <h6 class="title">
                                            <a href="{{route('user.shop.product.detail',$item->slug)}}">
                                                {{$item->product_name}}
                                            </a>
                                        </h6>
                                        <div class="price-wrap">
                                            @if($item->product_del > 0)
                                                <span class="price-new">&#8373;{{ round((1 - ($item->product_del/100)) * $item->product_price) }}</span>
                                                <del class="price-old">&#8373;{{$item->product_price}}</del>
                                            @else
                                                <span class="price-new">&#8373;{{$item->product_price}}</span>
                                            @endif
                                        </div>
                                    </figcaption>
                                </figure>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div> <!-- card-body .// -->
        </div> <!-- card.// -->
    </div> <!-- container .//  -->
</section>
<!-- ========================= SECTION FEATURED CONTENT END// ========================= -->



@endsection