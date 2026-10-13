@extends('admin.layout')

@section('title', 'Daftar Berita')
@section('page_title', 'Kelola Berita')

@section('content')
<div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-200">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-lg font-bold text-slate-800">Daftar Berita</h2>
        <a href="{{ route('admin.berita.create') }}" class="bg-emerald-900 hover:bg-emerald-800 text-amber-400 font-bold px-4 py-2 rounded-xl text-xs">
            <i class="fas fa-plus mr-1"></i> Tambah Berita
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left text-xs text-slate-700">
            <thead class="bg-slate-50 uppercase border-b border-slate-200">
                <tr>
                    <th class="p-3">Gambar</th>
                    <th class="p-3">Judul</th>
                    <th class="p-3">Ringkasan</th>
                    <th class="p-3 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse($beritas as $berita)
                <tr>
                    <td class="p-3">
                        @if($berita->gambar)
                            <img src="{{ asset('storage/' . $berita->gambar) }}" class="w-12 h-12 object-cover rounded-lg">
                        @else
                            <span class="text-slate-400">No Image</span>
                        @endif
                    </td>
                    <td class="p-3 font-bold text-slate-900">{{ $berita->judul }}</td>
                    <td class="p-3 text-slate-600">{{ Str::limit($berita->ringkasan, 50) }}</td>
                    <td class="p-3 text-center space-x-2">
                        <a href="{{ route('admin.berita.edit', $berita->id) }}" class="text-amber-600 font-bold hover:underline">Edit</a>
                        <form action="{{ route('admin.berita.destroy', $berita->id) }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus berita ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 font-bold hover:underline">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="p-4 text-center text-slate-400">Belum ada berita.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $beritas->links() }}
    </div>
</div>
@endsection