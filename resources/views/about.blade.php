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
            <div class="value"><span data-id="Barokah" data-en="Blessing">Barokah</span></div>
            <div class="value"><span data-id="Mengsejahterakan" data-en="Welfare    ">Mengsejahterakan</span></div>
        </div>
    </div>
</section>

<section class="section about-extra">
    <div class="container">
        <div class="section-head reveal">
            <span class="eyebrow" data-id="Profil Singkat" data-en="Quick Profile">Profil Singkat</span>
            <h2 class="title" data-id="Mengenal Kopsis Lebih Dekat" data-en="Get to Know Kopsis Closer">Mengenal Kopsis Lebih Dekat</h2>
        </div>

        <div class="info-cards three">
            <div class="info-card reveal">
                <i class="fa-solid fa-users"></i>
                <strong data-id="Pengelola" data-en="Managers">Pengelola</strong>
                <small data-id="Siswa anggota organisasi Kopsis" data-en="Student members of Kopsis">Siswa anggota organisasi Kopsis</small>
            </div>
            <div class="info-card reveal d1">
                <i class="fa-solid fa-chalkboard-user"></i>
                <strong data-id="Guru Pembina" data-en="Advisors">Guru Pembina</strong>
                <small>Ibu Ririh Damayanti & Ibu Suratimah</small>
            </div>
            <div class="info-card reveal d2">
                <i class="fa-solid fa-bullseye"></i>
                <strong data-id="Tujuan" data-en="Goal">Tujuan</strong>
                <small data-id="Mendukung pelaksanaan ekonomi syariah" data-en="Supporting the implementation of sharia economy">Mendukung pelaksanaan ekonomi syariah</small>
            </div>
        </div>

        <p class="program-note reveal">
            <i class="fa-solid fa-award"></i>
            <span data-id="Dibentuk sebagai wujud pelaksanaan Program Sekolah Pelopor Ekonomi Syariah oleh Komite Nasional Ekonomi dan Keuangan Syariah melalui Dikpora DIY."
                  data-en="Established as part of the Sharia Economy Pioneer School Program by the National Committee for Sharia Economy and Finance through Dikpora DIY.">
                Dibentuk sebagai wujud pelaksanaan Program Sekolah Pelopor Ekonomi Syariah oleh Komite Nasional Ekonomi dan Keuangan Syariah melalui Dikpora DIY.
            </span>
        </p>
    </div>
</section>

@endsection