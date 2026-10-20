<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    /**
     * Tampilkan daftar video kegiatan.
     */
    public function index()
    {
        $videos = Video::latest()->get();
        return view('video.index', compact('videos'));
    }

    /**
     * Tampilkan form tambah video baru.
     */
    public function create()
    {
        return view('video.create');
    }

    /**
     * Simpan video baru ke database.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'keterangan' => 'nullable|string|max:255',
            'youtube_url' => 'required|string|max:500',
        ]);

        Video::create($validated);

        return redirect()->route('video.index')->with('success', 'Video kegiatan berhasil ditambahkan.');
    }

    /**
     * Tampilkan form edit video.
     */
    public function edit(string $id)
    {
        $video = Video::findOrFail($id);
        return view('video.edit', compact('video'));
    }

    /**
     * Perbarui data video di database.
     */
    public function update(Request $request, string $id)
    {
        $video = Video::findOrFail($id);

        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'keterangan' => 'nullable|string|max:255',
            'youtube_url' => 'required|string|max:500',
        ]);

        $video->update($validated);

        return redirect()->route('video.index')->with('success', 'Video kegiatan berhasil diperbarui.');
    }

    /**
     * Hapus video dari database.
     */
    public function destroy(string $id)
    {
        $video = Video::findOrFail($id);
        $video->delete();

        return redirect()->route('video.index')->with('success', 'Video kegiatan berhasil dihapus.');
    }
}
