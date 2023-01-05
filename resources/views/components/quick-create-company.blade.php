<form action="{{url('dashboard/sectors/'.$sector->hex.'/industries/'.$industry->hex.'/companies/store')}}" method="POST">
    @csrf
    <div class="flex">
        <input type="text" name="company_name" placeholder="Enter new company name" class="!w-64 mr-5 text-sm !p-2 @error('company_name') !border !border-red-500 @enderror" value="{{old('company_name')}}">
        <div class="self-center">
            <button type="submit">
                <i class="fa-solid fa-plus"></i>
                Add new company
            </button>
        </div>
    </div>
    @error('company_name')
        <p class="text-error">
            @if($errors->has('company_name'))
                <span>
                    This sector already has an industry called '{{old('company_name')}}'.
                </span>
            @else
                <span>
                    {{$message}}
                </span>
            @endif
        </p>
    @enderror
</form>