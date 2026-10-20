<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-black text-2xl text-emerald-950 leading-tight uppercase tracking-widest">
                {{ __('Notifikasi Sistem') }}
            </h2>
        </div>
    </x-slot>

    <div class="max-w-4xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-2xl border border-emerald-100">
            <div class="p-6 sm:p-8 bg-white border-b border-gray-200">
                @if($notifications->isEmpty())
                    <div class="text-center py-10">
                        <svg class="mx-auto h-16 w-16 text-emerald-200 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
                        </svg>
                        <p class="text-gray-500 font-medium">Tidak ada notifikasi baru saat ini.</p>
                    </div>
                @else
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <!-- Kolom Kiri: Notifikasi Admin (Santri) -->
                        <div>
                            <div class="flex items-center mb-4 border-b border-emerald-200 pb-2">
                                <svg class="h-6 w-6 text-emerald-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                                <h3 class="text-lg font-black text-emerald-800 uppercase tracking-wider">Aktivitas Admin</h3>
                            </div>
                            <div class="space-y-4">
                                @php $hasAdmin = false; @endphp
                                @foreach($notifications as $notification)
                                    @php
                                        $title = $notification->data['title'] ?? '';
                                        $isSyahriyah = str_contains(strtolower($title), 'syahriyah');
                                    @endphp
                                    @if(!$isSyahriyah)
                                        @php
                                            $hasAdmin = true;
                                            $iconBg = $notification->unread() ? 'bg-emerald-500' : 'bg-gray-400';
                                            $cardBg = $notification->unread() ? 'bg-emerald-50 border border-emerald-300' : 'bg-gray-50 border border-gray-200 opacity-75';
                                        @endphp
                                        <div class="flex items-start p-4 {{ $cardBg }} rounded-xl transition-all duration-300 hover:shadow-md">
                                            <div class="flex-shrink-0 mr-3">
                                                <div class="h-10 w-10 rounded-full {{ $iconBg }} flex items-center justify-center text-white shadow-sm">
                                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                                    </svg>
                                                </div>
                                            </div>
                                            <div class="flex-1 min-w-0">
                                                <p class="text-sm font-black text-gray-900 truncate">
                                                    {{ $title ?: 'Pemberitahuan' }}
                                                </p>
                                                <p class="text-xs text-gray-600 mt-1 line-clamp-2">
                                                    {{ $notification->data['message'] ?? '' }}
                                                </p>
                                                <div class="mt-2 flex items-center justify-between">
                                                    <div class="text-[10px] text-gray-500 font-medium truncate">
                                                        <span>{{ $notification->data['by_user'] ?? 'Sistem' }}</span>
                                                        <span class="mx-1">&bull;</span>
                                                        <span>{{ $notification->created_at->diffForHumans() }}</span>
                                                    </div>
                                                </div>
                                                <div class="mt-2 flex items-center space-x-2">
                                                    @if($notification->unread())
                                                        <span class="inline-flex items-center px-2 py-0.5 rounded-md text-[10px] font-bold bg-rose-100 text-rose-800">Baru</span>
                                                    @endif
                                                    <form method="POST" action="{{ route('notifications.read', $notification->id) }}" class="inline">
                                                        @csrf
                                                        <button type="submit" class="text-[10px] {{ $notification->unread() ? 'text-emerald-700 bg-emerald-100 hover:bg-emerald-200' : 'text-gray-600 bg-gray-200 hover:bg-gray-300' }} font-bold px-2 py-1 rounded-md transition-colors">
                                                            {{ $notification->unread() ? 'Lihat / Tandai Dibaca' : 'Lihat Detail' }}
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                                @if(!$hasAdmin)
                                    <p class="text-sm text-gray-400 italic text-center py-4">Belum ada aktivitas.</p>
                                @endif
                            </div>
                        </div>

                        <!-- Kolom Kanan: Notifikasi Bendahara (Syahriyah) -->
                        <div>
                            <div class="flex items-center mb-4 border-b border-amber-200 pb-2">
                                <svg class="h-6 w-6 text-amber-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <h3 class="text-lg font-black text-amber-800 uppercase tracking-wider">Aktivitas Bendahara</h3>
                            </div>
                            <div class="space-y-4">
                                @php $hasBendahara = false; @endphp
                                @foreach($notifications as $notification)
                                    @php
                                        $title = $notification->data['title'] ?? '';
                                        $isSyahriyah = str_contains(strtolower($title), 'syahriyah');
                                    @endphp
                                    @if($isSyahriyah)
                                        @php
                                            $hasBendahara = true;
                                            $iconBg = $notification->unread() ? 'bg-amber-500' : 'bg-gray-400';
                                            $cardBg = $notification->unread() ? 'bg-amber-50 border border-amber-300' : 'bg-gray-50 border border-gray-200 opacity-75';
                                        @endphp
                                        <div class="flex items-start p-4 {{ $cardBg }} rounded-xl transition-all duration-300 hover:shadow-md">
                                            <div class="flex-shrink-0 mr-3">
                                                <div class="h-10 w-10 rounded-full {{ $iconBg }} flex items-center justify-center text-white shadow-sm">
                                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                    </svg>
                                                </div>
                                            </div>
                                            <div class="flex-1 min-w-0">
                                                <p class="text-sm font-black text-gray-900 truncate">
                                                    {{ $title ?: 'Pemberitahuan' }}
                                                </p>
                                                <p class="text-xs text-gray-600 mt-1 line-clamp-2">
                                                    {{ $notification->data['message'] ?? '' }}
                                                </p>
                                                <div class="mt-2 flex items-center justify-between">
                                                    <div class="text-[10px] text-gray-500 font-medium truncate">
                                                        <span>{{ $notification->data['by_user'] ?? 'Sistem' }}</span>
                                                        <span class="mx-1">&bull;</span>
                                                        <span>{{ $notification->created_at->diffForHumans() }}</span>
                                                    </div>
                                                </div>
                                                <div class="mt-2 flex items-center space-x-2">
                                                    @if($notification->unread())
                                                        <span class="inline-flex items-center px-2 py-0.5 rounded-md text-[10px] font-bold bg-rose-100 text-rose-800">Baru</span>
                                                    @endif
                                                    <form method="POST" action="{{ route('notifications.read', $notification->id) }}" class="inline">
                                                        @csrf
                                                        <button type="submit" class="text-[10px] {{ $notification->unread() ? 'text-amber-700 bg-amber-100 hover:bg-amber-200' : 'text-gray-600 bg-gray-200 hover:bg-gray-300' }} font-bold px-2 py-1 rounded-md transition-colors">
                                                            {{ $notification->unread() ? 'Lihat / Tandai Dibaca' : 'Lihat Detail' }}
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                                @if(!$hasBendahara)
                                    <p class="text-sm text-gray-400 italic text-center py-4">Belum ada aktivitas.</p>
                                @endif
                            </div>
                        </div>
                    </div>
                    
                    <div class="mt-6">
                        {{ $notifications->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
