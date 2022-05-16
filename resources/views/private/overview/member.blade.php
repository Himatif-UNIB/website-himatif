@extends('layouts.admin')

@section('title', 'Dasbor ' . getSetting('siteName'))

@section('custom_head')
    <link href="{{ asset('assets/plugins/apex/apexcharts.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/themes/cork/css/dashboard/dash_2.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/plugins/@fortawesome/fontawesome-free/css/all.min.css') }}">
    <link href="{{ asset('assets/themes/cork/css/components/cards/card.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing">
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                <div class="widget-four">
                    <div class="widget-heading">
                        <h5 class="">Ringkasan Blog Saya</h5>
                    </div>
                    <div class="widget-content">
                        <div class="vistorsBrowser">
                            <div class="browser-list">
                                <div class="w-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-book">
                                        <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path>
                                        <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path>
                                    </svg>
                                </div>
                                <div class="w-browser-details">
                                    <div class="w-browser-info">
                                        <h6>Posting</h6>
                                        <p class="browser-count">{{ $blog['post'] }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="browser-list">
                                <div class="w-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-message-circle">
                                        <path
                                            d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z">
                                        </path>
                                    </svg>
                                </div>
                                <div class="w-browser-details">
                                    <div class="w-browser-info">
                                        <h6>Komentar</h6>
                                        <p class="browser-count">{{ $blog['comment'] }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="browser-list">
                                <div class="w-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-message-circle">
                                        <path
                                            d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z">
                                        </path>
                                    </svg>
                                </div>
                                <div class="w-browser-details">
                                    <div class="w-browser-info">
                                        <h6>Komentar dalam moderasi</h6>
                                        <p class="browser-count">{{ $secretary['blog']['commentModeration'] }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                <div class="row widget-statistic">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="widget-four">
                            <div class="widget-heading">
                                <h5 class="">Formulir Saya</h5>
                            </div>
                            <div class="widget-content">
                                <div class="vistorsBrowser">
                                    @forelse ($forms as $form)
                                    <div class="browser-list">
                                        <div class="w-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail">
                                                <path
                                                    d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z">
                                                </path>
                                                <polyline points="22,6 12,13 2,6"></polyline>
                                            </svg>
                                        </div>
                                        <div class="w-browser-details">
                                            <div class="w-browser-info">
                                                <h6>
                                                    <a href="{{ route('admin.forms.show', $form->id) }}">{{ $form->title }}</a>
                                                </h6>
                                                <p class="browser-count">{{ $form->answers_count }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    @empty
                                        <p class="text-muted text-sm">Kamu belum membuat satupun formulir.</p>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="widget widget-card-one">
                            <div class="widget-content">

                                <div class="media">
                                    <div class="media-body">
                                        <h6>Komentar blog</h6>
                                    </div>
                                </div>

                                @if (count($secretary['comments']) > 0)
                                    <ul class="list-group">
                                        @foreach ($secretary['comments'] as $comment)
                                            <li class="list-group-item">
                                                <b>{{ $comment->name }} on <i>{{ $comment->post->title }}</i></b>
                                                <br>
                                                {{ $comment->content }}
                                            </li>
                                        @endforeach
                                    </ul>
                                @else
                                    <p>Tidak ada komentar blog.</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
            <div class="widget widget-chart-three">
                <div class="widget-heading">
                    <div class="">
                        <h5 class="">Galeri Foto</h5>
                    </div>
                </div>

                <div class="widget-content widget-content-area p-0">
                    @if (count($secretary['galleries']) > 0)
                        <div class="table-responsive">
                            <table class="table table-hover table-condensed">
                                <thead>
                                    <th></th>
                                    <th>Judul</th>
                                    <th>Jumlah Foto</th>
                                </thead>
                                <tbody>
                                    @foreach ($secretary['galleries'] as $gallery)
                                        <tr>
                                            <td>
                                                @foreach ($gallery->categories as $category)
                                                    <span class="badge badge-info mr-1">{{ $category->name }}</span>
                                                @endforeach
                                            </td>
                                            <td><a
                                                    href="{{ route('admin.gallery.show', $gallery->id) }}">{{ $gallery->title }}</a>
                                            </td>
                                            <td>{{ count($gallery->media) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="alert alert-info">Tidak ada album yang ditambahkan</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@push('custom_js')
    <script src="{{ asset('assets/themes/cork/js/dashboard/dash_2.js') }}"></script>
@endpush
