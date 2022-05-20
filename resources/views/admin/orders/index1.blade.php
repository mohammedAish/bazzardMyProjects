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
                            {{ __('dashboard.orders_managment') }}
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
                    <table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
                        <thead>
                            <tr>
                                <th> {{ __('home.order_number') }} </th>
                                <th> {{ __('home.customer') }} </th>
                                <th> {{ __('home.order_date') }} </th>
                                <th> {{ __('home.order_status') }} </th>
                                <th> {{ __('home.payment_status') }} </th>
                                <th> {{ __('home.total') }} </th>
                                <th> {{ __('home.actions') }} </th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <td>{{ $order->id }}</td>
                                    <td>{{ $order->customers->first_name ?? ' '}}</td>
                                    <td>{{ $order->created_at }}</td>
                                    <td>{{ $order->status }}</td>
                                    <td>....</td>
                                    <td>{{ $order->total }}</td>
                                    <td class="">
                                        <a style="border-style:none;color: #1100ff;background-color: transparent"
                                            href="{{ route('orders.show', $order->id) }}"><i
                                                class="far fa-eye"> </i>&nbsp;&nbsp;{{ __('home.show') }}</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!--end: Datatable -->
                </div>
            </div>
        </div>
        <!-- end:: Content -->
    </div>
</x-admin-layout>
