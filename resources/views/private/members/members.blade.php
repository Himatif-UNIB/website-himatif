@extends('layouts.admin')
@section('title', 'Manajemen Anggota')

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
                        Manajemen Anggota
                        <span class="float-right">
                            @if (current_user_can('read_member'))
                            <a href="{{ route('members.export') }}" class="btn btn-info btn-sm" data-toggle="tooltip" title="Ekspor ke Excel">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-upload">
                                    <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                                    <polyline points="17 8 12 3 7 8"></polyline>
                                    <line x1="12" y1="3" x2="12" y2="15"></line>
                                </svg>
                            </a>
                            @endif
                            @if (current_user_can('create_member'))
                            <a href="#" class="btn btn-info btn-sm import-btn" data-toggle="tooltip" data-placement="top" title="Impor dari Excel">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-download">
                                    <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                                    <polyline points="7 10 12 15 17 10"></polyline>
                                    <line x1="12" y1="15" x2="12" y2="3"></line>
                                </svg>
                            </a>
                            @endif
                            @if (current_user_can('create_member'))
                            <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#add-modal">
                                <i class="fa fa-plus"></i>
                            </a>
                            @endif
                        </span>
                    </h3>
                </div>
            </div>

            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                <div class="widget-content widget-content-area br-6">
                    <div class="table-responsive mb-4 mt-4">
                        <table id="member-table" class="table table-hover non-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th>NPM</th>
                                    <th>Nama</th>
                                    <th>Angkatan</th>
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
    @if (current_user_can('create_member'))
    <div id="add-modal" class="modal animated rotateInDownLeft custo-rotateInDownLeft" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Data Anggota</h5>
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

                        <div class="form-group" id="member-name-field">
                            <label for="member-name">Nama:</label>
                            <input type="text" class="form-control" id="member-name" name="member-name" required>

                            <div class="invalid-feedback member-name-feedback"></div>
                        </div>
                        <div class="form-group" id="member-npm-field">
                            <label for="member-npm">NPM:</label>
                            <input type="text" class="form-control" id="member-npm" name="member-npm" required>

                            <div class="invalid-feedback member-npm-feedback"></div>
                        </div>
                        <div class="form-group" id="member-force-field">
                            <label for="member-force">Angkatan:</label>
                            <select class="form-control" id="member-force" name="member-force" required></select>

                            <div class="invalid-feedback member-force-feedback"></div>
                        </div>
                    </div>
                    <div class="modal-footer md-button">
                        <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Batal</button>
                        <button type="submit" class="btn btn-primary add-member-btn">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endif

    @if (current_user_can('update_member'))
    <div id="edit-modal" class="modal animated rotateInDownRight custo-rotateInDownRight" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Ubah Data Anggota</h5>
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

                        <div class="form-group" id="edit-member-name-field">
                            <label for="edit-member-name">Nama Anggota:</label>
                            <input type="text" class="form-control" id="edit-member-name" name="member-name" required>

                            <div class="invalid-feedback member-name-feedback"></div>
                        </div>
                        <div class="form-group" id="edit-member-npm-field">
                            <label for="edit-member-npm">NPM:</label>
                            <input type="text" class="form-control" id="edit-member-npm" name="edit-member-npm" required>

                            <div class="invalid-feedback member-npm-feedback"></div>
                        </div>
                        <div class="form-group" id="edit-member-force-field">
                            <label for="edit-member-force">Angkatan:</label>
                            <select class="form-control" id="edit-member-force" name="edit-member-force" required></select>

                            <div class="invalid-feedback member-force-feedback"></div>
                        </div>
                    </div>
                    <div class="modal-footer md-button">
                        <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Batal</button>
                        <button type="submit" class="btn btn-primary save-member-btn">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endif

    @if (current_user_can('delete_member'))
    <div id="delete-modal" class="modal fade in" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Hapus Anggota?</h5>
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
                        Yakin ingin menghapus data anggota?
                    </div>
                </div>
                <div class="modal-footer md-button">
                    <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Batal</button>
                    <button type="submit" class="btn btn-danger btn-delete-member">Hapus</button>
                </div>
            </div>
        </div>
    </div>
    @endif

    @if (current_user_can('create_member'))
    <div id="import-modal" class="modal fade in" role="dialog">
        <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Impor Data Anggota</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-x">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg>
                    </button>
                </div>
                <form action="#" method="post" enctype="multipart/form-data" id="import-form">
                    <div class="modal-body">
                        <div class="import-message-container"></div>

                        <div>
                            Pilih sebuah berkas <b>Microsoft Excel</b> untuk mengimpor data anggota secara cepat.
                            <br>
                            File yang akan diimpor harus sesuai dengan contoh <i>template berikut</i>.
                        </div>
    
                        <div class="text-center mt-2 mb-3">
                            <a href="{{ asset('uploads/template-import-anggota.xlsx') }}"
                                class="btn btn-info btn-sm">Download Template</a>
                        </div>
    
                        <div>
                            <ol>
                                <li>
                                    Jika data NPM yang diimpor sudah terdaftar, maka data baru akan diabaikan.
                                    Misalnya jika NPM <b>G1A019001</b> sudah ada di <i>database</i>, maka data
                                    dalam Excel dengan NPM <b>G1A019001</b> akan diabaikan.
                                </li>
                                <li>
                                    Dalam sekali impor hanya bisa mengimpor untuk satu angkatan saja.
                                </li>
                            </ol>
                        </div>
    
                        <div class="form-group" id="import-file-field">
                            <label for="select-file">Pilih File:</label>
                            <input type="file" name="file" id="select-file" class="form-control" required="required">

                            <div class="invalid-feedback import-file-feedback"></div>
                        </div>
                        <div class="form-group" id="force-field">
                            <label for="force">Angkatan:</label>
                            <select name="force" id="force" class="form-control">
                                @foreach ($forces as $force)
                                    <option value="{{ $force->id }}">{{ $force->name }}</option>
                                @endforeach
                            </select>

                            <div class="invalid-feedback force-feedback"></div>
                        </div>
    
                        <div class="alert alert-info">
                            Proses impor akan membutuhkan beberapa waktu, jangan tutup <i>pop up</i> ini sebelum proses impor selesai.
                        </div>

                        <div class="alert alert-info">
                            Setiap anggota yang baru diimport akan mendapatkan akun baru dengan data login:
                            <br>
                            Username: <b>NPM yang digunakan</b>
                            <br>
                            Password: <b>12345678</b>
                            <br><br>
                            <b>Note:</b> User dapat mengganti password melalui dasbor.
                        </div>
                    </div>
                    <div class="modal-footer md-button">
                        <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Batal</button>
                        <button type="submit" class="btn btn-primary btn-import-member">Mulai Impor</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endif
@endsection

@push('custom_js')
<script src="{{ asset('assets/plugins/table/datatable/datatables.js') }}"></script>
    <script>
        @if (current_user_can('create_member'))
        let importModalBtn = document.querySelector('.import-btn');
        importModalBtn.addEventListener('click', (e) => {
            e.preventDefault();

            $('#import-modal').modal({
                backdrop: 'static',
                keyboard: false
            });
        });
        @endif

        function loadForces(loadTo, defaultSelected = null) {
            fetch('{{ route('api.forces.index') }}', {
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

                        res.data.forEach((force) => {
                            let forceOption = document.createElement('option');
                            forceOption.setAttribute('value', force.id);
                            if (defaultSelected != null && defaultSelected == force.id) {
                                forceOption.setAttribute('selected', 'selected');
                            }
                            forceOption.classList.add(`force-${force.id}`);
                            forceOption.innerHTML = `${force.name} ${force.year}`;

                            loadTo.appendChild(forceOption);
                        });
                    }
                })
                .catch(errors => {
                    console.log(errors);
                });
        }

        let memberTable = $('#member-table').DataTable({
            ajax: {
                url: '{{ route('api.members.index') }}',
                headers: {
                    'Authorization': `Bearer ${passportAccessToken}`
                }
            },
            dom: '<"row"<"col-md-12"<"row"<"col-md-6"l><"col-md-6"f> > ><"col-md-12"rt> <"col-md-12"<"row"<"col-md-5"i><"col-md-7"p>>> >',
            columns: [
                {"data": "npm"},
                {
                    data: function (data, row, type) {
                        return `<a href="{{ route('members.show', false) }}/${data.id}" target="_blank">${data.name}</a>`;
                    }
                },
                {
                    "data": function (data, type, row) {
                        return (data.force_id == null) ? '-' : `${data.force.name} ${data.force.year}`;
                    }
                },
                {
                    data: function(data, row, type) {
                        return `
                                    <div class="text-right">
                                        @if (current_user_can('update_member'))
                                            <a href="#" class="btn btn-warning btn-sm btn-edit" data-id="${data.id}"><i class="fa fa-edit"></i></a>
                                        @endif
                                        @if (current_user_can('delete_member'))
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

        @if (current_user_can('create_member'))
        const addMemberModal = document.querySelector('#add-modal');
        const addMemberForm = addMemberModal.querySelector('form');
        const addMemberBtn = addMemberForm.querySelector('.add-member-btn');
        const addMemberNameField = addMemberForm.querySelector('#member-name-field');
        const addMemberNPMField = addMemberForm.querySelector('#member-npm-field');
        const addMemberForceField = addMemberForm.querySelector('#member-force-field');

        const addMemberNameInput = addMemberNameField.querySelector('#member-name');
        const addMemberNameFeedback = addMemberNameField.querySelector('.invalid-feedback');
        const addMemberNPMInput = addMemberNPMField.querySelector('#member-npm');
        const addMemberNPMFeedback = addMemberNPMField.querySelector('.invalid-feedback');
        const addMemberForceInput = addMemberForceField.querySelector('#member-force');
        const addMemberForceFeedback = addMemberForceField.querySelector('.invalid-feedback');

        const addMessageContainer = addMemberForm.querySelector('.message-container');

        addMemberForm.addEventListener('submit', function(e) {
            e.preventDefault();

            addMemberBtn.innerHTML = '<i class="fa fa-spin fa-spinner"></i> Menambah...';
            if (addMemberNameInput != '' && addMemberNPMInput != '') {
                addMemberBtn.setAttribute('disabled', 'disabled');

                fetch('{{ route('api.members.store') }}', {
                            method: 'POST',
                            headers: {
                                'Authorization': `Bearer ${passportAccessToken}`,
                                'Content-Type': 'application/json'
                            },
                            body: JSON.stringify({
                                name: addMemberNameInput.value,
                                npm: addMemberNPMInput.value,
                                force_id: addMemberForceInput.value
                            })
                        })
                    .then(res => res.json())
                    .then(res => {
                        addMemberBtn.removeAttribute('disabled');

                        if (res.error) {
                            addMemberBtn.innerHTML = 'Tambah';

                            if (res.validations) {
                                const validation = res.validations;
                                if (validation.name) {
                                    addMemberNameInput.classList.add('is-invalid');
                                    addMemberNameFeedback.innerHTML = validation.name[0]
                                }
                                if (validation.npm) {
                                    addMemberNPMInput.classList.add('is-invalid');
                                    addMemberNPMFeedback.innerHTML = validation.npm[0]
                                }
                                if (validation.force_id) {
                                    addMemberForceInput.classList.add('is-invalid');
                                    addMemberForceFeedback.innerHTML = validation.npm[0]
                                }
                            }
                        } else if (res.success) {
                            addMemberBtn.innerHTML = '<i class="fa fa-check"></i> Berhasil!';
                            memberTable.ajax.reload();

                            if (!addMessageContainer.classList.contains('alert')) {
                                addMessageContainer.classList.add('alert');
                            }
                            if (addMessageContainer.classList.contains('alert-info')) {
                                addMessageContainer.classList.remove('alert-info');
                            }

                            if (addMemberNameInput.classList.contains('is-invalid')) {
                                addMemberNameInput.classList.remove('is-invalid');
                                addMemberNameFeedback.innerHTML = '';
                            }
                            if (addMemberNPMInput.classList.contains('is-invalid')) {
                                addMemberNPMInput.classList.remove('is-invalid');
                                addMemberNPMFeedback.innerHTML = '';
                            }
                            if (addMemberForceInput.classList.contains('is-invalid')) {
                                addMemberForceInput.classList.remove('is-invalid');
                                addMemberForceFeedback.innerHTML = '';
                            }

                            addMessageContainer.classList.add('alert-success');
                            addMessageContainer.innerHTML = res.message;

                            $('#add-modal').on('hidden.bs.modal', function(e) {
                                addMemberBtn.innerHTML = 'Tambah';
                                addMemberForm.reset();

                                addMessageContainer.classList.remove('alert');
                                addMessageContainer.classList.remove('alert-success');
                                addMessageContainer.innerHTML = '';
                            });
                        }
                    })
                    .catch(errors => {
                        addMemberBtn.innerHTML = 'Tambah';
                        addMemberBtn.removeAttribute('disabled');

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

        @if (current_user_can('delete_member'))
        let delete_id = 0;
        $(document).on('click', '.btn-delete', function (e) {
            e.preventDefault();

            const id = $(this).data('id');
            delete_id = id;

            $('#delete-modal').modal('show');
        });

        const deleteBtn = document.querySelector('.btn-delete-member');
        const deleteMessageContainer = document.querySelector('.delete-message-container');

        deleteBtn.addEventListener('click', function (e) {
            e.preventDefault();

            deleteBtn.setAttribute('disabled', 'disabled');
            deleteBtn.innerHTML = '<i class="fa fa-spin fa-spinner"></i> Menghapus...';
            
            fetch(`{{ route('api.members.destroy', false) }}/${delete_id}`, {
                method: 'DELETE',
                headers: {
                    'Authorization': `Bearer ${passportAccessToken}`
                }
            })
            .then(res => res.json())
            .then(res => {
                if (res.success) {
                    memberTable.ajax.reload();
                    deleteMessageContainer.innerHTML = res.message;

                    deleteBtn.innerHTML = '<i class="fa fa-check"></i> Berhasil!';

                    $('#delete-modal').on('hidden.bs.modal', function(e) {
                        deleteMessageContainer.innerHTML = `Yakin ingin menghapus data anggota?`;

                        deleteBtn.innerHTML = 'Hapus';
                        deleteBtn.removeAttribute('disabled');
                    });
                }
                else if (res.error) {
                    deleteMessageContainer.innerHTML = res.message;

                    deleteBtn.innerHTML = 'Hapus';
                    deleteBtn.removeAttribute('disabled');

                    $('#delete-modal').on('hidden.bs.modal', function(e) {
                        deleteMessageContainer.innerHTML = `Yakin ingin menghapus data anggota?`;

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

        @if (current_user_can('update_member'))
        const editMemberModal = document.querySelector('#edit-modal');
        const editMemberForm = editMemberModal.querySelector('form');
        const editMemberBtn = editMemberForm.querySelector('.save-member-btn');
        const editMemberNameField = editMemberForm.querySelector('#edit-member-name-field');
        const editMemberNPMField = editMemberForm.querySelector('#edit-member-npm-field');
        const editMemberForceField = editMemberForm.querySelector('#edit-member-force-field');

        const editMemberNameInput = editMemberNameField.querySelector('#edit-member-name');
        const editMemberNameFeedback = editMemberNameField.querySelector('.invalid-feedback');
        const editMemberNPMInput = editMemberNPMField.querySelector('#edit-member-npm');
        const editMemberNPMFeedback = editMemberNPMField.querySelector('.invalid-feedback');
        const editMemberForceInput = editMemberForceField.querySelector('#edit-member-force');
        const editMemberForceFeedback = editMemberForceField.querySelector('.invalid-feedback');

        const editMessageContainer = editMemberForm.querySelector('.message-container');
        let edit_id = 0;

        $(document).on('click', '.btn-edit', function(e) {
            e.preventDefault();

            const id = $(this).data('id');
            edit_id = id;

            fetch(`{{ route('api.members.show', false) }}/${id}`, {
                    headers: {
                        'Authorization': `Bearer ${passportAccessToken}`
                    }
                })
                .then(res => res.json())
                .then(res => {
                    editMemberNameInput.value = res.name;
                    editMemberNPMInput.value = res.npm;

                    loadForces(document.querySelector('#edit-member-force'), res.force_id);
                    
                    $('#edit-modal').modal('show');
                })
                .catch(errors => {
                    editMessageContainer.innerHTML = errors;
                });
        });

        editMemberForm.addEventListener('submit', function(e) {
            e.preventDefault();

            editMemberBtn.innerHTML = '<i class="fa fa-spin fa-spinner"></i> Menyimpan...';
            editMemberBtn.setAttribute('disabled', 'disabled');

            fetch(`{{ route('api.members.update', false) }}/${edit_id}`, {
                    method: 'PUT',
                    headers: {
                        'Authorization': `Bearer ${passportAccessToken}`,
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        name: editMemberNameInput.value,
                        npm: editMemberNPMInput.value,
                        force_id: editMemberForceInput.value
                    })
                })
                .then(res => res.json())
                .then(res => {
                    editMemberBtn.removeAttribute('disabled');

                    if (res.error) {
                        editMemberBtn.innerHTML = 'Simpan';

                        if (res.validations) {
                            const validation = res.validations;
                            if (validation.name) {
                                editMemberNameInput.classList.add('is-invalid');
                                editMemberNameFeedback.innerHTML = validation.name[0]
                            }
                            if (validation.npm) {
                                editMemberNPMInput.classList.add('is-invalid');
                                editMemberNPMFeedback.innerHTML = validation.npm[0]
                            }
                            if (validation.force_id) {
                                editMemberForceInput.classList.add('is-invalid');
                                editMemberForceFeedback.innerHTML = validation.force_id[0]
                            }
                            
                        }
                    } else if (res.success) {
                        editMemberBtn.innerHTML = '<i class="fa fa-check"></i> Berhasil!';
                        memberTable.ajax.reload();

                        if (!editMessageContainer.classList.contains('alert')) {
                            editMessageContainer.classList.add('alert');
                        }
                        if (editMessageContainer.classList.contains('alert-info')) {
                            editMessageContainer.classList.remove('alert-info');
                        }

                        if (editMemberNameInput.classList.contains('is-invalid')) {
                            editMemberNameInput.classList.remove('is-invalid');
                            editMemberNameFeedback.innerHTML = '';
                        }
                        if (editMemberNPMInput.classList.contains('is-invalid')) {
                            editMemberNPMInput.classList.remove('is-invalid');
                            editMemberNPMFeedback.innerHTML = '';
                        }
                        if (editMemberForceInput.classList.contains('is-invalid')) {
                            editMemberForceInput.classList.remove('is-invalid');
                            editMemberForceFeedback.innerHTML = '';
                        }

                        editMessageContainer.classList.add('alert-success');
                        editMessageContainer.innerHTML = res.message;

                        $('#edit-modal').on('hidden.bs.modal', function(e) {
                            editMemberBtn.innerHTML = 'Simpan';
                            editMemberForm.reset();

                            editMessageContainer.classList.remove('alert');
                            editMessageContainer.classList.remove('alert-success');
                            editMessageContainer.innerHTML = '';
                        });
                    }
                })
                .catch(errors => {
                    editMemberBtn.innerHTML = 'Simpan';
                    editMemberBtn.removeAttribute('disabled');

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

        @if (current_user_can('create_member'))
        $('#add-modal').on('show.bs.modal', function () {
            loadForces(document.querySelector('#member-force'));
        });

        let importForm = document.querySelector('#import-form');
        let importFileField = importForm.querySelector('#import-file-field');
        let importFileInput = importFileField.querySelector('#select-file');
        let importFileFeedback =  importFileField.querySelector('.invalid-feedback');
        let importForceField = importForm.querySelector('#force-field');
        let importForceInput = importForceField.querySelector('#force');
        let importForceFeedback =  importForceField.querySelector('.invalid-feedback');
        let importBtn = importForm.querySelector('.btn-import-member');

        let importMessageContainer = importForm.querySelector('.import-message-container');

        importForm.addEventListener('submit', function (e) {
            e.preventDefault();

            importBtn.innerHTML = '<i class="fa fa-spin fa-spinner"></i> Mengimpor file...';
            importBtn.setAttribute('disabled', 'disabled');

            const memberFile = new FormData();
            memberFile.append('file', importFileInput.files[0]);
            memberFile.append('force_id', importForceInput.value);

            fetch('{{ route('api.members.import') }}', {
                method: 'POST',
                headers: {
                    'Authorization': `Bearer ${passportAccessToken}`
                },
                body: memberFile
            })
                .then(res => res.json())
                .then(res => {
                    if (res.error) {
                        importBtn.innerHTML = 'Impor';
                        importBtn.removeAttribute('disabled');

                        if (res.validations) {
                            const validation = res.validations;

                            if (validation.file) {
                                importFileInput.classList.add('is-invalid');
                                importFileFeedback.innerHTML = validation.file[0]
                            }
                        }
                    }
                    else if (res.success) {
                        importBtn.innerHTML = '<i class="fa fa-check"></i> Berhasil!';
                        memberTable.ajax.reload();

                        if ( ! importMessageContainer.classList.contains('alert')) {
                            importMessageContainer.classList.add('alert');
                        }
                        if ( ! importMessageContainer.classList.contains('alert-success')) {
                            importMessageContainer.classList.add('alert-success');
                        }
                        if (importMessageContainer.classList.contains('alert-danger')) {
                            importMessageContainer.classList.remove('alert-danger');
                        }

                        importMessageContainer.innerHTML = res.message;

                        $('#import-modal').on('hidden.bs.modal', function () {
                            if (importMessageContainer.classList.contains('alert')) {
                                importMessageContainer.classList.remove('alert');
                            }
                            if (importMessageContainer.classList.contains('alert-success')) {
                                importMessageContainer.classList.remove('alert-success');
                            }
                            if (importMessageContainer.classList.contains('alert-danger')) {
                                importMessageContainer.classList.remove('alert-danger');
                            }

                            importForm.reset();

                            importMessageContainer.innerHTML = '';
                            importBtn.innerHTML = 'Mulai mengimpor';
                            importBtn.removeAttribute('disabled');
                        });
                    }
                })
                .catch(errors => {
                    if ( ! importMessageContainer.classList.contains('alert')) {
                        importMessageContainer.classList.add('alert');
                    }
                    if ( ! importMessageContainer.classList.contains('alert-danger')) {
                        importMessageContainer.classList.add('alert-danger');
                    }

                    importMessageContainer.innerHTML = errors;

                    importBtn.innerHTML = 'Mulai Impor';
                    importBtn.removeAttribute('disabled');

                });

        });
        @endif
    </script>
@endpush