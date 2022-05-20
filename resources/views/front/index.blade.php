<x-front-layout>
    <div class="max-container">
        <div class="top-home">
            <div class="row">
                <div class="col-12 col-md-6">
                    <h2 class="text-center">{{__('home.modern_way')}}</h2>
                    <p class="mt-3">
                        {{__('home.modern_way_desc')}}
                    </p>

                    <a href="{{ route('register') }}" class="button mt-3">
                        {{ __('home.Get Started for Free') }}
                    </a>
                    <p  class="mt-3">{{ __('home.No_credit_card') }}</p>
                </div>
                <div class="col-12 col-md-6 photo">
                    <img src="{{ asset('assets/images/top-home.png') }}">
                </div>
            </div>
        </div>
        <div class="section mt-3">
            <div class="row">
                <div class="col-12 col-md-7">
                    <div class="box">
                        <h2 class="text-center"> {{ __('home.sell_anywhere') }}</h2>

                        <p class="mt-3">
                            {{ __('home.sell_anywhere_desc') }}
                        </p>
                        <p class="mt-2 learn">{{ __('home.sell_anywhere_more_desc') }}</p>

                        <a id="learn" class="link mt-3">
                            {{ __('home.Learn more') }}
                        </a>
                        <a id="less" class="link mt-3">
                            {{ __('home.less') }}
                        </a>
                    </div>

                </div>
                <div class="col-12 col-md-5 photo">
                    <img src="{{ asset('assets/images/home-icon-1.svg') }}">
                </div>
            </div>
        </div>
    </div>

    <div class="bg-sections">
        <div class="max-container">
            <div class="section mt-5 pt-3">
                <div class="row">
                    <div class="col-12 col-md-6 photo text-center">
                        <img src="{{ asset('assets/images/home-icon-2.svg') }}">
                    </div>
                    <div class="col-12 col-md-6">
                        <div>
                            <h2>{{__('home.your_custom_shop')}}</h2>

                            <p class="mt-5">

                                {{__('home.your_custom_shop_desc')}}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="section mt-5 pt-3">
                <div class="row ">
                    <div class="col-12 col-md-6">
                        <div>
                            <h2>{{__('home.manage_simply')}}</h2>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <p class="mt-3">
                            {{__('home.manage_simply_desc')}}
                        </p>
                        <p class="mt-3">
                            {{__('home.supports_english_and_arabic')}}
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class=" pt-5 ">
        <div class="section secure-section pt-5 tt">
            <div class="buttons">
                <button id="beforeButton" class="active fw-bold">
                    {{ __('home.with_out_bazaard') }}
                </button>

                <button id="afterButton" class="fw-bold">
                    {{ __('home.with_bazaard') }}
                </button>
            </div>
            <div class="">
        <div class=" secure-boxs animated fadeIn rowBtn1 " for=" beforeButton">
                <img src="{{ asset('assets/images/before.png') }}">
            </div>

            <div class="secure-boxs animated fadeIn rowBtn2" style="display: none;" for="afterButton">
                <img src="{{ asset('assets/images/after.png') }}">
            </div>
        </div>
    </div>
    </div>


    <div class="max-container text-center">
        <a href="{{ route('register') }}" class="aa button green large mt-5">
            {{ __('home.Get Started for Free') }}
        </a>
    </div>



    <div class="features mt-3" id="services">
        <div class="max-container">
            <div class="row">
                <div class="col-12 col-md-6">
                    <h2>{{ __('home.For Sellers') }}</h2>

                    <div class="feature">
                        <img src="{{ asset('assets/images/icon-4.svg') }}">
                        <div>
                            <h4>{{__('home.sales_generation')}} </h4>
                            <p>{{__('home.sales_generation_desc')}}</p>
                        </div>
                    </div>

                    <div class="feature">
                        <img src="{{ asset('assets/images/icon-5.svg') }}">
                        <div>
                            <h4>{{__('home.accept_credit_cards')}}</h4>
                            <p>{{__('home.accept_credit_cards_desc')}}</p>
                        </div>
                    </div>

                    <div class="feature">
                        <img src="{{ asset('assets/images/icon-6.svg') }}">
                        <div>
                            <h4>{{ __('home.order_automation') }}</h4>
                            <p>{{ __('home.order_automation_desc') }}</p>
                        </div>
                    </div>

                </div>
                <div class="col-12 col-md-6">
                    <h2>{{ __('home.For Buyers') }}</h2>

                    <div class="feature">
                        <img src="{{ asset('assets/images/icon-1.svg') }}">
                        <div>
                            <h4>{{__('home.ease_of_use')}}</h4>
                            <p>{{__('home.ease_of_use_desc')}}</p>
                        </div>
                    </div>

                    <div class="feature">
                        <img src="{{ asset('assets/images/icon-2.svg') }}">
                        <div>
                            <h4>{{__('home.secure_payments')}} </h4>
                            <p>{{__('home.secure_payments_desc')}}</p>
                        </div>
                    </div>

                    <div class="feature">
                        <img src="{{ asset('assets/images/icon-3.svg') }}">
                        <div>
                            <h4>{{__('home.professional_customer_service')}}</h4>
                            <p>{{__('home.professional_customer_service_desc')}}</p>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

   <div class="max-contanier pt-5 secure-section_phone">
        <div class="section secure-section pt-5">
            <h2 class="text-center">{{ __('home.is_bazaard_secure?') }}</h2>
            <div class="secure-boxs animated fadeIn rowBtn1 mt-5 px-3" for="sellersButton">
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="card">
                            <div class="secure-box px-3">
                                <div class="title">
                                    <img src="{{ asset('assets/images/icon-5.svg') }}"> {{__('home.bazaard_ssl')}}
                                </div>
                                <p>
                                {{__('home.bazaard_ssl_desc')}}
                                </p>
                            </div>
                        </div>
                        </div>
                        <div class="swiper-slide">
                             <div class="card">
                            <div class="secure-box">
                                <div class="title">
                                    <img src="{{ asset('assets/images/icon-7.svg') }}"> {{__('home.bazaard_security_response')}}
                                </div>
                                <p>
                                   {{__('home.bazaard_security_response_desc')}}
                                </p>
                                 </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                             <div class="card">

                            <div class="secure-box">
                                <div class="title">
                                    <img src="{{ asset('assets/images/icon-8.svg') }}"> {{__('home.bazaard_solution')}}
                                </div>
                                <p>
                                    {{__('home.bazaard_solution_desc')}}
                                </p>
                            </div>
                             </div>
                        </div>
                        <div class="swiper-slide">
                             <div class="card">

                            <div class="secure-box">
                                <div class="title">
                                    <img src="{{ asset('assets/images/icon-7.svg') }}">{{__('home.admin_security')}}
                                </div>
                                <p>
                                   {{__('home.admin_security_desc')}}
                                </p>
                            </div>
                             </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="card">

                            <div class="secure-box">
                                <div class="title">
                                    <img src="{{ asset('assets/images/icon-8.svg') }}"> {{__('home.fraud_protection')}}
                                </div>
                                <p>
                                    {{__('home.fraud_protection_desc')}}
                                </p>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="swiper-button-next" style="color:#FDD000;"></div>
                    <div class="swiper-button-prev" style="color:#FDD000;"></div>
                </div>
            </div>


        </div>
    </div>

    <div class="max-contanier pt-5  secure-section_web">
        <div class="section secure-section">
            <h2 class="text-center">{{ __('home.is_bazaard_secure?') }}</h2>
            <div class="secure-boxs animated fadeIn rowBtn1 mt-5" for="sellersButton">
                    <div class="card-group">
                        <div class="card cardstyle">
                            <div class="secure-box">
                                <div class="title">
                                    <img src="{{ asset('assets/images/icon-5.svg') }}"> {{__('home.bazaard_ssl')}}
                                </div>
                                <p>
                                   {{__('home.bazaard_ssl_desc')}}
                                </p>
                            </div>
                        </div>

                        <div class="card card2style">
                            <div class="secure-box">
                                <div class="title">
                                    <img src="{{ asset('assets/images/icon-7.svg') }}"> {{__('home.bazaard_security_response')}}
                                </div>
                                <p>
                                    {{__('home.bazaard_security_response_desc')}}
                                </p>
                            </div>
                        </div>

                        <div class="card">
                            <div class="secure-box">
                                <div class="title">
                                    <img src="{{ asset('assets/images/icon-8.svg') }}"> {{__('home.bazaard_solution')}}
                                </div>
                                <p>
                                     {{__('home.bazaard_solution_desc')}}
                                </p>
                            </div>
                        </div>

                        <div class="card">
                            <div class="secure-box">
                                <div class="title">
                                    <img src="{{ asset('assets/images/icon-7.svg') }}"> {{__('home.admin_security')}}
                                </div>
                                <p>
                                   {{__('home.admin_security_desc')}}
                                </p>
                            </div>
                        </div>

                        <div class="card">
                            <div class="secure-box">
                                <div class="title">
                                    <img src="{{ asset('assets/images/icon-8.svg') }}"> {{__('home.fraud_protection')}}
                                </div>
                                <p>
                                    {{__('home.fraud_protection_desc')}}
                                </p>
                            </div>
                        </div>


                    </div>
            </div>
        </div>
    </div>



    {{-- <div class="section mt-5 pt-5">
    <div class="bg-green">
        <img src="{{asset('assets/images/bg-pexels.png')}}">
        <div class="px-3">
            <a href="{{ route('register') }}" class="button white">
                {{__('home.Sign Up For Free')}}

            </a>
        </div>

    </div>

</div> --}}

    <div class="section mt-5 pt-5">
        <h2 class="text-center " id='partners'>{{ __('home.partners') }}</h2>
        <div class="bg-yellow">
            <div class="max-contanier imgs">
                <img src="{{ asset('assets/images/maalchat.png') }}">
                <img src="{{ asset('assets/images/meps.png') }}">
                <img src="{{ asset('assets/images/jawal.png') }}">
            </div>

        </div>
    </div>

    <!-- <div class="section mt-5 pt-5 contact-us">
        <div class="max-container">
            <div class="row">
                <div class="col-12 col-md-6">
                    <h2 class="text-center mt-5 mt-4">{{ __('home.Contact us') }}</h2>
                     @if (session()->has('success'))
                    <div class="alert alert-success my-5 text-center" style="font-size:23px;">
                        {{ session()->get('success') }}
                    </div>
                    @endif 
                    <div id="res_message" class="alert alert-success my-5 text-center" style="font-size:23px; display:none;"></div>
                </div>
                <div class="col-12 col-md-6">
                    <form method="post" class="btn-submit" action="{{ route('contactus.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">{{ __('home.name') }}</label>
                            <input type="text" name="name" class="form-control  @error('name') is-invalid @enderror"
                                placeholder="{{ __('home.full_name') }}">
                            @error('name')
                                <p style="color:red;font-size:69%">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1"
                                class="form-label">{{ __('home.Emaill Address') }}</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                id="exampleInputEmail1" aria-describedby="emailHelp"
                                placeholder="{{ __('home.Emaill Address') }}">
                            @error('email')
                                <p style="color:red;font-size:69%">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1"
                                class="form-label">{{ __('home.message') }}</label>
                            <textarea rows="5" name="message"
                                class="form-control @error('message') is-invalid @enderror"
                                placeholder="{{ __('home.message') }}"></textarea>
                            @error('message')
                                <p style="color:red;font-size:69%" class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="text-center mt-5">
                            <button class="button" type="submit">{{ __('home.Submit') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> -->
</x-front-layout>

 <script type="text/javascript">
     $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(".btn-submit").click(function(e){

        e.preventDefault();
        var data = $(this).serialize();
        console.log(data);
        var url = '{{ url('/contactus/store') }}';

        $.ajax({
           url:url,
           method:'POST',
           data:data,
           success:function(response){
              if(response.success){
                  //alert(response.message) //Message come from controller
                  $('#res_message').show().html('Your message was sent successfully');
                }else{
                //alert("Error")
                $('#res_message').show().html('error');
              }
           },
           error:function(error){
              console.log(error)
              //$('#res_message').show().html('error');
           }
        });
	});
</script>
