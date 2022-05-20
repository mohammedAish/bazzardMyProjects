<x-admin-layout title="Roles">
@if (app()->getLocale() == 'ar')
<link rel="stylesheet" href="{{ asset('assets/css/style_ar.css') }}">
@else
<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
@endif
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
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
        <form action="{{ route('themes_store') }}" method="post">
            @csrf
            <div>
                <h3>{{__('home.ecommerce_style')}} :</h3>
                <hr>
                <br>
            </div>

       <div class="row">

        <div class="box col-md-4 col-sm-6">
            <input type="radio" class="input-hidden" id="ck2c"
            name="theme" value="ecommerce" @if($store->theme == 'ecommerce') checked @endif>
            <div
                class="boxx custom-control custom-radio image-checkbox" style="border-style:groove">
                <label class="custom-control-label" for="ck2c">
                    <img src="{{ asset('assets/images/theme1.png') }}"
                        alt="#" class="img-fluid mx-2" style="height: 165px;">
                </label>
                <h3 class="text-center">theme 1</h3>
            </div>
        </div>

        <div class="box col-md-4 col-sm-6">
            <input type="radio" class="input-hidden" id="ck2"
            name="theme" value="ecommerce1" @if($store->theme == 'ecommerce1') checked @endif>
            <div
                class="boxx custom-control custom-radio image-checkbox" style="border-style:groove">
                <label class="custom-control-label" for="ck2">
                    <img src="{{ asset('assets/images/theme1.png') }}"
                        alt="#" class="img-fluid mx-2" style="height: 165px;">
                </label>
                <h3 class="text-center">theme 2</h3>
            </div>
        </div>
       </div>
            <div class="d-flex palette mt-5">
                <label class="mr-5">{{__('home.button_color')}} :</label>
                <input id="color-picker" name="main_color" value="{{$store->setting[$store->theme]['main_color']}}" />
                <i class="fas fa-palette"></i>
            </div>
            <div class="d-flex palette mt-5">
                <label class="mr-5">{{__('home.font_color_for_button')}} :</label>
                <input id="color-picker1" name="hover_color" value=" {{$store->setting[$store->theme]['hover_color'] }} " />
                <i class="fas fa-palette"></i>
            </div>
            <div class="d-flex palette mt-5">
                <label class="mr-5">{{__('home.hover_color_for_button')}} :</label>
                <input id="color-picker2" name="font_color" value="{{$store->setting[$store->theme]['font_color'] }}" />
                <i class="fas fa-palette"></i>
            </div>
            <div class="mt-5">
            <button type="submit" class="btn btn-success ">{{ __('home.save') }}</button>
            <a href="{{ route('mystores', $store->slug) }}" class="btn btn-secondary">{{ __('home.cancel') }}</a>
            </div>
        </form>

    </div>
    @push('js')
        <script type="text/javascript">
            $('#color-picker').spectrum({
                type: "component"
            });
        </script>

        <script type="text/javascript">
            $('#color-picker1').spectrum({
                type: "component"
            });
        </script>
         <script type="text/javascript">
            $('#color-picker2').spectrum({
                type: "component"
            });
        </script>
    @endpush

</x-admin-layout>
