@extends('layouts.main')

@section('title', 'UMKM')
@section('meta_description', 'Katalog UMKM dan potensi ekonomi lokal Desa Ciliang binaan KKN Kelompok 125.')
@section('og_title', 'UMKM | KKN Kelompok 125 Desa Ciliang')

@section('content')

<section class="bg-gradient-utama text-white text-center" style="padding: 80px 0 60px;">
    <div class="container" data-aos="fade-up">
        <span class="badge-soft" style="background: rgba(255,255,255,0.15); color: white;">
            <i class="bi bi-shop"></i> Ekonomi Lokal
        </span>
        <h1 class="font-heading fw-bold mt-3 mb-2">UMKM Desa</h1>
        <p class="mb-0" style="color: rgba(255,255,255,0.85);">Produk dan usaha masyarakat Desa Ciliang</p>
    </div>
</section>

<section class="py-5">
    <div class="container py-3">
        <div class="row g-4">
            @forelse ($umkms as $index => $umkm)
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="{{ ($index % 3) * 100 }}">
                <div class="card-modern h-100">
                    @if($umkm->gambar && file_exists(public_path('uploads/umkm/' . $umkm->gambar)))
                        <div class="overflow-hidden" style="height: 200px;">
                            <img src="{{ asset('uploads/umkm/' . $umkm->gambar) }}"
                                 alt="{{ $umkm->nama_usaha }}"
                                 class="w-100 h-100"
                                 loading="lazy"
                                 decoding="async"
                                 style="object-fit: cover; transition: transform 0.4s ease;">
                        </div>
                    @else
                        <div class="d-flex align-items-center justify-content-center"
                             style="height: 200px; background: linear-gradient(135deg, #E8F0FE, #E6F4EA);">
                            <i class="bi bi-shop fs-1 text-merah" style="opacity: 0.3;"></i>
                        </div>
                    @endif
                    <div class="p-4">
                        <div class="rounded-circle d-flex align-items-center justify-content-center mb-3"
                             style="width: 44px; height: 44px; background: rgba(211,47,47,0.1);">
                            <i class="bi bi-shop fs-5 text-merah"></i>
                        </div>
                        <h5 class="font-heading fw-semibold mb-1">{{ $umkm->nama_usaha }}</h5>
                        <p class="small text-secondary mb-2">
                            <i class="bi bi-person-fill"></i> {{ $umkm->pemilik }}
                        </p>
                        <p class="text-secondary small mb-3" style="line-height: 1.6;">{{ $umkm->deskripsi }}</p>
                        @if($umkm->kontak)
                        <div class="pt-2 small" style="border-top: 1px solid #F0EEE7;">
                            <i class="bi bi-telephone-fill text-hijau"></i> {{ $umkm->kontak }}
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center text-secondary py-5">
                <i class="bi bi-shop fs-1 mb-3 d-block"></i>
                Belum ada UMKM yang ditambahkan.
            </div>
            @endforelse
        </div>
    </div>
</section>

@endsection
