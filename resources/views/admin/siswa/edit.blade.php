@extends('admin.layout')

@section('title', 'Edit Siswa')
@section('page_title', 'Edit Data Siswa')

@section('content')
<div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-200 max-w-xl">
    <form action="{{ route('admin.siswa.update', $siswa->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')
        <div>
            <label class="block text-xs font-bold text-slate-700 mb-1">NISN</label>
            <input type="text" name="nisn" value="{{ old('nisn', $siswa->nisn) }}" required class="w-full p-2.5 border rounded-xl text-xs outline-none">
        </div>
        <div>
            <label class="block text-xs font-bold text-slate-700 mb-1">Nama Lengkap</label>
            <input type="text" name="nama" value="{{ old('nama', $siswa->nama) }}" required class="w-full p-2.5 border rounded-xl text-xs outline-none">
        </div>
        <div>
            <label class="block text-xs font-bold text-slate-700 mb-1">Kelas / Jalur</label>
            <input type="text" name="kelas" value="{{ old('kelas', $siswa->kelas) }}" required class="w-full p-2.5 border rounded-xl text-xs outline-none">
        </div>
        <div>
            <label class="block text-xs font-bold text-slate-700 mb-1">Status Siswa</label>
            <select name="status" class="w-full p-2.5 border rounded-xl text-xs outline-none">
                <option value="Aktif" {{ $siswa->status == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                <option value="Pending" {{ $siswa->status == 'Pending' ? 'selected' : '' }}>Pending (PPDB)</option>
            </select>
        </div>
        <div class="flex space-x-2 pt-2">
            <button type="submit" class="bg-amber-500 text-emerald-950 font-bold px-4 py-2 rounded-xl text-xs">Update Data</button>
            <a href="{{ route('admin.siswa.index') }}" class="bg-slate-200 text-slate-700 font-bold px-4 py-2 rounded-xl text-xs">Batal</a>
        </div>
    </form>
</div>
@endsection