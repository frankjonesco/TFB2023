@if(session()->has('success'))
    <div class="p-4 mb-8 text-sm rounded-lg border border-green-900 bg-green-300 text-green-900" role="alert">
        <span class="font-medium"><i class="fa-solid fa-check-circle"></i></span> {{session('success')}}
    </div>
@endif