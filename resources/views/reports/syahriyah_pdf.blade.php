<!DOCTYPE html>
<html>
<head>
    <title>Laporan Keuangan Syahriyah</title>
    <style>
        body { font-family: 'Helvetica', sans-serif; color: #333; }
        .header { text-align: center; margin-bottom: 30px; border-bottom: 2px solid #065f46; padding-bottom: 20px; }
        .header h2 { margin: 0; color: #065f46; text-transform: uppercase; }
        .header p { margin: 5px 0 0; font-size: 12px; color: #666; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 12px; text-align: left; font-size: 11px; }
        th { background-color: #f8fafc; color: #065f46; font-weight: bold; text-transform: uppercase; }
        tr:nth-child(even) { background-color: #f1f5f9; }
        .total-row { background-color: #065f46 !important; color: white !important; font-weight: bold; }
        .footer { margin-top: 30px; text-align: right; font-size: 10px; color: #999; }
    </style>
</head>
<body>
    <div class="header">
        <h2>Laporan Keuangan Syahriyah</h2>
        <p>Pondok Pesantren Nurul Falah Berbaur</p>
        <p>Tanggal Cetak: {{ date('d F Y') }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th width="5%">No</th>
                <th width="25%">Nama Santri</th>
                <th width="20%">Bulan/Tahun</th>
                <th width="25%">Tanggal Bayar</th>
                <th width="25%">Jumlah</th>
            </tr>
        </thead>
        <tbody>
            @foreach($payments as $index => $payment)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $payment->santri->nama_lengkap ?? 'Santri Tidak Ditemukan' }}</td>
                <td>{{ $payment->bulan }} {{ $payment->tahun }}</td>
                <td>{{ $payment->created_at->format('d M Y, H:i') }}</td>
                <td>Rp {{ number_format($payment->jumlah, 0, ',', '.') }}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr class="total-row">
                <td colspan="4" style="text-align: right;">TOTAL PENDAPATAN</td>
                <td>Rp {{ number_format($total, 0, ',', '.') }}</td>
            </tr>
        </tfoot>
    </table>

    <div class="footer">
        Dicetak secara otomatis oleh Sistem Manajemen Nurul Falah (SIMAS)
    </div>
</body>
</html>
