<x-layout>
    <x-container>
        <div class="flex">
            <div class="mt-6 pl-3 pr-12 w-2/3 border-r border-zinc-500">
                <div class="flex mb-7">
                    <h3 class="pl-1.5 pr-4 pb-3 border-b border-sky-500 uppercase text-lg">Company rankings</h3>
                    <span class="grow border-b border-zinc-500"></span>
                </div>
                {{-- Rankinsgs search --}}
                <div class="p-3 mb-8">
                    <form action="#" method="post">
                        <label for="name">
                            Company name
                        </label>
                        <input type="text" name="name" placeholder="Company name" value="{{old('name')}}">
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
                                <select name="year">
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
                                <select name="order_by">
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
                                <select name="sort">
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
            </div>
            <div class="mt-6 px-12 w-1/3">
                <x-module-socials />
                <x-module-matchbird-partners />

            </div>
        </div>
    </x-container>
</x-layout>