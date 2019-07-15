@extends('user.master')
@section('content')


<!-- ========================= SECTION PAGETOP ========================= -->
<section class="section-pagetop bg-secondary">
    <div class="container clearfix">
        <h2 class="title-page">Our Shop</h2>
    </div> <!-- container //  -->
</section>

<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content bg padding-y">
    <div class="container">

        <div class="row">
            <aside class="col-sm-3">
                <div class="card card-filter">
                    <article class="card-group-item">
                        <header class="card-header category-header">
                            <a class="" aria-expanded="true" href="#" data-toggle="collapse" data-target="#collapse22">
                                <i class="icon-action fa fa-chevron-down"></i>
                                <h6 class="title">By Category</h6>
                            </a>
                        </header>
                        <div style="" class="filter-content collapse show" id="collapse22">
                            <div class="card-body">
                                <ul class="list-unstyled list-lg">
                                    @foreach($category as $menu)
                                        <li>
                                            <a href="{{route('user.shop.category',$menu->category_id)}}">
                                                {{$menu->category_name}}
                                                <span class="float-right badge badge-light round">{{
                                                \App\Product::where('category_id',$menu->category_id)->count()
                                                 }}</span>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div> <!-- card-body.// -->
                        </div> <!-- collapse .// -->
                    </article> <!-- card-group-item.// -->
                    <article class="card-group-item">
                        <header class="card-header">
                            <a href="#" data-toggle="collapse" data-target="#collapse33">
                                <i class="icon-action fa fa-chevron-down"></i>
                                <h6 class="title">By Price  </h6>
                            </a>
                        </header>
                        <div class="filter-content collapse show" id="collapse33">
                            <div class="card-body">
                                <input type="range" class="custom-range" min="0" max="100" name="">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Min</label>
                                        <input class="form-control" placeholder="&#8373;1" type="number" min="1">
                                    </div>
                                    <div class="form-group text-right col-md-6">
                                        <label>Max</label>
                                        <input class="form-control" placeholder="&#8373;1,0000" type="number" max="10000">
                                    </div>
                                </div> <!-- form-row.// -->
                                <button class="btn btn-block btn-outline-primary">Apply</button>
                            </div> <!-- card-body.// -->
                        </div> <!-- collapse .// -->
                    </article> <!-- card-group-item.// -->
                    <article class="card-group-item">
                        <header class="card-header">
                            <a href="#" data-toggle="collapse" data-target="#collapse44">
                                <i class="icon-action fa fa-chevron-down"></i>
                                <h6 class="title">By Manufacturer </h6>
                            </a>
                        </header>
                        <div class="filter-content collapse show" id="collapse44">
                            <div class="card-body">
                                <ul class="list-unstyled list-lg">
                                    @foreach($manufacture as $menu)
                                        <li>
                                            <a href="{{route('user.shop.manufacture',$menu->manufacture_id)}}">
                                                {{$menu->manufacture_name}}
                                                <span class="float-right badge badge-light round">{{
                                                    \App\Product::where('manufacture_id',$menu->manufacture_id)->count()
                                                     }}</span>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div> <!-- card-body.// -->
                        </div> <!-- collapse .// -->
                    </article> <!-- card-group-item.// -->
                </div> <!-- card.// -->

            </aside> <!-- col.// -->
            <main class="col-sm-9">
                <article class="card">
                    <div class="card-body">
                        <h4>Showing 1 to {{count($product)}} items</h4>
                        <div class="row mt-3">
                            @foreach($product as $item)
                                <div class="col-lg-4 mb-4">
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
                        </div> <!-- row.// -->

                        <div align="center">
                            <nav aria-label="Page navigation example" class="pagination_area">
                                <ul class="pagination">
                                    {!! $product->render() !!}
                                </ul>
                            </nav>
                        </div>

                    </div> <!-- card-body .// -->
                </article> <!-- card product .// -->
            </main> <!-- col.// -->
        </div>

    </div> <!-- container .//  -->
</section>
<!-- ========================= SECTION CONTENT END// ========================= -->

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
@endsection