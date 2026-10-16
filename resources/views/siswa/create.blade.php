@extends('layouts.app')

@section('title', 'Tambah Data Siswa | MTs Al Muawanah')

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
        padding: 25px;
    }

    .alma-form-label {
        font-weight: 600;
        color: #24523a;
        margin-bottom: 8px;
    }

    .alma-form-control {
        border-radius: 9px;
        padding: 11px 13px;
        border: 1px solid #d5e5da;
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
        padding: 10px 22px;
        font-weight: 600;
    }

    .btn-alma:hover {
        background: var(--alma-dark);
        border-color: var(--alma-dark);
        color: white;
    }

    .btn-alma-back {
        background: #f4f6f5;
        color: #405448;
        border: 1px solid #dce5df;
        border-radius: 9px;
        padding: 10px 18px;
        font-weight: 600;
    }

    .btn-alma-back:hover {
        background: #e7eee9;
        color: var(--alma-dark);
    }
</style>

<div class="container-fluid">

    {{-- Judul halaman --}}
    <div class="row mt-4 mb-3">
        <div class="col-12">
            <h3 class="alma-page-title">
                <i class="mdi mdi-account-plus me-2"></i>
                Tambah Data Siswa
            </h3>
            <p class="text-muted mb-0">
                MTs Al Muawanah — Formulir penambahan data siswa.
            </p>
        </div>
    </div>

    {{-- Pesan validasi --}}
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Data belum berhasil disimpan.</strong>
            <ul class="mb-0 mt-2">
                @foreach ($errors->all() as $item)
                    <li>{{ $item }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close"
                data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- Form tambah siswa --}}
    <div class="row">
        <div class="col-12">
            <div class="card alma-card">

                <div class="alma-card-header">
                    <h5>
                        <i class="mdi mdi-school me-2"></i>
                        Form Data Siswa
                    </h5>
                </div>

                <div class="alma-card-body">
                    <form action="{{ route('siswa.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="nisn" class="form-label alma-form-label">
                                NISN
                            </label>
                            <input
                                type="text"
                                name="nisn"
                                id="nisn"
                                class="form-control alma-form-control @error('nisn') is-invalid @enderror"
                                value="{{ old('nisn') }}"
                                placeholder="Masukkan NISN siswa"
                                required
                            >
                            @error('nisn')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="nama_siswa" class="form-label alma-form-label">
                                Nama Siswa
                            </label>
                            <input
                                type="text"
                                name="nama_siswa"
                                id="nama_siswa"
                                class="form-control alma-form-control @error('nama_siswa') is-invalid @enderror"
                                value="{{ old('nama_siswa') }}"
                                placeholder="Masukkan nama lengkap siswa"
                                required
                            >
                            @error('nama_siswa')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="jenis_kelamin" class="form-label alma-form-label">
                                Jenis Kelamin
                            </label>
                            <select
                                name="jenis_kelamin"
                                id="jenis_kelamin"
                                class="form-select alma-form-control @error('jenis_kelamin') is-invalid @enderror"
                                required
                            >
                                <option value="">-- Pilih Jenis Kelamin --</option>
                                <option value="Laki-Laki" {{ old('jenis_kelamin') == 'Laki-Laki' ? 'selected' : '' }}>
                                    Laki-Laki
                                </option>
                                <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>
                                    Perempuan
                                </option>
                            </select>
                            @error('jenis_kelamin')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="tahun_masuk" class="form-label alma-form-label">
                                Tahun Masuk
                            </label>
                            <input
                                type="number"
                                name="tahun_masuk"
                                id="tahun_masuk"
                                class="form-control alma-form-control @error('tahun_masuk') is-invalid @enderror"
                                value="{{ old('tahun_masuk') }}"
                                placeholder="Contoh: 2026"
                                min="2000"
                                max="2100"
                                required
                            >
                            @error('tahun_masuk')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <hr>

                        <div class="d-flex flex-wrap gap-2 justify-content-end">
                            <a href="{{ url('/siswa') }}" class="btn btn-alma-back">
                                <i class="mdi mdi-arrow-left me-1"></i>
                                Kembali
                            </a>

                            <button type="submit" class="btn btn-alma">
                                <i class="mdi mdi-content-save me-1"></i>
                                Simpan Data
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection
