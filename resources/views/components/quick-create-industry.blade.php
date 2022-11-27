<form action="/dashboard/sectors/{{$sector->hex}}/industries/store" method="POST">
    @csrf
    <div class="flex">
        <input type="text" name="industry_name" placeholder="Enter new industry name" class="!w-64 mr-5">
        <div class="self-center">
            <button type="submit">
                <i class="fa-solid fa-plus"></i>
                Add new industry
            </button>
        </div>
    </div>
    @error('industry_name')
        <p class="text-error">Please enter an industry name</p>
    @enderror
    
</form>