<!DOCTYPE html>
<html>
<head>
    <title>Sistem Informasi Pesantren - Data Santri</title>
    <style>
        body { font-family: sans-serif; font-size: 11px; }
        .header { text-align: center; margin-bottom: 20px; border-bottom: 3px double #10b981; padding-bottom: 10px; }
        .header h1 { margin: 0; color: #064e3b; text-transform: uppercase; font-size: 20px; }
        .header h3 { margin: 5px 0 0; color: #10b981; font-size: 14px; }
        .header p { margin: 5px 0 0; color: #6b7280; font-style: italic; }
        table { width: 100%; border-collapse: collapse; margin-top: 15px; }
        th, td { border: 1px solid #9ca3af; padding: 6px; text-align: left; }
        th { background-color: #10b981; color: white; font-weight: bold; text-transform: uppercase; font-size: 10px; text-align: center; }
        .text-center { text-align: center; }
        .footer { margin-top: 40px; text-align: right; width: 100%; }
        .signature { display: inline-block; text-align: center; margin-right: 50px; }
    </style>
</head>
<body>
    <div class="header">
        <h1>DATA SANTRI PONPES NURUL FALAH BERBAUR</h1>
        <h3>Status: {{ strtoupper($status) }}</h3>
        <p style="font-size: 10px;">Diekspor pada: {{ date('d F Y H:i') }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th width="3%">NO</th>
                <th width="8%">NIS</th>
                <th width="20%">NAMA LENGKAP</th>
                <th width="20%">TEMPAT, TGL LAHIR</th>
                <th width="25%">ALAMAT DOMISILI</th>
                <th width="12%">NAMA WALI</th>
                <th width="12%">KONTAK</th>
            </tr>
        </thead>
        <tbody>
            @forelse($santris as $index => $santri)
                <tr>
                    <td class="text-center">{{ $index + 1 }}</td>
                    <td class="text-center">{{ $santri->nis }}</td>
                    <td><strong>{{ $santri->nama_lengkap }}</strong></td>
                    <td>{{ $santri->tempat_lahir }}, {{ $santri->tanggal_lahir }}</td>
                    <td>{{ $santri->alamat }} {{ $santri->rt ? 'RT '.$santri->rt : '' }} {{ $santri->rw ? 'RW '.$santri->rw : '' }}</td>
                    <td>{{ $santri->wali_nama }}</td>
                    <td class="text-center">{{ $santri->wali_kontak }}</td>
                </tr>
            @empty
                <tr><td colspan="7" class="text-center">Tidak ada data santri pada status ini.</td></tr>
            @endforelse
        </tbody>
    </table>

    <div class="footer">
        <div class="signature">
            <p>Mengetahui,</p>
            <br><br><br><br>
            <p><strong>( ______________________ )</strong><br>Admin / Pengurus Pondok</p>
        </div>
    </div>
</body>
</html>
