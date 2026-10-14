@extends('admin')

@section('content')

<div class="container-fluid pt-4 px-4">

    <div class="bg-white rounded shadow-sm p-4">

        <div class="mb-4">

            <h4 class="fw-bold mb-1">
                Tambah Program
            </h4>

            <p class="text-muted mb-0">
                Tambahkan program sekolah baru.
            </p>

        </div>


        <form action="{{ route('admin.program.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
        <label class="form-label fw-semibold">Nama Program</label>
        <input
            type="text"
            name="judul"
            class="form-control"
            value="{{ old('judul') }}"
            required
        >
    </div>

    <div class="mb-3">
        <label class="form-label fw-semibold">Kategori</label>
        <input
            type="text"
            name="kategori"
            class="form-control"
            value="{{ old('kategori') }}"
            required
        >
    </div>

    {{-- FOTO PROGRAM --}}
    <div class="mb-3">
        <label class="form-label fw-semibold">Foto Program</label>
        <input
            type="file"
            name="foto"
            class="form-control"
            accept="image/jpeg,image/png,image/jpg,image/webp"
        >
        <small class="text-muted">
            Format: JPG, JPEG, PNG, atau WEBP. Maksimal 2 MB.
        </small>
    </div>

    <div class="mb-3">
        <label class="form-label fw-semibold">Deskripsi</label>
        <textarea
            name="deskripsi"
            class="form-control"
            rows="5"
        >{{ old('deskripsi') }}</textarea>
    </div>

    <button type="submit" class="btn btn-primary">
        <i class="fa fa-save me-1"></i> Simpan
    </button>

    <a href="{{ route('admin.program') }}" class="btn btn-secondary">
        Kembali
    </a>
</form>
    </div>

</div>

@endsection