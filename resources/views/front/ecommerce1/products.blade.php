<x-ecommerce1-layout>
        <!-- Start Top Search -->
        <div class="top-search">
            <div class="container">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-search"></i></span>
                    <input type="text" class="form-control" placeholder="Search">
                    <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
                </div>
            </div>
        </div>
        <!-- End Top Search -->

        <!-- Start All Title Box -->
        <div class="all-title-box">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h2>{{__('home.shop')}}</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">{{__('home.home')}}</a></li>
                            <li class="breadcrumb-item active">{{__('home.products')}}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- End All Title Box -->

        <!-- Start Shop Page  -->
        <div class="shop-box-inner">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-sm-12 col-xs-12 sidebar-shop-left">
                        <div class="product-categori">
                            <div class="filter-sidebar-left">
                                <div class="title-left">
                                    <h3>{{__('home.products')}}</h3>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-9 col-lg-9 col-sm-12 col-xs-12 shop-content-right">
                        <div class="right-product-box">
                            <div class="row product-categorie-box">
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade show active" id="grid-view">
                                        <div class="row">
                                            @foreach ($products as $product)
                                            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                                <div class="products-single fix">
                                                    <div class="box-img-hover">
                                                        <div class="type-lb">
                                                        </div>
                                                        <a href="{{route('product_details',$product->name)}}"><img src="{{ asset('img/'. $product->image) }}" class="" width="300px"  height="250px" alt="Image"></a>
                                                        <div class="">
                                                            <ul>
                                                                {{--<li><a href="{{route('product_details',$product->name)}}" data-toggle="tooltip" data-placement="right" title="{{__('home.view')}}"><i class="fas fa-eye"></i></a></li>--}}
                                                                {{-- <li><a href="#" data-toggle="tooltip" data-placement="right" title="{{__('home.add_to_wishlist')}}"><i class="far fa-heart"></i></a></li> --}}
                                                            </ul>
                                                            {{-- <a class="cart" href="#">{{__('home.add_to_cart')}}</a> --}}
                                                        </div>
                                                    </div>
                                                    <div class="why-text">
                                                        <a href="{{route('product_details',$product->name)}}">
                                                            <h4 class="text-center">{{data_get($product, 'name'.app()->make('db_lang_suffix'))}}</h4>
                                                        </a>
                                                        @if($product->saleprice == null)
                                                        <h5 class="text-center"> ${{$product->price}}</h5>
                                                        @else
                                                        <h5 class="text-center">${{ $product->saleprice }}    <del>${{ $product->price }}</del></h5>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Shop Page -->
</x-ecommerce1-layout>
