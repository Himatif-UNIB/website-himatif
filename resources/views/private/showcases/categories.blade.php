@extends('layouts.admin')
@section('title', 'Manajemen Kategori Karya')

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
                        Manajemen Kategori Karya
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
                        <table id="categories-table" class="table table-hover non-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Kategori</th>
                                    <th>URL</th>
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
                    <h5 class="modal-title">Tambah Kategori</h5>
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

                        <div class="form-group" id="category-name-field">
                            <label for="category-name">Nama:</label>
                            <input type="text" class="form-control" id="category-name" name="category-name" required>

                            <div class="invalid-feedback category-name-feedback"></div>
                        </div>
                    </div>
                    <div class="modal-footer md-button">
                        <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Batal</button>
                        <button type="submit" class="btn btn-primary add-category-btn">Tambah</button>
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
                    <h5 class="modal-title">Ubah Kategori</h5>
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

                        <div class="form-group" id="edit-category-name-field">
                            <label for="edit-category-name">Nama:</label>
                            <input type="text" class="form-control" id="edit-category-name" name="category-name" required>

                            <div class="invalid-feedback category-name-feedback"></div>
                        </div>
                    </div>
                    <div class="modal-footer md-button">
                        <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Batal</button>
                        <button type="submit" class="btn btn-primary save-category-btn">Simpan</button>
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
                    <h5 class="modal-title">Hapus Kategori?</h5>
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
                        Yakin ingin menghapus kategori? Semua posting dalam kategori ini akan ditandai sebagai "<b>Tidak Berkategori</b>"
                    </div>
                </div>
                <div class="modal-footer md-button">
                    <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Batal</button>
                    <button type="submit" class="btn btn-danger btn-delete-category">Hapus</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('custom_js')
    <script src="{{ asset('assets/plugins/table/datatable/datatables.js') }}"></script>
    <script>
        let categoryTable = $('#categories-table').DataTable({
            ajax: {
                url: '{{ route('api.showcase_categories.index') }}',
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
                    data: function (data, type, row) {
                        let url = `{{ config('app.url') }}/showcase/category/${data.id}-${data.slug}/`;
                        return `<a href="${url}" target="_blank">${url}</a>`;
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

        //tambah kategori
        const addCategoryModal = document.querySelector('#add-modal');
        const addCategoryForm = addCategoryModal.querySelector('form');
        const addCategoryBtn = addCategoryForm.querySelector('.add-category-btn');
        const addCategoryNameField = addCategoryForm.querySelector('#category-name-field');

        const addCategoryNameInput = addCategoryNameField.querySelector('#category-name');
        const addCategoryNameFeedback = addCategoryNameField.querySelector('.invalid-feedback');

        const addMessageContainer = addCategoryForm.querySelector('.message-container');

        addCategoryForm.addEventListener('submit', function(e) {
            e.preventDefault();

            addCategoryBtn.innerHTML = '<i class="fa fa-spin fa-spinner"></i> Menambah...';
            if (addCategoryNameInput != '') {
                addCategoryBtn.setAttribute('disabled', 'disabled');

                fetch('{{ route('api.showcase_categories.store') }}', {
                            method: 'POST',
                            headers: {
                                'Authorization': `Bearer ${passportAccessToken}`,
                                'Content-Type': 'application/json'
                            },
                            body: JSON.stringify({
                                name: addCategoryNameInput.value
                            })
                        })
                    .then(res => res.json())
                    .then(res => {
                        addCategoryBtn.removeAttribute('disabled');

                        if (res.error) {
                            addCategoryBtn.innerHTML = 'Tambah';

                            if (res.validations) {
                                const validation = res.validations;
                                if (validation.name) {
                                    addCategoryNameInput.classList.add('is-invalid');
                                    addCategoryNameFeedback.innerHTML = validation.name[0]
                                }
                            }
                        } else if (res.success) {
                            addCategoryBtn.innerHTML = '<i class="fa fa-check"></i> Berhasil!';
                            categoryTable.ajax.reload();

                            if (!addMessageContainer.classList.contains('alert')) {
                                addMessageContainer.classList.add('alert');
                            }
                            if (addMessageContainer.classList.contains('alert-info')) {
                                addMessageContainer.classList.remove('alert-info');
                            }

                            if (addCategoryNameInput.classList.contains('is-invalid')) {
                                addCategoryNameInput.classList.remove('is-invalid');
                                addCategoryNameFeedback.innerHTML = '';
                            }

                            addMessageContainer.classList.add('alert-success');
                            addMessageContainer.innerHTML = res.message;

                            $('#add-modal').on('hidden.bs.modal', function(e) {
                                addCategoryBtn.innerHTML = 'Tambah';
                                addCategoryForm.reset();

                                addMessageContainer.classList.remove('alert');
                                addMessageContainer.classList.remove('alert-success');
                                addMessageContainer.innerHTML = '';

                                addCategoryNameInput.classList.remove('is-invalid');
                                addCategoryNameFeedback.innerHTML = '';
                            });
                        }
                    })
                    .catch(errors => {
                        addCategoryBtn.innerHTML = 'Tambah';
                        addCategoryBtn.removeAttribute('disabled');

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

        //edit kategori
        const editCategoryModal = document.querySelector('#edit-modal');
        const editCategoryForm = editCategoryModal.querySelector('form');
        const editCategoryBtn = editCategoryForm.querySelector('.save-category-btn');
        const editCategoryNameField = editCategoryForm.querySelector('#edit-category-name-field');

        const editCategoryNameInput = editCategoryNameField.querySelector('#edit-category-name');

        const editMessageContainer = editCategoryForm.querySelector('.message-container');
        let edit_id = 0;

        $(document).on('click', '.btn-edit', function(e) {
            e.preventDefault();

            const id = $(this).data('id');
            edit_id = id;

            fetch(`{{ route('api.showcase_categories.show', false) }}/${id}`, {
                    headers: {
                        'Authorization': `Bearer ${passportAccessToken}`
                    }
                })
                .then(res => res.json())
                .then(res => {
                    editCategoryNameInput.value = res.name;

                    $('#edit-modal').modal('show');
                })
                .catch(errors => {
                    editMessageContainer.innerHTML = errors;
                });
        });

        editCategoryForm.addEventListener('submit', function(e) {
            e.preventDefault();

            editCategoryBtn.innerHTML = '<i class="fa fa-spin fa-spinner"></i> Menyimpan...';
            editCategoryBtn.setAttribute('disabled', 'disabled');

            fetch(`{{ route('api.showcase_categories.update', false) }}/${edit_id}`, {
                    method: 'PUT',
                    headers: {
                        'Authorization': `Bearer ${passportAccessToken}`,
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        name: editCategoryNameInput.value
                    })
                })
                .then(res => res.json())
                .then(res => {
                    editCategoryBtn.removeAttribute('disabled');

                    if (res.error) {
                        editCategoryBtn.innerHTML = 'Simpan';

                        if (res.validations) {
                            const validation = res.validations;
                            if (validation.name) {
                                editCategoryNameInput.classList.add('is-invalid');
                                editCategoryNameFeedback.innerHTML = validation.name[0]
                            }
                        }
                    } else if (res.success) {
                        editCategoryBtn.innerHTML = '<i class="fa fa-check"></i> Berhasil!';
                        categoryTable.ajax.reload();

                        if (!editMessageContainer.classList.contains('alert')) {
                            editMessageContainer.classList.add('alert');
                        }
                        if (editMessageContainer.classList.contains('alert-info')) {
                            editMessageContainer.classList.remove('alert-info');
                        }

                        if (editCategoryNameInput.classList.contains('is-invalid')) {
                            editCategoryNameInput.classList.remove('is-invalid');
                            editCategoryNameFeedback.innerHTML = '';
                        }

                        editMessageContainer.classList.add('alert-success');
                        editMessageContainer.innerHTML = res.message;

                        $('#edit-modal').on('hidden.bs.modal', function(e) {
                            editCategoryBtn.innerHTML = 'Simpan';
                            editCategoryForm.reset();

                            editMessageContainer.classList.remove('alert');
                            editMessageContainer.classList.remove('alert-success');
                            editMessageContainer.innerHTML = '';
                        });
                    }
                })
                .catch(errors => {
                    editCategoryBtn.innerHTML = 'Simpan';
                    editCategoryBtn.removeAttribute('disabled');

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

        //hapus kategori
        let delete_id = 0;
        $(document).on('click', '.btn-delete', function (e) {
            e.preventDefault();

            const id = $(this).data('id');
            delete_id = id;

            $('#delete-modal').modal('show');
        });

        const deleteBtn = document.querySelector('.btn-delete-category');
        const deleteMessageContainer = document.querySelector('.delete-message-container');

        deleteBtn.addEventListener('click', function (e) {
            e.preventDefault();

            deleteBtn.setAttribute('disabled', 'disabled');
            deleteBtn.innerHTML = '<i class="fa fa-spin fa-spinner"></i> Menghapus...';
            
            fetch(`{{ route('api.showcase_categories.destroy', false) }}/${delete_id}`, {
                method: 'DELETE',
                headers: {
                    'Authorization': `Bearer ${passportAccessToken}`
                }
            })
            .then(res => res.json())
            .then(res => {
                if (res.success) {
                    categoryTable.ajax.reload();
                    deleteMessageContainer.innerHTML = res.message;

                    deleteBtn.innerHTML = '<i class="fa fa-check"></i> Berhasil!';

                    $('#delete-modal').on('hidden.bs.modal', function(e) {
                        deleteMessageContainer.innerHTML = `Yakin ingin menghapus kategori? Semua karya dalam kategori ini akan ditandai sebagai "<b>Tidak Berkategori</b>"`;

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
