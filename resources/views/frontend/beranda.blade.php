@extends('layouts.frontend')

@section('inner-content')
<!-- START JUMBOTRON -->
<div class="lg:flex justify-between mt-20 items-center">
    <div data-aos="fade-right" data-aos-delay="200">
        <h1 class="text-white md:text-left uppercase mb-12 text-center">
            <span class="text-6xl md:text-7xl font-bold tracking-widest block">{{ getSetting('organizationName') }}</span>
            <span class="text-2xl md:text-3xl tracking-wider font-light block">{{ getSetting('organizationUniversity') }}</span>
        </h1>

        <div class="text-center md:text-left">
            <span class="text-dark-blue-400 text-lg font-bold">
                {{ getSetting('organizationTagLine') }}
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
                Sekilas Tentang {{ getSetting('organizationName') }}
            </h2>
            <span class="text-dark-blue-400 text-base font-bold leading-relaxed">
                {{ getSetting('organizationDesc') }}
            </span>
        </div>
    </div>

    <div class="mt-36">
        <h2 class="text-dark-blue-800 text-2xl lg:text-4xl font-bold mb-12 flex justify-center" data-aos="zoom-in-up">
            Bidang Organisasi
        </h2>
        <div class="grid grid-row md:grid-cols-2 lg:grid-cols-3 place-items-center"  data-aos="fade-up" data-aos-delay="500">
            @forelse ($divisions as $item)
            <div class="border-2 cursor-pointer hover:border-gray-400 transition duration-500 ease-in-out w-64 h-64 lg:w-80 lg:h-80 rounded-3xl p-5 mb-5 flex flex-wrap content-center">
                <img class="mx-auto" src="{{ $item->media[0]->getFullUrl() }}" alt="{{ $item->name }}"
                    title="Bidang {{ $item->name }}">
            </div>
            @empty
            <div>
                Tidak ada data untuk ditampilkan
            </div>
            @endforelse
        </div>
    </div>
</div>
@endsection