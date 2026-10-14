@extends('admin')

@section('content')

<div class="container-fluid pt-4 px-4">

    {{-- Card utama --}}
    <div class="bg-white rounded-4 shadow-sm border overflow-hidden">

        {{-- Header --}}
        <div class="p-4"
             style="background: linear-gradient(135deg, #f0f8ff, #ffffff); border-bottom: 1px solid #e5eef7;">

            <div class="d-flex align-items-center">

                <div class="d-flex align-items-center justify-content-center rounded-circle me-3"
                     style="width: 48px; height: 48px; background-color: #e8f4ff;">
                    <i class="fa fa-user-plus"
                       style="font-size: 20px; color: #0d8bf2;"></i>
                </div>

                <div>
                    <h4 class="mb-1 fw-bold" style="color: #172033;">
                        Tambah Data Guru
                    </h4>
                    <p class="mb-0 text-muted">
                        Tambahkan data guru baru ke dalam sistem.
                    </p>
                </div>

            </div>
        </div>

        {{-- Isi Form --}}
        <div class="p-4 p-md-5">

            {{-- Error Validasi --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Terjadi kesalahan!</strong>
                    <ul class="mb-0 mt-2">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Form Tambah Guru --}}
            <form action="{{ route('admin.guru.store') }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf

                <div class="row g-4">

                    {{-- Nama Guru --}}
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">
                            Nama Guru
                        </label>

                        <div class="input-group">
                            <span class="input-group-text bg-white"
                                  style="border-color: #d8e5f0;">
                                <i class="fa fa-user"
                                   style="color: #3978a8;"></i>
                            </span>

                            <input type="text"
                                   name="nama_guru"
                                   value="{{ old('nama_guru') }}"
                                   class="form-control"
                                   style="height: 50px; border-color: #d8e5f0;"
                                   required>
                        </div>
                    </div>

                    {{-- NIP --}}
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">
                            NIP
                        </label>

                        <div class="input-group">
                            <span class="input-group-text bg-white"
                                  style="border-color: #d8e5f0;">
                                <i class="fa fa-id-card"
                                   style="color: #3978a8;"></i>
                            </span>

                            <input type="text"
                                   name="nip"
                                   value="{{ old('nip') }}"
                                   class="form-control"
                                   style="height: 50px; border-color: #d8e5f0;"
                                   required>
                        </div>
                    </div>

                    {{-- Mata Pelajaran --}}
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">
                            Mata Pelajaran
                        </label>

                        <div class="input-group">
                            <span class="input-group-text bg-white"
                                  style="border-color: #d8e5f0;">
                                <i class="fa fa-book"
                                   style="color: #3978a8;"></i>
                            </span>

                            <input type="text"
                                   name="mata_pelajaran"
                                   value="{{ old('mata_pelajaran') }}"
                                   class="form-control"
                                   style="height: 50px; border-color: #d8e5f0;"
                                   required>
                        </div>
                    </div>

                    {{-- Jabatan --}}
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">
                            Jabatan
                        </label>

                        <div class="input-group">
                            <span class="input-group-text bg-white"
                                  style="border-color: #d8e5f0;">
                                <i class="fa fa-briefcase"
                                   style="color: #3978a8;"></i>
                            </span>

                            <input type="text"
                                   name="jabatan"
                                   value="{{ old('jabatan') }}"
                                   class="form-control"
                                   style="height: 50px; border-color: #d8e5f0;"
                                   required>
                        </div>
                    </div>

                    {{-- Foto Guru --}}
                    <div class="col-12">
                        <label class="form-label fw-semibold">
                            Foto Guru
                        </label>

                        <div class="input-group">
                            <span class="input-group-text bg-white"
                                  style="border-color: #d8e5f0;">
                                <i class="fa fa-camera"
                                   style="color: #3978a8;"></i>
                            </span>

                            <input type="file"
                                   name="foto"
                                   id="foto"
                                   class="form-control"
                                   accept=".jpg,.jpeg,.png,.webp"
                                   style="height: 50px; border-color: #d8e5f0;">
                        </div>

                        <small class="text-muted">
                            Format JPG, JPEG, PNG, atau WEBP. Maksimal 2 MB.
                        </small>

                        {{-- Pratinjau Foto --}}
                        <div class="mt-3">
                            <img id="preview-foto"
                                 src="#"
                                 alt="Pratinjau Foto Guru"
                                 style="display: none; width: 120px; height: 120px; object-fit: cover; border-radius: 12px; border: 1px solid #d8e5f0;">
                        </div>
                    </div>

                </div>

                {{-- Tombol --}}
                <div class="mt-5 d-flex flex-wrap gap-2">

                    <button type="submit"
                            class="btn px-4 py-2 text-white"
                            style="background-color: #0d8bf2; border-radius: 8px;">
                        <i class="fa fa-save me-2"></i>
                        Simpan Data Guru
                    </button>

                    <a href="{{ route('admin.guru') }}"
                       class="btn px-4 py-2"
                       style="background-color: #f1f5f9; color: #26374a; border-radius: 8px;">
                        <i class="fa fa-arrow-left me-2"></i>
                        Kembali
                    </a>

                </div>

            </form>

        </div>
    </div>
</div>

{{-- Pratinjau Foto Sebelum Disimpan --}}
<script>
    document.getElementById('foto').addEventListener('change', function (event) {
        const file = event.target.files[0];
        const preview = document.getElementById('preview-foto');

        if (file && file.type.startsWith('image/')) {
            preview.src = URL.createObjectURL(file);
            preview.style.display = 'block';
        } else {
            preview.removeAttribute('src');
            preview.style.display = 'none';
        }
    });
</script>

@endsection

