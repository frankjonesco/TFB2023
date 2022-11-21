<x-dashboard-layout>
    <x-admin-sector-header :sector="$sector"/>
    

    <form action="/dashboard/sectors/{{$sector->hex}}/text/update" method="POST">
        @csrf
        @method('PUT')
        <input type="hidden" id="inputSlug" name="slug" value="{{old('slug') ?? $sector->slug}}">
        <input type="hidden" id="inputEnglishSlug" name="english_slug" value="{{old('english_slug') ?? $sector->english_slug}}">

        <div class="mb-6">
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sector name</label>
            <input type="text" id="name" name="name" class="border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500" placeholder="Sector name" value="{{old('name') ?? $sector->name}}" oninput="window.updateSlug(this, 'slug', 'inputSlug')">
            <p class="mt-2 text-xs font-light text-green-600 dark:text-green-500">Slug: <span id="slug">{{$sector->slug}}</span></p>
            @error('name')
                <p class="mt-2 text-xs font-light text-red-600 dark:text-red-500">Please enter a name.</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="english_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">English name</label>
            <input type="text" id="englishName" name="english_name" class="border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500" placeholder="English name" value="{{old('english_name') ??$sector->english_name}}" oninput="window.updateSlug(this, 'englishSlug', 'inputEnglishSlug')">
            <p class="mt-2 text-xs font-light text-green-600 dark:text-green-500">English slug: <span id="englishSlug">{{$sector->english_slug ?? 'enter text'}}</span></p>
        </div>

        <div class="mb-6">
            <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
            <textarea id="description" name="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="How would you describe this sector?">{{old('description') ?? $sector->description}}</textarea>
        </div>

        <div class="mb-6">
            <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Visibility</label>
            <select id="status" name="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 flex w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="public" class="block w-full">Public</option>
                <option value="private" class="block w-full">Private</option>
                <option value="unlisted" class="block w-full">Unlisted</option>
            </select>
            @error('status')
                <p class="mt-2 text-xs font-light text-red-600 dark:text-red-500">You must select a visibility setting.</p>
            @enderror

        </div>
        
        <div class="mb-6">
            <button type="submit" class="btn">
                <i class="fa-regular fa-save"></i>
                Save changes
            </button>
        </div>
    </form>   
    
</x-dashboard-layout>
