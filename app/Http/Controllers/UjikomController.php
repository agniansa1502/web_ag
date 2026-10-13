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

        $rataRata = ($nilai1 + $nilai2) / 2;

        $keterangan = $rataRata > 70
            ? 'LULUS'
            : 'TIDAK LULUS';

        return view('input-nilai', compact(
            'nilai1',
            'nilai2',
            'rataRata',
            'keterangan'
        ));
    }
}
