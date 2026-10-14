<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UjikomController extends Controller
{
    public function index()
    {
        return view('input-nilai');
    }

    public function hitung(Request $request)
    {
        $request->validate([
            'nilai1' => 'required|numeric|min:0|max:100',
            'nilai2' => 'required|numeric|min:0|max:100',
        ]);

        $nilai1 = (float) $request->nilai1;
        $nilai2 = (float) $request->nilai2;

        $total = $nilai1 + $nilai2;
        $rataRata = $total / 2;

        $keterangan = $rataRata >= 75
            ? 'Lulus'
            : 'Belum Lulus';

        return view('input-nilai', compact(
            'total',
            'rataRata',
            'keterangan'
        ));
    }
}
