<x-dashboard-layout>
    
    <div class="flex flex-row items-center">
        <h1 class="grow">Delete article</h1>
        <x-edit-article-buttons :article="$article" />
    </div>

    <x-alerts/>

    <form action="/dashboard/articles/{{$article->hex}}/delete" method="POST">
        @csrf
        @method('DELETE')
        
        <p class="mb-4">Are you sure you want to delete this article?</p>
        
        <div class="mb-6">
            <button type="submit" class="btn">
                <i class="fa-regular fa-trash-alt"></i>
                Yes, delete this article
            </button>
        </div>
    </form>   
    
</x-dashboard-layout>
