<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{
    /**
     * Menampilkan halaman manajemen role
     * 
     * Halaman manajemen role adalah
     * halaman untuk melihat daftar role yang tersedia
     * di aplikasi
     * 
     * @since   1.0.0
     * @author  mulyosyahidin95
     * 
     * @return  View\Factory@admin.permissions.roles
     */
    public function roles()
    {
        $roles = Role::all();

        return view('admin.permissions.roles', compact('roles'));
    }

    /**
     * Menampilkan halaman manajemen role
     * 
     * Halaman manajemen role adalah
     * halaman untuk melihat daftar role yang tersedia
     * di aplikasi
     * 
     * @since   1.0.0
     * @author  mulyosyahidin95
     * 
     * @return  View\Factory@admin.permissions.roles
     */
    public function permissions()
    {
        $roles = Role::all();
        $permissions = Permission::all();

        return view('admin.permissions.permissions', compact('roles', 'permissions'));
    }

    public function edit(Role $role)
    {
        $roles = Role::all();
        $permissions = Permission::all();

        return view('admin.permissions.edit', compact('role', 'roles', 'permissions'));
    }

    public function update(Request $request, Role $role)
    {
        $permissions = $request->permissions;
        if ($role->name == 'super_admin') {
            $permissions = array_merge($permissions, ['create_user', 'read_user', 'update_user', 'delete_user']);
        }

        $role->syncPermissions($permissions);

        return redirect()
            ->back()
            ->withSuccess('Berhasil menyimpan data hak akses');
    }
}
