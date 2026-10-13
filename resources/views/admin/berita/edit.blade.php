@extends('admin.layout')

@section('title', 'Edit Berita')
@section('page_title', 'Edit Berita')

@section('content')
<div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-200 max-w-3xl">
    <form action="{{ route('admin.berita.update', $berita->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block text-xs font-bold text-slate-700 mb-1">Judul Berita</label>
            <input type="text" name="judul" value="{{ old('judul', $berita->judul) }}" required class="w-full p-2.5 border rounded-xl text-xs outline-none focus:ring-2 focus:ring-emerald-800">
        </div>

        <div>
            <label class="block text-xs font-bold text-slate-700 mb-1">Ringkasan</label>
            <textarea name="ringkasan" rows="2" required class="w-full p-2.5 border rounded-xl text-xs outline-none focus:ring-2 focus:ring-emerald-800">{{ old('ringkasan', $berita->ringkasan) }}</textarea>
        </div>

        <div>
            <label class="block text-xs font-bold text-slate-700 mb-1">Konten Lengkap</label>
            <textarea name="konten" rows="5" required class="w-full p-2.5 border rounded-xl text-xs outline-none focus:ring-2 focus:ring-emerald-800">{{ old('konten', $berita->konten) }}</textarea>
        </div>

        <div>
            <label class="block text-xs font-bold text-slate-700 mb-1">Gambar Berita</label>
            @if($berita->gambar)
                <img src="{{ asset('storage/' . $berita->gambar) }}" class="w-20 h-20 object-cover rounded-lg mb-2">
            @endif
            <input type="file" name="gambar" class="w-full p-2 border rounded-xl text-xs">
        </div>

        <div class="flex space-x-2 pt-2">
            <button type="submit" class="bg-amber-500 text-emerald-950 font-bold px-4 py-2 rounded-xl text-xs">Update Berita</button>
            <a href="{{ route('admin.berita.index') }}" class="bg-slate-200 text-slate-700 font-bold px-4 py-2 rounded-xl text-xs">Batal</a>
        </div>
    </form>
</div>
@endsection