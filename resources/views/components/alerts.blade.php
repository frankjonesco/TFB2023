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

@if(!session()->has('success') && !session()->has('warning') && isset($heading))
    <div class="alert-heading" role="alert">
        {{$heading}}
    </div>
@endif
