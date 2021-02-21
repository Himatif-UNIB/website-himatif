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
            <div class="col-12">
                <div class="widget widget-chart-three">
                    <div class="widget-heading">
                        <div>
                            <h5>Anggota Bidang {{ auth()->user()->staffs[0]->position->division->name }}</h5>
                        </div>
                    </div>
                    <div class="widget-content p-0">
                        <div class="table-responsive">
                            <table class="table table-striped table-condensed">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama</th>
                                        <th>NPM</th>
                                        <th>Tahun Angkatan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($divisionStaffs as $staff)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $staff->user->name }}</td>
                                            <td>{{ $staff->user->member->npm }}</td>
                                            <td>{{ $staff->user->member->force->year }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row layout-top-spacing">
            <div class="col-xl-9 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
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

            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-activity-three">

                    <div class="widget-heading">
                        <h5 class="">Formulir</h5>

                        <span class="badge badge-primary">
                            <a href="{{ route('admin.forms.index') }}" class="text-white" data-toggle="tooltip"
                                title="Kelola formulir">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-arrow-right">
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                    <polyline points="12 5 19 12 12 19"></polyline>
                                </svg>
                            </a>
                        </span>
                    </div>

                    <div class="widget-content">
                        <div class="mt-container mx-auto">
                            <div class="timeline-line">

                                <div class="item-timeline timeline-new">
                                    <div class="t-dot">
                                        <div class="t-primary"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-check">
                                                <polyline points="20 6 9 17 4 12"></polyline>
                                            </svg></div>
                                    </div>
                                    <div class="t-content">
                                        <div class="t-uppercontent">
                                            <h5>Diterbitkan</h5>
                                        </div>
                                        <p><span>{{ $secretary['form']['published'] }}</span> formulir diterbitkan</p>
                                    </div>
                                </div>

                                <div class="item-timeline timeline-new">
                                    <div class="t-dot">
                                        <div class="t-warning"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-file">
                                                <path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path>
                                                <polyline points="13 2 13 9 20 9"></polyline>
                                            </svg></div>
                                    </div>
                                    <div class="t-content">
                                        <div class="t-uppercontent">
                                            <h5>Konsep</h5>
                                        </div>
                                        <p><span>{{ $secretary['form']['draft'] }}</span> draft formulir</p>
                                    </div>
                                </div>

                                <div class="item-timeline timeline-new">
                                    <div class="t-dot">
                                        <div class="t-danger">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                                                <line x1="18" y1="6" x2="6" y2="18"></line>
                                                <line x1="6" y1="6" x2="18" y2="18"></line>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="t-content">
                                        <div class="t-uppercontent">
                                            <h5>Ditutup</h5>
                                        </div>
                                        <p><span>{{ $secretary['form']['closed'] }}</span> formulir ditutup</p>
                                    </div>
                                </div>

                                <div class="item-timeline timeline-new">
                                    <div class="t-dot">
                                        <div class="t-secondary">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-list">
                                                <line x1="8" y1="6" x2="21" y2="6"></line>
                                                <line x1="8" y1="12" x2="21" y2="12"></line>
                                                <line x1="8" y1="18" x2="21" y2="18"></line>
                                                <line x1="3" y1="6" x2="3.01" y2="6"></line>
                                                <line x1="3" y1="12" x2="3.01" y2="12"></line>
                                                <line x1="3" y1="18" x2="3.01" y2="18"></line>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="t-content">
                                        <div class="t-uppercontent">
                                            <h5>Semua Formulir</h5>
                                        </div>
                                        <p><span>{{ $secretary['form']['all'] }}</span> semua formulir</p>
                                    </div>
                                </div>

                                <div class="item-timeline timeline-new">
                                    <div class="t-dot">
                                        <div class="t-success">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-message-circle">
                                                <path
                                                    d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z">
                                                </path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="t-content">
                                        <div class="t-uppercontent">
                                            <h5>Jawaban Formulir</h5>
                                        </div>
                                        <p><span>{{ $secretary['form']['answers'] }}</span> jawaban formulir</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

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
