@extends('user.master')
@section('content')



    <!--================login Area =================-->
    <section class="emty_cart_area p_100">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="card mt-5 mb-5">
                        <div class="card-header">
                            About Us!
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">We glad to welcome youche</h5>
                            <p class="card-text">
                                Shoptins is here to to take on your shopping needs. From the comfort of
                                your mobile phone you can shop from local and international stores and have
                                the items delivered to your doorstep.<br><br>
                                For local purchase you only have to choose items from our catalogue or make a custom
                                order for us to purchase and deliver to you.
                                For international purchase we provide you an address to shop from the online store
                                of your choice, we receive your items after purchase, ship and deliver to you. It is that simple.<br><br>
                                We know you are busy, we know you want your items delivered fast, and we know you want to pay as little as possible. We want to assure you that we are here to provide you all of that, with a big smile on our face.
                                Try us today.
                            </p>

                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <img src="{{ asset('images/about-us.png') }}" class="mt-4" width="300px" height="300px"/>
                </div>
            </div>
        </div>
    </section>
    <!--================End login Area =================-->


@endsection