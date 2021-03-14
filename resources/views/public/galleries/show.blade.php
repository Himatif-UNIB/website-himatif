@extends('layouts.frontend')
@section('title', 'Galeri Foto ' . getSetting('organizationName'))

@section('custom_head')
    <link rel="stylesheet" href="{{ asset('assets/plugins/lightgallery.js/dist/css/lightgallery.min.css') }}">

    <style>
        .grid {
            display: grid;
            grid-template-columns: 1fr;
            grid-gap: 1.5rem;
        }

        @media screen and (min-width: 768px) {
            .grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media screen and (min-width: 992px) {
            .grid {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        .grid a img {
            transition: all .2s ease-in;
            filter: grayscale(100%);
        }

        .grid a:hover img {
            filter: grayscale(0);
        }

    </style>
@endsection

@section('outer-content')

    <div class="bg-dark-blue relative">
        <div class="container mx-auto px-6 lg:px-28 py-6">
            <div class="text-center mb-5">
                <h1 class="text-3xl text-white font-semibold">{{ $album->title }}</h1>
                <p class="text-gray-200">Diposting pada {{ \Carbon\Carbon::parse($album->created_at)->format('l, d M Y H:i') }}</p>
            </div>
            <div class="grid max-w-4xl mx-auto p-8" id="galleries">
                @foreach ($album->media as $picture)
                    <a href="{{ $picture->getFullUrl() }}" target="_blank"
                        class="bg-white rounded h-full text-grey-darkest no-underline shadow-md">
                        <img class="w-full block rounded-b" src="{{ $picture->getFullUrl() }}" alt="A photo of a fox">
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