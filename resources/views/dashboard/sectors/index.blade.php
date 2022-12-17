<x-dashboard-layout>
    <div class="flex w-full justify-between mt-4">
        <a href="javascript:history.back()">   
            <button>
                <i class="fa-solid fa-arrow-left"></i>
                Back
            </button>
        </a>
        <div class="flex justify-end buttons-ml">
            <a href="/dashboard/sectors/create">
                <button>
                    <i class="fa-solid fa-plus"></i>
                    Create sector
                </button>
            </a>
        </div>
    </div>
    <h2 class="grow">TOFAM Sectors</h2>   
    <x-alerts heading="List of TOFAM sectors."/>
    <x-table-sectors :sectors="$sectors" />
</x-dashboard-layout>