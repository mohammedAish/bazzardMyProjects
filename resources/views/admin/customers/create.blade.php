<x-admin-layout>
    <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor mt-5 pt-5" id="kt_content">
        <div class="kt-portlet">

            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        {{ __('home.add_new_customer') }}
                    </h3>
                </div>
            </div>
            <!--begin::Form-->
            <div class="container p-5">
            <form class="kt-form" method="post" action="{{ route('customers.store') }}"
                class="form-horizontal" enctype="multipart/form-data">
                @csrf

                <div class="form-group row">
                    <label class="col-md-3 col-form-label ">{{ __('home.first_name') }} <span style="color:#FF0000">*</span></label>
                    <div class="col-md-6 col-sm-12">
                        <input type="text" value="{{ old('first_name') }}" name="first_name" id="title"
                            class="form-control @error('first_name') is-invalid @enderror"
                            placeholder="{{ __('home.first_name') }}">
                        @error('first_name')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-3 col-form-label ">{{ __('home.last_name') }} <span style="color:#FF0000">*</span></label>
                    <div class="col-md-6 col-sm-12">
                        <input type="text" value="{{ old('last_name') }}" name="last_name" id="title"
                            class="form-control @error('last_name') is-invalid @enderror"
                            placeholder="{{ __('home.last_name') }}">
                        @error('last_name')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-3 col-form-label ">{{ __('home.address') }} <span style="color:#FF0000">*</span></label>
                    <div class="col-md-6 col-sm-12">
                        <input type="text" value="{{ old('address') }}" name="address" id="title"
                            class="form-control @error('address') is-invalid @enderror"
                            placeholder="{{ __('home.address') }}">
                        @error('address')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label ">{{ __('home.email') }} <span style="color:#FF0000">*</span></label>
                        <div class="col-md-6 col-sm-12">
                            <input type="text" value="{{ old('email') }}" name="email" id="title"
                                class="form-control @error('email') is-invalid @enderror"
                                placeholder="{{ __('home.email') }}">
                            @error('email')
                                <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label ">{{ __('home.phone_number') }} <span style="color:#FF0000">*</span></label>
                        <div class="col-md-6 col-sm-12">
                            <input type="text" value="{{ old('phone') }}" name="phone" id="title"
                                class="form-control @error('phone') is-invalid @enderror"
                                placeholder="{{ __('home.phone_number') }}">
                            @error('phone')
                                <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label ">{{ __('home.city') }} <span style="color:#FF0000">*</span></label>
                            <div class="col-md-6 col-sm-12">
                                <select class="wide w-100 form-control @error('city') is-invalid @enderror" name="city" id="city">
                                    <option value="" data-display="Select" id="country_name">Choose...</option>
                                        @foreach ($cities as $city)
                                            <option value="{{ $city->city_id }}">{{ $city->city_name }}</option>
                                        @endforeach
                                </select>
                                    @error('city')
                                        <p class="invalid-feedback">{{ $message }}</p>
                                    @enderror
                            </div>
                    </div>
                 <!--     <div class="form-group row">
                        <label class="col-md-3 col-form-label ">{{ __('home.country') }} <span style="color:#FF0000">*</span></label>
                        <div class="col-md-6 col-sm-12">
                            <select name="country" class="form-control">
                                <option value="">Select Country</option>
                                @foreach (Symfony\Component\Intl\Countries::getNames() as $code => $name)
                                    <option value="{{ $name }}"  @if ($name == old('country')) selected @endif >{{ $name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('country')
                                <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div>
                    </div> -->

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label ">{{ __('home.postal_code') }} <span style="color:#FF0000">*</span></label>
                        <div class="col-md-6 col-sm-12">
                            <input type="text" value="{{ old('postal_code') }}" name="postal_code" id="title"
                                class="form-control @error('postal_code') is-invalid @enderror"
                                placeholder="{{ __('home.postal_code') }}">
                            @error('postal_code')
                                <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    {{-- <div class="form-group row">
                        <label class="col-md-3 col-form-label ">{{ __('home.status') }} <span style="color:#FF0000">*</span></label>
                        <div class="col-md-6 col-sm-12">
                            <label><input type="radio" name="status" value="active" @if (old('status') == 'active') checked @endif>
                                {{ __('dashboard.active') }}</label>
                            <label><input type="radio" name="status" value="inactive" @if (old('status') == 'inactive') checked @endif>
                                {{ __('dashboard.inactive') }}</label>
                        </div>
                        @error('status')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div> --}}


                    <div class="form-group">
                            <button type="submit" class="btn btn-success">{{ __('home.save') }}</button>
                            <a href="{{ route('admins.index') }}"
                                class="btn btn-secondary">{{ __('home.cancel') }}</a>
                    </div>

            </form>
            <!--end::Form-->
            </div>
        </div>
    </div>
</x-admin-layout>
