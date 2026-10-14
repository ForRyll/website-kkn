@extends('layouts.main')

@section('title', 'Berita')

@section('content')

<section class="bg-gradient-utama text-white text-center" style="padding: 80px 0 60px;">
    <div class="container" data-aos="fade-up">
        <span class="badge-soft" style="background: rgba(255,255,255,0.15); color: white;">
            <i class="bi bi-newspaper"></i> Update Terbaru
        </span>
        <h1 class="font-heading fw-bold mt-3 mb-2">Berita Harian</h1>
        <p class="mb-0" style="color: rgba(255,255,255,0.85);">Kabar terbaru seputar kegiatan KKN Kelompok 125</p>
    </div>
</section>

<section class="py-5">
    <div class="container py-3">
        <div class="row g-4">
            @forelse ($beritas as $index => $berita)
            <div class="col-md-6" data-aos="fade-up" data-aos-delay="{{ ($index % 2) * 100 }}">
                <div class="card-modern h-100 berita-card"
                     style="cursor: pointer;"
                     data-bs-toggle="modal"
                     data-bs-target="#modalBerita"
                     data-judul="{{ $berita->judul }}"
                     data-isi="{{ $berita->isi }}"
                     data-penulis="{{ $berita->penulis }}"
                     data-tempat="{{ $berita->tempat ?? '-' }}"
                     data-tanggal="{{ $berita->created_at->format('d M Y') }}"
                     data-gambar="{{ $berita->gambar ? asset('uploads/berita/' . $berita->gambar) : '' }}">

                    @if($berita->gambar && file_exists(public_path('uploads/berita/' . $berita->gambar)))
                        <div class="overflow-hidden" style="height: 200px;">
                            <img src="{{ asset('uploads/berita/' . $berita->gambar) }}"
                                 alt="{{ $berita->judul }}"
                                 class="w-100 h-100"
                                 style="object-fit: cover; transition: transform 0.4s ease;">
                        </div>
                    @else
                        <div class="d-flex align-items-center justify-content-center"
                             style="height: 200px; background: linear-gradient(135deg, #E8F0FE, #E6F4EA);">
                            <i class="bi bi-newspaper fs-1 text-biru" style="opacity: 0.3;"></i>
                        </div>
                    @endif

                    <div class="p-4">
                        <div class="d-flex align-items-center gap-2 mb-2 small text-secondary">
                            <span class="badge-soft badge-soft-hijau">
                                <i class="bi bi-person-fill"></i> {{ $berita->penulis }}
                            </span>
                            <span><i class="bi bi-calendar3"></i> {{ $berita->created_at->format('d M Y') }}</span>
                        </div>
                        <h5 class="font-heading fw-semibold mb-2">{{ $berita->judul }}</h5>
                        @if($berita->tempat)
                        <p class="small text-secondary mb-2">
                            <i class="bi bi-geo-alt-fill text-merah"></i> {{ $berita->tempat }}
                        </p>
                        @endif
                        <p class="text-secondary small mb-2" style="line-height: 1.6;">
                            {{ Str::limit($berita->isi, 100) }}
                        </p>
                        <p class="small text-biru mb-0"><i class="bi bi-eye"></i> Baca Selengkapnya</p>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center text-secondary py-5">
                <i class="bi bi-newspaper fs-1 mb-3 d-block"></i>
                Belum ada berita yang ditambahkan.
            </div>
            @endforelse
        </div>
    </div>
</section>

<!-- MODAL DETAIL BERITA -->
<div class="modal fade" id="modalBerita" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0 rounded-4 overflow-hidden">

            <!-- Foto Header -->
            <div id="modal-berita-foto-wrapper" style="position: relative; max-height: 280px; overflow: hidden;">
                <img id="modal-berita-foto" src="" alt=""
                     class="w-100" style="object-fit: cover; height: 280px; display: none;">
                <div id="modal-berita-foto-placeholder"
                     class="bg-gradient-utama d-flex align-items-center justify-content-center"
                     style="height: 160px; display: none;">
                    <i class="bi bi-newspaper text-white" style="font-size: 4rem; opacity: 0.3;"></i>
                </div>
                <button type="button"
                        class="btn-close btn-close-white position-absolute top-0 end-0 m-3"
                        data-bs-dismiss="modal"
                        style="background-color: rgba(0,0,0,0.3); border-radius: 50%; padding: 8px;"></button>
            </div>

            <!-- Body -->
            <div class="modal-body p-4">
                <div class="d-flex flex-wrap gap-2 mb-3">
                    <span class="badge-soft badge-soft-hijau" id="modal-berita-penulis"></span>
                    <span class="badge-soft badge-soft-biru" id="modal-berita-tanggal"></span>
                    <span class="badge-soft badge-soft-merah" id="modal-berita-tempat-badge"></span>
                </div>
                <h4 class="font-heading fw-bold mb-3" id="modal-berita-judul"></h4>
                <div id="modal-berita-isi" class="text-secondary" style="line-height: 1.8; white-space: pre-line;"></div>
            </div>

        </div>
    </div>
</div>

@endsection

@push('styles')
<style>
    .berita-card {
        transition: all 0.35s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }

    .berita-card:hover {
        transform: translateY(-6px);
    }

    .berita-card:hover img {
        transform: scale(1.05);
    }
</style>
@endpush

@push('scripts')
<script>
    const modalBerita = document.getElementById('modalBerita');

    modalBerita.addEventListener('show.bs.modal', function(event) {
        const card = event.relatedTarget;

        const judul = card.dataset.judul;
        const isi = card.dataset.isi;
        const penulis = card.dataset.penulis;
        const tempat = card.dataset.tempat;
        const tanggal = card.dataset.tanggal;
        const gambar = card.dataset.gambar;

        document.getElementById('modal-berita-judul').textContent = judul;
        document.getElementById('modal-berita-isi').textContent = isi;
        document.getElementById('modal-berita-penulis').innerHTML = '<i class="bi bi-person-fill me-1"></i>' + penulis;
        document.getElementById('modal-berita-tanggal').innerHTML = '<i class="bi bi-calendar3 me-1"></i>' + tanggal;

        const tempatBadge = document.getElementById('modal-berita-tempat-badge');
        if (tempat && tempat !== '-') {
            tempatBadge.innerHTML = '<i class="bi bi-geo-alt-fill me-1"></i>' + tempat;
            tempatBadge.style.display = 'inline-block';
        } else {
            tempatBadge.style.display = 'none';
        }

        const foto = document.getElementById('modal-berita-foto');
        const placeholder = document.getElementById('modal-berita-foto-placeholder');

        if (gambar) {
            foto.src = gambar;
            foto.style.display = 'block';
            placeholder.style.display = 'none';
        } else {
            foto.style.display = 'none';
            placeholder.style.display = 'flex';
        }
    });
</script>
@endpush
