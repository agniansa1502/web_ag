@extends('admin.layout')

@section('title', 'Tambah User')
@section('page_title', 'Tambah Pengguna Sistem')

@section('content')
<div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-200 max-w-xl">
    <form action="{{ route('admin.users.store') }}" method="POST" class="space-y-4">
        @csrf
        <div>
            <label class="block text-xs font-bold text-slate-700 mb-1">Nama Lengkap</label>
            <input type="text" name="name" required class="w-full p-2.5 border rounded-xl text-xs outline-none">
        </div>
        <div>
            <label class="block text-xs font-bold text-slate-700 mb-1">Email</label>
            <input type="email" name="email" required class="w-full p-2.5 border rounded-xl text-xs outline-none">
        </div>
        <div>
            <label class="block text-xs font-bold text-slate-700 mb-1">Password</label>
            <input type="password" name="password" required class="w-full p-2.5 border rounded-xl text-xs outline-none">
        </div>
        <div class="flex space-x-2 pt-2">
            <button type="submit" class="bg-emerald-900 text-amber-400 font-bold px-4 py-2 rounded-xl text-xs">Simpan User</button>
            <a href="{{ route('admin.users.index') }}" class="bg-slate-200 text-slate-700 font-bold px-4 py-2 rounded-xl text-xs">Batal</a>
        </div>
    </form>
</div>
@endsection