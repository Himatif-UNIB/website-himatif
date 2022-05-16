@extends('layouts.admin')
@section('title', 'Upload Karya Baru')

@section('custom_head')
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/plugins/@fortawesome/fontawesome-free/css/all.min.css') }}">

        <style>
            .option:hover {
                color: #bbb;
            }
        </style>
@endsection

@section('content')
    <div class="layout-px-spacing">

        <form action="{{ route('admin.showcases.store') }}" method="post" id="create-form">
            @csrf
            <input type="hidden" name="type" id="type">

            <div class="row layout-top-spacing" id="cancel-row">
                <div class="col-xl-12 col-lg-12 col-sm-12 mb-3">
                    <div class="widget-content widget-content-area">
                        <h3>Upload Karya Baru</h3>
                    </div>
                </div>

                <div class="col-12 mb-3">
                    <div class="widget-content widget-content-area br-6">
                        <div class="form-group mb-3">
                            <label for="title">Judul Karya:</label>
                            <input type="text" name="title" value="{{ old('title') }}" id="title"
                                class="form-control @error('title') is-invalid @enderror" required="required">

                            @error('title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <h5>Jenis Karya</h5>

                        <div class="mt-3">
                            <a href="#" class="bg bg-primary p-2 rounded option option-1">Multimedia</a>
                            <a href="#" class="bg bg-primary p-2 rounded option option-2">Aplikasi</a>
                        </div>

                        <div class="text-left mt-5">
                            <button type="submit" class="btn btn-primary">Selanjutnya &raquo;</button>
                        </div>
                    </div>
                    <div class="widget-footer mt-2">
                        Pilih jenis karya yang akan diupload. Pilih <b>Multimedia</b> untuk mengupload karya video, pamflet,
                        animasi atau sejenisnya.
                        <br>
                        Pilih <b>Aplikasi</b> untuk mengupload aplikasi seperti sistem informasi, koding, web, android dan
                        sebagainya.
                    </div>
                </div>


            </div>
        </form>
    </div>
@endsection

@push('custom_js')
    <script>
        $(document).ready(function() {
            $('.option-1').click(function() {
                $(this).addClass('bg-success');
                $('.option-2').removeClass('bg-success');

                $('#type').val('multimedia');
            });

            $('.option-2').click(function() {
                $(this).addClass('bg-success');
                $('.option-1').removeClass('bg-success');

                $('#type').val('app');
            });
        });
    </script>
@endpush
