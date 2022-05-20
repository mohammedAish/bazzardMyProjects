<x-admin-layout>
    <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor mt-5 pt-5" id="kt_content">
        <div class="kt-portlet">

            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title ">
                        {{ __('home.update')." ".$page->key_page ." ". __('home.page').':'}}
                    </h3>
                </div>
            </div>
            <div class="container p-5">
                <form action="{{route('page.store',$page->key_page)}}" method="post" enctype="multipart/form-data">
                    @csrf
                 <!--    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group ">
                                <label class=" col-form-label ">{{ __('home.intro') }}</label>
                                <div class="">
                                    <input type="text" value="{{ old('intro',$page_detailes->intro  ?? ' ') }}" name="intro" id="title"
                                                                
                                        class="form-control @error('intro') is-invalid @enderror" placeholder=" ">
                                    @error('intro')
                                        <p class="invalid-feedback">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group ">
                                <label class=" col-form-label ">مقدمة </label>
                                <div class="col-md- col-sm-12">
                                    <input type="text" value="{{ old('intro_ar',$page_detailes->intro_ar  ?? ' ') }}" name="intro_ar" id="title"
                                        class="form-control @error('intro_ar') is-invalid @enderror">
                                    @error('intro_ar')
                                        <p class="invalid-feedback">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div> -->

                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group ">
                                <label class=" col-form-label ">{{ __('home.desc') }}</label>
                                <div class="">
                                    <textarea name="desc" class="form-control @error('desc') is-invalid @enderror md-input" data-provide="markdown"
                                        rows="10" style="resize: none;">{!! $page_detailes->desc   ?? ' ' !!}</textarea>
                                    @error('desc')
                                        <p class="invalid-feedback">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group ">
                                <label class=" col-form-label ">التفاصيل </label>
                                <div class="col-md- col-sm-12">
                                    <textarea name="desc_ar" class="form-control  @error('desc_ar') is-invalid @enderror md-input" data-provide="markdown"
                                        rows="10" style="resize: none;">{!! $page_detailes->desc_ar   ?? ' ' !!}</textarea>
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
                                <label class=" col-form-label ">{{ __('dashboard.image') }}</label>
                                <div class="">
                                    <input type="file" name="image" class="form-control  @error('image')is-invalid @enderror">
                                    @error('image')
                                        <p class="invalid-feedback fs-3">{{ $message }}</p>
                                    @enderror
                                </div>
                                @if($page_detailes->image)
                                <img src="{{ asset('img/' . $page_detailes->image) }}"
                                            ="80px" width="80px">
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group ">
                                <label class=" col-form-label ">{{ __('home.status') }}</label>
                                <div class="col-md- col-sm-12">
                                    <label class="kt-radio"><input type="radio" name="status" value="active" @if (old('status',$page_detailes->status  ??'') == 'active') checked @endif>
                                        {{ __('dashboard.active') }} <span></span></label>
                                    <label class="kt-radio"><input type="radio" name="status" value="inactive" @if (old('status',$page_detailes->status  ?? '') == 'inactive') checked @endif>
                                        {{ __('dashboard.inactive') }} <span></span></label>
                                        @error('status')
                                        <p class="invalid-feedback">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- @endforeach --}}
                    <div class="form-group mt-5">
                        <button type="submit" class="btn btn-success">{{ __('home.save') }}</button>
                        <a href="{{ route('pages.index') }}"
                            class="btn btn-secondary">{{ __('home.cancel') }}</a>
                    </div>
                </form>
            </div>
        </div>
    </div>


<script src="{{ asset('assets/admin/js/pages/crud/forms/editors/ckeditor-document.js') }}" type="text/javascript"></script>
<!--     <script src="{{asset('assets/admin/plugins/ckeditor/ckeditor.js')}}" type="text/javascript"></script>
 --><!-- <script type="text/javascript">
     
CKEDITOR.replace('desc_ar', {
    contentsLangDirection: 'rtl',
    filebrowserUploadUrl: "{{url('', ['_token' => csrf_token() ])}}",
    filebrowserUploadMethod: 'form'
});
CKEDITOR.replace('desc', {
    contentsLangDirection: 'en',
    filebrowserUploadUrl: "{{url('', ['_token' => csrf_token() ])}}",
    filebrowserUploadMethod: 'form'
});
</script> -->
@push('css')
<link href="{{ asset('assets/admin/tagify/tagify.css') }}" rel="stylesheet" type="text/css" />
@livewireStyles
@endpush
@push('js')
<script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
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

        tagify = new Tagify (inputElm);
        $('.tags2').css('height','100%');

        $('#options').click(function (){
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

    let cartesian = (...arr) => arr.reduce((a, c) => a.map(e => c.map(f => e.concat([f]))).reduce((a, c) => a.concat(c),[]), [[]]);

    $(document).ready(function() {
     // console.log( $("#price").val());
      Cookies.set('foo', $("#price").val())
        $(".tags").on("keyup", function(event) {
          if(event.which == 13 || event.which == 188 || event.which == 1 || event.which == 8){
          console.log( Cookies.get('foo'));
            var size = $("#size").val();
            var color = $("#color").val();

            var sizeArray = size.split(",");
            var colorArray = color.split(",");


            let anyarr = cartesian(sizeArray, colorArray)
            console.log(anyarr);

           var prevHtml = $("#tr").html();
           //console.log(prevHtml);

           var newArray = [0];
              $("input:text[name=price]").each(function(){
                  newArray.unshift($(this).val());
              });


          // console.log( newArray);
           var tag = $("#tr").text(null);



            for (var i = 0; i < anyarr.length; i++) {

                if(size.length > 0 && color.length > 0)
          {
            if(newArray.length > 0)
            {
              var priceArr = newArray[i]
            }
             else
             {
                 priceArr = 0
             }
             var str =  anyarr[i].toString().replace(',',' / ')
                // anyarr = null;
                tag =
                "<tr>" +
                  "<td>" + str + "</td>" +
                    "<td class='col-md-3 text-center'><input type='text' name='variant["+i+"][price_variant]' id='price' placeholder ='price' value='" +  newArray[i] +"' class='form-control price' ></td>" +
                    "<td class='col-md-3 text-center'><input type='text'  name='variant["+i+"][price_quantitiy]' placeholder ='quantity' value='' class='form-control ' ></td>" +
                    "<td><input type='text' hidden name='variant["+i+"][size]' id='price' placeholder ='price' value='" +  anyarr[i][0] +"' class='form-control price col-md-3' ></td>" +
                    "<td><input type='text' hidden name='variant["+i+"][color]' id='price' placeholder ='price' value='" +  anyarr[i][1] +"' class='form-control price col-md-3' ></td>"


                "</tr>";

                $("#tr").append(tag);

            }
          }
          console.log( $("#tr").html());
          }
        });
    });

</script>
@endpush

</x-admin-layout>
