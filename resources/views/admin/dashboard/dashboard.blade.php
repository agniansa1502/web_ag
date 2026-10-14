@extends('admin')

@section('content')

<style>
    .dashboard-page {
        padding: 24px;
    }

    .dashboard-header {
        background: linear-gradient(135deg, #075c36, #0ca968);
        color: white;
        border-radius: 16px;
        padding: 28px;
        margin-bottom: 25px;
        box-shadow: 0 5px 18px rgba(7, 92, 54, 0.15);
    }

    .dashboard-header h3 {
        font-weight: 700;
        margin-bottom: 8px;
    }

    .dashboard-header p {
        margin-bottom: 0;
        opacity: 0.9;
    }

    .stat-card,
    .menu-card,
    .info-card {
        background: #fff;
        border-radius: 14px;
        padding: 22px;
        height: 100%;
        border: 1px solid #e8eee9;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.04);
        transition: transform 0.2s, box-shadow 0.2s;
    }

    .stat-card:hover,
    .menu-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 8px 22px rgba(7, 92, 54, 0.10);
    }

    .stat-icon {
        width: 58px;
        height: 58px;
        min-width: 58px;
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 25px;
        background: #e5f5ec;
        color: #087443;
    }

    .stat-label {
        color: #78847c;
        font-size: 14px;
        margin-bottom: 5px;
    }

    .stat-number {
        color: #075c36;
        font-size: 28px;
        font-weight: 700;
        margin: 0;
    }

    .section-title {
        color: #075c36;
        font-weight: 700;
        margin-bottom: 18px;
    }

    .menu-icon {
        width: 48px;
        height: 48px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #e5f5ec;
        color: #087443;
        border-radius: 12px;
        font-size: 22px;
        margin-bottom: 16px;
    }

    .menu-card h5 {
        color: #24352b;
        font-weight: 700;
        margin-bottom: 8px;
    }

    .menu-card p {
        color: #78847c;
        font-size: 14px;
        min-height: 40px;
    }

    .btn-dashboard {
        background: #087443;
        color: white;
        border: none;
        border-radius: 8px;
        padding: 8px 15px;
        text-decoration: none;
        display: inline-block;
        font-size: 13px;
    }

    .btn-dashboard:hover {
        background: #075c36;
        color: white;
    }

    .info-card {
        border-left: 5px solid #0ca968;
    }

    @media (max-width: 576px) {
        .dashboard-page {
            padding: 14px;
        }

        .dashboard-header {
            padding: 22px;
        }
    }
</style>

<div class="container-fluid dashboard-page">

    {{-- HEADER DASHBOARD --}}
    <div class="dashboard-header">
        <h3>
            <i class="fas fa-school me-2"></i>
            Dashboard Admin
        </h3>

        <p>
            Selamat datang di panel administrasi MTs Al Muawanah.
            Kelola data sekolah dengan mudah melalui halaman ini.
        </p>
    </div>

    {{-- STATISTIK --}}
    <h5 class="section-title">Ringkasan Data Sekolah</h5>

    <div class="row g-4 mb-4">

        {{-- GURU --}}
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="stat-card d-flex align-items-center">
                <div class="stat-icon me-3">
                    <i class="fas fa-chalkboard-teacher"></i>
                </div>

                <div>
                    <p class="stat-label">Total Guru</p>
                    <h3 class="stat-number">{{ $jumlahGuru ?? 0 }}</h3>
                </div>
            </div>
        </div>

        {{-- SISWA --}}
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="stat-card d-flex align-items-center">
                <div class="stat-icon me-3">
                    <i class="fas fa-user-graduate"></i>
                </div>

                <div>
                    <p class="stat-label">Total Siswa</p>
                    <h3 class="stat-number">{{ $jumlahSiswa ?? 0 }}</h3>
                </div>
            </div>
        </div>

        {{-- BERITA --}}
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="stat-card d-flex align-items-center">
                <div class="stat-icon me-3">
                    <i class="fas fa-newspaper"></i>
                </div>

                <div>
                    <p class="stat-label">Total Berita</p>
                    <h3 class="stat-number">{{ $jumlahBerita ?? 0 }}</h3>
                </div>
            </div>
        </div>

        {{-- EKSTRAKULIKULER --}}
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="stat-card d-flex align-items-center">
                <div class="stat-icon me-3">
                    <i class="fas fa-futbol"></i>
                </div>

                <div>
                    <p class="stat-label">Total Ekstrakulikuler</p>
                    <h3 class="stat-number">
                        {{ $jumlahEkstrakurikuler ?? 0 }}
                    </h3>
                </div>
            </div>
        </div>

        {{-- GALERI --}}
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="stat-card d-flex align-items-center">
                <div class="stat-icon me-3">
                    <i class="fas fa-images"></i>
                </div>

                <div>
                    <p class="stat-label">Total Galeri</p>
                    <h3 class="stat-number">{{ $jumlahGaleri ?? 0 }}</h3>
                </div>
            </div>
        </div>

    </div>

    {{-- MENU PENGELOLAAN --}}
    <h5 class="section-title">Menu Pengelolaan</h5>

    <div class="row g-4 mb-4">

        {{-- PROFIL --}}
        <div class="col-12 col-sm-6 col-xl-4">
            <div class="menu-card">
                <div class="menu-icon">
                    <i class="fas fa-school"></i>
                </div>

                <h5>Profil Sekolah</h5>
                <p>Kelola identitas dan informasi MTs Al Muawanah.</p>

                <a href="{{ route('admin.profile') }}"
                   class="btn-dashboard">
                    <i class="fas fa-arrow-right me-1"></i> Buka Menu
                </a>
            </div>
        </div>

        {{-- GURU --}}
        <div class="col-12 col-sm-6 col-xl-4">
            <div class="menu-card">
                <div class="menu-icon">
                    <i class="fas fa-chalkboard-teacher"></i>
                </div>

                <h5>Data Guru</h5>
                <p>Tambah, ubah, dan kelola data guru sekolah.</p>

                <a href="{{ route('admin.guru') }}"
                   class="btn-dashboard">
                    <i class="fas fa-arrow-right me-1"></i> Buka Menu
                </a>
            </div>
        </div>

        {{-- SISWA --}}
        <div class="col-12 col-sm-6 col-xl-4">
            <div class="menu-card">
                <div class="menu-icon">
                    <i class="fas fa-user-graduate"></i>
                </div>

                <h5>Data Siswa</h5>
                <p>Kelola informasi dan data siswa sekolah.</p>

                <a href="{{ route('admin.siswa') }}"
                   class="btn-dashboard">
                    <i class="fas fa-arrow-right me-1"></i> Buka Menu
                </a>
            </div>
        </div>

        {{-- BERITA --}}
        <div class="col-12 col-sm-6 col-xl-4">
            <div class="menu-card">
                <div class="menu-icon">
                    <i class="fas fa-newspaper"></i>
                </div>

                <h5>Berita Sekolah</h5>
                <p>Publikasikan dan perbarui berita sekolah.</p>

                <a href="{{ route('admin.berita.index') }}"
                   class="btn-dashboard">
                    <i class="fas fa-arrow-right me-1"></i> Buka Menu
                </a>
            </div>
        </div>

        {{-- EKSTRAKULIKULER --}}
        <div class="col-12 col-sm-6 col-xl-4">
            <div class="menu-card">
                <div class="menu-icon">
                    <i class="fas fa-futbol"></i>
                </div>

                <h5>Ekstrakulikuler</h5>
                <p>Kelola kegiatan dan pembina ekstrakulikuler.</p>

                <a href="{{ route('admin.ekskul') }}"
                   class="btn-dashboard">
                    <i class="fas fa-arrow-right me-1"></i> Buka Menu
                </a>
            </div>
        </div>

        {{-- GALERI --}}
        <div class="col-12 col-sm-6 col-xl-4">
            <div class="menu-card">
                <div class="menu-icon">
                    <i class="fas fa-images"></i>
                </div>

                <h5>Galeri Sekolah</h5>
                <p>Kelola foto kegiatan dan dokumentasi sekolah.</p>

                <a href="{{ route('admin.galeri') }}"
                   class="btn-dashboard">
                    <i class="fas fa-arrow-right me-1"></i> Buka Menu
                </a>
            </div>
        </div>

    </div>

    {{-- INFORMASI --}}
    <div class="row">
        <div class="col-12">
            <div class="info-card">
                <h5 class="section-title">
                    <i class="fas fa-info-circle me-2"></i>
                    Informasi Dashboard
                </h5>

                <p class="text-muted mb-0">
                    Selamat datang di Dashboard Admin MTs Al Muawanah.
                    Gunakan menu pengelolaan untuk memperbarui profil sekolah,
                    data guru, data siswa, berita, ekstrakulikuler, dan galeri.
                    Pastikan informasi yang ditampilkan kepada pengunjung
                    selalu sesuai dengan data terbaru.
                </p>
            </div>
        </div>
    </div>

</div>

@endsection
