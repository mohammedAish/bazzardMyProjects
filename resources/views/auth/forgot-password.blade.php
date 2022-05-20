<x-headerlogin-layout>
    <div class="text-center">
        <div class="title">
            <h2 class="text-center py-2">{{ __('home.Welcome Back') }}</h2>
        </div>
        <div class="main_login row  container">

            <div class="bg-black ">

            </div>
            <div class="signupForm mt-5 col-12">
            @if (session()->has('status'))
                    <div class="alert alert-success my-5 text-center" style="font-size:18px;">
                        {{ session()->get('status') }}
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


                <form method="POST" action="{{ route('password.email') }}">

                    @csrf
                    <h2 class="text-center">{{ __('home.forget_password') }}</h2>
                    <div class="text-center">
                        <div class="mb-3 formss">
                            <label for="exampleInputEmail1"
                                class="form-label">{{ __('home.Emaill Address') }}</label>
                            <input type="email" class="form-control" name="email" id="email"
                                placeholder="{{ __('home.Emaill Address') }}" value="{{ old('email') }}"  required
                                autofocus>
                        </div>
                       
                        <button type="submit" class="btn mt-4 py-2">{{ __('home.send') }}</button>
                    </div>
                </form>
                <div class="forgot mt-3 mb-5 ">{{ __('home.Don’t have an account?') }} <a
                        href="{{ route('register') }}" class="px-2">{{ __('home.signup') }}</a></div>

            </div>
        </div>
    </div>
    </div>
   
</x-headerlogin-layout>
