<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $program->judul }} - SMK NEGERI 1 JAKARTA</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
            min-height: 100%;
        }

        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            font-family: Arial, Helvetica, sans-serif;
            background: #f5f7fb;
            color: #1e293b;
            line-height: 1.6;
        }

        a {
            text-decoration: none;
        }

        /* ================= NAVBAR ================= */

        .navbar {
            background: #fff;
            min-height: 78px;
            display: flex;
            align-items: center;
            padding: 12px 7%;
            box-shadow: 0 3px 15px rgba(0, 0, 0, .07);
            position: sticky;
            top: 0;
            z-index: 1000;
            flex-shrink: 0;
        }

        .navbar-content {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            min-width: 0;
        }

        .brand-logo {
            width: 50px;
            height: 50px;
            object-fit: contain;
        }

        .brand-text {
            display: flex;
            flex-direction: column;
        }

        .brand-name {
            color: #123c8c;
            font-size: 17px;
            font-weight: bold;
            line-height: 1.4;
        }

        .brand-subtitle {
            color: #64748b;
            font-size: 10px;
            letter-spacing: .8px;
        }

        /* ================= KONTEN ================= */

        main.container {
            width: 100%;
            max-width: 1100px;
            margin: 40px auto 60px;
            padding: 0 20px;
            flex: 1 0 auto;
        }

        .detail-card {
            background: #fff;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 8px 30px rgba(15, 23, 42, .08);
            border: 1px solid #e8edf5;
        }

        /* ================= FOTO PROGRAM ================= */

        .detail-image {
            width: 100%;
            height: 430px;
            object-fit: cover;
            object-position: center;
            display: block;
        }

        .no-image {
            width: 100%;
            height: 300px;
            background: linear-gradient(135deg, #123c8c, #1265e8);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-size: 80px;
            font-weight: bold;
        }

        /* ================= ISI DETAIL ================= */

        .detail-content {
            padding: 40px;
        }

        .label {
            display: inline-block;
            background: #e8f1ff;
            color: #1265e8;
            padding: 7px 16px;
            border-radius: 30px;
            font-size: 13px;
            font-weight: bold;
            margin-bottom: 16px;
        }

        .detail-title {
            font-size: 32px;
            color: #123c8c;
            line-height: 1.35;
            margin-bottom: 18px;
            overflow-wrap: anywhere;
        }

        .detail-description {
            color: #526174;
            line-height: 1.9;
            font-size: 16px;
            margin-bottom: 30px;
            overflow-wrap: anywhere;
        }

        .empty-description {
            color: #64748b;
            font-style: italic;
        }

        /* ================= INFORMASI PROGRAM ================= */

        .info-title {
            font-size: 22px;
            color: #123c8c;
            margin-bottom: 18px;
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 16px;
            margin-bottom: 25px;
        }

        .info-box {
            background: #f8fafc;
            border-radius: 12px;
            padding: 18px;
            border: 1px solid #e2e8f0;
            transition: .25s;
            min-width: 0;
        }

        .info-box:hover {
            background: #eff6ff;
            border-color: #bfdbfe;
            transform: translateY(-2px);
        }

        .info-box span {
            display: block;
            color: #64748b;
            font-size: 13px;
            margin-bottom: 6px;
        }

        .info-box strong {
            display: block;
            color: #1e293b;
            font-size: 15px;
            overflow-wrap: anywhere;
        }

        /* ================= TOMBOL ================= */

        .button-area {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            margin-top: 25px;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 12px 20px;
            border-radius: 9px;
            font-weight: bold;
            font-size: 14px;
            transition: .25s;
        }

        .btn-back {
            background: #1265e8;
            color: #fff;
        }

        .btn-back:hover {
            background: #0d4fb8;
            transform: translateY(-2px);
        }

        .btn-home {
            background: #e8f1ff;
            color: #123c8c;
        }

        .btn-home:hover {
            background: #d5e5ff;
        }

        /* ================= FOOTER ================= */

        .footer {
            background: #123c8c;
            color: #fff;
            margin-top: auto;
            padding: 40px 7% 18px;
            width: 100%;
            flex-shrink: 0;
        }

        .footer-container {
            max-width: 1100px;
            width: 100%;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1.5fr 1fr 1fr;
            gap: 40px;
        }

        .footer-brand {
            display: flex;
            align-items: center;
            gap: 13px;
            margin-bottom: 15px;
        }

        .footer-logo {
            width: 48px;
            height: 48px;
            object-fit: contain;
        }

        .footer-school {
            font-size: 16px;
            font-weight: bold;
            line-height: 1.5;
        }

        .footer-description {
            color: #dce7f7;
            line-height: 1.8;
            font-size: 13px;
            max-width: 400px;
        }

        .footer-title {
            font-size: 15px;
            margin-bottom: 16px;
            padding-bottom: 10px;
            position: relative;
        }

        .footer-title::after {
            content: "";
            position: absolute;
            bottom: 0;
            left: 0;
            width: 38px;
            height: 3px;
            border-radius: 5px;
            background: #60a5fa;
        }

        .footer-links {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .footer-links li {
            margin-bottom: 9px;
        }

        .footer-links a {
            color: #dce7f7;
            font-size: 13px;
            transition: .25s;
        }

        .footer-links a:hover {
            color: #fff;
            padding-left: 4px;
        }

        .footer-contact {
            color: #dce7f7;
            font-size: 13px;
            line-height: 1.9;
            overflow-wrap: anywhere;
        }

        .footer-contact p {
            margin-bottom: 8px;
        }

        .footer-bottom {
            max-width: 1100px;
            margin: 28px auto 0;
            padding-top: 16px;
            border-top: 1px solid rgba(255, 255, 255, .2);
            text-align: center;
            color: #dce7f7;
            font-size: 12px;
        }

        /* ================= RESPONSIVE ================= */

        @media (max-width: 850px) {
            .navbar {
                padding: 14px 25px;
            }

            .detail-image {
                height: 330px;
            }

            .footer-container {
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 30px;
            }

            .footer-container > div:first-child {
                grid-column: 1 / -1;
            }
        }

        @media (max-width: 600px) {
            .navbar {
                padding: 12px 18px;
            }

            .brand-logo {
                width: 43px;
                height: 43px;
            }

            .brand-name {
                font-size: 14px;
            }

            .brand-subtitle {
                font-size: 8px;
                letter-spacing: .3px;
            }

            main.container {
                margin: 25px auto 35px;
                padding: 0 14px;
            }

            .detail-image {
                height: 240px;
            }

            .no-image {
                height: 220px;
                font-size: 60px;
            }

            .detail-content {
                padding: 24px 20px;
            }

            .detail-title {
                font-size: 25px;
            }

            .detail-description {
                font-size: 15px;
            }

            .info-title {
                font-size: 20px;
            }

            .info-grid {
                grid-template-columns: 1fr;
                gap: 12px;
            }

            .info-box {
                padding: 15px;
            }

            .button-area {
                flex-direction: column;
            }

            .btn {
                width: 100%;
                text-align: center;
            }

            .footer {
                padding: 30px 22px 18px;
            }

            .footer-container {
                grid-template-columns: 1fr;
                gap: 25px;
            }

            .footer-container > div:first-child {
                grid-column: auto;
            }

            .footer-school {
                font-size: 14px;
            }
        }
    </style>
</head>

<body>

    {{-- ================= NAVBAR ================= --}}

    <nav class="navbar">
        <div class="navbar-content">

            <a href="{{ url('/') }}" class="brand">
                <img
                    src="{{ asset('img/LOGO SMK 1 NEGRI JAKARTA.jpg') }}"
                    alt="Logo SMK Negeri 1 Jakarta"
                    class="brand-logo"
                >

                <div class="brand-text">
                    <span class="brand-name">
                        SMK NEGERI 1 JAKARTA
                    </span>

                    <span class="brand-subtitle">
                        CERDAS · TERAMPIL · BERKARAKTER
                    </span>
                </div>
            </a>

        </div>
    </nav>

    {{-- ================= KONTEN DETAIL PROGRAM ================= --}}

    <main class="container">

        <article class="detail-card">

            {{-- FOTO PROGRAM --}}

            @if ($program->foto)
                <img
                    src="{{ asset('storage/' . $program->foto) }}"
                    alt="Foto {{ $program->judul }}"
                    class="detail-image"
                >
            @else
                <div class="no-image">
                    {{ strtoupper(mb_substr($program->judul, 0, 1)) }}
                </div>
            @endif

            {{-- INFORMASI PROGRAM --}}

            <div class="detail-content">

                <div class="label">
                    {{ $program->kategori ?: 'Program Keahlian' }}
                </div>

                <h1 class="detail-title">
                    {{ $program->judul }}
                </h1>

                <div class="detail-description">
                    @if ($program->deskripsi)
                        {!! nl2br(e($program->deskripsi)) !!}
                    @else
                        <p class="empty-description">
                            Deskripsi program keahlian ini belum tersedia.
                        </p>
                    @endif
                </div>

                <h2 class="info-title">
                    Informasi Program Keahlian
                </h2>

                <div class="info-grid">

                    <div class="info-box">
                        <span>Nama Program</span>
                        <strong>{{ $program->judul }}</strong>
                    </div>

                    <div class="info-box">
                        <span>Kategori</span>
                        <strong>{{ $program->kategori ?: '-' }}</strong>
                    </div>

                    <div class="info-box">
                        <span>Sekolah</span>
                        <strong>SMK NEGERI 1 JAKARTA</strong>
                    </div>

                    <div class="info-box">
                        <span>Status</span>
                        <strong>Program Keahlian</strong>
                    </div>

                </div>

                <div class="button-area">
                    <a href="{{ url('/#program') }}" class="btn btn-back">
                        Kembali ke Program
                    </a>

                    <a href="{{ url('/') }}" class="btn btn-home">
                        Kembali ke Beranda
                    </a>
                </div>

            </div>
        </article>

    </main>

    {{-- ================= FOOTER ================= --}}

    <footer class="footer">

        <div class="footer-container">

            {{-- IDENTITAS SEKOLAH --}}

            <div>
                <div class="footer-brand">
                    <img
                        src="{{ asset('img/LOGO SMK 1 NEGRI JAKARTA.jpg') }}"
                        alt="Logo SMK Negeri 1 Jakarta"
                        class="footer-logo"
                    >

                    <div class="footer-school">
                        SMK NEGERI 1 JAKARTA
                    </div>
                </div>

                <p class="footer-description">
                    Sekolah yang berkomitmen dalam memberikan pendidikan
                    berkualitas untuk membentuk generasi yang cerdas,
                    terampil, dan berkarakter.
                </p>
            </div>

            {{-- NAVIGASI --}}

            <div>
                <h3 class="footer-title">Navigasi</h3>

                <ul class="footer-links">
                    <li><a href="{{ url('/') }}">Beranda</a></li>
                    <li><a href="{{ url('/#profil') }}">Profil Sekolah</a></li>
                    <li><a href="{{ url('/#guru') }}">Guru</a></li>
                    <li><a href="{{ url('/#program') }}">Program Keahlian</a></li>
                    <li><a href="{{ url('/#ekskul') }}">Ekstrakurikuler</a></li>
                    <li><a href="{{ url('/#berita') }}">Berita</a></li>
                    <li><a href="{{ url('/#prestasi') }}">Prestasi</a></li>
                    <li><a href="{{ url('/#galeri') }}">Galeri</a></li>
                </ul>
            </div>

            {{-- KONTAK SEKOLAH --}}

            <div>
                <h3 class="footer-title">Kontak Sekolah</h3>

                <div class="footer-contact">
                    <p>📍 Jl. Budi Utomo No. 7, Jakarta Pusat</p>
                    <p>☎ (021) 381 3630</p>
                    <p>✉ smkn1jakarta@gmail.com</p>
                </div>
            </div>

        </div>

        <div class="footer-bottom">
            © {{ date('Y') }}
            <strong>SMK NEGERI 1 JAKARTA</strong>.
            Semua Hak Dilindungi.
        </div>

    </footer>

</body>
</html>

