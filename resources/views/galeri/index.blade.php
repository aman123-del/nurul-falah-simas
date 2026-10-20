<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center space-y-4 sm:space-y-0">
            <div>
                <h2 class="font-black text-3xl text-emerald-950 uppercase tracking-tighter">
                    Manajemen Galeri
                </h2>
                <p class="text-emerald-600/80 font-bold text-sm mt-1 uppercase tracking-widest">
                    Kelola foto dokumentasi pesantren
                </p>
            </div>
            
            <a href="{{ route('galeri.create') }}" class="btn-emerald flex items-center space-x-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                <span>Upload Foto</span>
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

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @forelse($galeri as $item)
                    <div class="card-premium group relative overflow-hidden h-64">
                        <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->judul }}" class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-emerald-950 via-emerald-900/40 to-transparent opacity-90 group-hover:opacity-100 transition-opacity"></div>
                        
                        <!-- Overlay Content -->
                        <div class="absolute inset-0 p-4 flex flex-col justify-end">
                            <h3 class="text-white font-bold text-lg mb-2 line-clamp-2">{{ $item->judul }}</h3>
                            
                            <!-- Action Buttons -->
                            <div class="flex items-center space-x-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300 translate-y-4 group-hover:translate-y-0">
                                <a href="{{ route('galeri.edit', $item->id) }}" class="flex-1 bg-amber-500/90 hover:bg-amber-500 text-white text-xs font-bold py-2 px-3 rounded-lg text-center backdrop-blur-sm transition">
                                    Edit
                                </a>
                                <form action="{{ route('galeri.destroy', $item->id) }}" method="POST" class="flex-1" onsubmit="return confirm('Apakah Anda yakin ingin menghapus foto ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="w-full bg-red-500/90 hover:bg-red-500 text-white text-xs font-bold py-2 px-3 rounded-lg backdrop-blur-sm transition">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full card-premium p-16 text-center">
                        <div class="w-24 h-24 bg-emerald-50 rounded-full flex items-center justify-center mx-auto mb-6 text-emerald-300">
                            <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        </div>
                        <h3 class="text-2xl font-black text-emerald-950 mb-2">Belum Ada Foto</h3>
                        <p class="text-slate-500 mb-6">Mulai unggah foto dokumentasi pesantren untuk ditampilkan di halaman depan.</p>
                        <a href="{{ route('galeri.create') }}" class="btn-gold inline-flex">Upload Foto Pertama</a>
                    </div>
                @endforelse
            </div>
            
        </div>
    </div>
</x-app-layout>
