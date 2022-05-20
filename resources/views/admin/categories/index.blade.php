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
                            {{ __('dashboard.categories_managment') }}
                        </h3>
                    </div>
                    <div class="kt-portlet__head-toolbar">
                        <div class="kt-portlet__head-wrapper">
                            <div class="kt-portlet__head-actions">

                                <a href="{{ route('categories.create') }}" class="btn btn-brand btn-icon-sm">
                                    <i class="fa fa-plus"></i> {{ __('dashboard.add_new_category') }}
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
                                <th> {{ __('dashboard.image') }} </th>
                                <th> {{ __('home.name') }} </th>
                                <th> {{ __('home.desc') }} </th>
                                <th> {{ __('home.status') }} </th>
                                <th> {{ __('home.actions') }} </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td ><img src="{{ asset('img/' . $category->image) }}" height="80px" width="80px"></td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->desc }}</td>
                                    @if ($category->status == 'inactive')
                                    <td class="status"><a href="{{ route('categories.status', $category->id) }}"><i class="fa fa-times"></i></a>{{ __('dashboard.inactive') }}</td>
                                    @else
                                    <td class="status"><a href="{{ route('categories.status', $category->id) }}"><i class="fa fa-check" style="color:green"></i></a>{{ __('dashboard.active') }}</td>
                                    @endif
                                    <td class="" ><a style="border-style:none;color: #1100ff;background-color: transparent" href="{{ route('categories.edit', $category->id) }}"><i class="far fa-edit"></i>{{__('home.edit')}}</a>
                                        <a class="" href="#" style="border-style:none;color: #1100ff;background-color: transparent"
                                        data-toggle="modal" data-target="#delete_modal{{ $category->id }}">
                                           <i class="far fa-trash-alt"></i>
                                       </a>
                                       </td>
                                       <div class="modal fade" id="delete_modal{{ $category->id }}" aria-hidden="true" role="dialog">
                                           <div class="modal-dialog modal-dialog-centered" role="document" >
                                               <div class="modal-content">

                                                   <form action="{{route('categories.destroy',$category->id)}}" method="post">
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
