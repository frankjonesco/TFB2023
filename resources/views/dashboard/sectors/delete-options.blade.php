<x-dashboard-layout>
    
    <div class="flex flex-row items-center">
        <h1 class="grow">Delete sector</h1>
        <x-edit-sector-buttons :sector="$sector" />
    </div>

    <x-alerts/>

    <form action="{{url('dashboard/sectors/'.$sector->hex.'/delete')}}" method="POST">
        @csrf
        @method('DELETE')
        
        <p class="mb-4">Are you sure you want to delete this sector?</p>
        
        <div class="mb-6">
            <button type="submit" class="btn">
                <i class="fa-regular fa-trash-alt"></i>
                Yes, delete this sector
            </button>
        </div>
    </form>   
    
</x-dashboard-layout>
