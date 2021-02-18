@extends('layouts.admin')
@section('title', 'Galeri Foto')

@section('custom_head')
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/plugins/@fortawesome/fontawesome-free/css/all.min.css') }}">
    <link href="{{ asset('assets/plugins/animate/animate.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/themes/cork/css/components/custom-modal.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/themes/cork/css/components/cards/card.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <div class="layout-px-spacing">

        <div class="row layout-top-spacing" id="cancel-row">
            <div class="col-xl-12 col-lg-12 col-sm-12 mb-3">
                <div class="widget-content widget-content-area">
                    <h3>Galeri Foto</h3>

                    @if (session()->has('success'))
                        <div class="text-success">{{ session()->get('success') }}</div>
                    @endif
                </div>
            </div>

            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                <div class="widget-content widget-content-area br-6">
                    @if (count($galleries) > 0)
                        <div class="row">
                            @foreach ($galleries as $gallery)
                            @php
                                $max = (count($gallery->media) - 1);
                                $n = rand(0, $max);
                            @endphp
                            <div class="card component-card_9 mb-3">
                                @isset($gallery->media[0])
                                    <img src="{{ $gallery->media[$n]->getFullUrl() }}" class="card-img-top" alt="widget-card-2">
                                @else
                                    <img src="{{ asset('assets/foto-galeri.png') }}" class="card-img-top" alt="widget-card-2">
                                @endisset
                                <div class="card-body">
                                    <p class="meta-date">{{ \Carbon\Carbon::parse($gallery->created_at)->format('d M Y') }}</p>
                            
                                    <h5 class="card-title"><a href="{{ route('admin.gallery.show', $gallery->id) }}">{{ $gallery->title }}</a></h5>
                                    <p class="card-text">
                                        @if ($gallery->status == 'draft')
                                            <span class="badge badge-info">Konsep</span>
                                        @else
                                            <span class="badge badge-success">Diterbitkan</span>
                                        @endif
                                    </p>
                            
                                    <div class="meta-info">
                                        <div class="meta-user">
                                            <div class="avatar avatar-sm">
                                                <span class="avatar-title rounded-circle">{{ createAcronym($gallery->user->name) }}</span>
                                            </div>
                                            <div class="user-name">{{ $gallery->user->name }}</div>
                                        </div>
                            
                                        <div class="meta-action">
                                            <div class="meta-likes">
                                                {{ count($gallery->media) }} Foto
                                            </div>
                                        </div>
                            
                                    </div>
                            
                                </div>
                            </div>
                            @endforeach
                        </div>

                        <div class="text-center">
                            {{ $galleries->links() }}
                        </div>
                    @else
                        <div class="alert alert-info">Tidak ada album yang ditambahkan</div>
                    @endif
                </div>
            </div>
        </div>

    </div>
@endsection
