<x-ecommerce1-layout>

    <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>{{ __('home.checkout') }}</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('home.shop') }}</a></li>
                        <li class="breadcrumb-item active">{{ __('home.checkout') }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Cart  -->
    <div class="cart-box-main">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-lg-6 mb-3">
                    <div class="checkout-address">
                        <div class="title-left">
                            <h3>{{ __('home.billing_address') }}</h3>
                        </div>
                        <form class="needs-validation" novalidate method="post"
                            action="{{ route('cart.checkOut_store') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="address">{{ __('home.phone_number') }} <span
                                        style="color:#FF0000">*</span></label>
                                <input type="text" name="phone"
                                    class="form-control @error('phone') is-invalid @enderror" id="phone" data-validate
                                    data-validate-url="{{ route('checkout.fetch_data', 'VALUE') }}"
                                    value="{{ old('phone') }}" required>
                                @error('phone')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="firstName">{{ __('home.first_name') }} <span
                                                style="color:#FF0000">*</span></label>
                                        <input type="text"
                                            class="form-control @error('first_name') is-invalid @enderror"
                                            name="first_name" id="first_name" value="{{ old('first_name') }}"
                                            required>
                                        @error('first_name')
                                            <p class="invalid-feedback">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="lastName">{{ __('home.last_name') }} <span
                                                style="color:#FF0000">*</span></label>
                                        <input type="text" class="form-control @error('last_name') is-invalid @enderror"
                                            name="last_name" id="last_name" value="{{ old('last_name') }}" required>
                                        @error('last_name')
                                            <p class="invalid-feedback">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="email">{{ __('home.Emaill Address') }} <span
                                            style="color:#FF0000">*</span></label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" id="email" value="{{ old('email') }}">
                                    @error('email')
                                        <p class="invalid-feedback">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="country">{{ __('home.city') }} <span
                                                style="color:#FF0000">*</span></label>
                                        <select class="wide w-100 form-control @error('email') is-invalid @enderror" name="city" id="city">
                                            <option value="" data-display="Select" id="country_name">Choose...</option>
                                            @foreach ($cities as $city)
                                                <option value="{{ $city->city_id }}">{{ $city->city_name }}</option>
                                            @endforeach
                                        </select>
                                        @error('city')
                                            <p class="invalid-feedback">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        {{-- <label for="zip">{{ __('home.postal_code') }} <span
                                                style="color:#FF0000">*</span></label>
                                        <input type="text" name="postal_code"
                                            class="form-control @error('postal_code') is-invalid @enderror" id="postal_code"
                                            value="{{ old('postal_code') }}" required>
                                        @error('postal_code')
                                            <p class="invalid-feedback">{{ $message }}</p>
                                        @enderror --}}
                                        <div class="mb-3">
                                            <label for="address">{{ __('home.address') }} <span
                                                    style="color:#FF0000">*</span></label>
                                            <input type="text" name="address"
                                                class="form-control @error('address') is-invalid @enderror" id="address"
                                                value="{{ old('address') }}" required>
                                            @error('address')
                                                <p class="invalid-feedback">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>


                            <hr class="mb-4">
                            <div class="col-12 d-flex shopping-box">
                                <button type="submit" class="ml-a btn hvr-hover form-control"
                                    style="color: #fff;">{{ __('home.place_order') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-6 mb-3">
                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                            <div class="odr-box">
                                <div class="title-left">
                                    <h3>{{ __('home.shopping_cart') }}</h3>
                                </div>
                                <div class="rounded p-2 bg-light">
                                    @foreach ($cart as $product)
                                        <div class="media mb-2 border-bottom">
                                            <div class="media-body"> <a href="detail.html"> @if (app()->getLocale() == 'ar') {{ $product->products->name_ar }} @else {{ $product->products->name }} @endif
                                                </a>
                                                @if ($product->products->saleprice == null)
                                                    <div class="small text-muted">{{ __('home.price') }}:
                                                        ${{ $product->products->price }} <span
                                                            class="mx-2">|</span> {{ __('home.qty') }}:
                                                        {{ $product->quantity }}<span class="mx-2">|</span>
                                                        {{ __('home.sub_total') }}:
                                                        ${{ $product->products->price * $product->quantity }}</div>
                                                @else
                                                    <div class="small text-muted">{{ __('home.price') }}:
                                                        ${{ $product->products->saleprice }} <span
                                                            class="mx-2">|</span> {{ __('home.qty') }}:
                                                        {{ $product->quantity }}<span class="mx-2">|</span>
                                                        {{ __('home.sub_total') }}:
                                                        ${{ $product->products->saleprice * $product->quantity }}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-12">
                            <div class="order-box">
                                <div class="title-left">
                                    <h3>{{ __('home.your_order') }}</h3>
                                </div>
                                <div class="d-flex">
                                    {{-- <div class="font-weight-bold">{{__('home.product')}}</div> --}}
                                    <div class="ml-auto font-weight-bold">{{ __('home.total') }}</div>
                                </div>
                                <hr class="my-1">
                                <div class="d-flex">
                                    <div class="ml-auto font-weight-bold"> $ {{ $total }} </div>
                                </div>
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- End Cart -->
</x-ecommerce1-layout>
