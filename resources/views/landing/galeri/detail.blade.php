```blade
@extends('landing.layouts.app')

@section('title', ($galeri->judul ?? 'Detail Galeri') . ' | MTs Al Muawanah')

@section('content')

<style>
    :root {
        --alma-green: #087443;
        --alma-dark: #075c36;
        --alma-light: #eaf7ef;
        --alma-gold: #f4c542;
    }

    .alma-galeri-section {
        background: #f8fbf9;
        min-height: 70vh;
    }

    .alma-galeri-card {
        border: none;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 8px 30px rgba(7, 92, 54, 0.09);
    }

    .alma-galeri-top {
        height: 6px;
        background: linear-gradient(
            90deg,
            var(--alma-green),
            var(--alma-gold),
            var(--alma-green)
        );
    }

    .alma-galeri-media {
        width: 100%;
        min-height: 280px;
        max-height: 450px;
        background: #10251a;
        border-radius: 15px;
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .alma-galeri-media img,
    .alma-galeri-media video {
        display: block;
        width: 100%;
        max-height: 450px;
        object-fit: contain;
    }

    .alma-galeri-placeholder {
        color: #fff;
        padding: 55px 20px;
        text-align: center;
    }

    .alma-galeri-placeholder i {
        font-size: 55px;
        color: var(--alma-gold);
    }

    .alma-galeri-badge {
        display: inline-block;
        background: var(--alma-light);
        color: var(--alma-green);
        border: 1px solid #d5ebdc;
        border-radius: 30px;
        padding: 9px 16px;
        font-size: 12px;
        font-weight: 700;
        letter-spacing: 0.5px;
    }

    .alma-galeri-title {
        color: var(--alma-dark);
        font-weight: 800;
        line-height: 1.4;
        overflow-wrap: anywhere;
    }

    .alma-galeri-date {
        color: #6c757d;
        font-size: 14px;
    }

    .alma-galeri-date i {
        color: var(--alma-green);
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
        transform: translateY(-2px);
    }

    @media (max-width: 576px) {
        .alma-galeri-media {
            min-height: 220px;
        }

        .alma-galeri-title {
            font-size: 1.5rem;
        }
    }
</style>

<div class="alma-galeri-section">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-9 col-md-11">

                <div class="card alma-galeri-card bg-white">
                    <div class="alma-galeri-top"></div>

                    <div class="card-body p-3 p-md-5">

                        @php
                            $fileName = $galeri->foto
                                ?? $galeri->gambar
                                ?? $galeri->file
                                ?? null;

                            $filePath = '';

                            if (!empty($fileName)) {
                                if (file_exists(public_path('uploads/galeri/' . $fileName))) {
                                    $filePath = asset('uploads/galeri/' . $fileName);
                                } elseif (file_exists(public_path('storage/galeri/' . $fileName))) {
                                    $filePath = asset('storage/galeri/' . $fileName);
                                } elseif (file_exists(public_path('storage/' . $fileName))) {
                                    $filePath = asset('storage/' . $fileName);
                                }
                            }

                            $extension = strtolower(
                                pathinfo($fileName ?? '', PATHINFO_EXTENSION)
                            );

                            $isVideo = in_array($extension, [
                                'mp4', 'mkv', 'avi', 'mov', 'webm'
                            ]) || (
                                isset($galeri->kategori)
                                && strtolower($galeri->kategori) === 'video'
                            );

                            $videoTypes = [
                                'mp4' => 'video/mp4',
                                'webm' => 'video/webm',
                                'mov' => 'video/quicktime',
                                'mkv' => 'video/x-matroska',
                                'avi' => 'video/x-msvideo',
                            ];

                            $videoType = $videoTypes[$extension] ?? 'video/mp4';
                        @endphp

                        {{-- Gambar atau video galeri --}}
                        <div class="alma-galeri-media mb-4">

                            @if (!empty($filePath))

                                @if ($isVideo)
                                    <video controls preload="metadata">
                                        <source
                                            src="{{ $filePath }}"
                                            type="{{ $videoType }}"
                                        >
                                        Browser Anda tidak mendukung pemutar video.
                                    </video>
                                @else
                                    <img
                                        src="{{ $filePath }}"
                                        alt="{{ $galeri->judul ?? 'Galeri MTs Al Muawanah' }}"
                                    >
                                @endif

                            @else
                                <div class="alma-galeri-placeholder">
                                    <i class="fa-solid fa-image mb-3"></i>
                                    <p class="mb-0">Media galeri tidak ditemukan.</p>
                                </div>
                            @endif

                        </div>

                        {{-- Informasi galeri --}}
                        <div>
                            <span class="alma-galeri-badge mb-3">
                                <i class="fa-solid fa-images me-2"></i>
                                DOKUMENTASI MTs AL MUAWANAH
                            </span>

                            <h2 class="alma-galeri-title mt-3 mb-3">
                                {{ $galeri->judul ?? 'Dokumentasi Kegiatan Sekolah' }}
                            </h2>

                            {{-- Tanggal dan tombol kembali --}}
                            <div class="d-flex align-items-center justify-content-between flex-wrap gap-3 mt-4 pt-4 border-top">

                                <small class="alma-galeri-date">
                                    <i class="fa-solid fa-calendar-days me-2"></i>
                                    {{ \Carbon\Carbon::parse($galeri->tanggal ?? $galeri->created_at ?? now())->translatedFormat('d F Y') }}
                                </small>

                                <a
                                    href="{{ route('landing.galeri') }}"
                                    class="btn btn-alma-back"
                                >
                                    <i class="fa-solid fa-arrow-left me-2"></i>
                                    Kembali ke Galeri
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
```