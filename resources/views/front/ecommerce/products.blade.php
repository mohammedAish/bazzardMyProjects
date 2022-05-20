<x-ecommerce-layout>
    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="{{route('home')}}"><i class="fa fa-home"></i> @lang('home.home')</a>
                        <span>{{__('home.products')}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Shop Section Begin -->
    <section class="shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <div class="shop__sidebar">
                        <div class="sidebar__categories">
                            <div class="section-title">
                                <h4>{{__('home.products')}}</h4>
                            </div>
                            <div class="categories__accordion">
                                <div class="accordion" id="accordionExample">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-9">
                    <div class="row">
                        @foreach ($products as $product)
                        <div class="col-lg-4 col-md-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="{{ asset('img/'. $product->image) }}">
                                    <div class="label new">New</div>
                                    <ul class="product__hover">
                                        <li><a href="{{ asset('img/'. $product->image) }}" class="image-popup"><span class="arrow_expand"></span></a></li>
                                        {{-- <li><a href="#"><span class="icon_heart_alt"></span></a></li> --}}
                                        <li><a href=" {{route('product_details',$product->name)}}"><span class="icon_bag_alt"></span></a></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6><a href=" {{route('product_details',$product->name)}}">{{data_get($product, 'name'.app()->make('db_lang_suffix'))}}</a></h6>

                                   {{--  <div class="rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div> --}}
                                    <div class="product__price">
                                        @if ($product->saleprice == null)
                                        <h5> ${{ $product->price }}</h5>
                                        @else
                                        <h6>${{ $product->saleprice }} <br><del>${{ $product->price }}</del>
                                        </h6>
                                    @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach


                        {{-- <div class="col-lg-12 text-center">
                            <div class="pagination__option">
                                <a href="#">1</a>
                                <a href="#">2</a>
                                <a href="#">3</a>
                                <a href="#"><i class="fa fa-angle-right"></i></a>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Section End -->
</x-ecommerce-layout>
