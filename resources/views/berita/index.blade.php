@extends('layouts.app')

@section('content')
<style>
    :root {
        --berita-hijau: #087443;
        --berita-hijau-muda: #0ca968;
        --berita-hijau-gelap: #064e32;
        --berita-emas: #f4c542;
    }

    .berita-page {
        padding-top: 25px;
        padding-bottom: 35px;
    }

    .berita-heading {
        color: var(--berita-hijau-gelap);
        font-weight: 800;
        margin-bottom: 5px;
    }

    .berita-subtitle {
        color: #718096;
        font-size: 14px;
        margin-bottom: 0;
    }

    .berita-divider {
        height: 3px;
        background: var(--berita-emas);
        border: 0;
        border-radius: 5px;
        opacity: 1;
        margin: 22px 0;
    }

    .berita-search .form-control {
        min-width: 200px;
        border: 1px solid #dce8df;
        border-radius: 9px;
        padding: 10px 13px;
    }

    .berita-search .form-control:focus {
        border-color: var(--berita-hijau-muda);
        box-shadow: 0 0 0 .15rem rgba(12, 169, 104, .12);
    }

    .btn-berita {
        background: var(--berita-hijau);
        color: white;
        border: 1px solid var(--berita-hijau);
        border-radius: 9px;
        padding: 10px 16px;
        font-weight: 700;
        transition: .2s ease;
        text-decoration: none;
        white-space: nowrap;
    }

    .btn-berita:hover {
        background: var(--berita-hijau-gelap);
        border-color: var(--berita-hijau-gelap);
        color: white;
        transform: translateY(-1px);
    }

    .berita-card {
        background: white;
        border: none;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 5px 20px rgba(6, 78, 50, .07);
        transition: transform .2s ease, box-shadow .2s ease;
    }

    .berita-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 25px rgba(6, 78, 50, .12);
    }

    .berita-image {
        height: 230px;
        background: #f0f6f1;
        overflow: hidden;
        border-bottom: 3px solid var(--berita-emas);
    }

    .berita-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform .35s ease;
    }

    .berita-card:hover .berita-image img {
        transform: scale(1.035);
    }

    .berita-no-image {
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        color: #718096;
        background: linear-gradient(145deg, #f3f8f4, #e5f1e8);
        font-size: 13px;
        font-weight: 600;
    }

    .berita-no-image i {
        color: var(--berita-hijau);
        font-size: 42px;
        margin-bottom: 10px;
    }

    .berita-card-body {
        padding: 23px;
    }

    .berita-meta {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        gap: 9px;
        margin-bottom: 12px;
        color: #718096;
        font-size: 12px;
    }

    .berita-status {
        display: inline-block;
        padding: 6px 11px;
        border-radius: 20px;
        font-size: 11px;
        font-weight: 800;
    }

    .berita-status-publis {
        color: #087443;
        background: #e3f5e9;
        border: 1px solid #b8e4c5;
    }

    .berita-status-draf {
        color: #765b13;
        background: #fff5d5;
        border: 1px solid #f4df94;
    }

    .berita-title {
        color: var(--berita-hijau-gelap);
        font-size: 20px;
        font-weight: 800;
        line-height: 1.4;
        overflow-wrap: anywhere;
    }

    .berita-excerpt {
        color: #667085;
        font-size: 14px;
        line-height: 1.8;
        overflow-wrap: anywhere;
    }

    .berita-author {
        color: var(--berita-hijau);
        font-weight: 700;
    }

    .berita-card-footer {
        display: flex;
        flex-wrap: wrap;
        gap: 9px;
        padding-top: 16px;
        margin-top: 15px;
        border-top: 1px solid #e8f0ea;
    }

    .btn-berita-edit,
    .btn-berita-hapus {
        border-radius: 8px;
        padding: 8px 16px;
        font-size: 13px;
        font-weight: 700;
        transition: .2s ease;
    }

    .btn-berita-edit {
        color: white;
        background: var(--berita-hijau);
        border: 1px solid var(--berita-hijau);
    }

    .btn-berita-edit:hover {
        color: white;
        background: var(--berita-hijau-gelap);
    }

    .btn-berita-hapus {
        color: #8a2626;
        background: #fff0ee;
        border: 1px solid #f4c7c1;
    }

    .btn-berita-hapus:hover {
        color: white;
        background: #b42318;
        border-color: #b42318;
    }

    .berita-empty {
        background: white;
        border: 1px dashed #b8d8c3;
        border-radius: 15px;
        padding: 50px 20px;
        color: #718096;
    }

    .berita-empty i {
        display: block;
        font-size: 45px;
        color: var(--berita-hijau);
        margin-bottom: 15px;
    }

    @media (max-width: 767px) {
        .berita-toolbar {
            align-items: stretch !important;
        }

        .berita-toolbar-actions {
            width: 100%;
            flex-direction: column;
            align-items: stretch !important;
        }

        .berita-search {
            width: 100%;
        }

        .berita-search .form-control {
            min-width: 0;
            width: 100%;
        }

        .berita-toolbar-actions > a {
            text-align: center;
        }

        .berita-image {
            height: 220px;
        }

        .berita-card-body {
            padding: 19px;
        }

        .berita-title {
            font-size: 18px;
        }
    }
</style>

<div class="container berita-page">

    {{-- JUDUL DAN PENCARIAN --}}
    <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 berita-toolbar">

        <div>
            <h3 class="berita-heading">
                <i class="fas fa-newspaper me-2"></i>
                Data Berita
            </h3>

            <p class="berita-subtitle">
                Kelola berita dan informasi MTs Al Muawanah.
            </p>
        </div>

        <div class="d-flex align-items-center gap-2 berita-toolbar-actions">

            <form action="{{ route('berita.index') }}"
                method="GET"
                class="d-flex align-items-center gap-2 mb-0 berita-search">

                <input
                    type="search"
                    name="search"
                    class="form-control"
                    placeholder="Cari judul berita..."
                    value="{{ request('search') }}">

                <button type="submit" class="btn btn-berita">
                    <i class="fas fa-search me-1"></i>
                    Cari
                </button>
            </form>

            <a href="{{ route('berita.create') }}" class="btn btn-berita">
                <i class="fas fa-plus me-1"></i>
                Tambah Berita
            </a>

        </div>
    </div>

    <hr class="berita-divider">

    {{-- PESAN BERHASIL --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show rounded-3" role="alert">
            <i class="fas fa-check-circle me-2"></i>
            {{ session('success') }}

            <button type="button" class="btn-close"
                data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- DAFTAR BERITA --}}
    <div class="row g-4">

        @forelse($berita as $item)
            <div class="col-12">

                <div class="card berita-card">
                    <div class="row g-0">

                        {{-- GAMBAR BERITA --}}
                        <div class="col-md-4 col-lg-3">
                            <div class="berita-image">

                                @if($item->gambar && file_exists(public_path('uploads/berita/' . $item->gambar)))
                                    <img
                                        src="{{ asset('uploads/berita/' . $item->gambar) }}"
                                        alt="{{ $item->judul }}"
                                        loading="lazy">
                                @else
                                    <div class="berita-no-image">
                                        <i class="fas fa-image"></i>
                                        <span>Gambar belum tersedia</span>
                                    </div>
                                @endif

                            </div>
                        </div>

                        {{-- DETAIL BERITA --}}
                        <div class="col-md-8 col-lg-9">
                            <div class="card-body berita-card-body">

                                <div class="berita-meta">

                                    @if($item->status == 'publis')
                                        <span class="berita-status berita-status-publis">
                                            <i class="fas fa-check-circle me-1"></i>
                                            Publis
                                        </span>
                                    @else
                                        <span class="berita-status berita-status-draf">
                                            <i class="fas fa-file-alt me-1"></i>
                                            Draf
                                        </span>
                                    @endif

                                    <span>
                                        <i class="fas fa-calendar-alt me-1"></i>
                                        {{ $item->tanggal ? \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y') : '-' }}
                                    </span>

                                    <span>
                                        <i class="fas fa-user me-1"></i>
                                        Oleh:
                                        <strong class="berita-author">
                                            {{ $item->user->username ?? $item->user->name ?? $item->user->nama ?? '-' }}
                                        </strong>
                                    </span>

                                </div>

                                <h4 class="berita-title mb-2">
                                    {{ $item->judul }}
                                </h4>

                                <p class="berita-excerpt mb-0">
                                    {{ \Illuminate\Support\Str::limit(strip_tags($item->isi), 150, '...') }}
                                </p>

                                {{-- TOMBOL AKSI --}}
                                <div class="berita-card-footer">

                                    <a href="{{ route('berita.edit', \Illuminate\Support\Facades\Crypt::encrypt($item->id_berita ?? $item->id)) }}"
                                        class="btn btn-berita-edit">
                                        <i class="fas fa-edit me-1"></i>
                                        Edit
                                    </a>

                                    <form
                                        action="{{ route('berita.destroy', \Illuminate\Support\Facades\Crypt::encrypt($item->id_berita ?? $item->id)) }}"
                                        method="POST"
                                        class="d-inline"
                                        onsubmit="return confirm('Yakin ingin menghapus berita ini?')">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-berita-hapus">
                                            <i class="fas fa-trash-alt me-1"></i>
                                            Hapus
                                        </button>
                                    </form>

                                </div>

                            </div>
                        </div>

                    </div>
                </div>

            </div>

        @empty

            <div class="col-12">
                <div class="berita-empty text-center">

                    <i class="fas fa-newspaper"></i>

                    <h5 class="fw-bold mb-2" style="color:#064e32;">
                        @if(request('search'))
                            Berita Tidak Ditemukan
                        @else
                            Data Berita Belum Tersedia
                        @endif
                    </h5>

                    <p class="mb-3">
                        @if(request('search'))
                            Coba gunakan kata kunci pencarian yang berbeda.
                        @else
                            Silakan tambahkan berita untuk ditampilkan di sini.
                        @endif
                    </p>

                    @if(request('search'))
                        <a href="{{ route('berita.index') }}" class="btn btn-berita">
                            <i class="fas fa-sync-alt me-1"></i>
                            Tampilkan Semua
                        </a>
                    @else
                        <a href="{{ route('berita.create') }}" class="btn btn-berita">
                            <i class="fas fa-plus me-1"></i>
                            Tambah Berita
                        </a>
                    @endif

                </div>
            </div>

        @endforelse

    </div>

    {{-- PAGINATION JIKA BERITA MENGGUNAKAN PAGINATE --}}
    @if(method_exists($berita, 'hasPages') && $berita->hasPages())
        <div class="d-flex justify-content-end mt-4">
            {{ $berita->appends(request()->query())->links() }}
        </div>
    @endif

</div>
@endsection