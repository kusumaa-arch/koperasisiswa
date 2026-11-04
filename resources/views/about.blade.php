@extends('layouts.app')

@section('title', 'Tentang Kami | Koperasi Siswa Syariah')
@section('header_class', 'solid')

@section('content')

<section class="about-container">
    <div class="about-image reveal">
        <img src="{{ asset('images/abt.png') }}" alt="Koperasi Siswa Syariah"
             onerror="this.onerror=null;this.src='https://placehold.co/800x600/e8f3e8/1b5e32?text=Kopsis+Skansaba'">
    </div>

    <div class="about-content reveal d1">
        <span class="eyebrow" data-id="TENTANG KAMI" data-en="ABOUT US">TENTANG KAMI</span>
        <h2>Koperasi Siswa Syariah</h2>

        <p data-id="Koperasi Siswa (Kopsis) Skansaba Syariah merupakan koperasi siswa di SMK Negeri 1 Bantul yang dibentuk sebagai wujud pelaksanaan Program Sekolah Pelopor Ekonomi Syariah oleh Komite Nasional Ekonomi dan Keuangan Syariah melalui Dikpora DIY."
           data-en="Skansaba Syariah Student Cooperative (Kopsis) is a student cooperative at SMK Negeri 1 Bantul, established as part of the implementation of the Sharia Economy Pioneer School Program, an initiative by the National Committee for Sharia Economy and Finance in collaboration with the Yogyakarta Special Region Education, Youth, and Sports Agency (Dikpora DIY).">
            Koperasi Siswa (Kopsis) Skansaba Syariah merupakan koperasi siswa di SMK Negeri 1 Bantul yang dibentuk sebagai wujud pelaksanaan Program Sekolah Pelopor Ekonomi Syariah oleh Komite Nasional Ekonomi dan Keuangan Syariah melalui Dikpora DIY.
        </p>

        <p data-id="Selain menyediakan kebutuhan siswa, koperasi juga menjadi sarana pembelajaran kewirausahaan agar peserta didik mampu mengembangkan jiwa bisnis, tanggung jawab, dan kerja sama."
           data-en="Besides providing student needs, the cooperative is also a learning platform for entrepreneurship so students can develop business spirit, responsibility, and teamwork.">
            Selain menyediakan kebutuhan siswa, koperasi juga menjadi sarana pembelajaran kewirausahaan agar peserta didik mampu mengembangkan jiwa bisnis, tanggung jawab, dan kerja sama.
        </p>

        <div class="values">
            <div class="value"><span data-id="Profesional" data-en="Professional">Profesional</span></div>
            <div class="value"><span data-id="Barokah" data-en="Blessed">Barokah</span></div>
            <div class="value"><span data-id="Mensejahterakan" data-en="Prosperous">Mensejahterakan</span></div>
        </div>
    </div>

@endsection