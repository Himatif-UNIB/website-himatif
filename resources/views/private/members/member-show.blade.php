@extends('layouts.admin')
@section('title', $member->name)

@section('custom_head')
<link href="{{ asset('assets/themes/cork/css/users/user-profile.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<div class="layout-px-spacing">

    <div class="row layout-spacing">

        <!-- Content -->
        <div class="col-xl-4 col-lg-6 col-md-5 col-sm-12 layout-top-spacing">

            <div class="user-profile layout-spacing">
                <div class="widget-content widget-content-area">
                    <div class="d-flex justify-content-between">
                        <h3 class="">Data Anggota</h3>
                    </div>
                    <div class="text-center user-info">
                        <img src="{{ asset('assets/themes/cork/img/90x90.jpg') }}" alt="{{ $member->name }}">
                        <p class="">{{ $member->name }}</p>
                    </div>
                    <div class="user-info-list">

                        <div class="">
                            <ul class="contacts-block list-unstyled">
                                <li class="contacts-block__item">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-coffee">
                                    <path d="M18 8h1a4 4 0 0 1 0 8h-1"></path>
                                    <path d="M2 8h16v9a4 4 0 0 1-4 4H6a4 4 0 0 1-4-4V8z"></path>
                                    <line x1="6" y1="1" x2="6" y2="4"></line>
                                    <line x1="10" y1="1" x2="10" y2="4"></line>
                                    <line x1="14" y1="1" x2="14" y2="4"></line>
                                </svg> {{ $member->npm }}
                            </li>
                            <li class="contacts-block__item">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-calendar">
                                <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                <line x1="16" y1="2" x2="16" y2="6"></line>
                                <line x1="8" y1="2" x2="8" y2="6"></line>
                                <line x1="3" y1="10" x2="21" y2="10"></line>
                            </svg> {{ $member->force->name }} ({{ $member->force->year }})
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-xl-8 col-lg-6 col-md-7 col-sm-12 layout-top-spacing">
    <div class="education layout-spacing ">
        <div class="widget-content widget-content-area">
            <h3 class="">Kepengurusan</h3>
            <div class="timeline-alter">
                @forelse ($member->memberUser->staffs as $item)
                <div class="item-timeline">
                    <div class="t-meta-date">
                        <p class="">{{ $item->period->name }}</p>
                    </div>
                    <div class="t-dot">
                    </div>
                    <div class="t-text">
                        <p>Divisi <u>{{ $item->position->division->name }}</u></p>
                        <p>Jabatan <u>{{ $item->position->name }}</u></p>
                    </div>
                </div>
                @empty
                <div class="alert alert-info">
                    Tidak ada data kepengurusan untuk ditampilkan
                </div>
                @endforelse
            </div>
        </div>
    </div>
</div>

</div>
</div>
@endsection
