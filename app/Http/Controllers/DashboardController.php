<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $santriCount = \App\Models\Santri::count();
        $activeSantriCount = \App\Models\Santri::where('status', 'Aktif')->count();
        $alumniCount = \App\Models\Santri::where('status', 'Alumni')->count();
        $latestBerita = \App\Models\Berita::latest()->take(5)->get();

        return view('dashboard', compact(
            'santriCount', 
            'activeSantriCount', 
            'alumniCount', 
            'latestBerita'
        ));
    }
}
