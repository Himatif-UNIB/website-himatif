<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class BlogCategoryRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            ['name' => 'create_blog_category', 'label' => 'Menambah Kategori Blog'], ['name' => 'read_blog_category', 'label' => 'Melihat Kategori Blog'], ['name' => 'update_blog_category', 'label' => 'Mengubah Kategori Blog'], ['name' => 'delete_blog_category', 'label' => 'Menghapus Kategori Blog']
        ];

        foreach ($permissions as $item => $permission) {
            Permission::create([
                'name' => $permission['name'],
                'label' => $permission['label']
            ]);
        }

        //berikan hak akses ke super admin
        $superAdminRole = Role::findByName('super_admin');
        $superAdminRole->givePermissionTo([
            Permission::findByName('read_blog_category')
        ]);

        //berikan hak akses ke pembina
        $builderRole = Role::findByName('builder');
        $builderRole->givePermissionTo([
            Permission::findByName('read_blog_category'),
        ]);

        //berikan hak akses ke dpo
        $dpoRole = Role::findByName('dpo');
        $dpoRole->givePermissionTo([
            Permission::findByName('read_blog_category'),
        ]);

        //berikan hak akses ke bpo
        $bpoRole = Role::findByName('bpo');
        $bpoRole->givePermissionTo([
            Permission::findByName('read_blog_category'),
        ]);

        //berikan hak akses ke ketua umum
        $chairmanRole = Role::findByName('chairman');
        $chairmanRole->givePermissionTo([
            Permission::findByName('read_blog_category'),
        ]);

        //berikan hak akses ke wakil ketua umum
        $viceChairmanRole = Role::findByName('vice_chairman');
        $viceChairmanRole->givePermissionTo([
            Permission::findByName('read_blog_category'),
        ]);

        //berikan hak akses ke sekretaris
        $secretaryRole = Role::findByName('secretary');
        $secretaryRole->givePermissionTo([
            Permission::findByName('create_blog_category'), Permission::findByName('read_blog_category'), Permission::findByName('update_blog_category'), Permission::findByName('delete_blog_category'),
        ]);

        //berikan hak akses ke bendahara
        $treasurerRole = Role::findByName('treasurer');
        $treasurerRole->givePermissionTo([
            Permission::findByName('read_blog_category'),
        ]);

        //berikan hak akses ke kepala bidang
        $headOfDivisionRole = Role::findByName('head_of_division');
        $headOfDivisionRole->givePermissionTo([
            Permission::findByName('read_blog_category'),
        ]);

        //berikan hak akses ke pengurus
        $staffRole = Role::findByName('staff');
        $staffRole->givePermissionTo([
            Permission::findByName('read_blog_category'),
        ]);

        //berikan hak akses ke anggota
        $memberRole = Role::findByName('member');
        $memberRole->givePermissionTo([
            Permission::findByName('read_blog_category'),
        ]);
    }
}
