@extends('layouts.app')

@section('title', 'Edit Data Galeri - MTs Al Muawanah')

@section('content')

<style>
    .alma-galeri {
        --green: #087443;
        --dark-green: #075c36;
        --light-green: #eaf7ef;
        --gold: #f4c542;
    }

    .alma-galeri .page-header {
        background: linear-gradient(135deg, #064e32, #0ca968);
        color: #fff;
        padding: 24px;
        border-radius: 16px;
        border-bottom: 4px solid var(--gold);
    }

    .alma-galeri .form-card {
        border: 0;
        border-radius: 18px;
        overflow: hidden;
    }

    .alma-galeri .form-label {
        color: var(--dark-green);
    }

    .alma-galeri .form-control:focus,
    .alma-galeri .form-select:focus {
        border-color: var(--green);
        box-shadow: 0 0 0 .2rem rgba(8, 116, 67, .12);
    }

    .alma-galeri .btn-alma {
        background: var(--green);
        border: 1px solid var(--green);
        color: #fff;
        border-radius: 10px;
        transition: .2s;
    }

    .alma-galeri .btn-alma:hover {
        background: var(--dark-green);
        border-color: var(--dark-green);
        color: #fff;
    }

    .alma-galeri .btn-back {
        background: #fff;
        color: var(--dark-green);
        border: 1px solid #fff;
        border-radius: 10px;
    }

    .alma-galeri .btn-back:hover {
        background: var(--light-green);
        color: var(--dark-green);
    }

    .alma-galeri .preview-box {
        background: var(--light-green);
        border: 1px dashed #a5cbb4;
        border-radius: 12px;
        padding: 16px;
    }
</style>

<div class="alma-galeri container-fluid py-4">
    <div class="row justify-content-center">
        <div class="col-xl-8 col-lg-10">

            {{-- HEADER --}}
            <div class="page-header mb-4 shadow-sm">
                <div class="d-flex flex-wrap justify-content-between align-items-center gap-3">
                    <div>
                        <span class="badge rounded-pill mb-2"
                              style="background:#f4c542;color:#075c36">
                            MTs AL MUAWANAH
                        </span>

                        <h3 class="fw-bold mb-1">
                            <i class="fa-solid fa-images me-2"></i>
                            Edit Data Galeri
                        </h3>

                        <p class="mb-0 opacity-75">
                            Perbarui dokumentasi kegiatan madrasah.
                        </p>
                    </div>

                    <a href="{{ route('galeri.index') }}" class="btn btn-back px-3">
                        <i class="fa-solid fa-arrow-left me-1"></i>
                        Kembali
                    </a>
                </div>
            </div>

            {{-- FORM --}}
            <div class="card form-card shadow-sm">
                <div class="card-body p-4 p-md-5">

                    @if ($errors->any())
                        <div class="alert alert-danger rounded-3">
                            <strong>Periksa kembali data berikut:</strong>
                            <ul class="mb-0 mt-2">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('galeri.update', Crypt::encrypt($galeri->id_galeri)) }}"
                          method="POST"
                          enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        {{-- JUDUL --}}
                        <div class="mb-4">
                            <label for="judul" class="form-label fw-bold">
                                <i class="fa-solid fa-heading me-1"></i>
                                Judul Galeri
                            </label>

                            <input type="text"
                                   name="judul"
                                   id="judul"
                                   class="form-control @error('judul') is-invalid @enderror"
                                   value="{{ old('judul', $galeri->judul) }}"
                                   maxlength="50"
                                   placeholder="Masukkan judul galeri"
                                   required>

                            @error('judul')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            {{-- KATEGORI --}}
                            <div class="col-md-6 mb-4">
                                <label for="kategori" class="form-label fw-bold">
                                    <i class="fa-solid fa-list me-1"></i>
                                    Kategori
                                </label>

                                <select name="kategori"
                                        id="kategori"
                                        class="form-select @error('kategori') is-invalid @enderror"
                                        required>
                                    <option value="Foto"
                                        {{ old('kategori', $galeri->kategori) == 'Foto' ? 'selected' : '' }}>
                                        Foto
                                    </option>

                                    <option value="Video"
                                        {{ old('kategori', $galeri->kategori) == 'Video' ? 'selected' : '' }}>
                                        Video
                                    </option>
                                </select>

                                @error('kategori')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- TANGGAL --}}
                            <div class="col-md-6 mb-4">
                                <label for="tanggal" class="form-label fw-bold">
                                    <i class="fa-solid fa-calendar-days me-1"></i>
                                    Tanggal
                                </label>

                                <input type="date"
                                       name="tanggal"
                                       id="tanggal"
                                       class="form-control @error('tanggal') is-invalid @enderror"
                                       value="{{ old('tanggal', $galeri->tanggal ? \Carbon\Carbon::parse($galeri->tanggal)->format('Y-m-d') : '') }}"
                                       required>

                                @error('tanggal')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- FILE SAAT INI --}}
                        <div class="mb-4">
                            <label class="form-label fw-bold">
                                <i class="fa-solid fa-eye me-1"></i>
                                File Saat Ini
                            </label>

                            <div class="preview-box mb-3">
                                @if ($galeri->file && file_exists(public_path('uploads/galeri/' . $galeri->file)))
                                    @php
                                        $ekstensi = strtolower(pathinfo($galeri->file, PATHINFO_EXTENSION));
                                        $isVideo = in_array($ekstensi, ['mp4', 'mkv', 'avi', 'mov', 'webm']);
                                    @endphp

                                    @if ($isVideo || $galeri->kategori == 'Video')
                                        <video width="100%"
                                               style="max-width:420px;max-height:280px"
                                               controls
                                               class="rounded border">
                                            <source src="{{ asset('uploads/galeri/' . $galeri->file) }}">
                                            Browser kamu tidak mendukung pemutar video.
                                        </video>
                                    @else
                                        <img src="{{ asset('uploads/galeri/' . $galeri->file) }}"
                                             alt="{{ $galeri->judul }}"
                                             class="img-fluid rounded-3 border"
                                             style="max-width:320px;max-height:260px;object-fit:contain;background:#fff">
                                    @endif
                                @else
                                    <p class="text-muted mb-0">
                                        <i class="fa-solid fa-circle-info me-1"></i>
                                        Tidak ada file yang dapat ditampilkan.
                                    </p>
                                @endif
                            </div>

                            <label for="file" class="form-label fw-bold">
                                Ganti File (Opsional)
                            </label>

                            <input type="file"
                                   name="file"
                                   id="file"
                                   class="form-control @error('file') is-invalid @enderror"
                                   accept="image/*,video/*">

                            <small class="text-muted d-block mt-2">
                                Biarkan kosong jika tidak ingin mengganti file saat ini.
                            </small>

                            @error('file')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- KETERANGAN --}}
                        <div class="mb-4">
                            <label for="keteranngan" class="form-label fw-bold">
                                <i class="fa-solid fa-align-left me-1"></i>
                                Keterangan
                            </label>

                            <textarea name="keteranngan"
                                      id="keteranngan"
                                      rows="4"
                                      class="form-control @error('keteranngan') is-invalid @enderror"
                                      placeholder="Masukkan keterangan kegiatan"
                                      required>{{ old('keteranngan', $galeri->keteranngan) }}</textarea>

                            @error('keteranngan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- TOMBOL --}}
                        <div class="d-flex justify-content-end flex-wrap gap-2 pt-3 border-top">
                            <a href="{{ route('galeri.index') }}"
                               class="btn btn-outline-secondary px-4 rounded-3">
                                Batal
                            </a>

                            <button type="submit" class="btn btn-alma px-4">
                                <i class="fa-solid fa-floppy-disk me-2"></i>
                                Update Galeri
                            </button>
                        </div>

                    </form>
                </div>
            </div>

            <p class="text-center text-muted small mt-3">
                &copy; {{ date('Y') }} MTs Al Muawanah
            </p>

        </div>
    </div>
</div>

@endsection
