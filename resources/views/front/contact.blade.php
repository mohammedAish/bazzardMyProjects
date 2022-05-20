<x-front-layout>

    <div class="main_contact pt-5">
        <div class="container ">
            <div class="title text-center pt-2 pb-5">
                <h2>{{ __('home.Contact us') }}</h2>
                <p>{{ __('home.Have a question or just want to say hi?') }}<br>{{ __('home.We’d love to hear from you!') }}
                </p>
            </div>
            <div class="row pt-5">
                <div class="text col-md-6 col-sm-12 pb-5 mb-5">
                    <div class="row">
                       {{--  <div class="col-md-6 col-sm-12 ">
                            <i class="fas fa-phone-alt"></i>
                            <h4 class="py-2">{{ __('home.Location') }}</h4>
                            <p>Building no. 110, Shabab St., Esaweyeh, West bank, Palestine</p>
                        </div> --}}
                        <div class="col-md-6 col-sm-12">
                            <i class="far fa-envelope"></i>
                            <h4 class="py-2">{{ __('home.Email') }}</h4>
                            <p>Support@Bazaard.com</p>
                        </div>
                        <div class="col-md-6 col-sm-12 ">
                            <i class="fas fa-phone-alt"></i>
                            <h4 class="py-2">{{ __('home.Number') }}</h4>
                            <p>+970-599-123456</p>
                        </div>
                    </div>
                    @if (session()->has('success'))
                    <div class="alert alert-success my-5 text-center" style="font-size:23px;">
                        {{ session()->get('success') }}
                    </div>
                    @endif
                </div>
                <div class="ss col-md-6 col-sm-12">
                    <div class="s"><img src="{{ asset('assets/images/groupcart.png') }}" alt="cart"></div>
                    <div class="form py-4 px-5">
                        <h4 class="pb-4">{{ __('home.Reach us out') }}</h4>
                        <form method="post" action="{{route('contactus.store')}}">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">{{ __('home.name') }}</label>
                                <input type="text" name="name" class="form-control  @error('name') is-invalid @enderror" placeholder="{{ __('home.full_name') }}">
                                @error('name')
                                <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1"
                                    class="form-label">{{ __('home.Emaill Address') }}</label>
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" placeholder="{{ __('home.Emaill Address') }}">
                                    @error('email')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                    @enderror
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">{{ __('home.message') }}</label>
                                <textarea rows="5" name="message" class="form-control @error('message') is-invalid @enderror"
                                    placeholder="{{ __('home.message') }}"></textarea>
                                    @error('message')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                    @enderror
                            </div>

                            <button type="submit" class="btn btn-warning">{{ __('home.Submit') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
                  
    </div><!-- End main_contact -->
    <div class="faq container mb-5 pb-5">
        <h2 class="mx-5 px-5">{{ __('home.FAQ’s') }}</h2>
        <div class="quastions col-md-10 col-sm-12 mt-4">
            <div class="quastion px-3 pt-2">
                <div class="qu d-flex justify-content-between">
                    <p>How can I create a store</p><i class="drop  fas fa-sort-down justify-content-end"></i>
                </div>

                <p class="answer">How can I create a store</p>
            </div>
            <div class="quastion px-3 pt-2">
                <div class="qu d-flex justify-content-between">
                    <p>Can I edit my store theme</p><i class="drop fas fa-sort-down justify-content-end"></i>
                </div>

                <p class="answer">How can I create a store</p>
            </div>
            <div class="quastion px-3 pt-2">
                <div class="qu d-flex justify-content-between">
                    <p>How can I check my store details and analysis</p><i
                        class="drop fas fa-sort-down justify-content-end"></i>
                </div>

                <p class="answer">How can I create a store</p>
            </div>
            <div class="quastion px-3 py-2">
                <div class="qu d-flex justify-content-between">
                    <p>How to add products</p><i class="drop fas fa-sort-down justify-content-end"></i>
                </div>

                <p class="answer">How can I create a store</p>
            </div>
            <div class="quastion px-3 py-2">
                <div class="qu d-flex justify-content-between">
                    <p>Do stores get deactivated after a year of not logging in </p><i
                        class="drop fas fa-sort-down justify-content-end"></i>
                </div>

                <p class="answer">How can I create a store</p>
            </div>
            <div class="quastion px-3 py-2">
                <div class="qu d-flex justify-content-between">
                    <p>Are my search queries saved when looking for products</p><i
                        class="drop fas fa-sort-down justify-content-end"></i>
                </div>

                <p class="answer">How can I create a store</p>
            </div>
            <div class="quastion px-3 py-2">
                <div class="qu d-flex justify-content-between">
                    <p>Where can I promote my store on social channels</p><i
                        class="drop fas fa-sort-down justify-content-end"></i>
                </div>

                <p class="answer">How can I create a store</p>
            </div>
        </div>

        <div>
        </div>
    </div>




    <!-- End faq -->
</x-front-layout>
