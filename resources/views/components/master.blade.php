<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <title>Dashboard</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/logo.8704dbd.png') }}">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
    <script type="text/javascript" src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
    <style>
        #loader {
            transition: all .3s ease-in-out;
            opacity: 1;
            visibility: visible;
            position: fixed;
            height: 100vh;
            width: 100%;
            background: #fff;
            z-index: 90000
        }

        #loader.fadeOut {
            opacity: 0;
            visibility: hidden
        }

        .spinner {
            width: 40px;
            height: 40px;
            position: absolute;
            top: calc(50% - 20px);
            left: calc(50% - 20px);
            background-color: #333;
            border-radius: 100%;
            -webkit-animation: sk-scaleout 1s infinite ease-in-out;
            animation: sk-scaleout 1s infinite ease-in-out
        }

        @-webkit-keyframes sk-scaleout {
            0% {
                -webkit-transform: scale(0)
            }
            100% {
                -webkit-transform: scale(1);
                opacity: 0
            }
        }

        @keyframes sk-scaleout {
            0% {
                -webkit-transform: scale(0);
                transform: scale(0)
            }
            100% {
                -webkit-transform: scale(1);
                transform: scale(1);
                opacity: 0
            }
        }
    </style>
    <script src="//cdn.ckeditor.com/4.11.3/basic/ckeditor.js"></script>
</head>
<body class="app">
    <div id="loader">
        <div class="spinner"></div>
    </div>
    <script>
        window.addEventListener('load', () => {
            const loader = document.getElementById('loader');
            setTimeout(() => {
              loader.classList.add('fadeOut');
            }, 300);
          });
    </script>
<div>
    <div class="sidebar">
        <div class="sidebar-inner">
            <div class="sidebar-logo">
                <div class="peers ai-c fxw-nw">
                    <div class="peer peer-greed">
                        <a class="sidebar-link td-n" href="">
                            <div class="peers ai-c fxw-nw">
                                <div class="peer">
                                    <div class="logo"><img src="{{asset('images/logo.png')}}" alt=""></div>
                                </div>
                                <div class="peer peer-greed"><h5 class="lh-1 mB-0 logo-text">Shoptins</h5></div>
                            </div>
                         </a>
                    </div>
                    <div class="peer">
                        <div class="mobile-toggle sidebar-toggle"><a href="" class="td-n"><i
                                class="ti-arrow-circle-left"></i></a></div>
                    </div>
                </div>
            </div>
            <ul class="sidebar-menu scrollable pos-r">
                @if(Auth::user()->level == 0)
                    <li class="nav-item mT-30 active">
                        <a class="sidebar-link" href="{{route('admin.dashboard')}}">
                        <span class="icon-holder">
                            <i class="c-blue-500 fa fa-dashboard"></i>
                         </span>
                            <span class="title">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="dropdown-toggle" href="javascript:void(0);">
                        <span class="icon-holder">
                            <i class="c-purple-500 fa fa-edit"></i>
                        </span>
                            <span class="title">Category</span>
                            <span class="arrow"><i class="fa fa-caret-right"></i></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{route('admin.add.category')}}">Add a category</a></li>
                            <li><a href="{{route('admin.view.category')}}">View all categories</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="dropdown-toggle" href="javascript:void(0);">
                        <span class="icon-holder">
                            <i class="c-orange-500 fa fa-calendar-o"></i>
                        </span>
                            <span class="title">Manufacture</span>
                            <span class="arrow"><i class="fa fa-caret-right"></i></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{route('admin.add.manufacture')}}">Add a manufacture</a></li>
                            <li><a href="{{route('admin.view.manufacture')}}">View Manufactures</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="dropdown-toggle" href="javascript:void(0);">
                        <span class="icon-holder">
                            <i class="c-light-blue-500 fa fa-pencil"></i>
                        </span>
                            <span class="title">Product</span>
                            <span class="arrow"><i class="fa fa-caret-right"></i></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{route('admin.add.product')}}">Add a product</a></li>
                            <li><a href="{{route('admin.view.product')}}">View Products</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="dropdown-toggle" href="javascript:void(0);">
                        <span class="icon-holder">
                            <i class="c-light-blue-500 fa fa-i-cursor"></i>
                        </span>
                            <span class="title">Slider</span>
                            <span class="arrow"><i class="fa fa-caret-right"></i></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{route('admin.add.slider')}}">Add a slide</a></li>
                            <li><a href="{{route('admin.view.slider')}}">View Sliders</a></li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="sidebar-link" href="{{route('admin.view.orders')}}">
                        <span class="icon-holder">
                            <i class="c-pink-500 fa fa-money"></i>
                        </span>
                            <span class="title">Manage Orders</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="sidebar-link" href="{{route('admin.view.orders.int')}}">
                        <span class="icon-holder">
                            <i class="c-pink-500 fa fa-money"></i>
                        </span>
                            <span class="title">International Orders</span>
                        </a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="dropdown-toggle" href="javascript:void(0);">
                        <span class="icon-holder">
                            <i class="c-pink-500 fa fa-user-o"></i>
                        </span>
                            <span class="title">Administrator</span>
                            <span class="arrow"><i class="fa fa-caret-right"></i></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{route('admin.add.admin')}}">Register an Admin</a></li>
                            <li><a href="{{route('admin.view.admin')}}">View all administrators</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="dropdown-toggle" href="javascript:void(0);">
                        <span class="icon-holder">
                            <i class="c-pink-500 fa fa-database"></i>
                        </span>
                            <span class="title">Check Logs</span>
                            <span class="arrow"><i class="fa fa-caret-right"></i></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{route('admin.view.order.log')}}">View Order Logs</a></li>
                            <li><a href="{{route('admin.view.product.log')}}">View Product Logs</a></li>
                            <li><a href="{{route('admin.view.visitor.log')}}">View Visitors Logs</a></li>
                        </ul>
                    </li>

                @elseif(Auth::user()->level == 1)
                    <li class="nav-item mT-30 active">
                        <a class="sidebar-link" href="{{route('admin.dashboard')}}">
                        <span class="icon-holder">
                            <i class="c-blue-500 fa fa-dashboard"></i>
                         </span>
                            <span class="title">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="dropdown-toggle" href="javascript:void(0);">
                        <span class="icon-holder">
                            <i class="c-purple-500 fa fa-edit"></i>
                        </span>
                            <span class="title">Category</span>
                            <span class="arrow"><i class="fa fa-caret-right"></i></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{route('admin.add.category')}}">Add a category</a></li>
                            <li><a href="{{route('admin.view.category')}}">View all categories</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="dropdown-toggle" href="javascript:void(0);">
                        <span class="icon-holder">
                            <i class="c-orange-500 fa fa-calendar-o"></i>
                        </span>
                            <span class="title">Manufacture</span>
                            <span class="arrow"><i class="fa fa-caret-right"></i></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{route('admin.add.manufacture')}}">Add a manufacture</a></li>
                            <li><a href="{{route('admin.view.manufacture')}}">View Manufactures</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="dropdown-toggle" href="javascript:void(0);">
                        <span class="icon-holder">
                            <i class="c-light-blue-500 fa fa-pencil"></i>
                        </span>
                            <span class="title">Product</span>
                            <span class="arrow"><i class="fa fa-caret-right"></i></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{route('admin.add.product')}}">Add a product</a></li>
                            <li><a href="{{route('admin.view.product')}}">View Products</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="dropdown-toggle" href="javascript:void(0);">
                        <span class="icon-holder">
                            <i class="c-light-blue-500 fa fa-i-cursor"></i>
                        </span>
                            <span class="title">Slider</span>
                            <span class="arrow"><i class="fa fa-caret-right"></i></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{route('admin.add.slider')}}">Add a slide</a></li>
                            <li><a href="{{route('admin.view.slider')}}">View Sliders</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="sidebar-link" href="{{route('admin.view.orders')}}">
                        <span class="icon-holder">
                            <i class="c-pink-500 fa fa-money"></i>
                        </span>
                            <span class="title">Manage Orders</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="sidebar-link" href="{{route('admin.view.orders.int')}}">
                        <span class="icon-holder">
                            <i class="c-pink-500 fa fa-money"></i>
                        </span>
                            <span class="title">International Orders</span>
                        </a>
                    </li>

                @endif
            </ul>
        </div>
    </div>
    <div class="page-container">
        <div class="header navbar">
            <div class="header-container">
                <ul class="nav-left">
                    <li>
                        <a id="sidebar-toggle" class="sidebar-toggle" href="javascript:void(0);">
                            <i class="fa fa-bars"></i>
                        </a>
                    </li>
                </ul>
                <ul class="nav-right">
                    <li class="dropdown">
                        <a href="" class="dropdown-toggle no-after peers fxw-nw ai-c lh-1" data-toggle="dropdown">
                        <div class="peer mR-10">
                            @if(Auth::user()->level == 0)
                                <img class="w-2r bdrs-50p" src="{{asset('images/av.png')}}" alt="">
                            @else
                                <img class="w-2r bdrs-50p" src="{{asset('images/avv.png')}}" alt="">
                            @endif
                        </div>
                        <div class="peer"><span class="fsz-sm c-grey-900">{{Auth::user()->name}}</span></div>
                    </a>
                        <ul class="dropdown-menu fsz-sm">
                            <li>
                                <a href="{{route('admin.edit.admin',\Illuminate\Support\Facades\Auth::user()->id)}}" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700">
                                    <i class="ti-user fa fa-user-o"></i>
                                    <span>Profile</span>
                                </a>
                            </li>
                            <li role="separator" class="divider"></li>
                            <li>
                                <a href="{{route('admin.logout')}}" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700">
                                    <i class="ti-power-off fa fa-power-off"></i>
                                    <span>Logout</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <main class="main-content bgc-grey-100">
            <div id="mainContent">
                @yield('content')
            </div>
        </main>
        <footer class="bdT ta-c p-30 lh-0 fsz-sm c-grey-600">
            <span>Copyright © {{date('Y')}}. All rights reserved.</span>
        </footer>
    </div>
</div>
<script type="text/javascript" src="{{asset('js/vendor.js')}}"></script>
<script type="text/javascript" src="{{asset('js/bundle.js')}}"></script>
<script>
    initSample();
</script>
</body>
</html>
