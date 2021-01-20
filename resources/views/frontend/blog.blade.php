@extends('layouts.frontend')

@section('inner-content')
<div class="px-2 mt-12 lg:mt-24 lg:px-0">

    <!-- START JUMBOTRON -->
    <div class="relative">
        <img src="{{ asset('assets/bg-article.png') }}" alt="">
        <h1 class="px-8 lg:px-24 text-6xl lg:text-9xl font-serif text-white absolute bottom-0">Articles</h1>
    </div>
    <!-- END JUMBOTRON -->

    <div class="lg:px-24">

        <!-- START CATEGORY -->
        <div class="mt-12 flex overflow-x-auto">
            <div class="w-min border-2 rounded-full text-center font-bold px-3 py-1 mr-4 border-orange-600 text-orange-600">
                Semua
            </div>
            <div class="w-min border-2 rounded-full text-center font-bold px-3 py-1 mr-4 border-dark-blue-400 text-dark-blue-400">
                Artikel
            </div>
            <div class="w-min border-2 rounded-full text-center font-bold px-3 py-1 mr-4 border-dark-blue-400 text-dark-blue-400">
                Kegiatan
            </div>
            <div class="w-min border-2 rounded-full text-center font-bold px-3 py-1 mr-4 border-dark-blue-400 text-dark-blue-400">
                Pengumuman
            </div>
        </div>
        <!-- END CATEGORY -->

        <!-- START CONTENT -->
        <div class="grid md:grid-cols-3 gap-6 mt-16">
            <div class="mb-12">
                <div class="w-full h-56 bg-gray-400 rounded-xl overflow-hidden">
                    <a href="{{ route('blog.post') }}">
                        <img class="w-full h-full object-cover object-center" src="" alt="">
                    </a>
                </div>
                <div class="w-min px-5 bg-category-button-green text-category-text-green font-semibold rounded-md mt-6">
                    Artikel
                </div>
                <div class="text-white text-lg font-bold mt-3">
                    Lorem ipsum dolor sit amet.
                </div>
                <div class="text-dark-blue-400 text-base font-bold mt-3">
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Vel inventore et ullam, officiis
                </div>
            </div>
            <div class="mb-12">
                <div class="w-full h-56 bg-gray-400 rounded-xl overflow-hidden">
                    <img class="w-full h-full object-cover object-center" src="" alt="">
                </div>
                <div class="w-min px-5 bg-category-button-yellow text-category-text-yellow font-semibold rounded-md mt-6">
                    Kegiatan
                </div>
                <div class="text-white text-lg font-bold mt-3">
                    Lorem ipsum dolor sit amet.
                </div>
                <div class="text-dark-blue-400 text-base font-bold mt-3">
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Vel inventore et ullam, officiis
                </div>
            </div>
            <div class="mb-12">
                <div class="w-full h-56 bg-gray-400 rounded-xl overflow-hidden">
                    <img class="w-full h-full object-cover object-center" src="" alt="">
                </div>
                <div class="w-min px-5 bg-category-button-blue text-category-text-blue font-semibold rounded-md mt-6">
                    Pengumuman
                </div>
                <div class="text-white text-lg font-bold mt-3">
                    Lorem ipsum dolor sit amet.
                </div>
                <div class="text-dark-blue-400 text-base font-bold mt-3">
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Vel inventore et ullam, officiis
                </div>
            </div>
            <div class="mb-12">
                <div class="w-full h-56 bg-gray-400 rounded-xl overflow-hidden">
                    <img class="w-full h-full object-cover object-center" src="" alt="">
                </div>
                <div class="w-min px-5 bg-category-button-green text-category-text-green font-semibold rounded-md mt-6">
                    Artikel
                </div>
                <div class="text-white text-lg font-bold mt-3">
                    Lorem ipsum dolor sit amet.
                </div>
                <div class="text-dark-blue-400 text-base font-bold mt-3">
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Vel inventore et ullam, officiis
                </div>
            </div>
            <div class="mb-12">
                <div class="w-full h-56 bg-gray-400 rounded-xl overflow-hidden">
                    <img class="w-full h-full object-cover object-center" src="" alt="">
                </div>
                <div class="w-min px-5 bg-category-button-yellow text-category-text-yellow font-semibold rounded-md mt-6">
                    Kegiatan
                </div>
                <div class="text-white text-lg font-bold mt-3">
                    Lorem ipsum dolor sit amet.
                </div>
                <div class="text-dark-blue-400 text-base font-bold mt-3">
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Vel inventore et ullam, officiis
                </div>
            </div>
            <div class="mb-12">
                <div class="w-full h-56 bg-gray-400 rounded-xl overflow-hidden">
                    <img class="w-full h-full object-cover object-center" src="" alt="">
                </div>
                <div class="w-min px-5 bg-category-button-blue text-category-text-blue font-semibold rounded-md mt-6">
                    Pengumuman
                </div>
                <div class="text-white text-lg font-bold mt-3">
                    Lorem ipsum dolor sit amet.
                </div>
                <div class="text-dark-blue-400 text-base font-bold mt-3">
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Vel inventore et ullam, officiis
                </div>
            </div>
        </div>
        <!-- END CONTENT-->
    </div>

</div>
@endsection