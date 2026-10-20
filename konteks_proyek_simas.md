# Konteks Proyek: e-Santri Nurul Falah Berbaur (SIMAS)

Dokumen ini berisi rangkuman mengenai arsitektur, teknologi, dan struktur kode dari sistem manajemen administrasi santri (SIMAS) Pondok Pesantren Nurul Falah Berbaur. Dokumen ini dapat di-*copy-paste* atau di-upload ke asisten AI (seperti ChatGPT, Gemini, atau Claude) untuk memberikan konteks kepada AI sebelum mengajukan pertanyaan terkait perbaikan kode atau penambahan fitur.

---

## 1. Ringkasan Proyek
- **Nama Sistem:** e-Santri Nurul Falah Berbaur (SIMAS)
- **Tujuan:** Mengelola data administrasi santri, pencatatan pembayaran bulanan (syahriyah), serta pelaporan yang terintegrasi.
- **Role Pengguna:** Admin (Pengurus), Santri/Wali Santri (via akun pengguna).

## 2. Stack Teknologi (Tech Stack)
- **Framework Utama:** Laravel Framework versi 12.0
- **Bahasa Pemrograman:** PHP versi 8.2 ke atas
- **Database:** MySQL / SQLite (via Eloquent ORM)
- **Frontend / Tampilan:** Blade Templating Engine, HTML, CSS (Tailwind CSS terintegrasi via Laravel Breeze), JavaScript
- **Autentikasi:** Laravel Breeze
- **Library Tambahan Utama:**
  - `barryvdh/laravel-dompdf` (versi ^3.1) untuk pembuatan dokumen cetak / ekspor PDF.
  - `laravel/socialite` (versi ^5.26) untuk integrasi login sosial.

## 3. Struktur Database (Model & Relasi)

Sistem ini memiliki beberapa model utama yang saling berelasi:

### A. Model `Santri` (`app/Models/Santri.php`)
Ini merupakan entitas paling utama yang menyimpan data lengkap santri.
- **Relasi:** 
  - `hasOne(User::class)` - Satu santri memiliki satu akun login.
  - `hasMany(Syahriyah::class)` - Satu santri memiliki banyak catatan pembayaran syahriyah bulanan.
- **Atribut/Kolom Utama:**
  - Data Pribadi: `nis`, `nik`, `nama_lengkap`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `foto`, dll.
  - Alamat: `alamat`, `rt`, `rw`, `provinsi`, `kabupaten`, `kecamatan`, `kode_pos`.
  - Data Akademik/Pesantren: `asal_sekolah`, `tanggal_masuk`, `status` (Aktif/Non-aktif/Alumni).
  - Data Orang Tua/Wali: `nama_ayah`, `nama_ibu`, `wali_nama`, `penghasilan_ortu`, dll.

### B. Model `User` (`app/Models/User.php`)
Mengatur akses login ke dalam sistem.
- **Relasi:** Berelasi kembali ke `Santri` (jika user adalah santri). Memiliki peran (role) tertentu (seperti Admin).

### C. Model `Syahriyah` (`app/Models/Syahriyah.php`)
Menyimpan data riwayat pembayaran bulanan para santri.
- **Relasi:** `belongsTo(Santri::class)`

### D. Model `Video` (`app/Models/Video.php`)
Menyimpan tautan dokumentasi video kegiatan pesantren dari YouTube.
- **Atribut/Kolom Utama:** `judul`, `keterangan`, `youtube_url`.
- **Accessor/Helper:** `youtube_id`, `embed_url`, `thumbnail_url`.

## 4. Fitur Utama Sistem
1. **Manajemen Data Santri (CRUD):** 
   - Tambah, Edit, Hapus, dan Lihat detail santri.
   - Manajemen status santri (misal: pengubahan massal/bulk action menggunakan checkbox untuk mengubah status santri).
2. **Manajemen Pembayaran (Syahriyah):**
   - Pencatatan pembayaran bulanan, riwayat lunas/belum lunas.
3. **Manajemen Galeri Media & Video:**
   - Unggah dan kelola foto galeri dokumentasi.
   - Tambah, edit, dan hapus video dokumentasi kegiatan pesantren dari YouTube dengan pratinjau langsung (live preview) dan konversi otomatis ke embed responsif.
4. **Laporan & Ekspor Data:**
   - Ekspor data santri atau kuitansi pembayaran menggunakan format PDF (via DomPDF).
5. **Sistem Tampilan Responsif (Mobile-Friendly):**
   - Menggunakan tabel responsif dan layout yang menyesuaikan di layar ponsel.
   - Pagination untuk menangani jumlah data santri yang besar.

## 5. Cara Menggunakan Dokumen Ini untuk Prompting AI
Jika teman Anda atau developer lain ingin bertanya ke AI, gunakan *template prompt* berikut berserta isi dokumen ini:

> **"Saya sedang mengembangkan aplikasi Laravel bernama e-Santri Nurul Falah Berbaur. Berikut adalah konteks proyek saya: [PASTE_ISI_DOKUMEN_INI]. Berdasarkan informasi di atas, bantu saya untuk [TULISKAN_PERTANYAAN_ANDA, misal: membuat fitur rekap pembayaran bulanan]."**
