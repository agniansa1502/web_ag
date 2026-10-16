@extends('layouts.app')

@section('content')
<style>
    :root {
        --profil-hijau: #087443;
        --profil-hijau-muda: #0ca968;
        --profil-hijau-gelap: #064e32;
        --profil-emas: #f4c542;
    }

    .profil-page {
        padding-top: 25px;
        padding-bottom: 35px;
    }

    .profil-heading {
        color: var(--profil-hijau-gelap);
        font-weight: 800;
        margin-bottom: 5px;
    }

    .profil-subtitle {
        color: #718096;
        font-size: 14px;
        margin-bottom: 22px;
    }

    .profil-divider {
        height: 3px;
        background: var(--profil-emas);
        border: 0;
        border-radius: 5px;
        opacity: 1;
        margin: 20px 0 25px;
    }

    .profil-card {
        background: #fff;
        border: none;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 5px 22px rgba(6, 78, 50, .08);
    }

    .profil-card-header {
        background: linear-gradient(
            135deg,
            var(--profil-hijau-gelap),
            var(--profil-hijau)
        );
        color: white;
        padding: 22px 25px;
        border-bottom: 4px solid var(--profil-emas);
    }

    .profil-card-header h5 {
        font-weight: 800;
        margin-bottom: 5px;
    }

    .profil-card-header p {
        margin-bottom: 0;
        font-size: 13px;
        opacity: .85;
    }

    .profil-card-body {
        padding: 25px;
    }

    .btn-profil {
        background: var(--profil-hijau);
        color: white;
        border: 1px solid var(--profil-hijau);
        border-radius: 9px;
        padding: 9px 16px;
        font-weight: 700;
        transition: .2s ease;
    }

    .btn-profil:hover {
        background: var(--profil-hijau-gelap);
        border-color: var(--profil-hijau-gelap);
        color: white;
        transform: translateY(-1px);
    }

    .profil-section-title {
        color: var(--profil-hijau-gelap);
        font-size: 15px;
        font-weight: 800;
        margin-bottom: 18px;
    }

    .profil-media-box {
        height: 230px;
        padding: 15px;
        background: #f3f8f4;
        border: 1px solid #e0ece3;
        border-bottom: 3px solid var(--profil-emas);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
    }

    .profil-logo {
        width: 100%;
        height: 100%;
        object-fit: contain;
    }

    .profil-foto {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 7px;
    }

    .profil-no-image {
        color: #718096;
        text-align: center;
    }

    .profil-no-image i {
        display: block;
        font-size: 40px;
        color: var(--profil-hijau);
        margin-bottom: 10px;
    }

    .profil-media-label {
        color: var(--profil-hijau-gelap);
        font-weight: 700;
        margin-bottom: 12px;
    }

    .profil-info-table {
        margin-bottom: 0;
    }

    .profil-info-table th {
        color: var(--profil-hijau-gelap);
        font-weight: 700;
        width: 22%;
        padding: 14px 10px;
        vertical-align: top;
    }

    .profil-info-table td {
        color: #4a5568;
        padding: 14px 10px;
        vertical-align: top;
        overflow-wrap: anywhere;
    }

    .profil-info-table tr {
        border-bottom: 1px solid #edf2ee;
    }

    .profil-info-table tr:last-child {
        border-bottom: none;
    }

    .profil-info-table tr:hover {
        background: #f7fbf8;
    }

    .profil-alert {
        border-radius: 10px;
    }

    .profil-empty {
        background: #f3f8f4;
        border: 1px dashed #b8d8c3;
        border-radius: 12px;
        padding: 35px 20px;
        text-align: center;
        color: #718096;
    }

    .profil-empty i {
        font-size: 42px;
        color: var(--profil-hijau);
        margin-bottom: 14px;
    }

    @media (max-width: 767px) {
        .profil-card-body {
            padding: 18px;
        }

        .profil-card-header {
            padding: 18px;
        }

        .profil-info-table th {
            width: 35%;
            padding: 11px 5px;
        }

        .profil-info-table td {
            padding: 11px 5px;
        }

        .profil-media-box {
            height: 200px;
        }
    }
</style>

<div class="container profil-page">

    <div>
        <h3 class="profil-heading">
            <i class="fas fa-school me-2"></i>
            Profil Sekolah
        </h3>

        <p class="profil-subtitle">
            Informasi identitas dan profil MTs Al Muawanah.
        </p>
    </div>

    <hr class="profil-divider">

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show profil-alert" role="alert">
            <i class="fas fa-check-circle me-2"></i>
            {{ session('success') }}

            <button type="button"
                class="btn-close"
                data-bs-dismiss="alert"
                aria-label="Close"></button>
        </div>
    @endif

    <div class="card profil-card">

        <div class="profil-card-header d-flex flex-wrap justify-content-between align-items-center gap-3">
            <div>
                <h5>
                    <i class="fas fa-info-circle me-2"></i>
                    Informasi Sekolah
                </h5>
                <p>Data resmi sekolah yang tersimpan di sistem.</p>
            </div>

            <a href="{{ route('profil.edit') }}" class="btn btn-light btn-sm fw-bold"
                style="color:#087443; border-radius:9px; padding:9px 14px;">
                <i class="fas fa-edit me-1"></i>
                Edit Profil
            </a>
        </div>

        <div class="profil-card-body">

            @if($profil)

                {{-- LOGO DAN FOTO SEKOLAH --}}
                <div class="row g-4 mb-4">

                    <div class="col-md-4">
                        <p class="profil-media-label">
                            <i class="fas fa-image me-2"></i>
                            Logo Sekolah
                        </p>

                        <div class="profil-media-box">
                            @if($profil->logo)
                                <img
                                    src="{{ asset('storage/' . $profil->logo) }}"
                                    alt="Logo Sekolah"
                                    class="profil-logo">
                            @else
                                <div class="profil-no-image">
                                    <i class="fas fa-image"></i>
                                    <span>Logo belum tersedia</span>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-8">
                        <p class="profil-media-label">
                            <i class="fas fa-building me-2"></i>
                            Foto Sekolah / Gedung
                        </p>

                        <div class="profil-media-box">
                            @if($profil->foto)
                                <img
                                    src="{{ asset('storage/' . $profil->foto) }}"
                                    alt="Foto Sekolah"
                                    class="profil-foto">
                            @else
                                <div class="profil-no-image">
                                    <i class="fas fa-school"></i>
                                    <span>Foto sekolah belum tersedia</span>
                                </div>
                            @endif
                        </div>
                    </div>

                </div>

                <hr class="my-4" style="border-color:#dce8df;">

                {{-- DETAIL INFORMASI --}}
                <h6 class="profil-section-title">
                    <i class="fas fa-list-alt me-2" style="color:#c49a13;"></i>
                    Detail Informasi Sekolah
                </h6>

                <div class="table-responsive">
                    <table class="table table-borderless profil-info-table">
                        <tbody>
                            <tr>
                                <th>Nama Sekolah</th>
                                <td class="text-center" style="width:20px;">:</td>
                                <td>{{ $profil->nama_sekolah ?: '-' }}</td>
                            </tr>

                            <tr>
                                <th>Kepala Sekolah</th>
                                <td class="text-center">:</td>
                                <td>{{ $profil->kepala_sekolah ?: '-' }}</td>
                            </tr>

                            <tr>
                                <th>NPSN</th>
                                <td class="text-center">:</td>
                                <td>{{ $profil->npsn ?: '-' }}</td>
                            </tr>

                            <tr>
                                <th>Tahun Berdiri</th>
                                <td class="text-center">:</td>
                                <td>{{ $profil->tahun_berdiri ?: '-' }}</td>
                            </tr>

                            <tr>
                                <th>Kontak</th>
                                <td class="text-center">:</td>
                                <td>{{ $profil->kontak ?: '-' }}</td>
                            </tr>

                            <tr>
                                <th>Alamat</th>
                                <td class="text-center">:</td>
                                <td>{{ $profil->alamat ?: '-' }}</td>
                            </tr>

                            <tr>
                                <th>Visi &amp; Misi</th>
                                <td class="text-center">:</td>
                                <td>{!! nl2br(e($profil->visi_misi ?? '-')) !!}</td>
                            </tr>

                            <tr>
                                <th>Deskripsi</th>
                                <td class="text-center">:</td>
                                <td>{!! nl2br(e($profil->deskripsi ?? '-')) !!}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            @else

                <div class="profil-empty">
                    <i class="fas fa-school d-block"></i>

                    <h5 class="fw-bold" style="color:#064e32;">
                        Profil Sekolah Belum Tersedia
                    </h5>

                    <p class="mb-3">
                        Data profil sekolah belum ada. Silakan isi informasi sekolah terlebih dahulu.
                    </p>

                    <a href="{{ route('profil.edit') }}" class="btn btn-profil">
                        <i class="fas fa-edit me-2"></i>
                        Isi Profil Sekolah
                    </a>
                </div>

            @endif

        </div>
    </div>
</div>
@endsection