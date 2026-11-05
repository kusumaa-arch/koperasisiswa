<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Koperasi Siswa Syariah | SMK Negeri 1 Bantul')</title>
    <meta name="description" content="Koperasi Siswa Syariah SMK Negeri 1 Bantul - Profesional Barokah Mensejahterakan.">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&family=Playfair+Display:ital,wght@0,600;0,700;0,800;1,500&family=Caveat:wght@600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script>document.documentElement.classList.add('js');</script>
</head>

<body>

<header id="header" class="@yield('header_class')">
    <a href="{{ route('home') }}" class="logo">
        <img src="{{ asset('images/sekolah.png') }}" alt="Logo Sekolah" onerror="this.style.display='none'">
        <img src="{{ asset('images/kopsis.png') }}" alt="Logo Kopsis" onerror="this.style.display='none'">
        <span class="logo-text"><strong>KOPSIS</strong><small>SKANSABA SYARIAH</small></span>
    </a>

    <nav id="nav">
        <ul>
            <li><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}"><i class="fa-solid fa-house"></i><span data-id="Beranda" data-en="Home">Beranda</span></a></li>
            <li><a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active' : '' }}"><i class="fa-solid fa-users"></i><span data-id="Tentang Kami" data-en="About Us">Tentang Kami</span></a></li>
            <li><a href="{{ route('products') }}" class="{{ request()->routeIs('products') ? 'active' : '' }}"><i class="fa-solid fa-bag-shopping"></i><span data-id="Produk" data-en="Products">Produk</span></a></li>
            <li><a href="{{ route('operational') }}" class="{{ request()->routeIs('operational') ? 'active' : '' }}"><i class="fa-regular fa-clock"></i><span data-id="Operasional" data-en="Operational">Operasional</span></a></li>
            <li><a href="#contact"><i class="fa-solid fa-phone"></i><span data-id="Kontak" data-en="Contact">Kontak</span></a></li>
        </ul>
    </nav>

    <div class="header-right">
        <div class="language" id="language">
            <button type="button" class="active" data-lang="id">ID</button>
            <button type="button" data-lang="en">EN</button>
        </div>
        <button type="button" class="burger" id="burger" aria-label="Menu"><i class="fa-solid fa-bars"></i></button>
    </div>
</header>

<main>
    @yield('content')
</main>

{{-- ============ CONTACT ============ --}}
<section class="contact" id="contact">
    <div class="container contact-grid">
        <div class="contact-icon reveal"><i class="fa-solid fa-bullhorn"></i></div>

        <div class="contact-text reveal d1">
            <h3 class="title" data-id="Hubungi Kami" data-en="Contact Us">Hubungi Kami</h3>
            <p data-id="Jika ada pertanyaan, silakan hubungi kami melalui:" data-en="If you have any questions, feel free to reach us via:">Jika ada pertanyaan, silakan hubungi kami melalui:</p>
            <a class="btn-wa" href="https://wa.me/6285122603816" target="_blank" rel="noopener">
                <i class="fa-brands fa-whatsapp"></i> 0851-2260-3816
            </a>
        </div>

        <ul class="contact-list reveal d2">
            <li><i class="fa-solid fa-circle-check"></i><span data-id="Datang langsung ke toko" data-en="Visit the store directly">Datang langsung ke toko</span></li>
            <li><i class="fa-solid fa-circle-check"></i><span data-id="Melalui pembina atau pengurus" data-en="Through advisors or committee members">Melalui pembina atau pengurus</span></li>
            <li><i class="fa-solid fa-circle-check"></i><span data-id="Hubungi nomor kontak di atas" data-en="Call the contact number above">Hubungi nomor kontak di atas</span></li>
        </ul>
    </div>
</section>

{{-- ============ FOOTER ============ --}}
<footer class="footer">
    <div class="container footer-grid">
        <div class="f-brand">
            <img src="{{ asset('images/sekolah.png') }}" alt="" onerror="this.style.display='none'">
            <img src="{{ asset('images/kopsis.png') }}" alt="" onerror="this.style.display='none'">
            <div><strong>Koperasi Siswa Syariah</strong><br>SMK Negeri 1 Bantul</div>
            
        </div>

        <div class="f-nav">
            <h6 data-id="Navigasi Singkat" data-en="Quick Navigation">Navigasi Singkat</h6>
            <div class="nav-links">
                <a href="{{ route('home') }}" data-id="• Beranda" data-en="• Home"> • Beranda</a>
                <a href="{{ route('about') }}" data-id="• Tentang Kami" data-en="• About Us"> • Tentang Kami</a>
                <a href="{{ route('products') }}" data-id="• Produk" data-en="• Products"> • Produk</a>
                <a href="{{ route('operational') }}" data-id="• Operasional" data-en="• Operational"> • Operasional</a>
                <a href="#contact" data-id="• Kontak" data-en="• Contact"> • Kontak</a>
            </div>
        </div>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.0493324861723!2d110.35305437358203!3d-7.889907978484305!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7b00889ad8f84d%3A0x2e0009ca7815eaf0!2sSMK%20Negeri%201%20Bantul!5e0!3m2!1sen!2ssg!4v1793840713232!5m2!1sen!2ssg" width="200" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="strict-origin-when-cross-origin"></iframe>
    </div>

    <div class="container footer-bottom">
        <small>© {{ date('Y') }} Ubu Ungi Team - RPL 1 angkatan 28</small>
        <div class="socials">
            <a href="https://www.instagram.com/kopsis_skansabasyariah/" aria-label="Instagram"><i class="fa-brands fa-instagram"></i></a>
        </div>
    </div>

    
</footer>

<button type="button" class="to-top" id="toTop" aria-label="Kembali ke atas"><i class="fa-solid fa-arrow-up"></i></button>

<script src="{{ asset('js/script.js') }}"></script>
</body>
</html>