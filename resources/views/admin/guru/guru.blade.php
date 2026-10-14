
@extends('admin')

@section('content')

<div class="container-fluid pt-4 px-4">
    <div class="bg-light rounded p-4">

        {{-- Header --}}
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0">Data Guru</h6>

            <a href="{{ route('admin.guru.create') }}" class="btn btn-primary">
                <i class="fa fa-plus me-2"></i>
                Tambah Data Guru
            </a>
        </div>

        {{-- Notifikasi --}}
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Pencarian --}}
        <div class="mb-4">
            <form action="{{ route('admin.guru') }}" method="GET">
                <div class="input-group" style="max-width: 500px;">
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
                        <a href="{{ route('admin.guru') }}" class="btn btn-secondary">
                            <i class="fa fa-refresh"></i>
                        </a>
                    @endif
                </div>
            </form>
        </div>

        {{-- Tabel Data Guru --}}
        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle">

                <thead class="table-primary">
                    <tr>
                        <th style="width: 60px;">No</th>
                        <th style="width: 100px;" class="text-center">Foto</th>
                        <th>Nama Guru</th>
                        <th>NIP</th>
                        <th>Mata Pelajaran</th>
                        <th>Jabatan</th>
                        <th style="width: 190px;" class="text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($guru as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>

                            {{-- Foto Guru --}}
                            <td class="text-center">
                                @if($item->foto && \Illuminate\Support\Facades\Storage::disk('public')->exists($item->foto))
                                    <img
                                        src="{{ asset('storage/' . $item->foto) }}"
                                        alt="Foto {{ $item->nama_guru }}"
                                        width="65"
                                        height="65"
                                        style="object-fit: cover; border-radius: 50%;"
                                    >
                                @else
                                    <div
                                        class="d-inline-flex align-items-center justify-content-center bg-secondary text-white"
                                        style="width: 65px; height: 65px; border-radius: 50%;"
                                    >
                                        <i class="fa fa-user fa-2x"></i>
                                    </div>
                                @endif
                            </td>

                            <td>{{ $item->nama_guru }}</td>
                            <td>{{ $item->nip }}</td>
                            <td>{{ $item->mata_pelajaran }}</td>
                            <td>{{ $item->jabatan }}</td>

                            {{-- Tombol Aksi --}}
                            <td class="text-center">
                                <div class="d-flex justify-content-center align-items-center gap-2">

                                    <a
                                        href="{{ route('admin.guru.edit', $item->encrypted_id) }}"
                                        class="btn btn-sm btn-warning"
                                    >
                                        <i class="fa fa-edit me-1"></i>
                                        Edit
                                    </a>

                                    <form
                                        action="{{ route('admin.guru.destroy', $item->encrypted_id) }}"
                                        method="POST"
                                        class="m-0"
                                        onsubmit="return confirm('Yakin ingin menghapus data guru ini?')"
                                    >
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="fa fa-trash me-1"></i>
                                            Hapus
                                        </button>
                                    </form>

                                </div>
                            </td>
                        </tr>

                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-4">
                                @if(!empty($search))
                                    Data guru dengan kata
                                    <strong>"{{ $search }}"</strong>
                                    tidak ditemukan.
                                @else
                                    Belum ada data guru.
                                @endif
                            </td>
                        </tr>
                    @endforelse
                </tbody>

            </table>
        </div>

    </div>
</div>

@endsection