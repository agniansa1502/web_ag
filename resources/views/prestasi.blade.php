@extends('layout.app')

@section('title', 'Prestasi Siswa - MTs Al Muawanah')

@section('content')
<section class="hero-page">
    <div class="container">
        <span class="badge rounded-pill text-bg-light mb-3">
            BANGGA DAN BERPRESTASI
        </span>
        <h1>Prestasi Siswa</h1>
        <p>Mengapresiasi usaha, semangat, dan pencapaian peserta didik dalam berbagai bidang.</p>
    </div>
</section>

<section class="section-space soft-section">
    <div class="container">
        <div class="text-center mb-5">
            <span class="eyebrow">Apresiasi Pencapaian</span>
            <h2 class="section-title mt-2">Ruang untuk Berprestasi</h2>
            <p>Setiap usaha dan proses belajar merupakan bagian dari keberhasilan.</p>
        </div>

        <div class="row g-4">
            @forelse ($prestasi as $item)
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="school-card p-4 h-100 text-center">

                        @if ($item->foto)
                            <img
                                src="{{ asset('storage/' . $item->foto) }}"
                                alt="{{ $item->nama_prestasi }}"
                                class="img-fluid rounded-3 mb-3"
                                style="width:100%; height:200px; object-fit:cover;"
                            >
                        @else
                            <span class="icon-circle mb-3">
                                <i class="bi bi-trophy-fill"></i>
                            </span>
                        @endif

                        <span class="badge rounded-pill text-bg-success mb-3">
                            {{ $item->kategori }}
                        </span>

                        <h3 class="h5 fw-bold" style="color:var(--hijau-tua)">
                            {{ $item->nama_prestasi }}
                        </h3>

                        <p class="mb-2">
                            <strong>Peraih:</strong>
                            {{ $item->peraih }}
                        </p>

                        <p class="mb-2">
                            <strong>Tingkat:</strong>
                            {{ $item->tingkat ?? '-' }}
                        </p>

                        @if ($item->deskripsi)
                            <p class="small mb-3">
                                {{ $item->deskripsi }}
                            </p>
                        @endif

                        <p class="small text-muted mb-0">
                            <i class="bi bi-calendar-event me-1"></i>
                            {{ \Carbon\Carbon::parse($item->tanggal)->format('d F Y') }}
                        </p>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="school-card p-5 text-center">
                        <i class="bi bi-trophy display-4 text-success"></i>
                        <h4 class="mt-3">Belum Ada Data Prestasi</h4>
                        <p class="text-muted mb-0">
                            Data prestasi siswa akan ditampilkan di halaman ini
                            setelah ditambahkan ke database.
                        </p>
                    </div>
                </div>
            @endforelse
        </div>

        <div class="rounded-4 p-4 p-md-5 mt-5 text-white"
             style="background:linear-gradient(120deg,#064e35,#0ca968)">
            <div class="row align-items-center g-3">
                <div class="col-md-8">
                    <h3 class="fw-bold">Terus Tumbuh, Terus Berprestasi</h3>
                    <p class="mb-0">
                        Dukungan guru dan keluarga membantu siswa
                        mengembangkan potensi terbaiknya.
                    </p>
                </div>
                <div class="col-md-4 text-md-end">
                    <a href="{{ route('guru') }}" class="btn-putih">
                        Kenali Guru Kami
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsectio
