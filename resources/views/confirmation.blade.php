@extends('user.master')
@section('content')

    <!-- ========================= SECTION PAGETOP ========================= -->
    <section class="section-pagetop bg-secondary">
        <div class="container clearfix">
            <h2 class="title-page">Order Confirmation</h2>
        </div> <!-- container //  -->
    </section>
    <!-- ========================= SECTION INTRO END// ========================= -->

    <!--================Track Area =================-->
    <section class="track_area p_100">
        <div class="container">
                <div class="card" align="center" style="padding: 5%;margin: 5%">
                    <div class="card-body">
                        <div>
                            <img src="{{ asset('images/success.svg') }}" height="100px" width="100px"/>
                        </div>
                        <h1><b>Congratulations</b></h1>
                        <br><br>
                        @if (session('order_code'))
                            <h2 style="color: #0dda2a">
                                You have successfully placed your order with ORDER CODE: <b>{{ session('order_code') }}</b>
                            </h2>
                        @endif
                        @if (session('code'))
                            <h2 style="color: #0dda2a">
                                You have successfully placed your order with ORDER CODE: <b>{{ session('code') }}</b>
                            </h2>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Track Area =================-->

@endsection