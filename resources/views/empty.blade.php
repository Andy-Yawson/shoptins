@extends('user.master')
@section('content')



    <!--================login Area =================-->
    <section class="emty_cart_area p_100">
        <div class="container">
            <div class="empty-cart-div" align="center">
                <img src="{{ asset('images/empty-cart.svg') }}" width="200px" height="200px">
                <h3 class="mt-4 mb-4">Your Cart is Empty</h3>
                <h4>back to <a href="{{route('user.shop')}}">shopping</a></h4>
            </div>
        </div>
    </section>
    <!--================End login Area =================-->


@endsection