<x-dashboard-layout>
    <div class="flex w-full">
        <div class="w-3/4 pr-10">
            <x-edit-company-buttons :company="$company" />
            <h2 class="grow">
                Change image
            </h2>
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
        </div>
        <div class="w-1/4">
            <x-module-company-details :details="$company->details" />
        </div>
    </div>
</x-dashboard-layout>