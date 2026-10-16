@extends('landing.layouts.app')

@section('title', 'Detail Guru | MTs Al Muawanah')

@section('content')

<style>
    :root {
        --alma-green: #087443;
        --alma-dark: #075c36;
        --alma-light: #eaf7ef;
        --alma-gold: #f4c542;
    }

    .alma-guru-section {
        min-height: 70vh;
        background: #f8fbf9;
    }

    .alma-guru-card {
        border: none;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 8px 30px rgba(7, 92, 54, 0.09);
    }

    .alma-guru-top {
        height: 6px;
        background: linear-gradient(
            90deg,
            var(--alma-green),
            var(--alma-gold),
            var(--alma-green)
        );
    }

    .alma-guru-photo {
        width: 100%;
        max-width: 250px;
        height: 300px;
        padding: 10px;
        margin: 0 auto;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        background: var(--alma-light);
        border-radius: 18px;
        border: 1px solid #d8ebde;
    }

    .alma-guru-photo img {
        width: 100%;
        height: 100%;
        object-fit: contain;
        border-radius: 12px;
    }

    .alma-guru-label {
        display: inline-block;
        color: var(--alma-green);
        background: var(--alma-light);
        border: 1px solid #d5ebdc;
        border-radius: 30px;
        padding: 8px 15px;
        font-size: 12px;
        font-weight: 700;
        letter-spacing: 1px;
    }

    .alma-guru-name {
        color: var(--alma-dark);
        font-weight: 800;
        overflow-wrap: anywhere;
    }

    .alma-guru-nip {
        color: #6c757d;
        font-size: 14px;
    }

    .alma-guru-subject {
        display: inline-block;
        padding: 10px 16px;
        background: var(--alma-light);
        color: var(--alma-green);
        border: 1px solid #d5ebdc;
        border-radius: 30px;
        font-weight: 600;
    }

    .btn-alma-back {
        display: inline-block;
        background: var(--alma-green);
        border: 2px solid var(--alma-green);
        color: #fff;
        border-radius: 30px;
        padding: 10px 24px;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.2s ease;
    }

    .btn-alma-back:hover {
        background: var(--alma-dark);
        border-color: var(--alma-dark);
        color: #fff;
        transform: translateY(-2px);
    }

    @media (max-width: 767px) {
        .alma-guru-photo {
            height: 270px;
            max-width: 220px;
        }

        .alma-guru-info {
            text-align: center;
        }
    }
</style>

<div class="alma-guru-section">
    <div class="container py-5">

        <div class="row justify-content-center">
            <div class="col-lg-9 col-md-11">

                <div class="card alma-guru-card bg-white">

                    <div class="alma-guru-top"></div>

                    <div class="card-body p-4 p-md-5">

                        <div class="row align-items-center g-4">

                            {{-- Foto guru --}}
                            <div class="col-md-5 text-center">

                                @php
                                    $fotoGuru = $guru->foto ?? null;
                                    $fotoPath = '';

                                    if (!empty($fotoGuru)) {
                                        if (file_exists(public_path('uploads/guru/' . $fotoGuru))) {
                                            $fotoPath = asset('uploads/guru/' . $fotoGuru);
                                        } elseif (file_exists(public_path('storage/' . $fotoGuru))) {
                                            $fotoPath = asset('storage/' . $fotoGuru);
                                        }
                                    }

                                    $namaGuru = $guru->nama_guru
                                        ?? $guru->nama
                                        ?? 'Guru MTs Al Muawanah';
                                @endphp

                                <div class="alma-guru-photo">

                                    @if(!empty($fotoPath))
                                        <img
                                            src="{{ $fotoPath }}"
                                            alt="{{ $namaGuru }}"
                                            onerror="this.onerror=null; this.src='{{ asset('assets/img/default-avatar.png') }}';"
                                        >
                                    @else
                                        <img
                                            src="{{ asset('assets/img/default-avatar.png') }}"
                                            alt="{{ $namaGuru }}"
                                            onerror="this.onerror=null; this.src='data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 width=%22200%22 height=%22240%22 viewBox=%220 0 200 240%22%3E%3Crect width=%22200%22 height=%22240%22 fill=%22%23eaf7ef%22/%3E%3Ccircle cx=%22100%22 cy=%2275%22 r=%2240%22 fill=%22%23087443%22/%3E%3Cpath d=%22M25 220 Q25 140 100 140 Q175 140 175 220%22 fill=%22%23087443%22/%3E%3C/svg%3E';"
                                        >
                                    @endif

                                </div>

                            </div>

                            {{-- Informasi guru --}}
                            <div class="col-md-7 alma-guru-info">

                                <span class="alma-guru-label">
                                    <i class="fa-solid fa-user-tie me-2"></i>
                                    INFORMASI GURU
                                </span>

                                <h2 class="alma-guru-name mt-3 mb-2">
                                    {{ $namaGuru }}
                                </h2>

                                <p class="alma-guru-nip mb-4">
                                    <i class="fa-solid fa-id-card me-2"
                                       style="color: var(--alma-green);"></i>
                                    NIP: {{ $guru->nip ?? '-' }}
                                </p>

                                <div class="mb-4">
                                    <span class="alma-guru-subject">
                                        <i class="fa-solid fa-book-open me-2"></i>
                                        {{ $guru->mapel ?? $guru->jabatan ?? 'Guru Mata Pelajaran' }}
                                    </span>
                                </div>

                                <a
                                    href="{{ route('landing.guru-staf') }}"
                                    class="btn-alma-back"
                                >
                                    <i class="fa-solid fa-arrow-left me-2"></i>
                                    Kembali ke Daftar Guru
                                </a>

                            </div>

                        </div>

                    </div>
                </div>

                {{-- Identitas sekolah --}}
                <div class="text-center mt-4">
                    <small class="text-muted">
                        <i class="fa-solid fa-graduation-cap me-1"
                           style="color: var(--alma-green);"></i>
                        Tenaga Pendidik MTs Al Muawanah
                    </small>
                </div>

            </div>
        </div>

    </div>
</div>

@endsection