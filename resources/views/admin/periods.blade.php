@extends('layouts.admin')
@section('title', 'Manajemen Periode')

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
                        Manajemen Periode
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
                        <table id="period-table" class="table table-hover non-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Periode</th>
                                    <th>Aktif?</th>
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
                    <h5 class="modal-title">Tambah Data Periode</h5>
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

                        <div class="form-group" id="period-name-field">
                            <label for="period-name">Nama:</label>
                            <input type="text" class="form-control" id="period-name" name="period-name" required>

                            <div class="invalid-feedback period-name-feedback"></div>
                        </div>
                        <div class="form-group" id="period-active-field">
                            <label for="period-active">
                                <input type="checkbox" name="is_active" id="period-active" class="is_active_check" value="1">
                                Periode Aktif
                            </label>
                        </div>
                    </div>
                    <div class="modal-footer md-button">
                        <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Batal</button>
                        <button type="submit" class="btn btn-primary add-period-btn">Tambah</button>
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
                    <h5 class="modal-title">Ubah Data Periode</h5>
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

                        <div class="form-group" id="edit-period-name-field">
                            <label for="edit-period-name">Nama:</label>
                            <input type="text" class="form-control" id="edit-period-name" name="period-name" required>

                            <div class="invalid-feedback period-name-feedback"></div>
                        </div>
                        <div class="form-group" id="edit-period-active-field">
                            <label for="period-active">
                                <input type="checkbox" name="is_active" id="edit-period-active" class="is_active_check" value="1">
                                Periode Aktif
                            </label>
                        </div>
                    </div>
                    <div class="modal-footer md-button">
                        <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Batal</button>
                        <button type="submit" class="btn btn-primary save-period-btn">Simpan</button>
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
                    <h5 class="modal-title">Hapus Periode?</h5>
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
                        Yakin ingin menghapus data periode?
                        <br>
                        Semua <i>record</i> pengurus yang ada dalam periode ini juga akan dihapus.
                    </div>
                </div>
                <div class="modal-footer md-button">
                    <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Batal</button>
                    <button type="submit" class="btn btn-danger btn-delete-period">Hapus</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('custom_js')
<script src="{{ asset('assets/plugins/table/datatable/datatables.js') }}"></script>
    <script>
        let periodTable = $('#period-table').DataTable({
            ajax: {
                url: '{{ route('api.periods.index') }}',
                headers: {
                    'Authorization': `Bearer ${passportAccessToken}`
                }
            },
            dom: '<"row"<"col-md-12"<"row"<"col-md-6"B><"col-md-6"f> > ><"col-md-12"rt> <"col-md-12"<"row"<"col-md-5"i><"col-md-7"p>>> >',
            columns: [
                {"data": "id"},
                {
                    "data": "name"
                },
                {
                    data: function(data, row, type) {
                        return (data.is_active == 1) ?
                            `<span class="badge badge-success">Aktif</span>` :
                            `<span class="badge badge-secondary">Tidak</span>`;
                    }
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

        const addPeriodModal = document.querySelector('#add-modal');
        const addPeriodForm = addPeriodModal.querySelector('form');
        const addPeriodBtn = addPeriodForm.querySelector('.add-period-btn');
        const addPeriodNameField = addPeriodForm.querySelector('#period-name-field');
        const addPeriodActiveField = addPeriodForm.querySelector('#period-active-field');

        const addPeriodNameInput = addPeriodNameField.querySelector('#period-name');
        const addPeriodNameFeedback = addPeriodNameField.querySelector('.invalid-feedback');

        const addPeriodActiveInput = addPeriodActiveField.querySelector('#period-active');

        const addMessageContainer = addPeriodForm.querySelector('.message-container');

        addPeriodForm.addEventListener('submit', function(e) {
            e.preventDefault();

            addPeriodBtn.innerHTML = '<i class="fa fa-spin fa-spinner"></i> Menambah...';
            if (addPeriodNameInput != '') {
                addPeriodBtn.setAttribute('disabled', 'disabled');

                fetch('{{ route('api.periods.store') }}', {
                            method: 'POST',
                            headers: {
                                'Authorization': `Bearer ${passportAccessToken}`,
                                'Content-Type': 'application/json'
                            },
                            body: JSON.stringify({
                                name: addPeriodNameInput.value,
                                is_active: addPeriodActiveInput.checked
                            })
                        })
                    .then(res => res.json())
                    .then(res => {
                        addPeriodBtn.removeAttribute('disabled');

                        if (res.error) {
                            addPeriodBtn.innerHTML = 'Tambah';

                            if (res.validations) {
                                const validation = res.validations;
                                if (validation.name) {
                                    addPeriodNameInput.classList.add('is-invalid');
                                    addPeriodNameFeedback.innerHTML = validation.name[0]
                                }
                                if (validation.active) {
                                    addPeriodActiveInput.classList.add('is-invalid');
                                    addPeriodActiveFeedback.innerHTML = validation.active[0]
                                }
                            }
                        } else if (res.success) {
                            addPeriodBtn.innerHTML = '<i class="fa fa-check"></i> Berhasil!';
                            periodTable.ajax.reload();

                            if (!addMessageContainer.classList.contains('alert')) {
                                addMessageContainer.classList.add('alert');
                            }
                            if (addMessageContainer.classList.contains('alert-info')) {
                                addMessageContainer.classList.remove('alert-info');
                            }

                            if (addPeriodNameInput.classList.contains('is-invalid')) {
                                addPeriodNameInput.classList.remove('is-invalid');
                                addPeriodNameFeedback.innerHTML = '';
                            }
                            if (addPeriodActiveInput.classList.contains('is-invalid')) {
                                addPeriodActiveInput.classList.remove('is-invalid');
                                addPeriodActiveFeedback.innerHTML = '';
                            }

                            addMessageContainer.classList.add('alert-success');
                            addMessageContainer.innerHTML = res.message;

                            $('#add-modal').on('hidden.bs.modal', function(e) {
                                addPeriodBtn.innerHTML = 'Tambah';
                                addPeriodForm.reset();

                                addMessageContainer.classList.remove('alert');
                                addMessageContainer.classList.remove('alert-success');
                                addMessageContainer.innerHTML = '';
                            });
                        }
                    })
                    .catch(errors => {
                        addPeriodBtn.innerHTML = 'Tambah';

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

        const deleteBtn = document.querySelector('.btn-delete-period');
        const deleteMessageContainer = document.querySelector('.delete-message-container');

        deleteBtn.addEventListener('click', function (e) {
            e.preventDefault();

            deleteBtn.setAttribute('disabled', 'disabled');
            deleteBtn.innerHTML = '<i class="fa fa-spin fa-spinner"></i> Menghapus...';
            
            fetch(`{{ route('api.periods.destroy', false) }}/${delete_id}`, {
                method: 'DELETE',
                headers: {
                    'Authorization': `Bearer ${passportAccessToken}`
                }
            })
            .then(res => res.json())
            .then(res => {
                if (res.success) {
                    periodTable.ajax.reload();
                    deleteMessageContainer.innerHTML = res.message;

                    deleteBtn.innerHTML = '<i class="fa fa-check"></i> Berhasil!';

                    $('#delete-modal').on('hidden.bs.modal', function(e) {
                        deleteMessageContainer.innerHTML = `Yakin ingin menghapus data periode?
                        <br>
                        Semua <i>record</i> pengurus yang ada dalam periode ini juga akan dihapus.`;

                        deleteBtn.innerHTML = 'Hapus';
                        deleteBtn.removeAttribute('disabled');
                    });
                }
                else if (res.error) {
                    deleteMessageContainer.innerHTML = res.message;

                    deleteBtn.innerHTML = 'Hapus';
                    deleteBtn.removeAttribute('disabled');

                    $('#delete-modal').on('hidden.bs.modal', function(e) {
                        deleteMessageContainer.innerHTML = `Yakin ingin menghapus data periode?
                        <br>
                        Semua <i>record</i> pengurus yang ada dalam periode ini juga akan dihapus.`;

                        deleteBtn.innerHTML = 'Hapus';
                        deleteBtn.removeAttribute('disabled');
                    });
                }
            })
            .catch(errors => {
                deleteMessageContainer.innerHTML = errors;
            });
        });

        const editPeriodModal = document.querySelector('#edit-modal');
        const editPeriodForm = editPeriodModal.querySelector('form');
        const editPeriodBtn = editPeriodForm.querySelector('.save-period-btn');
        const editPeriodNameField = editPeriodForm.querySelector('#edit-period-name-field');
        const editPeriodActiveField = editPeriodForm.querySelector('#edit-period-active-field');

        const editPeriodNameInput = editPeriodNameField.querySelector('#edit-period-name');
        const editPeriodNameFeedback = editPeriodNameField.querySelector('.invalid-feedback');

        const editPeriodActiveInput = editPeriodActiveField.querySelector('#edit-period-active');
        const editPeriodActiveFeedback = editPeriodActiveField.querySelector('.invalid-feedback');

        const editMessageContainer = editPeriodForm.querySelector('.message-container');
        let edit_id = 0;

        $(document).on('click', '.btn-edit', function(e) {
            e.preventDefault();

            const id = $(this).data('id');
            edit_id = id;

            fetch(`{{ route('api.periods.show', false) }}/${id}`, {
                    headers: {
                        'Authorization': `Bearer ${passportAccessToken}`
                    }
                })
                .then(res => res.json())
                .then(res => {
                    editPeriodNameInput.value = res.name;
                    if (res.is_active == 1) {
                        editPeriodActiveInput.setAttribute('checked', 'checked');
                    }
                    else {
                        if (editPeriodActiveInput.hasAttribute('checked')) {
                            editPeriodActiveInput.removeAttribute('checked');
                        }
                    }

                    $('#edit-modal').modal('show');
                })
                .catch(errors => {
                    editMessageContainer.innerHTML = errors;
                });
        });

        editPeriodForm.addEventListener('submit', function(e) {
            e.preventDefault();

            editPeriodBtn.innerHTML = '<i class="fa fa-spin fa-spinner"></i> Menyimpan...';
            editPeriodBtn.setAttribute('disabled', 'disabled');

            fetch(`{{ route('api.periods.update', false) }}/${edit_id}`, {
                    method: 'PUT',
                    headers: {
                        'Authorization': `Bearer ${passportAccessToken}`,
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        name: editPeriodNameInput.value,
                        is_active: editPeriodActiveInput.checked
                    })
                })
                .then(res => res.json())
                .then(res => {
                    editPeriodBtn.removeAttribute('disabled');

                    if (res.error) {
                        editPeriodBtn.innerHTML = 'Simpan';

                        if (res.validations) {
                            const validation = res.validations;
                            if (validation.name) {
                                editPeriodNameInput.classList.add('is-invalid');
                                editPeriodNameFeedback.innerHTML = validation.name[0]
                            }
                            if (validation.active) {
                                editPeriodActiveInput.classList.add('is-invalid');
                                editPeriodActiveFeedback.innerHTML = validation.active[0]
                            }
                        }
                    } else if (res.success) {
                        editPeriodBtn.innerHTML = '<i class="fa fa-check"></i> Berhasil!';
                        periodTable.ajax.reload();

                        if (!editMessageContainer.classList.contains('alert')) {
                            editMessageContainer.classList.add('alert');
                        }
                        if (editMessageContainer.classList.contains('alert-info')) {
                            editMessageContainer.classList.remove('alert-info');
                        }

                        if (editPeriodNameInput.classList.contains('is-invalid')) {
                            editPeriodNameInput.classList.remove('is-invalid');
                            editPeriodNameFeedback.innerHTML = '';
                        }
                        if (editPeriodActiveInput.classList.contains('is-invalid')) {
                            editPeriodActiveInput.classList.remove('is-invalid');
                            editPeriodActiveFeedback.innerHTML = '';
                        }

                        editMessageContainer.classList.add('alert-success');
                        editMessageContainer.innerHTML = res.message;

                        $('#edit-modal').on('hidden.bs.modal', function(e) {
                            editPeriodBtn.innerHTML = 'Simpan';
                            editPeriodForm.reset();

                            editMessageContainer.classList.remove('alert');
                            editMessageContainer.classList.remove('alert-success');
                            editMessageContainer.innerHTML = '';
                        });
                    }
                })
                .catch(errors => {
                    editPeriodBtn.innerHTML = 'Simpan';

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