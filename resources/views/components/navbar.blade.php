<nav class="border-b border-gray-600 bg-indigo-400 dark:bg-slate-900 {{request()->segment(1) == 'dashboard' ? 'mb-0' : 'mb-5'}}">
    <div class="px-6 flex flex-wrap items-center justify-between mx-auto">
        
        <a href="/" class="flex items-center">
            <img src="{{asset('images/top-family-business-logo.png')}}" class="h-6 py-4 mr-3 sm:h-24" alt="Top Family Business Logo" />
        </a>

        <button data-collapse-toggle="navbar-dropdown" type="button" class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-dropdown" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
        </button>

        <div class="hidden w-full md:block md:w-auto" id="navbar-dropdown">
            <ul class="flex flex-col py-12 space-x-8 rounded-lg bg-indigo-400 dark:bg-slate-900 md:flex-row">
                <li>
                    <a href="/" class="bg-transparent block py-2 pl-3 pr-4 rounded md:p-0 {{request()->segment(1) == null ? 'text-indigo-900 dark:text-white' : 'text-slate-800 dark:text-gray-400'}}" aria-current="page">Home</a>
                </li>
                <li>
                    <a href="/sectors" class="bg-transparent block py-2 pl-3 pr-4 rounded md:p-0 {{request()->segment(1) == 'sectors' ? 'text-indigo-800 dark:text-white' : 'text-slate-800 dark:text-gray-400'}}">Bunsiness Sectors</a>
                </li>
                <li>
                    <a href="/dashboard" class="bg-transparent block py-2 pl-3 pr-4 rounded md:p-0 {{request()->segment(1) == 'dashboard' ? 'text-indigo-800 dark:text-white' : 'text-slate-800 dark:text-gray-400'}}">Dashboard</a>
                </li>
                {{-- <li>
                    <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar" class="flex items-center justify-between w-full py-2 pl-3 pr-4 font-medium text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:w-auto dark:text-gray-400 dark:hover:text-white dark:focus:text-white dark:border-gray-700 dark:hover:bg-gray-700 md:dark:hover:bg-transparent">Dropdown <svg class="w-5 h-5 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg></button>
                    <!-- Dropdown menu -->
                    <div id="dropdownNavbar" class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                        <ul class="py-1 text-sm text-gray-700 dark:text-gray-400" aria-labelledby="dropdownLargeButton">
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Settings</a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Earnings</a>
                            </li>
                        </ul>
                        <div class="py-1">
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-400 dark:hover:text-white">Sign out</a>
                        </div>
                    </div>
                </li> --}}

            </ul>
        </div>
    </div>
</nav>