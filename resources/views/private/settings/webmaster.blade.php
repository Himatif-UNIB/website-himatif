@extends('layouts.admin')
@section('title', 'Pengaturan Webmaster')

@section('content')
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing">
            <div class="col-md-12 layout-spacing">
                <div class="statbox widget box box-shadow">
                    <div class="widget-header">
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                <h4>
                                    Pengaturan Webmaster
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
                            <input type="hidden" name="section" value="webmaster">

                            <p>Kunjungi masing-masing situs webmaster untuk mendapatkan kode verifikasi kepemilikan.</p>

                            <div class="row">
                                <div class="col-xs-12 col-md-6">
                                    <div class="form-group">
                                        <label for="">Kode verifikasi kepemilikan Google:</label>
                                        <input type="text" class="form-control" name="settings[googleVerifyCode]"
                                            value="{{ getSetting('googleVerifyCode') }}">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-md-6">
                                    <div class="form-group">
                                        <label for="">Kode verifikasi kepemilikan Bing:</label>
                                        <input type="text" class="form-control" name="settings[bingVerifyCode]"
                                            value="{{ getSetting('bingVerifyCode') }}">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-md-6">
                                    <div class="form-group">
                                        <label for="">Kode verifikasi kepemilikan Alexa:</label>
                                        <input type="text" class="form-control" name="settings[alexaVerifyCode]"
                                            value="{{ getSetting('alexaVerifyCode') }}">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-md-6">
                                    <div class="form-group">
                                        <label for="">Kode verifikasi kepemilikan Yandex:</label>
                                        <input type="text" class="form-control" name="settings[yandexVerifyCode]"
                                            value="{{ getSetting('yandexVerifyCode') }}">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="">ID Pelacakan Google Analytics:</label>
                                <input type="text" name="settings[googleAnalyticsId]"
                                    value="{{ getSetting('googleAnalyticsId') }}" class="form-control">
                            </div>

                            <div class="row">
                                <div class="col-xs-12 col-md-6">
                                    <label for="">Facebook Author ID:</label>
                                    <input type="text" class="form-control" name="settings[facebookAuthorId]"
                                        value="{{ getSetting('facebookAuthorId') }}">
                                </div>
                                <div class="col-xs-12 col-md-6">
                                    <label for="">Facebook Page ID:</label>
                                    <input type="text" class="form-control" name="settings[facebookAppId]"
                                        value="{{ getSetting('facebookAppId') }}">
                                </div>
                            </div>

                            <div class="text-right mt-2">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
