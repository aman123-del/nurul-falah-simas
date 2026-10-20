<?php

namespace App\Http\Controllers;

use App\Models\Syahriyah;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SyahriyahController extends Controller
{
    private $months = [
        'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
        'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
    ];

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        $year = $request->input('tahun', date('Y'));
        $search = $request->input('search');
        $months = $this->months;

        if ($user->role === 'santri') {
            $syahriyahs = Syahriyah::where('user_id', $user->id)
                ->where('tahun', $year)
                ->get()
                ->keyBy('bulan');
                
            return view('syahriyah.index', compact('syahriyahs', 'year', 'months'));
        }

        // Bendahara and Admin see the grid
        $query = \App\Models\Santri::where('status', 'Aktif')
            ->orderBy('tanggal_masuk', 'asc')
            ->orderBy('nama_lengkap', 'asc');

        if ($search) {
            $query->where('nama_lengkap', 'like', "%{$search}%");
        }

        $santris = $query->get();

        $payments = Syahriyah::where('tahun', $year)
            ->get()
            ->groupBy('santri_id')
            ->map(function ($items) {
                return $items->keyBy('bulan');
            });

        return view('syahriyah.index', compact('santris', 'payments', 'year', 'months', 'search'));
    }

    /**
     * Toggle payment status.
     */
    public function toggle(Request $request)
    {
        // Hanya Bendahara yang boleh merubah data Syahriyah
        if (!Auth::user()->isBendahara()) {
            abort(403, 'Hanya Bendahara yang diizinkan mengelola data Syahriyah.');
        }

        $request->validate([
            'santri_id' => 'required|exists:santris,id',
            'bulan' => 'required|string',
            'tahun' => 'required|integer',
        ]);

        $payment = Syahriyah::where('santri_id', $request->santri_id)
            ->where('bulan', $request->bulan)
            ->where('tahun', $request->tahun)
            ->first();

        $santri = \App\Models\Santri::find($request->santri_id);
        
        if ($payment) {
            $payment->delete();
            $message = 'Pembayaran dibatalkan.';
            $notifMessage = 'Bendahara membatalkan pembayaran Syahriyah ' . $santri->nama_lengkap . ' bulan ' . $request->bulan . ' ' . $request->tahun;
        } else {
            Syahriyah::create([
                'santri_id' => $request->santri_id,
                'bulan' => $request->bulan,
                'tahun' => $request->tahun,
                'jumlah' => 50000,
                'created_by' => Auth::id(),
            ]);
            $message = 'Pembayaran berhasil dikonfirmasi.';
            $notifMessage = 'Bendahara mengkonfirmasi pembayaran Syahriyah ' . $santri->nama_lengkap . ' bulan ' . $request->bulan . ' ' . $request->tahun;
        }

        $usersToNotify = User::whereIn('role', ['admin', 'bendahara'])->get();
        \Illuminate\Support\Facades\Notification::send($usersToNotify, new \App\Notifications\SystemActivityNotification(
            'Update Syahriyah',
            $notifMessage,
            route('syahriyah.index', ['tahun' => $request->tahun])
        ));

        return back()->with('success', $message);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        abort(404); // Using grid view now
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        abort(404); // Using toggle now
    }
}
