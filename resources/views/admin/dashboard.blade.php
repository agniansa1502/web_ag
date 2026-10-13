<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Sistem Informasi Profil Sekolah & Akademik">
  <title>Dashboard Admin | MTs Al-Muawanah</title>

  <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-icons/bootstrap-icons.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

  <!-- Custom Style Warna Hijau -->
  <style>
    :root {
      --bs-primary: #198754;
      --bs-primary-rgb: 25, 135, 84;
    }
    .brand-icon, .nav-link.active, .page-icon {
      background-color: #198754 !important;
      color: #ffffff !important;
    }
    .nav-link.active {
      border-left: 4px solid #0f5132 !important;
    }
    .btn-primary {
      background-color: #198754 !important;
      border-color: #198754 !important;
    }
    .btn-primary:hover {
      background-color: #146c43 !important;
      border-color: #13653f !important;
    }
    .text-success {
      color: #198754 !important;
    }
    .bg-primary {
      background-color: #198754 !important;
    }
    .metric-primary {
      border-top: 4px solid #198754 !important;
    }
    .brand-title {
      color: #0f5132 !important;
      font-weight: bold;
    }
  </style>
</head>

<body>
  <div class="admin-shell">
    <div class="sidebar-backdrop" data-sidebar-close></div>

    <aside class="admin-sidebar" id="adminSidebar" aria-label="Main navigation">
      <div class="sidebar-header">
        <a class="brand-mark" href="{{ route('admin.dashboard') }}" aria-label="Dashboard">
          <span class="brand-icon"><i class="bi bi-building-check" aria-hidden="true"></i></span>
          <span class="brand-copy">
            <span class="brand-title">MTs Al-Muawanah</span>
            <span class="brand-subtitle">Admin Panel</span>
          </span>
        </a>
      </div>

      <!-- Menu Sidebar Terhubung ke Route Laravel -->
      <nav class="sidebar-nav">
        <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}" aria-current="page">
          <span class="nav-icon"><i class="bi bi-speedometer2" aria-hidden="true"></i></span>
          <span class="nav-text">Dashboard</span>
        </a>
        <a class="nav-link" href="#">
          <span class="nav-icon"><i class="bi bi-person-badge" aria-hidden="true"></i></span>
          <span class="nav-text">Profil Sekolah</span>
        </a>
        <a class="nav-link {{ request()->routeIs('admin.siswa*') ? 'active' : '' }}" href="{{ route('admin.siswa.index') }}">
          <span class="nav-icon"><i class="bi bi-people" aria-hidden="true"></i></span>
          <span class="nav-text">Data Siswa</span>
        </a>
        <a class="nav-link {{ request()->routeIs('admin.guru*') ? 'active' : '' }}" href="{{ route('admin.guru.index') }}">
          <span class="nav-icon"><i class="bi bi-mortarboard" aria-hidden="true"></i></span>
          <span class="nav-text">Data Guru</span>
        </a>
        <a class="nav-link {{ request()->routeIs('admin.berita*') ? 'active' : '' }}" href="{{ route('admin.berita.index') }}">
          <span class="nav-icon"><i class="bi bi-journal-text" aria-hidden="true"></i></span>
          <span class="nav-text">Berita</span>
        </a>
        <a class="nav-link {{ request()->routeIs('admin.ekstrakulikuler*') ? 'active' : '' }}" href="{{ route('admin.ekstrakulikuler.index') }}">
          <span class="nav-icon"><i class="bi bi-trophy" aria-hidden="true"></i></span>
          <span class="nav-text">Ekstrakurikuler</span>
        </a>
        <a class="nav-link {{ request()->routeIs('admin.galeri*') ? 'active' : '' }}" href="{{ route('admin.galeri.index') }}">
          <span class="nav-icon"><i class="bi bi-images" aria-hidden="true"></i></span>
          <span class="nav-text">Galeri</span>
        </a>
        <a class="nav-link {{ request()->routeIs('admin.users*') ? 'active' : '' }}" href="{{ route('admin.users.index') }}">
          <span class="nav-icon"><i class="bi bi-shield-lock" aria-hidden="true"></i></span>
          <span class="nav-text">Manajemen User</span>
        </a>
      </nav>

      <div class="sidebar-user">
        <img class="avatar-img avatar-md sidebar-user-avatar" src="{{ asset('assets/images/avatar/avatar.jpg') }}" alt="User">
        <strong>Admin / Operator</strong>
        <small>db_profil_sekolah</small>
      </div>

      <div class="sidebar-footer">
        <span class="status-dot bg-success"></span>
        <span class="sidebar-footer-text">Sistem Online</span>
      </div>
    </aside>

    <div class="admin-main">
      <nav class="navbar admin-navbar navbar-expand bg-white">
        <div class="container-fluid px-3 px-lg-4">
          <button class="sidebar-toggle" type="button" data-sidebar-toggle aria-controls="adminSidebar" aria-expanded="true" aria-label="Toggle sidebar">
            <span></span>
            <span></span>
            <span></span>
          </button>

          <form class="d-none d-md-flex ms-3 flex-grow-1" role="search">
            <input class="form-control search-input" type="search" placeholder="Cari data..." aria-label="Search">
          </form>

          <div class="navbar-actions ms-auto">
            <button class="icon-button theme-toggle" type="button" data-theme-toggle aria-label="Switch color theme" title="Switch color theme">
              <i class="bi bi-moon-stars" data-theme-icon aria-hidden="true"></i>
            </button>
            <div class="dropdown">
              <button class="profile-button dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <img class="avatar-img avatar-sm" src="{{ asset('assets/images/avatar/avatar.jpg') }}" alt="User">
                <span class="profile-name d-none d-sm-inline">Administrator</span>
              </button>
              <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="#">Profil Akun</a></li>
                <li><hr class="dropdown-divider"></li>
                <li>
                  <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="dropdown-item text-danger">Keluar</button>
                  </form>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </nav>

      <main class="dashboard-content">
        <div class="container-fluid px-3 px-lg-4 py-4">
          <div class="page-heading">
            <div class="page-heading-copy">
              <span class="page-icon"><i class="bi bi-speedometer2" aria-hidden="true"></i></span>
              <div>
                <p class="eyebrow mb-1">Dashboard Utama</p>
                <h1 class="h3 mb-1">MTs Al-Muawanah</h1>
                <p class="text-muted mb-0">Kelola data profil sekolah, siswa, guru, berita, galeri, dan ekstrakurikuler.</p>
              </div>
            </div>
          </div>

          <!-- Statistik Mengacu pada tabel database: siswa, guru, berita, ekstrakurikuler -->
          <section class="row g-3 mt-1" aria-label="Dashboard metrics">
            <div class="col-12 col-sm-6 col-xl-3">
              <article class="metric-card metric-primary">
                <div class="metric-top">
                  <span class="metric-label">Total Siswa</span>
                  <span class="metric-icon"><i class="bi bi-people" aria-hidden="true"></i></span>
                </div>
                <div class="metric-value">128</div>
                <div class="metric-meta">
                  <span class="text-success">Tabel siswa</span>
                  <span>(nisn, nama_siswa, dll)</span>
                </div>
              </article>
            </div>

            <div class="col-12 col-sm-6 col-xl-3">
              <article class="metric-card metric-success">
                <div class="metric-top">
                  <span class="metric-label">Total Guru</span>
                  <span class="metric-icon"><i class="bi bi-mortarboard" aria-hidden="true"></i></span>
                </div>
                <div class="metric-value">15</div>
                <div class="metric-meta">
                  <span class="text-success">Tabel guru</span>
                  <span>(nip, mapel, dll)</span>
                </div>
              </article>
            </div>

            <div class="col-12 col-sm-6 col-xl-3">
              <article class="metric-card metric-warning">
                <div class="metric-top">
                  <span class="metric-label">Berita & Informasi</span>
                  <span class="metric-icon"><i class="bi bi-journal-text" aria-hidden="true"></i></span>
                </div>
                <div class="metric-value">24</div>
                <div class="metric-meta">
                  <span class="text-success">Tabel berita</span>
                  <span>(judul, isi, tanggal)</span>
                </div>
              </article>
            </div>

            <div class="col-12 col-sm-6 col-xl-3">
              <article class="metric-card metric-danger">
                <div class="metric-top">
                  <span class="metric-label">Ekstrakurikuler</span>
                  <span class="metric-icon"><i class="bi bi-trophy" aria-hidden="true"></i></span>
                </div>
                <div class="metric-value">8</div>
                <div class="metric-meta">
                  <span class="text-success">Tabel ekstrakurikuler</span>
                  <span>(pembina, jadwal)</span>
                </div>
              </article>
            </div>
          </section>

          <!-- Tabel Data Siswa Sesuai Kolom Database (nisn, nama_siswa, jenis_kelamin, tahun_masuk) -->
          <section class="panel mt-3">
            <div class="panel-header">
              <div>
                <h2 class="h5 mb-1 section-title"><i class="bi bi-people" aria-hidden="true"></i><span>Data Siswa (Tabel: siswa)</span></h2>
                <p class="text-muted mb-0">Menampilkan data berdasarkan kolom database.</p>
              </div>
              <a class="btn btn-outline-secondary btn-sm" href="{{ route('admin.siswa.index') }}">Kelola Siswa</a>
            </div>
            <div class="table-responsive">
              <table class="table align-middle mb-0">
                <thead>
                  <tr>
                    <th scope="col">ID Siswa</th>
                    <th scope="col">NISN</th>
                    <th scope="col">Nama Siswa</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">Tahun Masuk</th>
                    <th scope="col" class="text-end">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td>0081234561</td>
                    <td><span class="fw-semibold">Ahmad Fauzi</span></td>
                    <td>Laki-Laki</td>
                    <td>2025</td>
                    <td class="text-end"><a class="btn btn-light btn-sm" href="{{ route('admin.siswa.index') }}">Detail</a></td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>0081234562</td>
                    <td><span class="fw-semibold">Siti Nurhaliza</span></td>
                    <td>Perempuan</td>
                    <td>2025</td>
                    <td class="text-end"><a class="btn btn-light btn-sm" href="{{ route('admin.siswa.index') }}">Detail</a></td>
                  </tr>
                  <tr>
                    <td>3</td>
                    <td>0081234563</td>
                    <td><span class="fw-semibold">Muhammad Rizky</span></td>
                    <td>Laki-Laki</td>
                    <td>2026</td>
                    <td class="text-end"><a class="btn btn-light btn-sm" href="{{ route('admin.siswa.index') }}">Detail</a></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </section>
        </div>
      </main>

      <footer class="admin-footer">
        <div class="container-fluid px-3 px-lg-4">
          <span>&copy; 2026 <strong>MTs Al-Muawanah</strong> — Database: db_profil_sekolah</span>
          <span>Sistem Informasi Profil Sekolah</span>
        </div>
      </footer>
    </div>
  </div>

  <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/js/main.js') }}"></script>
</body>
</html>