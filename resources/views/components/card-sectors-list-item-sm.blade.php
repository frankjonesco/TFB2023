<div class="w-full m-1 border border-gray-200 p-2.5 bg-zinc-50">
    <a href="{{$sector->link()}}">
        <img src="{{$sector->getImageThumbnail()}}" class="w-full">
    </a>
    <h5 class="font-bold text-sm mx-1 mt-2.5">
        <a href="{{$sector->link()}}" class="plain">
            {{$sector->name}}
        </a>
    </h5>
    <ul class="flex flex-col text-xs mx-1 mt-1.5">
        <li class="flex my-0.5">
            <span class="grow">Companies</span>
            <span>{{count($sector->companies)}}</span>
        </li>
        <li class="flex my-0.5">
            <span class="grow">Industries</span>
            <span>{{count($sector->industries)}}</span>
        </li>
    </ul>
    <a href="{{$sector->link()}}" class="mt-3 block">
        <button class="btn btn-plain whitespace-nowrap w-full">
            <i class="fa-solid fa-building mr-1 text-sky-600"></i>
            View companies
        </button>
    </a>
</div> 