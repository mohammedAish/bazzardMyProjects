<!doctype html>
@if(app()->getLocale()=='ar' )
<html lang="ar" direction="rtl" dir="rtl" style="direction: rtl">

<head>
    <meta charset="utf-8" />
     <meta data-brackets-id='7728' name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>bazaard</title>
       <link rel="stylesheet" href="{{asset('assets/css/style_ar.css')}}">
       <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.5.3/css/bootstrap.min.css" integrity="sha384-JvExCACAZcHNJEc7156QaHXTnQL3hQBixvj5RV5buE7vgnNEzzskDtx9NQ4p6BJe" crossorigin="anonymous">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="{{asset('assets/css/style_ar.css')}}">

        <link rel="stylesheet" href="{{asset('assets/css/font-awesome.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/animate.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/slick.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/slick-theme.css')}}"> 
        <link rel="preload" href="{{asset('assets/fontawesome/webfonts/fa-solid-900.woff2')}}" as="font" type="font/woff2" crossorigin>
        <link rel="preload" href="{{asset('assets/fontawesome/webfonts/fa-brands-400.woff2')}}" as="font" type="font/woff2" crossorigin>
        <link rel="preload" href="{{asset('assets/fontawesome/css/all.min.css')}}" as="style">   
        <link href="{{asset('assets/fontawesome/css/all.min.css')}}" rel="stylesheet">       
</head>
@else
<html dir="en" >
<head>
    <meta charset="utf-8" />
     <meta data-brackets-id='7728' name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>bazaard</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="{{asset('assets/css/font-awesome.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/animate.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/slick.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/slick-theme.css')}}">
        <link rel="preload" href="{{asset('assets/fontawesome/webfonts/fa-solid-900.woff2')}}" as="font" type="font/woff2" crossorigin>
        <link rel="preload" href="{{asset('assets/fontawesome/webfonts/fa-brands-400.woff2')}}" as="font" type="font/woff2" crossorigin>
        <link rel="preload" href="{{asset('assets/fontawesome/css/all.min.css')}}" as="style">   
        <link href="{{asset('assets/fontawesome/css/all.min.css')}}" rel="stylesheet">
</head>
@endif
<body>  
<header>
        <div class="max-container signup-header">
            <div class="logo">
                <a href="/"><img src="{{asset('assets/images/logo.png')}}"></a>
            </div>
        </div>
    </header> 
       <div class="text-center">
        <div class="container loging text-center">
            <div class="title my-5">
            <h2 class="text-center py-2">{{ __('home.Welcome Back') }}</h2> 
        </div>
        </div>
        <div class="main_login row  container">
         
            <div class="bg-black ">
            </div>
            <div class="signupForm mt-5 col-12">
                <form method="POST" action="{{route('creatnewstore',$user)}}">
                    @csrf
                    <div class="ar">

                                    <div class="mb-3">
                                        <label>{{ __('home.Store Name') }}</label>
                                        <input type="text" class="form-control" name="name" placeholder="{{ __('home.Store Name') }}" required>
                                    </div>
                                      <div class="mb-3">
                                        <label>{{ __('home.Store Slug') }}</label>
                                        <input type="text" class="form-control" name="slug" placeholder="{{ __('home.Store Slug') }}" required>
                                    </div>
                                </div> 

                                  <button type="submit" class="btn btn-success mt-4">{{ __('home.save') }}</button>
                </form>
                
            </div>
           


        </div>
    </div>
    <script src="{{asset('assets/js/jquery-3.4.1.min.js')}}"></script>
    <script src="{{asset('assets/js/wow.min.js')}}"></script>
    <script src="{{asset('assets/js/slick.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/script.js')}}"></script>
    <script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
</body>
</html>