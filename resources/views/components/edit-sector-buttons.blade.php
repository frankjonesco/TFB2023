<div class="flex justify-between mt-4">
    <a href="javascript:history.back()">   
        <button>
            <i class="fa-solid fa-arrow-left"></i>
            Back
        </button>
    </a>
    <div class="flex justify-start buttons-mr">
        
        <a href="{{url('dashboard/sectors/'.$sector->hex.'/text/edit')}}">   
            <button>
                <i class="fa-solid fa-marker"></i>
                Edit
            </button>
        </a>
        <a href="{{url('dashboard/sectors/'.$sector->hex.'/image/edit')}}">
            <button>
                <i class="fa-regular fa-image"></i>
                Change image
            </button>
        </a>
        <a href="{{url('dashboard/sectors/'.$sector->hex.'/delete')}}">
            <button>
                <i class="fa-regular fa-trash-alt"></i>
                Delete
            </button>
        </a>
    </div>
</div>

