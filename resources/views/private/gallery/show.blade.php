@extends('layouts.admin')
@section('title', $gallery->title)

@section('custom_head')
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/plugins/@fortawesome/fontawesome-free/css/all.min.css') }}">
    <link href="{{ asset('assets/plugins/animate/animate.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/themes/cork/css/components/custom-modal.css') }}" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/lightgallery@2.4.0/css/lightgallery.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/lightgallery@2.4.0/css/lg-zoom.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/lightgallery@2.4.0/css/lg-fullscreen.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/lightgallery@2.4.0/css/lg-share.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/lightgallery@2.4.0/css/lg-pager.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/lightgallery@2.4.0/css/lg-thumbnail.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/lightgallery@2.4.0/css/lg-comments.css">
@endsection

@section('content')
<div id="disqus_thread"></div>

    <div class="layout-px-spacing">

        <div class="row layout-top-spacing" id="cancel-row">
            <div class="col-xl-12 col-lg-12 col-sm-12 mb-3">
                <div class="widget-content widget-content-area">
                    <h3>{{ $gallery->title }}</h3>
                </div>
            </div>

            <div class="col-xl-4 col-lg-4 col-sm-12 layout-spacing">
                <div class="widget-content widget-content-area br-6 p-0">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <tr>
                                <td>Nama album</td>
                                <td><b>{{ $gallery->title }}</b></td>
                            </tr>
                            <tr>
                                <td>Deskripsi</td>
                                <td><b>{!! $gallery->description !!}</b></td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td><b>
                                        @if ($gallery->status == 'draft')
                                            Konsep
                                        @else
                                            Diterbitkan
                                        @endif
                                    </b></td>
                            </tr>
                            <tr>
                                <td>Kategori</td>
                                <td>
                                    @foreach ($gallery->categories as $category)
                                        <span class="badge badge-info mr-1">{{ $category->name }}</span>
                                    @endforeach
                                </td>
                            </tr>
                            <tr>
                                <td>Jumlah foto</td>
                                <td><b>{{ count($gallery->media) }}</b></td>
                            </tr>
                            <tr>
                                <td>Dibuat tanggal</td>
                                <td><b>{{ \Carbon\Carbon::parse($gallery->created_at)->format('l, d M Y H:i') }}</b></td>
                            </tr>
                            <tr>
                                <td>Dibuat oleh</td>
                                <td><b>{{ $gallery->user->name }}</b></td>
                            </tr>
                        </table>
                    </div>
                    <div class="p-3">
                        <a href="{{ route('galeri.detail', ['album' => $gallery->id, 'slug' => $gallery->slug]) }}"
                            target="_blank" rel="noopener noreferrer" class="btn btn-info btn-sm">Lihat</a>
                        @if (current_user_can('update_gallery'))
                            <a href="{{ route('admin.gallery.edit', $gallery->id) }}"
                                class="btn btn-warning btn-sm">Edit</a>
                        @endif
                        @if (current_user_can('delete_gallery'))
                            <a href="#" data-toggle="modal" data-target="#delete-modal"
                                class="btn btn-danger btn-sm">Hapus</a>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-xl-8 col-lg-8 col-sm-12 layout-spacing">
                <div class="widget-content widget-content-area br-6">
                    <p>Klik foto untuk melihat slide. Formulir komentar ada di setiap foto.</p>
                    <div class="row text-center text-lg-left" id="lightgallery">
                        @foreach ($gallery->media as $item)
                            <a data-disqus-identifier="{{ $gallery->id }}"
                                data-disqus-url="{{ $item->getFullUrl() }}" href="{{ $item->getFullUrl() }}"
                                class="col-lg-3 col-md-4 col-6 d-block mb-4 h-100"
                                data-sub-html="<h4 class='text-white'>{{ $item->getCustomProperty('name') }}</h4>{{ $item->getCustomProperty('description') }}">
                                <img class="img-fluid img-thumbnail" src="{{ $item->getFullUrl() }}"
                                    alt="{{ $gallery->title }}">
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('custom_html')
    @if (current_user_can('delete_gallery'))
        <div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="{{ route('admin.gallery.destroy', $gallery->id) }}" method="post">
                        @csrf
                        @method('DELETE')

                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Hapus Album?</h5>
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
                                Anda yakin ingin menghapus album ini?
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
    <script src="https://cdn.jsdelivr.net/npm/lightgallery@2.4.0/lightgallery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/lightgallery@2.4.0/plugins/zoom/lg-zoom.umd.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/lightgallery@2.4.0/plugins/fullscreen/lg-fullscreen.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/lightgallery@2.4.0/plugins/share/lg-share.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/lightgallery@2.4.0/plugins/pager/lg-pager.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/lightgallery@2.4.0/plugins/hash/lg-hash.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/lightgallery@2.4.0/plugins/thumbnail/lg-thumbnail.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/lightgallery@2.4.0/plugins/comment/lg-comment.min.js"></script>

    <script>
        var disqus_config = function() {
            this.page.url =
            '{{ route('galeri.detail', ['album' => $gallery->id, 'slug' => $gallery->slug]) }}'; // Replace PAGE_URL with your page's canonical URL variable
            this.page.identifier = {{ $gallery->id }}; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
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
