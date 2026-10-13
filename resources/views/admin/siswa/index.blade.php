@extends('admin.layout')

@section('title', 'Data Siswa')
@section('page-title', 'Kelola Data Siswa')

@section('content')
<div class="admin-card">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="m-0">Data Siswa</h4>
        <a href="{{ route('admin.siswa.create') }}" class="btn btn-success">
            <i class="bi bi-plus-lg"></i> Tambah Siswa
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NISN</th>
                    <th>Nama Siswa</th>
                    <th>Jenis Kelamin</th>
                    <th>Tahun Masuk</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            @forelse($siswa as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nisn }}</td>
                    <td>{{ $item->nama_siswa }}</td>
                    <td>{{ $item->jenis_kelamin }}</td>
                    <td>{{ $item->tahun_masuk }}</td>
                    <td>
                        <div class="d-flex gap-1">
                            <a href="{{ route('admin.siswa.edit', $item->id_siswa) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('admin.siswa.destroy', $item->id_siswa) }}" method="POST" onsubmit="return confirm('Hapus data siswa ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center py-4 text-muted">Belum ada data siswa.</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection