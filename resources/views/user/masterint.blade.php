<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Shoptins E-commerce by Andrews Quarcoo">

    <title>Shoptins</title>

    <link rel="stylesheet" type="text/css" href="{{asset('home/css/bootstrap.css')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/logo.8704dbd.png') }}">
    <link href="{{ asset('home/css/main.css') }}" rel="stylesheet" type="text/css"/>
    <script type="text/javascript" src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
    <link href="{{ asset('home/fonts/fontawesome/css/fontawesome-all.min.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ asset('home/css/ui.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('home/css/responsive.css') }}" rel="stylesheet" media="only screen and (max-width: 1200px)"/>
    @yield('styles')
<!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-147673486-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-147673486-1');
    </script>
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
                    <li class="nav-item"><a href="{{ route('user.contact') }}" class="nav-link"> Contact Us</a></li>
                    <li class="nav-item"><a href="{{ route('user.about') }}" class="nav-link"> About Us</a></li>
                    <li class="nav-item"><a href="#" data-toggle="modal" data-target="#exampleModal" class="nav-link">Price Calculator</a></li>
                </ul> <!-- navbar-nav.// -->
            </div> <!-- collapse.// -->
        </div>
    </nav>

    <section class="header-main shadow-sm">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3 col-sm-4">
                    <div class="">
                        <a href="{{ route('user.int.order') }}"><img class="logo" src="{{ asset('images/logo.8704dbd.png') }}"
                        width="130px" height="50px"></a>
                    </div> <!-- brand-wrap.// -->
                </div>
                <div class="col-lg-9 col-xl-9 col-sm-12 push-right">
                    <div class="widgets-wrap float-right">
                        <a class="widget-header mr-3">
                            <div class="icontext">
                                <div class="icon-wrap">
                                    <i class="icon-sm round border fa fa-shopping-cart" id="shopping-cart"></i>
                                </div>
                                <div class="text-wrap">
                                    <span class="small badge badge-danger" id="cart-badge">
                                        {{ count(\App\International::where('code',session('code'))->get()) }}
                                    </span>
                                    <div class="shopping-cart-text">Cart</div>
                                </div>
                            </div>
                        </a>
                        @if(!auth()->check())
                            <div class="widget-header dropdown">
                                <a href="{{ route('user.int.login') }}" data-offset="20,10">
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
                </div>
                
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
                        <li> <a href="{{ route('user.shop') }}"> Our Local Shop </a></li>
                        <li> <a href="{{ route('user.contact') }}"> Contact Us </a></li>
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
@include('partial.price-modal')
<script src="{{ asset('home/js/jquery-2.0.0.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('home/js/bootstrap.bundle.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('home/js/script.js') }}" type="text/javascript"></script>
<script src="{{ asset('home/js/rating.js') }}"></script>
<script type="text/javascript">
    var weight = 1;

    var kilos = [1,1.5, 2, 2.5, 3, 3.5, 4, 4.5, 5, 5.5, 6, 6.5, 7, 7.5, 8, 8.5, 9, 9.5,
        10, 10.5, 11, 11.5, 12, 12.5, 13, 13.5, 14, 14.5, 15, 15.5, 16, 16.5, 17, 17.5,
        18, 18.5, 19, 19.5, 20, 20.5, 21, 21.5, 22, 22.5, 23, 23.5, 24, 24.5, 25, 25.5,
        26, 26.5, 27, 27.5, 28, 28.5, 29, 29.5, 30, 30.5, 31, 31.5, 32, 32.5, 33, 33.5, 34,
        34.5, 35, 35.5, 36, 36.5, 37, 37.5, 38, 38.5, 39, 39.5, 40, 40.5, 41, 41.5, 42, 42.5,
        43, 43.5, 44, 44.5, 45, 45.5, 46, 46.5, 47, 47.5, 48, 48.5, 49, 49.5, 50,
        50.5, 51, 51.5, 52, 52.5, 53, 53.5, 54, 54.5, 55, 55.5, 56, 56.5, 57, 57.5, 58,
        58.5, 59, 59.5, 60, 60.5, 61, 61.5, 62, 62.5, 63, 63.5, 64, 64.5, 65, 65.5, 66,
        66.5, 67, 67.5, 68, 68.5, 69, 69.5, 70, 70.5];

    var prices = [198.198,222.222,258.258,338.7384,389.1888,468.468,540.54,619.8192,691.8912,
        771.1704,850.4496,922.5216,1001.801,1073.873,1153.152,1232.431,1304.503,1383.782,1455.854,
        1549.548,1636.034,1729.728,1816.214,1909.908,1996.394,2082.881,2176.574,2263.061,2356.754,
        2443.241,2536.934,2623.421,2717.114,2803.601,2897.294,2983.781,3070.267,3163.961,3250.447,
        3344.141,3430.627,3517.114,3603.6,3690.086,3776.573,3863.059,3949.546,4043.239,4129.726,
        4216.212,4302.698,4389.185,4475.671,4569.365,4655.851,4742.338,4828.824,4915.31,5001.797,
        5088.283,5174.77,5268.463,5354.95,5441.436,5527.922,5614.409,5700.895,5787.382,5881.075,5967.562,
        6054.048,6140.534,6227.021,6313.507,6399.994,6493.687,6580.174,6666.66,6753.146,6839.633,
        6926.119,7012.606,7106.299,7192.786,7279.272,7365.758,7452.245,7538.731,7625.218,7718.911,
        7805.398,7891.884,7978.37,8064.857,8151.343,8237.83,8324.316,8418.01,8504.496,
        8598.19,8691.883,8785.577,8929.721,8972.964,9037.829,9081.072,9153.144,9196.387,9268.459,
        9311.702,9376.567,9419.81,9491.882,9535.126,9607.198,9650.441,9715.306,9758.549,9830.621,
        9873.864,9945.936,9981.972,10054.04,10097.29,10169.36,10212.6,10284.67,10320.71,10392.78,
        10436.03,10508.1,10551.34,10623.41,10659.45,10731.52,10774.76,10846.84,10890.08,10954.94,20.79]

    $("#myWeight").change(function () {
        weight = $(this).children("option:selected").val()
    });
    var priceVal = $('#totalPrice');
    $('#priceCal').click(function () {
        for (var i = 0; i < kilos.length; i++){
            if (weight == kilos[i]){
                //console.log("The price is ",prices[i])
                priceVal.val(prices[i])
            }
        }
    });

    $('#intShoppingForm').submit(function () {
        var weight = $('#weight').val()
        for (var i = 0; i < kilos.length; i++){
            if (weight == kilos[i]){
                //console.log("The price is ",prices[i])
                $('#priceInput').val(prices[i])
                return true;
            }
        }
    });

</script>
@yield('scripts')
</body>
</html>