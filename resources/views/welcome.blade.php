@extends('user.master')
@section('content')


<!-- ========================= SECTION MAIN ========================= -->
<section class="section-main bg padding-top-sm">
    <div class="container">

        <div class="row row-sm">
            <aside class="col-md-3">
                <div class="card">
                    <header class="card-header white category-header">
                        <i class="icon-menu"></i>
                        Categories
                    </header>
                    <ul class="menu-category">
                        <?php $categories = \App\Category::inRandomOrder()->limit(7)->get(); ?>
                        @foreach($categories as $category)
                            <li>
                                <a href="{{route('user.shop.category',$category->category_id)}}">
                                    {{$category->category_name}}
                                </a>
                            </li>
                        @endforeach
                        <li><a href="{{route('user.shop')}}">Show All Categories</a></li>
                    </ul>
                </div> <!-- card.// -->
            </aside> <!-- col.// -->
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
                                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                    tempor incididunt ut labor </p>
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
                                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                    tempor incididunt dolor laburab </p>
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
                                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                    tempor incididunt dolor laburab </p>
                            </figcaption>
                        </figure> <!-- iconbox // -->
                    </article> <!-- panel-lg.// -->
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
                                            <a href="{{route('user.shop.product.detail',$item->product_id)}}">
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

{{--<!--===================== Item of the Day =====================-->
<section class="section-content padding-y bg">
    <div class="container">
        <article class="card card-product">
            <div class="card-body">
                <header class="section-heading">
                    <h3 class="title-section">Product Of The Day</h3>
                </header>
                <div class="row">
                    <aside class="col-sm-3">
                        <div class="img-wrap"><img src="{{ asset('home/images/items/2.jpg') }}"></div>
                    </aside> <!-- col.// -->
                    <article class="col-sm-6">

                        <h4 class="title"> Ut wisi enim ad minim veniam  </h4>
                        <div class="rating-wrap">
                            <ul class="rating-stars">
                                <li style="width:80%" class="stars-active">
                                    <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </li>
                                <li>
                                    <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </li>
                            </ul>
                            <div class="label-rating">132 reviews</div>
                            <div class="label-rating">154 orders </div>
                        </div> <!-- rating-wrap.// -->
                        <p> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, Lorem ipsum dolor sit amet, consectetuer adipiscing elit, Ut wisi enim ad minim veniam </p>
                        <dl class="dlist-align">
                            <dt>Color</dt>
                            <dd>Black and white</dd>
                        </dl>  <!-- item-property-hor .// -->
                        <dl class="dlist-align">
                            <dt>Material</dt>
                            <dd>Syntetic, wooden</dd>
                        </dl>  <!-- item-property-hor .// -->
                        <dl class="dlist-align">
                            <dt>Delivery</dt>
                            <dd>Russia, USA, and Europe</dd>
                        </dl>  <!-- item-property-hor .// -->

                    </article> <!-- col.// -->
                    <aside class="col-sm-3 border-left">
                        <div class="action-wrap">
                            <div class="price-wrap h4">
                                <span class="price"> $56 </span>
                                <del class="price-old"> $98</del>
                            </div> <!-- info-price-detail // -->
                            <p class="text-success">Free shipping</p>
                            <br>
                            <p>
                                <a href="#" class="btn btn-primary"> Buy now </a>
                                <a href="#" class="btn btn-secondary"> Details  </a>
                            </p>
                            <a href="#"><i class="fa fa-heart"></i> Add to wishlist</a>
                        </div> <!-- action-wrap.// -->
                    </aside> <!-- col.// -->
                </div> <!-- row.// -->
            </div> <!-- card-body .// -->
        </article> <!-- product-list.// -->
    </div>
</section>
<!--===================== Item of the Day End =====================-->--}}

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
                                            <a href="{{route('user.shop.product.detail',$item->product_id)}}">
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

<!-- ===================== SECTION MORE ADS ================-->
<section class="section-content padding-y bg">
    <div class="container">
        <div class="card mb-3">
            <div class="card-body">
                <div class="row mb-4">

                    <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12 mb-4">
                        <figure class="itemside">
                            <div class="aside">
                                <span class="icon-wrap rounded icon-sm white bg-primary"><i class="fa fa-coffee"></i></span>
                            </div>
                            <figcaption class="text-wrap">
                                <h5 class="title">Trend Forecasting</h5>
                                <p>Dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                    tempor incididunt ut labore et </p>
                            </figcaption>
                        </figure> <!-- iconbox // -->
                    </div><!-- col // -->
                    <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12 mb-4">
                        <figure class="itemside">
                            <div class="aside">
                                <span class="icon-wrap rounded icon-sm white bg-primary"><i class="fa fa-lightbulb"></i></span>
                            </div>
                            <figcaption class="text-wrap">
                                <h5 class="title">Creative Strategy</h5>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                    tempor incididunt  </p>
                            </figcaption>
                        </figure> <!-- iconbox // -->
                    </div><!-- col // -->
                    <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12 mb-4">
                        <figure class="itemside">
                            <div class="aside">
                                <span class="icon-wrap rounded icon-sm white bg-primary"><i class="fa fa-cogs"></i></span>
                            </div>
                            <figcaption class="text-wrap">
                                <h5 class="title">Building Business </h5>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                    tempor incididunt lab </p>
                            </figcaption>
                        </figure> <!-- iconbox // -->
                    </div> <!-- col // -->

                </div> <!-- row.// -->
                <div class="row">
                    <div class="col-lg-4 col-lg-4 col-sm-12 col-xs-12 mb-4">
                        <div class="card-banner align-items-end" style="height:250px;
                         background-image: url('{{ asset('home/images/posts/5.jpg') }}');">
                            <article class="overlay m-4 w-100">
                                <h5 class="card-title">Primary text as title</h5>
                                <a href="#" class="btn btn-warning btn-sm"> View more </a>
                            </article>
                        </div> <!-- card.// -->
                    </div>
                    <div class="col-lg-4 col-lg-4 col-sm-12 col-xs-12 mb-4">
                        <div class="card-banner align-items-end" style="height:250px;
                         background-image: url('{{ asset('home/images/posts/3.jpg') }}');">
                            <article class="overlay m-4 w-100">
                                <h5 class="card-title">Primary text as title</h5>
                                <a href="#" class="btn btn-warning btn-sm"> View more </a>
                            </article>
                        </div> <!-- card.// -->
                    </div>
                    <div class="col-lg-4 col-lg-4 col-sm-12 col-xs-12 mb-4">
                        <div class="card-banner align-items-end" style="height:250px;
                         background-image: url('{{ asset('home/images/posts/2.jpg') }}');">
                            <article class="overlay m-4 w-100">
                                <h5 class="card-title">Primary text as title</h5>
                                <a href="#" class="btn btn-warning btn-sm"> View more </a>
                            </article>
                        </div> <!-- card.// -->
                    </div>
                </div> <!-- row.// -->
            </div>
        </div>
    </div>
</section>
<!-- ===================== SECTION MORE ADS END================-->

@endsection