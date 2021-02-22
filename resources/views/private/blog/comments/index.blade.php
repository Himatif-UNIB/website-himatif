@extends('layouts.admin')
@section('title', 'Komentar Blog')

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
                    <h3>
                        Komentar Blog

                        @if (current_user_can('read_blog_comment'))
                        <span class="float-right">
                            <a href="" class="btn btn-danger btn-sm" data-toggle="tooltip" title="Lihat Komentar Dihapus">
                                <i class="fa fa-trash"></i>
                            </a>
                        </span>
                        @endif
                    </h3>
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
                    @if (count($comments) > 0)
                    <div class="table-responsive mb-4 mt-4">
                        <table id="categories-table" class="table table-hover non-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Posting</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Komentar</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($comments as $comment)
                                <tr>
                                    <td>#{{ $comment->id }}</td>
                                    <td>
                                        <a href="{{ route('admin.blog.comments.post', $comment->post_id) }}">{{ $comment->post->title }}</a>
                                    </td>
                                    <td>
                                        @isset ($comment->user->name)
                                            <a href="{{ route('admin.blog.comments.user', $comment->user->id) }}">{{ $comment->name }}</a>
                                        @else
                                            {{ $comment->name }}
                                        @endisset
                                    </td>
                                    <td>{{ $comment->content }}</td>
                                    <td>
                                        @if ($comment->status == 'approved')
                                            <span class="badge badge-success">Diterima</span>
                                        @elseif ($comment->status ==  'on_moderation')
                                            <span class="badge badge-warning">Dalam moderasi</span>
                                        @elseif ($comment->status == 'declined')
                                            <span class="badge badge-danger">Ditolak</span>
                                        @endif
                                    </td>
                                    <td>{{ \Carbon\Carbon::parse($comment->created_at)->format('l, d M Y H:i') }}</td>
                                    <td></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    {{ $comments->links() }}
                    @else
                        <div class="alert alert-info">
                            Tidak ada komentar untuk ditampilkan.
                        </div>
                    @endif
                </div>
            </div>

        </div>

    </div>
@endsection