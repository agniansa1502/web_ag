@extends('admin')

@section('content')

<div class="container-fluid pt-4 px-4">

    <div class="bg-white rounded shadow-sm p-4">

        <h4 class="fw-bold mb-4">
            Edit Berita
        </h4>

        <form action="{{ route('admin.berita.update', $berita->encrypted_id) }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <div class="mb-3">

                <label class="form-label">
                    Judul Berita
                </label>

                <input type="text"
                       name="judul"
                       class="form-control"
                       value="{{ old('judul', $berita->judul) }}"
                       required>

            </div>


            <div class="mb-3">

                <label class="form-label">
                    Isi Berita
                </label>

                <textarea name="isi"
                          class="form-control"
                          rows="8"
                          required>{{ old('isi', $berita->isi) }}</textarea>

            </div>


            @if($berita->gambar)

                <div class="mb-3">

                    <label class="form-label">
                        Gambar Saat Ini
                    </label>

                    <br>

                    <img src="{{ asset('storage/' . $berita->gambar) }}"
                         width="180"
                         height="120"
                         class="rounded"
                         style="object-fit: cover;">

                </div>

            @endif


            <div class="mb-4">

                <label class="form-label">
                    Ganti Gambar
                </label>

                <input type="file"
                       name="gambar"
                       class="form-control"
                       accept="image/*">

                {{-- <small class="text-muted">
                    Kosongkan jika tidak ingin mengganti gambar.
                </small> --}}

            </div>


            <a href="{{ route('admin.berita.index') }}"
               class="btn btn-secondary">

                Kembali

            </a>


            <button type="submit"
                    class="btn btn-primary">

                <i class="fa fa-save me-1"></i>
                Update Berita

            </button>

        </form>

    </div>

</div>

@endsection

