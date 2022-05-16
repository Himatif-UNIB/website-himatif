@extends('layouts.admin')
@section('title', $showcase->title)

@section('custom_head')
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/plugins/@fortawesome/fontawesome-free/css/all.min.css') }}">
    <link href="{{ asset('assets/plugins/animate/animate.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/themes/cork/css/components/custom-modal.css') }}" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/lightshowcase@2.4.0/css/lightshowcase.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/lightshowcase@2.4.0/css/lg-zoom.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/lightshowcase@2.4.0/css/lg-fullscreen.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/lightshowcase@2.4.0/css/lg-share.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/lightshowcase@2.4.0/css/lg-pager.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/lightshowcase@2.4.0/css/lg-thumbnail.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/lightshowcase@2.4.0/css/lg-comments.css">
@endsection

@section('content')
    <div id="disqus_thread"></div>

    <div class="layout-px-spacing">

        <div class="row layout-top-spacing" id="cancel-row">
            <div class="col-xl-12 col-lg-12 col-sm-12 mb-3">
                <div class="widget-content widget-content-area text-center">
                    <h3>{{ $showcase->title }}</h3>
                </div>
            </div>

            <div class="col-xl-8 col-lg-8 col-sm-12 layout-spacing">
                <div class="widget-content widget-content-area br-6 p-0">
                    @if ($showcase->type == 'app')
                    <div>
                        <img src="{{ $showcase->media[0]->getFullUrl() }}" alt="{{ $showcase->title }}"
                            class="img img-fluid">
                    </div>
                    @else
                        <div>
                            <iframe style="width: 100%; height: 350px;"
                                src="https://www.youtube.com/embed/{{ getYoutubeID($showcase->youtube_url) }}"
                                title="YouTube video player" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                    @endif

                    <div class="row text-center text-lg-left mt-3 mx-2" id="lightshowcase">
                        @foreach ($showcase->media as $item)
                            <a data-disqus-identifier="{{ $showcase->id }}" data-disqus-url="{{ $item->getFullUrl() }}"
                                href="{{ $item->getFullUrl() }}" class="col-lg-3 col-md-4 col-6 d-block mb-4 h-100"
                                data-sub-html="<h4 class='text-white'>{{ $item->getCustomProperty('name') }}</h4>{{ $item->getCustomProperty('description') }}">
                                <img class="img-fluid img-thumbnail" src="{{ $item->getFullUrl() }}"
                                    alt="{{ $showcase->title }}">
                            </a>
                        @endforeach
                    </div>

                    <div class="mx-4 pb-3">
                        <div>
                            <span class="badge badge-primary rounded">{{ $showcase->category->name }}</span>
                        </div>

                        <h5 class="mt-2">{{ $showcase->title }}</h5>
                        @if (!empty($showcase->tags))
                            <div>Tag:
                                @foreach ($showcase->tag_array as $tag)
                                    <span class="badge badge-info">{{ trim($tag) }}</span>
                                @endforeach
                            </div>
                        @endif

                        @if (!empty($showcase->technologies))
                            <div class="mt-1 mb-4">Teknologi:
                                @foreach ($showcase->technologies_array as $technology)
                                    <span class="badge badge-info">{{ trim($technology) }}</span>
                                @endforeach
                            </div>
                        @endif

                        {!! $showcase->description !!}
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-sm-12 layout-spacing">
                <div class="widget-content widget-content-area br-6">
                    <h5>Profil Author</h5>
                    <div class="mt-4">
                        <div class="media">
                            <div class="avatar avatar-xl mr-3">
                                <span class="avatar-title rounded-circle">
                                    <img src="{{ $showcase->user->getAvatar() }}" alt="{{ $showcase->user->name }}"
                                        class="img-fluid rounded">
                                </span>
                            </div>
                            <div class="media-body">
                                <h5 class="mt-0">{{ $showcase->user->name }}</h5>
                                <p class="mb-0">{{ $showcase->user->email }}</p>
                            </div>
                        </div>
                    </div>
                    @if ($showcase->user_id == auth()->user()->id)
                        <div class="mt-4">
                            <a href="{{ route('admin.showcases.edit', $showcase->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete-modal">Hapus</a>
                        </div>
                    @endif
                </div>

                @if (!empty($showcase->github_url))
                    <div class="widget-content widget-content-area br-6 mt-2">
                        <div class="media">
                            <div class="avatar avatar-xl mr-3">
                                <i class="fab fa-github"></i>
                            </div>
                            <div class="media-body">
                                <a href="{{ $showcase->github_url }}" target="_blank" rel="noopener noreferrer">GitHub
                                    Repository</a>
                            </div>
                        </div>
                    </div>
                @endif

                @if (!empty($showcase->report_drive_id))
                    <div class="widget-content widget-content-area br-6 mt-2">
                        <div class="media">
                            <div class="avatar avatar-xl mr-3">
                                <i class="fas fa-file-pdf"></i>
                            </div>
                            <div class="media-body" style="overflow: hidden;">
                                <a href="{{ create_drive_url($showcase->report_drive_id) }}" target="_blank" rel="noopener noreferrer">{{ $showcase->report_file_name }}</a>
                            </div>
                        </div>
                    </div>
                @endif

                @if (!empty($showcase->youtube_url))
                    <div class="widget-content widget-content-area br-6 mt-2">
                        <div class="media">
                            <div class="avatar avatar-xl mr-3">
                                <i class="fab fa-youtube"></i>
                            </div>
                            <div class="media-body">
                                <a href="{{ $showcase->youtube_url }}" target="_blank" rel="noopener noreferrer">View on YouTube</a>
                            </div>
                        </div>
                    </div>
                @endif

                @if (!empty($showcase->drive_url))
                    <div class="widget-content widget-content-area br-6 mt-2">
                        <div class="media">
                            <div class="avatar avatar-xl mr-3">
                                <i class="fab fa-google-drive"></i>
                            </div>
                            <div class="media-body">
                                <a href="{{ $showcase->drive_url }}" target="_blank" rel="noopener noreferrer">More file on Drive</a>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>

    </div>
@endsection

@section('custom_html')
    @if (current_user_can('delete_showcase'))
        <div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="{{ route('admin.showcases.destroy', $showcase->id) }}" method="post">
                        @csrf
                        @method('DELETE')

                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Hapus Karya?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                                    <line x1="18" y1="6" x2="6" y2="18"></line>
                                    <line x1="6" y1="6" x2="18" y2="18"></line>
                                </svg>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p class="modal-text">
                                Anda yakin ingin menghapus karya ini? Tindakan ini tidak dapat dibatalkan.
                            </p>
                        </div>
                        <div class="modal-footer">
                            <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i>
                                Batal</button>
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif
@endsection

@push('custom_js')
    <script src="https://cdn.jsdelivr.net/npm/lightshowcase@2.4.0/lightshowcase.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/lightshowcase@2.4.0/plugins/zoom/lg-zoom.umd.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/lightshowcase@2.4.0/plugins/fullscreen/lg-fullscreen.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/lightshowcase@2.4.0/plugins/share/lg-share.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/lightshowcase@2.4.0/plugins/pager/lg-pager.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/lightshowcase@2.4.0/plugins/hash/lg-hash.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/lightshowcase@2.4.0/plugins/thumbnail/lg-thumbnail.min.js"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/lightshowcase@2.4.0/plugins/comment/lg-comment.min.js"></script> --}}

    {{-- <script>
        var disqus_config = function() {
            this.page.url =
                '{{ route('galeri.detail', ['album' => $showcase->id, 'slug' => $showcase->slug]) }}'; // Replace PAGE_URL with your page's canonical URL variable
            this.page.identifier =
                {{ $showcase->id }}; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
        };
        (function() {
            // DON'T EDIT BELOW THIS LINE
            var d = document,
                s = d.createElement('script');
            s.src = 'https://lg-disqus.disqus.com/embed.js';
            s.setAttribute('data-timestamp', +new Date());
            (d.head || d.body).appendChild(s);
        })();
    </script> --}}

    <script>
        const container = document.getElementById('lightshowcase');
        lightGallery(container, {
            plugins: [lgZoom, lgFullscreen, lgShare, lgPager, lgHash, lgThumbnail, lgComment],
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
