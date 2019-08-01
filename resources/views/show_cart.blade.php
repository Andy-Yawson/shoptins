@extends('user.master')
@section('content')


    <!-- ========================= SECTION PAGETOP ========================= -->
    <section class="section-pagetop bg-secondary">
        <div class="container clearfix">
            <h2 class="title-page">Ordered Products</h2>
        </div> <!-- container //  -->
    </section>
    <!-- ========================= SECTION INTRO END// ========================= -->

    <!-- ========================= SECTION CONTENT ========================= -->
    <section class="section-content bg padding-y border-top">
        <div class="container">

            <div class="row">
                <main class="col-sm-9">

                    <div class="card">
                        <table class="table table-hover shopping-cart-wrap">
                            <thead class="text-muted">
                            <tr>
                                <th scope="col">Product</th>
                                <th scope="col" width="120">Quantity</th>
                                <th scope="col" width="120">Price</th>
                                <th scope="col" class="text-right" width="200">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php  $contents = \Gloudemans\Shoppingcart\Facades\Cart::content(); ?>
                            @foreach($contents as $single)
                                <tr>
                                    <td>
                                        <figure class="media">
                                            <div class="img-wrap">
                                                <img src="{{asset('images/product_images/'.$single->options->image)}}"
                                                     class="img-thumbnail img-sm">
                                            </div>
                                            <figcaption class="media-body">
                                                <h6 class="title pt-4">{{$single->name}}</h6>
                                            </figcaption>
                                        </figure>
                                    </td>
                                    <td>
                                        <form method="post" action="{{route('user.shop.update.item')}}">
                                            {{csrf_field()}}
                                            <input type="hidden" name="rowId" value="{{$single->rowId}}">
                                            <input type="text" value="{{$single->qty}}" name="qty" class="form-control">
                                            <button type="submit" class="btn btn-sm btn-primary mt-2">
                                                <i class="fa fa-thumbs-up"></i>
                                                Update
                                            </button>
                                        </form>
                                    </td>
                                    <td>
                                        <div class="price-wrap">
                                            <var class="price">GH&#8373;{{$single->total}}</var>
                                            {{--<small class="text-muted">(USD5 each)</small>--}}
                                        </div> <!-- price-wrap .// -->
                                    </td>
                                    <td class="text-right">
                                        <a href="{{route('user.shop.delete.item',$single->rowId)}}" class="btn btn-outline-danger"> × Remove</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div> <!-- card.// -->

                </main> <!-- col.// -->
                <aside class="col-sm-3">
                    <p class="alert alert-warning">
                        Please make sure all products are rectified before proceeding
                    </p>
                    <dl class="dlist-align">
                        <dt>Tax:</dt>
                        <dd class="text-right">{{Cart::tax()}}</dd>
                    </dl>
                    <dl class="dlist-align">
                        <dt>Total price:</dt>
                        <dd class="text-right">GH&#8373;{{Cart::subtotal()}}</dd>
                    </dl>
                    <dl class="dlist-align h4">
                        <dt>Total:</dt>
                        <dd class="text-right"><strong>GH&#8373;{{Cart::subtotal()}}</strong></dd>
                    </dl>
                    <hr>
                    <figure class="itemside mb-3">
                        <aside class="aside"><img src="{{ asset('home/images/icons/pay-visa.png') }}"></aside>
                        <div class="text-wrap small text-muted">
                            You can make payment with visa card and save more time
                        </div>
                    </figure>
                    <figure class="itemside mb-3">
                        <aside class="aside"><img src="{{ asset('home/images/icons/pay-mastercard.png') }}"></aside>
                        <div class="text-wrap small text-muted">
                            You can make payment with master card and save more time
                        </div>
                    </figure>
                    <figure class="itemside mb-3">
                        <aside class="aside">
                            <a  href="{{route('user.clear.cart')}}">
                                <button class="btn btn-danger"><i class="fa fa-trash"></i> Clear Cart</button>
                            </a>
                            <a  href="{{route('user.checkout')}}">
                                <button class="btn btn-primary"><i class="fa fa-hand-point-right"></i> Proceed checkout</button>
                            </a>
                        </aside>
                    </figure>

                </aside> <!-- col.// -->
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

@endsection