<x-ecommerce1-layout>
<!-- Start All Title Box -->
<div class="all-title-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>{{__('home.about_us')}}</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">{{__('home.home')}}</a></li>
                    <li class="breadcrumb-item active">{{__('home.about_us')}}</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End All Title Box -->

<!-- Start About Page  -->
<div class="about-box-main">
    <div class="container">
        <div class="row">
            @if (app()->getLocale() == 'ar')
            <div class="col-lg-6 text-right">
            @else
            <div class="col-lg-6 text-left">
                @endif
                <h2 class="noo-sh-title">{{data_get($page, 'intro'.app()->make('db_lang_suffix'))}}</h2>
             {!!data_get($page, 'desc'.app()->make('db_lang_suffix'))!!}
            </div>

            <div class="contact__map">
                @if($page->image)
                <img src="{{asset('img/'.$page->image)}}" width="500" height="700">
                @else
                <img src="{{asset('assets/images/home_2.gif')}}" width="500" height="500">
                @endif
        </div>
        </div>


    </div>
</div>
<!-- End About Page -->

</x-ecommerce1-layout>
