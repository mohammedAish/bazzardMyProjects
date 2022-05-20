<x-admin-layout>
    <div class="container">
    <form class="kt-form kt-form--label-right" method="post"
    action="{{ route('profile.mystore', $store->slug) }}" class="form-horizontal"
    enctype="multipart/form-data">
    @csrf
    <div class="kt-portlet__body">
        <div class="kt-section kt-section--first">
            <div class="kt-section__body">
                <div class="form-group row">
                    <label class=" col-lg-3 col-form-label">{{__('home.store_logo')}}</label>
                    <div class="col-lg-9  text-center px-5">
                        <div class="kt-avatar kt-avatar--outline" id="kt_user_avatar_1">
                            @if ($store->logo)
                            <div class="kt-avatar__holder" style="background-image: url({{ asset('img/'.$store->logo )}})"></div>
                            @else
                            <div class="kt-avatar__holder" style="background-image: url({{ asset('assets/images/blank-profile.png') }})"></div>
                            @endif
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
                    <label class="col-xl-3 col-lg-3 col-form-label">{{__('home.Store Name')}}</label>
                    <div class="col-lg-9 col-xl-6">
                        <input class="form-control" name="name" type="text"
                            value="{{ $store->name }}">
                    </div>
                </div>
               <!--  <div class="form-group row">
                <label class="col-xl-3 col-lg-3 col-form-label">{{__('home.brand name')}}</label>
                <div class="col-lg-9 col-xl-6">
                    <input class="form-control" name="slug" type="text"
                        value="{{ $store->slug }}">
                </div>
                </div> -->
                <div class="form-group row">
                    <label class="col-md-3 col-form-label ">{{__('home.plan')}}</label>
                    <div class="col-md-9 col-sm-12">
                        <select class="form-select form-select-sm form-control" name="plan"
                            aria-label=".form-select-sm example">

                            <option value="free">free</option>
                            <option value="premium">premium</option>
                            <option value="enterprise">enterprise</option>

                        </select>
                    </div>
                </div>
              

                {{-- <div class="form-group row">
                    <label class="col-md-3 col-form-label ">{{ __('dashboard.how_sell_products') }}</label>
                    <div class="col-md-9 col-sm-12">
                        <select class="form-select form-select-sm form-control"
                            name="how_sell_products" aria-label=".form-select-sm example">
                            @foreach ($sell as $sells)
                                <option value="{{ $sells->id }}">{{ $sells->title }}
                                </option>

                            @endforeach
                        </select>
                    </div>
                </div> --}}
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


@push('js')
<script src="{{ asset('assets/admin/js/pages/crud/file-upload/ktavatar.js') }}" type="text/javascript"></script>
@endpush
</div>

</x-admin-layout>
