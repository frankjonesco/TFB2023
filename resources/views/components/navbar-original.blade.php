<section id="topNav">
    <span class="weather pre-navbar-item">
        <i class="fa-solid fa-cloud-moon-rain"></i>
        <span class="temperature">15.1</span>
        Düsseldorf
    </span>

    <span class="date pre-navbar-item">
        {{date('l, d F Y', time())}}
    </span>

    <span class="links pre-navbar-item">
        <ul>
            <li><a href="{{url('signup')}}" class="no-underline">Sign up / Register</a></li>
            <li><a href="{{url('blog')}}" class="no-underline">Blog</a></li>
            <li><a href="{{url('forum')}}" class="no-underline">Forum</a></li>
        </ul>
    </span>

    <span class="socials">
        <ul>
            <li class="facebook">
                <a href="https://www.facebook.com/Matchbird-GmbH-1050852385302281" target="_blank">
                    <i class="fab fa-center fa-facebook-f"></i>
                </a>
            </li>
            <li class="twitter">
                <a href="https://twitter.com/matchbirdgmbh" target="_blank">
                    <i class="fa-brands fa-center fa-twitter"></i>
                </a>
            </li>
            <li class="instagram">
                <a href="https://www.instagram.com/matchbird.gmbh/" target="_blank">
                    <i class="fa-brands fa-center fa-instagram"></i>
                </a>
            </li>
            <li class="linkedin">
                <a href="https://www.linkedin.com/company/matchbird" target="_blank">
                    <i class="fa-brands fa-center fa-linkedin-in"></i>
                </a>
            </li>
            <li class="xing">
                <a href="https://www.xing.com/pages/matchbirdgmbh" target="_blank">
                    <i class="fa-brands fa-center fa-xing"></i>
                </a>
            </li>
            <li class="youtube">
                <a href="https://www.youtube.com/channel/UC4GnbbnwvAnl80_cVXJRuMA" target="_blank">
                    <i class="fa-brands fa-center fa-youtube"></i>
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

        <nav id="primaryNav">
            <div class="hidden w-full md:block md:w-auto" id="navbar-dropdown">
                <ul class="flex flex-col space-x-8 rounded-lg md:flex-row">
                    <li>
                        <a href="{{url('news')}}" aria-current="page" class="no-underline">News</a>
                    </li>
                    <li>
                        <a href="{{url('rankings')}}" aria-current="page" class="no-underline">Ranking</a>
                    </li>
                    <li>
                        <a href="{{url('sectors')}}" aria-current="page" class="no-underline">Sectors</a>
                    </li>
                    <li>
                        <a href="{{url('industries')}}" aria-current="page" class="no-underline">Industries</a>
                    </li>
                    <li>
                        <a href="{{url('partners')}}" aria-current="page" class="no-underline">TOFAM Partners</a>
                    </li>
                </ul>
            </div>
        </nav>
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
                        <a href="{{url('/')}}" aria-current="page" class="no-underline">Home</a>
                    </li>
                    <li>
                        <a href="{{url('about')}}" class="no-underline">About</a>
                    </li>
                    <li>
                        <a href="{{url('contact')}}" class="no-underline">Contact</a>
                    </li>

                    {{-- If user is logged in --}}
                    @auth

                        @if(auth()->user()->user_type_id > 1)
                            <li>
                                <a href="{{url('dashboard')}}" class="no-underline">Dashboard</a>
                            </li>
                        @else
                            <li>
                                <a href="{{url('profile')}}" class="no-underline">Profile</a>
                            </li>
                        @endif
                        
                        <li>
                            <form action="{{url('logout')}}" class="inline" method="POST">
                                @csrf
                                <a href="#" onclick="this.parentNode.submit()" class="bg-transparent block py-2 pl-3 pr-4 rounded md:p-0 no-underline">Logout</a>
                            </form>
                        </li>

                    {{-- If user is not logged in --}}
                    @else
                        <li>
                            <a href="{{url('login')}}" class="no-underline">Login</a>
                        </li>
                        <li>
                            <a href="{{url('signup')}}" class="no-underline">Sign up</a>
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




