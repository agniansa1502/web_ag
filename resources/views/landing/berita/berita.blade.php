@extends('landing.layouts.app')

@section('title', 'Berita & Informasi | MTs Al Muawanah')

@section('content')

<style>
    :root {
        --alma-green: #087443;
        --alma-dark: #075c36;
        --alma-light: #eaf7ef;
        --alma-gold: #f4c542;
    }

    .text-school {
        color: var(--alma-green) !important;
    }

    .alma-news-section {
        background: #f8fbf9;
        min-height: 70vh;
    }

    .alma-news-title {
        color: var(--alma-dark);
        font-weight: 800;
    }

    .alma-news-line {
        width: 75px;
        height: 4px;
        background: var(--alma-gold);
        border-radius: 10px;
        margin: 14px auto;
    }

    .alma-news-card {
        border: none;
        border-radius: 15px;
        overflow: hidden;
        background: #fff;
        box-shadow: 0 5px 20px rgba(7, 92, 54, 0.08);
        transition: transform 0.25s ease, box-shadow 0.25s ease;
    }

    .alma-news-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 28px rgba(7, 92, 54, 0.15);
    }

    .alma-news-image {
        height: 190px;
        width: 100%;
        object-fit: cover;
    }

    .alma-news-placeholder {
        height: 190px;
        background: linear-gradient(135deg, #eaf7ef, #d4efdf);
        display: flex;
        justify-content: center;
        align-items: center;
        color: var(--alma-green);
        border-bottom: 3px solid var(--alma-gold);
    }

    .alma-news-date {
        color: var(--alma-green);
        font-size: 13px;
        font-weight: 600;
    }

    .alma-news-heading {
        color: var(--alma-dark);
        font-weight: 700;
        line-height: 1.5;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        min-height: 45px;
    }

    .alma-news-description {
        color: #6c757d;
        font-size: 14px;
        line-height: 1.7;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .btn-alma-news {
        background: var(--alma-green);
        color: #fff;
        border: 2px solid var(--alma-green);
        border-radius: 30px;
        font-size: 13px;
        font-weight: 600;
        padding: 9px 14px;
        transition: all 0.2s ease;
    }

    .btn-alma-news:hover {
        background: var(--alma-dark);
        border-color: var(--alma-dark);
        color: #fff;
    }

    .alma-news-empty {
        background: #fff;
        border: 1px dashed #b7d9c3;
        border-radius: 15px;
        padding: 45px 20px;
    }

    .alma-news-empty-icon {
        color: var(--alma-green);
        font-size: 45px;
    }
</style>

<div class="alma-news-section">
    <div class="container py-5">

        {{-- Judul halaman --}}
        <div class="text-center mb-5">
            <span class="badge rounded-pill px-3 py-2 mb-2"
                  style="background: #eaf7ef; color: #087443;">
                MTs Al Muawanah
            </span>

            <h2 class="alma-news-title">
                <i class="fa-regular fa-newspaper me-2"></i>
                Berita & Informasi
            </h2>

            <div class="alma-news-line"></div>

            <p class="text-muted mb-0">
                Kabar terbaru seputar kegiatan, informasi, dan prestasi
                MTs Al Muawanah.
            </p>
        </div>

        {{-- Daftar berita --}}
        <div class="row g-4">

            @php
                $beritaPublikasi = collect($berita ?? [])
                    ->filter(function ($item) {
                        return isset($item->status)
                            && strtolower($item->status) === 'publis';
                    });
            @endphp

            @forelse ($beritaPublikasi as $item)

                <div class="col-sm-6 col-lg-3">
                    <div class="card alma-news-card h-100 d-flex flex-column">

                        {{-- Gambar berita --}}
                        @if (!empty($item->gambar) && file_exists(public_path('uploads/berita/' . $item->gambar)))
                            <img
                                src="{{ asset('uploads/berita/' . $item->gambar) }}"
                                class="alma-news-image"
                                alt="{{ $item->judul }}"
                                loading="lazy"
                            >
                        @elseif (!empty($item->gambar) && file_exists(public_path('storage/' . $item->gambar)))
                            <img
                                src="{{ asset('storage/' . $item->gambar) }}"
                                class="alma-news-image"
                                alt="{{ $item->judul }}"
                                loading="lazy"
                            >
                        @else
                            <div class="alma-news-placeholder">
                                <i class="fa-regular fa-newspaper" style="font-size: 55px;"></i>
                            </div>
                        @endif

                        {{-- Isi berita --}}
                        <div class="card-body p-3 d-flex flex-column">

                            @if (!empty($item->tanggal))
                                <div class="alma-news-date mb-2">
                                    <i class="fa-regular fa-calendar-days me-1"></i>
                                    {{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}
                                </div>
                            @endif

                            <h6 class="alma-news-heading mb-2">
                                {{ $item->judul }}
                            </h6>

                            @if (!empty($item->isi))
                                <p class="alma-news-description mb-3">
                                    {{ strip_tags($item->isi) }}
                                </p>
                            @else
                                <p class="alma-news-description mb-3">
                                    Informasi terbaru dari MTs Al Muawanah.
                                </p>
                            @endif

                            <div class="mt-auto pt-2">
                                <a
                                    href="{{ route('landing.berita.show', $item->id_berita ?? $item->id) }}"
                                    class="btn btn-alma-news w-100"
                                >
                                    Baca Selengkapnya
                                    <i class="fa-solid fa-arrow-right ms-1"></i>
                                </a>
                            </div>

                        </div>
                    </div>
                </div>

            @empty

                <div class="col-12">
                    <div class="alma-news-empty text-center">
                        <i class="fa-regular fa-newspaper alma-news-empty-icon"></i>

                        <h5 class="fw-bold mt-3" style="color: #075c36;">
                            Belum Ada Berita
                        </h5>

                        <p class="text-muted mb-0">
                            Berita dan informasi MTs Al Muawanah
                            akan ditampilkan di halaman ini.
                        </p>
                    </div>
                </div>

            @endforelse

        </div>
    </div>
</div>

@endsection