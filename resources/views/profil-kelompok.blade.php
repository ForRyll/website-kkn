@extends('layouts.main')

@section('title', 'Profil Kelompok')

@section('content')

<section class="bg-gradient-utama text-white text-center" style="padding: 80px 0 60px;">
    <div class="container" data-aos="fade-up">
        <span class="badge-soft" style="background: rgba(255,255,255,0.15); color: white;">
            <i class="bi bi-people-fill"></i> Tim Kami
        </span>
        <h1 class="font-heading fw-bold mt-3 mb-2">Profil Kelompok 125</h1>
        <p class="mb-0" style="color: rgba(255,255,255,0.85);">Desa Ciliang, Kecamatan Parigi, Kabupaten Pangandaran</p>
    </div>
</section>

<section class="py-5">
    <div class="container py-3">
        <div class="row g-4">
            @forelse ($anggotas as $index => $anggota)
            <div class="col-md-3 col-6" data-aos="fade-up" data-aos-delay="{{ ($index % 4) * 80 }}">
                <div class="card-modern text-center p-4 h-100 anggota-card"
                     style="cursor: pointer;"
                     data-bs-toggle="modal"
                     data-bs-target="#modalAnggota"
                     data-nama="{{ $anggota->nama }}"
                     data-jabatan="{{ $anggota->jabatan }}"
                     data-jurusan="{{ $anggota->jurusan ?? '-' }}"
                     data-alamat="{{ $anggota->alamat ?? '-' }}"
                     data-motto="{{ $anggota->motto ?? '-' }}"
                     data-instagram="{{ $anggota->instagram ?? '' }}"
                     data-foto="{{ $anggota->foto ? asset('uploads/anggota/' . $anggota->foto) : '' }}">

                    @if($anggota->foto && file_exists(public_path('uploads/anggota/' . $anggota->foto)))
                        <img src="{{ asset('uploads/anggota/' . $anggota->foto) }}"
                             class="mx-auto mb-3 rounded-circle"
                             style="width: 84px; height: 84px; object-fit: cover; border: 3px solid #E6F4EA;">
                    @else
                        <div class="mx-auto mb-3 rounded-circle d-flex align-items-center justify-content-center"
                             style="width: 84px; height: 84px; background: linear-gradient(135deg, #E8F0FE, #E6F4EA);">
                            <i class="bi bi-person-fill fs-2 text-hijau"></i>
                        </div>
                    @endif

                    <h5 class="font-heading fw-semibold mb-1">{{ $anggota->nama }}</h5>
                    <span class="badge-soft badge-soft-merah d-inline-block mb-2">{{ $anggota->jabatan }}</span>
                    <p class="text-secondary small mb-2">{{ $anggota->jurusan ?? '-' }}</p>
                    {{-- <p class="small text-biru mb-0"><i class="bi bi-eye"></i> Lihat Detail</p> --}}
                </div>
            </div>
            @empty
            <div class="col-12 text-center text-secondary py-5">
                <i class="bi bi-person-x fs-1 mb-3 d-block"></i>
                Belum ada data anggota.
            </div>
            @endforelse
        </div>
    </div>
</section>

<!-- MODAL DETAIL ANGGOTA -->
<div class="modal fade" id="modalAnggota" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 rounded-4 overflow-hidden">

            <!-- Header gradient -->
            <div class="bg-gradient-utama p-4 text-white text-center position-relative">
                <button type="button" class="btn-close btn-close-white position-absolute top-0 end-0 m-3"
                        data-bs-dismiss="modal"></button>
                <div id="modal-foto-wrapper" class="mx-auto mb-3" style="width: 100px; height: 100px; position: relative;">
    <img id="modal-foto" src="" alt=""
         class="rounded-circle position-absolute top-0 start-0"
         style="width: 100px; height: 100px; object-fit: cover; border: 4px solid rgba(255,255,255,0.4); display: none;">
    <div id="modal-foto-placeholder"
         class="rounded-circle position-absolute top-0 start-0 d-flex align-items-center justify-content-center"
         style="width: 100px; height: 100px; background: rgba(255,255,255,0.2); display: none;">
        {{-- <i class="bi bi-person-fill" style="font-size: 3rem; color: white;"></i> --}}
    </div>
</div>
                <h5 class="font-heading fw-bold mb-1" id="modal-nama"></h5>
                <span class="badge-soft" style="background: rgba(255,255,255,0.2); color: white;" id="modal-jabatan"></span>
            </div>

            <!-- Body -->
            <div class="modal-body p-4">
                <div class="row g-3">
                    <div class="col-12">
                        <div class="d-flex align-items-start gap-3 p-3 rounded-3" style="background: #F8F9FA;">
                            <div class="rounded-circle d-flex align-items-center justify-content-center flex-shrink-0"
                                 style="width: 36px; height: 36px; background: rgba(21,101,192,0.1);">
                                <i class="bi bi-mortarboard-fill text-biru"></i>
                            </div>
                            <div>
                                <p class="small text-secondary mb-0">Program Studi</p>
                                <p class="fw-semibold mb-0" id="modal-jurusan"></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="d-flex align-items-start gap-3 p-3 rounded-3" style="background: #F8F9FA;">
                            <div class="rounded-circle d-flex align-items-center justify-content-center flex-shrink-0"
                                 style="width: 36px; height: 36px; background: rgba(46,125,50,0.1);">
                                <i class="bi bi-geo-alt-fill text-hijau"></i>
                            </div>
                            <div>
                                <p class="small text-secondary mb-0">Alamat</p>
                                <p class="fw-semibold mb-0" id="modal-alamat"></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="d-flex align-items-start gap-3 p-3 rounded-3" style="background: #F8F9FA;">
                            <div class="rounded-circle d-flex align-items-center justify-content-center flex-shrink-0"
                                 style="width: 36px; height: 36px; background: rgba(211,47,47,0.1);">
                                <i class="bi bi-quote text-merah"></i>
                            </div>
                            <div>
                                <p class="small text-secondary mb-0">Motto Hidup</p>
                                <p class="fw-semibold fst-italic mb-0" id="modal-motto"></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12" id="modal-ig-wrapper">
                        <a id="modal-instagram" href="#" target="_blank"
                           class="d-flex align-items-center gap-3 p-3 rounded-3 text-decoration-none"
                           style="background: linear-gradient(135deg, rgba(21,101,192,0.05), rgba(46,125,50,0.05)); border: 1px solid rgba(21,101,192,0.1);">
                            <div class="rounded-circle d-flex align-items-center justify-content-center flex-shrink-0"
                                 style="width: 36px; height: 36px; background: linear-gradient(135deg, #833ab4, #fd1d1d, #fcb045);">
                                <i class="bi bi-instagram text-white"></i>
                            </div>
                            <div>
                                <p class="small text-secondary mb-0">Instagram</p>
                                <p class="fw-semibold text-biru mb-0" id="modal-ig-text"></p>
                            </div>
                            <i class="bi bi-arrow-right ms-auto text-secondary"></i>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- SECTION DPL -->
<section class="py-5" style="background: white;">
    <div class="container py-3">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="section-tag">Pembimbing</span>
            <h2 class="font-heading fw-bold">Dosen Pembimbing Lapangan</h2>
            <p class="text-secondary">Pembimbing resmi KKN Kelompok 125</p>
        </div>

        <div class="row justify-content-center" data-aos="fade-up">
            <div class="col-md-5">
                <div class="card-modern p-4 text-center">
                    <div class="mx-auto mb-3 rounded-circle d-flex align-items-center justify-content-center"
                         style="width: 100px; height: 100px; background: linear-gradient(135deg, #E8F0FE, #E6F4EA);">
                        <i class="bi bi-person-badge-fill" style="font-size: 3rem; color: var(--biru);"></i>
                    </div>
                    <h4 class="font-heading fw-bold mb-1">Asep Amaludin</h4>
                    <span class="badge-soft badge-soft-biru d-inline-block mb-3">Dosen Pembimbing Lapangan</span>
                    <div class="d-flex flex-column gap-2 text-start">
                        <div class="d-flex align-items-center gap-2 p-2 rounded-3" style="background: #F8F9FA;">
                            <i class="bi bi-building text-biru"></i>
                            <span class="small">Dosen Fakultas Dakwah</span>
                        </div>
                        <div class="d-flex align-items-center gap-2 p-2 rounded-3" style="background: #F8F9FA;">
                            <i class="bi bi-envelope-fill text-hijau"></i>
                            <span class="small">087764803030</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@push('styles')
<style>
    .anggota-card {
    transition: all 0.35s cubic-bezier(0.175, 0.885, 0.32, 1.275);
}

.anggota-card:hover {
    transform: translateY(-8px) scale(1.02);
}

.modal-content {
    box-shadow: 0 25px 60px rgba(0,0,0,0.15);
}

#modal-foto-placeholder { display: none; }
#modal-foto { display: none; }

</style>
@endpush

@push('scripts')
<script>
    const modalAnggota = document.getElementById('modalAnggota');

    modalAnggota.addEventListener('show.bs.modal', function (event) {
        const card = event.relatedTarget;

        const nama = card.dataset.nama;
        const jabatan = card.dataset.jabatan;
        const jurusan = card.dataset.jurusan;
        const alamat = card.dataset.alamat;
        const motto = card.dataset.motto;
        const instagram = card.dataset.instagram;
        const foto = card.dataset.foto;

        document.getElementById('modal-nama').textContent = nama;
        document.getElementById('modal-jabatan').textContent = jabatan;
        document.getElementById('modal-jurusan').textContent = jurusan;
        document.getElementById('modal-alamat').textContent = alamat;
        document.getElementById('modal-motto').textContent = motto;

        // Handle foto
        const modalFoto = document.getElementById('modal-foto');
        const modalPlaceholder = document.getElementById('modal-foto-placeholder');

        if (foto) {
            modalFoto.src = foto;
            modalFoto.style.display = 'block';
            modalPlaceholder.style.display = 'none';
        } else {
            modalFoto.style.display = 'none';
            modalPlaceholder.style.display = 'flex';
        }

        // Handle Instagram
        const igWrapper = document.getElementById('modal-ig-wrapper');
        const igLink = document.getElementById('modal-instagram');
        const igText = document.getElementById('modal-ig-text');

        if (instagram) {
            igWrapper.style.display = 'block';
            igText.textContent = instagram;
            const igHandle = instagram.replace('@', '');
            igLink.href = `https://instagram.com/${igHandle}`;
        } else {
            igWrapper.style.display = 'none';
        }
    });
</script>
@endpush
