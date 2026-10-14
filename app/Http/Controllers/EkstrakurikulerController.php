<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ekstrakulikuler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EkstrakulikulerController extends Controller
{
    public function index()
    {
        $ekskul = Ekstrakulikuler::all();
        return view('admin.ekstrakulikuler.index', compact('ekskul'));
    }

    public function create()
    {
        return view('admin.ekstrakulikuler.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_eksul' => 'required|max:40',
            'pembina' => 'required|max:40',
            'jadwal_latihan' => 'required|max:40',
            'deskripsi' => 'nullable',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $data = $request->only(['nama_eksul', 'pembina', 'jadwal_latihan', 'deskripsi']);

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('ekskul', 'public');
        }

        Ekstrakulikuler::create($data);

        return redirect()->route('admin.ekstrakulikuler.index')->with('success', 'Data ekstrakurikuler berhasil ditambahkan');
    }

    public function destroy($id)
    {
        $ekskul = Ekstrakulikuler::findOrFail($id);

        if ($ekskul->gambar && Storage::disk('public')->exists($ekskul->gambar)) {
            Storage::disk('public')->delete($ekskul->gambar);
        }

        $ekskul->delete();

        return redirect()->route('admin.ekstrakulikuler.index')->with('success', 'Data ekstrakurikuler berhasil dihapus');
    }
}
