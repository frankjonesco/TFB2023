<x-dashboard-layout>
    <div class="flex">

        <div class="w-3/4 pr-10">
        
            <x-edit-category-buttons :category="$category" />
            <h2>Change category image</h2>
            <x-alerts/>

            <form id="form" action="{{url('dashboard/categories/'.$category->hex.'/image/update')}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-block">
                    <label>Upload image file</label>
                    <input aria-describedby="image_help" id="image" name="image" type="file">
                    <div class="text-input-advice" id="image_help">
                        Accepted files formats (.jpg, .png) up to 5 MB filesize.
                    </div>
                    @error('image')
                        <p class="text-error">{{$message}}</p>
                    @enderror
                </div>
            </form>

        </div>

        <div class="w-1/4">
            <x-module-category-details :details="$category->details" />
        </div>
    </div>

    <script>
        document.getElementById("image").onchange = function() {
            document.getElementById("form").submit();
        };
    </script>
    
</x-dashboard-layout>
