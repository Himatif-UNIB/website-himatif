@extends('layouts.frontend')

@section('inner-content')
<!-- START JUMBOTRON -->
<div class="lg:flex justify-between mt-20 items-center">
    <div data-aos="fade-right" data-aos-delay="200">
        <h1 class="text-white md:text-left uppercase mb-12 text-center">
            <span class="text-6xl md:text-7xl font-bold tracking-widest block">Himatif</span>
            <span class="text-2xl md:text-3xl tracking-wider font-light block">Universitas Bengkulu</span>
        </h1>

        <div class="text-center md:text-left">
            <span class="text-dark-blue-400 text-lg font-bold">
                Wadah bagi mahasiswa Teknik Informatika Universitas Bengkulu untuk berkarya dan mengabdi.
            </span>
        </div>

    </div>
    <img class="mt-16 lg:mt-0" src="{{ asset('assets/hero-img.png') }}" alt="" data-aos="zoom-in" data-aos-delay="600">
</div>
<!-- END JUMBOTRON -->
@endsection

@section('outer-content')
<div class="container mx-auto px-6 lg:px-28 py-6 mt-28">
    <div class="lg:flex justify-between items-center">
        <img src="{{ asset('assets/about-himatif.png') }}" class="mr-24" data-aos="fade-right" data-aos-delay="700">
        <div class="" data-aos="fade-up">
            <h2 class="text-dark-blue-800 text-2xl lg:text-4xl font-bold mb-6 mt-5 lg:mt-0">
                Sekilas Tentang Himatif
            </h2>
            <span class="text-dark-blue-400 text-base font-bold leading-relaxed">
                Himpunan Mahasiswa Teknik Informatika (HIMATIF) di bentuk di Bengkulu (Universitas Bengkulu) pada tanggal 22 september 2006 Himatif merupakan tempat bagi mahasiswa Teknik Informatika Universitas Bengkulu untuk berkarya serta mengabdi sebagai kewajiban seorang mahasiswa. Kepengurusan HIMATIF di bagi menjadi 6 devisi bidang, yaitu Bidang Kerohanian, Bidang IT, Bidang Pendidikan, Bidang Olahraga dan Kesenian, Bidang Pengabdian Masyarakat, Bidang Kewirausahaan
            </span>
        </div>
    </div>

    <div class="mt-36">
        <h2 class="text-dark-blue-800 text-2xl lg:text-4xl font-bold mb-12 flex justify-center" data-aos="zoom-in-up">
            Bidang Organisasi
        </h2>
        <div class="grid grid-row md:grid-cols-2 lg:grid-cols-3 place-items-center"  data-aos="fade-up" data-aos-delay="500">
            <div class="border-2 cursor-pointer hover:border-gray-400 transition duration-500 ease-in-out w-64 h-64 lg:w-80 lg:h-80 rounded-3xl p-5 mb-5 flex flex-wrap content-center">
                <img class="mx-auto" src="{{ asset('assets/bidang/KWU.png') }}" alt="">
            </div>
            <div class="border-2 w-64 h-64 lg:w-80  lg:h-80 rounded-3xl p-5 mb-5 flex flex-wrap content-center">
                <img class="mx-auto" src="{{ asset('assets/bidang/IT.png') }}" alt="">
            </div>
            <div class="border-2 w-64 h-64 lg:w-80  lg:h-80 rounded-3xl p-5 mb-5 flex flex-wrap content-center">
                <img class="mx-auto" src="{{ asset('assets/bidang/PSDM.png') }}" alt="">
            </div>
            <div class="border-2 w-64 h-64 lg:w-80  lg:h-80 rounded-3xl p-5 mb-5 flex flex-wrap content-center">
                <img class="mx-auto" src="{{ asset('assets/bidang/Minbak.png') }}" alt="">
            </div>
            <div class="border-2 w-64 h-64 lg:w-80  lg:h-80 rounded-3xl p-5 mb-5 flex flex-wrap content-center">
                <img class="mx-auto" src="{{ asset('assets/bidang/Pengabdian Masyarakat.png') }}" alt="">
            </div>
            <div class="border-2 w-64 h-64 lg:w-80  lg:h-80 rounded-3xl p-5 mb-5 flex flex-wrap content-center">
                <img class="mx-auto" src="{{ asset('assets/bidang/Kerohanian.png') }}" alt="">
            </div>
        </div>
    </div>
</div>
@endsection