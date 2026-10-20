<x-app-layout>
    <div class="min-h-screen bg-slate-50 bg-dot-pattern pt-8 pb-12">
        <div class="w-full px-4 sm:px-6 lg:px-8">
            <!-- Header Section -->
            <div class="mb-12 flex flex-col md:flex-row md:items-end md:justify-between gap-6">
                <div>
                    <h1 class="text-4xl font-black text-emerald-950 tracking-tighter">
                        Pusat <span class="text-gradient-emerald">Laporan & Arsip</span>
                    </h1>
                    <p class="text-gray-500 font-medium mt-2">Unduh rekapitulasi data santri dan keuangan dalam format dokumen resmi (PDF).</p>
                </div>
                
                <!-- Quick Stats -->
                <div class="flex items-center space-x-4 bg-white p-2 rounded-2xl border border-emerald-100 shadow-sm">
                    <div class="px-4 py-2 border-r border-gray-100 text-center">
                        <p class="text-[9px] font-black text-gray-400 uppercase tracking-widest">Total Santri</p>
                        <p class="text-lg font-black text-emerald-600">{{ $stats['total_santri'] }}</p>
                    </div>
                    <div class="px-4 py-2 border-r border-gray-100 text-center">
                        <p class="text-[9px] font-black text-gray-400 uppercase tracking-widest">Alumni</p>
                        <p class="text-lg font-black text-purple-600">{{ \App\Models\Santri::where('status', 'Alumni')->count() }}</p>
                    </div>
                    <div class="px-4 py-2 text-center">
                        <p class="text-[9px] font-black text-gray-400 uppercase tracking-widest">Total Keuangan</p>
                        <p class="text-lg font-black text-amber-500">Rp{{ number_format($stats['total_syahriyah'], 0, ',', '.') }}</p>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">
                <!-- Santri Report Card -->
                <div class="card-premium p-10 group overflow-hidden relative">
                    <!-- Decorative Background Element -->
                    <div class="absolute -right-10 -top-10 w-40 h-40 bg-emerald-50 rounded-full group-hover:scale-110 transition duration-500"></div>
                    
                    <div class="relative z-10 flex flex-col items-center text-center">
                        <div class="w-24 h-24 bg-emerald-100 text-emerald-600 rounded-[2rem] flex items-center justify-center mb-8 shadow-inner ring-8 ring-emerald-50">
                            <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 01-9-4.912a2.25 2.25 0 010-4.175m9 8.354a4.25 4.25 0 000-8.354M15 9.75a3.375 3.375 0 110 6.75 3.375 3.375 0 010-6.75z"></path></svg>
                        </div>
                        <h3 class="text-2xl font-black text-emerald-950 uppercase tracking-tighter mb-4">Daftar Santri Aktif</h3>
                        <p class="text-sm text-gray-500 max-w-sm mb-10 leading-relaxed font-medium">
                            Hasilkan dokumen PDF berisi seluruh data santri yang saat ini terdaftar aktif di pondok pesantren.
                        </p>
                        <a href="{{ route('reports.santri-pdf') }}" class="btn-emerald h-16 w-full !text-base shadow-xl">
                            <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M9 19l3 3m0 0l3-3m-3 3V10"></path></svg>
                            Download Data Santri (.PDF)
                        </a>
                    </div>
                </div>

                <!-- Financial Report Card -->
                <div class="card-premium p-10 group overflow-hidden relative">
                    <div class="absolute -right-10 -top-10 w-40 h-40 bg-amber-50 rounded-full group-hover:scale-110 transition duration-500"></div>
                    <div class="relative z-10 flex flex-col items-center text-center">
                        <div class="w-24 h-24 bg-amber-100 text-amber-600 rounded-[2rem] flex items-center justify-center mb-8 shadow-inner ring-8 ring-amber-50">
                            <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                        </div>
                        <h3 class="text-2xl font-black text-emerald-950 uppercase tracking-tighter mb-4">Laporan Syahriyah</h3>
                        <p class="text-sm text-gray-500 max-w-sm mb-10 leading-relaxed font-medium">
                            Rekapitulasi seluruh pembayaran uang bulanan (Syahriyah) santri untuk pemantauan pemasukan kas.
                        </p>
                        <a href="{{ route('reports.syahriyah-pdf') }}" class="btn-gold h-16 w-full !text-base shadow-xl">
                            <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                            Download Keuangan (.PDF)
                        </a>
                    </div>
                </div>

                <!-- Alumni Report Card -->
                <div class="card-premium p-10 group overflow-hidden relative lg:col-span-2 max-w-2xl mx-auto w-full">
                    <div class="absolute -right-10 -top-10 w-40 h-40 bg-purple-50 rounded-full group-hover:scale-110 transition duration-500"></div>
                    <div class="relative z-10 flex flex-col items-center text-center">
                        <div class="w-24 h-24 bg-purple-100 text-purple-600 rounded-[2rem] flex items-center justify-center mb-8 shadow-inner ring-8 ring-purple-50">
                            <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                        </div>
                        <h3 class="text-2xl font-black text-emerald-950 uppercase tracking-tighter mb-4">Database Alumni</h3>
                        <p class="text-sm text-gray-500 max-w-sm mb-10 leading-relaxed font-medium">
                            Arsip lengkap data santri yang telah lulus dari pondok pesantren Nurul Falah Berbaur.
                        </p>
                        <a href="{{ route('reports.alumni-pdf') }}" class="btn-secondary h-16 w-full !text-base shadow-xl !bg-purple-600 !text-white border-none hover:!bg-purple-700">
                            <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                            Download Data Alumni (.PDF)
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
