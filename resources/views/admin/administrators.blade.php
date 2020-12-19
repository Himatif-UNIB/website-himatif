@extends('layouts.admin')
@section('title', 'Manajemen Pengurus')

@section('custom_head')
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/plugins/@fortawesome/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/table/datatable/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/table/datatable/dt-global_style.css') }}">
    <link href="{{ asset('assets/plugins/animate/animate.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/themes/cork/css/components/custom-modal.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2/select2.min.css') }}">
@endsection

@section('content')
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing" id="cancel-row">
            <div class="col-xl-12 col-lg-12 col-sm-12 mb-3">
                <div class="widget-content widget-content-area">
                    <h3>
                        Manajemen Pengurus
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
                        <table id="administrator-table" class="table table-hover non-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Jabatan</th>
                                    <th>Divisi</th>
                                    <th>Periode</th>
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
    <div id="add-modal" tabindex="-1" class="modal animated rotateInDownLeft custo-rotateInDownLeft" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Data Pengurus</h5>
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
                        <div class="message-container alert alert-info">
                            Seorang anggota hanya bisa menempati satu posisi dalam kepengurusan dalam satu periode.
                        </div>

                        <div class="form-group" id="administrator-name-field">
                            <label for="administrator-name">Nama Pengurus:</label>
                            <select class="form-control" id="administrator-name" name="administrator-name" required></select>

                            <div class="invalid-feedback administrator-name-feedback"></div>
                        </div>
                        <div class="form-group" id="administrator-position-field">
                            <label for="administrator-position">Jabatan:</label>
                            <select class="form-control" id="administrator-position" name="administrator-position" required></select>
                        
                            <div class="invalid-feedback administrator-position-feedback"></div>
                        </div>
                        <div class="form-group" id="administrator-period-field">
                            <label for="administrator-period">Periode Kepengurusan:</label>
                            <select class="form-control" id="administrator-period" name="administrator-period" required></select>

                            <div class="invalid-feedback administrator-period-feedback"></div>
                        </div>
                    </div>
                    <div class="modal-footer md-button">
                        <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Batal</button>
                        <button type="submit" class="btn btn-primary add-administrator-btn">Tambah</button>
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
                    <h5 class="modal-title">Ubah Data Pengurus</h5>
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

                        <div class="form-group" id="edit-administrator-name-field">
                            <label for="edit-administrator-name">Nama Pengurus:</label>
                            <select class="form-control" id="edit-administrator-name" name="administrator-name" required></select>

                            <div class="invalid-feedback edit-administrator-name-feedback"></div>
                        </div>
                        <div class="form-group" id="edit-administrator-position-field">
                            <label for="edit-administrator-position">Jabatan:</label>
                            <select class="form-control" id="edit-administrator-position" name="administrator-position" required></select>
                        
                            <div class="invalid-feedback edit-administrator-position-feedback"></div>
                        </div>
                        <div class="form-group" id="edit-administrator-period-field">
                            <label for="edit-administrator-period">Periode Kepengurusan:</label>
                            <select class="form-control" id="edit-administrator-period" name="administrator-period" required></select>

                            <div class="invalid-feedback edit-administrator-period-feedback"></div>
                        </div>
                    </div>
                    <div class="modal-footer md-button">
                        <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Batal</button>
                        <button type="submit" class="btn btn-primary save-administrator-btn">Simpan</button>
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
                    <h5 class="modal-title">Hapus Pengurus?</h5>
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
                        Yakin ingin menghapus data catatan pengurus ini?
                    </div>
                </div>
                <div class="modal-footer md-button">
                    <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Batal</button>
                    <button type="submit" class="btn btn-danger btn-delete-administrator">Hapus</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('custom_js')
    <script src="{{ asset('assets/plugins/table/datatable/datatables.js') }}"></script>
    <script src="{{ asset('assets/plugins/select2/select2.min.js') }}"></script>

    <script>
        let administratorTable = $('#administrator-table').DataTable({
            ajax: {
                url: '{{ route('api.administrators.index') }}',
                headers: {
                    'Authorization': `Bearer ${passportAccessToken}`
                }
            },
            dom: '<"row"<"col-md-12"<"row"<"col-md-6"B><"col-md-6"f> > ><"col-md-12"rt> <"col-md-12"<"row"<"col-md-5"i><"col-md-7"p>>> >',
            columns: [
                {"data": "id"},
                {"data": "member.name"},
                {"data": "position.name"},
                {
                    data: function (data, row, type) {
                        return (data.division == null) ? '<span class="badge badge-info">Tidak ada divisi</span>' :
                            `<span class="badge badge-success">${data.division.name}</span>`;
                    }
                },
                {"data": "period.name"},
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

        function loadMembers(loadTo, defaultSelected = null) {
            fetch('{{ route('api.members.index') }}', {
                method: 'GET',
                headers: {
                    'Authorization': `Bearer ${passportAccessToken}`
                }
            })
                .then(res => res.json())
                .then(res => {
                    if (res.data.length > 0) {
                        while (loadTo.firstChild) {
                            loadTo.removeChild(loadTo.firstChild);
                        }

                        res.data.forEach((member) => {
                            let option = document.createElement('option');
                            option.setAttribute('value', member.id);
                            if (defaultSelected != null && defaultSelected == member.id) {
                                option.setAttribute('selected', 'selected');
                            }
                            option.innerHTML = member.name;

                            loadTo.appendChild(option);
                        });
                    }
                })
                .catch(errors => {
                    console.log(errors);
                });
        }

        function loadPositions(loadTo, defaultSelected = null) {
            fetch('{{ route('api.positions.index') }}', {
                method: 'GET',
                headers: {
                    'Authorization': `Bearer ${passportAccessToken}`
                }
            })
                .then(res => res.json())
                .then(res => {
                    if (res.data.length > 0) {
                        while (loadTo.firstChild) {
                            loadTo.removeChild(loadTo.firstChild);
                        }

                        res.data.forEach((position) => {
                            let option = document.createElement('option');
                            option.setAttribute('value', position.id);
                            if (defaultSelected != null && defaultSelected == position.id) {
                                option.setAttribute('selected', 'selected');
                            }
                            option.innerHTML = position.name;

                            loadTo.appendChild(option);
                        });
                    }
                })
                .catch(errors => {
                    console.log(errors);
                });
        }

        function loadPeriods(loadTo, defaultSelected = null) {
            fetch('{{ route('api.periods.index') }}', {
                method: 'GET',
                headers: {
                    'Authorization': `Bearer ${passportAccessToken}`
                }
            })
                .then(res => res.json())
                .then(res => {
                    if (res.data.length > 0) {
                        while (loadTo.firstChild) {
                            loadTo.removeChild(loadTo.firstChild);
                        }

                        res.data.forEach((period) => {
                            let option = document.createElement('option');
                            option.setAttribute('value', period.id);
                            if (defaultSelected != null && defaultSelected == period.id) {
                                option.setAttribute('selected', 'selected');
                            }
                            option.innerHTML = period.name;

                            loadTo.appendChild(option);
                        });
                    }
                })
                .catch(errors => {
                    console.log(errors);
                });
        }


        const addAdministratorModal = document.querySelector('#add-modal');
        const addAdministratorForm = addAdministratorModal.querySelector('form');
        const addAdministratorBtn = addAdministratorForm.querySelector('.add-administrator-btn');
        const addAdministratorNameField = addAdministratorForm.querySelector('#administrator-name-field');
        const addAdministratorPositionField = addAdministratorForm.querySelector('#administrator-position-field');
        const addAdministratorPeriodField = addAdministratorForm.querySelector('#administrator-period-field');

        const addAdministratorNameInput = addAdministratorNameField.querySelector('#administrator-name');
        const addAdministratorNameFeedback = addAdministratorNameField.querySelector('.invalid-feedback');
        const addAdministratorPositionInput = addAdministratorPositionField.querySelector('#administrator-position');
        const addAdministratorPositionFeedback = addAdministratorPositionField.querySelector('.invalid-feedback');
        const addAdministratorPeriodInput = addAdministratorPeriodField.querySelector('#administrator-period');
        const addAdministratorPeriodFeedback = addAdministratorPeriodField.querySelector('.invalid-feedback');

        const addMessageContainer = addAdministratorForm.querySelector('.message-container');

        addAdministratorForm.addEventListener('submit', function(e) {
            e.preventDefault();

            addAdministratorBtn.innerHTML = '<i class="fa fa-spin fa-spinner"></i> Menambah...';
            if (addAdministratorNameInput != '' && addAdministratorPositionInput != '') {
                addAdministratorBtn.setAttribute('disabled', 'disabled');

                fetch('{{ route('api.administrators.store') }}', {
                            method: 'POST',
                            headers: {
                                'Authorization': `Bearer ${passportAccessToken}`,
                                'Content-Type': 'application/json'
                            },
                            body: JSON.stringify({
                                member_id: addAdministratorNameInput.value,
                                position_id: addAdministratorPositionInput.value,
                                period_id: addAdministratorPeriodInput.value
                            })
                        })
                    .then(res => res.json())
                    .then(res => {
                        addAdministratorBtn.removeAttribute('disabled');

                        if (res.error) {
                            addAdministratorBtn.innerHTML = 'Tambah';

                            if (res.validations) {
                                const validation = res.validations;
                                if (validation.member_id) {
                                    addAdministratorNameInput.classList.add('is-invalid');
                                    addAdministratorNameFeedback.innerHTML = validation.member_id[0]
                                }
                                if (validation.position_id) {
                                    addAdministratorPositionInput.classList.add('is-invalid');
                                    addAdministratorPositionFeedback.innerHTML = validation.position_id[0]
                                }
                                if (validation.period_id) {
                                    addAdministratorPeriodInput.classList.add('is-invalid');
                                    addAdministratorPeriodFeedback.innerHTML = validation.period_id[0]
                                }
                            }
                        } else if (res.success) {
                            addAdministratorBtn.innerHTML = '<i class="fa fa-check"></i> Berhasil!';
                            administratorTable.ajax.reload();

                            if (!addMessageContainer.classList.contains('alert')) {
                                addMessageContainer.classList.add('alert');
                            }
                            if (addMessageContainer.classList.contains('alert-info')) {
                                addMessageContainer.classList.remove('alert-info');
                            }

                            if (addAdministratorNameInput.classList.contains('is-invalid')) {
                                addAdministratorNameInput.classList.remove('is-invalid');
                                addAdministratorNameFeedback.innerHTML = '';
                            }
                            if (addAdministratorPositionInput.classList.contains('is-invalid')) {
                                addAdministratorPositionInput.classList.remove('is-invalid');
                                addAdministratorPositionFeedback.innerHTML = '';
                            }
                            if (addAdministratorPeriodInput.classList.contains('is-invalid')) {
                                addAdministratorPeriodInput.classList.remove('is-invalid');
                                addAdministratorPeriodFeedback.innerHTML = '';
                            }

                            addMessageContainer.classList.add('alert-success');
                            addMessageContainer.innerHTML = res.message;

                            $('#add-modal').on('hidden.bs.modal', function(e) {
                                addAdministratorBtn.innerHTML = 'Tambah';
                                addAdministratorForm.reset();

                                addMessageContainer.classList.remove('alert');
                                addMessageContainer.classList.remove('alert-success');
                                addMessageContainer.innerHTML = '';
                            });
                        }
                    })
                    .catch(errors => {
                        addAdministratorBtn.innerHTML = 'Tambah';

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

        const deleteBtn = document.querySelector('.btn-delete-administrator');
        const deleteMessageContainer = document.querySelector('.delete-message-container');

        deleteBtn.addEventListener('click', function (e) {
            e.preventDefault();

            deleteBtn.setAttribute('disabled', 'disabled');
            deleteBtn.innerHTML = '<i class="fa fa-spin fa-spinner"></i> Menghapus...';
            
            fetch(`{{ route('api.administrators.destroy', false) }}/${delete_id}`, {
                method: 'DELETE',
                headers: {
                    'Authorization': `Bearer ${passportAccessToken}`
                }
            })
            .then(res => res.json())
            .then(res => {
                if (res.success) {
                    administratorTable.ajax.reload();
                    deleteMessageContainer.innerHTML = res.message;

                    deleteBtn.innerHTML = '<i class="fa fa-check"></i> Berhasil!';

                    $('#delete-modal').on('hidden.bs.modal', function(e) {
                        deleteMessageContainer.innerHTML = `Yakin ingin menghapus data catatan pengurus ini?`;

                        deleteBtn.innerHTML = 'Hapus';
                        deleteBtn.removeAttribute('disabled');
                    });
                }
                else if (res.error) {
                    deleteMessageContainer.innerHTML = res.message;

                    deleteBtn.innerHTML = 'Hapus';
                    deleteBtn.removeAttribute('disabled');

                    $('#delete-modal').on('hidden.bs.modal', function(e) {
                        deleteMessageContainer.innerHTML = ``;

                        deleteBtn.innerHTML = 'Hapus';
                        deleteBtn.removeAttribute('disabled');
                    });
                }
            })
            .catch(errors => {
                deleteMessageContainer.innerHTML = errors;
            });
        });

        const editAdministratorModal = document.querySelector('#edit-modal');
        const editAdministratorForm = editAdministratorModal.querySelector('form');
        const editAdministratorBtn = editAdministratorForm.querySelector('.save-administrator-btn');
        const editAdministratorNameField = editAdministratorForm.querySelector('#edit-administrator-name-field');
        const editAdministratorPositionField = editAdministratorForm.querySelector('#edit-administrator-position-field');
        const editAdministratorPeriodField = editAdministratorForm.querySelector('#edit-administrator-period-field');

        const editAdministratorNameInput = editAdministratorNameField.querySelector('#edit-administrator-name');
        const editAdministratorNameFeedback = editAdministratorNameField.querySelector('.invalid-feedback');
        const editAdministratorPositionInput = editAdministratorPositionField.querySelector('#edit-administrator-position');
        const editAdministratorPositionFeedback = editAdministratorPositionField.querySelector('.invalid-feedback');
        const editAdministratorPeriodInput = editAdministratorPeriodField.querySelector('#edit-administrator-period');
        const editAdministratorPeriodFeedback = editAdministratorPeriodField.querySelector('.invalid-feedback');

        const editMessageContainer = editAdministratorForm.querySelector('.message-container');
        let edit_id = 0;

        $(document).on('click', '.btn-edit', function(e) {
            e.preventDefault();

            const id = $(this).data('id');
            edit_id = id;

            fetch(`{{ route('api.administrators.show', false) }}/${id}`, {
                    headers: {
                        'Authorization': `Bearer ${passportAccessToken}`
                    }
                })
                .then(res => res.json())
                .then(res => {
                    loadMembers(document.querySelector('#edit-administrator-name'), res.member_id);
                    loadPositions(document.querySelector('#edit-administrator-position'), res.position_id);
                    loadPeriods(document.querySelector('#edit-administrator-period'), res.period_id);
                    
                    $('#edit-modal').modal('show');
                })
                .catch(errors => {
                    editMessageContainer.innerHTML = errors;
                });
        });

        editAdministratorForm.addEventListener('submit', function(e) {
            e.preventDefault();

            editAdministratorBtn.innerHTML = '<i class="fa fa-spin fa-spinner"></i> Menyimpan...';
            editAdministratorBtn.setAttribute('disabled', 'disabled');

            fetch(`{{ route('api.administrators.update', false) }}/${edit_id}`, {
                    method: 'PUT',
                    headers: {
                        'Authorization': `Bearer ${passportAccessToken}`,
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        member_id: editAdministratorNameInput.value,
                        position_id: editAdministratorPositionInput.value,
                        period_id: editAdministratorPeriodInput.value
                    })
                })
                .then(res => res.json())
                .then(res => {
                    editAdministratorBtn.removeAttribute('disabled');

                    if (res.error) {
                        editAdministratorBtn.innerHTML = 'Simpan';

                        if (res.validations) {
                            const validation = res.validations;

                            if (validation.member_id) {
                                editAdministratorNameInput.classList.add('is-invalid');
                                editAdministratorNameFeedback.innerHTML = validation.member_id[0]
                            }
                            if (validation.position_id) {
                                editAdministratorPositionInput.classList.add('is-invalid');
                                editAdministratorPositionFeedback.innerHTML = validation.position_id[0]
                            }
                            if (validation.period_id) {
                                editAdministratorPeriodInput.classList.add('is-invalid');
                                editAdministratorPeriodFeedback.innerHTML = validation.period_id[0]
                            }
                        }
                    } else if (res.success) {
                        editAdministratorBtn.innerHTML = '<i class="fa fa-check"></i> Berhasil!';
                        administratorTable.ajax.reload();

                        if (!editMessageContainer.classList.contains('alert')) {
                            editMessageContainer.classList.add('alert');
                        }
                        if (editMessageContainer.classList.contains('alert-info')) {
                            editMessageContainer.classList.remove('alert-info');
                        }

                        if (editAdministratorNameInput.classList.contains('is-invalid')) {
                            editAdministratorNameInput.classList.remove('is-invalid');
                            editAdministratorNameFeedback.innerHTML = '';
                        }
                        if (editAdministratorPositionInput.classList.contains('is-invalid')) {
                            editAdministratorPositionInput.classList.remove('is-invalid');
                            editAdministratorPositionFeedback.innerHTML = '';
                        }
                        if (editAdministratorPeriodInput.classList.contains('is-invalid')) {
                            editAdministratorPeriodInput.classList.remove('is-invalid');
                            editAdministratorPeriodFeedback.innerHTML = '';
                        }

                        editMessageContainer.classList.add('alert-success');
                        editMessageContainer.innerHTML = res.message;

                        $('#edit-modal').on('hidden.bs.modal', function(e) {
                            editAdministratorBtn.innerHTML = 'Simpan';
                            editAdministratorForm.reset();

                            editMessageContainer.classList.remove('alert');
                            editMessageContainer.classList.remove('alert-success');
                            editMessageContainer.innerHTML = '';
                        });
                    }
                })
                .catch(errors => {
                    editAdministratorBtn.innerHTML = 'Simpan';
                    editAdministratorBtn.removeAttribute('disabled');

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

        $('#add-modal').on('show.bs.modal', function () {
            loadMembers(document.querySelector('#administrator-name'));
            loadPositions(document.querySelector('#administrator-position'));
            loadPeriods(document.querySelector('#administrator-period'));
        });

        $(document).ready(function () {
            $('#administrator-name').select2({
                dropdownParent: $('#add-modal')
            });
            $('#administrator-position').select2({
                dropdownParent: $('#add-modal')
            });
            $('#administrator-period').select2({
                dropdownParent: $('#add-modal')
            });

            $('#edit-administrator-name').select2({
                dropdownParent: $('#edit-modal')
            });
            $('#edit-administrator-position').select2({
                dropdownParent: $('#edit-modal')
            });
            $('#edit-administrator-period').select2({
                dropdownParent: $('#edit-modal')
            });
        });
    </script>
@endpush