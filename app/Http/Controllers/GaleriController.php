<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GaleriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $galeri = \App\Models\Galeri::latest()->get();
        return view('galeri.index', compact('galeri'));
    }

    public function create()
    {
        return view('galeri.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'foto' => 'required|image|max:5120',
        ]);

        $path = $request->file('foto')->store('galeri', 'public');

        \App\Models\Galeri::create([
            'judul' => $request->judul,
            'foto' => $path,
        ]);

        return redirect()->route('galeri.index')->with('success', 'Foto berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $galeri = \App\Models\Galeri::findOrFail($id);
        return view('galeri.edit', compact('galeri'));
    }

    public function update(Request $request, string $id)
    {
        $galeri = \App\Models\Galeri::findOrFail($id);

        $request->validate([
            'judul' => 'required|string|max:255',
            'foto' => 'nullable|image|max:5120',
        ]);

        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('galeri', 'public');
            $galeri->update(['foto' => $path, 'judul' => $request->judul]);
        } else {
            $galeri->update(['judul' => $request->judul]);
        }

        return redirect()->route('galeri.index')->with('success', 'Foto berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $galeri = \App\Models\Galeri::findOrFail($id);
        $galeri->delete();

        return redirect()->route('galeri.index')->with('success', 'Foto berhasil dihapus.');
    }
}
