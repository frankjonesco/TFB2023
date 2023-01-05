<x-dashboard-layout>
    <div class="flex w-full justify-between mt-4">
        <a href="javascript:history.back()">   
            <button>
                <i class="fa-solid fa-arrow-left"></i>
                Back
            </button>
        </a>
        <div class="flex justify-end buttons-ml">
            <a href="{{url('dashboard/categories/create')}}">
                <button>
                    <i class="fa-solid fa-plus"></i>
                    Create category
                </button>
            </a>
        </div>
    </div>
    <h2 class="grow">TOFAM Categories</h2>   
    <x-alerts heading="List of TOFAM categories (where articles are stored)."/>
    <x-table-categories :categories="$categories" />
</x-dashboard-layout>
    


