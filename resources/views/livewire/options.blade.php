<div class="options" style="display: none">
    <h4 class="py-3" style="text-decoration: under">options</h4>
    <div class="options1">
     <div class="form-group row">
         <label class="col-12 col-form-label ">options 1</label>
         <div class="col-md-4 col-sm-12">
             <input type="text"  wire:model="name" id="title"
                 class="form-control @error('qty') is-invalid @enderror"
                 >  {{ $name }}
         </div>
         <div class="col-md-8 col-sm-12">
             <input   value="{{ old('tags') }}" class="tags2  @error('tags') is-invalid @enderror" >

         </div>
     </div>
    </div>
    <div class="options2">
        <div class="form-group row">
            <label class="col-12 col-form-label ">options 2</label>
            <div class="col-md-4 col-sm-12">
                <input type="text" value="size" name="" id="title"
                    class="form-control @error('qty') is-invalid @enderror"
                    placeholder="{{ __('home.qty') }} ">
            </div>
            <div class="col-md-8 col-sm-12">
                <input   name="size" value="{{ old('tags') }}" class="tags3  @error('tags') is-invalid @enderror" >

            </div>
        </div>
       </div>


</div>

@push('css')
<link href="{{ asset('assets/admin/tagify/tagify.css') }}" rel="stylesheet" type="text/css" />
@endpush
@push('js')
<script src="{{ asset('assets/admin/tagify/jQuery.tagify.min.js') }}" type="text/javascript"></script>
<script>
    var inputElm = document.querySelector('.tags2'),

        tagify = new Tagify (inputElm);
        $('.tags2').css('height','100%');

        var inputElm = document.querySelector('.tags3'),

tagify = new Tagify (inputElm);
$('.tags3').css('height','100%');

    </script>
@endpush
