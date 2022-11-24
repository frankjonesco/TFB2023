<x-dashboard-layout>

    <div class="flex flex-row items-center">
        <h1 class="grow">Change image</h1>
        <x-edit-company-buttons :company="$company" />
    </div>

    <x-alerts/>

    <form id="form" action="/dashboard/companies/{{$company->hex}}/image/update" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-block">
            <label>Upload image file</label>
            <input aria-describedby="image_help" id="image" name="image" type="file">
            <div class="text-input-advice" id="image_help">Upload a logo for the company.</div>
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
