<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Top Family Business 2023</title>
</head>
<body>
    <div class="flex flex-col h-screen">
        <x-navbar />
        <div class="flex-grow">
            <main class="h-full">
                {{$slot}}
            </main>
        </div>
        <footer class="p-4 text-sm">
            <div class="flex justify-between border-b border-zinc-500 mb-4">
                <div class="flex flex-col">
                    <a href="/">
                        <img src="{{asset('images/top-family-business-logo.png')}}" alt="" class="w-64">
                    </a>
                    <p class="w-96 my-4">
                        The world's leading platform for German Family Businesses, from startup to enterprise.
                    </p>

                    <span class="socials mb-12">
                        <ul class="flex text-2xl">
                            <li class="facebook mr-4"><a href="https://www.facebook.com/Matchbird-GmbH-1050852385302281" target="_blank"><i class="fab fa-center fa-facebook-f"></i></a></li>
                            <li class="twitter mr-4"><a href="https://twitter.com/matchbirdgmbh" target="_blank"><i class="fa-brands fa-center fa-twitter"></i></a></li>
                            <li class="instagram mr-4"><a href="https://www.instagram.com/matchbird.gmbh/" target="_blank"><i class="fa-brands fa-center fa-instagram"></i></a></li>
                            <li class="linkedin mr-4"><a href="https://www.linkedin.com/company/matchbird" target="_blank"><i class="fa-brands fa-center fa-linkedin-in"></i></a></li>
                            <li class="xing mr-4"><a href="https://www.xing.com/pages/matchbirdgmbh" target="_blank"><i class="fa-brands fa-center fa-xing"></i></a></li>
                            <li class="youtube mr-4"><a href="https://www.youtube.com/channel/UC4GnbbnwvAnl80_cVXJRuMA" target="_blank"><i class="fa-brands fa-center fa-youtube"></i></a></li>
                        </ul>
                    </span>

                </div>
                <div class="flex flex-col items-end">
                    <a href="https://matchbird.com" target="_blank">
                        <img src="{{asset('images/matchbird.png')}}" alt="" class="w-48">
                    </a>
                    <p class="w-96 my-4 mb-6 text-right">
                        Matchbird GmbH<br>
                        Zimmerstraße 19, 40215 Düsseldorf
                    </p>
                    <div class="flex">
                        <img src="/images/sponsors/pricewaterhousecoopers.png" alt="" class="h-9 ml-6">
                        <img src="/images/sponsors/headgate.png" alt="" class="h-9 ml-6">
                    </div>
                </div>
            </div>
            <a href="/terms">Terms</a>
            <span class="text-zinc-400 mx-1"> | </span>
            <a href="/privacy">Privacy</a>
        </footer>
    </div>
    <x-toast-message />
    <script src="https://unpkg.com/flowbite@1.5.4/dist/flowbite.js"></script>
</body>
</html>