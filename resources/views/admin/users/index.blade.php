@extends('admin.layout')

@section('title', 'Data User')
@section('page-title', 'Kelola Pengguna Sistem')

@section('content')
<div class="admin-card">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="m-0">Data Pengguna</h4>
        <a href="{{ route('admin.users.create') }}" class="btn btn-success">
            <i class="bi bi-plus-lg"></i> Tambah User
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
                    <th>Username</th>
                    <th>Role</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            @forelse($users as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->username }}</td>
                    <td><span class="badge bg-info text-dark">{{ $item->role }}</span></td>
                    <td>
                        <form action="{{ route('admin.users.destroy', $item->id_user) }}" method="POST" onsubmit="return confirm('Hapus user ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center py-4 text-muted">Belum ada pengguna.</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection