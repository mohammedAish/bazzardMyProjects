<x-admin-layout>
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
    <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor mt-5 pt-5" id="kt_content">
        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        {{ __('dashboard.add_shipping_company') }}
                    </h3>
                </div>
            </div>
            <!--begin::Form-->
            <form class="kt-form kt-form--label-right" method="post" action="{{ route('companies.store_company', $store->slug) }}" class="form-horizontal" enctype="multipart/form-data">
                @csrf
                <div class="kt-portlet__body">

                @if($selected_commpany)
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label ">{{ __('dashboard.company_name') }}</label>
                        <div class="col-md-6 col-sm-12">
                        <select class="form-select form-select-sm form-control"
                            name="company_id" aria-label=".form-select-sm example">
                            @foreach ($companies as $company)
                                <option  value="{{($company->company_id) }}" @if($selected_commpany->company_id ==$company->company_id) selected @endif> {{ $company->company_name }} 
                                </option>
                            @endforeach
                            </select>
                            @error('company_id')
                            <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    @else
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label ">{{ __('dashboard.company_name') }}</label>
                        <div class="col-md-6 col-sm-12">
                        <select class="form-select form-select-sm form-control"
                            name="company_id" aria-label=".form-select-sm example">
                            @foreach ($companies as $company)
                                <option  value="{{($company->company_id) }}" > {{ $company->company_name }} 
                                </option>
                            @endforeach
                            </select>
                            @error('company_id')
                            <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    @endif
                    
                    </div>
                    <div class="kt-portlet__foot">
                    <div class="kt-form__actions">
                        <div class="row">
                            <div class="col-2">
                            </div>
                            <div class="col-10">
                                <button type="submit" class="btn btn-success">{{ __('home.save') }}</button>
                                <button type="reset" class="btn btn-secondary">{{ __('home.cancel') }}</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <!--end::Form-->
        </div>
            </div>
</x-admin-layout>
