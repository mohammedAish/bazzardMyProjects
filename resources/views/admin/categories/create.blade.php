<x-admin-layout>
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
    <div class="container">
        <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor mt-5 pt-5" id="kt_content">
            <div class="kt-portlet">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                    @if(Auth::user()->hasAbility('categories.create'))
                        <h3 class="kt-portlet__head-title">
                            {{ __('dashboard.add_new_category') }}
                        </h3>
                    @endif
                    </div>
                </div>
                <div class="container p-5">
                    <form action="{{ route('categories.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group ">
                                    <label class=" col-form-label ">{{ __('home.name') }} <span style="color:#FF0000">*</span></label>
                                    <div class="">
                                        <input type="text" value="{{ old('name') }}" name="name" id="title"
                                            class="form-control @error('name') is-invalid @enderror">
                                        @error('name')
                                            <p class="invalid-feedback">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group ">
                                    <label class=" col-form-label ">الإسم بالعربي <span style="color:#FF0000">*</span></label>
                                    <div class="col-md- col-sm-12">
                                        <input type="text" value="{{ old('name_ar') }}" name="name_ar" id="title"
                                            class="form-control @error('name_ar') is-invalid @enderror">
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
                                        <textarea type="text" value="" name="desc" id="title"
                                            class="form-control @error('desc') is-invalid @enderror"
                                            rows="5">{{ old('desc') }}</textarea>
                                        @error('desc')
                                            <p class="invalid-feedback">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group ">
                                    <label class=" col-form-label ">الوصف بالعربي</label>
                                    <div class="col-md- col-sm-12">
                                        <textarea type="text" value="" name="desc_ar" id="title"
                                            class="form-control @error('desc_ar') is-invalid @enderror"
                                            rows="5">{{ old('desc_ar') }}</textarea>
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
                                        <input type="file"  name="image"
                                    class="form-control @error('image')is-invalid @enderror" value="{{ old('image') }}">
                                @error('image')
                                    <p class="invalid-feedback fs-3">{{ $message }}</p>
                                @enderror
                                    </div>
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
                                <label class=" col-form-label ">{{ __('home.status') }}</label>
                                <div class="col-md- col-sm-12">
                                    <label class="kt-radio"><input type="radio" name="status" value="active" @if (old('status') == 'active') checked @endif>
                                        {{ __('dashboard.active') }} <span></span></label>
                                    <label class="kt-radio"><input type="radio" name="status" value="inactive" @if (old('status') == 'inactive') checked @endif>
                                        {{ __('dashboard.inactive') }} <span></span></label>
                                        @error('status')
                                        <p class="invalid-feedback">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group ">
                            <button type="submit" class="btn  btn-success px-4">{{ __('home.save') }}</button>
                            <a href="{{ route('categories.index') }}"
                                class="btn btn-secondary">{{ __('home.cancel') }}</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-admin-layout>
