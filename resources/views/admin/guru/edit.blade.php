@extends('admin.layout')

@section('title', 'Edit Guru')
@section('page_title', 'Edit Data Guru')

@section('content')
<div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-200 max-w-xl">
    <form action="{{ route('admin.guru.update', $guru->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        @method('PUT')
        <div>
            <label class="block text-xs font-bold text-slate-700 mb-1">Nama Lengkap & Gelar</label>
            <input type="text" name="nama" value="{{ old('nama', $guru->nama) }}" required class="w-full p-2.5 border rounded-xl text-xs outline-none focus:ring-2 focus:ring-emerald-800">
        </div>
        <div>
            <label class="block text-xs font-bold text-slate-700 mb-1">Mata Pelajaran / Jabatan</label>
            <input type="text" name="mapel" value="{{ old('mapel', $guru->mapel) }}" required class="w-full p-2.5 border rounded-xl text-xs outline-none focus:ring-2 focus:ring-emerald-800">
        </div>
        <div>
            <label class="block text-xs font-bold text-slate-700 mb-1">Foto Formal</label>
            <input type="file" name="foto" class="w-full p-2 border rounded-xl text-xs">
        </div>
        <div class="flex space-x-2 pt-2">
            <button type="submit" class="bg-amber-500 text-emerald-950 font-bold px-4 py-2 rounded-xl text-xs">Update</button>
            <a href="{{ route('admin.guru.index') }}" class="bg-slate-200 text-slate-700 font-bold px-4 py-2 rounded-xl text-xs">Batal</a>
        </div>
    </form>
</div>
@endsection