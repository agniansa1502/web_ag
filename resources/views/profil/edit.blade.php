@extends('layouts.app')

@section('content')
<style>
    :root {
        --profil-hijau: #087443;
        --profil-hijau-muda: #0ca968;
        --profil-hijau-gelap: #064e32;
        --profil-emas: #f4c542;
    }

    .profil-page {
        padding-top: 25px;
        padding-bottom: 35px;
    }

    .profil-heading {
        color: var(--profil-hijau-gelap);
        font-weight: 800;
        margin-bottom: 5px;
    }

    .profil-subtitle {
        color: #718096;
        font-size: 14px;
        margin-bottom: 22px;
    }

    .profil-divider {
        height: 3px;
        background: var(--profil-emas);
        border: 0;
        border-radius: 5px;
        opacity: 1;
        margin-bottom: 25px;
    }

    .profil-card {
        border: none;
        border-radius: 16px;
        overflow: hidden;
        background: #fff;
        box-shadow: 0 5px 22px rgba(6, 78, 50, 0.08);
    }

    .profil-card-header {
        background: linear-gradient(
            135deg,
            var(--profil-hijau-gelap),
            var(--profil-hijau)
        );
        color: #fff;
        padding: 20px 25px;
        border-bottom: 4px solid var(--profil-emas);
    }

    .profil-card-header h5 {
        font-weight: 800;
        margin: 0;
    }

    .profil-card-header p {
        margin: 5px 0 0;
        font-size: 13px;
        opacity: .85;
    }

    .profil-card-body {
        padding: 28px;
    }

    .profil-label {
        color: var(--profil-hijau-gelap);
        font-weight: 700;
        margin-bottom: 8px;
    }

    .profil-input {
        border: 1px solid #dce8df;
        border-radius: 10px;
        padding: 11px 13px;
        transition: .2s ease;
    }

    .profil-input:focus {
        border-color: var(--profil-hijau-muda);
        box-shadow: 0 0 0 .2rem rgba(12, 169, 104, .12);
    }

    .profil-help {
        color: #718096;
        font-size: 12px;
        display: block;
        margin-top: 7px;
    }

    .profil-section-title {
        color: var(--profil-hijau);
        font-weight: 800;
        font-size: 15px;
        margin: 10px 0 18px;
        padding-bottom: 10px;
        border-bottom: 1px solid #e4eee7;
    }

    .profil-section-title i {
        color: #c49a13;
        margin-right: 8px;
    }

    .btn-profil {
        background: var(--profil-hijau);
        color: white;
        border: 1px solid var(--profil-hijau);
        border-radius: 9px;
        padding: 11px 20px;
        font-weight: 700;
        transition: .2s ease;
    }

    .btn-profil:hover {
        background: var(--profil-hijau-gelap);
        border-color: var(--profil-hijau-gelap);
        color: white;
        transform: translateY(-1px);
    }

    .btn-profil-back {
        background: #fff;
        color: var(--profil-hijau);
        border: 1px solid #cbded0;
        border-radius: 9px;
        padding: 11px 20px;
        font-weight: 700;
        text-decoration: none;
        transition: .2s ease;
    }

    .btn-profil-back:hover {
        background: #edf8f0;
        color: var(--profil-hijau-gelap);
    }

    .profil-alert {
        border-radius: 10px;
    }

    @media (max-width: 576px) {
        .profil-card-body {
            padding: 20px 16px;
        }

        .profil-card-header {
            padding: 18px;
        }

        .profil-actions {
            flex-direction: column-reverse;
            gap: 10px;
        }

        .profil-actions .btn {
            width: 100%;
            text-align: center;
        }
    }
</style>

<div class="container profil-page">

    <div class="mb-3">
        <h3 class="profil-heading">
            <i class="fas fa-school me-2"></i>
            Edit Profil Sekolah
        </h3>

        <p class="profil-subtitle">
            Perbarui informasi identitas dan profil MTs Al Muawanah.
        </p>
    </div>

    <hr class="profil-divider">

    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show profil-alert" role="alert">
            <strong>
                <i class="fas fa-exclamation-circle me-2"></i>
                Gagal Menyimpan!
            </strong>

            <ul class="mb-0 mt-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>

            <button type="button" class="btn-close"
                data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card profil-card">

        <div class="profil-card-header">
            <h5>
                <i class="fas fa-edit me-2"></i>
                Form Edit Profil
            </h5>
            <p>Lengkapi data sekolah dengan informasi yang benar.</p>
        </div>

        <div class="profil-card-body">

            <form action="{{ route('profil.update') }}"
                method="POST"
                enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <h6 class="profil-section-title">
                    <i class="fas fa-info-circle"></i>
                    Informasi Sekolah
                </h6>

                <div class="row">

                    <div class="col-md-6 mb-3">
                        <label class="form-label profil-label">
                            Nama Sekolah
                        </label>
                        <input type="text"
                            name="nama_sekolah"
                            class="form-control profil-input"
                            value="{{ old('nama_sekolah', $profil->nama_sekolah ?? '') }}"
                            placeholder="Masukkan nama sekolah"
                            required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label profil-label">
                            Kepala Sekolah
                        </label>
                        <input type="text"
                            name="kepala_sekolah"
                            class="form-control profil-input"
                            value="{{ old('kepala_sekolah', $profil->kepala_sekolah ?? '') }}"
                            placeholder="Masukkan nama kepala sekolah"
                            required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label profil-label">NPSN</label>
                        <input type="text"
                            name="npsn"
                            class="form-control profil-input"
                            value="{{ old('npsn', $profil->npsn ?? '') }}"
                            placeholder="Masukkan NPSN"
                            required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label profil-label">
                            Tahun Berdiri
                        </label>
                        <input type="number"
                            name="tahun_berdiri"
                            class="form-control profil-input"
                            value="{{ old('tahun_berdiri', $profil->tahun_berdiri ?? '') }}"
                            placeholder="Contoh: 1990"
                            min="1900"
                            max="{{ date('Y') }}"
                            required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label profil-label">
                            Kontak / Telepon
                        </label>
                        <input type="text"
                            name="kontak"
                            class="form-control profil-input"
                            value="{{ old('kontak', $profil->kontak ?? '') }}"
                            placeholder="Masukkan nomor telepon"
                            required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label profil-label">Alamat</label>
                        <input type="text"
                            name="alamat"
                            class="form-control profil-input"
                            value="{{ old('alamat', $profil->alamat ?? '') }}"
                            placeholder="Masukkan alamat sekolah"
                            required>
                    </div>

                </div>

                <h6 class="profil-section-title mt-4">
                    <i class="fas fa-images"></i>
                    Logo dan Foto Sekolah
                </h6>

                <div class="row">

                    <div class="col-md-6 mb-3">
                        <label class="form-label profil-label">
                            <i class="fas fa-image me-1"></i>
                            Logo Sekolah
                        </label>

                        <input type="file"
                            name="logo"
                            class="form-control profil-input"
                            accept=".png,.jpg,.jpeg">

                        <small class="profil-help">
                            Format PNG, JPG, atau JPEG. Kosongkan jika tidak diubah.
                        </small>

                        @if (!empty($profil->logo))
                            <div class="mt-3">
                                <small class="d-block text-muted mb-2">
                                    Logo saat ini:
                                </small>
                                <img
                                    src="{{ asset('uploads/profil/' . $profil->logo) }}"
                                    alt="Logo Sekolah"
                                    style="max-width:120px; max-height:120px; object-fit:contain; border:1px solid #e0e9e2; border-radius:10px; padding:8px;">
                            </div>
                        @endif
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label profil-label">
                            <i class="fas fa-building me-1"></i>
                            Foto Sekolah / Gedung
                        </label>

                        <input type="file"
                            name="foto"
                            class="form-control profil-input"
                            accept=".png,.jpg,.jpeg">

                        <small class="profil-help">
                            Format PNG, JPG, atau JPEG. Kosongkan jika tidak diubah.
                        </small>

                        @if (!empty($profil->foto))
                            <div class="mt-3">
                                <small class="d-block text-muted mb-2">
                                    Foto saat ini:
                                </small>
                                <img
                                    src="{{ asset('uploads/profil/' . $profil->foto) }}"
                                    alt="Foto Sekolah"
                                    style="max-width:180px; max-height:120px; object-fit:cover; border:1px solid #e0e9e2; border-radius:10px; padding:4px;">
                            </div>
                        @endif
                    </div>

                </div>

                <h6 class="profil-section-title mt-4">
                    <i class="fas fa-book-open"></i>
                    Visi, Misi dan Deskripsi
                </h6>

                <div class="row">

                    <div class="col-12 mb-3">
                        <label class="form-label profil-label">
                            Visi &amp; Misi
                        </label>
                        <textarea
                            name="visi_misi"
                            class="form-control profil-input"
                            rows="4"
                            placeholder="Masukkan visi dan misi sekolah"
                            required>{{ old('visi_misi', $profil->visi_misi ?? '') }}</textarea>
                    </div>

                    <div class="col-12 mb-3">
                        <label class="form-label profil-label">
                            Deskripsi Sekolah
                        </label>
                        <textarea
                            name="deskripsi"
                            class="form-control profil-input"
                            rows="4"
                            placeholder="Masukkan deskripsi sekolah"
                            required>{{ old('deskripsi', $profil->deskripsi ?? '') }}</textarea>
                    </div>

                </div>

                <div class="d-flex justify-content-between align-items-center mt-4 pt-3 border-top profil-actions">
                    <a href="{{ route('profil.index') }}"
                        class="btn btn-profil-back">
                        <i class="fas fa-arrow-left me-2"></i>
                        Kembali
                    </a>

                    <button type="submit" class="btn btn-profil">
                        <i class="fas fa-save me-2"></i>
                        Simpan Profil
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>
@endsection
