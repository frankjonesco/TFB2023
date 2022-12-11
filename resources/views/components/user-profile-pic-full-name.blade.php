<div class="flex items-center">
    <a href="/dashboard/users/{{$user->hex}}">
        <img src="{{$user->profile_pic}}" alt="{{$user->full_name}}" title="{{$user->full_name}}" class="profile-pic-small-round" style="border-color: #{{$user->color->code}};">
    </a>
    <a href="/dashboard/users/{{$user->hex}}">
        {{$user->full_name}}
    </a>
</div>