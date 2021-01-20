@extends('layouts.admin')
@section('title', 'Manajemen Formulir')

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
                        Manajemen Formulir
                    </h3>
                </div>
            </div>

            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                <div class="widget-content widget-content-area">
                    @if (count($forms) > 0)
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hovered table-condensed">
                            <thead>
                                <th scope="col">#</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Jawaban</th>
                                <th scope="col">Status</th>
                                <th scope="col">Dibuat pada</th>
                            </thead>
                            <tbody>
                                @foreach ($forms as $item)
                                    <tr>
                                        <th scope="row">{{ $item->id }}</th>
                                        <td><a href="{{ route('forms.show', $item->id) }}">{{ $item->title }}</a></td>
                                        <td>{{ count($item->answers) }}</td>
                                        <td>
                                            @if ($item->status == 1)
                                                <span class="badge badge-secondary">Konsep</span>
                                            @elseif ($item->status == 2)
                                                <span class="badge badge-success">Dibuka</span>
                                            @else
                                                <span class="badge badge-danger">Ditutup</span>
                                            @endif
                                        </td>
                                        <td>
                                            {{ \Carbon\Carbon::parse($item->created_at)->format('l, d M Y H:i') }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $forms->links() }}
                    @else
                        <div class="alert alert-info">
                            Belum ada formulir yang dibuat. Cobalah membuat satu!
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
