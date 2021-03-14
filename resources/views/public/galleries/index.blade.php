@extends('layouts.frontend')
@section('title', 'Galeri Foto ' . getSetting('organizationName'))
@section('style-after')
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/plugins/lightGallery/css/lightgallery.css') }}" />
@endsection

@section('inner-content')
    <div class="px-2 mt-12 lg:mt-12 lg:px-0">
        <!-- START JUMBOTRON -->
        <div class="inline md:flex lg:flex items-center justify-between">
            <div class="inline" data-aos="fade-right" data-aos-delay="200">
                <h1 class="text-center lg:text-left text-6xl lg:text-9xl font-serif text-white bottom-0">Galeri</h1>
                <p class="mt-3 lg:mt-0 text-center lg:text-left text-dark-blue-400 text-base font-bold leading-relaxed">
                    Kumpulan foto-foto kegiatan HIMATIF Universitas Bengkulu
                </p>
            </div>
            <img class="mt-12 lg:mt-0 w-full lg:w-2/3" src="{{ asset('assets/foto-galeri.png') }}" data-aos="zoom-in" data-aos-delay="600">
        </div>
        <!-- END JUMBOTRON -->
    </div>
@endsection

@section('outer-content')
    <div class="px-12 lg:px-24">

        <div class="mt-10">
            <p class="text-white font-semibold text-2xl">Semua Album</p>
        </div>

        <!-- START CONTENT -->
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6 mt-6">
            @forelse ($albums as $album)
                <a href="{{ route('galeri.detail', ['album' => $album->id, 'slug' => $album->slug]) }}" class="flex flex-col">
                    <div class="w-full h-52 rounded-lg overflow-hidden">
                        <img class="w-full h-full object-cover" src="{{ asset('assets/bg-article.png') }}" alt="">
                    </div>
                    <div class="w-full mt-2">
                        <p class="text-white font-medium">{{ $album->title }}</p>
                        <p class="text-gray-400">{{ count($album->media) }} foto</p>
                    </div>
                </a>
            @empty
                <a href="{{ route('galeri.detail', 'test') }}" class="flex flex-col">
                    <div class="w-full h-52 rounded-lg overflow-hidden">
                        <img class="w-full h-full object-cover" src="{{ asset('assets/bg-article.png') }}" alt="">
                    </div>
                    <div class="w-full mt-2">
                        <p class="text-white font-medium">Tidak ada album</p>
                        <p class="text-gray-400">Tidak ada album yang ditambahkan</p>
                    </div>
                </a>
            @endforelse
        </div>
    </div>

@endsection

@section('script-after')
<script src="{{ asset('assets/plugins/lightGallery/js/lightgallery.min.js') }}"></script>

<!-- lightgallery plugins -->
<script src="{{ asset('assets/plugins/lightGallery/js/lg-thumbnail.min.js') }}"></script>
<script src="{{ asset('assets/plugins/lightGallery/js/lg-fullscreen.min.js') }}"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#lightGallery').lightGallery({
            selector: '.item'
        });
    });

</script>
@endsection
