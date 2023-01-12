

<section id="topNav">
    <span class="weather pre-navbar-item">
        
        @if(request()->ip() != '127.0.0.1')
            @php
                $icon = 'fa-cloud-sun';

                if(runTest()->current->condition->text === 'Light rain'){
                    $icon = 'fa-cloud-rain';
                    if(runTest()->current->is_day === false){
                        $icon = 'fa-cloud-moon-rain';
                    }
                }elseif(runTest()->current->condition->text === 'Light sleet'){
                    $icon = 'fa-cloud-rain';
                    if(runTest()->current->is_day === false){
                        $icon = 'fa-cloud-moon-rain';
                    }
                }elseif(runTest()->current->condition->text === 'Moderate rain at times'){
                    $icon = 'fa-cloud-rain';
                    if(runTest()->current->is_day === false){
                        $icon = 'fa-cloud-moon-rain';
                    }
                }elseif(runTest()->current->condition->text === 'Partly cloudy'){
                    $icon = 'fa-cloud';
                    if(runTest()->current->is_day === false){
                        $icon = 'fa-cloud-moon';
                    }
                }
            @endphp

            <i class="fa-solid {{$icon}} mr-1.5"></i>
        
        
            <span class="temperature">
                @php
                    echo number_format(runTest()->current->temp_c, 1, '.', ',');
                @endphp
            </span>
            @php
                echo runTest()->location->name;
            @endphp
        @else
            <i class="fa-solid fa-cloud-moon-rain"></i>
            <span class="temperature">
                15.1
            </span>
            Berlin
        @endif
    </span>

    <span class="date pre-navbar-item">
        {{date('l, d F Y', time())}}
    </span>

    <span class="links pre-navbar-item">
        <ul>
            <li><a href="{{url('signup')}}" class="no-underline hover:text-zinc-100">Sign up / Register</a></li>
            <li><a href="{{url('blog')}}" class="no-underline hover:text-zinc-100">Blog</a></li>
            <li><a href="{{url('forum')}}" class="no-underline hover:text-zinc-100">Forum</a></li>
        </ul>
    </span>

    <span class="socials">
        <ul>
            <li class="facebook">
                <a href="https://www.facebook.com/Matchbird-GmbH-1050852385302281" target="_blank">
                    <i class="fab fa-center fa-facebook-f hover:text-zinc-100"></i>
                </a>
            </li>
            <li class="twitter">
                <a href="https://twitter.com/matchbirdgmbh" target="_blank">
                    <i class="fa-brands fa-center fa-twitter hover:text-zinc-100"></i>
                </a>
            </li>
            <li class="instagram">
                <a href="https://www.instagram.com/matchbird.gmbh/" target="_blank">
                    <i class="fa-brands fa-center fa-instagram hover:text-zinc-100"></i>
                </a>
            </li>
            <li class="linkedin">
                <a href="https://www.linkedin.com/company/matchbird" target="_blank">
                    <i class="fa-brands fa-center fa-linkedin-in hover:text-zinc-100"></i>
                </a>
            </li>
            <li class="xing">
                <a href="https://www.xing.com/pages/matchbirdgmbh" target="_blank">
                    <i class="fa-brands fa-center fa-xing hover:text-zinc-100""></i>
                </a>
            </li>
            <li class="youtube">
                <a href="https://www.youtube.com/channel/UC4GnbbnwvAnl80_cVXJRuMA" target="_blank">
                    <i class="fa-brands fa-center fa-youtube hover:text-zinc-100"></i>
                </a>
            </li>
        </ul>
    </span>
</section>
<section id="navigation">
    <div class="grow flex flex-col justify-center items-start">

        <div class="flex pb-1.5">
            <a href="{{url('/')}}" class="flex items-center">
                <img src="{{asset('images/top-family-business-logo.png')}}" class="py-4 mr-3 pr-10 w-80" alt="Top Family Business Logo" />
            </a>
            @foreach(navPartners() as $nav_partner)
                <a href="{{$nav_partner->url}}" class="flex items-center mr-10" target="_blank">
                    <img src="{{asset('images/partners/'.$nav_partner->hex.'/light-'.$nav_partner->logo)}}" alt="{{$nav_partner->name}}" class="h-9" />
                </a>
            @endforeach
        </div>

        
    </div>
    <div class="flex flex-col justify-center items-end">

        <nav id="secondaryNav">
            <button data-collapse-toggle="navbar-dropdown" type="button" class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-dropdown" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
            </button>

            <div class="hidden w-full md:block md:w-auto" id="navbar-dropdown">
                <ul class="flex flex-col space-x-4 rounded-lg md:flex-row">
                    <li>
                        <a href="{{url('/')}}" aria-current="page" class="no-underline hover-underline-small">Home</a>
                    </li>
                    <li>
                        <a href="{{url('about')}}" class="no-underline hover-underline-small">About</a>
                    </li>
                    <li>
                        <a href="{{url('contact')}}" class="no-underline hover-underline-small">Contact</a>
                    </li>

                    {{-- If user is logged in --}}
                    @auth

                        @if(auth()->user()->user_type_id > 1)
                            <li>
                                <a href="{{url('dashboard')}}" class="no-underline hover-underline-small">Dashboard</a>
                            </li>
                        @else
                            <li>
                                <a href="{{url('profile')}}" class="no-underline hover-underline-small">Profile</a>
                            </li>
                        @endif
                        
                        <li>
                            <form action="{{url('logout')}}" class="inline" method="POST">
                                @csrf
                                <a href="#" onclick="this.parentNode.submit()" class="bg-transparent block py-2 pl-3 pr-4 rounded md:p-0 no-underline hover-underline-small">Logout</a>
                            </form>
                        </li>

                    {{-- If user is not logged in --}}
                    @else
                        <li>
                            <a href="{{url('login')}}" class="no-underline hover-underline-small">Login</a>
                        </li>
                        <li>
                            <a href="{{url('signup')}}" class="no-underline hover-underline-small">Sign up</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </nav>

        
        <a href="https://www.bitrock.partners/" class="flex items-center" target="_blank">
            <img src="{{asset('images/bitrock-strip-1.jpg')}}" alt="Bitrock - Digital Patners" width="576" class="border border-zinc-400 opacity-75" />
        </a>
       
    </div>

    
</section>


<div class="w-full bg-slate-800 mx-auto" style="position: sticky !important; top: 0; z-index:9999;">
    <nav id="primaryNav">
        <div class="hidden w-full md:block md:w-auto" id="navbar-dropdown">
            <ul class="flex flex-col space-x-0 rounded-lg md:flex-row color-nav">
                <li class="!pr-0">
                    <a 
                        href="{{url('news')}}" 
                        aria-current="page" 
                        class="hover-underline border-t-pink-600"
                        style="background-size: 100% 200%; background-image: linear-gradient(to bottom, transparent 50%, rgb(219 39 119) 50%);"
                        >
                            News
                        </a>
                </li>
                <li>
                    <a
                        href="{{url('rankings')}}"
                        aria-current="page"
                        class="hover-underline border-t-sky-600"
                        style="background-size: 100% 200%; background-image: linear-gradient(to bottom, transparent 50%, rgb(2 132 199) 50%);"
                        >
                            Ranking
                        </a>
                </li>
                <li>
                    <a 
                    href="{{url('sectors')}}" 
                    aria-current="page" 
                    class="hover-underline border-t-orange-600"
                    style="background-size: 100% 200%; background-image: linear-gradient(to bottom, transparent 50%, rgb(234 88 12) 50%);"
                    >
                        Sectors
                    </a>
                </li>
                <li>
                    <a
                    href="{{url('industries')}}"
                    aria-current="page"
                    class="hover-underline border-t-emerald-600"
                    style="background-size: 100% 200%; background-image: linear-gradient(to bottom, transparent 50%, rgb(5 150 105) 50%);"
                    >
                        Industries
                    </a>
                </li>
                <li>
                    <a 
                    href="{{url('partners')}}" 
                    aria-current="page" 
                    class="hover-underline border-t-purple-600"
                    style="background-size: 100% 200%; background-image: linear-gradient(to bottom, transparent 50%, rgb(147 51 234) 50%);"
                    >
                        TOFAM Partners
                    </a>
                </li>
                <li class="grow border-t border-t-gray-600 text-right text-stone-300 pt-4 text-sm italic pr-6">
                </li>
            </ul>
        </div>
    </nav>
</div>


