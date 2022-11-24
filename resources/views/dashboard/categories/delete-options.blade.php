<x-dashboard-layout>
    
    <div class="flex flex-row items-center">
        <h1 class="grow">Delete category</h1>
        <x-edit-category-buttons :category="$category" />
    </div>

    <x-alerts/>

    <form action="/dashboard/categories/{{$category->hex}}/delete" method="POST">
        @csrf
        @method('DELETE')
        
        <p class="mb-4">Are you sure you want to delete this category?</p>
        
        <div class="mb-6">
            <button type="submit" class="btn">
                <i class="fa-regular fa-trash-alt"></i>
                Yes, delete this sector
            </button>
        </div>
    </form>   
    
</x-dashboard-layout>
