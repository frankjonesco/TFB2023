<x-dashboard-layout>
    <script src="https://cdn.ckeditor.com/ckeditor5/35.3.2/super-build/ckeditor.js"></script>

    <div class="flex">

        <div class="w-3/4 pr-10">

            <div class="flex justify-start buttons-mr mt-4">
                <a href="/dashboard/articles">   
                    <button>
                        <i class="fa-solid fa-arrow-left"></i>
                        Back to articles
                    </button>
                </a>
            </div>
            <h2>Create a new article</h2>
            <x-alerts/>
    
            <form action="/dashboard/articles/store" method="POST">
                @csrf
                <input type="hidden" id="inputSlug" name="slug" value="{{old('slug')}}">

                <div class="form-block">
                    <label for="name">Article title</label>
                    <input 
                        type="text" 
                        id="title" 
                        name="title" 
                        placeholder="Article title" 
                        value="{{old('name')}}" 
                        oninput="window.updateSlug(this, 'slug', 'inputSlug')"
                    >
                    <p class="text-slug">Slug: <span id="slug">enter-text</span></p>
                    @error('title')
                        <p class="text-error">
                            {{$message}}
                        </p>
                    @enderror
                </div>

                {{-- <div class="form-block">
                    <label for="caption">Caption</label>
                    <input 
                        type="text" 
                        id="caption" 
                        name="caption" 
                        placeholder="Caption" 
                        value="{{old('caption')}}" 
                    >
                    @error('caption')
                        <p class="text-error">
                            {{$message}}
                        </p>
                    @enderror
                </div>

                <div class="form-block">
                    <label for="teaser">Teaser</label>
                    <input 
                        type="text" 
                        id="teaser" 
                        name="teaser" 
                        placeholder="Teaser" 
                        value="{{old('teaser')}}" 
                    >
                    @error('teaser')
                        <p class="text-error">
                            {{$message}}
                        </p>
                    @enderror
                </div> --}}

                @if(count($categories) > 0)
                    <div class="form-block">
                        <label for="category_id">Category</label>
                        <select name="category_id">
                            <option value="" class="block w-full" disabled selected>Select a category</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}" {{old('category_id') == $category->id ? 'selected' : null}}>{{$category->name}}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <p class="text-error">You must a category for this industry.</p>
                        @enderror
                    </div>
                @endif
                <div class="form-block">
                    <label for="description">Article body</label>
                    @include('includes._ck-editor-styles')
                    <textarea 
                        id="editor" 
                        name="body" 
                        rows="10" 
                        placeholder="Main article body"
                    >{{old('body')}}</textarea>
                </div>

                <div class="form-block">
                    <label for="tags">Tags (separated with a comma 'tag one, tag two')</label>
                    <input 
                        type="text" 
                        id="tags" 
                        name="tags" 
                        placeholder="Tags" 
                        value="{{old('tags')}}"
                        onkeypress="return /[0-9a-zA-Z, ]/i.test(event.key)"
                    >
                    @error('tags')
                        <p class="text-error">
                            {{$message}}
                        </p>
                    @enderror
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
                        Save changes
                    </button>
                </div>
            </form>   
        
        </div>

        <div class="w-1/4">

        </div>

    </div>

    @include('includes._ck-editor-settings')
    
</x-dashboard-layout>
