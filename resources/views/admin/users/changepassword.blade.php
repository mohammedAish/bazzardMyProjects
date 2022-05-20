<x-admin-layout>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

    <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor mt-5 pt-5" id="kt_content">
        <div class="kt-grid__item kt-grid__item--fluid kt-app__content container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="kt-portlet">
                        <div class="kt-portlet__head">
                            <div class="kt-portlet__head-label">
                                <h3 class="kt-portlet__head-title">{{__('home.change_password')}}
                                </h3>
                            </div>

                        </div>
                        <form class="kt-form kt-form--label-right" method="post"
                        action="{{route('password.store',$user->id)}}" class="form-horizontal"
                        enctype="multipart/form-data">
                                     @csrf
                            <div class="form-body py-5">

                                <div class="form-group row">
                                    <label class="col-md-3 control-label">{{__('home.old_password')}}</label>
                                    <div class="col-md-6">
                                        <input  name="old_password" value="" type="password" class="form-control  @error('old_password') is-invalid @enderror">
                                    </div>
                                    @error('old_password')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-3 control-label">{{__('home.new_password')}}</label>
                                    <div class="col-md-6">
                                        <input  name="password" value="" type="password" class="form-control  @error('password') is-invalid @enderror">
                                    </div>
                                    @error('password')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-3 control-label">{{__('home.confirm_password')}}</label>
                                    <div class="col-md-6">
                                        <input  name="password_confirmation" value="" type="password" class="form-control  @error('password_confirmation') is-invalid @enderror">
                                    </div>
                                    @error('password_confirmation')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="kt-portlet__foot">
                                <div class="kt-form__actions">
                                    <div class=" text-center">

                                        <div class=" ">
                                            <button type="submit" class="btn btn-success">{{ __('home.save') }}</button>&nbsp;
                                            <button type="reset" class="btn btn-secondary">{{ __('home.cancel') }}</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
</x-admin-layout>
