@extends('landing.layouts.app')

@section('title', 'Galeri Kegiatan | MTs Al Muawanah')

@section('content')

<style>
    :root {
        --alma-green: #087443;
        --alma-dark: #075c36;
        --alma-light: #eaf7ef;
        --alma-gold: #f4c542;
    }

    .alma-gallery-section {
        background: #f8fbf9;
        min-height: 70vh;
    }

    .alma-gallery-heading {
        color: var(--alma-dark);
        font-weight: 800;
    }

    .alma-gallery-line {
        width: 75px;
        height: 4px;
        border-radius: 5px;
        background: var(--alma-gold);
        margin: 15px auto 0;
    }

    .alma-gallery-card {
        border: none;
        border-radius: 16px;
        overflow: hidden;
        background: #fff;
        box-shadow: 0 5px 20px rgba(7, 92, 54, 0.08);
        transition: transform 0.25s ease, box-shadow 0.25s ease;
    }

    .alma-gallery-link:hover .alma-gallery-card {
        transform: translateY(-6px);
        box-shadow: 0 12px 28px rgba(7, 92, 54, 0.15);
    }

    .alma-gallery-media {
        height: 230px;
        background: #eaf1ec;
        position: relative;
        overflow: hidden;
    }

    .alma-gallery-media img,
    .alma-gallery-media video {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }

    .alma-gallery-overlay {
        position: absolute;
        inset: 0;
        background: rgba(7, 92, 54, 0.25);
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        opacity: 0;
        transition: opacity 0.25s ease;
        pointer-events: none;
    }

    .alma-gallery-link:hover .alma-gallery-overlay {
        opacity: 1;
    }

    .alma-gallery-overlay i {
        font-size: 46px;
        color: var(--alma-gold);
        filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.3));
    }

    .alma-gallery-video-badge {
        position: absolute;
        top: 12px;
        right: 12px;
        background: var(--alma-green);
        color: #fff;
        padding: 6px 11px;
        border-radius: 20px;
        font-size: 11px;
        font-weight: 700;
        z-index: 2;
    }

    .alma-gallery-body {
        padding: 18px;
        border-top: 3px solid var(--alma-gold);
    }

    .alma-gallery-title {
        color: var(--alma-dark);
        font-weight: 700;
        line-height: 1.5;
    }

    .alma-gallery-description {
        color: #6c757d;
        font-size: 13px;
        line-height: 1.7;
    }

    .alma-gallery-empty {
        background: #fff;
        border: 1px dashed #b7d7c2;
        border-radius: 16px;
        padding: 55px 20px;
    }

    .alma-gallery-empty i {
        color: var(--alma-green);
        font-size: 50px;
    }

    @media (max-width: 576px) {
        .alma-gallery-media {
            height: 210px;
        }
    }
</style>

<div class="alma-gallery-section">
    <div class="container py-5">

        {{-- Judul halaman --}}
        <div class="text-center mb-5">
            <span class="badge rounded-pill px-3 py-2 mb-3"
                  style="background: var(--alma-light); color: var(--alma-green);">
                <i class="fa-solid fa-images me-2"></i>
                DOKUMENTASI SEKOLAH
            </span>

            <h2 class="alma-gallery-heading">
                Galeri Kegiatan MTs Al Muawanah
            </h2>

            <div class="alma-gallery-line"></div>

            <p class="text-muted mt-3 mb-0">
                Dokumentasi momen, kegiatan, dan aktivitas siswa
                MTs Al Muawanah.
            </p>
        </div>

        {{-- Daftar galeri --}}
        <div class="row g-4">

            @forelse($galeri ?? [] as $item)

                @php
                    $imgName = $item->foto
                        ?? $item->gambar
                        ?? $item->file
                        ?? null;

                    $filePath = '';

                    if (!empty($imgName)) {
                        if (file_exists(public_path('uploads/galeri/' . $imgName))) {
                            $filePath = asset('uploads/galeri/' . $imgName);
                        } elseif (file_exists(public_path('storage/galeri/' . $imgName))) {
                            $filePath = asset('storage/galeri/' . $imgName);
                        } elseif (file_exists(public_path('storage/' . $imgName))) {
                            $filePath = asset('storage/' . $imgName);
                        }
                    }

                    $extension = strtolower(
                        pathinfo($imgName ?? '', PATHINFO_EXTENSION)
                    );

                    $isVideo = in_array($extension, [
                        'mp4', 'mkv', 'avi', 'mov', 'webm'
                    ]) || (
                        isset($item->kategori)
                        && strtolower($item->kategori) === 'video'
                    );

                    $galeriId = $item->id_galeri
                        ?? $item->id
                        ?? $item->getKey();
                @endphp

                <div class="col-12 col-sm-6 col-lg-4">

                    <a
                        href="{{ route('landing.galeri.show', $galeriId) }}"
                        class="alma-gallery-link text-decoration-none d-block h-100"
                    >
                        <div class="card alma-gallery-card h-100">

                            {{-- Media galeri --}}
                            <div class="alma-gallery-media">

                                @if(!empty($filePath))

                                    @if($isVideo)

                                        <video
                                            class="pe-none"
                                            preload="metadata"
                                            muted
                                        >
                                            <source
                                                src="{{ $filePath }}"
                                                type="{{ $extension === 'webm' ? 'video/webm' : ($extension === 'mov' ? 'video/quicktime' : 'video/mp4') }}"
                                            >
                                        </video>

                                        <span class="alma-gallery-video-badge">
                                            <i class="fa-solid fa-video me-1"></i>
                                            VIDEO
                                        </span>

                                        <div class="alma-gallery-overlay">
                                            <i class="fa-solid fa-circle-play"></i>
                                        </div>

                                    @else

                                        <img
                                            src="{{ $filePath }}"
                                            alt="{{ $item->judul ?? 'Galeri MTs Al Muawanah' }}"
                                            loading="lazy"
                                            onerror="this.onerror=null; this.style.display='none'; this.nextElementSibling.style.display='flex';"
                                        >

                                        <div
                                            class="alma-gallery-overlay"
                                            style="display: none; opacity: 1; background: #eaf1ec; color: #087443;"
                                        >
                                            <i class="fa-solid fa-image"></i>
                                        </div>

                                    @endif

                                @else

                                    <div class="w-100 h-100 d-flex align-items-center justify-content-center">
                                        <i
                                            class="fa-solid fa-image"
                                            style="font-size: 48px; color: #087443;"
                                        ></i>
                                    </div>

                                @endif

                            </div>

                            {{-- Informasi galeri --}}
                            <div class="alma-gallery-body flex-grow-1">

                                <h6 class="alma-gallery-title mb-2">
                                    {{ $item->judul ?? 'Dokumentasi Kegiatan' }}
                                </h6>

                                @if(!empty($item->keterangan))
                                    <p class="alma-gallery-description mb-0">
                                        {{ \Illuminate\Support\Str::limit($item->keterangan, 100) }}
                                    </p>
                                @else
                                    <p class="alma-gallery-description mb-0">
                                        Dokumentasi kegiatan MTs Al Muawanah.
                                    </p>
                                @endif

                                <div
                                    class="mt-3 fw-semibold small"
                                    style="color: var(--alma-green);"
                                >
                                    Lihat dokumentasi
                                    <i class="fa-solid fa-arrow-right ms-1"></i>
                                </div>

                            </div>

                        </div>
                    </a>

                </div>

            @empty

                <div class="col-12 text-center">
                    <div class="alma-gallery-empty">
                        <i class="fa-regular fa-images mb-3"></i>

                        <h5 class="fw-bold" style="color: var(--alma-dark);">
                            Belum Ada Dokumentasi
                        </h5>

                        <p class="text-muted mb-0">
                            Galeri kegiatan MTs Al Muawanah belum tersedia.
                        </p>
                    </div>
                </div>

            @endforelse

        </div>
    </div>
</div>

@endsection