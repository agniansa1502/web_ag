@extends('layout.app')

@section('title', 'Tenaga Pendidik - MTs Al Muawanah')

@section('content')
<section class="hero-page">
    <div class="container">
        <span class="badge rounded-pill text-bg-light mb-3">TENAGA PENDIDIK</span>
        <h1>Guru MTs Al Muawanah</h1>
        <p>Para pendidik yang mendampingi siswa untuk tumbuh menjadi generasi berilmu, berakhlak, dan berprestasi.</p>
    </div>
</section>

<section class="section-space soft-section">
    <div class="container">
        <div class="text-center mb-5">
            <span class="eyebrow">Pendidik Inspiratif</span>
            <h2 class="section-title mt-2">Kenali Tenaga Pendidik Kami</h2>
            <p>Guru berperan dalam mendampingi proses belajar dan perkembangan karakter siswa.</p>
        </div>

        @php
            $guru = [
                ['Kepala Madrasah', 'Kepemimpinan dan Pendidikan'],
                ['Guru Pendidikan Agama', 'Pendidikan Agama Islam'],
                ['Guru Matematika', 'Matematika'],
                ['Guru Bahasa Indonesia', 'Bahasa Indonesia'],
                ['Guru IPA', 'Ilmu Pengetahuan Alam'],
                ['Guru Bahasa Inggris', 'Bahasa Inggris'],
            ];
        @endphp

        <div class="row g-4">
            @foreach($guru as $index => $item)
                <div class="col-6 col-md-4 col-lg-4">
                    <div class="school-card text-center p-4">
                        <div class="mx-auto mb-3 rounded-circle d-flex align-items-center justify-content-center"
                             style="width:95px;height:95px;background:var(--hijau-muda);color:var(--hijau);font-size:38px">
                            <i class="bi bi-person-badge"></i>
                        </div>
                        <h3 class="h6 fw-bold mb-2" style="color:var(--hijau-tua)">{{ $item[0] }}</h3>
                        <p class="small text-secondary mb-0">{{ $item[1] }}</p>
                    </div>
                </div>
            @endforeach
        </div>

        <p class="small text-secondary text-center mt-4">
            Data guru di atas merupakan contoh. Ganti dengan nama dan foto guru sebenarnya.
        </p>
    </div>
</section>
@endsection
