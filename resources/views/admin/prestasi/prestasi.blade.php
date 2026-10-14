@extends('admin')

@section('content')

<div class="container-fluid pt-4 px-4">

    <div class="bg-white rounded p-4">

        {{-- HEADER --}}
        <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">

            <div>
                <h3 class="mb-1">Prestasi</h3>
                <p class="text-muted mb-0">
                    Kelola prestasi sekolah.
                </p>
            </div>

            <a href="{{ route('admin.prestasi.create') }}"
               class="btn btn-primary">
                <i class="fa fa-plus me-2"></i>
                Tambah Prestasi
            </a>

        </div>

        {{-- PESAN SUKSES --}}
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                {{ session('success') }}

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="alert">
                </button>
            </div>
        @endif

        {{-- PESAN ERROR --}}
        @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        {{-- FORM PENCARIAN --}}
        <form action="{{ route('admin.prestasi') }}"
              method="GET"
              class="mb-4">

            <div class="row g-2">

                <div class="col-md-6">
                    <input
                        type="text"
                        name="search"
                        class="form-control"
                        
                        value="{{ $search ?? '' }}">
                </div>

                <div class="col-auto">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-search me-1"></i>
                        Cari
                    </button>

                    <a href="{{ route('admin.prestasi') }}"
                       class="btn btn-secondary">
                        <i class="fa fa-refresh me-1"></i>
                        Reset
                    </a>
                </div>

            </div>

        </form>

        {{-- TABEL PRESTASI --}}
        <div class="table-responsive">

            <table class="table table-bordered table-hover align-middle">

                <thead class="table-light">
                    <tr>
                        <th width="60">No</th>
                        <th width="100">Foto</th>
                        <th>Judul</th>
                        <th>Tahun</th>
                        <th>Deskripsi</th>
                        <th width="160">Aksi</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($prestasis as $prestasi)

                    <tr>

                        <td>{{ $loop->iteration }}</td>

                        <td>
                            @if($prestasi->foto)
                                <img
                                    src="{{ asset('storage/' . $prestasi->foto) }}"
                                    alt="{{ $prestasi->judul }}"
                                    width="80"
                                    height="60"
                                    style="object-fit: cover; border-radius: 8px;">
                            @else
                                <span class="text-muted">Tidak ada</span>
                            @endif
                        </td>

                        <td>
                            <strong>{{ $prestasi->judul }}</strong>
                        </td>

                        <td>{{ $prestasi->tahun ?? '-' }}</td>

                        <td>{{ $prestasi->deskripsi ?? '-' }}</td>

                        <td>
                            {{-- EDIT --}}
                            <a href="{{ route('admin.prestasi.edit', $prestasi->encrypted_id) }}"
                               class="btn btn-sm btn-warning mb-1">
                                <i class="fa fa-edit"></i>
                                Edit
                            </a>

                            {{-- HAPUS --}}
                            <form
                                action="{{ route('admin.prestasi.destroy', $prestasi->encrypted_id) }}"
                                method="POST"
                                class="d-inline"
                                onsubmit="return confirm('Yakin ingin menghapus prestasi ini?')">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="btn btn-sm btn-danger mb-1">
                                    <i class="fa fa-trash"></i>
                                    Hapus
                                </button>

                            </form>
                        </td>

                    </tr>

                    @empty

                    <tr>
                        <td colspan="6" class="text-center py-4">
                            @if(!empty($search))
                                Prestasi dengan kata kunci
                                <strong>{{ $search }}</strong>
                                tidak ditemukan.
                            @else
                                Belum ada data prestasi.
                            @endif
                        </td>
                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

        {{-- JUMLAH DATA --}}
        <div class="text-muted mt-2">
            Jumlah prestasi ditemukan: {{ $prestasis->count() }} data
        </div>

    </div>

</div>

@endsection

