@extends('admin')

@section('content')

<div class="container-fluid pt-4 px-4">

    <div class="bg-white rounded p-4">

        <h3 class="mb-4">
            Tambah Prestasi
        </h3>

        <form action="{{ route('admin.prestasi.store') }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf

            <div class="mb-3">

                <label class="form-label">
                    Judul Prestasi
                </label>

                <input type="text"
                       name="judul"
                       class="form-control"
                       value="{{ old('judul') }}"
                       required>

            </div>


            <div class="mb-3">

              <div class="col-md-6">
    <label for="tahun" class="form-label fw-semibold">
        Tahun
    </label>

    <input type="number"
           name="tahun"
           id="tahun"
           class="form-control"
           min="1900"
           max="2099"
           step="1"
           value=""
           required>
</div>


            <div class="mb-3">

                <label class="form-label">
                    Deskripsi
                </label>

                <textarea name="deskripsi"
                          class="form-control"
                          rows="5">{{ old('deskripsi') }}</textarea>

            </div>


            <div class="mb-4">

                <label class="form-label">
                    Foto Prestasi
                </label>

                <input type="file"
                       name="foto"
                       class="form-control"
                       accept="image/*">

            </div>


            <a href="{{ route('admin.prestasi') }}"
               class="btn btn-secondary">
                Kembali
            </a>

            <button type="submit"
                    class="btn btn-primary">
                Simpan
            </button>

        </form>

    </div>

</div>

@endsection