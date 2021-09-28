<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DefaultPermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('permissions')->delete();
        
        \DB::table('permissions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'create_user',
                'label' => 'Menambah User',
                'guard_name' => 'web',
                'created_at' => '2021-02-23 03:19:56',
                'updated_at' => '2021-02-23 03:19:56',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'read_user',
                'label' => 'Melihat User',
                'guard_name' => 'web',
                'created_at' => '2021-02-23 03:19:56',
                'updated_at' => '2021-02-23 03:19:56',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'update_user',
                'label' => 'Mengubah User',
                'guard_name' => 'web',
                'created_at' => '2021-02-23 03:19:56',
                'updated_at' => '2021-02-23 03:19:56',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'delete_user',
                'label' => 'Menghapus User',
                'guard_name' => 'web',
                'created_at' => '2021-02-23 03:19:56',
                'updated_at' => '2021-02-23 03:19:56',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'create_site_setting',
                'label' => 'Menambah Pengaturan Situs',
                'guard_name' => 'web',
                'created_at' => '2021-02-23 03:19:56',
                'updated_at' => '2021-02-23 03:19:56',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'read_site_setting',
                'label' => 'Melihat Pengaturan Situs',
                'guard_name' => 'web',
                'created_at' => '2021-02-23 03:19:56',
                'updated_at' => '2021-02-23 03:19:56',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'update_site_setting',
                'label' => 'Mengubah User',
                'guard_name' => 'web',
                'created_at' => '2021-02-23 03:19:56',
                'updated_at' => '2021-02-23 03:19:56',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'delete_site_setting',
                'label' => 'Menghapus Pengaturan Situs',
                'guard_name' => 'web',
                'created_at' => '2021-02-23 03:19:56',
                'updated_at' => '2021-02-23 03:19:56',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'create_blog_post',
                'label' => 'Menambah Posting Blog',
                'guard_name' => 'web',
                'created_at' => '2021-02-23 03:19:56',
                'updated_at' => '2021-02-23 03:19:56',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'read_blog_post',
                'label' => 'Melihat Posting Blog',
                'guard_name' => 'web',
                'created_at' => '2021-02-23 03:19:56',
                'updated_at' => '2021-02-23 03:19:56',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'update_blog_post',
                'label' => 'Mengubah Posting Blog',
                'guard_name' => 'web',
                'created_at' => '2021-02-23 03:19:56',
                'updated_at' => '2021-02-23 03:19:56',
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'delete_blog_post',
                'label' => 'Menghapus Posting Blog',
                'guard_name' => 'web',
                'created_at' => '2021-02-23 03:19:56',
                'updated_at' => '2021-02-23 03:19:56',
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'create_blog_category',
                'label' => 'Menambah Kategori Blog',
                'guard_name' => 'web',
                'created_at' => '2021-02-23 03:19:56',
                'updated_at' => '2021-02-23 03:19:56',
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'read_blog_category',
                'label' => 'Melihat Kategori Blog',
                'guard_name' => 'web',
                'created_at' => '2021-02-23 03:19:56',
                'updated_at' => '2021-02-23 03:19:56',
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'update_blog_category',
                'label' => 'Mengubah Kategori Blog',
                'guard_name' => 'web',
                'created_at' => '2021-02-23 03:19:56',
                'updated_at' => '2021-02-23 03:19:56',
            ),
            15 => 
            array (
                'id' => 16,
                'name' => 'delete_blog_category',
                'label' => 'Menghapus Kategori Blog',
                'guard_name' => 'web',
                'created_at' => '2021-02-23 03:19:56',
                'updated_at' => '2021-02-23 03:19:56',
            ),
            16 => 
            array (
                'id' => 17,
                'name' => 'create_blog_comment',
                'label' => 'Menambah Komentar Posting Blog',
                'guard_name' => 'web',
                'created_at' => '2021-02-23 03:19:56',
                'updated_at' => '2021-02-23 03:19:56',
            ),
            17 => 
            array (
                'id' => 18,
                'name' => 'read_blog_comment',
                'label' => 'Melihat Komentar Posting Blog',
                'guard_name' => 'web',
                'created_at' => '2021-02-23 03:19:56',
                'updated_at' => '2021-02-23 03:19:56',
            ),
            18 => 
            array (
                'id' => 19,
                'name' => 'update_blog_comment',
                'label' => 'Mengubah Komentar Posting BLog',
                'guard_name' => 'web',
                'created_at' => '2021-02-23 03:19:56',
                'updated_at' => '2021-02-23 03:19:56',
            ),
            19 => 
            array (
                'id' => 20,
                'name' => 'delete_blog_comment',
                'label' => 'Menghapus Komentar Posting Blog',
                'guard_name' => 'web',
                'created_at' => '2021-02-23 03:19:56',
                'updated_at' => '2021-02-23 03:19:56',
            ),
            20 => 
            array (
                'id' => 21,
                'name' => 'create_member',
                'label' => 'Menambah Anggota',
                'guard_name' => 'web',
                'created_at' => '2021-02-23 03:19:56',
                'updated_at' => '2021-02-23 03:19:56',
            ),
            21 => 
            array (
                'id' => 22,
                'name' => 'read_member',
                'label' => 'Melihat Anggota',
                'guard_name' => 'web',
                'created_at' => '2021-02-23 03:19:56',
                'updated_at' => '2021-02-23 03:19:56',
            ),
            22 => 
            array (
                'id' => 23,
                'name' => 'update_member',
                'label' => 'Mengubah Anggota',
                'guard_name' => 'web',
                'created_at' => '2021-02-23 03:19:56',
                'updated_at' => '2021-02-23 03:19:56',
            ),
            23 => 
            array (
                'id' => 24,
                'name' => 'delete_member',
                'label' => 'Menghapus Anggota',
                'guard_name' => 'web',
                'created_at' => '2021-02-23 03:19:56',
                'updated_at' => '2021-02-23 03:19:56',
            ),
            24 => 
            array (
                'id' => 25,
                'name' => 'create_period',
                'label' => 'Menambah Periode',
                'guard_name' => 'web',
                'created_at' => '2021-02-23 03:19:56',
                'updated_at' => '2021-02-23 03:19:56',
            ),
            25 => 
            array (
                'id' => 26,
                'name' => 'read_period',
                'label' => 'Melihat Periode',
                'guard_name' => 'web',
                'created_at' => '2021-02-23 03:19:56',
                'updated_at' => '2021-02-23 03:19:56',
            ),
            26 => 
            array (
                'id' => 27,
                'name' => 'update_period',
                'label' => 'Mengubah Periode',
                'guard_name' => 'web',
                'created_at' => '2021-02-23 03:19:56',
                'updated_at' => '2021-02-23 03:19:56',
            ),
            27 => 
            array (
                'id' => 28,
                'name' => 'delete_period',
                'label' => 'Menghapus Periode',
                'guard_name' => 'web',
                'created_at' => '2021-02-23 03:19:56',
                'updated_at' => '2021-02-23 03:19:56',
            ),
            28 => 
            array (
                'id' => 29,
                'name' => 'create_force',
                'label' => 'Menambah Angkatan',
                'guard_name' => 'web',
                'created_at' => '2021-02-23 03:19:56',
                'updated_at' => '2021-02-23 03:19:56',
            ),
            29 => 
            array (
                'id' => 30,
                'name' => 'read_force',
                'label' => 'Melihat Angkatan',
                'guard_name' => 'web',
                'created_at' => '2021-02-23 03:19:56',
                'updated_at' => '2021-02-23 03:19:56',
            ),
            30 => 
            array (
                'id' => 31,
                'name' => 'update_force',
                'label' => 'Mengubah Angkatan',
                'guard_name' => 'web',
                'created_at' => '2021-02-23 03:19:56',
                'updated_at' => '2021-02-23 03:19:56',
            ),
            31 => 
            array (
                'id' => 32,
                'name' => 'delete_force',
                'label' => 'Menghapus Angkatan',
                'guard_name' => 'web',
                'created_at' => '2021-02-23 03:19:56',
                'updated_at' => '2021-02-23 03:19:56',
            ),
            32 => 
            array (
                'id' => 33,
                'name' => 'create_division',
                'label' => 'Menambah Divisi',
                'guard_name' => 'web',
                'created_at' => '2021-02-23 03:19:56',
                'updated_at' => '2021-02-23 03:19:56',
            ),
            33 => 
            array (
                'id' => 34,
                'name' => 'read_division',
                'label' => 'Melihat Divisi',
                'guard_name' => 'web',
                'created_at' => '2021-02-23 03:19:56',
                'updated_at' => '2021-02-23 03:19:56',
            ),
            34 => 
            array (
                'id' => 35,
                'name' => 'update_division',
                'label' => 'Mengubah Divisi',
                'guard_name' => 'web',
                'created_at' => '2021-02-23 03:19:56',
                'updated_at' => '2021-02-23 03:19:56',
            ),
            35 => 
            array (
                'id' => 36,
                'name' => 'delete_division',
                'label' => 'Menghapus Divisi',
                'guard_name' => 'web',
                'created_at' => '2021-02-23 03:19:56',
                'updated_at' => '2021-02-23 03:19:56',
            ),
            36 => 
            array (
                'id' => 37,
                'name' => 'create_position',
                'label' => 'Menambah Jabatan',
                'guard_name' => 'web',
                'created_at' => '2021-02-23 03:19:56',
                'updated_at' => '2021-02-23 03:19:56',
            ),
            37 => 
            array (
                'id' => 38,
                'name' => 'read_position',
                'label' => 'Melihat Jabatan',
                'guard_name' => 'web',
                'created_at' => '2021-02-23 03:19:56',
                'updated_at' => '2021-02-23 03:19:56',
            ),
            38 => 
            array (
                'id' => 39,
                'name' => 'update_position',
                'label' => 'Mengubah Jabatan',
                'guard_name' => 'web',
                'created_at' => '2021-02-23 03:19:56',
                'updated_at' => '2021-02-23 03:19:56',
            ),
            39 => 
            array (
                'id' => 40,
                'name' => 'delete_position',
                'label' => 'Menghapus Jabatan',
                'guard_name' => 'web',
                'created_at' => '2021-02-23 03:19:56',
                'updated_at' => '2021-02-23 03:19:56',
            ),
            40 => 
            array (
                'id' => 41,
                'name' => 'create_staff',
                'label' => 'Menambah Pengurus / Staff',
                'guard_name' => 'web',
                'created_at' => '2021-02-23 03:19:56',
                'updated_at' => '2021-02-23 03:19:56',
            ),
            41 => 
            array (
                'id' => 42,
                'name' => 'read_staff',
                'label' => 'Melihat Pengurus / Staff',
                'guard_name' => 'web',
                'created_at' => '2021-02-23 03:19:56',
                'updated_at' => '2021-02-23 03:19:56',
            ),
            42 => 
            array (
                'id' => 43,
                'name' => 'update_staff',
                'label' => 'Mengubah Pengurus / Staff',
                'guard_name' => 'web',
                'created_at' => '2021-02-23 03:19:56',
                'updated_at' => '2021-02-23 03:19:56',
            ),
            43 => 
            array (
                'id' => 44,
                'name' => 'delete_staff',
                'label' => 'Menghapus Pengurus / Staff',
                'guard_name' => 'web',
                'created_at' => '2021-02-23 03:19:56',
                'updated_at' => '2021-02-23 03:19:56',
            ),
            44 => 
            array (
                'id' => 45,
                'name' => 'create_mail',
                'label' => 'Menambah Surat Menyurat',
                'guard_name' => 'web',
                'created_at' => '2021-02-23 03:19:56',
                'updated_at' => '2021-02-23 03:19:56',
            ),
            45 => 
            array (
                'id' => 46,
                'name' => 'read_mail',
                'label' => 'Melihat Surat Menyurat',
                'guard_name' => 'web',
                'created_at' => '2021-02-23 03:19:56',
                'updated_at' => '2021-02-23 03:19:56',
            ),
            46 => 
            array (
                'id' => 47,
                'name' => 'update_mail',
                'label' => 'Mengubah Surat Menyurat',
                'guard_name' => 'web',
                'created_at' => '2021-02-23 03:19:56',
                'updated_at' => '2021-02-23 03:19:56',
            ),
            47 => 
            array (
                'id' => 48,
                'name' => 'delete_mail',
                'label' => 'Menghapus Surat Menyurat',
                'guard_name' => 'web',
                'created_at' => '2021-02-23 03:19:56',
                'updated_at' => '2021-02-23 03:19:56',
            ),
            48 => 
            array (
                'id' => 49,
                'name' => 'create_inventory',
                'label' => 'Menambah Inventaris',
                'guard_name' => 'web',
                'created_at' => '2021-02-23 03:19:56',
                'updated_at' => '2021-02-23 03:19:56',
            ),
            49 => 
            array (
                'id' => 50,
                'name' => 'read_inventory',
                'label' => 'Melihat Inventaris',
                'guard_name' => 'web',
                'created_at' => '2021-02-23 03:19:56',
                'updated_at' => '2021-02-23 03:19:56',
            ),
            50 => 
            array (
                'id' => 51,
                'name' => 'update_inventory',
                'label' => 'Mengubah Inventaris',
                'guard_name' => 'web',
                'created_at' => '2021-02-23 03:19:56',
                'updated_at' => '2021-02-23 03:19:56',
            ),
            51 => 
            array (
                'id' => 52,
                'name' => 'delete_inventory',
                'label' => 'Menghapus Inventaris',
                'guard_name' => 'web',
                'created_at' => '2021-02-23 03:19:56',
                'updated_at' => '2021-02-23 03:19:56',
            ),
            52 => 
            array (
                'id' => 53,
                'name' => 'create_finance',
                'label' => 'Menambah Keuangan',
                'guard_name' => 'web',
                'created_at' => '2021-02-23 03:19:56',
                'updated_at' => '2021-02-23 03:19:56',
            ),
            53 => 
            array (
                'id' => 54,
                'name' => 'read_finance',
                'label' => 'Melihat Keuangan',
                'guard_name' => 'web',
                'created_at' => '2021-02-23 03:19:56',
                'updated_at' => '2021-02-23 03:19:56',
            ),
            54 => 
            array (
                'id' => 55,
                'name' => 'update_finance',
                'label' => 'Mengubah Keuangan',
                'guard_name' => 'web',
                'created_at' => '2021-02-23 03:19:56',
                'updated_at' => '2021-02-23 03:19:56',
            ),
            55 => 
            array (
                'id' => 56,
                'name' => 'delete_finance',
                'label' => 'Menghapus Keuangan',
                'guard_name' => 'web',
                'created_at' => '2021-02-23 03:19:56',
                'updated_at' => '2021-02-23 03:19:56',
            ),
            56 => 
            array (
                'id' => 57,
                'name' => 'create_form',
                'label' => 'Menambah Formulir',
                'guard_name' => 'web',
                'created_at' => '2021-02-23 03:19:56',
                'updated_at' => '2021-02-23 03:19:56',
            ),
            57 => 
            array (
                'id' => 58,
                'name' => 'read_form',
                'label' => 'Melihat Formulir',
                'guard_name' => 'web',
                'created_at' => '2021-02-23 03:19:56',
                'updated_at' => '2021-02-23 03:19:56',
            ),
            58 => 
            array (
                'id' => 59,
                'name' => 'update_form',
                'label' => 'Mengubah Formulir',
                'guard_name' => 'web',
                'created_at' => '2021-02-23 03:19:56',
                'updated_at' => '2021-02-23 03:19:56',
            ),
            59 => 
            array (
                'id' => 60,
                'name' => 'delete_form',
                'label' => 'Menghapus Formulir',
                'guard_name' => 'web',
                'created_at' => '2021-02-23 03:19:56',
                'updated_at' => '2021-02-23 03:19:56',
            ),
            60 => 
            array (
                'id' => 61,
                'name' => 'create_archive',
                'label' => 'Menambah File dan Arsip',
                'guard_name' => 'web',
                'created_at' => '2021-02-23 03:19:56',
                'updated_at' => '2021-02-23 03:19:56',
            ),
            61 => 
            array (
                'id' => 62,
                'name' => 'read_archive',
                'label' => 'Melihat File dan Arsip',
                'guard_name' => 'web',
                'created_at' => '2021-02-23 03:19:56',
                'updated_at' => '2021-02-23 03:19:56',
            ),
            62 => 
            array (
                'id' => 63,
                'name' => 'update_archive',
                'label' => 'Mengubah File dan Arsip',
                'guard_name' => 'web',
                'created_at' => '2021-02-23 03:19:56',
                'updated_at' => '2021-02-23 03:19:56',
            ),
            63 => 
            array (
                'id' => 64,
                'name' => 'delete_archive',
                'label' => 'Menghapus File dan Arsip',
                'guard_name' => 'web',
                'created_at' => '2021-02-23 03:19:56',
                'updated_at' => '2021-02-23 03:19:56',
            ),
            64 => 
            array (
                'id' => 65,
                'name' => 'create_gallery',
                'label' => 'Menambah Galeri Foto',
                'guard_name' => 'web',
                'created_at' => '2021-02-23 03:19:56',
                'updated_at' => '2021-02-23 03:19:56',
            ),
            65 => 
            array (
                'id' => 66,
                'name' => 'read_gallery',
                'label' => 'Melihat Galeri Foto',
                'guard_name' => 'web',
                'created_at' => '2021-02-23 03:19:56',
                'updated_at' => '2021-02-23 03:19:56',
            ),
            66 => 
            array (
                'id' => 67,
                'name' => 'update_gallery',
                'label' => 'Mengubah Galeri Foto',
                'guard_name' => 'web',
                'created_at' => '2021-02-23 03:19:56',
                'updated_at' => '2021-02-23 03:19:56',
            ),
            67 => 
            array (
                'id' => 68,
                'name' => 'delete_gallery',
                'label' => 'Menghapus Galeri Foto',
                'guard_name' => 'web',
                'created_at' => '2021-02-23 03:19:56',
                'updated_at' => '2021-02-23 03:19:56',
            ),
        ));
        
        
    }
}