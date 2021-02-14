@extends('layouts.admin')
@section('title', $post->title)

@section('custom_head')
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/plugins/@fortawesome/fontawesome-free/css/all.min.css') }}">
    <link href="{{ asset('assets/themes/cork/css/components/custom-list-group.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/themes/cork/css/forms/theme-checkbox-radio.css') }}">
@endsection

@section('content')
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing" id="cancel-row">
            <div class="col-xl-12 col-lg-12 col-sm-12 mb-3">
                <div class="widget-content widget-content-area">
                    <h3>{{ $post->title }}</h3>
                </div>
            </div>

            <div class="col-xl-8 col-lg-8 col-sm-12  layout-spacing">
                <div class="widget-content widget-content-area br-6">
                    {!! $post->content !!}
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-sm-12  layout-spacing">
                @isset($post->media[0])
                    <div class="widget-content widget-content-area br-6 mb-2">
                        <label>Gambar Unggulan</label>
                        <div>
                            <img src="{{ $post->media[0]->getFullUrl() }}" alt="Gambar Ugggulan" class="img img-fluid">
                        </div>
                    </div>
                @endisset


                <div class="widget-content widget-content-area br-6 mb-2">
                    @if (count($post->categories) > 0)
                        <label>Diposting dalam kategori:</label>
                        <div>
                            @foreach ($post->categories as $category)
                                <span class="badge badge-info">{{ $category->name }}</span>
                            @endforeach
                        </div>
                    @endif

                    <div class="mt-3">
                        <label>Komentar</label>
                        <ul class="list-group task-list-group">
                            @if (count($post->comments) > 0)
                                <li class="list-group-item list-group-item-action">
                                    <div class="n-chk">
                                        <label
                                            class="new-control new-checkbox checkbox-success w-100 justify-content-between">
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
                                        <label
                                            class="new-control new-checkbox checkbox-warning w-100 justify-content-between">
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
                                        <label
                                            class="new-control new-checkbox checkbox-danger w-100 justify-content-between">
                                            <input type="checkbox" class="new-control-input" disabled checked>
                                            <span class="new-control-indicator"></span>
                                            <span class="ml-2">
                                                {{ count($post->comments->where('status', 'declined')) }} komentar ditolak
                                            </span>
                                        </label>
                                    </div>
                                </li>
                            @endif
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
                                            <a href="{{ route('admin.blog.comments.post', $post->id) }}" target="_blank"
                                                class="text-white">Lihat komentar</a>
                                        </span>
                                    </label>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="widget-content widget-content-area br-6 mb-2">
                    <label>Pengaturan</label>
                    <ul class="list-group task-list-group">
                        <li class="list-group-item list-group-item-action">
                            <div class="n-chk">
                                <label
                                    class="new-control new-checkbox checkbox-{{ $post->allow_comment == 1 ? 'success' : 'danger' }} w-100 justify-content-between">
                                    <input type="checkbox" class="new-control-input" disabled checked>
                                    <span class="new-control-indicator"></span>
                                    <span class="ml-2">
                                        @if ($post->allow_comment == 1)
                                            Komentar diizinkan pada posting ini
                                        @else
                                            Komentar tidak diizinkan pada posting ini
                                        @endif
                                    </span>
                                </label>
                            </div>
                        </li>
                        <li class="list-group-item list-group-item-action">
                            <div class="n-chk">
                                <label
                                    class="new-control new-checkbox checkbox-{{ $post->moderate_comment == 1 ? 'success' : 'danger' }} w-100 justify-content-between">
                                    <input type="checkbox" class="new-control-input" disabled checked>
                                    <span class="new-control-indicator"></span>
                                    <span class="ml-2">
                                        @if ($post->moderate_comment == 1)
                                            Komentar yang masuk dimoderasi
                                        @else
                                            Komentar yang masuk tidak dimoderasi
                                        @endif
                                    </span>
                                </label>
                            </div>
                        </li>
                    </ul>
                </div>

                @if (current_user_can(['update_blog_post', 'delete_blog_post']) && $post->user_id == auth()->user()->id)
                    <div class="widget-content widget-content-area br-6">
                        @if (current_user_can('update_blog_post') && $post->user_id == auth()->user()->id && $post->status != 'deleted')
                            <a href="{{ route('admin.blog.posts.edit', $post->id) }}" class="btn btn-info btn-md"
                                data-toggle="tooltip" title="Edit Posting"><i class="fa fa-edit"></i></a>
                        @endif
                        @if (current_user_can('delete_blog_post') && $post->user_id == auth()->user()->id)
                            @if ($post->status == 'deleted')
                                <a href="#" class="btn btn-warning btn-md" data-toggle="modal" data-target="#revert-modal"
                                    data-toggle="tooltip" title="Kembalikan Posting"><i class="fa fa-arrow-left"></i></a>
                                <a href="#" class="btn btn-danger btn-md" data-toggle="modal" data-target="#delete-modal"
                                    data-toggle="tooltip" title="Hapus Posting"><i class="fa fa-trash"></i></a>
                            @else
                                <a href="#" class="btn btn-danger btn-md" data-toggle="modal" data-target="#delete-modal"
                                    data-toggle="tooltip" title="Hapus Posting"><i class="fa fa-trash"></i></a>
                            @endif
                        @endif
                    </div>
                @endif
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
@endsection
