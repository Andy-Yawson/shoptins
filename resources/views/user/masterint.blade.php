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
                        <img class="logo" src="{{ asset('images/logo.8704dbd.png') }}"
                        width="130px" height="50px">
                    </div> <!-- brand-wrap.// -->
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

<script src="{{ asset('home/js/jquery-2.0.0.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('home/js/bootstrap.bundle.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('home/js/script.js') }}" type="text/javascript"></script>
<script src="{{ asset('home/js/rating.js') }}"></script>
@yield('scripts')
</body>
</html>