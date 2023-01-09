<div class="sidebar-module flex flex-col items-center">
    <img src="{{$user->getImageThumbnail()}}" class="rounded-full w-32">
    <h3>{{$user->full_name}}</h3>

    <div class="flex mt-1 mb-3">
        <a href="{{url('profile/edit')}}">
            <button class="btn-plain mr-1.5">
                <i class="fa-solid fa-pencil mr-1.5"></i>
                Edit profile
            </button>
        </a>
        <a href="{{url('profile/edit/image')}}">
            <button class="btn-plain mr-1.5">
                <i class="fa-solid fa-image mr-1.5"></i>
                Change image
            </button>
        </a>
        <a href="{{url('profile/edit/settings')}}">
            <button class="btn-plain">
                <i class="fa-solid fa-gear mr-1.5"></i>
                Settings
            </button>
        </a>
    </div>

    <ul class="flex flex-col text-sm w-full">
        <li class="flex m-0 pt-3 pb-3 border-b border-gray-200 px-1.5">
            <span class="grow font-bold">Email</span>
            <span class="font-light">{{$user->email}}</span>
        </li>
        <li class="flex m-0 pt-3 pb-3 border-b border-gray-200 px-1.5">
            <span class="grow font-bold">Username</span>
            <span class="font-light">{!!$user->username ?: '<span class="no-results">Not set</span>'!!}</span>
        </li>
        <li class="flex m-0 pt-3 pb-3 border-b border-gray-200 px-1.5">
            <span class="grow font-bold">Gender</span>
            <span class="font-light capitalize">{!!$user->gender ?: '<span class="no-results">Not set</span>'!!}</span>
        </li>
        <li class="flex m-0 pt-3 pb-3 border-b border-gray-200 px-1.5">
            <span class="grow font-bold">Color</span>
            <span class="font-light">{!!$user->color ?: '<span class="no-results">Not set</span>'!!}</span>
        </li>
        <li class="flex m-0 pt-3 pb-3 border-b border-gray-200 px-1.5">
            <span class="grow font-bold">Country</span>
            <span class="font-light">{!!$user->country_iso ?: '<span class="no-results">Not set</span>'!!}</span>
        </li>
        <li class="flex m-0 pt-3 pb-3 border-b border-gray-200 px-1.5">
            <span class="grow font-bold">Account created</span>
            <span class="font-light">{{$user->created_at}}</span>
        </li>
        <li class="flex m-0 pt-3 pb-3 border-b border-gray-200 px-1.5">
            <span class="grow font-bold">Last updated</span>
            <span class="font-light">{{$user->updated_at}}</span>
        </li>
    </ul>
</div>