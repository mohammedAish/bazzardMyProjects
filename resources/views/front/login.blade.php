<x-headerlogin-layout>
    <div class="text-center">
        <div class="title">
            <h2 class="text-center py-2">{{ __('home.Welcome Back') }}</h2>
        </div>
        <div class="main_login row  container">

            <div class="bg-black ">

            </div>
            <div class="signupForm mt-5 col-12">
                 @if (session()->has('disable'))
                    <div class="alert alert-danger my-5 text-center" style="font-size:23px;">
                        {{ session()->get('disable') }}
                    </div>
                @endif
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $message)
                            <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
                <form method="POST" action="{{ route('login') }}">

                    @csrf
                    <h2 class="text-center">{{ __('home.login') }}</h2>
                    <div class="text-center">
                        <div class="mb-3 formss">
                            <label for="exampleInputEmail1"
                                class="form-label">{{ __('home.Emaill Address') }}</label>
                            <input type="email" class="form-control" name="email" id="email"
                                placeholder="{{ __('home.Emaill Address') }}" value="{{ old('email') }}"  required
                                autofocus>
                        </div>
                        <div class="mb-3 formss">
                            <label for="exampleInputPassword1"
                                class="form-label">{{ __('home.password') }}</label>
                            <input type="password" name="password" class="form-control" id="password" required
                                autocomplete="current-password">
                                <i class="far fa-eye-slash show-pass" id="togglePassword" onclick="myFunction()" ></i>
                                <div class="col-6 text-right forgot">
                                    @if (Route::has('password.request'))
                                        <a class="underline text-sm text-gray-600 hover:text-gray-900"  href="{{ route('password.request') }}">
                                            <span>{{ __('home.forgot_your_password') }}</span>
                                        </a>
                                    @endif
                                </div>
                        </div>


  

             
                        <button type="submit" class="btn mt-4 py-2">{{ __('home.login') }}</button>
                    </div>
                </form>
                <div class="forgot mt-3 mb-5 ">{{ __('home.Don’t have an account?') }} <a
                        href="{{ route('register') }}" class="px-2">{{ __('home.signup') }}</a></div>

            </div>
        </div>
    </div>
    </div>
    <script>
        function myFunction() {
    var x = document.getElementById("password");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
    }
    </script>
</x-headerlogin-layout>
