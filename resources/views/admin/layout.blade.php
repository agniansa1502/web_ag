<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - MTs Al Muawanah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        .sidebar { min-height: 100vh; background-color: #0d4633; color: white; width: 260px; flex-shrink: 0; }
        .sidebar a { color: #d1e7dd; text-decoration: none; padding: 10px 15px; display: block; border-radius: 6px; margin-bottom: 4px; }
        .sidebar a:hover, .sidebar a.active { background-color: #146c43; color: white; }
    </style>
</head>
<body>
<div class="d-flex">
    <!-- Sidebar -->
    <div class="sidebar p-3">
        <h5 class="fw-bold mb-4"><i class="bi bi-building"></i> MTs AL MUAWANAH</h5>
        <ul class="nav nav-pills flex-column mb-auto">
            <li>
                <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="bi bi-speedometer2 me-2"></i> Dashboard
                </a>
            </li>
            <li>
                <a href="{{ route('profil') }}" class="{{ request()->routeIs('profil') ? 'active' : '' }}">
                    <i class="bi bi-person-badge me-2"></i> Profil Sekolah
                </a>
            </li>
            <li>
                <a href="{{ route('admin.users.index') }}" class="{{ request()->routeIs('admin.users*') ? 'active' : '' }}">
                    <i class="bi bi-people me-2"></i> Data User
                </a>
            </li>
            <li>
                <a href="{{ route('admin.guru.index') }}" class="{{ request()->routeIs('admin.guru*') ? 'active' : '' }}">
                    <i class="bi bi-mortarboard me-2"></i> Data Guru
                </a>
            </li>
            <li>
                <a href="{{ route('admin.siswa.index') }}" class="{{ request()->routeIs('admin.siswa*') ? 'active' : '' }}">
                    <i class="bi bi-people-fill me-2"></i> Data Siswa
                </a>
            </li>
            <li>
                <a href="{{ route('admin.galeri.index') }}" class="{{ request()->routeIs('admin.galeri*') ? 'active' : '' }}">
                    <i class="bi bi-images me-2"></i> Galeri
                </a>
            </li>
            <li>
                <a href="{{ route('admin.ekstrakulikuler.index') }}" class="{{ request()->routeIs('admin.ekstrakulikuler*') ? 'active' : '' }}">
                    <i class="bi bi-trophy me-2"></i> Ekstrakulikuler
                </a>
            </li>
            <li>
                <a href="{{ route('admin.berita.index') }}" class="{{ request()->routeIs('admin.berita*') ? 'active' : '' }}">
                    <i class="bi bi-newspaper me-2"></i> Berita & Pengumuman
                </a>
            </li>
        </ul>
        <hr>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger w-100"><i class="bi bi-box-arrow-right me-2"></i> Logout</button>
        </form>
    </div>

    <!-- Main Content -->
    <div class="flex-grow-1 p-4 bg-light" style="min-height: 100vh;">
        @yield('content')
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>