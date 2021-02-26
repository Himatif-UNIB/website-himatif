@extends('layouts.admin')
@section('title', 'Pengaturan Sosial Media')

@section('custom_head')
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/plugins/@fortawesome/fontawesome-free/css/all.min.css') }}">
@endsection

@section('content')
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing">
            <div class="col-md-12 layout-spacing">
                <div class="statbox widget box box-shadow">
                    <div class="widget-header">
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                <h4>
                                    Pengaturan Sosial Media
                                    @if (session()->has('success'))
                                        <span class="float-right text-success">{{ session()->get('success') }}</span>
                                    @endif
                                </h4>
                            </div>
                        </div>
                    </div>
                    <div class="widget-content widget-content-area">
                        <form action="{{ route('admin.settings.update') }}" method="post">
                            @csrf
                            @method('put')
                            <input type="hidden" name="section" value="social">

                            <div class="form-group">
                                <label for="facebook-url">URL Facebook:</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fab fa-facebook"></i></span>
                                            </div>
                                            <input type="text" class="form-control" id="facebook-url"
                                                name="settings[facebookUrl]" value="{{ getSetting('facebookUrl') }}">
                                        </div>
                            </div>
                            <div class="form-group">
                                <label for="instagram-url">URL Instagram:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fab fa-instagram"></i></span>
                                    </div>
                                    <input type="text" id="instagram-url" class="form-control" name="settings[instagramUrl]"
                                        value="{{ getSetting('instagramUrl') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="youtube-url">URL YouTube:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fab fa-youtube"></i></span>
                                    </div>
                                    <input type="text" class="form-control" id="youtube-url" name="settings[youtubeUrl]" value="{{ getSetting('youtubeUrl') }}">
                                </div>
                            </div>

                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
