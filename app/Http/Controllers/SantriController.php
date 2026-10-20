<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use App\Models\User;
use App\Notifications\SystemActivityNotification;

class SantriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $status = $request->input('status', 'Aktif');
        $search = $request->input('search');
        $tahun = $request->input('tahun');

        $query = \App\Models\Santri::where('status', $status);

        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('nama_lengkap', 'like', "%{$search}%")
                  ->orWhere('nis', 'like', "%{$search}%");
            });
        }

        if ($tahun) {
            $query->whereYear('tanggal_masuk', $tahun);
        }

        $santris = $query->get();
        
        $tahunMasukOptions = \App\Models\Santri::selectRaw('YEAR(tanggal_masuk) as tahun')
            ->whereNotNull('tanggal_masuk')
            ->distinct()
            ->orderBy('tahun', 'desc')
            ->pluck('tahun');

        return view('santri.index', compact('santris', 'status', 'search', 'tahun', 'tahunMasukOptions'));
    }

    public function export(Request $request)
    {
        $status = $request->input('status', 'Aktif');
        $search = $request->input('search');
        $tahun = $request->input('tahun');

        $query = \App\Models\Santri::where('status', $status);

        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('nama_lengkap', 'like', "%{$search}%")
                  ->orWhere('nis', 'like', "%{$search}%");
            });
        }

        if ($tahun) {
            $query->whereYear('tanggal_masuk', $tahun);
        }

        $santris = $query->get();
        
        $filename = "data_santri_{$status}_" . date('Y-m-d') . ".xls";

        return response()->streamDownload(function() use($santris, $status) {
            echo '<html xmlns:x="urn:schemas-microsoft-com:office:excel">';
            echo '<head><meta http-equiv="content-type" content="text/plain; charset=UTF-8"/></head>';
            echo '<body>';
            echo '<table border="1" style="border-collapse: collapse;">';
            echo '<thead>';
            echo '<tr><th colspan="7" style="font-size: 16px; font-weight: bold; text-align: center; background-color: #d1fae5; border: 1px solid black; padding: 10px;">DATA SANTRI PONPES NURUL FALAH BERBAUR</th></tr>';
            echo '<tr><th colspan="7" style="text-align: center; border: 1px solid black; padding: 5px;">Status: ' . strtoupper($status) . ' | Diekspor pada: ' . date('d-m-Y H:i') . '</th></tr>';
            echo '<tr><th colspan="7" style="border: none; padding: 5px;"></th></tr>';
            echo '<tr>';
            echo '<th style="border: 1px solid black; padding: 8px; background-color: #10b981; color: white;">No</th>';
            echo '<th style="border: 1px solid black; padding: 8px; background-color: #10b981; color: white;">Nama Lengkap</th>';
            echo '<th style="border: 1px solid black; padding: 8px; background-color: #10b981; color: white;">Tempat, Tgl Lahir</th>';
            echo '<th style="border: 1px solid black; padding: 8px; background-color: #10b981; color: white;">Alamat Lengkap</th>';
            echo '<th style="border: 1px solid black; padding: 8px; background-color: #10b981; color: white;">Nama Wali</th>';
            echo '<th style="border: 1px solid black; padding: 8px; background-color: #10b981; color: white;">Kontak Wali</th>';
            echo '<th style="border: 1px solid black; padding: 8px; background-color: #10b981; color: white;">Status</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';
            foreach ($santris as $index => $santri) {
                echo '<tr>';
                echo '<td style="border: 1px solid black; text-align: center; padding: 5px;">' . ($index + 1) . '</td>';
                echo '<td style="border: 1px solid black; padding: 5px;">' . $santri->nama_lengkap . '</td>';
                echo '<td style="border: 1px solid black; padding: 5px;">' . $santri->tempat_lahir . ', ' . $santri->tanggal_lahir . '</td>';
                
                $alamatLengkap = $santri->alamat;
                if ($santri->rt) $alamatLengkap .= " RT " . $santri->rt;
                if ($santri->rw) $alamatLengkap .= " RW " . $santri->rw;
                
                echo '<td style="border: 1px solid black; padding: 5px;">' . $alamatLengkap . '</td>';
                echo '<td style="border: 1px solid black; padding: 5px;">' . $santri->wali_nama . '</td>';
                echo '<td style="border: 1px solid black; padding: 5px; mso-number-format:\'\@\';">' . $santri->wali_kontak . '</td>';
                echo '<td style="border: 1px solid black; text-align: center; padding: 5px;">' . $santri->status . '</td>';
                echo '</tr>';
            }
            echo '</tbody>';
            echo '</table>';
            echo '</body></html>';
        }, $filename);
    }

    public function create()
    {
        if (!auth()->user()->isAdmin()) {
            abort(403, 'Hanya Admin yang diizinkan menambah data santri.');
        }
        return view('santri.create');
    }

    public function store(Request $request)
    {
        if (!auth()->user()->isAdmin()) {
            abort(403, 'Hanya Admin yang diizinkan menambah data santri.');
        }
        $validated = $request->validate([
            'nis' => 'required|unique:santris',
            'nik' => 'nullable|string|max:20',
            'nama_lengkap' => 'required',
            'jenis_kelamin' => 'nullable|in:L,P',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'anak_ke' => 'nullable|integer',
            'jumlah_saudara' => 'nullable|integer',
            'no_kk' => 'nullable|string|max:20',
            'no_hp' => 'nullable|string|max:20',
            'golongan_darah' => 'nullable|string|max:5',
            'riwayat_penyakit' => 'nullable|string',
            'alamat' => 'required',
            'rt' => 'nullable|string|max:5',
            'rw' => 'nullable|string|max:5',
            'provinsi' => 'nullable|string',
            'kabupaten' => 'nullable|string',
            'kecamatan' => 'nullable|string',
            'kode_pos' => 'nullable|string|max:10',
            'nama_ayah' => 'nullable|string',
            'tempat_lahir_ayah' => 'nullable|string',
            'tanggal_lahir_ayah' => 'nullable|date',
            'nik_ayah' => 'nullable|string|max:20',
            'pendidikan_ayah' => 'nullable|string',
            'pekerjaan_ayah' => 'nullable|string',
            'nama_ibu' => 'nullable|string',
            'tempat_lahir_ibu' => 'nullable|string',
            'tanggal_lahir_ibu' => 'nullable|date',
            'nik_ibu' => 'nullable|string|max:20',
            'pendidikan_ibu' => 'nullable|string',
            'pekerjaan_ibu' => 'nullable|string',
            'alamat_ortu' => 'nullable|string',
            'penghasilan_ortu' => 'nullable|string',
            'wali_nama' => 'required',
            'wali_kontak' => 'required',
            'alamat_wali' => 'nullable|string',
            'nik_wali' => 'nullable|string|max:20',
            'tempat_lahir_wali' => 'nullable|string',
            'tanggal_lahir_wali' => 'nullable|date',
            'pendidikan_wali' => 'nullable|string',
            'pekerjaan_wali' => 'nullable|string',
            'tanggal_masuk' => 'required|date',
            'status' => 'required',
            'foto' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('santris', 'public');
        }

        $santri = \App\Models\Santri::create($validated);

        $usersToNotify = User::whereIn('role', ['admin', 'bendahara'])->get();
        Notification::send($usersToNotify, new SystemActivityNotification(
            'Santri Baru Ditambahkan',
            'Admin telah menambahkan data santri baru: ' . $santri->nama_lengkap,
            route('santri.index')
        ));

        return redirect()->route('santri.index')->with('success', 'Data santri berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        $santri = \App\Models\Santri::findOrFail($id);
        return view('santri.show', compact('santri'));
    }

    public function exportPdf(string $id)
    {
        $santri = \App\Models\Santri::findOrFail($id);
        
        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('santri.pdf', compact('santri'))
                    ->setPaper('a4', 'portrait');
        
        return $pdf->download('Profil_Santri_' . str_replace(' ', '_', $santri->nama_lengkap) . '.pdf');
    }

    public function edit(string $id)
    {
        if (!auth()->user()->isAdmin()) {
            abort(403, 'Hanya Admin yang diizinkan mengedit data santri.');
        }
        $santri = \App\Models\Santri::findOrFail($id);
        return view('santri.edit', compact('santri'));
    }

    public function update(Request $request, string $id)
    {
        if (!auth()->user()->isAdmin()) {
            abort(403, 'Hanya Admin yang diizinkan mengedit data santri.');
        }
        $santri = \App\Models\Santri::findOrFail($id);
        
        $validated = $request->validate([
            'nis' => 'required|unique:santris,nis,'.$id,
            'nik' => 'nullable|string|max:20',
            'nama_lengkap' => 'required',
            'jenis_kelamin' => 'nullable|in:L,P',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'anak_ke' => 'nullable|integer',
            'jumlah_saudara' => 'nullable|integer',
            'no_kk' => 'nullable|string|max:20',
            'no_hp' => 'nullable|string|max:20',
            'golongan_darah' => 'nullable|string|max:5',
            'riwayat_penyakit' => 'nullable|string',
            'alamat' => 'required',
            'rt' => 'nullable|string|max:5',
            'rw' => 'nullable|string|max:5',
            'provinsi' => 'nullable|string',
            'kabupaten' => 'nullable|string',
            'kecamatan' => 'nullable|string',
            'kode_pos' => 'nullable|string|max:10',
            'nama_ayah' => 'nullable|string',
            'tempat_lahir_ayah' => 'nullable|string',
            'tanggal_lahir_ayah' => 'nullable|date',
            'nik_ayah' => 'nullable|string|max:20',
            'pendidikan_ayah' => 'nullable|string',
            'pekerjaan_ayah' => 'nullable|string',
            'nama_ibu' => 'nullable|string',
            'tempat_lahir_ibu' => 'nullable|string',
            'tanggal_lahir_ibu' => 'nullable|date',
            'nik_ibu' => 'nullable|string|max:20',
            'pendidikan_ibu' => 'nullable|string',
            'pekerjaan_ibu' => 'nullable|string',
            'alamat_ortu' => 'nullable|string',
            'penghasilan_ortu' => 'nullable|string',
            'wali_nama' => 'required',
            'wali_kontak' => 'required',
            'alamat_wali' => 'nullable|string',
            'nik_wali' => 'nullable|string|max:20',
            'tempat_lahir_wali' => 'nullable|string',
            'tanggal_lahir_wali' => 'nullable|date',
            'pendidikan_wali' => 'nullable|string',
            'pekerjaan_wali' => 'nullable|string',
            'tanggal_masuk' => 'required|date',
            'status' => 'required',
            'foto' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('santris', 'public');
        }

        $santri->update($validated);

        $usersToNotify = User::whereIn('role', ['admin', 'bendahara'])->get();
        Notification::send($usersToNotify, new SystemActivityNotification(
            'Data Santri Diperbarui',
            'Admin telah memperbarui data santri: ' . $santri->nama_lengkap,
            route('santri.index')
        ));

        return redirect()->route('santri.index')->with('success', 'Data santri berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        if (!auth()->user()->isAdmin()) {
            abort(403, 'Hanya Admin yang diizinkan menghapus data santri.');
        }
        
        $santri = \App\Models\Santri::findOrFail($id);
        $currentStatus = $santri->status;

        // Jika status bukan Alumni, maka "Hapus" berarti pindah ke Alumni
        if ($currentStatus !== 'Alumni') {
            $santri->update(['status' => 'Alumni']);
            return redirect()->route('santri.index', ['status' => $currentStatus])
                ->with('success', "Data santri {$santri->nama_lengkap} berhasil dipindahkan ke daftar Alumni.");
        }

        // Jika sudah Alumni, baru hapus permanen
        $santri->delete();
        return redirect()->route('santri.index', ['status' => 'Alumni'])
            ->with('success', "Data alumni {$santri->nama_lengkap} berhasil dihapus permanen dari sistem.");
    }

    public function kts(string $id)
    {
        $santri = \App\Models\Santri::findOrFail($id);
        return view('santri.kts', compact('santri'));
    }

    public function bulkAction(Request $request)
    {
        if (!auth()->user()->isAdmin()) {
            abort(403, 'Hanya Admin yang diizinkan melakukan aksi massal.');
        }

        $ids = $request->input('ids');
        if (empty($ids)) {
            return redirect()->back()->with('error', 'Tidak ada data santri yang dipilih.');
        }

        $action = $request->input('action'); // 'alumni' or 'delete'

        if ($action === 'alumni') {
            \App\Models\Santri::whereIn('id', $ids)->update(['status' => 'Alumni']);
            return redirect()->back()->with('success', count($ids) . ' data santri berhasil dipindahkan ke Alumni.');
        } elseif ($action === 'delete') {
            \App\Models\Santri::whereIn('id', $ids)->delete();
            return redirect()->back()->with('success', count($ids) . ' data alumni berhasil dihapus permanen.');
        }

        return redirect()->back();
    }
}
