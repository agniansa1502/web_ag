<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $berita->judul }} - MTs Al Muawanah</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
            scroll-padding-top: 100px;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f4f8f5;
            color: #263247;
            line-height: 1.7;
        }

        a {
            text-decoration: none;
        }

        /* ================= NAVBAR ================= */

        .navbar {
            width: 100%;
            min-height: 76px;
            background: #fff;
            padding: 12px 7%;
            box-shadow: 0 3px 15px rgba(0, 0, 0, .07);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .navbar-content {
            max-width: 1200px;
            min-height: 52px;
            margin: auto;
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
            flex-shrink: 0;
        }

        .brand-text {
            display: flex;
            flex-direction: column;
        }

        .brand-name {
            display: block;
            color: #087443;
            font-size: 17px;
            font-weight: bold;
            line-height: 1.4;
        }

        .brand-subtitle {
            display: block;
            color: #64748b;
            font-size: 10px;
            letter-spacing: .7px;
        }

        .home-link {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 10px 16px;
            border-radius: 8px;
            background: #e5f5eb;
            color: #087443;
            font-size: 13px;
            font-weight: bold;
            white-space: nowrap;
            transition: .25s;
        }

        .home-link:hover {
            background: #087443;
            color: #fff;
        }

        /* ================= HALAMAN ================= */

        .container {
            width: 100%;
            max-width: 1050px;
            margin: 45px auto 65px;
            padding: 0 20px;
        }

        .breadcrumb {
            margin-bottom: 22px;
            color: #64748b;
            font-size: 13px;
            overflow-wrap: anywhere;
        }

        .breadcrumb a {
            color: #087443;
        }

        .breadcrumb a:hover {
            text-decoration: underline;
        }

        /* ================= KARTU BERITA ================= */

        .detail-card {
            overflow: hidden;
            background: #fff;
            border: 1px solid #e0ebe3;
            border-radius: 18px;
            box-shadow: 0 8px 30px rgba(8, 116, 67, .09);
        }

        /* ================= FOTO BERITA ================= */

        .detail-image {
            display: block;
            width: 100%;
            height: 430px;
            object-fit: cover;
            object-position: center;
            background: #e5f0e8;
        }

        .no-image {
            width: 100%;
            min-height: 300px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 10px;
            padding: 25px;
            color: #fff;
            text-align: center;
            background: linear-gradient(135deg, #087443, #0ca968);
        }

        .no-image strong {
            font-size: 76px;
            line-height: 1.2;
        }

        .no-image span {
            font-size: 14px;
        }

        /* ================= ISI BERITA ================= */

        .detail-content {
            padding: 38px;
        }

        .label {
            display: inline-block;
            margin-bottom: 15px;
            padding: 7px 15px;
            border-radius: 25px;
            background: #e5f5eb;
            color: #087443;
            font-size: 12px;
            font-weight: bold;
            letter-spacing: .4px;
        }

        .tanggal {
            display: flex;
            align-items: center;
            gap: 7px;
            margin-bottom: 12px;
            color: #64748b;
            font-size: 13px;
        }

        .detail-title {
            margin-bottom: 18px;
            color: #075c36;
            font-size: 34px;
            line-height: 1.4;
            overflow-wrap: anywhere;
        }

        .detail-description {
            margin-bottom: 35px;
            color: #526174;
            font-size: 15px;
            line-height: 2;
            overflow-wrap: anywhere;
            white-space: normal;
        }

        .empty-description {
            color: #64748b;
            font-style: italic;
        }

        /* ================= INFORMASI BERITA ================= */

        .info-title {
            margin-bottom: 20px;
            color: #075c36;
            font-size: 22px;
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 15px;
            margin-bottom: 30px;
        }

        .info-box {
            min-width: 0;
            padding: 19px;
            border: 1px solid #e0ebe3;
            border-radius: 11px;
            background: #f7faf8;
            transition: .25s;
        }

        .info-box:hover {
            border-color: #a7d9ba;
            background: #edf8f0;
            transform: translateY(-2px);
        }

        .info-box span {
            display: block;
            margin-bottom: 6px;
            color: #64748b;
            font-size: 13px;
        }

        .info-box strong {
            display: block;
            color: #263247;
            font-size: 15px;
            font-weight: bold;
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
            padding: 12px 21px;
            border: none;
            border-radius: 8px;
            font-size: 14px;
            font-weight: bold;
            transition: .25s;
        }

        .btn-back {
            background: #087443;
            color: #fff;
        }

        .btn-back:hover {
            background: #075c36;
            color: #fff;
            transform: translateY(-2px);
        }

        .btn-home {
            background: #e5f5eb;
            color: #087443;
        }

        .btn-home:hover {
            background: #cdebd7;
        }

        /* ================= FOOTER ================= */

        .footer {
            margin-top: 30px;
            padding: 45px 7% 20px;
            background: #075c36;
            color: #fff;
        }

        .footer-container {
            display: grid;
            grid-template-columns: 1.5fr 1fr 1.2fr;
            gap: 35px;
            max-width: 1100px;
            margin: auto;
        }

        .footer-brand {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 15px;
        }

        .footer-logo {
            width: 50px;
            height: 50px;
            object-fit: contain;
            flex-shrink: 0;
        }

        .footer-school {
            font-size: 16px;
            font-weight: bold;
            line-height: 1.5;
        }

        .footer-description {
            max-width: 400px;
            color: #dcefe3;
            font-size: 13px;
            line-height: 1.9;
        }

        .footer-title {
            position: relative;
            margin-bottom: 20px;
            padding-bottom: 10px;
            font-size: 16px;
        }

        .footer-title::after {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 38px;
            height: 3px;
            border-radius: 5px;
            background: #62d995;
            content: "";
        }

        .footer-links {
            list-style: none;
        }

        .footer-links li {
            margin-bottom: 10px;
        }

        .footer-links a {
            color: #dcefe3;
            font-size: 13px;
            transition: .25s;
        }

        .footer-links a:hover {
            padding-left: 4px;
            color: #fff;
        }

        .footer-contact {
            color: #dcefe3;
            font-size: 13px;
            line-height: 1.9;
            overflow-wrap: anywhere;
        }

        .footer-contact p {
            margin-bottom: 8px;
        }

        .footer-bottom {
            max-width: 1100px;
            margin: 30px auto 0;
            padding-top: 18px;
            border-top: 1px solid rgba(255, 255, 255, .2);
            color: #dcefe3;
            text-align: center;
            font-size: 12px;
        }

        /* ================= RESPONSIVE ================= */

        @media (max-width: 800px) {
            .navbar {
                padding: 12px 22px;
            }

            .footer-container {
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 28px;
            }

            .footer-container > div:first-child {
                grid-column: 1 / -1;
            }

            .detail-image {
                height: 340px;
            }
        }

        @media (max-width: 600px) {
            .navbar {
                padding: 12px 16px;
            }

            .navbar-content {
                flex-wrap: wrap;
                gap: 12px;
            }

            .brand {
                gap: 9px;
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
                letter-spacing: .3px;
            }

            .home-link {
                padding: 8px 11px;
                font-size: 12px;
            }

            .container {
                margin: 25px auto 40px;
                padding: 0 14px;
            }

            .detail-image {
                height: 240px;
            }

            .no-image {
                min-height: 220px;
            }

            .no-image strong {
                font-size: 60px;
            }

            .detail-content {
                padding: 23px 19px;
            }

            .detail-title {
                font-size: 26px;
            }

            .detail-description {
                font-size: 14px;
            }

            .info-title {
                font-size: 20px;
            }

            .info-grid {
                grid-template-columns: 1fr;
                gap: 12px;
            }

            .info-box {
                padding: 16px;
            }

            .button-area {
                flex-direction: column;
            }

            .btn {
                width: 100%;
                text-align: center;
            }

            .footer {
                padding: 35px 22px 18px;
            }

            .footer-container {
                grid-template-columns: 1fr;
                gap: 28px;
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
                    src="{{ asset('img/logo_alma.jpg') }}"
                    alt="Logo MTs Al Muawanah"
                    class="brand-logo"
                    onerror="this.style.display='none'"
                >

                <div class="brand-text">
                    <span class="brand-name">MTs AL MUAWANAH</span>
                    <span class="brand-subtitle">
                        RELIGIUS · CERDAS · BERPRESTASI
                    </span>
                </div>
            </a>

            <a href="{{ url('/') }}" class="home-link">
                ← Beranda
            </a>

        </div>
    </nav>

    {{-- ================= KONTEN DETAIL BERITA ================= --}}

    <main class="container">

        <div class="breadcrumb">
            <a href="{{ url('/') }}">Beranda</a>
            &nbsp; / &nbsp;
            <a href="{{ url('/#berita') }}">Berita</a>
            &nbsp; / &nbsp;
            Detail Berita
        </div>

        <article class="detail-card">

            {{-- FOTO BERITA --}}

            @if (!empty($berita->gambar))

                <img
                    src="{{ asset('storage/' . $berita->gambar) }}"
                    alt="Foto {{ $berita->judul }}"
                    class="detail-image"
                    onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';"
                >

                <div class="no-image" style="display:none;">
                    <strong>
                        {{ strtoupper(mb_substr($berita->judul ?? 'B', 0, 1)) }}
                    </strong>
                    <span>Foto berita tidak dapat dimuat</span>
                </div>

            @else

                <div class="no-image">
                    <strong>
                        {{ strtoupper(mb_substr($berita->judul ?? 'B', 0, 1)) }}
                    </strong>
                    <span>Foto berita belum tersedia</span>
                </div>

            @endif

            {{-- ISI BERITA --}}

            <div class="detail-content">

                <span class="label">BERITA SEKOLAH</span>

                @if (!empty($berita->tanggal))
                    <div class="tanggal">
                        <span>📅</span>
                        <span>
                            {{ \Illuminate\Support\Carbon::parse($berita->tanggal)->format('d F Y') }}
                        </span>
                    </div>
                @endif

                <h1 class="detail-title">
                    {{ $berita->judul }}
                </h1>

                <div class="detail-description">
                    @if (!empty($berita->deskripsi))
                        {!! nl2br(e($berita->deskripsi)) !!}
                    @else
                        <p class="empty-description">
                            Informasi berita ini belum tersedia.
                        </p>
                    @endif
                </div>

                {{-- INFORMASI BERITA --}}

                <h2 class="info-title">Informasi Berita</h2>

                <div class="info-grid">

                    <div class="info-box">
                        <span>Judul Berita</span>
                        <strong>{{ $berita->judul }}</strong>
                    </div>

                    <div class="info-box">
                        <span>Tanggal Publikasi</span>
                        <strong>
                            @if (!empty($berita->tanggal))
                                {{ \Illuminate\Support\Carbon::parse($berita->tanggal)->format('d F Y') }}
                            @else
                                Belum ditentukan
                            @endif
                        </strong>
                    </div>

                    <div class="info-box">
                        <span>Nama Sekolah</span>
                        <strong>MTs AL MUAWANAH</strong>
                    </div>

                    <div class="info-box">
                        <span>Jenis Informasi</span>
                        <strong>Berita Sekolah</strong>
                    </div>

                </div>

                {{-- TOMBOL KEMBALI --}}

                <div class="button-area">

                    <a href="{{ url('/#berita') }}" class="btn btn-back">
                        Kembali ke Berita
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
                        src="{{ asset('img/logo_alma.jpg') }}"
                        alt="Logo MTs Al Muawanah"
                        class="footer-logo"
                        onerror="this.style.display='none'"
                    >

                    <div class="footer-school">
                        MTs AL MUAWANAH
                    </div>

                </div>

                <p class="footer-description">
                    MTs Al Muawanah berkomitmen memberikan pendidikan
                    yang berkualitas untuk membentuk generasi yang
                    religius, cerdas, berakhlak mulia, dan berprestasi.
                </p>
            </div>

            {{-- NAVIGASI --}}

            <div>
                <h3 class="footer-title">Navigasi</h3>

                <ul class="footer-links">
                    <li><a href="{{ url('/') }}">Beranda</a></li>
                    <li><a href="{{ url('/#profil') }}">Profil Sekolah</a></li>
                    <li><a href="{{ url('/#guru') }}">Guru</a></li>
                    <li><a href="{{ url('/#program') }}">Program</a></li>
                    <li><a href="{{ url('/#ekstrakulikuler') }}">Ekstrakulikuler</a></li>
                    <li><a href="{{ url('/#berita') }}">Berita</a></li>
                    <li><a href="{{ url('/#prestasi') }}">Prestasi</a></li>
                    <li><a href="{{ url('/#galeri') }}">Galeri</a></li>
                </ul>
            </div>

            {{-- KONTAK SEKOLAH --}}

            <div>
                <h3 class="footer-title">Kontak Sekolah</h3>

                <div class="footer-contact">
                    <p>📍 Jl. Ciheras, Tanjungjaya</p>
                    <p>☎ Hubungi pihak sekolah</p>
                    <p>✉ matsalma@gmail.com</p>
                </div>
            </div>

        </div>

        {{-- COPYRIGHT --}}

        <div class="footer-bottom">
            © {{ date('Y') }}
            <strong>MTs AL MUAWANAH</strong>.
            Semua Hak Dilindungi.
        </div>

    </footer>

</body>
</html>
