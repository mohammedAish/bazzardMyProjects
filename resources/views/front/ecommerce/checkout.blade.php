<x-ecommerce-layout>
    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="{{route('home')}}"><i class="fa fa-home"></i> {{ __('home.shop') }}</a>
                        <span> {{ __('home.checkout') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h6 class="coupon__link"><span class="icon_tag_alt"></span> <a href="#"></a>{{ __('home.checkout') }}</h6>
                </div>
            </div>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form class="checkout__form" novalidate method="post" action="{{route('cart.checkOut_store')}}">
                @csrf
                <div class="row">
                    <div class="col-lg-8">
                        <h5>{{ __('home.billing_address') }}</h5>
                        <div class="row">
                            <div class="checkout__form__input col-md-12">
                                <p>{{__('home.phone_number')}} <span>*</span></p>
                                <input type="text" name="phone" class="form-control  @error('phone') is-invalid @enderror" id="phone" data-validate
                                data-validate-url="{{ route('checkout.fetch_data', 'VALUE') }}"  value="{{ old('phone') }}"
                                    required>
                                    @error('phone')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                    @enderror
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                    <p>{{__('home.first_name')}} <span>*</span></p>
                                    <input type="text" name="first_name" id="first_name" class=" @error('first_name') is-invalid @enderror" value="{{ old('first_name') }}" required>
                                    @error('first_name')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                    <p>{{__('home.last_name')}} <span>*</span></p>
                                    <input type="text" class="form-control  @error('last_name') is-invalid @enderror" name="last_name" id="last_name"
                                        value="{{ old('last_name') }}" required>
                                        @error('last_name')
                                        <p class="invalid-feedback">{{ $message }}</p>
                                        @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="checkout__form__input">
                                    <p>{{__('home.email')}} <span>*</span></p>
                                    <input type="email" class="form-control  @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('email') }}">
                                    @error('email')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                                <div class="checkout__form__input col-lg-6 col-md-6 col-sm-12">
                                    <p>{{__('home.city')}} <span>*</span></p>
                                    <div class="">
                                        <select class="form-control mb-3 p-2 @error('email') is-invalid @enderror" name="city" id="city" required>
                                            <option value="" data-display="Select" id="city_name">Choose...</option>
                                            @foreach ($cities as $city)
                                                <option value="{{ $city->city_id }} ">{{ $city->city_name }}</option>
                                            @endforeach
                                        </select>
                                        @error('city')
                                        <p class="invalid-feedback">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                {{-- <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                    <p>{{__('home.postal_code')}} <span>*</span></p>
                                    <input type="text" name="postal_code" class="form-control  @error('postal_code') is-invalid @enderror" id="postal_code"  value="{{ old('postal_code') }}"
                                        required>
                                        @error('postal_code')
                                        <p class="invalid-feedback">{{ $message }}</p>
                                        @enderror
                                </div>
                                </div> --}}


                            <div class="checkout__form__input col-md-6 col-sm-12">
                                <p>{{__('home.address')}} <span>*</span></p>
                                <input type="text" name="address" class="form-control  @error('address') is-invalid @enderror" id="address"  value="{{ old('address') }}"
                                    required>
                                    @error('address')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                    @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="checkout__order">
                            <h5>{{__('home.your_order')}}</h5>
                            <div class="checkout__order__product">
                                <ul>
                                    <li>
                                        <span class="top__text">{{__('home.Product')}}</span>
                                        <span class="top__text__right">{{__('home.total')}}</span>
                                    </li>
                                    @foreach($cart as $item)
                                    <li>{{$item->products->name}}
                                    @if ($item->products->saleprice == null)
                                         <span> ${{$item->products->price}}</span>
                                    @else
                                    <span> ${{$item->products->saleprice}}</span></li>
                                    @endif
                                    @endforeach
                                </ul>
                            </div>
                            <div class="checkout__order__total">
                                <ul>
                                    <li>{{__('home.total')}} <span>$ {{$total}}</span></li>
                                </ul>
                            </div>
                            {{-- <div class="checkout__order__widget">
                                <label for="check-payment">
                                    Cheque payment
                                    <input type="checkbox" id="check-payment">
                                    <span class="checkmark"></span>
                                </label>
                                <label for="paypal">
                                    PayPal
                                    <input type="checkbox" id="paypal">
                                    <span class="checkmark"></span>
                                </label>
                            </div> --}}
                            <button type="submit" class="site-btn">{{__('home.place_order')}}</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- Checkout Section End -->
</x-ecommerce-layout>
