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
                        @if (current_user_can('create_staff'))
                        <span class="float-right">
                            <a href="{{ route('staff.show') }}" class="btn btn-success btn-sm"
                                data-toggle="tooltip" title="Lihat Struktur Pengurus">
                                <i class="fa fa-eye"></i>
                            </a>
                            <a href="{{ route('staff.create') }}" class="btn btn-info btn-sm"
                                data-toggle="tooltip" title="Ubah Struktur Pengurus">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="#" class="btn btn-primary btn-sm d-none" data-toggle="modal" data-target="#add-modal">
                                <i class="fa fa-plus"></i>
                            </a>
                        </span>
                        @endif
                    </h3>
                </div>
            </div>

            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                <div class="widget-content widget-content-area br-6">
                    <div class="table-responsive mb-4 mt-4">
                        <table id="staff-table" class="table table-hover non-hover" style="width:100%">
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
    @if (current_user_can('create_staff'))
    <div id="add-modal" tabindex="-1" class="modal animated rotateInDownLeft custo-rotateInDownLeft" role="dialog">
        <div class="modal-dialog modal-lg">
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

                        <div class="form-group" id="staff-name-field">
                            <label for="staff-name">Nama Pengurus:</label>
                            <select class="form-control" id="staff-name" name="staff-name" required></select>

                            <div class="invalid-feedback staff-name-feedback"></div>
                        </div>
                        <div class="row">
                            <div class="col-6 col-xs-12">
                                <div class="form-group" id="staff-position-field">
                                    <label for="staff-position">Jabatan:</label>
                                    <select class="form-control" id="staff-position" name="staff-position" required></select>
                                
                                    <div class="invalid-feedback staff-position-feedback"></div>
                                </div>
                            </div>
                            <div class="col-6 col-xs-12">
                                <div class="form-group" id="role-field">
                                    <label for="role">Role:</label>
                                    <select name="role" id="role" class="form-control" required="required">
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->name }}">{{ $role->label }}</option>
                                        @endforeach
                                    </select>
        
                                    <span class="text-muted">Pilih role yang sesuai dengan jabatan</span>
        
                                    <div class="invalid-feedback role-feedback"></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group" id="staff-period-field">
                            <label for="staff-period">Periode Kepengurusan:</label>
                            <select class="form-control" id="staff-period" name="staff-period" required></select>

                            <div class="invalid-feedback staff-period-feedback"></div>
                        </div>
                    </div>
                    <div class="modal-footer md-button">
                        <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Batal</button>
                        <button type="submit" class="btn btn-primary add-staff-btn">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endif

    @if (current_user_can('update_staff'))
    <div id="edit-modal" class="modal animated rotateInDownRight custo-rotateInDownRight" role="dialog">
        <div class="modal-dialog modal-lg">
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
                <form action="#" method="post" id="edit-form">
                    <div class="modal-body">
                        <div class="message-container"></div>

                        <div class="form-group" id="edit-staff-name-field">
                            <label for="edit-staff-name">Nama Pengurus:</label>
                            <select class="form-control" id="edit-staff-name" name="staff-name" required></select>

                            <div class="invalid-feedback edit-staff-name-feedback"></div>
                        </div>
                        <div class="row">
                            <div class="col-6 col-xs-12">
                                <div class="form-group" id="edit-staff-position-field">
                                    <label for="edit-staff-position">Jabatan:</label>
                                    <select class="form-control" id="edit-staff-position" name="staff-position" required></select>
                                
                                    <div class="invalid-feedback edit-staff-position-feedback"></div>
                                </div>
                            </div>
                            <div class="col-6 col-xs-12">
                                <div class="form-group" id="edit-role-field">
                                    <label for="edit-role">Role:</label>
                                    <select name="role" id="edit-role" class="form-control" required="required">
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->name }}" class="{{ $role->name }}">{{ $role->label }}</option>
                                        @endforeach
                                    </select>
        
                                    <span class="text-muted">Pilih role yang sesuai dengan jabatan</span>
        
                                    <div class="invalid-feedback role-feedback"></div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group" id="edit-staff-period-field">
                            <label for="edit-staff-period">Periode Kepengurusan:</label>
                            <select class="form-control" id="edit-staff-period" name="staff-period" required></select>

                            <div class="invalid-feedback edit-staff-period-feedback"></div>
                        </div>
                    </div>
                    <div class="modal-footer md-button">
                        <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Batal</button>
                        <button type="submit" class="btn btn-primary save-staff-btn">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endif

    @if (current_user_can('delete_staff'))
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
                    <button type="submit" class="btn btn-danger btn-delete-staff">Hapus</button>
                </div>
            </div>
        </div>
    </div>
    @endif
@endsection

@push('custom_js')
    <script src="{{ asset('assets/plugins/table/datatable/datatables.js') }}"></script>
    <script src="{{ asset('assets/plugins/select2/select2.min.js') }}"></script>

    <script>
        let staffTable = $('#staff-table').DataTable({
            ajax: {
                url: '{{ route('api.staffs.index') }}',
                headers: {
                    'Authorization': `Bearer ${passportAccessToken}`
                }
            },
            dom: '<"row"<"col-md-12"<"row"<"col-md-6"l><"col-md-6"f> > ><"col-md-12"rt> <"col-md-12"<"row"<"col-md-5"i><"col-md-7"p>>> >',
            columns: [
                {"data": "id"},
                {
                    data: function (data, row, type) {
                        return (data.user.member == null) ? data.user.name : data.user.member.name;
                    }
                },
                {"data": "position.name"},
                {
                    data: function (data, row, type) {
                        return (data.position.division == null) ? '<span class="badge badge-info">Tidak ada divisi</span>' :
                            `<span class="badge badge-success">${data.position.division.name}</span>`;
                    }
                },
                {"data": "period.name"},
                {
                    data: function(data, row, type) {
                        return `
                                    <div class="text-right">
                                        @if (current_user_can('update_staff'))
                                            <a href="#" class="btn btn-warning btn-sm btn-edit" data-id="${data.id}"><i class="fa fa-edit"></i></a>
                                        @endif
                                        @if (current_user_can('delete_staff'))
                                            <a href="#" class="btn btn-danger btn-sm btn-delete" data-id="${data.id}"><i class="fa fa-trash"></i></a>
                                        @endif
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
            fetch('{{ route('api.users.index') }}', {
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

                        res.data.forEach((user) => {
                            let option = document.createElement('option');
                            option.setAttribute('value', user.id);
                            if (defaultSelected != null && defaultSelected == user.id) {
                                option.setAttribute('selected', 'selected');
                            }
                            option.innerHTML = (user.member == null) ? user.name : `${user.name} (${user.member.npm})`;

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
                            if (defaultSelected != null && defaultSelected == period.id
                                || period.is_active) {
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

        @if (current_user_can('create_staff'))
        const addStaffModal = document.querySelector('#add-modal');
        const addStaffForm = addStaffModal.querySelector('form');
        const addStaffBtn = addStaffForm.querySelector('.add-staff-btn');
        const addStaffNameField = addStaffForm.querySelector('#staff-name-field');
        const addRoleField = addStaffForm.querySelector('#role-field');
        const addStaffPositionField = addStaffForm.querySelector('#staff-position-field');
        const addStaffPeriodField = addStaffForm.querySelector('#staff-period-field');

        const addStaffNameInput = addStaffNameField.querySelector('#staff-name');
        const addStaffNameFeedback = addStaffNameField.querySelector('.invalid-feedback');
        const addRoleInput = addRoleField.querySelector('#role');
        const addRoleFeedback = addRoleField.querySelector('.invalid-feedback');
        const addStaffPositionInput = addStaffPositionField.querySelector('#staff-position');
        const addStaffPositionFeedback = addStaffPositionField.querySelector('.invalid-feedback');
        const addStaffPeriodInput = addStaffPeriodField.querySelector('#staff-period');
        const addStaffPeriodFeedback = addStaffPeriodField.querySelector('.invalid-feedback');

        const addMessageContainer = addStaffForm.querySelector('.message-container');

        addStaffForm.addEventListener('submit', function(e) {
            e.preventDefault();

            addStaffBtn.innerHTML = '<i class="fa fa-spin fa-spinner"></i> Menambah...';
            if (addStaffNameInput != '' && addStaffPositionInput != '') {
                addStaffBtn.setAttribute('disabled', 'disabled');

                fetch('{{ route('api.staffs.store') }}', {
                            method: 'POST',
                            headers: {
                                'Authorization': `Bearer ${passportAccessToken}`,
                                'Content-Type': 'application/json'
                            },
                            body: JSON.stringify({
                                user_id: addStaffNameInput.value,
                                position_id: addStaffPositionInput.value,
                                period_id: addStaffPeriodInput.value,
                                role: addRoleInput.value
                            })
                        })
                    .then(res => res.json())
                    .then(res => {
                        addStaffBtn.removeAttribute('disabled');

                        if (res.error) {
                            addStaffBtn.innerHTML = 'Tambah';

                            if (res.validations) {
                                const validation = res.validations;
                                if (validation.user_id) {
                                    addStaffNameInput.classList.add('is-invalid');
                                    addStaffNameFeedback.innerHTML = validation.user_id[0]
                                }
                                if (validation.position_id) {
                                    addStaffPositionInput.classList.add('is-invalid');
                                    addStaffPositionFeedback.innerHTML = validation.position_id[0]
                                }
                                if (validation.period_id) {
                                    addStaffPeriodInput.classList.add('is-invalid');
                                    addStaffPeriodFeedback.innerHTML = validation.period_id[0]
                                }
                            }
                        } else if (res.success) {
                            addStaffBtn.innerHTML = '<i class="fa fa-check"></i> Berhasil!';
                            staffTable.ajax.reload();

                            if (!addMessageContainer.classList.contains('alert')) {
                                addMessageContainer.classList.add('alert');
                            }
                            if (addMessageContainer.classList.contains('alert-info')) {
                                addMessageContainer.classList.remove('alert-info');
                            }

                            if (addStaffNameInput.classList.contains('is-invalid')) {
                                addStaffNameInput.classList.remove('is-invalid');
                                addStaffNameFeedback.innerHTML = '';
                            }
                            if (addStaffPositionInput.classList.contains('is-invalid')) {
                                addStaffPositionInput.classList.remove('is-invalid');
                                addStaffPositionFeedback.innerHTML = '';
                            }
                            if (addStaffPeriodInput.classList.contains('is-invalid')) {
                                addStaffPeriodInput.classList.remove('is-invalid');
                                addStaffPeriodFeedback.innerHTML = '';
                            }

                            addMessageContainer.classList.add('alert-success');
                            addMessageContainer.innerHTML = res.message;

                            $('#add-modal').on('hidden.bs.modal', function(e) {
                                addStaffBtn.innerHTML = 'Tambah';
                                addStaffForm.reset();

                                addMessageContainer.classList.remove('alert');
                                addMessageContainer.classList.remove('alert-success');
                                addMessageContainer.innerHTML = '';
                            });
                        }
                    })
                    .catch(errors => {
                        addStaffBtn.innerHTML = 'Tambah';
                        addPositionBtn.removeAttribute('disabled');

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
        @endif

        @if (current_user_can('delete_staff'))
        let delete_id = 0;
        $(document).on('click', '.btn-delete', function (e) {
            e.preventDefault();

            const id = $(this).data('id');
            delete_id = id;

            $('#delete-modal').modal('show');
        });

        const deleteBtn = document.querySelector('.btn-delete-staff');
        const deleteMessageContainer = document.querySelector('.delete-message-container');

        deleteBtn.addEventListener('click', function (e) {
            e.preventDefault();

            deleteBtn.setAttribute('disabled', 'disabled');
            deleteBtn.innerHTML = '<i class="fa fa-spin fa-spinner"></i> Menghapus...';
            
            fetch(`{{ route('api.staffs.destroy', false) }}/${delete_id}`, {
                method: 'DELETE',
                headers: {
                    'Authorization': `Bearer ${passportAccessToken}`
                }
            })
            .then(res => res.json())
            .then(res => {
                if (res.success) {
                    staffTable.ajax.reload();
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
        @endif

        @if (current_user_can('update_staff'))
        const editStaffModal = document.querySelector('#edit-modal');
        const editStaffForm = editStaffModal.querySelector('form');
        const editStaffBtn = editStaffForm.querySelector('.save-staff-btn');
        const editStaffNameField = editStaffForm.querySelector('#edit-staff-name-field');
        const editRoleField = editStaffForm.querySelector('#edit-role-field');
        const editStaffPositionField = editStaffForm.querySelector('#edit-staff-position-field');
        const editStaffPeriodField = editStaffForm.querySelector('#edit-staff-period-field');

        const editStaffNameInput = editStaffNameField.querySelector('#edit-staff-name');
        const editStaffNameFeedback = editStaffNameField.querySelector('.invalid-feedback');
        const editRoleInput = editRoleField.querySelector('#edit-role');
        const editRoleFeedback = editRoleField.querySelector('.invalid-feedback');
        const editStaffPositionInput = editStaffPositionField.querySelector('#edit-staff-position');
        const editStaffPositionFeedback = editStaffPositionField.querySelector('.invalid-feedback');
        const editStaffPeriodInput = editStaffPeriodField.querySelector('#edit-staff-period');
        const editStaffPeriodFeedback = editStaffPeriodField.querySelector('.invalid-feedback');

        const editMessageContainer = editStaffForm.querySelector('.message-container');
        let edit_id = 0;

        $(document).on('click', '.btn-edit', function(e) {
            e.preventDefault();

            const id = $(this).data('id');
            edit_id = id;

            $(this).html('<i class="fa fa-spin fa-spinner"></i>');

            fetch(`{{ route('api.staffs.show', false) }}/${id}`, {
                    headers: {
                        'Authorization': `Bearer ${passportAccessToken}`
                    }
                })
                .then(res => res.json())
                .then(res => {
                    loadMembers(document.querySelector('#edit-staff-name'), res.user_id);
                    loadPositions(document.querySelector('#edit-staff-position'), res.position_id);
                    loadPeriods(document.querySelector('#edit-staff-period'), res.period_id);

                    $('#edit-form #role option').removeAttr('selected');
                    $('#edit-form #role .'+ res.role).attr('selected', 'selected');

                    $(this).html('<i class="fa fa-edit"></i>');

                    $('#edit-modal').modal('show');
                })
                .catch(errors => {
                    editMessageContainer.innerHTML = errors;
                });
        });

        editStaffForm.addEventListener('submit', function(e) {
            e.preventDefault();

            editStaffBtn.innerHTML = '<i class="fa fa-spin fa-spinner"></i> Menyimpan...';
            editStaffBtn.setAttribute('disabled', 'disabled');

            fetch(`{{ route('api.staffs.update', false) }}/${edit_id}`, {
                    method: 'PUT',
                    headers: {
                        'Authorization': `Bearer ${passportAccessToken}`,
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        user_id: editStaffNameInput.value,
                        position_id: editStaffPositionInput.value,
                        period_id: editStaffPeriodInput.value,
                        role: editRoleInput.value
                    })
                })
                .then(res => res.json())
                .then(res => {
                    editStaffBtn.removeAttribute('disabled');

                    if (res.error) {
                        editStaffBtn.innerHTML = 'Simpan';

                        if (res.validations) {
                            const validation = res.validations;

                            if (validation.user_id) {
                                editStaffNameInput.classList.add('is-invalid');
                                editStaffNameFeedback.innerHTML = validation.user_id[0]
                            }
                            if (validation.position_id) {
                                editStaffPositionInput.classList.add('is-invalid');
                                editStaffPositionFeedback.innerHTML = validation.position_id[0]
                            }
                            if (validation.period_id) {
                                editStaffPeriodInput.classList.add('is-invalid');
                                editStaffPeriodFeedback.innerHTML = validation.period_id[0]
                            }
                        }
                    } else if (res.success) {
                        editStaffBtn.innerHTML = '<i class="fa fa-check"></i> Berhasil!';
                        staffTable.ajax.reload();

                        if (!editMessageContainer.classList.contains('alert')) {
                            editMessageContainer.classList.add('alert');
                        }
                        if (editMessageContainer.classList.contains('alert-info')) {
                            editMessageContainer.classList.remove('alert-info');
                        }

                        if (editStaffNameInput.classList.contains('is-invalid')) {
                            editStaffNameInput.classList.remove('is-invalid');
                            editStaffNameFeedback.innerHTML = '';
                        }
                        if (editStaffPositionInput.classList.contains('is-invalid')) {
                            editStaffPositionInput.classList.remove('is-invalid');
                            editStaffPositionFeedback.innerHTML = '';
                        }
                        if (editStaffPeriodInput.classList.contains('is-invalid')) {
                            editStaffPeriodInput.classList.remove('is-invalid');
                            editStaffPeriodFeedback.innerHTML = '';
                        }

                        editMessageContainer.classList.add('alert-success');
                        editMessageContainer.innerHTML = res.message;

                        $('#edit-modal').on('hidden.bs.modal', function(e) {
                            editStaffBtn.innerHTML = 'Simpan';
                            editStaffForm.reset();

                            editMessageContainer.classList.remove('alert');
                            editMessageContainer.classList.remove('alert-success');
                            editMessageContainer.innerHTML = '';
                        });
                    }
                })
                .catch(errors => {
                    editStaffBtn.innerHTML = 'Simpan';
                    editStaffBtn.removeAttribute('disabled');

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
        @endif

        @if (current_user_can('create_staff'))
        $('#add-modal').on('show.bs.modal', function () {
            loadMembers(document.querySelector('#staff-name'));
            loadPositions(document.querySelector('#staff-position'));
            loadPeriods(document.querySelector('#staff-period'));
        });
        @endif

        @if (current_user_can(['create_staff', 'update_staff']))
        $(document).ready(function () {
            @if (current_user_can('create_staff'))
            $('#staff-name').select2({
                dropdownParent: $('#add-modal')
            });
            $('#staff-position').select2({
                dropdownParent: $('#add-modal')
            });
            $('#staff-period').select2({
                dropdownParent: $('#add-modal')
            });
            @endif

            @if (current_user_can('update_staff'))
            $('#edit-staff-name').select2({
                dropdownParent: $('#edit-modal')
            });
            $('#edit-staff-position').select2({
                dropdownParent: $('#edit-modal')
            });
            $('#edit-staff-period').select2({
                dropdownParent: $('#edit-modal')
            });
            @endif
        });
        @endif
    </script>
@endpush