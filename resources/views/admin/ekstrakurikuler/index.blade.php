@extends('admin.layout')

@section('title', 'Kelola Ekstrakulikuler')
@section('page_title', 'Kelola Ekstrakulikuler')

@section('content')
<div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-200">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-lg font-bold text-slate-800">Daftar Ekstrakulikuler</h2>
        <a href="{{ route('admin.ekstrakuikuller.create') }}" class="bg-emerald-900 hover:bg-emerald-800 text-amber-400 font-bold px-4 py-2 rounded-xl text-xs">
            <i class="fas fa-plus mr-1"></i> Tambah Ekskul
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left text-xs text-slate-700">
            <thead class="bg-slate-50 uppercase border-b border-slate-200">
                <tr>
                    <th class="p-3">Nama Ekskul</th>
                    <th class="p-3">Pembina</th>
                    <th class="p-3">Jadwal Latihan</th>
                    <th class="p-3 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse($ekstras as $ekstra)
                <tr>
                    <td class="p-3 font-bold text-slate-900">{{ $ekstra->nama }}</td>
                    <td class="p-3 text-slate-600">{{ $ekstra->pembina }}</td>
                    <td class="p-3 text-amber-600 font-semibold">{{ $ekstra->jadwal }}</td>
                    <td class="p-3 text-center space-x-2">
                        <a href="{{ route('admin.ekstrakuikuller.edit', $ekstra->id) }}" class="text-amber-600 font-bold hover:underline">Edit</a>
                        <form action="{{ route('admin.ekstrakuikuller.destroy', $ekstra->id) }}" method="POST" class="inline" onsubmit="return confirm('Hapus ekskul ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 font-bold hover:underline">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="4" class="p-4 text-center text-slate-400">Belum ada ekstrakulikuler.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection