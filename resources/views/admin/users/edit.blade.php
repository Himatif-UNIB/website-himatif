@extends('layouts.admin')
@section('title', 'Edit User: ' . $user->name)

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

            <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
                <form action="{{ route('admin.users.update', $user->id) }}" method="post">
                    @csrf
                    @method('PUT')

                    <div class="widget-content widget-content-area br-6">
                        @if (session()->has('success'))
                            <div class="alert alert-success">
                                {{ session()->get('success') }}
                            </div>
                        @else
                            <div class="alert alert-warning">
                                Mengubah data <i>user</i> tanpa sepengetahuannya atau tidak dalam keadaan darurat merupakan
                                tindakan tidak sopan. Bijaksanalah dalam mengubah data user.
                            </div>
                        @endif

                        <div class="row">
                            <div class="col-6 col-xs-12">
                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input type="email" name="email" value="{{ $user->email }}" id="email"
                                        class="form-control @error('email') is-invalid @enderror"
                                        minlength="10" maxlength="255">

                                    @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6 col-xs-12">
                                <div class="form-group">
                                    <label for="password">Password:</label>
                                    <input type="password" name="password" id="password"
                                        class="form-control @error('password') is-invalid @enderror">

                                    @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @else
                                        <span class="text-muted">Kosongkan password jika tidak ingin mengganti.</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="roles">Role:</label>
                            <select name="role" id="roles" class="form-control">
                                @foreach ($roles as $role)
                                    <option value="{{ $role->name }}" @if ($user->hasRole($role->name)) selected @endif>
                                        {{ $role->label }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Hak Akses:</label>

                            <div class="row">
                                @foreach ($permissions as $permission)
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="permission-{{ $permission->id }}">
                                                <input type="checkbox" name="permissions[]" value="{{ $permission->name }}"
                                                    id="permission-{{ $permission->id }}" @if ($role->hasPermissionTo($permission->name)) checked="checked" @endif>
                                                {{ $permission->label }}
                                            </label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="alert alert-warning">
                            Hak akses merupakan pintu keamanan yang penting, hanya berikan hak akses pada user
                            yang Anda percaya. Memberikan hak akses dengan tidak tepat adalah tindakan berbahaya.
                        </div>

                        <div class="mt-2 text-right">
                            <input type="submit" value="Simpan" class="btn btn-primary btn-md">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
