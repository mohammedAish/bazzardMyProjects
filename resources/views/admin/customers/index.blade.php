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
                        {{ __('home.customers_management') }}
                    </h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                    <div class="kt-portlet__head-wrapper">
                        <div class="kt-portlet__head-actions">

                            <a href="{{ route('customers.create') }}" class="btn btn-brand btn-icon-sm">
                                <i class="fa fa-plus"></i> {{ __('home.add_new_customer') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="kt-portlet__body">

                <!--begin: Datatable -->
                <table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
                    <thead>
                        <tr>
                            <th> {{ __('home.first_name') }}</th>
                             <th> {{ __('home.last_name') }} </th>
                             <th> {{ __('home.email') }} </th>
                             <th> {{ __('home.phone_number') }} </th>
                             <th> {{ __('home.address') }} </th>
                             <th> {{ __('home.city') }} </th>
                             <th> {{ __('home.postal_code') }} </th>
                              <th> {{ __('home.actions') }} </th>
                         </tr>
                    </thead>
                    <tbody>
                        @foreach ($customers as $customer)
                        <tr>
                            <td>{{$customer->first_name}}</td>
                            <td>{{$customer->last_name}}</td>
                            <td>{{$customer->email}}</td>
                            <td>{{$customer->phone}}</td>
                            <td>{{$customer->address}}</td>
                           
                           <?php $city=App\Models\City::where('city_id',$customer->city)->first();?>
                            <td>{{$city->city_name}}</td>
                            <td>{{$customer->postal_code}}</td>


                            <td class=""><a style="border-style:none;color: #1100ff;background-color: transparent" href="{{route('customers.edit',$customer->id)}}"><i class="far fa-edit"></i>{{__('home.edit')}}</a>
                              
                                <a class="" style="border-style:none;color: #1100ff;background-color: transparent" data-toggle="modal" href="#delete_modal{{ $customer->id }}">
                                    <i class="far fa-trash-alt"></i>
                                </a>
                                </td>
                                <div class="modal fade" id="delete_modal{{ $customer->id }}" aria-hidden="true" role="dialog">
                                           <div class="modal-dialog modal-dialog-centered" role="document" >
                                               <div class="modal-content">

                                                   <form action="{{route('customers.destroy',$customer->id)}}" method="post">
                                                       @csrf
                                                       @method('delete')
                                                       <div class="modal-body">
                                                           <div class="form-content p-2">

                                                               <h4 class="modal-title">{{__('home.delete')}}</h4>
                                                               <p class="mb-4">{{__('home.want_to_delete')}}</p>
                                                               <button type="submit" class="btn btn-danger">{{__('home.delete')}}</button>
                                                               <button type="button" class="btn btn-info" data-dismiss="modal">{{__('home.close')}}</button>
                                                           </div>
                                                       </div>
                                                   </form>
                                               </div>
                                           </div>
                                       </div>
                        </tr>
                        @endforeach

                    </tbody>
                </table>

                <!--end: Datatable -->

                </div>
            </div>
        </div>
    </div>

    <!-- end:: Content -->


</x-admin-layout>
