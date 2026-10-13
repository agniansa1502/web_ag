@extends('layout.app')

@section('title', 'Berita Sekolah - MTs Al Muawanah')

@section('content')
<section class="hero-page">
    <div class="container">
        <span class="badge rounded-pill text-bg-light mb-3">INFORMASI TERBARU</span>
        <h1>Berita Sekolah</h1>
        <p>Ikuti informasi, kegiatan, dan cerita inspiratif dari keluarga besar MTs Al Muawanah.</p>
    </div>
</section>

<section class="section-space">
    <div class="container">
        <div class="d-flex justify-content-between align-items-end flex-wrap gap-3 mb-4">
            <div>
                <span class="eyebrow">Kabar Madrasah</span>
                <h2 class="section-title mt-2 mb-0">Informasi dan Kegiatan</h2>
            </div>
            <span class="text-secondary small">Berita MTs Al Muawanah</span>
        </div>

        @php
            $berita = [
                ['Kegiatan Belajar di Sekolah', 'Suasana pembelajaran yang aktif membantu siswa meningkatkan pengetahuan dan keterampilan.', 'photo-1509062522246-3755977927d7', '07 Oktober 2026', 'Akademik'],
                ['Kegiatan Siswa', 'Kegiatan bersama menjadi ruang untuk membangun kreativitas, kebersamaan, dan tanggung jawab.', 'photo-1529390079861-591de354faf5', '05 Oktober 2026', 'Kegiatan'],
                ['Semangat Meraih Prestasi', 'Terus berusaha, berlatih, dan belajar untuk mengembangkan potensi setiap peserta didik.', 'photo-1523240795612-9a054b0db644', '28 September 2026', 'Prestasi'],
                ['Pembiasaan Hidup Disiplin', 'Membangun kebiasaan baik melalui ketepatan waktu, tanggung jawab, dan kepedulian.', 'photo-1503676260728-1c00da094a0b', '20 September 2026', 'Karakter'],
                ['Belajar Bersama di Perpustakaan', 'Mendorong budaya membaca dan memperluas wawasan melalui kegiatan literasi.', 'photo-1507842217343-583bb7270b66', '15 September 2026', 'Literasi'],
                ['Kegiatan Keagamaan', 'Menguatkan nilai keislaman dan membiasakan perilaku baik dalam kehidupan sehari-hari.', 'photo-1609599006353-e629aaabfeae', '10 September 2026', 'Keagamaan'],
            ];
        @endphp

        <div class="row g-4">
            @foreach($berita as $item)
                <div class="col-md-6 col-lg-4">
                    <article class="school-card">
                        <img src="https://images.unsplash.com/{{ $item[2] }}?auto=format&fit=crop&w=850&q=80"
                             alt="{{ $item[0] }}" loading="lazy">
                        <div class="card-body-custom">
                            <div class="d-flex gap-2 align-items-center flex-wrap mb-3 small">
                                <span style="color:var(--hijau)"><i class="bi bi-calendar3"></i> {{ $item[3] }}</span>
                                <span class="badge rounded-pill" style="background:var(--hijau-muda);color:var(--hijau)">{{ $item[4] }}</span>
                            </div>
                            <h3 class="h5 fw-bold" style="color:var(--hijau-tua)">{{ $item[0] }}</h3>
                            <p>{{ $item[1] }}</p>
                            <a href="#berita-info" class="fw-bold small" style="color:var(--hijau)">
                                Baca selengkapnya <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </article>
                </div>
            @endforeach
        </div>

        <div id="berita-info" class="alert mt-4" style="background:var(--hijau-muda);color:var(--hijau-tua)">
            <i class="bi bi-info-circle"></i>
            Berita di halaman ini masih berupa contoh tampilan. Nantinya dapat dihubungkan ke database Laravel agar admin bisa menambah, mengubah, dan menghapus berita.
        </div>
    </div>
</section>
@endsection
