<!doctype html>
@if (app()->getLocale() == 'ar')
    <html lang="ar" direction="rtl" dir="rtl" style="direction: rtl">
    <head>
        <meta charset="utf-8" />
        <meta data-brackets-id='7728' name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>bazaard</title>
        <link rel="stylesheet" href="{{ asset('assets/css/style_ar.css?v=3') }}">
        <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.5.3/css/bootstrap.min.css"
        integrity="sha384-JvExCACAZcHNJEc7156QaHXTnQL3hQBixvj5RV5buE7vgnNEzzskDtx9NQ4p6BJe" crossorigin="anonymous">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Almarai:wght@300&family=Cairo:wght@300&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('assets/css/style_ar.css?v=3') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/swiper-bundle.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/slick.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/slick-theme.css') }}">
        <link rel="preload" href="{{ asset('assets/fontawesome/webfonts/fa-solid-900.woff2') }}" as="font"
        type="font/woff2" crossorigin>
        <link rel="preload" href="{{ asset('assets/fontawesome/webfonts/fa-brands-400.woff2') }}" as="font"
        type="font/woff2" crossorigin>
        <link rel="preload" href="{{ asset('assets/fontawesome/css/all.min.css') }}" as="style">
        <link href="{{ asset('assets/fontawesome/css/all.min.css') }}" rel="stylesheet">
        <link rel="shortcut icon" href="{{ asset('assets/images/cart_b.svg') }}" />
    </head>
@else
    <html dir="en">
    <head>
        <meta charset="utf-8" />
        <meta data-brackets-id='7728' name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>bazaard</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/style.css?v=3')}}">
          <link rel="stylesheet" href="{{ asset('assets/css/swiper-bundle.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/slick.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/slick-theme.css') }}">
        <link rel="preload" href="{{ asset('assets/fontawesome/webfonts/fa-solid-900.woff2') }}" as="font"
        type="font/woff2" crossorigin>
        <link rel="preload" href="{{ asset('assets/fontawesome/webfonts/fa-brands-400.woff2') }}" as="font"
        type="font/woff2" crossorigin>
        <link rel="preload" href="{{ asset('assets/fontawesome/css/all.min.css') }}" as="style">
        <link href="{{ asset('assets/fontawesome/css/all.min.css') }}" rel="stylesheet">
        <link rel="shortcut icon" href="{{ asset('assets/images/cart_b.svg') }}" />
    </head>
@endif
<body>
    <header>
        <div class="container-fluid ff">
        <nav class=" Hnavbar navbar-expand-lg navbar-light ">
        <div class=" navbar   w-100">
            <a class="navbar-brand" href="{{ route('index') }}"><img src="{{ asset('assets/images/logo.png') }}"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav mr-5 pr-5">
                    <li class="nav-item active">
                        <a class="nav-link active px-3" href="#services">
                            {{ __('home.services') }}
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link active px-3" href="#partners">
                            {{ __('home.partners') }}
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link active px-3" href="{{ route('price') }}">
                         {{ __('home.pricing') }}
                        </a>
                    </li>
                </ul>
                <div class="menu d-lg-block">
                    <a href="{{ route('login') }}">
                        {{ __('home.login') }}
                    </a>
                    <a href="{{ route('register') }}" class="button">
                        {{ __('home.Get Started for Free') }}
                    </a>

                </div>
                <div class="dropdown drplist px-3">
                    <button class="dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        {{ LaravelLocalization::getCurrentLocaleNative() }}
                    </button>
                    <ul class="dropdown-menu px-3" aria-labelledby="dropdownMenuButton1">
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
        </div>
        </nav>
        <!-- End Navebar -->
        </div>
    </header>
    {{ $slot }}
    <footer>
        <div class="max-container">
            <div class="row">
                <div class="col-12 col-md-3">
                    <a href="{{ route('index') }}"><img src="{{ asset('assets/images/logo.png') }}"
                            class="w-50"></a>
                    <div class="social-links py-2">
                        <a href="#">
                            <img src="{{ asset('assets/images/instagram.svg') }}">
                        </a>
                        <a href="#">
                            <img src="{{ asset('assets/images/facebook.svg') }}">
                        </a>
                        <a href="#">
                            <img src="{{ asset('assets/images/twitter.svg') }}">
                        </a>
                    </div>
                    <div class="dropdown drplist">
                        <button class="dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            {{ LaravelLocalization::getCurrentLocaleNative() }}
                        </button>
                        <ul class="dropdown-menu px-3" aria-labelledby="dropdownMenuButton1">
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
                 <div class="col-12 col-md-3">
                    <h2>{{ __('home.services') }}</h2>
                    <div class="links">
                        <a href="#">
                            {{ __('home.Build your store') }}
                        </a>
                        <a href="#">
                            {{ __('home.Intergrate websites') }}
                        </a>
                        <a href="#">
                            {{ __('home.Create blog') }}
                        </a>
                        <a href="#">
                            {{ __('home.Product photograpghy') }}
                        </a>
                    </div>
                </div> 
                 <div class="col-12 col-md-3">
                    <h2>{{ __('home.Product') }}</h2>
                    <div class="links">
                        <a href="#">
                            {{ __('home.pricing') }}
                        </a>
                        <a href="#">
                            {{ __('home.Demo') }}
                        </a>
                    </div>
                </div> 
                <div class="col-12 col-md-3">
                    <h2>{{ __('home.Company') }}</h2>
                    <div class="links">
                        <a href="{{ route('contact') }}">
                            {{ __('home.About us') }}
                        </a>
                        <a href="{{ route('contact') }}">
                            {{ __('home.Contact support') }}
                        </a>
                        {{-- <a href="{{ route('contact') }}">
                            {{ __('home.Contact us') }}
                        </a> --}}
                    </div>
                </div>
            </div>
            <div class="row copyright mt-5 pt-5">
                <div class="col-12 col-md-6">
                    &nbsp;&copy;<script>document.write(new Date().getFullYear());</script>  {{ __('home.Copyrights1') }} Bazaard
                </div>
                <div class="col-12 col-md-6">
                    <div class="line-links">
                        <a href="{{route('terms')}}">
                            {{ __('home.Terms of Use') }}
                        </a>
                        <a href="{{route('policy')}}">
                            {{ __('home.Privacy Policy') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script src="{{ asset('assets/js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/wow.min.js') }}"></script>
    <script src="{{ asset('assets/js/slick.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/script.js?ver=2') }}"></script>
     <script src="{{ asset('assets/js/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous">
    </script>
</body>
</html>
