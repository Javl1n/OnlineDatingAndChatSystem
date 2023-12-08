<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-text-900 antialiased">
        <div class="min-h-screen grid grid-cols-3 sm:justify-center items-center pt-6 sm:pt-0 bg-secondary-200 dark:bg-gray-900">
                

            <div class="col-span-1">
                <div class="ml-40">
                    <h1 class="text-6xl">MATCH <br> ANYTIME, <br> ANYWHERE</h1>
                    <p class="text-3xl">Matchmaker makes it easy to match and stay connected to your favorite people</p>
                </div>
            </div>
            
            <div class="col-span-1 bg-white h-96 ml-10 mr-10">
                <div class="bg-secondary-200 h-96 mt-1 ml-1 flex flex-col justify-center gap-2">
                    <a href="/register" class="mx-auto bg-primary-500 text-white px-2 py-1 rounded-full">REGISTER</a>
                    <a href="/login" class="mx-auto bg-primary-500 text-white px-2 py-1 rounded-full">LOGIN</a>
                </div>
            </div>

            

            <div class="col-span-1 bg-background-50 h-full flex flex-col justify-center">
                <div class=" w-96 mt-6 px-6 py-4 bg-white mx-auto dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </body>
</html>
