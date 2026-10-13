@extends('admin.layout')

@section('title', 'Data Guru')
@section('page-title', 'Kelola Data Guru')

@section('content')
<div class="admin-card">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="m-0">Data Guru</h4>
        <a href="{{ route('admin.guru.create') }}" class="btn btn-success">
            <i class="bi bi-plus-lg"></i> Tambah Guru
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
                    <th>Foto</th>
                    <th>Nama Guru</th>
                    <th>NIP</th>
                    <th>Mata Pelajaran</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            @forelse($guru as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        @if($item->foto)
                            <img src="{{ asset('storage/'.$item->foto) }}" width="50" height="50" class="rounded-circle object-fit-cover">
                        @else
                            <span class="badge bg-secondary">Tidak ada</span>
                        @endif
                    </td>
                    <td>{{ $item->nama_guru }}</td>
                    <td>{{ $item->nip ?? '-' }}</td>
                    <td>{{ $item->mapel }}</td>
                    <td>
                        <div class="d-flex gap-1">
                            <a href="{{ route('admin.guru.edit', $item->id_guru) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('admin.guru.destroy', $item->id_guru) }}" method="POST" onsubmit="return confirm('Hapus data guru ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center py-4 text-muted">Belum ada data guru.</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection