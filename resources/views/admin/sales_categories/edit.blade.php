<x-admin-layout>
    <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor mt-5 pt-5" id="kt_content">
        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        {{__('dashboard.edit_sales_categories')}}
                    </h3>
                </div>
            </div>
            <!--begin::Form-->
            <form class="kt-form kt-form--label-right" method="post" action="{{route('sales_categories.update',$sales_categories->id)}}" class="form-horizontal" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="kt-portlet__body">
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label ">{{__('dashboard.title')}}</label>
                        <div class="col-md-6 col-sm-12">
                            <input type="text" value="{{ old('title', $sales_categories->title) }}" name="title"  class="form-control @error('title')is-invalid @enderror" placeholder="{{__('dashboard.title')}}">
                            @error('title')
                            <p class="invalid-feedback">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="form-group row">
                    <div class="col-8 text-center"><img src="{{ asset('img/' . $sales_categories->img) }}" height="80px" width="80px"></div>
                    <div class="col-12">  
                  <div  class="row">
                  <label class="col-md-3 col-form-label ">{{__('dashboard.image')}}</label>
                        <div class="col-md-6 col-sm-12">
                            <input type="file" name="img" class="form-control @error('img')is-invalid @enderror">
                            @error('img')
                            <p class="invalid-feedback">{{$message}}</p>
                            @enderror
                        </div>
                  </div>
                        </div>  
                    </div>
                    
                    </div>
                    <div class="kt-portlet__foot">
                    <div class="kt-form__actions">
                        <div class="row">
                            <div class="col-2">
                            </div>
                            <div class="col-10">
                                <button type="submit" class="btn btn-success">{{ __('home.Update') }}</button>
                                <a href="{{ url('category') }}" class="btn btn-secondary">{{ __('home.Cancel') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <!--end::Form-->
        </div>
            </div>
</x-admin-layout>
