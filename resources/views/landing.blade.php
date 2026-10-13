<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MTs Al Muawanah - Sekolah Islami dan Berprestasi</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>
        :root {
            --hijau: #087443;
            --hijau-muda: #0ca968;
            --hijau-gelap: #064d30;
            --emas: #e7b93e;
            --putih: #fff;
            --abu: #f5f8f6;
        }

        * { box-sizing: border-box; }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            color: #26352d;
            background: #fff;
        }

        a { text-decoration: none; }

        .topbar {
            background: var(--hijau-gelap);
            color: white;
            font-size: 12px;
            padding: 9px 0;
        }

        .navbar {
            background: white;
            box-shadow: 0 3px 15px #0000000d;
        }

        .brand-logo {
            width: 48px;
            height: 48px;
            object-fit: contain;
        }

        .brand-name {
            color: var(--hijau);
            font-weight: 800;
            font-size: 19px;
        }

        .brand-tagline {
            color: #69776e;
            font-size: 11px;
        }

        .navbar .nav-link {
            color: #35483b;
            font-size: 13px;
            font-weight: 600;
            padding: 12px;
        }

        .navbar .nav-link:hover { color: var(--hijau-muda); }

        .btn-hijau {
            color: white;
            background: var(--hijau);
            border: 1px solid var(--hijau);
            border-radius: 5px;
            padding: 11px 19px;
            font-size: 13px;
            font-weight: 700;
        }

        .btn-hijau:hover {
            background: var(--hijau-gelap);
            color: white;
        }

        .btn-emas {
            color: #26352d;
            background: var(--emas);
            border: 1px solid var(--emas);
            border-radius: 5px;
            padding: 11px 19px;
            font-size: 13px;
            font-weight: 700;
        }

        .hero {
            min-height: 490px;
            position: relative;
            display: flex;
            align-items: center;
            background:
                linear-gradient(90deg, rgba(3,42,25,.86), rgba(3,42,25,.40)),
                url("{{ asset('assets/images/sekolah.webp') }}") center/cover no-repeat;
            color: white;
        }

        .hero-content { max-width: 650px; padding: 70px 0; }

        .hero-label {
            display: inline-block;
            color: var(--emas);
            font-size: 12px;
            font-weight: 800;
            letter-spacing: 2px;
            margin-bottom: 16px;
        }

        .hero h1 {
            font-size: clamp(34px, 5vw, 55px);
            line-height: 1.13;
            font-weight: 800;
            margin-bottom: 20px;
        }

        .hero h1 span { color: var(--emas); }

        .hero p {
            color: #f0f5f1;
            max-width: 570px;
            line-height: 1.8;
            font-size: 15px;
            margin-bottom: 26px;
        }

        .stats {
            background: var(--hijau);
            color: white;
            padding: 27px 0;
        }

        .stat-item {
            text-align: center;
            padding: 8px;
            border-right: 1px solid #ffffff35;
        }

        .stat-item:last-child { border: 0; }

        .stat-item h2 {
            color: var(--emas);
            font-size: 29px;
            font-weight: 800;
            margin: 0 0 5px;
        }

        .stat-item p {
            margin: 0;
            font-size: 11px;
            letter-spacing: 1px;
        }

        .section { padding: 75px 0; }

        .section-label {
            display: inline-block;
            color: var(--hijau);
            background: #e7f5ed;
            border-radius: 3px;
            padding: 7px 11px;
            font-size: 10px;
            font-weight: 800;
            letter-spacing: 1px;
            margin-bottom: 12px;
        }

        .section-title {
            font-size: clamp(25px, 3vw, 34px);
            color: #1b3023;
            font-weight: 800;
            margin-bottom: 15px;
        }

        .title-line {
            height: 3px;
            width: 55px;
            background: var(--emas);
            margin-bottom: 22px;
        }

        .profile-photo {
            width: 100%;
            height: 350px;
            object-fit: cover;
            border-radius: 9px;
            box-shadow: 0 12px 30px #123d241b;
        }

        .profile-text {
            font-size: 14px;
            color: #66736a;
            line-height: 1.9;
        }

        .check-list {
            list-style: none;
            padding: 0;
            margin: 20px 0;
        }

        .check-list li {
            margin: 12px 0;
            font-size: 13px;
            color: #435449;
        }

        .check-list i {
            color: var(--hijau-muda);
            margin-right: 9px;
        }

        .program-section { background: var(--abu); }

        .program-card {
            height: 100%;
            background: white;
            border: 1px solid #e9eee9;
            border-radius: 9px;
            padding: 25px 17px;
            text-align: center;
            transition: .25s;
        }

        .program-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 28px #174d2814;
        }

        .program-icon {
            width: 55px;
            height: 55px;
            margin: 0 auto 17px;
            display: grid;
            place-items: center;
            border-radius: 12px;
            background: #e5f5eb;
            color: var(--hijau);
            font-size: 25px;
        }

        .program-card h3 {
            font-size: 15px;
            font-weight: 800;
            margin-bottom: 10px;
        }

        .program-card p {
            font-size: 12px;
            color: #718076;
            line-height: 1.7;
            margin-bottom: 0;
        }

        .news-card {
            height: 100%;
            background: white;
            border: 1px solid #e8ede9;
            border-radius: 9px;
            overflow: hidden;
        }

        .news-image {
            width: 100%;
            height: 205px;
            object-fit: cover;
            background: #e9f1eb;
        }

        .news-body { padding: 20px; }

        .news-date {
            font-size: 11px;
            color: var(--hijau);
            font-weight: 700;
        }

        .news-body h3 {
            font-size: 17px;
            line-height: 1.5;
            font-weight: 800;
            margin: 10px 0;
        }

        .news-body p {
            color: #718076;
            font-size: 13px;
            line-height: 1.7;
        }

        .read-more {
            color: var(--hijau);
            font-size: 12px;
            font-weight: 800;
        }

        .gallery-section { background: #fff; }

        .gallery-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 7px;
            transition: .25s;
        }

        .gallery-image:hover { transform: scale(1.02); }

        .cta-section {
            background: var(--hijau);
            padding: 35px 0;
            color: white;
        }

        .cta-section h2 {
            font-size: 24px;
            font-weight: 800;
        }

        .cta-section p {
            font-size: 13px;
            margin-bottom: 0;
            color: #e1f0e6;
        }

        .footer {
            background: #063d27;
            color: #e6f0e9;
            padding: 55px 0 20px;
        }

        .footer h3 {
            color: white;
            font-size: 16px;
            font-weight: 800;
            margin-bottom: 20px;
        }

        .footer p {
            font-size: 12px;
            line-height: 1.9;
            color: #c8dbce;
        }

        .footer-links {
            list-style: none;
            padding: 0;
        }

        .footer-links li { margin-bottom: 12px; }

        .footer-links a {
            color: #c8dbce;
            font-size: 12px;
        }

        .footer-links a:hover { color: var(--emas); }

        .footer-bottom {
            border-top: 1px solid #ffffff24;
            padding-top: 20px;
            margin-top: 30px;
            font-size: 11px;
            color: #c8dbce;
        }

        @media (max-width: 767px) {
            .hero { min-height: 430px; }
            .stat-item { border: 0; }
            .stat-item h2 { font-size: 24px; }
            .section { padding: 50px 0; }
            .profile-photo { height: 260px; }
            .gallery-image { height: 150px; }
        }
    </style>
</head>

<body>

<!-- TOPBAR -->
<div class="topbar">
    <div class="container d-flex justify-content-between flex-wrap gap-2">
        <span><i class="bi bi-mortarboard me-1"></i> MTs Al Muawanah</span>
        <span><i class="bi bi-book me-1"></i> Islami • Cerdas • Berprestasi</span>
    </div>
</div>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg sticky-top">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
            <img src="{{ asset('assets/images/logo2.png') }}"
                 alt="Logo MTs Al Muawanah"
                 class="brand-logo me-2"
                 onerror="this.style.display='none'">
            <div>
                <div class="brand-name">MTs Al Muawanah</div>
                <div class="brand-tagline">Islami • Cerdas • Berprestasi</div>
            </div>
        </a>

        <button class="navbar-toggler" type="button"
                data-bs-toggle="collapse" data-bs-target="#menuUtama">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="menuUtama">
            <ul class="navbar-nav ms-auto align-items-lg-center">
                <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Beranda</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/profil') }}">Profil</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/program') }}">Program</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/ekstrakulikuler') }}">Ekstrakulikuler</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/berita') }}">Berita</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/prestasi') }}">Prestasi</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/galeri') }}">Galeri</a></li>
                <li class="nav-item ms-lg-2 my-2">
                    <a class="btn btn-hijau" href="{{ route('ujikom') }}">
                        <i class="bi bi-calculator me-1"></i> UJIKOM
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- HERO -->
<section class="hero">
    <div class="container">
        <div class="hero-content">
            <span class="hero-label">SELAMAT DATANG DI</span>
            <h1>MTs Al Muawanah<br>
                <span>Membentuk Generasi Islami</span>
            </h1>
            <p>
                Membangun generasi yang berakhlak mulia, cerdas, mandiri,
                berpengetahuan, dan mampu memberikan manfaat bagi masyarakat.
            </p>
            <div class="d-flex gap-3 flex-wrap">
                <a href="{{ url('/profil') }}" class="btn btn-hijau">
                    Profil Sekolah <i class="bi bi-arrow-right ms-1"></i>
                </a>
                <a href="{{ url('/program') }}" class="btn btn-emas">
                    Lihat Program
                </a>
            </div>
        </div>
    </div>
</section>

<!-- STATISTIK -->
<section class="stats">
    <div class="container">
        <div class="row g-3">
            <div class="col-6 col-lg-3">
                <div class="stat-item">
                    <h2>{{ isset($siswa) ? $siswa->count() : 0 }}</h2>
                    <p>DATA SISWA</p>
                </div>
            </div>
            <div class="col-6 col-lg-3">
                <div class="stat-item">
                    <h2>{{ isset($guru) ? $guru->count() : 0 }}</h2>
                    <p>TENAGA PENDIDIK</p>
                </div>
            </div>
            <div class="col-6 col-lg-3">
                <div class="stat-item">
                    <h2>{{ isset($ekstrakulikuler) ? $ekstrakulikuler->count() : 0 }}</h2>
                    <p>PROGRAM EKSTRAKULIKULER</p>
                </div>
            </div>
            <div class="col-6 col-lg-3">
                <div class="stat-item">
                    <h2>{{ $profil->tahun_berdiri ?? '—' }}</h2>
                    <p>TAHUN BERDIRI</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- PROFIL / SAMBUTAN -->
<section class="section">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-5">
                <img
                    src="{{ !empty($profil->foto) ? asset('storage/'.$profil->foto) : asset('assets/images/sekolah.webp') }}"
                    alt="Profil MTs Al Muawanah"
                    class="profile-photo"
                    onerror="this.onerror=null;this.src='{{ asset('assets/images/sekolah.webp') }}'">
            </div>

            <div class="col-lg-7">
                <span class="section-label">TENTANG KAMI</span>
                <h2 class="section-title">
                    Mengenal MTs Al Muawanah
                </h2>
                <div class="title-line"></div>

                <p class="profile-text">
                    {{ $profil->deskripsi ?? 'MTs Al Muawanah berkomitmen membentuk peserta didik yang berakhlak mulia, berprestasi, mandiri, serta memiliki kepedulian terhadap masyarakat.' }}
                </p>

                <p class="profile-text">
                    Dengan pembelajaran yang mengutamakan nilai-nilai Islam,
                    pengembangan karakter, dan pengetahuan, kami mendampingi
                    peserta didik untuk meraih masa depan yang lebih baik.
                </p>

                <ul class="check-list">
                    <li><i class="bi bi-check-circle-fill"></i> Pendidikan berlandaskan nilai-nilai Islam</li>
                    <li><i class="bi bi-check-circle-fill"></i> Pembelajaran akademik dan pengembangan karakter</li>
                    <li><i class="bi bi-check-circle-fill"></i> Kegiatan ekstrakulikuler dan pengembangan bakat</li>
                    <li><i class="bi bi-check-circle-fill"></i> Lingkungan belajar yang mendukung prestasi</li>
                </ul>

                <a href="{{ url('/profil') }}" class="btn btn-hijau">
                    Profil Lengkap <i class="bi bi-arrow-right ms-1"></i>
                </a>
                <a href="{{ url('/guru') }}" class="btn btn-outline-success ms-2">
                    Lihat Guru
                </a>
            </div>
        </div>
    </div>
</section>

<!-- PROGRAM -->
<section class="section program-section">
    <div class="container">
        <div class="text-center mb-5">
            <span class="section-label">PENDIDIKAN UNGGULAN</span>
            <h2 class="section-title">Program Unggulan Sekolah</h2>
            <p class="text-secondary">
                Program pendidikan untuk mengembangkan ilmu, akhlak, dan potensi siswa.
            </p>
        </div>

        <div class="row g-4">
            <div class="col-6 col-md-4 col-lg-3">
                <div class="program-card">
                    <div class="program-icon"><i class="bi bi-moon-stars"></i></div>
                    <h3>Program Keagamaan</h3>
                    <p>Membiasakan ibadah, akhlak mulia, dan pemahaman agama.</p>
                </div>
            </div>

            <div class="col-6 col-md-4 col-lg-3">
                <div class="program-card">
                    <div class="program-icon"><i class="bi bi-book"></i></div>
                    <h3>Program Akademik</h3>
                    <p>Meningkatkan pengetahuan dan kemampuan belajar siswa.</p>
                </div>
            </div>

            <div class="col-6 col-md-4 col-lg-3">
                <div class="program-card">
                    <div class="program-icon"><i class="bi bi-people"></i></div>
                    <h3>Pendidikan Karakter</h3>
                    <p>Melatih disiplin, tanggung jawab, dan kerja sama.</p>
                </div>
            </div>

            <div class="col-6 col-md-4 col-lg-3">
                <div class="program-card">
                    <div class="program-icon"><i class="bi bi-trophy"></i></div>
                    <h3>Program Prestasi</h3>
                    <p>Mendukung siswa meraih prestasi di bidang akademik dan nonakademik.</p>
                </div>
            </div>
        </div>

        <div class="text-center mt-4">
            <a href="{{ url('/program') }}" class="btn btn-hijau">
                Lihat Semua Program <i class="bi bi-arrow-right ms-1"></i>
            </a>
        </div>
    </div>
</section>

<!-- BERITA -->
<section class="section">
    <div class="container">
        <div class="d-flex justify-content-between align-items-end flex-wrap gap-3 mb-4">
            <div>
                <span class="section-label">INFORMASI TERBARU</span>
                <h2 class="section-title mb-0">Berita & Kegiatan Sekolah</h2>
            </div>
            <a href="{{ url('/berita') }}" class="btn btn-outline-success">
                Semua Berita <i class="bi bi-arrow-right ms-1"></i>
            </a>
        </div>

        <div class="row g-4">
            @forelse(($berita ?? collect()) as $item)
                <div class="col-md-6 col-lg-3">
                    <article class="news-card">
                        <img
                            src="{{ !empty($item->gambar) ? asset('storage/'.$item->gambar) : asset('assets/images/sekolah.webp') }}"
                            class="news-image"
                            alt="{{ $item->judul }}"
                            onerror="this.onerror=null;this.src='{{ asset('assets/images/sekolah.webp') }}'">

                        <div class="news-body">
                            <div class="news-date">
                                <i class="bi bi-calendar3 me-1"></i>
                                {{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y') }}
                            </div>

                            <h3>{{ $item->judul }}</h3>
                            <p>{{ \Illuminate\Support\Str::limit(strip_tags($item->isi), 100) }}</p>

                            <a href="{{ url('/berita') }}" class="read-more">
                                Baca Selengkapnya <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </article>
                </div>
            @empty
                <div class="col-12">
                    <div class="text-center p-5 bg-light rounded">
                        <i class="bi bi-newspaper fs-1 text-success"></i>
                        <h3 class="h5 mt-3">Berita Sekolah</h3>
                        <p class="text-secondary mb-0">
                            Berita sekolah akan ditampilkan di sini setelah ditambahkan oleh admin.
                        </p>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</section>

<!-- GALERI -->
<section class="section gallery-section">
    <div class="container">
        <div class="d-flex justify-content-between align-items-end flex-wrap gap-3 mb-4">
            <div>
                <span class="section-label">DOKUMENTASI</span>
                <h2 class="section-title mb-0">Galeri Kegiatan Sekolah</h2>
            </div>
            <a href="{{ url('/galeri') }}" class="btn btn-outline-success">
                Lihat Semua <i class="bi bi-arrow-right ms-1"></i>
            </a>
        </div>

        <div class="row g-3">
            @forelse(($galeri ?? collect()) as $foto)
                <div class="col-6 col-md-4">
                    <img
                        src="{{ !empty($foto->file) ? asset('storage/'.$foto->file) : asset('assets/images/sekolah.webp') }}"
                        alt="{{ $foto->judul }}"
                        class="gallery-image"
                        onerror="this.onerror=null;this.src='{{ asset('assets/images/sekolah.webp') }}'">
                    <p class="mt-2 mb-0 fw-semibold small">{{ $foto->judul }}</p>
                </div>
            @empty
                <div class="col-12">
                    <div class="text-center p-5 bg-light rounded">
                        <i class="bi bi-images fs-1 text-success"></i>
                        <p class="mt-3 mb-0">
                            Foto kegiatan sekolah akan muncul di sini.
                        </p>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</section>

<!-- CTA UJIKOM -->
<section class="cta-section">
    <div class="container d-flex justify-content-between align-items-center flex-wrap gap-4">
        <div>
            <h2><i class="bi bi-mortarboard me-2"></i>Siap Mengikuti UJIKOM?</h2>
            <p>Tekan tombol berikut untuk membuka halaman UJIKOM.</p>
        </div>

        <a href="{{ route('ujikom') }}" class="btn btn-emas">
            Buka UJIKOM <i class="bi bi-arrow-right ms-1"></i>
        </a>
    </div>
</section>

<!-- FOOTER -->
<footer class="footer">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-4">
                <div class="d-flex align-items-center mb-3">
                    <img src="{{ asset('assets/images/logo2.png') }}"
                         alt="Logo MTs Al Muawanah"
                         width="48" height="48"
                         class="me-3"
                         style="object-fit:contain"
                         onerror="this.style.display='none'">

                    <div>
                        <h3 class="mb-1">MTs Al Muawanah</h3>
                        <p class="mb-0">Islami • Cerdas • Berprestasi</p>
                    </div>
                </div>

                <p>
                    Membangun generasi yang berakhlak mulia, berpengetahuan,
                    mandiri, dan mampu memberikan manfaat bagi masyarakat.
                </p>
            </div>

            <div class="col-6 col-lg-2">
                <h3>Menu Utama</h3>
                <ul class="footer-links">
                    <li><a href="{{ url('/') }}">Beranda</a></li>
                    <li><a href="{{ url('/profil') }}">Profil</a></li>
                    <li><a href="{{ url('/program') }}">Program</a></li>
                    <li><a href="{{ url('/berita') }}">Berita</a></li>
                    <li><a href="{{ url('/galeri') }}">Galeri</a></li>
                    <li><a href="{{ route('ujikom') }}">UJIKOM</a></li>
                </ul>
            </div>

            <div class="col-6 col-lg-3">
                <h3>Program Sekolah</h3>
                <ul class="footer-links">
                    <li><a href="{{ url('/ekstrakulikuler') }}">Ekstrakulikuler</a></li>
                    <li><a href="{{ url('/prestasi') }}">Prestasi Siswa</a></li>
                    <li><a href="{{ url('/program') }}">Program Keagamaan</a></li>
                    <li><a href="{{ url('/program') }}">Program Akademik</a></li>
                </ul>
            </div>

            <div class="col-lg-3">
                <h3>Kontak & Lokasi</h3>
                <p>
                    <i class="bi bi-geo-alt me-2"></i>
                    {{ $profil->alamat ?? 'Alamat MTs Al Muawanah' }}
                </p>
                <p>
                    <i class="bi bi-telephone me-2"></i>
                    {{ $profil->kontak ?? 'Kontak sekolah' }}
                </p>
                <p>
                    <i class="bi bi-building me-2"></i>
                    {{ $profil->nama_sekolah ?? 'MTs Al Muawanah' }}
                </p>
            </div>
        </div>

        <div class="footer-bottom d-flex justify-content-between flex-wrap gap-2">
            <span>&copy; {{ date('Y') }} MTs Al Muawanah. Hak cipta dilindungi.</span>
            <span>Dibuat dengan Laravel</span>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
