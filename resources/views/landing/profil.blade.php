
@extends('landing.layouts.app')

@section('title', 'Profil Sekolah - MTs Al Muawanah')

@section('content')

<style>
    :root {
        --alma-green: #087443;
        --alma-dark: #075c36;
        --alma-light: #eaf7ef;
        --alma-gold: #f4c542;
    }

    .profil-title {
        color: var(--alma-green);
    }

    .profil-label {
        display: inline-block;
        padding: 7px 16px;
        border-radius: 30px;
        background: var(--alma-light);
        color: var(--alma-green);
        font-size: 12px;
        font-weight: 700;
        letter-spacing: 1px;
    }

    .profil-line {
        width: 70px;
        height: 4px;
        border-radius: 10px;
        background: var(--alma-gold);
        margin: 15px auto;
    }

    .profil-image {
        width: 100%;
        height: 300px;
        object-fit: cover;
        border-radius: 16px;
    }

    .profil-card {
        background: #fff;
        border: 1px solid #e6eee8;
        border-radius: 16px;
        padding: 28px;
        height: 100%;
        box-shadow: 0 5px 20px rgba(7, 92, 54, .06);
        transition: .25s;
    }

    .profil-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 12px 28px rgba(7, 92, 54, .12);
    }

    .profil-icon {
        display: inline-flex;
        width: 48px;
        height: 48px;
        align-items: center;
        justify-content: center;
        border-radius: 13px;
        background: var(--alma-light);
        color: var(--alma-green);
        font-size: 21px;
        margin-bottom: 16px;
    }

    .profil-misi li {
        margin-bottom: 15px;
        padding-left: 5px;
    }

    .profil-misi li::marker {
        color: var(--alma-green);
        font-weight: bold;
    }

    .profil-banner {
        background: linear-gradient(135deg, #064e32, #0ca968);
        border-radius: 18px;
        color: white;
        padding: 35px;
    }

    @media (max-width: 576px) {
        .profil-image {
            height: 230px;
        }

        .profil-card {
            padding: 22px;
        }

        .profil-banner {
            padding: 25px 20px;
        }
    }
</style>

<div class="container py-5">

    {{-- JUDUL --}}
    <div class="text-center mb-5">
        <span class="profil-label">PROFIL MADRASAH</span>

        <h2 class="fw-bold profil-title mt-3 mb-2">
            Profil MTs Al Muawanah
        </h2>

        <div class="profil-line"></div>

        <p class="text-muted col-md-8 mx-auto mb-0">
            Mengenal lebih dekat identitas, visi, misi, dan komitmen
            MTs Al Muawanah dalam membangun generasi berakhlak mulia.
        </p>
    </div>

    {{-- GAMBAR DAN DESKRIPSI --}}
    <div class="row align-items-center g-4 mb-5">

        <div class="col-md-5">
            <div class="p-2 bg-white rounded-4 shadow-sm">
                <img
                    src="{{ asset('assets/images/smp.jpg') }}"
                    class="profil-image"
                    alt="MTs Al Muawanah"
                    onerror="this.onerror=null;this.src='{{ asset('assets/images/sekolah.webp') }}';"
                >
            </div>
        </div>

        <div class="col-md-7">
            <span class="profil-label mb-3">TENTANG KAMI</span>

            <h3 class="fw-bold profil-title mb-3">
                Mencetak Generasi Berilmu dan Berakhlak Mulia
            </h3>

            <p class="text-secondary">
                MTs Al Muawanah merupakan lembaga pendidikan yang berkomitmen
                mendukung perkembangan peserta didik melalui pendidikan,
                pembentukan karakter, serta penanaman nilai-nilai keislaman.
            </p>

            <p class="text-secondary mb-4">
                Kami berupaya menciptakan lingkungan belajar yang nyaman,
                kondusif, dan mendukung pengembangan potensi akademik maupun
                nonakademik agar peserta didik tumbuh menjadi generasi yang
                mandiri, berprestasi, dan bertanggung jawab.
            </p>

            <div class="d-flex align-items-center gap-3">
                <div class="profil-icon mb-0">
                    <i class="fa-solid fa-book-open"></i>
                </div>

                <div>
                    <h6 class="fw-bold profil-title mb-1">
                        Pendidikan Berkualitas
                    </h6>
                    <p class="text-muted small mb-0">
                        Belajar, bertumbuh, dan meraih prestasi bersama.
                    </p>
                </div>
            </div>
        </div>

    </div>

    {{-- VISI MISI --}}
    <div class="text-center mb-4">
        <span class="profil-label">ARAH DAN TUJUAN</span>
        <h3 class="fw-bold profil-title mt-3">Visi dan Misi Madrasah</h3>
        <p class="text-muted">
            Landasan dalam melaksanakan pendidikan dan membentuk karakter siswa.
        </p>
    </div>

    <div class="row g-4 mb-5">

        {{-- VISI --}}
        <div class="col-md-5">
            <div class="profil-card">
                <div class="profil-icon">
                    <i class="fa-solid fa-eye"></i>
                </div>

                <h4 class="fw-bold profil-title mb-3">
                    Visi Madrasah
                </h4>

                <p class="fst-italic text-secondary mb-0">
                    "Terwujudnya peserta didik yang beriman, bertakwa,
                    berakhlak mulia, berprestasi, mandiri, dan berwawasan
                    lingkungan."
                </p>
            </div>
        </div>

        {{-- MISI --}}
        <div class="col-md-7">
            <div class="profil-card">
                <div class="profil-icon">
                    <i class="fa-solid fa-list-check"></i>
                </div>

                <h4 class="fw-bold profil-title mb-3">
                    Misi Madrasah
                </h4>

                <ol class="profil-misi text-secondary mb-0 ps-3">
                    <li>
                        Menumbuhkan keimanan dan ketakwaan kepada Allah SWT
                        melalui kegiatan keagamaan dan pembiasaan akhlak mulia.
                    </li>

                    <li>
                        Melaksanakan pembelajaran yang efektif, kreatif,
                        inovatif, dan berorientasi pada pengembangan potensi siswa.
                    </li>

                    <li>
                        Meningkatkan prestasi akademik dan nonakademik melalui
                        kegiatan pembelajaran dan ekstrakurikuler.
                    </li>

                    <li>
                        Membentuk peserta didik yang disiplin, mandiri,
                        bertanggung jawab, dan menghormati sesama.
                    </li>

                    <li>
                        Mewujudkan lingkungan madrasah yang bersih, aman,
                        nyaman, sehat, dan mendukung proses pembelajaran.
                    </li>
                </ol>
            </div>
        </div>

    </div>

    {{-- NILAI MADRASAH --}}
    <div class="row g-4 mb-5">

        <div class="col-sm-6 col-lg-4">
            <div class="profil-card text-center">
                <div class="profil-icon">
                    <i class="fa-solid fa-heart"></i>
                </div>
                <h5 class="fw-bold profil-title">Akhlak Mulia</h5>
                <p class="text-secondary mb-0">
                    Menanamkan sopan santun, kepedulian, dan perilaku terpuji
                    dalam kehidupan sehari-hari.
                </p>
            </div>
        </div>

        <div class="col-sm-6 col-lg-4">
            <div class="profil-card text-center">
                <div class="profil-icon">
                    <i class="fa-solid fa-graduation-cap"></i>
                </div>
                <h5 class="fw-bold profil-title">Berprestasi</h5>
                <p class="text-secondary mb-0">
                    Mendorong siswa untuk terus belajar, berkarya, dan
                    mengembangkan kemampuan diri.
                </p>
            </div>
        </div>

        <div class="col-sm-6 col-lg-4">
            <div class="profil-card text-center">
                <div class="profil-icon">
                    <i class="fa-solid fa-people-group"></i>
                </div>
                <h5 class="fw-bold profil-title">Kebersamaan</h5>
                <p class="text-secondary mb-0">
                    Membangun lingkungan pendidikan yang saling menghargai,
                    bekerja sama, dan mendukung satu sama lain.
                </p>
            </div>
        </div>

    </div>

    {{-- PENUTUP --}}
    <div class="profil-banner text-center">
        <i class="fa-solid fa-mosque fs-1 mb-3"
           style="color:var(--alma-gold, #f4c542)"></i>

        <h3 class="fw-bold mb-3">
            Bersama MTs Al Muawanah, Raih Masa Depan Gemilang
        </h3>

        <p class="mb-0">
            Membangun generasi yang berilmu, beriman, berkarakter,
            dan siap menghadapi masa depan.
        </p>
    </div>

</div>

@endsection
