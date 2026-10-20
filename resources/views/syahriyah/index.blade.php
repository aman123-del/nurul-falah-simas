<x-app-layout>
    <div class="min-h-screen bg-slate-50 bg-dot-pattern pt-8 pb-12">
        <div class="max-w-[95rem] mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header Section -->
            <div class="mb-8 flex flex-col md:flex-row md:items-center justify-between gap-4">
                <div>
                    <h1 class="text-2xl font-black text-emerald-950 tracking-tighter">
                        Manajemen <span class="text-gradient-emerald">Syahriyah</span>
                    </h1>
                    <p class="text-[10px] text-gray-500 font-medium mt-1 italic">Tahun Buku: <span class="text-emerald-600 font-black">{{ $year }}</span></p>
                </div>
                
                <div class="flex flex-col md:flex-row items-center gap-4">
                    <form action="{{ route('syahriyah.index') }}" method="GET" class="flex flex-col md:flex-row items-center gap-4 w-full md:w-auto">
                        <div class="relative w-full md:w-56">
                            <input type="text" name="search" value="{{ $search ?? '' }}" placeholder="Cari nama santri..." 
                                class="w-full pl-9 pr-4 py-1.5 rounded-xl border-gray-200 text-[11px] font-medium focus:ring-emerald-500 focus:border-emerald-500 shadow-sm transition-all duration-300">
                            <div class="absolute left-3 top-2 text-gray-400">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                            </div>
                        </div>

                        <select name="tahun" onchange="this.form.submit()" class="w-full md:w-auto rounded-xl border-gray-200 text-[11px] font-bold text-emerald-900 focus:ring-emerald-500 focus:border-emerald-500 shadow-sm">
                            @for($y = date('Y'); $y >= 2024; $y--)
                                <option value="{{ $y }}" {{ $year == $y ? 'selected' : '' }}>Tahun {{ $y }}</option>
                            @endfor
                        </select>
                        
                        @if($search)
                            <a href="{{ route('syahriyah.index', ['tahun' => $year]) }}" class="text-xs font-bold text-red-500 hover:text-red-700 underline uppercase tracking-widest whitespace-nowrap">Reset Search</a>
                        @endif
                    </form>
                </div>
            </div>

            @if (session('success'))
                <div class="mb-8 animate-bounce-short">
                    <div class="bg-emerald-600 text-white px-6 py-4 rounded-3xl shadow-xl shadow-emerald-200 flex items-center justify-between">
                        <div class="flex items-center space-x-3">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                            <span class="font-black uppercase tracking-widest text-xs">{{ session('success') }}</span>
                        </div>
                    </div>
                </div>
            @endif

            <div class="card-premium overflow-hidden">
                @if(Auth::user()->isSantri())
                    <!-- Santri View -->
                    <div class="p-4">
                        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-6">
                            @foreach($months as $month)
                                @php $isPaid = isset($syahriyahs[$month]); @endphp
                                <div class="relative group">
                                    <div class="p-6 rounded-[2rem] border-2 transition-all duration-500 {{ $isPaid ? 'bg-emerald-50 border-emerald-200' : 'bg-slate-50 border-gray-100 opacity-60' }}">
                                        <p class="text-[10px] font-black uppercase tracking-[0.2em] mb-3 {{ $isPaid ? 'text-emerald-600' : 'text-gray-400' }}">{{ $month }}</p>
                                        <div class="flex items-center justify-between">
                                            @if($isPaid)
                                                <span class="text-emerald-700 font-black">LUNAS</span>
                                                <div class="w-10 h-10 bg-emerald-500 rounded-2xl flex items-center justify-center text-white shadow-lg shadow-emerald-200">
                                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                                                </div>
                                            @else
                                                <span class="text-gray-400 font-black">BELUM</span>
                                                <div class="w-10 h-10 bg-gray-200 rounded-2xl flex items-center justify-center text-gray-400">
                                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M6 18L18 6M6 6l12 12"></path></svg>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @else
                    <!-- Bendahara / Admin View -->
                    <div class="overflow-x-auto custom-scrollbar border-2 border-slate-200 rounded-[2rem] shadow-sm">
                        <table class="w-full text-left border-separate border-spacing-0">
                            <thead>
                                <tr class="bg-emerald-950 text-white">
                                    <th class="p-3 text-[10px] font-black uppercase tracking-tighter sticky left-0 z-30 bg-emerald-950 border-r-2 border-white/10 min-w-[140px] shadow-[4px_0_10px_rgba(0,0,0,0.2)]">Santri</th>
                                    @foreach($months as $month)
                                        <th class="p-2 text-[9px] font-black uppercase tracking-tighter text-center border-r border-white/10 min-w-[65px] last:border-r-0">{{ substr($month, 0, 3) }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-200">
                                @foreach($santris as $santri)
                                    <tr class="{{ $loop->even ? 'bg-slate-50' : 'bg-white' }} hover:bg-emerald-50 transition-colors group">
                                        <td class="p-3 sticky left-0 z-10 bg-inherit group-hover:bg-emerald-50 transition-colors border-r-2 border-slate-200 shadow-[4px_0_10px_rgba(0,0,0,0.02)]">
                                            <div class="flex items-center space-x-2">
                                                <div class="w-7 h-7 rounded-lg bg-emerald-700 text-white flex items-center justify-center font-black text-[10px] flex-shrink-0">
                                                    {{ strtoupper(substr($santri->nama_lengkap, 0, 1)) }}
                                                </div>
                                                <div class="min-w-0">
                                                    <p class="font-black text-slate-900 text-[11px] tracking-tight truncate leading-none">{{ $santri->nama_lengkap }}</p>
                                                    <p class="text-[8px] text-emerald-600 font-bold font-mono mt-1">NIS: {{ $santri->nis }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        @foreach($months as $month)
                                            @php 
                                                $isPaid = isset($payments[$santri->id][$month]);
                                            @endphp
                                            <td class="p-1 px-2 text-center border-r border-slate-200 last:border-r-0">
                                                <form action="{{ route('syahriyah.toggle') }}" method="POST" 
                                                    @if($isPaid) 
                                                        onsubmit="return confirm('PERINGATAN: Apakah Anda yakin ingin membatalkan status LUNAS untuk {{ $santri->nama_lengkap }} pada bulan {{ $month }}? Tindakan ini akan menghapus data pembayaran tersebut.')" 
                                                    @endif>
                                                    @csrf
                                                    <input type="hidden" name="santri_id" value="{{ $santri->id }}">
                                                    <input type="hidden" name="bulan" value="{{ $month }}">
                                                    <input type="hidden" name="tahun" value="{{ $year }}">
                                                    <input type="hidden" name="search" value="{{ $search ?? '' }}">
                                                    
                                                    <button type="submit" 
                                                        @if(!Auth::user()->isBendahara()) 
                                                            disabled 
                                                            title="Hanya Bendahara yang diizinkan mengelola data Syahriyah" 
                                                        @endif
                                                        class="w-9 h-9 mx-auto rounded-xl flex items-center justify-center transition-all duration-300 {{ !Auth::user()->isBendahara() ? 'cursor-not-allowed' : '' }} {{ $isPaid ? 'bg-emerald-600 text-white shadow-lg shadow-emerald-200' : 'bg-white border-2 border-slate-100 text-slate-200 hover:border-emerald-200 hover:text-emerald-500' }}">
                                                        @if($isPaid)
                                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="4" d="M5 13l4 4L19 7"></path></svg>
                                                        @else
                                                            <svg class="w-5 h-5 opacity-0 group-hover:opacity-100 transition-opacity" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 4v16m8-8H4"></path></svg>
                                                            <div class="w-2 h-2 rounded-full bg-slate-200 group-hover:hidden"></div>
                                                        @endif
                                                    </button>
                                                </form>
                                            </td>
                                        @endforeach
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>

            <!-- Summary Card -->
            <div class="mt-6 grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="card-premium p-5 bg-gradient-to-br from-emerald-800 to-emerald-950 text-white relative overflow-hidden">
                    <div class="relative z-10">
                        <p class="text-[8px] font-black uppercase tracking-widest text-emerald-400 mb-1">Informasi Pembayaran</p>
                        <h4 class="text-base font-black mb-2 tracking-tight leading-none italic">Total Tagihan</h4>
                        <p class="text-2xl font-black text-gradient-gold">Rp 50.000</p>
                    </div>
                    <div class="absolute -right-10 -bottom-10 w-32 h-32 bg-white/5 rounded-full blur-3xl"></div>
                </div>
                
                <div class="md:col-span-2 card-premium p-5 flex items-center bg-white border-2 border-dashed border-emerald-100">
                    <div class="w-12 h-12 bg-emerald-50 rounded-xl flex items-center justify-center text-emerald-600 mr-6 flex-shrink-0">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <div>
                        <h5 class="font-black text-emerald-950 text-xs uppercase tracking-tight mb-1">Panduan Penggunaan</h5>
                        <p class="text-[11px] text-gray-500 font-medium leading-relaxed italic">
                            @if(Auth::user()->isSantri())
                                Panel ini merupakan rekapitulasi pembayaran Syahriyah Anda. Status LUNAS (hijau) menunjukkan Anda telah menyelesaikan kewajiban bulan tersebut. Jika terdapat ketidaksesuaian, harap hubungi Bendahara.
                            @elseif(Auth::user()->isBendahara())
                                Bendahara cukup menekan tombol kotak di setiap kolom bulan untuk melakukan konfirmasi pembayaran. Warna HIJAU menandakan lunas, dan ABU-ABU menandakan belum bayar.
                            @else
                                Admin hanya memiliki hak akses untuk memantau data Syahriyah. Hanya Bendahara yang diizinkan untuk melakukan konfirmasi atau merubah data pembayaran.
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
