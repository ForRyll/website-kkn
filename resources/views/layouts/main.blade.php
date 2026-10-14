<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- PWA -->
<link rel="manifest" href="/manifest.json">
<meta name="theme-color" content="#1565C0">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<meta name="apple-mobile-web-app-title" content="KKN 125">
<link rel="apple-touch-icon" href="{{ asset('images/logoweb.png') }}">
    <title>@yield('title', 'Beranda') | KKN Kelompok 125 Desa Ciliang</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.1/dist/aos.css">

    <style>
        :root {
            --biru: #1565C0;
            --biru-tua: #0D47A1;
            --hijau: #2E7D32;
            --hijau-muda: #66BB6A;
            --merah: #D32F2F;
            --cream: #FAF7F0;
            --abu-teks: #5C6670;
        }

        * { box-sizing: border-box; margin: 0; padding: 0; }

        html { scroll-behavior: smooth; }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: var(--cream);
            color: #2A2E33;
            overflow-x: hidden;
        }

        h1, h2, h3, h4, h5, .font-heading { font-family: 'Poppins', sans-serif; }
        a { text-decoration: none; }

        /* ===== PAGE LOADER ===== */
        #page-loader {
            position: fixed;
            inset: 0;
            background: linear-gradient(135deg, var(--biru-tua), var(--hijau));
            z-index: 9999;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            transition: opacity 0.5s ease, visibility 0.5s ease;
        }

        #page-loader.hidden {
            opacity: 0;
            visibility: hidden;
        }

        .loader-logo {
            width: 64px;
            height: 64px;
            border-radius: 16px;
            background: rgba(255,255,255,0.2);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            color: white;
            margin-bottom: 20px;
            animation: pulse 1.2s ease infinite;
        }

        .loader-bar {
            width: 180px;
            height: 4px;
            background: rgba(255,255,255,0.2);
            border-radius: 10px;
            overflow: hidden;
            margin-top: 16px;
        }

        .loader-bar-fill {
            height: 100%;
            background: white;
            border-radius: 10px;
            animation: loading 1.2s ease forwards;
        }

        @keyframes loading {
            from { width: 0%; }
            to { width: 100%; }
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.08); }
        }

        /* ===== NAVBAR ===== */
        .navbar-kkn {
            background-color: rgba(255,255,255,0.95);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            box-shadow: 0 2px 20px rgba(0,0,0,0.06);
            padding: 14px 0;
            transition: all 0.4s ease;
        }

        .navbar-toggler {
            padding: 0.4rem 0.6rem;
            border: 1px solid rgba(21, 101, 192, 0.2);
            transition: all 0.3s ease;
        }

        .navbar-toggler:focus {
            box-shadow: 0 0 0 3px rgba(21, 101, 192, 0.15);
            outline: none;
        }

        .navbar-kkn.scrolled {
            padding: 10px 0;
            box-shadow: 0 4px 30px rgba(0,0,0,0.1);
        }

        .navbar-kkn.hide {
            transform: translateY(-100%);
        }

        .navbar-kkn .navbar-brand {
            font-family: 'Poppins', sans-serif;
            font-weight: 700;
            font-size: 1.2rem;
            color: var(--biru-tua) !important;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .logo-icon {
            width: 38px;
            height: 38px;
            border-radius: 10px;
            background: linear-gradient(135deg, var(--biru), var(--hijau));
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.1rem;
            flex-shrink: 0;
        }

        .navbar-kkn .nav-link {
            color: #3C4450 !important;
            font-weight: 500;
            font-size: 0.9rem;
            padding: 8px 14px !important;
            border-radius: 8px;
            transition: all 0.25s ease;
        }

        .navbar-kkn .nav-link:hover,
        .navbar-kkn .nav-link.active {
            color: var(--biru) !important;
            background-color: rgba(21, 101, 192, 0.07);
        }

        .navbar-kkn .nav-link.active { font-weight: 600; }

        /* ===== UTILITAS ===== */
        .text-biru { color: var(--biru) !important; }
        .text-hijau { color: var(--hijau) !important; }
        .text-merah { color: var(--merah) !important; }

        .bg-gradient-utama {
            background: linear-gradient(135deg, var(--biru-tua) 0%, var(--biru) 50%, var(--hijau) 100%);
        }

        /* ===== CARD MODERN ===== */
        .card-modern {
            background: #fff;
            border: none;
            border-radius: 20px;
            box-shadow: 0 4px 24px rgba(20, 30, 50, 0.06);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            overflow: hidden;
            position: relative;
        }

        .card-modern::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0;
            height: 3px;
            background: linear-gradient(90deg, var(--biru), var(--hijau));
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 0.35s ease;
        }

        .card-modern:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(20, 30, 50, 0.14);
        }

        .card-modern:hover::before { transform: scaleX(1); }

        /* ===== BADGE ===== */
        .badge-soft {
            font-weight: 600;
            font-size: 0.72rem;
            padding: 5px 14px;
            border-radius: 50px;
            letter-spacing: 0.3px;
        }

        .badge-soft-biru { background: rgba(21,101,192,0.1); color: var(--biru-tua); }
        .badge-soft-hijau { background: rgba(46,125,50,0.1); color: var(--hijau); }
        .badge-soft-merah { background: rgba(211,47,47,0.1); color: var(--merah); }

        /* ===== TOMBOL ===== */
        .btn-utama {
            background: linear-gradient(135deg, var(--biru), var(--hijau));
            border: none;
            color: white;
            font-weight: 600;
            padding: 12px 30px;
            border-radius: 50px;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-utama:hover {
            color: white;
            transform: translateY(-3px);
            box-shadow: 0 10px 24px rgba(21, 101, 192, 0.4);
        }

        .btn-outline-utama {
            border: 1.5px solid rgba(255,255,255,0.7);
            color: white;
            font-weight: 600;
            padding: 12px 30px;
            border-radius: 50px;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-outline-utama:hover {
            background: white;
            color: var(--biru-tua);
            transform: translateY(-3px);
        }

        /* ===== SECTION TAG ===== */
        .section-tag {
            display: inline-block;
            background: rgba(46,125,50,0.1);
            color: var(--hijau);
            font-weight: 700;
            font-size: 0.75rem;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            padding: 6px 18px;
            border-radius: 50px;
            margin-bottom: 14px;
        }

        /* ===== RIPPLE EFFECT ===== */
        .ripple {
            position: relative;
            overflow: hidden;
        }

        .ripple::after {
            content: '';
            position: absolute;
            border-radius: 50%;
            background: rgba(255,255,255,0.3);
            transform: scale(0);
            animation: ripple-anim 0.6s linear;
            pointer-events: none;
        }

        @keyframes ripple-anim {
            to { transform: scale(4); opacity: 0; }
        }

        /* ===== FOOTER ===== */
        footer {
            background: #0F1B2A;
            color: #C7D0DA;
        }

        footer h5 {
            color: white;
            font-weight: 600;
            margin-bottom: 16px;
        }

        footer a {
            color: #9AAAB8;
            transition: all 0.2s ease;
            display: inline-block;
        }

        footer a:hover {
            color: var(--hijau-muda);
            transform: translateX(4px);
        }

        footer .social-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: rgba(255,255,255,0.07);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            transition: all 0.3s ease;
            font-size: 1.1rem;
        }

        footer .social-icon:hover {
            background: linear-gradient(135deg, var(--biru), var(--hijau));
            transform: translateY(-4px);
            box-shadow: 0 8px 20px rgba(21,101,192,0.4);
        }

        /* ===== SCROLLBAR ===== */
        ::-webkit-scrollbar { width: 7px; }
        ::-webkit-scrollbar-track { background: var(--cream); }
        ::-webkit-scrollbar-thumb { background: linear-gradient(var(--biru), var(--hijau)); border-radius: 10px; }

        /* ===== BACK TO TOP ===== */
        #back-to-top {
            position: fixed;
            bottom: 28px;
            right: 28px;
            width: 46px;
            height: 46px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--biru), var(--hijau));
            color: white;
            border: none;
            font-size: 1.2rem;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            z-index: 999;
            opacity: 0;
            visibility: hidden;
            transform: translateY(16px);
            transition: all 0.35s ease;
            box-shadow: 0 6px 20px rgba(21,101,192,0.35);
        }

        #back-to-top.show {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        #back-to-top:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 28px rgba(21,101,192,0.5);
        }

        /* ===== DARK MODE ===== */
body.dark-mode {
    background-color: #0F1B2A;
    color: #C7D0DA;
}

body.dark-mode .navbar-kkn {
    background-color: rgba(15, 27, 42, 0.95) !important;
    box-shadow: 0 2px 20px rgba(0,0,0,0.3);
}

body.dark-mode .navbar-kkn .navbar-brand {
    color: white !important;
}

body.dark-mode .navbar-kkn .nav-link {
    color: #C7D0DA !important;
}

body.dark-mode .navbar-kkn .nav-link:hover,
body.dark-mode .navbar-kkn .nav-link.active {
    color: var(--hijau-muda) !important;
    background-color: rgba(102,187,106,0.1);
}

body.dark-mode .navbar-toggler {
    border-color: rgba(255, 255, 255, 0.2);
}

body.dark-mode .navbar-toggler-icon {
    filter: invert(1) brightness(2);
}

body.dark-mode .navbar-toggler:focus {
    box-shadow: 0 0 0 3px rgba(255, 255, 255, 0.1);
}

body.dark-mode .card-modern {
    background: #1A2A3A;
    box-shadow: 0 4px 24px rgba(0,0,0,0.2);
    color: #C7D0DA;
}

body.dark-mode .card-modern h5,
body.dark-mode .card-modern h6,
body.dark-mode .card-modern p,
body.dark-mode .card-modern .text-dark {
    color: #C7D0DA !important;
}

body.dark-mode .text-secondary {
    color: #7A8896 !important;
}

body.dark-mode section[style*="background: white"],
body.dark-mode section[style*="background-color: white"] {
    background: #162030 !important;
}

body.dark-mode .bg-cream,
body.dark-mode [style*="background-color: #f8f9fa"] {
    background-color: #0F1B2A !important;
}

body.dark-mode .btn-filter {
    background: #1A2A3A;
    border-color: #2A3A4A;
    color: #C7D0DA;
}

body.dark-mode .btn-filter.active {
    background: linear-gradient(135deg, var(--biru), var(--hijau));
    border-color: transparent;
    color: white;
}

/* Toggle switch */
.dark-toggle {
    width: 46px;
    height: 26px;
    background: #dee2e6;
    border-radius: 50px;
    position: relative;
    cursor: pointer;
    transition: background 0.3s ease;
    border: none;
    flex-shrink: 0;
}

.dark-toggle::after {
    content: '';
    position: absolute;
    width: 20px;
    height: 20px;
    background: white;
    border-radius: 50%;
    top: 3px;
    left: 3px;
    transition: transform 0.3s ease;
    box-shadow: 0 2px 6px rgba(0,0,0,0.15);
}

body.dark-mode .dark-toggle {
    background: linear-gradient(135deg, var(--biru), var(--hijau));
}

body.dark-mode .dark-toggle::after {
    transform: translateX(20px);
}
        @stack('styles')
    </style>
</head>
<body>

    <!-- PAGE LOADER -->
    <div id="page-loader">
        <div class="loader-logo"><i class="bi bi-houses-fill"></i></div>
        <p style="color: rgba(255,255,255,0.9); font-family: 'Poppins', sans-serif; font-weight: 600; font-size: 1rem;">KKN 125 Ciliang</p>
        <div class="loader-bar"><div class="loader-bar-fill"></div></div>
    </div>

    <!-- BACK TO TOP -->
    <button id="back-to-top" title="Kembali ke atas"><i class="bi bi-arrow-up"></i></button>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-kkn sticky-top" id="navbar-utama">
        <div class="container">
<a class="navbar-brand" href="{{ url('/') }}">
    <img src="{{ asset('images/logoweb.png') }}" alt="Logo KKN" style="height: 38px; width: 38px; border-radius: 50%; object-fit: cover;">
    <img src="{{ asset('images/logowin.png') }}" alt="Logo SIBERMAS" style="height: 38px; width: 38px; border-radius: 50%; object-fit: cover;">
    <span class="ms-1">KKN 125 <span class="text-hijau">Ciliang</span></span>
</a>
            <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarMenu">
                <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-1">
                    <li class="nav-item"><a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ url('/') }}">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->is('profil-kelompok') ? 'active' : '' }}" href="{{ url('/profil-kelompok') }}">Kelompok</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->is('profil-desa') ? 'active' : '' }}" href="{{ url('/profil-desa') }}">Desa</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->is('program-kerja') ? 'active' : '' }}" href="{{ url('/program-kerja') }}">Program Kerja</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->is('berita') ? 'active' : '' }}" href="{{ url('/berita') }}">Berita</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->is('galeri') ? 'active' : '' }}" href="{{ url('/galeri') }}">Galeri</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->is('umkm') ? 'active' : '' }}" href="{{ url('/umkm') }}">UMKM</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->is('qrcode') ? 'active' : '' }}" href="{{ url('/qrcode') }}">QR Code</a></li>
                    <li class="nav-item ms-lg-2 mt-2 mt-lg-0">
                        <a href="{{ url('/lokasi') }}" class="btn btn-utama btn-sm px-4">
                            <i class="bi bi-geo-alt-fill"></i> Lokasi
                        </a>
                    </li>
                    <li class="nav-item ms-lg-3 mt-2 mt-lg-0 d-flex align-items-center gap-2">
                        <i class="bi bi-sun-fill small" style="color: #f59e0b;" id="icon-light"></i>
                        <button class="dark-toggle" id="dark-toggle" title="Toggle Dark Mode"></button>
                        <i class="bi bi-moon-fill small" style="color: #6366f1;" id="icon-dark"></i>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <!-- FOOTER -->
    <footer class="pt-5 pb-4 mt-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-4">
                    <div class="d-flex align-items-center gap-2 mb-3">
                        <span class="logo-icon"><i class="bi bi-houses-fill"></i></span>
                        <span class="fw-bold text-white fs-5">KKN 125 Ciliang</span>
                    </div>
                    <p class="small mb-4" style="line-height: 1.7;">Website Pusat Informasi KKN Kelompok 125, Desa Ciliang, Kecamatan Parigi, Kabupaten Pangandaran.</p>
                    <div class="d-flex gap-2">
                        <a href="#" class="social-icon"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="social-icon"><i class="bi bi-whatsapp"></i></a>
                        <a href="#" class="social-icon"><i class="bi bi-youtube"></i></a>
                    </div>
                </div>
                <div class="col-lg-2 col-6">
                    <h5>Navigasi</h5>
                    <ul class="list-unstyled small">
                        <li class="mb-2"><a href="{{ url('/profil-kelompok') }}">Profil Kelompok</a></li>
                        <li class="mb-2"><a href="{{ url('/program-kerja') }}">Program Kerja</a></li>
                        <li class="mb-2"><a href="{{ url('/berita') }}">Berita</a></li>
                        <li class="mb-2"><a href="{{ url('/galeri') }}">Galeri</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 col-6">
                    <h5>Desa</h5>
                    <ul class="list-unstyled small">
                        <li class="mb-2"><a href="{{ url('/profil-desa') }}">Profil Desa</a></li>
                        <li class="mb-2"><a href="{{ url('/umkm') }}">UMKM</a></li>
                        <li class="mb-2"><a href="{{ url('/lokasi') }}">Lokasi</a></li>
                        <li class="mb-2"><a href="{{ url('/dokumen') }}">Download Dokumen</a></li>
                    </ul>
                </div>
                <div class="col-lg-4">
                    <h5>Kontak</h5>
                    <ul class="list-unstyled small">
                        <li class="mb-3 d-flex align-items-start gap-2">
                            <i class="bi bi-envelope-fill mt-1" style="color: var(--hijau-muda);"></i>
                            kkn125ciliang@email.com
                        </li>
                        <li class="d-flex align-items-start gap-2">
                            <i class="bi bi-geo-alt-fill mt-1" style="color: var(--hijau-muda);"></i>
                            Desa Ciliang, Kec. Parigi, Kab. Pangandaran, Jawa Barat
                        </li>
                    </ul>
                </div>
            </div>
            <hr style="border-color: rgba(255,255,255,0.07); margin: 32px 0 20px;">
            <p class="text-center small mb-0" style="color: #7A8896;">
                &copy; {{ date('Y') }} KKN Kelompok 125 — Desa Ciliang. Dibuat dengan ❤️ menggunakan Laravel.
            </p>
        </div>
    </footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.1/dist/aos.js"></script>
<script>
    // AOS
    AOS.init({ duration: 750, once: true, offset: 60, easing: 'ease-out-cubic' });

    // PAGE LOADER
    window.addEventListener('load', function () {
        setTimeout(function () {
            document.getElementById('page-loader').classList.add('hidden');
        }, 900);
    });

    // NAVBAR SCROLL BEHAVIOR
    const navbar = document.getElementById('navbar-utama');
    let lastScroll = 0;

    window.addEventListener('scroll', function () {
        const currentScroll = window.scrollY;

        if (currentScroll > 80) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }

        if (currentScroll > lastScroll && currentScroll > 200) {
            navbar.classList.add('hide');
        } else {
            navbar.classList.remove('hide');
        }

        lastScroll = currentScroll;

        const backToTop = document.getElementById('back-to-top');
        if (currentScroll > 400) {
            backToTop.classList.add('show');
        } else {
            backToTop.classList.remove('show');
        }
    });

    // BACK TO TOP
    document.getElementById('back-to-top').addEventListener('click', function () {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });

    // COUNT-UP
    function countUp(el, target, duration = 1800) {
        let start = 0;
        const step = target / (duration / 16);
        const timer = setInterval(() => {
            start += step;
            if (start >= target) {
                el.textContent = target;
                clearInterval(timer);
            } else {
                el.textContent = Math.floor(start);
            }
        }, 16);
    }

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const el = entry.target;
                const target = parseInt(el.dataset.target);
                if (!isNaN(target)) countUp(el, target);
                observer.unobserve(el);
            }
        });
    }, { threshold: 0.5 });

    document.querySelectorAll('[data-target]').forEach(el => observer.observe(el));

    // DARK MODE
    const toggle = document.getElementById('dark-toggle');
    const body = document.body;

    // Load preferensi dari localStorage
    if (localStorage.getItem('darkMode') === 'true') {
        body.classList.add('dark-mode');
    }

    toggle.addEventListener('click', function () {
        body.classList.toggle('dark-mode');
        localStorage.setItem('darkMode', body.classList.contains('dark-mode'));
    });
    <!-- PWA Service Worker -->

    if ('serviceWorker' in navigator) {
        window.addEventListener('load', function() {
            navigator.serviceWorker.register('/sw.js').then(function(registration) {
                console.log('SW registered:', registration.scope);
            }).catch(function(error) {
                console.log('SW registration failed:', error);
            });
        });
    }
</script>
@stack('scripts')
</body>
</html>
