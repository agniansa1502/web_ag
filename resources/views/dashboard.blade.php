@extends('layouts.app')

@section('title', 'Dashboard Admin | MTs Al Muawanah')

@section('content')

<style>
    .page-title {
        color: #075c36;
        font-weight: 700;
    }

    .page-title-icon {
        background: linear-gradient(135deg, #087443, #0ca968) !important;
        border-radius: 10px;
    }

    .welcome-card {
        background: linear-gradient(135deg, #075c36, #0ca968);
        color: white;
        border: none;
        border-radius: 15px;
    }

    .welcome-card .card-body {
        padding: 25px;
    }

    .welcome-card h4 {
        font-weight: 700;
    }

    .welcome-card p {
        color: #e5ffed;
    }

    .school-label {
        display: inline-block;
        color: #ffe58a;
        background: rgba(244, 197, 66, 0.18);
        border: 1px solid #f4c542;
        border-radius: 20px;
        padding: 5px 12px;
        font-size: 12px;
        font-weight: bold;
        margin-bottom: 12px;
    }

    .stat-card {
        border: none;
        border-radius: 14px;
        box-shadow: 0 4px 18px rgba(0, 0, 0, 0.06);
        transition: 0.3s;
        height: 100%;
    }

    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 22px rgba(8, 116, 67, 0.15);
    }

    .stat-card .card-body {
        padding: 24px 12px;
    }

    .stat-icon {
        font-size: 36px;
        margin-bottom: 10px;
    }

    .green {
        color: #087443;
    }

    .gold {
        color: #c49a00;
    }

    .teal {
        color: #078477;
    }

    .orange {
        color: #c87520;
    }

    .stat-number {
        color: #075c36;
        font-weight: 800;
    }

    .stat-label {
        color: #758179;
    }

    .section-title {
        color: #075c36;
        font-weight: 700;
        margin-bottom: 18px;
    }
</style>

{{-- JUDUL DASHBOARD --}}
<div class="page-header">
    <h3 class="page-title">
        <span class="page-title-icon text-white me-2 p-2">
            <i class="mdi mdi-home"></i>
        </span>
        Dashboard Admin
    </h3>
</div>

{{-- SELAMAT DATANG --}}
<div class="card welcome-card mb-4">
    <div class="card-body">
        <span class="school-label">
            <i class="mdi mdi-school"></i>
            MTs AL MUAWANAH
        </span>

        <h4>
            Selamat Datang, {{ Auth::user()?->username ?? 'Admin' }}! 👋
        </h4>

        <p class="mb-0">
            Selamat datang di halaman administrator MTs Al Muawanah.
            Silakan pilih menu di samping untuk mengelola data sekolah.
        </p>
    </div>
</div>

{{-- RINGKASAN DATA --}}
<h4 class="section-title">
    <i class="mdi mdi-chart-box-outline"></i>
    Ringkasan Data Sekolah
</h4>

<div class="row">

    {{-- TOTAL SISWA --}}
    <div class="col-md-3 grid-margin stretch-card">
        <div class="card stat-card">
            <div class="card-body text-center">
                <i class="mdi mdi-account-group stat-icon green"></i>
                <h3 class="mt-2 mb-0 stat-number">
                    {{ $totalSiswa ?? 0 }}
                </h3>
                <p class="mb-0 stat-label">Total Siswa</p>
            </div>
        </div>
    </div>

    {{-- TOTAL GURU --}}
    <div class="col-md-3 grid-margin stretch-card">
        <div class="card stat-card">
            <div class="card-body text-center">
                <i class="mdi mdi-human-male-board stat-icon gold"></i>
                <h3 class="mt-2 mb-0 stat-number">
                    {{ $totalGuru ?? 0 }}
                </h3>
                <p class="mb-0 stat-label">Total Guru</p>
            </div>
        </div>
    </div>

    {{-- EKSTRAKURIKULER --}}
    <div class="col-md-3 grid-margin stretch-card">
        <div class="card stat-card">
            <div class="card-body text-center">
                <i class="mdi mdi-run stat-icon teal"></i>
                <h3 class="mt-2 mb-0 stat-number">
                    {{ $totalEkskul ?? 0 }}
                </h3>
                <p class="mb-0 stat-label">Ekstrakurikuler</p>
            </div>
        </div>
    </div>

    {{-- TOTAL BERITA --}}
    <div class="col-md-3 grid-margin stretch-card">
        <div class="card stat-card">
            <div class="card-body text-center">
                <i class="mdi mdi-newspaper stat-icon orange"></i>
                <h3 class="mt-2 mb-0 stat-number">
                    {{ $totalBerita ?? 0 }}
                </h3>
                <p class="mb-0 stat-label">Total Berita</p>
            </div>
        </div>
    </div>

</div>

@endsection
