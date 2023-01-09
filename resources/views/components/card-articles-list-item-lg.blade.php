@php
if(!isset($thumbnailSize)){
    $thumbnailSize = null;
}
@endphp

@php
    $colors = ['bg-red-500', 'bg-pink-500', 'bg-green-600', 'bg-lime-600', 'bg-sky-500', 'bg-indigo-500', 'bg-blue-500', 'bg-purple-500', 'bg-rose-500'];
    $random = array_rand($colors);
    $color = $colors[$random];
@endphp

<div {{$attributes->merge(['class' => 'grid grid-cols-10 gap-4 pt-2 pb-7 border-b border-gray-200'])}}>
    
        <a href="{{$article->link()}}" class="no-underline col-span-4">
            <div class="border border-gray-200 rounded-sm p-1.5 bg-lime-50">
                <div class="w-full h-48 bg-no-repeat bg-cover bg-center p-4 flex flex-col justify-end" style="background-image:linear-gradient(to bottom, rgba(245, 246, 252, 0.0), rgba(0, 0, 0, 0.25)), url('{{$article->getImageThumbnail()}}');">
                    
                </div>
            </div>
        </a> 


        <div class="col-span-6 ml-1.5 pt-2.5">
            <x-category-pip :category="$article->category" />
            <h3 class="p-0 m-0 mt-2.5">
                <a href="{{$article->link()}}" class="plain !text-slate-700 hover:!text-red-500 no-underline">
                    @if(isset($term))
                        {!!highlightSearchTerm($article->title, $term)!!}       
                    @else
                        {{$article->title}}  
                    @endif
                    
                </a>
            </h3>
            
            <x-article-stats :article="$article" class="text-xs text-gray-500 py-2.5" />

            <p class="text-sm p-1">

                @if(isset($term))
                    {!!str_replace('&amp;', '&', highlightSearchTerm(truncate($article->body, 240), $term))!!}       
                @else
                    {{str_replace('&amp;', '&', truncate(strip_tags($article->body), 240))}}  
                @endif

            </p>

            <div class="flex items-center justify-end p-1">
                {{-- Show associated companies --}}
                @if(count($article->associated_companies) > 0)
                    <div class="text-xs grow">
                        <p class="font-bold text-gray-600">Associated companies:</p>
                        @foreach($article->associated_companies as $company)
                            <p><x-company-logo-show-name :company="$company" /></p>
                        @endforeach
                    </div>
                @endif
                {{-- Show TOFAM partner --}}
                @if($article->partner)
                    <div class="text-xs grow">
                        <p class="font-bold text-gray-600">TOFAM Partner:</p>
                        <p><x-partner-logo-show-name :partner="$article->partner" /></p>
                    </div>
                @endif

                <a href="{{$article->link()}}" class="text-slate-700 hover:!text-red-500 self-end">
                    <button class="btn btn-black !text-xs"><i class="fa-solid fa-arrow-right mr-1.5"></i>Read more</button>
                </a>
            </div>
        </div>

</div>