@extends('layouts.admin')
@section('title', $user->name)

@section('custom_head')
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/plugins/@fortawesome/fontawesome-free/css/all.min.css') }}">
    <link href="{{ asset('assets/themes/cork/css/elements/avatar.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing" id="cancel-row">
            <div class="col-xl-12 col-lg-12 col-sm-12 mb-3">
                <div class="widget-content widget-content-area">
                    <h3>{{ $user->name }}</h3>
                </div>
            </div>

            <div class="col-xl-4 col-lg-4 col-sm-4 layout-spacing">
                <div class="widget-content widget-content-area br-6">
                    <div class="text-center">
                        <div class="avatar avatar-xl">
                            @isset($user->media[0])
                                <img src="{{ $user->media[0]->getFullUrl() }}" alt="avatar" class="img img-fluid rounded-circle">
                            @else
                                <img src="{{ asset('assets/images/avatar-1.png') }}" alt="avatar" class="img img-fluid rounded-circle">
                            @endisset
                        </div>

                        <h4 class="mt-2">{{ $user->name }}</h4>
                        <span class="badge badge-info mb-2">{{ $user->email }}</span>
                        <br>
                        Bergabung pada {{ \Carbon\Carbon::parse($user->created_at)->format('d M Y H:i') }}
                    </div>

                    <div class="mt-4 text-center">
                        <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-warning btn-sm"
                            data-toggle="tooltip" title="Edit User">
                            <i class="fa fa-edit"></i>
                        </a>
                        @if (auth()->user()->id != $user->id)
                            <a href="#" class="btn btn-danger btn-sm btn-delete-user" data-user-id="{{ $user->id }}"
                                data-toggle="tooltip" title="Hapus User">
                                    <i class="fa fa-trash"></i>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-xl-8 col-lg-8 col-sm-8 layout-spacing">
                <div class="widget-content widget-content-area br-6">
                    <div>
                        <label>Role:</label>
                        <div>
                            @forelse ($user->roles as $role)
                                <span class="badge badge-info">{{ $role->label }}</span>
                            @empty
                                -
                            @endforelse
                        </div>
                    </div>

                    <div class="mt-2">
                        <label>Hak Akses:</label>
                        <div>
                            @forelse ($user->getAllPermissions() as $permission)
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection