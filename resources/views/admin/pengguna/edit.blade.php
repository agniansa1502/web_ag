@extends('admin')

@section('content')

<div class="container-fluid pt-4 px-4">

    <div class="bg-white rounded shadow-sm p-4">

        <h4 class="fw-bold mb-4">Edit Pengguna</h4>

        <form action="{{ route('admin.user.update', $user->id) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Nama</label>
                <input type="text"
                       name="name"
                       class="form-control"
                       value="{{ $user->name }}"
                       required>
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email"
                       name="email"
                       class="form-control"
                       value="{{ $user->email }}"
                       required>
            </div>

            <div class="mb-3">
    <label class="form-label">Password Baru</label>
    <input type="password"
           name="password"
           class="form-control"
          
</div>

<div class="mb-3">
    <label class="form-label">Konfirmasi Password</label>
    <input type="password"
           name="password_confirmation"
           class="form-control"
         
</div>

            <div class="mb-3">
                <label class="form-label">Role</label>
                <select name="role" class="form-control" required>
                    <option value="admin"
                        {{ $user->role == 'admin' ? 'selected' : '' }}>
                        Admin
                    </option>

                    <option value="operator"
                        {{ $user->role == 'operator' ? 'selected' : '' }}>
                        Operator
                    </option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">
                Simpan Perubahan
            </button>

            <a href="{{ route('admin.user') }}"
               class="btn btn-secondary">
                Kembali
            </a>

        </form>

    </div>

</div>

@endsection