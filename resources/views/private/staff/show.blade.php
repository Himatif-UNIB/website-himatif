@extends('layouts.admin')
@section('title', 'Struktur Kepengurusan')

@section('custom_head')
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/plugins/@fortawesome/fontawesome-free/css/all.min.css') }}">
    <link href="{{ asset('assets/plugins/animate/animate.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/themes/cork/css/components/custom-modal.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/themes/cork/css/components/cards/card.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/themes/cork/css/elements/avatar.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing" id="cancel-row">
            <div class="col-xl-12 col-lg-12 col-sm-12 mb-3">
                <div class="widget-content widget-content-area">
                    <h3>Struktur Kepengurusan</h3>
                </div>
            </div>

            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                <div class="widget-content widget-content-area br-6">
                    @forelse ($positions as $index => $item)
                        <div class="row mb-4">
                            @foreach ($positions[$index] as $data)
                                @php($grid = 12)

                                    @if (count($positions[$index]) == 2)
                                        @php($grid = 6)
                                        @elseif (count($positions[$index]) == 3)
                                            @php($grid = 4)
                                            @elseif (count($positions[$index]) > 3)
                                                @php($grid = 3)
                                                @endif
                                                @if ($data['position']->parent_id == null)
                                                    <div class="col-md-{{ $grid }} mb-2">
                                                        <div class="card component-card_1">
                                                            <div class="card-body">
                                                                @isset($data['user']->media[0])
                                                                    <div class="avatar avatar-md">
                                                                        <img class="img img-fluid rounded-circle"
                                                                            src="{{ $data['user']->media[0]->getFUllUrl() }}" alt="">
                                                                    </div>
                                                                @else
                                                                    <div class="icon-svg">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                                            stroke-linecap="round" stroke-linejoin="round"
                                                                            class="feather feather-droplet">
                                                                            <path d="M12 2.69l5.66 5.66a8 8 0 1 1-11.31 0z"></path>
                                                                        </svg>
                                                                    </div>
                                                                @endisset
                                                                <h5 class="card-title">{{ $data['user']->name }}</h5>
                                                                <p class="card-text">{{ $data['position']->name }}</p>
                                                            </div>
                                                            @if (isset($childs[$data['position']->id]) && count($childs[$data['position']->id]) > 0)
                                                                <div class="card-footer text-right">
                                                                    <a href="#" data-toggle="modal"
                                                                        data-target="#division-{{ $data['position']->id }}"
                                                                        class="btn btn-info btn-sm">Lihat Anggota</a>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                        @empty

                                        @endforelse
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endsection

                    @section('custom_html')
                        @foreach ($childs as $key => $item)
                            <div id="division-{{ $key }}" class="modal fade in" role="dialog">
                                <div class="modal-dialog modal-lg">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Anggota Bidang {{ $item[0]['position']->name ?? '' }}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                                                    <line x1="18" y1="6" x2="6" y2="18"></line>
                                                    <line x1="6" y1="6" x2="18" y2="18"></line>
                                                </svg>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            @if (count($item) > 0)
                                                <div class="table-responsive">
                                                    <table class="table table-hover table-condensed">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col">Nama</th>
                                                                <th scope="col">NPM</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($item as $user)
                                                                <tr>
                                                                    <td>{{ $user['user']->name }}</td>
                                                                    <td>{{ $user['user']->member->npm }}</td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            @else
                                                <div class="alert alert-info">
                                                    Tidak ada data untuk ditampilkan
                                                </div>
                                            @endif
                                        </div>
                                        <div class="modal-footer md-button">
                                            <button class="btn" data-dismiss="modal">Tutup</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endsection
