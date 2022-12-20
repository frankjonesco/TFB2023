<x-dashboard-layout>
    <div class="flex w-full justify-between mt-4">
        <a href="javascript:history.back()">   
            <button>
                <i class="fa-solid fa-arrow-left"></i>
                Back
            </button>
        </a>
        <div class="flex justify-end buttons-ml">
            <a href="/dashboard/industries/create">
                <button>
                    <i class="fa-solid fa-plus"></i>
                    Create industry
                </button>
            </a>
        </div>
    </div>
    <h2 class="grow">TOFAM Industries</h2>   
    <x-alerts heading="List of TOFAM industries (where companies are stored)."/>
    @php
        $extract = false;
    @endphp
    <x-table-industries :sectors="$sectors" :industries="$industries" :users="$users" :extract="$extract" />
</x-dashboard-layout>