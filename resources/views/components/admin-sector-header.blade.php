<div class="flex flex-row items-center">
    <h1 class="grow">Sector: {{$sector->name}}</h1>
    <a href="/dashboard/sectors/{{$sector->hex}}/text/edit">
            
        <button>
            <i class="fa-solid fa-marker"></i>
            Edit
        </button>
    </a>
    <a href="/dashboard/sectors/{{$sector->hex}}/image/edit">
        <button>
            <i class="fa-regular fa-image"></i>
            Change image
        </button>
    </a>
    <a href="">
        <button>
            <i class="fa-regular fa-trash-alt"></i>
            Delete
        </button>
    </a>
</div>

<x-alerts/>
