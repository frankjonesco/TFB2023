<x-dashboard-layout>
    <div class="flex">

        <div class="w-2/3 pr-10">
        
            <x-edit-article-buttons :article="$article" />
            <h2>Change image</h2>
            <x-alerts/>

            <form id="form" action="/dashboard/articles/{{$article->hex}}/image/update" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-block">
                    <label>Upload image file</label>
                    <input aria-describedby="image_help" id="image" name="image" type="file">
                    <div class="text-input-advice" id="image_help">Article images are used for the public facing content.</div>
                    @error('image')
                        <p class="text-error">{{$message}}</p>
                    @enderror
                </div>
            </form>
        </div>

        <div class="w-1/3">
            <x-module-article-details :details="$article->details" />
        </div>
    
    </div>

    <script>
        document.getElementById("image").onchange = function() {
            document.getElementById("form").submit();
        };
    </script>
    
</x-dashboard-layout>
