<x-layout-heading heading="Slide tables" class="heading-mt" />

<div class="grid grid-cols-2 gap-8 border-b border-gray-100 mb-3">
    <div>
        @foreach($articles['first'] as $article)
            @if($loop->first)
                <div class="bg-no-repeat bg-cover bg-center px-4 py-5 mb-1.5 flex flex-col justify-end overflow-hidden h-72" style="background-image:linear-gradient(to bottom, rgba(245, 246, 252, 0.0), rgba(0, 0, 0, 0.55)), url('{{asset('images/articles/'.$article->hex.'/'.$article->image)}}');">
                    <div class="flex flex-col justify-center items-center h-full">
                        <h3 class="pt-3 pb-3 text-center">
                            <a href="/news/articles/{{$article->hex}}/{{$article->slug}}" class="text-zinc-100 hover:!text-zinc-100 hover:!text-opacity-80">
                                {{$article->title}}
                            </a>
                        </h3>
                        <span class="text-xs italic text-zinc-100 font-light">
                            <span class="mr-3">
                                <i class="fa-regular fa-clock mr-1"></i>
                                {{showDate($article->created_at)}}
                            </span>
                            <span class="mr-6">
                                <i class="fa-regular fa-user mr-1"></i>
                                by {{$article->user->full_name}}
                            </span>
                            <span>
                                <i class="fa-regular fa-eye mr-1"></i>
                                {{$article->views}}
                            </span>
                        </span>
                    </div>
                </div>
            @else
                <div class="p-2 px-0 flex items-center border-b">
                    <a href="/news/articles/{{$article->hex}}/{{$article->slug}}">
                        <div class="bg-no-repeat bg-cover bg-center w-24 h-20 mr-4 border hover:border-gray-400" style="background-image:linear-gradient(to bottom, rgba(245, 246, 252, 0.0), rgba(0, 0, 0, 0.20)), url('{{asset($article->getImageThumbnail())}}');"></div>
                    </a>
                                
                    <div class="post-content overflow-hidden">
                        <div class="text-sm p-0 mb-2">
                            <h4 class="text-gray-500 text-sm font-bold">
                                <a href="/news/articles/{{$article->hex}}/{{$article->slug}}" class="text-slate-900 hover:!text-red-500">
                                    {{$article->title}}
                                </a>
                            </h4>
                        </div>
                        <ul class="post-tags">
                            <li class="text-xs italic text-gray-400"><i class="fa-regular fa-clock mr-1"></i>{{showDate($article->created_at)}}</li>
                        </ul>
                    </div>
                </div>
            @endif
        @endforeach
    </div>

    <div>
        @foreach($articles['second'] as $article)
            @if($loop->first)
                <div class="bg-no-repeat bg-cover bg-center px-4 py-5 mb-1.5 flex flex-col justify-end overflow-hidden h-72" style="background-image:linear-gradient(to bottom, rgba(245, 246, 252, 0.0), rgba(0, 0, 0, 0.55)), url('{{asset('images/articles/'.$article->hex.'/'.$article->image)}}');">
                    <div class="flex flex-col justify-center items-center h-full">
                        <h3 class="pt-3 pb-3 text-center">
                            <a href="/news/articles/{{$article->hex}}/{{$article->slug}}" class="text-zinc-100 hover:!text-zinc-100 hover:!text-opacity-80">
                                {{$article->title}}
                            </a>
                        </h3>
                        <span class="text-xs italic text-zinc-100 font-light">
                            <span class="mr-3">
                                <i class="fa-regular fa-clock mr-1"></i>
                                {{showDate($article->created_at)}}
                            </span>
                            <span class="mr-6">
                                <i class="fa-regular fa-user mr-1"></i>
                                by {{$article->user->full_name}}
                            </span>
                            <span>
                                <i class="fa-regular fa-eye mr-1"></i>
                                {{$article->views}}
                            </span>
                        </span>
                    </div>
                </div>
            @else
                <div class="p-2 px-0 flex items-center border-b">
                    <a href="/news/articles/{{$article->hex}}/{{$article->slug}}">
                        <div class="bg-no-repeat bg-cover bg-center w-24 h-20 mr-4 border hover:border-gray-400" style="background-image:linear-gradient(to bottom, rgba(245, 246, 252, 0.0), rgba(0, 0, 0, 0.20)), url('{{asset($article->getImageThumbnail())}}');"></div>
                    </a>
                                
                    <div class="post-content overflow-hidden">
                        <div class="text-sm p-0 mb-2">
                            <h4 class="text-gray-500 text-sm font-bold">
                                <a href="/news/articles/{{$article->hex}}/{{$article->slug}}" class="text-slate-900 hover:!text-red-500">
                                    {{$article->title}}
                                </a>
                            </h4>
                        </div>
                        <ul class="post-tags">
                            <li class="text-xs italic text-gray-400"><i class="fa-regular fa-clock mr-1"></i>{{showDate($article->created_at)}}</li>
                        </ul>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
        
</div>
<script>
    function gridMouseOver(id) {
        document.getElementById('title_' + id).classList.remove('bg-zinc-900', 'bg-opacity-70');
        document.getElementById('title_' + id).classList.add('bg-red-500', 'bg-opacity-90');
    } 
    function gridMouseOut(id) {
        document.getElementById('title_' + id).classList.remove('bg-red-500', 'bg-opacity-90');
        document.getElementById('title_' + id).classList.add('bg-zinc-900', 'bg-opacity-70');
    } 
</script>