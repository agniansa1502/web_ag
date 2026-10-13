@extends('admin.layout')

@section('title', 'Galeri')
@section('page-title', 'Kelola Galeri Foto & Video')

@section('content')
<div class="admin-card">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="m-0">Galeri Media</h4>
        <a href="{{ route('admin.galeri.create') }}" class="btn btn-success">
            <i class="bi bi-plus-lg"></i> Upload Media
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="row g-4">
    @forelse($galeri as $item)
        <div class="col-md-3">
            <div class="card h-100 shadow-sm border-0">
                @if($item->kategori == 'Foto')
                    <img src="{{ asset('storage/'.$item->file) }}" class="card-img-top object-fit-cover" style="height: 180px;">
                @else
                    <div class="bg-dark text-white d-flex align-items-center justify-content-center" style="height: 180px;">
                        <i class="bi bi-play-circle fs-1"></i>
                    </div>
                @endif
                <div class="card-body p-3">
                    <span class="badge bg-emerald-700 mb-2">{{ $item->kategori }}</span>
                    <h6 class="card-title text-truncate mb-1">{{ $item->judul }}</h6>
                    <small class="text-muted d-block mb-3">{{ $item->tanggal }}</small>
                    <form action="{{ route('admin.galeri.destroy', $item->id_galeri) }}" method="POST" onsubmit="return confirm('Hapus media ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger btn-sm w-100">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12 text-center py-5 text-muted">Belum ada file di dalam galeri.</div>
    @endforelse
    </div>
</div>
@endsection