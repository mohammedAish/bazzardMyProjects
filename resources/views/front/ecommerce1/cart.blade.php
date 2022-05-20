<x-ecommerce1-layout>
    <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>{{__('home.cart')}}</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">{{__('home.shop')}}</a></li>
                        <li class="breadcrumb-item active">{{__('home.cart')}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Cart  -->
    <div class="cart-box-main">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-main table-responsive">
                        <table class="table">
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
                                    <td class="thumbnail-img">
                                        <a href="{{route('product_details',$item->products->name)}}">
									<img class="img-fluid" src="{{ asset('img/'. $item->products->image) }} " alt="" />
								</a>
                                    </td>
                                    <td class="name-pr">
                                        <a href="{{route('product_details',$item->products->name)}}">
                                    {{-- {{$item->products->name}} --}}
                                    {{data_get($item->products, 'name'.app()->make('db_lang_suffix'))}}
								</a>
                                    </td>
                                    <td class="price-pr">
                                        @if($item->products->saleprice == null)
                                        <p>$ {{$item->products->price}}</p>
                                        @else
                                        <p>$ {{$item->products->saleprice}}</p>
                                        @endif

                                    </td>
                                    <td class="quantity-box">  <div>{{$item->quantity}}</div></td>
                                    <td class="total-pr">
                                    @if($item->products->saleprice == null)
                                        <p>$ {{$item->products->price * $item->quantity}}</p>
                                        @else
                                        <p>$ {{$item->products->saleprice * $item->quantity}}</p>
                                        @endif
                                    </td>
                                    <td class="remove-pr">
                                        <form action="{{route('cart.destroy',$item->id)}}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" style="border-style:none;color: #5867dd;background-color: transparent"><i class="far fa-trash-alt"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="row my-5">
                <div class="col-lg-6 col-sm-6">
                </div>
                <div class="col-lg-6 col-sm-6">
                    <div class="update-box">
                        {{-- <input value="Update Cart" type="submit"> --}}
                        <div class="col-12 d-flex shopping-box"><a href="{{route('cart.checkOut')}}" class="ml-auto btn hvr-hover">{{__('home.checkout')}}</a> </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Cart -->
</x-ecommerce1-layout>
