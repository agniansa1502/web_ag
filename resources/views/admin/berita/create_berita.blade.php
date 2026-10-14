@extends('admin')

@section('content')

<div class="container-fluid pt-4 px-4">

    <div class="bg-white rounded shadow-sm p-4">

        <h4 class="fw-bold mb-4">Tambah Berita</h4>

        <form action="{{ route('admin.berita.store') }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf

            <div class="mb-3">
                <label class="form-label">
                    Judul Berita
                </label>

                <input type="text"
                       name="judul"
                       class="form-control"
                       value="{{ old('judul') }}"
                       required>
            </div>

            <div class="mb-3">
                <label class="form-label">
                    Isi Berita
                </label>

                <textarea name="isi"
                          class="form-control"
                          rows="8"
                          required>{{ old('isi') }}</textarea>
            </div>

            <div class="mb-4">
                <label class="form-label">
                    Gambar Berita
                </label>

                <input type="file"
                       name="gambar"
                       class="form-control"
                       accept="image/png,image/jpeg">

                <small class="text-muted">
                    JPG, JPEG, PNG maksimal 2 MB
                </small>
            </div>

            <a href="{{ route('admin.berita.index') }}"
               class="btn btn-secondary">
                Kembali
            </a>

            <button type="submit"
                    class="btn btn-primary">
                <i class="fa fa-save me-1"></i>
                Simpan Berita
            </button>

        </form>

    </div>

</div>

@endsection