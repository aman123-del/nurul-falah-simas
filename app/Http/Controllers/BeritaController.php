<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $beritas = \App\Models\Berita::latest()->get();
        return view('berita.index', compact('beritas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!auth()->user()->isAdmin()) {
            abort(403, 'Hanya Admin yang diizinkan mengelola berita.');
        }
        return view('berita.create');
    }

    public function store(Request $request)
    {
        if (!auth()->user()->isAdmin()) {
            abort(403, 'Hanya Admin yang diizinkan mengelola berita.');
        }
        $validated = $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            'tanggal_posting' => 'required|date',
            'gambar' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('beritas', 'public');
        }

        \App\Models\Berita::create($validated);

        return redirect()->route('berita.index')->with('success', 'Berita berhasil diterbitkan.');
    }

    public function show(string $id)
    {
        $berita = \App\Models\Berita::findOrFail($id);
        return view('berita.show', compact('berita'));
    }

    public function edit(string $id)
    {
        if (!auth()->user()->isAdmin()) {
            abort(403, 'Hanya Admin yang diizinkan mengelola berita.');
        }
        $berita = \App\Models\Berita::findOrFail($id);
        return view('berita.edit', compact('berita'));
    }

    public function update(Request $request, string $id)
    {
        if (!auth()->user()->isAdmin()) {
            abort(403, 'Hanya Admin yang diizinkan mengelola berita.');
        }
        $berita = \App\Models\Berita::findOrFail($id);

        $validated = $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            'tanggal_posting' => 'required|date',
            'gambar' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('beritas', 'public');
        }

        $berita->update($validated);

        return redirect()->route('berita.index')->with('success', 'Berita berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        if (!auth()->user()->isAdmin()) {
            abort(403, 'Hanya Admin yang diizinkan mengelola berita.');
        }
        $berita = \App\Models\Berita::findOrFail($id);
        $berita->delete();
        return redirect()->route('berita.index')->with('success', 'Berita berhasil dihapus.');
    }
}
