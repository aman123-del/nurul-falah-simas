<x-app-layout>
    <div class="min-h-screen bg-slate-50 pt-8 pb-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header Section -->
            <div class="mb-10 flex items-center justify-between no-print">
                <div class="flex items-center space-x-4">
                    <a href="{{ route('santri.show', $santri->id) }}" class="w-12 h-12 bg-white rounded-2xl flex items-center justify-center text-gray-400 hover:text-emerald-600 hover:shadow-lg transition border border-gray-100">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    </a>
                    <h1 class="text-4xl font-black text-emerald-950 tracking-tighter">Kartu <span class="text-gradient-emerald">Tanda Santri</span></h1>
                </div>
                <button onclick="window.print()" class="btn-emerald h-14 !px-8">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path></svg>
                    Cetak Kartu Sekarang
                </button>
            </div>

            <div class="flex flex-col items-center">
                <!-- Digital Card Container -->
                <div class="card-container print:m-0 print:shadow-none">
                    <div class="w-[450px] h-[280px] bg-white rounded-[2.5rem] shadow-[0_20px_50px_rgba(5,150,105,0.15)] overflow-hidden relative border border-emerald-100/50 print:border-emerald-800/10 print:shadow-none">
                        
                        <!-- Premium Card Header -->
                        <div class="bg-gradient-to-r from-emerald-800 via-emerald-700 to-emerald-600 h-[75px] flex items-center px-8 relative overflow-hidden">
                            <!-- Background Pattern Overlay -->
                            <div class="absolute inset-0 opacity-10 pointer-events-none bg-dot-pattern"></div>
                            
                            <div class="flex items-center space-x-4 relative z-10">
                                <x-application-logo class="h-16 w-auto drop-shadow-sm" />
                                <div>
                                    <h3 class="font-black text-xs leading-none tracking-[0.2em] text-white uppercase italic">Digital Identity</h3>
                                    <p class="text-[14px] font-black text-emerald-100 uppercase tracking-tighter mt-1">Nurul Falah <span class="text-white">Berbaur</span></p>
                                </div>
                            </div>
                            
                            <div class="ml-auto relative z-10 text-right">
                                <p class="text-[8px] font-black text-emerald-200 uppercase tracking-widest leading-none">Valid Thru</p>
                                <p class="text-[10px] font-black text-white mt-1">2026/2027</p>
                            </div>
                        </div>

                        <!-- Card Body -->
                        <div class="p-8 flex space-x-8 items-center bg-white">
                            <!-- Photo with Frame -->
                            <div class="relative">
                                <div class="w-28 h-36 bg-slate-50 rounded-2xl overflow-hidden shadow-inner ring-4 ring-emerald-50 flex-shrink-0 relative z-10">
                                    @if($santri->foto)
                                        <img src="{{ asset('storage/'.$santri->foto) }}" class="w-full h-full object-cover">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center text-emerald-100">
                                            <svg class="w-16 h-16" fill="currentColor" viewBox="0 0 24 24"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"></path></svg>
                                        </div>
                                    @endif
                                </div>
                                <!-- Decorative Circles -->
                                <div class="absolute -top-4 -left-4 w-12 h-12 bg-emerald-500/5 rounded-full blur-xl"></div>
                            </div>

                            <!-- Identity Details -->
                            <div class="flex-1 space-y-4">
                                <div>
                                    <p class="text-[8px] text-gray-400 font-black uppercase tracking-[0.2em] mb-0.5">Full Name</p>
                                    <h4 class="text-lg font-black text-emerald-950 leading-tight uppercase tracking-tight">{{ $santri->nama_lengkap }}</h4>
                                </div>
                                <div class="flex gap-6">
                                    <div>
                                        <p class="text-[8px] text-gray-400 font-black uppercase tracking-[0.2em] mb-0.5">Registration ID</p>
                                        <h4 class="text-sm font-black text-emerald-600 font-mono tracking-widest">{{ $santri->nis }}</h4>
                                    </div>
                                    <div>
                                        <p class="text-[8px] text-gray-400 font-black uppercase tracking-[0.2em] mb-0.5">Status</p>
                                        <span class="inline-block px-3 py-1 bg-emerald-100 text-emerald-700 rounded-lg text-[9px] font-black uppercase tracking-widest">
                                            {{ $santri->status }}
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <!-- Official Seal Watermark -->
                            <div class="absolute right-0 bottom-0 opacity-[0.05] -mr-6 -mb-6 pointer-events-none">
                                <x-application-logo class="w-40 h-40 object-contain grayscale" />
                            </div>
                        </div>

                        <!-- Footnote Gradient -->
                        <div class="absolute bottom-0 left-0 right-0 h-1.5 bg-gradient-to-r from-emerald-400 via-emerald-600 to-emerald-800"></div>
                    </div>
                </div>

                <div class="mt-12 max-w-md text-center no-print">
                    <p class="text-gray-400 text-xs font-bold leading-relaxed italic border-t border-gray-100 pt-6">
                        Kartu ini adalah identitas resmi di lingkungan <br>
                        <span class="text-emerald-600 font-black uppercase">Ponpes Nurul Falah Berbaur</span>. <br>
                        Harap dibawa saat proses administrasi dan perizinan.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <style>
        @media print {
            .no-print { display: none !important; }
            body { background: white !important; margin: 0; padding: 0; }
            .min-h-screen { min-height: 0 !important; background: transparent !important; padding: 0 !important; }
            .card-container { display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
            * { -webkit-print-color-adjust: exact !important; print-color-adjust: exact !important; }
        }
    </style>
</x-app-layout>
