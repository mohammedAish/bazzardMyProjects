<x-admin-layout>
    <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor mt-5 pt-5" id="kt_content">
        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        {{ __('home.edit_order') }}
                    </h3>
                </div>
            </div>
            <div class="container p-5">
                <form action="{{ route('systemOrders.update',$order->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label "> {{ __('home.customer') }}
                        </label>
                        <div class="col-md-6 col-sm-12">
                            <select name="customer_id" class="form-control @error('customer_id') is-invalid @enderror">
                                {{-- <option value="">{{ __('home.choose the customer') }}</option> --}}
                                @foreach ($customers as $customer)
                                    <option value="{{ $customer->id }}" @if ($customer->id == old('customer_id',$customer->id)) selected @endif>
                                        {{ $customer->first_name . ' ' . $customer->last_name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('customer_id')
                                <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label "> {{ __('home.Product') }}
                        </label>
                        <div class="col-md-6 col-sm-12">
                            <select name="product_id" id="product"
                                class="form-control @error('product_id') is-invalid @enderror">
                                <option value="">{{ __('home.choose_the_product') }}</option>
                                @foreach ($products as $product)
                                    <option data-url="{{ route('order_product', $product->id) }}"
                                        value="{{ $product->id }}" @if ($product->id == old('product',$product->id)) selected @endif>
                                        {{ $product->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('product_id')
                                <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="">
                        <div class="form-group ">
                            <div id="render_tabel">
                                @include('admin.orders.size')
                            </div>
                        </div>

                        <div class="">
                            <div class="form-group row">
                                <label class="col-3">{{ __('home.color') }}</label>
                                <div class="col-6 ">
                                    <select id="color" name="color" class="form-control">
                                        <option value="0">{{ __('home.color') }}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label ">{{ __('home.qty') }}</label>
                        <div class="col-md-6 col-sm-12">
                            <input type="text" value="{{ old('quantity',$order__products->quantity) }}" name="quantity" id="quantity"
                                class="form-control @error('quantity') is-invalid @enderror"
                                placeholder="{{ __('home.qty') }} ">
                            @error('quantity')
                                <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label "> {{ __('home.status') }}
                        </label>
                        <div class="col-md-6 col-sm-12">
                            <select name="status" class="form-control @error('status') is-invalid @enderror">
                                <option value="pending">{{ __('home.pending') }}</option>
                                <option value="processing">{{ __('home.processing') }}</option>
                                <option value="in-delivery">{{ __('home.in_delivery') }}</option>
                                <option value="completed">{{ __('home.completed') }}</option>
                            </select>
                            @error('status')
                                <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    {{-- <div class="form-group row">
                        <label class="col-md-3 col-form-label ">{{ __('home.status') }}</label>
                        <div class="col-md-6 col-sm-12">
                            <label for="status">{{__('home.choose_the_status')}}</label>
                            <select name="status" >
                                <option value="pending">{{ __('home.pending') }}</option>
                                <option value="processing">{{ __('home.processing') }}</option>
                                <option value="in-delivery">{{ __('home.in_delivery') }}</option>
                                <option value="completed">{{ __('home.completed') }}</option>
                            </select>
                             <label><input type="radio" name="status" value="pending" @if (old('status') == 'pending') checked @endif>
                                {{ __('home.pending') }}</label>
                            <label><input type="radio" name="status" value="processing" @if (old('status') == 'processing') checked @endif>
                                {{ __('home.processing') }}</label>
                            <label><input type="radio" name="status" value="in-delivery" @if (old('status') == 'in-delivery') checked @endif>
                                {{ __('home.in_delivery') }}</label>
                            <label><input type="radio" name="status" value="completed" @if (old('status') == 'completed') checked @endif>
                                {{ __('home.completed') }}</label> 
                        </div>
                        @error('status')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div> --}}

                    <div class="form-group">
                        <button type="submit" class="btn btn-success">{{ __('home.save') }}</button>
                        <a href="{{ route('systemOrders.index') }}"
                            class="btn btn-secondary">{{ __('home.cancel') }}</a>
                    </div>

                </form>
            </div>
        </div>
    </div>
    @push('js')
        <script type="text/javascript">
            $("#product").on('change', function() {
                $('#size').html('');
                url = $('#product').find(":selected").data('url')
                $.get(url,
                    function(data) {
                        $('#render_tabel').html(' ');
                        $('#render_tabel').html(data);


                    }
                );
            });
        </script>

    @endpush
</x-admin-layout>
