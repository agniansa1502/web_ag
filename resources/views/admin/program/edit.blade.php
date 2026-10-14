@extends('admin')

@section('content')

<div class="container-fluid pt-4 px-4">

    <div class="bg-white rounded shadow-sm p-4">

        <div class="mb-4">

            <h4 class="fw-bold mb-1">
                Edit Program
            </h4>

            <p class="text-muted mb-0">
                Ubah informasi program sekolah.
            </p>

        </div>


        {{-- Form --}}
        <form action="{{ route('admin.program.update', $program->encrypted_id) }}"
              method="POST">

            @csrf
            @method('PUT')


            {{-- Judul --}}
            <div class="mb-3">

                <label class="form-label fw-bold">
                    Nama Program
                </label>

                <input type="text"
                       name="judul"
                       class="form-control"
                     
                       required>

            </div>


            {{-- Kategori --}}
            <div class="mb-3">

                <label class="form-label fw-bold">
                    Kategori
                </label>

                <input type="text"
                       name="kategori"
                       class="form-control"
                      
                       required>

            </div>


          
{{-- Deskripsi --}}
<div class="mb-4">

    <label class="form-label fw-bold">
        Deskripsi
    </label>

    <textarea
        name="deskripsi"
        class="form-control"
        rows="5"      
    >{{ old('deskripsi') }}</textarea>
</div>



            {{-- Tombol --}}
            <button type="submit"
                    class="btn btn-primary">

                <i class="fa fa-save me-2"></i>
                Simpan Perubahan

            </button>

            <a href="{{ route('admin.program') }}"
               class="btn btn-secondary">

                Kembali

            </a>

        </form>

    </div>

</div>

@endsection

