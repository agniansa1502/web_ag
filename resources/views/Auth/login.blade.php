<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login | MTs Al Muawanah</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <style>
        :root {
            --hijau: #087443;
            --hijau-tua: #075c36;
            --hijau-muda: #0ca968;
            --emas: #f4c542;
        }

        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #e8f5ec, #f8fbf8);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            font-family: Arial, sans-serif;
        }

        .login-card {
            width: 100%;
            max-width: 420px;
            border: none;
            border-radius: 20px;
            overflow: hidden;
            background: #ffffff;
            box-shadow: 0 15px 40px rgba(7, 92, 54, 0.13);
        }

        .login-header {
            background: linear-gradient(
                135deg,
                var(--hijau-tua),
                var(--hijau-muda)
            );
            padding: 30px 25px;
            text-align: center;
            color: white;
            border-bottom: 5px solid var(--emas);
        }

        .school-logo {
            width: 85px;
            height: 85px;
            object-fit: contain;
            background: white;
            padding: 8px;
            border-radius: 50%;
            margin-bottom: 14px;
            border: 3px solid var(--emas);
        }

        .school-name {
            font-size: 23px;
            font-weight: 800;
            margin-bottom: 5px;
        }

        .school-description {
            font-size: 13px;
            color: #e5ffed;
            margin-bottom: 0;
        }

        .login-body {
            padding: 30px;
        }

        .login-title {
            color: var(--hijau-tua);
            font-size: 22px;
            font-weight: 700;
            text-align: center;
            margin-bottom: 6px;
        }

        .login-subtitle {
            color: #7b8780;
            text-align: center;
            font-size: 14px;
            margin-bottom: 25px;
        }

        .form-label {
            font-size: 14px;
            color: #34483b;
            font-weight: 600;
        }

        .form-control {
            padding: 12px 14px;
            border: 1px solid #dce8df;
            border-radius: 10px;
        }

        .form-control:focus {
            border-color: var(--hijau-muda);
            box-shadow: 0 0 0 3px rgba(12, 169, 104, 0.12);
        }

        .btn-login {
            padding: 12px;
            color: white;
            font-weight: 700;
            border: none;
            border-radius: 10px;
            background: linear-gradient(
                135deg,
                var(--hijau),
                var(--hijau-muda)
            );
            transition: 0.2s;
        }

        .btn-login:hover {
            background: var(--hijau-tua);
            color: white;
            transform: translateY(-1px);
        }

        .login-footer {
            text-align: center;
            padding: 0 20px 22px;
            font-size: 12px;
            color: #8a968e;
        }

        .login-footer span {
            color: var(--hijau);
            font-weight: 700;
        }
    </style>
</head>

<body>

    <div class="card login-card">

        {{-- HEADER SEKOLAH --}}
        <div class="login-header">

            <img src="{{ asset('assets/images/logo2.png') }}"
                 alt="Logo MTs Al Muawanah"
                 class="school-logo"
                 onerror="this.style.display='none'">

            <h1 class="school-name">MTs AL MUAWANAH</h1>

            <p class="school-description">
                Sistem Informasi Manajemen Sekolah
            </p>

        </div>

        {{-- FORM LOGIN --}}
        <div class="login-body">

            <h2 class="login-title">Login Admin</h2>

            <p class="login-subtitle">
                Silakan masuk untuk mengelola data sekolah
            </p>

            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show"
                     role="alert">
                    {{ $errors->first() }}

                    <button type="button"
                            class="btn-close"
                            data-bs-dismiss="alert"
                            aria-label="Close"></button>
                </div>
            @endif

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('login.post') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="username" class="form-label">
                        Username
                    </label>

                    <input
                        type="text"
                        name="username"
                        id="username"
                        class="form-control @error('username') is-invalid @enderror"
                        value="{{ old('username') }}"
                        placeholder="Masukkan username"
                        autocomplete="username"
                        required
                        autofocus>

                    @error('username')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">
                        Password
                    </label>

                    <input
                        type="password"
                        name="password"
                        id="password"
                        class="form-control"
                        placeholder="Masukkan password"
                        autocomplete="current-password"
                        required>
                </div>

                <div class="d-grid gap-2 mt-4">
                    <button type="submit" class="btn btn-login">
                        Masuk ke Dashboard
                    </button>
                </div>

            </form>
        </div>

        {{-- FOOTER --}}
        <div class="login-footer">
            &copy; {{ date('Y') }}
            <span>MTs Al Muawanah</span>.
            All rights reserved.
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
