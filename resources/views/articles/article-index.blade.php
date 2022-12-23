<x-layout>
    
    <x-container-full-w>
        
        {{-- Featured articles --}}
        <div class="bg-repeat" style="background-image:url('../images/bg.png');">
            <div class="flex w-3/4 mx-auto px-12 bg-white">
                <div class="mt-3 pl-3 pr-4 w-2/3 border-r border-gray-100">
                    <x-layout-articles-list :articles="$articles" />
                </div>

                <div class="mt-3 pl-4 w-1/3">
                    <x-module-socials />
                
                </div>

            </div>
        </div>

    </x-container>
</x-layout>