<x-layout>
    <x-container>
        <x-layout-main-area>
            <x-layout-heading heading="Company rankings" />
            {{-- Rankinsgs search --}}
            <div class="p-3 mb-8">
                <form action="#" method="post">
                    <label for="name">
                        Company name
                    </label>
                    <input type="text" name="name" placeholder="Company name" value="{{old('name')}}" class="public-input">
                    @error('name')
                        <p class="text-error">
                            {{$message}}
                        </p>
                    @enderror
                        
                    <div class="grid grid-cols-3 gap-3 my-3">
                        <div>
                            <label for="year">
                                Year
                            </label>
                            <select name="year" class="public-select">
                                <option value="">All years</option>
                                @foreach(rankingYears() as $year)
                                    <option value="{{$year}}">{{$year}}</option>
                                @endforeach
                            </select>
                            @error('year')
                                <p class="text-error">
                                    {{$message}}
                                </p>
                            @enderror
                        </div>
                        <div>
                            <label for="order_by">
                                Order by
                            </label>
                            <select name="order_by" class="public-select">
                                <option value="turnover">Turnover</option>
                                <option value="employees">Employees</option>
                                <option value="name">Company name</option>
                                <option value="family_name">Family name</option>
                                <option value="founded">Founded</option>
                            </select>
                            @error('year')
                                <p class="text-error">
                                    {{$message}}
                                </p>
                            @enderror
                        </div>
                        <div>
                            <label for="sort">
                                Sort direction
                            </label>
                            <select name="sort" class="public-select">
                                <option value="desc">Descending</option>
                                <option value="desc">Ascending</option>
                            </select>
                            @error('year')
                                <p class="text-error">
                                    {{$message}}
                                </p>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class=""><i class="fa-solid fa-magnifying-glass"></i> Search</button>
                </form>
            </div>
            {{-- End: Rankings search --}}

            <x-public-table-rankings :companies="$companies" />
        </x-layout-main-area>
        <x-layout-sidebar>
            <x-module-socials />
            <x-module-matchbird-partners />
        </x-layout-sidebar>
    </x-container>
</x-layout>