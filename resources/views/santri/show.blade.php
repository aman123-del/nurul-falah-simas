<x-app-layout>
    <div class="py-2">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header with Actions -->
            <div class="mb-10 flex flex-col md:flex-row md:items-center justify-between gap-6">
                <div class="flex items-center space-x-4">
                    <a href="{{ route('santri.index') }}" class="w-12 h-12 bg-white rounded-2xl flex items-center justify-center text-gray-400 hover:text-emerald-600 hover:shadow-lg transition">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    </a>
                    <div>
                        <h1 class="text-4xl font-black text-emerald-950 tracking-tighter">Profil <span class="text-gradient-emerald">Lengkap Santri</span></h1>
                        <p class="text-gray-500 font-medium mt-1">Status Keanggotaan: <span class="text-emerald-600 font-black uppercase tracking-widest text-xs">{{ $santri->status }}</span></p>
                    </div>
                </div>
                <div class="flex items-center space-x-3">
                    <a href="{{ route('santri.exportPdf', $santri->id) }}" class="flex items-center space-x-2 px-6 py-4 bg-emerald-600 text-white rounded-2xl hover:bg-emerald-700 transition shadow-lg shadow-emerald-200 font-bold text-sm uppercase tracking-widest">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        <span>Cetak PDF</span>
                    </a>
                    <a href="{{ route('santri.edit', $santri->id) }}" class="p-4 bg-white text-amber-500 rounded-2xl hover:bg-amber-500 hover:text-white transition shadow-sm border border-gray-100">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                    </a>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
                <!-- Sidebar Profile Card -->
                <div class="lg:col-span-1">
                    <div class="card-premium p-8 sticky top-8">
                        <div class="relative mb-8 group">
                            <div class="w-full aspect-square bg-emerald-50 rounded-[2.5rem] overflow-hidden shadow-inner flex items-center justify-center">
                                @if($santri->foto)
                                    <img src="{{ asset('storage/'.$santri->foto) }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
                                @else
                                    <div class="text-emerald-200">
                                        <svg class="w-32 h-32" fill="currentColor" viewBox="0 0 24 24"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"></path></svg>
                                    </div>
                                @endif
                            </div>
                            <div class="absolute -bottom-4 left-1/2 -translate-x-1/2 bg-emerald-600 text-white px-6 py-2 rounded-xl font-black uppercase text-[10px] tracking-[0.2em] shadow-xl">
                                {{ $santri->status }}
                            </div>
                        </div>

                        <div class="text-center mb-10">
                            <h2 class="text-2xl font-black text-emerald-950 uppercase tracking-tight">{{ $santri->nama_lengkap }}</h2>
                            <p class="text-sm font-bold text-gray-400 font-mono mt-1">NIS: {{ $santri->nis }}</p>
                        </div>

                        <div class="space-y-4">
                            <div class="p-4 bg-slate-50 rounded-2xl border border-gray-100">
                                <p class="text-[10px] text-gray-400 font-black uppercase tracking-widest mb-1">Mulai Mondok</p>
                                <p class="text-sm font-black text-emerald-900 tracking-tight">{{ $santri->tanggal_masuk }}</p>
                            </div>
                            <div class="p-4 bg-slate-50 rounded-2xl border border-gray-100">
                                <p class="text-[10px] text-gray-400 font-black uppercase tracking-widest mb-1">Pendidikan Terakhir</p>
                                <p class="text-sm font-black text-emerald-900 tracking-tight">{{ $santri->asal_sekolah ?? 'Belum Terdata' }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Main Content Info -->
                <div class="lg:col-span-2 space-y-10">
                    <!-- Identity Section -->
                    <div class="card-premium p-10">
                        <div class="flex items-center space-x-4 mb-8">
                            <div class="w-12 h-12 bg-emerald-100 rounded-2xl flex items-center justify-center text-emerald-600">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V4a2 2 0 114 0v2m-4 0h4"></path></svg>
                            </div>
                            <h3 class="text-xl font-black text-emerald-950 uppercase tracking-tighter">Identitas Pribadi</h3>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                            <div class="space-y-1 border-l-4 border-emerald-500 pl-6 py-2">
                                <p class="text-[10px] text-gray-400 font-black uppercase tracking-widest">Tempat, Tgl Lahir</p>
                                <p class="text-base font-bold text-emerald-900">{{ $santri->tempat_lahir }}, {{ $santri->tanggal_lahir }}</p>
                            </div>
                            <div class="space-y-1 border-l-4 border-emerald-500 pl-6 py-2">
                                <p class="text-[10px] text-gray-400 font-black uppercase tracking-widest">NIK / NIS</p>
                                <p class="text-base font-bold text-emerald-900">{{ $santri->nik ?? '-' }} / {{ $santri->nis }}</p>
                            </div>
                            <div class="space-y-1 border-l-4 border-emerald-500 pl-6 py-2">
                                <p class="text-[10px] text-gray-400 font-black uppercase tracking-widest">Jenis Kelamin</p>
                                <p class="text-base font-bold text-emerald-900">{{ $santri->jenis_kelamin == 'L' ? 'Laki-laki' : ($santri->jenis_kelamin == 'P' ? 'Perempuan' : '-') }}</p>
                            </div>
                            <div class="space-y-1 border-l-4 border-emerald-500 pl-6 py-2">
                                <p class="text-[10px] text-gray-400 font-black uppercase tracking-widest">Anak Ke / Jml Saudara</p>
                                <p class="text-base font-bold text-emerald-900">Anak ke-{{ $santri->anak_ke ?? '-' }} dari {{ $santri->jumlah_saudara ?? '-' }} saudara</p>
                            </div>
                        </div>
                    </div>

                    <!-- Address & Contact Section -->
                    <div class="card-premium p-10">
                        <div class="flex items-center space-x-4 mb-8">
                            <div class="w-12 h-12 bg-emerald-100 rounded-2xl flex items-center justify-center text-emerald-600">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            </div>
                            <h3 class="text-xl font-black text-emerald-950 uppercase tracking-tighter">Kontak & Alamat Domisili</h3>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                            <div class="space-y-1 border-l-4 border-emerald-500 pl-6 py-2 md:col-span-2">
                                <p class="text-[10px] text-gray-400 font-black uppercase tracking-widest">Alamat Lengkap</p>
                                <p class="text-base font-bold text-emerald-900 leading-relaxed">
                                    {{ $santri->alamat }} 
                                    @if($santri->rt) RT {{ $santri->rt }} @endif
                                    @if($santri->rw) RW {{ $santri->rw }} @endif,
                                    Kec. {{ $santri->kecamatan ?? '-' }},
                                    Kab/Kota. {{ $santri->kabupaten ?? '-' }},
                                    Prov. {{ $santri->provinsi ?? '-' }},
                                    Kode Pos {{ $santri->kode_pos ?? '-' }}
                                </p>
                            </div>
                            <div class="space-y-1 border-l-4 border-emerald-500 pl-6 py-2">
                                <p class="text-[10px] text-gray-400 font-black uppercase tracking-widest">No. Kartu Keluarga (KK)</p>
                                <p class="text-base font-bold text-emerald-900">{{ $santri->no_kk ?? '-' }}</p>
                            </div>
                            <div class="space-y-1 border-l-4 border-emerald-500 pl-6 py-2">
                                <p class="text-[10px] text-gray-400 font-black uppercase tracking-widest">Nomor HP Santri</p>
                                <p class="text-base font-bold text-emerald-900">{{ $santri->no_hp ?? '-' }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Health Section -->
                    <div class="card-premium p-10">
                        <div class="flex items-center space-x-4 mb-8">
                            <div class="w-12 h-12 bg-emerald-100 rounded-2xl flex items-center justify-center text-emerald-600">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                            </div>
                            <h3 class="text-xl font-black text-emerald-950 uppercase tracking-tighter">Kesehatan</h3>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                            <div class="space-y-1 border-l-4 border-emerald-500 pl-6 py-2">
                                <p class="text-[10px] text-gray-400 font-black uppercase tracking-widest">Golongan Darah</p>
                                <p class="text-base font-bold text-emerald-900">{{ $santri->golongan_darah ?? '-' }}</p>
                            </div>
                            <div class="space-y-1 border-l-4 border-emerald-500 pl-6 py-2">
                                <p class="text-[10px] text-gray-400 font-black uppercase tracking-widest">Riwayat Penyakit Khusus</p>
                                <p class="text-base font-bold text-emerald-900">{{ $santri->riwayat_penyakit ?? 'Tidak ada' }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Parent Section -->
                    <div class="card-premium p-10">
                        <div class="flex items-center space-x-4 mb-8">
                            <div class="w-12 h-12 bg-emerald-100 rounded-2xl flex items-center justify-center text-emerald-600">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                            </div>
                            <h3 class="text-xl font-black text-emerald-950 uppercase tracking-tighter">Data Orang Tua</h3>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-10 gap-y-10">
                            <!-- Ayah -->
                            <div class="space-y-4">
                                <h4 class="text-sm font-bold text-emerald-700 uppercase tracking-widest border-b border-emerald-100 pb-2">Ayah Kandung</h4>
                                <div class="space-y-3">
                                    <div><p class="text-[10px] text-gray-400 font-bold uppercase">Nama Lengkap</p><p class="text-sm font-black text-emerald-900">{{ $santri->nama_ayah ?? '-' }}</p></div>
                                    <div><p class="text-[10px] text-gray-400 font-bold uppercase">NIK</p><p class="text-sm font-bold text-emerald-900">{{ $santri->nik_ayah ?? '-' }}</p></div>
                                    <div><p class="text-[10px] text-gray-400 font-bold uppercase">Tempat, Tgl Lahir</p><p class="text-sm font-bold text-emerald-900">{{ $santri->tempat_lahir_ayah ?? '-' }}, {{ $santri->tanggal_lahir_ayah ?? '-' }}</p></div>
                                    <div><p class="text-[10px] text-gray-400 font-bold uppercase">Pendidikan</p><p class="text-sm font-bold text-emerald-900">{{ $santri->pendidikan_ayah ?? '-' }}</p></div>
                                    <div><p class="text-[10px] text-gray-400 font-bold uppercase">Pekerjaan</p><p class="text-sm font-bold text-emerald-900">{{ $santri->pekerjaan_ayah ?? '-' }}</p></div>
                                </div>
                            </div>
                            <!-- Ibu -->
                            <div class="space-y-4">
                                <h4 class="text-sm font-bold text-emerald-700 uppercase tracking-widest border-b border-emerald-100 pb-2">Ibu Kandung</h4>
                                <div class="space-y-3">
                                    <div><p class="text-[10px] text-gray-400 font-bold uppercase">Nama Lengkap</p><p class="text-sm font-black text-emerald-900">{{ $santri->nama_ibu ?? '-' }}</p></div>
                                    <div><p class="text-[10px] text-gray-400 font-bold uppercase">NIK</p><p class="text-sm font-bold text-emerald-900">{{ $santri->nik_ibu ?? '-' }}</p></div>
                                    <div><p class="text-[10px] text-gray-400 font-bold uppercase">Tempat, Tgl Lahir</p><p class="text-sm font-bold text-emerald-900">{{ $santri->tempat_lahir_ibu ?? '-' }}, {{ $santri->tanggal_lahir_ibu ?? '-' }}</p></div>
                                    <div><p class="text-[10px] text-gray-400 font-bold uppercase">Pendidikan</p><p class="text-sm font-bold text-emerald-900">{{ $santri->pendidikan_ibu ?? '-' }}</p></div>
                                    <div><p class="text-[10px] text-gray-400 font-bold uppercase">Pekerjaan</p><p class="text-sm font-bold text-emerald-900">{{ $santri->pekerjaan_ibu ?? '-' }}</p></div>
                                </div>
                            </div>
                            <div class="md:col-span-2 pt-4 border-t border-gray-100">
                                <p class="text-[10px] text-gray-400 font-bold uppercase">Alamat Orang Tua</p>
                                <p class="text-sm font-bold text-emerald-900">{{ $santri->alamat_ortu ?? 'Sama dengan domisili santri' }}</p>
                            </div>
                            <div class="md:col-span-2">
                                <p class="text-[10px] text-gray-400 font-bold uppercase">Rata-rata Penghasilan</p>
                                <p class="text-sm font-bold text-emerald-900">{{ $santri->penghasilan_ortu ?? '-' }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Guardian Section -->
                    <div class="card-premium p-10 bg-gradient-to-br from-emerald-50 to-white">
                        <div class="flex items-center space-x-4 mb-8">
                            <div class="w-12 h-12 bg-emerald-100 rounded-2xl flex items-center justify-center text-emerald-600">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                            </div>
                            <h3 class="text-xl font-black text-emerald-950 uppercase tracking-tighter">Data Wali Santri</h3>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                            <div class="space-y-3">
                                <div><p class="text-[10px] text-gray-400 font-black uppercase tracking-widest mb-1">Nama Lengkap Wali</p><p class="text-xl font-black text-emerald-950 tracking-tight">{{ $santri->wali_nama }}</p></div>
                                <div><p class="text-[10px] text-gray-400 font-bold uppercase">NIK</p><p class="text-sm font-bold text-emerald-900">{{ $santri->nik_wali ?? '-' }}</p></div>
                                <div><p class="text-[10px] text-gray-400 font-bold uppercase">Tempat, Tgl Lahir</p><p class="text-sm font-bold text-emerald-900">{{ $santri->tempat_lahir_wali ?? '-' }}, {{ $santri->tanggal_lahir_wali ?? '-' }}</p></div>
                                <div><p class="text-[10px] text-gray-400 font-bold uppercase">Pendidikan & Pekerjaan</p><p class="text-sm font-bold text-emerald-900">{{ $santri->pendidikan_wali ?? '-' }} - {{ $santri->pekerjaan_wali ?? '-' }}</p></div>
                            </div>
                            <div class="space-y-3">
                                <div>
                                    <p class="text-[10px] text-gray-400 font-black uppercase tracking-widest mb-1">Nomor WhatsApp / HP</p>
                                    <div class="flex items-center space-x-2">
                                        <span class="w-2 h-2 bg-emerald-500 rounded-full animate-pulse"></span>
                                        <p class="text-xl font-black text-emerald-600 tracking-tight">{{ $santri->wali_kontak }}</p>
                                    </div>
                                </div>
                                <div><p class="text-[10px] text-gray-400 font-bold uppercase">Alamat Wali</p><p class="text-sm font-bold text-emerald-900 leading-relaxed">{{ $santri->alamat_wali ?? '-' }}</p></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
