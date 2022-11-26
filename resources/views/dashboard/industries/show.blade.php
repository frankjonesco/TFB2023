<x-dashboard-layout>

    <div class="flex flex-row items-center">
        <h1 class="grow">Industry: {{$industry->name}}</h1>
        <x-edit-industry-buttons :industry="$industry" />
    </div>

    <p class="mb-3">Created: {{showDate($industry->created_at)}}</p>




    <x-alerts/>

</x-dashboard-layout>
