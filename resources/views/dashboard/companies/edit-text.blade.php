<x-dashboard-layout>
    <script src="https://cdn.ckeditor.com/ckeditor5/35.3.2/super-build/ckeditor.js"></script>
    <div class="flex w-full">
        <div class="w-3/4 pr-10">
            <x-edit-company-buttons :company="$company" />
            <h2 class="grow">
                Edit company
            </h2>
            <x-alerts/>
            <form action="/dashboard/companies/store" method="POST">
                @csrf
                <input type="hidden" id="inputSlug" name="slug" value="{{old('slug') ?? $company->slug}}">

                {{-- Registered name --}}
                <div class="form-block">
                    <label for="registered_name">Registered name</label>
                    <input 
                        type="text" 
                        id="registeredName"
                        name="registered_name" 
                        placeholder="Registered name" 
                        value="{{old('name') ?? $company->registered_name}}" 
                        oninput="window.updateCompanySlug(this, 'slug', 'inputSlug')"
                    >
                    @error('registered_name')
                        <p class="text-error">{{$message}}</p>
                    @enderror
                </div>

                {{-- Trading name --}}
                <div class="form-block">
                    <label for="trading_name">Trading name</label>
                    <input 
                        type="text" 
                        id="tradingName"
                        name="trading_name" 
                        placeholder="Trading name" 
                        value="{{old('trading_name') ?? $company->trading_name}}" 
                        oninput="window.updateCompanySlug(this, 'slug', 'inputSlug')"
                    >
                    <p class="text-slug">Slug: <span id="slug">{{old('slug') ?? $company->slug}}</span></p>
                    @error('trading_name')
                        <p class="text-error">{{$message}}</p>
                    @enderror
                </div>

                {{-- Parent organisation --}}
                <div class="form-block">
                    <label for="parent_organization">Parent organisation</label>
                    <input 
                        type="text" 
                        name="parent_organization" 
                        placeholder="Parent organisation" 
                        value="{{old('parent_organization') ?? $company->parent_organization}}" 
                    >
                    @error('parent_organization')
                        <p class="text-error">{{$message}}</p>
                    @enderror
                </div>

                {{-- Description --}}
                <div class="form-block">
                    <label for="description">Description</label>
                    @include('includes._ck-editor-styles')
                    <textarea 
                        id="editor" 
                        name="description" 
                        rows="4" 
                        placeholder="How would you describe this company?"
                    >{{old('description') ?? $company->description}}</textarea>
                </div>

                {{-- Website --}}
                <div class="form-block">
                    <label for="website">Website</label>
                    <input 
                        type="text" 
                        name="website" 
                        placeholder="Website" 
                        value="{{old('website') ?? $company->website}}" 
                    >
                    @error('website')
                        <p class="text-error">{{$message}}</p>
                    @enderror
                </div>

                {{-- Headquarters --}}
                <div class="form-block">
                    <label for="headquarters">Headquarters</label>
                    <input 
                        type="text" 
                        name="headquarters" 
                        placeholder="Headquarters" 
                        value="{{old('headquarters') ?? $company->headquarters}}" 
                    >
                    @error('headquarters')
                        <p class="text-error">{{$message}}</p>
                    @enderror
                </div>

                {{-- Visibility --}}
                <div class="form-block">
                    <label for="status">Visibility</label>
                    <select id="status" name="status">
                        <option value="public" class="block w-full" {{$company->status == 'public' ? 'selected' : null}}>Public</option>
                        <option value="private" class="block w-full" {{$company->status == 'private' ? 'selected' : null}}>Private</option>
                        <option value="unlisted" class="block w-full" {{$company->status == 'unlisted' ? 'selected' : null}}>Unlisted</option>
                    </select>
                    @error('status')
                        <p class="text-error">You must set your visibility status.</p>
                    @enderror
                </div>
                
                {{-- Submit --}}
                <div class="form-block">
                    <button type="submit">
                        <i class="fa-regular fa-save"></i>
                        Save changes
                    </button>
                </div>

            </form>
        </div>
        <div class="w-1/4">
            <x-company-modules :company="$company" />
        </div>
    </div>
    @include('includes._ck-editor-settings')
</x-dashboard-layout>