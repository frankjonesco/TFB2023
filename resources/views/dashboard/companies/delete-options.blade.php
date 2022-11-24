<x-dashboard-layout>
    
    <div class="flex flex-row items-center">
        <h1 class="grow">Delete company</h1>
        <x-edit-company-buttons :company="$company" />
    </div>

    <x-alerts/>

    <form action="/dashboard/companies/{{$company->hex}}/delete" method="POST">
        @csrf
        @method('DELETE')
        
        <p class="mb-4">Are you sure you want to delete this company?</p>
        
        <div class="mb-6">
            <button type="submit" class="btn">
                <i class="fa-regular fa-trash-alt"></i>
                Yes, delete this company
            </button>
        </div>
    </form>   
    
</x-dashboard-layout>
