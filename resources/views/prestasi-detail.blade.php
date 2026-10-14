<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $prestasi->judul }} - MTS AL MUAWANAH</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            min-height: 100%;
            scroll-behavior: smooth;
            background: #072507;
        }

        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            font-family: Arial, Helvetica, sans-serif;
            background: #f5f7fb;
            color: #183818;
            line-height: 1.6;
        }

        a {
            text-decoration: none;
        }

        /* ================= NAVBAR ================= */

        .navbar {
            width: 100%;
            min-height: 75px;
            display: flex;
            align-items: center;
            padding: 10px 8%;
            background: #fff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, .08);
            flex-shrink: 0;
        }

        .navbar-content {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
        }

        .brand-logo {
            width: 48px;
            height: 48px;
            object-fit: contain;
        }

        .brand-text {
            display: flex;
            flex-direction: column;
        }

        .brand-name {
            color: #123c8c;
            font-size: 18px;
            font-weight: bold;
            line-height: 1.3;
        }

        .brand-subtitle {
            color: #777;
            font-size: 10px;
            letter-spacing: 1px;
            margin-top: 3px;
        }



        .container {
            width: 100%;
            max-width: 1100px;
            margin: 35px auto 35px;
            padding: 0 20px;
            flex: 1 0 auto;
        }


        .detail-card {
            background: #fff;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 8px 30px rgba(0, 0, 0, .08);
            border: 1px solid #e8edf5;
        }


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
            color: white;
            font-size: 70px;
            font-weight: bold;
        }



        .detail-content {
            padding: 35px 40px;
        }

        .label {
            display: inline-block;
            background: #e8f1ff;
            color: #1265e8;
            padding: 7px 15px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
            margin-bottom: 15px;
        }

        .detail-title {
            font-size: 32px;
            color: #123c8c;
            line-height: 1.4;
            margin-bottom: 18px;
            overflow-wrap: anywhere;
        }

        .detail-description {
            color: #526174;
            line-height: 1.9;
            font-size: 15px;
            margin-bottom: 30px;
            overflow-wrap: anywhere;
        }

        .empty-description {
            color: #64748b;
            font-style: italic;
        }


        .info-title {
            font-size: 22px;
            color: #123c8c;
            margin-bottom: 18px;
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 15px;
            margin-bottom: 25px;
        }

        .info-box {
            min-width: 0;
            background: #f7f9fc;
            border-radius: 10px;
            padding: 17px;
            border: 1px solid #e8edf5;
            transition: .25s;
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
            margin-bottom: 5px;
        }

        .info-box strong {
            display: block;
            color: #1e293b;
            font-size: 15px;
            overflow-wrap: anywhere;
        }



        .button-area {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            margin-top: 20px;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 12px 20px;
            border-radius: 8px;
            font-weight: bold;
            font-size: 14px;
            transition: .25s;
        }

        .btn-back {
            background: #1265e8;
            color: white;
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



        .footer {
            width: 100%;
            flex-shrink: 0;
            background: #123c8c;
            color: white;
            margin-top: auto;
            padding: 40px 8% 20px;
        }

        .footer-container {
            width: 100%;
            max-width: 1100px;
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
            width: 50px;
            height: 50px;
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
            margin-bottom: 18px;
            padding-bottom: 10px;
            position: relative;
        }

        .footer-title::after {
            content: "";
            position: absolute;
            bottom: 0;
            left: 0;
            width: 35px;
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
            color: white;
            padding-left: 4px;
        }

        .footer-contact {
            color: #dce7f7;
            font-size: 13px;
            line-height: 1.9;
            overflow-wrap: anywhere;
        }

        .footer-contact p {
            margin-bottom: 7px;
        }

        .footer-bottom {
            width: 100%;
            max-width: 1100px;
            margin: 30px auto 0;
            padding-top: 18px;
            border-top: 1px solid rgba(255, 255, 255, .2);
            text-align: center;
            color: #dce7f7;
            font-size: 12px;
        }



        @media (max-width: 768px) {
            .navbar {
                padding: 12px 20px;
            }

            .brand-name {
                font-size: 15px;
            }

            .brand-subtitle {
                font-size: 8px;
            }

            .container {
                margin: 25px auto 30px;
                padding: 0 14px;
            }

            .detail-image {
                height: 300px;
            }

            .no-image {
                height: 250px;
            }

            .detail-content {
                padding: 25px 22px;
            }

            .detail-title {
                font-size: 27px;
            }

            .info-grid {
                grid-template-columns: 1fr;
                gap: 12px;
            }

            .footer {
                padding: 35px 25px 20px;
            }

            .footer-container {
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 25px;
            }

            .footer-container > div:first-child {
                grid-column: 1 / -1;
            }
        }

        @media (max-width: 480px) {
            .brand-logo {
                width: 42px;
                height: 42px;
            }

            .brand-name {
                font-size: 13px;
            }

            .brand-subtitle {
                font-size: 7px;
                letter-spacing: .5px;
            }

            .detail-image {
                height: 230px;
            }

            .no-image {
                height: 200px;
                font-size: 50px;
            }

            .detail-content {
                padding: 22px 17px;
            }

            .detail-title {
                font-size: 23px;
            }

            .detail-description {
                font-size: 14px;
            }

            .info-title {
                font-size: 20px;
            }

            .button-area {
                flex-direction: column;
            }

            .btn {
                width: 100%;
            }

            .footer-container {
                grid-template-columns: 1fr;
                gap: 25px;
            }

            .footer-container > div:first-child {
                grid-column: auto;
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
                    src="{{ asset('img/logo_alma.jpg') }}"
                    alt="Logo SMK Negeri 1 Jakarta"
                    class="brand-logo"
                >

                <div class="brand-text">
                    <span class="brand-name">
                        MTS AL MUAWANAH
                    </span>

                    <span class="brand-subtitle">
                        CERDAS · TERAMPIL · BERKARAKTER
                    </span>
                </div>
            </a>

        </div>
    </nav>

    {{-- ================= KONTEN DETAIL PRESTASI ================= --}}

    <main class="container">

        <article class="detail-card">

            {{-- FOTO PRESTASI --}}

            @if($prestasi->foto)

                @if(\Illuminate\Support\Str::startsWith($prestasi->foto, 'prestasi/'))
                    <img
                        src="{{ asset('storage/' . $prestasi->foto) }}"
                        alt="{{ $prestasi->judul }}"
                        class="detail-image"
                    >
                @else
                    <img
                        src="{{ asset('uploads/prestasi/' . $prestasi->foto) }}"
                        alt="{{ $prestasi->judul }}"
                        class="detail-image"
                    >
                @endif

            @else

                <div class="no-image">
                    {{ strtoupper(mb_substr($prestasi->judul, 0, 1)) }}
                </div>

            @endif

            <div class="detail-content">

                <div class="label">
                    PRESTASI SEKOLAH
                </div>

                <h1 class="detail-title">
                    {{ $prestasi->judul }}
                </h1>

                <div class="detail-description">
                    @if($prestasi->deskripsi)
                        {!! nl2br(e($prestasi->deskripsi)) !!}
                    @else
                        <p class="empty-description">
                            Informasi mengenai prestasi ini belum tersedia.
                        </p>
                    @endif
                </div>

                <h2 class="info-title">
                    Informasi Prestasi
                </h2>

                <div class="info-grid">

                    <div class="info-box">
                        <span>Nama Prestasi</span>
                        <strong>{{ $prestasi->judul }}</strong>
                    </div>

                    <div class="info-box">
                        <span>Tahun</span>
                        <strong>{{ $prestasi->tahun ?: '-' }}</strong>
                    </div>

                    <div class="info-box">
                        <span>Sekolah</span>
                        <strong>MTS AL MUAWANAH</strong>
                    </div>

                    <div class="info-box">
                        <span>Jenis</span>
                        <strong>Prestasi Sekolah</strong>
                    </div>

                </div>

                <div class="button-area">
                    <a href="{{ url('/#prestasi') }}" class="btn btn-back">
                        Kembali ke Prestasi
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

            <div>
                <div class="footer-brand">
                    <img
                        src="{{ asset('img/logo_alma.jpg') }}"
                        alt="Logo SMK Negeri 1 Jakarta"
                        class="footer-logo"
                    >

                    <div class="footer-school">
                        MTS AL MUAWANAH
                    </div>
                </div>

                <p class="footer-description">
                    Sekolah yang berkomitmen dalam memberikan pendidikan
                    berkualitas untuk membentuk generasi yang cerdas,
                    terampil, dan berkarakter.
                </p>
            </div>

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

            <div>
                <h3 class="footer-title">Kontak Sekolah</h3>

                <div class="footer-contact">
                    <p>📍 Jl. Ciheras . 7, Tanjungjayaa</p>
                    <p>☎ (021) 381 3630</p>
                    <p>✉ matsalma@gmail.com</p>
                </div>
            </div>

        </div>

        <div class="footer-bottom">
            © {{ date('Y') }}
            <strong>MTS AL MUAWANAH</strong>.
            Semua Hak Dilindungi.
        </div>

    </footer>

</body>
</html>

