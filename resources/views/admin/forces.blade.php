@extends('layouts.admin')
@section('title', 'Manajemen Angkatan')

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
                        Manajemen Angkatan
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
                        <table id="force-table" class="table table-hover non-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tahun Angkatan</th>
                                    <th>Nama Angkatan</th>
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
                    <h5 class="modal-title">Tambah Data Angkatan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-x">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg>
                    </button>
                </div>
                <form action="#" method="post">
                    <div class="modal-body">
                        <div class="message-container"></div>

                        <div class="form-group" id="force-name-field">
                            <label for="force-name">Nama Angkatan:</label>
                            <input type="text" class="form-control" id="force-name" name="force-name" required>

                            <div class="invalid-feedback force-name-feedback"></div>
                        </div>
                        <div class="form-group" id="force-year-field">
                            <label for="force-year">Tahun Angkatan:</label>
                            <input type="number" class="form-control" id="force-year" name="force-year" required>

                            <div class="invalid-feedback force-year-feedback"></div>
                        </div>
                    </div>
                    <div class="modal-footer md-button">
                        <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Batal</button>
                        <button type="submit" class="btn btn-primary add-force-btn">Tambah</button>
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
                    <h5 class="modal-title">Ubah Data Angkatan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-x">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg>
                    </button>
                </div>
                <form action="#" method="post">
                    <div class="modal-body">
                        <div class="message-container"></div>

                        <div class="form-group" id="edit-force-name-field">
                            <label for="edit-force-name">Nama Angkatan:</label>
                            <input type="text" class="form-control" id="edit-force-name" name="force-name" required>

                            <div class="invalid-feedback force-name-feedback"></div>
                        </div>
                        <div class="form-group" id="edit-force-year-field">
                            <label for="edit-force-year">Tahun Angkatan:</label>
                            <input type="number" class="form-control" id="edit-force-year" name="edit-force-year" required>

                            <div class="invalid-feedback force-year-feedback"></div>
                        </div>
                    </div>
                    <div class="modal-footer md-button">
                        <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Batal</button>
                        <button type="submit" class="btn btn-primary save-force-btn">Simpan</button>
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
                    <h5 class="modal-title">Hapus Angkatan?</h5>
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
                        Yakin ingin menghapus data angkatan?
                        <br>
                        Semua anggota dengan angkatan ini akan ditandai "NULL"
                    </div>
                </div>
                <div class="modal-footer md-button">
                    <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Batal</button>
                    <button type="submit" class="btn btn-danger btn-delete-force">Hapus</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('custom_js')
<script src="{{ asset('assets/plugins/table/datatable/datatables.js') }}"></script>
    <script>
        let forceTable = $('#force-table').DataTable({
            ajax: {
                url: '{{ route('api.forces.index') }}',
                headers: {
                    'Authorization': `Bearer ${passportAccessToken}`
                }
            },
            dom: '<"row"<"col-md-12"<"row"<"col-md-6"B><"col-md-6"f> > ><"col-md-12"rt> <"col-md-12"<"row"<"col-md-5"i><"col-md-7"p>>> >',
            columns: [
                {"data": "id"},
                {"data": "year"},
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

        const addForceModal = document.querySelector('#add-modal');
        const addForceForm = addForceModal.querySelector('form');
        const addForceBtn = addForceForm.querySelector('.add-force-btn');
        const addForceNameField = addForceForm.querySelector('#force-name-field');
        const addForceYearField = addForceForm.querySelector('#force-year-field');

        const addForceNameInput = addForceNameField.querySelector('#force-name');
        const addForceNameFeedback = addForceNameField.querySelector('.invalid-feedback');
        const addForceYearInput = addForceYearField.querySelector('#force-year');
        const addForceYearFeedback = addForceYearField.querySelector('.invalid-feedback');

        const addMessageContainer = addForceForm.querySelector('.message-container');

        addForceForm.addEventListener('submit', function(e) {
            e.preventDefault();

            addForceBtn.innerHTML = '<i class="fa fa-spin fa-spinner"></i> Menambah...';
            if (addForceNameInput != '' && addForceYearInput != '') {
                addForceBtn.setAttribute('disabled', 'disabled');

                fetch('{{ route('api.forces.store') }}', {
                            method: 'POST',
                            headers: {
                                'Authorization': `Bearer ${passportAccessToken}`,
                                'Content-Type': 'application/json'
                            },
                            body: JSON.stringify({
                                name: addForceNameInput.value,
                                year: addForceYearInput.value
                            })
                        })
                    .then(res => res.json())
                    .then(res => {
                        addForceBtn.removeAttribute('disabled');

                        if (res.error) {
                            addForceBtn.innerHTML = 'Tambah';

                            if (res.validations) {
                                const validation = res.validations;
                                if (validation.name) {
                                    addForceNameInput.classList.add('is-invalid');
                                    addForceNameFeedback.innerHTML = validation.name[0]
                                }
                                if (validation.year) {
                                    addForceYearInput.classList.add('is-invalid');
                                    addForceYearFeedback.innerHTML = validation.year[0]
                                }
                            }
                        } else if (res.success) {
                            addForceBtn.innerHTML = '<i class="fa fa-check"></i> Berhasil!';
                            forceTable.ajax.reload();

                            if (!addMessageContainer.classList.contains('alert')) {
                                addMessageContainer.classList.add('alert');
                            }
                            if (addMessageContainer.classList.contains('alert-info')) {
                                addMessageContainer.classList.remove('alert-info');
                            }

                            if (addForceNameInput.classList.contains('is-invalid')) {
                                addForceNameInput.classList.remove('is-invalid');
                                addForceNameFeedback.innerHTML = '';
                            }
                            if (addForceYearInput.classList.contains('is-invalid')) {
                                addForceYearInput.classList.remove('is-invalid');
                                addForceYearFeedback.innerHTML = '';
                            }

                            addMessageContainer.classList.add('alert-success');
                            addMessageContainer.innerHTML = res.message;

                            $('#add-modal').on('hidden.bs.modal', function(e) {
                                addForceBtn.innerHTML = 'Tambah';
                                addForceForm.reset();

                                addMessageContainer.classList.remove('alert');
                                addMessageContainer.classList.remove('alert-success');
                                addMessageContainer.innerHTML = '';
                            });
                        }
                    })
                    .catch(errors => {
                        addForceBtn.innerHTML = 'Tambah';

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

        let delete_id = 0;
        $(document).on('click', '.btn-delete', function (e) {
            e.preventDefault();

            const id = $(this).data('id');
            delete_id = id;

            $('#delete-modal').modal('show');
        });

        const deleteBtn = document.querySelector('.btn-delete-force');
        const deleteMessageContainer = document.querySelector('.delete-message-container');

        deleteBtn.addEventListener('click', function (e) {
            e.preventDefault();

            deleteBtn.setAttribute('disabled', 'disabled');
            deleteBtn.innerHTML = '<i class="fa fa-spin fa-spinner"></i> Menghapus...';
            
            fetch(`{{ route('api.forces.destroy', false) }}/${delete_id}`, {
                method: 'DELETE',
                headers: {
                    'Authorization': `Bearer ${passportAccessToken}`
                }
            })
            .then(res => res.json())
            .then(res => {
                if (res.success) {
                    forceTable.ajax.reload();
                    deleteMessageContainer.innerHTML = res.message;

                    deleteBtn.innerHTML = '<i class="fa fa-check"></i> Berhasil!';

                    $('#delete-modal').on('hidden.bs.modal', function(e) {
                        deleteMessageContainer.innerHTML = `Yakin ingin menghapus data angkatan?
                        <br>
                        Semua anggota dengan angkatan ini akan ditandai "NULL"`;

                        deleteBtn.innerHTML = 'Hapus';
                        deleteBtn.removeAttribute('disabled');
                    });
                }
                else if (res.error) {
                    deleteMessageContainer.innerHTML = res.message;

                    deleteBtn.innerHTML = 'Hapus';
                    deleteBtn.removeAttribute('disabled');

                    $('#delete-modal').on('hidden.bs.modal', function(e) {
                        deleteMessageContainer.innerHTML = `Yakin ingin menghapus data angkatan?
                        <br>
                        Semua anggota dengan angkatan ini akan ditandai "NULL"`;

                        deleteBtn.innerHTML = 'Hapus';
                        deleteBtn.removeAttribute('disabled');
                    });
                }
            })
            .catch(errors => {
                deleteMessageContainer.innerHTML = errors;
            });
        });

        const editForceModal = document.querySelector('#edit-modal');
        const editForceForm = editForceModal.querySelector('form');
        const editForceBtn = editForceForm.querySelector('.save-force-btn');
        const editForceNameField = editForceForm.querySelector('#edit-force-name-field');
        const editForceYearField = editForceForm.querySelector('#edit-force-year-field');

        const editForceNameInput = editForceNameField.querySelector('#edit-force-name');
        const editForceNameFeedback = editForceNameField.querySelector('.invalid-feedback');
        const editForceYearInput = editForceYearField.querySelector('#edit-force-year');
        const editForceYearFeedback = editForceYearField.querySelector('.invalid-feedback');

        const editMessageContainer = editForceForm.querySelector('.message-container');
        let edit_id = 0;

        $(document).on('click', '.btn-edit', function(e) {
            e.preventDefault();

            const id = $(this).data('id');
            edit_id = id;

            fetch(`{{ route('api.forces.show', false) }}/${id}`, {
                    headers: {
                        'Authorization': `Bearer ${passportAccessToken}`
                    }
                })
                .then(res => res.json())
                .then(res => {
                    editForceNameInput.value = res.name;
                    editForceYearInput.value = res.year;
                    
                    $('#edit-modal').modal('show');
                })
                .catch(errors => {
                    editMessageContainer.innerHTML = errors;
                });
        });

        editForceForm.addEventListener('submit', function(e) {
            e.preventDefault();

            if (editForceYearInput.value.length != 4 || editForceYearInput.value < 1970) {
                editForceYearInput.classList.add('is-invalid');
                editForceYearFeedback.innerHTML = 'Masukkan tahun dengan benar';
                return false;
            }

            editForceBtn.innerHTML = '<i class="fa fa-spin fa-spinner"></i> Menyimpan...';
            editForceBtn.setAttribute('disabled', 'disabled');

            fetch(`{{ route('api.forces.update', false) }}/${edit_id}`, {
                    method: 'PUT',
                    headers: {
                        'Authorization': `Bearer ${passportAccessToken}`,
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        name: editForceNameInput.value,
                        year: editForceYearInput.value
                    })
                })
                .then(res => res.json())
                .then(res => {
                    editForceBtn.removeAttribute('disabled');

                    if (res.error) {
                        editForceBtn.innerHTML = 'Simpan';

                        if (res.validations) {
                            const validation = res.validations;
                            if (validation.name) {
                                editForceNameInput.classList.add('is-invalid');
                                editForceNameFeedback.innerHTML = validation.name[0]
                            }
                            if (validation.active) {
                                editForceYearInput.classList.add('is-invalid');
                                editForceYearFeedback.innerHTML = validation.active[0]
                            }
                        }
                    } else if (res.success) {
                        editForceBtn.innerHTML = '<i class="fa fa-check"></i> Berhasil!';
                        forceTable.ajax.reload();

                        if (!editMessageContainer.classList.contains('alert')) {
                            editMessageContainer.classList.add('alert');
                        }
                        if (editMessageContainer.classList.contains('alert-info')) {
                            editMessageContainer.classList.remove('alert-info');
                        }

                        if (editForceNameInput.classList.contains('is-invalid')) {
                            editForceNameInput.classList.remove('is-invalid');
                            editForceNameFeedback.innerHTML = '';
                        }
                        if (editForceYearInput.classList.contains('is-invalid')) {
                            editForceYearInput.classList.remove('is-invalid');
                            editForceYearFeedback.innerHTML = '';
                        }

                        editMessageContainer.classList.add('alert-success');
                        editMessageContainer.innerHTML = res.message;

                        $('#edit-modal').on('hidden.bs.modal', function(e) {
                            editForceBtn.innerHTML = 'Simpan';
                            editForceForm.reset();

                            editMessageContainer.classList.remove('alert');
                            editMessageContainer.classList.remove('alert-success');
                            editMessageContainer.innerHTML = '';
                        });
                    }
                })
                .catch(errors => {
                    editForceBtn.innerHTML = 'Simpan';
                    editForceBtn.removeAttribute('disabled');

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
    </script>
@endpush