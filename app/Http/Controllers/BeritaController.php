<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;


class BeritaController extends Controller
{
    public function store(Request $request)
{
    $request->validate([
        'judul' => 'required|string|max:255',
        'kategori' => 'required|string|max:100',
        'konten' => 'required',
        'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    $data = $request->except('gambar');

    if ($request->hasFile('gambar')) {
        $data['gambar'] = $request->file('gambar')->store('berita', 'public');
    }

    Berita::create($data);

    return redirect()->route('admin.berita.landing')->with('success', 'Berita berhasil diterbitkan.');
}

public function update(Request $request, Berita $berita)
{
    $request->validate([
        'judul' => 'required|string|max:255',
        'kategori' => 'required|string|max:100',
        'konten' => 'required',
        'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    $data = $request->except('gambar');

    if ($request->hasFile('gambar')) {
        if ($berita->gambar) {
            Storage::disk('public')->delete($berita->gambar);
        }
        $data['gambar'] = $request->file('gambar')->store('berita', 'public');
    }

    $berita->update($data);

    return redirect()->route('admin.berita.landing')->with('success', 'Berita berhasil diperbarui.');
}
}
