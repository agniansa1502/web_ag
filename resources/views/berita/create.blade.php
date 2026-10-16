@extends('layouts.app')

@section('content')
<style>
    :root {
        --berita-hijau: #087443;
        --berita-hijau-muda: #0ca968;
        --berita-hijau-gelap: #064e32;
        --berita-emas: #f4c542;
    }

    .berita-page {
        padding-top: 25px;
        padding-bottom: 35px;
    }

    .berita-heading {
        color: var(--berita-hijau-gelap);
        font-weight: 800;
        margin-bottom: 5px;
    }

    .berita-subtitle {
        color: #718096;
        font-size: 14px;
        margin-bottom: 22px;
    }

    .berita-divider {
        height: 3px;
        background: var(--berita-emas);
        border: 0;
        border-radius: 5px;
        opacity: 1;
        margin-bottom: 25px;
    }

    .berita-card {
        border: none;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 5px 22px rgba(6, 78, 50, .08);
        background: #fff;
    }

    .berita-card-header {
        background: linear-gradient(
            135deg,
            var(--berita-hijau-gelap),
            var(--berita-hijau)
        );
        color: white;
        padding: 22px 25px;
        border-bottom: 4px solid var(--berita-emas);
    }

    .berita-card-header h5 {
        font-weight: 800;
        margin-bottom: 5px;
    }

    .berita-card-header p {
        margin-bottom: 0;
        font-size: 13px;
        opacity: .85;
    }

    .berita-card-body {
        padding: 28px;
    }

    .berita-label {
        color: var(--berita-hijau-gelap);
        font-weight: 700;
        margin-bottom: 8px;
    }

    .berita-input {
        border: 1px solid #dce8df;
        border-radius: 10px;
        padding: 11px 13px;
        transition: .2s ease;
    }

    .berita-input:focus {
        border-color: var(--berita-hijau-muda);
        box-shadow: 0 0 0 .2rem rgba(12, 169, 104, .12);
    }

    .berita-help {
        display: block;
        color: #718096;
        font-size: 12px;
        margin-top: 7px;
    }

    .btn-berita {
        background: var(--berita-hijau);
        color: white;
        border: 1px solid var(--berita-hijau);
        border-radius: 9px;
        padding: 11px 20px;
        font-weight: 700;
        transition: .2s ease;
    }

    .btn-berita:hover {
        background: var(--berita-hijau-gelap);
        border-color: var(--berita-hijau-gelap);
        color: white;
        transform: translateY(-1px);
    }

    .btn-berita-back {
        background: white;
        color: var(--berita-hijau);
        border: 1px solid #cbded0;
        border-radius: 9px;
        padding: 11px 20px;
        font-weight: 700;
        text-decoration: none;
        transition: .2s ease;
    }

    .btn-berita-back:hover {
        background: #edf8f0;
        color: var(--berita-hijau-gelap);
    }

    .berita-alert {
        border-radius: 10px;
    }

    @media (max-width: 576px) {
        .berita-card-body {
            padding: 20px 16px;
        }

        .berita-card-header {
            padding: 18px;
        }

        .berita-actions {
            flex-direction: column-reverse;
            gap: 10px;
        }

        .berita-actions .btn {
            width: 100%;
            text-align: center;
        }
    }
</style>

<div class="container berita-page">

    <div>
        <h3 class="berita-heading">
            <i class="fas fa-newspaper me-2"></i>
            Tambah Data Berita
        </h3>

        <p class="berita-subtitle">
            Tambahkan berita terbaru untuk website MTs Al Muawanah.
        </p>
    </div>

    <hr class="berita-divider">

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show berita-alert" role="alert">
            <i class="fas fa-check-circle me-2"></i>
            {{ session('success') }}

            <button type="button" class="btn-close"
                data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row justify-content-center">
        <div class="col-lg-10">

            <div class="card berita-card">

                <div class="berita-card-header">
                    <h5>
                        <i class="fas fa-pen-to-square me-2"></i>
                        Form Tambah Berita
                    </h5>
                    <p>Isi informasi berita dengan lengkap dan benar.</p>
                </div>

                <div class="berita-card-body">

                    <form action="{{ route('berita.store') }}"
                        method="POST"
                        enctype="multipart/form-data">

                        @csrf

                        <div class="mb-4">
                            <label class="form-label berita-label">
                                Judul Berita
                            </label>

                            <input
                                type="text"
                                name="judul"
                                class="form-control berita-input @error('judul') is-invalid @enderror"
                                value="{{ old('judul') }}"
                                maxlength="50"
                                placeholder="Masukkan judul berita"
                                required>

                            @error('judul')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label class="form-label berita-label">
                                    <i class="fas fa-calendar-alt me-1"></i>
                                    Tanggal
                                </label>

                                <input
                                    type="date"
                                    name="tanggal"
                                    class="form-control berita-input @error('tanggal') is-invalid @enderror"
                                    value="{{ old('tanggal', date('Y-m-d')) }}"
                                    required>

                                @error('tanggal')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-4">
                                <label class="form-label berita-label">
                                    <i class="fas fa-clipboard-check me-1"></i>
                                    Status Berita
                                </label>

                                <select
                                    name="status"
                                    class="form-select berita-input @error('status') is-invalid @enderror"
                                    required>

                                    <option value="">-- Pilih Status --</option>

                                    <option value="draf" {{ old('status') == 'draf' ? 'selected' : '' }}>
                                        Draf
                                    </option>

                                    <option value="publis" {{ old('status') == 'publis' ? 'selected' : '' }}>
                                        Publis
                                    </option>
                                </select>

                                @error('status')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label berita-label">
                                <i class="fas fa-image me-1"></i>
                                Gambar Berita
                                <span class="text-muted fw-normal">(Opsional)</span>
                            </label>

                            <input
                                type="file"
                                name="gambar"
                                class="form-control berita-input @error('gambar') is-invalid @enderror"
                                accept=".jpg,.jpeg,.png">

                            <small class="berita-help">
                                Pilih gambar JPG, JPEG, atau PNG. Boleh dikosongkan.
                            </small>

                            @error('gambar')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="form-label berita-label">
                                <i class="fas fa-align-left me-1"></i>
                                Isi Berita
                            </label>

                            <textarea
                                name="isi"
                                rows="7"
                                class="form-control berita-input @error('isi') is-invalid @enderror"
                                placeholder="Tuliskan isi berita di sini..."
                                required>{{ old('isi') }}</textarea>

                            @error('isi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between align-items-center mt-4 pt-3 border-top berita-actions">
                            <a href="{{ route('berita.index') }}"
                                class="btn btn-berita-back">
                                <i class="fas fa-arrow-left me-2"></i>
                                Batal
                            </a>

                            <button type="submit" class="btn btn-berita">
                                <i class="fas fa-save me-2"></i>
                                Simpan Berita
                            </button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection
