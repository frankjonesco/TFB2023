<x-layout-heading heading="Categories" />
<div class="flex flex-wrap">
    @foreach($categories as $category)
        <button class="mb-1 mr-1 flex">
            <span class="border-b">{{$category->name}}</span>
            <span class="border-b">{{count($category->articles)}}</span>
        </button>
    @endforeach
</div>