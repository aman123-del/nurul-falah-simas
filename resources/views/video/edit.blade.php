<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center space-x-4">
            <a href="{{ route('video.index') }}" class="p-2 bg-white rounded-xl shadow-sm border border-emerald-100 text-emerald-600 hover:bg-emerald-50 transition">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            </a>
            <div>
                <h2 class="font-black text-3xl text-emerald-950 uppercase tracking-tighter">
                    Edit Video Kegiatan
                </h2>
                <p class="text-emerald-600/80 font-bold text-sm mt-1 uppercase tracking-widest">
                    Perbarui tautan atau rincian video
                </p>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="card-premium p-8 sm:p-10 bg-white rounded-2xl border border-emerald-100 shadow-sm">
                <form action="{{ route('video.update', $video->id) }}" method="POST" class="space-y-8">
                    @csrf
                    @method('PUT')
                    
                    <!-- Judul Video -->
                    <div class="space-y-2">
                        <label for="judul" class="block text-[11px] font-black text-emerald-900 uppercase tracking-widest">
                            Judul Video <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <input type="text" name="judul" id="judul" required value="{{ old('judul', $video->judul) }}"
                                class="w-full bg-slate-50 border border-slate-200 text-emerald-950 text-sm rounded-2xl focus:ring-emerald-500 focus:border-emerald-500 block p-4 pl-12 transition-all duration-300 hover:border-emerald-300" 
                                placeholder="Contoh: Pengajian Akbar & Wisuda Santri 2026">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none text-slate-400">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/></svg>
                            </div>
                        </div>
                        @error('judul') <p class="text-xs text-red-500 font-bold">{{ $message }}</p> @enderror
                    </div>

                    <!-- Keterangan Singkat -->
                    <div class="space-y-2">
                        <label for="keterangan" class="block text-[11px] font-black text-emerald-900 uppercase tracking-widest">
                            Keterangan / Subjudul <span class="text-slate-400 font-normal">(Opsional)</span>
                        </label>
                        <div class="relative">
                            <input type="text" name="keterangan" id="keterangan" value="{{ old('keterangan', $video->keterangan) }}"
                                class="w-full bg-slate-50 border border-slate-200 text-emerald-950 text-sm rounded-2xl focus:ring-emerald-500 focus:border-emerald-500 block p-4 pl-12 transition-all duration-300 hover:border-emerald-300" 
                                placeholder="Contoh: Suasana semarak wisuda santri angkatan 2026">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none text-slate-400">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"/></svg>
                            </div>
                        </div>
                        @error('keterangan') <p class="text-xs text-red-500 font-bold">{{ $message }}</p> @enderror
                    </div>

                    <!-- URL YouTube -->
                    <div class="space-y-2">
                        <label for="youtube_url" class="block text-[11px] font-black text-emerald-900 uppercase tracking-widest">
                            Link / URL Video YouTube <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <input type="text" name="youtube_url" id="youtube_url" required value="{{ old('youtube_url', $video->youtube_url) }}"
                                class="w-full bg-slate-50 border border-slate-200 text-emerald-950 text-sm rounded-2xl focus:ring-emerald-500 focus:border-emerald-500 block p-4 pl-12 transition-all duration-300 hover:border-emerald-300" 
                                placeholder="https://www.youtube.com/watch?v=... atau https://youtu.be/..."
                                oninput="updateYoutubePreview(this.value)">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none text-red-500">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                            </div>
                        </div>
                        <p class="text-[11px] text-slate-500 mt-1">
                            Mendukung link reguler YouTube, tautan share (<code class="text-emerald-700 font-bold">youtu.be/...</code>), maupun YouTube Shorts.
                        </p>
                        @error('youtube_url') <p class="text-xs text-red-500 font-bold mt-1">{{ $message }}</p> @enderror

                        <!-- Live Preview Box -->
                        <div id="video-preview-container" class="mt-4 pt-4 border-t border-slate-100 {{ $video->embed_url ? '' : 'hidden' }}">
                            <p class="text-[10px] font-black text-emerald-900 uppercase tracking-widest mb-2 flex items-center space-x-1">
                                <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse inline-block"></span>
                                <span>Preview Live Video:</span>
                            </p>
                            <div class="relative overflow-hidden rounded-2xl aspect-video bg-black shadow-lg">
                                <iframe id="video-preview-iframe" class="absolute inset-0 w-full h-full" src="{{ $video->embed_url ?? '' }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="pt-6 flex items-center justify-end space-x-4 border-t border-slate-100">
                        <a href="{{ route('video.index') }}" class="px-8 py-4 bg-white border-2 border-slate-200 text-slate-600 font-black text-xs uppercase tracking-widest rounded-2xl hover:bg-slate-50 transition">
                            Batal
                        </a>
                        <button type="submit" class="btn-emerald flex items-center space-x-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            <span>Perbarui Video</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function extractYouTubeId(url) {
            url = (url || '').trim();
            if (!url) return null;
            if (/^[a-zA-Z0-9_-]{11}$/.test(url)) return url;
            const regExp = /(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/|youtube\.com\/shorts\/)([a-zA-Z0-9_-]{11})/i;
            const match = url.match(regExp);
            return match ? match[1] : null;
        }

        function updateYoutubePreview(url) {
            const videoId = extractYouTubeId(url);
            const container = document.getElementById('video-preview-container');
            const iframe = document.getElementById('video-preview-iframe');

            if (videoId) {
                iframe.src = 'https://www.youtube.com/embed/' + videoId;
                container.classList.remove('hidden');
            } else {
                iframe.src = '';
                container.classList.add('hidden');
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            const currentUrl = document.getElementById('youtube_url').value;
            if (currentUrl) {
                updateYoutubePreview(currentUrl);
            }
        });
    </script>
</x-app-layout>
