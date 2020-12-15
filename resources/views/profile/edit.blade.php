@extends('layouts.admin')
@section('title', 'Edit Profil')

@section('custom_head')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/dropify/dropify.min.css') }}">
    <link href="{{ asset('assets/themes/cork/css/users/account-setting.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <div class="layout-px-spacing">

        <div class="account-settings-container layout-top-spacing">

            <div class="account-content">
                <div class="scrollspy-example" data-spy="scroll" data-target="#account-settings-scroll" data-offset="-100">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                            <form id="general-info" class="section general-info" action="{{ route('profile.update') }}" method="post" enctype="multipart/form-data">
                                @method('put')
                                @csrf

                                <div class="info">
                                    <h6 class="">Ubah Profil</h6>
                                    <div class="row">
                                        <div class="col-lg-11 mx-auto">
                                            <div class="row">
                                                <div class="col-xl-2 col-lg-12 col-md-4">
                                                    <div class="upload mt-4 pr-md-4">
                                                        <input type="file" name="picture" id="input-file-max-fs" class="dropify"
                                                            data-default-file="{{ getProfilePicture() }}"
                                                            data-max-file-size="2M" />
                                                        <p class="mt-2"><i class="flaticon-cloud-upload mr-1"></i> Ganti
                                                            Foto</p>
                                                    </div>
                                                </div>
                                                <div class="col-xl-10 col-lg-12 col-md-8 mt-md-0 mt-4">
                                                    <div class="form">
                                                        <div class="form-group">
                                                            <label for="fullName">Nama:</label>
                                                            <input type="text"
                                                                class="form-control @error('name') is-invalid @enderror"
                                                                name="name" id="fullName" placeholder="Nama lengkap"
                                                                minlength="4" maxlength="128"
                                                                value="{{ auth()->user()->name }}" required>

                                                            @error('name')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6 col-xs-12">
                                                            <label for="email">Email:</label>
                                                            <input type="email" name="email"
                                                                value="{{ auth()->user()->email }}" id="email"
                                                                class="form-control @error('email') is-invalid @enderror"
                                                                minlength="10" maxlength="128"
                                                                required="required">

                                                            @error('email')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                        <div class="col-md-6 col-xs-12">
                                                            <label for="password">Password:</label>
                                                            <input type="password" name="password" id="password"
                                                                class="form-control @error('password') is-invalid @enderror"
                                                                minlength="6" max="128">

                                                            @error('password')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="mt-3 text-right">
                                                        <input type="submit" value="Simpan" class="btn btn-primary">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@push('custom_js')
    <script src="{{ asset('assets/plugins/dropify/dropify.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/blockui/jquery.blockUI.min.js') }}"></script>
    <!-- <script src="plugins/tagInput/tags-input.js"></script> -->
    <script src="{{ asset('assets/themes/cork/js/users/account-settings.js') }}"></script>
@endpush
