<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center space-x-4">
            <a href="{{ route('galeri.index') }}" class="p-2 bg-white rounded-xl shadow-sm border border-emerald-100 text-emerald-600 hover:bg-emerald-50 transition">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            </a>
            <div>
                <h2 class="font-black text-3xl text-emerald-950 uppercase tracking-tighter">Edit Foto Galeri</h2>
                <p class="text-emerald-600/80 font-bold text-sm mt-1 uppercase tracking-widest">Perbarui informasi foto</p>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="card-premium p-8 sm:p-10">
                <form action="{{ route('galeri.update', $galeri->id) }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                    @csrf
                    @method('PUT')

                    <!-- Judul -->
                    <div class="space-y-2">
                        <label for="judul" class="block text-[11px] font-black text-emerald-900 uppercase tracking-widest">
                            Judul Foto / Kegiatan <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <input type="text" name="judul" id="judul" required value="{{ old('judul', $galeri->judul) }}"
                                class="w-full bg-slate-50 border border-slate-200 text-emerald-950 text-sm rounded-2xl focus:ring-emerald-500 focus:border-emerald-500 block p-4 pl-12 transition-all duration-300 hover:border-emerald-300"
                                placeholder="Contoh: Upacara Kemerdekaan RI 2026">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none text-slate-400">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                            </div>
                        </div>
                        @error('judul') <p class="text-xs text-red-500 font-bold">{{ $message }}</p> @enderror
                    </div>

                    <!-- Foto saat ini -->
                    <div class="space-y-2">
                        <p class="text-[11px] font-black text-emerald-900 uppercase tracking-widest">Foto Saat Ini</p>
                        <img src="{{ asset('storage/' . $galeri->foto) }}" alt="{{ $galeri->judul }}" class="w-full max-h-64 object-cover rounded-2xl border-4 border-white shadow-lg">
                    </div>

                    <!-- Ganti Foto -->
                    <div class="space-y-2">
                        <label class="block text-[11px] font-black text-emerald-900 uppercase tracking-widest">
                            Ganti Foto <span class="text-slate-400 font-medium">(Opsional)</span>
                        </label>
                        <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-slate-200 border-dashed rounded-2xl bg-slate-50 hover:bg-emerald-50 hover:border-emerald-300 transition-colors cursor-pointer" onclick="document.getElementById('foto').click()">
                            <div class="space-y-2 text-center">
                                <svg class="mx-auto h-12 w-12 text-slate-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <div class="flex text-sm text-slate-600 justify-center">
                                    <span class="relative cursor-pointer bg-white rounded-md font-bold text-emerald-600 hover:text-emerald-500 px-2 py-1">
                                        <span>Pilih file foto baru</span>
                                        <input id="foto" name="foto" type="file" class="sr-only" accept="image/*" onchange="previewImage(event)">
                                    </span>
                                </div>
                                <p class="text-xs text-slate-500 font-medium">PNG, JPG, JPEG maksimal 5MB</p>
                            </div>
                        </div>
                        @error('foto') <p class="text-xs text-red-500 font-bold mt-1">{{ $message }}</p> @enderror

                        <!-- Preview baru -->
                        <div id="image-preview-container" class="hidden mt-4">
                            <p class="text-[10px] font-black text-emerald-900 uppercase tracking-widest mb-2">Preview Foto Baru</p>
                            <img id="image-preview" src="#" alt="Preview" class="w-full max-h-64 object-cover rounded-2xl border-4 border-emerald-200 shadow-lg">
                        </div>
                    </div>

                    <!-- Buttons -->
                    <div class="pt-6 flex items-center justify-end space-x-4 border-t border-slate-100">
                        <a href="{{ route('galeri.index') }}" class="px-8 py-4 bg-white border-2 border-slate-200 text-slate-600 font-black text-xs uppercase tracking-widest rounded-2xl hover:bg-slate-50 transition">
                            Batal
                        </a>
                        <button type="submit" class="btn-emerald flex items-center space-x-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            <span>Simpan Perubahan</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function previewImage(event) {
            const input = event.target;
            const container = document.getElementById('image-preview-container');
            const preview = document.getElementById('image-preview');
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    container.classList.remove('hidden');
                }
                reader.readAsDataURL(input.files[0]);
            } else {
                container.classList.add('hidden');
            }
        }
    </script>
</x-app-layout>
