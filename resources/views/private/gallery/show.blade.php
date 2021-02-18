@extends('layouts.admin')
@section('title', $gallery->title)

@section('custom_head')
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/plugins/@fortawesome/fontawesome-free/css/all.min.css') }}">
    <link href="{{ asset('assets/plugins/animate/animate.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/themes/cork/css/components/custom-modal.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/plugins/lightgallery.js/dist/css/lightgallery.min.css') }}">
@endsection

@section('content')
    <div class="layout-px-spacing">

        <div class="row layout-top-spacing" id="cancel-row">
            <div class="col-xl-12 col-lg-12 col-sm-12 mb-3">
                <div class="widget-content widget-content-area">
                    <h3>{{ $gallery->title }}</h3>
                </div>
            </div>

            <div class="col-xl-4 col-lg-4 col-sm-12 layout-spacing">
                <div class="widget-content widget-content-area br-6 p-0">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <tr>
                                <td>Nama album</td>
                                <td><b>{{ $gallery->title }}</b></td>
                            </tr>
                            <tr>
                                <td>Deskripsi</td>
                                <td><b>{!! $gallery->description !!}</b></td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td><b>
                                    @if ($gallery->status == 'draft')
                                        Konsep
                                    @else
                                        Diterbitkan
                                    @endif
                                    </b></td>
                            </tr>
                            <tr>
                                <td>Jumlah foto</td>
                                <td><b>{{ count($gallery->media) }}</b></td>
                            </tr>
                            <tr>
                                <td>Dibuat tanggal</td>
                                <td><b>{{ \Carbon\Carbon::parse($gallery->created_at)->format('l, d M Y H:i') }}</b></td>
                            </tr>
                            <tr>
                                <td>Dibuat oleh</td>
                                <td><b>{{ $gallery->user->name }}</b></td>
                            </tr>
                        </table>
                    </div>
                    <div class="p-3">
                        @if (current_user_can('update_gallery'))
                            <a href="{{ route('admin.gallery.edit', $gallery->id) }}" class="btn btn-info btn-sm">Edit</a>
                        @endif
                        @if (current_user_can('delete_gallery'))
                            <a href="#" data-toggle="modal" data-target="#delete-modal" class="btn btn-danger btn-sm">Hapus</a>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-xl-8 col-lg-8 col-sm-12 layout-spacing">
                <div class="widget-content widget-content-area br-6">
                    <div class="row text-center text-lg-left" id="galleries">
                        @foreach ($gallery->media as $item)
                        <a href="{{ $item->getFullUrl() }}" class="col-lg-3 col-md-4 col-6 d-block mb-4 h-100"
                            data-sub-html="<h4 class='text-white'>{{ $item->getCustomProperty('name') }}</h4>{{ $item->getCustomProperty('description') }}">
                            <img class="img-fluid img-thumbnail" src="{{ $item->getFullUrl() }}"
                                alt="{{ $gallery->title }}">
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('custom_html')
@if (current_user_can('delete_gallery'))
<div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <form action="{{ route('admin.gallery.destroy', $gallery->id) }}" method="post">
            @csrf
            @method('DELETE')

            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus Album?</h5>
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
                <p class="modal-text">
                    Anda yakin ingin menghapus album ini?
                </p>
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Batal</button>
                <button type="submit" class="btn btn-danger">Hapus</button>
            </div>
        </form>
    </div>
</div>
</div>
@endif
@endsection

@push('custom_js')
    <script src="{{ asset('assets/plugins/lightgallery.js/dist/js/lightgallery.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/lightgallery.js/plugins/lg-fullscreen.js/dist/lg-fullscreen.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/lightgallery.js/plugins/lg-autoplay.js/dist/lg-autoplay.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/lightgallery.js/plugins/lg-pager.js/dist/lg-pager.min.js') }}"></script>

    <script>
        lightGallery(document.getElementById('galleries'), {
            cssEasing : 'cubic-bezier(0.25, 0, 0.25, 1)',
            fullScreen: true,
            autoplay: true,
            pager: true
        });
    </script>
@endpush
