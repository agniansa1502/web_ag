@extends('admin.layout')

@section('title', 'Edit Galeri')
@section('page_title', 'Edit Foto Galeri')

@section('content')
<div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-200 max-w-xl">
    <form action="{{ route('admin.galeri.update', $galeri->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        @method('PUT')
        <div>
            <label class="block text-xs font-bold text-slate-700 mb-1">Judul / Keterangan Kegiatan</label>
            <input type="text" name="judul" value="{{ old('judul', $galeri->judul) }}" required class="w-full p-2.5 border rounded-xl text-xs outline-none">
        </div>
        <div>
            <label class="block text-xs font-bold text-slate-700 mb-1">Ganti Foto (Opsional)</label>
            <img src="{{ asset('storage/' . $galeri->foto) }}" class="w-20 h-20 object-cover rounded-lg mb-2">
            <input type="file" name="foto" class="w-full p-2 border rounded-xl text-xs">
        </div>
        <div class="flex space-x-2 pt-2">
            <button type="submit" class="bg-amber-500 text-emerald-950 font-bold px-4 py-2 rounded-xl text-xs">Update</button>
            <a href="{{ route('admin.galeri.index') }}" class="bg-slate-200 text-slate-700 font-bold px-4 py-2 rounded-xl text-xs">Batal</a>
        </div>
    </form>
</div>
@endsection