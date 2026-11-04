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

        <p data-id="Koperasi Siswa Syariah SMK Negeri 1 Bantul merupakan koperasi sekolah yang menyediakan berbagai kebutuhan warga sekolah dengan mengutamakan pelayanan yang profesional, amanah, dan sesuai prinsip syariah."
           data-en="The Sharia Student Cooperative of SMK Negeri 1 Bantul is a school cooperative that provides the needs of the school community, prioritizing professional, trustworthy service in line with sharia principles.">
            Koperasi Siswa Syariah SMK Negeri 1 Bantul merupakan koperasi sekolah yang menyediakan berbagai kebutuhan warga sekolah dengan mengutamakan pelayanan yang profesional, amanah, dan sesuai prinsip syariah.
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