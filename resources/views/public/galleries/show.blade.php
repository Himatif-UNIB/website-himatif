@extends('layouts.frontend')
@section('title', $album->title .' | Galeri Foto HIMATIF')

@section('custom_head')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/lightgallery@2.4.0/css/lightgallery.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/lightgallery@2.4.0/css/lg-zoom.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/lightgallery@2.4.0/css/lg-fullscreen.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/lightgallery@2.4.0/css/lg-share.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/lightgallery@2.4.0/css/lg-pager.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/lightgallery@2.4.0/css/lg-thumbnail.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/lightgallery@2.4.0/css/lg-autoplay.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/lightgallery@2.4.0/css/lg-comments.css">

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

    <meta property="og:url" content="{{ route('galeri.detail', ['album' => $album->id, 'slug' => $album->slug]) }}">
    <meta property="og:type" content="article">
    <meta property="og:title" content="{{ $album->title }}">
    <meta property="og:description" content="{{ $album->description }}">
    <meta property="og:image" content="{{ $album->media[0]->getFullUrl() }}">
    <meta property="fb:app_id" content="{{ config('services.facebook.client_id') }}">
@endsection

@section('outer-content')
    <div id="disqus_thread"></div>

    <div class="bg-dark-blue relative">
        <div class="container mx-auto px-6 lg:px-28 py-6">
            <div class="text-center mb-12">
                <h1 class="text-3xl text-white font-semibold mb-3">{{ $album->title }}</h1>
                <p class="text-gray-200">Diposting pada
                    {{ \Carbon\Carbon::parse($album->created_at)->translatedFormat('l, d M Y H:i') }}</p>
                <p class="text-gray-200 mt-2">{!! $album->description !!} </p>
            </div>
            <div class="grid grid-cols-2 lg:grid-cols-3 mx-auto" id="lightgallery">
                @foreach ($album->media as $picture)
                    <a class="gallery m-1 md:m-2 lg:m-3 move-y-animation" href="{{ $picture->getFullUrl() }}"
                        data-disqus-identifier="{{ $album->id }}" data-disqus-url="{{ $picture->getFullUrl() }}"
                        target="_blank">
                        <div class="bg-white h-full text-grey-darkest no-underline shadow-md rounded-md overflow-hidden">
                            <div class="h-36 md:h-48 lg:h-72">
                                <img class="w-full h-full block rounded-b object-cover"
                                    src="{{ $picture->getFullUrl() }}" alt="{{ $album->title }}">
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>

            <div class="text-center mt-5">
                <p class="text-gray-200 mt-2">Klik foto untuk memulai slide. Juga tinggalkan komentar pada foto tersebut.</p>
            </div>
        </div>
    </div>

@endsection

@push('custom_js')
    <script src="https://cdn.jsdelivr.net/npm/lightgallery@2.4.0/lightgallery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/lightgallery@2.4.0/plugins/zoom/lg-zoom.umd.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/lightgallery@2.4.0/plugins/fullscreen/lg-fullscreen.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/lightgallery@2.4.0/plugins/share/lg-share.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/lightgallery@2.4.0/plugins/pager/lg-pager.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/lightgallery@2.4.0/plugins/hash/lg-hash.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/lightgallery@2.4.0/plugins/thumbnail/lg-thumbnail.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/lightgallery@2.4.0/plugins/autoplay/lg-autoplay.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/lightgallery@2.4.0/plugins/comment/lg-comment.min.js"></script>

    <script>
        var disqus_config = function() {
            this.page.url =
            '{{ route('galeri.detail', ['album' => $album->id, 'slug' => $album->slug]) }}'; // Replace PAGE_URL with your page's canonical URL variable
            this.page.identifier = {{ $album->id }}; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
        };
        (function() {
            // DON'T EDIT BELOW THIS LINE
            var d = document,
                s = d.createElement('script');
            s.src = 'https://lg-disqus.disqus.com/embed.js';
            s.setAttribute('data-timestamp', +new Date());
            (d.head || d.body).appendChild(s);
        })();
    </script>

    <script>
        const container = document.getElementById('lightgallery');
        lightGallery(container, {
            plugins: [lgZoom, lgFullscreen, lgShare, lgPager, lgHash, lgThumbnail, lgAutoplay, lgComment],
            // licenseKey: 'your_license_key'
            speed: 500,
            thumbnail: true,
            hash: true,
            commentBox: true,
            disqusComments: true,
        });

        const requestFullScreen = () => {
            const el = document.documentElement;
            if (el.requestFullscreen) {
                el.requestFullscreen();
            } else if (el.msRequestFullscreen) {
                el.msRequestFullscreen();
            } else if (el.mozRequestFullScreen) {
                el.mozRequestFullScreen();
            } else if (el.webkitRequestFullscreen) {
                el.webkitRequestFullscreen();
            }
        };
        container.addEventListener("lgAfterOpen", () => {
            requestFullScreen();
        });
    </script>
@endpush
