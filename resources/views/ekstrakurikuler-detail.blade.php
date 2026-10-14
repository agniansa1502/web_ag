<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $ekskul->nama_ekskul }} - MTs Al Muawanah</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            min-height: 100%;
            scroll-behavior: smooth;
        }

        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            font-family: Arial, Helvetica, sans-serif;
            background: #f4f9f6;
            color: #263b30;
            line-height: 1.7;
        }

        a {
            text-decoration: none;
        }

        /* NAVBAR */

        .navbar {
            width: 100%;
            background: #fff;
            padding: 12px 7%;
            box-shadow: 0 3px 15px rgba(8, 116, 67, .10);
            border-bottom: 3px solid #0ca968;
            flex-shrink: 0;
        }

        .navbar-content {
            max-width: 1100px;
            min-height: 50px;
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
            color: #64786c;
            font-size: 10px;
            letter-spacing: .8px;
        }

        .home-link {
            color: #087443;
            font-size: 14px;
            font-weight: bold;
            white-space: nowrap;
            transition: .25s;
        }

        .home-link:hover {
            color: #0ca968;
        }

        /* KONTEN UTAMA */

        main.container {
            width: 100%;
            max-width: 1100px;
            margin: 35px auto;
            padding: 0 20px;
            flex: 1;
        }

        .detail-card {
            background: #fff;
            border: 1px solid #dcebe1;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 8px 30px rgba(8, 116, 67, .09);
        }

        /* FOTO EKSTRAKURIKULER */

        .detail-image {
            display: block;
            width: 100%;
            height: 420px;
            object-fit: cover;
            object-position: center;
            background: #e5f2e9;
        }

        .no-image {
            width: 100%;
            min-height: 300px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 12px;
            padding: 25px;
            color: #fff;
            text-align: center;
            background: linear-gradient(135deg, #075c36, #0ca968);
        }

        .no-image strong {
            font-size: 75px;
            line-height: 1.2;
        }

        .no-image span {
            font-size: 14px;
        }

        /* DETAIL CONTENT */

        .detail-content {
            padding: 35px;
        }

        .category {
            display: inline-block;
            padding: 6px 14px;
            margin-bottom: 14px;
            color: #087443;
            background: #e4f5eb;
            border: 1px solid #c9ead6;
            border-radius: 25px;
            font-size: 12px;
            font-weight: bold;
            letter-spacing: .3px;
        }

        .detail-title {
            margin-bottom: 15px;
            color: #075c36;
            font-size: 32px;
            line-height: 1.4;
            overflow-wrap: anywhere;
        }

        .detail-description {
            margin-bottom: 30px;
            color: #596b60;
            font-size: 15px;
            line-height: 1.9;
            overflow-wrap: anywhere;
            white-space: normal;
        }

        .empty-description {
            color: #7b8b80;
            font-style: italic;
        }

        /* INFORMASI EKSTRAKURIKULER */

        .section-title {
            margin-bottom: 18px;
            color: #075c36;
            font-size: 22px;
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 15px;
        }

        .info-box {
            min-width: 0;
            padding: 18px;
            background: #f6faf7;
            border: 1px solid #dcebe1;
            border-radius: 10px;
            transition: .25s ease;
        }

        .info-box:hover {
            background: #eaf7ef;
            border-color: #a7d9b9;
            transform: translateY(-2px);
        }

        .info-box span {
            display: block;
            margin-bottom: 5px;
            color: #718176;
            font-size: 13px;
        }

        .info-box strong {
            display: block;
            color: #263b30;
            font-size: 15px;
            font-weight: 600;
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
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 12px 20px;
            border: none;
            border-radius: 8px;
            font-size: 14px;
            font-weight: bold;
            transition: .25s ease;
        }

        .btn-back {
            color: #fff;
            background: #087443;
        }

        .btn-back:hover {
            color: #fff;
            background: #075c36;
            transform: translateY(-2px);
        }

        .btn-home {
            color: #087443;
            background: #e4f5eb;
            border: 1px solid #c9ead6;
        }

        .btn-home:hover {
            background: #d4efdf;
        }

        /* FOOTER */

        .footer {
            width: 100%;
            margin-top: auto;
            padding: 40px 7% 18px;
            color: #e0f0e5;
            background: #06472b;
            flex-shrink: 0;
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
            width: 48px;
            height: 48px;
            object-fit: contain;
            flex-shrink: 0;
        }

        .footer-school {
            color: #fff;
            font-size: 16px;
            font-weight: bold;
        }

        .footer-description,
        .footer-contact {
            color: #d1e7d9;
            font-size: 13px;
            line-height: 1.9;
            overflow-wrap: anywhere;
        }

        .footer-contact p {
            margin-bottom: 7px;
        }

        .footer-title {
            position: relative;
            margin-bottom: 17px;
            padding-bottom: 9px;
            color: #fff;
            font-size: 15px;
        }

        .footer-title::after {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 35px;
            height: 3px;
            border-radius: 5px;
            background: #58d68d;
            content: "";
        }

        .footer-links {
            list-style: none;
        }

        .footer-links li {
            margin-bottom: 8px;
        }

        .footer-links a {
            color: #d1e7d9;
            font-size: 13px;
            transition: .2s;
        }

        .footer-links a:hover {
            color: #72e6a2;
            padding-left: 4px;
        }

        .footer-bottom {
            max-width: 1100px;
            margin: 28px auto 0;
            padding-top: 16px;
            border-top: 1px solid rgba(255, 255, 255, .18);
            color: #d1e7d9;
            font-size: 12px;
            text-align: center;
        }

        /* RESPONSIVE TABLET */

        @media (max-width: 768px) {
            main.container {
                margin: 25px auto;
                padding: 0 15px;
            }

            .detail-image {
                height: 300px;
            }

            .detail-content {
                padding: 25px 22px;
            }

            .detail-title {
                font-size: 27px;
            }

            .footer {
                padding: 35px 22px 18px;
            }

            .footer-container {
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 28px;
            }

            .footer-container > div:first-child {
                grid-column: 1 / -1;
            }
        }

        /* RESPONSIVE HP */

        @media (max-width: 500px) {
            .navbar {
                padding: 12px 16px;
            }

            .navbar-content {
                gap: 10px;
            }

            .brand {
                gap: 8px;
            }

            .brand-logo {
                width: 40px;
                height: 40px;
            }

            .brand-name {
                font-size: 13px;
            }

            .brand-subtitle {
                font-size: 8px;
                letter-spacing: .3px;
            }

            .home-link {
                font-size: 12px;
            }

            .detail-image {
                height: 230px;
            }

            .no-image {
                min-height: 220px;
            }

            .no-image strong {
                font-size: 58px;
            }

            .detail-content {
                padding: 22px 18px;
            }

            .detail-title {
                font-size: 24px;
            }

            .detail-description {
                font-size: 14px;
            }

            .section-title {
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

    {{-- NAVBAR --}}

    <nav class="navbar">
        <div class="navbar-content">

            <a href="{{ url('/') }}" class="brand">

                <img
                    src="{{ asset('img/logo_alma.jpg') }}"
                    alt="Logo MTs Al Muawanah"
                    class="brand-logo"
                >

                <div class="brand-text">
                    <span class="brand-name">
                        MTs AL MUAWANAH
                    </span>

                    <span class="brand-subtitle">
                        CERDAS · TERAMPIL · BERKARAKTER
                    </span>
                </div>

            </a>

            <a href="{{ url('/') }}" class="home-link">
                ← Beranda
            </a>

        </div>
    </nav>

    {{-- KONTEN DETAIL --}}

    <main class="container">

        <article class="detail-card">

            {{-- FOTO EKSTRAKURIKULER --}}

            @if (!empty($ekskul->gambar))

                <img
                    src="{{ asset('storage/' . $ekskul->gambar) }}"
                    alt="Foto {{ $ekskul->nama_ekskul }}"
                    class="detail-image"
                    onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';"
                >

                <div class="no-image" style="display:none;">
                    <strong>
                        {{ strtoupper(mb_substr($ekskul->nama_ekskul ?? 'E', 0, 1)) }}
                    </strong>
                    <span>Foto tidak dapat dimuat</span>
                </div>

            @else

                <div class="no-image">
                    <strong>
                        {{ strtoupper(mb_substr($ekskul->nama_ekskul ?? 'E', 0, 1)) }}
                    </strong>
                    <span>Foto ekstrakurikuler belum tersedia</span>
                </div>

            @endif

            {{-- INFORMASI EKSTRAKURIKULER --}}

            <div class="detail-content">

                <span class="category">
                    KEGIATAN SISWA
                </span>

                <h1 class="detail-title">
                    {{ $ekskul->nama_ekskul }}
                </h1>

                <div class="detail-description">
                    @if (!empty($ekskul->deskripsi))

                        {!! nl2br(e($ekskul->deskripsi)) !!}

                    @else

                        <p class="empty-description">
                            Informasi deskripsi ekstrakurikuler ini
                            belum tersedia.
                        </p>

                    @endif
                </div>

                <h2 class="section-title">
                    Informasi Ekstrakurikuler
                </h2>

                <div class="info-grid">

                    <div class="info-box">
                        <span>Nama Ekstrakurikuler</span>
                        <strong>
                            {{ $ekskul->nama_ekskul ?: '-' }}
                        </strong>
                    </div>

                    <div class="info-box">
                        <span>Pembina</span>
                        <strong>
                            {{ $ekskul->pembina ?: 'Belum ditentukan' }}
                        </strong>
                    </div>

                    <div class="info-box">
                        <span>Jadwal Latihan</span>
                        <strong>
                            {{ $ekskul->jadwal_latihan ?: 'Belum ditentukan' }}
                        </strong>
                    </div>

                    <div class="info-box">
                        <span>Nama Sekolah</span>
                        <strong>MTs AL MUAWANAH</strong>
                    </div>

                    <div class="info-box">
                        <span>Jenis Kegiatan</span>
                        <strong>Ekstrakulikuler</strong>
                    </div>

                </div>

                {{-- TOMBOL KEMBALI --}}

                <div class="button-area">

                    <a
                        href="{{ url('/#ekskul') }}"
                        class="btn btn-back"
                    >
                        Kembali ke Ekstrakulikuler
                    </a>

                    <a
                        href="{{ url('/') }}"
                        class="btn btn-home"
                    >
                        Kembali ke Beranda
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

                <h3 class="footer-title">
                    Navigasi
                </h3>

                <ul class="footer-links">

                    <li>
                        <a href="{{ url('/') }}">Beranda</a>
                    </li>

                    <li>
                        <a href="{{ url('/#profil') }}">Profil Sekolah</a>
                    </li>

                    <li>
                        <a href="{{ url('/#guru') }}">Guru</a>
                    </li>

                    <li>
                        <a href="{{ url('/#program') }}">Program</a>
                    </li>

                    <li>
                        <a href="{{ url('/#ekskul') }}">Ekstrakulikuler</a>
                    </li>

                    <li>
                        <a href="{{ url('/#berita') }}">Berita</a>
                    </li>

                    <li>
                        <a href="{{ url('/#prestasi') }}">Prestasi</a>
                    </li>

                    <li>
                        <a href="{{ url('/#galeri') }}">Galeri</a>
                    </li>

                </ul>

            </div>

            {{-- KONTAK SEKOLAH --}}

            <div>

                <h3 class="footer-title">
                    Kontak Sekolah
                </h3>

                <div class="footer-contact">

                    <p>
                        📍 {{ $profil->alamat ?? 'Alamat sekolah belum tersedia' }}
                    </p>

                    <p>
                        ☎ {{ $profil->telepon ?? 'Telepon sekolah belum tersedia' }}
                    </p>

                    <p>
                        ✉ {{ $profil->email ?? 'Email sekolah belum tersedia' }}
                    </p>

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

