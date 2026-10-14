@extends('layouts.main')

@section('title', 'Beranda')
@section('meta_description', 'Website Pusat Informasi KKN Kelompok 125 Desa Ciliang, Kecamatan Parigi, Kabupaten Pangandaran.')
@section('og_title', 'Beranda | KKN Kelompok 125 Desa Ciliang')

@section('content')

<section class="text-white position-relative overflow-hidden" style="padding: 100px 0 140px; background: linear-gradient(135deg, rgba(13,71,161,0.92) 0%, rgba(21,101,192,0.88) 50%, rgba(46,125,50,0.90) 100%), url('{{ asset('images/bgberanda.jpg') }}') center/cover no-repeat;">
    <div class="container position-relative" style="z-index: 2;">
        <div class="row align-items-center">
            <div class="col-lg-7" data-aos="fade-up">
                <span class="badge-soft" style="background: rgba(255,255,255,0.15); color: white;">
                    <i class="bi bi-calendar-event"></i> Periode Juli — Agustus 2026
                </span>
                <h1 class="font-heading fw-bold mt-3 mb-3" style="font-size: 2.8rem; line-height: 1.2;">
                    KKN Kelompok 125<br>Desa Ciliang
                </h1>
                <p class="mb-4 fs-5" style="color: rgba(255,255,255,0.85); max-width: 520px;">
                    Pusat informasi resmi kegiatan Kuliah Kerja Nyata — dokumentasi program kerja, profil desa, dan potensi masyarakat Ciliang, Kecamatan Parigi, Kabupaten Pangandaran.
                </p>
                <div class="d-flex flex-wrap gap-3">
                    <a href="{{ url('/program-kerja') }}" class="btn btn-light btn-lg rounded-pill px-4 fw-semibold">
                        <i class="bi bi-list-task"></i> Lihat Program Kerja
                    </a>
                    <a href="{{ url('/profil-desa') }}" class="btn-outline-utama d-inline-flex align-items-center">
                        <i class="bi bi-geo-alt-fill me-2"></i> Profil Desa
                    </a>
                </div>
            </div>
            <div class="col-lg-5 d-none d-lg-block" data-aos="fade-left" data-aos-delay="150">
                <!-- COUNTDOWN -->
                <div class="p-4 rounded-4" style="background: rgba(255,255,255,0.1); backdrop-filter: blur(10px);">
                    <p class="text-center fw-semibold mb-3" style="color: rgba(255,255,255,0.9);">
                        <i class="bi bi-hourglass-split"></i> Countdown Akhir KKN
                    </p>
                    <div class="row g-2 text-center" id="countdown">
                        <div class="col-3">
                            <div class="p-3 rounded-3" style="background: rgba(255,255,255,0.15);">
                                <h2 class="font-heading fw-bold mb-0" id="cd-hari">00</h2>
                                <p class="small mb-0" style="color: rgba(255,255,255,0.8);">Hari</p>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="p-3 rounded-3" style="background: rgba(255,255,255,0.15);">
                                <h2 class="font-heading fw-bold mb-0" id="cd-jam">00</h2>
                                <p class="small mb-0" style="color: rgba(255,255,255,0.8);">Jam</p>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="p-3 rounded-3" style="background: rgba(255,255,255,0.15);">
                                <h2 class="font-heading fw-bold mb-0" id="cd-menit">00</h2>
                                <p class="small mb-0" style="color: rgba(255,255,255,0.8);">Menit</p>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="p-3 rounded-3" style="background: rgba(255,255,255,0.15);">
                                <h2 class="font-heading fw-bold mb-0" id="cd-detik">00</h2>
                                <p class="small mb-0" style="color: rgba(255,255,255,0.8);">Detik</p>
                            </div>
                        </div>
                    </div>
                    <p class="text-center small mt-3 mb-0" style="color: rgba(255,255,255,0.7);">
                        <i class="bi bi-flag-fill"></i> Target selesai: 31 Agustus 2026
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div style="position: absolute; bottom: -60px; right: -60px; width: 220px; height: 220px; background: rgba(255,255,255,0.06); border-radius: 50%;"></div>
    <div style="position: absolute; top: -40px; left: 30%; width: 140px; height: 140px; background: rgba(255,255,255,0.05); border-radius: 50%;"></div>
</section>

<section style="margin-top: -70px; position: relative; z-index: 3;">
    <div class="container">
        <div class="row g-3 g-md-4" data-aos="fade-up">
            <div class="col-6 col-md-3">
                <div class="card-modern text-center p-4">
                    <i class="bi bi-clipboard-check-fill fs-2 text-biru"></i>
                    <h2 class="font-heading fw-bold mt-2 mb-0" data-target="5">0</h2>
                    <p class="text-secondary small mb-0">Program Kerja</p>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="card-modern text-center p-4">
                    <i class="bi bi-people-fill fs-2 text-hijau"></i>
                    <h2 class="font-heading fw-bold mt-2 mb-0" data-target="15">0</h2>
                    <p class="text-secondary small mb-0">Peserta</p>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="card-modern text-center p-4">
                    <i class="bi bi-images fs-2 text-merah"></i>
                    <h2 class="font-heading fw-bold mt-2 mb-0" data-target="5">0</h2>
                    <p class="text-secondary small mb-0">Foto</p>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="card-modern text-center p-4">
                    <i class="bi bi-newspaper fs-2 text-biru"></i>
                    <h2 class="font-heading fw-bold mt-2 mb-0" data-target="1">0</h2>
                    <p class="text-secondary small mb-0">Artikel</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5 mt-4">
    <div class="container py-4">
        <div class="row align-items-center g-5">
            <div class="col-lg-6" data-aos="fade-right">
                <div class="card-modern overflow-hidden" style="height: 320px;">
    <img src="{{ asset('images/ciliang.jpg') }}" alt="Desa Ciliang" class="w-100 h-100" style="object-fit: cover;">
</div>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <span class="section-tag">Tentang Kami</span>
                <h2 class="font-heading fw-bold mb-3">Mengabdi untuk<br>Desa Ciliang</h2>
                <p class="text-secondary mb-4">
                    Kelompok 125 KKN melaksanakan program pengabdian di Desa Ciliang dengan fokus pada
                    pendidikan, kesehatan, lingkungan, dan pemberdayaan ekonomi masyarakat. Website ini
                    menjadi media dokumentasi dan publikasi seluruh kegiatan kami selama periode KKN.
                </p>
                <a href="{{ url('/profil-kelompok') }}" class="btn-utama d-inline-flex align-items-center">
                    Kenali Kelompok Kami <i class="bi bi-arrow-right ms-2"></i>
                </a>
            </div>
        </div>
    </div>
</section>

<section class="py-5" style="background: white;">
    <div class="container py-4">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="section-tag">Eksplorasi</span>
            <h2 class="font-heading fw-bold">Jelajahi Website Kami</h2>
            <p class="text-secondary">Semua informasi seputar KKN dan Desa Ciliang dalam satu tempat</p>
        </div>
        <div class="row g-4">
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="0">
                <a href="{{ url('/program-kerja') }}" class="card-modern d-block p-4 text-decoration-none h-100">
                    <div class="rounded-circle d-flex align-items-center justify-content-center mb-3" style="width: 56px; height: 56px; background: rgba(21,101,192,0.1);">
                        <i class="bi bi-list-task fs-4 text-biru"></i>
                    </div>
                    <h5 class="font-heading fw-semibold text-dark">Program Kerja</h5>
                    <p class="text-secondary small mb-0">Lihat seluruh rangkaian program kerja KKN Kelompok 125.</p>
                </a>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                <a href="{{ url('/galeri') }}" class="card-modern d-block p-4 text-decoration-none h-100">
                    <div class="rounded-circle d-flex align-items-center justify-content-center mb-3" style="width: 56px; height: 56px; background: rgba(211,47,47,0.1);">
                        <i class="bi bi-images fs-4 text-merah"></i>
                    </div>
                    <h5 class="font-heading fw-semibold text-dark">Galeri Dokumentasi</h5>
                    <p class="text-secondary small mb-0">Momen-momen kegiatan KKN yang terdokumentasi.</p>
                </a>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                <a href="{{ url('/umkm') }}" class="card-modern d-block p-4 text-decoration-none h-100">
                    <div class="rounded-circle d-flex align-items-center justify-content-center mb-3" style="width: 56px; height: 56px; background: rgba(46,125,50,0.1);">
                        <i class="bi bi-shop fs-4 text-hijau"></i>
                    </div>
                    <h5 class="font-heading fw-semibold text-dark">UMKM Desa</h5>
                    <p class="text-secondary small mb-0">Dukung produk dan usaha masyarakat Desa Ciliang.</p>
                </a>
            </div>
        </div>
    </div>
</section>

@endsection

@push('scripts')
<script>
    // Ganti tanggal ini sesuai tanggal akhir KKN kamu
    const tanggalAkhirKKN = new Date('2026-08-31T23:59:59');

    function updateCountdown() {
        const sekarang = new Date();
        const selisih = tanggalAkhirKKN - sekarang;

        if (selisih <= 0) {
            document.getElementById('countdown').innerHTML =
                '<div class="col-12 text-center fw-bold fs-5">🎉 KKN Telah Selesai!</div>';
            return;
        }

        const hari = Math.floor(selisih / (1000 * 60 * 60 * 24));
        const jam = Math.floor((selisih % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const menit = Math.floor((selisih % (1000 * 60 * 60)) / (1000 * 60));
        const detik = Math.floor((selisih % (1000 * 60)) / 1000);

        document.getElementById('cd-hari').textContent = String(hari).padStart(2, '0');
        document.getElementById('cd-jam').textContent = String(jam).padStart(2, '0');
        document.getElementById('cd-menit').textContent = String(menit).padStart(2, '0');
        document.getElementById('cd-detik').textContent = String(detik).padStart(2, '0');
    }

    updateCountdown();
    setInterval(updateCountdown, 1000);
</script>
@endpush
