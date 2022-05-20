<x-admin-layout>
    <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor mt-5 pt-5" id="kt_content">
        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title ">
                        {{ __('home.edit_product') }}
                    </h3>
                </div>
            </div>
            <div class="container p-5">
                <form action="{{ route('products.update', $product->id) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group ">
                                <label class=" col-form-label ">{{ __('home.name') }}</label>
                                <div class="">
                                    <input type="text" value="{{ old('name', $product->name) }}" name="name"
                                        id="title" class="form-control @error('name') is-invalid @enderror">
                                    @error('name')
                                        <p class="invalid-feedback">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group ">
                                <label class=" col-form-label ">الإسم بالعربي</label>
                                <div class="col-md- col-sm-12">
                                    <input type="text" value="{{ old('name', $product->name_ar) }}" name="name_ar"
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
                                <label class=" col-form-label ">{{ __('home.intro') }}</label>
                                <div class="">
                                    <input type="text" value="{{ old('name', $product->intro) }}" name="intro"
                                        id="title" class="form-control @error('intro') is-invalid @enderror"
                                        placeholder=" ">
                                    @error('intro')
                                        <p class="invalid-feedback">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group ">
                                <label class=" col-form-label ">مقدمة عن المنتج بالعربي</label>
                                <div class="col-md- col-sm-12">
                                    <input type="text" value="{{ old('name', $product->intro_ar) }}" name="intro_ar"
                                        id="title" class="form-control @error('intro_ar') is-invalid @enderror">
                                    @error('intro_ar')
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
                                    <textarea name="desc" class="form-control md-input" data-provide="markdown"
                                        rows="10" style="resize: none;">{!! old('desc', $product->desc) !!}</textarea>
                                    @error('desc')
                                        <p class="invalid-feedback fs-3">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group ">
                                <label class=" col-form-label ">التفاصيل بالعربي</label>
                                <div class="col-md- col-sm-12">
                                    <textarea name="desc_ar" class="form-control md-input" data-provide="markdown"
                                        rows="10" style="resize: none;">{!! old('desc', $product->desc_ar) !!}</textarea>
                                    @error('desc_ar')
                                        <p class="invalid-feedback">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group ">
                                    <label class=" col-form-label ">{{ __('dashboard.image') }} <span
                                            style="color:#FF0000">*</span></label>
                                    <div class="col-md- col-sm-12 file-loading">
                                        <input id="input-freqd-1" name="image"
                                            value="{{ old('image', $product->image) }}"
                                            class="form-control  @error('image')is-invalid @enderror"
                                            type="file" accept="image/*">
                                        @error('image')
                                            <p class="invalid-feedback">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="px-4">
                                <img src="{{ asset('img/' . $product->image) }} "
                                height="80px" width="80px">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group ">
                                    <label class=" col-form-label ">{{ __('home.gallery') }} </label>
                                    <div class="col-md- col-sm-12 file-loading">
                                        <input id="input-freqd-2" name="gallery[]"
                                            class="form-control  @error('gallery')is-invalid @enderror" multiple
                                            type="file" accept="image/*">
                                        @error('gallery')
                                            <p class="invalid-feedback">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="px-4">
                                    @foreach($product->images as $product_image)
                                    <img src="{{ asset('img/' . $product_image->image_path) }} "
                                    height="80px" width="80px">
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group ">
                                    <label class=" col-form-label ">{{ __('home.category') }}</label>
                                    <div class="">
                                        <select name="category_id"
                                            class="form-control @error('category_id') is-invalid @enderror">
                                            <option value=""> {{ __('home.category') }} </option>
                                            @foreach ($parents as $parent)
                                                <option value="{{ $parent->id }}" @if ($parent->id == old('category_id',$product->category_id)) selected @endif>
                                                    {{ $parent->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                            <p class="invalid-feedback">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group ">
                                    <label class=" col-form-label ">{{ __('home.tags') }}</label>
                                    <div class="col-md- col-sm-12">
                                        <textarea name="tags" value="" rows="5"
                                            class="tags2  @error('tags') is-invalid @enderror">
                                        {{ old('tags', $tags) }}
                                    </textarea>
                                        @error('tags')
                                            <p class="invalid-feedback">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group ">
                                    <label class=" col-form-label ">{{ __('home.price') }} <span
                                            style="color:#FF0000">*</span></label>
                                    <div class="">
                                        <input type="text" value="{{ old('price', $product->price) }}" name="price"
                                            id="title" class="form-control @error('price') is-invalid @enderror"
                                            placeholder="{{ __('home.price') }} ">
                                        @error('price')
                                            <p class="invalid-feedback">{{ $message }}</p>
                                        @enderror

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group ">
                                    <label class=" col-form-label ">{{ __('home.sale_price') }}</label>
                                    <div class="col-md- col-sm-12">
                                        <input type="text" value="{{ old('price', $product->saleprice) }}"
                                            name="saleprice" id="saleprice"
                                            class="form-control @error('saleprice') is-invalid @enderror"
                                            placeholder="{{ __('home.saleprice') }} ">
                                        @error('saleprice')
                                            <p class="invalid-feedback">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group ">
                                    <label class=" col-form-label ">{{ __('home.qty') }}<span
                                            style="color:#FF0000">*</span></label>
                                    <div class="">
                                        <input type="text" value="{{ old('qty', $product->qty) }}" name="qty"
                                            id="title" class="form-control @error('qty') is-invalid @enderror"
                                            placeholder="{{ __('home.qty') }} ">
                                        @error('qty')
                                            <p class="invalid-feedback">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group ">
                                    <label class=" col-form-label ">{{ __('home.status') }} <span
                                            style="color:#FF0000">*</span></label>
                                    <div class="col-md- col-sm-12">
                                        <label class="kt-radio"><input type="radio" name="status" value="active"
                                                @if (old('status', $product->status) == 'active') checked @endif>
                                            {{ __('dashboard.active') }} <span></span></label>
                                        <label class="kt-radio"><input type="radio" name="status" value="inactive"
                                                @if (old('status', $product->status) == 'inactive') checked @endif>
                                            {{ __('dashboard.inactive') }} <span></span></label>
                                        @error('status')
                                            <p class="invalid-feedback">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="container option">
                            <h5><i class="flaticon-add-circular-button px-2" id="options" style="color: green"></i>this
                                product has multiple options, like different size or colors.</h5>
                            <div class="container">
                                <div class="options py-5" style="display: none">
                                    <a class="btn btn-info" data-toggle="modal" href="#add_new_variant">
                                        <i class="fe fe-pencil"></i> {{ __('home.add_new_variant') }}
                                    </a>
                                    {{-- <div class="form-group row">
                                        <label for="exampleFormControlInput1"
                                            class="col-md-2 col-form-label ">Size</label>
                                        <div class="col-md-8 col-sm-12">
                                            <input type="text" name="size[]" value="" class="form-control tags"
                                                id="size">
                                        </div>

                                    </div>
                                    <div class="form-group row">
                                        <label for="exampleFormControlInput1"
                                            class="col-md-2 col-form-label ">Color</label>
                                        <div class="col-md-8 col-sm-12">
                                            <input type="text" name="color[]" value="" class="form-control tags color"
                                                id="color">
                                        </div>
                                    </div> --}}

                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">size/color</th>
                                                <th scope="col">price</th>
                                                <th scope="col">quantity</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody id="tr">
                                            @foreach ($product->variants()->with('variant_options')->get() as $variant)
                                                <tr>
                                                    <td>{{ implode('/', $variant->variant_options->pluck('value')->toArray()) }}
                                                    </td>
                                                    <td><input type="text"
                                                            name="variant[{{ $variant->id }}][price_variant]"
                                                            id="price" placeholder="price"
                                                            value="{{ $variant->price_variant }}"
                                                            class="form-control price"></td>
                                                    <td><input type="text"
                                                            name="variant[{{ $variant->id }}][quantity_variant]"
                                                            id="price" placeholder="price"
                                                            value="{{ $variant->quantity_variant }}"
                                                            class="form-control price"></td>
                                                    <td class="">
                                                        <form action="#delete_modal" method="post">
                                                            @csrf {{-- {{route('products.destroy',$product->id)}} --}}
                                                            @method('delete')
                                                            <button type="submit"
                                                                style="border-style:none;color: #ff0000;background-color: transparent"><i
                                                                class="far fa-trash-alt"></i>delete</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">{{ __('home.update') }}</button>
                            <a href="{{ route('products.index') }}"
                                class="btn btn-secondary">{{ __('home.cancel') }}</a>
                        </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Add Modal -->
    <div class="modal fade" id="add_new_variant" aria-hidden="true" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('home.add_new_variant') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('add.variant', $product->id) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                <div class="modal-body">
                    <div class="container">
                        <div class="options py-5" style="display: none">
                            <div class="form-group row">
                                <label for="exampleFormControlInput1" class="col-md-2 col-form-label ">Size</label>
                                <div class="col-md-8 col-sm-12">
                                    <input type="text" name="size[]" value=""
                                        class="form-control tags1" id="size1">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleFormControlInput1" class="col-md-2 col-form-label ">Color</label>
                                <div class="col-md-8 col-sm-12">
                                    <input type="text" name="color[]" value=""
                                        class="form-control tags1 color" id="color1">
                                </div>
                            </div>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">size/color</th>
                                        <th scope="col">price</th>
                                        <th scope="col">quantity</th>
                                    </tr>
                                </thead>
                                <tbody id="tr1">
                                    @foreach (old('variant', []) as $key => $variant)
                                        <tr>
                                            <td>{{ $variant['size'] . '/' . $variant['color'] }}
                                                <input type="hidden" name="variant[{{ $key }}][size]"
                                                    value="{{ $variant['size'] }}">
                                                <input type="hidden" name="variant[{{ $key }}][color]"
                                                    value="{{ $variant['color'] }}">
                                            </td>
                                            <td><input type="text" name="variant[{{ $key }}][price_variant]"
                                                    placeholder="price" value="{{ $variant['price_variant'] ?? '' }}"
                                                    class="form-control price"></td>
                                            <td><input type="text"
                                                    name="variant[{{ $key }}][quantity_variant]"
                                                    placeholder="quantity"
                                                    value="{{ $variant['quantity_variant'] ?? '' }}"
                                                    class="form-control quantity"></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">{{ __('home.save') }}</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /Edit Add Modal -->

    {{-- <script src="{{ asset('assets/admin/plugins/ckeditor/ckeditor.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
        CKEDITOR.replace('desc_ar', {
            contentsLangDirection: 'rtl',
            filebrowserUploadUrl: "{{ url('', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form'
        });
        CKEDITOR.replace('desc', {
            contentsLangDirection: 'en',
            filebrowserUploadUrl: "{{ url('', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form'
        });
    </script> --}}
    @push('css')
        <link href="{{ asset('assets/admin/tagify/tagify.css') }}" rel="stylesheet" type="text/css" />
        @livewireStyles
    @endpush
    @push('js')
        <script>
            $("#input-freqd-2").fileinput({
                uploadUrl: "/file-upload-batch/2",
                showUpload: false,
                showRemove: false,
                required: true,
                validateInitialCount: true,
                overwriteInitial: false,
                initialPreviewAsData: true,
                allowedFileExtensions: ["jpg", "png", "gif", "jpeg"]
            });

            $("#input-freqd-1").fileinput({
                uploadUrl: "/file-upload-batch/2",
                showUpload: false,
                showRemove: false,
                required: true,
                validateInitialCount: true,
                overwriteInitial: false,
                initialPreviewAsData: true,
                allowedFileExtensions: ["jpg", "png", "gif", "jpeg"]
            });
        </script>
        <script>
            < script src = "https://code.jquery.com/jquery-3.6.0.min.js"
            integrity = "sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
            crossorigin = "anonymous" >
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.3/js/standalone/selectize.min.js"
                integrity="sha512-pF+DNRwavWMukUv/LyzDyDMn8U2uvqYQdJN0Zvilr6DDo/56xPDZdDoyPDYZRSL4aOKO/FGKXTpzDyQJ8je8Qw=="
                crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.3/js/selectize.min.js"
                integrity="sha512-JiDSvppkBtWM1f9nPRajthdgTCZV3wtyngKUqVHlAs0d5q72n5zpM3QMOLmuNws2vkYmmLn4r1KfnPzgC/73Mw=="
                crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.3/css/selectize.css"
            integrity="sha512-85w5tjZHguXpvARsBrIg9NWdNy5UBK16rAL8VWgnWXK2vMtcRKCBsHWSUbmMu0qHfXW2FVUDiWr6crA+IFdd1A=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.3/css/selectize.bootstrap4.min.css"
            integrity="sha512-MMojOrCQrqLg4Iarid2YMYyZ7pzjPeXKRvhW9nZqLo6kPBBTuvNET9DBVWptAo/Q20Fy11EIHM5ig4WlIrJfQw=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />

        <script src="{{ asset('assets/admin/tagify/jQuery.tagify.min.js') }}" type="text/javascript"></script>
        <script>
            var inputElm = document.querySelector('.tags2'),
                tagify = new Tagify(inputElm);
            $('.tags2').css('height', '100%');
            $('#options').click(function() {
                $('.options').toggle();
            });
        </script>

        <script>
            $(".tags").selectize({
                delimiter: ",",
                persist: false,
                create: function(input) {
                    return {
                        value: input,
                        text: input,
                    };
                },
            });
        </script>
        <script>
            $(".tags1").selectize({
                delimiter: ",",
                persist: false,
                create: function(input) {
                    return {
                        value: input,
                        text: input,
                    };
                },
            });
        </script>
        <script type="module" src="/js/js.cookie.min.js"></script>
        <script type="module">
            // import Cookies from 'js-cookie'
            //  import Cookies from "/js/js.cookie.min.js"

            let cartesian = (...arr) => arr.reduce((a, c) => a.map(e => c.map(f => e.concat([f]))).reduce((a, c) => a.concat(c),
                []), [
                []
            ]);

            $(document).ready(function() {
                // console.log( $("#price").val());
                Cookies.set('foo', $("#price").val())
                $(".tags").on("keyup", function(event) {
                    if (event.which == 13 || event.which == 188 || event.which == 1 || event.which == 8) {
                        console.log(Cookies.get('foo'));
                        var size = $("#size").val();
                        var color = $("#color").val();

                        var sizeArray = size.split(",");
                        var colorArray = color.split(",");


                        let anyarr = cartesian(sizeArray, colorArray)
                        console.log(anyarr);

                        var prevHtml = $("#tr").html();
                        //console.log(prevHtml);

                        var newArray = [0];
                        $("input:text[name=price]").each(function() {
                            newArray.unshift($(this).val());
                        });


                        // console.log( newArray);
                        var tag = $("#tr").text(null);



                        for (var i = 0; i < anyarr.length; i++) {

                            if (size.length > 0 && color.length > 0) {
                                if (newArray.length > 0) {
                                    var priceArr = newArray[i]
                                } else {
                                    priceArr = 0
                                }
                                var str = anyarr[i].toString().replace(',', ' / ')
                                // anyarr = null;
                                tag =
                                    "<tr>" +
                                    "<td>" + str + "</td>" +
                                    "<td class='col-md-3 text-center'><input type='text' name='variant[" + i +
                                    "][price_variant]' id='price' placeholder ='price' value='" + newArray[i] +
                                    "' class='form-control price' ></td>" +
                                    "<td class='col-md-3 text-center'><input type='text'  name='variant[" + i +
                                    "][quantity_variant]' placeholder ='quantity' value='' class='form-control ' ></td>" +
                                    "<td><input type='text' hidden name='variant[" + i +
                                    "][size]' id='price' placeholder ='price' value='" + anyarr[i][0] +
                                    "' class='form-control price col-md-3' ></td>" +
                                    "<td><input type='text' hidden name='variant[" + i +
                                    "][color]' id='price' placeholder ='price' value='" + anyarr[i][1] +
                                    "' class='form-control price col-md-3' ></td>"


                                "</tr>";

                                $("#tr").append(tag);

                            }
                        }
                        console.log($("#tr").html());
                    }
                });
            });
        </script>

        <script type="module">
            // import Cookies from 'js-cookie'
            //  import Cookies from "/js/js.cookie.min.js"

            let cartesian = (...arr) => arr.reduce((a, c) => a.map(e => c.map(f => e.concat([f]))).reduce((a, c) => a.concat(c),
                []), [
                []
            ]);

            $(document).ready(function() {
                // console.log( $("#price").val());
                Cookies.set('foo', $("#price1").val())
                $(".tags1").on("keyup", function(event) {
                    if (event.which == 13 || event.which == 188 || event.which == 1 || event.which == 8) {
                        console.log(Cookies.get('foo'));
                        var size = $("#size1").val();
                        var color = $("#color1").val();

                        var sizeArray = size.split(",");
                        var colorArray = color.split(",");


                        let anyarr = cartesian(sizeArray, colorArray)
                        console.log(anyarr);
                        var prevHtml = $("#tr1").html();
                        //console.log(prevHtml);
                        var newArray = [0];
                        $("input:text[name=price]").each(function() {
                            newArray.unshift($(this).val());
                        });
                        // console.log( newArray);
                        var tag = $("#tr1").text(null);
                        for (var i = 0; i < anyarr.length; i++) {

                            if (size.length > 0 && color.length > 0) {
                                if (newArray.length > 0) {
                                    var priceArr = newArray[i]
                                } else {
                                    priceArr = 0
                                }
                                var str = anyarr[i].toString().replace(',', ' / ')
                                // anyarr = null;
                                tag =
                                    "<tr>" +
                                    "<td>" + str + "</td>" +
                                    "<td class='col-md-3 text-center'><input type='text' name='variant[" + i +
                                    "][price_variant]' id='price1' placeholder ='price' value='" + newArray[i] +
                                    "' class='form-control price' ></td>" +
                                    "<td class='col-md-3 text-center'><input type='text'  name='variant[" + i +
                                    "][quantity_variant]' placeholder ='quantity' value='' class='form-control ' ></td>" +
                                    "<td><input type='text' hidden name='variant[" + i +
                                    "][size]' id='price1' placeholder ='price' value='" + anyarr[i][0] +
                                    "' class='form-control price col-md-3' ></td>" +
                                    "<td><input type='text' hidden name='variant[" + i +
                                    "][color]' id='price1' placeholder ='price' value='" + anyarr[i][1] +
                                    "' class='form-control price col-md-3' ></td>"


                                "</tr>";

                                $("#tr1").append(tag);

                            }
                        }
                        console.log($("#tr1").html());
                    }
                });
            });
        </script>
    @endpush

</x-admin-layout>
