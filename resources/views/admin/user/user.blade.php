@extends('admin')

@section('content')

<div class="container-fluid pt-4 px-4">

    <div class="bg-light rounded p-4">

        {{-- Header --}}
        <div class="d-flex justify-content-between align-items-center mb-4">

            <div>
                <h4 class="mb-1">Data Pengguna</h4>
                <p class="text-muted mb-0">
                    Kelola akun Admin dan Operator sekolah
                </p>
            </div>

            <a href="{{ route('admin.user.create') }}"
               class="btn btn-primary">
                <i class="fa fa-plus me-2"></i>
                Tambah Pengguna
            </a>

        </div>


        {{-- Pesan berhasil --}}
        @if(session('success'))

            <div class="alert alert-success alert-dismissible fade show"
                 role="alert">

                <i class="fa fa-check-circle me-2"></i>

                {{ session('success') }}

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="alert">
                </button>

            </div>

        @endif


        {{-- Tabel --}}
        <div class="table-responsive">

            <table class="table table-bordered table-hover align-middle">

                <thead class="table-primary">

                    <tr>

                        <th width="60">No</th>

                        <th>Nama Pengguna</th>

                        <th>Email</th>

                        <th>Role</th>

                        <th width="180">Aksi</th>

                    </tr>

                </thead>


                <tbody>

                    @forelse($users as $user)

                        <tr>

                            {{-- No --}}
                            <td>
                                {{ $loop->iteration }}
                            </td>


                            {{-- Nama --}}
                            <td>

                                <div class="d-flex align-items-center">

                                    <div class="bg-primary rounded-circle
                                                d-flex align-items-center
                                                justify-content-center me-2"
                                         style="width: 40px; height: 40px;">

                                        <i class="fa fa-user text-white"></i>

                                    </div>

                                    <strong>
                                        {{ $user->name }}
                                    </strong>

                                </div>

                            </td>


                            {{-- Email --}}
                            <td>
                                {{ $user->email }}
                            </td>


                            {{-- Role --}}
                            <td>

                                @if($user->role == 'admin')

                                    <span class="badge bg-danger">
                                        Admin
                                    </span>

                                @elseif($user->role == 'operator')

                                    <span class="badge bg-primary">
                                        Operator
                                    </span>

                                @else

                                    <span class="badge bg-secondary">
                                        {{ ucfirst($user->role) }}
                                    </span>

                                @endif

                            </td>


                            {{-- Aksi --}}
                            <td>

                                {{-- Edit --}}
                               <a href="{{ route('admin.user.edit', $user->id) }}" 
                                class="btn btn-warning">
                                    <i class="fas fa-edit"></i>
                                </a>

                                {{-- Hapus --}}
                                <form action="{{ route('admin.user.destroy', $user->id) }}"
                                      method="POST"
                                      class="d-inline"
                                      onsubmit="return confirm('Yakin ingin menghapus pengguna ini?')">

                                    @csrf

                                    @method('DELETE')

                                    <button type="submit"
                                            class="btn btn-danger btn-sm"
                                            title="Hapus">

                                        <i class="fa fa-trash"></i>

                                    </button>

                                </form>

                            </td>

                        </tr>


                    @empty

                        <tr>

                            <td colspan="5"
                                class="text-center py-4">

                                <i class="fa fa-users fa-2x text-muted mb-2"></i>

                                <p class="mb-0 text-muted">
                                    Belum ada pengguna.
                                </p>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection