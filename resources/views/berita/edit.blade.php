<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-emerald-800 leading-tight">
            {{ __('Edit Berita') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm rounded-3xl border border-gray-100">
                <div class="p-8">
                    <form action="{{ route('berita.update', $berita->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                        @csrf
                        @method('PUT')
                        
                        <div class="space-y-1">
                            <label for="judul" class="text-sm font-bold text-gray-700">Judul Berita</label>
                            <input type="text" name="judul" id="judul" value="{{ $berita->judul }}" class="w-full rounded-xl border-gray-200 focus:border-emerald-500 focus:ring-emerald-500 transition shadow-sm" required>
                        </div>

                        <div class="space-y-1">
                            <label for="tanggal_posting" class="text-sm font-bold text-gray-700">Tanggal Posting</label>
                            <input type="date" name="tanggal_posting" id="tanggal_posting" value="{{ $berita->tanggal_posting }}" class="w-full rounded-xl border-gray-200 focus:border-emerald-500 focus:ring-emerald-500 transition shadow-sm" required>
                        </div>

                        <div class="space-y-1">
                            <label for="isi" class="text-sm font-bold text-gray-700">Isi Pengumuman</label>
                            <textarea name="isi" id="isi" rows="10" class="w-full rounded-xl border-gray-200 focus:border-emerald-500 focus:ring-emerald-500 transition shadow-sm" required>{{ $berita->isi }}</textarea>
                        </div>

                        <div class="space-y-1">
                            <label for="gambar" class="text-sm font-bold text-gray-700">Update Gambar Cover (Opsional)</label>
                            @if($berita->gambar)
                                <div class="mb-2">
                                    <img src="{{ asset('storage/'.$berita->gambar) }}" class="w-40 h-24 rounded-xl object-cover ring-2 ring-emerald-50">
                                </div>
                            @endif
                            <input type="file" name="gambar" id="gambar" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-semibold file:bg-emerald-50 file:text-emerald-700 hover:file:bg-emerald-100 transition">
                        </div>

                        <div class="pt-6 flex space-x-3">
                            <button type="submit" class="flex-1 bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-3 rounded-xl transition shadow-lg shadow-emerald-200 uppercase tracking-widest text-sm">
                                Simpan Perubahan
                            </button>
                            <a href="{{ route('berita.index') }}" class="px-6 py-3 bg-gray-100 hover:bg-gray-200 text-gray-600 font-bold rounded-xl transition uppercase text-xs flex items-center">
                                Batal
                            </a>
                        </div>
                    </form>
                    
                    <form action="{{ route('berita.destroy', $berita->id) }}" method="POST" class="mt-8 pt-8 border-t border-red-50" onsubmit="return confirm('Hapus berita ini selamanya?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:text-red-700 text-xs font-bold uppercase tracking-widest flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-4v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                            Hapus Berita Ini
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
