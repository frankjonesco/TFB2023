<div class="flex items-center">
    <a href="{{url('dashboard/users/'.$user->hex)}}">
        <img src="{{$user->getImageThumbnail()}}" alt="{{$user->full_name}}" title="{{$user->full_name}}" class="profile-pic-sm-round" style="border-color: #{{$user->color->code}};">
    </a>
</div>