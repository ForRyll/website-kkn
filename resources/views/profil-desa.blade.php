@extends('layouts.main')

@section('title', 'Profil Desa')
@section('meta_description', 'Informasi profil dan potensi Desa Ciliang, Kecamatan Parigi, Kabupaten Pangandaran.')
@section('og_title', 'Profil Desa | KKN Kelompok 125 Desa Ciliang')

@section('content')

<section class="bg-gradient-utama text-white text-center" style="padding: 80px 0 60px;">
    <div class="container" data-aos="fade-up">
        <span class="badge-soft" style="background: rgba(255,255,255,0.15); color: white;">
            <i class="bi bi-houses-fill"></i> Tentang Desa
        </span>
        <h1 class="font-heading fw-bold mt-3 mb-2">Profil Desa Ciliang</h1>
        <p class="mb-0" style="color: rgba(255,255,255,0.85);">Kecamatan Parigi, Kabupaten Pangandaran</p>
    </div>
</section>

<section class="py-5">
    <div class="container py-3">
        <div class="row align-items-center g-5 mb-5">
            <div class="col-lg-6" data-aos="fade-right">
                <div class="card-modern overflow-hidden" style="height: 320px;">
                    <img src="{{ asset('images/ciliang.jpg') }}" alt="Desa Ciliang" class="w-100 h-100" loading="lazy" decoding="async" style="object-fit: cover;">
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <span class="section-tag">Sejarah & Gambaran Umum</span>
                <h2 class="font-heading fw-bold mb-3">Mengenal Desa Ciliang</h2>
                <p class="text-secondary" style="line-height: 1.7;">
                    Desa Ciliang merupakan salah satu desa di Kecamatan Parigi, Kabupaten Pangandaran,
                    Jawa Barat. Desa ini memiliki potensi alam dan masyarakat yang aktif dalam berbagai
                    kegiatan sosial dan ekonomi, menjadikannya lokasi yang strategis untuk program
                    pengabdian masyarakat.
                </p>
            </div>
        </div>

        <!-- KARTU STATISTIK INTERAKTIF -->
        <div class="row g-4 align-items-stretch" data-aos="fade-up">

            <!-- Jumlah Penduduk (tidak bisa diklik) -->
            <div class="col-md-3 col-6">
                <div class="card-modern text-center p-4 h-100">
                    <i class="bi bi-people-fill fs-2 text-biru"></i>
                    <h4 class="font-heading fw-bold mt-2 mb-0">2.450</h4>
                    <p class="text-secondary small mb-0">Jumlah Penduduk</p>
                </div>
            </div>

            <!-- Luas Wilayah (bisa diklik → Maps) -->
            <div class="col-md-3 col-6">
                <div class="card-modern text-center p-4 card-klik h-100"
                     data-bs-toggle="modal" data-bs-target="#modalMaps"
                     style="cursor: pointer;">
                    <i class="bi bi-map-fill fs-2 text-hijau"></i>
                    <h4 class="font-heading fw-bold mt-2 mb-0">12,5 km²</h4>
                    <p class="text-secondary small mb-1">Luas Wilayah</p>
                    <span class="badge-soft badge-soft-hijau" style="font-size: 0.65rem;">
                        <i class="bi bi-map"></i> Lihat Peta
                    </span>
                </div>
            </div>

            <!-- Jumlah Dusun (bisa diklik → info dusun) -->
            <div class="col-md-3 col-6">
                <div class="card-modern text-center p-4 card-klik h-100"
                     data-bs-toggle="modal" data-bs-target="#modalDusun"
                     style="cursor: pointer;">
                    <i class="bi bi-signpost-split-fill fs-2 text-merah"></i>
                    <h4 class="font-heading fw-bold mt-2 mb-0">5</h4>
                    <p class="text-secondary small mb-1">Jumlah Dusun</p>
                    <span class="badge-soft badge-soft-merah" style="font-size: 0.65rem;">
                        <i class="bi bi-info-circle"></i> Lihat Detail
                    </span>
                </div>
            </div>

            <!-- Potensi Wisata (bisa diklik → daftar wisata) -->
            <div class="col-md-3 col-6">
                <div class="card-modern text-center p-4 card-klik h-100"
                     data-bs-toggle="modal" data-bs-target="#modalWisata"
                     style="cursor: pointer;">
                    <i class="bi bi-tree-fill fs-2 text-biru"></i>
                    <h4 class="font-heading fw-bold mt-2 mb-0">3</h4>
                    <p class="text-secondary small mb-1">Potensi Wisata</p>
                    <span class="badge-soft badge-soft-biru" style="font-size: 0.65rem;">
                        <i class="bi bi-eye"></i> Lihat Wisata
                    </span>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- MODAL MAPS -->
<div class="modal fade" id="modalMaps" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0 rounded-4 overflow-hidden">
            <div class="bg-gradient-utama p-3 text-white d-flex justify-content-between align-items-center">
                <h6 class="font-heading fw-bold mb-0"><i class="bi bi-map-fill me-2"></i>Peta Desa Ciliang</h6>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="ratio ratio-16x9">
                <iframe src="https://www.google.com/maps?q=Desa+Ciliang,+Parigi,+Pangandaran&output=embed"
                        allowfullscreen loading="lazy"></iframe>
            </div>
        </div>
    </div>
</div>

<!-- MODAL DUSUN -->
<div class="modal fade" id="modalDusun" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 rounded-4 overflow-hidden">
            <div class="bg-gradient-utama p-4 text-white text-center position-relative">
                <button type="button" class="btn-close btn-close-white position-absolute top-0 end-0 m-3"
                        data-bs-dismiss="modal"></button>
                <i class="bi bi-signpost-split-fill fs-1 mb-2 d-block"></i>
                <h5 class="font-heading fw-bold mb-1">Dusun di Desa Ciliang</h5>
                <p class="small mb-0" style="color: rgba(255,255,255,0.8);">Desa Ciliang terdiri dari 5 dusun</p>
            </div>
            <div class="modal-body p-4">
                <div class style="color:black" d-flex flex-column gap-3">
                    @foreach([
                        ['nama' => 'Dusun Ciliang', 'keterangan' => 'Pusat desa dan area pemerintahan'],
                        ['nama' => 'Dusun Ciakar', 'keterangan' => 'Wilayah pertanian dan perkebunan'],
                        ['nama' => 'Dusun Bojong', 'keterangan' => 'Area pemukiman warga'],
                        ['nama' => 'Dusun Neglasari', 'keterangan' => 'Wilayah dengan potensi wisata alam'],
                        ['nama' => 'Dusun Sukamaju', 'keterangan' => 'Area pengembangan UMKM desa'],
                    ] as $index => $dusun)
                    <div class="d-flex align-items-center gap-3 p-3 rounded-3" style="background: #F8F9FA;">
                        <div class="rounded-circle d-flex align-items-center justify-content-center flex-shrink-0 fw-bold text-white"
                             style="width: 36px; height: 36px; background: linear-gradient(135deg, var(--biru), var(--hijau)); font-size: 0.85rem;">
                            {{ $index + 1 }}
                        </div>
                        <div>
                            <p class="fw-semibold mb-0">{{ $dusun['nama'] }}</p>
                            <p class="small text-secondary mb-0">{{ $dusun['keterangan'] }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<!-- MODAL WISATA -->
<div class="modal fade" id="modalWisata" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 rounded-4 overflow-hidden">
            <div class="bg-gradient-utama p-4 text-white text-center position-relative">
                <button type="button" class="btn-close btn-close-white position-absolute top-0 end-0 m-3"
                        data-bs-dismiss="modal"></button>
                <i class="bi bi-tree-fill fs-1 mb-2 d-block"></i>
                <h5 class="font-heading fw-bold mb-1">Potensi Wisata Desa Ciliang</h5>
                <p class="small mb-0" style="color: rgba(255,255,255,0.8);">Destinasi wisata yang bisa dikembangkan</p>
            </div>
            <div class="modal-body p-4">
                <div class style="color:black" d-flex flex-column gap-3>
                    @foreach([
                        ['nama' => 'Wisata Alam Ciliang', 'ikon' => 'bi-tree-fill', 'warna' => 'hijau', 'keterangan' => 'Panorama alam pegunungan yang indah dan asri'],
                        ['nama' => 'Wisata Budaya Lokal', 'ikon' => 'bi-music-note-beamed', 'warna' => 'biru', 'keterangan' => 'Kesenian dan tradisi budaya masyarakat Ciliang'],
                        ['nama' => 'Agrowisata Perkebunan', 'ikon' => 'bi-flower1', 'warna' => 'merah', 'keterangan' => 'Perkebunan lokal dengan hasil bumi berkualitas'],
                    ] as $wisata)
                    <div class="d-flex align-items-center gap-3 p-3 rounded-3" style="background: #F8F9FA;">
                        <div class="rounded-circle d-flex align-items-center justify-content-center flex-shrink-0"
                             style="width: 44px; height: 44px; background: rgba(46,125,50,0.1);">
                            <i class="bi {{ $wisata['ikon'] }} text-{{ $wisata['warna'] }} fs-5"></i>
                        </div>
                        <div>
                            <p class="fw-semibold mb-0">{{ $wisata['nama'] }}</p>
                            <p class="small text-secondary mb-0">{{ $wisata['keterangan'] }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="mt-3 p-3 rounded-3 text-center" style="background: rgba(46,125,50,0.08);">
                    <p class="small text-hijau fw-semibold mb-0">
                        <i class="bi bi-info-circle"></i>
                        Data wisata akan terus diperbarui selama program KKN berlangsung
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('styles')
<style>
    .card-klik {
        transition: all 0.35s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }

    .card-klik:hover {
        transform: translateY(-8px) scale(1.03);
        box-shadow: 0 20px 40px rgba(20, 30, 50, 0.14);
    }
</style>
@endpush
