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
    <body class="font-sans antialiased text-gray-900 bg-white">
        <!-- High Contrast Status Indicator - Locked to Corner -->
        <div class="hidden md:flex fixed top-0 right-0 m-4 items-center px-6 py-3 bg-emerald-950 text-white rounded-full shadow-2xl z-[99999] border-2 border-emerald-400/30">
            <span class="w-2.5 h-2.5 bg-emerald-400 rounded-full mr-3 animate-pulse"></span>
            <span class="text-xs font-black uppercase tracking-widest">{{ Auth::user()->role }} Aktif</span>
        </div>

        <div class="min-h-screen">
            @include('layouts.navigation')

            <div class="pl-[70px] lg:pl-72 min-h-screen flex flex-col transition-all duration-300">
                <!-- Main Content Area -->
                <main class="focus:outline-none bg-dot-pattern flex-1">
                    <div class="w-full px-6 pt-16 pb-6 lg:px-8 lg:pt-10">
                        <!-- Page Heading (Optional) -->
                        @isset($header)
                            <header class="mb-8">
                                {{ $header }}
                            </header>
                        @endisset

                        <!-- Page Content -->
                        <div class="w-full">
                            {{ $slot }}
                        </div>

                        @include('partials.footer')
                    </div>
                </main>
            </div>
        </div>
    </body>
</html>
