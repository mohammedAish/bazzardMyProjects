<x-ecommerce-layout>
 <!-- Breadcrumb Begin -->
 <div class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__links">
                    <a href="{{route('home')}}"><i class="fa fa-home"></i> {{__('home.home')}}</a>
                    <span>{{__('home.about_us')}}</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->
<!-- Start About Page  -->
<div class="about-box-main">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
            <h2 class="noo-sh-title">{{data_get($page, 'intro'.app()->make('db_lang_suffix'))}}</h2>
           
                <br>
                <span>  {!!data_get($page, 'desc'.app()->make('db_lang_suffix'))!!}</span>
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

</x-ecommerce-layout>
