@extends('landing.layouts.app')

@section('title', ($berita->judul ?? 'Detail Berita') . ' | MTs Al Muawanah')

@section('content')

<style>
    :root {
        --alma-green: #087443;
        --alma-dark: #075c36;
        --alma-light: #eaf7ef;
        --alma-gold: #f4c542;
    }

    .alma-detail-section {
        background: #f8fbf9;
        min-height: 70vh;
    }

    .alma-detail-card {
        background: #fff;
        border: none;
        border-radius: 18px;
        box-shadow: 0 8px 28px rgba(7, 92, 54, 0.09);
        overflow: hidden;
    }

    .alma-detail-top {
        height: 5px;
        background: linear-gradient(
            90deg,
            var(--alma-green),
            var(--alma-gold)
        );
    }

    .alma-detail-label {
        display: inline-block;
        color: var(--alma-green);
        background: var(--alma-light);
        border-radius: 30px;
        padding: 7px 14px;
        font-size: 12px;
        font-weight: 700;
        letter-spacing: 1px;
    }

    .alma-detail-title {
        color: var(--alma-dark);
        font-weight: 800;
        line-height: 1.4;
    }

    .alma-detail-date {
        color: #77827b;
        font-size: 14px;
    }

    .alma-detail-image {
        width: 100%;
        max-height: 430px;
        object-fit: cover;
        display: block;
    }

    .alma-detail-image-placeholder {
        min-height: 250px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, #eaf7ef, #d4efdf);
        color: var(--alma-green);
        font-size: 65px;
    }

    .alma-detail-content {
        color: #4e5d53;
        font-size: 16px;
        line-height: 1.9;
        overflow-wrap: anywhere;
    }

    .btn-alma-back {
        background: var(--alma-green);
        color: #fff;
        border: 2px solid var(--alma-green);
        border-radius: 30px;
        padding: 10px 22px;
        font-weight: 600;
        transition: all 0.2s ease;
    }

    .btn-alma-back:hover {
        background: var(--alma-dark);
        border-color: var(--alma-dark);
        color: #fff;
        transform: translateX(-2px);
    }

    .alma-detail-divider {
        border-color: #e2ece5;
        opacity: 1;
    }
</style>

<div class="alma-detail-section">
    <div class="container py-5">

        <div class="row justify-content-center">
            <div class="col-lg-9 col-md-11">

                <article class="card alma-detail-card">

                    <div class="alma-detail-top"></div>

                    <div class="card-body p-4 p-md-5">

                        {{-- Label berita --}}
                        <div class="mb-3">
                            <span class="alma-detail-label">
                                <i class="fa-regular fa-newspaper me-1"></i>
                                BERITA MTs AL MUAWANAH
                            </span>
                        </div>

                        {{-- Judul berita --}}
                        <h2 class="alma-detail-title mt-2 mb-3">
                            {{ $berita->judul ?? 'Detail Berita' }}
                        </h2>

                        {{-- Tanggal berita --}}
                        <p class="alma-detail-date mb-4">
                            <i class="fa-regular fa-calendar-days me-2"
                               style="color: #087443;"></i>

                            @if (!empty($berita->created_at))
                                {{ \Carbon\Carbon::parse($berita->created_at)->translatedFormat('d F Y') }}
                            @elseif (!empty($berita->tanggal))
                                {{ \Carbon\Carbon::parse($berita->tanggal)->translatedFormat('d F Y') }}
                            @else
                                Tanggal tidak tersedia
                            @endif
                        </p>

                        {{-- Gambar berita --}}
                        <div class="rounded-4 overflow-hidden bg-light mb-4">

                            @if (!empty($berita->gambar) && file_exists(public_path('uploads/berita/' . $berita->gambar)))
                                <img
                                    src="{{ asset('uploads/berita/' . $berita->gambar) }}"
                                    class="alma-detail-image"
                                    alt="{{ $berita->judul }}"
                                >

                            @elseif (!empty($berita->gambar) && file_exists(public_path('storage/' . $berita->gambar)))
                                <img
                                    src="{{ asset('storage/' . $berita->gambar) }}"
                                    class="alma-detail-image"
                                    alt="{{ $berita->judul }}"
                                >

                            @else
                                <div class="alma-detail-image-placeholder">
                                    <i class="fa-regular fa-newspaper"></i>
                                </div>
                            @endif

                        </div>

                        {{-- Isi berita --}}
                        <div class="alma-detail-content mb-4">
                            {!! nl2br(e($berita->isi ?? $berita->konten ?? 'Isi berita belum tersedia.')) !!}
                        </div>

                        <hr class="alma-detail-divider my-4">

                        {{-- Tombol kembali --}}
                        <div class="d-flex flex-wrap justify-content-between align-items-center gap-3">
                            <span class="text-muted small">
                                <i class="fa-solid fa-school me-1"
                                   style="color: #087443;"></i>
                                MTs Al Muawanah
                            </span>

                            <a href="{{ route('landing.berita') }}"
                               class="btn btn-alma-back">
                                <i class="fa-solid fa-arrow-left me-2"></i>
                                Kembali ke Berita
                            </a>
                        </div>

                    </div>
                </article>

            </div>
        </div>

    </div>
</div>

@endsection