<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Detail Profil - {{ $profil?->nama_sekolah ?? 'MTs Al Muawanah' }}</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background: #f4f8f5;
            color: #263247;
            line-height: 1.7;
        }

        a {
            text-decoration: none;
        }

        /* NAVBAR */
        .navbar {
            background: #075c36;
            color: white;
            padding: 15px 7%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            box-shadow: 0 3px 12px rgba(0, 0, 0, .12);
            position: relative;
            z-index: 5;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            min-width: 0;
        }

        .brand img {
            width: 48px;
            height: 48px;
            object-fit: contain;
            background: white;
            padding: 4px;
            border-radius: 50%;
            flex-shrink: 0;
        }

        .brand h2 {
            font-size: 17px;
            line-height: 1.4;
        }

        .brand span {
            display: block;
            font-size: 12px;
            font-weight: normal;
            color: #dcefe3;
        }

        .nav-link {
            color: white;
            background: #ffffff20;
            padding: 10px 18px;
            border-radius: 8px;
            font-weight: 600;
            transition: .3s;
            white-space: nowrap;
        }

        .nav-link:hover {
            background: white;
            color: #075c36;
        }

        /* FOTO BESAR DI ATAS */
        .school-hero {
            position: relative;
            width: 100%;
            height: 430px;
            overflow: hidden;
            background: #087443;
        }

        .school-hero img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
            display: block;
        }

        .school-hero::after {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(
                to bottom,
                rgba(4, 45, 25, .05) 15%,
                rgba(4, 45, 25, .82) 100%
            );
        }

        .hero-caption {
            position: absolute;
            z-index: 2;
            bottom: 35px;
            left: 7%;
            right: 7%;
            color: white;
        }

        .hero-caption .label {
            display: inline-block;
            background: #ffffff25;
            border: 1px solid #ffffff50;
            padding: 6px 15px;
            border-radius: 30px;
            font-size: 12px;
            letter-spacing: 1px;
            margin-bottom: 12px;
        }

        .hero-caption h1 {
            font-size: clamp(28px, 4vw, 43px);
            line-height: 1.25;
            margin-bottom: 8px;
            overflow-wrap: anywhere;
        }

        .hero-caption p {
            color: #e5f5eb;
            font-size: 16px;
        }

        /* KONTEN UTAMA */
        .main-container {
            max-width: 1150px;
            width: 90%;
            margin: 35px auto 55px;
        }

        .card {
            background: white;
            border-radius: 16px;
            padding: 30px;
            margin-bottom: 25px;
            box-shadow: 0 8px 28px rgba(8, 80, 45, .07);
            border: 1px solid #e1eee5;
        }

        .section-title {
            color: #075c36;
            font-size: 23px;
            margin-bottom: 22px;
            padding-bottom: 12px;
            border-bottom: 2px solid #e5f0e8;
            position: relative;
        }

        .section-title::after {
            content: "";
            position: absolute;
            left: 0;
            bottom: -2px;
            width: 65px;
            height: 3px;
            background: #0ca968;
        }

        /* INFORMASI SEKOLAH */
        .info-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 17px;
        }

        .info-box {
            background: #f6faf7;
            border: 1px solid #e3eee6;
            border-radius: 11px;
            padding: 17px 19px;
            min-width: 0;
            transition: .2s;
        }

        .info-box:hover {
            border-color: #9ed8b5;
            background: #eff8f2;
        }

        .info-box span {
            display: block;
            color: #718477;
            font-size: 13px;
            margin-bottom: 5px;
        }

        .info-box strong {
            display: block;
            color: #244c35;
            font-size: 15px;
            overflow-wrap: anywhere;
        }

        .full-width {
            grid-column: 1 / -1;
        }

        /* SEJARAH DAN DESKRIPSI */
        .history-card {
            border-left: 5px solid #0ca968;
        }

        .history-content,
        .description-content {
            color: #536176;
            font-size: 15px;
            line-height: 1.9;
            white-space: pre-line;
            overflow-wrap: anywhere;
        }

        /* VISI DAN MISI */
        .vision-mission {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 22px;
        }

        .vision-box,
        .mission-box {
            padding: 25px;
            border-radius: 13px;
            background: #f6faf7;
            border: 1px solid #e1eee5;
        }

        .vision-box h3,
        .mission-box h3 {
            color: #087443;
            margin-bottom: 12px;
            font-size: 19px;
        }

        .vision-box p,
        .mission-box p {
            color: #536176;
            white-space: pre-line;
            overflow-wrap: anywhere;
        }

        /* TOMBOL */
        .action-area {
            display: flex;
            justify-content: center;
            gap: 14px;
            flex-wrap: wrap;
            margin-top: 30px;
        }

        .btn {
            display: inline-block;
            padding: 12px 23px;
            border-radius: 9px;
            font-size: 14px;
            font-weight: 600;
            transition: .25s;
        }

        .btn-primary {
            background: #087443;
            color: white;
        }

        .btn-primary:hover {
            background: #075c36;
            transform: translateY(-2px);
        }

        /* FOOTER */
        footer {
            background: #075c36;
            color: #dcefe3;
            text-align: center;
            padding: 25px 20px;
            font-size: 13px;
        }

        footer p + p {
            margin-top: 5px;
        }

        /* RESPONSIVE */
        @media (max-width: 700px) {
            .navbar {
                padding: 13px 5%;
            }

            .brand h2 {
                font-size: 13px;
            }

            .brand span {
                font-size: 11px;
            }

            .brand img {
                width: 40px;
                height: 40px;
            }

            .nav-link {
                padding: 8px 11px;
                font-size: 12px;
            }

            .school-hero {
                height: 300px;
            }

            .hero-caption {
                bottom: 23px;
                left: 5%;
                right: 5%;
            }

            .hero-caption p {
                font-size: 14px;
            }

            .main-container {
                width: 92%;
                margin-top: 25px;
            }

            .card {
                padding: 22px 17px;
            }

            .info-grid,
            .vision-mission {
                grid-template-columns: 1fr;
            }

            .full-width {
                grid-column: auto;
            }

            .section-title {
                font-size: 20px;
            }

            .vision-box,
            .mission-box {
                padding: 20px;
            }

            .btn {
                width: 100%;
                text-align: center;
            }
        }
    </style>
</head>

<body>

    {{-- NAVBAR --}}
    <header class="navbar">
        <div class="brand">

            @if (!empty($profil?->logo))
                <img
                    src="{{ asset('storage/' . $profil->logo) }}"
                    alt="Logo MTs Al Muawanah"
                    onerror="this.onerror=null; this.src='{{ asset('img/logo_alma.jpg') }}';"
                >
            @else
                <img
                    src="{{ asset('img/logo_alma.jpg') }}"
                    alt="Logo MTs Al Muawanah"
                    onerror="this.style.display='none'"
                >
            @endif

            <h2>
                {{ $profil?->nama_sekolah ?? 'MTs Al Muawanah' }}
                <span>Profil Resmi Sekolah</span>
            </h2>

        </div>
    </header>

    {{-- FOTO SEKOLAH DAN JUDUL --}}
    <section class="school-hero">

        @if (!empty($profil?->foto))
            <img
                src="{{ asset('storage/' . $profil->foto) }}"
                alt="Foto {{ $profil?->nama_sekolah ?? 'Sekolah' }}"
                onerror="this.onerror=null; this.src='{{ asset('img/sekolah.jpg') }}';"
            >
        @else
            <img
                src="{{ asset('img/sekolah.jpg') }}"
                alt="Foto MTs Al Muawanah"
                onerror="this.style.display='none'"
            >
        @endif

        <div class="hero-caption">
            <span class="label">PROFIL SEKOLAH</span>

            <h1>{{ $profil?->nama_sekolah ?? 'MTs Al Muawanah' }}</h1>

            <p>
                Mengenal lebih dekat identitas, sejarah, visi, dan misi sekolah.
            </p>
        </div>

    </section>

    <main class="main-container">

        {{-- INFORMASI SEKOLAH --}}
        <section class="card">
            <h2 class="section-title">Informasi Sekolah</h2>

            <div class="info-grid">

                <div class="info-box">
                    <span>Nama Sekolah</span>
                    <strong>{{ $profil?->nama_sekolah ?: 'MTs Al Muawanah' }}</strong>
                </div>

                <div class="info-box">
                    <span>NPSN</span>
                    <strong>{{ $profil?->npsn ?: '-' }}</strong>
                </div>

                <div class="info-box">
                    <span>Kepala Sekolah</span>
                    <strong>{{ $profil?->kepala_sekolah ?: '-' }}</strong>
                </div>

                <div class="info-box">
                    <span>Tahun Berdiri</span>
                    <strong>{{ $profil?->tahun_berdiri ?: '-' }}</strong>
                </div>

                <div class="info-box">
                    <span>Status Sekolah</span>
                    <strong>{{ $profil?->status_sekolah ?: '-' }}</strong>
                </div>

                <div class="info-box">
                    <span>Akreditasi</span>
                    <strong>{{ $profil?->akreditasi ?: '-' }}</strong>
                </div>

                <div class="info-box">
                    <span>Email</span>
                    <strong>{{ $profil?->email ?: '-' }}</strong>
                </div>

                <div class="info-box">
                    <span>Telepon</span>
                    <strong>{{ $profil?->telepon ?: '-' }}</strong>
                </div>

                <div class="info-box full-width">
                    <span>Alamat Sekolah</span>
                    <strong>{{ $profil?->alamat ?: '-' }}</strong>
                </div>

            </div>
        </section>

        {{-- SEJARAH SEKOLAH --}}
        @if (filled($profil?->sejarah))
            <section class="card history-card">
                <h2 class="section-title">Sejarah Sekolah</h2>

                <div class="history-content">{{ $profil->sejarah }}</div>
            </section>
        @endif

        {{-- DESKRIPSI SEKOLAH --}}
        @if (filled($profil?->deskripsi))
            <section class="card">
                <h2 class="section-title">Tentang Sekolah</h2>

                <div class="description-content">{{ $profil->deskripsi }}</div>
            </section>
        @endif

        {{-- VISI DAN MISI --}}
        @if (filled($profil?->visi) || filled($profil?->misi))
            <section class="card">
                <h2 class="section-title">Visi dan Misi</h2>

                <div class="vision-mission">

                    @if (filled($profil?->visi))
                        <div class="vision-box">
                            <h3>Visi Sekolah</h3>
                            <p>{{ $profil->visi }}</p>
                        </div>
                    @endif

                    @if (filled($profil?->misi))
                        <div class="mission-box">
                            <h3>Misi Sekolah</h3>
                            <p>{{ $profil->misi }}</p>
                        </div>
                    @endif

                </div>
            </section>
        @endif

        {{-- TOMBOL KEMBALI --}}
        <div class="action-area">
            <a href="{{ url('/') }}" class="btn btn-primary">
                Kembali ke Beranda
            </a>
        </div>

    </main>

    {{-- FOOTER --}}
    <footer>
        <p>
            &copy; {{ date('Y') }}
            {{ $profil?->nama_sekolah ?? 'MTs Al Muawanah' }}
        </p>

        <p>
            {{ $profil?->alamat ?? 'Alamat sekolah belum diisi' }}
        </p>
    </footer>

</body>
</html>
