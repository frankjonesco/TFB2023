<x-dashboard-layout>
    
    <div class="flex flex-row items-center">
        <h1 class="grow">Edit text</h1>
        <x-edit-category-buttons :category="$category" />
    </div>

    <x-alerts/>
    
    <form action="{{url('dashboard/categories/'.$category->hex.'/text/update')}}" method="POST">
        @csrf
        @method('PUT')
        <input type="hidden" id="inputSlug" name="slug" value="{{old('slug') ?? $category->slug}}">
        <input type="hidden" id="inputEnglishSlug" name="english_slug" value="{{old('english_slug') ?? $category->english_slug}}">

        <div class="form-block">
            <label for="name">Category name</label>
            <input 
                type="text" 
                id="name" 
                name="name" 
                placeholder="Category name" 
                value="{{old('name') ?? $category->name}}" 
                oninput="window.updateSlug(this, 'slug', 'inputSlug')"
            >
            <p class="text-slug">Slug: <span id="slug">{{$category->slug ?? 'enter text'}}</span></p>
            @error('name')
                <p class="text-error">{{$message}}</p>
            @enderror
        </div>

        <div class="form-block">
            <label for="english_name">English name</label>
            <input 
                type="text" 
                id="englishName" 
                name="english_name" 
                placeholder="English name" 
                value="{{old('english_name') ?? $category->english_name}}"
                oninput="window.updateSlug(this, 'englishSlug', 'inputEnglishSlug')"
            >
            <p class="text-slug">English slug: <span id="englishSlug">{{$category->english_slug ?? 'enter text'}}</span></p>
        </div>

        <div class="form-block">
            <label for="description">Description</label>
            <textarea 
                id="description" 
                name="description" 
                rows="4" 
                placeholder="How would you describe this category?"
            >{{old('description') ?? $category->description}}</textarea>
        </div>

        <div class="form-block">
            <label for="status">Visibility</label>
            <select id="status" name="status">
                <option value="public" class="block w-full" {{$category->status == 'public' ? 'selected' : null}}>Public</option>
                <option value="private" class="block w-full" {{$category->status == 'private' ? 'selected' : null}}>Private</option>
                <option value="unlisted" class="block w-full" {{$category->status == 'unlisted' ? 'selected' : null}}>Unlisted</option>
            </select>
            @error('status')
                <p class="text-error">You must set your visibility status.</p>
            @enderror

        </div>
        
        <div class="form-block">
            <button type="submit">
                <i class="fa-regular fa-save"></i>
                Save changes
            </button>
        </div>
    </form>   
    
</x-dashboard-layout>
