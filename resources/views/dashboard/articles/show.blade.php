<x-dashboard-layout>

    <div class="flex">

        <div class="w-2/3 pr-10">
            
            <x-edit-article-buttons :article="$article" />
            <h2 class="grow">{{$article->title}}</h2>

            <x-alerts/>
            
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

        </div>

        <div class="w-1/3">
            
            <x-module-article-details :details="$article->details" />

        </div>

    </div>
        

</x-dashboard-layout>
