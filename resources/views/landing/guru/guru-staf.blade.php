@extends('landing.layouts.app')

@section('title', 'Guru & Staf | MTs Al Muawanah')

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

    .alma-guru-label {
        color: var(--alma-green);
        font-weight: 700;
        font-size: 12px;
        letter-spacing: 2px;
    }

    .alma-guru-heading {
        color: var(--alma-dark);
        font-weight: 800;
    }

    .alma-guru-line {
        width: 75px;
        height: 4px;
        background: var(--alma-gold);
        border-radius: 5px;
        margin: 15px auto 0;
    }

    .alma-guru-card {
        background: #fff;
        border: none;
        border-radius: 18px;
        overflow: hidden;
        box-shadow: 0 5px 22px rgba(7, 92, 54, 0.08);
        transition: transform 0.25s ease, box-shadow 0.25s ease;
    }

    .alma-guru-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 12px 28px rgba(7, 92, 54, 0.15);
    }

    .alma-guru-photo {
        height: 230px;
        background: var(--alma-light);
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        border-radius: 13px;
        position: relative;
    }

    .alma-guru-photo img {
        width: 100%;
        height: 100%;
        object-fit: contain;
        padding: 8px;
    }

    .alma-guru-photo-placeholder {
        color: var(--alma-green);
        font-size: 60px;
    }

    .alma-guru-card-body {
        border-top: 3px solid var(--alma-gold);
        padding: 20px 16px;
    }

    .alma-guru-name {
        color: var(--alma-dark);
        font-size: 16px;
        font-weight: 700;
        line-height: 1.5;
        overflow-wrap: anywhere;
    }

    .alma-guru-role {
        color: #6c757d;
        font-size: 13px;
    }

    .btn-alma-detail {
        display: block;
        width: 100%;
        padding: 9px 12px;
        border: 1.5px solid var(--alma-green);
        border-radius: 30px;
        color: var(--alma-green);
        background: #fff;
        font-size: 13px;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.2s ease;
    }

    .btn-alma-detail:hover {
        color: #fff;
        background: var(--alma-green);
        border-color: var(--alma-green);
    }

    .alma-guru-empty {
        background: #fff;
        border: 1px dashed #b7d7c2;
        border-radius: 16px;
        padding: 50px 20px;
    }

    .alma-guru-empty i {
        color: var(--alma-green);
        font-size: 45px;
    }
</style>

<div class="alma-guru-section">
    <div class="container py-5">

        {{-- Judul halaman --}}
        <div class="text-center mb-5">
            <span class="alma-guru-label">
                TENAGA PENDIDIK
            </span>

            <h2 class="alma-guru-heading display-6 mt-2 mb-0">
                Guru & Staf Pengajar
            </h2>

            <div class="alma-guru-line"></div>

            <p class="text-muted mt-3 mb-0">
                Mengenal tenaga pendidik dan staf MTs Al Muawanah.
            </p>
        </div>

        {{-- Daftar guru --}}
        <div class="row g-4">

            @forelse($gurus ?? [] as $guru)

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

                    $guruId = $guru->id_guru
                        ?? $guru->id
                        ?? $guru->getKey();
                @endphp

                <div class="col-12 col-sm-6 col-lg-3">

                    <div class="card alma-guru-card h-100">

                        {{-- Foto guru --}}
                        <div class="p-3 pb-0">
                            <div class="alma-guru-photo">

                                @if(!empty($fotoPath))

                                    <img
                                        src="{{ $fotoPath }}"
                                        alt="{{ $namaGuru }}"
                                        loading="lazy"
                                        onerror="this.onerror=null; this.style.display='none'; this.nextElementSibling.style.display='flex';"
                                    >

                                    <div
                                        class="alma-guru-photo-placeholder"
                                        style="display:none; position:absolute; inset:0; align-items:center; justify-content:center;"
                                    >
                                        <i class="fa-solid fa-user-tie"></i>
                                    </div>

                                @else

                                    <div class="alma-guru-photo-placeholder">
                                        <i class="fa-solid fa-user-tie"></i>
                                    </div>

                                @endif

                            </div>
                        </div>

                        {{-- Informasi guru --}}
                        <div class="alma-guru-card-body text-center d-flex flex-column flex-grow-1">

                            <div class="flex-grow-1">
                                <h5 class="alma-guru-name mb-2">
                                    {{ $namaGuru }}
                                </h5>

                                <p class="alma-guru-role mb-3">
                                    <i
                                        class="fa-solid fa-book-open me-1"
                                        style="color: var(--alma-green);"
                                    ></i>

                                    {{ $guru->mapel ?? $guru->jabatan ?? 'Tenaga Pendidik' }}
                                </p>
                            </div>

                            <a
                                href="{{ route('landing.guru.show', $guruId) }}"
                                class="btn-alma-detail mt-2"
                            >
                                Lihat Detail
                                <i class="fa-solid fa-arrow-right ms-1"></i>
                            </a>

                        </div>

                    </div>

                </div>

            @empty

                <div class="col-12 text-center">
                    <div class="alma-guru-empty">
                        <i class="fa-solid fa-users mb-3"></i>

                        <h5
                            class="fw-bold"
                            style="color: var(--alma-dark);"
                        >
                            Data Guru Belum Tersedia
                        </h5>

                        <p class="text-muted mb-0">
                            Informasi guru dan staf MTs Al Muawanah
                            belum tersedia.
                        </p>
                    </div>
                </div>

            @endforelse

        </div>
    </div>
</div>

@endsection