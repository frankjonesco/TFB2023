<form action="{{url('rankings/search')}}" method="POST">
    @csrf
    <label for="search_term" class="font-bold">
        Company name
    </label>
    <input type="text" name="search_term" placeholder="Company name" value="{{old('search_term') ?: $search_term}}" class="public-input">
    @error('search_term')
        <p class="text-error">
            {{$message}}
        </p>
    @enderror
                        
    <div class="grid grid-cols-3 gap-3 my-3">
        <div>
            <label for="search_year" class="font-bold">
                Year
            </label>
            <select name="search_year" class="public-select">
                <option value="all">All years</option>
                @foreach(rankingYears() as $year)
                    <option value="{{$year}}" {{$search_year ? $search_year == $year ? 'selected' : null : null}}>{{$year}}</option>
                @endforeach
            </select>
            @error('search_year')
                <p class="text-error">
                    {{$message}}
                </p>
            @enderror
        </div>
        <div>
            <label for="search_order_by" class="font-bold">
                Order by
            </label>
            <select name="search_order_by" class="public-select">
                <option value="rankings.turnover" {{$search_order_by ? $search_order_by === 'rankings.turnover' ? 'selected' : null : null}}>Turnover</option>
                <option value="rankings.employees" {{$search_order_by ? $search_order_by === 'rankings.employees' ? 'selected' : null : null}}>Employees</option>
                <option value="companies.registered_name" {{$search_order_by ? $search_order_by === 'companies.registered_name' ? 'selected' : null : null}}>Company name</option>
                <option value="companies.family_name" {{$search_order_by ? $search_order_by === 'companies.family_name' ? 'selected' : null : null}}>Family name</option>
                <option value="companies.founded_in" {{$search_order_by ? $search_order_by === 'companies.founded_in' ? 'selected' : null : null}}>Founded</option>
            </select>
            @error('search_order_by')
                <p class="text-error">
                    {{$message}}
                </p>
            @enderror
        </div>
        <div>
            <label for="search_sort_direction" class="font-bold">
                Sort direction
            </label>
            <select name="search_sort_direction" class="public-select">
                <option value="DESC" {{$search_sort_direction ? $search_sort_direction === 'DESC' ? 'selected' : null : null}}>Descending</option>
                <option value="ASC" {{$search_sort_direction ? $search_sort_direction === 'ASC' ? 'selected' : null : null}}>Ascending</option>
            </select>
            @error('search_sort_direction')
                <p class="text-error">
                    {{$message}}
                </p>
            @enderror
        </div>
    </div>
    <button type="submit" class="btn-black mt-1.5 !text-xs">
        <i class="fa-solid fa-magnifying-glass mr-1.5"></i>
        Search
    </button>
</form>