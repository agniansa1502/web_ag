@extends('admin')

@section('content')

<div class="container-fluid pt-4 px-4">

    {{-- Judul halaman --}}
    <div class="row mb-4">
        <div class="col-12">
            <h3 class="mb-2">Data Siswa</h3>
            <p class="text-muted">
                Kelola data siswa sekolah.
            </p>
        </div>
    </div>

    {{-- Notifikasi sukses --}}
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Notifikasi error --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Card tabel siswa --}}
    <div class="card shadow-sm border-0">

        <div class="card-header bg-white d-flex justify-content-between align-items-center">

            <h5 class="mb-0">Daftar Siswa</h5>

            <a href="{{ route('admin.siswa.create') }}"
               class="btn btn-primary">
                <i class="fa fa-plus me-1"></i>
                Tambah Siswa
            </a>

        </div>

        <div class="card-body">

            {{-- Pencarian --}}
            <form action="{{ route('admin.siswa') }}"
                  method="GET"
                  class="mb-3">

                <div class="input-group" style="max-width: 350px;">

                    <input type="text"
                           name="search"
                           value="{{ request('search') }}"
                           class="form-control"
                           >

                    <button class="btn btn-primary"
                            type="submit">
                        <i class="fa fa-search"></i>
                    </button>

                </div>

            </form>

            {{-- Tabel --}}
            <div class="table-responsive">

                <table class="table table-bordered table-hover align-middle">

                    <thead class="table-primary">

                        <tr>
                            <th>No</th>
                            <th>NISN</th>
                            <th>NIS</th>
                            <th>Nama Siswa</th>
                            <th>Kelas</th>
                            <th>Jenis Kelamin</th>
                            <th>Alamat</th>
                            <th>Aksi</th>
                        </tr>

                    </thead>

                    <tbody>

                        @forelse ($siswa as $item)

                            <tr>

                                {{-- No --}}
                                <td>
                                    {{ $loop->iteration }}
                                </td>

                                {{-- NISN --}}
                                <td>
                                    {{ $item->nisn }}
                                </td>

                                {{-- NIS --}}
                                <td>
                                    {{ $item->nis }}
                                </td>

                                {{-- Nama --}}
                                <td>
                                    {{ $item->nama_siswa }}
                                </td>

                                {{-- Kelas --}}
                                <td>
                                    {{ $item->kelas }}
                                </td>

                                {{-- Jenis Kelamin --}}
                                <td>
                                    {{ $item->jenis_kelamin }}
                                </td>

                                {{-- Alamat --}}
                                <td>
                                    {{ $item->alamat }}
                                </td>

                                {{-- Aksi --}}
                                <td>

    {{-- Edit --}}
    <a href="{{route('admin.siswa.edit', $item->encrypted_id) }}"
       class="btn btn-warning btn-sm"
       title="Edit">
        <i class="fa fa-edit"></i>
    </a>

    {{-- Hapus --}}
    <form action="{{ route('admin.siswa.destroy', $item->encrypted_id) }}"
          method="POST"
          class="d-inline"
          onsubmit="return confirm('Yakin ingin menghapus data siswa ini?')">

        @csrf
        @method('DELETE')

        <button type="submit"
                class="btn btn-danger btn-sm"
                title="Hapus">
            <i class="fa fa-trash"></i>
        </button>

    </form>

</td>
                            </tr>

                        @empty

                            <tr>
                                <td colspan="8"
                                    class="text-center text-muted py-4">

                                    Belum ada data siswa.

                                </td>
                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

@endsection