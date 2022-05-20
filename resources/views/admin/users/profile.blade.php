<x-admin-layout>
    @if ($errors->any())
    <div class="alert alert-danger">
        Error!
        <ul>
            @foreach ($errors->all() as $message)
                <li>{{ $message }}</li>
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
                                <h3 class="kt-portlet__head-title">{{__('home.my_profile')}}
                                </h3>
                            </div>

                        </div>
                        <form class="kt-form kt-form--label-right" method="post"
                              action="{{route('profile.store',$user->id)}}" class="form-horizontal"
                              enctype="multipart/form-data">
                          @csrf
                            <div class="kt-portlet__body">
                                <div class="kt-section kt-section--first">
                                    <div class="kt-section__body">

                                        <div class="form-group row">
                                            <label class=" col-lg-3 col-form-label">{{__('home.profile_image')}} </label>
                                            <div class="col-lg-9  text-center px-5">
                                                <div class="kt-avatar kt-avatar--outline" id="kt_user_avatar_1">
                                                    @if ($user->avatar)
                                                    <div class="kt-avatar__holder" style="background-image: url({{ asset('img/'.$user->avatar )}})"></div>

                                                    @else
                                                    <div class="kt-avatar__holder" style="background-image: url({{ asset('assets/images/blank-profile.png') }})"></div>
													@endif
                                                    <label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="Change avatar">
														<i class="fa fa-pen"></i>
														<input type="file" name="avatar"  accept=".png, .jpg, .jpeg">
													</label>
													<span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="Cancel avatar">
														<i class="fa fa-times"></i>
													</span>
												</div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label">{{__('home.user_name')}}</label>
                                            <div class="col-lg-9 col-xl-6">
                                                <input class="form-control @error('user_name') is-invalid @enderror" name="user_name" type="text" value="{{ old('user_name', $user->user_name) }}">
                                                @error('user_name')
                                                <p class="invalid-feedback">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label">{{__('home.full_name')}}</label>
                                            <div class="col-lg-9 col-xl-6">
                                                <input class="form-control @error('full_name') is-invalid @enderror" name="full_name" type="text" value="{{old('full_name',$user->full_name)}}">
                                                @error('full_name')
                                                <p class="invalid-feedback">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label">{{__('home.email')}}</label>
                                            <div class="col-lg-9 col-xl-6">
                                                <input class="form-control @error('email') is-invalid @enderror" name="email" type="email" value="{{old('email',$user->email)}}">
                                                @error('email')
                                                <p class="invalid-feedback">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label">{{__('home.address')}}</label>
                                            <div class="col-lg-9 col-xl-6">
                                                <input class="form-control @error('address') is-invalid @enderror" name="address" type="text" value="{{old('address',$user->address)}}">
                                                @error('address')
                                                <p class="invalid-feedback">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label">{{__('home.birthday')}}</label>
                                            <div class="col-lg-9 col-xl-6">
                                                <input class="form-control @error('birthday') is-invalid @enderror" name="birthday" type="date" value="{{old('birthday',$user->birthday)}}">
                                                @error('birthday')
                                                <p class="invalid-feedback">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label">{{__('home.country')}}</label>
                                            <div class="col-lg-9 col-xl-6">
                                                <input class="form-control @error('country') is-invalid @enderror" name="country" type="text" value="{{old('country',$user->country)}}">
                                                @error('country')
                                                <p class="invalid-feedback">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label">{{__('home.phone_number')}}</label>
                                            <div class="col-lg-9 col-xl-6">
                                                <input class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" type="text" value="{{old('phone_number',$user->phone_number)}}">
                                                @error('phone_number')
                                                <p class="invalid-feedback">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
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
        @push('js')
        <script src="{{ asset('assets/admin/js/pages/crud/file-upload/ktavatar.js') }}" type="text/javascript"></script>
        @endpush
</x-admin-layout>
