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
                    <h3>
                        Posting Blog

                        @if (current_user_can('read_blog_post'))
                        <span class="float-right">
                            <a href="{{ route('admin.blog.posts.trash') }}" class="btn btn-danger btn-sm" data-toggle="tooltip" title="Lihat Posting Dihapus">
                                <i class="fa fa-trash"></i>
                            </a>

                            @if ($isSecretary)
                            <a href="{{ route('admin.blog.posts.deleted') }}" class="btn btn-danger btn-sm"
                                data-toggle="tooltip" title="Posting yang Dihapus">
                                <i class="fa fa-times"></i>
                            </a>
                            @endif
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
                    @if (count($posts) > 0)
                    <div class="table-responsive mb-4 mt-4">
                        <table id="categories-table" class="table table-hover non-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Judul</th>
                                    @if ($isSecretary)
                                        <th>Penulis</th>
                                    @endif
                                    <th>Status</th>
                                    @if (current_user_can('read_blog_comment'))
                                        <th>Komentar</th>
                                    @endif
                                    <th>Tanggal</th>
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
                                        @if ($isSecretary)
                                            <td>{{ $post->user->name }}</td>
                                        @endif
                                        <td>
                                            @if ($post->status == 'draft')
                                                <span class="badge badge-secondary">Konsep</span>
                                            @elseif ($post->status == 'publish')
                                                <span class="badge badge-primary">Diterbitkan</span>
                                            @elseif ($post->status == 'deleted')
                                                <span class="badge badge-danger">Dihapus</span>
                                            @endif
                                        </td>
                                        @if (current_user_can('read_blog_comment'))
                                            <td></td>
                                        @endif
                                        <td>{{ \Carbon\Carbon::parse($post->created_at)->format('l, d M Y H:i') }}</td>
                                        <td>
                                            <div class="text-right">
                                                @if (current_user_can('read_blog_post'))
                                                <a href="{{ route('admin.blog.posts.show', $post->id) }}"
                                                    class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a>
                                                @endif
                                                @if (current_user_can('update_blog_post'))
                                                <a href="{{ route('admin.blog.posts.edit', $post->id) }}"
                                                    class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                                                @endif
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