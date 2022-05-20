<x-admin-layout>
    <div class="container">
<form action="{{ route('users.rolesstore',$users->id) }}" method="post" enctype="multipart/form-data">
    @csrf

    <div class="form-group mb-3 mt-5">
        <label for="">{{ __('home.Abilities') }} :</label>
        <div class="row mt-2">
            @foreach(config('abilities_user') as $key => $label)
            <div class="col-3">
                <div class="mb-1">
                <label for="">
                    @if($users->abilities == NULL)
                <input type="checkbox" name="abilities[]" value="{{ $key }}" @if(in_array($key, $role->abilities)) checked @endif>

                @else
                <input type="checkbox" name="abilities[]" value="{{ $key }}" @if(in_array($key, $users->abilities)) checked @endif>
@endif
                {{ $label }}
                </label>
            </div>
            </div>
            @endforeach
        </div>
        @error('abilities')
        <p class="invalid-feedback">{{ $message }}</p>
        @enderror
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">{{ __('home.save') }}</button>
    </div>
</form>
</div>
</x-admin-layout>
