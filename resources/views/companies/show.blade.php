<x-layout>
    <x-container>
        <div class="flex">
            <div class="mt-6 pl-3 pr-12 w-2/3 border-r border-zinc-500">                
                <div class="flex mb-7">
                    <h3 class="pl-1.5 pr-4 pb-3 border-b border-sky-500 uppercase text-lg">Company details</h3>
                    <span class="grow border-b border-zinc-500"></span>
                </div>
                {{-- Company layout --}}
                <div class="flex">
                    <div class="w-1/4 mr-10">
                        <img 
                            src="{{$company->getImageThumbnail()}}"
                            alt="Top Family Business - {{$company->registered_name}}"
                            class="w-full mr-4 rounded border border-indigo-100 hover:border-amber-300 cursor-pointer"
                        >
                    </div>
                    <div class="w-3/4">
                        <h2>{{$company->show_name}}</h2>
                        <h4>Registered name: {{$company->registered_name}}</h4>
                        <p>Parent organisation: {{$company->parent_organization}}</p>
                    </div>
                </div>
                {{-- End: company layout --}}
            </div>
            <div class="mt-6 px-12 w-1/3">
                <x-module-socials />
            </div>
        </div>
    </x-container>
</x-layout>