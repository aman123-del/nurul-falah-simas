<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        $stats = [
            'total_santri' => \App\Models\Santri::where('status', 'Aktif')->count(),
            'total_syahriyah' => \App\Models\Syahriyah::sum('jumlah'),
            'total_berita' => \App\Models\Berita::count(),
        ];
        
        return view('reports.index', compact('stats'));
    }

    public function santriPdf()
    {
        // Hanya ambil santri yang berstatus Aktif
        $status = 'Aktif';
        $santris = \App\Models\Santri::where('status', $status)
            ->orderBy('nama_lengkap', 'asc')
            ->get();

        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('reports.santri_pdf', compact('santris', 'status'));
        $pdf->setPaper('A4', 'landscape');
        
        $filename = "daftar-santri-aktif-" . date('Y-m-d') . ".pdf";

        return $pdf->download($filename);
    }

    public function alumniPdf()
    {
        $status = 'Alumni';
        $santris = \App\Models\Santri::where('status', $status)
            ->orderBy('nama_lengkap', 'asc')
            ->get();

        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('reports.santri_pdf', compact('santris', 'status'));
        $pdf->setPaper('A4', 'landscape');
        
        $filename = "daftar-alumni-" . date('Y-m-d') . ".pdf";

        return $pdf->download($filename);
    }

    public function syahriyahPdf()
    {
        $payments = \App\Models\Syahriyah::with('santri')->orderBy('created_at', 'desc')->get();
        $total = $payments->sum('jumlah');
        
        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('reports.syahriyah_pdf', compact('payments', 'total'));
        $pdf->setPaper('A4', 'portrait');
        
        $filename = "laporan-keuangan-syahriyah-" . date('Y-m-d') . ".pdf";

        return $pdf->download($filename);
    }
}
