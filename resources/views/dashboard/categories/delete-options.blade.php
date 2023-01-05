<x-dashboard-layout>
    
    <div class="flex">

        <div class="w-3/4 pr-10">
    
            <x-edit-category-buttons :category="$category" />
            <h2>Delete category</h2>
            <x-alerts/>

            <form action="{{url('dashboard/categories/'.$category->hex.'/delete')}}" method="POST">
                @csrf
                @method('DELETE')
                
                <p class="mb-4">Are you sure you want to delete this category?</p>
                
                <div class="mb-6">
                    <button type="submit" class="btn btn-success">
                        <i class="fa-regular fa-trash-alt"></i>
                        Yes, delete this category
                    </button>
                </div>
            </form> 
        
        </div>

        <div class="w-1/4">
            
            <x-module-category-details :details="$category->details" />
    
        </div>
    
</x-dashboard-layout>
