@extends('layouts.main')

@section('title', 'Program Kerja')

@section('content')

<section class="bg-gradient-utama text-white text-center" style="padding: 80px 0 60px;">
    <div class="container" data-aos="fade-up">
        <span class="badge-soft" style="background: rgba(255,255,255,0.15); color: white;">
            <i class="bi bi-list-task"></i> Kegiatan Kami
        </span>
        <h1 class="font-heading fw-bold mt-3 mb-2">Program Kerja</h1>
        <p class="mb-0" style="color: rgba(255,255,255,0.85);">Rangkaian kegiatan KKN Kelompok 125 di Desa Ciliang</p>
    </div>
</section>

<section class="py-5">
    <div class="container py-3">
        <div class="row g-4">
            @forelse ($programs as $index => $program)
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="{{ ($index % 3) * 100 }}">
                <div class="card-modern p-4 h-100">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <span class="badge-soft
                            @if($program->status == 'Selesai') badge-soft-hijau
                            @elseif($program->status == 'Berlangsung') badge-soft-biru
                            @else badge-soft-merah
                            @endif">
                            {{ $program->status }}
                        </span>
                        <i class="bi bi-tag-fill text-secondary"></i>
                    </div>
                    <h5 class="font-heading fw-semibold mb-2">{{ $program->judul }}</h5>
                    <p class="text-secondary small mb-3" style="line-height: 1.6;">{{ $program->deskripsi }}</p>
                    <div class="d-flex align-items-center gap-2 small text-secondary pt-2" style="border-top: 1px solid #F0EEE7;">
                        <i class="bi bi-folder2"></i> {{ $program->kategori }}
                        @if($program->tanggal_kegiatan)
                        <span class="ms-auto"><i class="bi bi-calendar3"></i> {{ \Carbon\Carbon::parse($program->tanggal_kegiatan)->format('d M Y') }}</span>
                        @endif
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center text-secondary py-5">
                <i class="bi bi-clipboard-x fs-1 mb-3 d-block"></i>
                Belum ada program kerja yang ditambahkan.
            </div>
            @endforelse
        </div>
    </div>
</section>

@endsection
