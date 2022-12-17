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
    <x-alerts heading="Manage your companies here" />
    <x-table-companies :companies="$companies" />
</x-dashboard-layout>
