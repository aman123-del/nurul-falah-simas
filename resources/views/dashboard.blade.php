<x-app-layout>
            <!-- Header Section -->
            <div class="mb-8">
                <h1 class="text-2xl lg:text-3xl font-black text-emerald-950 tracking-tight mb-2">Ahlan wa Sahlan, <span class="text-amber-500">{{ Auth::user()->name }}</span>!</h1>
                <p class="text-xs text-gray-500 font-bold tracking-wide">Pusat Komando e-Santri Nurul Falah.</p>
            </div>

            <!-- Stats Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 lg:gap-6 mb-8">
                <!-- Total Santri -->
                <div class="bg-gradient-to-br from-white to-emerald-50/30 p-4 lg:p-6 rounded-[2rem] border border-emerald-100/50 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-500 group">
                    <div class="flex items-center space-x-4">
                        <div class="w-12 h-12 bg-emerald-600 text-white rounded-2xl flex items-center justify-center shadow-lg shadow-emerald-200 group-hover:rotate-12 transition-transform duration-500 flex-shrink-0">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                        </div>
                        <div>
                            <p class="text-[9px] lg:text-[10px] text-gray-400 font-black uppercase tracking-[0.2em] mb-0.5">Total Santri</p>
                            <h3 class="text-xl lg:text-2xl font-black text-emerald-950">{{ $santriCount }}</h3>
                        </div>
                    </div>
                </div>

                <!-- Active -->
                <div class="bg-gradient-to-br from-white to-blue-50/30 p-4 lg:p-6 rounded-[2rem] border border-blue-100/50 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-500 group">
                    <div class="flex items-center space-x-4">
                        <div class="w-12 h-12 bg-blue-600 text-white rounded-2xl flex items-center justify-center shadow-lg shadow-blue-200 group-hover:rotate-12 transition-transform duration-500 flex-shrink-0">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <div>
                            <p class="text-[9px] lg:text-[10px] text-gray-400 font-black uppercase tracking-[0.2em] mb-0.5">Santri Aktif</p>
                            <h3 class="text-xl lg:text-2xl font-black text-emerald-950">{{ $activeSantriCount }}</h3>
                        </div>
                    </div>
                </div>

                <!-- Alumni -->
                <div class="bg-gradient-to-br from-white to-purple-50/30 p-4 lg:p-6 rounded-[2rem] border border-purple-100/50 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-500 group">
                    <div class="flex items-center space-x-4">
                        <div class="w-12 h-12 bg-purple-600 text-white rounded-2xl flex items-center justify-center shadow-lg shadow-purple-200 group-hover:rotate-12 transition-transform duration-500 flex-shrink-0">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                        </div>
                        <div>
                            <p class="text-[9px] lg:text-[10px] text-gray-400 font-black uppercase tracking-[0.2em] mb-0.5">Total Alumni</p>
                            <h3 class="text-xl lg:text-2xl font-black text-emerald-950">{{ $alumniCount }}</h3>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-12">
                <!-- Latest News -->
                <div class="lg:col-span-2 space-y-6">
                    <div class="flex items-center justify-between border-b border-gray-100 pb-4">
                        <h2 class="text-lg font-black text-emerald-950 tracking-tight flex items-center">
                            <span class="w-2 h-2 bg-emerald-500 rounded-full mr-3"></span>
                            Warta & Kabar Terbaru
                        </h2>
                        <a href="{{ route('berita.index') }}" class="text-[10px] font-black text-emerald-600 uppercase tracking-widest flex items-center group/btn">
                            Lihat Semua
                            <svg class="w-4 h-4 ml-2 group-hover/btn:translate-x-2 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                        </a>
                    </div>

                    <div class="grid grid-cols-1 gap-6">
                        @forelse($latestBerita as $news)
                            <div class="bg-white p-4 rounded-[1.5rem] border border-gray-100 hover:border-emerald-200 hover:shadow-xl hover:shadow-emerald-900/5 transition-all duration-500 flex flex-col md:flex-row gap-6 group/news">
                                <div class="w-full md:w-40 h-28 rounded-xl overflow-hidden shadow-inner flex-shrink-0 relative">
                                    @if($news->gambar)
                                        <img src="{{ asset('storage/'.$news->gambar) }}" class="w-full h-full object-cover group-hover/news:scale-110 transition duration-700">
                                    @else
                                        <div class="w-full h-full bg-emerald-50 flex items-center justify-center text-emerald-200">
                                            <svg class="w-10 h-10" fill="currentColor" viewBox="0 0 24 24"><path d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                        </div>
                                    @endif
                                </div>
                                <div class="flex-1">
                                    <div class="flex items-center space-x-2 mb-2">
                                        <span class="px-2 py-0.5 bg-emerald-50 text-emerald-600 text-[8px] font-black uppercase tracking-widest rounded-md">PENGUMUMAN</span>
                                        <span class="text-[9px] font-bold text-gray-400 uppercase tracking-widest">{{ \Carbon\Carbon::parse($news->tanggal_posting)->translatedFormat('d M Y') }}</span>
                                    </div>
                                    <h4 class="text-base font-black text-emerald-950 mb-1 leading-tight group-hover/news:text-emerald-700 transition line-clamp-1">{{ $news->judul }}</h4>
                                    <p class="text-[11px] text-gray-500 line-clamp-2 leading-relaxed">{{ Str::limit(strip_tags($news->isi), 120) }}</p>
                                </div>
                            </div>
                        @empty
                            <div class="p-12 text-center bg-slate-50/50 rounded-[2rem] border-2 border-dashed border-gray-100">
                                <p class="text-gray-400 text-xs font-bold italic">Belum ada publikasi terbaru saat ini.</p>
                            </div>
                        @endforelse
                    </div>
                </div>

                <!-- Sidebar Content -->
                <div class="space-y-6">
                    <!-- User Profile Premium Card -->
                    <div class="bg-emerald-950 rounded-[2rem] p-8 text-white shadow-2xl relative overflow-hidden group/profile">
                        <div class="relative z-10 text-center">
                            <div class="w-20 h-20 mx-auto rounded-2xl overflow-hidden border-4 border-white/10 mb-4 shadow-2xl group-hover/profile:scale-110 transition duration-500 flex items-center justify-center bg-gradient-to-tr from-emerald-500 to-teal-400">
                                @if(Auth::user()->photo)
                                    <img src="{{ asset('storage/' . Auth::user()->photo) }}" class="w-full h-full object-cover" alt="{{ Auth::user()->name }}">
                                @else
                                    <span class="text-3xl font-black text-white">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</span>
                                @endif
                            </div>
                            <h3 class="text-lg font-black tracking-tight mb-1">{{ Auth::user()->name }}</h3>
                            <p class="text-amber-400 font-black uppercase tracking-[0.2em] text-[9px] mb-8">{{ Auth::user()->role === 'admin' ? 'Administrator Sistem' : 'Bendahara Pondok' }}</p>
                            
                            <div class="space-y-3">
                                <div class="flex justify-between items-center px-4 py-3 bg-white/5 rounded-xl border border-white/5">
                                    <span class="text-white/40 text-[9px] font-bold uppercase tracking-widest">ID Member</span>
                                    <span class="font-mono text-[10px] font-black text-emerald-400">#NF-{{ str_pad(Auth::user()->id, 4, '0', STR_PAD_LEFT) }}</span>
                                </div>

                                <a href="{{ route('profile.edit') }}" class="flex items-center justify-center w-full py-3 bg-emerald-600 hover:bg-emerald-500 rounded-xl font-black text-[10px] uppercase tracking-widest text-white transition-all shadow-lg shadow-emerald-900/50">
                                    Kelola Akun
                                </a>
                            </div>
                        </div>
                        <!-- Background Effects -->
                        <div class="absolute -right-20 -bottom-20 w-48 h-48 bg-emerald-500/20 rounded-full blur-3xl"></div>
                    </div>

                    <!-- Motivational Quote -->
                    <div class="bg-gradient-to-br from-amber-50 to-orange-50/30 rounded-[2rem] p-8 border border-amber-100 shadow-sm relative overflow-hidden">
                        <div class="relative z-10">
                            <svg class="w-10 h-10 text-amber-200 mb-4" fill="currentColor" viewBox="0 0 24 24"><path d="M14.017 21L14.017 18C14.017 16.8954 14.9124 16 16.017 16H19.017C19.5693 16 20.017 15.5523 20.017 15V9C20.017 8.44772 19.5693 8 19.017 8H15.017C14.4647 8 14.017 7.55228 14.017 7V5C14.017 4.44772 14.4647 4 15.017 4H19.017C20.6739 4 22.017 5.34315 22.017 7V15C22.017 18.3137 19.3307 21 16.017 21H14.017ZM3.01697 21L3.01697 18C3.01697 16.8954 3.9124 16 5.01697 16H8.01697C8.56925 16 9.01697 15.5523 9.01697 15V9C9.01697 8.44772 8.56925 8 8.01697 8H4.01697C3.46468 8 3.01697 7.55228 3.01697 7V5C3.01697 4.44772 3.46468 4 4.01697 4H8.01697C9.67382 4 11.017 5.34315 11.017 7V15C11.017 18.3137 8.33068 21 5.01697 21H3.01697Z"></path></svg>
                            <p class="text-xs text-amber-900 font-black italic leading-relaxed mb-4">
                                "Menuntut ilmu adalah taqwa, menyampaikan ilmu adalah ibadah, mengulang-ulang ilmu adalah zikir, dan mencari ilmu adalah jihad."
                            </p>
                            <div class="w-12 h-1 bg-amber-400 rounded-full"></div>
                        </div>
                    </div>
                </div>
            </div>
</x-app-layout>
