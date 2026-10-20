<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SantriController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SyahriyahController;
use App\Http\Controllers\VideoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $berita = \App\Models\Berita::latest()->take(3)->get();
    $galeri = \App\Models\Galeri::latest()->take(8)->get();
    $videos = \App\Models\Video::latest()->take(3)->get();
    return view('welcome', compact('berita', 'galeri', 'videos'));
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Resource Routes
    Route::get('/santri/export', [SantriController::class, 'export'])->name('santri.export');
    Route::get('/santri/{id}/export-pdf', [SantriController::class, 'exportPdf'])->name('santri.exportPdf');
    Route::post('/santri/bulk-action', [SantriController::class, 'bulkAction'])->name('santri.bulkAction');
    Route::resource('santri', SantriController::class);
    Route::resource('berita', BeritaController::class);
    Route::resource('galeri', \App\Http\Controllers\GaleriController::class);
    Route::resource('video', VideoController::class);
    Route::resource('syahriyah', SyahriyahController::class);
    Route::post('/syahriyah/toggle', [SyahriyahController::class, 'toggle'])->name('syahriyah.toggle');

    // KTS Route for Santri
    Route::get('/kts/{id}', [SantriController::class, 'kts'])->name('santri.kts');

    // Reports
    Route::get('/reports', [\App\Http\Controllers\ReportController::class, 'index'])->name('reports.index');
    Route::get('/reports/santri-pdf', [\App\Http\Controllers\ReportController::class, 'santriPdf'])->name('reports.santri-pdf');
    Route::get('/reports/alumni-pdf', [\App\Http\Controllers\ReportController::class, 'alumniPdf'])->name('reports.alumni-pdf');
    Route::get('/reports/syahriyah-pdf', [\App\Http\Controllers\ReportController::class, 'syahriyahPdf'])->name('reports.syahriyah-pdf');

    // Notifications
    Route::get('/notifications', function () {
        $notifications = auth()->user()->notifications()->paginate(10);
        return view('notifications.index', compact('notifications'));
    })->name('notifications.index');
    
    Route::post('/notifications/{id}/read', function ($id) {
        $notification = auth()->user()->notifications()->findOrFail($id);
        $notification->markAsRead();
        return redirect()->to($notification->data['url'] ?? route('notifications.index'));
    })->name('notifications.read');
});

Route::middleware('guest')->group(function () {
    Route::get('/auth/google', [\App\Http\Controllers\Auth\GoogleController::class, 'redirect'])->name('auth.google');
    Route::get('/auth/google/callback', [\App\Http\Controllers\Auth\GoogleController::class, 'callback'])->name('auth.google.callback');
});

// Helper route for shared hosting to create storage symlink
Route::get('/create-storage-link', function () {
    \Illuminate\Support\Facades\Artisan::call('storage:link');
    return 'Storage link has been created successfully!';
});

require __DIR__.'/auth.php';
