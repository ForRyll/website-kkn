@extends('layouts.main')

@section('title', 'Galeri')
@section('meta_description', 'Galeri foto dokumentasi kegiatan KKN Kelompok 125 di Desa Ciliang.')
@section('og_title', 'Galeri | KKN Kelompok 125 Desa Ciliang')

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

        <!-- FILTER -->
        <div class="d-flex flex-wrap justify-content-center gap-2 mb-5">
            <a href="{{ url('/galeri') }}" class="btn-filter {{ !request()->has('kategori') ? 'active' : '' }}">Semua</a>
            @foreach(['Kegiatan', 'Lingkungan', 'Masyarakat', 'Lainnya'] as $kat)
                <a href="{{ url('/galeri?kategori=' . $kat) }}" class="btn-filter {{ request()->kategori == $kat ? 'active' : '' }}">{{ $kat }}</a>
            @endforeach
        </div>

        <!-- GRID -->
        <div class="row g-4">
            @forelse ($galeris as $index => $galeri)
            <div class="col-md-4 col-6" data-aos="fade-up" data-aos-delay="{{ ($index % 3) * 100 }}">
                <div class="card-modern h-100">
                    <div class="overflow-hidden" style="height: 220px;">
                        @if($galeri->gambar && file_exists(public_path('uploads/galeri/' . $galeri->gambar)))
                            <img src="{{ asset('uploads/galeri/' . $galeri->gambar) }}" alt="{{ $galeri->judul }}" class="w-100 h-100" loading="lazy" style="object-fit: cover;">
                        @endif
                    </div>
                    <div class="p-3">
                        <span class="badge-soft badge-soft-hijau mb-2 d-inline-block">{{ $galeri->kategori }}</span>
                        <h6 class="font-heading fw-semibold mb-0">{{ $galeri->judul }}</h6>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center text-secondary py-5">Belum ada foto.</div>
            @endforelse
        </div>

        <div class="mt-5">{{ $galeris->links('pagination::bootstrap-5') }}</div>

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
