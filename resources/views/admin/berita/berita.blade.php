@extends('admin')

@section('content')

<div class="container-fluid pt-4 px-4">

    <div class="bg-white rounded shadow-sm p-4">

        {{-- HEADER --}}
        <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">

            <div>
                <h4 class="fw-bold mb-1">Data Berita</h4>
                <p class="text-muted mb-0">
                    Kelola berita sekolah
                </p>
            </div>

            <a href="{{ route('admin.berita.create') }}"
               class="btn btn-primary">
                <i class="fa fa-plus me-1"></i>
                Tambah Berita
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

        {{-- PENCARIAN --}}
        <form action="{{ route('admin.berita.index') }}"
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

                    <a href="{{ route('admin.berita.index') }}"
                       class="btn btn-secondary">
                        <i class="fa fa-refresh me-1"></i>
                        Reset
                    </a>
                </div>

            </div>

        </form>

        {{-- TABEL BERITA --}}
        <div class="table-responsive">

            <table class="table table-bordered table-hover align-middle">

                <thead class="table-light">
                    <tr>
                        <th width="60">No</th>
                        <th width="140">Gambar</th>
                        <th>Judul</th>
                        <th>Isi</th>
                        <th width="170">Aksi</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($berita as $item)

                        <tr>

                            <td>{{ $loop->iteration }}</td>

                            <td>
                                @if($item->gambar)
                                    <img
                                        src="{{ asset('storage/' . $item->gambar) }}"
                                        alt="{{ $item->judul }}"
                                        width="100"
                                        height="70"
                                        class="rounded"
                                        style="object-fit: cover;">
                                @else
                                    <span class="text-muted">
                                        Tidak ada gambar
                                    </span>
                                @endif
                            </td>

                            <td>
                                <strong>{{ $item->judul }}</strong>
                            </td>

                            <td>
                                {{ \Illuminate\Support\Str::limit($item->isi, 80) }}
                            </td>

                            <td>
                                {{-- DETAIL --}}
                                <a href="{{ route('admin.berita.show', $item->encrypted_id) }}"
                                   class="btn btn-info btn-sm mb-1"
                                   title="Lihat">
                                    <i class="fa fa-eye"></i>
                                </a>

                                {{-- EDIT --}}
                                <a href="{{ route('admin.berita.edit', $item->encrypted_id) }}"
                                   class="btn btn-warning btn-sm mb-1"
                                   title="Edit">
                                    <i class="fa fa-edit"></i>
                                </a>

                                {{-- HAPUS --}}
                                <form
                                    action="{{ route('admin.berita.destroy', $item->encrypted_id) }}"
                                    method="POST"
                                    class="d-inline"
                                    onsubmit="return confirm('Yakin ingin menghapus berita ini?')">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="btn btn-danger btn-sm mb-1"
                                            title="Hapus">
                                        <i class="fa fa-trash"></i>
                                    </button>

                                </form>
                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="5" class="text-center py-4">

                                <i class="fa fa-newspaper fa-2x text-muted mb-2"></i>

                                @if(!empty($search))
                                    <p class="text-muted mb-0">
                                        Berita dengan kata kunci
                                        <strong>{{ $search }}</strong>
                                        tidak ditemukan.
                                    </p>
                                @else
                                    <p class="text-muted mb-0">
                                        Belum ada berita.
                                    </p>
                                @endif

                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

        {{-- JUMLAH DATA --}}
        <div class="text-muted mt-2">
            Jumlah berita ditemukan: {{ $berita->count() }} data
        </div>

    </div>

</div>

@endsection

