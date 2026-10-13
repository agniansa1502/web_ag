@extends('admin.layout')

@section('title', 'Tambah Ekskul')
@section('page_title', 'Tambah Ekstrakulikuler')

@section('content')
<div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-200 max-w-xl">
    <form action="{{ route('admin.ekstrakuikuller.store') }}" method="POST" class="space-y-4">
        @csrf
        <div>
            <label class="block text-xs font-bold text-slate-700 mb-1">Nama Ekstrakulikuler</label>
            <input type="text" name="nama" required class="w-full p-2.5 border rounded-xl text-xs outline-none">
        </div>
        <div>
            <label class="block text-xs font-bold text-slate-700 mb-1">Pembina Ekskul</label>
            <input type="text" name="pembina" required class="w-full p-2.5 border rounded-xl text-xs outline-none">
        </div>
        <div>
            <label class="block text-xs font-bold text-slate-700 mb-1">Jadwal Rutin</label>
            <input type="text" name="jadwal" placeholder="Contoh: Setiap Sabtu 14:00" required class="w-full p-2.5 border rounded-xl text-xs outline-none">
        </div>
        <div class="flex space-x-2 pt-2">
            <button type="submit" class="bg-emerald-900 text-amber-400 font-bold px-4 py-2 rounded-xl text-xs">Simpan</button>
            <a href="{{ route('admin.ekstrakuikuller.index') }}" class="bg-slate-200 text-slate-700 font-bold px-4 py-2 rounded-xl text-xs">Batal</a>
        </div>
    </form>
</div>
@endsection