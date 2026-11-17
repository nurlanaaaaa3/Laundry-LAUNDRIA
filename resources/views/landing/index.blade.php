<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LAUNDRIA - Laundry Profesional</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --main-blue: #07549A;
            --dark-blue: #063B70;
            --medium-blue: #1976B8;
            --light-blue: #EAF4FC;
            --off-white: #F8FAFC;
            --border-c: #E5E7EB;
            --text-main: #1F2937;
            --text-sec: #64748B;
        }
        body {
            font-family: 'Poppins', sans-serif;
            color: var(--text-main);
        }
        h1, h2, h3, .brand-font {
            font-family: 'Playfair Display', serif;
        }

        /* Hover naik untuk semua kotak */
        .hover-lift {
            transition: transform 0.25s ease, box-shadow 0.25s ease !important;
        }
        .hover-lift:hover {
            transform: translateY(-8px) !important;
            box-shadow: 0 16px 32px rgba(7,84,154,0.15) !important;
        }

        /* NAVBAR */
        .navbar-laundria {
            background-color: #FFFFFF;
            box-shadow: 0 2px 20px rgba(6, 59, 112, 0.08);
        }
        .navbar-laundria .navbar-brand {
            color: var(--dark-blue) !important;
            font-weight: 700;
            font-size: 36px;
            letter-spacing: 0.5px;
        }

        @media (max-width: 575px) {
            .navbar-laundria .navbar-brand { font-size: 30px; }
        }

        @media (max-width: 991px) {
            .navbar-collapse {
                position: absolute;
                top: 100%;
                right: 16px;
                width: auto;
                max-width: 220px;
                background: #FFFFFF;
                border-radius: 10px;
                box-shadow: 0 8px 24px rgba(6, 59, 112, 0.13);
                padding: 10px 14px;
                margin-top: 6px;
            }
        }

        .navbar-laundria .nav-link {
            color: var(--text-main) !important;
            font-weight: 500;
            position: relative;
            transition: color 0.2s ease;
        }
        .navbar-laundria .nav-link:hover {
            color: var(--main-blue) !important;
        }
        .navbar-laundria .nav-link::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 14px;
            width: 0;
            height: 2px;
            background-color: var(--main-blue);
            transition: width 0.25s ease;
        }
        .navbar-laundria .nav-link:hover::after {
            width: calc(100% - 28px);
        }

        /* Tombol */
        .btn-cta {
            background-color: var(--main-blue);
            border-color: var(--main-blue);
            color: #FFFFFF;
            font-weight: 600;
            border-radius: 8px;
            box-shadow: 0 4px 14px rgba(7, 84, 154, 0.3);
            transition: all 0.2s ease;
        }
        .btn-cta:hover {
            background-color: var(--dark-blue);
            border-color: var(--dark-blue);
            color: #FFFFFF;
            box-shadow: 0 6px 20px rgba(6, 59, 112, 0.4);
            transform: translateY(-2px);
        }

        /* Hero */
        .hero-section {
            background:
                radial-gradient(60% 80% at 85% 20%, rgba(25, 118, 184, 0.12) 0%, rgba(25, 118, 184, 0) 70%),
                linear-gradient(180deg, var(--light-blue) 0%, #FFFFFF 100%);
            padding: 88px 0 72px;
            position: relative;
            overflow: hidden;
        }
        .hero-section h1 {
            color: var(--dark-blue);
            font-size: clamp(2rem, 4.2vw, 3.2rem);
            font-weight: 700;
            line-height: 1.2;
            margin: 0 0 20px;
        }
        .hero-accent { display: block; color: var(--main-blue); }
        .hero-text {
            max-width: 520px;
            margin: 0 0 32px;
            font-size: 1.05rem;
            line-height: 1.8;
            color: var(--text-sec);
        }

        .btn-hero-outline {
            background: transparent;
            border: 1.5px solid var(--main-blue);
            color: var(--main-blue);
            font-weight: 600;
            border-radius: 8px;
            transition: all 0.2s ease;
        }
        .btn-hero-outline:hover {
            background: #FFFFFF;
            border-color: var(--dark-blue);
            color: var(--dark-blue);
            transform: translateY(-2px);
        }

        .hero-photo { position: relative; }
        .hero-photo img {
            display: block;
            width: 100%;
            aspect-ratio: 5 / 4;
            object-fit: cover;
            border-radius: 28px;
            box-shadow: 0 24px 48px -20px rgba(6, 59, 112, 0.30);
        }

        @media (max-width: 991px) {
            .hero-section { padding: 64px 0 56px; }
        }

        section {
            padding: 80px 0;
        }
        .section-title {
            color: var(--dark-blue);
            font-weight: 700;
            margin-bottom: 12px;
        }
        .section-subtitle {
            color: var(--text-sec);
            margin-bottom: 45px;
        }

        /* Tentang Kami */
        .ab-photo {
            position: relative;
            max-width: 440px;
            margin: 0 auto;
        }
        .ab-photo img {
            display: block;
            width: 100%;
            aspect-ratio: 4 / 3;
            object-fit: cover;
            object-position: 50% 25%;
            border-radius: 24px;
            box-shadow: 0 24px 48px -20px rgba(6, 59, 112, 0.4);
        }
        .ab-badge {
            position: absolute;
            z-index: 2;
            left: 16px;
            bottom: 16px;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: #FFFFFF;
            border: 1px solid var(--border-c);
            border-radius: 12px;
            padding: 10px 16px 10px 10px;
            font-size: 13.5px;
            font-weight: 600;
            color: var(--dark-blue);
            box-shadow: 0 8px 24px -8px rgba(6, 59, 112, 0.25);
        }
        .ab-badge-icon {
            width: 36px;
            height: 36px;
            border-radius: 10px;
            display: grid;
            place-items: center;
            background: var(--main-blue);
            color: #FFFFFF;
        }
        .ab-badge-icon svg { width: 18px; height: 18px; }

        .ab-text { max-width: 560px; margin: 0 0 28px; color: var(--text-sec); line-height: 1.8; }

        .ab-features { display: grid; grid-template-columns: repeat(3, 1fr); gap: 16px; margin-bottom: 32px; }
        .ab-ft {
            background: #FFFFFF;
            border: 1.5px solid #CBE5F7;
            border-radius: 16px;
            padding: 20px;
            box-shadow: 0 4px 16px rgba(6, 59, 112, 0.08);
            transition: transform 0.25s ease, box-shadow 0.25s ease;
        }
        .ab-ft:hover {
            transform: translateY(-8px);
            box-shadow: 0 16px 32px rgba(6,59,112,0.15);
            border-color: #07549A;
        }
        .ab-ft-icon {
            width: 42px;
            height: 42px;
            border-radius: 12px;
            display: grid;
            place-items: center;
            background: var(--light-blue);
            color: var(--main-blue);
        }
        .ab-ft-icon svg { width: 22px; height: 22px; }
        .ab-ft-title { font-family: 'Poppins', sans-serif; font-size: 15px; font-weight: 600; color: var(--dark-blue); margin: 14px 0 6px; line-height: 1.4; }
        .ab-ft p { margin: 0; font-size: 13.5px; line-height: 1.7; color: var(--text-sec); }

        @media (max-width: 767px) {
            .ab-features { grid-template-columns: 1fr; }
        }

        /* Kartu Layanan */
        #layanan .p-4 {
            transition: all 0.25s ease;
            box-shadow: 0 4px 16px rgba(15, 23, 42, 0.05);
            border-radius: 14px !important;
        }
        #layanan .p-4:hover {
            transform: translateY(-6px);
            box-shadow: 0 14px 30px rgba(6, 59, 112, 0.14);
            border-color: var(--main-blue) !important;
        }

        /* Cara Kerja */
        .step-card {
            background: #FFFFFF;
            border: 1px solid var(--border-c);
            border-radius: 16px;
            padding: 36px 24px 28px;
            text-align: center;
            height: 100%;
            position: relative;
            transition: all 0.25s ease;
            box-shadow: 0 4px 16px rgba(15, 23, 42, 0.04);
        }
        .step-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 16px 34px rgba(6, 59, 112, 0.14);
            border-color: var(--main-blue);
        }
        .step-badge {
            width: 48px;
            height: 48px;
            background: linear-gradient(135deg, var(--main-blue), var(--medium-blue));
            color: #FFFFFF;
            border-radius: 50%;
            font-size: 20px;
            font-weight: 700;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: -58px auto 18px;
            box-shadow: 0 8px 20px rgba(7, 84, 154, 0.3);
            border: 4px solid var(--off-white);
        }
        .step-card h6 {
            color: var(--dark-blue);
            font-weight: 600;
            margin-bottom: 10px;
        }
        .step-card p {
            color: var(--text-sec);
            font-size: 13.5px;
            line-height: 1.7;
            margin-bottom: 0;
        }

        /* Kontak */
        html { scroll-padding-top: 80px; }

        .kt-grid { display: grid; grid-template-columns: 1.25fr 1fr 1fr; gap: 24px; align-items: stretch; }
        .kt-card {
            background: #FFFFFF; border: 1px solid var(--border-c); border-radius: 20px;
            padding: 32px 28px; display: flex; flex-direction: column; text-align: left;
            box-shadow: 0 1px 2px rgba(6,59,112,.04), 0 12px 32px -16px rgba(6,59,112,.18);
            transition: transform 0.25s ease, box-shadow 0.25s ease;
        }
        .kt-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 16px 32px rgba(6,59,112,0.2);
        }
        .kt-card h3 { font-family: 'Poppins', sans-serif; font-size: 1.05rem; font-weight: 600; color: var(--dark-blue); margin: 20px 0 10px; }
        .kt-icon { width: 52px; height: 52px; border-radius: 14px; display: grid; place-items: center; background: var(--light-blue); color: var(--main-blue); }
        .kt-icon svg { width: 24px; height: 24px; }

        .kt-main { background: linear-gradient(160deg, var(--main-blue), var(--dark-blue)); border-color: var(--dark-blue); box-shadow: 0 24px 48px -20px rgba(6,59,112,.55); }
        .kt-main .kt-icon { background: rgba(255,255,255,.14); color: #FFFFFF; }
        .kt-main h3 { color: #CFE3F7; }
        .kt-number { font-size: clamp(1.6rem, 2.6vw, 2rem); font-weight: 600; color: #FFFFFF; text-decoration: none; margin-bottom: 12px; width: max-content; max-width: 100%; }
        .kt-number:hover { color: #FFFFFF; text-decoration: underline; text-underline-offset: 6px; }
        .kt-note { margin: 0 0 28px; font-size: 14px; line-height: 1.7; color: #CFE3F7; }
        .kt-btn {
            margin-top: auto; display: inline-flex; justify-content: center; align-items: center;
            background: #FFFFFF; color: var(--dark-blue); font-weight: 600; font-size: 15px;
            text-decoration: none; padding: 14px 22px; border-radius: 12px;
            transition: background-color .2s ease, transform .2s ease;
        }
        .kt-btn:hover { background: var(--light-blue); color: var(--dark-blue); transform: translateY(-2px); }

        .kt-text { margin: 0 0 18px; color: var(--text-main); line-height: 1.6; }
        .kt-link { margin-top: auto; color: var(--main-blue); font-weight: 500; font-size: 14px; text-decoration: underline; text-underline-offset: 5px; }
        .kt-link:hover { color: var(--dark-blue); }

        .kt-top { display: flex; justify-content: space-between; align-items: flex-start; gap: 12px; }
        .kt-status {
            display: inline-flex; align-items: center; gap: 8px; font-size: 12.5px; font-weight: 500;
            padding: 6px 12px; border-radius: 999px; background: var(--off-white);
            border: 1px solid var(--border-c); color: var(--text-sec);
        }
        .kt-status::before { content: ""; width: 8px; height: 8px; border-radius: 50%; background: currentColor; }
        .kt-status.is-open { color: #1F9D63; background: #EAF7F0; border-color: #CDEBDC; }
        .kt-status.is-closed { color: #C2453D; background: #FBEEED; border-color: #F3D4D1; }

        .kt-hours { list-style: none; margin: 0; padding: 0; }
        .kt-hours li { display: flex; justify-content: space-between; gap: 12px; padding: 12px; margin: 0 -12px; border-radius: 10px; font-size: 14px; color: var(--text-sec); }
        .kt-hours li + li { border-top: 1px solid var(--border-c); }
        .kt-hours b { font-weight: 500; color: var(--text-main); white-space: nowrap; }
        .kt-hours li.is-closed b { color: #C2453D; }
        .kt-hours li.is-today { background: var(--light-blue); border-top-color: transparent; color: var(--dark-blue); font-weight: 600; }
        .kt-hours li.is-today + li { border-top-color: transparent; }
        .kt-hours li.is-today b { color: var(--dark-blue); font-weight: 600; }

        #kontak a:focus-visible { outline: 3px solid #7FB0EA; outline-offset: 3px; border-radius: 8px; }

        @media (max-width: 991px) {
            .kt-grid { grid-template-columns: 1fr 1fr; }
            .kt-main { grid-column: 1 / -1; }
        }
        @media (max-width: 575px) {
            .kt-grid { grid-template-columns: 1fr; }
        }

        /* Footer */
        footer.ft {
            background-color: #063B70;
            background-image: linear-gradient(160deg, #063B70 0%, #052C54 100%);
            color: #B9D2EC;
            padding: 72px 0 0;
        }
        .ft-brand {
            font-family: 'Playfair Display', serif;
            font-size: 1.6rem;
            font-weight: 700;
            letter-spacing: 0.3px;
            color: #FFFFFF;
            margin: 0 0 16px;
        }
        .ft-desc { font-size: 14.5px; line-height: 1.8; max-width: 360px; margin: 0; }
        .ft-title { font-family: 'Poppins', sans-serif; font-size: 1rem; font-weight: 600; color: #FFFFFF; margin: 0 0 20px; }

        .ft-links { list-style: none; margin: 0; padding: 0; display: grid; gap: 12px; }
        .ft-links a { color: #B9D2EC; font-size: 14.5px; text-decoration: none; transition: color 0.2s ease; }
        .ft-links a:hover { color: #FFFFFF; text-decoration: underline; text-underline-offset: 5px; }

        .ft-contact { list-style: none; margin: 0 0 24px; padding: 0; display: grid; gap: 14px; }
        .ft-contact li { display: flex; gap: 12px; font-size: 14.5px; line-height: 1.6; }
        .ft-contact svg { flex: none; width: 18px; height: 18px; margin-top: 3px; color: #7FB0EA; }
        .ft-contact a { color: #FFFFFF; font-weight: 500; text-decoration: none; }
        .ft-contact a:hover { text-decoration: underline; text-underline-offset: 5px; }

        .ft-btn {
            display: inline-flex;
            align-items: center;
            background: #FFFFFF;
            color: var(--dark-blue);
            font-weight: 600;
            font-size: 15px;
            text-decoration: none;
            padding: 12px 24px;
            border-radius: 12px;
            transition: background-color 0.2s ease, transform 0.2s ease;
        }
        .ft-btn:hover { background: var(--light-blue); color: var(--dark-blue); transform: translateY(-2px); }

        .ft-bottom {
            margin-top: 56px;
            padding: 22px 0;
            border-top: 1px solid rgba(255, 255, 255, 0.12);
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 8px 24px;
            font-size: 13.5px;
            color: #9DBCDD;
        }
        .ft-bottom a { color: #CFE3F7; text-decoration: none; }
        .ft-bottom a:hover { color: #FFFFFF; }
        .ft a:focus-visible { outline: 3px solid #7FB0EA; outline-offset: 3px; border-radius: 6px; }

        /* Kartu Harga */
        .harga-card {
            background: #FFFFFF;
            border: 1px solid #E5E7EB;
            border-radius: 16px;
            padding: 28px 20px;
            text-align: center;
            height: 100%;
            transition: all 0.25s ease;
            box-shadow: 0 4px 16px rgba(7,84,154,0.06);
        }
        .harga-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 16px 32px rgba(7,84,154,0.14);
            border-color: var(--main-blue);
        }
        .harga-icon {
            width: 56px; height: 56px;
            border-radius: 16px;
            background: var(--light-blue);
            color: var(--main-blue);
            display: flex; align-items: center; justify-content: center;
            margin: 0 auto 16px;
            font-size: 24px;
        }
        .harga-nama {
            font-weight: 700;
            color: var(--dark-blue);
            font-size: 15px;
            margin-bottom: 12px;
        }
        .harga-nominal {
            font-size: 28px;
            font-weight: 700;
            color: var(--main-blue);
            line-height: 1.1;
        }
        .harga-satuan {
            font-size: 13px;
            color: #94A3B8;
            margin-bottom: 10px;
        }
        .harga-estimasi {
            font-size: 12.5px;
            color: #64748B;
            background: var(--light-blue);
            border-radius: 20px;
            padding: 4px 12px;
            display: inline-block;
        }
    </style>
</head>
<body>

    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg navbar-laundria sticky-top py-1">
        <div class="container">
            <a class="navbar-brand" href="#beranda">LAUNDRIA</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navMenu">
                <ul class="navbar-nav mx-auto align-items-lg-center gap-lg-1">
                    <li class="nav-item"><a class="nav-link" href="#beranda">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link" href="#tentang">Tentang Kami</a></li>
                    <li class="nav-item"><a class="nav-link" href="#layanan">Layanan & Harga</a></li>
                    <li class="nav-item"><a class="nav-link" href="#cara-kerja">Cara Kerja</a></li>
                    <li class="nav-item"><a class="nav-link" href="#testimoni">Testimoni</a></li>
                    <li class="nav-item"><a class="nav-link" href="#kontak">Kontak</a></li>
                </ul>
                <div class="d-flex mt-2 mt-lg-0">
                    <a class="btn btn-cta px-3" href="{{ route('login') }}">Masuk</a>
                </div>
            </div>
        </div>
    </nav>

    {{-- Hero --}}
    <section id="beranda" class="hero-section">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6 text-center text-lg-start">
                    <h1>
                        <span class="hero-accent">Laundry Profesional</span>
                        Merawat Pakaian Anda Untuk Hari yang Lebih Nyaman
                    </h1>
                    <p class="hero-text mx-auto mx-lg-0">
                        Kami membantu merawat pakaian Anda agar tetap bersih, rapi, segar, dan siap digunakan setiap hari. Tersedia layanan <strong>antar jemput</strong> langsung ke rumah Anda.
                    </p>

                    <div class="d-flex flex-wrap gap-3 justify-content-center justify-content-lg-start">
                        <a href="{{ route('login') }}" class="btn btn-cta btn-lg px-4">Pesan Sekarang</a>
                        <a href="#layanan" class="btn btn-hero-outline btn-lg px-4">Lihat Layanan</a>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="hero-photo">
                        <img src="{{ asset('images/laundryservices.png') }}" alt="Layanan LAUNDRIA" class="hover-lift">
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Tentang Kami --}}
    <section id="tentang" style="background: #EAF4FC;">
        <div class="container">
            <div class="text-center">
                <h2 class="section-title">Tentang Kami</h2>
                <p class="section-subtitle">Mengenal lebih dekat LAUNDRIA</p>
            </div>

            <div class="row align-items-center g-5">

                {{-- Foto --}}
                <div class="col-lg-5">
                    <div style="border-radius:24px; border:2px solid #CBE5F7; box-shadow:0 8px 32px rgba(7,84,154,0.12); overflow:hidden; transition:transform 0.3s ease,box-shadow 0.3s ease; cursor:default;"
                         onmouseover="this.style.transform='translateY(-10px)';this.style.boxShadow='0 20px 48px rgba(7,84,154,0.22)'"
                         onmouseout="this.style.transform='';this.style.boxShadow='0 8px 32px rgba(7,84,154,0.12)'">
                        <div class="ab-photo">
                            <img src="{{ asset('images/laundryy.jpg') }}" alt="Tentang LAUNDRIA">
                            <div class="ab-badge">
                                <span class="ab-badge-icon" aria-hidden="true">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="m5 12 4.5 4.5L19 7"/></svg>
                                </span>
                                Bersih, Rapi, dan Wangi
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Teks --}}
                <div class="col-lg-7">
                    <p style="color:#64748B; font-size:15px; line-height:1.8; margin-bottom:28px;">
                        LAUNDRIA hadir untuk membantu Anda merawat pakaian dengan lebih praktis dan nyaman,
                        mulai dari cuci lipat, cuci setrika, hingga bed cover, gorden, boneka, dan tas.
                        Dengan pelayanan yang ramah dan proses yang teratur, kami berusaha memberikan
                        hasil yang bersih, rapi, dan wangi setiap saat.
                    </p>

                    <div class="row g-3 mt-1">
                        <div class="col-sm-4">
                            <div style="background:#EAF4FC; border-radius:14px; padding:20px 16px; text-align:center;">
                                <div style="width:44px;height:44px;background:#07549A;border-radius:12px;display:flex;align-items:center;justify-content:center;margin:0 auto 12px;color:#fff;">
                                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="4" y="3" width="16" height="18" rx="3"/><circle cx="12" cy="13" r="4"/><path d="M8 7h.01M11 7h.01"/></svg>
                                </div>
                                <div style="font-weight:700;font-size:13.5px;color:#063B70;margin-bottom:6px;">Layanan Lengkap</div>
                                <p style="font-size:12px;color:#64748B;margin:0;line-height:1.6;">Cuci lipat, cuci setrika, bed cover, gorden, boneka, dan tas.</p>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div style="background:#EAF4FC; border-radius:14px; padding:20px 16px; text-align:center;">
                                <div style="width:44px;height:44px;background:#07549A;border-radius:12px;display:flex;align-items:center;justify-content:center;margin:0 auto 12px;color:#fff;">
                                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 2"/></svg>
                                </div>
                                <div style="font-weight:700;font-size:13.5px;color:#063B70;margin-bottom:6px;">Proses Teratur</div>
                                <p style="font-size:12px;color:#64748B;margin:0;line-height:1.6;">Pengerjaan dari awal sampai cucian siap diambil dengan teratur.</p>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div style="background:#EAF4FC; border-radius:14px; padding:20px 16px; text-align:center;">
                                <div style="width:44px;height:44px;background:#07549A;border-radius:12px;display:flex;align-items:center;justify-content:center;margin:0 auto 12px;color:#fff;">
                                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"/><path d="M8.5 14a4.5 4.5 0 0 0 7 0"/><path d="M9 9.5h.01M15 9.5h.01"/></svg>
                                </div>
                                <div style="font-weight:700;font-size:13.5px;color:#063B70;margin-bottom:6px;">Pelayanan Ramah</div>
                                <p style="font-size:12px;color:#64748B;margin:0;line-height:1.6;">Siap membantu dari pemesanan hingga cucian kembali ke Anda.</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    {{-- Layanan & Harga --}}
    <section id="layanan" style="background-color: #FFFFFF;">
        <div class="container">
            <div class="text-center">
                <h2 class="section-title">Layanan & Harga</h2>
                <p class="section-subtitle">Berbagai pilihan layanan laundry dengan harga transparan</p>
            </div>
            <div class="row g-4">
                @forelse ($layanan as $item)
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="h-100 d-flex flex-column" style="background:#F8FAFC; border:1px solid #E5E7EB; border-radius:16px; overflow:hidden; transition:transform 0.25s ease,box-shadow 0.25s ease; box-shadow:0 4px 16px rgba(7,84,154,0.06);"
                         onmouseover="this.style.transform='translateY(-8px)';this.style.boxShadow='0 16px 32px rgba(7,84,154,0.14)';this.style.borderColor='#07549A'"
                         onmouseout="this.style.transform='';this.style.boxShadow='0 4px 16px rgba(7,84,154,0.06)';this.style.borderColor='#E5E7EB'">
                        {{-- Header kartu --}}
                        <div style="background:linear-gradient(135deg,#07549A,#1976B8); padding:14px 16px;">
                            <div style="display:flex;align-items:center;justify-content:space-between;gap:12px;">
                                <div style="width:44px;height:44px;border-radius:12px;background:rgba(255,255,255,0.2);display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="4" y="3" width="16" height="18" rx="3"/><circle cx="12" cy="13" r="4"/><path d="M8 7h.01M11 7h.01"/></svg>
                                </div>
                                <div style="text-align:right; min-width:0;">
                                    <div style="font-size:15px;font-weight:700;color:#fff;line-height:1.1;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">Rp{{ number_format($item->harga, 0, ',', '.') }}</div>
                                    <div style="font-size:11px;color:rgba(255,255,255,0.75);">per {{ $item->satuan }}</div>
                                </div>
                            </div>
                            <div style="font-size:13px;font-weight:700;color:#fff;margin-top:10px;">{{ $item->nama_layanan }}</div>
                        </div>
                        {{-- Body kartu --}}
                        <div class="d-flex flex-column flex-grow-1" style="padding:12px 16px;">
                            <p style="color:#64748B;font-size:13.5px;line-height:1.7;flex-grow:1;margin-bottom:14px;">
                                @if($item->keterangan)
                                    {{ $item->keterangan }}
                                @elseif($item->nama_layanan == 'Cuci Lipat')
                                    Cocok untuk pakaian harian, dicuci bersih dan dilipat rapi.
                                @elseif($item->nama_layanan == 'Cuci & Setrika')
                                    Pakaian dicuci bersih, dikeringkan, disetrika halus, dan siap pakai.
                                @elseif($item->nama_layanan == 'Setrika Saja')
                                    Untuk pakaian yang sudah dicuci, disetrika rapi agar siap digunakan.
                                @elseif($item->nama_layanan == 'Cuci Bed Cover')
                                    Perawatan khusus untuk bed cover agar tetap bersih dan nyaman digunakan.
                                @elseif($item->nama_layanan == 'Cuci Selimut & Gorden')
                                    Dibersihkan menyeluruh, bebas debu, dan wangi segar untuk kenyamanan rumah Anda.
                                @elseif($item->nama_layanan == 'Boneka & Tas')
                                    Dicuci dengan lembut, menjaga bentuk dan kualitas boneka serta tas kesayangan Anda.
                                @else
                                    Dikerjakan oleh tim profesional dengan perhatian pada setiap detail agar hasilnya memuaskan.
                                @endif
                            </p>
                            <div style="display:flex;align-items:center;justify-content:space-between;gap:12px;">
                                @if($item->estimasi)
                                <span style="font-size:12px;color:#07549A;background:#EAF4FC;border-radius:20px;padding:4px 12px;">
                                    ⏱ {{ $item->estimasi }} jam
                                </span>
                                @endif
                                <a href="{{ route('login') }}" class="btn btn-cta btn-sm ms-auto">Pilih</a>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12 text-center text-muted">Layanan belum tersedia.</div>
                @endforelse
            </div>
        </div>
    </section>

    {{-- Cara Kerja --}}
    <section id="cara-kerja" style="background: linear-gradient(160deg, #063B70 0%, #07549A 60%, #1976B8 100%);">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title" style="color:#FFFFFF;">Cara Kerja</h2>
                <p class="section-subtitle" style="color:rgba(255,255,255,0.8);">Proses mudah dalam 4 langkah — dari pesan hingga pakaian kembali ke tangan Anda</p>
            </div>
            <div class="row g-4 position-relative">
                {{-- Garis penghubung desktop --}}
                <div class="d-none d-lg-block" style="position:absolute;top:52px;left:calc(12.5% + 24px);right:calc(12.5% + 24px);height:2px;background:rgba(255,255,255,0.2);z-index:0;"></div>

                <div class="col-md-6 col-lg-3">
                    <div style="background:rgba(255,255,255,0.08);border:1px solid rgba(255,255,255,0.15);border-radius:20px;padding:32px 24px;text-align:center;height:100%;position:relative;z-index:1;transition:all 0.25s;"
                         onmouseover="this.style.background='rgba(255,255,255,0.15)';this.style.transform='translateY(-6px)'"
                         onmouseout="this.style.background='rgba(255,255,255,0.08)';this.style.transform=''">
                        <div style="width:64px;height:64px;background:#FFFFFF;border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto 20px;box-shadow:0 8px 24px rgba(0,0,0,0.2);">
                            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#07549A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 20h9"/><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"/></svg>
                        </div>
                        <div style="width:28px;height:28px;background:#07549A;border:3px solid #fff;border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:12px;font-weight:700;color:#fff;position:absolute;top:20px;left:50%;transform:translateX(-50%);">1</div>
                        <h6 style="color:#FFFFFF;font-weight:700;font-size:16px;margin-bottom:10px;">Pesan Online</h6>
                        <p style="color:rgba(255,255,255,0.75);font-size:13.5px;line-height:1.7;margin:0;">Daftar/login, pilih layanan dan jumlahnya. Pesan kapan saja dari mana saja.</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div style="background:rgba(255,255,255,0.08);border:1px solid rgba(255,255,255,0.15);border-radius:20px;padding:32px 24px;text-align:center;height:100%;position:relative;z-index:1;transition:all 0.25s;"
                         onmouseover="this.style.background='rgba(255,255,255,0.15)';this.style.transform='translateY(-6px)'"
                         onmouseout="this.style.background='rgba(255,255,255,0.08)';this.style.transform=''">
                        <div style="width:64px;height:64px;background:#FFFFFF;border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto 20px;box-shadow:0 8px 24px rgba(0,0,0,0.2);">
                            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#07549A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="m4.93 4.93 4.24 4.24"/><path d="m14.83 9.17 4.24-4.24"/><path d="m14.83 14.83 4.24 4.24"/><path d="m9.17 14.83-4.24 4.24"/><circle cx="12" cy="12" r="4"/></svg>
                        </div>
                        <div style="width:28px;height:28px;background:#07549A;border:3px solid #fff;border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:12px;font-weight:700;color:#fff;position:absolute;top:20px;left:50%;transform:translateX(-50%);">2</div>
                        <h6 style="color:#FFFFFF;font-weight:700;font-size:16px;margin-bottom:10px;">🛵 Kami Jemput</h6>
                        <p style="color:rgba(255,255,255,0.75);font-size:13.5px;line-height:1.7;margin:0;">Tim kami menjemput pakaian langsung ke rumah Anda. Praktis, tanpa perlu keluar!</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div style="background:rgba(255,255,255,0.08);border:1px solid rgba(255,255,255,0.15);border-radius:20px;padding:32px 24px;text-align:center;height:100%;position:relative;z-index:1;transition:all 0.25s;"
                         onmouseover="this.style.background='rgba(255,255,255,0.15)';this.style.transform='translateY(-6px)'"
                         onmouseout="this.style.background='rgba(255,255,255,0.08)';this.style.transform=''">
                        <div style="width:64px;height:64px;background:#FFFFFF;border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto 20px;box-shadow:0 8px 24px rgba(0,0,0,0.2);">
                            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#07549A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2a10 10 0 1 0 0 20 10 10 0 0 0 0-20z"/><path d="M12 6v6l4 2"/></svg>
                        </div>
                        <div style="width:28px;height:28px;background:#07549A;border:3px solid #fff;border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:12px;font-weight:700;color:#fff;position:absolute;top:20px;left:50%;transform:translateX(-50%);">3</div>
                        <h6 style="color:#FFFFFF;font-weight:700;font-size:16px;margin-bottom:10px;">Proses Pencucian</h6>
                        <p style="color:rgba(255,255,255,0.75);font-size:13.5px;line-height:1.7;margin:0;">Dicuci bersih, dikeringkan, dan disetrika dengan teliti. Hasilnya bersih, rapi, wangi.</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div style="background:rgba(255,255,255,0.12);border:1px solid rgba(255,255,255,0.3);border-radius:20px;padding:32px 24px;text-align:center;height:100%;position:relative;z-index:1;transition:all 0.25s;"
                         onmouseover="this.style.background='rgba(255,255,255,0.2)';this.style.transform='translateY(-6px)'"
                         onmouseout="this.style.background='rgba(255,255,255,0.12)';this.style.transform=''">
                        <div style="width:64px;height:64px;background:linear-gradient(135deg,#FFD700,#FFA500);border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto 20px;box-shadow:0 8px 24px rgba(255,165,0,0.4);">
                            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m5 12 4.5 4.5L19 7"/></svg>
                        </div>
                        <div style="width:28px;height:28px;background:#FFD700;border:3px solid #fff;border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:12px;font-weight:700;color:#063B70;position:absolute;top:20px;left:50%;transform:translateX(-50%);">4</div>
                        <h6 style="color:#FFFFFF;font-weight:700;font-size:16px;margin-bottom:10px;">🏠 Kami Antar</h6>
                        <p style="color:rgba(255,255,255,0.75);font-size:13.5px;line-height:1.7;margin:0;">Pakaian bersih diantarkan langsung ke rumah Anda. Bayar tunai saat tiba, atau transfer/QRIS sebelum pengiriman.</p>
                    </div>
                </div>
            </div>

            {{-- CTA --}}
            <div class="text-center mt-5">
                <a href="{{ route('login') }}" style="display:inline-flex;align-items:center;gap:10px;background:#FFFFFF;color:#063B70;font-weight:700;font-size:16px;text-decoration:none;padding:16px 36px;border-radius:14px;transition:all 0.2s;box-shadow:0 8px 24px rgba(0,0,0,0.2);"
                   onmouseover="this.style.background='#EAF4FC';this.style.transform='translateY(-2px)'"
                   onmouseout="this.style.background='#FFFFFF';this.style.transform=''">
                    🛵 Pesan & Minta Dijemput Sekarang
                </a>
            </div>
        </div>
    </section>

    {{-- Mengapa Memilih LAUNDRIA --}}
    <section id="mengapa" style="background-color: #F8FAFC;">
        <div class="container">
            <div class="text-center">
                <h2 class="section-title">Mengapa Memilih LAUNDRIA?</h2>
                <p class="section-subtitle">Kami memberikan yang terbaik untuk pakaian Anda</p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-3">
                    <div style="background:#EAF4FC; border-radius:18px; padding:28px 24px; height:100%; text-align:center; transition:transform 0.25s ease,box-shadow 0.25s ease;"
                         onmouseover="this.style.transform='translateY(-8px)';this.style.boxShadow='0 16px 32px rgba(7,84,154,0.15)'"
                         onmouseout="this.style.transform='';this.style.boxShadow=''">
                        <div style="width:60px; height:60px; background:#07549A; border-radius:16px; display:flex; align-items:center; justify-content:center; margin:0 auto 18px;">
                            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="m5 12 4.5 4.5L19 7"/></svg>
                        </div>
                        <h5 style="color:#063B70; font-weight:700; margin-bottom:10px;">Hasil Bersih & Wangi</h5>
                        <p style="color:#64748B; font-size:14px; line-height:1.7; margin:0;">Menggunakan deterjen berkualitas yang membuat pakaian bersih, rapi, dan wangi tahan lama.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div style="background:#DBEAFE; border-radius:18px; padding:28px 24px; height:100%; text-align:center; transition:transform 0.25s ease,box-shadow 0.25s ease;"
                         onmouseover="this.style.transform='translateY(-8px)';this.style.boxShadow='0 16px 32px rgba(7,84,154,0.15)'"
                         onmouseout="this.style.transform='';this.style.boxShadow=''">
                        <div style="width:60px; height:60px; background:#1976B8; border-radius:16px; display:flex; align-items:center; justify-content:center; margin:0 auto 18px;">
                            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 2"/></svg>
                        </div>
                        <h5 style="color:#1D4ED8; font-weight:700; margin-bottom:10px;">Tepat Waktu</h5>
                        <p style="color:#64748B; font-size:14px; line-height:1.7; margin:0;">Pakaian selesai sesuai estimasi yang dijanjikan, tidak bikin Anda menunggu lama.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div style="background:#E0F2FE; border-radius:18px; padding:28px 24px; height:100%; text-align:center; transition:transform 0.25s ease,box-shadow 0.25s ease;"
                         onmouseover="this.style.transform='translateY(-8px)';this.style.boxShadow='0 16px 32px rgba(7,84,154,0.15)'"
                         onmouseout="this.style.transform='';this.style.boxShadow=''">
                        <div style="width:60px; height:60px; background:#0369A1; border-radius:16px; display:flex; align-items:center; justify-content:center; margin:0 auto 18px;">
                            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2a10 10 0 1 0 0 20 10 10 0 0 0 0-20z"/><path d="M12 8v4l3 3"/></svg>
                        </div>
                        <h5 style="color:#075985; font-weight:700; margin-bottom:10px;">Harga Terjangkau</h5>
                        <p style="color:#64748B; font-size:14px; line-height:1.7; margin:0;">Harga yang transparan dan bersahabat tanpa biaya tersembunyi untuk semua layanan.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div style="background:linear-gradient(135deg,#063B70,#07549A); border-radius:18px; padding:28px 24px; height:100%; text-align:center; transition:transform 0.25s ease,box-shadow 0.25s ease;"
                         onmouseover="this.style.transform='translateY(-8px)';this.style.boxShadow='0 16px 32px rgba(7,84,154,0.3)'"
                         onmouseout="this.style.transform='';this.style.boxShadow=''">
                        <div style="width:60px; height:60px; background:rgba(255,255,255,0.2); border-radius:16px; display:flex; align-items:center; justify-content:center; margin:0 auto 18px;">
                            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg>
                        </div>
                        <h5 style="color:#fff; font-weight:700; margin-bottom:10px;">Pelayanan Ramah</h5>
                        <p style="color:rgba(255,255,255,0.85); font-size:14px; line-height:1.7; margin:0;">Tim kami siap membantu dengan ramah dan profesional dari awal hingga pakaian kembali ke tangan Anda.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Testimoni Pelanggan --}}
    <section id="testimoni" style="background-color: #FFFFFF;">
        <div class="container">
            <div class="text-center">
                <h2 class="section-title">Apa Kata Pelanggan Kami?</h2>
                <p class="section-subtitle">Kepuasan pelanggan adalah prioritas kami</p>
            </div>
            <div class="row g-4">
                <div class="col-md-4">
                    <div style="background:#fff; border-radius:18px; padding:28px; height:100%; box-shadow:0 4px 20px rgba(7,84,154,0.08); transition:transform 0.25s ease,box-shadow 0.25s ease;"
                         onmouseover="this.style.transform='translateY(-8px)';this.style.boxShadow='0 16px 32px rgba(7,84,154,0.15)'"
                         onmouseout="this.style.transform='';this.style.boxShadow='0 4px 20px rgba(7,84,154,0.08)'">
                        <div style="color:#F59E0B; font-size:18px; margin-bottom:14px;">★★★★★</div>
                        <p style="color:#374151; font-size:14px; line-height:1.8; margin-bottom:20px; font-style:italic;">"Laundry di sini hasilnya bersih banget dan wangi. Pelayanannya juga ramah, harganya pun terjangkau. Sudah langganan dari lama dan tidak pernah kecewa!"</p>
                        <div style="display:flex; align-items:center; gap:12px;">
                            <div style="width:42px; height:42px; border-radius:50%; background:linear-gradient(135deg,#07549A,#1976B8); color:#fff; display:flex; align-items:center; justify-content:center; font-weight:700; font-size:16px;">A</div>
                            <div>
                                <div style="font-weight:600; color:#1F2937; font-size:14px;">Mutiara</div>
                                <div style="font-size:12px; color:#94A3B8;">Pelanggan Setia</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div style="background:#07549A; border-radius:18px; padding:28px; height:100%; box-shadow:0 8px 28px rgba(7,84,154,0.3); transition:transform 0.25s ease,box-shadow 0.25s ease;"
                         onmouseover="this.style.transform='translateY(-8px)';this.style.boxShadow='0 20px 40px rgba(7,84,154,0.4)'"
                         onmouseout="this.style.transform='';this.style.boxShadow='0 8px 28px rgba(7,84,154,0.3)'">
                        <div style="color:#FDE68A; font-size:18px; margin-bottom:14px;">★★★★★</div>
                        <p style="color:rgba(255,255,255,0.9); font-size:14px; line-height:1.8; margin-bottom:20px; font-style:italic;">"Sangat membantu! Pakaian selesai tepat waktu sesuai estimasi. Cocok banget buat yang sibuk seperti saya. Pasti akan order lagi!"</p>
                        <div style="display:flex; align-items:center; gap:12px;">
                            <div style="width:42px; height:42px; border-radius:50%; background:rgba(255,255,255,0.2); color:#fff; display:flex; align-items:center; justify-content:center; font-weight:700; font-size:16px;">B</div>
                            <div>
                                <div style="font-weight:600; color:#fff; font-size:14px;">Bima</div>
                                <div style="font-size:12px; color:rgba(255,255,255,0.7);">Pelanggan Aktif</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div style="background:#fff; border-radius:18px; padding:28px; height:100%; box-shadow:0 4px 20px rgba(7,84,154,0.08); transition:transform 0.25s ease,box-shadow 0.25s ease;"
                         onmouseover="this.style.transform='translateY(-8px)';this.style.boxShadow='0 16px 32px rgba(7,84,154,0.15)'"
                         onmouseout="this.style.transform='';this.style.boxShadow='0 4px 20px rgba(7,84,154,0.08)'">
                        <div style="color:#F59E0B; font-size:18px; margin-bottom:14px;">★★★★★</div>
                        <p style="color:#374151; font-size:14px; line-height:1.8; margin-bottom:20px; font-style:italic;">"Bed cover dan gorden saya dicuci di sini, hasilnya luar biasa bersih. Tidak perlu khawatir soal kualitas, dijamin memuaskan!"</p>
                        <div style="display:flex; align-items:center; gap:12px;">
                            <div style="width:42px; height:42px; border-radius:50%; background:linear-gradient(135deg,#07549A,#1976B8); color:#fff; display:flex; align-items:center; justify-content:center; font-weight:700; font-size:16px;">D</div>
                            <div>
                                <div style="font-weight:600; color:#1F2937; font-size:14px;">Budi</div>
                                <div style="font-size:12px; color:#94A3B8;">Pelanggan Baru</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Kontak --}}
    <section id="kontak" style="background-color: #F8FAFC;">
        <div class="container">
            <div class="text-center">
                <h2 class="section-title">Kontak Kami</h2>
                <p class="section-subtitle">Hubungi kami untuk informasi lebih lanjut</p>
            </div>

            <div class="kt-grid">

                <article class="kt-card kt-main">
                    <div class="kt-icon" aria-hidden="true">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M21 11.5a8.4 8.4 0 0 1-12.4 7.4L3 20.5l1.7-5.4A8.4 8.4 0 1 1 21 11.5Z"/><path d="M9 9.2c.3 2.4 2.4 4.6 5.8 5.6l1-1.3-1.9-1-.9.7c-.8-.4-1.6-1.2-2-2l.7-.9-1-1.9L9 9.2Z"/></svg>
                    </div>
                    <h3>Nomor WhatsApp</h3>
                    <a class="kt-number" href="https://wa.me/628898598393" target="_blank" rel="noopener">0889-8598-4393</a>
                    <p class="kt-note">Cara tercepat untuk menghubungi kami. Pesan di jam operasional dibalas dalam hitungan menit.</p>
                    <a class="kt-btn" href="https://wa.me/628898598393?text=Halo%20LAUNDRIA%2C%20saya%20ingin%20bertanya%20tentang%20layanan%20laundry." target="_blank" rel="noopener">Chat via WhatsApp</a>
                </article>

                <article class="kt-card">
                    <div class="kt-icon" aria-hidden="true">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M12 21s7-6.2 7-11.5A7 7 0 0 0 5 9.5C5 14.8 12 21 12 21Z"/><circle cx="12" cy="9.5" r="2.5"/></svg>
                    </div>
                    <h3>Alamat</h3>
                    <p class="kt-text">Surakarta, Jawa Tengah</p>
                    <a class="kt-link" href="https://www.google.com/maps/search/?api=1&query=Surakarta%2C+Jawa+Tengah" target="_blank" rel="noopener">Buka di Google Maps</a>
                </article>

                <article class="kt-card">
                    <div class="kt-top">
                        <div class="kt-icon" aria-hidden="true">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 2"/></svg>
                        </div>
                        <span id="kt-status" class="kt-status" aria-live="polite"></span>
                    </div>
                    <h3>Jam Operasional</h3>
                    <ul class="kt-hours" id="kt-hours">
                        <li data-days="1,2,3,4,5"><span>Senin - Jumat</span><b>08.00 - 20.00</b></li>
                        <li data-days="6"><span>Sabtu</span><b>08.00 - 18.00</b></li>
                        <li data-days="0" class="is-closed"><span>Minggu</span><b>Tutup</b></li>
                    </ul>
                </article>
            </div>
        </div>
    </section>

    {{-- Footer --}}
    <footer class="ft">
        <div class="container">
            <div class="row g-5">

                {{-- Brand --}}
                <div class="col-lg-4">
                    <h2 class="ft-brand">LAUNDRIA</h2>
                    <p class="ft-desc">Laundry profesional yang membantu merawat pakaian Anda agar tetap bersih, rapi, dan wangi,
                        sehingga waktu Anda bisa dipakai untuk hal yang lebih penting.</p>
                </div>

                {{-- Menu --}}
                <div class="col-6 col-lg-2">
                    <h3 class="ft-title">Menu</h3>
                    <ul class="ft-links">
                        <li><a href="#beranda">Beranda</a></li>
                        <li><a href="#tentang">Tentang Kami</a></li>
                        <li><a href="#layanan">Layanan</a></li>
                        <li><a href="#harga">Harga</a></li>
                        <li><a href="#cara-kerja">Cara Kerja</a></li>
                        <li><a href="#kontak">Kontak</a></li>
                    </ul>
                </div>

                {{-- Layanan (otomatis dari database) --}}
                <div class="col-6 col-lg-3">
                    <h3 class="ft-title">Layanan</h3>
                    <ul class="ft-links">
                        @foreach (collect($layanan)->take(8) as $item)
                            <li><a href="#layanan">{{ $item->nama_layanan }}</a></li>
                        @endforeach
                    </ul>
                </div>

                {{-- Kontak + CTA --}}
                <div class="col-lg-3">
                    <h3 class="ft-title">Hubungi Kami</h3>
                    <ul class="ft-contact">
                        <li>
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M21 11.5a8.4 8.4 0 0 1-12.4 7.4L3 20.5l1.7-5.4A8.4 8.4 0 1 1 21 11.5Z"/><path d="M9 9.2c.3 2.4 2.4 4.6 5.8 5.6l1-1.3-1.9-1-.9.7c-.8-.4-1.6-1.2-2-2l.7-.9-1-1.9L9 9.2Z"/></svg>
                            <a href="https://wa.me/628898598393" target="_blank" rel="noopener">0889-8598-4393</a>
                        </li>
                        <li>
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 21s7-6.2 7-11.5A7 7 0 0 0 5 9.5C5 14.8 12 21 12 21Z"/><circle cx="12" cy="9.5" r="2.5"/></svg>
                            <span>Surakarta, Jawa Tengah</span>
                        </li>
                        <li>
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 2"/></svg>
                            <span>Senin - Jumat, 08.00 - 20.00<br>Sabtu, 08.00 - 18.00<br>Minggu, tutup</span>
                        </li>
                    </ul>
                    <a href="{{ route('login') }}" class="ft-btn">Pesan Sekarang</a>
                </div>

            </div>

            <div class="ft-bottom">
                <span>&copy; {{ date('Y') }} LAUNDRIA. All rights reserved.</span>
                <span style="display:inline-flex;align-items:center;gap:8px;background:rgba(255,255,255,0.08);border:1px solid rgba(255,255,255,0.15);border-radius:20px;padding:6px 14px;font-size:13px;color:#CFE3F7;">
                    <span style="width:8px;height:8px;border-radius:50%;background:#22C55E;display:inline-block;box-shadow:0 0 6px #22C55E;"></span>
                    Sistem Laundry Online
                </span>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.querySelectorAll('#navMenu .nav-link').forEach(function (link) {
            link.addEventListener('click', function () {
                var navMenu = document.getElementById('navMenu');
                var bsCollapse = bootstrap.Collapse.getInstance(navMenu);
                if (bsCollapse) {
                    bsCollapse.hide();
                }
            });
        });
    </script>
    <script>
        (function () {
            var jadwal = {0: null, 1: [8, 20], 2: [8, 20], 3: [8, 20], 4: [8, 20], 5: [8, 20], 6: [8, 18]};
            var now  = new Date(new Date().toLocaleString('en-US', {timeZone: 'Asia/Jakarta'}));
            var day  = now.getDay();
            var hour = now.getHours() + now.getMinutes() / 60;
            var jam  = jadwal[day];
            var buka = jam && hour >= jam[0] && hour < jam[1];

            var status = document.getElementById('kt-status');
            if (status) {
                status.textContent = buka ? 'Buka sekarang' : 'Tutup sekarang';
                status.className = 'kt-status ' + (buka ? 'is-open' : 'is-closed');
            }
            document.querySelectorAll('#kt-hours li').forEach(function (li) {
                if (li.dataset.days.split(',').indexOf(String(day)) > -1) li.classList.add('is-today');
            });
        })();
    </script>
</body>
</html>