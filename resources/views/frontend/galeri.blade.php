@extends('layouts.frontend')

@section('inner-content')
<div class="px-2 mt-12 lg:mt-12 lg:px-0">
    <!-- START JUMBOTRON -->
    <div class="inline md:flex lg:flex items-center justify-between">
        <div class="inline">
            <h1 class="text-center lg:text-left text-6xl lg:text-9xl font-serif text-white bottom-0">Galeri</h1>
            <p class="mt-3 lg:mt-0 text-center lg:text-left text-dark-blue-400 text-base font-bold leading-relaxed">
                Kumpulan foto-foto kegiatan HIMATIF Universitas Bengkulu
            </p>
        </div>
        <img class="mt-12 lg:mt-0 w-full lg:w-2/3" src="{{ asset('assets/foto-galeri.png') }}">
    </div>
    <!-- END JUMBOTRON -->
</div>
@endsection

@section('outer-content')
<div class="px-12 lg:px-24">
 <!-- START CONTENT -->
 <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6 mt-16">
    <div class="mb-1 lg:mb-2">
        <div class="w-full h-56 bg-gray-400 rounded-xl overflow-hidden">
            <img class="cursor-pointer w-full h-full object-cover object-center" alt="">
        </div>
    </div>
    <div class="mb-1 lg:mb-2">
        <div class="w-full h-56 bg-gray-400 rounded-xl overflow-hidden">
            <img class="cursor-pointer w-full h-full object-cover object-center" alt="">
        </div>
    </div>
    <div class="mb-1 lg:mb-2">
        <div class="w-full h-56 bg-gray-400 rounded-xl overflow-hidden">
            <img class="cursor-pointer w-full h-full object-cover object-center" alt="">
        </div>
    </div>
    <div class="mb-1 lg:mb-2">
        <div class="w-full h-56 bg-gray-400 rounded-xl overflow-hidden">
            <img class="cursor-pointer w-full h-full object-cover object-center" alt="">
        </div>
    </div>
    <div class="mb-1 lg:mb-2">
        <div class="w-full h-56 bg-gray-400 rounded-xl overflow-hidden">
            <img class="cursor-pointer w-full h-full object-cover object-center" alt="">
        </div>
    </div>
</div>
</div>

@endsection