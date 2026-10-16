@extends('layouts.app')

@section('title', 'Data Siswa | MTs Al Muawanah')

@section('content')

<style>
    :root {
        --alma-green: #087443;
        --alma-dark: #075c36;
        --alma-light: #eaf7ef;
        --alma-gold: #f4c542;
    }

    .alma-page-title {
        color: var(--alma-dark);
        font-weight: 700;
    }

    .alma-card {
        border: none;
        border-radius: 16px;
        box-shadow: 0 5px 20px rgba(7, 92, 54, 0.09);
        overflow: hidden;
    }

    .alma-card-header {
        background: linear-gradient(135deg, #087443, #0ca968);
        color: white;
        padding: 18px 22px;
        border-bottom: 4px solid var(--alma-gold);
    }

    .alma-card-header h5 {
        margin: 0;
        font-weight: 600;
    }

    .alma-card-body {
        padding: 22px;
    }

    .alma-form-control {
        border-radius: 9px;
        border: 1px solid #d5e5da;
        padding: 10px 13px;
    }

    .alma-form-control:focus {
        border-color: var(--alma-green);
        box-shadow: 0 0 0 0.2rem rgba(8, 116, 67, 0.13);
    }

    .btn-alma {
        background: var(--alma-green);
        color: white;
        border: 1px solid var(--alma-green);
        border-radius: 9px;
        padding: 10px 16px;
        font-weight: 600;
    }

    .btn-alma:hover {
        background: var(--alma-dark);
        border-color: var(--alma-dark);
        color: white;
    }

    .btn-alma-gold {
        background: var(--alma-gold);
        color: var(--alma-dark);
        border: 1px solid var(--alma-gold);
        border-radius: 8px;
        font-weight: 600;
    }

    .btn-alma-gold:hover {
        background: #e5b52d;
        color: var(--alma-dark);
    }

    .alma-table thead th {
        background: var(--alma-green);
        color: white;
        padding: 14px 12px;
        border: none;
        white-space: nowrap;
    }

    .alma-table tbody td {
        padding: 12px;
        vertical-align: middle;
    }

    .alma-table tbody tr:hover {
        background: var(--alma-light);
    }

    .alma-badge {
        display: inline-block;
        padding: 5px 10px;
        border-radius: 20px;
        background: var(--alma-light);
        color: var(--alma-dark);
        font-weight: 600;
        font-size: 12px;
    }

    .alma-empty {
        padding: 30px !important;
        color: #6c757d;
    }

    .alma-action {
        display: flex;
        gap: 6px;
        align-items: center;
    }

    .btn-alma-edit {
        background: #f4c542;
        color: #075c36;
        border: none;
        border-radius: 7px;
        font-weight: 600;
    }

    .btn-alma-edit:hover {
        background: #e5b52d;
        color: #075c36;
    }

    .btn-alma-delete {
        background: #dc3545;
        color: white;
        border: none;
        border-radius: 7px;
        font-weight: 600;
    }

    .btn-alma-delete:hover {
        background: #bb2d3b;
        color: white;
    }

    @media (max-width: 768px) {
        .alma-card-body {
            padding: 14px;
        }

        .alma-toolbar {
            margin-top: 15px;
        }
    }
</style>

<div class="container-fluid">

    {{-- Judul halaman --}}
    <div class="row mt-4 mb-3 align-items-center">
        <div class="col-md-5">
            <h3 class="alma-page-title">
                <i class="mdi mdi-account-group me-2"></i>
                Data Siswa
            </h3>
            <p class="text-muted mb-0">
                Manajemen data siswa MTs Al Muawanah.
            </p>
        </div>

        <div class="col-md-7 alma-toolbar">
            <div class="row g-2 justify-content-end">

                {{-- Form pencarian --}}
                <div class="col-md-8">
                    <form action="{{ route('siswa.index') }}" method="GET">
                        <div class="input-group">
                            <input
                                type="search"
                                name="search"
                                class="form-control alma-form-control"
                                placeholder="Cari NISN / Nama / Jenis Kelamin..."
                                value="{{ request('search') }}"
                            >
                            <button type="submit" class="btn btn-alma">
                                <i class="mdi mdi-magnify me-1"></i>
                                Cari
                            </button>
                        </div>
                    </form>
                </div>

                {{-- Tombol tambah --}}
                <div class="col-md-4 text-md-end">
                    <a href="{{ route('siswa.create') }}" class="btn btn-alma w-100">
                        <i class="mdi mdi-account-plus me-1"></i>
                        Tambah Siswa
                    </a>
                </div>

            </div>
        </div>
    </div>

    {{-- Pesan sukses --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="mdi mdi-check-circle me-2"></i>
            {{ session('success') }}
            <button type="button" class="btn-close"
                data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- Pesan error --}}
    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close"
                data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- Tabel data siswa --}}
    <div class="card alma-card">

        <div class="alma-card-header">
            <h5>
                <i class="mdi mdi-school me-2"></i>
                Daftar Siswa MTs Al Muawanah
            </h5>
        </div>

        <div class="alma-card-body">
            <div class="table-responsive">
                <table class="table table-hover alma-table align-middle mb-0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NISN</th>
                            <th>Nama Siswa</th>
                            <th>Jenis Kelamin</th>
                            <th>Tahun Masuk</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($siswas as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>

                                <td>
                                    <span class="alma-badge">
                                        {{ $item->nisn }}
                                    </span>
                                </td>

                                <td class="fw-semibold">
                                    {{ $item->nama_siswa }}
                                </td>

                                <td>{{ $item->jenis_kelamin }}</td>

                                <td>{{ $item->tahun_masuk }}</td>

                                <td>
                                    <small>
                                        {{ $item->created_at ? $item->created_at->format('d/m/Y H:i') : '-' }}
                                    </small>
                                </td>

                                <td>
                                    <small>
                                        {{ $item->updated_at ? $item->updated_at->format('d/m/Y H:i') : '-' }}
                                    </small>
                                </td>

                                <td>
                                    <div class="alma-action">

                                        {{-- Tombol edit --}}
                                        <a
                                            href="{{ route('siswa.edit', Crypt::encrypt($item->id_siswa)) }}"
                                            class="btn btn-alma-edit btn-sm"
                                        >
                                            <i class="mdi mdi-pencil me-1"></i>
                                            Edit
                                        </a>

                                        {{-- Tombol hapus --}}
                                        <form
                                            action="{{ route('siswa.destroy', Crypt::encrypt($item->id_siswa)) }}"
                                            method="POST"
                                            class="d-inline"
                                            onsubmit="return confirm('Yakin ingin menghapus data siswa ini?')"
                                        >
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-alma-delete btn-sm">
                                                <i class="mdi mdi-delete me-1"></i>
                                                Hapus
                                            </button>
                                        </form>

                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center alma-empty">
                                    <i class="mdi mdi-account-off mdi-36px d-block mb-2"></i>
                                    <strong>Data siswa belum tersedia.</strong>
                                    <p class="mb-0 mt-1">
                                        Silakan tambahkan data siswa atau ubah kata pencarian.
                                    </p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>

</div>

@endsection