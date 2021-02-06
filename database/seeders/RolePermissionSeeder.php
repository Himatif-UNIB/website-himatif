<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //daftar role atau peran
        $roles = [
            'super_admin', 'builder', 'dpo', 'bpo', 'chairman', 'vice_chairman', 'secretary', 'treasurer', 'head_of_division', 'administrator', 'member'
        ];

        foreach ($roles as $role) {
            Role::create(['name' => $role]);
        }

        //permissions atau hak akses
        //hak akses akan diberikan kepada setiap role
        $permissions = [
            'create_user', 'read_user', 'update_user', 'delete_user',
            'create_site_setting', 'read_site_setting', 'update_site_setting', 'delete_site_setting',
            'create_blog_post', 'read_blog_post', 'update_blog_post', 'delete_blog_post',
            'create_blog_comment', 'read_blog_comment', 'update_blog_comment', 'delete_blog_comment',
            'create_member', 'read_member', 'update_member', 'delete_member',
            'create_mail', 'read_mail', 'update_mail', 'delete_mail',
            'create_inventory', 'read_inventory', 'update_inventory', 'delete_inventory',
            'create_finance', 'read_finance', 'update_finance', 'delete_finance',
            'create_form', 'read_form', 'update_form', 'delete_form',
            'create_archive', 'read_archive', 'update_archive', 'delete_archive',
            'create_gallery', 'read_gallery', 'update_gallery', 'delete_gallery',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        //berikan hak akses ke super admin
        $superAdminRole = Role::findByName('super_admin');
        $superAdminRole->givePermissionTo([
            Permission::findByName('create_user'), Permission::findByName('read_user'), Permission::findByName('update_user'), Permission::findByName('delete_user'),
            Permission::findByName('read_blog_post'),
            Permission::findByName('read_blog_comment'),
            Permission::findByName('read_member'),
            Permission::findByName('read_mail'),
            Permission::findByName('read_inventory'),
            Permission::findByName('read_finance'),
            Permission::findByName('read_form'),
            Permission::findByName('read_archive')
        ]);

        //berikan hak akses ke pembina
        $builderRole = Role::findByName('builder');
        $builderRole->givePermissionTo([
            Permission::findByName('create_blog_post'), Permission::findByName('read_blog_post'), Permission::findByName('update_blog_post'), Permission::findByName('delete_blog_post'),
            Permission::findByName('read_blog_comment'),
            Permission::findByName('read_member'),
            Permission::findByName('read_mail'),
            Permission::findByName('read_inventory'),
            Permission::findByName('read_finance'),
            Permission::findByName('read_form'),
            Permission::findByName('read_archive')
        ]);

        //berikan hak akses ke dpo
        $dpoRole = Role::findByName('dpo');
        $dpoRole->givePermissionTo([
            Permission::findByName('create_blog_post'), Permission::findByName('read_blog_post'), Permission::findByName('update_blog_post'), Permission::findByName('delete_blog_post'),
            Permission::findByName('read_blog_comment'),
            Permission::findByName('read_member'),
            Permission::findByName('read_mail'),
            Permission::findByName('read_inventory'),
            Permission::findByName('read_finance'),
            Permission::findByName('read_form'),
            Permission::findByName('read_archive')
        ]);

        //berikan hak akses ke bpo
        $bpoRole = Role::findByName('bpo');
        $bpoRole->givePermissionTo([
            Permission::findByName('create_blog_post'), Permission::findByName('read_blog_post'), Permission::findByName('update_blog_post'), Permission::findByName('delete_blog_post'),
            Permission::findByName('read_blog_comment'),
            Permission::findByName('read_member'),
            Permission::findByName('read_mail'),
            Permission::findByName('read_inventory'),
            Permission::findByName('read_finance'),
            Permission::findByName('read_form'),
            Permission::findByName('read_archive')
        ]);

        //berikan hak akses ke ketua umum
        $chairmanRole = Role::findByName('chairman');
        $chairmanRole->givePermissionTo([
            Permission::findByName('read_site_setting'), Permission::findByName('update_site_setting'),
            Permission::findByName('create_blog_post'), Permission::findByName('read_blog_post'), Permission::findByName('update_blog_post'), Permission::findByName('delete_blog_post'),
            Permission::findByName('read_blog_comment'),
            Permission::findByName('read_member'),
            Permission::findByName('read_mail'),
            Permission::findByName('read_inventory'),
            Permission::findByName('read_finance'),
            Permission::findByName('read_form'),
            Permission::findByName('create_archive'), Permission::findByName('read_archive'),  Permission::findByName('update_archive'),  Permission::findByName('delete_archive')
        ]);

        //berikan hak akses ke wakil ketua umum
        $viceChairmanRole = Role::findByName('vice_chairman');
        $viceChairmanRole->givePermissionTo([
            Permission::findByName('read_site_setting'), Permission::findByName('update_site_setting'),
            Permission::findByName('create_blog_post'), Permission::findByName('read_blog_post'), Permission::findByName('update_blog_post'), Permission::findByName('delete_blog_post'),
            Permission::findByName('read_blog_comment'),
            Permission::findByName('read_member'),
            Permission::findByName('read_mail'),
            Permission::findByName('read_inventory'),
            Permission::findByName('read_finance'),
            Permission::findByName('read_form'),
            Permission::findByName('create_archive'), Permission::findByName('read_archive'),  Permission::findByName('update_archive'),  Permission::findByName('delete_archive')
        ]);

        //berikan hak akses ke sekretaris
        $secretaryRole = Role::findByName('secretary');
        $secretaryRole->givePermissionTo([
            Permission::findByName('read_site_setting'), Permission::findByName('update_site_setting'),
            Permission::findByName('create_blog_post'), Permission::findByName('read_blog_post'), Permission::findByName('update_blog_post'), Permission::findByName('delete_blog_post'),
            Permission::findByName('read_blog_comment'), Permission::findByName('delete_blog_comment'),
            Permission::findByName('create_member'), Permission::findByName('read_member'), Permission::findByName('update_member'), Permission::findByName('read_member'),
            Permission::findByName('create_mail'), Permission::findByName('read_mail'), Permission::findByName('update_mail'), Permission::findByName('delete_mail'),
            Permission::findByName('create_inventory'), Permission::findByName('read_inventory'), Permission::findByName('update_inventory'), Permission::findByName('delete_inventory'),
            Permission::findByName('create_form'), Permission::findByName('read_form'), Permission::findByName('update_form'), Permission::findByName('delete_form'),
            Permission::findByName('create_archive'), Permission::findByName('read_archive'),  Permission::findByName('update_archive'),  Permission::findByName('delete_archive')
        ]);

        //berikan hak akses ke bendahara
        $treasurerRole = Role::findByName('treasurer');
        $treasurerRole->givePermissionTo([
            Permission::findByName('create_blog_post'), Permission::findByName('read_blog_post'), Permission::findByName('update_blog_post'), Permission::findByName('delete_blog_post'),
            Permission::findByName('read_blog_comment'),
            Permission::findByName('read_inventory'),
            Permission::findByName('create_finance'), Permission::findByName('read_finance'), Permission::findByName('update_finance'), Permission::findByName('delete_finance'),
            Permission::findByName('create_form'), Permission::findByName('read_form'),
            Permission::findByName('create_archive'), Permission::findByName('read_archive'),  Permission::findByName('update_archive'),  Permission::findByName('delete_archive')
        ]);

        //berikan hak akses ke kepala bidang
        $headOfDivisionRole = Role::findByName('head_of_division');
        $headOfDivisionRole->givePermissionTo([
            Permission::findByName('create_blog_post'), Permission::findByName('read_blog_post'), Permission::findByName('update_blog_post'), Permission::findByName('delete_blog_post'),
            Permission::findByName('read_blog_comment'),
            Permission::findByName('read_member'),
            Permission::findByName('read_inventory'),
            Permission::findByName('create_form'), Permission::findByName('read_form'), Permission::findByName('update_form'), Permission::findByName('delete_form'),
            Permission::findByName('create_archive'), Permission::findByName('read_archive'),  Permission::findByName('update_archive'),  Permission::findByName('delete_archive')
        ]);

        //berikan hak akses ke pengurus
        $administratorRole = Role::findByName('administrator');
        $administratorRole->givePermissionTo([
            Permission::findByName('create_blog_post'), Permission::findByName('read_blog_post'), Permission::findByName('update_blog_post'), Permission::findByName('delete_blog_post'),
            Permission::findByName('read_blog_comment'),
            Permission::findByName('read_inventory'),
            Permission::findByName('create_archive'), Permission::findByName('read_archive'),  Permission::findByName('update_archive'),  Permission::findByName('delete_archive')
        ]);

        //berikan hak akses ke anggota
        $memberRole = Role::findByName('member');
        $memberRole->givePermissionTo([
            Permission::findByName('create_blog_post'), Permission::findByName('read_blog_post'), Permission::findByName('update_blog_post'), Permission::findByName('delete_blog_post'),
            Permission::findByName('read_blog_comment'),
            Permission::findByName('read_inventory')
        ]);
    }
}
