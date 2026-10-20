<x-app-layout>
    <!-- Header Section -->
            <div class="mb-8">
                <div class="mb-4">
                    <h1 class="text-xl lg:text-2xl font-black text-emerald-950 tracking-tighter">
                        Database <span class="text-gradient-emerald">Master Santri {{ $status }}</span>
                    </h1>
                    <p class="text-[10px] text-gray-500 font-medium mt-1">Kelola seluruh data santri dan alumni dalam satu pusat data terpadu.</p>
                </div>
                <!-- Toolbar -->
                <div class="flex flex-col md:flex-row items-center justify-between gap-4">
                    <form id="filter-form" method="GET" action="{{ route('santri.index') }}" class="w-full md:w-auto md:flex-1 flex flex-col md:flex-row gap-2 max-w-2xl">
                        <input type="hidden" name="status" value="{{ $status }}">
                        
                        <!-- Search Box -->
                        <div class="flex-1 flex items-center bg-white border border-gray-200 rounded-xl overflow-hidden focus-within:ring-2 focus-within:ring-emerald-500 focus-within:border-emerald-500 transition-all duration-300 shadow-sm">
                            <div class="pl-3 text-emerald-500">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                            </div>
                            <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari Nama / NIS..." class="w-full border-none focus:ring-0 text-[10px] font-medium text-emerald-950 placeholder-gray-400 py-2 bg-transparent" onblur="document.getElementById('filter-form').submit()" onkeypress="if(event.keyCode==13) document.getElementById('filter-form').submit();">
                        </div>

                        <!-- Year Filter -->
                        <div class="w-full md:w-40 bg-white border border-gray-200 rounded-xl overflow-hidden focus-within:ring-2 focus-within:ring-emerald-500 focus-within:border-emerald-500 transition-all duration-300 shadow-sm relative">
                            <select name="tahun" onchange="document.getElementById('filter-form').submit()" class="w-full border-none focus:ring-0 text-[10px] font-medium text-emerald-950 py-2 pl-3 pr-8 bg-transparent appearance-none cursor-pointer">
                                <option value="">Semua Tahun</option>
                                @foreach($tahunMasukOptions as $thn)
                                    <option value="{{ $thn }}" {{ request('tahun') == $thn ? 'selected' : '' }}>{{ $thn }}</option>
                                @endforeach
                            </select>
                            <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none text-emerald-500">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </div>
                        </div>
                    </form>

                    <div class="flex items-center gap-2 w-full md:w-auto overflow-x-auto pb-1 md:pb-0">
                        <a href="{{ route('reports.santri-pdf', ['status' => $status, 'search' => request('search'), 'tahun' => request('tahun')]) }}" class="h-9 px-4 flex items-center justify-center font-bold text-[10px] text-red-800 bg-white border border-red-200 hover:bg-red-50 rounded-xl transition-all shadow-sm shrink-0">
                            <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                            PDF
                        </a>
                        <a href="{{ route('santri.export', ['status' => $status, 'search' => request('search'), 'tahun' => request('tahun')]) }}" class="h-9 px-4 flex items-center justify-center font-bold text-[10px] text-emerald-800 bg-white border border-emerald-200 hover:bg-emerald-50 rounded-xl transition-all shadow-sm shrink-0">
                            <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                            Excel
                        </a>
                        @if(Auth::user()->isAdmin())
                            <div class="hidden items-center" id="bulk-action-container" style="display: none;">
                                @if($status == 'Alumni')
                                    <button type="button" onclick="confirmBulkAction('delete')" class="h-9 px-4 flex items-center justify-center font-bold text-[10px] text-white bg-red-600 hover:bg-red-700 rounded-xl transition-all shadow-sm shrink-0 mr-2">
                                        <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-4v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                        Hapus Terpilih
                                    </button>
                                @else
                                    <button type="button" onclick="confirmBulkAction('alumni')" class="h-9 px-4 flex items-center justify-center font-bold text-[10px] text-white bg-purple-600 hover:bg-purple-700 rounded-xl transition-all shadow-sm shrink-0 mr-2">
                                        <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4-4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                                        Jadikan Alumni
                                    </button>
                                @endif
                            </div>
                            <a href="{{ route('santri.create') }}" class="btn-emerald h-9 !px-4 flex items-center justify-center text-[10px] shrink-0">
                                <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                                Tambah
                            </a>
                        @endif
                    </div>
                </div>
            </div>

            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

            @if(session('success'))
                <div class="mb-8 p-5 bg-gradient-to-r from-emerald-500 to-teal-500 text-white rounded-3xl shadow-lg ring-4 ring-emerald-500/10 flex items-center">
                    <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <span class="font-bold">{{ session('success') }}</span>
                </div>
            @endif

            @if(session('error'))
                <div class="mb-8 p-5 bg-gradient-to-r from-red-500 to-rose-500 text-white rounded-3xl shadow-lg ring-4 ring-red-500/10 flex items-center">
                    <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <span class="font-bold">{{ session('error') }}</span>
                </div>
            @endif

            <form id="bulk-action-form" method="POST" action="{{ route('santri.bulkAction') }}" style="display: none;">
                @csrf
                <input type="hidden" name="action" id="bulk-action-type" value="">
                <div id="bulk-action-inputs"></div>
            </form>

            <!-- Main Content Area -->
            <div class="card-premium">
                <div class="p-4">
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-separate border-spacing-y-4">
                            <thead>
                                <tr class="text-emerald-900 uppercase text-[9px] font-black tracking-[0.1em]">
                                    @if(Auth::user()->isAdmin())
                                    <th class="px-4 py-3 text-center w-12">
                                        <input type="checkbox" id="selectAll" onclick="toggleSelectAll(this)" class="rounded border-gray-300 text-emerald-600 shadow-sm focus:border-emerald-300 focus:ring focus:ring-emerald-200 focus:ring-opacity-50">
                                    </th>
                                    @endif
                                    <th class="px-4 py-3 text-center">Profil</th>
                                    <th class="px-4 py-3 text-center">Data Identitas</th>
                                    <th class="px-4 py-3 text-center">Lokasi Asal</th>
                                    <th class="px-4 py-3 text-center">Status</th>
                                    <th class="px-4 py-3 text-center">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($santris as $santri)
                                    <tr class="group hover:bg-emerald-50/50 transition-all duration-300">
                                        @if(Auth::user()->isAdmin())
                                        <td class="px-4 py-3 bg-white first:rounded-l-xl border-y border-gray-100 first:border-l shadow-sm text-center">
                                            <input type="checkbox" name="ids[]" value="{{ $santri->id }}" class="row-checkbox rounded border-gray-300 text-emerald-600 shadow-sm focus:border-emerald-300 focus:ring focus:ring-emerald-200 focus:ring-opacity-50" onchange="toggleBulkActionButton()">
                                        </td>
                                        <td class="px-4 py-3 bg-white border-y border-gray-100 shadow-sm">
                                        @else
                                        <td class="px-4 py-3 bg-white first:rounded-l-xl border-y border-gray-100 first:border-l shadow-sm">
                                        @endif
                                            <div class="flex items-center justify-center">
                                                <div class="relative w-10 h-10 flex-shrink-0">
                                                    @if($santri->foto)
                                                        <img src="{{ asset('storage/'.$santri->foto) }}" class="w-full h-full rounded-xl object-cover ring-2 ring-emerald-50 shadow-sm">
                                                    @else
                                                        <div class="w-full h-full rounded-xl bg-emerald-100 text-emerald-600 flex items-center justify-center font-black text-sm shadow-inner">
                                                            {{ substr($santri->nama_lengkap, 0, 1) }}
                                                        </div>
                                                    @endif
                                                    <div class="absolute -bottom-1 -right-1 w-4 h-4 bg-white rounded-md flex items-center justify-center shadow-sm border border-gray-100">
                                                        <span class="text-[8px] font-black text-emerald-600">ID</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-4 py-3 bg-white border-y border-gray-100 shadow-sm text-center">
                                            <div class="text-sm font-black text-emerald-950 uppercase tracking-tight">{{ $santri->nama_lengkap }}</div>
                                            <div class="text-[9px] text-gray-400 font-mono mt-0.5">NIS: {{ $santri->nis }}</div>
                                        </td>
                                        <td class="px-6 py-4 bg-white border-y border-gray-100 shadow-sm text-center">
                                            <div class="flex items-center justify-center text-gray-500">
                                                <svg class="w-4 h-4 mr-2 opacity-30" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                                <span class="text-sm font-medium italic line-clamp-1">
                                                    {{ $santri->alamat }}
                                                    @if($santri->rt) RT {{ $santri->rt }} @endif
                                                    @if($santri->rw) RW {{ $santri->rw }} @endif
                                                </span>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 bg-white border-y border-gray-100 text-center shadow-sm">
                                            <span class="px-4 py-2 rounded-xl text-[10px] font-black uppercase tracking-widest
                                                @if($santri->status == 'Aktif') bg-emerald-100 text-emerald-700
                                                @elseif($santri->status == 'Alumni') bg-purple-100 text-purple-700
                                                @else bg-amber-100 text-amber-700 @endif">
                                                {{ $santri->status }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 bg-white first:rounded-l-[1.5rem] last:rounded-r-[1.5rem] border-y border-gray-100 first:border-l last:border-r shadow-sm text-center">
                                            <div class="flex justify-center space-x-2">
                                                <a href="{{ route('santri.show', $santri->id) }}" class="p-3 bg-emerald-50 text-emerald-600 rounded-xl hover:bg-emerald-600 hover:text-white transition-all duration-300 shadow-sm" title="Detail Profil">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                                </a>
                                                @if(Auth::user()->isAdmin())
                                                    <a href="{{ route('santri.edit', $santri->id) }}" class="p-3 bg-white text-gray-400 border border-gray-100 rounded-xl hover:border-amber-500 hover:text-amber-500 transition-all duration-300 shadow-sm" title="Edit Data">
                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                                    </a>
                                                    <form id="delete-form-{{ $santri->id }}" action="{{ route('santri.destroy', $santri->id) }}" method="POST" class="inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" 
                                                            onclick="confirmDelete('{{ $santri->id }}', '{{ $santri->nama_lengkap }}', '{{ $santri->status }}')"
                                                            class="p-3 bg-white text-gray-400 border border-gray-100 rounded-xl hover:border-red-500 hover:text-red-500 transition-all duration-300 shadow-sm" 
                                                            title="{{ $santri->status == 'Alumni' ? 'Hapus Permanen' : 'Pindahkan ke Alumni' }}">
                                                            @if($santri->status == 'Alumni')
                                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-4v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                                            @else
                                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4-4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                                                            @endif
                                                        </button>
                                                    </form>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="{{ Auth::user()->isAdmin() ? '6' : '5' }}" class="py-20 text-center">
                                            <div class="inline-flex flex-col items-center">
                                                <div class="w-20 h-20 bg-emerald-50 rounded-full flex items-center justify-center text-emerald-200 mb-4">
                                                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                                                </div>
                                                <p class="text-gray-400 font-bold tracking-tight italic">Basis data santri belum memiliki entry.</p>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
            <script>
                function toggleSelectAll(source) {
                    const checkboxes = document.querySelectorAll('.row-checkbox');
                    checkboxes.forEach(cb => cb.checked = source.checked);
                    toggleBulkActionButton();
                }

                function toggleBulkActionButton() {
                    const checkboxes = document.querySelectorAll('.row-checkbox:checked');
                    const container = document.getElementById('bulk-action-container');
                    if (checkboxes.length > 0) {
                        container.style.display = 'flex';
                    } else {
                        container.style.display = 'none';
                    }
                }

                function confirmBulkAction(actionType) {
                    const checkboxes = document.querySelectorAll('.row-checkbox:checked');
                    if (checkboxes.length === 0) return;

                    const count = checkboxes.length;
                    const isAlumni = actionType === 'delete';
                    const title = isAlumni ? `Hapus ${count} Data?` : `Jadikan ${count} Santri Alumni?`;
                    const text = isAlumni 
                        ? `Anda akan menghapus ${count} data alumni secara permanen.` 
                        : `Anda akan memindahkan ${count} santri ke daftar alumni.`;
                    const confirmText = isAlumni ? 'Ya, Hapus Terpilih' : 'Ya, Pindahkan Terpilih';
                    const confirmColor = isAlumni ? '#ef4444' : '#8b5cf6';

                    Swal.fire({
                        title: title,
                        html: `<div class="text-sm text-slate-600">${text}</div>`,
                        icon: isAlumni ? 'warning' : 'info',
                        showCancelButton: true,
                        confirmButtonColor: confirmColor,
                        cancelButtonColor: '#6b7280',
                        confirmButtonText: confirmText,
                        cancelButtonText: 'Batal',
                        borderRadius: '20px',
                        customClass: {
                            popup: 'rounded-3xl shadow-2xl border border-gray-100',
                            title: 'font-black text-emerald-950',
                            confirmButton: 'rounded-xl font-bold uppercase tracking-widest text-[10px] px-6 py-3',
                            cancelButton: 'rounded-xl font-bold uppercase tracking-widest text-[10px] px-6 py-3'
                        }
                    }).then((result) => {
                        if (result.isConfirmed) {
                            const form = document.getElementById('bulk-action-form');
                            const inputsContainer = document.getElementById('bulk-action-inputs');
                            inputsContainer.innerHTML = '';
                            
                            document.getElementById('bulk-action-type').value = actionType;

                            checkboxes.forEach(cb => {
                                const input = document.createElement('input');
                                input.type = 'hidden';
                                input.name = 'ids[]';
                                input.value = cb.value;
                                inputsContainer.appendChild(input);
                            });

                            form.submit();
                        }
                    })
                }
                function confirmDelete(id, name, status) {
                    const isAlumni = status === 'Alumni';
                    const title = isAlumni ? 'Hapus Permanen?' : 'Pindahkan ke Alumni?';
                    const text = isAlumni 
                        ? `Data alumni <b>${name}</b> akan dihapus selamanya dari sistem.` 
                        : `Santri <b>${name}</b> akan dipindahkan ke daftar alumni. Data tidak akan dihapus.`;
                    const confirmText = isAlumni ? 'Ya, Hapus Selamanya' : 'Ya, Jadikan Alumni';
                    const confirmColor = isAlumni ? '#ef4444' : '#8b5cf6'; // Red for delete, Purple for Alumni

                    Swal.fire({
                        title: title,
                        html: `<div class="text-sm text-slate-600">${text}</div>`,
                        icon: isAlumni ? 'error' : 'info',
                        showCancelButton: true,
                        confirmButtonColor: confirmColor,
                        cancelButtonColor: '#6b7280',
                        confirmButtonText: confirmText,
                        cancelButtonText: 'Batal',
                        borderRadius: '20px',
                        customClass: {
                            popup: 'rounded-3xl shadow-2xl border border-gray-100',
                            title: 'font-black text-emerald-950',
                            confirmButton: 'rounded-xl font-bold uppercase tracking-widest text-[10px] px-6 py-3',
                            cancelButton: 'rounded-xl font-bold uppercase tracking-widest text-[10px] px-6 py-3'
                        }
                    }).then((result) => {
                        if (result.isConfirmed) {
                            document.getElementById('delete-form-' + id).submit();
                        }
                    })
                }
            </script>
</x-app-layout>
