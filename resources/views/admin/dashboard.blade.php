<x-admin-layout>
{{--      <div class="container row">

    <div class="col-md-6 col-sm-12 pt-5 text-center mb-4">
    <div class="  py-4 " style="background-color: rgba(75, 192, 192, 1);color:#fff; width:300px;height:240px;font-size: 20px;   border-radius: 10%;">
        <div class="inner">
            <h3 style="font-size: 70px;">340</h3>

            ​
            <p>عدد الطلبات الكلي </p>
        </div>

    </div>
</div>
<div class="col-md-6 col-sm-12 pt-5 text-center mb-4">
    <div class="  py-4 " style="background-color: rgb(75, 192, 134);color:#fff; width:300px;height:240px;font-size: 20px;   border-radius: 10%;">
        <div class="inner">
            <h3 style="font-size: 70px;">180</h3>

            ​
            <p>عدد العاملين  </p>
        </div>

    </div>
</div>

<div class="col-md-10 text-center col-sm-12 mt-5 pt-4">
    <canvas id="myChart" width="100%" height="50"></canvas>
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script> --}}

<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">

    <!--Begin::Dashboard 1-->

    <!--Begin::Row-->
    <div class="row">
        <div class=" col-12 order-lg-1 order-xl-1">

            <!--begin:: Widgets/Activity-->
            <div class="kt-portlet kt-portlet--fit kt-portlet--head-lg kt-portlet--head-overlay kt-portlet--skin-solid kt-portlet--height-fluid">
                <div class="kt-portlet__head kt-portlet__head--noborder kt-portlet__space-x">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            Activity
                        </h3>
                    </div>
                    {{-- <div class="kt-portlet__head-toolbar">
                        <a href="#" class="btn btn-label-light btn-sm btn-bold dropdown-toggle" data-toggle="dropdown">
                            Export
                        </a>
                        <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right">
                            <ul class="kt-nav">
                                <li class="kt-nav__section kt-nav__section--first">
                                    <span class="kt-nav__section-text">Finance</span>
                                </li>
                                <li class="kt-nav__item">
                                    <a href="#" class="kt-nav__link">
                                        <i class="kt-nav__link-icon flaticon2-graph-1"></i>
                                        <span class="kt-nav__link-text">Statistics</span>
                                    </a>
                                </li>
                                <li class="kt-nav__item">
                                    <a href="#" class="kt-nav__link">
                                        <i class="kt-nav__link-icon flaticon2-calendar-4"></i>
                                        <span class="kt-nav__link-text">Events</span>
                                    </a>
                                </li>
                                <li class="kt-nav__item">
                                    <a href="#" class="kt-nav__link">
                                        <i class="kt-nav__link-icon flaticon2-layers-1"></i>
                                        <span class="kt-nav__link-text">Reports</span>
                                    </a>
                                </li>
                                <li class="kt-nav__section">
                                    <span class="kt-nav__section-text">Customers</span>
                                </li>
                                <li class="kt-nav__item">
                                    <a href="#" class="kt-nav__link">
                                        <i class="kt-nav__link-icon flaticon2-calendar-4"></i>
                                        <span class="kt-nav__link-text">Notifications</span>
                                    </a>
                                </li>
                                <li class="kt-nav__item">
                                    <a href="#" class="kt-nav__link">
                                        <i class="kt-nav__link-icon flaticon2-file-1"></i>
                                        <span class="kt-nav__link-text">Files</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div> --}}
                </div>
                <div class="kt-portlet__body kt-portlet__body--fit">
                    <div class="kt-widget17">
                        <div class="kt-widget17__visual kt-widget17__visual--chart kt-portlet-fit--top kt-portlet-fit--sides" style="background-color: #fd397a">
                            <div class="kt-widget17__chart" style="height:320px;">
                                <canvas id="kt_chart_activities"></canvas>
                            </div>
                        </div>
                        <div class="kt-widget17__stats">
                            <div class="kt-widget17__items">
                                <div class="kt-widget17__item">
                                    <span class="kt-widget17__icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon kt-svg-icon--brand">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <path d="M5,3 L6,3 C6.55228475,3 7,3.44771525 7,4 L7,20 C7,20.5522847 6.55228475,21 6,21 L5,21 C4.44771525,21 4,20.5522847 4,20 L4,4 C4,3.44771525 4.44771525,3 5,3 Z M10,3 L11,3 C11.5522847,3 12,3.44771525 12,4 L12,20 C12,20.5522847 11.5522847,21 11,21 L10,21 C9.44771525,21 9,20.5522847 9,20 L9,4 C9,3.44771525 9.44771525,3 10,3 Z" fill="#000000" />
                                                <rect fill="#000000" opacity="0.3" transform="translate(17.825568, 11.945519) rotate(-19.000000) translate(-17.825568, -11.945519) " x="16.3255682" y="2.94551858" width="3" height="18" rx="1" />
                                            </g>
                                        </svg> </span>
                                    <span class="kt-widget17__subtitle">
                                        Delivered
                                    </span>
                                    <span class="kt-widget17__desc">
                                        {{$deliver_orders}}
                                    </span>
                                </div>
                                <div class="kt-widget17__item">
                                    <span class="kt-widget17__icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon kt-svg-icon--success">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <polygon points="0 0 24 0 24 24 0 24" />
                                                <path d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z" fill="#000000" fill-rule="nonzero" />
                                                <path d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z" fill="#000000" opacity="0.3" />
                                            </g>
                                        </svg> </span>
                                    <span class="kt-widget17__subtitle">
                                        Ordered
                                    </span>
                                    <span class="kt-widget17__desc">
                                        {{$orders_count}}
                                    </span>
                                </div>
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>

            <!--end:: Widgets/Activity-->
        </div>

        <div class="col-lg-4 col-xl-4 order-lg-1 order-xl-1">
            <div class="container row">
            <div class="col-md-4 col-sm-12 pt-5 text-center mb-4">
                <div class="  py-4 " style="background-color: rgb(75, 192, 134);color:#fff; width:300px;height:240px;font-size: 20px;   border-radius: 10%;">
                    <div class="inner">
                        <h3 style="font-size: 70px;">{{$user_count}}</h3>
                        <p>Users</p>
                    </div>
                </div>
            </div>

            <div class="col-md-10 text-center col-sm-12 mt-5 pt-4">
                <canvas id="myChart" width="100%" height="50"></canvas>
            </div>
            </div>

            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        </div>

        <div class="col-lg-4 col-xl-4 order-lg-1 order-xl-1">
            <div class="col-md-4 col-sm-12 pt-5 text-center mb-4">
                <div class="  py-4 " style="background-color: rgb(240, 225, 97);color:#fff; width:300px;height:240px;font-size: 20px;   border-radius: 10%;">
                    <div class="inner">
                        <h3 style="font-size: 70px;">  {{$stores}}</h3>
                        <p>Stores</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-xl-4 order-lg-1 order-xl-1">
            <div class="col-md-4 col-sm-12 pt-5 text-center mb-4">
                <div class="  py-4 " style="background-color: rgba(75, 192, 192, 1);color:#fff; width:300px;height:240px;font-size: 20px;   border-radius: 10%;">
                    <div class="inner">
                        <h3 style="font-size: 70px;">{{$customers_count}}</h3>
                        <p>customer</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--End::Row-->

    <!--Begin::Row-->
       <!-- begin:: Content -->
       <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
        <div class="kt-portlet kt-portlet--mobile">
             <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon">
                    <i class="kt-font-brand flaticon2-line-chart"></i>
                </span>
                <h3 class="kt-portlet__head-title">
                    {{__('home.new_orders')}}
                </h3>
            </div>
           
        </div>

        <div class="kt-portlet__body kt-portlet__body--fit">

            <div class="kt-portlet__body">

                <!--begin: Search Form -->
                <div class="kt-form kt-form--label-right kt-margin-t-20 kt-margin-b-10">
                </div>
                <!--end: Search Form -->
            </div>
            <!--begin: Datatable -->
            <table class="table table-striped table-bordered" style="width:100%" id="quiztable" >
                <thead>
                  <tr>
                    <th> {{ __('home.order_number') }} </th>
                    <th> {{ __('home.customer_name') }} </th>
                    <th> {{ __('home.order_date') }} </th>
                    <th> {{ __('home.notes') }} </th>
                    <th> {{ __('home.status') }} </th>
                    {{-- <th> {{ __('home.actions') }} </th> --}}
                </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                    <tr>
                        <td>{{$order->id}}</td>
                        <td>{{$order->customers->first_name}}</td>
                        <td>{{$order->created_at}}</td>
                        <td>{{$order->notes}}</td>
                        <td>{{$order->status}}</td>
                       {{--  <td class="d-flex">
                            <a class="" href="{{route('systemOrders.edit',$order->id)}}"><i class="far fa-edit"></i></a>
                            <hr>
                            <form action="{{route('systemOrders.destroy',$order->id)}}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" style="border-style:none;color: #5867dd;background-color: transparent"><i class="far fa-trash-alt"></i></button>
                            </form>
                        </td> --}}
                    </tr>
                    @endforeach
            </tbody>
            </table>
    <!--end: Datatable -->
        </div>
        </div>
    </div>

    <!-- end:: Content -->

    <!--End::Row-->

    <!--End::Dashboard 1-->
</div>
</x-admin-layout>
