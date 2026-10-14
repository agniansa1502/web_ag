@extends('admin')

@section('content')

<div class="container-fluid pt-4 px-4">

    <div class="bg-white rounded shadow-sm p-4">

        {{-- Header --}}
        <div class="d-flex justify-content-between align-items-center mb-4">

            <div>
                <h4 class="fw-bold mb-1">
                    Detail Ekstrakurikuler
                </h4>

                <p class="text-muted mb-0">
                    Informasi lengkap ekstrakurikuler
                </p>
            </div>

            <a href="{{ route('admin.ekskul') }}"
               class="btn btn-secondary">

                <i class="fa fa-arrow-left me-1"></i>
                Kembali

            </a>

        </div>

        {{-- Data --}}
        <div class="row">

            <div class="col-md-8">

                {{-- Nama --}}
                <h3 class="fw-bold mb-4">
                    {{ $ekstrakurikuler->nama_ekstrakurikuler }}
                </h3>

                {{-- Pembina --}}
                <div class="mb-3">
                    <label class="fw-semibold text-muted">
                        <i class="fa fa-user me-2"></i>
                        Pembina
                    </label>

                    <p class="mb-0">
                        {{ $ekstrakurikuler->pembina }}
                    </p>
                </div>

                <hr>

                {{-- Hari --}}
                <div class="mb-3">
                    <label class="fw-semibold text-muted">
                        <i class="fa fa-calendar me-2"></i>
                        Hari
                    </label>

                    <p class="mb-0">
                        {{ $ekstrakurikuler->hari }}
                    </p>
                </div>

                {{-- Waktu --}}
                <div class="mb-3">
                    <label class="fw-semibold text-muted">
                        <i class="fa fa-clock me-2"></i>
                        Waktu
                    </label>

                    <p class="mb-0">
                        {{ $ekstrakurikuler->waktu }}
                    </p>
                </div>

                {{-- Tempat --}}
                <div class="mb-3">
                    <label class="fw-semibold text-muted">
                        <i class="fa fa-map-marker-alt me-2"></i>
                        Tempat
                    </label>

                    <p class="mb-0">
                        {{ $ekstrakurikuler->tempat }}
                    </p>
                </div>

                <hr>

                {{-- Keterangan --}}
                <div class="mb-4">

                    <label class="fw-semibold text-muted">
                        <i class="fa fa-align-left me-2"></i>
                        Keterangan
                    </label>

                    <p class="mt-2">
                        {!! nl2br(e($ekstrakurikuler->keterangan)) !!}
                    </p>

                </div>

                {{-- Tombol --}}
                <div>

                    {{-- Edit --}}
                    <a href="{{ route('admin.ekskul.edit', $ekstrakurikuler->id) }}"
                       class="btn btn-warning">

                        <i class="fa fa-edit me-1"></i>
                        Edit

                    </a>

                    {{-- Hapus --}}
                    <form action="{{ route('admin.ekskul.destroy', $ekstrakurikuler->id) }}"
                          method="POST"
                          class="d-inline">

                        @csrf
                        @method('DELETE')

                        <button type="submit"
                                class="btn btn-danger"
                                onclick="return confirm('Yakin ingin menghapus ekstrakurikuler ini?')">

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
