<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>@yield('title', 'Admin - MTs Al Muawanah')</title>

    <link rel="stylesheet" href="{{ asset('assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets/images/logo2.png') }}">

    <style>
        :root {
            --alma-green: #087443;
            --alma-green-dark: #075c36;
            --alma-green-light: #0ca968;
            --alma-gold: #f4c542;
            --alma-bg: #f5f9f6;
        }

        body {
            background: var(--alma-bg);
        }

        .navbar.default-layout-navbar {
            background: linear-gradient(to right, var(--alma-green-dark), var(--alma-green-light)) !important;
            box-shadow: 0 3px 12px rgba(7, 92, 54, .15);
        }

        .navbar.default-layout-navbar .navbar-brand-wrapper {
            background: var(--alma-green-dark) !important;
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
            padding: 0 !important;
        }

        .navbar .navbar-brand-wrapper .navbar-brand.brand-logo {
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
            width: auto !important;
            margin: 0 !important;
            padding: 0 8px !important;
        }

        .brand-img-logo {
            width: 35px !important;
            height: 35px !important;
            object-fit: contain !important;
            margin-right: 8px !important;
        }

        .navbar-brand-text {
            color: #fff !important;
            font-weight: 800 !important;
            font-size: .9rem !important;
            white-space: nowrap !important;
            margin: 0 !important;
            letter-spacing: .3px;
        }

        .navbar-brand-mini img {
            width: 30px;
            height: 30px;
            object-fit: contain;
        }

        .navbar .nav-link,
        .navbar .nav-profile-text p {
            color: #fff !important;
        }

        .navbar .dropdown-menu {
            border: none;
            border-radius: 10px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, .12);
        }

        .sidebar {
            background: #fff !important;
        }

        .sidebar .nav .nav-item .nav-link {
            border-radius: 8px !important;
            margin: 3px 10px;
            transition: all .2s ease;
        }

        .sidebar .nav .nav-item .nav-link .menu-title {
            color: #45574b;
        }

        .sidebar .nav .nav-item .nav-link .menu-icon {
            color: var(--alma-green);
        }

        .sidebar .nav .nav-item .nav-link:hover {
            background: #edf8f0 !important;
            color: var(--alma-green) !important;
        }

        .sidebar .nav .nav-item.active > .nav-link {
            background: #e1f5e9 !important;
            color: var(--alma-green-dark) !important;
            border-left: 4px solid var(--alma-gold) !important;
            box-shadow: 0 4px 12px rgba(8, 116, 67, .08) !important;
            border-radius: 8px !important;
        }

        .sidebar .nav .nav-item.active > .nav-link .menu-title,
        .sidebar .nav .nav-item.active > .nav-link .menu-icon {
            color: var(--alma-green) !important;
            font-weight: 700 !important;
        }

        .sidebar .nav-profile {
            border-bottom: 1px solid #edf1ed;
        }

        .btn-gradient-primary,
        .bg-gradient-primary {
            background: linear-gradient(to right, var(--alma-green), var(--alma-green-light)) !important;
            border: none !important;
            color: #fff !important;
        }

        .btn-primary {
            background: var(--alma-green) !important;
            border-color: var(--alma-green) !important;
            color: #fff !important;
        }

        .btn-primary:hover {
            background: var(--alma-green-dark) !important;
            border-color: var(--alma-green-dark) !important;
        }

        .text-primary {
            color: var(--alma-green) !important;
        }

        .border-primary {
            border-color: var(--alma-green) !important;
        }

        .content-wrapper {
            background: var(--alma-bg) !important;
        }

        .page-title {
            color: var(--alma-green-dark);
            font-weight: 700;
        }

        .page-title-icon {
            background: linear-gradient(135deg, var(--alma-green), var(--alma-green-light)) !important;
            color: #fff !important;
            border-radius: 10px;
        }

        .card {
            border-radius: 12px;
        }

        .form-control:focus {
            border-color: var(--alma-green-light) !important;
            box-shadow: 0 0 0 .15rem rgba(12, 169, 104, .15) !important;
        }

        .placeholder-white::placeholder {
            color: rgba(255, 255, 255, .8) !important;
        }

        .footer {
            background: #fff !important;
            border-top: 2px solid var(--alma-gold) !important;
        }

        .sidebar-section-title {
            color: #8a988e;
            font-size: 11px;
            font-weight: 800;
            letter-spacing: 1px;
            padding: 18px 22px 5px;
            text-transform: uppercase;
        }

        @media (max-width: 480px) {
            .navbar-brand-text {
                font-size: .75rem !important;
            }

            .brand-img-logo {
                width: 28px !important;
                height: 28px !important;
            }
        }
    </style>

    @stack('styles')
</head>

<body>
    <div class="container-scroller">

        {{-- NAVBAR --}}
        <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="navbar-brand-wrapper d-flex align-items-center justify-content-center">

                <a class="navbar-brand brand-logo d-flex align-items-center justify-content-center text-decoration-none"
                   href="{{ route('dashboard') }}">

                    <img src="{{ asset('assets/images/logo2.png') }}"
                         alt="Logo MTs Al Muawanah"
                         class="brand-img-logo"
                         onerror="this.style.display='none'">

                    <span class="navbar-brand-text">MTs AL MUAWANAH</span>
                </a>

                <a class="navbar-brand brand-logo-mini text-decoration-none text-center"
                   href="{{ route('dashboard') }}">
                    <img src="{{ asset('assets/images/logo2.png') }}"
                         alt="Logo ALMA"
                         onerror="this.style.display='none'">
                </a>
            </div>

            <div class="navbar-menu-wrapper d-flex align-items-stretch justify-content-end">
                <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item nav-profile dropdown">
                        <a class="nav-link dropdown-toggle text-white"
                           id="profileDropdown"
                           href="#"
                           data-bs-toggle="dropdown"
                           aria-expanded="false">

                            <div class="nav-profile-img">
                                <img src="{{ asset('assets/images/user.avif') }}" alt="Foto pengguna">
                            </div>

                            <div class="nav-profile-text">
                                <p class="mb-1 text-white fw-bold">
                                    {{ Auth::user()?->username }}
                                </p>
                            </div>
                        </a>

                        <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                            <div class="dropdown-divider"></div>

                            <form action="{{ route('logout') }}" method="POST"
                                  class="m-0 p-0"
                                  onsubmit="return confirm('Apakah Anda yakin ingin keluar dari sistem?');">
                                @csrf

                                <button type="submit"
                                        class="dropdown-item text-danger border-0 bg-transparent w-100 text-start">
                                    <i class="mdi mdi-logout me-2 text-danger"></i>
                                    Logout
                                </button>
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>

        {{-- SIDEBAR DAN KONTEN --}}
        <div class="container-fluid page-body-wrapper">

            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">

                    {{-- PROFIL PENGGUNA --}}
                    <li class="nav-item nav-profile">
                        <a href="#" class="nav-link">
                            <div class="nav-profile-image">
                                <img src="{{ asset('assets/images/user.avif') }}" alt="Profil pengguna">
                            </div>

                            <div class="nav-profile-text d-flex flex-column">
                                <span class="font-weight-bold mb-1">
                                    {{ Auth::user()?->username }}
                                </span>

                                <span class="text-secondary text-small">
                                    {{ Auth::user()?->role ?? 'User' }}
                                </span>
                            </div>
                        </a>
                    </li>

                    {{-- MENU ADMIN --}}
                    <li class="nav-item {{ request()->is('dashboard') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('dashboard') }}">
                            <span class="menu-title">Dashboard</span>
                            <i class="mdi mdi-home menu-icon"></i>
                        </a>
                    </li>

                    <li class="nav-item {{ request()->is('profil-sekolah*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('/profil-sekolah') }}">
                            <span class="menu-title">Profil Sekolah</span>
                            <i class="mdi mdi-school menu-icon"></i>
                        </a>
                    </li>

                    <li class="nav-item {{ request()->is('siswa*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('/siswa') }}">
                            <span class="menu-title">Data Siswa</span>
                            <i class="mdi mdi-account-group menu-icon"></i>
                        </a>
                    </li>

                    {{-- DATA GURU ADMIN --}}
                    <li class="nav-item {{ request()->is('guru') || request()->is('guru/*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('/guru') }}">
                            <span class="menu-title">Data Guru</span>
                            <i class="mdi mdi-human-male-board menu-icon"></i>
                        </a>
                    </li>

                    {{-- EKSTRAKURIKULER ADMIN --}}
                    <li class="nav-item {{ request()->is('ekstrakulikuler') || request()->is('ekstrakulikuler/*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('/ekstrakulikuler') }}">
                            <span class="menu-title">Data Ekstrakurikuler</span>
                            <i class="mdi mdi-run menu-icon"></i>
                        </a>
                    </li>

                    <li class="nav-item {{ request()->is('berita*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('/berita') }}">
                            <span class="menu-title">Berita</span>
                            <i class="mdi mdi-newspaper menu-icon"></i>
                        </a>
                    </li>

                    <li class="nav-item {{ request()->is('galeri*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('/galeri') }}">
                            <span class="menu-title">Galeri</span>
                            <i class="mdi mdi-image-multiple menu-icon"></i>
                        </a>
                    </li>

                    @if(Auth::check() && Auth::user()->role === 'Admin')
                    <li class="nav-item {{ request()->is('user*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('/user') }}">
                            <span class="menu-title">Manajemen User</span>
                            <i class="mdi mdi-account-key menu-icon"></i>
                        </a>
                    </li>
                    @endif

                    <li class="nav-item {{ request()->is('nilai*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('landing.nilai') }}">
                            <span class="menu-title">Input Nilai</span>
                            <i class="mdi mdi-calculator menu-icon"></i>
                        </a>
                    </li>

                    {{-- MENU WEBSITE PUBLIK --}}
                    <li class="nav-item">
                        <div class="sidebar-section-title">Website Publik</div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('landing.index') }}" target="_blank">
                            <span class="menu-title">Lihat Website</span>
                            <i class="mdi mdi-open-in-new menu-icon"></i>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('landing.guru-staf') }}" target="_blank">
                            <span class="menu-title">Halaman Guru Publik</span>
                            <i class="mdi mdi-account-school menu-icon"></i>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('landing.ekskul') }}" target="_blank">
                            <span class="menu-title">Halaman Ekstrakurikuler Publik</span>
                            <i class="mdi mdi-run-fast menu-icon"></i>
                        </a>
                    </li>

                </ul>
            </nav>

            {{-- KONTEN UTAMA --}}
            <div class="main-panel">
                <div class="content-wrapper">
                    @yield('content')
                </div>

                {{-- FOOTER --}}
                <footer class="footer">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">
                            Copyright © {{ date('Y') }} MTs Al Muawanah. All rights reserved.
                        </span>

                        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">
                            Tasikmalaya, Jawa Barat
                            <i class="mdi mdi-heart" style="color: #087443;"></i>
                        </span>
                    </div>
                </footer>
            </div>

        </div>
    </div>

    {{-- JAVASCRIPT --}}
    <script src="{{ asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('assets/vendors/chart.js/chart.umd.js') }}"></script>
    <script src="{{ asset('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('assets/js/misc.js') }}"></script>
    <script src="{{ asset('assets/js/settings.js') }}"></script>
    <script src="{{ asset('assets/js/todolist.js') }}"></script>
    <script src="{{ asset('assets/js/dashboard.js') }}"></script>

    @stack('scripts')
</body>
</html>