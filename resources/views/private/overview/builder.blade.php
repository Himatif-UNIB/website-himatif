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
            <div class="col-sm-6 col-xs-12 col-md-3 mt-2">
                <div class="widget widget-card-four">
                    <div class="widget-content">
                        <div class="w-content pb-5">
                            <div class="w-info">
                                <h6 class="value">{{ $secretary['memberCount'] }}</h6>
                                <p class="">Anggota</p>
                            </div>
                            <div class="">
                                <div class="w-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-users">
                                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="9" cy="7" r="4"></circle>
                                        <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xs-12 col-md-3 mt-2">
                <div class="widget widget-card-four">
                    <div class="widget-content">
                        <div class="w-content pb-5">
                            <div class="w-info">
                                <h6 class="value">{{ $secretary['forceCount'] }}</h6>
                                <p class="">Angkatan</p>
                            </div>
                            <div class="">
                                <div class="w-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-sliders">
                                        <line x1="4" y1="21" x2="4" y2="14"></line>
                                        <line x1="4" y1="10" x2="4" y2="3"></line>
                                        <line x1="12" y1="21" x2="12" y2="12"></line>
                                        <line x1="12" y1="8" x2="12" y2="3"></line>
                                        <line x1="20" y1="21" x2="20" y2="16"></line>
                                        <line x1="20" y1="12" x2="20" y2="3"></line>
                                        <line x1="1" y1="14" x2="7" y2="14"></line>
                                        <line x1="9" y1="8" x2="15" y2="8"></line>
                                        <line x1="17" y1="16" x2="23" y2="16"></line>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xs-12 col-md-3 mt-2">
                <div class="widget widget-card-four">
                    <div class="widget-content">
                        <div class="w-content pb-5">
                            <div class="w-info">
                                <h6 class="value">{{ $secretary['divisionCount'] }}</h6>
                                <p class="">Divisi</p>
                            </div>
                            <div class="">
                                <div class="w-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-layout">
                                        <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                                        <line x1="3" y1="9" x2="21" y2="9"></line>
                                        <line x1="9" y1="21" x2="9" y2="9"></line>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xs-12 col-md-3 mt-2">
                <div class="widget widget-card-four">
                    <div class="widget-content">
                        <div class="w-content pb-5">
                            <div class="w-info">
                                <h6 class="value">{{ $secretary['staffCount'] }}</h6>
                                <p class="">Pengurus</p>
                            </div>
                            <div class="">
                                <div class="w-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-clipboard">
                                        <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2">
                                        </path>
                                        <rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row layout-top-spacing">
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                <div class="widget-four">
                    <div class="widget-heading">
                        <h5 class="">Ringkasan Blog</h5>
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
                                        <p class="browser-count">{{ $secretary['blog']['post'] }}</p>
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
                                        <p class="browser-count">{{ $secretary['blog']['comment'] }}</p>
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
                        <div class="widget widget-card-one">
                            @if ($secretary['latestPost'] != null)
                                <div class="widget-content">
                                    <div class="media">
                                        <div class="w-img">
                                            <img src="{{ asset('assets/themes/cork/img/90x90.jpg') }}" alt="avatar">
                                        </div>
                                        <div class="media-body">
                                            <h6>Posting terbaru</h6>
                                            <h6><i><a href="{{ route('blog.post', ['post' => $secretary['latestPost']->id, 'slug' => $secretary['latestPost']->slug]) }}"
                                                        target="_blank">{{ $secretary['latestPost']->title }}</a></i>
                                            </h6>
                                            <p class="meta-date-time">
                                                {{ \Carbon\Carbon::parse($secretary['latestPost']->created_at)->format('d M Y') }}
                                            </p>
                                        </div>
                                    </div>

                                    <p>
                                        @if ($secretary['latestPost']->excerpt)
                                            {{ $secretary['latestPost']->excerpt }}
                                        @else
                                            {{ \Str::limit(strip_tags($secretary['latestPost']->content), 110) }}
                                        @endif
                                    </p>

                                    <div class="w-action">
                                        <div class="card-like">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-send">
                                                <line x1="22" y1="2" x2="11" y2="13"></line>
                                                <polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>
                                            </svg>
                                            <span>Diposting oleh {{ $secretary['latestPost']->user->name }}</span>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="widget-content">
                                    <p>Belum ada posting yang ditambahkan</p>
                                </div>
                            @endif
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
    </div>
@endsection

@push('custom_js')
    <script src="{{ asset('assets/themes/cork/js/dashboard/dash_2.js') }}"></script>
@endpush
