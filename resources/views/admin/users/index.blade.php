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
                        {{ __('dashboard.users_merchant_management') }}
                    </h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                    <div class="kt-portlet__head-wrapper">
                        <div class="dropdown dropdown-inline">
{{--                              @if( (Auth::user()->type  == "superadmin") || (Auth::user()->type  == "admins"))
 --}}                            <a href="{{ route('users.create') }}" class="btn btn-brand btn-icon-sm">
                                <i class="fa fa-plus"></i>{{ __('dashboard.add_new_user') }}
                            </a>
                           {{--  @else
                                <a href="{{ route('users.create') }}" class="btn btn-brand btn-icon-sm">
                                <i class="fa fa-plus"></i>{{ __('dashboard.add_new_user') }}
                            </a>
                            @endif --}}

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
                        <th> {{ __('home.Store Name') }} </th>
                        <th> {{ __('home.user_name') }} </th>
                        <th> {{ __('home.email') }} </th>
                        <th> {{ __('home.status') }} </th>
                        <th> {{ __('home.actions') }} </th>
                    </tr>
                    </thead>
                    <tbody>
                     @if( (Auth::user()->type  == "superadmin") || (Auth::user()->type  == "admins"))
                           @foreach ($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->store->name}}</td>
                            <td>{{$user->user_name}}</td>
                            <td>{{$user->email}}</td>
                     @if($user->status == "inactive")
                            <td class="status"><a href="{{route('merchants.status',$user->id)}}"><i class="fa fa-times"></i></a>{{ __('dashboard.inactive') }}</td>
                            @else
                            <td class="status"><a href="{{route('merchants.status',$user->id)}}"><i class="fa fa-check" style="color:green"></i></a>{{ __('dashboard.active') }}</td>
                            @endif

                         <td class="d-flex" style="position: relative;"> <div class="dropdown dropdown-inline show">
                                                    <button type="button" class="btn btn-clean btn-sm btn-icon btn-icon-md" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                        <i class="flaticon-more-1"></i>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-md dropdown-menu-fit " x-placement="top-end" style="position: absolute; will-change: transform; top: 0px; : 0px; transform: translate3d(-227px, -282px, 0px); width:100px;">

                                                        <!--begin::Nav-->
                                                        <ul class="kt-nav">
                                                            <li class="kt-nav__head" >
                                                            <a class="" href="{{route('users.edit',$user->id)}}" style="font-size:">{{__('home.edit')}}<i class="mx-2 far fa-edit"></i></a>

                                                            </li>
                                                           <li class="kt-nav__head" >
                                                            <a class="" href="{{route('users.roles',$user->id)}}">{{__('home.roles')}}<i class="mx-2  fa fa-lock"></i></a>

                                                            </li>

                                                        </ul>

                                                        <!--end::Nav-->
                                                    </div>
                                                </div>
                                                <a class="" href="#" style="border-style:none;color: #1100ff;background-color: transparent"
                                                data-toggle="modal" data-target="#delete_modal{{ $user->id }}">
                                                   <i class="far fa-trash-alt"></i>
                                               </a>
                                               </td>
                                               <div class="modal fade" id="delete_modal{{ $user->id }}" aria-hidden="true" role="dialog">
                                                   <div class="modal-dialog modal-dialog-centered" role="document" >
                                                       <div class="modal-content">

                                                           <form action="{{route('users.destroy',$user->id)}}" method="post">
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
                                @else
       @foreach ($users_merchant as $user)
                        <tr>

                            <td>{{$user->id}}</td>
                            <td>{{$user->store->name}}</td>
                            <td>{{$user->user_name}}</td>
                            <td>{{$user->email}}</td>
                     @if($user->status == "inactive")
                            <td class="status"><a href="{{route('merchants.status',$user->id)}}"><i class="fa fa-times"></i></a>{{ __('dashboard.inactive') }}</td>
                            @else
                            <td class="status"><a href="{{route('merchants.status',$user->id)}}"><i class="fa fa-check" style="color:green"></i></a>{{ __('dashboard.active') }}</td>
                            @endif


                         <td class="d-flex" style="position: relative;"> <div class="dropdown dropdown-inline show">
                                                    <button type="button" class="btn btn-clean btn-sm btn-icon btn-icon-md" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                        <i class="flaticon-more-1"></i>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-md dropdown-menu-fit " x-placement="top-end" style="position: absolute; will-change: transform; top: 0px; : 0px; transform: translate3d(-227px, -282px, 0px); width:100px;">

                                                        <!--begin::Nav-->
                                                        <ul class="kt-nav">
                                                            <li class="kt-nav__head" >
                                                            <a class="" href="{{route('users.edit',$user->id)}}" style="font-size:">{{__('home.edit')}}<i class="mx-2 far fa-edit"></i></a>

                                                            </li>
                                                           <li class="kt-nav__head" >
                                                            <a class="" href="{{route('users.roles',$user->id )}}">{{__('home.roles')}}<i class="mx-2  fa fa-lock"></i></a>

                                                            </li>

                                                        </ul>

                                                        <!--end::Nav-->
                                                    </div>
                                                </div>
                                                <a class="" href="#" style="border-style:none;color: #1100ff;background-color: transparent"
                                                data-toggle="modal" data-target="#delete_modal{{ $user->id }}">
                                                   <i class="far fa-trash-alt"></i>
                                               </a>
                                </td>
                                <div class="modal fade" id="delete_modal{{ $user->id }}" aria-hidden="true" role="dialog">
                                                   <div class="modal-dialog modal-dialog-centered" role="document" >
                                                       <div class="modal-content">
                                                           <form action="{{route('users.destroy',$user->id)}}" method="post">
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
                                @endif
                </tbody>

                </table>
        <!--end: Datatable -->
            </div>
            </div>
        </div>

        <!-- end:: Content -->
    </div>
    </x-admin-layout>
