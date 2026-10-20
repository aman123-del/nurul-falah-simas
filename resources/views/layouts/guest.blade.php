<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }} - Portal Akses</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=plus-jakarta-sans:400,500,600,700,800&display=swap" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-slate-50 text-slate-900 bg-dot-pattern selection:bg-emerald-100 selection:text-emerald-900 min-h-screen overflow-y-auto">
        
        <!-- Decorative Background Glows -->
        <div class="fixed inset-0 pointer-events-none z-0">
            <div class="absolute -top-[20%] -right-[10%] w-[60%] h-[60%] bg-emerald-200/10 blur-[150px] rounded-full"></div>
            <div class="absolute -bottom-[20%] -left-[10%] w-[60%] h-[60%] bg-teal-200/10 blur-[150px] rounded-full"></div>
        </div>

        <div class="min-h-screen relative z-10 flex flex-col items-center justify-center px-4 py-6 sm:px-6 sm:py-12">
            <!-- Branding Section -->
            <div class="mb-4 sm:mb-6 text-center">
                <a href="/" class="flex flex-col items-center group">
                    <x-application-logo class="h-14 sm:h-20 w-auto mb-1.5 sm:mb-2 drop-shadow-lg group-hover:scale-105 transition-transform duration-500" />
                    <h2 class="font-black text-xl sm:text-2xl tracking-tighter text-emerald-950 uppercase leading-none italic">E-Santri</h2>
                    <p class="text-[7px] sm:text-[8px] font-black text-amber-600 uppercase tracking-[0.25em] sm:tracking-[0.3em] mt-0.5 sm:mt-1">Nurul Falah Berbaur</p>
                </a>
            </div>

            <!-- Form Container Card -->
            <div class="w-full sm:max-w-md bg-white rounded-2xl sm:rounded-3xl p-5 sm:p-8 shadow-[0_10px_30px_rgba(6,78,59,0.06)] sm:shadow-[0_20px_50px_rgba(6,78,59,0.08)] border border-emerald-50 relative overflow-hidden">
                <!-- Top Accent Border -->
                <div class="absolute top-0 left-0 right-0 h-1.5 bg-gradient-to-r from-emerald-400 via-emerald-500 to-emerald-600"></div>
                
                <div class="relative z-10">
                    {{ $slot }}
                </div>
            </div>
            
            <!-- Secure Badge -->
            <p class="mt-4 sm:mt-8 text-[9px] sm:text-[10px] font-black text-slate-400 uppercase tracking-widest flex items-center">
                <svg class="w-3 h-3 mr-1.5 text-emerald-500 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                Protected by <span class="text-emerald-600 ml-1">Secure RSA Encryption</span>
            </p>
        </div>
    </body>
</html>
