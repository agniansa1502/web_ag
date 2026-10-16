<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'MTs Al Muawanah')</title>

    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendors/font-awesome/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendors/ti-icons/css/themify-icons.css') }}" rel="stylesheet">

    <style>
        :root {
            --primary-green: #087443;
            --secondary-green: #0ca968;
            --dark-green: #064e32;
            --gold: #f4c542;
            --light-green: #eaf7ef;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f8faf8;
        }

        .bg-school {
            background: linear-gradient(135deg, var(--dark-green), var(--primary-green));
        }

        .text-school {
            color: var(--primary-green);
        }

        .navbar {
            border-bottom: 3px solid var(--gold);
        }

        .navbar-brand {
            letter-spacing: .4px;
        }

        .navbar-brand img {
            background: white;
            border-radius: 50%;
            padding: 3px;
        }

        .navbar .nav-link {
            margin: 0 3px;
            padding: 9px 12px !important;
            border-radius: 7px;
            transition: all .25s ease;
        }

        .navbar .nav-link:hover,
        .navbar .nav-link.active {
            color: var(--gold) !important;
            background: rgba(255, 255, 255, .12);
        }

        .btn-school {
            background-color: var(--primary-green);
            color: white;
            border: 1px solid var(--primary-green);
            transition: all .25s ease;
        }

        .btn-school:hover {
            background-color: var(--dark-green);
            color: var(--gold);
        }

        .footer-link {
            color: rgba(255, 255, 255, .78);
            text-decoration: none;
            transition: all .2s ease;
        }

        .footer-link:hover {
            color: var(--gold);
            padding-left: 5px;
        }

        .social-btn {
            width: 36px;
            height: 36px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background-color: rgba(255, 255, 255, .15);
            color: #fff;
            text-decoration: none;
            transition: all .3s ease;
        }

        .social-btn:hover {
            background-color: var(--gold);
            color: var(--dark-green);
            transform: translateY(-3px);
        }

        .school-footer {
            border-top: 4px solid var(--gold);
        }

        .footer-heading {
            color: var(--gold);
            letter-spacing: .5px;
        }

        .footer-icon {
            color: var(--gold);
        }

        .text-gold {
            color: var(--gold);
        }

        @media (max-width: 991px) {
            .navbar .nav-link {
                margin: 3px 0;
            }

            .navbar-brand span {
                font-size: 14px;
            }
        }
    </style>

    @stack('styles')
</head>

<body class="d-flex flex-column min-vh-100">

    {{-- NAVBAR --}}
    <nav class="navbar navbar-expand-lg navbar-dark bg-school sticky-top shadow-sm py-3">
        <div class="container">

            <a class="navbar-brand fw-bold text-white d-flex align-items-center"
                href="{{ url('/') }}">

                <img src="{{ asset('assets/images/logo_alma.png') }}"
                    alt="Logo MTs Al Muawanah"
                    class="me-2"
                    style="height: 40px; width: 40px; object-fit: contain;">

                <span>MTs AL MUAWANAH</span>
            </a>

            <button class="navbar-toggler" type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav"
                aria-controls="navbarNav"
                aria-expanded="false"
                aria-label="Buka navigasi">

                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">

                <ul class="navbar-nav ms-auto fw-semibold">

                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('/') ? 'text-white fw-bold active' : 'text-white-50' }}"
                            href="{{ url('/') }}">
                            <i class="fa-solid fa-house me-1"></i>
                            Beranda
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('profil*', 'tentang*') ? 'text-white fw-bold active' : 'text-white-50' }}"
                            href="{{ url('/profil') }}">
                            Profil
                        </a>
                    </li>

                    
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('guru-staf*') ? 'text-white fw-bold active' : 'text-white-50' }}"
                            href="{{ route('landing.guru-staf') }}">
                            Guru
                        </a>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('ekstrakulikuler*', 'ekstrakurikuler*', 'ekstrakulikuler-sekolah*') ? 'text-white fw-bold active' : 'text-white-50' }}"
                            href="{{ url('/ekstrakulikuler-sekolah') }}">
                            Ekstrakurikuler
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('berita*', 'berita-sekolah*') ? 'text-white fw-bold active' : 'text-white-50' }}"
                            href="{{ url('/berita-sekolah') }}">
                            Berita
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('galeri*', 'galeri-sekolah*') ? 'text-white fw-bold active' : 'text-white-50' }}"
                            href="{{ route('landing.galeri') }}">
                            Galeri
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('login*') ? 'text-white fw-bold active' : 'text-white-50' }}"
                            href="{{ route('auth.login') }}">
                            <i class="fa-solid fa-right-to-bracket me-1"></i>
                            Login
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('ujikom*') || request()->is('nilai*') ? 'text-gold fw-bold active' : 'text-white-50' }}"
                            href="{{ route('landing.nilai') }}">
                            <i class="fa-solid fa-calculator me-1"></i>
                            Input Nilai
                        </a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

    {{-- KONTEN HALAMAN --}}
    <main class="flex-grow-1">
        @yield('content')
    </main>

    {{-- FOOTER --}}
    <footer class="bg-school text-white pt-5 pb-3 mt-auto school-footer">

        <div class="container">

            <div class="row g-4">

                {{-- IDENTITAS SEKOLAH --}}
                <div class="col-lg-4 col-md-6">

                    <div class="d-flex align-items-center mb-3">

                        <img src="{{ asset('assets/images/logo_alma.png') }}"
                            alt="Logo MTs Al Muawanah"
                            class="me-2"
                            style="height: 45px; width: 45px; object-fit: contain; background: white; border-radius: 50%; padding: 3px;">

                        <h5 class="fw-bold mb-0">MTs AL MUAWANAH</h5>
                    </div>

                    <p class="small text-white-50 mb-3" style="line-height: 1.8;">
                        Membentuk generasi Islami yang beriman, berilmu,
                        berakhlak mulia, mandiri, dan berprestasi.
                    </p>

                    <div class="d-flex gap-2">
                        <a href="{{ url('/') }}" class="social-btn" aria-label="Beranda">
                            <i class="fa-solid fa-house"></i>
                        </a>

                        <a href="{{ route('landing.galeri') }}" class="social-btn" aria-label="Galeri">
                            <i class="fa-solid fa-images"></i>
                        </a>

                        <a href="{{ route('auth.login') }}" class="social-btn" aria-label="Login">
                            <i class="fa-solid fa-user-lock"></i>
                        </a>
                    </div>

                </div>

                {{-- NAVIGASI --}}
                <div class="col-lg-2 col-md-6">

                    <h6 class="fw-bold text-uppercase mb-3 footer-heading">
                        Navigasi
                    </h6>

                    <ul class="list-unstyled small mb-0">

                        <li class="mb-2">
                            <a href="{{ url('/') }}" class="footer-link">
                                <i class="fa-solid fa-angle-right me-1 footer-icon"></i>
                                Beranda
                            </a>
                        </li>

                        <li class="mb-2">
                            <a href="{{ url('/profil') }}" class="footer-link">
                                <i class="fa-solid fa-angle-right me-1 footer-icon"></i>
                                Profil Sekolah
                            </a>
                        </li>

                        <li class="mb-2">
                            <a href="{{ url('/guru') }}" class="footer-link">
                                <i class="fa-solid fa-angle-right me-1 footer-icon"></i>
                                Data Guru
                            </a>
                        </li>

                        <li class="mb-2">
                            <a href="{{ url('/ektrakulikuler-sekolah') }}" class="footer-link">
                                <i class="fa-solid fa-angle-right me-1 footer-icon"></i>
                                Ekstrakurikuler
                            </a>
                        </li>

                        <li class="mb-2">
                            <a href="{{ url('/berita-sekolah') }}" class="footer-link">
                                <i class="fa-solid fa-angle-right me-1 footer-icon"></i>
                                Berita
                            </a>
                        </li>

                        <li class="mb-2">
                            <a href="{{ route('landing.galeri') }}" class="footer-link">
                                <i class="fa-solid fa-angle-right me-1 footer-icon"></i>
                                Galeri
                            </a>
                        </li>

                    </ul>
                </div>

                {{-- KONTAK --}}
                <div class="col-lg-3 col-md-6">

                    <h6 class="fw-bold text-uppercase mb-3 footer-heading">
                        Hubungi Kami
                    </h6>

                    <ul class="list-unstyled small text-white-50 mb-0">

                        <li class="mb-3 d-flex align-items-start">
                            <i class="fa-solid fa-location-dot me-2 mt-1 footer-icon"></i>
                            <span>
                                MTs Al Muawanah
                            </span>
                        </li>

                        <li class="mb-3 d-flex align-items-center">
                            <i class="fa-solid fa-phone me-2 footer-icon"></i>
                            <span>Informasi kontak sekolah</span>
                        </li>

                        <li class="d-flex align-items-center">
                            <i class="fa-solid fa-envelope me-2 footer-icon"></i>
                            <span>Informasi sekolah</span>
                        </li>

                    </ul>
                </div>

                {{-- JAM OPERASIONAL --}}
                <div class="col-lg-3 col-md-6">

                    <h6 class="fw-bold text-uppercase mb-3 footer-heading">
                        Jam Operasional
                    </h6>

                    <ul class="list-unstyled small text-white-50 mb-0">

                        <li class="mb-2">
                            <i class="fa-regular fa-clock me-2 footer-icon"></i>
                            <strong>Senin - Kamis:</strong>
                            07.00 - 15.00 WIB
                        </li>

                        <li class="mb-2">
                            <i class="fa-regular fa-clock me-2 footer-icon"></i>
                            <strong>Jumat:</strong>
                            07.00 - 11.30 WIB
                        </li>

                        <li>
                            <i class="fa-solid fa-calendar-xmark me-2 footer-icon"></i>
                            <strong>Sabtu - Minggu:</strong>
                            <span class="badge bg-danger">Tutup</span>
                        </li>

                    </ul>
                </div>

            </div>

            <hr class="border-white opacity-25 my-4">

            <div class="d-flex flex-column flex-sm-row justify-content-between align-items-center small text-white-50">

                <p class="mb-2 mb-sm-0 text-center text-sm-start">
                    &copy; {{ date('Y') }} MTs Al Muawanah.
                    All Rights Reserved.
                </p>

                <p class="mb-0 text-center text-sm-end">
                    <i class="fa-solid fa-school me-1 text-gold"></i>
                    Sistem Informasi Sekolah
                </p>

            </div>

        </div>
    </footer>

    <script src="{{ asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>

    @stack('scripts')

</body>
</html>
