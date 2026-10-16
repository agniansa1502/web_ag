@extends('layouts.app')

@section('content')
<style>
    :root {
        --hijau-utama: #087443;
        --hijau-muda: #0ca968;
        --hijau-gelap: #064e32;
        --emas: #f4c542;
    }

    .galeri-wrapper {
        padding: 30px 0;
    }

    .galeri-title {
        color: var(--hijau-gelap);
        font-weight: 800;
        margin-bottom: 5px;
    }

    .galeri-subtitle {
        color: #718096;
        font-size: 14px;
    }

    .galeri-card {
        background: #fff;
        border: none;
        border-radius: 18px;
        overflow: hidden;
        box-shadow: 0 8px 30px rgba(6, 78, 50, 0.09);
    }

    .galeri-card-header {
        background: linear-gradient(
            135deg,
            var(--hijau-gelap),
            var(--hijau-utama)
        );
        color: white;
        padding: 20px 25px;
        border-bottom: 4px solid var(--emas);
    }

    .galeri-card-header h5 {
        margin: 0;
        font-weight: 700;
    }

    .galeri-card-body {
        padding: 28px;
    }

    .form-label {
        color: var(--hijau-gelap);
        font-weight: 700;
        margin-bottom: 8px;
    }

    .form-control,
    .form-select {
        border: 1px solid #dce7e0;
        border-radius: 10px;
        padding: 11px 14px;
        transition: all 0.2s ease;
    }

    .form-control:focus,
    .form-select:focus {
        border-color: var(--hijau-muda);
        box-shadow: 0 0 0 0.2rem rgba(12, 169, 104, 0.13);
    }

    textarea.form-control {
        resize: vertical;
    }

    .btn-hijau {
        background: var(--hijau-utama);
        border: 1px solid var(--hijau-utama);
        color: white;
        border-radius: 10px;
        padding: 11px 22px;
        font-weight: 700;
        transition: 0.2s;
    }

    .btn-hijau:hover {
        background: var(--hijau-gelap);
        border-color: var(--hijau-gelap);
        color: white;
        transform: translateY(-1px);
    }

    .btn-kembali {
        background: #fff;
        color: var(--hijau-utama);
        border: 1px solid var(--hijau-utama);
        border-radius: 10px;
        padding: 9px 17px;
        font-weight: 600;
        text-decoration: none;
    }

    .btn-kembali:hover {
        background: var(--hijau-utama);
        color: white;
    }

    .upload-info {
        background: #f0faf4;
        border: 1px dashed #a5d6b8;
        border-radius: 10px;
        padding: 12px 15px;
        color: #47745a;
        font-size: 13px;
        margin-top: 10px;
    }

    .form-section-title {
        color: var(--hijau-utama);
        font-size: 15px;
        font-weight: 800;
        padding-bottom: 10px;
        border-bottom: 1px solid #e7efe9;
        margin-bottom: 20px;
    }

    @media (max-width: 576px) {
        .galeri-card-body {
            padding: 20px 16px;
        }

        .galeri-card-header {
            padding: 18px;
        }
    }
</style>

<div class="container galeri-wrapper">
    <div class="row justify-content-center">
        <div class="col-lg-9 col-xl-8">

            {{-- Judul halaman --}}
            <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">
                <div>
                    <h3 class="galeri-title">Tambah Data Galeri</h3>
                    <p class="galeri-subtitle mb-0">
                        Tambahkan dokumentasi kegiatan MTs Al Muawanah.
                    </p>
                </div>

                <a href="{{ route('galeri.index') }}" class="btn-kembali">
                    <i class="fas fa-arrow-left me-2"></i>Kembali
                </a>
            </div>

            {{-- Notifikasi validasi --}}
            @if ($errors->any())
                <div class="alert alert-danger rounded-3">
                    <strong>Data belum berhasil disimpan.</strong>
                    <ul class="mb-0 mt-2">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="galeri-card">
                <div class="galeri-card-header">
                    <h5>
                        <i class="fas fa-images me-2" style="color: #f4c542;"></i>
                        Formulir Galeri Sekolah
                    </h5>
                </div>

                <div class="galeri-card-body">
                    <form action="{{ route('galeri.store') }}"
                          method="POST"
                          enctype="multipart/form-data">
                        @csrf

                        <div class="form-section-title">
                            <i class="fas fa-info-circle me-2"></i>
                            Informasi Galeri
                        </div>

                        {{-- Judul --}}
                        <div class="mb-4">
                            <label for="judul" class="form-label">
                                Judul Galeri <span class="text-danger">*</span>
                            </label>

                            <input
                                type="text"
                                name="judul"
                                id="judul"
                                class="form-control @error('judul') is-invalid @enderror"
                                value="{{ old('judul') }}"
                                placeholder="Contoh: Kegiatan Upacara Bendera"
                                maxlength="50"
                                required
                            >

                            @error('judul')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Kategori dan tanggal --}}
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label for="kategori" class="form-label">
                                    Kategori <span class="text-danger">*</span>
                                </label>

                                <select
                                    name="kategori"
                                    id="kategori"
                                    class="form-select @error('kategori') is-invalid @enderror"
                                    required
                                >
                                    <option value="" disabled
                                        {{ old('kategori') ? '' : 'selected' }}>
                                        -- Pilih Kategori --
                                    </option>

                                    <option value="Foto"
                                        {{ old('kategori') == 'Foto' ? 'selected' : '' }}>
                                        Foto
                                    </option>

                                    <option value="Video"
                                        {{ old('kategori') == 'Video' ? 'selected' : '' }}>
                                        Video
                                    </option>
                                </select>

                                @error('kategori')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-4">
                                <label for="tanggal" class="form-label">
                                    Tanggal <span class="text-danger">*</span>
                                </label>

                                <input
                                    type="date"
                                    name="tanggal"
                                    id="tanggal"
                                    class="form-control @error('tanggal') is-invalid @enderror"
                                    value="{{ old('tanggal', date('Y-m-d')) }}"
                                    required
                                >

                                @error('tanggal')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- Upload file --}}
                        <div class="mb-4">
                            <label for="file" class="form-label">
                                Upload Foto / Video <span class="text-danger">*</span>
                            </label>

                            <input
                                type="file"
                                name="file"
                                id="file"
                                class="form-control @error('file') is-invalid @enderror"
                                accept="image/jpeg,image/png,image/webp,video/mp4,video/x-matroska"
                                required
                            >

                            @error('file')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror

                            <div class="upload-info">
                                <i class="fas fa-cloud-upload-alt me-2"></i>
                                Format yang didukung: JPG, PNG, WEBP, MP4, dan MKV.
                                Ukuran maksimal 20 MB, sesuai validasi server.
                            </div>
                        </div>

                        {{-- Keterangan --}}
                        <div class="mb-4">
                            <label for="keteranngan" class="form-label">
                                Keterangan <span class="text-danger">*</span>
                            </label>

                            <textarea
                                name="keteranngan"
                                id="keteranngan"
                                rows="4"
                                class="form-control @error('keteranngan') is-invalid @enderror"
                                placeholder="Tuliskan keterangan atau deskripsi kegiatan..."
                                required
                            >{{ old('keteranngan') }}</textarea>

                            @error('keteranngan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Tombol --}}
                        <div class="d-flex flex-wrap justify-content-end gap-2 pt-3 border-top">
                            <a href="{{ route('galeri.index') }}"
                               class="btn btn-light border rounded-3 px-4 py-2">
                                Batal
                            </a>

                            <button type="submit" class="btn btn-hijau">
                                <i class="fas fa-save me-2"></i>
                                Simpan Galeri
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <p class="text-center text-muted small mt-4">
                <i class="fas fa-school me-1"></i>
                Panel Admin MTs Al Muawanah
            </p>

        </div>
    </div>
</div>
