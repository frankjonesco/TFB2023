<x-dashboard-layout>
    
    <div class="flex flex-row items-center">
        <h1 class="grow">Create industy</h1>
        
    </div>

    <x-alerts/>
    
    <form action="{{url('dashboard/industries/store')}}" method="POST">
        @csrf
        <input type="hidden" id="inputSlug" name="slug" value="{{old('slug')}}">
        <input type="hidden" id="inputEnglishSlug" name="english_slug" value="{{old('english_slug')}}">

        <div class="form-block">
            <label for="name">Industry name</label>
            <input 
                type="text" 
                id="name" 
                name="name" 
                placeholder="Insutry name" 
                value="{{old('name')}}" 
                oninput="window.updateSlug(this, 'slug', 'inputSlug')"
            >
            <p class="text-slug">Slug: <span id="slug">enter text</span></p>
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
                value="{{old('english_name')}}"
                oninput="window.updateSlug(this, 'englishSlug', 'inputEnglishSlug')"
            >
            <p class="text-slug">English slug: <span id="englishSlug">enter text</span></p>
        </div>

        <div class="form-block">
            <label for="sector_id">Sector</label>
            <select name="sector_id">
                <option value="" class="block w-full" disabled selected>Which sector is this industry in?</option>
                @foreach($sectors as $sector)
                    <option value="{{$sector->id}}" {{old('sector_id') == $sector->id ? 'selected' : null}}>{{$sector->name}}</option>
                @endforeach
            </select>
            @error('sector_id')
                <p class="text-error">You must a sector for this industry.</p>
            @enderror
        </div>

        <div class="form-block">
            <label for="description">Description</label>
            <textarea 
                id="description" 
                name="description" 
                rows="4" 
                placeholder="How would you describe this industry?"
            >{{old('description')}}</textarea>
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
