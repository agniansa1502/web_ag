<?php

namespace App\Http\Controllers;

use App\Models\Ekstrakurikuler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class EkstrakurikulerController extends Controller
{
    // =========================
    // TAMPILKAN DATA + PENCARIAN
    // =========================
    public function index(Request $request)
    {
        $search = $request->input('search');

        $ekskul = Ekstrakurikuler::when($search, function ($query) use ($search) {
            $query->where('nama_ekskul', 'like', '%' . $search . '%')
                  ->orWhere('pembina', 'like', '%' . $search . '%')
                  ->orWhere('jadwal_latihan', 'like', '%' . $search . '%')
                  ->orWhere('deskripsi', 'like', '%' . $search . '%');
        })->get();

        foreach ($ekskul as $item) {
            $item->encrypted_id = Crypt::encryptString($item->id);
        }

        return view(
            'admin.eskul.ekstrakurikuler',
            compact('ekskul', 'search')
        );
    }

    // =========================
    // DETAIL EKSTRAKURIKULER
    // =========================
    public function show($id)
    {
        try {
            $id = Crypt::decryptString($id);
        } catch (\Exception $e) {
            abort(404);
        }

        $ekskul = Ekstrakurikuler::findOrFail($id);

        return view('ekstrakurikuler-detail', compact('ekskul'));
    }

    // =========================
    // FORM TAMBAH
    // =========================
    public function create()
    {
        return view('admin.eskul.create_eskul');
    }

    // =========================
    // SIMPAN DATA
    // =========================
    public function store(Request $request)
    {
        $request->validate([
            'nama_ekskul'    => 'required',
            'pembina'        => 'required',
            'jadwal_latihan' => 'required',
            'deskripsi'      => 'required',
            'gambar'         => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = [
            'nama_ekskul'    => $request->nama_ekskul,
            'pembina'        => $request->pembina,
            'jadwal_latihan' => $request->jadwal_latihan,
            'deskripsi'      => $request->deskripsi,
        ];

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')
                ->store('ekskul', 'public');
        }

        Ekstrakurikuler::create($data);

        return redirect()
            ->route('admin.ekskul')
            ->with('success', 'Ekstrakurikuler berhasil ditambahkan.');
    }

    // =========================
    // FORM EDIT
    // =========================
    public function edit($id)
    {
        try {
            $id = Crypt::decryptString($id);
        } catch (\Exception $e) {
            abort(404);
        }

        $ekskul = Ekstrakurikuler::findOrFail($id);

        $ekskul->encrypted_id = Crypt::encryptString($ekskul->id);

        return view(
            'admin.eskul.edit_eskul',
            compact('ekskul')
        );
    }

    // =========================
    // UPDATE DATA
    // =========================
    public function update(Request $request, $id)
    {
        try {
            $id = Crypt::decryptString($id);
        } catch (\Exception $e) {
            abort(404);
        }

        $ekskul = Ekstrakurikuler::findOrFail($id);

        $request->validate([
            'nama_ekskul'    => 'required',
            'pembina'        => 'required',
            'jadwal_latihan' => 'required',
            'deskripsi'      => 'required',
            'gambar'         => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = [
            'nama_ekskul'    => $request->nama_ekskul,
            'pembina'        => $request->pembina,
            'jadwal_latihan' => $request->jadwal_latihan,
            'deskripsi'      => $request->deskripsi,
        ];

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')
                ->store('ekskul', 'public');
        }

        $ekskul->update($data);

        return redirect()
            ->route('admin.ekskul')
            ->with('success', 'Ekstrakurikuler berhasil diperbarui.');
    }

    // =========================
    // HAPUS DATA
    // =========================
    public function destroy($id)
    {
        try {
            $id = Crypt::decryptString($id);
        } catch (\Exception $e) {
            abort(404);
        }

        $ekskul = Ekstrakurikuler::findOrFail($id);

        $ekskul->delete();

        return redirect()
            ->route('admin.ekskul')
            ->with('success', 'Ekstrakurikuler berhasil dihapus.');
    }
}
