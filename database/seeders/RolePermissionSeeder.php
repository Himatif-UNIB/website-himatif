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
            ['name' => 'super_admin', 'label' => 'Super Admin'],
            ['name' => 'builder', 'label' => 'Pembina'],
            ['name' => 'dpo', 'label' => 'Dewan Penasehat Organisasi'],
            ['name' => 'bpo', 'label' => 'Badan Penasehat Organisasi'],
            ['name' => 'chairman','label' => 'Ketua Umum'],
            ['name' => 'vice_chairman', 'label' => 'Wakil Ketua Umum'],
            ['name' => 'secretary', 'label' => 'Sekretaris'],
            ['name' => 'treasurer', 'label' => 'Bendahara'],
            ['name' => 'head_of_division', 'label' => 'Kepala Divisi'],
            ['name' => 'staff', 'label' => 'Pengurus / Staff'],
            ['name' => 'member','label' => 'Anggota'],
        ];

        foreach ($roles as $item => $role) {
            Role::create([
                'name' => $role['name'],
                'label' => $role['label']
            ]);
        }

        //permissions atau hak akses
        //hak akses akan diberikan kepada setiap role
        $permissions = [
            ['name' => 'create_user', 'label' => 'Menambah User'], ['name' => 'read_user', 'label' => 'Melihat User'], ['name' => 'update_user', 'label' => 'Mengubah User'], ['name' => 'delete_user', 'label' => 'Menghapus User'],
            ['name' => 'create_site_setting', 'label' => 'Menambah Pengaturan Situs'], ['name' => 'read_site_setting', 'label' => 'Melihat Pengaturan Situs'], ['name' => 'update_site_setting', 'label' => 'Mengubah User'], ['name' => 'delete_site_setting', 'label' => 'Menghapus Pengaturan Situs'],
            ['name' => 'create_blog_post', 'label' => 'Menambah Posting Blog'], ['name' => 'read_blog_post', 'label' => 'Melihat Posting Blog'], ['name' => 'update_blog_post', 'label' => 'Mengubah Posting Blog'], ['name' => 'delete_blog_post', 'label' => 'Menghapus Posting Blog'],
            ['name' => 'create_blog_category', 'label' => 'Menambah Kategori Blog'], ['name' => 'read_blog_category', 'label' => 'Melihat Kategori Blog'], ['name' => 'update_blog_category', 'label' => 'Mengubah Kategori Blog'], ['name' => 'delete_blog_category', 'label' => 'Menghapus Kategori Blog'],
            ['name' => 'create_blog_comment', 'label' => 'Menambah Komentar Posting Blog'], ['name' => 'read_blog_comment', 'label' => 'Melihat Komentar Posting Blog'], ['name' => 'update_blog_comment', 'label' => 'Mengubah Komentar Posting BLog'], ['name' => 'delete_blog_comment', 'label' => 'Menghapus Komentar Posting Blog'],
            ['name' => 'create_member', 'label' => 'Menambah Anggota'], ['name' => 'read_member', 'label' => 'Melihat Anggota'], ['name' => 'update_member', 'label' => 'Mengubah Anggota'], ['name' => 'delete_member', 'label' => 'Menghapus Anggota'],
            ['name' => 'create_period', 'label' => 'Menambah Periode'], ['name' => 'read_period', 'label' => 'Melihat Periode'], ['name' => 'update_period', 'label' => 'Mengubah Periode'], ['name' => 'delete_period', 'label' => 'Menghapus Periode'],
            ['name' => 'create_force', 'label' => 'Menambah Angkatan'], ['name' => 'read_force', 'label' => 'Melihat Angkatan'], ['name' => 'update_force', 'label' => 'Mengubah Angkatan'], ['name' => 'delete_force', 'label' => 'Menghapus Angkatan'],
            ['name' => 'create_division', 'label' => 'Menambah Divisi'], ['name' => 'read_division', 'label' => 'Melihat Divisi'], ['name' => 'update_division', 'label' => 'Mengubah Divisi'], ['name' => 'delete_division', 'label' => 'Menghapus Divisi'],
            ['name' => 'create_position', 'label' => 'Menambah Jabatan'], ['name' => 'read_position', 'label' => 'Melihat Jabatan'], ['name' => 'update_position', 'label' => 'Mengubah Jabatan'], ['name' => 'delete_position', 'label' => 'Menghapus Jabatan'],
            ['name' => 'create_staff', 'label' => 'Menambah Pengurus / Staff'], ['name' => 'read_staff', 'label' => 'Melihat Pengurus / Staff'], ['name' => 'update_staff', 'label' => 'Mengubah Pengurus / Staff'], ['name' => 'delete_staff', 'label' => 'Menghapus Pengurus / Staff'],
            ['name' => 'create_mail', 'label' => 'Menambah Surat Menyurat'], ['name' => 'read_mail', 'label' => 'Melihat Surat Menyurat'], ['name' => 'update_mail', 'label' => 'Mengubah Surat Menyurat'], ['name' => 'delete_mail', 'label' => 'Menghapus Surat Menyurat'],
            ['name' => 'create_inventory', 'label' => 'Menambah Inventaris'], ['name' => 'read_inventory', 'label' => 'Melihat Inventaris'], ['name' => 'update_inventory', 'label' => 'Mengubah Inventaris'], ['name' => 'delete_inventory', 'label' => 'Menghapus Inventaris'],
            ['name' => 'create_finance', 'label' => 'Menambah Keuangan'], ['name' => 'read_finance', 'label' => 'Melihat Keuangan'], ['name' => 'update_finance', 'label' => 'Mengubah Keuangan'], ['name' => 'delete_finance', 'label' => 'Menghapus Keuangan'],
            ['name' => 'create_form', 'label' => 'Menambah Formulir'], ['name' => 'read_form', 'label' => 'Melihat Formulir'], ['name' => 'update_form', 'label' => 'Mengubah Formulir'], ['name' => 'delete_form', 'label' => 'Menghapus Formulir'],
            ['name' => 'create_archive', 'label' => 'Menambah File dan Arsip'], ['name' => 'read_archive', 'label' => 'Melihat File dan Arsip'], ['name' => 'update_archive', 'label' => 'Mengubah File dan Arsip'], ['name' => 'delete_archive', 'label' => 'Menghapus File dan Arsip'],
            ['name' => 'create_gallery', 'label' => 'Menambah Galeri Foto'], ['name' => 'read_gallery', 'label' => 'Melihat Galeri Foto'], ['name' => 'update_gallery', 'label' => 'Mengubah Galeri Foto'], ['name' => 'delete_gallery', 'label' => 'Menghapus Galeri Foto'],
            // ['name' => 'create_certificate', 'label' => 'Menambah Sertifikat'],
            // ['name' => 'read_certificate', 'label' => 'Melihat Sertifikat'],
            // ['name' => 'update_certificate', 'label' => 'Mengubah Sertifikat'],
            // ['name' => 'delete_certificate', 'label' => 'Menghapus Sertifikat'],
            // ['name' => 'send_certificate', 'label' => 'Mengirim Sertifikat'],
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
            Permission::findByName('create_user'), Permission::findByName('read_user'), Permission::findByName('update_user'), Permission::findByName('delete_user'),
            Permission::findByName('create_blog_post'), Permission::findByName('read_blog_post'),
            Permission::findByName('create_blog_category'), Permission::findByName('read_blog_category'), Permission::findByName('update_blog_category'), Permission::findByName('delete_blog_category'),
            Permission::findByName('read_blog_comment'),
            Permission::findByName('read_member'),
            Permission::findByName('read_period'),
            Permission::findByName('read_force'),
            Permission::findByName('read_division'),
            Permission::findByName('read_position'),
            Permission::findByName('read_staff'),
            Permission::findByName('read_mail'),
            Permission::findByName('read_inventory'),
            Permission::findByName('read_finance'),
            Permission::findByName('read_form'),
            Permission::findByName('read_archive'),
            Permission::findByName('read_gallery'),
            Permission::findByName('read_site_setting'), Permission::findByName('update_site_setting')
        ]);

        //berikan hak akses ke pembina
        $builderRole = Role::findByName('builder');
        $builderRole->givePermissionTo([
            Permission::findByName('create_blog_post'), Permission::findByName('read_blog_post'), Permission::findByName('update_blog_post'), Permission::findByName('delete_blog_post'),
            Permission::findByName('read_blog_category'),
            Permission::findByName('read_blog_comment'),
            Permission::findByName('read_member'),
            Permission::findByName('read_period'),
            Permission::findByName('read_force'),
            Permission::findByName('read_division'),
            Permission::findByName('read_position'),
            Permission::findByName('read_staff'),
            Permission::findByName('read_mail'),
            Permission::findByName('read_inventory'),
            Permission::findByName('read_finance'),
            Permission::findByName('read_form'),
            Permission::findByName('read_archive'),
            Permission::findByName('read_gallery')
        ]);

        //berikan hak akses ke dpo
        $dpoRole = Role::findByName('dpo');
        $dpoRole->givePermissionTo([
            Permission::findByName('create_blog_post'), Permission::findByName('read_blog_post'), Permission::findByName('update_blog_post'), Permission::findByName('delete_blog_post'),
            Permission::findByName('read_member'),
            Permission::findByName('read_period'),
            Permission::findByName('read_force'),
            Permission::findByName('read_division'),
            Permission::findByName('read_position'),
            Permission::findByName('read_staff'),
            Permission::findByName('read_mail'),
            Permission::findByName('read_inventory'),
            Permission::findByName('read_finance'),
            Permission::findByName('read_form'),
            Permission::findByName('read_archive'),
            Permission::findByName('read_gallery')
        ]);

        //berikan hak akses ke bpo
        $bpoRole = Role::findByName('bpo');
        $bpoRole->givePermissionTo([
            Permission::findByName('create_blog_post'), Permission::findByName('read_blog_post'), Permission::findByName('update_blog_post'), Permission::findByName('delete_blog_post'),
            Permission::findByName('read_member'),
            Permission::findByName('read_period'),
            Permission::findByName('read_force'),
            Permission::findByName('read_division'),
            Permission::findByName('read_position'),
            Permission::findByName('read_staff'),
            Permission::findByName('read_mail'),
            Permission::findByName('read_inventory'),
            Permission::findByName('read_finance'),
            Permission::findByName('read_form'),
            Permission::findByName('read_archive'),
            Permission::findByName('read_gallery')
        ]);

        //berikan hak akses ke ketua umum
        $chairmanRole = Role::findByName('chairman');
        $chairmanRole->givePermissionTo([
            Permission::findByName('read_site_setting'), Permission::findByName('update_site_setting'),
            Permission::findByName('create_blog_post'), Permission::findByName('read_blog_post'), Permission::findByName('update_blog_post'), Permission::findByName('delete_blog_post'),
            Permission::findByName('read_blog_category'),
            Permission::findByName('read_blog_comment'),
            Permission::findByName('read_member'),
            Permission::findByName('read_period'),
            Permission::findByName('read_force'),
            Permission::findByName('read_division'),
            Permission::findByName('read_position'),
            Permission::findByName('read_staff'),
            Permission::findByName('read_mail'),
            Permission::findByName('read_inventory'),
            Permission::findByName('read_finance'),
            Permission::findByName('read_form'),
            Permission::findByName('create_archive'), Permission::findByName('read_archive'),  Permission::findByName('update_archive'),  Permission::findByName('delete_archive'),
            Permission::findByName('read_gallery')
        ]);

        //berikan hak akses ke wakil ketua umum
        $viceChairmanRole = Role::findByName('vice_chairman');
        $viceChairmanRole->givePermissionTo([
            Permission::findByName('read_site_setting'), Permission::findByName('update_site_setting'),
            Permission::findByName('create_blog_post'), Permission::findByName('read_blog_post'), Permission::findByName('update_blog_post'), Permission::findByName('delete_blog_post'),
            Permission::findByName('read_blog_category'),
            Permission::findByName('read_blog_comment'),
            Permission::findByName('read_member'),
            Permission::findByName('read_period'),
            Permission::findByName('read_force'),
            Permission::findByName('read_division'),
            Permission::findByName('read_position'),
            Permission::findByName('read_staff'),
            Permission::findByName('read_mail'),
            Permission::findByName('read_inventory'),
            Permission::findByName('read_finance'),
            Permission::findByName('read_form'),
            Permission::findByName('create_archive'), Permission::findByName('read_archive'),  Permission::findByName('update_archive'),  Permission::findByName('delete_archive'),
            Permission::findByName('read_gallery')
        ]);

        //berikan hak akses ke sekretaris
        $secretaryRole = Role::findByName('secretary');
        $secretaryRole->givePermissionTo([
            Permission::findByName('read_site_setting'), Permission::findByName('update_site_setting'),
            Permission::findByName('create_blog_post'), Permission::findByName('read_blog_post'), Permission::findByName('update_blog_post'), Permission::findByName('delete_blog_post'),
            Permission::findByName('create_blog_category'), Permission::findByName('read_blog_category'), Permission::findByName('update_blog_category'), Permission::findByName('delete_blog_category'),
            Permission::findByName('read_blog_comment'), Permission::findByName('delete_blog_comment'),
            Permission::findByName('create_member'), Permission::findByName('read_member'), Permission::findByName('update_member'), Permission::findByName('delete_member'),
            Permission::findByName('create_period'), Permission::findByName('read_period'), Permission::findByName('update_period'), Permission::findByName('delete_period'),
            Permission::findByName('create_force'), Permission::findByName('read_force'), Permission::findByName('update_force'), Permission::findByName('delete_force'),
            Permission::findByName('create_division'), Permission::findByName('read_division'), Permission::findByName('update_division'), Permission::findByName('delete_division'),
            Permission::findByName('create_position'), Permission::findByName('read_position'), Permission::findByName('update_position'), Permission::findByName('delete_position'),
            Permission::findByName('create_staff'), Permission::findByName('read_staff'), Permission::findByName('update_staff'), Permission::findByName('delete_staff'),
            Permission::findByName('create_mail'), Permission::findByName('read_mail'), Permission::findByName('update_mail'), Permission::findByName('delete_mail'),
            Permission::findByName('create_inventory'), Permission::findByName('read_inventory'), Permission::findByName('update_inventory'), Permission::findByName('delete_inventory'),
            Permission::findByName('create_form'), Permission::findByName('read_form'), Permission::findByName('update_form'), Permission::findByName('delete_form'),
            Permission::findByName('create_archive'), Permission::findByName('read_archive'),  Permission::findByName('update_archive'),  Permission::findByName('delete_archive'),
            Permission::findByName('create_gallery'), Permission::findByName('read_gallery'),  Permission::findByName('update_gallery'),  Permission::findByName('delete_gallery'),
            // Permission::findByName('create_certificate'),
            // Permission::findByName('read_certificate'),
            // Permission::findByName('update_certificate'),
            // Permission::findByName('delete_certificate'),
            // Permission::findByName('send_certificate')
        ]);

        //berikan hak akses ke bendahara
        $treasurerRole = Role::findByName('treasurer');
        $treasurerRole->givePermissionTo([
            Permission::findByName('create_blog_post'), Permission::findByName('read_blog_post'), Permission::findByName('update_blog_post'), Permission::findByName('delete_blog_post'),
            Permission::findByName('read_blog_category'),
            Permission::findByName('read_blog_comment'),
            Permission::findByName('read_inventory'),
            Permission::findByName('create_finance'), Permission::findByName('read_finance'), Permission::findByName('update_finance'), Permission::findByName('delete_finance'),
            Permission::findByName('create_form'), Permission::findByName('read_form'),
            Permission::findByName('create_archive'), Permission::findByName('read_archive'),  Permission::findByName('update_archive'),  Permission::findByName('delete_archive'),
            Permission::findByName('read_gallery')
        ]);

        //berikan hak akses ke kepala bidang
        $headOfDivisionRole = Role::findByName('head_of_division');
        $headOfDivisionRole->givePermissionTo([
            Permission::findByName('create_blog_post'), Permission::findByName('read_blog_post'), Permission::findByName('update_blog_post'), Permission::findByName('delete_blog_post'),
            Permission::findByName('read_blog_category'),
            Permission::findByName('read_blog_comment'),
            Permission::findByName('read_member'),
            Permission::findByName('read_period'),
            Permission::findByName('read_force'),
            Permission::findByName('read_division'),
            Permission::findByName('read_position'),
            Permission::findByName('read_staff'),
            Permission::findByName('read_inventory'),
            Permission::findByName('create_form'), Permission::findByName('read_form'), Permission::findByName('update_form'), Permission::findByName('delete_form'),
            Permission::findByName('create_archive'), Permission::findByName('read_archive'),  Permission::findByName('update_archive'),  Permission::findByName('delete_archive'),
            Permission::findByName('create_gallery'), Permission::findByName('read_gallery'),  Permission::findByName('update_gallery'),  Permission::findByName('delete_gallery')
        ]);

        //berikan hak akses ke pengurus
        $staffRole = Role::findByName('staff');
        $staffRole->givePermissionTo([
            Permission::findByName('create_blog_post'), Permission::findByName('read_blog_post'), Permission::findByName('update_blog_post'), Permission::findByName('delete_blog_post'),
            Permission::findByName('read_blog_category'),
            Permission::findByName('read_blog_comment'),
            Permission::findByName('read_inventory'),
            Permission::findByName('create_archive'), Permission::findByName('read_archive'),  Permission::findByName('update_archive'),  Permission::findByName('delete_archive'),
            Permission::findByName('read_gallery')
        ]);

        //berikan hak akses ke anggota
        $memberRole = Role::findByName('member');
        $memberRole->givePermissionTo([
            Permission::findByName('create_blog_post'), Permission::findByName('read_blog_post'), Permission::findByName('update_blog_post'), Permission::findByName('delete_blog_post'),
            Permission::findByName('read_blog_category'),
            Permission::findByName('read_blog_comment'),
            Permission::findByName('read_inventory'),
            Permission::findByName('read_gallery')
        ]);
    }
}
