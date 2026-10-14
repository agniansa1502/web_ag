@extends('admin')

@section('content')

<div class="container-fluid pt-4 px-4">

    <div class="bg-white rounded shadow-sm p-4">

        <div class="d-flex justify-content-between align-items-center mb-4">

            <div>
                <h4 class="fw-bold mb-1">
                    Detail Pengguna
                </h4>

                <p class="text-muted mb-0">
                    Informasi akun pengguna
                </p>
            </div>

            <a href="{{ route('admin.user') }}"
               class="btn btn-secondary">

                <i class="fa fa-arrow-left me-1"></i>
                Kembali

            </a>

        </div>


        <div class="row">

            <div class="col-md-6">

                <table class="table">

                    <tr>
                        <th width="180">Nama</th>
                        <td>{{ $user->name }}</td>
                    </tr>

                    <tr>
                        <th>Email</th>
                        <td>{{ $user->email }}</td>
                    </tr>

                    <tr>
                        <th>Role</th>
                        <td>

                            @if($user->role === 'admin')

                                <span class="badge bg-danger">
                                    Admin
                                </span>

                            @else

                                <span class="badge bg-primary">
                                    Operator
                                </span>

                            @endif

                        </td>
                    </tr>

                    <tr>
                        <th>Dibuat</th>
                        <td>
                            {{ $user->created_at->format('d-m-Y H:i') }}
                        </td>
                    </tr>

                </table>

            </div>

        </div>

    </div>

</div>

@endsection