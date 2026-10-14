@extends('admin')

@section('content')

<div class="container-fluid pt-4 px-4">

    <div class="bg-white rounded shadow-sm p-4">

        {{-- Header --}}
        <div class="d-flex justify-content-between align-items-center mb-4">

            <div>
                <h4 class="fw-bold mb-1">
                    Detail Berita
                </h4>

                <p class="text-muted mb-0">
                    Informasi lengkap berita
                </p>
            </div>

            <a href="{{ route('admin.berita.index') }}"
               class="btn btn-secondary">
                <i class="fa fa-arrow-left me-1"></i>
                Kembali
            </a>

        </div>

        <div class="row">

            {{-- Gambar --}}
            <div class="col-md-4 mb-4">

                @if($berita->gambar)

                    <img src="{{ asset('storage/' . $berita->gambar) }}"
                         class="img-fluid rounded"
                         style="width: 100%; max-height: 300px; object-fit: cover;">

                @else

                    <div class="bg-light rounded d-flex align-items-center justify-content-center"
                         style="height: 250px;">

                        <span class="text-muted">
                            <i class="fa fa-image me-1"></i>
                            Tidak ada gambar
                        </span>

                    </div>

                @endif

            </div>

            {{-- Informasi --}}
            <div class="col-md-8">

                {{-- Judul --}}
                <h3 class="fw-bold mb-3">
                    {{ $berita->judul }}
                </h3>

                {{-- Tanggal --}}
                <p class="text-muted">

                    <i class="fa fa-calendar me-2"></i>

                    @if($berita->tanggal)
                        {{ \Carbon\Carbon::parse($berita->tanggal)->format('d M Y') }}
                    @else
                        -
                    @endif

                </p>

                <hr>

                {{-- Isi berita --}}
                <div class="mt-3">

                    {!! nl2br(e($berita->isi)) !!}

                </div>

                {{-- Tombol --}}
                <div class="mt-4">

                    {{-- Edit --}}
                    <a href="{{ route('admin.berita.edit', $berita->id) }}"
                       class="btn btn-warning">

                        <i class="fa fa-edit me-1"></i>
                        Edit

                    </a>

                    {{-- Hapus --}}
                    <form action="{{ route('admin.berita.destroy', $berita->id) }}"
                          method="POST"
                          class="d-inline">

                        @csrf
                        @method('DELETE')

                        <button type="submit"
                                class="btn btn-danger"
                                onclick="return confirm('Yakin ingin menghapus berita ini?')">

                            <i class="fa fa-trash me-1"></i>
                            Hapus

                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection