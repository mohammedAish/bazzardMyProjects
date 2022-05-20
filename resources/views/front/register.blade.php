<x-headerlogin-layout>
    <div class="max-container mt-3  container">
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <h2 class="yellow-text ">
                {{ __('home.Welcome To The Family') }}
            </h2>
            <div class="row">
                <div class="col-12 stepss">
                    <div class="">
                        <div class=" step-form-1 active" id="step-form-1">
                        <div class="bg-black  ">
                        </div>
                        <div class=" ">
                            <section class="wizard-section">
                                <div class="row no-gutters">
                                    <div class="col-12">
                                        <div class="form-wizard">
                                            <form action="" method="post" role="form">
                                                <div class="form-wizard-header">

                                                    <ul class="list-unstyled form-wizard-steps clearfix">
                                                        <li class="active"><span>1</span></li>
                                                        <li><span>2</span></li>
                                                        <li><span>3</span></li>
                                                        <li><span>4</span></li>
                                                        <li><span>5</span></li>
                                                        <li><span>6</span></li>
                                                    </ul>

                                                </div>
                                                <div class="alert alert-danger hide">
                                                    <ul>
                                                    </ul>
                                            </div>
                                                <fieldset class="wizard-fieldset signupForm show">
                                                    <div class="form-group">
                                                        <label for="fname"
                                                            class="">{{ __('home.Store Name') }}</label>
                                                        <input type="text" class="form-control wizard-required"
                                                            name="name" required="required">
                                                        <div class="wizard-form-error"></div>
                                                        <span class="text-danger fw-bold" id="error_name"></span>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="slug"
                                                            class="">{{ __('home.brand name') }} ({{__('home.domain_name')}})</label>
                                                        <input type="text" class="form-control wizard-required"
                                                            name="slug" required="required" id="brand_name" data-validate data-validate-url="{{route('register.real_time_validate','VALUE')}}" placeholder="bazaard.co/domain">
                                                        <div class="wizard-form-error"></div>
                                                        <span class="text-danger fw-bold" id="error_slug"></span>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="lname"
                                                            class="">{{ __('home.Emaill Address') }}</label>
                                                        <input type="email" name="email"
                                                            class="form-control wizard-required" required="required">
                                                        <div class="wizard-form-error"></div>
                                                        <span class="text-danger fw-bold" id="error_email"></span>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="lname"
                                                            class="">{{ __('home.password') }}</label>
                                                        <input type="password" name="password" id="password"
                                                            class="form-control wizard-required" required="required">
                                                            <i class="far fa-eye-slash show-pass-register" id="togglePassword" onclick="myFunction()" ></i>
                                                        <div class="wizard-form-error"></div>
                                                        <span class="text-danger fw-bold" id="error_password"></span>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="fname"
                                                            class="">{{ __('home.Your Name') }}</label>
                                                        <input type="text" class="form-control wizard-required"
                                                            name="user_name" required="required">
                                                        <div class="wizard-form-error"></div>
                                                        <span class="text-danger fw-bold" id="error_user_name"></span>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="fname"
                                                            class="">{{ __('home.phone_number') }}</label>
                                                        <input type="text" class="form-control wizard-required"
                                                            name="phone_number" required="required" placeholder="">
                                                        <div class="wizard-form-error"></div>
                                                        <span class="text-danger fw-bold" id="error_phone"></span>
                                                    </div>
                                                    <div class="form-group clearfix">
                                                        <a href="javascript:;" data-step="1"
                                                            class="form-wizard-next-btn float-right">{{__('home.next')}}</a>
                                                    </div>
                                                </fieldset>

                                                <fieldset class="wizard-fieldset text-center">
                                                    <h2 class="text-center">
                                                        {{ __('home.how do you currently sell your products') }}</h2>
                                                        @if($currently->count()==0)
                                                   <div class="boxs row">
                                        <div class="box col-md-3 col-sm-6">
                                            <input type="radio" class="input-hidden" id="ck2b"
                                                value="my_own_website" name="how_sell_products">
                                            <div
                                                class="boxx custom-control custom-radio image-checkbox">
                                                <label class="custom-control-label" for="ck2b">
                                                    <img src="{{ asset('assets/images/signup_2.png') }}"
                                                        alt="#" class="img-fluid mx-2">
                                                       <h6>My Own Website</h6>
                                                </label>

                                            </div>
                                            {{-- <span class="text-danger fw-bold p-5" id="error_how_sell_products"></span> --}}
                                        </div>

                                        <div class="box col-md-3 col-sm-6">
                                            <input type="radio" class="input-hidden" id="ck2c"
                                                value="e_Market_platforms" name="how_sell_products">
                                            <div
                                                class="boxx custom-control custom-radio image-checkbox">
                                                <label class="custom-control-label" for="ck2c">
                                                    <img src="{{ asset('assets/images/signup_3.png') }}"
                                                        alt="#" class="img-fluid mx-2">
                                                      <h6>E-Market Platforms</h6>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="box col-md-3 col-sm-6">
                                            <input type="radio" class="input-hidden" id="ck2d"
                                                value="physical_store" name="how_sell_products">
                                            <div
                                                class="boxx custom-control custom-radio image-checkbox">
                                                <label class="custom-control-label" for="ck2d">
                                                    <img src="{{ asset('assets/images/signup_4.png') }}"
                                                        alt="#" class="img-fluid mx-2">
                                                        <h6>Physical Store</h6>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="box col-md-3 col-sm-6">
                                            <input type="radio" class="input-hidden" id="ck2e"
                                                value="all" name="how_sell_products">
                                            <div
                                                class="boxx custom-control custom-radio image-checkbox">
                                                <label class="custom-control-label" for="ck2e">
                                                    <img src="{{ asset('assets/images/signup_5.png') }}"
                                                        alt="#" class="img-fluid mx-2">
                                                        <h6>All Of The Above</h6>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="box col-md-3 col-sm-6">
                                            <input type="radio" class="input-hidden" id="ck2g"
                                                value="nothing" name="how_sell_products">
                                            <div
                                                class="boxx custom-control custom-radio image-checkbox ">
                                                <label class="custom-control-label" for="ck2g">
                                                    <img src="{{ asset('assets/images/signup_6.png') }}"
                                                        alt="#" class="img-fluid mx-2">
                                                        <h6>I Don’t Sell Yet</h6>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="box col-md-3 col-sm-6">
                                            <input type="radio" class="input-hidden" id="ck2f"
                                                value="creating_store" name="how_sell_products">
                                            <div
                                                class="boxx custom-control custom-radio image-checkbox">
                                                <label class="custom-control-label" for="ck2f">
                                                    <img src="{{ asset('assets/images/signup_7.png') }}"
                                                        alt="#" class="img-fluid ">
                                                           <h6>Creating Store For Someone Else</h6>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="box col-md-3 col-sm-6">
                                            <input type="radio" class="input-hidden" id="ck2h"
                                                value="Just_exploring" name="how_sell_products">
                                            <div
                                                class="boxx custom-control custom-radio image-checkbox">
                                                <label class="custom-control-label mx-2" for="ck2h">
                                                    <img src="{{ asset('assets/images/signup_7.png') }}"
                                                        alt="#" class="img-fluid mx-2">
                                                        <h6>Just Exploring</h6>
                                                </label>
                                            </div>
                                        </div>

                                    </div>
                                                        @else

                                                    <div class="boxs row">
                                                        @foreach($currently as $item)
                                                        <div class="box col-md-3 col-sm-6">
                                                            <input type="radio" class="input-hidden" id="ck2b"
                                                                value="my_own_website" name="how_sell_products">
                                                            <div
                                                                class="boxx custom-control custom-radio image-checkbox">
                                                                <label class="custom-control-label" for="ck2b">
                                                                    <img src=" {{asset('img/' . $item->img)}}"
                                                                        alt="#" class="img-fluid mx-2">
                                                                       <h6>{{$item->title}}</h6>
                                                                </label>

                                                            </div>
                                                            {{-- <span class="text-danger fw-bold p-5" id="error_how_sell_products"></span> --}}
                                                        </div>
                                                        @endforeach
                                                        </div>
                                                    @endif
                                                    <div class="form-group clearfix">
                                                        <a href="javascript:;"
                                                            class="form-wizard-previous-btn ">{{__('home.previous')}}</a>
                                                        <a href="javascript:;" data-step="2"
                                                            class="form-wizard-next-btn ">{{__('home.next')}}</a>
                                                    </div>

                                                </fieldset>


                                                <fieldset class="wizard-fieldset text-center">
                                                    <h2 class="text-center">
                                                        {{ __('home.what are you going to sell') }}</h2>
                                                    <div class="min-boxs">
                                                    @if($salescategories->count()==0)
                                                    <div class="box custom-control custom-radio image-checkbox">
                                                            <input type="radio" class="input-hidden" id="ck3b"
                                                                value="clothes_shoes" name="what_going_sell">
                                                            <div
                                                                class="boxx custom-control custom-radio image-checkbox d-flex">
                                                                <label class="custom-control-label d-flex" for="ck3b">
                                                                    <img src="{{ asset('assets/images/signup_2_2.png') }}"
                                                                        alt="#" class="img-fluid">
                                                                        <p class="pt-3">Clothes & shoes </p>
                                                                </label>

                                                            </div>
                                                        </div>

                                                        <div class="box custom-control custom-radio image-checkbox">
                                                            <input type="radio" class="input-hidden" id="ck3c"
                                                                value="tech_products" name="what_going_sell">
                                                            <div
                                                                class="boxx custom-control custom-radio image-checkbox d-flex">
                                                                <label class="custom-control-label d-flex" for="ck3c">
                                                                    <img src="{{ asset('assets/images/signup_2_3.png') }}"
                                                                        alt="#" class="img-fluid">
                                                                        <p class="pt-3"> Tech products </p>
                                                                </label>
                                                            </div>
                                                        </div>

                                                        <div class="box custom-control custom-radio image-checkbox">
                                                            <input type="radio" class="input-hidden" id="ck3d"
                                                                value="health_beauty" name="what_going_sell">
                                                            <div
                                                                class="boxx custom-control custom-radio image-checkbox d-flex">
                                                                <label class="custom-control-label d-flex" for="ck3d">
                                                                    <img src="{{ asset('assets/images/signup_2_4.png') }}"
                                                                        alt="#" class="img-fluid">
                                                                        <p class="pt-3">Health & beauty </p>
                                                                </label>

                                                            </div>
                                                        </div> 
                                                    </div>

                                                    <div class="min-boxs">
                                                        <div class="box custom-control custom-radio image-checkbox">
                                                            <input type="radio" class="input-hidden" id="ck3e"
                                                                value="health_beauty" name="what_going_sell">
                                                            <div
                                                                class="boxx custom-control custom-radio image-checkbox d-flex">
                                                                <label class="custom-control-label d-flex" for="ck3e">
                                                                    <img src="{{ asset('assets/images/signup_2_5.png') }}"
                                                                        alt="#" class="img-fluid">
                                                                        <p class="pt-3"> Kids & baby </p>
                                                                </label>

                                                            </div>
                                                        </div>

                                                        <div class="box custom-control custom-radio image-checkbox">
                                                            <input type="radio" class="input-hidden" id="ck3f"
                                                                value="health_beauty" name="what_going_sell">
                                                            <div
                                                                class="boxx custom-control custom-radio image-checkbox d-flex">
                                                                <label class="custom-control-label d-flex" for="ck3f">
                                                                    <img src="{{ asset('assets/images/signup_2_6.png') }}"
                                                                        alt="#" class="pt-1 img-fluid">
                                                                        <p class="pt-3"> Arts & crafts </p>
                                                                </label>
                                                            </div>
                                                        </div>

                                                        <div class="box custom-control custom-radio image-checkbox">
                                                            <input type="radio" class="input-hidden" id="ck3g"
                                                                value="health_beauty" name="what_going_sell">
                                                            <div
                                                                class="boxx custom-control custom-radio image-checkbox d-flex">
                                                                <label class="custom-control-label d-flex" for="ck3g">
                                                                    <img src="{{ asset('assets/images/signup_2_7.png') }}"
                                                                        alt="#" class="img-fluid">
                                                                        <p class="pt-3"> Jewellery </p>
                                                                </label>
                                                            </div>
                                                        </div>

                                                        <div class="box custom-control custom-radio image-checkbox ">
                                                            <input type="radio" class="input-hidden" id="ck3h"
                                                                value="health_beauty" name="what_going_sell">
                                                            <div
                                                                class="boxx custom-control custom-radio image-checkbox d-flex">
                                                                <label class="custom-control-label d-flex" for="ck3h">
                                                                    <img src="{{ asset('assets/images/signup_2_8.png') }}"
                                                                        alt="#" class="img-fluid">
                                                                        <p class="pt-3"> Fitness </p>
                                                                </label>
                                                            </div>
                                                        </div>

                                                        <div class="box custom-control custom-radio image-checkbox">
                                                            <input type="radio" class="input-hidden" id="ck3i"
                                                                value="health_beauty" name="what_going_sell">
                                                            <div
                                                                class="boxx custom-control custom-radio image-checkbox d-flex">
                                                                <label class="custom-control-label d-flex" for="ck3i">
                                                                    <img src="{{ asset('assets/images/signup_2_9.png') }}"
                                                                        alt="#" class="img-fluid">
                                                                        <p class="pt-3"> Pet supplies </p>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="min-boxs">
                                                        <div class="box custom-control custom-radio image-checkbox">
                                                            <input type="radio" class="input-hidden" id="ck3k"
                                                                value="health_beauty" name="what_going_sell">
                                                            <div
                                                                class="boxx custom-control custom-radio image-checkbox d-flex">
                                                                <label class="custom-control-label d-flex" for="ck3k">
                                                                    <img src="{{ asset('assets/images/signup_2_10.png') }}"
                                                                        alt="#" class="img-fluid">
                                                                        <p class="pt-3"> Music </p>
                                                                </label>
                                                            </div>
                                                        </div>

                                                        <div class="box custom-control custom-radio image-checkbox">
                                                            <input type="radio" class="input-hidden" id="ck3l"
                                                                value="health_beauty" name="what_going_sell">
                                                            <div
                                                                class="boxx custom-control custom-radio image-checkbox d-flex">
                                                                <label class="custom-control-label d-flex" for="ck3l">
                                                                    <img src="{{ asset('assets/images/signup_2_11.png') }}"
                                                                        alt="#" class="img-fluid">
                                                                        <p class="pt-3"> Accessories </p>
                                                                </label>

                                                            </div>
                                                        </div>


                                                        <div class="box custom-control custom-radio image-checkbox">
                                                            <input type="radio" class="input-hidden" id="ck3m"
                                                                value="health_beauty" name="what_going_sell">
                                                            <div
                                                                class="boxx custom-control custom-radio image-checkbox d-flex">
                                                                <label class="custom-control-label d-flex" for="ck3m">
                                                                    <img src="{{ asset('assets/images/signup_2_12.png') }}"
                                                                        alt="#" class="img-fluid">
                                                                        <p class="pt-3"> Supplements </p>
                                                                </label>
                                                            </div>
                                                        </div>

                                                        <div class="box custom-control custom-radio image-checkbox">
                                                            <input type="radio" class="input-hidden" id="ck3n"
                                                                value="health_beauty" name="what_going_sell">
                                                            <div
                                                                class="boxx custom-control custom-radio image-checkbox d-flex">
                                                                <label class="custom-control-label d-flex" for="ck3n">
                                                                    <img src="{{ asset('assets/images/signup_2_13.png') }}"
                                                                        alt="#" class="img-fluid">
                                                                        <p class="pt-3"> Others</p>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @else
                                                    @foreach($salescategories as $item)
                                                    <div class="box custom-control custom-radio image-checkbox">
                                                            <input type="radio" class="input-hidden" id="ck3{{$item->id}}"
                                                                value="food_drink" name="what_going_sell">
                                                            <div
                                                                class="boxx custom-control custom-radio image-checkbox d-flex">
                                                                <label class="custom-control-label d-flex" for="ck3{{$item->id}}">

                                                                        <img src=" {{asset('img/' . $item->img)}}"
                                                                        alt="#" class="img-fluid mx-2">
                                                                       <p>{{$item->title}}</p>
                                                                </label>

                                                            </div>
                                                            {{-- <span class="text-danger fw-bold p-5" id="error_what_going_sell"></span> --}}
                                                    </div>

                                                    @endforeach
                                                    </div>
                                                
                                                    
                                                    @endif
                                                    <div class="form-group clearfix">
                                                        <a href="javascript:;"
                                                            class="form-wizard-previous-btn ">{{__('home.previous')}}</a>
                                                        <a href="javascript:;"  data-step="3"
                                                            class="form-wizard-next-btn ">{{__('home.next')}}</a>
                                                    </div>
                                                </fieldset>


                                                <fieldset class="wizard-fieldset text-center">
                                                    <h2 class="text-center">{{ __('home.is_your_business_registered') }}</h2>
                                                    <div class="big-boxs">
                                                        <div class="box custom-control custom-radio image-checkbox">
                                                            <input type="radio" class="input-hidden" id="ck4a"
                                                                value="social_media" name="business_registered">
                                                            <div
                                                                class="boxx2 custom-control custom-radio image-checkbox">
                                                                <label class="custom-control-label mx-2" for="ck4a">
                                                                    <img src="{{ asset('assets/images/signup_3_1.png') }}"
                                                                        alt="#" class="img-fluid" mx-3>
                                                                        <h6>{{__('home.not_registered')}}</h6>
                                                                </label>

                                                            </div>
                                                            {{-- <span class="text-danger fw-bold p-5" id="error_business_registered"></span> --}}
                                                        </div>

                                                        <div class="box custom-control custom-radio image-checkbox">
                                                            <input type="radio" class="input-hidden" id="ck4b"
                                                                value="my_own_website" name="business_registered">
                                                            <div
                                                                class="boxx2 custom-control custom-radio image-checkbox">
                                                                <label class="custom-control-label mx-2" for="ck4b">
                                                                    <img src="{{ asset('assets/images/signup_3_2.png') }}"
                                                                        alt="#" class="img-fluid" mx-3>
                                                                        <h6>  {{__('home.registered')}}</h6>
                                                                </label>

                                                            </div>
                                                        </div>

                                                        <div class="box custom-control custom-radio image-checkbox">
                                                            <input type="radio" class="input-hidden" id="ck4c"
                                                                value="e_market_Platforms" name="business_registered">
                                                            <div
                                                                class="boxx2 custom-control custom-radio image-checkbox">
                                                                <label class="custom-control-label mx-2" for="ck4c">
                                                                    <img src="{{ asset('assets/images/signup_3_3.png') }}"
                                                                        alt="#" class="img-fluid ">
                                                                        <h6>{{__('home.in_the_process_of_getting_registered')}}</h6>
                                                                </label>

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group clearfix">
                                                        <a href="javascript:;"
                                                            class="form-wizard-previous-btn">{{__('home.previous')}}</a>
                                                        <a href="javascript:;"  data-step="4"
                                                            class="form-wizard-next-btn ">{{__('home.next')}}</a>
                                                    </div>
                                                </fieldset>
                                                <fieldset class="wizard-fieldset signupFo">
                                               <div class="packages">
        <div class="max-container">
            <div>
                <h2 class="text-center">{{ __('home.Find the right plan for your service') }}</h2>
                <div class="row">
                    <div class="col-sm-12 col-md-4">
                        <div class="box-card">
                            <div class="card">
                                <h3>{{ __('home.Free') }}</h3>
                                <div class="price">0</div>
                                <div class="price-details">{{ __('home.Free plan for a life time') }}</div>
                                <hr />
                                <div class="description">
                                    {{ __('home.Easy online store to launch your business for free') }}
                                </div>

                                <div class="text-center">
                                <div class="py-2 clearfix">

                                                        <a href="javascript:;"  data-step="5"
                                                            class="form-wizard-next-btn " style="color: #fff;
                                                            font-weight: bold;
                                                            font-size: 24px;
                                                            line-height: 27px;
                                                            width: 400px;
                                                            max-width: 100%;
                                                            background-color: #FDD000;">{{ __('home.get_free_plan') }}</a>
                                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4">
                        <div class="box-card">
                            <div class="card">
                                <h3 class="line">{{ __('home.premuim') }}</h3>
                                <div class="price">20 <span>/{{ __('home.month') }}</span></div>
                                <div class="price-details">$14/ {{ __('home.month paid annually') }}</div>
                                <hr />
                                <div class="description">
                                    {{ __('home.professional features to grow and manage your online store') }}
                                </div>

                                <div class="text-center">
                                    <a class="button"  href="{{ route('payment',encrypt('20')) }}">{{ __('home.get_premuim_plan') }}</a>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="col-sm-12 col-md-4">
                        <div class="box-card">
                            <div class="card">
                                <h3>{{ __('home.enterprise') }}</h3>
                                <div class="price">35 <span>/ {{ __('home.month') }}</span></div>
                                <div class="price-details">$25/ {{ __('home.month paid annually') }}</div>
                                <hr />
                                <div class="description">
                                    {{ __('home.everything you need to sell online, mobile and at retail') }}
                                </div>

                                <div class="text-center">
                                    <a class="button"  href="{{ route('payment',encrypt('35')) }}">{{ __('home.get_enterprise_plan') }}</a>

                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
                                                </fieldset>
                                                <fieldset class="wizard-fieldset text-center">

                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="stepText4 mt-5 pt-5 text-left fw-bold pp">
                                                                {{ __('home.Your store is ready,don’t hesitate to get intouch with our supportteam whenever you need.') }}
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <img
                                                                src="{{ asset('assets/images/finish_signup.png') }}">
                                                            <div class="bttr">
                                                                <button type="submit" class="button next-button ">
                                                                    {{ __('home.Proceed to Dashboard') }}</button>
                                                            </div>
                                                        </div>

                                                    </div>

                                                </fieldset>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </section>
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
