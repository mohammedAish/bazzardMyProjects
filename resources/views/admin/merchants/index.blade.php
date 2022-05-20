<x-admin-layout>
@if (session()->has('success'))
<div class="alert alert-success my-5 text-center" style="font-size:23px;">
    {{ session()->get('success') }}
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
                         {{ __('dashboard.merchants_management') }}
                    </h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                    <div class="kt-portlet__head-wrapper">
                        <div class="dropdown dropdown-inline">
                            <a href="{{ route('merchants.create') }}" class="btn btn-brand btn-icon-sm">
                                <i class="fa fa-plus"></i> {{ __('dashboard.add_new_merchant') }}
                            </a>

                        </div>
                    </div>
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
                       <th> #</th>
                        <th> {{ __('home.Store Name') }}</th>
                        <th> {{ __('home.brand name') }}</th>
                        <th> {{ __('home.user_name') }} </th>
                        <th> {{ __('home.email') }} </th>
                        <th> {{ __('home.plan') }} </th>
                        <th> {{ __('home.status') }} </th>
                         <th> {{ __('home.actions') }} </th>
                    </tr>
                    </thead>
                    <tbody>
                           @foreach ($merchants as $merchant)
                        <tr>

                            <td>{{$merchant->id}}</td>
                            <td>{{$merchant->store->name}}</td>
                            <td>{{$merchant->store->slug}}</td>
                            <td>{{$merchant->user_name}}</td>
                            <td>{{$merchant->email}}</td>
                            <td>{{$merchant->store->plan}}</td>
                            @if($merchant->status == "inactive")
                            <td class="status"><a href="{{route('merchants.status',$merchant->id)}}"><i class="fa fa-times"></i></a>{{ __('dashboard.inactive') }}</td>
                            @else
                            <td class="status"><a href="{{route('merchants.status',$merchant->id)}}"><i class="fa fa-check" style="color:green"></i></a>{{ __('dashboard.active') }}</td>
                            @endif
                            <td class="d-flex"><a class="" href="{{route('merchants.edit',$merchant->id)}}"><i class="far fa-edit"></i></a>
                                <a class="" href="#" style="border-style:none;color: #1100ff;background-color: transparent"
                                data-toggle="modal" data-target="#delete_modal{{ $merchant->id }}">
                                   <i class="far fa-trash-alt"></i>
                               </a>


                               </td>
                               <div class="modal fade" id="delete_modal{{ $merchant->id }}" aria-hidden="true" role="dialog">
                                   <div class="modal-dialog modal-dialog-centered" role="document" >
                                       <div class="modal-content">

                                           <form action="{{route('merchants.destroy',$merchant->id)}}" method="post">
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

        <!-- end:: Content -->
    </div>
    </x-admin-layout>
