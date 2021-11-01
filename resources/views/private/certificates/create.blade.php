@extends('layouts.admin')
@section('title', 'Manajemen Sertifikat')

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
                    Kirim Sertifikat
                </h3>
            </div>
        </div>

        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">

            <form action="{{ route("admin.certificate.store") }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-sm-12">
                        <div class="widget-content widget-content-area br-6">
                            <div class="accordion-icons">
                                <div class="card">
                                    <div class="card-header" id="...">
                                        <section class="mb-0 mt-0">
                                            <div role="menu" class="collapsed" data-toggle="collapse"
                                                data-target="#iconAccordionTwo" aria-expanded="false"
                                                aria-controls="iconAccordionTwo">
                                                <div class="accordion-icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-image">
                                                        <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                                                        <circle cx="8.5" cy="8.5" r="1.5"></circle>
                                                        <polyline points="21 15 16 10 5 21"></polyline>
                                                    </svg>
                                                </div>
                                                Gambar Unggulan
                                            </div>
                                        </section>
                                    </div>
                                    <div id="iconAccordionTwo" class="collapse show" aria-labelledby="..."
                                        data-parent="#iconsAccordion">
                                        <div class="card-body">

                                            <div class="custom-file-container form-group" data-upload-id="picture">
                                                <label>
                                                    Gambar Unggulan
                                                    <span><a href="javascript:void(0)" class="custom-file-container__image-clear"
                                                            title="Clear Image">x</a></span>
                                                </label>
                                                <label class="custom-file-container__custom-file">
                                                    <input type="file" name="picture"
                                                        class="custom-file-container__custom-file__custom-file-input" accept="image/*">
                                                    <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                                    <span class="custom-file-container__custom-file__custom-file-control"></span>
                                                </label>
                                                <div class="custom-file-container__image-preview"></div>

                                                @error('picture')
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
                    </div>
                    <div class="col-xl-8 col-lg-8 col-sm-12">
                        <div class="widget-content widget-content-area">
                            <div class="row">
                                <div class="col-md-6 col-sm-12 form-group">
                                    <label for="title">Job Name <span class="text-danger font-weight-bold">*</span></label>
                                    <input type="text" class="form-control" value="" id="title" name="title" required="required" maxlength="255" minlength="4">
                                </div>
                                <div class="col-md-6 col-sm-12 form-group">
                                    <label for="title">Subject Email <span class="text-danger font-weight-bold">*</span></label>
                                    <input type="text" class="form-control" value="" id="title" name="title" required="required" maxlength="255" minlength="4">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="title">Job Name <span class="text-danger font-weight-bold">*</span></label>
                                <input type="text" class="form-control" value="" id="title" name="title" required="required" maxlength="255" minlength="4">
                            </div>
                            <div class="text-right">
                                <button class="btn btn-primary btn-md" type="submit">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection