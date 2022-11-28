@if(session()->has('success'))
    <div class="p-4 mb-4 text-sm rounded-lg border border-green-900 bg-green-300 text-green-900" role="alert">
        <span class="font-medium"><i class="fa-solid fa-check-circle"></i></span> {{session('success')}}
    </div>
@endif

@if(session()->has('warning'))
    <div class="p-4 mb-4 text-sm rounded-lg border border-yellow-900 bg-yellow-300 text-yellow-900" role="alert">
        <span class="font-medium"><i class="fa-solid fa-info-circle"></i></span> {{session('warning')}}
    </div>
@endif