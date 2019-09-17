@extends('user.master')
@section('content')

    <!-- ========================= SECTION PAGETOP ========================= -->
    <section class="section-pagetop bg-secondary">
        <div class="container clearfix">
            <h2 class="title-page">Search Results</h2>
        </div> <!-- container //  -->
    </section>
    <!-- ========================= SECTION INTRO END// ========================= -->

    <!--================Track Area =================-->
    <section class="track_area p_100">
        <div class="container">
                <div class=" mt-4 mb-4">
                    <header class="section-heading">
                        <h3 class="title-section">We found {{count($results)}} @if(count($results) < 2) item @else items @endif
                            for your search</h3>
                    </header>
                    <div class="card-body">
                        <div class="row">
                            @foreach($results as $item)
                                <div class="col-lg-3 mb-4">
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
                                                <a href="{{ route('user.shop.product.detail',$item->slug) }}" class="btn btn-primary">
                                                    <i class="fa fa-cart-plus"></i>
                                                    add to cart
                                                </a>
                                            </figcaption>
                                        </figure>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div align="center">
                        <nav aria-label="Page navigation example" class="pagination_area">
                            <ul class="pagination">
                                {!! $results->render() !!}
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Track Area =================-->

@endsection