@extends('layouts.app')

@section('content')

<style>
    :root {
        --guru-hijau: #087443;
        --guru-hijau-muda: #0ca968;
        --guru-hijau-gelap: #064e32;
        --guru-emas: #f4c542;
    }

    .guru-page {
        padding-top: 25px;
        padding-bottom: 35px;
    }

    .guru-heading {
        color: var(--guru-hijau-gelap);
        font-weight: 800;
        margin-bottom: 5px;
    }

    .guru-subtitle {
        color: #718096;
        font-size: 14px;
        margin-bottom: 0;
    }

    .guru-divider {
        border: 0;
        height: 3px;
        background: var(--guru-emas);
        opacity: 1;
        border-radius: 5px;
        margin: 22px 0;
    }

    .guru-search .form-control {
        border: 1px solid #dce8df;
        border-radius: 10px 0 0 10px;
        padding: 11px 14px;
    }

    .guru-search .form-control:focus {
        border-color: var(--guru-hijau-muda);
        box-shadow: 0 0 0 .15rem rgba(12, 169, 104, .12);
    }

    .btn-guru {
        background: var(--guru-hijau);
        color: white;
        border: 1px solid var(--guru-hijau);
        border-radius: 9px;
        padding: 10px 16px;
        font-weight: 700;
        transition: .2s ease;
    }

    .btn-guru:hover {
        background: var(--guru-hijau-gelap);
        border-color: var(--guru-hijau-gelap);
        color: white;
        transform: translateY(-1px);
    }

    .guru-card {
        background: #fff;
        border: none;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 5px 22px rgba(6, 78, 50, .08);
        transition: transform .25s ease, box-shadow .25s ease;
    }

    .guru-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 28px rgba(6, 78, 50, .14);
    }

    .guru-foto {
        height: 275px;
        position: relative;
        overflow: hidden;
        background: #edf5ef;
        border-bottom: 3px solid var(--guru-emas);
    }

    .guru-foto img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: top center;
        transition: transform .4s ease;
    }

    .guru-card:hover .guru-foto img {
        transform: scale(1.04);
    }

    .guru-foto-placeholder {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        height: 100%;
        color: var(--guru-hijau);
        background: linear-gradient(145deg, #f1f8f3, #e1f0e6);
    }

    .guru-foto-placeholder i {
        font-size: 65px;
        margin-bottom: 10px;
    }

    .guru-card-body {
        padding: 20px 16px;
    }

    .guru-nama {
        color: var(--guru-hijau-gelap);
        font-weight: 800;
        font-size: 17px;
        line-height: 1.4;
        overflow-wrap: anywhere;
    }

    .guru-mapel {
        display: inline-block;
        margin-top: 7px;
        padding: 6px 11px;
        border-radius: 20px;
        color: var(--guru-hijau);
        background: #edf8f0;
        font-size: 12px;
        font-weight: 700;
    }

    .guru-nip {
        color: #718096;
        font-size: 12px;
        margin-top: 12px;
        overflow-wrap: anywhere;
    }

    .guru-card-footer {
        display: flex;
        justify-content: center;
        gap: 8px;
        padding-top: 15px;
        margin-top: 15px;
        border-top: 1px solid #e9f0eb;
    }

    .btn-guru-edit,
    .btn-guru-hapus {
        border-radius: 8px;
        padding: 8px 14px;
        font-size: 13px;
        font-weight: 700;
        transition: .2s ease;
    }

    .btn-guru-edit {
        background: var(--guru-hijau);
        color: white;
        border: 1px solid var(--guru-hijau);
    }

    .btn-guru-edit:hover {
        background: var(--guru-hijau-gelap);
        color: white;
    }

    .btn-guru-hapus {
        background: #fff5d5;
        color: var(--guru-hijau-gelap);
        border: 1px solid #f4d77a;
    }

    .btn-guru-hapus:hover {
        background: #b42318;
        border-color: #b42318;
        color: white;
    }

    .guru-empty {
        background: #fff;
        border: 1px dashed #b8d8c3;
        border-radius: 16px;
        padding: 55px 20px;
        color: #718096;
    }

    .guru-empty i {
        color: var(--guru-hijau);
        font-size: 45px;
        margin-bottom: 15px;
    }

    .guru-pagination .pagination {
        gap: 4px;
    }

    .guru-pagination .page-link {
        color: var(--guru-hijau);
        border-radius: 7px;
        border-color: #dce8df;
    }

    .guru-pagination .active .page-link {
        background: var(--guru-hijau);
        border-color: var(--guru-hijau);
        color: white;
    }

    @media (max-width: 576px) {
        .guru-foto {
            height: 300px;
        }
    }
</style>

<div class="container guru-page">

    {{-- Header --}}
    <div class="row align-items-center g-3 mb-3">

        <div class="col-lg-4">
            <h3 class="guru-heading">
                <i class="fas fa-chalkboard-teacher me-2"></i>
                Data Guru
            </h3>

            <p class="guru-subtitle">
                Kelola data tenaga pendidik MTs Al Muawanah.
            </p>
        </div>

        <div class="col-lg-8">
            <div class="row g-2 justify-content-end">

                {{-- Pencarian --}}
                <div class="col-md-8">
                    <form action="{{ route('guru.index') }}"
                          method="GET"
                          class="guru-search">

                        <div class="input-group">
                            <input
                                type="search"
                                name="search"
                                class="form-control"
                                placeholder="Cari NIP, nama, atau mapel..."
                                value="{{ request('search') }}"
                            >

                            <button type="submit"
                                    class="btn btn-guru"
                                    style="border-radius: 0 10px 10px 0;">
                                <i class="fas fa-search me-1"></i>
                                Cari
                            </button>
                        </div>
                    </form>
                </div>

                {{-- Tambah guru --}}
                <div class="col-md-4">
                    <a href="{{ route('guru.create') }}"
                       class="btn btn-guru w-100">
                        <i class="fas fa-user-plus me-1"></i>
                        Tambah Guru
                    </a>
                </div>

            </div>
        </div>

    </div>

    <hr class="guru-divider">

    {{-- Notifikasi --}}
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

    {{-- Daftar guru --}}
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-xl-4 g-4">

        @forelse ($gurus as $item)

            <div class="col">

                <div class="card guru-card h-100">

                    {{-- Foto --}}
                    <div class="guru-foto">

                        @if($item->foto && file_exists(public_path('uploads/guru/' . $item->foto)))

                            <img
                                src="{{ asset('uploads/guru/' . $item->foto) }}"
                                alt="Foto {{ $item->nama_guru }}"
                                loading="lazy"
                            >

                        @else

                            <div class="guru-foto-placeholder">
                                <i class="fas fa-user-tie"></i>
                                <span class="fw-semibold">Foto belum tersedia</span>
                            </div>

                        @endif

                    </div>

                    {{-- Informasi guru --}}
                    <div class="card-body guru-card-body d-flex flex-column">

                        <div class="flex-grow-1">

                            <h5 class="guru-nama mb-0">
                                {{ $item->nama_guru }}
                            </h5>

                            <span class="guru-mapel">
                                <i class="fas fa-book-open me-1"></i>
                                {{ $item->mapel ?: 'Mata pelajaran belum diisi' }}
                            </span>

                            <div class="guru-nip">
                                <i class="fas fa-id-card me-1"></i>
                                NIP: {{ $item->nip ?: '-' }}
                            </div>

                        </div>

                        {{-- Tombol aksi --}}
                        <div class="guru-card-footer">

                            <a
                                href="{{ route('guru.edit', \Illuminate\Support\Facades\Crypt::encrypt($item->id_guru ?? $item->id)) }}"
                                class="btn btn-guru-edit"
                            >
                                <i class="fas fa-edit me-1"></i>
                                Edit
                            </a>

                            <form
                                action="{{ route('guru.destroy', \Illuminate\Support\Facades\Crypt::encrypt($item->id_guru ?? $item->id)) }}"
                                method="POST"
                                class="d-inline"
                                onsubmit="return confirm('Yakin ingin menghapus data guru ini?')"
                            >
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-guru-hapus">
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
                <div class="guru-empty text-center">

                    <i class="fas fa-users d-block"></i>

                    <h5 class="fw-bold mb-2">
                        @if(request('search'))
                            Data Guru Tidak Ditemukan
                        @else
                            Belum Ada Data Guru
                        @endif
                    </h5>

                    <p class="mb-3">
                        @if(request('search'))
                            Coba gunakan kata kunci pencarian yang berbeda.
                        @else
                            Silakan tambahkan data guru untuk ditampilkan di sini.
                        @endif
                    </p>

                    @if(request('search'))

                        <a href="{{ route('guru.index') }}" class="btn btn-guru">
                            <i class="fas fa-sync-alt me-1"></i>
                            Tampilkan Semua
                        </a>

                    @else

                        <a href="{{ route('guru.create') }}" class="btn btn-guru">
                            <i class="fas fa-user-plus me-1"></i>
                            Tambah Guru
                        </a>

                    @endif

                </div>
            </div>

        @endforelse

    </div>

    {{-- Pagination jika controller menggunakan paginate() --}}
    @if(method_exists($gurus, 'hasPages') && $gurus->hasPages())
        <div class="guru-pagination d-flex justify-content-end mt-4">
            {{ $gurus->appends(request()->query())->links() }}
        </div>
    @endif

</div>

@endsection
