<x-dashboard-layout>
    <div class="flex w-full">
        <div class="w-3/4 pr-10">
            <x-edit-company-buttons :company="$company" />
            <h2 class="grow">
                {{$company->registered_name}}
            </h2>
            <x-alerts/>

            <div class="flex">
                <a href="/dashboard/companies/{{$company->hex}}/image/edit">
                    <div class="border border-zinc-500 p-1">
                        <img src="{{$company->getImageThumbnail()}}" alt="">
                    </div>
                </a>
                <div>
                    <span></span>
                </div>
            </div>

            <div>
                <h3>Description</h3>
                {!!$company->description!!}
            </div>
        </div>
        <div class="w-1/4">
            <x-module-company-sectors-industries :company="$company" />
            <x-module-company-details :details="$company->details" />
        </div>
    </div>
</x-dashboard-layout>
