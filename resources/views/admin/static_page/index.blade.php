<x-admin-layout title="Roles">
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
                    {{__('dashboard.static_page')}}
                </h3>
            </div>
            {{-- <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-wrapper">
                    <div class="dropdown dropdown-inline">
                        <a href="{{ route('pages.update') }}" class="btn btn-brand btn-icon-sm">
                            <i class="fa fa-plus"></i>  {{__('dashboard.update')}}
                        </a>
                    </div>
                </div>
            </div> --}}
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
                    <th> {{ __('dashboard.image') }} </th>
                    <th> {{ __('home.title') }} </th>
                    <!-- <th> {{ __('home.intro') }} </th> -->
                    <th> {{ __('home.desc') }} </th>
                    <th> {{ __('home.status') }} </th>
                    <th> {{ __('home.actions') }} </th>
                </tr>
                </thead>
                <tbody>
                    @foreach($pages as $page)
                    <tr>
                        <td>
                            @if ($page->image)
                            <img src="{{ asset('img/' . $page->image) }}"
                            height="80px" width="80px">
                                 @else
                                 <img class="rounded-circle " alt="User Image"
                                        src="{{ asset('assets/images/blank-profile.png') }}"
                                        width="80px" height="80px">
                                 @endif

                            </td>
                        <td>{{$page->title}}</td>
                        <!-- <td>{{$page->intro}}</td>  -->
                        <td>{!! $page->desc !!}</td>
                        @if($page->status == "inactive")
                        <td class="status"><a href="{{route('page.status',$page->id)}}"><i class="fa fa-times"></i></a>{{ __('dashboard.inactive') }}</td>
                        @else
                        <td class="status"><a href="{{route('page.status',$page->id)}}"><i class="fa fa-check" style="color:green"></i></a>{{ __('dashboard.active') }}</td>
                        @endif
                        <td class="d-flex ">
                            <a class="" href="{{route('page.edit',$page->key_page)}}"><i class="far fa-edit"></i></a>
                            <hr>
                            {{-- <form action="{{route('page.destroy',$page->id)}}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" style="border-style:none;color: #5867dd;background-color: transparent"><i class="far fa-trash-alt"></i></button>
                            </form> --}}
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
