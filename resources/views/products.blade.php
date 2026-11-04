@extends('layouts.app')

@section('title', 'Produk | Koperasi Siswa Syariah')
@section('header_class', 'solid')

@section('content')

<section class="page-top">
    <div class="container">
        <span class="eyebrow" data-id="Katalog Produk" data-en="Product Catalog">Katalog Produk</span>
        <h1 data-id="Temukan berbagai kebutuhanmu di Kopsis Skansaba Syariah!" data-en="Find everything you need at Kopsis Skansaba Syariah!">Temukan berbagai kebutuhanmu di Kopsis Skansaba Syariah!</h1>
    </div>
</section>

<section class="section products-page">
    <div class="container">
        <div class="filters" id="filters">
            <button type="button" class="chip active" data-filter="all"><span data-id="Semua" data-en="All">Semua</span></button>
            @foreach ($categories as $key => [$id, $en, $icon])
                <button type="button" class="chip" data-filter="{{ $key }}">
                    <i class="fa-solid {{ $icon }}"></i>
                    <span data-id="{{ $id }}" data-en="{{ $en }}">{{ $id }}</span>
                </button>
            @endforeach
        </div>

        <div class="product-layout">
            <div class="product-grid" id="productGrid">
                @foreach ($products as $p)
                    @include('partials.product-card', ['p' => $p])
                @endforeach
            </div>

            <aside class="promo reveal d2">
                <div class="promo-glow"></div>
                <i class="fa-solid fa-bag-shopping promo-icon"></i>
                <a href="#contact" class="btn-cream">
                    <span data-id="Hubungi Untuk Pesan" data-en="Contact to Order">Hubungi Untuk Pesan</span>
                    <i class="fa-solid fa-arrow-right"></i>
                </a>
            </aside>
        </div>
    </div>
</section>

@endsection