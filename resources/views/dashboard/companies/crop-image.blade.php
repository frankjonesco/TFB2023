<x-dashboard-layout>
    
    <div class="flex flex-row items-center">
        <h1 class="grow">Crop image</h1>
        <x-edit-company-buttons :company="$company" />
    </div>

    <x-alerts/>

    <div class="mb-4">
        <div class="box">
            <img id="image" src="{{asset('images/companies/'.$company->hex.'/'.$company->image)}}" alt="" style="height:500px;">
        </div>
        {{-- <div class="hidden">
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
        </div> --}}

        
    </div>

    <form action="/dashboard/companies/{{$company->hex}}/image/render" method="POST">
        @csrf
        <input type="hidden" name="x" id="imgX">
        <input type="hidden" name="y" id="imgY">
        <input type="hidden" name="w" id="imgW">
        <input type="hidden" name="h" id="imgH">
        <a href="/dashboard/companies/{{$company->hex}}/image/edit">
            <button type="button">
                <i class="fa-solid fa-arrow-left"></i> 
                Upload a different image
            </button>
        </a>
        <button type="submit">
            <i class="fa-solid fa-crop"></i> 
            Crop image
        </button>
    </form>

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
