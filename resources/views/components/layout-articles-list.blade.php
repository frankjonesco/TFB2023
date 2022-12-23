<div class="flex mb-7 mt-16">
    <h3 class="pr-2 pb-3 border-b border-red-500 uppercase text-sm text-gray-800">Latest articles</h3>
    <span class="grow border-b border-gray-200"></span>
</div>

<div class="flex flex-col border-b border-gray-100 mb-3">
    @foreach($articles as $article)
        <div class="flex items-center border-b border-gray-200 mb-5 pb-5 text-gray-500">
            <a href="/news/articles/{{$article->hex}}/{{$article->slug}}" class="!text-gray-200 hover:!text-gray-200">
                <div id="{{$article->hex}}" onmouseover="gridMouseOver(this.id)" onmouseout="gridMouseOut(this.id)" class="w-72 h-56 mr-6 bg-no-repeat bg-cover bg-center flex flex-col justify-end overflow-hidden" style="background-image: url('{{asset('images/articles/'.$article->hex.'/'.$article->image)}}');"></div>
            </a>
            <div>
                <h3 class="pt-0 pb-2">
                    <a href="/news/articles/{{$article->hex}}/{{$article->slug}}" class="text-slate-700 hover:!text-red-500">{{$article->title}}</a>
                </h3>
                <span class="text-xs italic">
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
                <p class="mt-2.5">{{truncate(strip_tags($article->body), 160)}}</p>
                <a href="/news/articles/{{$article->hex}}/{{$article->slug}}" class="text-slate-700 hover:!text-red-500">
                    <button class="btn btn-plain"><i class="fa-solid fa-arrow-right mr-1.5"></i>Read more</button>
                </a>
            </div>
        </div>
    @endforeach
</div>

<x-pagination-public table="articles" :results="$articles" />