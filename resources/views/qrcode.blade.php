@extends('layouts.main')

@section('title', 'QR Code Website')

@section('content')

<section class="bg-gradient-utama text-white text-center" style="padding: 80px 0 60px;">
    <div class="container" data-aos="fade-up">
        <span class="badge-soft" style="background: rgba(255,255,255,0.15); color: white;">
            <i class="bi bi-qr-code"></i> Scan & Akses
        </span>
        <h1 class="font-heading fw-bold mt-3 mb-2">QR Code Website</h1>
        <p class="mb-0" style="color: rgba(255,255,255,0.85);">Scan untuk mengakses Website KKN Kelompok 125</p>
    </div>
</section>

<section class="py-5">
    <div class="container py-3">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">

                <!-- KARTU QR CODE -->
                <div class="card-modern p-4 text-center mb-4" data-aos="fade-up">
                    <div class="mb-3">
                        <span class="badge-soft badge-soft-hijau">Website KKN</span>
                    </div>
                    <div id="qrcode-container" class="d-flex justify-content-center mb-3"></div>
                    <p class="small text-secondary mb-1">Scan QR Code ini untuk mengakses</p>
                    <p class="fw-semibold text-biru small" id="url-display">website-kkn.test</p>
                </div>

                <!-- INFO -->
                <div class="card-modern p-4 mb-4" data-aos="fade-up" data-aos-delay="100">
                    <h6 class="font-heading fw-semibold mb-3"><i class="bi bi-info-circle-fill text-biru me-2"></i>Cara Penggunaan</h6>
                    <ul class="list-unstyled small text-secondary mb-0">
                        <li class="mb-2"><i class="bi bi-check-circle-fill text-hijau me-2"></i>Screenshot atau print halaman ini</li>
                        <li class="mb-2"><i class="bi bi-check-circle-fill text-hijau me-2"></i>Tempel di banner/spanduk KKN</li>
                        <li class="mb-2"><i class="bi bi-check-circle-fill text-hijau me-2"></i>Masyarakat bisa scan pakai kamera HP</li>
                        <li><i class="bi bi-check-circle-fill text-hijau me-2"></i>Langsung diarahkan ke website ini</li>
                    </ul>
                </div>

                <!-- TOMBOL PRINT -->
                <div class="text-center" data-aos="fade-up" data-aos-delay="200">
                    <button onclick="cetakQR()" class="btn-utama w-100 justify-content-center mb-2">
                        <i class="bi bi-printer-fill"></i> Cetak QR Code
                    </button>
                    <button onclick="downloadQR()" class="btn w-100 rounded-pill fw-semibold" style="border: 1.5px solid var(--biru); color: var(--biru); padding: 12px 30px;">
                        <i class="bi bi-download"></i> Download PNG
                    </button>
                </div>

            </div>
        </div>
    </div>
</section>

<!-- PRINT AREA (tersembunyi, hanya muncul saat print) -->
<div id="print-area" style="display: none;">
    <div style="text-align: center; padding: 40px; font-family: 'Poppins', sans-serif;">
        <h2 style="color: #0D47A1; margin-bottom: 4px;">KKN Kelompok 125</h2>
        <p style="color: #2E7D32; margin-bottom: 24px;">Desa Ciliang, Kec. Parigi, Kab. Pangandaran</p>
        <div id="qrcode-print" style="display: flex; justify-content: center; margin-bottom: 24px;"></div>
        <p style="color: #5C6670; font-size: 14px;">Scan QR Code untuk mengakses website</p>
        <p style="color: #1565C0; font-weight: 600;" id="url-print"></p>
    </div>
</div>

@endsection

@push('styles')
<style>
    @media print {
        body > *:not(#print-area) { display: none !important; }
        #print-area { display: block !important; }
    }
</style>
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/qrcodejs@1.0.0/qrcode.min.js"></script>
<script>
    const urlWebsite = window.location.origin;

    document.getElementById('url-display').textContent = window.location.host;
    document.getElementById('url-print').textContent = urlWebsite;

    // Generate QR Code utama
    new QRCode(document.getElementById('qrcode-container'), {
        text: urlWebsite,
        width: 220,
        height: 220,
        colorDark: '#0D47A1',
        colorLight: '#ffffff',
        correctLevel: QRCode.CorrectLevel.H
    });

    // Generate QR Code untuk print
    new QRCode(document.getElementById('qrcode-print'), {
        text: urlWebsite,
        width: 280,
        height: 280,
        colorDark: '#0D47A1',
        colorLight: '#ffffff',
        correctLevel: QRCode.CorrectLevel.H
    });

    function cetakQR() {
        window.print();
    }

    function downloadQR() {
        setTimeout(() => {
            const canvas = document.querySelector('#qrcode-container canvas');
            if (canvas) {
                const link = document.createElement('a');
                link.download = 'qrcode-kkn-125-ciliang.png';
                link.href = canvas.toDataURL();
                link.click();
            } else {
                alert('QR Code belum siap, coba lagi sebentar.');
            }
        }, 300);
    }
</script>
@endpush
