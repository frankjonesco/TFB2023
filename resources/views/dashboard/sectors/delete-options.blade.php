<x-dashboard-layout>
    <x-admin-sector-header :sector="$sector"/>
    

    <form action="/dashboard/sectors/{{$sector->hex}}/delete" method="POST">
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
