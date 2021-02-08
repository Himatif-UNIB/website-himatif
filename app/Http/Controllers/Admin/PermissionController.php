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
     * @return  View\Factory@private.admin.permissions.roles
     */
    public function roles()
    {
        $roles = Role::all();

        return view('private.admin.permissions.roles', compact('roles'));
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
     * @return  View\Factory@private.admin.permissions.permissions
     */
    public function permissions()
    {
        $roles = Role::all();
        $permissions = Permission::all();

        return view('private.admin.permissions.permissions', compact('roles', 'permissions'));
    }

    /**
     * Menampilkan halaman edit role
     * 
     * Halaman edit role berguna untuk melakukan
     * manajemen pada role, seperti mengatur hak akses yang
     * diberikan kepada role
     * 
     * @since   1.0.0
     * @author  mulyosyahidin95
     * 
     * @return  View\Factory@private.admin.permissions.edit
     */
    public function edit(Role $role)
    {
        $roles = Role::all();
        $permissions = Permission::all();

        return view('private.admin.permissions.edit', compact('role', 'roles', 'permissions'));
    }

    /**
     * Action mengedit role
     * 
     * Menyimpan data penyimpanan role
     * 
     * @since   1.0.0
     * @author  mulyosyahidin95
     * 
     * @return  void
     */
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
