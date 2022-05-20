<x-front-layout>
    <div class="packages">
        <div class="max-container">
            <div>
                <h2 class="text-center">{{ __('home.Find the right plan for your service') }}</h2>
                <div class="row">
                    <div class="col-12 col-md-4">
                        <div class="box-card">
                            <div class="card">
                                <h3>{{ __('home.Free') }}</h3>
                                <div class="price">0</div>
                                <div class="price-details">{{ __('home.Free plan for a life time') }}</div>
                                <hr />
                                <div class="description">
                                    {{ __('home.Easy online store to launch your business for free') }}
                                </div>

                                <div class="text-center">
                                    <a class="button" href="{{ route('register') }}">{{ __('home.signup') }}</a>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="box-card">
                            <div class="card">
                                <h3 class="line">{{ __('home.premuim') }}</h3>
                                <div class="price">20 <span>/{{ __('home.month') }}</span></div>
                                <div class="price-details">$14/ {{ __('home.month paid annually') }}</div>
                                <hr />
                                <div class="description">
                                    {{ __('home.professional features to grow and manage your online store') }}
                                </div>

                                <div class="text-center">
                                    <a class="button" href="{{ route('register') }}">{{ __('home.signup') }}</a>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="box-card">
                            <div class="card">
                                <h3>{{ __('home.enterprise') }}</h3>
                                <div class="price">35 <span>/ {{ __('home.month') }}</span></div>
                                <div class="price-details">$25/ {{ __('home.month paid annually') }}</div>
                                <hr />
                                <div class="description">
                                    {{ __('home.everything you need to sell online, mobile and at retail') }}
                                </div>

                                <div class="text-center">
                                    <a class="button" href="{{ route('register') }}">{{ __('home.signup') }}</a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="max-container container ">
        <h3 class="text-center">Comapre features</h3>
        <div class="table w-100">
            <table>
                <tr>
                    <td>Sale Channels</td>
                    <td>Free</td>
                    <td class="green">Business</td>
                    <td>Premuim</td>
                </tr>
                <tr>
                    <td>Online Store</td>
                    <td><i class="fas fa-check"></i></td>
                    <td><i class="fas fa-check"></i></td>
                    <td><i class="fas fa-check"></i></td>
                </tr>
                <tr>
                    <td>Facebook Shop</td>
                    <td><i class="fas fa-times"></i></td>
                    <td><i class="fas fa-check"></i></td>
                    <td><i class="fas fa-check"></i></td>
                </tr>
                <tr>
                    <td>Instagram</td>
                    <td><i class="fas fa-times"></i></td>
                    <td><i class="fas fa-check"></i></td>
                    <td><i class="fas fa-check"></i></td>
                </tr>
                <tr>
                    <td>Amazon</td>
                    <td><i class="fas fa-times"></i></td>
                    <td><i class="fas fa-times"></i></td>
                    <td><i class="fas fa-check"></i></td>
                </tr>
                <tr>
                    <td>Ebay</td>
                    <td><i class="fas fa-times"></i></td>
                    <td><i class="fas fa-times"></i></td>
                    <td><i class="fas fa-check"></i></td>
                </tr>
                <tr>
                    <td>Point of Sale</td>
                    <td><i class="fas fa-times"></i></td>
                    <td><i class="fas fa-times"></i></td>
                    <td><i class="fas fa-check"></i></td>
                </tr>

            </table>
        </div>
        <div class="text-center check-more">
            <a href="#" class="link">Check more</a>
        </div>
    </div>
</x-front-layout>
