<x-dashboard-layout>
    <x-admin-sector-header :sector="$sector"/>
    <form id="form" action="/dashboard/sectors/{{$sector->hex}}/image/update" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-block">
            <label>Upload file</label>
            <input aria-describedby="image_help" id="image" name="image" type="file">
            <div class="text-input-advice" id="image_help">Sector images are used for the public facing content.</div>
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
