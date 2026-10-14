@extends('admin')

@section('content')

<div class="container-fluid">

    <div class="mb-4">
        <h2 class="fw-bold">Edit Foto</h2>
        <p class="text-muted">
            Ubah informasi foto galeri.
        </p>
    </div>

    <div class="card shadow-sm">

        <div class="card-body">

            <form
                action="{{ route('admin.galeri.update', $galeri->encrypted_id) }}"
                method="POST"
                enctype="multipart/form-data"
            >

                @csrf
                @method('PUT')

                {{-- Judul --}}
                <div class="mb-3">

                    <label class="form-label">
                        Judul Foto
                    </label>

                    <input
                        type="text"
                        name="judul"
                        class="form-control @error('judul') is-invalid @enderror"
                        value="{{ old('judul', $galeri->judul) }}"
                    >

                    @error('judul')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                {{-- Deskripsi --}}
                <div class="mb-3">

                    <label class="form-label">
                        Deskripsi
                    </label>

                    <textarea
                        name="deskripsi"
                        rows="4"
                        class="form-control"
                    >{{ old('deskripsi', $galeri->deskripsi) }}</textarea>

                </div>

                {{-- Foto Lama --}}
                <div class="mb-3">

                    <label class="form-label d-block">
                        Foto Saat Ini
                    </label>

                    <img
                        src="{{ asset('storage/' . $galeri->foto) }}"
                        style="width: 250px; height: 160px; object-fit: cover;"
                        class="rounded mb-3"
                    >

                </div>

                {{-- Foto Baru --}}
                <div class="mb-4">

                    <label class="form-label">
                        Ganti Foto
                    </label>

                    <input
                        type="file"
                        name="foto"
                        class="form-control"
                        accept="image/*"
                    >

                    <small class="text-muted">
                        Kosongkan jika tidak ingin mengganti foto.
                    </small>

                </div>

                <a
                    href="{{ route('admin.galeri') }}"
                    class="btn btn-secondary"
                >
                    Kembali
                </a>

                <button
                    type="submit"
                    class="btn btn-primary"
                >
                    <i class="fas fa-save"></i>
                    Simpan Perubahan
                </button>

            </form>

        </div>

    </div>

</div>

@endsection