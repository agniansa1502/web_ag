@extends('admin.layout')

@section('title', 'Unggah Galeri')
@section('page_title', 'Unggah Foto Galeri')

@section('content')
<div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-200 max-w-xl">
    <form action="{{ route('admin.galeri.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        <div>
            <label class="block text-xs font-bold text-slate-700 mb-1">Judul / Keterangan Kegiatan</label>
            <input type="text" name="judul" required class="w-full p-2.5 border rounded-xl text-xs outline-none">
        </div>
        <div>
            <label class="block text-xs font-bold text-slate-700 mb-1">File Foto</label>
            <input type="file" name="foto" required class="w-full p-2 border rounded-xl text-xs">
        </div>
        <div class="flex space-x-2 pt-2">
            <button type="submit" class="bg-emerald-900 text-amber-400 font-bold px-4 py-2 rounded-xl text-xs">Unggah</button>
            <a href="{{ route('admin.galeri.index') }}" class="bg-slate-200 text-slate-700 font-bold px-4 py-2 rounded-xl text-xs">Batal</a>
        </div>
    </form>
</div>
@endsection