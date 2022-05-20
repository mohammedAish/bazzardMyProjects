<x-headerlogin-layout>
    <div class="text-center">
        <div class="title">
            <h2 class="text-center py-2">{{ __('home.Welcome Back') }}</h2>
        </div>
        <div class="main_login row  container">

            <div class="bg-black ">

            </div>
            <div class="signupForm mt-5 col-12">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $message)
                            <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

                <form method="POST" action="{{ route('password.update') }}">
                    @csrf
                    <!-- Password Reset Token -->
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">
                    
                    <h2 class="text-center">{{ __('home.reset_password') }}</h2>
                    <div class="text-center">
                        <div class="mb-3 formss">
                            <label for="exampleInputEmail1"
                                class="form-label">{{ __('home.Emaill Address') }}</label>
                            <input type="email" class="form-control" name="email" id="email"
                                placeholder="{{ __('home.Emaill Address') }}" value={{old('email', $request->email)}}  required
                                autofocus>
                        </div>

                        <div class="mb-3 formss">
                            <label for="exampleInputPassword1"
                                class="form-label">{{ __('home.password') }}</label>
                            <input type="password" name="password" class="form-control" id="password" required
                                autocomplete="current-password">
                                <i class="far fa-eye-slash show-pass" id="togglePassword" onclick="myFunction()" ></i>                               
                        </div>

                        <div class="mb-3 formss">
                            <label for="exampleInputPassword1"
                                class="form-label">{{ __('home.confirm_password') }}</label>
                            <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" required>
                                <i class="far fa-eye-slash show-pass" id="togglePassword" onclick="myFunction1()" ></i>
                                
                        </div>
                       
                        <button type="submit" class="btn mt-4 py-2">{{ __('home.reset_password') }}</button>
                    </div>
                </form>
                
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
    <script>
        function myFunction1() {
    var x = document.getElementById("password_confirmation");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
    }
    </script>
   
</x-headerlogin-layout>
