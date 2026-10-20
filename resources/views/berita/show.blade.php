<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center space-x-4">
            <a href="{{ route('berita.index') }}" class="text-emerald-600 hover:text-emerald-700">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            </a>
            <h2 class="font-bold text-2xl text-emerald-800 leading-tight">
                {{ __('Detail Berita') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <article class="bg-white overflow-hidden shadow-sm rounded-3xl border border-gray-100">
                @if($berita->gambar)
                    <div class="h-96 w-full overflow-hidden">
                        <img src="{{ asset('storage/'.$berita->gambar) }}" class="w-full h-full object-cover">
                    </div>
                @endif
                
                <div class="p-8 md:p-12">
                    <div class="flex items-center space-x-2 text-xs font-bold text-emerald-600 uppercase tracking-widest mb-4">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        <span>{{ $berita->tanggal_posting }}</span>
                    </div>

                    <h1 class="text-3xl md:text-4xl font-black text-emerald-900 mb-8 leading-tight">
                        {{ $berita->judul }}
                    </h1>

                    <div class="prose prose-emerald max-w-none text-gray-700 leading-relaxed space-y-4">
                        {!! nl2br(e($berita->isi)) !!}
                    </div>

                    @if(Auth::user()->isAdmin())
                        <div class="mt-12 pt-8 border-t border-gray-50 flex justify-end">
                            <a href="{{ route('berita.edit', $berita->id) }}" class="bg-amber-500 hover:bg-amber-600 text-white px-6 py-2 rounded-xl font-bold transition shadow-lg shadow-amber-200 uppercase text-xs">
                                Edit Berita
                            </a>
                        </div>
                    @endif
                </div>
            </article>

            <div class="mt-8 text-center">
                <p class="text-gray-400 text-sm">Kembali ke <a href="{{ route('berita.index') }}" class="text-emerald-600 font-bold hover:underline">Halaman Berita</a></p>
            </div>
        </div>
    </div>
</x-app-layout>
