<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NilaiController extends Controller
{
    public function index()
    {
        return view('landing.nilai');
    }

    public function hitung(Request $request)
    {
        $data = $request->validate([
            'nama' => ['required', 'string', 'max:100'],
            'nis' => ['nullable', 'string', 'max:30'],
            'nilai1' => ['required', 'numeric', 'min:0', 'max:100'],
            'nilai2' => ['required', 'numeric', 'min:0', 'max:100'],
        ]);

        $rataRata = (
            (float) $data['nilai1'] +
            (float) $data['nilai2']
        ) / 2;

        $hasil = [
            'nama' => $data['nama'],
            'nis' => $data['nis'] ?? '',
            'nilai1' => (float) $data['nilai1'],
            'nilai2' => (float) $data['nilai2'],
            'rata_rata' => $rataRata,
            'status' => $rataRata >= 70 ? 'Lulus' : 'Tidak Lulus',
        ];

        return redirect()
            ->route('landing.nilai')
            ->withInput()
            ->with('hasil', $hasil);
    }
}
