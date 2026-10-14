@extends('admin')

@section('content')

<div class="container-fluid pt-4 px-4">

    {{-- Judul Halaman --}}
    <div class="row mb-4">
        <div class="col-12">
            <h3 class="mb-2">Data Ekstrakurikuler</h3>
            <p class="text-muted">
                Kelola data kegiatan ekstrakurikuler sekolah.
            </p>
        </div>
    </div>

    {{-- Tombol Tambah --}}
    <div class="row mb-3">
        <div class="col-12">
            <a href="{{ route('admin.ekskul.create') }}" class="btn btn-primary">
                <i class="fa fa-plus me-2"></i>
                Tambah Ekstrakurikuler
            </a>
        </div>
    </div>

    {{-- Tabel Ekstrakurikuler --}}
    <div class="row">
        <div class="col-12">
            <div class="bg-light rounded p-4">

                {{-- Header --}}
                <div class="d-flex justify-content-between align-items-center mb-4">

                    <h5 class="mb-0">
                        Daftar Ekstrakurikuler
                    </h5>

                    {{-- Pencarian --}}
                    <form action="{{ route('admin.ekskul') }}" method="GET">

                        <div class="input-group" style="width: 350px;">

                            <input
                                type="text"
                                name="search"
                                class="form-control"
                                value="{{ $search ?? '' }}"
                            >

                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-search"></i>
                            </button>

                            @if(!empty($search))
                                <a href="{{ route('admin.ekskul') }}"
                                   class="btn btn-secondary">
                                    <i class="fa fa-refresh"></i>
                                </a>
                            @endif

                        </div>

                    </form>

                </div>

                <div class="table-responsive">

                    <table class="table table-bordered table-hover">

                        <thead class="table-primary">
                            <tr>
                                <th>No</th>
                                <th>Nama Ekstrakurikuler</th>
                                <th>Pembina</th>
                                <th>Deskripsi</th>
                                <th>Gambar</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>

                            @forelse ($ekskul as $item)

                                <tr>

                                    <td>
                                        {{ $loop->iteration }}
                                    </td>

                                    <td>
                                        {{ $item->nama_ekskul }}
                                    </td>

                                    <td>
                                        {{ $item->pembina }}
                                    </td>

                                    <td>
                                        {{ $item->deskripsi }}
                                    </td>

                                    <td>
                                        @if($item->gambar)

                                            <img
                                                src="{{ asset('storage/' . $item->gambar) }}"
                                                width="80"
                                                class="rounded"
                                            >

                                        @else

                                            Tidak ada gambar

                                        @endif
                                    </td>

                                    <td>

                                        {{-- Edit --}}
                                        <a href="{{ route('admin.ekskul.edit', $item->encrypted_id) }}"
                                           class="btn btn-warning btn-sm">

                                            <i class="fa fa-edit"></i>
                                            Edit

                                        </a>

                                        {{-- Hapus --}}
                                        <form
                                            action="{{ route('admin.ekskul.destroy', $item->encrypted_id) }}"
                                            method="POST"
                                            style="display:inline;"
                                        >

                                            @csrf
                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="btn btn-danger btn-sm"
                                                onclick="return confirm('Yakin ingin menghapus data ini?')"
                                            >

                                                <i class="fa fa-trash"></i>
                                                Hapus

                                            </button>

                                        </form>

                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td colspan="6" class="text-center">

                                        @if(!empty($search))

                                            Data ekstrakurikuler
                                            <strong>"{{ $search }}"</strong>
                                            tidak ditemukan.

                                        @else

                                            Belum ada data ekstrakurikuler.

                                        @endif

                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>
        </div>
    </div>

</div>

@endsection
