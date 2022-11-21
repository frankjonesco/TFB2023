@if(session()->has('success'))
    <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
        <span class="font-medium"><i class="fa-solid fa-check-circle"></i></span> {{session('success')}}
    </div>
@endif