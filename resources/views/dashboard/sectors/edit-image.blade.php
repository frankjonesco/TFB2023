<x-dashboard-layout>
    <x-admin-sector-header :sector="$sector"/>
    <form action="/dashboard/sectors/{{$sector->hex}}/image/update" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-6">
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="image">Upload file</label>
            <input class="block w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 p-2" aria-describedby="image_help" id="image" name="image" type="file">
            <div class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="image_help">Sector images are used for the public facing content.</div>
            @error('image')
                <p class="mt-2 text-xs font-light text-red-600 dark:text-red-500">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-6">
            <button type="submit" class="btn">
                <i class="fa-solid fa-upload"></i>
                Upload image
            </button>
        </div>
    </form>
    
</x-dashboard-layout>
