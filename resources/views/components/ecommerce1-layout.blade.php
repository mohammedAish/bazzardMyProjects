<!DOCTYPE html>
@if (app()->getLocale() == 'ar')
<html lang="ar" direction="rtl" dir="rtl" style="direction: rtl">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Site Metas -->
    <title>{{$store->name}}</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('assets/thewayshop/css/bootstrap.min.css')}}">
    <!-- Site CSS -->
    <link rel="stylesheet" href="{{asset('assets/thewayshop/css/style.css')}}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{asset('assets/thewayshop/css/responsive.css')}}">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{asset('assets/thewayshop/css/custom.css')}}">
    <!--[if lt IE 9]>
      <script src="{{asset('assets/thewayshop/https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js')}}"></script>
      <script src="{{asset('assets/thewayshop/https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js')}}"></script>

    <![endif]-->
    @include('front.ecommerce1.theme')
</head>
@else
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- Mobile Metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Site Metas -->
        <title>{{$store->name}}</title>
        <meta name="keywords" content="">
        <meta name="description" content="">
        <meta name="author" content="">
        <!-- Site Icons -->
        <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
        <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{asset('assets/thewayshop/css/bootstrap.min.css')}}">
        <!-- Site CSS -->
        <link rel="stylesheet" href="{{asset('assets/thewayshop/css/style.css')}}">
        <!-- Responsive CSS -->
        <link rel="stylesheet" href="{{asset('assets/thewayshop/css/responsive.css')}}">
        <!-- Custom CSS -->
        <link rel="stylesheet" href="{{asset('assets/thewayshop/css/custom.css')}}">
        <!--[if lt IE 9]>
          <script src="{{asset('assets/thewayshop/https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js')}}"></script>
          <script src="{{asset('assets/thewayshop/https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js')}}"></script>
        <![endif]-->
        @include('front.ecommerce1.theme')
    </head>
    @endif
<body>
    <!-- Start Main Top -->
    <header class="main-header">
        <!-- Start Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-default bootsnav">
            <div class="container">
                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                    <a class="navbar-brand" href="{{route('home')}}">
                        @if($store->logo)
                        <img src="{{asset('img/'.$store->logo)}}" width="150" height="50">
                        @else
                        <img src="{{ asset('assets/images/logo.png') }}" width="150" height="50">
                        @endif
                    </a>
                </div>
                <!-- End Header Navigation -->
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="nav navbar-nav ml-auto" data-in="fadeInDown" data-out="fadeOutUp">
                        <li class="nav-item"><a class="nav-link" href="{{route('home')}}">{{__('home.home')}} </a></li>
                        <li class="nav-item"><a class="nav-link"  href="{{route('allproducts')}}">{{__('dashboard.products')}}</a></li>
                        @if($about_us == "")
                        <li class="nav-item"><a class="nav-link" href="javascript:;">{{__('home.Contact us')}}</a></li>
                        @elseif($about_us->status == 'active')
                        <li class="nav-item"><a class="nav-link" href="{{route('pages','about_us')}}">{{__('home.About us')}}</a></li>
                        @endif
                        @if($contact_us == "")
                        <li class="nav-item"><a class="nav-link" href="javascript:;">{{__('home.about_us')}}</a></li>
                        @elseif($contact_us->status == 'active')
                        <li class="nav-item "><a class="nav-link" href="{{route('pages','contact_us')}}">{{__('home.Contact us')}}</a></li>
                        @endif
                        <li></li>
                    </ul>
                    <div>
                        <div class="dropdown drop1 p-3" >
                            <button type="button" cl+ass="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false" style="width: 160px;">
                                {{ LaravelLocalization::getCurrentLocaleNative() }}
                            </button>
                            <ul class="dropdown-menu px-1" aria-labelledby="dropdownMenuButton1" style="padding:0px;margin-left:16px;text-align:center;margin-top:-17px;background:linear-gradient(46deg, black, transparent);">
                                @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                    <li>
                                        <a rel="alternate" hreflang="{{ $localeCode }}"
                                            href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                            {{ $properties['native'] }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                </div>
                <!-- /.navbar-collapse -->

                <!-- Start Atribute Navigation -->
                <div class="attr-nav">
                    <ul>
                        <li class="side-menu"><a href="{{route('cart.index')}}">
						<i class="fa fa-shopping-bag"></i>
                            <span id="count_cart" class="badge">{{$cart_count}}</span>
					</a></li>
                    </ul>
                </div>
                <!-- End Atribute Navigation -->
            </div>
            <!-- Start Side Menu -->
            <div class="side">
                <a href="#" class="close-side"><i class="fa fa-times"></i></a>
                <li class="cart-box">
                    <ul class="cart-list">
                        <li>
                            <a href="#" class="photo"><img src="{{asset('assets/thewayshop/images/img-pro-01.jpg')}}" class="cart-thumb" alt="" /></a>
                            <h6><a href="#">Delica omtantur </a></h6>
                            <p>1x - <span class="price">$80.00</span></p>
                        </li>
                        <li>
                            <a href="#" class="photo"><img src="{{asset('assets/thewayshop/images/img-pro-02.jpg')}}" class="cart-thumb" alt="" /></a>
                            <h6><a href="#">Omnes ocurreret</a></h6>
                            <p>1x - <span class="price">$60.00</span></p>
                        </li>
                        <li>
                            <a href="#" class="photo"><img src="{{asset('assets/thewayshop/images/img-pro-03.jpg')}}" class="cart-thumb" alt="" /></a>
                            <h6><a href="#">Agam facilisis</a></h6>
                            <p>1x - <span class="price">$40.00</span></p>
                        </li>
                        <li class="total">
                            <a href="#" class="btn btn-default hvr-hover btn-cart">VIEW CART</a>
                            <span class="float-right"><strong>Total</strong>: $180.00</span>
                        </li>
                    </ul>
                </li>
            </div>
            <!-- End Side Menu -->
        </nav>
        <!-- End Navigation -->
    </header>
    <!-- End Main Top -->
    @if (session()->has('success'))
    <div class="alert alert-success my-5 text-center" style="font-size:23px;">
        {{ session()->get('success') }}
    </div>
    @endif
    {{$slot}}

    <!-- Start copyright  -->
    <div class="footer-copyright">
        <p>Copyright &copy; <script>document.write(new Date().getFullYear());</script> | Bazaard | by {{$user->user_name}}</p>
    </div>
    <!-- End copyright  -->

    <a href="#" id="back-to-top" title="Back to top" style="display: none;">&uarr;</a>

    <!-- ALL JS FILES -->
    <script src="{{asset('assets/thewayshop/js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('assets/thewayshop/js/popper.min.js')}}"></script>
    <script src="{{asset('assets/thewayshop/js/bootstrap.min.js')}}"></script>
    <!-- ALL PLUGINS -->
    <script src="{{asset('assets/thewayshop/js/jquery.superslides.min.js')}}"></script>
    <script src="{{asset('assets/thewayshop/js/bootstrap-select.js')}}"></script>
    <script src="{{asset('assets/thewayshop/js/inewsticker.js')}}"></script>
    <script src="js/bootsnav.js."></script>
    <script src="{{asset('assets/thewayshop/js/images-loded.min.js')}}"></script>
    <script src="{{asset('assets/thewayshop/js/isotope.min.js')}}"></script>
    <script src="{{asset('assets/thewayshop/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('assets/thewayshop/js/baguetteBox.min.js')}}"></script>
    <script src="{{asset('assets/thewayshop/js/form-validator.min.js')}}"></script>
    <script src="{{asset('assets/thewayshop/js/contact-form-script.js')}}"></script>
    <script src="{{asset('assets/thewayshop/js/custom.js')}}"></script>
    <script src="{{asset('assets/js/checkout-fetch-data.js')}}"></script>
    @stack('js')
</body>

</html>
