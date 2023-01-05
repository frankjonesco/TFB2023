<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Top Family Business 2023</title>

    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
    />

    {{-- Alpine.js --}}
    <script src="//unpkg.com/alpinejs" defer></script>

    {{-- Local scripts --}}
    @vite(['resources/css/app.css', 'resources/scss/app.scss', 'resources/js/app.js'])
    
    {{-- <link rel="stylesheet" href="{{ asset('build/assets/app.54283ede.css') }}">
    <link rel="stylesheet" href="{{ asset('build/assets/app.dd9f1f38.css') }}">
    <script src="{{ asset('build/assets/app.ab424fc8.js') }}"></script>  --}}
   


    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-CZDSKJ5M7N"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'G-CZDSKJ5M7N');
    </script>

</head>
<body>
    <div class="flex flex-col h-screen">
        <x-navbar />

        {{-- <div class="pop">
            <h1>{{App::app()}} environment</h1>
        </div> --}}

        <div class="flex-grow">
            <main class="h-full">
                {{$slot}}
            </main>
        </div>
        <x-footer />
    </div>
    <x-toast-message />
    <script src="https://unpkg.com/flowbite@1.5.4/dist/flowbite.js"></script>
</body>
</html>