@extends('admin.layout')

@section('title', 'Edit Ekskul')
@section('page_title', 'Edit Ekstrakulikuler')

@section('content')
<div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-200 max-w-xl">
    <form action="{{ route('admin.ekstrakuikuller.update', $ekstrakuikuller->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')
        <div>
            <label class="block text-xs font-bold text-slate-700 mb-1">Nama Ekstrakulikuler</label>
            <input type="text" name="nama" value="{{ old('nama', $ekstrakuikuller->nama) }}" required class="w-full p-2.5 border rounded-xl text-xs outline-none">
        </div>
        <div>
            <label class="block text-xs font-bold text-slate-700 mb-1">Pembina Ekskul</label>
            <input type="text" name="pembina" value="{{ old('pembina', $ekstrakuikuller->pembina) }}" required class="w-full p-2.5 border rounded-xl text-xs outline-none">
        </div>
        <div>
            <label class="block text-xs font-bold text-slate-700 mb-1">Jadwal Rutin</label>
            <input type="text" name="jadwal" value="{{ old('jadwal', $ekstrakuikuller->jadwal) }}" required class="w-full p-2.5 border rounded-xl text-xs outline-none">
        </div>
        <div class="flex space-x-2 pt-2">
            <button type="submit" class="bg-amber-500 text-emerald-950 font-bold px-4 py-2 rounded-xl text-xs">Update</button>
            <a href="{{ route('admin.ekstrakuikuller.index') }}" class="bg-slate-200 text-slate-700 font-bold px-4 py-2 rounded-xl text-xs">Batal</a>
        </div>
    </form>
</div>
@endsection