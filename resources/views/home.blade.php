@extends('layouts.app')

@section('title', 'Koperasi Siswa Syariah | SMK Negeri 1 Bantul')

@section('content')

{{-- ============ HERO ============ --}}
<section class="hero">
    <div class="overlay"></div>

    <div class="hero-content">
        <p class="tagline" data-id="Profesional, Barokah, Mensejahterakan" data-en="Professional, Blessed, Prosperous">Profesional, Barokah, Mensejahterakan</p>
        <h1>Koperasi Siswa <span>Syariah</span></h1>
        <h3>SMK Negeri 1 Bantul</h3>

        <div class="hero-actions">
            <a href="{{ route('products') }}" class="btn btn-ghost">
                <i class="fa-solid fa-bag-shopping"></i>
                <span data-id="Jelajahi Produk" data-en="Explore Products">Jelajahi Produk</span>
                <i class="fa-solid fa-arrow-right"></i>
            </a>
            <a href="https://wa.me/6285122603816" target="_blank" rel="noopener" class="btn">
                <i class="fa-brands fa-whatsapp"></i>
                <span data-id="Hubungi Kami" data-en="Contact Us">Hubungi Kami</span>
            </a>
        </div>
    </div>

    <svg class="wave" viewBox="0 0 1440 120" preserveAspectRatio="none"><path d="M0,64 C240,120 480,0 720,40 C960,80 1200,110 1440,50 L1440,120 L0,120 Z"/></svg>
</section>

{{-- ============ ABOUT PREVIEW ============ --}}
<section class="section about-preview">
    <div class="container about-grid">
        <div class="about-image reveal">
            <img src="{{ asset('images/about.png') }}" alt="Toko Kopsis Skansaba Syariah"
                 onerror="this.onerror=null;this.src='https://placehold.co/800x600/e8f3e8/1b5e32?text=Kopsis+Skansaba'">
        </div>

        <div class="about-content reveal d1">
            <span class="eyebrow" data-id="Tentang Kami" data-en="About Us">Tentang Kami</span>
            <h2>Kopsis Skansaba Syariah</h2>
            <p data-id="Koperasi Siswa (Kopsis) <b>Skansaba Syariah</b> merupakan koperasi siswa di SMK Negeri 1 Bantul yang dibentuk sebagai wujud pelaksanaan Program Sekolah Pelopor Ekonomi Syariah oleh Komite Nasional Ekonomi dan Keuangan Syariah melalui Dikpora DIY."
               data-en="The Student Cooperative (Kopsis) <b>Skansaba Syariah</b> at SMK Negeri 1 Bantul was established as part of the Sharia Economy Pioneer School Program by the National Committee for Sharia Economy and Finance through Dikpora DIY.">
                Koperasi Siswa (Kopsis) <b>Skansaba Syariah</b> merupakan koperasi siswa di SMK Negeri 1 Bantul yang dibentuk sebagai wujud pelaksanaan Program Sekolah Pelopor Ekonomi Syariah oleh Komite Nasional Ekonomi dan Keuangan Syariah melalui Dikpora DIY.
            </p>
            <a href="{{ route('about') }}" class="link-more"><span data-id="Selengkapnya" data-en="Read more">Selengkapnya</span> <i class="fa-solid fa-arrow-right"></i></a>
        </div>
    </div>
</section>

{{-- ============ PRODUCTS PREVIEW ============ --}}
<section class="section products-preview">
    <div class="container">
        <div class="section-head reveal">
            <span class="eyebrow" data-id="Katalog Produk" data-en="Product Catalog">Katalog Produk</span>
            <h2 class="title" data-id="Temukan berbagai kebutuhanmu di Kopsis Skansaba Syariah!" data-en="Find everything you need at Kopsis Skansaba Syariah!">Temukan berbagai kebutuhanmu di Kopsis Skansaba Syariah!</h2>
        </div>

        <div class="product-layout">
            <div class="product-grid">
                @foreach ($products as $product)
                    @include('partials.product-card', ['product' => $product])
                @endforeach
            </div>

            <aside class="promo reveal d2">
                <div class="promo-glow"></div>
                <i class="fa-solid fa-bag-shopping promo-icon"></i>
                <a href="{{ route('products') }}" class="btn-cream">
                    <span data-id="Lihat Semua Produk" data-en="See All Products">Lihat Semua Produk</span>
                    <i class="fa-solid fa-arrow-right"></i>
                </a>
            </aside>
        </div>
    </div>
</section>

{{-- ============ OPERATIONAL PREVIEW ============ --}}
<section class="section">
    <div class="container">
        <div class="section-head reveal">
            <span class="eyebrow" data-id="Informasi Operasional" data-en="Operational Info">Informasi Operasional</span>
            <h2 class="title" data-id="Jam Operasional dan Informasi Penting" data-en="Operating Hours & Important Info">Jam Operasional dan Informasi Penting</h2>
        </div>

        @include('partials.op-cards')
    </div>
</section>

@endsection