@if(session()->has('success'))
    <div class="alert-success" role="alert">
        {{session('success')}}
    </div>
@endif

@if(session()->has('warning'))
    <div class="alert-warning" role="alert">
        {{session('warning')}}
    </div>
@endif