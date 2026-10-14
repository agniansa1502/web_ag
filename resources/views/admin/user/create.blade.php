
@extends('admin')

@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="bg-light rounded p-4">

        <div class="mb-4">
            <h4 class="mb-1">Tambah Pengguna</h4>
            <p class="text-muted mb-0">
                Tambahkan akun Admin atau Operator baru.
            </p>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Data belum dapat disimpan.</strong>
                <ul class="mb-0 mt-2">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.user.store') }}"
              method="POST"
              autocomplete="off">
            @csrf

            {{-- Nama Pengguna --}}
            <div class="mb-3">
                <label class="form-label">Nama Pengguna</label>
                <input
                    type="text"
                    name="name"
                    class="form-control"
                  
                    value=""
                    autocomplete="off"
                    required>
            </div>

            {{-- Email --}}
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input
                    type="email"
                    name="email"
                    class="form-control"
                  
                    value=""
                    autocomplete="off"
                    required>
            </div>

            {{-- Role --}}
            <div class="mb-3">
                <label class="form-label">Role</label>
                <select
                    name="role"
                    class="form-control"
                    required>
                    <option value="" selected disabled>
                        -- Pilih Role --
                    </option>
                    <option value="operator">Operator</option>
                    <option value="admin">Admin</option>
                </select>
            </div>

            {{-- Password --}}
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input
                    type="password"
                    name="password"
                    class="form-control"
                   
                    value=""
                    autocomplete="new-password"
                    required>
            </div>

            {{-- Konfirmasi Password --}}
            <div class="mb-4">
                <label class="form-label">Konfirmasi Password</label>
                <input
                    type="password"
                    name="password_confirmation"
                    class="form-control"
                    
                    value=""
                    autocomplete="new-password"
                    required>
            </div>

            <button type="submit" class="btn btn-primary">
                <i class="fa fa-save me-2"></i>Simpan
            </button>

            <a href="{{ route('admin.user') }}"
               class="btn btn-secondary">
                <i class="fa fa-arrow-left me-2"></i>Kembali
            </a>
        </form>

    </div>
</div>
@endsection

