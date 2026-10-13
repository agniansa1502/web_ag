<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MTs Al Muawanah - Beranda</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root { --hijau:#087443; --terang:#0ca968; }
        body { font-family:Arial,sans-serif; background:#f7faf7; color:#26352d; }
        .navbar { background:white; }
        .navbar-brand { color:var(--hijau); font-weight:800; }
        .nav-link { color:#344b3e; font-weight:600; }
        .nav-link:hover { color:var(--terang); }
        .hero {
            color:white; padding:100px 0;
            background:linear-gradient(90deg,rgba(0,65,37,.92),rgba(0,90,50,.45)),
            url('https://images.unsplash.com/photo-1580582932707-520aed937b7b?auto=format&fit=crop&w=1600&q=80') center/cover;
        }
        .btn-hijau { background:var(--hijau); color:white; border:0; }
        .btn-hijau:hover { background:var(--terang); color:white; }
        .judul { color:var(--hijau); font-weight:800; }
        .kartu { border:0; border-radius:14px; overflow:hidden; box-shadow:0 5px 20px #1231; height:100%; }
        .kartu img { height:190px; object-fit:cover; }
        .angka { background:var(--hijau); color:white; padding:25px 10px; text-align:center; }
        footer { background:#064d30; color:white; }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg sticky-top shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="/">MTs Al Muawanah</a>
        <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#menu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="menu">
            <div class="navbar-nav ms-auto">
                <a class="nav-link" href="/">Beranda</a>
                <a class="nav-link" href="/profil">Profil</a>
                <a class="nav-link" href="/guru">Guru</a>
                <a class="nav-link" href="/program">Program</a>
                <a class="nav-link" href="/ekstrakurikuler">Ekstrakulikuler</a>
                <a class="nav-link" href="/berita">Berita</a>
                <a class="nav-link" href="/prestasi">Prestasi</a>
                <a class="nav-link" href="/galeri">Galeri</a>
            </div>
        </div>
    </div>
</nav>

<section class="hero">
    <div class="container">
        <span class="badge bg-light text-success mb-3">SELAMAT DATANG DI MTs AL MUAWANAH</span>
        <h1 class="display-4 fw-bold">Membentuk Generasi<br>Islami, Cerdas, dan Berprestasi</h1>
        <p class="lead mt-3">Mewujudkan peserta didik yang berakhlak mulia, berilmu, dan siap menghadapi masa depan.</p>
        <a href="/profil" class="btn btn-hijau btn-lg mt-3">Kenali Sekolah Kami</a>
        <a href="/program" class="btn btn-light btn-lg mt-3">Lihat Program</a>
    </div>
</section>

<section class="container-fluid">
    <div class="row">
        <div class="col-md-4 angka"><h2>500+</h2><p class="mb-0">Peserta Didik</p></div>
        <div class="col-md-4 angka"><h2>30+</h2><p class="mb-0">Tenaga Pendidik</p></div>
        <div class="col-md-4 angka"><h2>10+</h2><p class="mb-0">Program Unggulan</p></div>
    </div>
</section>

<section class="container py-5">
    <div class="row align-items-center g-4">
        <div class="col-md-5">
            <img class="img-fluid rounded-4 shadow"
                src="https://images.unsplash.com/photo-1562774053-701939374585?auto=format&fit=crop&w=900&q=80"
                alt="Gedung sekolah">
        </div>
        <div class="col-md-7">
            <p class="text-success fw-bold mb-1">SAMBUTAN SEKOLAH</p>
            <h2 class="judul">Membangun Generasi Berakhlak Mulia dan Berilmu</h2>
            <p>Selamat datang di website resmi MTs Al Muawanah. Website ini menjadi sarana informasi sekolah, kegiatan peserta didik, program pendidikan, serta berbagai prestasi yang diraih.</p>
            <a href="/profil" class="btn btn-hijau">Selengkapnya</a>
        </div>
    </div>
</section>

<section class="container py-5">
    <div class="text-center mb-4">
        <p class="text-success fw-bold mb-1">PENDIDIKAN BERKUALITAS</p>
        <h2 class="judul">Program Unggulan</h2>
        <p>Program untuk mengembangkan potensi dan karakter peserta didik.</p>
    </div>
    <div class="row g-4">
        <div class="col-md-4"><div class="card kartu p-4"><h5>📖 Keagamaan</h5><p>Pembiasaan ibadah dan penguatan akhlak mulia.</p></div></div>
        <div class="col-md-4"><div class="card kartu p-4"><h5>🎓 Akademik</h5><p>Pembelajaran berkualitas untuk meraih prestasi.</p></div></div>
        <div class="col-md-4"><div class="card kartu p-4"><h5>🤝 Karakter</h5><p>Menanamkan disiplin, tanggung jawab, dan kerja sama.</p></div></div>
        <div class="col-md-4"><div class="card kartu p-4"><h5>📚 Literasi</h5><p>Meningkatkan minat baca dan kemampuan menulis.</p></div></div>
        <div class="col-md-4"><div class="card kartu p-4"><h5>💻 Teknologi</h5><p>Mengenalkan pemanfaatan teknologi dalam belajar.</p></div></div>
        <div class="col-md-4"><div class="card kartu p-4"><h5>🏆 Prestasi</h5><p>Mendorong peserta didik mengembangkan bakat.</p></div></div>
    </div>
    <div class="text-center mt-4"><a href="/program" class="btn btn-hijau">Semua Program</a></div>
</section>

<section class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="judul">Berita Terbaru</h2>
        <a href="/berita" class="text-success">Lihat semua</a>
    </div>
    <div class="row g-4">
        <div class="col-md-4">
            <div class="card kartu">
                <img src="https://images.unsplash.com/photo-1509062522246-3755977927d7?auto=format&fit=crop&w=800&q=80" alt="Kegiatan sekolah">
                <div class="card-body"><small class="text-muted">07 Oktober 2026</small><h5 class="mt-2">Kegiatan Belajar di Sekolah</h5><p>Aktivitas pembelajaran untuk meningkatkan pengetahuan peserta didik.</p><a href="/berita" class="text-success">Baca selengkapnya →</a></div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card kartu">
                <img src="https://images.unsplash.com/photo-1529390079861-591de354faf5?auto=format&fit=crop&w=800&q=80" alt="Kegiatan siswa">
                <div class="card-body"><small class="text-muted">05 Oktober 2026</small><h5 class="mt-2">Kegiatan Siswa</h5><p>Membangun kreativitas dan kebersamaan melalui kegiatan sekolah.</p><a href="/berita" class="text-success">Baca selengkapnya →</a></div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card kartu">
                <img src="https://images.unsplash.com/photo-1523580846011-d3a5bc25702b?auto=format&fit=crop&w=800&q=80" alt="Prestasi sekolah">
                <div class="card-body"><small class="text-muted">28 September 2026</small><h5 class="mt-2">Semangat Meraih Prestasi</h5><p>Mendorong siswa untuk terus belajar dan mengembangkan potensi.</p><a href="/prestasi" class="text-success">Lihat prestasi →</a></div>
            </div>
        </div>
    </div>
</section>

<section class="container py-5">
    <div class="text-center mb-4"><h2 class="judul">Galeri Kegiatan</h2><p>Dokumentasi kegiatan MTs Al Muawanah.</p></div>
    <div class="row g-3">
        <div class="col-6 col-md-3"><img class="img-fluid rounded-3" src="https://images.unsplash.com/photo-1562774053-701939374585?auto=format&fit=crop&w=500&q=80" alt="Sekolah"></div>
        <div class="col-6 col-md-3"><img class="img-fluid rounded-3" src="https://images.unsplash.com/photo-1509062522246-3755977927d7?auto=format&fit=crop&w=500&q=80" alt="Belajar"></div>
        <div class="col-6 col-md-3"><img class="img-fluid rounded-3" src="https://images.unsplash.com/photo-1529390079861-591de354faf5?auto=format&fit=crop&w=500&q=80" alt="Siswa"></div>
        <div class="col-6 col-md-3"><img class="img-fluid rounded-3" src="https://images.unsplash.com/photo-1523580846011-d3a5bc25702b?auto=format&fit=crop&w=500&q=80" alt="Kegiatan"></div>
    </div>
    <div class="text-center mt-4"><a href="/galeri" class="btn btn-hijau">Lihat Semua Galeri</a></div>
</section>

<footer class="py-4 mt-4">
    <div class="container text-center">
        <h5>MTs Al Muawanah</h5>
        <p class="mb-1">Islami • Cerdas • Berprestasi</p>
        <small>© 2026 MTs Al Muawanah. Semua hak dilindungi.</small>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

