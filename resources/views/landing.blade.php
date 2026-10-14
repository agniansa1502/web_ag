
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $profil->nama_sekolah ?? 'SMK NEGERI 1 JAKARTA' }}</title>

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
            scroll-padding-top: 95px;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            color: #1f2937;
            background: #fff;
            line-height: 1.7;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        img {
            max-width: 100%;
        }

        .container {
            width: 90%;
            max-width: 1200px;
            margin: auto;
        }

        /* =========================
           TOPBAR
        ========================= */

        .topbar {
            background: #062b63;
            color: #fff;
            padding: 9px 0;
            font-size: 12px;
        }

        .topbar-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
        }

        .top-info {
            display: flex;
            flex-wrap: wrap;
            gap: 22px;
        }

        .top-info span {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .top-info i {
            color: #ffc107;
        }

        /* =========================
           NAVBAR
        ========================= */

        .navbar {
            background: #fff;
            position: sticky;
            top: 0;
            z-index: 1000;
            box-shadow: 0 4px 18px rgba(0, 0, 0, .07);
        }

        .nav-content {
            min-height: 82px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 25px;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            flex-shrink: 0;
        }

        .brand img {
            width: 53px;
            height: 53px;
            object-fit: contain;
        }

        .brand-name {
            color: #062b63;
            font-size: 17px;
            font-weight: 800;
            line-height: 1.4;
        }

        .brand-tagline {
            color: #64748b;
            font-size: 9px;
            letter-spacing: 1px;
        }

        .nav-menu {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            flex-wrap: wrap;
            gap: 20px;
            list-style: none;
        }

        .nav-menu a {
            color: #374151;
            font-size: 13px;
            font-weight: 700;
            transition: .25s;
        }

        .nav-menu a:hover {
            color: #0d6efd;
        }

        /* =========================
           HERO
        ========================= */

        .hero {
            min-height: 480px;
            display: flex;
            align-items: center;
            position: relative;
            overflow: hidden;
            padding: 65px 0 95px;

            background:
                linear-gradient(
                    90deg,
                    rgba(3, 25, 58, .94),
                    rgba(3, 25, 58, .75) 48%,
                    rgba(3, 25, 58, .25)
                ),
                url("{{ asset('img/school_library.png') }}")
                center center / cover no-repeat;
        }

        .hero-content {
            max-width: 760px;
            color: #fff;
            animation: heroFade .8s ease;
        }

        .hero-label {
            display: inline-block;
            color: #ffc107;
            border: 1px solid #ffc107;
            background: rgba(255, 193, 7, .08);
            padding: 7px 15px;
            border-radius: 30px;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 1px;
            margin-bottom: 20px;
        }

        .hero h1 {
            max-width: 760px;
            font-size: clamp(35px, 4.3vw, 55px);
            line-height: 1.17;
            letter-spacing: -.8px;
            margin-bottom: 20px;
            font-weight: 800;
        }

        .hero h1 span {
            color: #ffc107;
        }

        .hero p {
            max-width: 610px;
            color: #e5e7eb;
            font-size: 15px;
            line-height: 1.9;
            margin-bottom: 27px;
        }

        .hero-buttons {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
        }

        .btn-primary,
        .btn-outline {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 9px;
            padding: 12px 22px;
            border-radius: 7px;
            font-size: 13px;
            font-weight: 700;
            transition: .25s;
        }

        .btn-primary {
            background: #ffc107;
            color: #17202d;
        }

        .btn-primary:hover {
            background: #ffca2c;
            transform: translateY(-2px);
        }

        .btn-outline {
            border: 1px solid #fff;
            color: #fff;
        }

        .btn-outline:hover {
            background: #fff;
            color: #062b63;
        }

        @keyframes heroFade {
            from {
                opacity: 0;
                transform: translateY(15px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* =========================
           STATISTIK
        ========================= */

        .stats {
            position: relative;
            z-index: 5;
            margin-top: -43px;
            padding-bottom: 25px;
        }

        .stats-box {
            width: 100%;
            max-width: 1000px;
            margin: auto;
            background: #fff;
            border-radius: 14px;
            box-shadow: 0 10px 35px rgba(6, 43, 99, .13);
            padding: 24px 18px;

            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            align-items: center;
        }

        .stat {
            text-align: center;
            padding: 5px 12px;
            border-right: 1px solid #e2e8f0;
        }

        .stat:last-child {
            border-right: none;
        }

        .stat-number {
            color: #062b63;
            font-size: 28px;
            font-weight: 800;
            line-height: 1.3;
        }

        .stat-title {
            color: #64748b;
            font-size: 12px;
        }

        /* =========================
           SECTION UMUM
        ========================= */

        .section {
            padding: 75px 0;
        }

        .section-light {
            background: #f6f9fd;
        }

        .section-header {
            text-align: center;
            margin-bottom: 42px;
        }

        .section-label {
            color: #0d6efd;
            font-size: 12px;
            font-weight: 800;
            letter-spacing: 2px;
            text-transform: uppercase;
            margin-bottom: 8px;
        }

        .section-title {
            color: #062b63;
            font-size: clamp(27px, 3vw, 35px);
            line-height: 1.3;
            margin-bottom: 13px;
        }

        .section-description {
            color: #64748b;
            max-width: 650px;
            margin: auto;
            font-size: 14px;
        }

        /* =========================
           KEPALA SEKOLAH
        ========================= */

        .principal {
            background: #062b63;
            color: #fff;
        }

        .principal-grid {
            display: grid;
            grid-template-columns: minmax(280px, 380px) minmax(0, 1fr);
            gap: 55px;
            align-items: center;
        }

        .principal img {
            width: 100%;
            height: 410px;
            display: block;
            object-fit: cover;
            object-position: center top;
            border-radius: 15px;
            background: rgba(255, 255, 255, .08);
        }

        .principal .section-label {
            color: #ffc107;
        }

        .principal h2 {
            font-size: 31px;
            line-height: 1.35;
            margin-bottom: 20px;
        }

        .principal p {
            color: #d7e2f0;
            font-size: 14px;
            margin-bottom: 15px;
        }

        .principal-name {
            color: #ffc107;
            font-size: 19px;
            font-weight: 800;
            margin-top: 20px;
        }

        .principal small {
            color: #d7e2f0;
        }


/* =========================
   PROFIL SEKOLAH
========================= */

#profil.section {
    width: 100%;
    padding: 70px 0;
    background: #f6f9fd;
    overflow: hidden;
}

#profil .container {
    width: 90%;
    max-width: 1200px;
    margin: 0 auto;
    padding: 0;
}

/* FOTO SEKOLAH */

#profil .about-wrapper {
    width: 100%;
    margin-bottom: 40px;
}

#profil .about-image {
    width: 100%;
    overflow: hidden;
    border-radius: 16px;
    background: #e5edf7;
    box-shadow: 0 10px 30px rgba(6, 43, 99, .12);
}

#profil .about-image img {
    display: block;
    width: 100%;
    height: 430px;
    object-fit: cover;
    object-position: center;
}

/* SEJARAH SEKOLAH */

#profil .about-history {
    width: 100%;
    padding: 35px;
    background: #fff;
    border: 1px solid #e5eaf2;
    border-left: 5px solid #07599f;
    border-radius: 12px;
    box-shadow: 0 8px 25px rgba(6, 43, 99, .06);
}

#profil .section-subtitle {
    display: block;
    color: #d6a21b;
    font-size: 12px;
    font-weight: 800;
    letter-spacing: 2px;
    margin-bottom: 8px;
}

#profil .about-history h2 {
    color: #07599f;
    font-size: 30px;
    font-weight: 800;
    line-height: 1.4;
    margin-bottom: 18px;
}

#profil .about-history p {
    color: #536176;
    font-size: 15px;
    line-height: 1.9;
    text-align: justify;
    text-justify: inter-word;
    overflow-wrap: anywhere;
    white-space: pre-line;
}

/* TOMBOL PROFIL LENGKAP */

#profil .about-more {
    display: flex;
    justify-content: center;
    margin-top: 28px;
}

#profil .about-detail {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 12px 22px;
    background: #07599f;
    color: #fff;
    border-radius: 7px;
    font-size: 14px;
    font-weight: 700;
    text-decoration: none;
    transition: .25s;
}

#profil .about-detail:hover {
    background: #064577;
    transform: translateY(-2px);
}

/* RESPONSIVE TABLET */

@media (max-width: 900px) {
    #profil .about-image img {
        height: 350px;
    }

    #profil .about-history {
        padding: 28px;
    }

    #profil .about-history h2 {
        font-size: 27px;
    }
}

/* RESPONSIVE HP */

@media (max-width: 700px) {
    #profil.section {
        padding: 45px 0;
    }

    #profil .container {
        width: 92%;
    }

    #profil .about-wrapper {
        margin-bottom: 25px;
    }

    #profil .about-image img {
        height: 260px;
    }

    #profil .about-history {
        padding: 22px 18px;
    }

    #profil .about-history h2 {
        font-size: 24px;
    }

    #profil .about-history p {
        font-size: 14px;
        line-height: 1.85;
    }

    #profil .about-detail {
        width: 100%;
        text-align: center;
    }
}

        /* =========================
           KARTU UMUM
        ========================= */

        .guru-grid,
        .program-grid,
        .news-grid,
        .prestasi-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 24px;
            align-items: stretch;
        }

        .guru-card,
        .program-card,
        .news-card,
        .prestasi-card {
            min-width: 0;
            height: 100%;
            display: flex;
            flex-direction: column;
            overflow: hidden;
            background: #fff;
            border: 1px solid #e7ebf1;
            border-radius: 13px;
            transition: .3s ease;
        }

        .guru-card:hover,
        .program-card:hover,
        .news-card:hover,
        .prestasi-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 30px rgba(0, 0, 0, .09);
        }

        .guru-card {
            align-items: center;
            text-align: center;
            padding: 22px;
        }

        .foto-guru,
        .guru-icon {
            width: 100%;
            max-width: 230px;
            height: 255px;
            border-radius: 9px;
            margin-bottom: 17px;
        }

        .foto-guru {
            display: block;
            object-fit: cover;
            object-position: center top;
            background: #f1f5f9;
        }

        .guru-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            color: #0d6efd;
            background: #eaf2ff;
            font-size: 45px;
        }

        .guru-card h3 {
            color: #062b63;
            font-size: 17px;
            line-height: 1.5;
            overflow-wrap: anywhere;
        }

        .guru-card p {
            color: #64748b;
            font-size: 13px;
            margin: 7px 0;
        }

        .guru-jabatan {
            background: #eaf2ff;
            color: #0d6efd;
            padding: 5px 12px;
            border-radius: 30px;
            font-size: 11px;
            font-weight: 700;
        }

        .guru-link {
            display: inline-block;
            color: #0d6efd;
            font-size: 13px;
            font-weight: 700;
            margin-top: auto;
            padding-top: 17px;
        }

        .guru-empty,
        .empty-message {
            grid-column: 1 / -1;
            text-align: center;
            padding: 30px;
            color: #64748b;
            background: #fff;
            border-radius: 12px;
        }

        /* =========================
           PROGRAM KEAHLIAN
        ========================= */

        .program-image {
            height: 190px;
            overflow: hidden;
            background: linear-gradient(135deg, #062b63, #0d6efd);
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 45px;
        }

        .program-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .program-body {
            flex: 1;
            padding: 22px;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }

        .program-body h3 {
            color: #062b63;
            font-size: 17px;
            line-height: 1.5;
            margin-bottom: 10px;
        }

        .program-body p {
            color: #64748b;
            font-size: 13px;
            margin-bottom: 17px;
        }

        .program-link {
            display: inline-block;
            margin-top: auto;
            color: #0d6efd;
            font-size: 13px;
            font-weight: 700;
        }

        .program-link:hover,
        .guru-link:hover {
            color: #062b63;
        }

        /* =========================
           EKSTRAKURIKULER
        ========================= */

        .ekskul-grid {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 20px;
        }

        .ekskul-card {
            min-width: 0;
            padding: 25px 18px;
            background: #fff;
            border: 1px solid #e7ebf1;
            border-radius: 13px;
            text-align: center;
            transition: .3s;
        }

        .ekskul-card:hover {
            background: #062b63;
            color: #fff;
            transform: translateY(-5px);
        }

        .ekskul-icon {
            color: #0d6efd;
            font-size: 35px;
            margin-bottom: 12px;
        }

        .ekskul-card:hover .ekskul-icon {
            color: #ffc107;
        }

        .foto-ekskul {
            width: 100%;
            height: 150px;
            object-fit: cover;
            border-radius: 8px;
            margin-bottom: 15px;
        }

        .ekskul-card h3 {
            font-size: 16px;
            margin-bottom: 8px;
        }

        .ekskul-card p {
            color: #64748b;
            font-size: 12px;
            margin-bottom: 12px;
        }

        .ekskul-card:hover p {
            color: #d7e2f0;
        }

        .ekskul-link {
            display: inline-block;
            color: #0d6efd;
            font-size: 12px;
            font-weight: 700;
        }

        .ekskul-card:hover .ekskul-link {
            color: #ffc107;
        }

        /* =========================
           BERITA
        ========================= */

        .news-image {
            width: 100%;
            height: 210px;
            display: block;
            object-fit: cover;
            background: #e2e8f0;
        }

        .news-body {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            padding: 21px;
        }

        .news-date {
            color: #0d6efd;
            font-size: 11px;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .news-body h3 {
            color: #062b63;
            font-size: 17px;
            line-height: 1.5;
            margin-bottom: 10px;
        }

        .news-body p {
            color: #64748b;
            font-size: 13px;
            margin-bottom: 18px;
        }

        /* =========================
           PRESTASI
        ========================= */

        .prestasi-section {
            background: #f6f9fd;
        }

        .prestasi-image {
            width: 100%;
            height: 210px;
            background: #eaf2ff;
            overflow: hidden;
        }

        .prestasi-image img {
            width: 100%;
            height: 100%;
            display: block;
            object-fit: cover;
        }

        .prestasi-no-image {
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #e0a800;
            font-size: 50px;
        }

        .prestasi-content {
            padding: 21px;
            display: flex;
            flex-direction: column;
            flex: 1;
        }

        .prestasi-content h3 {
            color: #062b63;
            font-size: 17px;
            line-height: 1.5;
            margin-bottom: 12px;
        }

        .prestasi-content p {
            color: #64748b;
            font-size: 13px;
            line-height: 1.8;
            margin: 12px 0;
        }

        .prestasi-badges {
            display: flex;
            flex-wrap: wrap;
            gap: 7px;
        }

        .prestasi-badge {
            background: #eaf2ff;
            color: #0d6efd;
            padding: 5px 10px;
            border-radius: 30px;
            font-size: 11px;
            font-weight: 700;
        }

        .prestasi-badge.tahun {
            background: #f1f5f9;
            color: #475569;
        }

        /* =========================
           GALERI
        ========================= */

        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 18px;
        }

        .gallery-item {
            min-width: 0;
            height: 250px;
            border-radius: 12px;
            overflow: hidden;
            position: relative;
            background: #e2e8f0;
        }

        .gallery-item img {
            width: 100%;
            height: 100%;
            display: block;
            object-fit: cover;
            transition: .4s;
        }

        .gallery-item:hover img {
            transform: scale(1.06);
        }

        .gallery-caption {
            position: absolute;
            inset: auto 0 0;
            padding: 35px 17px 16px;
            color: #fff;
            background: linear-gradient(transparent, rgba(0, 0, 0, .85));
        }

        .gallery-caption strong {
            display: block;
            font-size: 14px;
        }

        .gallery-detail-link {
            display: block;
            color: #ffc107;
            font-size: 12px;
            margin-top: 5px;
        }

        /* =========================
           CTA
        ========================= */

        .cta {
            padding: 70px 0;
            text-align: center;
            color: #fff;

            background:
                linear-gradient(
                    rgba(6, 43, 99, .94),
                    rgba(13, 110, 253, .88)
                ),
                url("{{ asset('img/school_library.png') }}")
                center / cover no-repeat;
        }

        .cta h2 {
            font-size: clamp(26px, 3vw, 35px);
            line-height: 1.4;
            margin-bottom: 15px;
        }

        .cta p {
            max-width: 650px;
            margin: 0 auto;
            color: #e2e8f0;
            font-size: 14px;
        }

        /* =========================
           FOOTER
        ========================= */

        footer {
            background: #031a3b;
            color: #b8c6d8;
            padding-top: 55px;
        }

        .footer-grid {
            display: grid;
            grid-template-columns: 2fr 1fr 1.3fr 1.5fr;
            gap: 35px;
        }

        .footer-logo {
            display: flex;
            align-items: center;
            gap: 12px;
            color: #fff;
            font-size: 16px;
            font-weight: 800;
            margin-bottom: 17px;
        }

        .footer-logo img {
            width: 48px;
            height: 48px;
            object-fit: contain;
        }

        footer h3 {
            color: #fff;
            font-size: 15px;
            margin-bottom: 17px;
        }

        footer p {
            font-size: 13px;
        }

        .footer-links {
            list-style: none;
        }

        .footer-links li {
            margin-bottom: 9px;
        }

        .footer-links a {
            color: #b8c6d8;
            font-size: 12px;
            transition: .2s;
        }

        .footer-links a:hover {
            color: #ffc107;
        }

        .contact-item {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            margin-bottom: 12px;
            font-size: 12px;
            overflow-wrap: anywhere;
        }

        .contact-icon {
            color: #ffc107;
            min-width: 15px;
        }

        .copyright {
            margin-top: 40px;
            padding: 18px 0;
            border-top: 1px solid rgba(255, 255, 255, .12);
            font-size: 11px;
            display: flex;
            justify-content: space-between;
            gap: 12px;
        }

        /* =========================
           RESPONSIVE TABLET
        ========================= */

        @media (max-width: 1050px) {
            .nav-content {
                gap: 15px;
            }

            .nav-menu {
                gap: 12px;
            }

            .nav-menu a {
                font-size: 12px;
            }

            .brand-name {
                font-size: 15px;
            }

            .principal-grid {
                grid-template-columns: 300px minmax(0, 1fr);
                gap: 30px;
            }

            .ekskul-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .footer-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        @media (max-width: 768px) {
            .topbar {
                display: none;
            }

            .nav-content {
                padding: 13px 0;
                flex-direction: column;
                gap: 13px;
            }

            .brand-name {
                font-size: 16px;
            }

            .nav-menu {
                justify-content: center;
                gap: 10px 15px;
            }

            .nav-menu a {
                font-size: 12px;
            }

            .hero {
                min-height: 440px;
                padding: 55px 0 80px;
                background-position: center;
            }

            .hero h1 {
                font-size: 37px;
            }

            .hero p {
                font-size: 14px;
            }

            .stats {
                margin-top: -35px;
            }

            .stats-box {
                max-width: 95%;
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 15px 0;
                padding: 20px 10px;
            }

            .stat {
                border: none;
                padding: 7px;
            }

            .stat-number {
                font-size: 25px;
            }

            .principal-grid,
            .about-wrapper {
                grid-template-columns: 1fr;
                gap: 30px;
            }

            .principal img {
                max-width: 420px;
                height: 330px;
                margin: auto;
            }

            .about-image img {
                height: 320px;
            }

            .guru-grid,
            .program-grid,
            .news-grid,
            .prestasi-grid,
            .gallery-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .footer-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 28px;
            }
        }

        /* =========================
           RESPONSIVE HP
        ========================= */

        @media (max-width: 500px) {
            .container {
                width: 92%;
            }

            .brand img {
                width: 43px;
                height: 43px;
            }

            .brand-name {
                font-size: 14px;
            }

            .brand-tagline {
                font-size: 8px;
            }

            .nav-menu {
                gap: 9px 12px;
            }

            .nav-menu a {
                font-size: 11px;
            }

            .hero {
                min-height: 400px;
                padding: 45px 0 70px;
            }

            .hero h1 {
                font-size: 30px;
                letter-spacing: 0;
            }

            .hero p {
                font-size: 13px;
            }

            .hero-label {
                font-size: 10px;
            }

            .hero-buttons {
                flex-direction: column;
                align-items: flex-start;
            }

            .stats-box {
                padding: 16px 7px;
            }

            .stat-number {
                font-size: 22px;
            }

            .stat-title {
                font-size: 10px;
            }

            .section {
                padding: 55px 0;
            }

            .section-header {
                margin-bottom: 30px;
            }

            .section-title,
            .about-content h2,
            .principal h2 {
                font-size: 27px;
            }

            .guru-grid,
            .program-grid,
            .news-grid,
            .prestasi-grid,
            .gallery-grid {
                grid-template-columns: 1fr;
            }

            .ekskul-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 12px;
            }

            .ekskul-card {
                padding: 20px 12px;
            }

            .foto-guru,
            .guru-icon {
                height: 270px;
            }

            .program-image,
            .news-image,
            .prestasi-image {
                height: 210px;
            }

            .gallery-item {
                height: 230px;
            }

            .footer-grid {
                grid-template-columns: 1fr;
            }

            .copyright {
                flex-direction: column;
            }
        }
    </style>
</head>

<body>

    {{-- =========================
         TOPBAR
    ========================= --}}
    <div class="topbar">
        <div class="container topbar-content">

            <div class="top-info">
                <span>
                    <i class="fa-solid fa-location-dot"></i>
                    {{ $profil->alamat ?? 'Jakarta Pusat' }}
                </span>

                <span>
                    <i class="fa-solid fa-envelope"></i>
                    {{ $profil->email ?? 'Email sekolah belum tersedia' }}
                </span>
            </div>

            <div>
                <i class="fa-solid fa-phone"></i>
                {{ $profil->telepon ?? 'Telepon sekolah belum tersedia' }}
            </div>

        </div>
    </div>

    {{-- =========================
         NAVBAR
    ========================= --}}
    <header class="navbar">
        <div class="container nav-content">

            <a href="{{ route('landing') }}" class="brand">

                <img
                    src="{{ asset('img/LOGO SMK 1 NEGRI JAKARTA.jpg') }}"
                    alt="Logo Sekolah"
                >

                <div>
                    <div class="brand-name">
                        {{ $profil->nama_sekolah ?? 'SMK NEGERI 1 JAKARTA' }}
                    </div>

                    <div class="brand-tagline">
                        CERDAS · TERAMPIL · BERKARAKTER
                    </div>
                </div>

            </a>

            <nav>
                <ul class="nav-menu">

                    <li><a href="{{ route('landing') }}">Beranda</a></li>

                    <li><a href="#profil">Profil</a></li>

                    <li><a href="#guru">Guru</a></li>

                    <li><a href="#program">Program</a></li>

                    <li><a href="#ekskul">Ekstrakurikuler</a></li>

                    <li><a href="#berita">Berita</a></li>

                    <li><a href="#prestasi">Prestasi</a></li>

                    <li><a href="#galeri">Galeri</a></li>

                </ul>
            </nav>

        </div>
    </header>

    {{-- =========================
         HERO
    ========================= --}}
    <section class="hero" id="beranda">

        <div class="container">
            <div class="hero-content">

                <div class="hero-label">
                    SEKOLAH MENENGAH KEJURUAN
                </div>

                <h1>
                    Selamat Datang di
                    <span>
                        {{ $profil->nama_sekolah ?? 'SMK NEGERI 1 JAKARTA' }}
                    </span>
                </h1>

                <p>
                    Mencetak generasi profesional, inovatif,
                    berkarakter, dan siap bersaing di dunia kerja
                    melalui pendidikan berkualitas.
                </p>

               
            </div>
        </div>

    </section>

    {{-- =========================
         STATISTIK
    ========================= --}}
    <section class="stats">
        <div class="container">

            <div class="stats-box">

                <div class="stat">
                    <div class="stat-number">
                        {{ number_format($jumlahSiswa ?? 0) }}
                    </div>
                    <div class="stat-title">Siswa Aktif</div>
                </div>

                <div class="stat">
                    <div class="stat-number">
                        {{ number_format($jumlahGuru ?? 0) }}
                    </div>
                    <div class="stat-title">Guru</div>
                </div>

                <div class="stat">
                    <div class="stat-number">
                        {{ $prestasis->count() }}
                    </div>
                    <div class="stat-title">Prestasi</div>
                </div>

                <div class="stat">
                    <div class="stat-number">
                        {{ $profil->tahun_berdiri ?? '-' }}
                    </div>
                    <div class="stat-title">Tahun Berdiri</div>
                </div>

            </div>
        </div>
    </section>

    {{-- =========================
         SAMBUTAN KEPALA SEKOLAH
    ========================= --}}
    <section class="section principal">

        <div class="container">
            <div class="principal-grid">

                <div>
                    <img
                        src="{{ asset('img/KEPALA SEKOLAH.png') }}"
                        alt="Kepala Sekolah"
                        loading="lazy"
                    >
                </div>

                <div>

                    <div class="section-label">
                        Sambutan Kepala Sekolah
                    </div>

                    <h2>
                        Selamat Datang di
                        {{ $profil->nama_sekolah ?? 'SMK NEGERI 1 JAKARTA' }}
                    </h2>

                    <p>
                        Assalamu'alaikum Warahmatullahi Wabarakatuh.
                    </p>

                    <p>
                        Selamat datang di website resmi
                        {{ $profil->nama_sekolah ?? 'sekolah kami' }}.
                        Website ini menjadi media informasi dan komunikasi
                        antara sekolah, siswa, orang tua, dunia industri,
                        dan masyarakat.
                    </p>

                    <p>
                        Kami berkomitmen memberikan pendidikan yang mampu
                        mengembangkan kompetensi, karakter, kreativitas,
                        dan kemandirian peserta didik.
                    </p>

                    <div class="principal-name">
                        {{ $profil->kepala_sekolah ?? 'Kepala Sekolah' }}
                    </div>

                    <small>Kepala Sekolah</small>

                </div>

            </div>
        </div>

    </section>



{{-- =========================
     PROFIL SEKOLAH
========================= --}}

<section class="section section-light" id="profil">

    <div class="container">

        {{-- FOTO SEKOLAH --}}

        <div class="about-wrapper">

            <div class="about-image">

                @if (!empty($profil?->foto))
                    <img
                        src="{{ asset('storage/' . $profil->foto) }}"
                        alt="Foto {{ $profil?->nama_sekolah ?? 'Sekolah' }}"
                        loading="lazy"
                    >
                @else
                    <img
                        src="{{ asset('images/sekolah.jpg') }}"
                        alt="Foto Sekolah"
                        loading="lazy"
                    >
                @endif

            </div>

        </div>

        {{-- SEJARAH SEKOLAH --}}

        @if (filled($profil?->sejarah))

            <div class="about-history">

                <span class="section-subtitle">
                    TENTANG SEKOLAH
                </span>

                <h2>Sejarah Sekolah</h2>

                <p>{{ $profil->sejarah }}</p>

            </div>

        @else

            <div class="about-history">

                <span class="section-subtitle">
                    TENTANG SEKOLAH
                </span>

                <h2>Sejarah Sekolah</h2>

                <p>
                    Sejarah sekolah belum ditambahkan.
                </p>

            </div>

        @endif

        {{-- TOMBOL MENUJU PROFIL LENGKAP --}}

        <div class="about-more">

            <a href="{{ route('profil') }}" class="about-detail">
                <i class="fa-solid fa-school"></i>
                &nbsp; Lihat Profil Sekolah Lengkap
            </a>

        </div>

    </div>

</section>



    {{-- =========================
         GURU
    ========================= --}}
    <section class="section guru-section" id="guru">

        <div class="container">

            <div class="section-header">
                <div class="section-label">Tenaga Pendidik</div>
                <h2 class="section-title">Guru Kami</h2>

                <p class="section-description">
                    Kenali tenaga pendidik
                    {{ $profil->nama_sekolah ?? 'sekolah kami' }}
                    yang berkomitmen memberikan pendidikan terbaik.
                </p>
            </div>

            <div class="guru-grid">

                @forelse($gurus as $guru)

                    <div class="guru-card">

                        @if($guru->foto && file_exists(storage_path('app/public/' . $guru->foto)))
                            <img
                                src="{{ asset('storage/' . $guru->foto) }}"
                                alt="{{ $guru->nama_guru }}"
                                class="foto-guru"
                                loading="lazy"
                            >
                        @else
                            <div class="guru-icon">
                                <i class="fa-solid fa-user-tie"></i>
                            </div>
                        @endif

                        <h3>{{ $guru->nama_guru }}</h3>

                        <p>
                            {{ $guru->mata_pelajaran ?: 'Mata pelajaran belum diisi' }}
                        </p>

                        <span class="guru-jabatan">
                            {{ $guru->jabatan ?: 'Guru' }}
                        </span>

                        <a
                            href="{{ route('guru.detail', $guru->encrypted_id) }}"
                            class="guru-link"
                        >
                            Lihat Detail
                            
                        </a>

                    </div>

                @empty

                    <div class="guru-empty">
                        Belum ada data guru yang tersedia.
                    </div>

                @endforelse

            </div>
        </div>
    </section>

    {{-- =========================
         PROGRAM KEAHLIAN
    ========================= --}}
    <section class="section" id="program">

        <div class="container">

            <div class="section-header">
                <div class="section-label">Pendidikan</div>
                <h2 class="section-title">Program Keahlian</h2>

                <p class="section-description">
                    Pilihan kompetensi keahlian yang dirancang sesuai
                    perkembangan teknologi dan kebutuhan industri.
                </p>
            </div>

            <div class="program-grid">

                @forelse($programs as $program)

                    <div class="program-card">

                        <div class="program-image">

                            @if(!empty($program->foto))
                                <img
                                    src="{{ asset('storage/' . $program->foto) }}"
                                    alt="{{ $program->judul }}"
                                    loading="lazy"
                                >
                            @else
                                <i class="fa-solid fa-laptop-code"></i>
                            @endif

                        </div>

                        <div class="program-body">

                            <h3>{{ $program->judul }}</h3>

                            <p>
                                {{ \Illuminate\Support\Str::limit($program->deskripsi ?? '', 120) }}
                            </p>

                            <a
                                href="{{ route('program.detail', $program->encrypted_id) }}"
                                class="program-link"
                            >
                                Lihat Detail 
                               
                            </a>

                        </div>

                    </div>

                @empty

                    <div class="empty-message">
                        Belum ada program keahlian yang tersedia.
                    </div>

                @endforelse

            </div>

        </div>
    </section>

    {{-- =========================
         EKSTRAKURIKULER
    ========================= --}}
    <section class="section section-light" id="ekskul">

        <div class="container">

            <div class="section-header">
                <div class="section-label">Kegiatan Siswa</div>
                <h2 class="section-title">Ekstrakurikuler</h2>

                <p class="section-description">
                    Kegiatan untuk mengembangkan minat, bakat,
                    kreativitas, dan kemampuan bekerja sama.
                </p>
            </div>

            <div class="ekskul-grid">

                @forelse($ekskuls as $ekskul)

                    <div class="ekskul-card">

                        @if($ekskul->gambar && file_exists(storage_path('app/public/' . $ekskul->gambar)))
                            <img
                                src="{{ asset('storage/' . $ekskul->gambar) }}"
                                alt="{{ $ekskul->nama_ekskul }}"
                                class="foto-ekskul"
                                loading="lazy"
                            >
                        @else
                            <div class="ekskul-icon">
                                <i class="fa-solid fa-star"></i>
                            </div>
                        @endif

                        <h3>{{ $ekskul->nama_ekskul }}</h3>

                        <p>
                            {{ \Illuminate\Support\Str::limit($ekskul->deskripsi ?? '', 100) }}
                        </p>

                        <a
                            href="{{ route('ekstrakurikuler.detail', ['id' => $ekskul->encrypted_id]) }}"
                            class="ekskul-link"
                        >
                            Lihat Detail
                           
                        </a>

                    </div>

                @empty

                    <div class="empty-message">
                        Belum ada data ekstrakurikuler.
                    </div>

                @endforelse

            </div>

        </div>
    </section>

    {{-- =========================
         BERITA
    ========================= --}}
    <section class="section" id="berita">

        <div class="container">

            <div class="section-header">
                <div class="section-label">Informasi</div>
                <h2 class="section-title">Berita Terbaru</h2>

                <p class="section-description">
                    Informasi dan kegiatan terbaru dari
                    {{ $profil->nama_sekolah ?? 'sekolah kami' }}.
                </p>
            </div>

            <div class="news-grid">

                @forelse($beritas as $berita)

                    <div class="news-card">

                        <a href="{{ url('/berita-detail/' . $berita->slug) }}">

                            @if(!empty($berita->gambar))
                                <img
                                    src="{{ asset('storage/' . $berita->gambar) }}"
                                    class="news-image"
                                    alt="{{ $berita->judul }}"
                                    loading="lazy"
                                >
                            @else
                                <img
                                    src="{{ asset('img/school_library.png') }}"
                                    class="news-image"
                                    alt="Berita sekolah"
                                    loading="lazy"
                                >
                            @endif

                        </a>

                        <div class="news-body">

                            <div class="news-date">
                                @if($berita->tanggal)
                                    {{ \Carbon\Carbon::parse($berita->tanggal)->translatedFormat('d F Y') }}
                                @endif
                            </div>

                            <h3>{{ $berita->judul }}</h3>

                            <p>
                                {{ \Illuminate\Support\Str::limit(strip_tags($berita->isi ?? ''), 120) }}
                            </p>

                            <a
                                href="{{ url('/berita-detail/' . $berita->slug) }}"
                                class="program-link"
                            >
                                Lihat Detail
                           
                               
                            </a>

                        </div>
                    </div>

                @empty

                    <div class="empty-message">
                        Belum ada berita sekolah.
                    </div>

                @endforelse

            </div>
        </div>
    </section>

    {{-- =========================
         PRESTASI
    ========================= --}}
    <section class="section prestasi-section" id="prestasi">

        <div class="container">

            <div class="section-header">
                <div class="section-label">Pencapaian</div>
                <h2 class="section-title">Prestasi Sekolah</h2>

                <p class="section-description">
                    Prestasi yang telah diraih oleh siswa dan sekolah.
                </p>
            </div>

            <div class="prestasi-grid">

                @forelse($prestasis as $prestasi)

                    <a
                        href="{{ route('prestasi.detail', $prestasi->encrypted_id) }}"
                        class="prestasi-card"
                        title="Lihat detail {{ $prestasi->judul }}"
                    >

                        <div class="prestasi-image">

                            @if(!empty($prestasi->foto))

                                @if(\Illuminate\Support\Str::startsWith($prestasi->foto, 'prestasi/'))
                                    <img
                                        src="{{ asset('storage/' . $prestasi->foto) }}"
                                        alt="{{ $prestasi->judul }}"
                                        loading="lazy"
                                    >
                                @else
                                    <img
                                        src="{{ asset('uploads/prestasi/' . $prestasi->foto) }}"
                                        alt="{{ $prestasi->judul }}"
                                        loading="lazy"
                                    >
                                @endif

                            @else

                                <div class="prestasi-no-image">
                                    <i class="fa-solid fa-trophy"></i>
                                </div>

                            @endif

                        </div>

                        <div class="prestasi-content">

                            <h3>{{ $prestasi->judul }}</h3>

                            <div class="prestasi-badges">
                                @if(!empty($prestasi->tahun))
                                    <span class="prestasi-badge tahun">
                                        {{ $prestasi->tahun }}
                                    </span>
                                @endif
                            </div>

                            <p>
                                {{ \Illuminate\Support\Str::limit($prestasi->deskripsi ?? 'Informasi prestasi belum tersedia.', 150) }}
                            </p>

                            <span class="program-link">
                                Lihat Detail
                           
                                
                            </span>

                        </div>

                    </a>

                @empty

                    <div class="empty-message">
                        <i class="fa-solid fa-trophy"></i>
                        <p>Belum ada data prestasi.</p>
                    </div>

                @endforelse

            </div>

        </div>
    </section>

    {{-- =========================
         GALERI
    ========================= --}}
    <section class="section" id="galeri">

        <div class="container">

            <div class="section-header">
                <div class="section-label">Dokumentasi</div>
                <h2 class="section-title">Galeri Sekolah</h2>

                <p class="section-description">
                    Dokumentasi kegiatan dan lingkungan
                    {{ $profil->nama_sekolah ?? 'sekolah kami' }}.
                </p>
            </div>

            <div class="gallery-grid">

                @forelse($galeris as $galeri)

                    <a
                        href="{{ route('galeri.detail', $galeri->id) }}"
                        class="gallery-item"
                        title="Lihat detail {{ $galeri->judul }}"
                    >

                        @if(!empty($galeri->foto))
                            <img
                                src="{{ asset('storage/' . $galeri->foto) }}"
                                alt="{{ $galeri->judul }}"
                                loading="lazy"
                            >
                        @else
                            <img
                                src="{{ asset('img/school_library.png') }}"
                                alt="{{ $galeri->judul }}"
                                loading="lazy"
                            >
                        @endif

                        <div class="gallery-caption">
                            <strong>{{ $galeri->judul }}</strong>
                            <span class="gallery-detail-link">
                                Lihat Detail
                            </span>
                        </div>

                    </a>

                @empty

                    <div class="empty-message">
                        Belum ada dokumentasi galeri.
                    </div>

                @endforelse

            </div>
        </div>
    </section>

    {{-- =========================
         CTA
    ========================= --}}
    <section class="cta">

        <div class="container">

            <h2>
                Bersama {{ $profil->nama_sekolah ?? 'SMK NEGERI 1 JAKARTA' }}
                Menuju Masa Depan
            </h2>

            <p>
                Membangun generasi muda yang cerdas, terampil,
                berkarakter, dan siap menghadapi dunia kerja.
            </p>

        </div>

    </section>

    {{-- =========================
         FOOTER
    ========================= --}}
    <footer>

        <div class="container">

            <div class="footer-grid">

                <div>

                    <div class="footer-logo">

                        <img
                            src="{{ asset('img/LOGO SMK 1 NEGRI JAKARTA.jpg') }}"
                            alt="Logo Sekolah"
                            loading="lazy"
                        >

                        <span>
                            {{ $profil->nama_sekolah ?? 'SMK NEGERI 1 JAKARTA' }}
                        </span>

                    </div>

                    <p>
                        Sekolah menengah kejuruan yang berkomitmen
                        menghasilkan lulusan profesional, kompeten,
                        inovatif, dan berkarakter.
                    </p>

                </div>

                <div>

                    <h3>Menu</h3>

                    <ul class="footer-links">
                        <li><a href="#beranda">Beranda</a></li>
                        <li><a href="#profil">Profil Sekolah</a></li>
                        <li><a href="#guru">Guru</a></li>
                        <li><a href="#program">Program</a></li>
                        <li><a href="#ekskul">Ekstrakurikuler</a></li>
                        <li><a href="#berita">Berita</a></li>
                        <li><a href="#prestasi">Prestasi</a></li>
                        <li><a href="#galeri">Galeri</a></li>
                    </ul>

                </div>

                <div>

                    <h3>Informasi Sekolah</h3>

                    <ul class="footer-links">

                        @if(!empty($profil?->npsn))
                            <li>NPSN: {{ $profil->npsn }}</li>
                        @endif

                        @if(!empty($profil?->status_sekolah))
                            <li>Status: {{ $profil->status_sekolah }}</li>
                        @endif

                        @if(!empty($profil?->akreditasi))
                            <li>Akreditasi: {{ $profil->akreditasi }}</li>
                        @endif

                        @if(!empty($profil?->tahun_berdiri))
                            <li>Tahun berdiri: {{ $profil->tahun_berdiri }}</li>
                        @endif

                    </ul>

                </div>

                <div>

                    <h3>Hubungi Kami</h3>

                    <div class="contact-item">
                        <span class="contact-icon">
                            <i class="fa-solid fa-location-dot"></i>
                        </span>
                        <span>
                            {{ $profil->alamat ?? 'Alamat sekolah belum tersedia' }}
                        </span>
                    </div>

                    <div class="contact-item">
                        <span class="contact-icon">
                            <i class="fa-solid fa-phone"></i>
                        </span>
                        <span>
                            {{ $profil->telepon ?? 'Telepon belum tersedia' }}
                        </span>
                    </div>

                    <div class="contact-item">
                        <span class="contact-icon">
                            <i class="fa-solid fa-envelope"></i>
                        </span>
                        <span>
                            {{ $profil->email ?? 'Email belum tersedia' }}
                        </span>
                    </div>

                </div>

            </div>

            <div class="copyright">

                <span>
                    &copy; {{ date('Y') }}
                    {{ $profil->nama_sekolah ?? 'SMK NEGERI 1 JAKARTA' }}.
                    Semua Hak Dilindungi.
                </span>

                <span>
                    Cerdas · Terampil · Berkarakter
                </span>

            </div>

        </div>
    </footer>

</body>
</html>
