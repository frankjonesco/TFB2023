<x-dashboard-layout>
    <x-edit-sector-buttons :sector="$sector" />
    <h2 class="grow">Sector: {{$sector->english_name}}</h2>      
    <x-alerts heading="Listing TOFAM industries in the '{{$sector->english_name}}' sector."/>
    <x-table-industries :industries="$industries" :sector="$sector" :sectors="$sectors" :users="$users" />
</x-dashboard-layout>



