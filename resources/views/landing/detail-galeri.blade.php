<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $galeri->judul ?? 'Detail Galeri' }} - MTs Al Muawanah</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            min-height: 100%;
            scroll-behavior: smooth;
            background: #075c36;
        }

        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            font-family: Arial, Helvetica, sans-serif;
            background: #f4f8f5;
            color: #263247;
            line-height: 1.7;
        }

        a {
            transition: .25s ease;
        }

        /* NAVBAR */
        .navbar {
            width: 100%;
            background: #fff;
            padding: 12px 7%;
            box-shadow: 0 3px 15px rgba(0, 0, 0, .07);
            position: relative;
            z-index: 10;
        }

        .navbar-content {
            max-width: 1200px;
            margin: auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
            min-width: 0;
        }

        .brand-logo {
            width: 48px;
            height: 48px;
            object-fit: contain;
            flex-shrink: 0;
        }

        .brand-text {
            display: flex;
            flex-direction: column;
        }

        .brand-name {
            color: #087443;
            font-size: 17px;
            font-weight: bold;
            line-height: 1.4;
        }

        .brand-subtitle {
            color: #778196;
            font-size: 10px;
            letter-spacing: .8px;
        }

        /* HEADER */
        .page-heading {
            background: linear-gradient(135deg, #075c36, #0ca968);
            padding: 35px 20px;
            text-align: center;
            color: #fff;
        }

        .page-heading h1 {
            font-size: 30px;
            margin-bottom: 5px;
        }

        .page-heading p {
            font-size: 14px;
            color: #e5f7ec;
        }

        /* CONTAINER */
        .container {
            width: 100%;
            max-width: 1000px;
            margin: 40px auto 60px;
            padding: 0 20px;
            flex: 1 0 auto;
        }

        /* DETAIL CARD */
        .detail-card {
            background: #fff;
            border-radius: 16px;
            overflow: hidden;
            border: 1px solid #e1eee5;
            box-shadow: 0 8px 30px rgba(8, 116, 67, .09);
        }

        /* FOTO GALERI */
        .detail-image {
            display: block;
            width: 100%;
            height: 420px;
            object-fit: cover;
            object-position: center;
            background: #e7f2e9;
        }

        .no-image {
            width: 100%;
            min-height: 300px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            gap: 8px;
            color: #fff;
            background: linear-gradient(135deg, #087443, #0ca968);
        }

        .no-image strong {
            font-size: 75px;
            line-height: 1.2;
        }

        .no-image span {
            font-size: 14px;
        }

        /* ISI DETAIL */
        .detail-content {
            padding: 35px;
        }

        .label {
            display: inline-block;
            padding: 6px 13px;
            margin-bottom: 14px;
            border-radius: 20px;
            background: #e5f5eb;
            color: #087443;
            font-size: 12px;
            font-weight: bold;
            letter-spacing: .4px;
        }

        .detail-title {
            color: #075c36;
            font-size: 32px;
            line-height: 1.4;
            overflow-wrap: anywhere;
            margin-bottom: 15px;
        }

        .detail-description {
            color: #596579;
            font-size: 15px;
            line-height: 1.9;
            overflow-wrap: anywhere;
            white-space: normal;
            margin-bottom: 30px;
        }

        /* INFORMASI GALERI */
        .info-title {
            color: #075c36;
            font-size: 21px;
            margin-bottom: 18px;
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 15px;
        }

        .info-box {
            padding: 17px 19px;
            background: #f5faf6;
            border: 1px solid #e1eee5;
            border-left: 4px solid #0ca968;
            border-radius: 10px;
            min-width: 0;
        }

        .info-box span {
            display: block;
            color: #7b8798;
            font-size: 12px;
            margin-bottom: 5px;
        }

        .info-box strong {
            display: block;
            color: #263247;
            font-size: 14px;
            overflow-wrap: anywhere;
            white-space: pre-line;
        }

        /* TOMBOL */
        .button-area {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            margin-top: 28px;
        }

        .btn {
            display: inline-block;
            padding: 11px 20px;
            border-radius: 7px;
            text-decoration: none;
            text-align: center;
            font-size: 13px;
            font-weight: bold;
        }

        .btn-back {
            color: #fff;
            background: #087443;
        }

        .btn-back:hover {
            background: #075c36;
            transform: translateY(-2px);
        }

        .btn-home {
            color: #087443;
            background: #e5f5eb;
        }

        .btn-home:hover {
            background: #d2eddd;
        }

        /* FOOTER */
        .footer {
            width: 100%;
            margin-top: auto;
            flex-shrink: 0;
            background: #075c36;
            color: #fff;
            padding: 40px 7% 18px;
        }

        .footer-container {
            width: 100%;
            max-width: 1100px;
            margin: auto;
            display: grid;
            grid-template-columns: 1.5fr 1fr 1.2fr;
            gap: 35px;
        }

        .footer-brand {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 13px;
        }

        .footer-logo {
            width: 45px;
            height: 45px;
            object-fit: contain;
            flex-shrink: 0;
        }

        .footer-school {
            font-size: 15px;
            font-weight: bold;
        }

        .footer-description,
        .footer-contact {
            color: #dcefe3;
            font-size: 13px;
            line-height: 1.9;
            overflow-wrap: anywhere;
        }

        .footer-title {
            font-size: 15px;
            margin-bottom: 13px;
        }

        .footer-links {
            list-style: none;
        }

        .footer-links li {
            margin-bottom: 7px;
        }

        .footer-links a {
            color: #dcefe3;
            text-decoration: none;
            font-size: 13px;
        }

        .footer-links a:hover {
            color: #fff;
            padding-left: 3px;
        }

        .footer-bottom {
            width: 100%;
            max-width: 1100px;
            margin: 28px auto 0;
            padding-top: 17px;
            border-top: 1px solid rgba(255, 255, 255, .2);
            text-align: center;
            color: #dcefe3;
            font-size: 12px;
        }

        /* RESPONSIVE */
        @media (max-width: 768px) {
            .navbar {
                padding: 12px 20px;
            }

            .brand-logo {
                width: 42px;
                height: 42px;
            }

            .brand-name {
                font-size: 14px;
            }

            .brand-subtitle {
                font-size: 8px;
            }

            .page-heading {
                padding: 28px 15px;
            }

            .page-heading h1 {
                font-size: 24px;
            }

            .container {
                margin: 25px auto 40px;
                padding: 0 15px;
            }

            .detail-image {
                height: 280px;
            }

            .detail-content {
                padding: 24px 20px;
            }

            .detail-title {
                font-size: 26px;
            }

            .info-grid {
                grid-template-columns: 1fr;
                gap: 12px;
            }

            .footer {
                padding: 32px 22px 17px;
            }

            .footer-container {
                grid-template-columns: 1fr;
                gap: 25px;
            }
        }

        @media (max-width: 420px) {
            .navbar-content {
                gap: 10px;
            }

            .brand {
                gap: 7px;
            }

            .brand-name {
                font-size: 12px;
            }

            .brand-subtitle {
                font-size: 7px;
                letter-spacing: 0;
            }

            .detail-image {
                height: 220px;
            }

            .detail-title {
                font-size: 22px;
            }

            .detail-content {
                padding: 20px 16px;
            }

            .btn {
                width: 100%;
            }
        }
    </style>
</head>

<body>

    {{-- NAVBAR --}}
    <nav class="navbar">
        <div class="navbar-content">

            <a href="{{ url('/') }}" class="brand">

                @if(isset($profil) && !empty($profil->logo))
                    <img
                        src="{{ asset('storage/' . $profil->logo) }}"
                        alt="Logo MTs Al Muawanah"
                        class="brand-logo"
                        onerror="this.onerror=null; this.src='{{ asset('img/logo_alma.jpg') }}';"
                    >
                @else
                    <img
                        src="{{ asset('img/logo_alma.jpg') }}"
                        alt="Logo MTs Al Muawanah"
                        class="brand-logo"
                    >
                @endif

                <div class="brand-text">
                    <span class="brand-name">
                        MTs AL MUAWANAH
                    </span>

                    <span class="brand-subtitle">
                        CERDAS · TERAMPIL · BERKARAKTER
                    </span>
                </div>

            </a>

        </div>
    </nav>

    {{-- HEADER --}}
    <section class="page-heading">
        <h1>Detail Galeri Sekolah</h1>
        <p>Dokumentasi kegiatan MTs Al Muawanah</p>
    </section>

    {{-- DETAIL GALERI --}}
    <main class="container">

        <article class="detail-card">

            {{-- FOTO GALERI --}}
            @if(!empty($galeri->foto))

                <img
                    src="{{ asset('storage/' . $galeri->foto) }}"
                    alt="{{ $galeri->judul ?? 'Foto galeri sekolah' }}"
                    class="detail-image"
                    onerror="this.onerror=null; this.style.display='none'; this.nextElementSibling.style.display='flex';"
                >

                <div class="no-image" style="display:none;">
                    <strong>{{ strtoupper(substr($galeri->judul ?? 'G', 0, 1)) }}</strong>
                    <span>Foto galeri tidak dapat dimuat</span>
                </div>

            @else

                <div class="no-image">
                    <strong>{{ strtoupper(substr($galeri->judul ?? 'G', 0, 1)) }}</strong>
                    <span>Foto galeri belum tersedia</span>
                </div>

            @endif

            {{-- KONTEN --}}
            <div class="detail-content">

                <span class="label">GALERI SEKOLAH</span>

                <h1 class="detail-title">
                    {{ $galeri->judul ?? 'Galeri Sekolah' }}
                </h1>

                <div class="detail-description">
                    @if(!empty($galeri->deskripsi))
                        {!! nl2br(e($galeri->deskripsi)) !!}
                    @else
                        Informasi mengenai galeri ini belum tersedia.
                    @endif
                </div>

                {{-- INFORMASI --}}
                <h2 class="info-title">Informasi Galeri</h2>

                <div class="info-grid">

                    <div class="info-box">
                        <span>Judul Galeri</span>
                        <strong>{{ $galeri->judul ?: '-' }}</strong>
                    </div>

                    <div class="info-box">
                        <span>Nama Sekolah</span>
                        <strong>MTs Al Muawanah</strong>
                    </div>

                    <div class="info-box">
                        <span>Jenis Dokumentasi</span>
                        <strong>Dokumentasi Kegiatan Sekolah</strong>
                    </div>

                    <div class="info-box">
                        <span>Status Dokumentasi</span>
                        <strong>
                            {{ !empty($galeri->foto) ? 'Foto tersedia' : 'Foto belum tersedia' }}
                        </strong>
                    </div>

                </div>

                {{-- TOMBOL --}}
                <div class="button-area">

                    <a href="{{ url('/') }}#galeri" class="btn btn-back">
                        Kembali ke Galeri
                    </a>

                    <a href="{{ url('/') }}" class="btn btn-home">
                        Beranda
                    </a>

                </div>

            </div>
        </article>

    </main>

    {{-- FOOTER --}}
    <footer class="footer">

        <div class="footer-container">

            {{-- IDENTITAS SEKOLAH --}}
            <div>

                <div class="footer-brand">

                    <img
                        src="{{ asset('img/logo_alma.jpg') }}"
                        alt="Logo MTs Al Muawanah"
                        class="footer-logo"
                    >

                    <div class="footer-school">
                        MTs AL MUAWANAH
                    </div>

                </div>

                <p class="footer-description">
                    MTs Al Muawanah berkomitmen memberikan pendidikan
                    berkualitas untuk membentuk generasi yang cerdas,
                    terampil, berakhlak mulia, dan berkarakter.
                </p>

            </div>

            {{-- NAVIGASI --}}
            <div>

                <h3 class="footer-title">Navigasi</h3>

                <ul class="footer-links">
                    <li><a href="{{ url('/') }}">Beranda</a></li>
                    <li><a href="{{ url('/') }}#profil">Profil</a></li>
                    <li><a href="{{ url('/') }}#program">Program</a></li>
                    <li><a href="{{ url('/') }}#ekstrakulikuler">Ekstrakulikuler</a></li>
                    <li><a href="{{ url('/') }}#berita">Berita</a></li>
                    <li><a href="{{ url('/') }}#galeri">Galeri</a></li>
                    <li><a href="{{ url('/') }}#prestasi">Prestasi</a></li>
                </ul>

            </div>

            {{-- KONTAK --}}
            <div>

                <h3 class="footer-title">Kontak Sekolah</h3>

                <div class="footer-contact">
                    <div>📍 Jl. Ciheras, Tanjungjaya</div>
                    <div>☎ Hubungi pihak sekolah</div>
                    <div>✉ matsalma@gmail.com</div>
                </div>

            </div>

        </div>

        <div class="footer-bottom">
            © {{ date('Y') }}
            <strong>MTs Al Muawanah</strong>.
            Semua Hak Dilindungi.
        </div>

    </footer>

</body>
</html>
