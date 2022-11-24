<x-dashboard-layout>

    <div class="flex flex-row items-center">
        <h1 class="grow">Company: {{$company->registered_name}}</h1>
        <x-edit-company-buttons :company="$company" />
    </div>

    <p class="mb-3">This is the company details page.</p>

    <x-alerts/>

</x-dashboard-layout>
