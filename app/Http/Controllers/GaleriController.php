<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Crypt;

class GaleriController extends Controller
{
    /**
     * Menampilkan semua galeri + pencarian
     */
    public function index(Request $request)
    {
        $search = $request->search;

        $galeris = Galeri::when($search, function ($query) use ($search) {
            $query->where('judul', 'like', '%' . $search . '%')
                ->orWhere('deskripsi', 'like', '%' . $search . '%');
        })
        ->latest()
        ->get();

        foreach ($galeris as $galeri) {
            $galeri->encrypted_id = Crypt::encryptString($galeri->id);
        }

        return view(
            'admin.galeri.galeri',
            compact('galeris', 'search')
        );
    }


/**
 * Detail galeri untuk halaman landing
 */
public function show($id)
{
    try {
        $id = \Illuminate\Support\Facades\Crypt::decryptString($id);
    } catch (\Exception $e) {
        // Mendukung ID biasa dari landing maupun ID terenkripsi
        if (!is_numeric($id)) {
            abort(404);
        }
    }

    $galeri = \App\Models\Galeri::findOrFail($id);
    $profil = \App\Models\ProfilSekolah::first();

    return view('landing.detail-galeri', compact('galeri', 'profil'));
}



    /**
     * Form tambah galeri
     */
    public function create()
    {
        return view('admin.galeri.create_galeri');
    }


    /**
     * Simpan galeri
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'nullable',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = [
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
        ];

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('galeri', 'public');
        }

        Galeri::create($data);

        return redirect()
            ->route('admin.galeri')
            ->with('success', 'Data galeri berhasil ditambahkan.');
    }


    /**
     * Form edit
     */
    public function edit($id)
    {
        try {
            $id = Crypt::decryptString($id);
        } catch (\Exception $e) {
            abort(404);
        }

        $galeri = Galeri::findOrFail($id);

        $galeri->encrypted_id = Crypt::encryptString($galeri->id);

        return view(
            'admin.galeri.edit_galeri',
            compact('galeri')
        );
    }


/**
 * Update galeri
 */
public function update(Request $request, $id)
{
    try {
        $id = Crypt::decryptString($id);
    } catch (\Exception $e) {
        abort(404);
    }

    $galeri = Galeri::findOrFail($id);

    $request->validate([
        'judul' => 'required|string|max:255',
        'deskripsi' => 'nullable|string',
        'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
    ], [
        'judul.required' => 'Judul wajib diisi.',
        'foto.image' => 'File harus berupa gambar.',
        'foto.mimes' => 'Format foto harus JPG, JPEG, PNG, atau WEBP.',
        'foto.max' => 'Ukuran foto maksimal 2 MB.',
    ]);

    // Data teks
    $galeri->judul = $request->judul;
    $galeri->deskripsi = $request->deskripsi;

    // Jika upload foto baru
    if ($request->hasFile('foto')) {

        // Hapus foto lama
        if (
            $galeri->foto &&
            Storage::disk('public')->exists($galeri->foto)
        ) {
            Storage::disk('public')->delete($galeri->foto);
        }

        // Upload foto baru
        $namaFoto = $request
            ->file('foto')
            ->store('galeri', 'public');

        // Simpan foto baru
        $galeri->foto = $namaFoto;
    }

    $galeri->save();

    return redirect()
        ->route('admin.galeri')
        ->with('success', 'Foto berhasil diperbarui.');
}




    /**
     * Hapus galeri
     */
    public function destroy($id)
    {
        try {
            $id = Crypt::decryptString($id);
        } catch (\Exception $e) {
            abort(404);
        }

        $galeri = Galeri::findOrFail($id);

        // Hapus file foto
        if (
            $galeri->foto &&
            Storage::disk('public')->exists($galeri->foto)
        ) {
            Storage::disk('public')->delete($galeri->foto);
        }


        // Hapus data database
        $galeri->delete();


        return redirect()
            ->route('admin.galeri')
            ->with('success', 'Foto berhasil dihapus.');
    }
}

