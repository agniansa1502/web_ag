@extends('landing.layouts.app')

@section('title', 'Detail Ekstrakurikuler | MTs Al Muawanah')

@section('content')

<style>
    :root {
        --alma-green: #087443;
        --alma-dark: #075c36;
        --alma-light: #eaf7ef;
        --alma-gold: #f4c542;
    }

    .alma-ekskul-section {
        background: #f8fbf9;
        min-height: 70vh;
    }

    .alma-ekskul-card {
        border: none;
        border-radius: 20px;
        box-shadow: 0 8px 28px rgba(7, 92, 54, 0.09);
        overflow: hidden;
    }

    .alma-ekskul-top {
        height: 5px;
        background: linear-gradient(
            90deg,
            var(--alma-green),
            var(--alma-gold)
        );
    }

    .alma-ekskul-image-wrapper {
        height: 280px;
        background: linear-gradient(135deg, #eaf7ef, #d4efdf);
        border-radius: 16px;
        overflow: hidden;
        border: 1px solid #dcebe0;
    }

    .alma-ekskul-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .alma-ekskul-placeholder {
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--alma-green);
        font-size: 65px;
    }

    .alma-ekskul-badge {
        display: inline-block;
        background: var(--alma-light);
        color: var(--alma-green);
        font-weight: 700;
        font-size: 12px;
        letter-spacing: 1px;
        padding: 9px 16px;
        border-radius: 30px;
    }

    .alma-ekskul-title {
        color: var(--alma-dark);
        font-weight: 800;
        line-height: 1.35;
    }

    .alma-ekskul-description {
        color: #58665d;
        font-size: 16px;
        line-height: 1.9;
        overflow-wrap: anywhere;
    }

    .alma-ekskul-info {
        background: #f6faf7;
        border: 1px solid #e0ebe3;
        border-left: 4px solid var(--alma-gold);
        border-radius: 13px;
        padding: 18px;
    }

    .alma-ekskul-icon {
        width: 46px;
        height: 46px;
        flex-shrink: 0;
        background: var(--alma-green);
        color: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 19px;
    }

    .alma-ekskul-label {
        color: #77827b;
        font-size: 12px;
        font-weight: 600;
    }

    .alma-ekskul-name {
        color: var(--alma-dark);
        font-weight: 700;
    }

    .btn-alma-back {
        background: var(--alma-green);
        border: 2px solid var(--alma-green);
        color: white;
        border-radius: 30px;
        padding: 10px 23px;
        font-weight: 600;
        transition: 0.2s ease;
    }

    .btn-alma-back:hover {
        background: var(--alma-dark);
        border-color: var(--alma-dark);
        color: white;
        transform: translateX(-2px);
    }

    @media (max-width: 576px) {
        .alma-ekskul-image-wrapper {
            height: 220px;
        }
    }
</style>

<div class="alma-ekskul-section">
    <div class="container py-5">

        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">

                <div class="card alma-ekskul-card">

                    <div class="alma-ekskul-top"></div>

                    <div class="card-body p-4 p-md-5">

                        {{-- Gambar ekstrakurikuler --}}
                        <div class="alma-ekskul-image-wrapper mb-4">

                            @if (!empty($ekskul->gambar) && file_exists(public_path('uploads/ekskul/' . $ekskul->gambar)))
                                <img
                                    src="{{ asset('uploads/ekskul/' . $ekskul->gambar) }}"
                                    class="alma-ekskul-image"
                                    alt="{{ $ekskul->nama_eskul ?? $ekskul->nama_ekskul ?? $ekskul->nama }}"
                                >

                            @elseif (!empty($ekskul->gambar) && file_exists(public_path('storage/' . $ekskul->gambar)))
                                <img
                                    src="{{ asset('storage/' . $ekskul->gambar) }}"
                                    class="alma-ekskul-image"
                                    alt="{{ $ekskul->nama_eskul ?? $ekskul->nama_ekskul ?? $ekskul->nama }}"
                                >

                            @else
                                <div class="alma-ekskul-placeholder">
                                    <i class="fa-solid fa-people-group"></i>
                                </div>
                            @endif

                        </div>

                        {{-- Informasi ekstrakurikuler --}}
                        <div>

                            <div class="mb-3">
                                <span class="alma-ekskul-badge">
                                    <i class="fa-solid fa-award me-1"></i>
                                    EKSTRAKURIKULER SEKOLAH
                                </span>
                            </div>

                            <h2 class="alma-ekskul-title mb-3">
                                {{ $ekskul->nama_eskul ?? $ekskul->nama_ekskul ?? $ekskul->nama ?? 'Ekstrakurikuler' }}
                            </h2>

                            <p class="alma-ekskul-description mb-4">
                                {{ $ekskul->keterangan ?? $ekskul->deskripsi ?? 'Kegiatan ekstrakurikuler MTs Al Muawanah untuk mengembangkan bakat, minat, kreativitas, dan potensi siswa.' }}
                            </p>

                            {{-- Informasi pembina --}}
                            <div class="alma-ekskul-info d-flex align-items-center justify-content-between flex-wrap gap-3 mt-4">

                                <div class="d-flex align-items-center gap-3">
                                    <div class="alma-ekskul-icon">
                                        <i class="fa-solid fa-user-tie"></i>
                                    </div>

                                    <div>
                                        <small class="alma-ekskul-label d-block">
                                            Pembina Ekstrakurikuler
                                        </small>

                                        <span class="alma-ekskul-name fs-6">
                                            {{ $ekskul->pembina ?? '-' }}
                                        </span>
                                    </div>
                                </div>

                                <a
                                    href="{{ route('landing.ekskul') }}"
                                    class="btn btn-alma-back"
                                >
                                    <i class="fa-solid fa-arrow-left me-2"></i>
                                    Kembali
                                </a>

                            </div>

                        </div>

                    </div>
                </div>

            </div>
        </div>

    </div>
</div>

@endsection