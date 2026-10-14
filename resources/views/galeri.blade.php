@extends('layouts.main')

@section('title', 'Galeri')

@section('content')

<section class="bg-gradient-utama text-white text-center" style="padding: 80px 0 60px;">
    <div class="container" data-aos="fade-up">
        <span class="badge-soft" style="background: rgba(255,255,255,0.15); color: white;">
            <i class="bi bi-images"></i> Dokumentasi
        </span>
        <h1 class="font-heading fw-bold mt-3 mb-2">Galeri Dokumentasi</h1>
        <p class="mb-0" style="color: rgba(255,255,255,0.85);">Momen kegiatan KKN Kelompok 125 di Desa Ciliang</p>
    </div>
</section>

<section class="py-5">
    <div class="container py-3">

        <!-- TOMBOL FILTER -->
        <div class="d-flex flex-wrap justify-content-center gap-2 mb-5" data-aos="fade-up">
            <button class="btn-filter active" data-filter="semua">Semua</button>
            <button class="btn-filter" data-filter="Kegiatan">Kegiatan</button>
            <button class="btn-filter" data-filter="Lingkungan">Lingkungan</button>
            <button class="btn-filter" data-filter="Masyarakat">Masyarakat</button>
            <button class="btn-filter" data-filter="Lainnya">Lainnya</button>
        </div>

        <!-- GRID FOTO -->
        <div class="row g-4" id="galeri-grid">
            @forelse ($galeris as $index => $galeri)
            <div class="col-md-4 col-6 galeri-item" data-kategori="{{ $galeri->kategori }}" data-aos="fade-up" data-aos-delay="{{ ($index % 3) * 100 }}">
                <div class="card-modern h-100">
                    <div class="overflow-hidden" style="height: 220px;">
                        @if($galeri->gambar && file_exists(public_path('uploads/galeri/' . $galeri->gambar)))
                            <img src="{{ asset('uploads/galeri/' . $galeri->gambar) }}"
                                 alt="{{ $galeri->judul }}"
                                 class="w-100 h-100"
                                 style="object-fit: cover; transition: transform 0.4s ease;">
                        @else
                            <div class="w-100 h-100 d-flex align-items-center justify-content-center"
                                 style="background: linear-gradient(135deg, #E8F0FE, #E6F4EA);">
                                <i class="bi bi-image fs-1 text-biru" style="opacity: 0.4;"></i>
                            </div>
                        @endif
                    </div>
                    <div class="p-3">
                        <span class="badge-soft badge-soft-hijau mb-2 d-inline-block">{{ $galeri->kategori }}</span>
                        <h6 class="font-heading fw-semibold mb-0">{{ $galeri->judul }}</h6>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center text-secondary py-5">
                <i class="bi bi-images fs-1 mb-3 d-block"></i>
                Belum ada foto yang ditambahkan.
            </div>
            @endforelse
        </div>

        <!-- PESAN KALAU FILTER KOSONG -->
        <div id="filter-kosong" class="text-center text-secondary py-5 d-none">
            <i class="bi bi-search fs-1 mb-3 d-block"></i>
            Tidak ada foto di kategori ini.
        </div>

    </div>
</section>

@endsection

@push('styles')
<style>
    .btn-filter {
        padding: 8px 20px;
        border-radius: 50px;
        border: 1.5px solid #dee2e6;
        background: white;
        color: #5C6670;
        font-weight: 600;
        font-size: 0.85rem;
        cursor: pointer;
        transition: all 0.25s ease;
    }

    .btn-filter:hover {
        border-color: var(--biru);
        color: var(--biru);
    }

    .btn-filter.active {
        background: linear-gradient(135deg, var(--biru), var(--hijau));
        border-color: transparent;
        color: white;
    }

    .galeri-item {
        transition: opacity 0.3s ease, transform 0.3s ease;
    }

    .galeri-item.hidden {
        display: none !important;
    }

    .card-modern:hover img {
        transform: scale(1.05);
    }
</style>
@endpush

@push('scripts')
<script>
    const tombolFilter = document.querySelectorAll('.btn-filter');
    const items = document.querySelectorAll('.galeri-item');
    const pesanKosong = document.getElementById('filter-kosong');

    tombolFilter.forEach(tombol => {
        tombol.addEventListener('click', function () {
            // Update tombol aktif
            tombolFilter.forEach(t => t.classList.remove('active'));
            this.classList.add('active');

            const filter = this.dataset.filter;
            let jumlahTampil = 0;

            items.forEach(item => {
                if (filter === 'semua' || item.dataset.kategori === filter) {
                    item.classList.remove('hidden');
                    jumlahTampil++;
                } else {
                    item.classList.add('hidden');
                }
            });

            // Tampilkan pesan kalau kosong
            pesanKosong.classList.toggle('d-none', jumlahTampil > 0);
        });
    });
</script>
@endpush
