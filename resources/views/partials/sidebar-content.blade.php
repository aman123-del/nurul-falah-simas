        <!-- Logo Section -->
        <div class="flex flex-col items-center flex-shrink-0 px-0 lg:px-6 pt-8 pb-6 text-center">
            <x-application-logo class="h-8 lg:h-14 w-auto brightness-150 drop-shadow-lg mb-0 lg:mb-3" />
            <div class="hidden lg:flex flex-col">
                <span class="text-[18px] font-black text-white uppercase tracking-wider leading-none mb-1">E-Santri</span>
                <span class="text-[14px] font-black text-amber-400 uppercase tracking-tight leading-none mt-1">Nurul Falah</span>
                <span class="text-[14px] font-black text-amber-400 uppercase tracking-tight leading-none">Berbaur</span>
            </div>
        </div>

        <!-- Navigation Menu -->
        <nav class="flex-1 mt-8 space-y-2">
            @php
                $navItems = [
                    ['route' => 'dashboard', 'label' => 'Dasbor', 'icon' => 'M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6'],
                    ['route' => 'santri.index', 'params' => ['status' => 'Aktif'], 'label' => 'Santri Aktif', 'icon' => 'M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z'],
                    ['route' => 'santri.index', 'params' => ['status' => 'Alumni'], 'label' => 'Data Alumni', 'icon' => 'M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z'],
                    ['route' => 'reports.index', 'label' => 'Laporan Akurat', 'icon' => 'M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z'],
                    ['route' => 'berita.index', 'label' => 'Portal Berita', 'icon' => 'M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z'],
                    ['route' => 'galeri.index', 'label' => 'Galeri Foto', 'icon' => 'M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z'],
                    ['route' => 'video.index', 'label' => 'Video Kegiatan', 'icon' => 'M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z'],
                    ['route' => 'syahriyah.index', 'label' => 'Syahriyah', 'icon' => 'M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z'],
                    ['route' => 'notifications.index', 'label' => 'Notifikasi', 'icon' => 'M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9', 'badge' => 'notifications'],
                ];
            @endphp

            @foreach($navItems as $item)
                @php
                    // Logika deteksi aktif yang lebih presisi
                    $isActive = request()->routeIs($item['route']);
                    
                    // Jika ada parameter (seperti status=Aktif), pastikan parameternya juga cocok
                    if ($isActive && isset($item['params'])) {
                        foreach ($item['params'] as $key => $value) {
                            if (request()->query($key) != $value) {
                                $isActive = false;
                                break;
                            }
                        }
                    } elseif (!$isActive && isset($item['params'])) {
                        // Fallback jika routeIs gagal tapi path cocok (untuk keamanan)
                        if (request()->is('santri*') && request()->query('status') == ($item['params']['status'] ?? '')) {
                            $isActive = true;
                        }
                    }

                    // Hitung notifikasi / badge
                    $badgeCount = 0;
                    if (isset($item['badge']) && $item['badge'] === 'notifications') {
                        $badgeCount = auth()->user()->unreadNotifications->count();
                    }
                @endphp
                <a href="{{ route($item['route'], $item['params'] ?? []) }}" 
                   class="flex items-center justify-center lg:justify-start px-0 lg:px-5 py-4 border-l-4 transition-all duration-300 {{ $isActive ? 'bg-white/5 border-amber-500' : 'border-transparent hover:bg-white/5' }} group relative">
                    <svg class="h-6 w-6 lg:mr-4 lg:h-5 lg:w-5 {{ $isActive ? 'text-amber-400' : 'text-emerald-400' }} shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $item['icon'] }}"></path>
                    </svg>
                    <span class="hidden lg:flex font-black uppercase tracking-[0.12em] text-[13px] {{ $isActive ? 'text-amber-400' : 'text-white' }} flex-1 truncate">
                        {{ $item['label'] }}
                    </span>
                    @if(isset($item['badge']) && $badgeCount > 0)
                        <span class="hidden lg:inline-flex ml-2 items-center justify-center min-w-[22px] h-[22px] px-1.5 text-[11px] font-black leading-none text-white bg-red-600 rounded-full shadow-lg">
                            {{ $badgeCount > 99 ? '99+' : $badgeCount }}
                        </span>
                        <!-- Mobile Notification Dot -->
                        <span class="lg:hidden absolute top-3 right-[18px] w-2.5 h-2.5 bg-red-600 rounded-full border-2 border-[#012117]"></span>
                    @endif
                    <!-- Tooltip for Mobile (Hover/Focus) -->
                    <div class="lg:hidden absolute left-[70px] ml-2 px-3 py-1.5 bg-gray-900 text-white text-xs font-bold uppercase tracking-wider rounded shadow-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all whitespace-nowrap z-50 pointer-events-none before:content-[''] before:absolute before:top-1/2 before:-left-1 before:-translate-y-1/2 before:border-4 before:border-transparent before:border-r-gray-900">
                        {{ $item['label'] }}
                    </div>
                </a>
            @endforeach
        </nav>

        <!-- User Profile & Footer Actions -->
        <div class="px-0 lg:px-8 pb-10 pt-6 flex flex-col space-y-8 flex-shrink-0 border-t border-white/5">
            <!-- User Info Badge -->
            <div class="flex items-center justify-center lg:justify-start space-x-0 lg:space-x-3 lg:ml-1 relative group">
                @if(Auth::user()->photo)
                    <img src="{{ asset('storage/' . Auth::user()->photo) }}" class="h-10 w-10 lg:h-11 lg:w-11 rounded-xl object-cover shadow-lg border border-white/10" alt="{{ Auth::user()->name }}">
                @else
                    <div class="h-10 w-10 lg:h-11 lg:w-11 rounded-xl bg-amber-500 flex items-center justify-center text-emerald-950 font-black text-xl lg:text-2xl shadow-lg shadow-amber-500/20">
                        {{ substr(Auth::user()->name, 0, 1) }}
                    </div>
                @endif
                <div class="hidden lg:flex flex-col">
                    <span class="text-[10px] font-bold text-white uppercase tracking-widest leading-none opacity-80">{{ Auth::user()->name }}</span>
                    <span class="text-[26px] font-black text-amber-400 uppercase tracking-tight leading-none mt-1">{{ Auth::user()->role }}</span>
                </div>
                <!-- Tooltip for Mobile Profile -->
                <div class="lg:hidden absolute left-[50px] ml-2 px-3 py-1.5 bg-gray-900 text-white text-xs font-bold uppercase tracking-wider rounded shadow-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all whitespace-nowrap z-50 pointer-events-none before:content-[''] before:absolute before:top-1/2 before:-left-1 before:-translate-y-1/2 before:border-4 before:border-transparent before:border-r-gray-900">
                    {{ Auth::user()->name }} ({{ Auth::user()->role }})
                </div>
            </div>

            <!-- Bottom Action Links -->
            <div class="flex flex-col space-y-4 lg:ml-1">
                <a href="{{ route('profile.edit') }}" class="flex items-center justify-center lg:justify-start group text-emerald-400/80 hover:text-emerald-400 transition-colors relative">
                    <svg class="lg:mr-4 h-6 w-6 lg:h-5 lg:w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    <span class="hidden lg:flex font-bold uppercase tracking-[0.1em] text-[13px]">Pengaturan</span>
                    <!-- Tooltip -->
                    <div class="lg:hidden absolute left-[60px] ml-2 px-3 py-1.5 bg-gray-900 text-white text-xs font-bold uppercase tracking-wider rounded shadow-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all whitespace-nowrap z-50 pointer-events-none before:content-[''] before:absolute before:top-1/2 before:-left-1 before:-translate-y-1/2 before:border-4 before:border-transparent before:border-r-gray-900">
                        Pengaturan
                    </div>
                </a>
                
                <form method="POST" action="{{ route('logout') }}" class="m-0">
                    @csrf
                    <button type="submit" class="flex items-center justify-center lg:justify-start text-rose-400/80 hover:text-rose-400 w-full text-left transition-colors relative group">
                        <svg class="lg:mr-4 h-6 w-6 lg:h-5 lg:w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                        <span class="hidden lg:flex font-bold uppercase tracking-[0.1em] text-[13px]">Keluar Sistem</span>
                        <!-- Tooltip -->
                        <div class="lg:hidden absolute left-[60px] ml-2 px-3 py-1.5 bg-gray-900 text-white text-xs font-bold uppercase tracking-wider rounded shadow-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all whitespace-nowrap z-50 pointer-events-none before:content-[''] before:absolute before:top-1/2 before:-left-1 before:-translate-y-1/2 before:border-4 before:border-transparent before:border-r-gray-900">
                            Keluar Sistem
                        </div>
                    </button>
                </form>
            </div>
        </div>
