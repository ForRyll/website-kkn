@extends('layouts.main')

@section('title', 'Download Dokumen')
@section('meta_description', 'Kumpulan dokumen resmi KKN Kelompok 125 Desa Ciliang.')
@section('og_title', 'Dokumen | KKN Kelompok 125 Desa Ciliang')

@section('content')

<section class="bg-gradient-utama text-white text-center" style="padding: 80px 0 60px;">
    <div class="container" data-aos="fade-up">
        <span class="badge-soft" style="background: rgba(255,255,255,0.15); color: white;">
            <i class="bi bi-file-earmark-arrow-down"></i> Unduhan
        </span>
        <h1 class="font-heading fw-bold mt-3 mb-2">Download Dokumen</h1>
        <p class="mb-0" style="color: rgba(255,255,255,0.85);">Dokumen resmi KKN Kelompok 125 Desa Ciliang</p>
    </div>
</section>

<section class="py-5">
    <div class="container py-3">

        <form method="GET" action="{{ url('/dokumen') }}" class="mb-5 d-flex gap-2">
            <input type="text" name="search" value="{{ request()->search }}" class="form-control rounded-pill" placeholder="Cari dokumen...">
            <button type="submit" class="btn btn-utama rounded-pill px-4">Cari</button>
        </form>

        <div class="row g-4">
            @forelse ($dokumens as $index => $dokumen)
            <div class="col-md-6">
                <div class="card-modern p-4 h-100 d-flex align-items-center gap-4">
                    <div class="rounded-3 d-flex align-items-center justify-content-center flex-shrink-0"
                         style="width: 56px; height: 56px; background: rgba(21,101,192,0.1);">
                        <i class="bi bi-file-earmark-pdf-fill fs-3 text-merah"></i>
                    </div>
                    <div class="flex-grow-1">
                        <span class="badge-soft badge-soft-biru mb-1">{{ $dokumen->kategori }}</span>
                        <h6 class="font-heading fw-semibold mb-1">{{ $dokumen->judul }}</h6>
                        @if($dokumen->deskripsi)<p class="text-secondary small mb-2">{{ $dokumen->deskripsi }}</p>@endif
                        <p class="text-secondary small mb-0"><i class="bi bi-calendar3"></i> {{ $dokumen->created_at->format('d M Y') }}</p>
                    </div>
                    <a href="{{ asset('uploads/dokumen/' . $dokumen->file) }}" class="btn-utama flex-shrink-0 px-3 py-2" download>
                        <i class="bi bi-download"></i>
                    </a>
                </div>
            </div>
            @empty
            <div class="col-12 text-center text-secondary py-5">Belum ada dokumen.</div>
            @endforelse
        </div>

        <div class="mt-5">{{ $dokumens->links('pagination::bootstrap-5') }}</div>
    </div>
</section>

@endsection
