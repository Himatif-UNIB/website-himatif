@extends('layouts.admin')
@section('title', 'Manajemen Hak Akses')

@section('custom_head')
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/plugins/@fortawesome/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/table/datatable/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/table/datatable/dt-global_style.css') }}">
@endsection

@section('content')
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing" id="cancel-row">
            <div class="col-xl-12 col-lg-12 col-sm-12 mb-3">
                <div class="widget-content widget-content-area">
                    <h3>Manajemen Hak Akses</h3>
                </div>
            </div>

            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                <div class="widget-content widget-content-area br-6">
                    <div class="table-responsive mb-4 mt-4">
                        <table class="table table-hover non-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col"><i>Role</i></th>
                                    <th scope="col">Hak Akses</th>
                                    <th scope="col">Edit</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->label }}</td>
                                        <td>
                                            @forelse ($item->permissions as $permission)
                                                @if (\Str::contains($permission->name, 'create'))
                                                    <span class="badge badge-success mb-1">{{ $permission->label }}</span>
                                                @endif
                                                @if (\Str::contains($permission->name, 'read'))
                                                    <span class="badge badge-info mb-1">{{ $permission->label }}</span>
                                                @endif
                                                @if (\Str::contains($permission->name, 'update'))
                                                    <span class="badge badge-warning mb-1">{{ $permission->label }}</span>
                                                @endif
                                                @if (\Str::contains($permission->name, 'delete'))
                                                    <span class="badge badge-danger mb-1">{{ $permission->label }}</span>
                                                @endif
                                            @empty
                                                -
                                            @endforelse
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.users.permissions.edit', $item->id) }}"
                                                class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection