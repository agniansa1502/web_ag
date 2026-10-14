
@extends('admin')

@section('content')

<div class="container-fluid pt-4 px-4">
    <div class="bg-white rounded shadow-sm p-4">

        <h4 class="mb-4">Edit Data Guru</h4>

        {{-- Notifikasi error --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Form Edit Guru --}}
        <form
            action="{{ route('admin.guru.update', $guru->encrypted_id) }}"
            method="POST"
            enctype="multipart/form-data"
        >
            @csrf
            @method('PUT')

            <div class="row g-3">

                {{-- Nama Guru --}}
                <div class="col-md-6">
                    <label class="form-label">Nama Guru</label>
                    <input
                        type="text"
                        name="nama_guru"
                        class="form-control"
                        value="{{ old('nama_guru', $guru->nama_guru) }}"
                        required
                    >
                </div>

                {{-- NIP --}}
                <div class="col-md-6">
                    <label class="form-label">NIP</label>
                    <input
                        type="text"
                        name="nip"
                        class="form-control"
                        value="{{ old('nip', $guru->nip) }}"
                        required
                    >
                </div>

                {{-- Mata Pelajaran --}}
                <div class="col-md-6">
                    <label class="form-label">Mata Pelajaran</label>
                    <input
                        type="text"
                        name="mata_pelajaran"
                        class="form-control"
                        value="{{ old('mata_pelajaran', $guru->mata_pelajaran) }}"
                        required
                    >
                </div>

                {{-- Jabatan --}}
                <div class="col-md-6">
                    <label class="form-label">Jabatan</label>
                    <input
                        type="text"
                        name="jabatan"
                        class="form-control"
                        value="{{ old('jabatan', $guru->jabatan) }}"
                        required
                    >
                </div>

                {{-- Foto Guru --}}
                <div class="col-md-6">
                    <label class="form-label">Foto Guru</label>

                    <div class="mb-3">
                        @if ($guru->foto && \Illuminate\Support\Facades\Storage::disk('public')->exists($guru->foto))
                            <img
                                src="{{ asset('storage/' . $guru->foto) }}"
                                alt="Foto {{ $guru->nama_guru }}"
                                width="150"
                                height="150"
                                style="object-fit: cover; border-radius: 12px;"
                            >
                        @else
                            <div
                                class="d-flex align-items-center justify-content-center bg-light border rounded"
                                style="width: 150px; height: 150px;"
                            >
                                <i class="fa fa-user fa-4x text-secondary"></i>
                            </div>

                            <small class="text-muted d-block mt-2">
                                Belum ada foto yang diunggah.
                            </small>
                        @endif
                    </div>

                    <input
                        type="file"
                        name="foto"
                        id="foto"
                        class="form-control"
                        accept=".jpg,.jpeg,.png,.webp"
                    >

                    <small class="text-muted">
                        Format JPG, JPEG, PNG, atau WEBP. Maksimal 2 MB.
                        Kosongkan jika tidak ingin mengganti foto.
                    </small>
                </div>

            </div>

            {{-- Tombol --}}
            <div class="mt-4">
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-save me-1"></i>
                    Simpan Perubahan
                </button>

                <a href="{{ route('admin.guru') }}" class="btn btn-secondary">
                    Kembali
                </a>
            </div>

        </form>

    </div>
</div>

@endsection