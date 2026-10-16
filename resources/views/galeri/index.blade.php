@extends('layouts.app')

@section('content')

<style>
    :root {
        --galeri-hijau: #087443;
        --galeri-hijau-muda: #0ca968;
        --galeri-hijau-gelap: #064e32;
        --galeri-emas: #f4c542;
        --galeri-bg: #f5f9f6;
    }

    .galeri-page {
        padding-top: 25px;
        padding-bottom: 35px;
    }

    .galeri-heading {
        color: var(--galeri-hijau-gelap);
        font-weight: 800;
        margin-bottom: 5px;
    }

    .galeri-subtitle {
        color: #718096;
        font-size: 14px;
        margin-bottom: 0;
    }

    .galeri-search .form-control {
        border-radius: 10px 0 0 10px;
        border-color: #dce8df;
        padding: 11px 14px;
    }

    .galeri-search .form-control:focus {
        border-color: var(--galeri-hijau-muda);
        box-shadow: 0 0 0 0.15rem rgba(12, 169, 104, .12);
    }

    .btn-galeri {
        background: var(--galeri-hijau);
        color: #fff;
        border: 1px solid var(--galeri-hijau);
        border-radius: 9px;
        font-weight: 600;
        padding: 10px 16px;
        transition: .2s ease;
    }

    .btn-galeri:hover {
        background: var(--galeri-hijau-gelap);
        border-color: var(--galeri-hijau-gelap);
        color: #fff;
        transform: translateY(-1px);
    }

    .btn-galeri-search {
        border-radius: 0 10px 10px 0;
    }

    .galeri-divider {
        border: 0;
        height: 3px;
        background: var(--galeri-emas);
        opacity: 1;
        border-radius: 5px;
        margin: 22px 0;
    }

    .galeri-card {
        border: 0;
        border-radius: 16px;
        background: #fff;
        overflow: hidden;
        box-shadow: 0 5px 22px rgba(6, 78, 50, .08);
        transition: transform .25s ease, box-shadow .25s ease;
    }

    .galeri-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 28px rgba(6, 78, 50, .14);
    }

    .galeri-media {
        height: 210px;
        overflow: hidden;
        position: relative;
        background: #eaf2ed;
    }

    .galeri-media img,
    .galeri-media video {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .galeri-media img {
        transition: transform .4s ease;
    }

    .galeri-card:hover .galeri-media img {
        transform: scale(1.05);
    }

    .galeri-placeholder {
        color: var(--galeri-hijau);
        background: #edf6f0;
    }

    .galeri-badge {
        position: absolute;
        top: 12px;
        right: 12px;
        border-radius: 8px;
        padding: 7px 11px;
        font-size: 11px;
        font-weight: 700;
        letter-spacing: .4px;
        box-shadow: 0 3px 10px rgba(0, 0, 0, .12);
    }

    .badge-foto {
        background: var(--galeri-emas);
        color: var(--galeri-hijau-gelap);
    }

    .badge-video {
        background: var(--galeri-hijau);
        color: #fff;
    }

    .galeri-card-body {
        padding: 18px;
    }

    .galeri-tanggal {
        color: #84918a;
        font-size: 12px;
        display: block;
        margin-bottom: 8px;
    }

    .galeri-judul {
        color: var(--galeri-hijau-gelap);
        font-size: 17px;
        font-weight: 800;
        line-height: 1.4;
        overflow-wrap: anywhere;
    }

    .galeri-keterangan {
        color: #68766e;
        font-size: 13px;
        line-height: 1.6;
        overflow-wrap: anywhere;
    }

    .galeri-card-footer {
        display: flex;
        gap: 8px;
        padding-top: 15px;
        margin-top: 15px;
        border-top: 1px solid #e9f0eb;
    }

    .btn-galeri-edit,
    .btn-galeri-hapus {
        border-radius: 8px;
        padding: 8px 13px;
        font-size: 13px;
        font-weight: 600;
        transition: .2s ease;
    }

    .btn-galeri-edit {
        color: #fff;
        background: var(--galeri-hijau);
        border: 1px solid var(--galeri-hijau);
    }

    .btn-galeri-edit:hover {
        color: #fff;
        background: var(--galeri-hijau-gelap);
    }

    .btn-galeri-hapus {
        color: var(--galeri-hijau-gelap);
        background: #fff5d5;
        border: 1px solid #f4d77a;
    }

    .btn-galeri-hapus:hover {
        color: #fff;
        background: #b42318;
        border-color: #b42318;
    }

    .galeri-empty {
        background: #fff;
        border: 1px dashed #b8d8c3;
        border-radius: 16px;
        padding: 55px 20px;
        color: #718096;
    }

    .galeri-empty i {
        color: var(--galeri-hijau);
        font-size: 45px;
        margin-bottom: 15px;
    }

    .galeri-pagination nav {
        display: flex;
        justify-content: end;
    }

    .galeri-pagination .pagination {
        margin-bottom: 0;
        gap: 4px;
    }

    .galeri-pagination .page-link {
        color: var(--galeri-hijau);
        border-radius: 7px;
        border-color: #dce8df;
    }

    .galeri-pagination .active .page-link {
        background: var(--galeri-hijau);
        border-color: var(--galeri-hijau);
        color: #fff;
    }

    @media (max-width: 767px) {
        .galeri-media {
            height: 230px;
        }

        .galeri-pagination nav {
            justify-content: center;
        }
    }
</style>

<div class="container galeri-page">

    {{-- Header --}}
    <div class="row align-items-center g-3 mb-3">
        <div class="col-lg-4">
            <h3 class="galeri-heading">
                <i class="fas fa-images me-2"></i>Data Galeri
            </h3>
            <p class="galeri-subtitle">
                Dokumentasi foto dan video MTs Al Muawanah.
            </p>
        </div>

        <div class="col-lg-8">
            <div class="row g-2 justify-content-end">

                {{-- Search --}}
                <div class="col-md-8">
                    <form action="{{ route('galeri.index') }}"
                          method="GET"
                          class="galeri-search">

                        <div class="input-group">
                            <input
                                type="search"
                                name="search"
                                class="form-control"
                                placeholder="Cari judul atau kategori..."
                                value="{{ request('search') }}"
                            >

                            <button type="submit"
                                    class="btn btn-galeri btn-galeri-search">
                                <i class="fas fa-search me-1"></i>
                                Cari
                            </button>
                        </div>
                    </form>
                </div>

                {{-- Tambah --}}
                <div class="col-md-4">
                    <a href="{{ route('galeri.create') }}"
                       class="btn btn-galeri w-100">
                        <i class="fas fa-plus me-1"></i>
                        Tambah Galeri
                    </a>
                </div>

            </div>
        </div>
    </div>

    <hr class="galeri-divider">

    {{-- Notifikasi sukses --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show rounded-3"
             role="alert">
            <i class="fas fa-check-circle me-2"></i>
            {{ session('success') }}

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert"
                    aria-label="Close"></button>
        </div>
    @endif

    {{-- Daftar galeri --}}
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-xl-4 g-4">

        @forelse ($galeris as $item)

            <div class="col">
                <div class="card galeri-card h-100">

                    {{-- Media --}}
                    <div class="galeri-media">

                        @if($item->kategori == 'Video')

                            @if($item->file && file_exists(public_path('uploads/galeri/' . $item->file)))
                                <video controls preload="metadata">
                                    <source
                                        src="{{ asset('uploads/galeri/' . $item->file) }}"
                                        type="{{ strtolower(pathinfo($item->file, PATHINFO_EXTENSION)) === 'mkv' ? 'video/x-matroska' : 'video/mp4' }}"
                                    >
                                    Browser tidak mendukung pemutaran video.
                                </video>
                            @else
                                <div class="galeri-placeholder h-100 d-flex flex-column align-items-center justify-content-center">
                                    <i class="fas fa-video fa-3x mb-2"></i>
                                    <span class="fw-semibold">Video tidak tersedia</span>
                                </div>
                            @endif

                        @else

                            @if($item->file && file_exists(public_path('uploads/galeri/' . $item->file)))
                                <img
                                    src="{{ asset('uploads/galeri/' . $item->file) }}"
                                    alt="{{ $item->judul }}"
                                    loading="lazy"
                                >
                            @else
                                <div class="galeri-placeholder h-100 d-flex flex-column align-items-center justify-content-center">
                                    <i class="fas fa-image fa-3x mb-2"></i>
                                    <span class="fw-semibold">Gambar tidak tersedia</span>
                                </div>
                            @endif

                        @endif

                        {{-- Kategori --}}
                        <span class="galeri-badge {{ $item->kategori == 'Foto' ? 'badge-foto' : 'badge-video' }}">
                            @if($item->kategori == 'Foto')
                                <i class="fas fa-camera me-1"></i>
                            @else
                                <i class="fas fa-video me-1"></i>
                            @endif

                            {{ $item->kategori }}
                        </span>

                    </div>

                    {{-- Informasi --}}
                    <div class="card-body galeri-card-body d-flex flex-column">

                        <div class="flex-grow-1">

                            <small class="galeri-tanggal">
                                <i class="far fa-calendar-alt me-1"></i>

                                {{ $item->tanggal
                                    ? \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y')
                                    : 'Tanggal tidak tersedia'
                                }}
                            </small>

                            <h5 class="galeri-judul mb-2">
                                {{ $item->judul }}
                            </h5>

                            <p class="galeri-keterangan mb-0">
                                {{ \Illuminate\Support\Str::limit($item->keteranngan ?? '', 80) }}
                            </p>

                        </div>

                        {{-- Aksi --}}
                        <div class="galeri-card-footer">

                            <a href="{{ route('galeri.edit', \Illuminate\Support\Facades\Crypt::encrypt($item->id_galeri)) }}"
                               class="btn btn-galeri-edit">
                                <i class="fas fa-edit me-1"></i>
                                Edit
                            </a>

                            <form
                                action="{{ route('galeri.destroy', \Illuminate\Support\Facades\Crypt::encrypt($item->id_galeri)) }}"
                                method="POST"
                                class="d-inline"
                                onsubmit="return confirm('Yakin ingin menghapus media ini?')"
                            >
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-galeri-hapus">
                                    <i class="fas fa-trash-alt me-1"></i>
                                    Hapus
                                </button>
                            </form>

                        </div>

                    </div>
                </div>
            </div>

        @empty

            <div class="col-12">
                <div class="galeri-empty text-center">
                    <i class="fas fa-images d-block"></i>

                    <h5 class="fw-bold mb-2">
                        @if(request('search'))
                            Data Galeri Tidak Ditemukan
                        @else
                            Belum Ada Data Galeri
                        @endif
                    </h5>

                    <p class="mb-3">
                        @if(request('search'))
                            Coba gunakan kata kunci pencarian yang berbeda.
                        @else
                            Silakan tambahkan foto atau video kegiatan sekolah.
                        @endif
                    </p>

                    @if(request('search'))
                        <a href="{{ route('galeri.index') }}"
                           class="btn btn-galeri">
                            <i class="fas fa-sync-alt me-1"></i>
                            Tampilkan Semua
                        </a>
                    @else
                        <a href="{{ route('galeri.create') }}"
                           class="btn btn-galeri">
                            <i class="fas fa-plus me-1"></i>
                            Tambah Galeri
                        </a>
                    @endif
                </div>
            </div>

        @endforelse

    </div>

    {{-- Pagination --}}
    @if($galeris->hasPages())
        <div class="galeri-pagination mt-4">
            {{ $galeris->appends(request()->query())->links() }}
        </div>
    @endif

</div>

@endsection