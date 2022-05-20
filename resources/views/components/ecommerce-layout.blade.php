<!DOCTYPE html>
@if (app()->getLocale() == 'ar')
<html lang="ar" direction="rtl" dir="rtl" style="direction: rtl">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ashion Template">
    <meta name="keywords" content="Ashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$store->name}}</title>
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap"
    rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{asset('assets/ashion/css/bootstrap.min.css')}}" type="text/css">
    <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.5.3/css/bootstrap.min.css"
        integrity="sha384-JvExCACAZcHNJEc7156QaHXTnQL3hQBixvj5RV5buE7vgnNEzzskDtx9NQ4p6BJe" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('assets/ashion/css/font-awesome.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('assets/ashion/css/elegant-icons.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('assets/ashion/css/jquery-ui.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('assets/ashion/css/magnific-popup.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('assets/ashion/css/owl.carousel.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('assets/ashion/css/slicknav.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('assets/ashion/css/style.css')}}" type="text/css">
    @include('front.ecommerce.theme')
</head>
@else
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Ashion Template">
        <meta name="keywords" content="Ashion, unica, creative, html">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>{{$store->name}}</title>
        <!-- Google Font -->
        <link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet">
        <!-- Css Styles -->
        <link rel="stylesheet" href="{{asset('assets/ashion/css/bootstrap.min.css')}}" type="text/css">
        <link rel="stylesheet" href="{{asset('assets/ashion/css/font-awesome.min.css')}}" type="text/css">
        <link rel="stylesheet" href="{{asset('assets/ashion/css/elegant-icons.css')}}" type="text/css">
        <link rel="stylesheet" href="{{asset('assets/ashion/css/jquery-ui.min.css')}}" type="text/css">
        <link rel="stylesheet" href="{{asset('assets/ashion/css/magnific-popup.css')}}" type="text/css">
        <link rel="stylesheet" href="{{asset('assets/ashion/css/owl.carousel.min.css')}}" type="text/css">
        <link rel="stylesheet" href="{{asset('assets/ashion/css/slicknav.min.css')}}" type="text/css">
        <link rel="stylesheet" href="{{asset('assets/ashion/css/style.css')}}" type="text/css">
        @include('front.ecommerce.theme')
    </head>
    @endif
<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Offcanvas Menu Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <div class="offcanvas__close">+</div>
        <ul class="offcanvas__widget">
            <li><span class="icon_search search-switch"></span></li>
            <li><a href="#"><span class="icon_heart_alt"></span>
                <div class="tip">2</div>
            </a></li>
            <li><a href="#"><span class="icon_bag_alt"></span>
                <div class="tip">2</div>
            </a></li>
        </ul>
        <div class="offcanvas__logo">
            <a href="{{route('home')}}"><img src="{{asset('assets/ashion/img/logo.png')}}" alt=""></a>
        </div>
        <div id="mobile-menu-wrap"></div>

      {{--   <div class="offcanvas__auth">
            <a href="#">Login</a>
            <a href="#">Register</a>
        </div> --}}
    </div>
    <!-- Offcanvas Menu End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-3 col-lg-2">
                    <div class="header__logo">
                        <a href="{{route('home')}}">
                            @if($store->logo)
                            <img src="{{asset('img/'.$store->logo)}}" width="150" height="50">
                            @else
                            <img src="{{ asset('assets/images/logo.png') }}" width="150" height="50">
                            @endif
                        </a>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-7">
                    <nav class="header__menu">
                        <ul>
                            <li><a href="{{route('home')}}">{{__('home.home')}}</a></li>
                            <li><a href="{{route('allproducts')}}">{{__('dashboard.products')}}</a></li>
                            @if($contact_us == "")
                            <li class="px-2"><a href="javascript:;">{{__('home.Contact us')}}</a></li>
                            @elseif($contact_us->status == 'active')
                            <li class="px-2"><a href="{{route('pages','contact_us')}}">{{__('home.Contact us')}}</a></li>
                            @endif
                            @if($about_us == "")
                            <li class="px-2"><a href="javascript:;">{{__('home.about_us')}}</a></li>
                            @elseif($about_us->status == 'active')
                            <li class="px-2"><a href="{{route('pages','about_us')}}">{{__('home.about_us')}}</a></li>
                            @endif
                        </ul>
                    </nav>

                </div>
                <div class="col-lg-3">
                    <div class="header__right">
                        <ul class="header__right__widget">
                            {{-- <li><span class="icon_search search-switch"></span></li>
                            <li><a href="#"><span class="icon_heart_alt"></span>
                                <div class="tip">2</div>
                            </a></li> --}}
                            <li><a href="{{route('cart.index')}}"><span class="icon_bag_alt"></span>
                                <div class="tip">{{$cart_count}}</div>
                            </a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="canvas__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->
    @if (session()->has('success'))
    <div class="alert alert-success my-5 text-center" style="font-size:23px;">
        {{ session()->get('success') }}
    </div>
    @endif
{{$slot}}
<!-- Footer Section Begin -->
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                <div class="footer__copyright__text">
                    <p>Copyright &copy; <script>document.write(new Date().getFullYear());</script> | Bazaard |  by  {{$user->user_name}}  </p>
                </div>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </div>
        </div>
    </div>
</footer>
<!-- Footer Section End -->

<!-- Js Plugins -->
<script src="{{asset('assets/ashion/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('assets/ashion/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/ashion/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('assets/ashion/js/jquery-ui.min.js')}}"></script>
<script src="{{asset('assets/ashion/js/mixitup.min.js')}}"></script>
<script src="{{asset('assets/ashion/js/jquery.countdown.min.js')}}"></script>
<script src="{{asset('assets/ashion/js/jquery.slicknav.js')}}"></script>
<script src="{{asset('assets/ashion/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('assets/ashion/js/jquery.nicescroll.min.js')}}"></script>
<script src="{{asset('assets/ashion/js/main.js')}}"></script>
<script src="{{asset('assets/js/checkout-fetch-data.js')}}"></script>
@stack('js')
</body>

</html>
