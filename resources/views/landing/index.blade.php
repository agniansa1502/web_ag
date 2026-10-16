
@extends('landing.layouts.app')

@section('title', 'Beranda - MTs Al Muawanah')

@section('content')

<style>
    :root {
        --alma-green: #087443;
        --alma-dark: #075c36;
        --alma-light: #eaf7ef;
        --alma-gold: #f4c542;
    }

    .alma-title { color: var(--alma-green); }
    .alma-btn {
        background: var(--alma-green);
        color: white;
        border: 1px solid var(--alma-green);
        transition: .3s;
    }
    .alma-btn:hover {
        background: var(--alma-dark);
        color: white;
        transform: translateY(-2px);
    }
    .alma-outline {
        color: var(--alma-green);
        border: 1px solid var(--alma-green);
        transition: .3s;
    }
    .alma-outline:hover {
        background: var(--alma-green);
        color: white;
    }
    .alma-hero {
        position: relative;
        min-height: 420px;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        background: linear-gradient(135deg, #064e32, #0ca968);
    }
    .alma-hero img.hero-image {
        position: absolute;
        inset: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        filter: brightness(40%);
    }
    .alma-hero-content {
        position: relative;
        z-index: 1;
        padding: 55px 20px;
    }
    .alma-gold-line {
        width: 75px;
        height: 4px;
        background: var(--alma-gold);
        border-radius: 10px;
        margin: 15px auto;
    }
    .alma-stat {
        padding: 22px 10px;
        border-radius: 14px;
        background: white;
        height: 100%;
        box-shadow: 0 4px 18px #075c3610;
    }
    .alma-card {
        border: 0;
        border-radius: 16px;
        overflow: hidden;
        transition: .25s;
    }
    .alma-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 28px #075c3620 !important;
    }
    .alma-image {
        height: 190px;
        width: 100%;
        object-fit: cover;
    }
    .alma-image-guru {
        height: 210px;
        width: 100%;
        object-fit: contain;
        background: #f3f8f4;
    }
    .alma-section {
        padding-top: 65px;
        padding-bottom: 65px;
    }
    .alma-label {
        display: inline-block;
        padding: 7px 15px;
        border-radius: 30px;
        color: var(--alma-green);
        background: var(--alma-light);
        font-size: .8rem;
        font-weight: 700;
        letter-spacing: 1px;
    }
    .alma-icon {
        width: 45px;
        height: 45px;
        border-radius: 12px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        background: var(--alma-light);
        color: var(--alma-green);
        flex-shrink: 0;
    }
    .alma-about-image {
        width: 100%;
        max-height: 350px;
        object-fit: cover;
        border-radius: 18px;
    }
    .alma-empty {
        border: 1px dashed #a5cbb4;
        background: #f7fbf8;
        border-radius: 14px;
        padding: 30px;
        text-align: center;
        color: #64816e;
    }
    @media (max-width: 576px) {
        .alma-hero { min-height: 350px; }
        .alma-hero h1 { font-size: 2.2rem; }
        .alma-hero h2 { font-size: 1.5rem; }
        .alma-section { padding-top: 45px; padding-bottom: 45px; }
    }
</style>

{{-- HERO --}}
<section id="beranda" class="alma-hero">
    <img
        class="hero-image"
        src="{{ asset('assets/images/smp.jpg') }}"
        alt="MTs Al Muawanah"
        onerror="this.style.display='none'"
    >

    <div class="alma-hero-content text-center text-white container">
        <span class="badge rounded-pill px-3 py-2 mb-3"
              style="background:var(--alma-gold);color:#075c36">
            MADRASAH TSANAWIYAH
        </span>

        <h1 class="display-3 fw-bold mb-2">Selamat Datang</h1>
        <h2 class="display-5 fw-bold mb-3">MTs Al Muawanah</h2>
        <div class="alma-gold-line"></div>

        <p class="lead col-lg-8 mx-auto mb-4">
            Membentuk generasi berakhlak mulia, berilmu, mandiri,
            berprestasi, dan berlandaskan nilai-nilai Islam.
        </p>

        <a href="#profil" class="btn alma-btn rounded-pill px-4 py-2">
            Kenali Madrasah Kami
            <i class="fa-solid fa-arrow-down ms-2"></i>
        </a>
    </div>
</section>

{{-- STATISTIK --}}
<section class="py-4" style="background:var(--alma-light)">
    <div class="container">
        <div class="row g-3 text-center">
            <div class="col-6 col-md-3">
                <div class="alma-stat">
                    <i class="fa-solid fa-user-graduate fs-3 alma-title mb-2"></i>
                    <h3 class="fw-bold alma-title mb-1">
                        {{ $totalSiswa ?? $totalSiswas ?? count($siswa ?? []) }}
                    </h3>
                    <p class="text-muted small mb-0">Siswa</p>
                </div>
            </div>

            <div class="col-6 col-md-3">
                <div class="alma-stat">
                    <i class="fa-solid fa-chalkboard-user fs-3 alma-title mb-2"></i>
                    <h3 class="fw-bold alma-title mb-1">
                        {{ $totalGuru ?? count($gurus ?? []) }}
                    </h3>
                    <p class="text-muted small mb-0">Guru & Staf</p>
                </div>
            </div>

            <div class="col-6 col-md-3">
                <div class="alma-stat">
                    <i class="fa-solid fa-newspaper fs-3 alma-title mb-2"></i>
                    <h3 class="fw-bold alma-title mb-1">
                        {{ $totalBerita ?? count($berita ?? []) }}
                    </h3>
                    <p class="text-muted small mb-0">Berita</p>
                </div>
            </div>

            <div class="col-6 col-md-3">
                <div class="alma-stat">
                    <i class="fa-solid fa-award fs-3 alma-title mb-2"></i>
                    <h3 class="fw-bold alma-title mb-1">
                        {{ $totalEkskul ?? count($ekstrakulikuler ?? []) }}
                    </h3>
                    <p class="text-muted small mb-0">Ekstrakurikuler</p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- PROFIL DAN SAMBUTAN --}}
<section id="profil" class="alma-section">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-md-5">
                <div class="position-relative">
                    <img
                        src="{{ asset('assets/images/kepalasekolah.png') }}"
                        alt="MTs Al Muawanah"
                        class="alma-about-image shadow-sm"
                        onerror="this.style.display='none'"
                    >
                    <div class="mt-3 p-3 rounded-3 text-center"
                         style="background:var(--alma-light)">
                        <i class="fa-solid fa-mosque fs-3 alma-title"></i>
                        <h5 class="fw-bold alma-title mt-2 mb-1">MTs Al Muawanah</h5>
                        <p class="text-muted small mb-0">Madrasah untuk generasi masa depan</p>
                    </div>
                </div>
            </div>

            <div class="col-md-7">
                <span class="alma-label">SAMBUTAN MADRASAH</span>
                <h2 class="fw-bold alma-title mt-3 mb-3">
                    Assalamu'alaikum Warahmatullahi Wabarakatuh
                </h2>

                <p class="text-secondary">
                    Alhamdulillahirabbil'alamin. Selamat datang di website
                    resmi MTs Al Muawanah. Website ini menjadi sarana informasi
                    bagi siswa, orang tua, tenaga pendidik, alumni, dan masyarakat.
                </p>

                <p class="text-secondary">
                    Kami berkomitmen untuk mendukung proses pendidikan yang
                    berkualitas, membangun karakter Islami, mengembangkan potensi
                    peserta didik, serta menciptakan lingkungan belajar yang aman,
                    nyaman, dan penuh semangat.
                </p>

                <p class="text-secondary">
                    Semoga website ini memudahkan masyarakat untuk mengenal
                    kegiatan, program, prestasi, dan berbagai informasi madrasah.
                </p>

                <a href="{{ route('landing.guru-staf') }}"
                   class="btn alma-btn rounded-pill px-4 mt-2">
                    Kenali Guru Kami
                    <i class="fa-solid fa-arrow-right ms-2"></i>
                </a>
            </div>
        </div>
    </div>
</section>

{{-- TENTANG, VISI MISI --}}
<section id="visi-misi" class="alma-section" style="background:#f5faf6">
    <div class="container">
        <div class="text-center mb-5">
            <span class="alma-label">TENTANG KAMI</span>
            <h2 class="fw-bold alma-title mt-3">Mengenal MTs Al Muawanah</h2>
            <div class="alma-gold-line"></div>
            <p class="text-secondary col-lg-8 mx-auto">
                Tempat menuntut ilmu, mengembangkan potensi, dan membangun
                karakter generasi muda yang beriman serta berprestasi.
            </p>
        </div>

        <div class="row g-4">
            <div class="col-md-5">
                <div class="bg-white rounded-4 shadow-sm p-4 h-100">
                    <div class="d-flex align-items-center gap-3 mb-3">
                        <div class="alma-icon">
                            <i class="fa-solid fa-eye fs-5"></i>
                        </div>
                        <h4 class="fw-bold alma-title mb-0">Visi Madrasah</h4>
                    </div>

                    <p class="text-secondary mb-0">
                        Terwujudnya peserta didik yang beriman, berakhlak mulia,
                        berilmu, mandiri, berprestasi, dan peduli terhadap lingkungan.
                    </p>
                </div>
            </div>

            <div class="col-md-7">
                <div class="bg-white rounded-4 shadow-sm p-4 h-100">
                    <div class="d-flex align-items-center gap-3 mb-3">
                        <div class="alma-icon">
                            <i class="fa-solid fa-bullseye fs-5"></i>
                        </div>
                        <h4 class="fw-bold alma-title mb-0">Misi Madrasah</h4>
                    </div>

                    <ul class="list-unstyled text-secondary mb-0">
                        <li class="d-flex gap-2 mb-3">
                            <i class="fa-solid fa-circle-check alma-title mt-1"></i>
                            <span>Menanamkan keimanan, ketakwaan, dan akhlak mulia.</span>
                        </li>
                        <li class="d-flex gap-2 mb-3">
                            <i class="fa-solid fa-circle-check alma-title mt-1"></i>
                            <span>Menyelenggarakan pembelajaran yang aktif, kreatif, dan berkualitas.</span>
                        </li>
                        <li class="d-flex gap-2 mb-3">
                            <i class="fa-solid fa-circle-check alma-title mt-1"></i>
                            <span>Mengembangkan minat, bakat, keterampilan, dan prestasi siswa.</span>
                        </li>
                        <li class="d-flex gap-2">
                            <i class="fa-solid fa-circle-check alma-title mt-1"></i>
                            <span>Mewujudkan lingkungan madrasah yang bersih, aman, dan nyaman.</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- GURU --}}
<section id="guru" class="alma-section">
    <div class="container">
        <div class="d-flex flex-wrap justify-content-between align-items-end gap-3 mb-4">
            <div>
                <span class="alma-label">TENAGA PENDIDIK</span>
                <h2 class="fw-bold alma-title mt-2 mb-0">Guru dan Staf</h2>
                <p class="text-secondary mt-2 mb-0">Para pendidik MTs Al Muawanah</p>
            </div>
            <a href="{{ route('landing.guru-staf') }}"
               class="btn alma-outline rounded-pill px-3">
                Lihat Semua <i class="fa-solid fa-arrow-right ms-1"></i>
            </a>
        </div>

        <div class="row g-4">
            @forelse(collect($gurus ?? [])->take(4) as $guru)
                <div class="col-6 col-md-3">
                    <div class="card alma-card shadow-sm h-100">
                        <div class="p-2">
                            @if(!empty($guru->foto) && file_exists(public_path('uploads/guru/'.$guru->foto)))
                                <img src="{{ asset('uploads/guru/'.$guru->foto) }}"
                                     alt="{{ $guru->nama_guru ?? 'Guru' }}"
                                     class="alma-image-guru rounded-3">
                            @elseif(!empty($guru->foto) && file_exists(public_path('storage/'.$guru->foto)))
                                <img src="{{ asset('storage/'.$guru->foto) }}"
                                     alt="{{ $guru->nama_guru ?? 'Guru' }}"
                                     class="alma-image-guru rounded-3">
                            @else
                                <img src="https://ui-avatars.com/api/?name={{ urlencode($guru->nama_guru ?? 'Guru') }}&background=087443&color=ffffff&size=300"
                                     alt="Guru" class="alma-image-guru rounded-3">
                            @endif
                        </div>

                        <div class="card-body text-center pt-2">
                            <h6 class="fw-bold alma-title mb-1">
                                {{ $guru->nama_guru ?? 'Nama Guru' }}
                            </h6>
                            <p class="small text-muted mb-3">
                                {{ $guru->mapel ?? $guru->jabatan ?? 'Tenaga Pendidik' }}
                            </p>
                            <a href="{{ route('landing.guru.show', $guru->id_guru ?? $guru->id) }}"
                               class="btn alma-outline rounded-pill btn-sm w-100">
                                Lihat Detail
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alma-empty">
                        <i class="fa-solid fa-chalkboard-user fs-2 mb-2"></i>
                        <p class="mb-0">Belum ada data guru.</p>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</section>

{{-- EKSTRAKURIKULER --}}
<section id="ekskul" class="alma-section" style="background:#f5faf6">
    <div class="container">
        <div class="d-flex flex-wrap justify-content-between align-items-end gap-3 mb-4">
            <div>
                <span class="alma-label">PENGEMBANGAN DIRI</span>
                <h2 class="fw-bold alma-title mt-2 mb-0">Ekstrakurikuler</h2>
                <p class="text-secondary mt-2 mb-0">Mengembangkan bakat dan minat siswa</p>
            </div>
            <a href="{{ route('landing.ekskul') }}"
               class="btn alma-outline rounded-pill px-3">
                Lihat Semua <i class="fa-solid fa-arrow-right ms-1"></i>
            </a>
        </div>

        <div class="row g-4">
            @forelse(collect($ekstrakulikuler ?? [])->take(4) as $ekskul)
                @php
                    $namaEkskul = $ekskul->nama_eskul ?? $ekskul->nama_ekskul ?? $ekskul->nama ?? 'Ekstrakurikuler';
                    $gambarEkskul = $ekskul->gambar ?? $ekskul->foto ?? null;
                    $idEkskul = $ekskul->id_ekstrakulikuler ?? $ekskul->id_ekskul ?? $ekskul->id ?? $ekskul->getKey();
                @endphp

                <div class="col-6 col-md-3">
                    <div class="card alma-card shadow-sm h-100">
                        <div class="p-2">
                            @if($gambarEkskul && file_exists(public_path('uploads/ekskul/'.$gambarEkskul)))
                                <img src="{{ asset('uploads/ekskul/'.$gambarEkskul) }}"
                                     alt="{{ $namaEkskul }}" class="alma-image rounded-3">
                            @elseif($gambarEkskul && file_exists(public_path('storage/'.$gambarEkskul)))
                                <img src="{{ asset('storage/'.$gambarEkskul) }}"
                                     alt="{{ $namaEkskul }}" class="alma-image rounded-3">
                            @else
                                <div class="alma-image rounded-3 d-flex align-items-center justify-content-center"
                                     style="background:var(--alma-light)">
                                    <i class="fa-solid fa-award fa-3x alma-title"></i>
                                </div>
                            @endif
                        </div>

                        <div class="card-body text-center pt-2">
                            <h6 class="fw-bold alma-title mb-3">{{ $namaEkskul }}</h6>
                            <a href="{{ route('landing.ekskul.show', $idEkskul) }}"
                               class="btn alma-outline rounded-pill btn-sm w-100">
                                Lihat Detail
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alma-empty">
                        <i class="fa-solid fa-award fs-2 mb-2"></i>
                        <p class="mb-0">Belum ada data ekstrakurikuler.</p>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</section>

{{-- BERITA --}}
<section id="berita" class="alma-section">
    <div class="container">
        <div class="d-flex flex-wrap justify-content-between align-items-end gap-3 mb-4">
            <div>
                <span class="alma-label">INFORMASI TERKINI</span>
                <h2 class="fw-bold alma-title mt-2 mb-0">Berita dan Artikel</h2>
                <p class="text-secondary mt-2 mb-0">Informasi terbaru dari madrasah</p>
            </div>
            <a href="{{ route('landing.berita') }}"
               class="btn alma-outline rounded-pill px-3">
                Semua Berita <i class="fa-solid fa-arrow-right ms-1"></i>
            </a>
        </div>

        <div class="row g-4">
            @forelse(collect($berita ?? [])->take(4) as $item)
                @php
                    $gambarBerita = $item->gambar ?? $item->foto ?? null;
                    $idBerita = $item->id_berita ?? $item->id;
                @endphp

                <div class="col-6 col-md-3">
                    <div class="card alma-card shadow-sm h-100">
                        <div class="p-2">
                            @if($gambarBerita && file_exists(public_path('uploads/berita/'.$gambarBerita)))
                                <img src="{{ asset('uploads/berita/'.$gambarBerita) }}"
                                     alt="{{ $item->judul ?? 'Berita' }}" class="alma-image rounded-3">
                            @elseif($gambarBerita && file_exists(public_path('storage/'.$gambarBerita)))
                                <img src="{{ asset('storage/'.$gambarBerita) }}"
                                     alt="{{ $item->judul ?? 'Berita' }}" class="alma-image rounded-3">
                            @else
                                <div class="alma-image rounded-3 d-flex align-items-center justify-content-center"
                                     style="background:var(--alma-light)">
                                    <i class="fa-solid fa-newspaper fa-3x alma-title"></i>
                                </div>
                            @endif
                        </div>

                        <div class="card-body pt-1">
                            <small class="text-muted d-block mb-2">
                                <i class="fa-regular fa-calendar me-1 alma-title"></i>
                                {{ \Carbon\Carbon::parse($item->tanggal ?? $item->created_at ?? now())->translatedFormat('d M Y') }}
                            </small>

                            <h6 class="fw-bold alma-title">
                                {{ $item->judul ?? 'Berita Madrasah' }}
                            </h6>

                            <p class="small text-secondary">
                                {{ \Illuminate\Support\Str::limit(strip_tags($item->isi ?? $item->konten ?? ''), 85) }}
                            </p>

                            <a href="{{ route('landing.berita.show', $idBerita) }}"
                               class="text-decoration-none fw-semibold small"
                               style="color:var(--alma-green)">
                                Baca Selengkapnya
                                <i class="fa-solid fa-arrow-right ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alma-empty">
                        <i class="fa-solid fa-newspaper fs-2 mb-2"></i>
                        <p class="mb-0">Belum ada berita yang tersedia.</p>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</section>

{{-- GALERI --}}
<section id="galeri" class="alma-section" style="background:#f5faf6">
    <div class="container">
        <div class="d-flex flex-wrap justify-content-between align-items-end gap-3 mb-4">
            <div>
                <span class="alma-label">DOKUMENTASI</span>
                <h2 class="fw-bold alma-title mt-2 mb-0">Galeri Kegiatan</h2>
                <p class="text-secondary mt-2 mb-0">Dokumentasi kegiatan MTs Al Muawanah</p>
            </div>
            <a href="{{ route('landing.galeri') }}"
               class="btn alma-outline rounded-pill px-3">
                Lihat Semua <i class="fa-solid fa-arrow-right ms-1"></i>
            </a>
        </div>

        <div class="row g-4">
            @forelse(collect($galeri ?? $galeris ?? [])->take(4) as $item)
                @php
                    $fileGaleri = $item->foto ?? $item->gambar ?? $item->file ?? null;
                    $judulGaleri = $item->judul ?? $item->nama ?? 'Dokumentasi Kegiatan';
                    $idGaleri = $item->id_galeri ?? $item->id;
                    $pathGaleri = null;

                    if ($fileGaleri) {
                        if (file_exists(public_path('uploads/galeri/'.$fileGaleri))) {
                            $pathGaleri = asset('uploads/galeri/'.$fileGaleri);
                        } elseif (file_exists(public_path('storage/'.$fileGaleri))) {
                            $pathGaleri = asset('storage/'.$fileGaleri);
                        }
                    }

                    $isVideo = $fileGaleri && in_array(
                        strtolower(pathinfo($fileGaleri, PATHINFO_EXTENSION)),
                        ['mp4', 'mkv', 'avi', 'mov']
                    );
                @endphp

                <div class="col-6 col-md-3">
                    <a href="{{ route('landing.galeri.show', $idGaleri) }}"
                       class="text-decoration-none">
                        <div class="card alma-card shadow-sm h-100">
                            <div class="position-relative p-2">
                                @if($pathGaleri && $isVideo)
                                    <div class="alma-image rounded-3 d-flex align-items-center justify-content-center"
                                         style="background:#eaf7ef">
                                        <i class="fa-solid fa-circle-play fa-3x alma-title"></i>
                                    </div>
                                @elseif($pathGaleri)
                                    <img src="{{ $pathGaleri }}" alt="{{ $judulGaleri }}"
                                         class="alma-image rounded-3">
                                @else
                                    <div class="alma-image rounded-3 d-flex align-items-center justify-content-center"
                                         style="background:var(--alma-light)">
                                        <i class="fa-solid fa-images fa-3x alma-title"></i>
                                    </div>
                                @endif
                            </div>

                            <div class="card-body text-center pt-1">
                                <h6 class="fw-bold alma-title mb-0">{{ $judulGaleri }}</h6>
                            </div>
                        </div>
                    </a>
                </div>
            @empty
                <div class="col-12">
                    <div class="alma-empty">
                        <i class="fa-solid fa-images fs-2 mb-2"></i>
                        <p class="mb-0">Belum ada dokumentasi galeri.</p>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</section>

{{-- PENUTUP --}}
<section class="py-5 text-center text-white"
         style="background:linear-gradient(135deg,#075c36,#0ca968)">
    <div class="container py-3">
        <i class="fa-solid fa-mosque fs-1 mb-3" style="color:var(--alma-gold)"></i>
        <h2 class="fw-bold">Mari Tumbuh dan Berprestasi Bersama</h2>
        <p class="mb-4">
            MTs Al Muawanah, membangun generasi berilmu dan berakhlak mulia.
        </p>
        <a href="#beranda" class="btn rounded-pill px-4 py-2 fw-semibold"
           style="background:var(--alma-gold);color:#075c36">
            Kembali ke Atas <i class="fa-solid fa-arrow-up ms-1"></i>
        </a>
    </div>
</section>

@endsection
