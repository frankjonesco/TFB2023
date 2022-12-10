<form action="/dashboard/sectors/{{$sector->hex}}/industries/store" method="POST">
    @csrf
    <div class="flex">
        <input type="text" name="industry_name" placeholder="Enter new industry name" class="!w-64 mr-5 @error('industry_name') !border !border-red-500 @enderror" value="{{old('industry_name')}}">
        <div class="self-center">
            <button type="submit">
                <i class="fa-solid fa-plus"></i>
                Add new industry
            </button>
        </div>
    </div>

    

    @error('industry_name')
        <p class="text-error">
            @if($errors->has('industry_name'))
                <span>
                    This sector already has an industry called '{{old('industry_name')}}'.
                </span>
            @else
                <span>
                    {{$message}}
                </span>
            @endif
        </p>
    @enderror

    
</form>