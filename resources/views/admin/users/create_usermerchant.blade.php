<x-admin-layout>
    @if ($errors->any())
    <div class="alert alert-danger">
        Error!
        <ul>
            @foreach($errors->all() as $message)
            <li>{{ $message }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor mt-5 pt-5" id="kt_content">

        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        {{ __('dashboard.add_new_user') }}
                    </h3>
                </div>
            </div>
            <!--begin::Form-->
            <form class="kt-form kt-form--label-right" method="post" action="{{route('users.store_usermerchant',$slugs->slug)}}" class="form-horizontal" enctype="multipart/form-data">
                @csrf
                <div class="kt-portlet__body">
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label ">{{ __('home.user_name') }} </label>
                        <div class="col-md-6 col-sm-12">
                            <input type="text" value="" name="user_name" id="title" class="form-control @error('user_name') is-invalid @enderror" placeholder="{{ __('home.user_name') }}" required>
                            @error('user_name')
                            <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                     
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label "> {{ __('home.Store Name') }}</label>
                        <div class="col-md-6 col-sm-12">
                           <select class="form-select form-select-sm form-control" name="store_id" aria-label=".form-select-sm example" required>
                            @if( (Auth::user()->type  == "superadmin") || (Auth::user()->type  == "admins"))
                           @foreach($stores as $store)
                           <option value="{{$store->id}}" >{{$store->name}}</option>
                         @endforeach
                         @endif
                        @if(Auth::user()->type  == "merchants")
                           @foreach($merchantsstore as $merchantsstores)
                           <option value="{{$merchantsstores->id}}">{{$merchantsstores->name}}</option>
                         @endforeach
                          @endif
                      </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label ">{{ __('home.email') }}</label>
                        <div class="col-md-6 col-sm-12">
                            <input type="text" value="" name="email" id="title" class="form-control @error('email') is-invalid @enderror" placeholder="{{ __('home.email') }}" required>
                            @error('email')
                            <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label ">{{ __('home.password') }}</label>
                        <div class="col-md-6 col-sm-12">
                            <input type="password" value="" name="password" id="title" class="form-control @error('password') is-invalid @enderror" placeholder="{{ __('home.password') }}" required>
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
                                <a href="{{ route('users.index') }}" class="btn btn-secondary">{{ __('home.cancel') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <!--end::Form-->
        </div>
            </div>
</x-admin-layout>