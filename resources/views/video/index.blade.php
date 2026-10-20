<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center space-y-4 sm:space-y-0">
            <div>
                <h2 class="font-black text-3xl text-emerald-950 uppercase tracking-tighter">
                    Manajemen Video Kegiatan
                </h2>
                <p class="text-emerald-600/80 font-bold text-sm mt-1 uppercase tracking-widest">
                    Kelola video dokumentasi YouTube pesantren
                </p>
            </div>
            
            <a href="{{ route('video.create') }}" class="btn-emerald flex items-center space-x-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                <span>Tambah Video</span>
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            @if(session('success'))
                <div class="mb-8 p-4 bg-emerald-50 border-l-4 border-emerald-500 rounded-r-2xl shadow-sm flex items-center justify-between">
                    <div class="flex items-center space-x-3">
                        <div class="w-8 h-8 bg-emerald-100 rounded-full flex items-center justify-center text-emerald-600">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        </div>
                        <p class="text-emerald-900 font-bold text-sm">{{ session('success') }}</p>
                    </div>
                </div>
            @endif

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($videos as $item)
                    <div class="card-premium overflow-hidden flex flex-col justify-between bg-white rounded-2xl border border-emerald-100/60 shadow-sm hover:shadow-xl transition-all duration-300">
                        <div>
                            <!-- Video Embed / Thumbnail Container -->
                            <div class="relative overflow-hidden aspect-video bg-slate-900">
                                @if($item->embed_url)
                                    <iframe class="w-full h-full" src="{{ $item->embed_url }}" title="{{ $item->judul }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                @else
                                    <div class="flex flex-col items-center justify-center h-full p-4 text-center text-slate-400">
                                        <svg class="w-10 h-10 mb-2 text-red-500" fill="currentColor" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                                        <span class="text-xs font-bold text-red-400">Link YouTube tidak valid</span>
                                    </div>
                                @endif
                            </div>
                            
                            <!-- Video Info -->
                            <div class="p-5">
                                <h3 class="font-black text-emerald-950 text-lg mb-1 line-clamp-1 hover:text-amber-600 transition">{{ $item->judul }}</h3>
                                <p class="text-xs text-slate-500 line-clamp-2 mb-3">{{ $item->keterangan ?: 'Tidak ada keterangan tambahan.' }}</p>
                                <a href="{{ $item->youtube_url }}" target="_blank" class="inline-flex items-center space-x-1.5 text-[11px] font-bold text-red-600 hover:text-red-700 transition">
                                    <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                                    <span class="truncate max-w-[200px]">Buka di YouTube</span>
                                </a>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="p-5 pt-0 border-t border-slate-100 flex items-center space-x-2 mt-2">
                            <a href="{{ route('video.edit', $item->id) }}" class="flex-1 bg-amber-500 hover:bg-amber-600 text-white text-xs font-bold py-2.5 px-3 rounded-xl text-center shadow-sm transition">
                                Edit
                            </a>
                            <form action="{{ route('video.destroy', $item->id) }}" method="POST" class="flex-1" onsubmit="return confirm('Apakah Anda yakin ingin menghapus video ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="w-full bg-red-500 hover:bg-red-600 text-white text-xs font-bold py-2.5 px-3 rounded-xl shadow-sm transition">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full card-premium p-16 text-center bg-white rounded-2xl border border-emerald-100">
                        <div class="w-16 h-16 bg-red-50 text-red-500 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                        </div>
                        <h3 class="text-xl font-black text-emerald-950 uppercase tracking-tight mb-2">Belum Ada Video Kegiatan</h3>
                        <p class="text-slate-500 mb-6">Mulai tambahkan tautan video YouTube pesantren untuk ditampilkan di halaman utama.</p>
                        <a href="{{ route('video.create') }}" class="btn-gold inline-flex items-center space-x-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                            <span>Tambah Video Pertama</span>
                        </a>
                    </div>
                @endforelse
            </div>
            
        </div>
    </div>
</x-app-layout>
