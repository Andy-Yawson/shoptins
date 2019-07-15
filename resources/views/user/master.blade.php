<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Bootstrap-ecommerce by Vosidiy">

    <title>Shoptins</title>

    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">

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
                    <li><a href="#" class="nav-link"> <i class="fab fa-facebook"></i> </a></li>
                    <li><a href="#" class="nav-link"> <i class="fab fa-instagram"></i> </a></li>
                    <li><a href="#" class="nav-link"> <i class="fab fa-twitter"></i> </a></li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item"><a href="{{ route('user.welcome') }}" class="nav-link"> Home </a></li>
                    <li class="nav-item"><a href="{{ route('user.shop') }}" class="nav-link"> Shop </a></li>
                    <li class="nav-item"><a href="{{ route('user.contact') }}" class="nav-link"> Contact Us</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">FAQ</a></li>
                </ul> <!-- navbar-nav.// -->
            </div> <!-- collapse.// -->
        </div>
    </nav>

    <section class="header-main shadow-sm">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3 col-sm-4">
                    <div class="brand-wrap">
                        <img class="logo" src="{{ asset('home/images/logo-dark.png') }}">
                        <h2 class="logo-text">LOGO</h2>
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
                                        {{count(\Gloudemans\Shoppingcart\Facades\Cart::content())}}
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
                                    <a class="dropdown-item" href="#"><i class="fa fa-heart"></i> WishList</a>
                                    <a class="dropdown-item" href="#"><i class="fa fa-database"></i> History</a>
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
                        <li> <a href="#">Help center</a></li>
                        <li> <a href="#">Money refund</a></li>
                        <li> <a href="#">Terms and Policy</a></li>
                        <li> <a href="#">Open dispute</a></li>
                    </ul>
                </aside>
                <aside class="col-sm-12 col-lg-3 col-xs-12  col-md-3 white">
                    <h5 class="title">My Account</h5>
                    <ul class="list-unstyled footer-li">
                        <li> <a href="#"> User Login </a></li>
                        <li> <a href="#"> User register </a></li>
                        <li> <a href="#"> Account Setting </a></li>
                        <li> <a href="#"> My Orders </a></li>
                        <li> <a href="#"> My Wishlist </a></li>
                    </ul>
                </aside>
                <aside class="col-sm-12 col-lg-3 col-xs-12  col-md-3 white">
                    <h5 class="title">About</h5>
                    <ul class="list-unstyled footer-li">
                        <li> <a href="#"> Our history </a></li>
                        <li> <a href="#"> How to buy </a></li>
                        <li> <a href="#"> Delivery and payment </a></li>
                        <li> <a href="#"> Advertice </a></li>
                        <li> <a href="#"> Partnership </a></li>
                    </ul>
                </aside>
                <aside class="col-sm-12 col-lg-3 col-xs-12">
                    <article class="white">
                        <h5 class="title">Contacts</h5>
                        <p>
                            <strong>Phone: </strong> +(233) 209 386 780 <br>
                            <strong>Fax:</strong> +(233) 550 889 786
                        </p>

                        <div class="btn-group white social-links-footer">
                            <a class="btn btn-facebook" title="Facebook" target="_blank" href="#"><i class="fab fa-facebook-f  fa-fw"></i></a>
                            <a class="btn btn-instagram" title="Instagram" target="_blank" href="#"><i class="fab fa-instagram  fa-fw"></i></a>
                            <a class="btn btn-youtube" title="Youtube" target="_blank" href="#"><i class="fab fa-youtube  fa-fw"></i></a>
                            <a class="btn btn-twitter" title="Twitter" target="_blank" href="#"><i class="fab fa-twitter  fa-fw"></i></a>
                        </div>
                    </article>
                </aside>
            </div> <!-- row.// -->
            <br>
        </section>
        <section class="footer-bottom row">
            <div class="col-lg-12 footer-copyright" align="center">
                <p>
                    Copyright &copy; 2019 Shoptins
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