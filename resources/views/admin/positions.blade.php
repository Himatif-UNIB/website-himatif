@extends('layouts.admin')
@section('title', 'Manajemen Jabatan')

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
                        Manajemen Jabatan
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
                        <table id="position-table" class="table table-hover non-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Jabatan</th>
                                    <th>Induk</th>
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
                    <h5 class="modal-title">Tambah Data Jabatan</h5>
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

                        <div class="form-group" id="position-name-field">
                            <label for="position-name">Jabatan:</label>
                            <input type="text" class="form-control" id="position-name" name="position-name" required>

                            <div class="invalid-feedback position-name-feedback"></div>
                        </div>
                        <div class="form-group" id="position-parent-field">
                            <label for="position-parent">Induk:</label>
                            <select name="parent_id" id="position-parent" class="form-control">
                                <option value="0">Tidak ada</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer md-button">
                        <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Batal</button>
                        <button type="submit" class="btn btn-primary add-position-btn">Tambah</button>
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
                    <h5 class="modal-title">Ubah Data Jabatan</h5>
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

                        <div class="form-group" id="edit-position-name-field">
                            <label for="edit-position-name">Jabatan:</label>
                            <input type="text" class="form-control" id="edit-position-name" name="position-name" required>

                            <div class="invalid-feedback position-name-feedback"></div>
                        </div>
                        <div class="form-group" id="edit-position-parent-field">
                            <label for="edit-position-parent">Induk:</label>
                            <select name="parent_id" id="edit-position-parent" class="form-control">
                                <option value="0">Tidak ada</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer md-button">
                        <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Batal</button>
                        <button type="submit" class="btn btn-primary save-position-btn">Simpan</button>
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
                    <h5 class="modal-title">Hapus Jabatan?</h5>
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
                        Yakin ingin menghapus data jabatan?
                        <br>
                        Semua anggota dengan jabatan ini akan ditandai "NULL"
                    </div>

                    <div class="is-parent-alert"></div>
                </div>
                <div class="modal-footer md-button">
                    <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Batal</button>
                    <button type="submit" class="btn btn-danger btn-delete-position">Hapus</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('custom_js')
    <script src="{{ asset('assets/plugins/table/datatable/datatables.js') }}"></script>
    <script>
        function loadPositionParents(loadTo, defaultSelected = null) {
            const defaultOption = document.createElement('option');
            defaultOption.setAttribute('value', 0);
            defaultOption.classList.add('parent-0');
            defaultOption.innerHTML = 'Tidak ada';

            fetch('{{ route('api.positions.parents') }}', {
                method: 'GET',
                headers: {
                    'Authorization': `Bearer ${passportAccessToken}`
                }
            })
                .then(res => res.json())
                .then(res => {
                    const parents = res.data;
                    if (parents.length > 0) {
                        while (loadTo.firstChild) {
                            loadTo.removeChild(loadTo.firstChild);
                        }

                        loadTo.appendChild(defaultOption);

                        parents.forEach((parent) => {
                            let parentOption = document.createElement('option');
                            parentOption.setAttribute('value', parent.id);
                            if (defaultSelected != null && defaultSelected == parent.id) {
                                parentOption.setAttribute('selected', 'selected');
                            }
                            parentOption.classList.add(`parent-${parent.id}`);
                            parentOption.innerHTML = parent.name;

                            loadTo.appendChild(parentOption);
                        });
                    }
                })
                .catch(errors => {
                    console.log(errors);
                });
        }

        let positionTable = $('#position-table').DataTable({
            ajax: {
                url: '{{ route('api.positions.index') }}',
                headers: {
                    'Authorization': `Bearer ${passportAccessToken}`
                }
            },
            dom: '<"row"<"col-md-12"<"row"<"col-md-6"B><"col-md-6"f> > ><"col-md-12"rt> <"col-md-12"<"row"<"col-md-5"i><"col-md-7"p>>> >',
            columns: [{
                    "data": "id"
                },
                {
                    "data": "name"
                },
                {
                    "data": function(data, row, type) {
                        return (data.parent == null) ? '<span class="badge badge-info">Tidak ada</span>' :
                            `<span class="badge badge-success">${data.parent.name}</span>`;
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
            "order": [
                [1, "asc"]
            ],
            "stripeClasses": [],
            "lengthMenu": [10, 20, 25, 100],
            "pageLength": 10
        });

        $('#add-modal').on('show.bs.modal', function () {
            loadPositionParents(document.querySelector('#position-parent'));
        });

        const addPositionModal = document.querySelector('#add-modal');
        const addPositionForm = addPositionModal.querySelector('form');
        const addPositionBtn = addPositionForm.querySelector('.add-position-btn');
        const addPositionNameField = addPositionForm.querySelector('#position-name-field');
        addPositionParentField = addPositionForm.querySelector('#position-parent-field');

        const addPositionNameInput = addPositionNameField.querySelector('#position-name');
        const addPositionNameFeedback = addPositionNameField.querySelector('.invalid-feedback');
        const addPositionParentInput = addPositionParentField.querySelector('#position-parent');
        const addPositionParentFeedback = addPositionParentField.querySelector('.invalid-feedback');

        const addMessageContainer = addPositionForm.querySelector('.message-container');

        function resetAddForm() {
            addPositionBtn.innerHTML = 'Tambah';
            addPositionForm.reset();

            addMessageContainer.classList.remove('alert');
            addMessageContainer.classList.remove('alert-success');
            addMessageContainer.innerHTML = '';
        }

        addPositionForm.addEventListener('submit', function(e) {
            e.preventDefault();

            addPositionBtn.innerHTML = '<i class="fa fa-spin fa-spinner"></i> Menambah...';
            if (addPositionNameInput != '' && addPositionParentInput != '') {
                addPositionBtn.setAttribute('disabled', 'disabled');

                fetch('{{ route('api.positions.store') }}', {
                    method: 'POST',
                    headers: {
                        'Authorization': `Bearer ${passportAccessToken}`,
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        name: addPositionNameInput.value,
                        parent_id: addPositionParentInput.value
                    })
                })
                    .then(res => res.json())
                    .then(res => {
                        addPositionBtn.removeAttribute('disabled');

                        if (res.error) {
                            addPositionBtn.innerHTML = 'Tambah';

                            if (res.validations) {
                                const validation = res.validations;
                                if (validation.name) {
                                    addPositionNameInput.classList.add('is-invalid');
                                    addPositionNameFeedback.innerHTML = validation.name[0]
                                }
                                if (validation.parent) {
                                    addPositionParentInput.classList.add('is-invalid');
                                    addPositionParentFeedback.innerHTML = validation.parent[0]
                                }
                            }
                        } else if (res.success) {
                            addPositionBtn.innerHTML = '<i class="fa fa-check"></i> Berhasil!';
                            positionTable.ajax.reload();
                            loadPositionParents(document.querySelector('#position-parent'));

                            if (!addMessageContainer.classList.contains('alert')) {
                                addMessageContainer.classList.add('alert');
                            }
                            if (addMessageContainer.classList.contains('alert-info')) {
                                addMessageContainer.classList.remove('alert-info');
                            }

                            if (addPositionNameInput.classList.contains('is-invalid')) {
                                addPositionNameInput.classList.remove('is-invalid');
                                addPositionNameFeedback.innerHTML = '';
                            }
                            if (addPositionParentInput.classList.contains('is-invalid')) {
                                addPositionParentInput.classList.remove('is-invalid');
                                addPositionParentFeedback.innerHTML = '';
                            }

                            addMessageContainer.classList.add('alert-success');
                            addMessageContainer.innerHTML = res.message;

                            setTimeout(function () {
                                resetAddForm();
                            }, 2000);

                            $('#add-modal').on('hidden.bs.modal', function(e) {
                                resetAddForm();
                            });
                        }
                    })
                    .catch(errors => {
                        addPositionBtn.innerHTML = 'Tambah';

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

        const deleteBtn = document.querySelector('.btn-delete-position');
        const deleteMessageContainer = document.querySelector('.delete-message-container');

        deleteBtn.addEventListener('click', function (e) {
            e.preventDefault();

            deleteBtn.setAttribute('disabled', 'disabled');
            deleteBtn.innerHTML = '<i class="fa fa-spin fa-spinner"></i> Menghapus...';
            
            fetch(`{{ route('api.positions.destroy', false) }}/${delete_id}`, {
                method: 'DELETE',
                headers: {
                    'Authorization': `Bearer ${passportAccessToken}`
                }
            })
            .then(res => res.json())
            .then(res => {
                if (res.success) {
                    positionTable.ajax.reload();
                    deleteMessageContainer.innerHTML = res.message;

                    deleteBtn.innerHTML = '<i class="fa fa-check"></i> Berhasil!';

                    $('#delete-modal').on('hidden.bs.modal', function(e) {
                        deleteMessageContainer.innerHTML = `Yakin ingin menghapus data jabatan?
                        <br>
                        Semua anggota dengan jabatan ini akan ditandai "NULL"`;

                        deleteBtn.innerHTML = 'Hapus';
                        deleteBtn.removeAttribute('disabled');
                    });
                }
                else if (res.error) {
                    deleteMessageContainer.innerHTML = res.message;

                    deleteBtn.innerHTML = 'Hapus';
                    deleteBtn.removeAttribute('disabled');

                    $('#delete-modal').on('hidden.bs.modal', function(e) {
                        deleteMessageContainer.innerHTML = `Yakin ingin menghapus data jabatan?
                        <br>
                        Semua anggota dengan jabatan ini akan ditandai "NULL"`;

                        deleteBtn.innerHTML = 'Hapus';
                        deleteBtn.removeAttribute('disabled');
                    });
                }
            })
            .catch(errors => {
                deleteMessageContainer.innerHTML = errors;
            });
        });

        const editPositionModal = document.querySelector('#edit-modal');
        const editPositionForm = editPositionModal.querySelector('form');
        const editPositionBtn = editPositionForm.querySelector('.save-position-btn');
        const editPositionNameField = editPositionForm.querySelector('#edit-position-name-field');
        const editPositionParentField = editPositionForm.querySelector('#edit-position-parent-field');

        const editPositionNameInput = editPositionNameField.querySelector('#edit-position-name');
        const editPositionNameFeedback = editPositionNameField.querySelector('.invalid-feedback');
        const editPositionParentInput = editPositionParentField.querySelector('#edit-position-parent');
        const editPositionParentFeedback = editPositionParentField.querySelector('.invalid-feedback');

        const editMessageContainer = editPositionForm.querySelector('.message-container');
        let edit_id = 0;

        $(document).on('click', '.btn-edit', function(e) {
            e.preventDefault();

            const id = $(this).data('id');
            edit_id = id;

            fetch(`{{ route('api.positions.show', false) }}/${id}`, {
                    headers: {
                        'Authorization': `Bearer ${passportAccessToken}`
                    }
                })
                .then(res => res.json())
                .then(res => {
                    editPositionNameInput.value = res.name;
                    loadPositionParents(document.querySelector('#edit-position-parent'), res.parent_id);
                    
                    $('#edit-modal').modal('show');
                })
                .catch(errors => {
                    editMessageContainer.innerHTML = errors;
                });
        });

        editPositionForm.addEventListener('submit', function(e) {
            e.preventDefault();

            editPositionBtn.innerHTML = '<i class="fa fa-spin fa-spinner"></i> Menyimpan...';
            editPositionBtn.setAttribute('disabled', 'disabled');

            fetch(`{{ route('api.positions.update', false) }}/${edit_id}`, {
                    method: 'PUT',
                    headers: {
                        'Authorization': `Bearer ${passportAccessToken}`,
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        name: editPositionNameInput.value,
                        parent_id: editPositionParentInput.value
                    })
                })
                .then(res => res.json())
                .then(res => {
                    editPositionBtn.removeAttribute('disabled');

                    if (res.error) {
                        editPositionBtn.innerHTML = 'Simpan';

                        if (res.validations) {
                            const validation = res.validations;
                            if (validation.name) {
                                editPositionNameInput.classList.add('is-invalid');
                                editPositionNameFeedback.innerHTML = validation.name[0]
                            }
                            if (validation.active) {
                                editPositionParentInput.classList.add('is-invalid');
                                editPositionParentFeedback.innerHTML = validation.active[0]
                            }
                        }
                    } else if (res.success) {
                        editPositionBtn.innerHTML = '<i class="fa fa-check"></i> Berhasil!';
                        positionTable.ajax.reload();

                        if (!editMessageContainer.classList.contains('alert')) {
                            editMessageContainer.classList.add('alert');
                        }
                        if (editMessageContainer.classList.contains('alert-info')) {
                            editMessageContainer.classList.remove('alert-info');
                        }

                        if (editPositionNameInput.classList.contains('is-invalid')) {
                            editPositionNameInput.classList.remove('is-invalid');
                            editPositionNameFeedback.innerHTML = '';
                        }
                        if (editPositionParentInput.classList.contains('is-invalid')) {
                            editPositionParentInput.classList.remove('is-invalid');
                            editPositionParentFeedback.innerHTML = '';
                        }

                        editMessageContainer.classList.add('alert-success');
                        editMessageContainer.innerHTML = res.message;

                        $('#edit-modal').on('hidden.bs.modal', function(e) {
                            editPositionBtn.innerHTML = 'Simpan';
                            editPositionForm.reset();

                            editMessageContainer.classList.remove('alert');
                            editMessageContainer.classList.remove('alert-success');
                            editMessageContainer.innerHTML = '';
                        });
                    }
                })
                .catch(errors => {
                    editPositionBtn.innerHTML = 'Simpan';
                    editPositionBtn.removeAttribute('disabled');

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
