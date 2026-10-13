@extends('admin.layout')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="fw-bold text-success">Tambah Data Guru</h3>
    <a href="{{ route('admin.guru.index') }}" class="btn btn-secondary">Kembali</a>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body p-4">
        <form action="{{ route('admin.guru.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label font-weight-bold">NIP</label>
                <input type="text" name="nip" class="form-control" placeholder="Nomor Induk Pegawai (Opsional)">
            </div>
            <div class="mb-3">
                <label class="form-label font-weight-bold">Nama Lengkap Guru</label>
                <input type="text" name="nama" class="form-control" placeholder="Contoh: Drs. Ahmad, M.Pd" required>
            </div>
            <div class="mb-3">
                <label class="form-label font-weight-bold">Mata Pelajaran</label>
                <input type="text" name="mata_pelajaran" class="form-control" placeholder="Contoh: Bahasa Indonesia" required>
            </div>
            <div class="mb-3">
                <label class="form-label font-weight-bold">Foto Guru</label>
                <input type="file" name="foto" class="form-control" accept="image/*">
            </div>
            <button type="submit" class="btn btn-success px-4">Simpan Data</button>
        </form>
    </div>
</div>
@endsection