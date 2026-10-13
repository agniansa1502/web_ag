<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>UJIKOM - MTs Al Muawanah</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #e8f5ed, #f5faf6);
            min-height: 100vh;
            font-family: Arial, sans-serif;
        }
        .navbar { background: #087443; }
        .card {
            border: 0;
            border-radius: 18px;
            box-shadow: 0 12px 35px #064d3018;
        }
        .btn-hijau {
            background: #087443;
            color: white;
            border: 0;
        }
        .btn-hijau:hover {
            background: #064d30;
            color: white;
        }
        .judul { color: #087443; font-weight: 800; }
    </style>
</head>
<body>

<nav class="navbar navbar-dark">
    <div class="container">
        <a href="{{ url('/') }}" class="navbar-brand fw-bold">
            MTs Al Muawanah
        </a>
        <a href="{{ url('/') }}" class="btn btn-light btn-sm">
            Kembali ke Beranda
        </a>
    </div>
</nav>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-7 col-lg-6">

            <div class="card p-4 p-md-5">
                <div class="text-center mb-4">
                    <h2 class="judul">Form Input Nilai</h2>
                    <p class="text-secondary">
                        UJIKOM MTs Al Muawanah
                    </p>
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('ujikom.hitung') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Nama Siswa</label>
                        <input type="text" name="nama"
                               class="form-control"
                               value="{{ old('nama') }}"
                               placeholder="Masukkan nama siswa"
                               required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nilai Pertama</label>
                        <input type="number" name="nilai1"
                               class="form-control"
                               value="{{ old('nilai1') }}"
                               min="0" max="100" step="any"
                               placeholder="0 - 100" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nilai Kedua</label>
                        <input type="number" name="nilai2"
                               class="form-control"
                               value="{{ old('nilai2') }}"
                               min="0" max="100" step="any"
                               placeholder="0 - 100" required>
                    </div>

                    <button type="submit" class="btn btn-hijau w-100 py-2">
                        Hitung Nilai Rata-rata
                    </button>
                </form>

                @if (session('hasil'))
                    <div class="alert alert-success mt-4 mb-0">
                        <h5>Hasil Perhitungan</h5>
                        <p class="mb-1">
                            Nama: {{ session('nama') }}
                        </p>
                        <p class="mb-0">
                            Nilai rata-rata:
                            <strong>{{ session('hasil') }}</strong>
                        </p>
                    </div>
                @endif
            </div>

        </div>
    </div>
</div>

</body>
</html>
