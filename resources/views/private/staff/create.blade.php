@extends('layouts.admin')
@section('title', 'Ubah Struktur Kepengurusan')

@section('custom_head')
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/plugins/@fortawesome/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2/select2.min.css') }}">
@endsection

@section('content')
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing" id="cancel-row">
            <div class="col-xl-12 col-lg-12 col-sm-12 mb-3">
                <div class="widget-content widget-content-area">
                    <h3>Ubah Struktur Kepengurusan</h3>
                </div>
            </div>

            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                <div class="widget-content widget-content-area br-6">
                    @if (session()->has('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                    @endif

                    <form action="{{ route('staff.store') }}" method="post">
                        @csrf

                        <div class="form-group">
                            <label for="period">Periode:</label>
                            <select name="period_id" id="period" class="form-control">
                                @foreach ($periods as $period)
                                    <option value="{{ $period->id }}"
                                        @if ($period->is_active)
                                            selected="selected"
                                        @else
                                            disabled
                                        @endif>{{ $period->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="alert alert-info">
                            Sebelum mengatur struktur kepengurusan, Anda harus mengatur data jabatan mulai dari pembina hingga anggota.
                            <br>
                            <br>
                            <a href="{{ route('positions') }}" target="_blank">Atur jabatan &raquo;</a>
                        </div>

                        <div class="alert alert-info">
                            Setiap jabatan dapat ditempati satu atau lebih anggota.
                            Satu anggota hanya bisa menempati satu jabatan.
                        </div>

                        @forelse ($positions as $position)
                            <div class="form-group" data-order="{{ $position->order_level }}">
                                <label for="position-{{ $position->id }}">{{ $position->name }}</label>
                                <select name="positions[{{ $position->id }}][]" id="position-{{ $position->id }}" class="form-control" multiple>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}"
                                            @if (isset($positionUsers[$position->id]) && in_array($user->id, $positionUsers[$position->id]))
                                                selected="selected"
                                            @endif>{{ $user->name }} @isset ($user->member->npm) {{ $user->member->npm }} @endisset</option>
                                    @endforeach
                                </select>
                            </div>
                        @empty
                            <div class="alert alert-warning">
                                Anda belum mengatur data jabatan.
                            </div>
                        @endforelse

                        <div class="form-group text-right">
                            <input type="submit" value="Simpan" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('custom_js')
    <script src="{{ asset('assets/plugins/select2/select2.min.js') }}"></script>
    <script>
        @foreach ($positions as $position)
        $('#position-{{ $position->id }}').select2();
        @endforeach
    </script>
@endpush