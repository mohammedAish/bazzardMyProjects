<x-admin-layout>
    <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor mt-5 pt-5" id="kt_content">

        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        {{__('home.add_new_merchant')}}
                    </h3>
                </div>
            </div>
            <!--begin::Form-->
            <form class="kt-form kt-form--label-right" method="post" action="{{route('merchants.store')}}" class="form-horizontal" enctype="multipart/form-data">
                @csrf
                <div class="kt-portlet__body">
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label ">{{__('home.store_name')}}</label>
                        <div class="col-md-6 col-sm-12">
                            <input type="text" value="{{ old('name') }}" name="name" id="title" class="form-control @error('name') is-invalid @enderror" placeholder="{{__('home.store_name')}} ">
                            @error('name')
                            <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                     <div class="form-group row">
                        <label class="col-md-3 col-form-label ">{{__('home.brand name')}}</label>
                        <div class="col-md-6 col-sm-12">
                            <input type="text" value="{{ old('slug') }}" name="slug" id="slug" class="form-control @error('slug') is-invalid @enderror" placeholder="{{__('home.brand name')}}">
                            @error('slug')
                            <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label ">{{ __('home.user_name') }}</label>
                        <div class="col-md-6 col-sm-12">
                            <input type="text" value="{{ old('user_name') }}" name="user_name" id="title" class="form-control @error('user_name') is-invalid @enderror" placeholder="{{ __('home.user_name') }}">
                            @error('user_name')
                            <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label ">{{ __('home.email') }}</label>
                        <div class="col-md-6 col-sm-12">
                            <input type="text" value="{{ old('email') }}" name="email" id="title" class="form-control  @error('email') is-invalid @enderror" placeholder="{{ __('home.email') }}">
                            @error('email')
                            <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label ">{{ __('home.password') }}</label>
                        <div class="col-md-6 col-sm-12">
                            <input type="password" value="" name="password" id="title" class="form-control @error('email') is-invalid @enderror" placeholder="{{ __('home.password') }}">
                            @error('password')
                            <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label ">{{ __('home.status') }}</label>
                        <div class="col-md-6 col-sm-12">
                            <label><input type="radio" name="status" value="active" @if (old('status') == 'active') checked @endif>
                                 {{ __('dashboard.active') }}</label>
                            <label><input type="radio" name="status" value="inactive" @if (old('status') == 'inactive') checked @endif>
                                {{ __('dashboard.inactive') }}</label>
                        </div>
                        @error('status')
                        <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>
                    </div>
                    <div class="kt-portlet__foot">
                    <div class="kt-form__actions">
                        <div class="row">
                            <div class="col-2">
                            </div>
                            <div class="col-10">
                                <button type="submit" class="btn btn-success">{{ __('home.save') }}</button>
                                <a href="{{ route('merchants.index') }}" class="btn btn-secondary">{{ __('home.cancel') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <!--end::Form-->
        </div>
            </div>
</x-admin-layout>
