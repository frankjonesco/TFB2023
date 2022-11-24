<x-dashboard-layout>
    
    <div class="flex flex-row items-center">
        <h1 class="grow">Create article</h1>
        
    </div>

    <x-alerts/>
    
    <form action="/dashboard/articles/store" method="POST">
        @csrf
        <input type="hidden" id="inputSlug" name="slug" value="{{old('slug')}}">

        <div class="form-block">
            <label for="title">Article title</label>
            <input 
                type="text" 
                id="title" 
                name="title" 
                placeholder="Article title" 
                value="{{old('title')}}" 
                oninput="window.updateSlug(this, 'slug', 'inputSlug')"
            >
            <p class="text-slug">Slug: <span id="slug">enter text</span></p>
            @error('title')
                <p class="text-error">{{$message}}</p>
            @enderror
        </div>

        <div class="form-block">
            <label for="category_id">Category</label>
            <select name="category_id">
                <option value="" class="block w-full" disabled selected>Which category is this article in?</option>
                @foreach($categories as $category)
                    <option value="{{$category->id}}" {{old('category_id') == $category->id ? 'selected' : null}}>{{$category->name}}</option>
                @endforeach
            </select>
            @error('category_id')
                <p class="text-error">You must a select a category for this article.</p>
            @enderror
        </div>

        <div class="form-block">
            <label for="body">Article body</label>
            <textarea 
                id="body" 
                name="body" 
                rows="4" 
                placeholder="Main article body..."
            >{{old('body')}}</textarea>
        </div>

        <div class="form-block">
            <label for="status">Visibility</label>
            <select id="status" name="status">
                <option value="public" class="block w-full" {{old('status') == 'public' ? 'selected' : null}}>Public</option>
                <option value="private" class="block w-full" {{old('status') == 'private' ? 'selected' : null}}>Private</option>
                <option value="unlisted" class="block w-full" {{old('status') == 'unlisted' ? 'selected' : null}}>Unlisted</option>
            </select>
            @error('status')
                <p class="text-error">You must set your visibility status.</p>
            @enderror
        </div>
        
        <div class="form-block">
            <button type="submit">
                <i class="fa-regular fa-save"></i>
                Create industry
            </button>
        </div>
    </form>   
    
</x-dashboard-layout>
