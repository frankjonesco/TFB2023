<footer class="mt-0 px-4 pt-12 pb-6 text-sm text-zinc-200 bg-slate-700 border-t border-t-zinc-600">
    <div class="flex justify-between border-b border-zinc-500 mx-12 mb-4">
        <div class="flex flex-col">
            <a href="{{url('')}}">
                <img src="{{asset('images/top-family-business-logo.png')}}" alt="" class="w-56">
            </a>
            <p class="w-80 my-4">
                The world's leading platform for German Family Businesses, from startup to enterprise.
            </p>

            <span class="socials mb-10">
                <ul class="flex text-2xl">
                    <li class="facebook mx-2"><a href="https://www.facebook.com/Matchbird-GmbH-1050852385302281" target="_blank" class="!text-zinc-200"><i class="fab fa-center fa-facebook-f"></i></a></li>
                    <li class="twitter mx-2"><a href="https://twitter.com/matchbirdgmbh" target="_blank" class="!text-zinc-200"><i class="fa-brands fa-center fa-twitter"></i></a></li>
                    <li class="instagram mx-2"><a href="https://www.instagram.com/matchbird.gmbh/" target="_blank" class="!text-zinc-200"><i class="fa-brands fa-center fa-instagram"></i></a></li>
                    <li class="linkedin mx-2"><a href="https://www.linkedin.com/company/matchbird" target="_blank" class="!text-zinc-200"><i class="fa-brands fa-center fa-linkedin-in"></i></a></li>
                    <li class="xing mx-2"><a href="https://www.xing.com/pages/matchbirdgmbh" target="_blank" class="!text-zinc-200"><i class="fa-brands fa-center fa-xing"></i></a></li>
                    <li class="youtube mx-2"><a href="https://www.youtube.com/channel/UC4GnbbnwvAnl80_cVXJRuMA" target="_blank" class="!text-zinc-200"><i class="fa-brands fa-center fa-youtube"></i></a></li>
                </ul>
            </span>

        </div>

                


        <div class="flex flex-col items-end">
            <a href="https://matchbird.com" target="_blank">
                <img src="{{asset('images/matchbird.png')}}" alt="" class="w-32">
            </a>
            <p class="w-96 my-4 mb-6 text-right">
                Matchbird GmbH<br>
                Zimmerstra??e 19, 40215 D??sseldorf
            </p>
            <div class="flex">
                @foreach(footerPartners() as $nav_partner)
                    <a href="{{$nav_partner->url}}" class="flex items-center ml-10" target="_blank">
                        <img src="{{asset('images/partners/'.$nav_partner->hex.'/light-'.$nav_partner->logo)}}" alt="{{$nav_partner->name}}" class="h-9" />
                    </a>
                @endforeach
            </div>
        </div>
    </div>
    <div class="text-xs mx-12">
        <div class="flex">
            <div class="grow">
                <span>{{config('meta_copyright')}} &copy; {{date('Y', time())}}</span>
                <span class="text-zinc-400 mx-1"> | </span>
                <a href="{{url('terms')}}" class="text-zinc-200 no-underline hover:underline">Terms</a>
                <span class="text-zinc-400 mx-1"> | </span>
                <a href="{{url('privacy')}}" class="text-zinc-200 no-underline hover:underline">Privacy</a>
            </div>
            <div>
                <a href="{{url('')}}" class="text-zinc-200 no-underline hover:underline">Home</a>
                <span class="text-zinc-400 mx-1"> | </span>
                <a href="{{url('about')}}" class="text-zinc-200 no-underline hover:underline">About</a>
                <span class="text-zinc-400 mx-1"> | </span>
                <a href="{{url('contact')}}" class="text-zinc-200 no-underline hover:underline">Contact</a>
            </div>
        </div>
        
    </div>
</footer>