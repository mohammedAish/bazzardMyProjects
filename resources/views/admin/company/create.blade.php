<x-admin-layout>
    <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor mt-5 pt-5" id="kt_content">

        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        {{ __('dashboard.add_new_shipping_company') }}
                    </h3>
                </div>
            </div>
            <!--begin::Form-->
            <form class="kt-form kt-form--label-right" method="post" action="{{route('company.store')}}" class="form-horizontal" enctype="multipart/form-data">
                @csrf
                <div class="kt-portlet__body">

                <div class="form-group row">
                    <label class=" col-lg-3 col-form-label">{{__('home.company_logo')}}</label>
                    <div class="col-lg-6  text-center">
                        <div class="kt-avatar kt-avatar--outline" id="kt_user_avatar_1">
                            <div class="kt-avatar__holder" style="background-image: url({{ asset('assets/images/blank-profile.png') }})"></div>
                            <label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="Change avatar">
                                <i class="fa fa-pen"></i>
                                <input type="file" name="logo"  accept=".png, .jpg, .jpeg">
                            </label>
                            <span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="Cancel avatar">
                                <i class="fa fa-times"></i>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                        <label class="col-md-3 col-form-label ">{{ __('home.company_id') }}</label>
                        <div class="col-md-6 col-sm-12">
                            <input type="text" value="{{ old('company_id') }}" name="company_id" id="title" class="form-control @error('company_id') is-invalid @enderror" placeholder="{{ __('home.company_id') }}" >
                            @error('company_id')
                            <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label ">{{ __('home.company_name') }}</label>
                        <div class="col-md-6 col-sm-12">
                            <input type="text" value="{{ old('company_name') }}" name="company_name" id="title" class="form-control @error('company_name') is-invalid @enderror" placeholder="{{ __('home.company_name') }}">
                            @error('company_name')
                            <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label ">{{ __('home.desc') }}</label>
                        <div class="col-md-6 col-sm-12">
                            <textarea name="desc" rows="4" cols="78" >{!! old('desc') !!}</textarea>
                            @error('desc')
                                <p class="invalid-feedback fs-3">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    
                    
                    
                    </div>
                    <div class="kt-portlet__foot">
                    <div class="kt-form__actions">
                        <div class="row">
                            <div class="col-2">
                            </div>
                            <div class="col-10">
                                <button type="submit" class="btn btn-success">{{ __('home.save') }}</button>
                                <a href="{{ route('company.index')}}" class="btn btn-secondary">{{ __('home.cancel') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <!--end::Form-->
        </div>
        @push('js')
            <script src="{{ asset('assets/admin/js/pages/crud/file-upload/ktavatar.js') }}" type="text/javascript"></script>
        @endpush
            </div>
</x-admin-layout>
