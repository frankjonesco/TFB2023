@php
    if(!isset($thumbnailSize)){
        $thumbnailSize = null;
    }
@endphp

<div {{$attributes->merge(['class' => 'flex flex-col p-4 border border-gray-200 mb-3 rounded'])}}>
    <x-card-articles-photo-fill :article="$article" use-thumbnail="true" class="h-64" />  

    <p class="text-base p-1">
        {{truncate(strip_tags($article->body), 300)}}
    </p>

    <div class="flex items-center justify-end p-1">
        {{-- Show associated companies --}}
        @if(count($article->associated_companies) > 0)
            <div class="text-xs grow">
                <p class="font-bold">Associated companies:</p>
                @foreach($article->associated_companies as $company)
                    <p><x-company-logo-show-name :company="$company" /></p>
                @endforeach
            </div>
        @endif

        <a href="{{$article->link()}}" class="text-slate-700 hover:!text-red-500">
            <button class="btn btn-black !text-xs"><i class="fa-solid fa-arrow-right mr-1.5"></i>Read more</button>
        </a>
    </div>

</div>