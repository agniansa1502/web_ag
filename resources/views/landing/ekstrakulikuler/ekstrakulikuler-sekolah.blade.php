@extends('landing.layouts.app')

@section('title', 'Ekstrakurikuler | MTs Al Muawanah')

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

    .alma-ekskul-title {
        color: var(--alma-dark);
        font-weight: 800;
    }

    .alma-ekskul-line {
        width: 75px;
        height: 4px;
        background: var(--alma-gold);
        border-radius: 10px;
        margin: 14px auto;
    }

    .alma-ekskul-card {
        border: none;
        border-radius: 16px;
        overflow: hidden;
        background: #fff;
        box-shadow: 0 5px 20px rgba(7, 92, 54, 0.08);
        transition: transform 0.25s ease, box-shadow 0.25s ease;
    }

    .alma-ekskul-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 12px 28px rgba(7, 92, 54, 0.15);
    }

    .alma-ekskul-image-wrapper {
        height: 200px;
        background: linear-gradient(135deg, #eaf7ef, #d4efdf);
        overflow: hidden;
        border-bottom: 3px solid var(--alma-gold);
    }

    .alma-ekskul-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.35s ease;
    }

    .alma-ekskul-card:hover .alma-ekskul-image {
        transform: scale(1.05);
    }

    .alma-ekskul-placeholder {
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--alma-green);
        font-size: 55px;
    }

    .alma-ekskul-name {
        color: var(--alma-dark);
        font-weight: 700;
        line-height: 1.5;
        min-height: 48px;
    }

    .btn-alma-detail {
        background: var(--alma-green);
        color: #fff;
        border: 2px solid var(--alma-green);
        border-radius: 30px;
        padding: 9px 14px;
        font-size: 13px;
        font-weight: 600;
        transition: all 0.2s ease;
    }

    .btn-alma-detail:hover {
        background: var(--alma-dark);
        border-color: var(--alma-dark);
        color: #fff;
    }

    .alma-ekskul-empty {
        background: #fff;
        border: 1px dashed #b7d9c3;
        border-radius: 16px;
        padding: 45px 20px;
    }

    .alma-ekskul-empty-icon {
        font-size: 48px;
        color: var(--alma-green);
    }
</style>

<div class="alma-ekskul-section">
    <div class="container py-5">

        {{-- Judul halaman --}}
        <div class="text-center mb-5">
            <span class="badge rounded-pill px-3 py-2 mb-2"
                  style="background: #eaf7ef; color: #087443;">
                MTs Al Muawanah
            </span>

            <h2 class="alma-ekskul-title">
                <i class="fa-solid fa-people-group me-2"></i>
                Ekstrakurikuler
            </h2>

            <div class="alma-ekskul-line"></div>

            <p class="text-muted mb-0">
                Wadah pengembangan bakat, minat, kreativitas, dan potensi
                siswa MTs Al Muawanah.
            </p>
        </div>

        {{-- Mengambil data ekstrakurikuler --}}
        @php
            $dataEkskul = $ekstrakulikuler
                ?? $ekskuls
                ?? \App\Models\Ekstrakulikuler::all();
        @endphp

        <div class="row g-4">

            @forelse ($dataEkskul as $ekskul)

                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="card alma-ekskul-card h-100 d-flex flex-column">

                        {{-- Gambar ekskul --}}
                        <div class="alma-ekskul-image-wrapper">

                            @if (!empty($ekskul->gambar) && file_exists(public_path('uploads/ekskul/' . $ekskul->gambar)))
                                <img
                                    src="{{ asset('uploads/ekskul/' . $ekskul->gambar) }}"
                                    class="alma-ekskul-image"
                                    alt="{{ $ekskul->nama_eskul ?? $ekskul->nama_ekskul ?? $ekskul->nama ?? 'Ekstrakurikuler' }}"
                                    loading="lazy"
                                >

                            @elseif (!empty($ekskul->gambar) && file_exists(public_path('storage/' . $ekskul->gambar)))
                                <img
                                    src="{{ asset('storage/' . $ekskul->gambar) }}"
                                    class="alma-ekskul-image"
                                    alt="{{ $ekskul->nama_eskul ?? $ekskul->nama_ekskul ?? $ekskul->nama ?? 'Ekstrakurikuler' }}"
                                    loading="lazy"
                                >

                            @else
                                <div class="alma-ekskul-placeholder">
                                    <i class="fa-solid fa-people-group"></i>
                                </div>
                            @endif

                        </div>

                        {{-- Nama ekstrakurikuler --}}
                        <div class="card-body p-3 text-center">
                            <h5 class="alma-ekskul-name mb-0">
                                {{ $ekskul->nama_eskul ?? $ekskul->nama_ekskul ?? $ekskul->nama ?? 'Ekstrakurikuler' }}
                            </h5>
                        </div>

                        {{-- Tombol detail --}}
                        <div class="p-3 pt-0 mt-auto">
                            <a
                                href="{{ route('landing.ekskul.show', $ekskul->id_eskul ?? $ekskul->getKey()) }}"
                                class="btn btn-alma-detail w-100"
                            >
                                Lihat Detail
                                <i class="fa-solid fa-arrow-right ms-1"></i>
                            </a>
                        </div>

                    </div>
                </div>

            @empty

                <div class="col-12">
                    <div class="alma-ekskul-empty text-center">
                        <i class="fa-solid fa-people-group alma-ekskul-empty-icon"></i>

                        <h5 class="fw-bold mt-3" style="color: #075c36;">
                            Belum Ada Data Ekstrakurikuler
                        </h5>

                        <p class="text-muted mb-0">
                            Data kegiatan ekstrakurikuler MTs Al Muawanah
                            akan ditampilkan di halaman ini.
                        </p>
                    </div>
                </div>

            @endforelse

        </div>
    </div>
</div>

@endsection