<x-dashboard-layout>
    
    <div class="flex">

        <div class="w-3/4 pr-10">
    
            <x-edit-article-buttons :article="$article" />
            <h2>Delete article</h2>
            <x-alerts/>

            <form action="/dashboard/articles/{{$article->hex}}/delete" method="POST">
                @csrf
                @method('DELETE')
                
                <p class="mb-4">Are you sure you want to delete this article?</p>
                
                <div class="mb-6">
                    <button type="submit" class="btn btn-success">
                        <i class="fa-regular fa-trash-alt"></i>
                        Yes, delete this article
                    </button>
                </div>
            </form> 
        
        </div>

        <div class="w-1/4">
            
            <x-module-article-details :details="$article->details" />
    
        </div>
    
</x-dashboard-layout>
