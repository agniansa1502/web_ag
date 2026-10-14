@extends('admin')

@section('content')

<div class="container-fluid pt-4 px-4">

    <div class="bg-white rounded shadow-sm p-4">

        {{-- Header --}}
        <div class="mb-4">
            <h4 class="fw-bold mb-1">
                Tambah Data Siswa
            </h4>

            <p class="text-muted mb-0">
                Tambahkan data siswa baru.
            </p>
        </div>

        {{-- Error Validasi --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Form --}}
        <form action="{{ route('admin.siswa.store') }}" method="POST">

            @csrf

            <div class="row g-3">

                {{-- NISN --}}
                <div class="col-md-6">
                    <label class="form-label fw-semibold">
                        NISN
                    </label>

                    <input type="text"
                           name="nisn"
                           value="{{ old('nisn') }}"
                           class="form-control"
                           required>
                </div>

                {{-- NIS --}}
                <div class="col-md-6">
                    <label class="form-label fw-semibold">
                        NIS
                    </label>

                    <input type="text"
                           name="nis"
                           value="{{ old('nis') }}"
                           class="form-control"
                           required>
                </div>

                {{-- Nama Siswa --}}
                <div class="col-md-6">
                    <label class="form-label fw-semibold">
                        Nama Siswa
                    </label>

                    <input type="text"
                           name="nama_siswa"
                           value="{{ old('nama_siswa') }}"
                           class="form-control"
                           required>
                </div>

                {{-- Kelas --}}
                <div class="col-md-6">
                    <label class="form-label fw-semibold">
                        Kelas
                    </label>

                    <input type="text"
                           name="kelas"
                           value="{{ old('kelas') }}"
                           class="form-control"
                           required>
                </div>

                {{-- Tahun Masuk --}}
                <div class="col-md-6">
                    <label class="form-label fw-semibold">
                        Tahun Masuk
                    </label>

                    <input type="number"
                           name="tahun_masuk"
                           value="{{ old('tahun_masuk') }}"
                           class="form-control"
                           min="2000"
                           max="2100"
                           required>
                </div>

                {{-- Jenis Kelamin --}}
                <div class="col-md-6">
                    <label class="form-label fw-semibold">
                        Jenis Kelamin
                    </label>

                    <select name="jenis_kelamin"
                            class="form-select"
                            required>

                        <option value="">
                            -- Pilih Jenis Kelamin --
                        </option>

                        <option value="Laki-laki"
                            {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>
                            Laki-laki
                        </option>

                        <option value="Perempuan"
                            {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>
                            Perempuan
                        </option>

                    </select>
                </div>

              {{-- Alamat --}}

<div class="col-12">
    <label for="alamat" class="form-label fw-semibold">
        Alamat
    </label>


<textarea
    name="alamat"
    id="alamat"
    class="form-control"
    rows="3"></textarea>


</div>


            {{-- Tombol --}}
            <div class="mt-4">

                <button type="submit"
                        class="btn btn-primary">
                    <i class="fa fa-save me-1"></i>
                    Simpan
                </button>

                <a href="{{ route('admin.siswa') }}"
                   class="btn btn-secondary">
                    <i class="fa fa-arrow-left me-1"></i>
                    Kembali
                </a>

            </div>

        </form>

    </div>

</div>

@endsection