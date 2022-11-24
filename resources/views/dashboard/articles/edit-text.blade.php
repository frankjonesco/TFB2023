<x-dashboard-layout>
    
    <div class="flex flex-row items-center">
        <h1 class="grow">Edit text</h1>
        <x-edit-article-buttons :article="$article" />
    </div>

    <x-alerts/>
    
    <form action="/dashboard/articles/{{$article->hex}}/text/update" method="POST">
        @csrf
        @method('PUT')
        <input type="hidden" id="inputSlug" name="slug" value="{{old('slug') ?? $article->slug}}">

        <div class="form-block">
            <label for="name">Article title</label>
            <input 
                type="text" 
                id="title" 
                name="title" 
                placeholder="Article title" 
                value="{{old('name') ?? $article->title}}" 
                oninput="window.updateSlug(this, 'slug', 'inputSlug')"
            >
            <p class="text-slug">Slug: <span id="slug">{{$article->slug ?? 'enter text'}}</span></p>
            @error('title')
                <p class="text-error">{{$message}}</p>
            @enderror
        </div>

        <div class="form-block">
            <label for="category_id">Category</label>
            <select name="category_id">
                <option value="" class="block w-full" disabled selected>Which categoru is this article in?</option>
                @foreach($categories as $category)
                    <option value="{{$category->id}}" {{$article->category_id == $category->id ? 'selected' : null}}>{{$category->name}}</option>
                @endforeach
            </select>
            @error('category_id')
                <p class="text-error">You must a category for this industry.</p>
            @enderror
        </div>

        <div class="form-block">
            <label for="description">Article body</label>
            <textarea 
                id="body" 
                name="body" 
                rows="4" 
                placeholder="Main article body..."
            >{{old('description') ?? $article->body}}</textarea>
        </div>

        <div class="form-block">
            <label for="status">Visibility</label>
            <select id="status" name="status">
                <option value="public" class="block w-full" {{$article->status == 'public' ? 'selected' : null}}>Public</option>
                <option value="private" class="block w-full" {{$article->status == 'private' ? 'selected' : null}}>Private</option>
                <option value="unlisted" class="block w-full" {{$article->status == 'unlisted' ? 'selected' : null}}>Unlisted</option>
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
