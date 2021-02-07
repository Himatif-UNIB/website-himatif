@extends('layouts.admin')
@section('title', 'Manajemen User')

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
                    <h3>Manajemen User</h3>
                </div>
            </div>

            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                <div class="widget-content widget-content-area br-6">
                    <div class="table-responsive mb-4 mt-4">
                        <table class="table table-hover non-hover" id="users-table" style="width:100%">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Email</th>
                                    <th scope="col"><i>Role</i></th>
                                    <th scope="col"></th>
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
<div id="delete-modal" class="modal fade in" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Hapus User?</h5>
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
                    Anda yakin ingin menghapus user ini?
                    <br>
                    Menghapus <i>user</i> tidak akan menghapus data yang terkait.
                    Tindakan ini tidak dapat dibatalkan.
                </div>
            </div>
            <div class="modal-footer md-button">
                <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Batal</button>
                <button type="submit" class="btn btn-danger btn-delete-user">Hapus</button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('custom_js')
    <script src="{{ asset('assets/plugins/table/datatable/datatables.js') }}"></script>

    <script>
        let userTable = $('#users-table').DataTable({
            ajax: {
                url: '{{ route('api.users.index') }}',
                headers: {
                    'Authorization': `Bearer ${passportAccessToken}`
                }
            },
            dom: '<"row"<"col-md-12"<"row"<"col-md-6"B><"col-md-6"f> > ><"col-md-12"rt> <"col-md-12"<"row"<"col-md-5"i><"col-md-7"p>>> >',
            columns: [
                {"data": "id"},
                {"data": "name"},
                {"data": "email"},
                {
                    data: function(data, row, type) {
                        return `<span class="badge badge-info">${data.roles[0].label}</span>`;
                    }
                },
                {
                    data: function(data, row, type) {
                        return `
                            <div class="text-right">
                                ${(data.id != {{ auth()->user()->id }}) ? `
                                    <a href="#" data-id="${data.id}" data-toggle="tooltip" title="Hapus User"
                                        class="btn btn-sm btn-danger btn-delete-user"><i class="fa fa-trash"></i>
                                    </a>
                                ` : ``}
                                <a href="{{ route('admin.users.show', false) }}/${data.id}"
                                    data-toggle="tooltip" title="Lihat User"
                                    class="btn btn-sm btn-info"><i class="fa fa-eye"></i>
                                </a>
                                <a href="{{ trim(route('admin.users.edit', false), '/edit') }}/${data.id}/edit"
                                    data-toggle="tooltip" title="Edit User"
                                    class="btn btn-sm btn-warning"><i class="fa fa-edit"></i>
                                </a>
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

        let delete_id = 0;
        $(document).on('click', '.btn-delete-user', function (e) {
            e.preventDefault();

            const id = $(this).data('id');
            delete_id = id;

            $('#delete-modal').modal('show');
        });

        const deleteBtn = document.querySelector('.btn-delete-user');
        const deleteMessageContainer = document.querySelector('.delete-message-container');

        deleteBtn.addEventListener('click', function (e) {
            e.preventDefault();

            deleteBtn.setAttribute('disabled', 'disabled');
            deleteBtn.innerHTML = '<i class="fa fa-spin fa-spinner"></i> Menghapus...';
            
            fetch(`{{ route('api.users.destroy', false) }}/${delete_id}`, {
                method: 'DELETE',
                headers: {
                    'Authorization': `Bearer ${passportAccessToken}`
                }
            })
            .then(res => res.json())
            .then(res => {
                if (res.success) {
                    userTable.ajax.reload();
                    deleteMessageContainer.innerHTML = res.message;

                    deleteBtn.innerHTML = '<i class="fa fa-check"></i> Berhasil!';

                    $('#delete-modal').on('hidden.bs.modal', function(e) {
                        deleteMessageContainer.innerHTML = `Anda yakin ingin menghapus user ini?
                        <br>
                        Menghapus <i>user</i> tidak akan menghapus data yang terkait.
                        Tindakan ini tidak dapat dibatalkan.`;

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
    </script>
@endpush