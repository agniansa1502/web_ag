@extends('layout.app')

@section('title', 'Galeri Sekolah - MTs Al Muawanah')

@section('content')
<section class="hero-page">
    <div class="container">
        <span class="badge rounded-pill text-bg-light mb-3">CERITA DALAM GAMBAR</span>
        <h1>Galeri Sekolah</h1>
        <p>Dokumentasi kegiatan belajar, kebersamaan, dan berbagai aktivitas keluarga besar MTs Al Muawanah.</p>
    </div>
</section>

<section class="section-space">
    <div class="container">
        <div class="mb-5">
            <span class="eyebrow">Dokumentasi Kegiatan</span>
            <h2 class="section-title mt-2">Momen Berharga di Madrasah</h2>
        </div>

        @php
            $galeri = [
                ['Gedung Sekolah', 'photo-1562774053-701939374585'],
                ['Kegiatan Belajar', 'photo-1509062522246-3755977927d7'],
                ['Kebersamaan Siswa', 'photo-1529390079861-591de354faf5'],
                ['Aktivitas Olahraga', 'photo-1461896836934-ffe607ba8211'],
                ['Kegiatan Kelompok', 'photo-1523240795612-9a054b0db644'],
                ['Perpustakaan', 'photo-1507842217343-583bb7270b66'],
                ['Kegiatan Seni', 'photo-1513364776144-60967b0f800f'],
                ['Belajar Bersama', 'photo-1427504494785-3a9ca7044f45'],
            ];
        @endphp

        <div class="row g-3">
            @foreach($galeri as $item)
                <div class="col-6 col-md-4">
                    <a href="https://images.unsplash.com/{{ $item[1] }}?auto=format&fit=crop&w=1000&q=85"
                       target="_blank" rel="noopener" class="d-block school-card">
                        <img src="https://images.unsplash.com/{{ $item[1] }}?auto=format&fit=crop&w=700&q=80"
                             alt="{{ $item[0] }}" loading="lazy"
                             style="height:230px">
                        <div class="p-3 fw-bold" style="color:var(--hijau-tua)">
                            {{ $item[0] }} <i class="bi bi-arrow-up-right float-end"></i>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
