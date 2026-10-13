@extends('layout.app')

@section('title', 'Ekstrakulikuler - MTs Al Muawanah')

@section('content')
<section class="hero-page">
    <div class="container">
        <span class="badge rounded-pill text-bg-light mb-3">BAKAT DAN KREATIVITAS</span>
        <h1>Ekstrakulikuler Siswa</h1>
        <p>Temukan minat, kembangkan bakat, dan bangun persahabatan melalui kegiatan positif di sekolah.</p>
    </div>
</section>

<section class="section-space">
    <div class="container">
        <div class="text-center mb-5">
            <span class="eyebrow">Aktif dan Kreatif</span>
            <h2 class="section-title mt-2">Pilihan Kegiatan</h2>
            <p>Ruang bagi siswa untuk belajar dan berkembang di luar kelas.</p>
        </div>

        @php
            $kegiatan = [
                ['Pramuka', 'Melatih kedisiplinan, kemandirian, kepemimpinan, dan kerja sama.', 'photo-1511632765486-a01980e01a18', 'bi-compass'],
                ['Olahraga', 'Menumbuhkan kebugaran, sportivitas, dan semangat berkompetisi.', 'photo-1461896836934-ffe607ba8211', 'bi-trophy'],
                ['Seni', 'Mengembangkan kreativitas, ekspresi diri, dan apresiasi seni.', 'photo-1513364776144-60967b0f800f', 'bi-palette'],
                ['Tahfidz Al-Qur’an', 'Mendampingi siswa menghafal dan mencintai Al-Qur’an.', 'photo-1609599006353-e629aaabfeae', 'bi-book-half'],
                ['Paskibra', 'Membentuk jiwa kepemimpinan, disiplin, dan nasionalisme.', 'photo-1528605248644-14dd04022da1', 'bi-flag'],
                ['Literasi', 'Mengasah kemampuan membaca, menulis, dan berpikir kritis.', 'photo-1507842217343-583bb7270b66', 'bi-journal-text'],
            ];
        @endphp

        <div class="row g-4">
            @foreach($kegiatan as $item)
                <div class="col-md-6 col-lg-4">
                    <article class="school-card">
                        <img src="https://images.unsplash.com/{{ $item[2] }}?auto=format&fit=crop&w=800&q=80"
                             alt="{{ $item[0] }}" loading="lazy">
                        <div class="card-body-custom">
                            <span class="icon-circle mb-3"><i class="bi {{ $item[3] }}"></i></span>
                            <h3 class="h5 fw-bold" style="color:var(--hijau-tua)">{{ $item[0] }}</h3>
                            <p class="mb-0">{{ $item[1] }}</p>
                        </div>
                    </article>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
