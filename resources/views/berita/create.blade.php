<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-emerald-800 leading-tight">
            {{ __('Buat Berita / Pengumuman Baru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm rounded-3xl border border-gray-100">
                <div class="p-8">
                    <form action="{{ route('berita.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                        @csrf
                        
                        <div class="space-y-1">
                            <label for="judul" class="text-sm font-bold text-gray-700">Judul Berita</label>
                            <input type="text" name="judul" id="judul" class="w-full rounded-xl border-gray-200 focus:border-emerald-500 focus:ring-emerald-500 transition shadow-sm" required placeholder="Masukkan judul berita yang menarik...">
                        </div>

                        <div class="space-y-1">
                            <label for="tanggal_posting" class="text-sm font-bold text-gray-700">Tanggal Posting</label>
                            <input type="date" name="tanggal_posting" id="tanggal_posting" value="{{ date('Y-m-d') }}" class="w-full rounded-xl border-gray-200 focus:border-emerald-500 focus:ring-emerald-500 transition shadow-sm" required>
                        </div>

                        <div class="space-y-1">
                            <label for="isi" class="text-sm font-bold text-gray-700">Isi Pengumuman</label>
                            <textarea name="isi" id="isi" rows="10" class="w-full rounded-xl border-gray-200 focus:border-emerald-500 focus:ring-emerald-500 transition shadow-sm" required placeholder="Tuliskan detail pengumuman di sini..."></textarea>
                        </div>

                        <div class="space-y-1">
                            <label for="gambar" class="text-sm font-bold text-gray-700">Gambar Cover (Opsional)</label>
                            <input type="file" name="gambar" id="gambar" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-semibold file:bg-emerald-50 file:text-emerald-700 hover:file:bg-emerald-100 transition">
                        </div>

                        <div class="pt-6 flex space-x-3">
                            <button type="submit" class="flex-1 bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-3 rounded-xl transition shadow-lg shadow-emerald-200 uppercase tracking-widest text-sm">
                                Terbitkan Sekarang
                            </button>
                            <a href="{{ route('berita.index') }}" class="px-6 py-3 bg-gray-100 hover:bg-gray-200 text-gray-600 font-bold rounded-xl transition uppercase text-xs flex items-center">
                                Batal
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
