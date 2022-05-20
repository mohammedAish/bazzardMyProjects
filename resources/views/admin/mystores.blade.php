    <x-store-layout>
        <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor mt-5 pt-5" id="kt_content">
            <div class="kt-grid__item kt-grid__item--fluid kt-app__content container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="kt-portlet">
                            <div class="kt-portlet__head">
                                <div class="kt-portlet__head-label">
                                    <h3 class="kt-portlet__head-title">{{ $store->name }}
                                    </h3>
                                </div>

                            </div>
                            {{-- <form class="kt-form kt-form--label-right" method="post"
                                action="{{ route('mystore.store', $store->id) }}" class="form-horizontal"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="kt-portlet__body">
                                    <div class="kt-section kt-section--first">
                                        <div class="kt-section__body">

                                            <div class="form-group row">
                                                <label class=" col-lg-3 col-form-label">Store logo</label>
                                                <div class="col-lg-9  text-center px-5">
                                                    <div class="kt-avatar kt-avatar--outline " id="kt_user_avatar">
                                                        <div class="kt-avatar__holder" style="background-image: url()">
                                                            @if ($store->logo)
                                                                <img src="{{ asset('img/' . $store->logo) }}"
                                                                    height="120px" width="120px">
                                                            @else
                                                                <img class="rounded-circle " alt="User Image"
                                                                    src="{{ asset('assets/images/blank-profile.png') }}"
                                                                    width="110px" height="110px">
                                                            @endif
                                                        </div>

                                                        <label class="kt-avatar__upload" data-toggle="kt-tooltip"
                                                            title="" data-original-title="Change avatar">
                                                            <i class="fa fa-pen"></i>
                                                            <input type="file" name="logo">

                                                        </label>
                                                        <span class="kt-avatar__cancel" data-toggle="kt-tooltip"
                                                            title="" data-original-title="Cancel avatar">
                                                            <i class="fa fa-times"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">Store Name</label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input class="form-control" name="name" type="text"
                                                        value="{{ $store->name }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label">slug Name</label>
                                            <div class="col-lg-9 col-xl-6">
                                                <input class="form-control" name="slug" type="text"
                                                    value="{{ $store->slug }}">
                                            </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-3 col-form-label ">Plan Store</label>
                                                <div class="col-md-9 col-sm-12">
                                                    <select class="form-select form-select-sm form-control" name="plan"
                                                        aria-label=".form-select-sm example">

                                                        <option value="free">free</option>
                                                        <option value="premium">premium</option>
                                                        <option value="enterprise">enterprise</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group form-group-last row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">status </label>
                                                <div class="col-lg-9 col-xl-6">

                                                    <div
                                                        class="custom-control custom-radio custom-control-inline pt-2 mb-3">
                                                        <input type="radio" id="customRadioInline1" name="status"
                                                            value="inactive" class="custom-control-input"
                                                            @if (old('status', $store->status) == 'inactive') checked @endif>
                                                        <label class="custom-control-label"
                                                            for="customRadioInline1">inactive</label>
                                                    </div>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" id="customRadioInline2" name="status"
                                                            value="active" class="custom-control-input"
                                                            @if (old('status', $store->status) == 'active') checked @endif>
                                                        <label class="custom-control-label"
                                                            for="customRadioInline2">active</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-md-3 col-form-label ">how sell products</label>
                                                <div class="col-md-9 col-sm-12">
                                                    <select class="form-select form-select-sm form-control"
                                                        name="how_sell_products" aria-label=".form-select-sm example">
                                                        @foreach ($sell as $sells)
                                                            <option value="{{ $sells->id }}">{{ $sells->title }}
                                                            </option>

                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <h1>Welcome To Your Store</h1>
                                        </div>
                                    </div>
                                </div>
                                <div class="kt-portlet__foot">
                                    <div class="kt-form__actions">
                                        <div class=" text-center">

                                            <div class=" ">
                                                <button type="submit" class="btn btn-success">save</button>&nbsp;
                                                <button type="reset" class="btn btn-secondary">cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </x-store-layout>
