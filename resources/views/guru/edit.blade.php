@extends('layouts.app')

@section('content')

<style>
    :root {
        --hijau-utama: #087443;
        --hijau-muda: #0ca968;
        --hijau-gelap: #064e32;
        --emas: #f4c542;
    }

    .guru-wrapper {
        padding: 30px 0;
    }

    .guru-title {
        color: var(--hijau-gelap);
        font-weight: 800;
        margin-bottom: 5px;
    }

    .guru-subtitle {
        color: #718096;
        font-size: 14px;
    }

    .guru-card {
        border: none;
        border-radius: 18px;
        overflow: hidden;
        background: #fff;
        box-shadow: 0 8px 30px rgba(6, 78, 50, .09);
    }

    .guru-card-header {
        background: linear-gradient(
            135deg,
            var(--hijau-gelap),
            var(--hijau-utama)
        );
        color: white;
        padding: 22px 26px;
        border-bottom: 4px solid var(--emas);
    }

    .guru-card-header h5 {
        font-weight: 800;
        margin: 0;
    }

    .guru-card-body {
        padding: 28px;
    }

    .guru-label {
        color: var(--hijau-gelap);
        font-weight: 700;
        margin-bottom: 8px;
    }

    .guru-form-control {
        border: 1px solid #dce7e0;
        border-radius: 10px;
        padding: 11px 14px;
        transition: .2s ease;
    }

    .guru-form-control:focus {
        border-color: var(--hijau-muda);
        box-shadow: 0 0 0 .2rem rgba(12, 169, 104, .13);
    }

    .guru-foto-box {
        display: inline-block;
        padding: 6px;
        background: #f0faf4;
        border: 1px solid #dcebe0;
        border-radius: 13px;
        margin-top: 12px;
    }

    .guru-foto-preview {
        width: 115px;
        height: 125px;
        object-fit: cover;
        border-radius: 9px;
        display: block;
    }

    .guru-upload-info {
        background: #f0faf4;
        color: #47745a;
        border: 1px dashed #a5d6b8;
        border-radius: 10px;
        padding: 12px 14px;
        font-size: 13px;
        margin-top: 9px;
    }

    .guru-section-title {
        color: var(--hijau-utama);
        font-weight: 800;
        font-size: 15px;
        padding-bottom: 12px;
        border-bottom: 1px solid #e7efe9;
        margin-bottom: 22px;
    }

    .btn-guru-simpan {
        background: var(--hijau-utama);
        border: 1px solid var(--hijau-utama);
        color: white;
        border-radius: 10px;
        padding: 11px 22px;
        font-weight: 700;
        transition: .2s ease;
    }

    .btn-guru-simpan:hover {
        background: var(--hijau-gelap);
        border-color: var(--hijau-gelap);
        color: white;
        transform: translateY(-1px);
    }

    .btn-guru-batal {
        background: white;
        color: var(--hijau-utama);
        border: 1px solid var(--hijau-utama);
        border-radius: 10px;
        padding: 11px 22px;
        font-weight: 700;
        text-decoration: none;
        display: inline-block;
    }

    .btn-guru-batal:hover {
        background: #edf7f0;
        color: var(--hijau-gelap);
    }

    @media (max-width: 576px) {
        .guru-card-body {
            padding: 20px 16px;
        }

        .guru-card-header {
            padding: 18px;
        }
    }
</style>

<div class="container guru-wrapper">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-xl-7">

            {{-- Header halaman --}}
            <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">
                <div>
                    <h3 class="guru-title">
                        <i class="fas fa-user-edit me-2"></i>
                        Edit Data Guru
                    </h3>

                    <p class="guru-subtitle mb-0">
                        Perbarui informasi tenaga pendidik MTs Al Muawanah.
                    </p>
                </div>

                <a href="{{ route('guru.index') }}" class="btn-guru-batal">
                    <i class="fas fa-arrow-left me-1"></i>
                    Kembali
                </a>
            </div>

            {{-- Pesan validasi --}}
            @if ($errors->any())
                <div class="alert alert-danger rounded-3">
                    <strong>Data belum berhasil diperbarui.</strong>
                    <ul class="mb-0 mt-2">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="guru-card">

                <div class="guru-card-header">
                    <h5>
                        <i class="fas fa-chalkboard-teacher me-2"
                           style="color: #f4c542;"></i>
                        Formulir Edit Guru
                    </h5>
                </div>

                <div class="guru-card-body">

                    <form
                        action="{{ route('guru.update', \Illuminate\Support\Facades\Crypt::encrypt($guru->id_guru)) }}"
                        method="POST"
                        enctype="multipart/form-data"
                    >
                        @csrf
                        @method('PUT')

                        <div class="guru-section-title">
                            <i class="fas fa-id-card me-2"></i>
                            Informasi Tenaga Pendidik
                        </div>

                        {{-- NIP --}}
                        <div class="mb-4">
                            <label for="nip" class="form-label guru-label">
                                NIP
                            </label>

                            <input
                                type="text"
                                name="nip"
                                id="nip"
                                class="form-control guru-form-control @error('nip') is-invalid @enderror"
                                value="{{ old('nip', $guru->nip) }}"
                                placeholder="Masukkan NIP guru"
                            >

                            @error('nip')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- Nama guru --}}
                        <div class="mb-4">
                            <label for="nama_guru" class="form-label guru-label">
                                Nama Guru <span class="text-danger">*</span>
                            </label>

                            <input
                                type="text"
                                name="nama_guru"
                                id="nama_guru"
                                class="form-control guru-form-control @error('nama_guru') is-invalid @enderror"
                                value="{{ old('nama_guru', $guru->nama_guru) }}"
                                placeholder="Masukkan nama lengkap guru"
                                required
                            >

                            @error('nama_guru')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- Mata pelajaran --}}
                        <div class="mb-4">
                            <label for="mapel" class="form-label guru-label">
                                Mata Pelajaran <span class="text-danger">*</span>
                            </label>

                            <input
                                type="text"
                                name="mapel"
                                id="mapel"
                                class="form-control guru-form-control @error('mapel') is-invalid @enderror"
                                value="{{ old('mapel', $guru->mapel) }}"
                                placeholder="Contoh: Bahasa Indonesia"
                                required
                            >

                            @error('mapel')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- Foto guru --}}
                        <div class="mb-4">
                            <label for="foto" class="form-label guru-label">
                                Foto Guru
                            </label>

                            <input
                                type="file"
                                name="foto"
                                id="foto"
                                class="form-control guru-form-control @error('foto') is-invalid @enderror"
                                accept="image/jpeg,image/png,image/webp"
                            >

                            @error('foto')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                            <div class="guru-upload-info">
                                <i class="fas fa-info-circle me-2"></i>
                                Biarkan kosong jika tidak ingin mengganti foto.
                                Format yang disarankan: JPG, PNG, atau WEBP.
                            </div>

                            {{-- Foto saat ini --}}
                            @if($guru->foto)
                                <div class="mt-3">
                                    <label class="form-label guru-label d-block">
                                        Foto Saat Ini
                                    </label>

                                    <div class="guru-foto-box">
                                        <img
                                            src="{{ asset('uploads/guru/' . $guru->foto) }}"
                                            alt="Foto {{ $guru->nama_guru }}"
                                            class="guru-foto-preview"
                                            onerror="this.style.display='none'; this.nextElementSibling.style.display='block';"
                                        >

                                        <div class="text-muted small p-2"
                                             style="display:none;">
                                            Foto tidak ditemukan.
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>

                        {{-- Tombol aksi --}}
                        <div class="d-flex justify-content-end flex-wrap gap-2 pt-3 border-top">
                            <a href="{{ route('guru.index') }}" class="btn-guru-batal">
                                Batal
                            </a>

                            <button type="submit" class="btn-guru-simpan">
                                <i class="fas fa-save me-2"></i>
                                Update Data
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

@endsection
