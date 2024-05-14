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
    <body class="font-sans antialiased">
        <div class="min-h-screen relative">
            @include('layouts.navigation')
            @include('layouts.aside')
            <!-- Page Content -->
            <main class="p-4 sm:ml-64">
                <div class="p-4 mt-14">
                    {{ $slot }}
                </div>
            </main>
        </div>
        <img src="{{ asset('images/background/snowmen.svg') }}" alt="snowmen" class="h-52 object-cover absolute bottom-0 right-0 -z-10" />
    </body>
    @yield('scripts')
</html>
