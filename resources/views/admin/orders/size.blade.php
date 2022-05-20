<div class="form-group row">
    <label class="col-3">{{ __('home.size') }}</label>
    <div class="col-6 ">
    <select product="" id="size" name="size"
        class="form-control">
        <option value="0">{{ __('home.size') }}</option>
        @foreach ($data ?? [] as $value)
            <option data-url="{{route('products_ordere_color',[$id,$value->value])}}"  value="{{ $value->value }}">{{ $value->value }}</option>
        @endforeach
    </select>
</div>
</div>
<script type="text/javascript">
    $("#size").on('change', function() {
        $('#color').html('');
        url=$('#size').find(":selected").data('url')
        $.ajax({
            url: url,
            type: 'GET',
            dataType: "json",
            success: function(data) {
                for (d in data) {
                    val = data[d]['value']
                    $('#color').append("<option value='" + val + "'>" + val + "</option>")
                }
            }
        });
    });
</script>
