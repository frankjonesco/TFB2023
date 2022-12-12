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
        <footer class="p-4">
            <a href="/terms">Terms</a>
            <span class="text-zinc-500"> | </span>
            <a href="/privacy">Privacy</a>
        </footer>
    </div>
    <x-toast-message />
    <script src="https://unpkg.com/flowbite@1.5.4/dist/flowbite.js"></script>
</body>
</html>