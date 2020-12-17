@extends('layouts.admin')
@section('title', 'Kelola Divisi')

@section('custom_head')
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/plugins/@fortawesome/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/table/datatable/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/table/datatable/dt-global_style.css') }}">
    <link href="{{ asset('assets/plugins/animate/animate.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/themes/cork/css/components/custom-modal.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <div class="layout-px-spacing">

        <div class="row layout-top-spacing" id="cancel-row">
            <div class="col-xl-12 col-lg-12 col-sm-12 mb-3">
                <div class="widget-content widget-content-area">
                    <h3>
                        Manajemen Divisi
                        <span class="float-right">
                            <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#add-modal">
                                <i class="fa fa-plus"></i>
                            </a>
                        </span>
                    </h3>
                </div>
            </div>

            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                <div class="widget-content widget-content-area br-6">
                    <div class="table-responsive mb-4 mt-4">
                        <table id="divisions-table" class="table table-hover non-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Divisi</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection

@section('custom_html')
    <div id="add-modal" class="modal animated rotateInDownLeft custo-rotateInDownLeft" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Data Divisi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-x">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg>
                    </button>
                </div>
                <form action="#" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="message-container"></div>

                        <div class="form-group" id="division-name-field">
                            <label for="division-name">Nama:</label>
                            <input type="text" class="form-control" id="division-name" name="division-name" required>

                            <div class="invalid-feedback division-name-feedback"></div>
                        </div>
                        <div class="form-group" id="division-picture-field">
                            <label for="division-picture">Picture:</label>
                            <input type="file" name="division-picture" id="division-picture" class="form-control"
                                required="required">

                            <div class="invalid-feedback division-picture-feedback"></div>
                        </div>
                    </div>
                    <div class="modal-footer md-button">
                        <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Batal</button>
                        <button type="submit" class="btn btn-primary add-division-btn">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="edit-modal" class="modal animated rotateInDownRight custo-rotateInDownRight" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Ubah Data Divisi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-x">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg>
                    </button>
                </div>
                <form action="#" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="message-container"></div>

                        <div class="form-group" id="edit-division-name-field">
                            <label for="edit-division-name">Nama:</label>
                            <input type="text" class="form-control" id="edit-division-name" name="division-name" required>

                            <div class="invalid-feedback division-name-feedback"></div>
                        </div>
                        <div class="form-group" id="edit-division-picture-field">
                            <label for="edit-division-picture">Picture:</label>
                            <input type="file" name="division-picture" id="edit-division-picture" class="form-control">

                            <div class="invalid-feedback division-picture-feedback"></div>
                            <div class="text-muted">Pilih gambar baru untuk mengganti yang lama.</div>
                        </div>
                    </div>
                    <div class="modal-footer md-button">
                        <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Batal</button>
                        <button type="submit" class="btn btn-primary save-division-btn">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="delete-modal" class="modal fade in" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Hapus Divisi?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-x">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-info delete-message-container">
                        Yakin ingin menghapus data divisi?
                        <br>
                        Semua anggota yang berada dalam divisi ini akan ditandai dalam divisi "NULL"
                    </div>
                </div>
                <div class="modal-footer md-button">
                    <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Batal</button>
                    <button type="submit" class="btn btn-danger btn-delete-division">Hapus</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('custom_js')
    <script src="{{ asset('assets/plugins/table/datatable/datatables.js') }}"></script>
    <script>
        let divisionTable = $('#divisions-table').DataTable({
            ajax: {
                url: '{{ route('api.divisions.index') }}',
                headers: {
                    'Authorization': `Bearer ${passportAccessToken}`
                }
            },
            dom: '<"row"<"col-md-12"<"row"<"col-md-6"B><"col-md-6"f> > ><"col-md-12"rt> <"col-md-12"<"row"<"col-md-5"i><"col-md-7"p>>> >',
            columns: [{
                    "data": function(data, row, type) {
                        return `<div class="d-flex">
                                    <div class="usr-img-frame mr-2 rounded-circle">
                                        <img alt="${data.name} Featured Image" class="img-fluid rounded-circle" src="${data.picture}">
                                    </div>
                                </div>`;
                    }
                },
                {
                    "data": "name"
                },
                {
                    data: function(data, row, type) {
                        return `
                                    <div class="text-right">
                                        <a href="#" class="btn btn-warning btn-sm btn-edit" data-id="${data.id}"><i class="fa fa-edit"></i></a>
                                        <a href="#" class="btn btn-danger btn-sm btn-delete" data-id="${data.id}"><i class="fa fa-trash"></i></a>
                                    </div>
                                `;
                    }
                }
            ],
            "oLanguage": {
                "oPaginate": {
                    "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
                    "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>'
                },
                "sInfo": "Showing page _PAGE_ of _PAGES_",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "Search...",
                "sLengthMenu": "Results :  _MENU_",
            },
            "stripeClasses": [],
            "lengthMenu": [10, 20, 25, 100],
            "pageLength": 10
        });

        const addDivisionModal = document.querySelector('#add-modal');
        const addDivisionForm = addDivisionModal.querySelector('form');
        const addDivisionBtn = addDivisionForm.querySelector('.add-division-btn');
        const addDivisionNameField = addDivisionForm.querySelector('#division-name-field');
        const addDivisionPictureField = addDivisionForm.querySelector('#division-picture-field');

        const addDivisionNameInput = addDivisionNameField.querySelector('#division-name');
        const addDivisionNameFeedback = addDivisionNameField.querySelector('.invalid-feedback');

        const addDivisionPictureInput = addDivisionPictureField.querySelector('#division-picture');
        const addDivisionPictureFeedback = addDivisionPictureField.querySelector('.invalid-feedback');

        const addMessageContainer = addDivisionForm.querySelector('.message-container');

        addDivisionForm.addEventListener('submit', function(e) {
            e.preventDefault();

            addDivisionBtn.innerHTML = '<i class="fa fa-spin fa-spinner"></i> Menambah...';
            if (addDivisionNameInput != '') {
                let divisionData = new FormData();
                divisionData.append('name', addDivisionNameInput.value);
                divisionData.append('picture', addDivisionPictureInput.files[0]);

                addDivisionBtn.setAttribute('disabled', 'disabled');

                fetch('{{ route('api.divisions.store') }}', {
                            method: 'POST',
                            headers: {
                                'Authorization': `Bearer ${passportAccessToken}`
                            },
                            body: divisionData
                        })
                    .then(res => res.json())
                    .then(res => {
                        addDivisionBtn.removeAttribute('disabled');

                        if (res.error) {
                            addDivisionBtn.innerHTML = 'Tambah';

                            if (res.validations) {
                                const validation = res.validations;
                                if (validation.name) {
                                    addDivisionNameInput.classList.add('is-invalid');
                                    addDivisionNameFeedback.innerHTML = validation.name[0]
                                }
                                if (validation.picture) {
                                    addDivisionPictureInput.classList.add('is-invalid');
                                    addDivisionPictureFeedback.innerHTML = validation.picture[0]
                                }
                            }
                        } else if (res.success) {
                            addDivisionBtn.innerHTML = '<i class="fa fa-check"></i> Berhasil!';
                            divisionTable.ajax.reload();

                            if (!addMessageContainer.classList.contains('alert')) {
                                addMessageContainer.classList.add('alert');
                            }
                            if (addMessageContainer.classList.contains('alert-info')) {
                                addMessageContainer.classList.remove('alert-info');
                            }

                            if (addDivisionNameInput.classList.contains('is-invalid')) {
                                addDivisionNameInput.classList.remove('is-invalid');
                                addDivisionNameFeedback.innerHTML = '';
                            }
                            if (addDivisionPictureInput.classList.contains('is-invalid')) {
                                addDivisionPictureInput.classList.remove('is-invalid');
                                addDivisionPictureFeedback.innerHTML = '';
                            }

                            addMessageContainer.classList.add('alert-success');
                            addMessageContainer.innerHTML = res.message;

                            $('#add-modal').on('hidden.bs.modal', function(e) {
                                addDivisionBtn.innerHTML = 'Tambah';
                                addDivisionForm.reset();

                                addMessageContainer.classList.remove('alert');
                                addMessageContainer.classList.remove('alert-success');
                                addMessageContainer.innerHTML = '';
                            });
                        }
                    })
                    .catch(errors => {
                        addDivisionBtn.innerHTML = 'Tambah';

                        if (!addMessageContainer.classList.contains('alert')) {
                            addMessageContainer.classList.add('alert');
                        }
                        if (addMessageContainer.classList.contains('alert-success')) {
                            addMessageContainer.classList.remove('alert-success');
                        }

                        addMessageContainer.classList.add('alert-info');
                        addMessageContainer.innerHTML = errors;
                    });
            }
        });

        const editDivisionModal = document.querySelector('#edit-modal');
        const editDivisionForm = editDivisionModal.querySelector('form');
        const editDivisionBtn = editDivisionForm.querySelector('.save-division-btn');
        const editDivisionNameField = editDivisionForm.querySelector('#edit-division-name-field');
        const editDivisionPictureField = editDivisionForm.querySelector('#edit-division-picture-field');

        const editDivisionNameInput = editDivisionNameField.querySelector('#edit-division-name');
        const editDivisionNameFeedback = editDivisionNameField.querySelector('.invalid-feedback');

        const editDivisionPictureInput = editDivisionPictureField.querySelector('#edit-division-picture');
        const editDivisionPictureFeedback = editDivisionPictureField.querySelector('.invalid-feedback');

        const editMessageContainer = editDivisionForm.querySelector('.message-container');
        let edit_id = 0;

        $(document).on('click', '.btn-edit', function(e) {
            e.preventDefault();

            const id = $(this).data('id');
            edit_id = id;

            fetch(`{{ route('api.divisions.show', false) }}/${id}`, {
                    headers: {
                        'Authorization': `Bearer ${passportAccessToken}`
                    }
                })
                .then(res => res.json())
                .then(res => {
                    editDivisionNameInput.value = res.name;

                    $('#edit-modal').modal('show');
                })
                .catch(errors => {
                    editMessageContainer.innerHTML = errors;
                });
        });

        editDivisionForm.addEventListener('submit', function(e) {
            e.preventDefault();

            editDivisionBtn.innerHTML = '<i class="fa fa-spin fa-spinner"></i> Menyimpan...';
            editDivisionBtn.setAttribute('disabled', 'disabled');

            const newDivisionData = new FormData();
            newDivisionData.append('name', editDivisionNameInput.value);
            if (editDivisionPictureInput.files[0]) {
                newDivisionData.append('picture', editDivisionPictureInput.files[0]);
            }
            newDivisionData.append('_method', 'PUT');

            fetch(`{{ route('api.divisions.update', false) }}/${edit_id}`, {
                    method: 'POST',
                    headers: {
                        'Authorization': `Bearer ${passportAccessToken}`
                    },
                    body: newDivisionData
                })
                .then(res => res.json())
                .then(res => {
                    editDivisionBtn.removeAttribute('disabled');

                    if (res.error) {
                        editDivisionBtn.innerHTML = 'Simpan';

                        if (res.validations) {
                            const validation = res.validations;
                            if (validation.name) {
                                editDivisionNameInput.classList.add('is-invalid');
                                editDivisionNameFeedback.innerHTML = validation.name[0]
                            }
                            if (validation.picture) {
                                editDivisionPictureInput.classList.add('is-invalid');
                                editDivisionPictureFeedback.innerHTML = validation.picture[0]
                            }
                        }
                    } else if (res.success) {
                        editDivisionBtn.innerHTML = '<i class="fa fa-check"></i> Berhasil!';
                        divisionTable.ajax.reload();

                        if (!editMessageContainer.classList.contains('alert')) {
                            editMessageContainer.classList.add('alert');
                        }
                        if (editMessageContainer.classList.contains('alert-info')) {
                            editMessageContainer.classList.remove('alert-info');
                        }

                        if (editDivisionNameInput.classList.contains('is-invalid')) {
                            editDivisionNameInput.classList.remove('is-invalid');
                            editDivisionNameFeedback.innerHTML = '';
                        }
                        if (editDivisionPictureInput.classList.contains('is-invalid')) {
                            editDivisionPictureInput.classList.remove('is-invalid');
                            editDivisionPictureFeedback.innerHTML = '';
                        }

                        editMessageContainer.classList.add('alert-success');
                        editMessageContainer.innerHTML = res.message;

                        $('#edit-modal').on('hidden.bs.modal', function(e) {
                            editDivisionBtn.innerHTML = 'Simpan';
                            editDivisionForm.reset();

                            editMessageContainer.classList.remove('alert');
                            editMessageContainer.classList.remove('alert-success');
                            editMessageContainer.innerHTML = '';
                        });
                    }
                })
                .catch(errors => {
                    editDivisionBtn.innerHTML = 'Simpan';

                    if (!editMessageContainer.classList.contains('alert')) {
                        editMessageContainer.classList.add('alert');
                    }
                    if (editMessageContainer.classList.contains('alert-success')) {
                        editMessageContainer.classList.remove('alert-success');
                    }

                    editMessageContainer.classList.add('alert-info');
                    editMessageContainer.innerHTML = errors;
                });
        });

        let delete_id = 0;
        $(document).on('click', '.btn-delete', function (e) {
            e.preventDefault();

            const id = $(this).data('id');
            delete_id = id;

            $('#delete-modal').modal('show');
        });

        const deleteBtn = document.querySelector('.btn-delete-division');
        const deleteMessageContainer = document.querySelector('.delete-message-container');

        deleteBtn.addEventListener('click', function (e) {
            e.preventDefault();

            deleteBtn.setAttribute('disabled', 'disabled');
            deleteBtn.innerHTML = '<i class="fa fa-spin fa-spinner"></i> Menghapus...';
            
            fetch(`{{ route('api.divisions.destroy', false) }}/${delete_id}`, {
                method: 'DELETE',
                headers: {
                    'Authorization': `Bearer ${passportAccessToken}`
                }
            })
            .then(res => res.json())
            .then(res => {
                if (res.success) {
                    divisionTable.ajax.reload();
                    deleteMessageContainer.innerHTML = 'Berhasil menghapus data divisi';

                    deleteBtn.innerHTML = '<i class="fa fa-check"></i> Berhasil!';

                    $('#delete-modal').on('hidden.bs.modal', function(e) {
                        deleteMessageContainer.innerHTML = `Yakin ingin menghapus data divisi?
                        <br>
                        Semua anggota yang berada dalam divisi ini akan ditandai dalam divisi "NULL"`;

                        deleteBtn.innerHTML = 'Hapus';
                        deleteBtn.removeAttribute('disabled');
                    });
                }
            })
            .catch(errors => {
                deleteMessageContainer.innerHTML = errors;
            });
        });
    </script>
@endpush
