@extends('layouts.app')

@section('title', 'Operasional | Koperasi Siswa Syariah')
@section('header_class', 'solid')

@section('content')

<section class="page-top">
    <div class="container">
        <span class="eyebrow" data-id="Informasi Operasional" data-en="Operational Info">Informasi Operasional</span>
        <h1 data-id="Jam Operasional dan Informasi Penting" data-en="Operating Hours & Important Info">Jam Operasional dan Informasi Penting</h1>
    </div>
</section>

<section class="section">
    <div class="container">
        @include('partials.op-cards')

        <div class="steps">
            <h3 class="title reveal" data-id="Cara Berbelanja" data-en="How to Shop">Cara Berbelanja</h3>
            <div class="steps-grid">
                <div class="step reveal">
                    <span class="num">1</span>
                    <h5 data-id="Datang ke Toko" data-en="Visit the Store">Datang ke Toko</h5>
                    <p data-id="Kunjungi Toko Kopsis pada jam operasional." data-en="Visit the Kopsis store during operating hours.">Kunjungi Toko Kopsis pada jam operasional.</p>
                </div>
                <div class="step reveal d1">
                    <span class="num">2</span>
                    <h5 data-id="Pilih Produk" data-en="Choose Products">Pilih Produk</h5>
                    <p data-id="Pilih kebutuhanmu, mulai dari alat tulis sampai makanan dan minuman." data-en="Pick what you need, from stationery to snacks and drinks.">Pilih kebutuhanmu, mulai dari alat tulis sampai makanan dan minuman.</p>
                </div>
                <div class="step reveal d2">
                    <span class="num">3</span>
                    <h5 data-id="Bayar" data-en="Pay">Bayar</h5>
                    <p data-id="Bayar dengan tunai atau QRIS kepada pengurus." data-en="Pay with cash or QRIS to the committee member.">Bayar dengan tunai atau QRIS kepada pengurus.</p>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection