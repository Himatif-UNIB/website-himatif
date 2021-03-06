@extends('layouts.frontend')
@section('title', 'Galeri Foto ' . getSetting('organizationName'))

@section('custom_head')
    <link rel="stylesheet" href="{{ asset('assets/plugins/lightgallery.js/dist/css/lightgallery.min.css') }}">

    <style>
        .grid a img {
            transition: all .2s ease-in;
            filter: grayscale(100%);
        }

        .grid a:hover img {
            filter: grayscale(0);
        }

        .move-y-animation {
            transition: 0.2s;
        }

        .move-y-animation:hover {
            transform: translateY(-10px);
        }

    </style>

@endsection

@section('outer-content')

    <div class="bg-dark-blue relative">
        <div class="container mx-auto px-6 lg:px-28 py-6">
            <div class="text-center mb-12">
                <h1 class="text-3xl text-white font-semibold mb-3">{{ $album->title }}</h1>
                <p class="text-gray-200">Diposting pada {{ \Carbon\Carbon::parse($album->created_at)->format('l, d M Y H:i') }}</p>
            </div>
            <div class="grid grid-cols-2 lg:grid-cols-3 mx-auto" id="galleries">
                @foreach ($album->media as $picture)
                <a class="gallery m-1 md:m-2 lg:m-3 move-y-animation" href="{{ $picture->getFullUrl() }}" target="_blank">
                    <div class="bg-white h-full text-grey-darkest no-underline shadow-md rounded-md overflow-hidden">
                        <div class="h-36 md:h-48 lg:h-72">
                            <img class="w-full h-full block rounded-b object-cover" src="{{ $picture->getFullUrl() }}" alt="A photo of a fox">
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </div>

@endsection

@push('custom_js')
    <script src="{{ asset('assets/plugins/lightgallery.js/dist/js/lightgallery.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/lightgallery.js/plugins/lg-fullscreen.js/dist/lg-fullscreen.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/lightgallery.js/plugins/lg-autoplay.js/dist/lg-autoplay.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/lightgallery.js/plugins/lg-pager.js/dist/lg-pager.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/lightgallery.js/plugins/lg-share.js/dist/lg-share.min.js') }}"></script>

    <script>
        lightGallery(document.getElementById('galleries'), {
            cssEasing : 'cubic-bezier(0.25, 0, 0.25, 1)',
            fullScreen: true,
            autoplay: true,
            pager: true,
            share: true,
            googlePlus: false
        });
    </script>
@endpush