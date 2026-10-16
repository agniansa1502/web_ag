
@extends('landing.layouts.app')

@section('title', 'Visi & Misi - MTs Al Muawanah')

@section('content')

<style>
    :root {
        --alma-green: #087443;
        --alma-dark: #075c36;
        --alma-light: #eaf7ef;
        --alma-gold: #f4c542;
    }

    .vm-title {
        color: var(--alma-green);
    }

    .vm-label {
        display: inline-block;
        padding: 7px 16px;
        border-radius: 30px;
        background: var(--alma-light);
        color: var(--alma-green);
        font-size: 12px;
        font-weight: 700;
        letter-spacing: 1px;
    }

    .vm-line {
        width: 70px;
        height: 4px;
        border-radius: 10px;
        background: var(--alma-gold);
        margin: 15px auto;
    }

    .vm-card {
        background: #fff;
        border: 1px solid #e5eee7;
        border-radius: 18px;
        overflow: hidden;
        box-shadow: 0 6px 25px rgba(7, 92, 54, .07);
        transition: .25s ease;
    }

    .vm-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 12px 30px rgba(7, 92, 54, .12);
    }

    .vm-card-header {
        background: linear-gradient(135deg, #075c36, #0ca968);
        color: white;
        padding: 22px;
        text-align: center;
        border-bottom: 4px solid var(--alma-gold);
    }

    .vm-icon {
        width: 58px;
        height: 58px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 16px;
        background: var(--alma-light);
        color: var(--alma-green);
        font-size: 24px;
        margin-bottom: 15px;
    }

    .vm-number {
        width: 34px;
        height: 34px;
        min-width: 34px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        background: var(--alma-light);
        color: var(--alma-green);
        font-weight: 700;
    }

    .vm-mission-item {
        display: flex;
        align-items: flex-start;
        gap: 14px;
        padding: 18px 0;
        border-bottom: 1px solid #edf2ee;
    }

    .vm-mission-item:last-child {
        border-bottom: none;
        padding-bottom: 0;
    }

    .vm-banner {
        background: linear-gradient(135deg, #064e32, #0ca968);
        border-radius: 18px;
        padding: 35px 25px;
        color: white;
    }

    @media (max-width: 576px) {
        .vm-card-header {
            padding: 18px;
        }

        .vm-banner {
            padding: 28px 18px;
        }
    }
</style>

<div class="container py-5">

    {{-- HEADER --}}
    <div class="text-center mb-5">
        <span class="vm-label">ARAH DAN TUJUAN MADRASAH</span>

        <h2 class="fw-bold vm-title mt-3 mb-2">
            Visi & Misi MTs Al Muawanah
        </h2>

        <div class="vm-line"></div>

        <p class="text-muted col-md-8 mx-auto mb-0">
            Menjadi pedoman dalam menyelenggarakan pendidikan,
            membentuk karakter, dan mengembangkan potensi peserta didik.
        </p>
    </div>

    <div class="row justify-content-center g-4">

        {{-- VISI --}}
        <div class="col-lg-10">
            <div class="vm-card">
                <div class="vm-card-header">
                    <i class="fa-solid fa-eye fs-2 mb-3"></i>

                    <h5 class="fw-bold mb-0">VISI MADRASAH</h5>
                </div>

                <div class="card-body p-4 p-md-5 text-center">
                    <div class="vm-icon">
                        <i class="fa-solid fa-bullseye"></i>
                    </div>

                    <h4 class="fw-bold vm-title lh-base mb-4">
                        "Terwujudnya Peserta Didik yang Beriman, Bertakwa,
                        Berakhlak Mulia, Berprestasi, Mandiri, dan Berwawasan Lingkungan."
                    </h4>

                    <p class="text-muted small mb-0">
                        MTs Al Muawanah
                    </p>
                </div>
            </div>
        </div>

        {{-- MISI --}}
        <div class="col-lg-10">
            <div class="vm-card">
                <div class="vm-card-header">
                    <i class="fa-solid fa-list-check fs-2 mb-3"></i>

                    <h5 class="fw-bold mb-0">MISI MADRASAH</h5>
                </div>

                <div class="card-body p-4 p-md-5">

                    <div class="vm-mission-item">
                        <span class="vm-number">1</span>
                        <p class="text-secondary mb-0">
                            Menyelenggarakan proses pembelajaran yang efektif,
                            inovatif, dan berorientasi pada peningkatan prestasi
                            akademik siswa.
                        </p>
                    </div>

                    <div class="vm-mission-item">
                        <span class="vm-number">2</span>
                        <p class="text-secondary mb-0">
                            Membina karakter peserta didik melalui penanaman
                            nilai-nilai keagamaan, kedisiplinan, dan budi pekerti luhur.
                        </p>
                    </div>

                    <div class="vm-mission-item">
                        <span class="vm-number">3</span>
                        <p class="text-secondary mb-0">
                            Mengembangkan bakat dan minat siswa melalui kegiatan
                            ekstrakurikuler serta kompetisi akademik dan nonakademik.
                        </p>
                    </div>

                    <div class="vm-mission-item">
                        <span class="vm-number">4</span>
                        <p class="text-secondary mb-0">
                            Mewujudkan lingkungan madrasah yang bersih, hijau,
                            sehat, aman, dan kondusif untuk proses pembelajaran.
                        </p>
                    </div>

                    <div class="vm-mission-item">
                        <span class="vm-number">5</span>
                        <p class="text-secondary mb-0">
                            Meningkatkan pemanfaatan teknologi informasi dan
                            komunikasi dalam pengelolaan madrasah serta kegiatan
                            pembelajaran.
                        </p>
                    </div>

                </div>
            </div>
        </div>

    </div>

    {{-- NILAI MADRASAH --}}
    <div class="row g-4 mt-4">

        <div class="col-md-4">
            <div class="vm-card text-center p-4 h-100">
                <div class="vm-icon">
                    <i class="fa-solid fa-heart"></i>
                </div>

                <h5 class="fw-bold vm-title">Berakhlak Mulia</h5>

                <p class="text-secondary mb-0">
                    Membiasakan perilaku baik, kejujuran, kedisiplinan,
                    dan sikap saling menghormati.
                </p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="vm-card text-center p-4 h-100">
                <div class="vm-icon">
                    <i class="fa-solid fa-graduation-cap"></i>
                </div>

                <h5 class="fw-bold vm-title">Berprestasi</h5>

                <p class="text-secondary mb-0">
                    Mendukung pengembangan kemampuan akademik,
                    keterampilan, dan bakat setiap peserta didik.
                </p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="vm-card text-center p-4 h-100">
                <div class="vm-icon">
                    <i class="fa-solid fa-leaf"></i>
                </div>

                <h5 class="fw-bold vm-title">Peduli Lingkungan</h5>

                <p class="text-secondary mb-0">
                    Membangun kebiasaan menjaga kebersihan,
                    kesehatan, dan kenyamanan lingkungan madrasah.
                </p>
            </div>
        </div>

    </div>

    {{-- PENUTUP --}}
    <div class="vm-banner text-center mt-5">
        <i class="fa-solid fa-mosque fs-1 mb-3"
           style="color:#f4c542"></i>

        <h3 class="fw-bold mb-3">
            Bersama Mewujudkan Generasi Unggul
        </h3>

        <p class="mb-0">
            MTs Al Muawanah — membangun generasi berilmu,
            berkarakter, dan berakhlak mulia.
        </p>
    </div>

</div>

@endsection
