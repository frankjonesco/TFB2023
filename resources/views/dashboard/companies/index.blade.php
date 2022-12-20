<x-dashboard-layout>
    <div class="flex w-full justify-between mt-4">
        <a href="javascript:history.back()">   
            <button>
                <i class="fa-solid fa-arrow-left"></i>
                Back
            </button>
        </a>
        <div class="flex justify-end buttons-ml">
            <a href="/dashboard/companies/create">
                <button>
                    <i class="fa-solid fa-plus"></i>
                    Create company
                </button>
            </a>
        </div>
    </div>
    <h2 class="grow">TOFAM Companies</h2>   
    <x-alerts heading="List of TOFAM companies."/>
    <x-table-companies :companies="$companies" />
</x-dashboard-layout>
{{-- 
<x-dashboard-layout>
    <div class="flex justify-between items-center">
        <h2>TOFAM Companies</h2>
        <a href="/dashboard/companies/create">
            <button>
                <i class="fa-solid fa-plus"></i>
                Create company
            </button>
        </a>
    </div>
    <x-alerts heading="List of TOFAM companies." />
    <x-table-companies :companies="$companies" />
</x-dashboard-layout> --}}
