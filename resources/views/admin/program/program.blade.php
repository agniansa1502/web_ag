@extends('admin')

@section('content')

<div class="container-fluid pt-4 px-4">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h3 class="fw-bold mb-1">
                Program Sekolah
            </h3>

            <p class="text-muted mb-0">
                Kelola program dan kegiatan unggulan sekolah.
            </p>
        </div>

        <a href="{{ route('admin.program.create') }}"
           class="btn btn-primary">
            <i class="fa fa-plus me-2"></i>
            Tambah Program
        </a>

    </div>


    {{-- Pesan --}}
    @if(session('success'))

        <div class="alert alert-success alert-dismissible fade show">
            <i class="fa fa-check-circle me-2"></i>
            {{ session('success') }}

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
            </button>
        </div>

    @endif


    {{-- Error --}}
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
    <div class="bg-white rounded shadow-sm p-3 mb-4">

        <form action="{{ route('admin.program') }}"
              method="GET">

            <div class="input-group">

                <input type="text"
                       name="search"
                       class="form-control"
                     
                       value="{{ request('search') }}">

                <button type="submit"
                        class="btn btn-primary">

                    <i class="fa fa-search me-1"></i>
                    Cari

                </button>

            </div>

        </form>

    </div>


    {{-- Daftar Program --}}
    <div class="row g-4">

        @forelse($programs as $program)

            <div class="col-md-6 col-xl-4">

                <div class="card border-0 shadow-sm h-100">

                    <div class="card-body p-4">

                      {{-- Foto Program --}}
<div class="mb-3">

    @if($program->foto)

         <img
        src="{{ asset('storage/' . $program->foto) }}"
        alt="{{ $program->judul }}"
        class="w-100 rounded"
        style="height: 180px; object-fit: cover;"
    >


    @else

        <div
            class="rounded d-flex align-items-center justify-content-center bg-light"
            style="height: 180px;">

            <i class="fa fa-image fa-3x text-muted"></i>

        </div>

    @endif

</div>


                        {{-- Judul --}}
                        <h5 class="fw-bold mb-2">
                            {{ $program->judul }}
                        </h5>


                        {{-- Kategori --}}
                        <span class="badge bg-light text-primary mb-3">
                            {{ $program->kategori }}
                        </span>


                        {{-- Deskripsi --}}
                        <p class="text-muted">
                            {{ $program->deskripsi ?: 'Tidak ada deskripsi.' }}
                        </p>


                        {{-- Tombol --}}
                        <div class="d-flex gap-2 mt-3">

                            {{-- Edit --}}
                            <a href="{{route('admin.program.edit', $program->encrypted_id) }}"
                               class="btn btn-warning btn-sm">

                                <i class="fa fa-edit me-1"></i>
                                Edit

                            </a>


                            {{-- Hapus --}}
                            <form action="{{route('admin.program.destroy', $program->encrypted_id) }}"
                                  method="POST"
                                  onsubmit="return confirm('Yakin ingin menghapus program ini?')">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="btn btn-danger btn-sm">

                                    <i class="fa fa-trash me-1"></i>
                                    Hapus

                                </button>

                            </form>

                        </div>

                    </div>

                </div>

            </div>

        @empty

            <div class="col-12">

                <div class="bg-white rounded shadow-sm p-5 text-center">

                    <i class="fa fa-folder-open fa-3x text-muted mb-3"></i>

                    <h5>
                        Belum ada program
                    </h5>

                    <p class="text-muted">
                        Silakan tambahkan program sekolah.
                    </p>

                    <a href="{{ route('admin.program.create') }}"
                       class="btn btn-primary">

                        <i class="fa fa-plus me-2"></i>
                        Tambah Program

                    </a>

                </div>

            </div>

        @endforelse

    </div>

</div>

@endsection