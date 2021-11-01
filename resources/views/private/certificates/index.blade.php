@extends('layouts.admin')
@section('title', 'Manajemen Sertifikat')

@section('custom_head')
    <style>
        table a {
            color: #445EDE;
            font-weight: bold
        }
    </style>
@endsection

@section('content')
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing" id="cancel-row">
            <div class="col-xl-12 col-lg-12 col-sm-12 mb-3">
                <div class="widget-content widget-content-area">
                    <h3>
                        Kirim Sertifikat
                    </h3>
                </div>
            </div>

            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                <div class="widget-content widget-content-area">
                    Pilih Template

                    <form action="{{ route("admin.certificate.store", ['certificate' => 1]) }}" method="POST">
                        @csrf
                        <button type="submit">Test</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection