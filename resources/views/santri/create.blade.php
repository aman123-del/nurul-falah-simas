<x-app-layout>
    <div class="py-2">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header Section -->
            <div class="mb-10 flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    <a href="{{ route('santri.index') }}" class="w-12 h-12 bg-white rounded-2xl flex items-center justify-center text-gray-400 hover:text-emerald-600 hover:shadow-lg transition border border-gray-100">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    </a>
                    <h1 class="text-4xl font-black text-emerald-950 tracking-tighter">Entry <span class="text-gradient-emerald">Santri Baru</span></h1>
                </div>
            </div>

            <div class="card-premium p-10">
                <form action="{{ route('santri.store') }}" method="POST" enctype="multipart/form-data" class="space-y-12">
                    @csrf
                    
                    <!-- Section 01: Identitas Pribadi -->
                    <div class="space-y-8">
                        <div class="flex items-center space-x-3 mb-6">
                            <span class="w-8 h-8 bg-emerald-100 text-emerald-600 rounded-lg flex items-center justify-center font-black text-xs">01</span>
                            <h3 class="text-xs font-black text-emerald-900 uppercase tracking-[0.2em]">Data Identitas Pribadi</h3>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <div class="space-y-2">
                                <label for="nis" class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Nomor Induk Santri (NIS)</label>
                                <x-text-input name="nis" id="nis" class="w-full !rounded-2xl" placeholder="Contoh: 20260001" required />
                                @error('nis') <p class="text-red-500 text-[10px] font-bold mt-1 uppercase tracking-tighter">{{ $message }}</p> @enderror
                            </div>

                            <div class="space-y-2">
                                <label for="nik" class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Nomor Induk Kependudukan (NIK)</label>
                                <x-text-input name="nik" id="nik" class="w-full !rounded-2xl" placeholder="16 digit NIK" />
                            </div>

                            <div class="space-y-2 md:col-span-2">
                                <label for="nama_lengkap" class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Nama Lengkap Sesuai Ijazah / KK</label>
                                <x-text-input type="text" name="nama_lengkap" id="nama_lengkap" class="w-full !rounded-2xl" placeholder="Nama Lengkap" required />
                            </div>

                            <div class="space-y-2">
                                <label for="jenis_kelamin" class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Jenis Kelamin</label>
                                <select name="jenis_kelamin" id="jenis_kelamin" class="w-full rounded-2xl border-gray-100 focus:border-emerald-500 focus:ring-emerald-500 transition shadow-sm bg-slate-50 font-bold text-sm h-[50px]">
                                    <option value="" disabled selected>-- Pilih --</option>
                                    <option value="L">Laki-laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                            </div>

                            <div class="grid grid-cols-2 gap-4">
                                <div class="space-y-2">
                                    <label for="anak_ke" class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Anak Ke</label>
                                    <x-text-input type="number" name="anak_ke" id="anak_ke" class="w-full !rounded-2xl" placeholder="1" />
                                </div>
                                <div class="space-y-2">
                                    <label for="jumlah_saudara" class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Jumlah Saudara</label>
                                    <x-text-input type="number" name="jumlah_saudara" id="jumlah_saudara" class="w-full !rounded-2xl" placeholder="2" />
                                </div>
                            </div>

                            <div class="space-y-2">
                                <label for="tempat_lahir" class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Tempat Lahir</label>
                                <x-text-input type="text" name="tempat_lahir" id="tempat_lahir" class="w-full !rounded-2xl" placeholder="Kota/Kab" required />
                            </div>

                            <div class="space-y-2">
                                <label for="tanggal_lahir" class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Tanggal Lahir</label>
                                <x-text-input type="date" name="tanggal_lahir" id="tanggal_lahir" class="w-full !rounded-2xl" required />
                            </div>
                        </div>
                    </div>

                    <!-- Section 02: Kontak & Alamat -->
                    <div class="space-y-8">
                        <div class="flex items-center space-x-3 mb-6">
                            <span class="w-8 h-8 bg-emerald-100 text-emerald-600 rounded-lg flex items-center justify-center font-black text-xs">02</span>
                            <h3 class="text-xs font-black text-emerald-900 uppercase tracking-[0.2em]">Data Kontak & Alamat Domisili</h3>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <div class="space-y-2">
                                <label for="no_hp" class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Nomor HP Santri (Opsional)</label>
                                <x-text-input type="text" name="no_hp" id="no_hp" class="w-full !rounded-2xl" placeholder="08xxxxxxxxxx" />
                            </div>
                            
                            <div class="space-y-2">
                                <label for="no_kk" class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Nomor Kartu Keluarga (KK)</label>
                                <x-text-input type="text" name="no_kk" id="no_kk" class="w-full !rounded-2xl" placeholder="16 digit No KK" />
                            </div>

                            <div class="space-y-2 md:col-span-2">
                                <label for="alamat" class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Alamat Lengkap / Jalan</label>
                                <textarea name="alamat" id="alamat" rows="2" class="w-full rounded-2xl border-gray-100 focus:border-emerald-500 focus:ring-emerald-500 transition shadow-sm bg-slate-50 font-medium text-sm" placeholder="Nama jalan, gang, nomor rumah..." required></textarea>
                            </div>

                            <div class="grid grid-cols-2 gap-4">
                                <div class="space-y-2">
                                    <label for="rt" class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">RT</label>
                                    <x-text-input type="text" name="rt" id="rt" class="w-full !rounded-2xl" placeholder="001" />
                                </div>
                                <div class="space-y-2">
                                    <label for="rw" class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">RW</label>
                                    <x-text-input type="text" name="rw" id="rw" class="w-full !rounded-2xl" placeholder="002" />
                                </div>
                            </div>
                            
                            <div class="space-y-2">
                                <label for="provinsi" class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Provinsi</label>
                                <x-text-input type="text" name="provinsi" id="provinsi" class="w-full !rounded-2xl" placeholder="Jawa Timur" />
                            </div>
                            
                            <div class="space-y-2">
                                <label for="kabupaten" class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Kabupaten/Kota</label>
                                <x-text-input type="text" name="kabupaten" id="kabupaten" class="w-full !rounded-2xl" placeholder="Malang" />
                            </div>
                            
                            <div class="space-y-2">
                                <label for="kecamatan" class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Kecamatan</label>
                                <x-text-input type="text" name="kecamatan" id="kecamatan" class="w-full !rounded-2xl" placeholder="Kecamatan" />
                            </div>
                            
                            <div class="space-y-2">
                                <label for="kode_pos" class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Kode Pos</label>
                                <x-text-input type="text" name="kode_pos" id="kode_pos" class="w-full !rounded-2xl" placeholder="651xx" />
                            </div>
                        </div>
                    </div>

                    <!-- Section 03: Kesehatan -->
                    <div class="space-y-8">
                        <div class="flex items-center space-x-3 mb-6">
                            <span class="w-8 h-8 bg-emerald-100 text-emerald-600 rounded-lg flex items-center justify-center font-black text-xs">03</span>
                            <h3 class="text-xs font-black text-emerald-900 uppercase tracking-[0.2em]">Data Kesehatan</h3>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <div class="space-y-2">
                                <label for="golongan_darah" class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Golongan Darah</label>
                                <select name="golongan_darah" id="golongan_darah" class="w-full rounded-2xl border-gray-100 focus:border-emerald-500 focus:ring-emerald-500 transition shadow-sm bg-slate-50 font-bold text-sm h-[50px]">
                                    <option value="" disabled selected>-- Pilih --</option>
                                    <option value="A">A</option><option value="B">B</option><option value="AB">AB</option><option value="O">O</option>
                                </select>
                            </div>

                            <div class="space-y-2">
                                <label for="riwayat_penyakit" class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Riwayat Penyakit Khusus</label>
                                <textarea name="riwayat_penyakit" id="riwayat_penyakit" rows="1" class="w-full rounded-2xl border-gray-100 focus:border-emerald-500 focus:ring-emerald-500 transition shadow-sm bg-slate-50 font-medium text-sm" placeholder="Asma, Alergi Obat (kosongkan jika tidak ada)"></textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Section 04: Data Orang Tua -->
                    <div class="space-y-8">
                        <div class="flex items-center space-x-3 mb-6">
                            <span class="w-8 h-8 bg-emerald-100 text-emerald-600 rounded-lg flex items-center justify-center font-black text-xs">04</span>
                            <h3 class="text-xs font-black text-emerald-900 uppercase tracking-[0.2em]">Data Orang Tua</h3>
                        </div>

                        <!-- Data Ayah -->
                        <h4 class="text-sm font-bold text-emerald-700 border-b border-emerald-100 pb-2">Identitas Ayah Kandung</h4>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 pb-4">
                            <div class="space-y-2 md:col-span-2">
                                <label for="nama_ayah" class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Nama Lengkap Ayah</label>
                                <x-text-input type="text" name="nama_ayah" id="nama_ayah" class="w-full !rounded-2xl" placeholder="Nama Ayah" />
                            </div>
                            <div class="space-y-2">
                                <label for="nik_ayah" class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">NIK Ayah</label>
                                <x-text-input type="text" name="nik_ayah" id="nik_ayah" class="w-full !rounded-2xl" placeholder="16 digit NIK" />
                            </div>
                            <div class="grid grid-cols-2 gap-4">
                                <div class="space-y-2">
                                    <label for="tempat_lahir_ayah" class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Tempat Lahir</label>
                                    <x-text-input type="text" name="tempat_lahir_ayah" id="tempat_lahir_ayah" class="w-full !rounded-2xl" placeholder="Kota" />
                                </div>
                                <div class="space-y-2">
                                    <label for="tanggal_lahir_ayah" class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Tanggal Lahir</label>
                                    <x-text-input type="date" name="tanggal_lahir_ayah" id="tanggal_lahir_ayah" class="w-full !rounded-2xl" />
                                </div>
                            </div>
                            <div class="space-y-2">
                                <label for="pendidikan_ayah" class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Pendidikan Terakhir Ayah</label>
                                <x-text-input type="text" name="pendidikan_ayah" id="pendidikan_ayah" class="w-full !rounded-2xl" placeholder="SD/SMP/SMA/S1" />
                            </div>
                            <div class="space-y-2">
                                <label for="pekerjaan_ayah" class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Pekerjaan Ayah</label>
                                <x-text-input type="text" name="pekerjaan_ayah" id="pekerjaan_ayah" class="w-full !rounded-2xl" placeholder="Wiraswasta / PNS / Buruh" />
                            </div>
                        </div>

                        <!-- Data Ibu -->
                        <h4 class="text-sm font-bold text-emerald-700 border-b border-emerald-100 pb-2">Identitas Ibu Kandung</h4>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 pb-4">
                            <div class="space-y-2 md:col-span-2">
                                <label for="nama_ibu" class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Nama Lengkap Ibu</label>
                                <x-text-input type="text" name="nama_ibu" id="nama_ibu" class="w-full !rounded-2xl" placeholder="Nama Ibu" />
                            </div>
                            <div class="space-y-2">
                                <label for="nik_ibu" class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">NIK Ibu</label>
                                <x-text-input type="text" name="nik_ibu" id="nik_ibu" class="w-full !rounded-2xl" placeholder="16 digit NIK" />
                            </div>
                            <div class="grid grid-cols-2 gap-4">
                                <div class="space-y-2">
                                    <label for="tempat_lahir_ibu" class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Tempat Lahir</label>
                                    <x-text-input type="text" name="tempat_lahir_ibu" id="tempat_lahir_ibu" class="w-full !rounded-2xl" placeholder="Kota" />
                                </div>
                                <div class="space-y-2">
                                    <label for="tanggal_lahir_ibu" class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Tanggal Lahir</label>
                                    <x-text-input type="date" name="tanggal_lahir_ibu" id="tanggal_lahir_ibu" class="w-full !rounded-2xl" />
                                </div>
                            </div>
                            <div class="space-y-2">
                                <label for="pendidikan_ibu" class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Pendidikan Terakhir Ibu</label>
                                <x-text-input type="text" name="pendidikan_ibu" id="pendidikan_ibu" class="w-full !rounded-2xl" placeholder="SD/SMP/SMA/S1" />
                            </div>
                            <div class="space-y-2">
                                <label for="pekerjaan_ibu" class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Pekerjaan Ibu</label>
                                <x-text-input type="text" name="pekerjaan_ibu" id="pekerjaan_ibu" class="w-full !rounded-2xl" placeholder="Ibu Rumah Tangga / PNS" />
                            </div>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <div class="space-y-2 md:col-span-2">
                                <label for="alamat_ortu" class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Alamat Orang Tua</label>
                                <textarea name="alamat_ortu" id="alamat_ortu" rows="2" class="w-full rounded-2xl border-gray-100 focus:border-emerald-500 focus:ring-emerald-500 transition shadow-sm bg-slate-50 font-medium text-sm" placeholder="Isi jika berbeda dengan alamat domisili santri"></textarea>
                            </div>
                            <div class="space-y-2">
                                <label for="penghasilan_ortu" class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Rata-Rata Penghasilan Orang Tua/Bulan</label>
                                <select name="penghasilan_ortu" id="penghasilan_ortu" class="w-full rounded-2xl border-gray-100 focus:border-emerald-500 focus:ring-emerald-500 transition shadow-sm bg-slate-50 font-bold text-sm h-[50px]">
                                    <option value="" disabled selected>-- Pilih --</option>
                                    <option value="Kurang dari 1 Juta">< Rp 1.000.000</option>
                                    <option value="1 Juta - 2 Juta">Rp 1.000.000 - Rp 2.000.000</option>
                                    <option value="2 Juta - 5 Juta">Rp 2.000.000 - Rp 5.000.000</option>
                                    <option value="Lebih dari 5 Juta">> Rp 5.000.000</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Section 05: Data Wali -->
                    <div class="space-y-8">
                        <div class="flex items-center space-x-3 mb-6">
                            <span class="w-8 h-8 bg-emerald-100 text-emerald-600 rounded-lg flex items-center justify-center font-black text-xs">05</span>
                            <h3 class="text-xs font-black text-emerald-900 uppercase tracking-[0.2em]">Data Wali Santri</h3>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <div class="space-y-2 md:col-span-2">
                                <label for="wali_nama" class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Nama Wali Utama (Penanggung Jawab)</label>
                                <x-text-input type="text" name="wali_nama" id="wali_nama" class="w-full !rounded-2xl" placeholder="Nama Ayah/Ibu/Wali" required />
                            </div>
                            
                            <div class="space-y-2">
                                <label for="wali_kontak" class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Nomor HP/WA Wali Aktif</label>
                                <x-text-input type="text" name="wali_kontak" id="wali_kontak" class="w-full !rounded-2xl" placeholder="08xxxxxxxxxx" required />
                            </div>
                            <div class="space-y-2">
                                <label for="nik_wali" class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">NIK Wali (Opsional)</label>
                                <x-text-input type="text" name="nik_wali" id="nik_wali" class="w-full !rounded-2xl" placeholder="16 digit NIK" />
                            </div>
                            
                            <div class="grid grid-cols-2 gap-4">
                                <div class="space-y-2">
                                    <label for="tempat_lahir_wali" class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Tempat Lahir</label>
                                    <x-text-input type="text" name="tempat_lahir_wali" id="tempat_lahir_wali" class="w-full !rounded-2xl" placeholder="Kota" />
                                </div>
                                <div class="space-y-2">
                                    <label for="tanggal_lahir_wali" class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Tanggal Lahir</label>
                                    <x-text-input type="date" name="tanggal_lahir_wali" id="tanggal_lahir_wali" class="w-full !rounded-2xl" />
                                </div>
                            </div>
                            
                            <div class="space-y-2">
                                <label for="pendidikan_wali" class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Pendidikan Terakhir Wali</label>
                                <x-text-input type="text" name="pendidikan_wali" id="pendidikan_wali" class="w-full !rounded-2xl" />
                            </div>
                            
                            <div class="space-y-2">
                                <label for="pekerjaan_wali" class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Pekerjaan Wali</label>
                                <x-text-input type="text" name="pekerjaan_wali" id="pekerjaan_wali" class="w-full !rounded-2xl" />
                            </div>

                            <div class="space-y-2 md:col-span-2">
                                <label for="alamat_wali" class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Alamat Wali</label>
                                <textarea name="alamat_wali" id="alamat_wali" rows="2" class="w-full rounded-2xl border-gray-100 focus:border-emerald-500 focus:ring-emerald-500 transition shadow-sm bg-slate-50 font-medium text-sm"></textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Section 06: Data Pesantren & Media -->
                    <div class="space-y-8">
                        <div class="flex items-center space-x-3 mb-6">
                            <span class="w-8 h-8 bg-emerald-100 text-emerald-600 rounded-lg flex items-center justify-center font-black text-xs">06</span>
                            <h3 class="text-xs font-black text-emerald-900 uppercase tracking-[0.2em]">Data Akademik Pesantren</h3>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <div class="space-y-2">
                                <label for="tanggal_masuk" class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Tanggal Mulai Masuk Pondok</label>
                                <x-text-input type="date" name="tanggal_masuk" id="tanggal_masuk" class="w-full !rounded-2xl" required />
                            </div>

                            <div class="space-y-2">
                                <label for="status" class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Status Keanggotaan Awal</label>
                                <select name="status" id="status" class="w-full rounded-2xl border-gray-100 focus:border-emerald-500 focus:ring-emerald-500 transition shadow-sm bg-slate-50 font-bold text-sm h-[50px]">
                                    <option value="Aktif">Aktif (Mukim)</option>
                                    <option value="Izin">Izin (Tidak di Pondok)</option>
                                    <option value="Tidak Mukim">Tidak Mukim (Laju)</option>
                                </select>
                            </div>
                        </div>

                        <div class="p-8 border-4 border-dashed border-emerald-50 rounded-[2.5rem] bg-emerald-50/10 text-center group mt-4">
                            <div class="w-16 h-16 bg-white rounded-2xl flex items-center justify-center mx-auto mb-4 text-emerald-200 group-hover:scale-110 transition shadow-sm">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            </div>
                            <input type="file" name="foto" id="foto" class="text-sm font-bold text-gray-500 file:mr-4 file:py-3 file:px-8 file:rounded-2xl file:border-0 file:text-xs file:font-black file:uppercase file:bg-emerald-600 file:text-white hover:file:bg-emerald-700 transition cursor-pointer">
                            <p class="mt-4 text-[10px] text-gray-400 font-bold uppercase tracking-widest italic">Upload Foto Profil Santri Format JPG, PNG (Max 2MB)</p>
                        </div>
                    </div>

                    <div class="pt-10 flex flex-col md:flex-row gap-4 border-t border-gray-100">
                        <button type="submit" class="btn-emerald h-14 !px-12 flex-1 text-base">
                            Simpan Database Santri
                        </button>
                        <a href="{{ route('santri.index') }}" class="h-14 px-10 rounded-2xl bg-slate-100 text-slate-500 font-black uppercase text-xs tracking-widest flex items-center justify-center hover:bg-slate-200 transition">
                            Batalkan
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
