@extends('admin.layout')

@section('title', 'Tambah Siswa')
@section('page-title', 'Tambah Data Siswa')

@section('content')
<div class="admin-card">
    <h4 class="mb-4">Tambah Data Siswa</h4>
    <form action="{{ route('admin.siswa.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">NISN</label>
            <input type="text" name="nisn" class="form-control" maxlength="10" value="{{ old('nisn') }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Nama Siswa</label>
            <input type="text" name="nama_siswa" class="form-control" maxlength="40" value="{{ old('nama_siswa') }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Jenis Kelamin</label>
            <select name="jenis_kelamin" class="form-select" required>
                <option value="">-- Pilih --</option>
                <option value="Laki-Laki" {{ old('jenis_kelamin') == 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki</option>
                <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Tahun Masuk</label>
            <input type="number" name="tahun_masuk" class="form-control" min="2000" max="2099" value="{{ old('tahun_masuk', date('Y')) }}" required>
        </div>
        <div class="d-flex gap-2 mt-4">
            <a href="{{ route('admin.siswa.index') }}" class="btn btn-secondary">Kembali</a>
            <button type="submit" class="btn btn-success">Simpan</button>
        </div>
    </form>
</div>
@endsection