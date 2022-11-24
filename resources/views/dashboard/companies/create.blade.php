<x-dashboard-layout>
    
    <div class="flex flex-row items-center">
        <h1 class="grow">Create industy</h1>
        
    </div>

    <x-alerts/>
    
    <form action="/dashboard/companies/store" method="POST">
        @csrf
        <input type="hidden" id="inputSlug" name="slug" value="{{old('slug')}}">

        <div class="form-block">
            <div class="form-block">
            <label for="registered_name">Registered name</label>
            <input 
                type="text" 
                id="registeredName"
                name="registered_name" 
                placeholder="Registered name" 
                value="{{old('name')}}" 
                oninput="window.updateCompanySlug(this, 'slug', 'inputSlug')"
            >
            @error('registered_name')
                <p class="text-error">{{$message}}</p>
            @enderror
        </div>

        <div class="form-block">
            <div class="form-block">
            <label for="trading_name">Trading name</label>
            <input 
                type="text" 
                id="tradingName"
                name="trading_name" 
                placeholder="Trading name" 
                value="{{old('name')}}" 
                oninput="window.updateCompanySlug(this, 'slug', 'inputSlug')"
            >
            <p class="text-slug">Slug: <span id="slug">enter text</span></p>
            @error('trading_name')
                <p class="text-error">{{$message}}</p>
            @enderror
        </div>


        <div class="form-block">
            <label for="description">Description</label>
            <textarea 
                id="description" 
                name="description" 
                rows="4" 
                placeholder="How would you describe this company?"
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
                Create company
            </button>
        </div>
    </form>   
    
</x-dashboard-layout>
