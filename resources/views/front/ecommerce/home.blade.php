<x-ecommerce-layout>
    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="{{route('home')}}"><i class="fa fa-home"></i> {{__('home.home')}}</a>
                        <span>{{__('dashboard.categories')}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->
<!-- Categories Section Begin -->
    <section class="categories">
        <div class="container-fluid">
            <div class="row">
                @foreach ($categories as $category)
                @if($loop->first)
                <div class="col-lg-6 p-0">
                    <div class="categories__item categories__large__item set-bg"
                    data-setbg="{{asset('img/'. $category->image) }}">
                    <div class="categories__text" style="opacity: 0.6;background: #fff;padding: 50px;margin-right:300px;">
                        <h1> {{data_get($category, 'name'.app()->make('db_lang_suffix'))}}</h1>
                        {{-- <p> {{data_get($category, 'desc'.app()->make('db_lang_suffix'))}}</p> --}}
                        <a href="{{ route('products',  $category->name)}}">{{__('home.shop_now')}}</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="row">
                    @else
                    @if($loop->index <= 4)
                    <div class="col-lg-6 col-md-6 col-sm-6 p-0">
                        <div class="categories__item set-bg" data-setbg="{{asset('img/'. $category->image) }}" alt="" width="300px" height="350px"}}>
                            <div class="categories__text" style="opacity: 0.6;background: #fff;padding: 30px;margin-right:115px;margin-left:-20px;">
                                <h4 class='ss'>{{data_get($category, 'name'.app()->make('db_lang_suffix'))}}</h4>
                                <a href="{{ route('products',  $category->name)}}">{{__('home.shop_now')}}</a>
                            </div>
                        </div>
                    </div>
                        @endif
                        @endif
                        @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Categories Section End -->

<!-- Product Section Begin -->
<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4">
                <div class="section-title">
                    <h3>{{__('home.featured_products')}}</h3>
                </div>
            </div>
            <div class="col-lg-8 col-md-8">

                <ul class="filter__controls" @if (app()->getLocale() == 'ar') style="text-align:left;padding-left:5px;"@endif>
                    <li class="active" data-filter="*">{{__('home.all')}}</li>
                    <li class="@if (app()->getLocale() == 'ar') px-5 @endif" data-filter=".new-products">{{__('home.new_products')}}</li>
                    <li data-filter=".best-seller">{{__('home.best_seller')}}</li>
                </ul>
            </div>
        </div>

        <div class="row property__gallery">
            @foreach ($products as $product)
            <div class="col-lg-3 col-md-4 col-sm-6 mix new-products">
                <div class="product__item">
                    <div class="product__item__pic set-bg" data-setbg="{{ asset('img/'. $product->image) }}" class=" " alt="Image">
                        <div class="label new">{{__('home.new')}}</div>
                        <ul class="product__hover">
                            <li><a href="{{ asset('img/'. $product->image) }}" class="image-popup"><span class="arrow_expand"></span></a></li>
                            <li><a href="{{route('product_details',$product->name)}}"><span class="icon_bag_alt"></span></a></li>
                        </ul>
                    </div>
                    <div class="product__item__text">
                        <h6><a href="{{route('product_details',$product->name)}}">{{data_get($product, 'name'.app()->make('db_lang_suffix'))}}</a></h6>
                        <div class="product__price">
                            @if($product->saleprice == null)
                            <h5> ${{$product->price}}</h5>
                            @else
                            <h6>${{ $product->saleprice }} <br><del>${{ $product->price }}</del></h6>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

            @foreach ($products_best_seles as $product)
            <div class="col-lg-3 col-md-6 special-grid mix best-seller">
                <div class="product__item">
                    <div class="product__item__pic set-bg" data-setbg="{{ asset('img/'. $product->image) }}" class=" " alt="Image">
                        <div class="label sale">{{__('home.sale')}}</div>
                        <ul class="product__hover">
                            <li><a href="{{ asset('img/'. $product->image) }}" class="image-popup"><span class="arrow_expand"></span></a></li>
                            <li><a href="{{route('product_details',$product->name)}}"><span class="icon_bag_alt"></span></a></li>
                        </ul>
                    </div>
                    <div class="product__item__text">
                        <h6><a href="{{route('product_details',$product->name)}}">{{data_get($product, 'name'.app()->make('db_lang_suffix'))}}</a></h6>
                        <div class="product__price">
                            @if($product->saleprice == null)
                            <h5> ${{$product->price}}</h5>
                            @else
                            <h6>${{ $product->saleprice }} <br><del>${{ $product->price }}</del></h6>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Product Section End -->
</x-ecommerce-layout>
