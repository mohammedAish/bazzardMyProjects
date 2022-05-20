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
                    <h2>{{ __('home.shop') }}</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">{{ __('home.shop') }}</a></li>
                        <li class="breadcrumb-item active">{{ __('home.product_details') }} </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Shop Detail  -->
    <div class="shop-detail-box-main">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-5 col-md-6">
                    <div id="carousel-example-1" class="single-product-slider carousel slide" data-ride="carousel">
                        <div class="carousel-inner" role="listbox">
                            @foreach ($product->images as $photo)
                                @if ($loop->first)
                                    <div class="carousel-item active"> <img class="d-block w-100"
                                            src="{{ asset('img/' . $photo->image_path) }}" alt="First slide"> </div>
                                @else
                                    <div class="carousel-item"> <img class="d-block w-100"
                                            src="{{ asset('img/' . $photo->image_path) }}" alt="First slide"> </div>
                                @endif
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#carousel-example-1" role="button" data-slide="prev">
                            <i class="fa fa-angle-left" aria-hidden="true"></i>
                            <span class="sr-only">{{ __('home.prev') }}</span>
                        </a>
                        <a class="carousel-control-next" href="#carousel-example-1" role="button" data-slide="next">
                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                            <span class="sr-only">{{ __('home.next') }}</span>
                        </a>
                        <ol class="carousel-indicators ">
                            @foreach ($product->images as $photo)
                                <li data-target="#carousel-example-1" data-slide-to="0" class="active">
                                    <img class="d-block w-100 img-fluid" src="{{ asset('img/' . $photo->image_path) }}"
                                        alt="" />
                                </li>
                            @endforeach
                        </ol>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-7 col-md-6">
                    <div class="single-product-details">
                        <h2>{{data_get($product, 'name'.app()->make('db_lang_suffix'))}}</h2>
                      @if($product->saleprice == null)
                      <h4>${{ $product->price }}</h4>

                        @else
                        <h5>${{ $product->saleprice }}    <del>${{ $product->price }}</del></h5>

                        @endif
                        <h4>{!! $product->desc !!}</h4>

                        <p>{!! data_get($product, 'desc'.app()->make('db_lang_suffix')) !!} </p>
                        <form method="post" id="form_cart">
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            @csrf
                            <ul>
                                @if($size_count != 0)
                                <li>
                                    <div class="form-group size-st">
                                        <label class="size-label">{{ __('home.size') }}</label>
                                        <select product="{{ $product->id }}" id="size" name="size"
                                            class="selectpicker show-tick form-control">
                                            <option value="0">{{ __('home.size') }}</option>
                                            @foreach ($size as $value)
                                                <option data-url="{{route('products_detail_color',[$product->id,$value->value])}}" value="{{ $value->value }}">{{ $value->value }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </li>
                                <li>
                                    <div class="form-group size-st">
                                        <label class="size-label">{{ __('home.color') }}</label>
                                        <select id="color" name="color" class=" form-control">
                                            <option value="0">{{ __('home.color') }}</option>
                                        </select>
                                    </div>
                                </li>
                                @endif
                                <li>
                                    <div class="form-group quantity-box">
                                        <label class="control-label">{{ __('home.qty') }}</label>
                                        <input class="form-control" name="quantity" value="1" min="1" max="20"
                                            type="number">
                                    </div>
                                </li>
                            </ul>
                            <div class="price-box-bar">
                                <div class="cart-and-bay-btn d-flex">
                                    <button id="add_cart" type="submit" class="btn hvr-hover pd-cart"
                                        style="color: #fff;">{{ __('home.add_to_cart') }}</button>
                                    <div id="msg_success" class="mx-4 alert alert-success" role="alert"
                                        style="display: none">
                                        {{ __('home.added_successfully') }}
                                    </div>
                                </div>
                            </div>
                            <div id="msg_error" class="alert alert-danger " style="display:none;"></div>
                        </form>

                        {{-- <div class="add-to-btn">
                            <div class="add-comp">
                                <a class="btn hvr-hover" href="#"><i class="fas fa-heart"></i>
                                    {{ __('home.add_to_wishlist') }}</a>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Cart -->
    @push('js')
        <script type="text/javascript">
            $("#size").on('change', function() {
                $('#color').html('');
                url=$('#size').find(":selected").data('url')
                $.ajax({
                    url: url,
                    type: 'GET',
                    dataType: "json",
                    success: function(data) {
                        for (d in data) {
                            val = data[d]['value']
                            $('#color').append("<option value='" + val + "'>" + val + "</option>")
                        }
                    }
                });
            });
        </script>
        <script>
            $('#add_cart').on('click', function(e) {
                e.preventDefault();
                //var formData = new FormData($('#form_cart')[0]);
                $.ajax({
                    method: 'post',
                    url: "{{route('cart.store')}}",
                    data: $('#form_cart').serialize(),
                    success: function(data) {
                        if (data.status == true) {
                            $('#msg_success').show();
                            $("#count_cart").text(function() {
                                return (1 + Number($("#count_cart").text()));
                            });
                        } else if (data.status == 'update') {
                            $('#msg_success').show();
                        }
                    },
                    error: function(reject) {
                       var errorsArray = reject.responseJSON.errors.quantity;
                       console.log(errorsArray.length);
                        $('#msg_error').show();
                       for(var i = 0; errorsArray.length  > i ; i++){
                        $('#msg_error').append("<li><strong>"+ errorsArray[i]+"</strong></li>");
                       }

                    }
                });
            });
        </script>
    @endpush
</x-ecommerce1-layout>
