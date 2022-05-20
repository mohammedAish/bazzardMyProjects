<x-ecommerce-layout>
    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="{{route('home')}}"><i class="fa fa-home"></i> {{__('home.home')}}</a>
                        <span>{{__('home.shopping_cart')}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Shop Cart Section Begin -->
    <section class="shop-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shop__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th>{{__('dashboard.image')}}</th>
                                    <th>{{__('home.product_name')}}</th>
                                    <th>{{__('home.price')}}</th>
                                    <th>{{__('home.qty')}}</th>
                                    <th>{{__('home.total')}}</th>
                                    <th>{{__('home.delete')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cart as $item)
                                <tr>
                                    <td class="cart__product__img">
                                        <img src="{{ asset('img/'. $item->products->image) }}" alt="" width="150" height="200">

                                    </td>
                                    <td class="cart__product__name">
                                            <h6>{{$item->products->name}}</h6>
                                    </td>
                                    <td class="cart__price">
                                        @if($item->products->saleprice == null)
                                        <p>$ {{$item->products->price}}</p>
                                        @else
                                        <p>$ {{$item->products->saleprice}}</p>
                                        @endif
                                    </td>

                                    <td class="cart__quantity">
                                            <div>{{$item->quantity}}</div>
                                    </td>
                                    <td class="cart__total">
                                    @if($item->products->saleprice == null)
                                        <p>$ {{$item->products->price * $item->quantity}}</p>
                                        @else
                                        <p>$ {{$item->products->saleprice * $item->quantity}}</p>
                                        @endif
                                    </td>
                                    {{-- <td class="cart__close"><span class="icon_close"></span></td> --}}
                                    <td class="cart__close">
                                        <form action="{{route('cart.destroy',$item->id)}}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" style="border-style:none;color: #5867dd;background-color: transparent"><span class="icon_close"></span></button>
                                        </form>

                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                </div>
                <div class="col-lg-4 offset-lg-2">
                    <div class="cart__total__procced">
                        <h6>{{__('home.cart_total')}}</h6>
                        <ul>
                            @foreach($cart as $item)
                            <li>{{__('home.total')}} <span>$ {{$total}}</span></li>
                            @endforeach
                        </ul>
                        <a href="{{route('cart.checkOut')}}" class="primary-btn">{{__('home.checkout')}}</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Cart Section End -->
</x-ecommerce-layout>
