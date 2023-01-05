<div class="mt-8 flex border-t border-gray-200 border-b">
    <div class="w-1/2 border-r border-gray-200">
        <div class="flex items-center px-8 py-8">
            <a href="{{$articles[0]->link()}}">
                <div class="bg-no-repeat bg-cover bg-center w-28 h-20 mr-6 border hover:border-gray-400" style="background-image:linear-gradient(to bottom, rgba(245, 246, 252, 0.0), rgba(0, 0, 0, 0.50)), url('{{asset($articles[0]->getImageThumbnail())}}');"></div>
            </a>
            <div class="post-content overflow-hidden">
                <div class="text-sm p-0 mb-2">
                    <h4 class="text-gray-500 text-xs font-bold">
                        <a href="{{$articles[0]->link()}}" class="text-slate-900 hover:!text-red-500">
                            {{$articles[0]->title}}
                        </a>
                    </h4>
                </div>
                <ul class="post-tags">
                    <li class="text-xs italic text-gray-400"><i class="fa-regular fa-clock mr-1"></i>{{showDate($articles[0]->created_at)}}</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="w-1/2">
        <div class="flex flex-row-reverse items-center px-8 py-8 w-full">
            <a href="{{$articles[1]->link()}}">
                <div class="bg-no-repeat bg-cover bg-center w-28 h-20 ml-6 border hover:border-gray-400" style="background-image:linear-gradient(to bottom, rgba(245, 246, 252, 0.0), rgba(0, 0, 0, 0.50)), url('{{asset($articles[1]->getImageThumbnail())}}');"></div>
            </a>
            <div class="post-content overflow-hidden text-left w-full">
                <div class="text-sm p-0 mb-2">
                    <h4 class="text-gray-500 text-xs font-bold">
                        <a href="{{$articles[1]->link()}}" class="text-slate-900 hover:!text-red-500">
                            {{$articles[1]->title}}
                        </a>
                    </h4>
                </div>
                <ul class="post-tags">
                    <li class="text-xs italic text-gray-400"><i class="fa-regular fa-clock mr-1"></i>{{showDate($articles[1]->created_at)}}</li>
                </ul>
            </div>
        </div>
    </div>
</div>