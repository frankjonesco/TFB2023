<x-dashboard-layout>
    <div class="w-full">
        <x-edit-industry-buttons :industry="$industry" />
        <h2 class="grow">Industry: {!!$industry->english_name!!}</h2>
        <x-alerts heading="List of companies in the '{!!$industry->english_name!!}' industry." />
        <x-table-companies :companies="$industry->companies" />
    </div>
</x-dashboard-layout>
