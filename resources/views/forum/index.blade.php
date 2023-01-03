<x-layout>
    <x-container-full-w>
        <div class="w-full h-full pt-28 pb-56" style="background-image:url({{asset('images/bg-construction.jpg')}});">
            <div class="flex flex-col items-center w-1/3 mx-auto"> 
                <h2 class="text-zinc-100">Forum is <span class="text-red-500">Under Construction</span></h2>
                <p class="text-zinc-100">We'll be here real soon, subscribe to get notified</p>
                @error('email')
                @endif
                @if(session()->has('success'))
                    <div class="alert-success w-full text-center" role="alert">
                        {{session('success')}}
                    </div>  
                @elseif(isset($message))
                    <div class="alert-warning w-full text-center" role="alert">
                        {{$message}}
                    </div>
                @else
                    <form action="/subscribe/save" method="POST" class="flex w-full mt-4">
                        @csrf
                        <input type="email" name="email" placeholder="Your email address" value="{{old('email')}}" class="!bg-gray-50 !rounded !border !border-gray-300 focus:!border-sky-400 !p-2 !text-sm !text-gray-500 !outline-0 !placeholder-gray-400 !w-full !mr-4">
                        <button class="btn btn-plain whitespace-nowrap">Get notified</button>
                    </form>
                @endif
            </div>
        </div>
    </x-container-full-w>
</x-layout>