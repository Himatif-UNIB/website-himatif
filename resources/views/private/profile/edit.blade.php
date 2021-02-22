@extends('layouts.admin')
@section('title', 'Edit Profil')

@section('custom_head')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/dropify/dropify.min.css') }}">
    <link href="{{ asset('assets/themes/cork/css/users/account-setting.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/plugins/toastify-js/src/toastify.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/themes/cork/css/elements/infobox.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/plugins/@fortawesome/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/air-datepicker/dist/css/datepicker.min.css') }}">
    <link href="{{ asset('assets/themes/cork/css/elements/avatar.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <div class="layout-px-spacing">

        <div class="account-settings-container layout-top-spacing">
            <div class="account-content">
                <div class="scrollspy-example" data-spy="scroll" data-target="#account-settings-scroll" data-offset="-100">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                            <form id="general-info" action="{{ route('admin.profile.update') }}" method="post"
                                enctype="multipart/form-data">
                                @method('put')
                                @csrf

                                <div class="section general-info">
                                    <div class="info">
                                        <h6 class="ml-5">Data Diri</h6>
                                        <div class="row">
                                            <div class="col-lg-11 mx-auto">
                                                <div class="row">
                                                    <div class="col-xl-2 col-lg-12 col-md-4">
                                                        <div class="upload mt-4 pr-md-4">
                                                            <div class="avatar avatar-xl">
                                                                <input type="file" name="picture" id="input-file-max-fs"
                                                                    class="dropify rounded-circle"
                                                                    data-default-file="{{ getProfilePicture() }}"
                                                                    data-max-file-size="2M" />
                                                            </div>
                                                            <p class="mt-2"><i class="flaticon-cloud-upload mr-1"></i> Ganti
                                                                Foto</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-10 col-lg-12 col-md-8 mt-md-0 mt-4">
                                                        <div class="form-group">
                                                            <label for="fullName">Nama:</label>
                                                            <input type="text"
                                                                class="form-control @error('name') is-invalid @enderror"
                                                                name="name" id="fullName" placeholder="Nama lengkap"
                                                                minlength="4" maxlength="128"
                                                                value="{{ old('name', isset($member->name) ? $member->name : $user->name) }}" required>

                                                            @error('name')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                        @isset($user->member)
                                                        <div class="row">
                                                            <div class="col-md-6 col-xs-12">
                                                                <label for="birth-place">Tempat Lahir:</label>
                                                                <input type="text" name="birth_place" value="{{ old('birth_place', isset($member->birth_place) ? $member->birth_place : '') }}" id="birth-place"
                                                                    placeholder="Tempat Lahir" maxlength="64" class="form-control @error('birth_place') is-invalid @enderror">

                                                                @error('birth_place')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                            <div class="col-md-6 col-xs-12">
                                                                <label for="birth-date">Tanggal Lahir:</label>
                                                                <input type="text" name="birth_date" value="{{ old('birth_date', isset($member->birth_date) ? $member->birth_date : '') }}" id="birth-date"
                                                                    placeholder="Tanggal lahir"
                                                                    maxlength="10" class="form-control @error('birth_date') is-invalid @enderror">

                                                                @error('password')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="form-group mt-3">
                                                            <label for="phone-number">WhatsApp:</label>
                                                            <input type="text"
                                                                class="form-control @error('phone_number') is-invalid @enderror"
                                                                name="phone_number" id="phone-number" placeholder="No WhatsApp"
                                                                minlength="9" maxlength="16"
                                                                value="{{ old('phone_number', isset($member->phone_number) ? $member->phone_number : '') }}" >

                                                            @error('phone_number')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group mt-3">
                                                            <label for="address">Alamat:</label>
                                                            <textarea name="address" id="address" class="form-control @error('address') is-invalid @enderror" maxlength="255"
                                                                placeholder="Alamat tinggal">{{ old('address', isset($member->address) ? $member->address : '') }}</textarea>
                                                        
                                                            @error('address')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                        @else
                                                        <div class="alert alert-info">
                                                            Edit profil hanya tersedia untuk Anggota
                                                        </div>
                                                        @endisset
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="section general-info mt-2">
                                    <div class="info">
                                        <h6 class="ml-5">Akun</h6>
                                        <div class="row">
                                            <div class="col-lg-11 mx-auto">
                                                <div class="row">
                                                    <div class="col-12 mb-4 mt-4">
                                                        <div class="row">
                                                            <div class="col-md-6 col-xs-12">
                                                                <label for="email">Email:</label>
                                                                <input type="email" name="email"
                                                                    value="{{ old('email', $user->email) }}" id="email"
                                                                    class="form-control @error('email') is-invalid @enderror"
                                                                    minlength="10" maxlength="128" required="required">

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
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mt-3 text-right mr-5">
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </div>
                                </div>

                                <div class="section general-info mt-2 pb-2">
                                    <div class="info">
                                        <h6 class="ml-5">Akun Sosial</h6>
                                        <div class="row">
                                            <div class="col-lg-11 mx-auto">
                                                <div class="row">
                                                    <div class="col-6 col-xs-12">
                                                        @if ($isConnectedWith['facebook'])
                                                        <div class="infobox-2">
                                                            <div class="profile-info">
                                                                <div class="info-icon user-info"
                                                                style="width: 100px; height: 100px">
                                                                <img src="{{ $socialData['facebook']['picture_url'] }}"
                                                                    class="img img-fluid">
                                                            </div>
                                                            </div>
                                                            <h5 class="info-heading">{{ $socialData['facebook']['data']->name }}</h5>
                                                            <a class="info-link" href="{{ route('admin.auth.facebook.revoke') }}">Putuskan</a>
                                                        </div>
                                                        @else
                                                        <div class="infobox-3">
                                                            <div class="info-icon p-3">
                                                                <i class="fab fa-facebook fa-2x" style="color: white;"></i>
                                                            </div>
                                                            <h5 class="info-heading">Facebook</h5>
                                                            <p class="info-text">
                                                                Hubungkan akun Facebook kamu dengan akun HIMATIF.
                                                            </p>
                                                            <a class="info-link" href="{{ route('admin.auth.facebook.connect') }}">
                                                                Hubungkan
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right">
                                                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                                                    <polyline points="12 5 19 12 12 19"></polyline>
                                                                </svg>
                                                            </a>
                                                        </div>
                                                        @endif
                                                    </div>
                                                    <div class="col-6 col-xs-12">
                                                        @if ($isConnectedWith['google'])
                                                        <div class="infobox-2">
                                                            <div class="profile-info">
                                                                <div class="info-icon user-info"
                                                                style="width: 100px; height: 100px">
                                                                <img src="{{ $socialData['google']['picture_url'] }}"
                                                                    class="img img-fluid">
                                                            </div>
                                                            </div>
                                                            <h5 class="info-heading" style="word-wrap: break-word;">{{ $socialData['google']['data']->email }}</h5>
                                                            <a class="info-link" href="{{ route('admin.auth.google.revoke') }}">Putuskan</a>
                                                        </div>
                                                        @else
                                                        <div class="infobox-3">
                                                            <div class="info-icon p-3">
                                                                <i class="fab fa-google fa-2x" style="color: white;"></i>
                                                            </div>
                                                            <h5 class="info-heading">Google</h5>
                                                            <p class="info-text">
                                                                Hubungkan akun Google kamu dengan akun HIMATIF.
                                                            </p>
                                                            <a class="info-link" href="{{ route('admin.auth.google.connect') }}">
                                                                Hubungkan
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right">
                                                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                                                    <polyline points="12 5 19 12 12 19"></polyline>
                                                                </svg>
                                                            </a>
                                                        </div>
                                                        @endif
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
    <script src="{{ asset('assets/plugins/toastify-js/src/toastify.js') }}"></script>
    <script src="{{ asset('assets/plugins/air-datepicker/dist/js/datepicker.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/air-datepicker/dist/js/i18n/datepicker.id.js') }}"></script>

    @if (session()->has('error'))
    <script>
        Toastify({
            text: "{{ session()->get('error') }}",
            gravity: "top",
            position: 'right',
            close: true,
            backgroundColor: "linear-gradient(to right, #ff5f6d, #ffc371)",
            duration: 10000
        }).showToast();
    </script>
    @endif

    @if (session()->has('success'))
    <script>
        var bgColors = [
            "linear-gradient(to right, #00b09b, #96c93d)",
            "linear-gradient(to right, #ff5f6d, #ffc371)",
        ],
        i = 0;

        Toastify({
            text: "{{ session()->get('success') }}",
            duration: 5000,
            close: true,
            backgroundColor: bgColors[i % 2],
        }).showToast();
    </script>
    @endif

    <script>
        $('#birth-date').datepicker({
            language: 'id',
            dateFormat: 'yyyy-mm-dd',
            onShow: function(dp, animationCompleted) {
                if (!animationCompleted) {
                    if (dp.$datepicker.find('button').html() === undefined) {
                        /*ONLY when button don't existis*/
                        dp.$datepicker.append(
                            '<button type="button" class="btn btn-block btn-primary uk-button uk-button-default uk-button-small uk-width-1-1 uk-margin-small-bottom" disabled="disabled"><i class="fas fa-check"></i> OK</button>'
                            );
                        dp.$datepicker.find('button').click(function(event) {
                            dp.hide();
                        });
                    }
                }
            },
            onSelect: function(formattedDate, date, dp) {
                if (formattedDate.length > 0) {
                    dp.$datepicker.find('button').prop('disabled', false).removeClass('uk-button-default')
                        .addClass('uk-button-primary');
                } else {
                    dp.$datepicker.find('button').prop('disabled', true).removeClass('uk-button-primary')
                        .addClass('uk-button-default');
                }
            }
        });
    </script>
@endpush
