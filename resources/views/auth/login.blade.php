
<!doctype html>
<html>
 <!-- Session Status -->
 <x-auth-session-status class="mb-4" :status="session('status')" />

 <!-- Validation Errors -->
 <x-auth-validation-errors class="mb-4" :errors="$errors" />
<head>
    <meta charset="utf-8" />
     <meta data-brackets-id='7728' name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

     <title>bazaard</title>
     <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
     <link rel="stylesheet" href="{{asset('assets/css/font-awesome.min.css')}}">
     <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
     <link rel="stylesheet" href="{{asset('assets/css/animate.css')}}">
     <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.min.css')}}">
     <link rel="stylesheet" href="{{asset('assets/css/slick.css')}}">
     <link rel="stylesheet" href="{{asset('assets/css/slick-theme.css')}}">
</head>

<body>
<header>
        <div class="max-container signup-header">
            <div class="logo">
                <a href="/"><img src="{{asset('assets/images/logo.png')}}"></a>
            </div>
            <div class="menu">
                <span>Already have an account? </span>
                <a href="/{{app()->getLocale()}}/login">
                    Login
                </a>
            </div>
        </div>
</header>

    <div class="title my-5">  <h2 class="text-center py-2">Welcome Back</h2></div>
    <div class="main_login row  container">
        <div class="bg-black ">
        </div>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <h2 class="text-left">login</h2>
            <div class="text-left">
            <!-- Email Address -->
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" value="{{ old('user_name') }}" class="form-control" name="pas" id="exampleInputEmail1" placeholder="email" required>
            </div>


            <!-- Password -->
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1">
            </div>



            <!-- Remember Me -->
            <div class="row container">
            <div class="col-6">
            <div class="mb-3">
                <label class="form-check-label" for="exampleCheck1">Remeber me</label>
                    <input type="checkbox" name="remember" class="form-check-input" id="exampleCheck1">
                </label>
            </div>
            </div>
            <div class="col-6 text-right forgot">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
            </div>
            </div>


                <button class="btn mt-4 py-2">
                    {{ __('Login') }}
                </button>
            </div>
            </div>
        </form>
        <div class="forgot mt-3 mb-5">Don't have an account?<a href="#" class="px-2">SignUp !</a></div>
        <div class="social">
            <ul class="list-unstyled d-flex ">
               <li class="mx-3"><img src="{{asset('assets/images/Gmail.png')}}" alt="gmail" ></li>
                <li class="mx-3"><img src="{{asset('assets/images/Facebook.png')}}" alt="gmail" ></li>
                <li class="mx-3"><img src="{{asset('assets/images/twitter.png')}}" alt="gmail" ></li>
           </ul>
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
