<x-admin-layout>
    <div class="container">
    <div>name : {{$contact->name}}</div>
    <div>email : {{$contact->email}}</div>
    <div>message : {{$contact->message}}</div>
    <div> <a class="btn btn-danger" data-toggle="modal" href="#delete_modal"> {{__('home.delete')}}</a>
     <a class="btn btn-info" href="{{route('contactus.index')}}"> {{__('home.back')}}</a></div>

    <div class="modal fade bd-example-modal-sm" id="delete_modal" aria-hidden="true" role="dialog">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document" >
            <div class="modal-content">
                <form action="{{route('contactus.destroy',$contact->id)}}" method="post">
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
</div>
</x-admin-layout>