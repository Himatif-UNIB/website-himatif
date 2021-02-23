@extends('layouts.frontend')
@section('title', 'Galeri Foto '. getSetting('organizationName'))
@section('style-after')
<link type="text/css" rel="stylesheet" href="{{ asset('assets/plugins/lightGallery/css/lightgallery.css') }}" />
@endsection

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
    <div id="lightGallery" class="grid md:grid-cols-2 lg:grid-cols-4 gap-6 mt-16">
        <div data-src="{{ asset('assets/bg-article.png') }}" class="item w-full h-56 bg-gray-400 rounded-xl overflow-hidden">
            <img src="{{ asset('assets/bg-article.png') }}" class="cursor-pointer w-full h-full object-cover object-center" alt="">
        </div>
        <div class="w-full h-56 bg-gray-400 rounded-xl overflow-hidden">
            <img class="cursor-pointer w-full h-full object-cover object-center" alt="">
        </div>
        <div class="w-full h-56 bg-gray-400 rounded-xl overflow-hidden">
            <img class="cursor-pointer w-full h-full object-cover object-center" alt="">
        </div>
        <div class="w-full h-56 bg-gray-400 rounded-xl overflow-hidden">
            <img class="cursor-pointer w-full h-full object-cover object-center" alt="">
        </div>
        <div class="w-full h-56 bg-gray-400 rounded-xl overflow-hidden">
            <img class="cursor-pointer w-full h-full object-cover object-center" alt="">
        </div>

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