<x-dashboard-layout>
    <div class="flex w-full">
        <div class="w-3/4 pr-10">
            <x-edit-company-buttons :company="$company" />
            <h2 class="grow">
                {{$company->registered_name}}
            </h2>
            <x-alerts/>

            <div class="flex">
                <img src="{{$company->getImageThumbnail()}}" alt="">
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
            <x-module-company-details :details="$company->details" />
        </div>
    </div>
</x-dashboard-layout>
