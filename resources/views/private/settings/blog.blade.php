@extends('layouts.admin')
@section('title', 'Pengaturan Blog')

@section('custom_head')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/themes/cork/css/forms/switches.css') }}">
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
                                Pengaturan Blog
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
                        <input type="hidden" name="section" value="blog">

                        <div class="row">
                            <div class="col-1 col-xs-2">
                                <div class="form-group">
                                    <label class="switch s-icons s-outline s-outline-success mr-2">
                                        <input type="checkbox" name="settings[allowComment]" id="allow-comment" value="1"
                                            @if (getSetting('allowComment') == 1) checked @endif>
                                        <span class="slider round"></span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-11 col-xs-10">
                                <label for="allow-comment">Izinkan Komentar di Posting Blog?</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-1 col-xs-2">
                                <div class="form-group">
                                    <label class="switch s-icons s-outline s-outline-success mr-2">
                                        <input type="checkbox" name="settings[moderateComment]" id="moderate-comment" value="1"
                                            @if (getSetting('moderateComment') == 1) checked @endif>
                                        <span class="slider round"></span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-11 col-xs-10">
                                <label for="moderate-comment">Moderasi Komentar yang Masuk?</label>
                            </div>
                            <div class="col-12">
                                Jika dimoderasi, komentar yang masuk harus disetujui sebelum ditampilkan.
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