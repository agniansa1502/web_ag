@extends('admin')

@section('content')

<div class="container-fluid pt-4 px-4">

    <div class="bg-white rounded shadow-sm p-4">

        {{-- Header --}}
        <div class="mb-4">
            <h4 class="fw-bold mb-1">
                Tambah Ekstrakurikuler
            </h4>

            <p class="text-muted mb-0">
                Tambahkan data ekstrakurikuler sekolah
            </p>
        </div>

        {{-- Pesan Error --}}
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

        {{-- Form --}}
        <form action="{{ route('admin.ekskul.store') }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf

            {{-- Nama Ekstrakurikuler --}}
            <div class="mb-3">
                <label class="form-label fw-semibold">
                    Nama Ekstrakurikuler
                </label>

                <input type="text"
                       name="nama_ekskul"
                       class="form-control @error('nama_ekskul') is-invalid @enderror"
                       value="{{ old('nama_ekskul') }}"
                       required>

                @error('nama_ekskul')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- Pembina --}}
            <div class="mb-3">
                <label class="form-label fw-semibold">
                    Pembina
                </label>

                <input type="text"
                       name="pembina"
                       class="form-control @error('pembina') is-invalid @enderror"
                       value="{{ old('pembina') }}"
                      
                       required>

                @error('pembina')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- Jadwal Latihan --}}
            <div class="mb-3">
                <label class="form-label fw-semibold">
                    Jadwal Latihan
                </label>

                <input type="text"
                       name="jadwal_latihan"
                       class="form-control @error('jadwal_latihan') is-invalid @enderror"
                       value="{{ old('jadwal_latihan') }}"
                       
                       required>

                @error('jadwal_latihan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- Deskripsi --}}
            <div class="mb-3">
                <label class="form-label fw-semibold">
                    Deskripsi
                </label>

                <textarea name="deskripsi"
                          rows="5"
                          class="form-control @error('deskripsi') is-invalid @enderror"
                          
                          required>{{ old('deskripsi') }}</textarea>

                @error('deskripsi')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- Gambar --}}
            <div class="mb-4">
                <label class="form-label fw-semibold">
                    Gambar
                </label>

                <input type="file"
                       name="gambar"
                       class="form-control @error('gambar') is-invalid @enderror"
                       accept="image/jpeg,image/jpg,image/png">

                <small class="text-muted">
                    Format JPG, JPEG, PNG. Maksimal 2 MB.
                </small>

                @error('gambar')
                    <div class="text-danger mt-1">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- Tombol --}}
            <a href="{{ route('admin.ekskul') }}"
               class="btn btn-secondary">
                <i class="fa fa-arrow-left me-1"></i>
                Kembali
            </a>

            <button type="submit"
                    class="btn btn-primary">
                <i class="fa fa-save me-1"></i>
                Simpan
            </button>

        </form>

    </div>

</div>

@endsection
