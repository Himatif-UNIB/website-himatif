@extends('layouts.admin')
@section('title', 'Pengaturan Umum')

@section('content')
<div class="layout-px-spacing">
    <div class="row layout-top-spacing">
        <div class="col-md-8 layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4>
                                Pengaturan Umum
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
                        <input type="hidden" name="section" value="general">

                        <div class="form-group">
                            <label for="site-name">Nama situs:</label>
                            <input type="text" class="form-control @error('settings.siteName') is-invalid @enderror" id="site-name" name="settings[siteName]" value="{{ old('settings.siteName', getSiteName()) }}">
                        
                            @error('settings.siteName')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="site-description">Deskripsi:</label>
                            <textarea name="settings[siteDescription]" id="site-description" class="form-control">{{ old('settings.siteDescription', getSetting('siteDescription')) }}</textarea>
                        </div>

                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="statbox widget box box-shadow layout-top-spacing">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4>Kontak</h4>
                        </div>                 
                    </div>
                </div>
                <div class="widget-content widget-content-area">
                    <form action="{{ route('admin.settings.update') }}" method="post">
                        @csrf
                        @method('put')
                        <input type="hidden" name="section" value="contact">

                        <div class="form-group">
                            <label for="phone-number">No. HP:</label>
                            <input type="text" class="form-control @error('settings.organizationPhoneNumber') is-invalid @enderror" value="{{ old('settings.organizationPhoneNumber', getSetting('organizationPhoneNumber')) }}" id="phone-number" name="settings[organizationPhoneNumber]">
                        
                            @error('settings.organizationPhoneNumber')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="site-email">Email:</label>
                            <input type="email" value="{{ old('settings.organizationEmail', getSetting('organizationEmail')) }}" class="form-control @error('settings.organizationEmail') is-invalid @enderror" id="site-email" name="settings[organizationEmail]">
                        
                            @error('settings.organizationEmail')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="address">Alamat:</label>
                            <textarea name="settings[organizationAddress]" id="address" class="form-control @error('settings.organizationAddress') is-invalid @enderror">{{ old('settings.organizationAddress', getSetting('organizationAddress')) }}</textarea>
                        
                            @error('settings.organizationAddress')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-4 layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4>Logo</h4>
                        </div>                 
                    </div>
                </div>
                <div class="widget-content widget-content-area">
                    <form action="{{ route('admin.settings.update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')

                        <input type="hidden" name="section" value="logo">

                        @if (isset($logo[0]))
                            <div class="text-center">
                                <img src="{{ $logo[0]->getFullUrl() }}" alt="Logo {{ getSiteName() }}" class="img img-fluid" id="site-logo">
                            </div>

                            <div class="alert alert-info mt-5 preview-text">
                                Pilih logo baru untuk mengganti yang lama
                            </div>

                            <div class="form-group">
                                <label for="logo">Upload Logo:</label>
                                <input type="file" name="logo" id="logo" class="form-control @error('logo') is-invalid @enderror" required="required">
    
                                @error('logo')
                                    {{ $message }}
                                @enderror
                            </div>
                        @else
                        <div class="alert alert-info no-logo-alert">
                            Belum ada logo
                        </div>
                        <div class="text-center new-logo-preview d-none">
                            <img alt="Preview logo" class="img img-fluid">
                        </div>

                        <div class="form-group">
                            <label for="logo">Upload Logo:</label>
                            <input type="file" name="logo" id="logo" class="form-control @error('logo') is-invalid @enderror" required="required">

                            @error('logo')
                                {{ $message }}
                            @enderror
                        </div>
                        @endif

                        <div class="text-right">
                            <input type="submit" value="Simpan" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('custom_js')
    <script>
        @if (isset($logo[0]))
        let pictureField = document.querySelector('#logo');
        let pictureTag = document.querySelector('#site-logo');
        let previewText = document.querySelector('.preview-text');

        pictureField.addEventListener('change', (e) => {
            e.preventDefault();

            if (pictureField.files && pictureField.files[0]) {
                var reader = new FileReader();
                previewText.innerHTML = 'Klik "Simpan" untuk memperbarui logo';

                reader.onload = function (e) {
                    pictureTag.setAttribute('src', e.target.result);
                }

                reader.readAsDataURL(pictureField.files[0]);
            }
        });
        @else
        let pictureField = document.querySelector('#logo');
        let picturePreview = document.querySelector('.new-logo-preview');
        let noLogoAlert = document.querySelector('.no-logo-alert');

        pictureField.addEventListener('change', (e) => {
            e.preventDefault();

            if (pictureField.files && pictureField.files[0]) {
                var reader = new FileReader();
                noLogoAlert.innerHTML = 'Preview';

                reader.onload = function (e) {
                    picturePreview.classList.remove('d-none');
                    picturePreview.querySelector('.img')
                        .setAttribute('src', e.target.result);
                }

                reader.readAsDataURL(pictureField.files[0]);
            }
        });
        @endif
    </script>
@endpush