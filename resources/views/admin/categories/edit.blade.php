<x-admin-layout>
    <div class="container">
        <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor mt-5 pt-5" id="kt_content">
            <div class="kt-portlet">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            {{ __('dashboard.edit_category') }}
                        </h3>
                    </div>
                </div>
                <div class="container p-5">
                    <form action="{{ route('categories.update', $category->id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('put')


                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group ">
                                    <label class=" col-form-label ">{{ __('home.name') }} <span style="color:#FF0000">*</span></label>
                                    <div class="">
                                        <input type="text" value="{{ old('name', $category->name) }}" name="name"
                                            id="title" class="form-control @error('name') is-invalid @enderror">
                                        @error('name')
                                            <p class="invalid-feedback">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group ">
                                    <label class=" col-form-label ">الإسم بالعربي <span style="color:#FF0000">*</span> </label>
                                    <div class="col-md- col-sm-12">
                                        <input type="text" value="{{ old('name', $category->name_ar) }}" name="name_ar"
                                            id="title" class="form-control @error('name_ar') is-invalid @enderror">
                                        @error('name_ar')
                                            <p class="invalid-feedback">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group ">
                                    <label class=" col-form-label ">{{ __('home.desc') }}</label>
                                    <div class="">
                                        <textarea type="text" value="{{ old('desc', $category->desc) }}" name="desc"
                                            id="title" class="form-control @error('desc') is-invalid @enderror"
                                            rows="5">{{ $category->desc }}</textarea>
                                        @error('desc')
                                            <p class="invalid-feedback">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group ">
                                    <label class=" col-form-label ">التفاصيل بالعربي</label>
                                    <div class="col-md- col-sm-12">
                                        <textarea type="text" 
                                            name="desc_ar" id="title"
                                            class="form-control @error('desc_ar') is-invalid @enderror"
                                            rows="5">{{ $category->desc_ar }}</textarea>
                                        @error('desc_ar')
                                            <p class="invalid-feedback">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group ">
                                    <label class=" col-form-label ">{{ __('dashboard.image') }} <span style="color:#FF0000">*</span></label>
                                    <div class="">
                                       {{--  <div><img src="{{ asset('img/'. $category->image) }}"
                                            height="80px" width="80px"></div> --}}
                                        <input type="file" name="image"
                                    class="form-control @error('image')is-invalid @enderror">
                                @error('image')
                                    <p class="invalid-feedback fs-3">{{ $message }}</p>
                                @enderror
                                    </div>
                                    <div><img src="{{ asset('img/' . $category->image) }}" height="80px" width="80px"></div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group ">
                                    <label class=" col-form-label ">{{ __('home.parent_category') }}</label>
                                    <div class="col-md- col-sm-12">
                                        <select name="parent_id" class="form-control @error('parent_id') is-invalid @enderror">
                                            <option value="">{{ __('home.no_parent') }}</option>
                                            @foreach ($parents as $parent)
                                                <option value="{{ $parent->id }}" @if ($parent->id == old('parent_id', $category->parent_id)) selected @endif>
                                                    {{ $parent->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('parent_id')
                                        <p class="invalid-feedback">{{ $message }}</p>
                                    @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-12">
                            <div class="form-group ">
                                <label class=" col-form-label ">{{ __('home.status') }} <span style="color:#FF0000">*</span></label>
                                <div class="col-md- col-sm-12">
                                    <label class="kt-radio"><input type="radio" name="status" value="active" @if (old('status', $category->status) == 'active') checked @endif>
                                        {{ __('dashboard.active') }} <span></span></label>
                                    <label class="kt-radio"><input type="radio" name="status" value="inactive" @if (old('status', $category->status) == 'inactive') checked @endif>
                                        {{ __('dashboard.inactive') }} <span></span></label>
                                        @error('status')
                                        <p class="invalid-feedback">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group ">
                            <button type="submit" class="btn  btn-success px-4">{{ __('home.update') }}</button>
                            <a href="{{ route('categories.index') }}"
                                class="btn btn-secondary">{{ __('home.cancel') }}</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-admin-layout>
