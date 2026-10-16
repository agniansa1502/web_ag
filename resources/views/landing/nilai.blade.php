
@extends('landing.layouts.app')

@section('title', 'Input Nilai Siswa - MTs Al Muawanah')

@section('content')

<style>
    :root {
        --nilai-green: #087443;
        --nilai-dark: #075c36;
        --nilai-light: #eaf7ef;
        --nilai-gold: #f4c542;
    }

    .nilai-hero {
        background: linear-gradient(135deg, #064e32, #0ca968);
        color: white;
        padding: 55px 20px;
        border-radius: 0 0 28px 28px;
    }

    .nilai-card {
        border: none;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 8px 28px rgba(7, 92, 54, .10);
    }

    .nilai-label {
        font-weight: 600;
        color: #075c36;
    }

    .nilai-input {
        border: 1px solid #d6e8dc;
        border-radius: 12px;
        padding: 12px 14px;
    }

    .nilai-input:focus {
        border-color: #087443;
        box-shadow: 0 0 0 .2rem rgba(8, 116, 67, .12);
    }

    .nilai-btn {
        background: #087443;
        color: white;
        border: none;
        border-radius: 12px;
        padding: 12px 20px;
        font-weight: 600;
    }

    .nilai-btn:hover {
        background: #075c36;
        color: white;
    }

    .hasil-box {
        background: #eaf7ef;
        border: 1px solid #d2eadb;
        border-radius: 16px;
        padding: 22px;
    }

    .hasil-angka {
        font-size: 2.5rem;
        font-weight: 800;
        color: #087443;
    }

    .status-lulus {
        background: #d1fae5;
        color: #065f46;
    }

    .status-tidak-lulus {
        background: #fee2e2;
        color: #991b1b;
    }
</style>

<section class="nilai-hero text-center">
    <div class="container">
        <span class="badge rounded-pill px-3 py-2 mb-3"
              style="background:#f4c542;color:#075c36">
            AKADEMIK MADRASAH
        </span>

        <h1 class="fw-bold">Input Nilai Siswa</h1>
        <p class="mb-0">
            Hitung nilai rata-rata dan lihat hasil kelulusan siswa.
        </p>
    </div>
</section>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">

            <div class="card nilai-card">
                <div class="card-body p-4 p-md-5">

                    <div class="text-center mb-4">
                        <div class="mb-3">
                            <i class="fa-solid fa-calculator fa-3x"
                               style="color:#087443"></i>
                        </div>
                        <h3 class="fw-bold" style="color:#087443">
                            Form Perhitungan Nilai
                        </h3>
                        <p class="text-muted">
                            Masukkan identitas siswa dan nilai mata pelajaran.
                        </p>
                    </div>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('landing.nilai.hitung') }}"
                          method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="nama" class="form-label nilai-label">
                                Nama Siswa
                            </label>
                            <input type="text"
                                   name="nama"
                                   id="nama"
                                   class="form-control nilai-input"
                                   value="{{ old('nama') }}"
                                   placeholder="Masukkan nama siswa"
                                   required>
                        </div>

                        <div class="mb-3">
                            <label for="nis" class="form-label nilai-label">
                                NIS (opsional)
                            </label>
                            <input type="text"
                                   name="nis"
                                   id="nis"
                                   class="form-control nilai-input"
                                   value="{{ old('nis') }}"
                                   placeholder="Masukkan NIS siswa">
                        </div>

                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="nilai1"
                                       class="form-label nilai-label">
                                    Nilai Mata Pelajaran 1
                                </label>
                                <input type="number"
                                       name="nilai1"
                                       id="nilai1"
                                       class="form-control nilai-input"
                                       min="0"
                                       max="100"
                                       step="0.01"
                                       value="{{ old('nilai1') }}"
                                       placeholder="0 - 100"
                                       required>
                            </div>

                            <div class="col-md-6">
                                <label for="nilai2"
                                       class="form-label nilai-label">
                                    Nilai Mata Pelajaran 2
                                </label>
                                <input type="number"
                                       name="nilai2"
                                       id="nilai2"
                                       class="form-control nilai-input"
                                       min="0"
                                       max="100"
                                       step="0.01"
                                       value="{{ old('nilai2') }}"
                                       placeholder="0 - 100"
                                       required>
                            </div>
                        </div>

                        <div class="alert mt-4 mb-4"
                             style="background:#fff9df;border:1px solid #f4c542;color:#725b00">
                            <i class="fa-solid fa-circle-info me-2"></i>
                            Nilai rata-rata dihitung dari jumlah kedua nilai
                            dibagi dua. Batas kelulusan adalah 70.
                        </div>

                        <button type="submit"
                                class="btn nilai-btn w-100">
                            <i class="fa-solid fa-calculator me-2"></i>
                            Hitung Nilai Rata-rata
                        </button>
                    </form>

                    @if (session('hasil'))
                        @php
                            $hasil = session('hasil');
                        @endphp

                        <hr class="my-4">

                        <div class="hasil-box mt-3">
                            <h5 class="fw-bold mb-3" style="color:#075c36">
                                <i class="fa-solid fa-chart-column me-2"></i>
                                Hasil Perhitungan
                            </h5>

                            <p class="mb-1">
                                <strong>Nama:</strong>
                                {{ $hasil['nama'] }}
                            </p>

                            @if (!empty($hasil['nis']))
                                <p class="mb-1">
                                    <strong>NIS:</strong>
                                    {{ $hasil['nis'] }}
                                </p>
                            @endif

                            <p class="mb-1">
                                <strong>Nilai 1:</strong>
                                {{ $hasil['nilai1'] }}
                            </p>

                            <p class="mb-3">
                                <strong>Nilai 2:</strong>
                                {{ $hasil['nilai2'] }}
                            </p>

                            <div class="text-center py-3">
                                <div class="small text-muted">
                                    NILAI RATA-RATA
                                </div>

                                <div class="hasil-angka">
                                    {{ number_format($hasil['rata_rata'], 2) }}
                                </div>

                                <span class="badge rounded-pill px-4 py-2
                                    {{ $hasil['status'] === 'Lulus'
                                        ? 'status-lulus'
                                        : 'status-tidak-lulus' }}">
                                    {{ $hasil['status'] }}
                                </span>
                            </div>
                        </div>
                    @endif

                </div>
            </div>

            <p class="text-center text-muted small mt-3">
                MTs Al Muawanah &mdash; Sistem Perhitungan Nilai Siswa
            </p>

        </div>
    </div>
</div>

@endsection
