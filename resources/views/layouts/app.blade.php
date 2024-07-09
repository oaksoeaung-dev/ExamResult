<!DOCTYPE html>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />

        <title>{{ config("app.name", "Laravel") }}</title>

        <!-- Scripts -->
        @vite(["resources/css/app.css", "resources/js/app.js"])
    </head>
    <body class="font-sans antialiased">
        <div class="relative min-h-screen">
            @include("layouts.navigation")
            @include("layouts.aside")
            <!-- Page Content -->
            <main class="p-4 sm:ml-72">
                <div class="mt-14 p-4">
                    {{ $slot }}
                </div>
            </main>
        </div>
    </body>
    @yield("scripts")
</html>
