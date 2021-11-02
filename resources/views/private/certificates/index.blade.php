@extends('layouts.admin')
@section('title', 'Kelola Sertifikat')

@section('custom_head')

<link href="{{ asset('assets/themes/cork/css/components/tabs-accordian/custom-accordions.css') }}" rel="stylesheet" type="text/css" />
<style>
    table a {
        color: #445EDE;
        font-weight: bold
    }

    .dot {
        height: 12px;
        width: 12px;
        border-radius: 50%;
        display: inline-block;
    }

    .dot-danger {
        background-color: #e7515a;
    }

    .dot-warning {
        background-color: #e2a03f;
    }

    .dot-success {
        background-color:  #8dbf42 ;
    }

    .dot-secondary{
        background-color: #bbb;
    }

    .dashed-border{
        color: #888ea8;
        margin-bottom: 0;
        display: inline-block;
        border: 2px dashed #888ea8;
        line-height: 1.4;
        padding: 3px 6px;
        font-size: 15px;
        font-weight: 600;
        border-radius: 4px;
        letter-spacing: 1px;
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
                @forelse ($batches as $item)
                    <div class="p-3 shadow-sm mb-4">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-6">
                                        @if ($item->finished_at)
                                            <span class="dot dot-success mr-2 bs-tooltip" title="success"></span>
                                        @elseif ($item->pending_jobs != $item->total_jobs && $item->pending_jobs > 0)
                                            <span class="dot dot-warning mr-2 bs-tooltip" title="pending"></span>
                                        @elseif ($item->failed_jobs > 0)
                                            <span class="dot dot-danger mr-2 bs-tooltip" title="failed"></span>
                                        @else
                                            <span class="dot dot-secondary mr-2 bs-tooltip" title="draf"></span>
                                        @endif
                                        <h6 class="d-inline">{{ $item->name }}</h6>
                                        <p class="d-inline-block">{{ \Str::limit($item->id, 13) }}</p>
                                    </div>
                                    <div class="col-6">
                                        @if ($batch)
                                            @if ($batch->id == $item->id && $batch->progress() < 100)
                                                <span class="ml-3 dashed-border">{{ $batch->processedJobs() }}  of {{ $batch->totalJobs }}</span>
                                                <span class="badge badge-dark ml-2 badge-pills"> {{ $batch->progress() }}% </span>
                                            @endif
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 text-right">
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                </span>
                            </div>
                        </div>
                    </div>
                @empty
                <div class="alert alert-info">Belum ada sertifikat apapun.</div>
                @endforelse
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