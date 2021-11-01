@extends('layouts.admin')
@section('title', 'Kelola Sertifikat')

@section('custom_head')

<link href="{{ asset('assets/themes/cork/css/components/tabs-accordian/custom-accordions.css') }}" rel="stylesheet" type="text/css" />
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
                    Kelola Sertifikat
                </h3>
            </div>
        </div>

        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing feather-icon">
            <div class="widget-content widget-content-area">
                <div class="p-3 shadow-sm">
                    <div class="row">
                        <div class="col-md-6">
                            <h5 class="d-inline">Sertifikat Lomba</h5>
                            @if ($batch)
                                <span class="badge outline-badge-dark ml-2 badge-pills"> {{ $batch->processedJobs() }} completed out of {{ $batch->totalJobs }} </span>
                                <span class="badge badge-dark ml-2 badge-pills"> {{ $batch->progress() }}% </span>
                            @endif
                        </div>
                        <div class="col-md-6 text-right">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-play-circle"><circle cx="12" cy="12" r="10"></circle><polygon points="10 8 16 12 10 16 10 8"></polygon></svg>
                            </span>
                            <span class="ml-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('custom_js')
    @if ($batch && $batch->progress() < 100)
        <script>
            window.setInterval('refresh()', 2000);

            function refresh() {
                window.location.reload()
            }
        </script>
    @endif
@endpush