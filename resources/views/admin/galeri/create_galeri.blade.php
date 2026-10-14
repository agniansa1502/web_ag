@extends('admin')

@section('content')

<div class="container-fluid">

    {{-- Judul Halaman --}}
    <div class="mb-4">
        <h2 class="fw-bold">Tambah Foto</h2>

        <p class="text-muted mb-0">
            Tambahkan dokumentasi kegiatan sekolah.
        </p>
    </div>


    {{-- Card Form --}}
    <div class="card shadow-sm border-0">

        <div class="card-body p-4">

            <form
                action="{{ route('admin.galeri.store') }}"
                method="POST"
                enctype="multipart/form-data"
            >

                @csrf


                {{-- =========================
                    JUDUL FOTO
                ========================== --}}
                <div class="mb-3">

                    <label for="judul" class="form-label fw-semibold">
                        Judul Foto
                    </label>

                    <input
                        type="text"
                        id="judul"
                        name="judul"
                        class="form-control @error('judul') is-invalid @enderror"
                        value="{{ old('judul') }}"
                       
                        required
                    >

                    @error('judul')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                {{-- =========================
                    DESKRIPSI
                ========================== --}}
                <div class="mb-3">

                    <label for="deskripsi" class="form-label fw-semibold">
                        Deskripsi
                    </label>

                    <textarea
                        id="deskripsi"
                        name="deskripsi"
                        rows="4"
                        class="form-control @error('deskripsi') is-invalid @enderror"
                        
                    >{{ old('deskripsi') }}</textarea>

                    @error('deskripsi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                {{-- =========================
                    FOTO
                ========================== --}}
                <div class="mb-4">

                    <label for="foto" class="form-label fw-semibold">
                        Foto
                    </label>

                    <input
                        type="file"
                        id="foto"
                        name="foto"
                        class="form-control @error('foto') is-invalid @enderror"
                        accept=".jpg,.jpeg,.png,.webp"
                        required
                    >

                    <small class="text-muted">
                        Format JPG, JPEG, PNG, WEBP. Maksimal 2 MB.
                    </small>

                    @error('foto')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                {{-- =========================
                    TOMBOL
                ========================== --}}

                <a
                    href="{{ route('admin.galeri') }}"
                    class="btn btn-secondary"
                >
                    <i class="fas fa-arrow-left me-1"></i>
                    Kembali
                </a>


                <button
                    type="submit"
                    class="btn btn-primary"
                >
                    <i class="fas fa-save me-1"></i>
                    Simpan
                </button>

            </form>

        </div>

    </div>

</div>

@endsection