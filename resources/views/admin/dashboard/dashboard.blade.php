@extends('admin')

@section('content')

<div class="container-fluid pt-4 px-4">

    {{-- JUDUL DASHBOARD --}}
    <div class="row mb-4">
        <div class="col-12">
            <h3 class="mb-2">Dashboard Admin</h3>
            <p class="text-muted">
                Selamat datang di halaman Admin Sekolah.
            </p>
        </div>
    </div>


    {{-- ========================= --}}
    {{-- STATISTIK --}}
    {{-- ========================= --}}
    <div class="row g-4 mb-4">

        {{-- GURU --}}
        <div class="col-md-6 col-xl-3">
            <div class="bg-light rounded d-flex align-items-center p-4 h-100">

                <div class="me-3">
                    <i class="fas fa-chalkboard-teacher fa-3x text-primary"></i>
                </div>

                <div>
                    <p class="mb-2 text-muted">Data Sekolah</p>
                    <h5 class="mb-1">Guru</h5>

                    <h3 class="mb-0">
                        {{ $jumlahGuru }}
                    </h3>
                </div>

            </div>
        </div>


        {{-- SISWA --}}
        <div class="col-md-6 col-xl-3">
            <div class="bg-light rounded d-flex align-items-center p-4 h-100">

                <div class="me-3">
                    <i class="fas fa-user-graduate fa-3x text-danger"></i>
                </div>

                <div>
                    <p class="mb-2 text-muted">Data Sekolah</p>
                    <h5 class="mb-1">Siswa</h5>

                    <h3 class="mb-0">
                        {{ $jumlahSiswa }}
                    </h3>
                </div>

            </div>
        </div>


        {{-- BERITA --}}
        <div class="col-md-6 col-xl-3">
            <div class="bg-light rounded d-flex align-items-center p-4 h-100">

                <div class="me-3">
                    <i class="fas fa-newspaper fa-3x text-info"></i>
                </div>

                <div>
                    <p class="mb-2 text-muted">Informasi</p>
                    <h5 class="mb-1">Berita</h5>

                    <h3 class="mb-0">
                        {{ $jumlahBerita }}
                    </h3>
                </div>

            </div>
        </div>


        {{-- EKSTRAKURIKULER --}}
        <div class="col-md-6 col-xl-3">
            <div class="bg-light rounded d-flex align-items-center p-4 h-100">

                <div class="me-3">
                    <i class="fas fa-futbol fa-3x text-success"></i>
                </div>

                <div>
                    <p class="mb-2 text-muted">Kegiatan</p>
                    <h5 class="mb-1">Ekstrakurikuler</h5>

                    <h3 class="mb-0">
                        {{ $jumlahEkstrakurikuler }}
                    </h3>
                </div>

            </div>
        </div>

    </div>



    <div class="row g-4 mb-4">

        <div class="col-md-6 col-xl-3">

            <div class="bg-light rounded d-flex align-items-center p-4 h-100">

                <div class="me-3">
                    <i class="fas fa-images fa-3x text-warning"></i>
                </div>

                <div>
                    <p class="mb-2 text-muted">Dokumentasi</p>
                    <h5 class="mb-1">Galeri</h5>

                    <h3 class="mb-0">
                        {{ $jumlahGaleri }}
                    </h3>
                </div>

            </div>

        </div>

    </div>



    <div class="row g-4 mb-4">


        
        <div class="col-md-6 col-lg-4">

            <div class="bg-light rounded p-4 h-100">

                <div class="d-flex align-items-center mb-3">

                    <i class="fas fa-school fa-2x text-success me-3"></i>

                    <div>
                        <small class="text-muted">
                            Informasi
                        </small>

                        <h5 class="mb-0">
                            Profil Sekolah
                        </h5>
                    </div>

                </div>

                <a href="{{ route('admin.profile') }}"
                   class="btn btn-success btn-sm">

                    Buka

                </a>

            </div>

        </div>


        {{-- GURU --}}
        <div class="col-md-6 col-lg-4">

            <div class="bg-light rounded p-4 h-100">

                <div class="d-flex align-items-center mb-3">

                    <i class="fas fa-chalkboard-teacher fa-2x text-warning me-3"></i>

                    <div>
                        <small class="text-muted">
                            Data Sekolah
                        </small>

                        <h5 class="mb-0">
                            Guru
                        </h5>
                    </div>

                </div>

                <a href="{{ route('admin.guru') }}"
                   class="btn btn-warning btn-sm">

                    Buka

                </a>

            </div>

        </div>


        {{-- SISWA --}}
        <div class="col-md-6 col-lg-4">

            <div class="bg-light rounded p-4 h-100">

                <div class="d-flex align-items-center mb-3">

                    <i class="fas fa-user-graduate fa-2x text-danger me-3"></i>

                    <div>
                        <small class="text-muted">
                            Data Sekolah
                        </small>

                        <h5 class="mb-0">
                            Siswa
                        </h5>
                    </div>

                </div>

                <a href="{{ route('admin.siswa') }}"
                   class="btn btn-danger btn-sm">

                    Buka

                </a>

            </div>

        </div>


        {{-- BERITA --}}
        <div class="col-md-6 col-lg-4">

            <div class="bg-light rounded p-4 h-100">

                <div class="d-flex align-items-center mb-3">

                    <i class="fas fa-newspaper fa-2x text-primary me-3"></i>

                    <div>
                        <small class="text-muted">
                            Informasi
                        </small>

                        <h5 class="mb-0">
                            Berita
                        </h5>
                    </div>

                </div>

                <a href="{{ route('admin.berita.index') }}"
                   class="btn btn-primary btn-sm">

                    Buka

                </a>

            </div>

        </div>


        {{-- EKSTRAKURIKULER --}}
        <div class="col-md-6 col-lg-4">

            <div class="bg-light rounded p-4 h-100">

                <div class="d-flex align-items-center mb-3">

                    <i class="fas fa-futbol fa-2x text-success me-3"></i>

                    <div>
                        <small class="text-muted">
                            Kegiatan
                        </small>

                        <h5 class="mb-0">
                            Ekstrakurikuler
                        </h5>
                    </div>

                </div>

                <a href="{{ route('admin.ekskul') }}"
                   class="btn btn-success btn-sm">

                    Buka

                </a>

            </div>

        </div>


        {{-- GALERI --}}
        <div class="col-md-6 col-lg-4">

            <div class="bg-light rounded p-4 h-100">

                <div class="d-flex align-items-center mb-3">

                    <i class="fas fa-images fa-2x text-warning me-3"></i>

                    <div>
                        <small class="text-muted">
                            Dokumentasi
                        </small>

                        <h5 class="mb-0">
                            Galeri
                        </h5>
                    </div>

                </div>

                <a href="{{ route('admin.galeri') }}"
                   class="btn btn-warning btn-sm">

                    Buka

                </a>

            </div>

        </div>

    </div>


    {{-- ========================= --}}
    {{-- INFORMASI SEKOLAH --}}
    {{-- ========================= --}}
    <div class="row">

        <div class="col-12">

            <div class="bg-light rounded p-4">

                <h5 class="mb-3">

                    <i class="fas fa-school text-primary me-2"></i>

                    Informasi Sekolah

                </h5>

                <p class="text-muted mb-0">

                    Selamat datang di Dashboard Admin Sekolah.
                    Silakan pilih menu di atas atau sidebar untuk
                    mengelola profil sekolah, guru, siswa, berita,
                    ekstrakurikuler, dan galeri.

                </p>

            </div>

        </div>

    </div>

</div>

@endsection
