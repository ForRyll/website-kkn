@extends('layouts.main')

@section('title', 'Lokasi Desa')
@section('meta_description', 'Peta lokasi Desa Ciliang, Kecamatan Parigi, Kabupaten Pangandaran.')
@section('og_title', 'Lokasi | KKN Kelompok 125 Desa Ciliang')

@section('content')

<section class="bg-gradient-utama text-white text-center" style="padding: 80px 0 60px;">
    <div class="container" data-aos="fade-up">
        <span class="badge-soft" style="background: rgba(255,255,255,0.15); color: white;">
            <i class="bi bi-geo-alt-fill"></i> Peta
        </span>
        <h1 class="font-heading fw-bold mt-3 mb-2">Lokasi Desa Ciliang</h1>
        <p class="mb-0" style="color: rgba(255,255,255,0.85);">Kecamatan Parigi, Kabupaten Pangandaran</p>
    </div>
</section>

<section class="py-5">
    <div class="container py-3">
        <div class="card-modern p-2" data-aos="fade-up">
            <div class="ratio ratio-16x9 rounded-3 overflow-hidden">
                <iframe
                    src="https://www.google.com/maps?q=Desa+Ciliang,+Parigi,+Pangandaran&output=embed"
                    allowfullscreen
                    loading="lazy">
                </iframe>
            </div>
        </div>
    </div>
</section>

@endsection
