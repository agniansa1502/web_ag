@extends('layout.app')

@section('title', 'Program Sekolah - MTs Al Muawanah')

@section('content')
<section class="hero-page">
    <div class="container">
        <span class="badge rounded-pill text-bg-light mb-3">PENDIDIKAN BERKUALITAS</span>
        <h1>Program Unggulan</h1>
        <p>Beragam program untuk mengembangkan kemampuan akademik, karakter, kreativitas, dan spiritualitas peserta didik.</p>
    </div>
</section>

<section class="section-space soft-section">
    <div class="container">
        <div class="text-center mb-5">
            <span class="eyebrow">Tumbuh dan Berkembang</span>
            <h2 class="section-title mt-2">Program Pendidikan Kami</h2>
            <p>Belajar tidak hanya tentang nilai, tetapi juga membangun karakter.</p>
        </div>

        <div class="row g-4">
            @php
                $programs = [
                    ['bi-book-half', 'Keagamaan', 'Pembiasaan ibadah, membaca Al-Qur’an, dan penguatan akhlak mulia.'],
                    ['bi-mortarboard', 'Akademik', 'Pembelajaran berkualitas untuk meningkatkan pengetahuan dan prestasi.'],
                    ['bi-people', 'Karakter', 'Membiasakan disiplin, tanggung jawab, kerja sama, dan kepedulian.'],
                    ['bi-book', 'Literasi', 'Meningkatkan minat baca, kemampuan menulis, dan wawasan siswa.'],
                    ['bi-laptop', 'Teknologi', 'Mengenalkan teknologi untuk mendukung pembelajaran.'],
                    ['bi-trophy', 'Prestasi', 'Mendorong siswa mengembangkan bakat dan meraih pencapaian.'],
                ];
            @endphp

            @foreach($programs as $program)
                <div class="col-md-6 col-lg-4">
                    <div class="school-card p-4">
                        <span class="icon-circle mb-3"><i class="bi {{ $program[0] }}"></i></span>
                        <h3 class="h5 fw-bold" style="color:var(--hijau-tua)">{{ $program[1] }}</h3>
                        <p class="mb-0">{{ $program[2] }}</p>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="text-center mt-5">
            <a href="{{ route('ekstrakurikuler') }}" class="btn-hijau">Jelajahi Ekstrakulikuler <i class="bi bi-arrow-right"></i></a>
        </div>
    </div>
</section>
@endsection
