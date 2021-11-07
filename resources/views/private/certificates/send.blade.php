@extends('layouts.admin')
@section('title', 'Manajemen Sertifikat')

@section('custom_head')

<link href="{{ asset('assets/themes/cork/css/components/custom-modal.css') }}" rel="stylesheet" type="text/css" />

<link href="{{ asset('assets/themes/cork/css/components/tabs-accordian/custom-accordions.css') }}" rel="stylesheet" type="text/css" />
<style>
    table a {
        color: #445EDE;
        font-weight: bold
    }

    .clicked-item{
        border: #adff28 4px solid;
        border-radius: 10px;
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

            <form action="{{ route("admin.certificates.store") }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-sm-12">
                        <div class="widget-content widget-content-area br-6">
                            <div class="accordion-icons">
                                <div class="card">
                                    <div class="card-header m-3 d-flex justify-content-between">
                                        <h5 class="">Pilih Sertifikat</h5>
                                        <button type="button" class="btn btn-sm btn-rounded btn-outline-primary d-inline" data-toggle="modal" data-target="#exampleModalCenter">
                                            Tambah
                                        </button>
                                    </div>
                                    <div>
                                        <div class="card-body">
                                            <div class="row">
                                                <input type="hidden" name="certificate_id" value="">
                                                @forelse ($certificates as $certificate)
                                                <div class="col-xl-6 col-lg-6 col-sm-12 mb-3">
                                                    <div class="position-relative certificate" id="{{ $certificate->id }}" style="cursor: pointer;">
                                                        <img src="{{ asset('storage/' . $certificate->thumbnail) }}" height="125px" alt="" style="width: 100%; border-radius: 7px; object-fit: cover;">
                                                        <p class="position-absolute" style="right: 0px; top: 0px; color: white;">Lorem, ipsum dolor.</p>
                                                    </div>
                                                </div>
                                                @empty
                                                <div class="alert alert-danger"><strong>Data belum ada!</strong> silahkan tambah sertifikat terlebih dahulu.</div>
                                                @endforelse
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-sm-12">
                        <div class="widget-content widget-content-area">
                            <div class="form-group">
                                <label for="job_name">Job Name <span class="text-danger font-weight-bold">*</span></label>
                                <input type="text" class="form-control" value="" id="job_name" name="job_name" required="required" maxlength="255" minlength="4">
                            </div>
                            <div class="form-group">
                                <label for="forms">Pilih Data Form <span class="text-danger font-weight-bold">*</span></label>
                                <select class="form-control" value="" id="forms" name="forms" required="required">
                                    <option disabled selected>Pilih Data</option>
                                    @foreach ($forms as $form)
                                        <option value="{{ $form->id }}">{{ \Str::limit($form->title, 35) }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="row">
                                <div class="col-md-4 col-sm-12">
                                    <p><< Nama >></p>
                                </div>
                                <div class="col-md-4 col-sm-12">
                                    <p>Map to column --></p>
                                </div>
                                <div class="col-md-4 col-sm-12">
                                    <div class="input-group input-group-sm">
                                        <select  class="form-control" name="name" id="form_questions_name">
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-4 col-sm-12">
                                    <p><< Email >></p>
                                </div>
                                <div class="col-md-4 col-sm-12">
                                    <p>Map to column --></p>
                                </div>
                                <div class="col-md-4 col-sm-12">
                                    <div class="input-group input-group-sm">
                                        <select  class="form-control" name="email" id="form_questions_email">
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-3 text-right">
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

@section('custom_html')
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Data Sertifikat</h5>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                </button>
            </div>
            <form id="addForm" enctype="multipart/form-data">
                <div class="modal-body" id="create_certificate_modal">
                    <div class="form-group">
                        <label for="title">Title<span class="text-danger font-weight-bold">*</span></label>
                        <input type="text" class="form-control" id="title" name="title" required="required" maxlength="255" minlength="4">
                        <span class="text-danger d-none" id="titleError"></span>
                    </div>
                    <div class="form-group">
                        <label for="certificate_type">Certifcate Type<span class="text-danger font-weight-bold">*</span></label>
                        <select class="form-control" id="certificate_type" name="certificate_type" required="required">
                            <option value="image">image</option>
                            <option value="html">html</option>
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="file">File<span class="text-danger font-weight-bold">*</span></label>
                                <input type="file" class="form-control" id="file" name="file" required="required">
                                <span class="text-danger d-none" id="fileError"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group d-none" id="form_group_thumbnail">
                                <label for="thumbnail">Thumbnail<span class="text-danger font-weight-bold">*</span></label>
                                <input type="file" class="form-control" id="thumbnail" name="thumbnail">
                                <span class="text-danger d-none" id="thumbnailError"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('custom_js')
    <script>
        $(document).ready(function(){
            $(document).on("click",".certificate", function () {
                var clickedBtnID = $(this).attr('id'); // or var clickedBtnID = this.id
                $('input[name="certificate_id"]').val(clickedBtnID)
                $('.certificate').not(`#${clickedBtnID}`).removeClass('clicked-item')
                $(`#${clickedBtnID}`).addClass('clicked-item')
            });

            $('#forms').change(function() {
                let id = $(this).val()
                $('#form_questions_name').empty()
                $('#form_questions_email').empty()
                $('#form_questions_name').append(`<option value="0" disabled selected>Processing...</option>`)
                $('#form_questions_email').append(`<option value="0" disabled selected>Processing...</option>`)

                $.ajax({
                    type: 'GET',
                    url: '/api/certificates/' + id,
                    headers: {
                        'Authorization': `Bearer ${passportAccessToken}`
                    },
                    success:function(response){
                        var response = JSON.parse(response)
                        console.log(response)
                        $('#form_questions_name').empty()
                        $('#form_questions_email').empty()
                        $('#form_questions_name').append(`<option value="0" disabled selected>Select Name</option>`)
                        $('#form_questions_email').append(`<option value="0" disabled selected>Select Email</option>`)

                        response.forEach(element => {
                            $('#form_questions_name').append(`<option value="${element['id']}">${element['question']}</option>`)
                            $('#form_questions_email').append(`<option value="${element['id']}">${element['question']}</option>`)
                        });
                    }
                })
            })

            $('#certificate_type').change(function(){
                let certificate_type = $('#certificate_type').find(':selected').val();
                if (certificate_type == 'html') {
                    $('#form_group_thumbnail').removeClass('d-none')
                } else {
                    $('#form_group_thumbnail').addClass('d-none')
                }
            });

            $('#addForm').on('submit', function(event) {
                event.preventDefault();
                var formData = new FormData(this);

                $.ajax({
                    type: "POST",
                    url: '{{ route('api.certificates.store') }}',
                    headers: {
                        'Authorization': `Bearer ${passportAccessToken}`
                    },
                    processData: false,
                    contentType: false,
                    data: formData,
                    success: function(response){
                        location.reload()
                    },
                    error: function(error){
                        let errors = error.responseJSON;
                        if ($.isEmptyObject(errors) == false) {
                            $.each(errors.errors, function(key, value){
                                var ErrorID = '#' + key + 'Error'
                                $(ErrorID).removeClass('d-none')
                                $(ErrorID).text(value)
                            })
                        }
                    }
                })

            })
        })
    </script>
@endpush