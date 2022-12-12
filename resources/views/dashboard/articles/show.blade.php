<x-dashboard-layout>

    

    


    <div class="flex">

        <div class="w-2/3 pr-10">
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

            <x-edit-article-buttons :article="$article" />
            
            <div class="flex mb-7">
                <h3 class="pl-1.5 pr-5 pb-3 border-b border-sky-500 uppercase text-lg">Article details</h3>
                <span class="grow border-b border-zinc-500"></span>
            </div>
            <div class="grid grid-cols-2 gap-3">
                @foreach($article->details as $key => $detail)
                    <div>{{$detail['label']}}:</div>
                    <div>{!!$detail['result']!!}</div>
                @endforeach
            </div>

        </div>

    </div>
        

</x-dashboard-layout>
