<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Shoptins E-commerce by Andrews Quarcoo">

    <title>Shoptins</title>

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/logo.8704dbd.png') }}">

    <link href="{{ asset('home/css/main.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('home/css/bootstrap.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('home/fonts/fontawesome/css/fontawesome-all.min.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ asset('home/plugins/fancybox/fancybox.min.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ asset('home/plugins/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('home/plugins/owlcarousel/assets/owl.theme.default.css') }}" rel="stylesheet">
    <link href="{{ asset('home/css/ui.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('home/css/responsive.css') }}" rel="stylesheet" media="only screen and (max-width: 1200px)"/>
    <link href="{{ asset('home/plugins/slickslider/slick.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('home/plugins/slickslider/slick-theme.css') }}" rel="stylesheet" type="text/css" />
    @yield('styles')
</head>
<body>

<header class="section-header">
    <nav class="navbar navbar-top navbar-expand-lg navbar-dark">
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample07"
                    aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsExample07">
                <ul class="navbar-nav mr-auto">
                    <li><a href="https://www.facebook.com/ShoptinsGlobal/" class="nav-link"> <i class="fab fa-facebook"></i> </a></li>
                    <li><a href="https://www.instagram.com/Shoptins_Global/" class="nav-link"> <i class="fab fa-instagram"></i> </a></li>
                    <li><a href="https://www.twitter.com/ShoptinsGlobal/" class="nav-link"> <i class="fab fa-twitter"></i> </a></li>
                    <li><a href="https://wa.me/+233267960819" target="_blank" class="nav-link"><i class="fab fa-whatsapp"></i></a></li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item"><a href="{{ url('/') }}" class="nav-link"> Home </a></li>
                    <li class="nav-item"><a href="{{ route('user.shop') }}" class="nav-link"> Shop </a></li>
                    <li class="nav-item"><a href="{{ route('user.contact') }}" class="nav-link"> Contact Us</a></li>
                    <li class="nav-item"><a href="{{ route('user.about') }}" class="nav-link"> About Us</a></li>
                </ul> <!-- navbar-nav.// -->
            </div> <!-- collapse.// -->
        </div>
    </nav>

    <section class="header-main shadow-sm">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3 col-sm-4">
                    <div class="">
                        <a href="{{ url('/customer') }}">
                            <img class="logo" src="{{ asset('images/logo.8704dbd.png') }}"
                                 width="130px" height="50px">
                        </a>
                    </div> <!-- brand-wrap.// -->
                </div>
                <div class="col-lg-4 col-xl-5 col-sm-8">
                    <form action="{{ route('user.search') }}" class="search-wrap" method="post">
                        {{ csrf_field() }}
                        <div class="input-group w-100">
                            <input type="text" class="form-control" style="width:55%;"
                                   placeholder="Search for product by name" name="search_query" required>
                            <div class="input-group-append">
                                <button class="btn btn-primary search-btn" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form> <!-- search-wrap .end// -->
                </div> <!-- col.// -->
                <div class="col-lg-5 col-xl-4 col-sm-12">
                    <div class="widgets-wrap float-right">
                        <a href="{{ route('user.shop.show.cart') }}" class="widget-header mr-3">
                            <div class="icontext">
                                <div class="icon-wrap">
                                    <i class="icon-sm round border fa fa-shopping-cart" id="shopping-cart"></i>
                                </div>
                                <div class="text-wrap">
                                    <span class="small badge badge-danger" id="cart-badge">
                                        {{ Cart::content()->count() }}
                                    </span>
                                    <div class="shopping-cart-text">Cart</div>
                                </div>
                            </div>
                        </a>
                        @if(!auth()->check())
                            <div class="widget-header dropdown">
                                <a href="{{ route('login') }}" data-offset="20,10">
                                    <div class="icontext">
                                        <div class="icon-wrap">
                                            <i class="icon-sm round border fa fa-lock user-icon"></i>
                                        </div>
                                        <div class="text-wrap shopping-cart-text">
                                            <div>Login | Register</div>
                                        </div>
                                    </div>
                                </a>
                            </div>  <!-- widget-header .// -->
                        @else
                            <div class="widget-header dropdown">
                                <a href="#" data-toggle="dropdown" data-offset="20,10">
                                    <div class="icontext">
                                        <div class="icon-wrap">
                                            <i class="icon-sm round border fa fa-user user-icon"></i>
                                        </div>
                                        <div class="text-wrap shopping-cart-text">
                                            <div>{{ auth()->user()->name }} <i class="fa fa-caret-down"></i></div>
                                        </div>
                                    </div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="{{ route('user.account.orders') }}"><i class="fa fa-user-secret"></i> My Account</a>
                                    {{--<a class="dropdown-item" href="#"><i class="fa fa-heart"></i> WishList</a>
                                    <a class="dropdown-item" href="#"><i class="fa fa-database"></i> History</a>--}}
                                    <a class="dropdown-item" href="{{ route('user.logout') }}"><i class="fa fa-power-off"></i> Logout</a>
                                </div> <!--  dropdown-menu .// -->
                            </div>  <!-- widget-header .// -->
                        @endif

                    </div> <!-- widgets-wrap.// -->
                </div> <!-- col.// -->
            </div> <!-- row.// -->
        </div> <!-- container.// -->
    </section> <!-- header-main .// -->

</header> <!-- section-header.// -->

@yield('content')

<!-- ========================= FOOTER ========================= -->
<footer class="section-footer">
    <div class="container">
        <section class="footer-top padding-top">
            <div class="row">
                <aside class="col-sm-12 col-lg-3 col-xs-12 col-md-3 white">
                    <h5 class="title">Customer Services</h5>
                    <ul class="list-unstyled footer-li">
                        <li> <a href="{{ route('user.about') }}">Help center</a></li>
                        <li> <a href="{{ route('user.terms') }}">Terms and Conditions</a></li>
                    </ul>
                </aside>
                <aside class="col-sm-12 col-lg-3 col-xs-12  col-md-3 white">
                    <h5 class="title">My Account</h5>
                    <ul class="list-unstyled footer-li">
                        <li> <a href="{{ route('login') }}"> User Login </a></li>
                        <li> <a href="{{ route('login') }}"> User register </a></li>
                        <li> <a href="#"> Account Setting </a></li>
                    </ul>
                </aside>
                <aside class="col-sm-12 col-lg-3 col-xs-12  col-md-3 white">
                    <h5 class="title">More Links</h5>
                    <ul class="list-unstyled footer-li">
                        <li> <a href="{{ route('user.shop') }}"> Our Shop </a></li>
                        <li> <a href="{{ route('user.contact') }}"> Contact Us </a></li>
                        <li> <a href="{{ route('user.shop.show.cart') }}"> Shopping Cart </a></li>
                    </ul>
                </aside>
                <aside class="col-sm-12 col-lg-3 col-xs-12">
                    <article class="white">
                        <h5 class="title">Contacts</h5>
                        <p>
                            <strong>Phone: </strong> +(233) 267 960 819 <br>
                            <strong>WhatsApp:</strong> +(233) 267 960 819 <br>
                            <strong>Email:</strong> support@shoptins.com
                        </p>

                        <div class="btn-group white social-links-footer">
                            <a class="btn btn-facebook" title="Facebook" target="_blank" href="https://www.facebook.com/ShoptinsGlobal/">
                                <i class="fab fa-facebook-f  fa-fw"></i>
                            </a>
                            <a class="btn btn-instagram" title="Instagram" target="_blank" href="https://www.instagram.com/Shoptins_Global/">
                                <i class="fab fa-instagram  fa-fw"></i>
                            </a>
                            <a class="btn btn-success" title="WhatsApp" href="https://wa.me/+233267960819" target="_blank"><i class="fab fa-whatsapp  fa-fw"></i></a>

                            <a class="btn btn-twitter" title="Twitter" target="_blank" href="https://www.twitter.com/ShoptinsGlobal/">
                                <i class="fab fa-twitter  fa-fw"></i>
                            </a>
                        </div>
                    </article>
                </aside>
            </div> <!-- row.// -->
            <br>
        </section>
        <section class="footer-bottom row">
            <div class="col-lg-12 footer-copyright" align="center">
                <p>
                    Copyright &copy; {{ date('Y') }} Shoptins. All right reserved
                </p>
            </div>
        </section> <!-- //footer-top -->
    </div><!-- //container -->
</footer>
<!-- ========================= FOOTER END // ========================= -->


<script src="{{ asset('home/js/jquery-2.0.0.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('home/js/bootstrap.bundle.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('home/plugins/fancybox/fancybox.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('home/plugins/owlcarousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('home/js/script.js') }}" type="text/javascript"></script>
<script src="{{ asset('home/plugins/slickslider/slick.min.js') }}"></script>
<script src="{{ asset('home/js/rating.js') }}"></script>
@yield('scripts')
</body>
</html>