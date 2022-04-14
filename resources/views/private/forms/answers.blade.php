@extends('layouts.admin')
@section('title', 'Jawaban Formulir '. $form->title)

@section('custom_head')
    <link href="{{ asset('assets/themes/cork/css/scrollspyNav.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/themes/cork/css/components/tabs-accordian/custom-accordions.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<div class="layout-px-spacing">
    <div class="row layout-top-spacing" id="cancel-row">
        <div class="col-xl-12 col-lg-12 col-sm-12 mb-3">
            <div class="widget-content widget-content-area">
                <h3>
                    Jawaban Formulir {{ $form->title }}
                </h3>
            </div>
        </div>

        <div class="col-lg-12 col-12 layout-spacing">
            <div id="toggleAccordion">
                @php ($n = 1)
                @foreach ($form->answers as $item)
                <div class="card">
                    <div class="card-header" id="">
                        <section class="mb-0 mt-0">
                            <div role="menu" class="@if ($n != 1) collapsed @endif" data-toggle="collapse"
                                data-target="#answer-{{ $item->id }}" aria-expanded="true" aria-controls="answer-{{ $item->id }}">
                                Jawaban #{{ $n }}
                                <div class="icons">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down">
                                        <polyline points="6 9 12 15 18 9"></polyline>
                                    </svg>
                                </div>
                            </div>
                        </section>
                    </div>
            
                    <div id="answer-{{ $item->id }}" class="@if ($n != 1) collapse @endif" aria-labelledby="#answer-{{ $item->id }}" data-parent="#toggleAccordion">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-striped table-bordered">
                                    @foreach ($item->answers as $answer)
                                        <tr>
                                            <td>{{ $answer->question->question }}</td>
                                            @if ($answer->question->type == 9)
                                                <td>
                                                    <strong>
                                                        @if (isset($answer->media[0]))
                                                            <a href="{{ $answer->media[0]->getFullUrl() }}"
                                                                target="_blank" class="text-primary">{{ $answer->media[0]->file_name }}</a>
                                                        @else
                                                            Tidak ada file
                                                        @endif
                                                    </strong>
                                                </td>
                                            @else
                                                <td><strong>{{ $answer->answer }}</strong></td>
                                            @endif
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td>Waktu</td>
                                        <td><strong>{{ $item->created_at->translatedFormat('l, d M Y H:i') }}</strong></td>
                                    </tr>
                                    @if ($item->is_over_date || $item->is_over_answer)
                                        <tr>
                                            <td>Keterangan</td>
                                            <td>
                                                <strong>
                                                    @if ($item->is_over_date)
                                                        <span class="badge badge-info">Melewati batas waktu</span>
                                                    @endif

                                                    @if ($item->is_over_answer)
                                                        <span class="badge badge-info">Melewati batas jumlah jawaban</span>
                                                    @endif
                                                </strong>
                                            </td>
                                        </tr>
                                    @endif
                                    <tr>
                                        <td>
                                            IP
                                        </td>
                                        <td><strong>{{ $item->ip_address }}</strong></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            User Agent
                                        </td>
                                        <td><strong>{{ $item->user_agent }}</strong></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                @php ($n++)
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection

@push('custom_js')
    <script src="{{ asset('assets/themes/cork/js/scrollspyNav.js') }}"></script>
    <script src="{{ asset('assets/themes/cork/js/components/ui-accordions.js') }}"></script>
@endpush