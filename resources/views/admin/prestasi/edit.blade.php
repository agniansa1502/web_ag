@extends('admin')

@section('content')

<div class="container-fluid pt-4 px-4">

    <div class="bg-white rounded p-4">

        {{-- HEADER --}}
        <div class="mb-4">
            <h3 class="mb-1">
                Edit Prestasi
            </h3>

            <p class="text-muted mb-0">
                Ubah informasi prestasi sekolah.
            </p>
        </div>


        {{-- ERROR VALIDASI --}}
        @if ($errors->any())

            <div class="alert alert-danger">

                <strong>
                    Terjadi kesalahan:
                </strong>

                <ul class="mb-0 mt-2">

                    @foreach ($errors->all() as $error)

                        <li>
                            {{ $error }}
                        </li>

                    @endforeach

                </ul>

            </div>

        @endif


        {{-- FORM EDIT --}}
        
             <form action="{{ route('admin.prestasi.update', $prestasi->encrypted_id) }}"
      method="POST"
      enctype="multipart/form-data">

    @csrf
    @method('PUT')

            {{-- JUDUL --}}
            <div class="mb-3">

                <label class="form-label fw-bold">
                    Judul Prestasi
                </label>

                <input type="text"
                       name="judul"
                       class="form-control"
                       value="{{ old('judul', $prestasi->judul) }}"
                       placeholder="Masukkan judul prestasi"
                       required>

            </div>


            {{-- TAHUN --}}
            <div class="mb-3">

                <label class="form-label fw-bold">
                    Tahun
                </label>

                <input type="number"
                       name="tahun"
                       class="form-control"
                       value="{{ old('tahun', $prestasi->tahun) }}"
                       placeholder="Contoh: 2026"
                       min="1900"
                       max="2100">

            </div>


            {{-- DESKRIPSI --}}
            <div class="mb-3">

                <label class="form-label fw-bold">
                    Deskripsi
                </label>

                <textarea name="deskripsi"
                          class="form-control"
                          rows="5"
                          placeholder="Masukkan deskripsi prestasi">{{ old('deskripsi', $prestasi->deskripsi) }}</textarea>

            </div>


            {{-- FOTO LAMA --}}
            <div class="mb-3">

                <label class="form-label fw-bold">
                    Foto Saat Ini
                </label>

                <div>

                    @if($prestasi->foto)

                        <img src="{{ asset('uploads/prestasi/' . $prestasi->foto) }}"
                             alt="{{ $prestasi->judul }}"
                             style="
                                width: 200px;
                                height: 140px;
                                object-fit: cover;
                                border-radius: 10px;
                                border: 1px solid #ddd;
                             ">

                    @else

                        <div class="text-muted">
                            Belum ada foto.
                        </div>

                    @endif

                </div>

            </div>


            {{-- FOTO BARU --}}
            <div class="mb-4">

                <label class="form-label fw-bold">
                    Ganti Foto
                </label>

                <input type="file"
                       name="foto"
                       class="form-control"
                       accept="image/png,image/jpeg,image/jpg,image/webp">

                <small class="text-muted">
                    Kosongkan jika tidak ingin mengganti foto.
                    Maksimal 2 MB.
                </small>

            </div>


            {{-- BUTTON --}}
            <div class="d-flex gap-2">

                <a href="{{ route('admin.prestasi') }}"
                   class="btn btn-secondary">

                    Kembali

                </a>

                <button type="submit"
                        class="btn btn-primary">

                    <i class="fa fa-save me-1"></i>

                    Simpan Perubahan

                </button>

            </div>

        </form>

    </div>

</div>

@endsection