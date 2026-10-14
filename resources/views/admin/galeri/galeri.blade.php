@extends('admin')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold mb-1">Galeri Sekolah</h2>
            <p class="text-muted mb-0">
                Kelola dokumentasi kegiatan dan foto sekolah.
            </p>
        </div>

        <a href="{{ route('admin.galeri.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i>
            Tambah Foto
        </a>
    </div>

    {{-- Pesan berhasil --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Pesan error --}}
    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Search --}}
    <form action="{{ route('admin.galeri') }}" method="GET" class="mb-4">
        <div class="input-group">

            <input
                type="text"
                name="search"
                value="{{ $search }}"
                class="form-control"
                placeholder="Cari galeri..."
            >

            <button class="btn btn-primary" type="submit">
                <i class="fas fa-search"></i>
                Cari
            </button>

            @if($search)
                <a href="{{ route('admin.galeri') }}"
                   class="btn btn-secondary">
                    Reset
                </a>
            @endif

        </div>
    </form>

    {{-- Galeri --}}
    <div class="row">

        @forelse($galeris as $galeri)

            <div class="col-md-6 col-lg-3 mb-4">

                <div class="card h-100 shadow-sm">

                    {{-- Foto --}}
                    <img
                        src="{{ asset('storage/' . $galeri->foto) }}"
                        class="card-img-top"
                        style="height: 170px; object-fit: cover;"
                        alt="{{ $galeri->judul }}"
                    >

                    <div class="card-body">

                        <h5 class="card-title fw-bold">
                            {{ $galeri->judul }}
                        </h5>

                        <p class="card-text text-muted">
                            {{ $galeri->deskripsi ?: 'Tidak ada deskripsi.' }}
                        </p>

                    </div>

                    <div class="card-footer bg-white border-0 pb-3">

                        <a
                            href="{{ route('admin.galeri.edit', $galeri->encrypted_id) }}"
                            class="btn btn-warning btn-sm"
                        >
                            <i class="fas fa-edit"></i>
                            Edit
                        </a>

                        <form
                            action="{{ route('admin.galeri.destroy', $galeri->encrypted_id) }}"
                            method="POST"
                            class="d-inline"
                            onsubmit="return confirm('Yakin ingin menghapus foto ini?')"
                        >

                            @csrf
                            @method('DELETE')

                            <button
                                type="submit"
                                class="btn btn-danger btn-sm"
                            >
                                <i class="fas fa-trash"></i>
                                Hapus
                            </button>

                        </form>

                    </div>

                </div>

            </div>

        @empty

            <div class="col-12">

                <div class="text-center p-5 bg-light rounded">

                    <i class="fas fa-images fa-3x text-muted mb-3"></i>

                    <h5>Belum ada foto</h5>

                    @if($search)
                        <p class="text-muted">
                            Tidak ditemukan galeri dengan kata
                            "{{ $search }}".
                        </p>
                    @else
                        <p class="text-muted">
                            Silakan tambahkan foto kegiatan sekolah.
                        </p>
                    @endif

                </div>

            </div>

        @endforelse

    </div>

</div>

@endsection