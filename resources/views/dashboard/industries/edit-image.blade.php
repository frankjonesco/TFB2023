<x-dashboard-layout>

    <div class="flex flex-row items-center">
        <h1 class="grow">Change image</h1>
        <x-edit-industry-buttons :industry="$industry" />
    </div>

    <x-alerts/>

    <form id="form" action="{{url('dashboard/industries/'.$industry->hex.'/image/update')}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-block">
            <label>Upload image file</label>
            <input aria-describedby="image_help" id="image" name="image" type="file">
            <div class="text-input-advice" id="image_help">Industry images are used for the public facing content.</div>
            @error('image')
                <p class="text-error">{{$message}}</p>
            @enderror
        </div>
    </form>

    <script>
        document.getElementById("image").onchange = function() {
            document.getElementById("form").submit();
        };
    </script>
    
</x-dashboard-layout>
