@extends('layouts.admin')
@section('title', 'Hak Akses:: '. $role->label)

@section('custom_head')
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/plugins/@fortawesome/fontawesome-free/css/all.min.css') }}">
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
                <form action="{{ route('admin.users.permissions.update', $role->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="widget-content widget-content-area br-6">
                        @if (session()->has('success'))
                            <div class="alert alert-success">
                                {{ session()->get('success') }}
                            </div>
                        @endif

                        <div class="form-group">
                            <label for="role">Role:</label>
                            <select name="role" id="role" class="form-control">
                                @foreach ($roles as $item)
                                    <option value="{{ $item->id }}"
                                        @if ($role->id != $item->id) disabled @else selected="selected" @endif>{{ $item->label }}</option>
                                @endforeach
                            </select>
                        </div>

                        @if ($role->name == 'super_admin')
                        <div class="alert alert-info">
                            Hak akses {{ $role->label }} selalu bisa mengelola user (<i>create, read, update, delete</i>).
                        </div>
                        @endif

                        <div class="row">
                            @foreach ($permissions as $item)
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="permission-{{ $item->id }}">
                                            <input type="checkbox" name="permissions[]" value="{{ $item->id }}" id="permission-{{ $item->id }}"
                                                @if ($role->hasPermissionTo($item->name)) checked="checked" @endif>
                                            {{ $item->label }}
                                        </label>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="alert alert-info">
                            Hak akses merupakan <b>tindakan yang bisa dilakukan dan tidak bisa dilakukan <i>user</i></b>. Saat ini hak akses yang dapat dilakukan <b>{{ $role->label }}</b>
                            adalah:
                        </div>
                        <div class="form-group">
                            <div>
                                @forelse ($role->permissions as $permission)
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
                                    <div class="alert alert-info">
                                        Tidak ada hak akses dimiliki.
                                    </div>
                                @endforelse
                            </div>
                        </div>
                        <div class="alert alert-info">
                            Contohnya, jika ingin <b>{{ $role->label }}</b> bisa melakukan tindakan <b>Menambah Formulir</b>,
                            tandai pilihan <b>Menambah Formulir</b> pada kolom pilihan hak akses diatas. Hanya <b>tindakan yang ditandai</b>
                            yang bisa dilakukan oleh <b>{{ $role->label }}</b>.
                            <br>
                            Umumnya satu <i>role</i> akan dimiliki banyak <i>user</i>, misalnya <i>role</i> <b>Kepala Bidang</b> bisa dimiliki oleh semua <i>user</i> yang merupakan
                            kepala bidang. Dengan demikian, setiap Kepala Bidang bisa melakukan tindakan yang sama.
                            <br>
                            Jika ingin membedakan hak akses antar <i>user</i>, Anda bisa melakukannya di menu <b>Manajemen User</b>.
                            Misalnya, Anda ingin Kepala Bidang XXX bisa melihat data Surat Menyurat sedangkan Kepala Bidang YYY tidak.
                            Anda bisa memberi hak akses berbeda ke setiap <i>user</i>.
                        </div>

                        <div class="form-group">
                            <div class="text-right">
                                <input type="submit" value="Simpan" class="btn btn-primary">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection