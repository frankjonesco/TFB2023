<x-dashboard-layout>
    <x-admin-sector-header :sector="$sector"/>

    <div class="mb-6">
        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="image">Upload file</label>
        <input class="block w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 p-2" aria-describedby="image_help" id="image" type="file">
        <div class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="image_help">Sector images are used for the public facing content.</div>
    </div>

    <div class="mb-6">
        <button type="submit" class="btn">
            <i class="fa-solid fa-upload"></i>
            Upload image
        </button>
    </div>

   
</x-dashboard-layout>
