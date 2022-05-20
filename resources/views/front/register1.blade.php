<x-headerlogin-layout>
    <div class="text-center">
        <div class="title my-5">
            <h2 class="text-center py-2">{{ __('home.Welcome To The Family') }} </h2>
        </div>
        <div class="main_register  container">

            <div class="bg-black ">

            </div>
            <div class="signupForm mt-5 ">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="text-left">

                        <div class="mb-3">
                            <label>{{ __('home.Store Name') }}</label>
                            <input type="text" class="form-control" name="name"
                                placeholder="{{ __('home.Store Name') }}">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">{{ __('home.Emaill Address') }}</label>
                            <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                                placeholder="{{ __('home.Emaill Address') }}">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">{{ __('home.password') }}</label>
                            <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">{{ __('home.Your Name') }}</label>
                            <input type="text" class="form-control" name="user_name">
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">{{ __('home.phone_number') }}</label>
                            <input type="text" class="form-control" name="phone_number"
                                placeholder="{{ __('home.phone_number') }}">
                        </div>
                        <button type="submit" class="btn  py-2"> {{ __('home.create new store') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-headerlogin-layout>
