<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'MTs Al Muawanah')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>
        :root {
            --hijau: #087443;
            --hijau-tua: #064e35;
            --hijau-muda: #eaf7f0;
            --emas: #f4cf67;
        }

        * { box-sizing: border-box; }

        body {
            margin: 0;
            font-family: "Segoe UI", Arial, sans-serif;
            color: #24483d;
            background: #fff;
        }

        a { text-decoration: none; }

        .topbar {
            background: var(--hijau-tua);
            color: white;
            font-size: 12px;
            padding: 8px 0;
        }

        .navbar {
            background: white;
            box-shadow: 0 4px 20px #064e3510;
        }

        .navbar-brand {
            color: var(--hijau) !important;
            font-weight: 800;
        }

        .navbar-brand img {
            width: 43px;
            height: 43px;
            object-fit: contain;
            margin-right: 8px;
        }

        .navbar .nav-link {
            color: #34584c;
            font-size: 14px;
            font-weight: 600;
            padding: 12px !important;
        }

        .navbar .nav-link:hover,
        .navbar .nav-link.active {
            color: var(--hijau);
        }

        .btn-hijau {
            display: inline-block;
            background: var(--hijau);
            color: white;
            padding: 11px 22px;
            border: 0;
            border-radius: 30px;
            font-weight: 700;
            transition: .25s;
        }

        .btn-hijau:hover {
            color: white;
            background: var(--hijau-tua);
            transform: translateY(-2px);
        }

        .btn-putih {
            display: inline-block;
            background: white;
            color: var(--hijau);
            padding: 11px 22px;
            border-radius: 30px;
            font-weight: 700;
        }

        .hero-page {
            padding: 65px 0;
            color: white;
            background:
                linear-gradient(100deg, #064e35ed, #087443b5),
                url('https://images.unsplash.com/photo-1562774053-701939374585?auto=format&fit=crop&w=1800&q=85')
                center/cover;
        }

        .hero-page h1 {
            font-size: clamp(30px, 5vw, 46px);
            font-weight: 800;
        }

        .hero-page p {
            max-width: 650px;
            line-height: 1.8;
        }

        .section-space { padding: 65px 0; }

        .eyebrow {
            color: var(--hijau);
            font-size: 12px;
            font-weight: 800;
            letter-spacing: 1.5px;
            text-transform: uppercase;
        }

        .section-title {
            color: var(--hijau-tua);
            font-weight: 800;
            margin-bottom: 12px;
        }

        .school-card {
            height: 100%;
            overflow: hidden;
            background: white;
            border: 1px solid #e8f1ec;
            border-radius: 16px;
            box-shadow: 0 8px 25px #064e350b;
            transition: .25s;
        }

        .school-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px #064e3518;
        }

        .school-card img {
            width: 100%;
            height: 210px;
            object-fit: cover;
        }

        .card-body-custom { padding: 22px; }

        .icon-circle {
            width: 48px;
            height: 48px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: var(--hijau-muda);
            color: var(--hijau);
            font-size: 22px;
        }

        .soft-section { background: #f1faf5; }

        .footer {
            padding: 45px 0 18px;
            color: white;
            background: var(--hijau-tua);
        }

        .footer a { color: #d5eee1; }
        .footer a:hover { color: var(--emas); }

        .footer-bottom {
            margin-top: 28px;
            padding-top: 18px;
            border-top: 1px solid #ffffff25;
            font-size: 13px;
        }

        @media(max-width: 768px) {
            .hero-page { padding: 45px 0; }
            .section-space { padding: 42px 0; }
            .navbar-brand { font-size: 15px; }
        }
    </style>

    @stack('styles')
</head>
<body>

<div class="topbar">
    <div class="container d-flex justify-content-between flex-wrap gap-2">
        <span><i class="bi bi-geo-alt-fill"></i> MTs Al Muawanah</span>
        <span><i class="bi bi-mortarboard-fill"></i> Islami · Cerdas · Berprestasi</span>
    </div>
</div>

<nav class="navbar navbar-expand-lg sticky-top">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="{{ route('landing') }}">
            <img src="{{ asset('assets/images/logo2.png') }}"
                 alt="Logo MTs Al Muawanah"
                 onerror="this.style.display='none'">
            <span>MTs Al Muawanah
                <small class="d-block text-secondary fw-normal" style="font-size:11px">
                    Islami · Cerdas · Berprestasi
                </small>
            </span>
        </a>

        <button class="navbar-toggler" type="button"
                data-bs-toggle="collapse" data-bs-target="#menuUtama"
                aria-label="Buka menu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="menuUtama">
            <ul class="navbar-nav ms-auto align-items-lg-center">
                <li class="nav-item"><a class="nav-link" href="{{ route('landing') }}">Beranda</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('profil') }}">Profil</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('guru') }}">Guru</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('program') }}">Program</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('ekstrakurikuler') }}">Ekstrakulikuler</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('berita') }}">Berita</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('prestasi') }}">Prestasi</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('galeri') }}">Galeri</a></li>
                <li class="nav-item ms-lg-2">
                    <a href="{{ url('/login') }}" class="btn-hijau py-2 px-3">
                        <i class="bi bi-person-fill"></i> Login Admin
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<main>
    @yield('content')
</main>

<footer class="footer">
    <div class="container">
        <div class="row g-4">
            <div class="col-md-4">
                <h5 class="fw-bold">MTs Al Muawanah</h5>
                <p class="small">Mewujudkan generasi yang berakhlak mulia, berilmu, kreatif, mandiri, dan berprestasi.</p>
            </div>
            <div class="col-md-4">
                <h6 class="fw-bold">Menu Utama</h6>
                <div class="d-flex flex-column gap-2 small">
                    <a href="{{ route('landing') }}">Beranda</a>
                    <a href="{{ route('profil') }}">Profil Sekolah</a>
                    <a href="{{ route('guru') }}">Tenaga Pendidik</a>
                    <a href="{{ route('program') }}">Program Unggulan</a>
                    <a href="{{ route('berita') }}">Berita Sekolah</a>
                </div>
            </div>
            <div class="col-md-4">
                <h6 class="fw-bold">Hubungi Kami</h6>
                <p class="small mb-2"><i class="bi bi-geo-alt"></i> Informasi alamat sekolah</p>
                <p class="small mb-2"><i class="bi bi-envelope"></i> Email sekolah</p>
                <p class="small"><i class="bi bi-clock"></i> Senin - Sabtu</p>
            </div>
        </div>
        <div class="footer-bottom text-center">
            &copy; {{ date('Y') }} MTs Al Muawanah. Semua hak dilindungi.
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@stack('scripts')
</body>
</html>
