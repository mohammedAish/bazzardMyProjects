<x-ecommerce-layout>
    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="{{route('home')}}"><i class="fa fa-home"></i> {{ __('home.home') }}</a>
                        <a href="#">{{ $product->name }} </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Product Details Section Begin -->
    <section class="product-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="product__details__pic">
                        <div class="product__details__pic__left product__thumb nice-scroll">
                            @foreach ($product->images as $photo)
                                <a class="pt" href="#">
                                    <img src="{{ asset('img/' . $photo->image_path) }}" alt="">
                                </a>
                            @endforeach
                        </div>
                        <div class="product__details__slider__content">
                            <div class="product__details__pic__slider owl-carousel">
                                @foreach ($product->images as $photo)
                                    <img data-hash="product-1" class="product__big__img"
                                        src="{{ asset('img/' . $photo->image_path) }}" alt="">
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="product__details__text">
                    <h3>{{data_get($product, 'name'.app()->make('db_lang_suffix'))}}</h3>
                        @if($product->saleprice == null)
                        <div class="product__details__price">{{ $product->price }} <span></span></div>
                        @else
                        <div>${{ $product->saleprice }}    <del>${{ $product->price }}</del></div>

                        @endif

                        <p>{!! data_get($product, 'desc'.app()->make('db_lang_suffix')) !!} </p>

                         <form method="post" id="form_cart">
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            @csrf
                            <div class="product__details__widget">
                                <ul>
                                @if($size_count != 0)
                                    <li>
                                        <span>Available size:</span>
                                        <div class="form-group size-st">
                                            <select product="{{ $product->id }}" id="size" name="size"
                                                class="selectpicker show-tick form-control">
                                                <option value="0">{{ __('home.size') }}</option>
                                                @foreach ($size as $value)
                                                    <option data-url="{{route('products_detail_color',[$product->id,$value->value])}}" value="{{ $value->value }}">{{ $value->value }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </li>
                                    <li>
                                        <span>Available color:</span>
                                        <div class="form-group size-st">
                                            <select id="color" name="color" class="form-control">
                                                <option value="0">{{ __('home.color') }}</option>
                                            </select>
                                        </div>
                                    </li>
                                    @endif
                                    <li>
                                        <div class="product__details__button pt-3">
                                            <div class="quantity">
                                                <span>{{ __('home.qty') }}:</span>
                                                <div class="pro-qty">
                                                    <input type="text" name="quantity" value="1" min="1" max="20">
                                                </div>
                                                <div id="msg_error" class="alert alert-danger " style="display:none;"></div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                                <div class="price-box-bar">
                                    <div class="cart-and-bay-btn d-flex">
                                        <button id="add_cart" type="submit" class="btn btn-primary"> <span
                                                class="icon_bag_alt"></span> {{ __('home.add_to_cart') }}</button>
                                        <div id="msg_success" class="mx-4 alert alert-success" role="alert"
                                            style="display: none">
                                            {{ __('home.added_successfully') }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </section>
    <!-- Product Details Section End -->
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
</x-ecommerce-layout>
