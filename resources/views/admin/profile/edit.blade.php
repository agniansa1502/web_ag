@extends('admin')

@section('content')

<div class="container-fluid pt-4 px-4">

    <div class="bg-white rounded p-4 shadow-sm">

        {{-- HEADER --}}
        <div class="mb-4">
            <h3 class="fw-bold mb-1">
                Edit Profil Sekolah
            </h3>

            <p class="text-muted mb-0">
                Perbarui informasi profil sekolah.
            </p>
        </div>


        {{-- ERROR --}}
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


        {{-- FORM --}}
        <form
            action="{{ route('admin.profile.update', $profilSekolah->id) }}"
            method="POST"
            enctype="multipart/form-data"
        >

            @csrf
            @method('PUT')


            <div class="row">

                {{-- NAMA SEKOLAH --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">
                        Nama Sekolah
                    </label>

                    <input
                        type="text"
                        name="nama_sekolah"
                        class="form-control"
                        value="{{ old('nama_sekolah', $profilSekolah->nama_sekolah) }}"
                        required
                    >
                </div>


                {{-- NPSN --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">
                        NPSN
                    </label>

                    <input
                        type="text"
                        name="npsn"
                        class="form-control"
                        value="{{ old('npsn', $profilSekolah->npsn) }}"
                    >
                </div>


                {{-- STATUS SEKOLAH --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">
                        Status Sekolah
                    </label>

                    <select
                        name="status_sekolah"
                        class="form-select"
                    >
                        <option value="Negeri"
                            {{ old('status_sekolah', $profilSekolah->status_sekolah) == 'Negeri' ? 'selected' : '' }}>
                            Negeri
                        </option>

                        <option value="Swasta"
                            {{ old('status_sekolah', $profilSekolah->status_sekolah) == 'Swasta' ? 'selected' : '' }}>
                            Swasta
                        </option>
                    </select>
                </div>


                {{-- AKREDITASI --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">
                        Akreditasi
                    </label>

                    <select
                        name="akreditasi"
                        class="form-select"
                    >
                        <option value="A"
                            {{ old('akreditasi', $profilSekolah->akreditasi) == 'A' ? 'selected' : '' }}>
                            A
                        </option>

                        <option value="B"
                            {{ old('akreditasi', $profilSekolah->akreditasi) == 'B' ? 'selected' : '' }}>
                            B
                        </option>

                        <option value="C"
                            {{ old('akreditasi', $profilSekolah->akreditasi) == 'C' ? 'selected' : '' }}>
                            C
                        </option>
                    </select>
                </div>


                {{-- KEPALA SEKOLAH --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">
                        Kepala Sekolah
                    </label>

                    <input
                        type="text"
                        name="kepala_sekolah"
                        class="form-control"
                        value="{{ old('kepala_sekolah', $profilSekolah->kepala_sekolah) }}"
                    >
                </div>


                {{-- EMAIL --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">
                        Email
                    </label>

                    <input
                        type="email"
                        name="email"
                        class="form-control"
                        value="{{ old('email', $profilSekolah->email) }}"
                    >
                </div>


                {{-- TELEPON --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">
                        Telepon
                    </label>

                    <input
                        type="text"
                        name="telepon"
                        class="form-control"
                        value="{{ old('telepon', $profilSekolah->telepon) }}"
                    >
                </div>


                {{-- TAHUN BERDIRI --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">
                        Tahun Berdiri
                    </label>

                    <input
                        type="number"
                        name="tahun_berdiri"
                        class="form-control"
                        value="{{ old('tahun_berdiri', $profilSekolah->tahun_berdiri) }}"
                    >
                </div>


                {{-- ALAMAT --}}
                <div class="col-12 mb-3">
                    <label class="form-label fw-semibold">
                        Alamat
                    </label>

                    <textarea
                        name="alamat"
                        class="form-control"
                        rows="3"
                    >{{ old('alamat', $profilSekolah->alamat) }}</textarea>
                </div>


                {{-- VISI --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">
                        Visi Sekolah
                    </label>

                    <textarea
                        name="visi"
                        class="form-control"
                        rows="6"
                    >{{ old('visi', $profilSekolah->visi) }}</textarea>
                </div>


                {{-- MISI --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">
                        Misi Sekolah
                    </label>

                    <textarea
                        name="misi"
                        class="form-control"
                        rows="6"
                    >{{ old('misi', $profilSekolah->misi) }}</textarea>
                </div>


                {{-- SEJARAH --}}
                <div class="col-12 mb-4">
                    <label class="form-label fw-semibold">
                        Sejarah Sekolah
                    </label>

                    <textarea
                        name="sejarah"
                        class="form-control"
                        rows="10"
                    >{{ old('sejarah', $profilSekolah->sejarah) }}</textarea>
                </div>


                {{-- FOTO SEKOLAH --}}
                <div class="col-md-6 mb-4">

                    <label class="form-label fw-semibold">
                        Foto Sekolah
                    </label>

                    <input
                        type="file"
                        name="foto"
                        class="form-control"
                        accept="image/*"
                    >

                    <small class="text-muted">
                        Format JPG, JPEG, PNG, WEBP. Maksimal 2 MB.
                    </small>

                    @if($profilSekolah->foto)

                        <div class="mt-3">

                            <p class="fw-semibold mb-2">
                                Foto Saat Ini:
                            </p>

                            <img
                                src="{{ asset('storage/' . $profilSekolah->foto) }}"
                                alt="Foto Sekolah"
                                width="250"
                                class="rounded shadow-sm"
                            >

                        </div>

                    @endif

                </div>


                {{-- LOGO SEKOLAH --}}
                <div class="col-md-6 mb-4">

                    <label class="form-label fw-semibold">
                        Logo Sekolah
                    </label>

                    <input
                        type="file"
                        name="logo"
                        class="form-control"
                        accept="image/*"
                    >

                    <small class="text-muted">
                        Format JPG, JPEG, PNG, WEBP. Maksimal 2 MB.
                    </small>

                    @if($profilSekolah->logo)

                        <div class="mt-3">

                            <p class="fw-semibold mb-2">
                                Logo Saat Ini:
                            </p>

                            <img
                                src="{{ asset('storage/' . $profilSekolah->logo) }}"
                                alt="Logo Sekolah"
                                width="150"
                                class="rounded shadow-sm"
                            >

                        </div>

                    @endif

                </div>

            </div>


            {{-- BUTTON --}}
            <div class="d-flex gap-2 mt-3">

                <a
                    href="{{ route('admin.profile') }}"
                    class="btn btn-secondary"
                >
                    <i class="fa fa-arrow-left me-1"></i>
                    Kembali
                </a>

                <button
                    type="submit"
                    class="btn btn-primary"
                >
                    <i class="fa fa-save me-1"></i>
                    Simpan Perubahan
                </button>

            </div>

        </form>

    </div>

</div>

@endsection
