@extends('admin.layout')

@section('title', 'Tambah Berita')
@section('page_title', 'Tambah Berita Baru')

@section('content')
<div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-200 max-w-3xl">
    <form action="{{ route('admin.berita.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        <div>
            <label class="block text-xs font-bold text-slate-700 mb-1">Judul Berita</label>
            <input type="text" name="judul" required class="w-full p-2.5 border rounded-xl text-xs outline-none focus:ring-2 focus:ring-emerald-800">
        </div>

        <div>
            <label class="block text-xs font-bold text-slate-700 mb-1">RingkasanSingkat</label>
            <textarea name="ringkasan" rows="2" required class="w-full p-2.5 border rounded-xl text-xs outline-none focus:ring-2 focus:ring-emerald-800"></textarea>
        </div>

        <div>
            <label class="block text-xs font-bold text-slate-700 mb-1">Konten Lengkap</label>
            <textarea name="konten" rows="5" required class="w-full p-2.5 border rounded-xl text-xs outline-none focus:ring-2 focus:ring-emerald-800"></textarea>
        </div>

        <div>
            <label class="block text-xs font-bold text-slate-700 mb-1">Gambar Utama</label>
            <input type="file" name="gambar" class="w-full p-2 border rounded-xl text-xs">
        </div>

        <div class="flex space-x-2 pt-2">
            <button type="submit" class="bg-emerald-900 text-amber-400 font-bold px-4 py-2 rounded-xl text-xs">Simpan Berita</button>
            <a href="{{ route('admin.berita.index') }}" class="bg-slate-200 text-slate-700 font-bold px-4 py-2 rounded-xl text-xs">Batal</a>
        </div>
    </form>
</div>
@endsection