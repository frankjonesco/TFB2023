<x-dashboard-layout>
    <x-admin-sector-header :sector="$sector"/>
    <div class="flex flex-row">
        <div class="box grow">
            <img id="image" src="{{asset('images/sectors/'.$sector->hex.'/'.$sector->image)}}" alt="" class="block" style="max-width: 100%;">
            <form action="/dashboard/sectors/{{$sector->hex}}/image/render" method="POST">
                @csrf
                <input type="text" name="x" id="imgX" value="0" class="border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500">
                <input type="text" name="y" id="imgY" value="0" class="border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500">
                <input type="text" name="w" id="imgW" value="0" class="border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500">
                <input type="text" name="h" id="imgH" value="0" class="border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500">
                <a href="/dashboard/sectors/{{$sector->hex}}/image/edit">
                    <button type="button" class="btn"><i class="fa-solid fa-arrow-left"></i> Upload a different image</button>
                </a>
                <button type="submit" class="btn mt-4"><i class="fa-solid fa-crop"></i> Crop image</button>
            </form>
        </div>
        <div class="hidden">
            <button><i class="fa-solid fa-rotate-right mr-0"></i></button>
            <button><i class="fa-solid fa-rotate-left mr-0"></i></button>

            <button><i class="fa-solid fa-magnifying-glass-plus mr-0"></i></button>
            <button><i class="fa-solid fa-magnifying-glass-minus mr-0"></i></button>

            <button><i class="fa-solid fa-arrow-left mr-0"></i></button>
            <button><i class="fa-solid fa-arrow-right mr-0"></i></button>
            <button><i class="fa-solid fa-arrow-up mr-0"></i></button>
            <button><i class="fa-solid fa-arrow-down mr-0"></i></button>

            <button><i class="fa-solid fa-arrows-left-right mr-0"></i></button>
            <button><i class="fa-solid fa-arrows-up-down mr-0"></i></button>

            <button><i class="fa-solid fa-rotate mr-0"></i></button>
            <button><i class="fa-solid fa-upload mr-0"></i></button>
        </div>
    </div>



    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/cropper/2.3.4/cropper.min.css'>



    <script src='https://cdnjs.cloudflare.com/ajax/libs/cropperjs/0.8.1/cropper.min.js'></script>

    <script>
        const image = document.getElementById('image');
        const cropper = new Cropper(image, {
            viewMode: 2,
            aspectRatio: 867 / 423,
            autoCropArea: 0.8,
            movable: false,
            scalable: false,
            zoomable: false,
            crop(event) {
                document.getElementById('imgX').value=event.detail.x;
                document.getElementById('imgY').value=event.detail.y;
                document.getElementById('imgW').value=event.detail.width;
                document.getElementById('imgH').value=event.detail.height;
                // console.log(event.detail.x);
                // console.log(event.detail.y);
                // console.log(event.detail.width);
                // console.log(event.detail.height);
                // console.log(event.detail.rotate);
                // console.log(event.detail.scaleX);
                // console.log(event.detail.scaleY);
            },
        });
    </script>


</x-dashboard-layout>
