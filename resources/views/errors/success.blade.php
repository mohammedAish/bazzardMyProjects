@if (session('success'))
        <div class="alert alert-success alert-block" style="background-color:cornflowerblue;border-color: cornflowerblue;">
            <button type="button" class="close" data-dismiss="alert">×</button>  
                <strong>{{ session('success') }}</strong>
        </div>
@endif