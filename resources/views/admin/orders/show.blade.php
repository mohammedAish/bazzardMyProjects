<x-admin-layout>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor mt-5 pt-5" id="kt_content">
        <!-- begin:: Content -->
        <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
            <div class="kt-portlet kt-portlet--mobile">
                <div class="kt-portlet__head kt-portlet__head--lg">
                    <div class="kt-portlet__head-label">
                        <span class="kt-portlet__head-icon">
                            <i class="kt-font-brand flaticon2-line-chart"></i>
                        </span>
                        <h3 class="kt-portlet__head-title">
                            {{ __('dashboard.order_details') }}
                        </h3>
                    </div>
                    <div class="kt-portlet__head-toolbar">
                        <div class="kt-portlet__head-wrapper">
                            <div class="kt-portlet__head-actions">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="kt-portlet__body">

                    <!--begin: Datatable -->
                    <table class="table table-striped- table-bordered table-hover table-checkable">
                        <thead>
                            <tr>
                            <th> {{ __('dashboard.image') }} </th>
                            <th> {{ __('home.name') }} </th>
                            <th> {{ __('home.qty') }} </th>
                            <th> {{ __('home.price') }} </th>
                            <th> {{ __('home.payment_status') }} </th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order_products as $item)
                                <tr>
                                    <td><img src="{{ asset('img/' . $product->image  ?? ' ') }}"
                                     height="80px" width="80px"></td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td>....</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="kt-portlet kt-portlet--mobile mt-5">
                <div class="kt-portlet__head kt-portlet__head--lg">
                    <div class="kt-portlet__head-label">
                        <span class="kt-portlet__head-icon">
                            <i class="kt-font-brand flaticon2-line-chart"></i>
                        </span>
                        <h3 class="kt-portlet__head-title">
                            {{ __('dashboard.customer_details') }}
                        </h3>
                    </div>
                    <div class="kt-portlet__head-toolbar">
                        <div class="kt-portlet__head-wrapper">
                            <div class="kt-portlet__head-actions">
                            </div>
                        </div>
                    </div>
                </div>
                     <!--begin: customer Datatable -->
                     <table class="table table-striped- table-bordered table-hover table-checkable">
                        <thead>
                            <tr>
                            <th> {{ __('home.name') }} </th>
                            <th> {{ __('home.email') }} </th>
                            <th> {{ __('home.phone_number') }} </th>
                            </tr>
                        </thead>
                        <tbody>
                                <tr>
                                    <td>{{ $customer->first_name}}</td>
                                    <td>{{ $customer->email }}</td>
                                    <td>{{ $customer->phone }}</td>
                                </tr>
                        </tbody>
                    </table>

                    <div class="btn-group mt-5" role="group" aria-label="Basic example">
                        @if($order->status=='pending')
                    <form action="{{ route('orders.confirm',$order->id) }}" method="post">
                        @csrf
                    <button type="submit" class="btn btn-success mr-5">confirmed</button>
                    </form>
                        @endif
                        @if($order->status=='processing')
                    <form action="{{ route('orders.in_deliver',$order->id) }}" method="post">
                        @csrf
                    <button type="submit" class="btn btn-info mr-5">deliver</button>

                    @endif
                    @if($order->status=='pending')
                    <form action="{{ route('orders.cancel',$order->id) }}" method="post">
                        @csrf
                    <button type="submit" class="btn btn-danger">canceled</button>
                    </form>
                    @endif
                    </div>
                    <!--end: Datatable -->
                </div>
            </div>
        </div>
        <!-- end:: Content -->
    </div>
</x-admin-layout>
