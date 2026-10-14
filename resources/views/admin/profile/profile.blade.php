@extends('admin')

@section('content')

<style>
    /* =========================================
       HALAMAN PROFIL SEKOLAH
    ========================================= */
    .profile-page {
        width: 100%;
        min-height: 100vh;
        padding: 24px;
        background: #f4f7fb;
        color: #27364b;
        overflow-x: hidden;
    }

    .profile-page,
    .profile-page * {
        box-sizing: border-box;
    }

    /* HEADER */
    .profile-page .profile-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 20px;
        padding: 26px 28px;
        margin-bottom: 24px;
        color: #fff;
        background: linear-gradient(120deg, #173b75, #2876cf);
        border-radius: 12px;
        box-shadow: 0 5px 16px rgba(23, 59, 117, .12);
    }

    .profile-page .profile-header h3 {
        margin: 0 0 8px;
        font-size: 24px;
        font-weight: 700;
    }

    .profile-page .profile-header p {
        margin: 0;
        color: #e1edff;
        font-size: 14px;
    }

    .profile-page .section-label {
        display: block;
        margin-bottom: 8px;
        color: #cfe2ff;
        font-size: 11px;
        font-weight: 700;
        letter-spacing: 1px;
    }

    .profile-page .btn-edit {
        flex-shrink: 0;
        padding: 11px 17px;
        border: none;
        border-radius: 7px;
        background: #fff;
        color: #2467bd;
        font-weight: 600;
        text-decoration: none;
        transition: .2s;
    }

    .profile-page .btn-edit:hover {
        background: #eaf2ff;
        color: #173b75;
    }

    /* GRID UTAMA */
    .profile-page .profile-layout {
        display: grid;
        grid-template-columns: minmax(260px, 0.85fr) minmax(0, 1.8fr);
        gap: 22px;
        align-items: start;
    }

    .profile-page .profile-left,
    .profile-page .profile-right {
        display: flex;
        flex-direction: column;
        gap: 22px;
        min-width: 0;
    }

    /* KARTU */
    .profile-page .profile-card {
        width: 100%;
        min-width: 0;
        padding: 23px;
        background: #fff;
        border: 1px solid #e8edf4;
        border-radius: 12px;
        box-shadow: 0 3px 12px rgba(32, 55, 90, .04);
    }

    .profile-page .profile-card-title {
        display: flex;
        align-items: center;
        gap: 11px;
        margin-bottom: 20px;
        padding-bottom: 15px;
        border-bottom: 1px solid #edf1f6;
    }

    .profile-page .profile-card-title h5 {
        margin: 0;
        color: #263b59;
        font-size: 16px;
        font-weight: 700;
    }

    .profile-page .profile-card-title small {
        display: block;
        margin-top: 5px;
        color: #8490a1;
        font-size: 12px;
    }

    .profile-page .title-icon {
        display: flex;
        flex: 0 0 40px;
        align-items: center;
        justify-content: center;
        width: 40px;
        height: 40px;
        color: #2467bd;
        background: #eaf2ff;
        border-radius: 9px;
        font-size: 17px;
    }

    /* IDENTITAS SEKOLAH */
    .profile-page .school-logo-wrapper {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100%;
        min-height: 145px;
        padding: 10px;
        background: #f8faff;
        border: 1px solid #edf1f7;
        border-radius: 9px;
    }

    .profile-page .school-logo {
        display: block;
        width: 125px;
        height: 125px;
        max-width: 100%;
        object-fit: contain;
    }

    .profile-page .school-name {
        margin-top: 17px;
        color: #263b59;
        font-size: 17px;
        font-weight: 700;
        line-height: 1.6;
        overflow-wrap: anywhere;
    }

    .profile-page .school-status {
        display: inline-block;
        max-width: 100%;
        margin-top: 8px;
        padding: 6px 12px;
        color: #16824a;
        background: #e5f8ed;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 700;
        overflow-wrap: anywhere;
    }

    .profile-page .identity-item {
        padding: 14px 0 0;
        margin-top: 14px;
        border-top: 1px solid #edf1f6;
    }

    /* FOTO SEKOLAH */
    .profile-page .school-photo {
        display: block;
        width: 100%;
        height: 220px;
        object-fit: cover;
        object-position: center;
        border-radius: 8px;
    }

    .profile-page .image-placeholder {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: 10px;
        width: 100%;
        min-height: 145px;
        padding: 20px;
        color: #8795aa;
        background: #f8faff;
        border: 1px dashed #ccd6e3;
        border-radius: 8px;
        text-align: center;
    }

    .profile-page .image-placeholder i {
        font-size: 36px;
    }

    /* INFORMASI SEKOLAH */
    .profile-page .info-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 14px;
    }

    .profile-page .info-item {
        min-width: 0;
        padding: 14px;
        background: #f8faff;
        border: 1px solid #e9eef5;
        border-radius: 8px;
        overflow-wrap: anywhere;
    }

    .profile-page .info-item.full-width {
        grid-column: 1 / -1;
    }

    .profile-page .info-label {
        display: block;
        margin-bottom: 7px;
        color: #8390a5;
        font-size: 11px;
        font-weight: 700;
        letter-spacing: .4px;
        text-transform: uppercase;
    }

    .profile-page .info-value {
        margin: 0;
        color: #34445c;
        font-size: 14px;
        font-weight: 600;
        line-height: 1.7;
        overflow-wrap: anywhere;
    }

    /* DESKRIPSI, VISI, MISI, SEJARAH */
    .profile-page .content-text {
        margin: 0;
        color: #65748b;
        font-size: 14px;
        line-height: 1.9;
        text-align: justify;
        white-space: pre-line;
        overflow-wrap: anywhere;
    }

    .profile-page .vision-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 16px;
    }

    .profile-page .vision-box {
        min-width: 0;
        height: 100%;
        padding: 18px;
        background: #f8faff;
        border: 1px solid #e7edf6;
        border-radius: 9px;
        overflow-wrap: anywhere;
    }

    .profile-page .vision-box h6 {
        margin: 0 0 13px;
        color: #2467bd;
        font-size: 14px;
        font-weight: 700;
    }

    /* SEJARAH */
    .profile-page .history-section {
        margin-top: 22px;
    }

    /* DATA KOSONG */
    .profile-page .empty-profile {
        padding: 50px 24px;
        background: #fff;
        border: 1px solid #e8edf4;
        border-radius: 12px;
        text-align: center;
    }

    .profile-page .empty-profile > i {
        margin-bottom: 16px;
        color: #aabbd2;
        font-size: 48px;
    }

    .profile-page .empty-profile h4 {
        color: #263b59;
        font-weight: 700;
    }

    .profile-page .empty-profile p {
        color: #8390a5;
    }

    /* TABLET */
    @media (max-width: 991px) {
        .profile-page {
            padding: 18px;
        }

        .profile-page .profile-layout {
            grid-template-columns: minmax(0, 1fr);
        }

        .profile-page .profile-left {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            align-items: start;
        }

        .profile-page .profile-left .profile-card {
            height: auto;
        }

        .profile-page .school-photo {
            height: 200px;
        }

        .profile-page .history-section {
            margin-top: 22px;
        }
    }

    /* HP */
    @media (max-width: 575px) {
        .profile-page {
            padding: 12px;
        }

        .profile-page .profile-header {
            flex-direction: column;
            align-items: flex-start;
            padding: 20px;
        }

        .profile-page .profile-header h3 {
            font-size: 21px;
        }

        .profile-page .profile-card {
            padding: 17px;
        }

        .profile-page .profile-left,
        .profile-page .info-grid,
        .profile-page .vision-grid {
            grid-template-columns: minmax(0, 1fr);
        }

        .profile-page .info-item.full-width {
            grid-column: auto;
        }

        .profile-page .school-photo {
            height: 200px;
        }
    }
</style>

<div class="container-fluid profile-page">

    {{-- HEADER --}}
    <div class="profile-header">
        <div>
            <span class="section-label">ADMINISTRASI SEKOLAH</span>

            <h3>
                <i class="fa fa-school me-2"></i>
                Profil Sekolah
            </h3>

            <p>Informasi lengkap identitas dan data sekolah.</p>
        </div>

        <a href="{{ route('admin.profile.edit') }}" class="btn-edit">
            <i class="fa fa-edit me-2"></i>
            {{ $profil ? 'Edit Profil' : 'Tambah Profil' }}
        </a>
    </div>

    @if($profil)

        {{-- LAYOUT UTAMA --}}
        <div class="profile-layout">

            {{-- =====================================
                 KOLOM KIRI
                 IDENTITAS DAN FOTO SEKOLAH
            ====================================== --}}
            <div class="profile-left">

                {{-- IDENTITAS SEKOLAH --}}
                <div class="profile-card">

                    <div class="profile-card-title">
                        <div class="title-icon">
                            <i class="fa fa-image"></i>
                        </div>

                        <h5>Identitas Sekolah</h5>
                    </div>

                    <div class="school-logo-wrapper">
                        @if($profil->logo)
                            <img
                                src="{{ asset('storage/' . $profil->logo) }}"
                                alt="Logo Sekolah"
                                class="school-logo">
                        @else
                            <div class="image-placeholder">
                                <i class="fa fa-school"></i>
                                <span>Logo belum tersedia</span>
                            </div>
                        @endif
                    </div>

                    <div class="school-name">
                        {{ $profil->nama_sekolah ?? 'Nama Sekolah' }}
                    </div>

                    <span class="school-status">
                        {{ $profil->status_sekolah ?? 'Status belum diisi' }}
                    </span>

                    <div class="identity-item">
                        <span class="info-label">NPSN</span>
                        <p class="info-value">
                            {{ $profil->npsn ?? '-' }}
                        </p>
                    </div>

                    <div class="identity-item">
                        <span class="info-label">Akreditasi</span>
                        <p class="info-value">
                            {{ $profil->akreditasi ?? '-' }}
                        </p>
                    </div>

                </div>

                {{-- FOTO SEKOLAH --}}
                <div class="profile-card">

                    <div class="profile-card-title">
                        <div class="title-icon">
                            <i class="fa fa-camera"></i>
                        </div>

                        <h5>Foto Sekolah</h5>
                    </div>

                    @if($profil->foto)
                        <img
                            src="{{ asset('storage/' . $profil->foto) }}"
                            alt="Foto Sekolah"
                            class="school-photo">
                    @else
                        <div class="image-placeholder">
                            <i class="fa fa-camera"></i>
                            <span>Foto sekolah belum tersedia</span>
                        </div>
                    @endif

                </div>

            </div>

            {{-- =====================================
                 KOLOM KANAN
                 INFORMASI, DESKRIPSI, VISI MISI
            ====================================== --}}
            <div class="profile-right">

                {{-- INFORMASI SEKOLAH --}}
                <div class="profile-card">

                    <div class="profile-card-title">
                        <div class="title-icon">
                            <i class="fa fa-circle-info"></i>
                        </div>

                        <div>
                            <h5>Informasi Sekolah</h5>
                            <small>Data identitas dan kontak sekolah</small>
                        </div>
                    </div>

                    <div class="info-grid">

                        <div class="info-item">
                            <span class="info-label">Nama Sekolah</span>
                            <p class="info-value">
                                {{ $profil->nama_sekolah ?? '-' }}
                            </p>
                        </div>

                        <div class="info-item">
                            <span class="info-label">NPSN</span>
                            <p class="info-value">
                                {{ $profil->npsn ?? '-' }}
                            </p>
                        </div>

                        <div class="info-item">
                            <span class="info-label">Status Sekolah</span>
                            <p class="info-value">
                                {{ $profil->status_sekolah ?? '-' }}
                            </p>
                        </div>

                        <div class="info-item">
                            <span class="info-label">Akreditasi</span>
                            <p class="info-value">
                                {{ $profil->akreditasi ?? '-' }}
                            </p>
                        </div>

                        <div class="info-item">
                            <span class="info-label">Kepala Sekolah</span>
                            <p class="info-value">
                                {{ $profil->kepala_sekolah ?? '-' }}
                            </p>
                        </div>

                        <div class="info-item">
                            <span class="info-label">Tahun Berdiri</span>
                            <p class="info-value">
                                {{ $profil->tahun_berdiri ?? '-' }}
                            </p>
                        </div>

                        <div class="info-item">
                            <span class="info-label">Email</span>
                            <p class="info-value">
                                {{ $profil->email ?? '-' }}
                            </p>
                        </div>

                        <div class="info-item">
                            <span class="info-label">Telepon</span>
                            <p class="info-value">
                                {{ $profil->telepon ?? '-' }}
                            </p>
                        </div>

                        <div class="info-item full-width">
                            <span class="info-label">Alamat Sekolah</span>
                            <p class="info-value">
                                {{ $profil->alamat ?? '-' }}
                            </p>
                        </div>

                    </div>

                </div>

                {{-- DESKRIPSI SEKOLAH --}}
                <div class="profile-card">

                    <div class="profile-card-title">
                        <div class="title-icon">
                            <i class="fa fa-book-open"></i>
                        </div>

                        <h5>Deskripsi Sekolah</h5>
                    </div>

                    <p class="content-text">{{ $profil->deskripsi ?: 'Deskripsi sekolah belum ditambahkan.' }}</p>

                </div>

                {{-- VISI DAN MISI --}}
                <div class="profile-card">

                    <div class="profile-card-title">
                        <div class="title-icon">
                            <i class="fa fa-bullseye"></i>
                        </div>

                        <h5>Visi dan Misi</h5>
                    </div>

                    <div class="vision-grid">

                        <div class="vision-box">
                            <h6>
                                <i class="fa fa-eye me-2"></i>
                                Visi Sekolah
                            </h6>

                            <p class="content-text">{{ $profil->visi ?: 'Visi sekolah belum ditambahkan.' }}</p>
                        </div>

                        <div class="vision-box">
                            <h6>
                                <i class="fa fa-list-check me-2"></i>
                                Misi Sekolah
                            </h6>

                            <p class="content-text">{{ $profil->misi ?: 'Misi sekolah belum ditambahkan.' }}</p>
                        </div>

                    </div>

                </div>

            </div>

        </div>

        {{-- =====================================
             SEJARAH SEKOLAH
        ====================================== --}}
        <div class="history-section">

            <div class="profile-card">

                <div class="profile-card-title">
                    <div class="title-icon">
                        <i class="fa fa-landmark"></i>
                    </div>

                    <div>
                        <h5>Sejarah Sekolah</h5>
                        <small>Riwayat berdirinya dan perkembangan sekolah</small>
                    </div>
                </div>

                <p class="content-text">{{ $profil->sejarah ?: 'Sejarah sekolah belum ditambahkan.' }}</p>

            </div>

        </div>

    @else

        {{-- PROFIL BELUM TERSEDIA --}}
        <div class="empty-profile">

            <i class="fa fa-school d-block"></i>

            <h4>Data Profil Belum Tersedia</h4>

            <p>
                Tambahkan informasi profil sekolah terlebih dahulu.
            </p>

            <a href="{{ route('admin.profile.edit') }}"
               class="btn btn-primary px-4 py-2">

                <i class="fa fa-plus me-2"></i>
                Tambah Profil Sekolah

            </a>

        </div>

    @endif

</div>

@endsection

