@extends('layouts.admin')
@section('title', 'Buat Formulir Baru')

@section('custom_head')
    <link rel="stylesheet" href="{{ asset('assets/plugins/air-datepicker/dist/css/datepicker.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/plugins/@fortawesome/fontawesome-free/css/all.min.css') }}">
@endsection

@section('content')
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing" id="cancel-row">
            <div class="col-xl-12 col-lg-12 col-sm-12 mb-3">
                <div class="widget-content widget-content-area">
                    <h3>
                        Buat Formulir Baru
                    </h3>
                </div>
            </div>

            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                <form action="{{ route('forms.store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="widget-content widget-content-area br-6">
                        <div class="form-group">
                            <label for="title">Judul Formulir: <span class="text-danger font-weight-bold">*</span></label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror"
                                value="{{ old('title') }}" id="title" name="title" required="required" maxlength="255"
                                minlength="4">

                            @error('title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="picture">Gambar utama:</label>
                            <input type="file" name="picture" id="picture"
                                class="form-control @error('picture') is-invalid @enderror">

                            @error('picture')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="description">Deskripsi:</label>
                                    <textarea name="description" id="description"
                                        class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>

                                    @error('description')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="post-message">Pesan setelah mengirim formulir:</label>
                                    <textarea name="post_message" id="post-message"
                                        class="form-control @error('post_message') is-invalid @enderror">{{ old('post_message') }}</textarea>

                                    @error('post_message')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="auto-close">Otomatis tutup formulir pada:</label>
                                    <input type="text"
                                        class="form-control @error('auto_close_date') }} is-invalid @enderror"
                                        id="auto-close" name="auto_close_date">

                                    @error('auto_close_date')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    <span class="text-muted">Kosongkan jika tidak ingin menutup formulir secara
                                        otomatis</span>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="auto-close-answer">Otomatis tutup formulir jika sudah mendapatkan
                                        jawaban:</label>
                                    <input type="number"
                                        class="form-control @error('auto_close_answer') is-invalid @enderror"
                                        id="auto-close-answer" name="auto_close_answer" value="{{ old('auto_close_answer') }}">

                                    @error('auto_close_answer')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    <span class="text-muted">Kosongkan jika tidak ingin menutup formulir secara
                                        otomatis</span>
                                </div>
                            </div>
                        </div>

                        <div class="text-right">
                            <input type="submit" value="Buat Formulir" class="btn btn-primary">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('custom_js')
    <script src="{{ asset('assets/plugins/air-datepicker/dist/js/datepicker.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/air-datepicker/dist/js/i18n/datepicker.id.js') }}"></script>

    <script>
        $('#auto-close').datepicker({
            language: 'id',
            position: 'top left',
            timepicker: true,
            dateFormat: 'yyyy-mm-dd',
            timeFormat: 'hh:ii',
            minDate: new Date(),
            closeButton: true,
            onShow: function(dp, animationCompleted) {
                if (!animationCompleted) {
                    if (dp.$datepicker.find('button').html() === undefined) {
                        /*ONLY when button don't existis*/
                        dp.$datepicker.append(
                            '<button type="button" class="btn btn-block btn-primary uk-button uk-button-default uk-button-small uk-width-1-1 uk-margin-small-bottom" disabled="disabled"><i class="fas fa-check"></i> OK</button>'
                            );
                        dp.$datepicker.find('button').click(function(event) {
                            dp.hide();
                        });
                    }
                }
            },
            onSelect: function(formattedDate, date, dp) {
                if (formattedDate.length > 0) {
                    dp.$datepicker.find('button').prop('disabled', false).removeClass('uk-button-default')
                        .addClass('uk-button-primary');
                } else {
                    dp.$datepicker.find('button').prop('disabled', true).removeClass('uk-button-primary')
                        .addClass('uk-button-default');
                }
            }
        });

    </script>
@endpush
