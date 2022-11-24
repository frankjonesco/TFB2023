<x-dashboard-layout>

    <div class="flex flex-row items-center">
        <h1 class="grow">Sector: {{$sector->name}}</h1>
        <x-edit-sector-buttons :sector="$sector" />
    </div>

    <p class="mb-3">This is the sector details page.</p>

    <x-alerts/>

</x-dashboard-layout>
