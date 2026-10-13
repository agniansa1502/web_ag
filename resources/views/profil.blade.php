@extends('layout.app')

@section('title', 'Profil Sekolah - MTs Al Muawanah')

@section('content')
<section class="hero-page">
    <div class="container">
        <span class="badge rounded-pill text-bg-light mb-3">MENGENAL SEKOLAH KAMI</span>
        <h1>Profil MTs Al Muawanah</h1>
        <p>Mengenal lebih dekat visi, misi, dan nilai-nilai yang menjadi dasar pendidikan di MTs Al Muawanah.</p>
    </div>
</section>

<section class="section-space">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <img class="w-100 rounded-4 shadow"
                     style="height:360px;object-fit:cover"
                     src="https://images.unsplash.com/photo-1562774053-701939374585?auto=format&fit=crop&w=1000&q=85"
                     alt="Gedung sekolah">
            </div>
            <div class="col-lg-6">
                <span class="eyebrow">Tentang Kami</span>
                <h2 class="section-title mt-2">Membangun Generasi Berakhlak Mulia</h2>
                <p>MTs Al Muawanah berkomitmen memberikan pendidikan yang mengintegrasikan ilmu pengetahuan, nilai-nilai keislaman, kedisiplinan, dan pembentukan karakter.</p>
                <p>Kami percaya bahwa setiap peserta didik memiliki potensi untuk berkembang dan meraih masa depan yang lebih baik.</p>
                <a href="{{ route('program') }}" class="btn-hijau">Lihat Program <i class="bi bi-arrow-right"></i></a>
            </div>
        </div>
    </div>
</section>

<section class="section-space soft-section">
    <div class="container">
        <div class="row g-4">
            <div class="col-md-6">
                <div class="school-card p-4">
                    <span class="icon-circle mb-3"><i class="bi bi-eye-fill"></i></span>
                    <h3 class="section-title h4">Visi</h3>
                    <p class="mb-0">Menjadi madrasah yang membentuk generasi beriman, berakhlak mulia, cerdas, mandiri, dan berprestasi.</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="school-card p-4">
                    <span class="icon-circle mb-3"><i class="bi bi-bullseye"></i></span>
                    <h3 class="section-title h4">Misi</h3>
                    <ul class="mb-0">
                        <li>Meningkatkan kualitas pembelajaran.</li>
                        <li>Membiasakan perilaku Islami.</li>
                        <li>Mengembangkan potensi dan kreativitas siswa.</li>
                        <li>Menciptakan lingkungan belajar yang nyaman.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
