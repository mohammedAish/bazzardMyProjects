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

    <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor mt-5 pt-5" id="kt_content">
        <div class="kt-portlet">

            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title ">
                        {{ __('home.add_new_product') }}
                    </h3>
                </div>
            </div>
            <div class="container p-5">
                <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group ">
                                <label class=" col-form-label ">{{ __('home.name') }} <span
                                        style="color:#FF0000">*</span></label>
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
                                <label class=" col-form-label "> الإسم بالعربي <span
                                        style="color:#FF0000">*</span></label>
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
                                <label class=" col-form-label ">{{ __('home.intro') }}</label>
                                <div class="">
                                    <input type="text" value="{{ old('intro') }}" name="intro" id="title"
                                        class="form-control @error('intro') is-invalid @enderror" placeholder=" ">
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
                                    <input type="text" value="{{ old('intro_ar') }}" name="intro_ar" id="title"
                                        class="form-control @error('intro_ar') is-invalid @enderror">
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
                                        rows="10" style="resize: none;">{!! old('desc') !!}</textarea>
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
                                        rows="10" style="resize: none;">{!! old('desc_ar') !!}</textarea>
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
                                <label class=" col-form-label ">{{ __('dashboard.image') }} <span
                                        style="color:#FF0000">*</span></label>
                                <div class="col-md- col-sm-12 file-loading">
                                    <input id="input-freqd-1" name="image"
                                        class="form-control  @error('image')is-invalid @enderror"  type="file"
                                        accept="image/*">
                                    @error('image')
                                        <p class="invalid-feedback">{{ $message }}</p>
                                    @enderror
                                </div>
                                <hr>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group ">
                                <label class=" col-form-label ">{{ __('home.gallery') }} </label>
                                <div class="col-md- col-sm-12 file-loading">
                                    <input id="input-freqd-2" name="gallery[]"
                                        class="form-control  @error('gallery')is-invalid @enderror" multiple type="file"
                                        accept="image/*">
                                    @error('gallery')
                                        <p class="invalid-feedback">{{ $message }}</p>
                                    @enderror
                                </div>
                                <hr>
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
                                            <option value="{{ $parent->id }}" @if ($parent->id == old('category_id')) selected @endif>
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
                                    <textarea name="tags" value="" class="tags2  @error('tags') is-invalid @enderror">
                                        {{ old('tags') }}
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
                                    <input type="text" value="{{ old('price') }}" name="price" id="title"
                                        class="form-control @error('price') is-invalid @enderror"
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
                                    <input type="text" value="{{ old('saleprice') }}" name="saleprice" id="saleprice"
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
                                    <input type="text" value="{{ old('qty') }}" name="qty" id="title"
                                        class="form-control @error('qty') is-invalid @enderror"
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
                                            @if (old('status') == 'active') checked @endif>
                                        {{ __('dashboard.active') }} <span></span></label>
                                    <label class="kt-radio"><input type="radio" name="status" value="inactive"
                                            @if (old('status') == 'inactive') checked @endif>
                                        {{ __('dashboard.inactive') }} <span></span></label>
                                    @error('status')
                                        <p class="invalid-feedback">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        {{-- <div class="file-loading">
                        <input id="input-freqd-3" name="gallery[]" multiple type="file" accept="image/*">
                    </div>
                    <hr>
                    <div class="text-center">
                        <button type="submit" class="btn btn-lg btn-success btn-submit"><i class="fa fa-upload"></i> Submit</button>
                        <button type="reset" class="btn btn-lg btn-secondary btn-reset"><i class="fa fa-refresh"></i> Reset</button>
                    </div> --}}
                    </div>
                    <div class="container option">
                        <h5><i class="flaticon-add-circular-button px-2" id="options" style="color: green"></i>this
                            product has multiple options, like different size or colors.</h4>
                            <div class="container">
                                <div class="options py-5" style="display: none">
                                    <div class="form-group row">
                                        <label for="exampleFormControlInput1"
                                            class="col-md-2 col-form-label ">Size</label>
                                        <div class="col-md-8 col-sm-12">
                                            <input type="text" name="size[]"
                                                value="{{ implode(',', old('size', [])) }}"
                                                class="form-control tags" id="size">
                                        </div>

                                    </div>
                                    <div class="form-group row">
                                        <label for="exampleFormControlInput1"
                                            class="col-md-2 col-form-label ">Color</label>
                                        <div class="col-md-8 col-sm-12">
                                            <input type="text" name="color[]"
                                                value="{{ implode(',', old('color', [])) }}"
                                                class="form-control tags color" id="color">
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
                                        <tbody id="tr">
                                            @foreach (old('variant', []) as $key => $variant)
                                                <tr>
                                                    <td>{{ $variant['size'] . '/' . $variant['color'] }}
                                                        <input type="hidden" name="variant[{{ $key }}][size]"
                                                            value="{{ $variant['size'] }}">
                                                        <input type="hidden" name="variant[{{ $key }}][color]"
                                                            value="{{ $variant['color'] }}">
                                                    </td>
                                                    <td><input type="text"
                                                            name="variant[{{ $key }}][price_variant]"
                                                            placeholder="price"
                                                            value="{{ $variant['price_variant'] ?? '' }}"
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

                    <div class="form-group mt-5">
                        <button type="submit" class="btn btn-success">{{ __('home.save') }}</button>
                        <a href="{{ route('products.index') }}"
                            class="btn btn-secondary">{{ __('home.cancel') }}</a>
                    </div>
                </form>
            </div>
        </div>
    </div>




    @push('css')
        <link href="{{ asset('assets/admin/tagify/tagify.css') }}" rel="stylesheet" type="text/css" />

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
                validateInitialCount: 1,
                overwriteInitial: false,
                initialPreviewAsData: true,
                allowedFileExtensions: ["jpg", "png", "gif", "jpeg"]
            });
        </script>
        <script src="{{ asset('assets/admin/plugins/custom/ckeditor/ckeditor-document.bundle.js') }}" type="text/javascript">
        </script>

        <script src="{{ asset('assets/admin/js/pages/crud/forms/editors/ckeditor-document.js') }}" type="text/javascript">
        </script>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"
                integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous">
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
    @endpush

</x-admin-layout>
