@extends('layouts.admin')
@section('title', 'Komentar Posting ' . $post->title)

@section('custom_head')
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/plugins/@fortawesome/fontawesome-free/css/all.min.css') }}">
    <link href="{{ asset('assets/themes/cork/css/components/custom-list-group.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/themes/cork/css/forms/theme-checkbox-radio.css') }}">
    <link href="{{ asset('assets/plugins/toastify-js/src/toastify.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Manrope:wght@200&display=swap">

    <style>
        .comments h3 {
            margin-top: 2%;
            margin-left: 27%;
            font-family: 'Manrope', sans-serif;
            font-weight: bold
        }

        .card {
            border: none;
            border-radius: 20px;
            padding: 20px;
            margin-bottom: 40px
        }

        img {
            border-radius: 10px;
            padding-right: 5px;
            width: 60px;
            height: 55px
        }

        img:hover {
            cursor: pointer
        }

        .round .align-self-start {
            border-radius: 100%;
            width: 45px;
            height: 40px
        }

        .media .comment {
            background: #F4F4F4;
            border: none;
            border-radius: 10px
        }

        h6.user {
            color: #5C5C5C;
            font-size: 15px !important;
            padding-left: 15px !important;
            margin-bottom: 0
        }

        h6.user:hover {
            cursor: pointer;
            text-decoration: underline
        }

        p.text {
            margin-bottom: 0;
            color: #8A8A8A !important;
            font-size: 14px
        }

        .ml-auto {
            margin-right: 10px
        }

        p .reply {
            color: #5C5C5C;
            font-size: 15px
        }

        @media screen and (min-width: 576px) {
            .comment {
                width: 470px !important
            }
        }

    </style>
@endsection

@section('content')
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing" id="cancel-row">
            <div class="col-xl-12 col-lg-12 col-sm-12 mb-3" id="comment-form">
                <div class="widget-content widget-content-area">
                    <h3>Komentar Posting {{ $post->title }}</h3>
                </div>
            </div>

            <div class="col-xl-8 col-lg-8 col-sm-12  layout-spacing">
                <div class="widget-content widget-content-area br-6 comments">
                    <div class="container">
                        <div class="row">
                            <h3><span class="comment-count">{{ count($post->comments) }}</span> Komentar</h3>
                        </div>
                    </div>
                    <div class="container mt-1 d-flex justify-content-center">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card" style="margin-bottom: -15px">
                                    <form action="{{ route('blog.post_comment', ['post' => $post->id, 'slug' => $post->slug]) }}" method="POST">
                                        @csrf

                                        <div class="row">
                                            <div class="col-sm-9">
                                                <input type="text" name="content" class="form-control @error('content') is-invalid @enderror">

                                                @error('content')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="col-sm-3">
                                                <input type="submit" value="Komentari" class="btn btn-primary">
                                            </div>
                                        </div>

                                        <input type="hidden" name="reply_to" id="reply-to">
                                        <input type="hidden" name="reply_to_name" id="reply-to-name">
                                    </form>
                                </div>
                                <div class="card">
                                    <ul class="list-unstyled">
                                        @forelse ($post->comments->where('parent_id', null) as $comment)
                                            <li class="media my-5 border-bottom pb-2" id="comment-{{ $comment->id }}">
                                                <span class="round">
                                                    @isset($comment->user->media[0])
                                                    <img
                                                        src="{{ $comment->user->media[0]->getFullUrl() }}"
                                                        class="align-self-start mr-3">
                                                    @else
                                                    <img
                                                        src="https://img.icons8.com/office/100/000000/user-group-man-man--v1.png"
                                                        class="align-self-start mr-3">
                                                    @endisset
                                                </span>
                                                <div class="media-body">
                                                    <div class="row d-flex">
                                                        <h6 class="user">
                                                            @if ($comment->user_id == auth()->user()->id)
                                                                {{ $comment->name }} <span class="badge badge-info">(Penulis)</span>
                                                            @else
                                                                {{ $comment->name }}
                                                            @endif
                                                        </h6>
                                                        <div class="ml-auto">
                                                            <span class="d-none d-xs-none d-sm-none d-md-inline d-lg-inline x-xl-inline">
                                                                @if ($comment->status == 'approved')
                                                                    <span class="badge badge-success status-{{ $comment->id }}">Diterima</span>
                                                                @elseif ($comment->status ==  'on_moderation')
                                                                    <span class="badge badge-warning status-{{ $comment->id }}">Dalam moderasi</span>
                                                                @elseif ($comment->status == 'declined')
                                                                    <span class="badge badge-danger status-{{ $comment->id }}">Ditolak</span>
                                                                @endif
                                                            </span>

                                                            @if ($comment->post->user_id == auth()->user()->id)
                                                            <div class="dropdown d-inline ml-2">
                                                                <a href="#" id="option-comment-{{ $comment->id }}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                    <i class="fa fa-ellipsis-v"></i>
                                                                </a>
                                                                <div class="dropdown-menu" aria-labelledby="option-comment-{{ $comment->id }}">
                                                                    @if ($comment->status == 'on_moderation')
                                                                        <a class="dropdown-item btn-approve-comment approve-{{ $comment->id }}" href="#"
                                                                            data-id="{{ $comment->id }}">Terima</a>
                                                                        <a class="dropdown-item btn-decline-comment decline-{{ $comment->id }}" href="#"
                                                                            data-id="{{ $comment->id }}">Tolak</a>
                                                                    @endif
                                                                    <a class="dropdown-item btn-delete-comment" href="#"
                                                                        data-id="{{ $comment->id }}">Hapus</a>
                                                                </div>
                                                            </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="mb-2">
                                                        <p class="text">{{ \Carbon\Carbon::parse($comment->created_at)->diffForHumans() }}</p>
                                                        <span class="d-block d-xs-block d-sm-block d-md-none d-lg-none d-xl-none">
                                                            @if ($comment->status == 'approved')
                                                                <span class="badge badge-success status-{{ $comment->id }}-mobile">Diterima</span>
                                                            @elseif ($comment->status ==  'on_moderation')
                                                                <span class="badge badge-warning status-{{ $comment->id }}-mobile">Dalam moderasi</span>
                                                            @elseif ($comment->status == 'declined')
                                                                <span class="badge badge-danger status-{{ $comment->id }}-mobile">Ditolak</span>
                                                            @endif
                                                        </span>
                                                    </div>
                                                    <p class="text comment-content">{!! nl2br(e($comment->content)) !!}</p>
                                                    @foreach ($comment->replies as $reply)
                                                    <div class="media mt-3 comment" id="reply-{{ $reply->id }}">
                                                        <div class="d-none d-xs-none d-sm-block d-md-block d-lg-block">
                                                            @isset($reply->user->media[0])
                                                            <img
                                                                src="{{ $reply->user->media[0]->getFullUrl() }}"
                                                                class="align-self-start mr-3">
                                                            @else
                                                            <img
                                                                src="https://img.icons8.com/office/100/000000/user-group-man-man--v1.png"
                                                                class="align-self-start mr-3">
                                                            @endisset
                                                        </div>
                                                        <div class="media-body">
                                                            <div class="row d-flex">
                                                                <h6 class="user mt-1">
                                                                    @if ($reply->user_id == auth()->user()->id)
                                                                        {{ $reply->name }} <span class="badge badge-info">(Penulis)</span>
                                                                    @else
                                                                        {{ $reply->name }}
                                                                    @endif
                                                                </h6>
                                                                <div class="ml-auto mt-1">
                                                                    <span class="d-none d-xs-none d-sm-none d-md-inline d-lg-inline x-xl-inline">
                                                                        @if ($reply->status == 'approved')
                                                                            <span class="badge badge-success status-{{ $reply->id }}">Diterima</span>
                                                                        @elseif ($reply->status ==  'on_moderation')
                                                                            <span class="badge badge-warning status-{{ $reply->id }}">Dalam moderasi</span>
                                                                        @elseif ($reply->status == 'declined')
                                                                            <span class="badge badge-danger status-{{ $reply->id }}">Ditolak</span>
                                                                        @endif
                                                                    </span>
                                                            
                                                                    @if ($reply->post->user_id)
                                                                    <div class="dropdown d-inline ml-2">
                                                                        <a href="#" id="option-reply-{{ $reply->id }}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                            <i class="fa fa-ellipsis-v"></i>
                                                                        </a>
                                                                        <div class="dropdown-menu" aria-labelledby="option-reply-{{ $reply->id }}">
                                                                            @if ($reply->status == 'on_moderation')
                                                                                <a class="dropdown-item btn-approve-comment approve-{{ $reply->id }}" href="#"
                                                                                    data-id="{{ $reply->id }}">Terima</a>
                                                                                <a class="dropdown-item btn-decline-comment decline-{{ $reply->id }}" href="#"
                                                                                    data-id="{{ $reply->id }}">Tolak</a>
                                                                            @endif
                                                                            <a class="dropdown-item btn-delete-comment" href="#"
                                                                                data-id="{{ $reply->id }}">Hapus</a>
                                                                        </div>
                                                                    </div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="mb-2">
                                                                <p class="text">{{ \Carbon\Carbon::parse($reply->created_at)->diffForHumans() }}</p>
                                                                <span class="d-block d-xs-block d-sm-block d-md-none d-lg-none d-xl-none">
                                                                    @if ($reply->status == 'approved')
                                                                        <span class="badge badge-success status-{{ $reply->id }}-mobile">Diterima</span>
                                                                    @elseif ($reply->status ==  'on_moderation')
                                                                        <span class="badge badge-warning status-{{ $reply->id }}-mobile">Dalam moderasi</span>
                                                                    @elseif ($reply->status == 'declined')
                                                                        <span class="badge badge-danger status-{{ $reply->id }}-mobile">Ditolak</span>
                                                                    @endif
                                                                </span>
                                                            </div>
                                                            <p class="text reply-content-{{ $reply->id }}">{!! nl2br(e($reply->content)) !!}</p>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                    <div><a data-id="{{ $comment->id }}" data-name="{{ $comment->name }}"
                                                        class="text-info reply-to-comment" href="#">Balas</a></div>
                                                </div>
                                            </li>
                                        @empty
                                            <li class="media my-5"> <span class="round"><img
                                                        src="{{ asset('assets/images/avatar-1.png') }}"
                                                        class="align-self-start mr-3"></span>
                                                <div class="media-body">
                                                    <div class="row d-flex">
                                                        <h6 class="user">Tidak ada komentar</h6>
                                                    </div>
                                                    <p class="text">Tidak ada satupun komentar pada posting ini.</p>
                                                </div>
                                            </li>
                                        @endforelse
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-sm-12  layout-spacing">
                <div class="widget-content widget-content-area br-6 mb-2">
                    <div>
                        <label>Komentar</label>
                        <ul class="list-group task-list-group">
                            <li class="list-group-item list-group-item-action">
                                <div class="n-chk">
                                    <label class="new-control new-checkbox checkbox-success w-100 justify-content-between">
                                        <input type="checkbox" class="new-control-input" disabled checked>
                                        <span class="new-control-indicator"></span>
                                        <span class="ml-2">
                                            {{ count($post->comments->where('status', 'approved')) }} komentar
                                            diterima
                                        </span>
                                    </label>
                                </div>
                            </li>
                            <li class="list-group-item list-group-item-action">
                                <div class="n-chk">
                                    <label class="new-control new-checkbox checkbox-warning w-100 justify-content-between">
                                        <input type="checkbox" class="new-control-input" disabled checked>
                                        <span class="new-control-indicator"></span>
                                        <span class="ml-2">
                                            {{ count($post->comments->where('status', 'on_moderation')) }} komentar
                                            dalam moderasi
                                        </span>
                                    </label>
                                </div>
                            </li>
                            <li class="list-group-item list-group-item-action">
                                <div class="n-chk">
                                    <label class="new-control new-checkbox checkbox-danger w-100 justify-content-between">
                                        <input type="checkbox" class="new-control-input" disabled checked>
                                        <span class="new-control-indicator"></span>
                                        <span class="ml-2">
                                            {{ count($post->comments->where('status', 'declined')) }} komentar ditolak
                                        </span>
                                    </label>
                                </div>
                            </li>
                            <li class="list-group-item list-group-item-action">
                                <div class="n-chk">
                                    <label class="new-control new-checkbox checkbox-info w-100 justify-content-between">
                                        <input type="checkbox" class="new-control-input" disabled checked>
                                        <span class="new-control-indicator"></span>
                                        <span class="ml-2">
                                            {{ count($post->comments) }} komentar
                                        </span>
                                    </label>
                                </div>
                            </li>
                            <li class="list-group-item list-group-item-action active">
                                <div class="n-chk">
                                    <label class="new-control new-checkbox checkbox-info w-100 justify-content-between">
                                        <span class="new-control-indicator"></span>
                                        <span class="ml-2">
                                            <a href="{{ route('blog.post', ['post' => $post->id, 'slug' => $post->slug]) }}"
                                                target="_blank" class="text-white">Lihat Posting</a>
                                        </span>
                                    </label>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom_html')
@if (current_user_can('delete_blog_post') && $post->user_id == auth()->user()->id)
    @if ($post->status == 'deleted')
        <div id="revert-modal" class="modal fade in" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Kembalikan Posting?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                                <line x1="18" y1="6" x2="6" y2="18"></line>
                                <line x1="6" y1="6" x2="18" y2="18"></line>
                            </svg>
                        </button>
                    </div>
                    <form action="{{ route('admin.blog.posts.destroy', $post->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <div class="modal-body">
                            <div class="alert alert-info ">
                                Yakin ingin mengembalikan posting? Posting yang dikembalikan akan ditampilkan kembali.
                                <br>
                                Posting akan dikembalikan menjadi konsep.
                            </div>
                        </div>
                        <div class="modal-footer md-button">
                            <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Batal</button>
                            <button type="submit" class="btn btn-success">Kembalikan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div id="delete-modal" class="modal fade in" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Hapus Posting?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                                <line x1="18" y1="6" x2="6" y2="18"></line>
                                <line x1="6" y1="6" x2="18" y2="18"></line>
                            </svg>
                        </button>
                    </div>
                    <form action="{{ route('admin.blog.posts.destroy', $post->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="force_delete" value="1">

                        <div class="modal-body">
                            <div class="alert alert-info ">
                                Benar benar menghapus posting? Posting yang dihapus tidak akan bisa dikembalikan lagi.
                            </div>
                        </div>
                        <div class="modal-footer md-button">
                            <button class="btn" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @else
        <div id="delete-modal" class="modal fade in" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Hapus Posting?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                                <line x1="18" y1="6" x2="6" y2="18"></line>
                                <line x1="6" y1="6" x2="18" y2="18"></line>
                            </svg>
                        </button>
                    </div>
                    <form action="{{ route('admin.blog.posts.destroy', $post->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <div class="modal-body">
                            <div class="alert alert-info ">
                                Yakin ingin menghapus posting?
                                Posting tidak akan dihapus, hanya dipindahkan ke tempat sampah.
                                <br>
                                Anda bisa benar-benar menghapusnya disana.
                            </div>
                        </div>
                        <div class="modal-footer md-button">
                            <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Batal</button>
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif
@endif

@if (current_user_can('delete_blog_comment'))
    <div id="delete-comment-modal" class="modal fade in" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Hapus Komentar?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg>
                    </button>
                </div>
                <form action="#" method="post" id="delete-comment-form">
                    <div class="modal-body">
                        <div class="alert alert-info delete-comment-message">
                            Yakin ingin menghapus komentar ini? Menghapus komentar juga akan menghapus semua komentar
                            balasannya.
                        </div>
                    </div>
                    <div class="modal-footer md-button">
                        <button class="btn" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger btn-force-delete-comment">Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endif

@if (current_user_can('read_blog_comment'))
    <div id="approve-comment-modal" class="modal fade in" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Terima Komentar?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg>
                    </button>
                </div>
                <form action="#" method="post" id="approve-comment-form">
                    <div class="modal-body">
                        <div class="alert alert-info approve-comment-message">
                            Yakin ingin menerima komentar? Komentar yang diterima akan ditampilkan.
                        </div>
                    </div>
                    <div class="modal-footer md-button">
                        <button class="btn" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-success btn-force-approve-comment">Terima</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="decline-comment-modal" class="modal fade in" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tolak Komentar?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg>
                    </button>
                </div>
                <form action="#" method="post" id="decline-comment-form">
                    <div class="modal-body">
                        <div class="alert alert-info decline-comment-message">
                            Yakin ingin menolak komentar? Komentar yang ditolak tidak akan ditampilkan.
                        </div>
                    </div>
                    <div class="modal-footer md-button">
                        <button class="btn" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-warning btn-force-decline-comment">Tolak</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endif
@endsection

@push('custom_js')
<script src="{{ asset('assets/plugins/toastify-js/src/toastify.js') }}"></script>
<script src="https://cdn.jsdelivr.net/gh/cferdinandi/smooth-scroll@16.1.3/dist/smooth-scroll.min.js"></script>

<script>
    let scroll = new SmoothScroll({
        easing: 'linear'
    });
    let commentForm = document.querySelector('#comment-form');
        
    @if (session()->has('errors') || session()->has('success'))
        scroll.animateScroll(commentForm);
    @endif
</script>

@if (session()->has('success'))
    <script>
        var bgColors = [
                "linear-gradient(to right, #00b09b, #96c93d)",
                "linear-gradient(to right, #ff5f6d, #ffc371)",
            ],
            i = 0;

        Toastify({
            text: "{{ session()->get('success') }}",
            duration: 5000,
            close: true,
            backgroundColor: bgColors[i % 2],
        }).showToast();

    </script>
@endif

<script>
    function removeFadeOut(el, speed) {
        var seconds = speed / 1000;
        el.style.transition = "opacity " + seconds + "s ease";

        el.style.opacity = 0;
        setTimeout(function() {
            el.parentNode.removeChild(el);
        }, speed);
    }

    let deleteCommentBtns = document.querySelectorAll('.btn-delete-comment');
    let _delete_id = 0;

    deleteCommentBtns.forEach((btn) => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();

            let id = btn.getAttribute('data-id');
            _delete_id = id;

            $('#delete-comment-modal').modal('show')
        });
    });

    let btnDeleteComment = document.querySelector('.btn-force-delete-comment');
    let deleteCommentForm = document.querySelector('#delete-comment-form');
    let deleteCommentMsg = document.querySelector('.delete-comment-message');

    deleteCommentForm.addEventListener('submit', function(e) {
        e.preventDefault();

        let commentContentContainer = document.querySelector(`#comment-${_delete_id} .comment-content`);
        let replyCommentContainer = document.querySelector(`.reply-content-${_delete_id}`);

        btnDeleteComment.innerHTML = '<i class="fa fa-spin fa-spinner"></i> Menghapus...';
        btnDeleteComment.setAttribute('disabled', 'disabled');

        fetch(`{{ route('api.blog.comments.destroy', false) }}/${_delete_id}`, {
                method: 'DELETE',
                headers: {
                    'Authorization': `Bearer ${passportAccessToken}`
                }
            })
            .then(res => res.json())
            .then(res => {
                if (res.success) {
                    btnDeleteComment.innerHTML = '<i class="fa fa-check"></i> Berhasil';

                    document.querySelector('.comment-count')
                        .innerHTML = res.commentCount;
                    if (commentContentContainer != null) {
                        commentContentContainer.innerHTML = '<i class="fa fa-spin fa-spinner"></i> Menghapus komentar...';
                    }
                    if (replyCommentContainer != null) {
                        replyCommentContainer.innerHTML = '<i class="fa fa-spin fa-spinner"></i> Menghapus komentar...';
                    }

                    setTimeout(function() {
                        if (commentContentContainer != null) {
                            removeFadeOut(document.querySelector(`#comment-${_delete_id}`), 1500)
                        }
                        if (replyCommentContainer != null) {
                            removeFadeOut(document.querySelector(`#reply-${_delete_id}`), 1500)
                        }
                    }, 2500);
                }
            })
            .catch(errors => {
                btnDeleteComment.innerHTML = 'Hapus';
                btnDeleteComment.removeAttribute('disabled');

                deleteCommentMsg.innerHTML = errors;
            })
    });

    $('#delete-comment-modal').on('hidden.bs.modal', function(e) {
        btnDeleteComment.removeAttribute('disabled');
        btnDeleteComment.innerHTML = 'Hapus';
        deleteCommentMsg.innerHTML =
            'Yakin ingin menghapus komentar ini? Menghapus komentar juga akan menghapus semua komentar balasannya.';
    });

    let approveCommentBtns = document.querySelectorAll('.btn-approve-comment');
    let _approve_id = 0;

    approveCommentBtns.forEach((btn) => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();

            let id = btn.getAttribute('data-id');
            _approve_id = id;

            $('#approve-comment-modal').modal('show')
        });
    });

    let btnApproveComment = document.querySelector('.btn-force-approve-comment');
    let approveCommentForm = document.querySelector('#approve-comment-form');
    let approveCommentMsg = document.querySelector('.approve-comment-message');

    approveCommentForm.addEventListener('submit', function(e) {
        e.preventDefault();

        btnApproveComment.innerHTML = '<i class="fa fa-spin fa-spinner"></i> Menerima...';
        btnApproveComment.setAttribute('disabled', 'disabled');

        fetch(`{{ route('api.blog.comments.destroy', false) }}/${_approve_id}`, {
                method: 'PUT',
                headers: {
                    'Authorization': `Bearer ${passportAccessToken}`,
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    action: 'approve'
                })
            })
            .then(res => res.json())
            .then(res => {
                if (res.success) {
                    btnApproveComment.innerHTML = '<i class="fa fa-check"></i> Berhasil';

                    setTimeout(function() {
                        document.querySelector(`.approve-${_approve_id}`)
                            .remove();
                        document.querySelector(`.decline-${_approve_id}`)
                            .remove();
                        document.querySelector(`.status-${_approve_id}`)
                            .innerHTML = 'Diterima';
                        document.querySelector(`.status-${_approve_id}-mobile`)
                            .innerHTML = 'Diterima';
                        document.querySelector(`.status-${_approve_id}`).classList.remove('badge-warning');
                        document.querySelector(`.status-${_approve_id}`).classList.add('badge-success');

                        document.querySelector(`.status-${_approve_id}-mobile`).classList.remove('badge-warning');
                        document.querySelector(`.status-${_approve_id}-mobile`).classList.add('badge-success');
                    }, 1000);
                }
            })
            .catch(errors => {
                btnApproveComment.innerHTML = 'Terima';
                btnApproveComment.removeAttribute('disabled');

                approveCommentMsg.innerHTML = errors;
            })
    });

    $('#approve-comment-modal').on('hidden.bs.modal', function(e) {
        btnApproveComment.removeAttribute('disabled');
        btnApproveComment.innerHTML = 'Terima';
        approveCommentMsg.innerHTML = 'Yakin ingin menerima komentar? Komentar yang diterima akan ditampilkan.';
    });

    let declineCommentBtns = document.querySelectorAll('.btn-decline-comment');
    let _decline_id = 0;

    declineCommentBtns.forEach((btn) => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();

            let id = btn.getAttribute('data-id');
            _decline_id = id;

            $('#decline-comment-modal').modal('show')
        });
    });

    let btnDeclineComment = document.querySelector('.btn-force-decline-comment');
    let declineCommentForm = document.querySelector('#decline-comment-form');
    let declineCommentMsg = document.querySelector('.decline-comment-message');

    declineCommentForm.addEventListener('submit', function(e) {
        e.preventDefault();

        btnDeclineComment.innerHTML = '<i class="fa fa-spin fa-spinner"></i> Menolak...';
        btnDeclineComment.setAttribute('disabled', 'disabled');

        fetch(`{{ route('api.blog.comments.destroy', false) }}/${_decline_id}`, {
                method: 'PUT',
                headers: {
                    'Authorization': `Bearer ${passportAccessToken}`,
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    action: 'decline'
                })
            })
            .then(res => res.json())
            .then(res => {
                if (res.success) {
                    declineCommentMsg.innerHTML = res.message;
                    btnDeclineComment.innerHTML = '<i class="fa fa-check"></i> Berhasil';

                    setTimeout(function() {
                        document.querySelector(`.decline-${_decline_id}`)
                            .remove();
                        document.querySelector(`.approve-${_decline_id}`)
                            .remove();
                        document.querySelector(`.status-${_decline_id}`)
                            .innerHTML = 'Ditolak';
                        document.querySelector(`.status-${_decline_id}-mobile`)
                            .innerHTML = 'Ditolak';

                        document.querySelector(`.status-${_decline_id}`).classList.remove('badge-warning');
                        document.querySelector(`.status-${_decline_id}`).classList.add('badge-danger');

                        document.querySelector(`.status-${_decline_id}-mobile`).classList.remove('badge-warning');
                        document.querySelector(`.status-${_decline_id}-mobile`).classList.add('badge-danger');
                    }, 1000);
                }
            })
            .catch(errors => {
                btnDeclineComment.innerHTML = 'Tolak';
                btnDeclineComment.removeAttribute('disabled');

                declineCommentMsg.innerHTML = errors;
            })
    });

    $('#decline-comment-modal').on('hidden.bs.modal', function(e) {
        btnDeclineComment.removeAttribute('disabled');
        btnDeclineComment.innerHTML = 'Tolak';
        declineCommentMsg.innerHTML = 'Yakin ingin menolak komentar? Komentar yang ditolak akan ditampilkan.';
    });

    let replyToCommentBtns = document.querySelectorAll('.reply-to-comment');
    replyToCommentBtns.forEach((btn) => {
        btn.addEventListener('click', function (e) {
            e.preventDefault();

            let to = btn.getAttribute('data-id');
            let toName = btn.getAttribute('data-name');

            document.querySelector('#reply-to')
                .value = to;
            document.querySelector('#reply-to-name')
                .value = toName;

            let commentScroll = new SmoothScroll({
                easing: 'linear'
            });
            let commentForm = document.querySelector('#comment-form');

            commentScroll.animateScroll(commentForm);
        });
    });
</script>
@endpush
