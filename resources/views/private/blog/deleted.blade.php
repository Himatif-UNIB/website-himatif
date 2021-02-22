@extends('layouts.admin')
@section('title', 'Posting Blog')

@section('custom_head')
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/plugins/@fortawesome/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/table/datatable/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/table/datatable/dt-global_style.css') }}">
    <link href="{{ asset('assets/plugins/animate/animate.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/themes/cork/css/components/custom-modal.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <div class="layout-px-spacing">

        <div class="row layout-top-spacing" id="cancel-row">
            <div class="col-xl-12 col-lg-12 col-sm-12 mb-3">
                <div class="widget-content widget-content-area">
                    <h3>Posting Blog</h3>
                    <p>
                        Semua posting dihalaman ini adalah posting yang sudah dihapus penulisnya dari tempat sampah.
                        Hanya sekretaris yang dapat mengakses halaman ini.
                    </p>
                </div>
            </div>

            @if (session()->has('success'))
                <div class="col-xl-12 col-lg-12 col-sm-12 mb-3">
                    <div class="widget-content widget-content-area">
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                    </div>
                </div>
            @endif

            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                <div class="widget-content widget-content-area br-6">
                    @if (count($posts) > 0)
                        <div class="table-responsive mb-4 mt-4">
                            <table id="categories-table" class="table table-hover non-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Judul</th>
                                        <th>Penulis</th>
                                        <th>Komentar</th>
                                        <th>Dihapus Tanggal</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($posts as $post)
                                        <tr>
                                            <td>
                                                {{ $post->title }}
                                                @if (count($post->categories) > 0)
                                                    <div class="mt-1">
                                                        @foreach ($post->categories as $category)
                                                            <span class="badge badge-info">{{ $category->name }}</span>
                                                        @endforeach
                                                    </div>
                                                @endif
                                            </td>
                                            <td>{{ $post->user->name }}</td>
                                            <td></td>
                                            <td>{{ \Carbon\Carbon::parse($post->deleted_at)->format('l, d M Y H:i') }}
                                            </td>
                                            <td>
                                                <div class="text-right">
                                                    <a href="#" class="btn btn-warning btn-sm btn-restore"
                                                        data-id="{{ $post->id }}" data-toggle="tooltip"
                                                        title="Kembalikan posting"><i class="fa fa-arrow-left"></i>
                                                    </a>
                                                    <a href="#" class="btn btn-danger btn-sm btn-force-delete"
                                                        data-id="{{ $post->id }}" data-toggle="tooltip"
                                                        title="Hapus Permanen"><i class="fa fa-trash"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        {{ $posts->links() }}
                    @else
                        <div class="alert alert-info">Belum ada posting apapun.</div>
                    @endif
                </div>
            </div>

        </div>
    </div>
@endsection

@section('custom_html')
    <div id="delete-modal" class="modal fade in" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Hapus Posting?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-x">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg>
                    </button>
                </div>
                <form action="{{ route('admin.blog.posts.force_delete') }}" method="post">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="post_id" id="delete-post-id" value="">

                    <div class="modal-body">
                        <div class="alert alert-info ">
                            Yakin ingin menghapus posting?
                            <br>
                            Posting ini akan benar-benar dihapus dan tidak akan bisa dikembalikan lagi.
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

    <div id="restore-modal" class="modal fade in" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Kembalikan Posting?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-x">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg>
                    </button>
                </div>
                <form action="{{ route('admin.blog.posts.restore', false) }}" method="post">
                    @csrf
                    @method('PUT')

                    <input type="hidden" name="post_id" value="0" id="restore-post-id">

                    <div class="modal-body">
                        <div class="alert alert-info ">
                            Yakin ingin mengembalikan posting? Posting akan dikembalikan ke tempat sampah.
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
@endsection

@push('custom_js')
    <script>
        let _restore_id = 0;
        let restoreBtns = document.querySelectorAll('.btn-restore');
        restoreBtns.forEach((btn) => {
            btn.addEventListener('click', function() {
                let postId = btn.getAttribute('data-id');

                _restore_id = postId;
                document.querySelector('#restore-post-id')
                    .value = _restore_id;

                $('#restore-modal').modal('show')

            });
        });

        let _delete_id = 0;
        let deleteBtns = document.querySelectorAll('.btn-force-delete');
        deleteBtns.forEach((btn) => {
            btn.addEventListener('click', function() {
                let postId = btn.getAttribute('data-id');

                _delete_id = postId;
                document.querySelector('#delete-post-id')
                    .value = _delete_id;

                $('#delete-modal').modal('show')

            });
        });
    </script>
@endpush
