<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Profil Santri - {{ $santri->nama_lengkap }}</title>
    <style>
        body {
            font-family: 'Helvetica', 'Arial', sans-serif;
            font-size: 12px;
            line-height: 1.4;
            color: #333;
            margin: 0;
            padding: 20px;
        }
        .header {
            text-align: center;
            border-bottom: 2px solid #10b981;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        .header h1 {
            color: #065f46;
            font-size: 20px;
            margin: 0 0 5px 0;
            text-transform: uppercase;
        }
        .header p {
            margin: 0;
            color: #666;
            font-size: 11px;
        }
        .photo-container {
            float: left;
            width: 120px;
            height: 150px;
            border: 2px solid #e5e7eb;
            margin-right: 20px;
            margin-bottom: 20px;
            text-align: center;
            background-color: #f9fafb;
        }
        .photo-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .photo-placeholder {
            line-height: 150px;
            color: #9ca3af;
            font-size: 10px;
        }
        .basic-info {
            margin-left: 140px;
            margin-bottom: 20px;
            min-height: 150px;
        }
        .info-title {
            font-size: 18px;
            font-weight: bold;
            color: #064e3b;
            margin-top: 0;
            margin-bottom: 10px;
            text-transform: uppercase;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            padding: 6px 8px;
            vertical-align: top;
            border-bottom: 1px solid #f3f4f6;
        }
        th {
            text-align: left;
            width: 35%;
            color: #6b7280;
            font-weight: normal;
            font-size: 11px;
        }
        td {
            font-weight: bold;
            color: #1f2937;
        }
        .section {
            clear: both;
            margin-top: 15px;
            page-break-inside: avoid;
        }
        .section-header {
            background-color: #ecfdf5;
            color: #047857;
            padding: 8px 10px;
            font-weight: bold;
            font-size: 13px;
            text-transform: uppercase;
            border-left: 4px solid #10b981;
            margin-bottom: 10px;
        }
        .grid-2 {
            width: 100%;
        }
        .col-half {
            width: 48%;
            display: inline-block;
            vertical-align: top;
        }
        .footer {
            margin-top: 40px;
            text-align: right;
            font-size: 11px;
            color: #6b7280;
        }
    </style>
</head>
<body>

    <div class="header">
        <h1>Profil Lengkap Santri</h1>
        <p>Pondok Pesantren Nurul Falah Berbaur</p>
        <p>Status Keanggotaan: <strong>{{ strtoupper($santri->status) }}</strong></p>
    </div>

    <div>
        <div class="photo-container">
            @if($santri->foto)
                <!-- Assuming the server allows local file access for dompdf, or use public_path -->
                <img src="{{ public_path('storage/'.$santri->foto) }}" alt="Foto Santri">
            @else
                <div class="photo-placeholder">TIDAK ADA FOTO</div>
            @endif
        </div>
        
        <div class="basic-info">
            <h2 class="info-title">{{ $santri->nama_lengkap }}</h2>
            <table>
                <tr>
                    <th>NIS</th>
                    <td>{{ $santri->nis }}</td>
                </tr>
                <tr>
                    <th>NIK</th>
                    <td>{{ $santri->nik ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Jenis Kelamin</th>
                    <td>{{ $santri->jenis_kelamin == 'L' ? 'Laki-laki' : ($santri->jenis_kelamin == 'P' ? 'Perempuan' : '-') }}</td>
                </tr>
                <tr>
                    <th>Tempat, Tanggal Lahir</th>
                    <td>{{ $santri->tempat_lahir }}, {{ \Carbon\Carbon::parse($santri->tanggal_lahir)->translatedFormat('d F Y') }}</td>
                </tr>
                <tr>
                    <th>Anak Ke</th>
                    <td>{{ $santri->anak_ke ?? '-' }} dari {{ $santri->jumlah_saudara ?? '-' }} bersaudara</td>
                </tr>
                <tr>
                    <th>Tanggal Masuk Pondok</th>
                    <td>{{ \Carbon\Carbon::parse($santri->tanggal_masuk)->translatedFormat('d F Y') }}</td>
                </tr>
            </table>
        </div>
    </div>

    <div class="section">
        <div class="section-header">Kontak & Alamat Domisili</div>
        <table>
            <tr>
                <th>Alamat Lengkap</th>
                <td>
                    {{ $santri->alamat }} 
                    @if($santri->rt || $santri->rw) RT {{ $santri->rt ?? '-' }}/RW {{ $santri->rw ?? '-' }} @endif<br>
                    Kecamatan {{ $santri->kecamatan ?? '-' }}, Kabupaten/Kota {{ $santri->kabupaten ?? '-' }}<br>
                    Provinsi {{ $santri->provinsi ?? '-' }} - Kode Pos {{ $santri->kode_pos ?? '-' }}
                </td>
            </tr>
            <tr>
                <th>No. Kartu Keluarga (KK)</th>
                <td>{{ $santri->no_kk ?? '-' }}</td>
            </tr>
            <tr>
                <th>Nomor HP Santri</th>
                <td>{{ $santri->no_hp ?? '-' }}</td>
            </tr>
        </table>
    </div>

    <div class="section">
        <div class="section-header">Data Kesehatan</div>
        <table>
            <tr>
                <th>Golongan Darah</th>
                <td>{{ $santri->golongan_darah ?? '-' }}</td>
            </tr>
            <tr>
                <th>Riwayat Penyakit Khusus</th>
                <td>{{ $santri->riwayat_penyakit ?? 'Tidak ada' }}</td>
            </tr>
        </table>
    </div>

    <div class="section">
        <div class="section-header">Data Orang Tua</div>
        <div class="grid-2">
            <div class="col-half">
                <table style="margin-bottom: 0;">
                    <tr><td colspan="2" style="background-color: #f9fafb; text-align: center; color: #047857; font-size: 10px; text-transform: uppercase;">Ayah Kandung</td></tr>
                    <tr><th>Nama</th><td>{{ $santri->nama_ayah ?? '-' }}</td></tr>
                    <tr><th>NIK</th><td>{{ $santri->nik_ayah ?? '-' }}</td></tr>
                    <tr><th>Tempat, Tgl Lahir</th><td>{{ $santri->tempat_lahir_ayah ?? '-' }}, {{ $santri->tanggal_lahir_ayah ?? '-' }}</td></tr>
                    <tr><th>Pendidikan</th><td>{{ $santri->pendidikan_ayah ?? '-' }}</td></tr>
                    <tr><th>Pekerjaan</th><td>{{ $santri->pekerjaan_ayah ?? '-' }}</td></tr>
                </table>
            </div>
            <div class="col-half" style="margin-left: 2%;">
                <table style="margin-bottom: 0;">
                    <tr><td colspan="2" style="background-color: #f9fafb; text-align: center; color: #047857; font-size: 10px; text-transform: uppercase;">Ibu Kandung</td></tr>
                    <tr><th>Nama</th><td>{{ $santri->nama_ibu ?? '-' }}</td></tr>
                    <tr><th>NIK</th><td>{{ $santri->nik_ibu ?? '-' }}</td></tr>
                    <tr><th>Tempat, Tgl Lahir</th><td>{{ $santri->tempat_lahir_ibu ?? '-' }}, {{ $santri->tanggal_lahir_ibu ?? '-' }}</td></tr>
                    <tr><th>Pendidikan</th><td>{{ $santri->pendidikan_ibu ?? '-' }}</td></tr>
                    <tr><th>Pekerjaan</th><td>{{ $santri->pekerjaan_ibu ?? '-' }}</td></tr>
                </table>
            </div>
        </div>
        <table style="margin-top: 10px;">
            <tr>
                <th>Alamat Orang Tua</th>
                <td>{{ $santri->alamat_ortu ?? 'Sama dengan alamat domisili' }}</td>
            </tr>
            <tr>
                <th>Rata-rata Penghasilan</th>
                <td>{{ $santri->penghasilan_ortu ?? '-' }}</td>
            </tr>
        </table>
    </div>

    <div class="section">
        <div class="section-header">Data Wali Santri (Penanggung Jawab)</div>
        <table>
            <tr>
                <th>Nama Lengkap Wali</th>
                <td>{{ $santri->wali_nama }}</td>
            </tr>
            <tr>
                <th>Nomor HP / WhatsApp</th>
                <td>{{ $santri->wali_kontak }}</td>
            </tr>
            <tr>
                <th>NIK</th>
                <td>{{ $santri->nik_wali ?? '-' }}</td>
            </tr>
            <tr>
                <th>Tempat, Tgl Lahir</th>
                <td>{{ $santri->tempat_lahir_wali ?? '-' }}, {{ $santri->tanggal_lahir_wali ?? '-' }}</td>
            </tr>
            <tr>
                <th>Pendidikan / Pekerjaan</th>
                <td>{{ $santri->pendidikan_wali ?? '-' }} / {{ $santri->pekerjaan_wali ?? '-' }}</td>
            </tr>
            <tr>
                <th>Alamat Wali</th>
                <td>{{ $santri->alamat_wali ?? '-' }}</td>
            </tr>
        </table>
    </div>

    <div class="footer">
        Dicetak pada: {{ now()->translatedFormat('d F Y H:i') }} <br>
        Sistem Informasi Manajemen Santri - PP. Nurul Falah Berbaur
    </div>

</body>
</html>
