<x-dashboard-layout>
    
    <div class="flex flex-row items-center">
        <h1 class="grow">Edit text</h1>
        <x-edit-industry-buttons :industry="$industry" />
    </div>

    <x-alerts/>
    
    <form action="{{url('dashboard/industries/'.$industry->hex.'/text/update')}}" method="POST">
        @csrf
        @method('PUT')
        <input type="hidden" id="inputSlug" name="slug" value="{{old('slug') ?? $industry->slug}}">
        <input type="hidden" id="inputEnglishSlug" name="english_slug" value="{{old('english_slug') ?? $industry->english_slug}}">

        <div class="form-block">
            <label for="name">Industry name</label>
            <input 
                type="text" 
                id="name" 
                name="name" 
                placeholder="Industry name" 
                value="{{old('name') ?? $industry->name}}" 
                oninput="window.updateSlug(this, 'slug', 'inputSlug')"
            >
            <p class="text-slug">Slug: <span id="slug">{{$industry->slug ?? 'enter text'}}</span></p>
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
                value="{{old('english_name') ?? $industry->english_name}}"
                oninput="window.updateSlug(this, 'englishSlug', 'inputEnglishSlug')"
            >
            <p class="text-slug">English slug: <span id="englishSlug">{{$industry->english_slug ?? 'enter text'}}</span></p>
        </div>

        <div class="form-block">
            <label for="sector_id">Sector</label>
            <select name="sector_id">
                <option value="" class="block w-full" disabled selected>Which sector is this industry in?</option>
                @foreach($sectors as $sector)
                    <option value="{{$sector->id}}" {{$industry->sector_id == $sector->id ? 'selected' : null}}>{{$sector->name}}</option>
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
            >{{old('description') ?? $industry->description}}</textarea>
        </div>

        <div class="form-block">
            <label for="user_id">Owner</label>
            <select id="userId" name="user_id">
                <option value="">Unclaimed</option>
                @foreach($users as $user)
                    @if(old('user_id'))
                        <option value="{{$user->id}}" {{$user->id == old('user_id') ? 'selected' : null}}>{{$user->full_name}}</option>
                    @else
                        <option value="{{$user->id}}" {{$user->id == $industry->user_id ? 'selected' : null}}>{{$user->full_name}}</option>
                    @endif
                @endforeach
            </select>
            @error('user_id')
                <p class="text-error">{{$message}}</p>
            @enderror
        </div>

        <div class="form-block">
            <label for="status">Visibility</label>
            <select id="status" name="status">
                <option value="public" class="block w-full" {{$industry->status == 'public' ? 'selected' : null}}>Public</option>
                <option value="private" class="block w-full" {{$industry->status == 'private' ? 'selected' : null}}>Private</option>
                <option value="unlisted" class="block w-full" {{$industry->status == 'unlisted' ? 'selected' : null}}>Unlisted</option>
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
