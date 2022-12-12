<x-layout>
    <x-container>
        {{-- Featured articles --}}
        <div class="flex">
            <div class="mt-6 pl-3 pr-12 w-2/3 border-r border-zinc-500">
                <span class="bg-indigo-500 w-max px-2 py-1 rounded-lg text-sm font-bold">
                    Top Stories
                </span>

                <h1>
                    {{$article->title}}
                </h1>

                
                <span class="text-sm italic">
                    <span class="mr-6">
                        <i class="fa-regular fa-clock mr-1"></i>
                        {{showDate($article->created_at)}}
                    </span>
                    <span class="mr-6">
                        <i class="fa-regular fa-user mr-1"></i>
                        by {{$article->user->full_name}}
                    </span>
                    <span class="mr-6">
                        <i class="fa-regular fa-comments mr-1"></i>
                        {{count($article->comments)}} comments
                    </span>
                    <span>
                        <i class="fa-regular fa-eye mr-1"></i>
                        {{$article->views}}
                    </span>
                </span>
                

                <img src="{{asset('images/articles/'.$article['hex'].'/'.$article['image'])}}" alt="" class="w-full mt-6">

                <span>
                    {{$article->image_caption}}
                </span>

                {!!$article->body!!}

                {!!$article->teaser!!}
                
                <div class="flex mb-7">
                    <h3 class="pl-1.5 pr-4 pb-3 border-b border-sky-500 uppercase text-lg">You may also like</h3>
                    <span class="grow border-b border-zinc-500"></span>
                </div>
            </div>

            <div class="mt-6 px-12 w-1/3">
                <div class="flex mb-7">
                    <h3 class="pl-1.5 pr-5 pb-3 border-b border-sky-500 uppercase text-lg">Stay connected</h3>
                    <span class="grow border-b border-zinc-500"></span>
                </div>

                <span class="socials content-center">
                    <ul class="flex space-x-8 text-5xl w-min mx-auto">
                        <li class="facebook"><a href="https://www.facebook.com/Matchbird-GmbH-1050852385302281" target="_blank" class="text-zinc-100 hover:!text-zinc-300"><i class="fab fa-center fa-facebook-f"></i></a></li>
                        <li class="twitter"><a href="https://twitter.com/matchbirdgmbh" target="_blank" class="text-zinc-100 hover:!text-zinc-300"><i class="fa-brands fa-center fa-twitter"></i></a></li>
                        <li class="instagram"><a href="https://www.instagram.com/matchbird.gmbh/" target="_blank" class="text-zinc-100 hover:!text-zinc-300"><i class="fa-brands fa-center fa-instagram"></i></a></li>
                        <li class="linkedin"><a href="https://www.linkedin.com/company/matchbird" target="_blank" class="text-zinc-100 hover:!text-zinc-300"><i class="fa-brands fa-center fa-linkedin-in"></i></a></li>
                        <li class="xing"><a href="https://www.xing.com/pages/matchbirdgmbh" target="_blank" class="text-zinc-100 hover:!text-zinc-300"><i class="fa-brands fa-center fa-xing"></i></a></li>
                        <li class="youtube"><a href="https://www.youtube.com/channel/UC4GnbbnwvAnl80_cVXJRuMA" target="_blank" class="text-zinc-100 hover:!text-zinc-300"><i class="fa-brands fa-center fa-youtube"></i></a></li>
                    </ul>
                </span>

                
            </div>

        </div>

    </x-container>
</x-layout>