
    <x-ecommerce1-layout>
    <!-- Start Categories  -->
    <div class="categories-shop">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-all text-center">
                        <h1>{{__('dashboard.categories')}}</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($categories as $category)
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <a href="{{ route('products',$category->name)}}">

                    <div class="shop-cat-box">
                       <img class="" src="{{ asset('img/'. $category->image) }}" alt="" width="300px" height="350px">

                       <h3 class="btn hvr-hover w-100" width="" href="{{ route('products',$category->name)}}">
                            {{data_get($category, 'name'.app()->make('db_lang_suffix'))}}</h3>
                    </div>
</a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- End Categories -->

    <!-- Start Products  -->
    <div class="products-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-all text-center">
                        <h1>{{__('home.featured_products')}}</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="special-menu text-center">
                        <div class="button-group filter-button-group">
                            <button class="active" data-filter="*">{{__('home.all')}}</button>
                            <button data-filter=".new-products">{{__('home.new_products')}}</button>
                            <button data-filter=".best-seller">{{__('home.best_seller')}}</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row special-list">
                @foreach ($products as $product)
                <div class="col-lg-3 col-md-6 special-grid new-products">

                    <div class="products-single fix">
                        <div class="box-img-hover">
                            <div class="type-lb">
                                <p class="new">{{__('home.new')}}</p>
                            </div>
                             <a href="{{route('product_details',$product->name)}}"><img src="{{ asset('img/'. $product->image) }}" class="img-fluid" alt="Image"></a>
                        </div>
                        <div class="why-text">
                            <a href="{{route('product_details',$product->name)}}"><h4 class="text-center">{{data_get($product, 'name'.app()->make('db_lang_suffix'))}}</h4></a>
                            @if($product->saleprice == null)
                            <h5 class="text-center"> ${{$product->price}}</h5>
                            @else
                            <h5 class="text-center">${{ $product->saleprice }} <br> <del>${{ $product->price }}</del></h5>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach

                @foreach ($products_best_seles as $product)
                <div class="col-lg-3 col-md-6 special-grid best-seller">
                    <div class="products-single fix">
                        <div class="box-img-hover">
                            <div class="type-lb">
                                <p class="sale">{{__('home.sale')}}</p>
                            </div>
                            <a href="{{route('product_details',$product->name)}}"><img src="{{ asset('img/'. $product->image) }}" class="img-fluid" alt="Image"></a>
                        </div>
                        <div class="why-text">
                            <a href="{{route('product_details',$product->name)}}"><h4 class="text-center">{{data_get($product, 'name'.app()->make('db_lang_suffix'))}}</h4></a>
                            <h5 class="text-center">
                                @if($product->saleprice == null)
                            <h5> ${{$product->price}}</h5>
                            @else
                            <h5 class="text-center">${{ $product->saleprice }}  <br>  <del>${{ $product->price }}</del></h5>
                            @endif
                            </h5>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- End Products  -->

    <!-- Start Blog  -->

    <!-- End Blog  -->
</x-ecommerce1-layout>

