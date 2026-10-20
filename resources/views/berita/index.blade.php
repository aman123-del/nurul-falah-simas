<x-app-layout>
    <!-- Header Section -->
            <!-- Header Section -->
            <div class="mb-8 flex flex-col md:flex-row md:items-center justify-between gap-4">
                <div>
                    <h1 class="text-2xl font-black text-emerald-950 tracking-tighter">
                        Portal <span class="text-gradient-emerald">Informasi Digital</span>
                    </h1>
                    <p class="text-[10px] text-gray-500 font-medium mt-1">Dapatkan kabar dan pengumuman terbaru dari Pondok Pesantren.</p>
                </div>
                @if(Auth::user()->isAdmin())
                    <a href="{{ route('berita.create') }}" class="btn-emerald h-9 !px-6 text-[10px]">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                        Tulis Berita
                    </a>
                @endif
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($beritas as $news)
                    <div class="card-premium group/card overflow-hidden">
                        <div class="h-40 relative overflow-hidden">
                            @if($news->gambar)
                                <img src="{{ asset('storage/'.$news->gambar) }}" class="w-full h-full object-cover group-hover/card:scale-110 transition duration-700">
                            @else
                                <div class="w-full h-full bg-emerald-50 flex items-center justify-center text-emerald-200">
                                    <svg class="w-24 h-24" fill="currentColor" viewBox="0 0 24 24"><path d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                </div>
                            @endif
                            <div class="absolute inset-0 bg-gradient-to-t from-emerald-950/50 to-transparent"></div>
                            <div class="absolute bottom-4 left-4 right-4">
                                <span class="bg-emerald-500 text-white px-3 py-1 rounded-full text-[10px] font-black uppercase tracking-widest shadow-lg shadow-emerald-500/20">
                                    {{ $news->tanggal_posting }}
                                </span>
                            </div>
                        </div>
                        <div class="p-5">
                            <h3 class="text-base font-black text-emerald-950 mb-2 leading-tight group-hover/card:text-emerald-700 transition line-clamp-2">
                                {{ $news->judul }}
                            </h3>
                            <p class="text-[11px] text-gray-500 line-clamp-3 leading-relaxed mb-4">
                                {{ strip_tags($news->isi) }}
                            </p>
                            
                            <div class="flex justify-between items-center pt-4 border-t border-gray-100">
                                <a href="{{ route('berita.show', $news->id) }}" class="text-emerald-700 font-black text-xs uppercase tracking-[0.2em] flex items-center group/btn">
                                    Baca Detail
                                    <svg class="w-4 h-4 ml-2 group-hover/btn:translate-x-2 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                                </a>
                                
                                @if(Auth::user()->isAdmin())
                                    <div class="flex space-x-2">
                                        <a href="{{ route('berita.edit', $news->id) }}" class="p-2 bg-emerald-50 text-emerald-600 rounded-xl hover:bg-emerald-600 hover:text-white transition shadow-sm">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full p-20 text-center bg-white rounded-[2.5rem] border-2 border-dashed border-emerald-100">
                        <div class="inline-flex w-20 h-20 bg-emerald-50 rounded-full items-center justify-center text-emerald-200 mb-6">
                            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path></svg>
                        </div>
                        <p class="text-gray-400 font-bold italic">Belum ada publikasi terbaru untuk saat ini.</p>
                    </div>
                @endforelse
            </div>
</x-app-layout>
