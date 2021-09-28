<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DefaultRolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('roles')->delete();
        
        \DB::table('roles')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'super_admin',
                'label' => 'Super Admin',
                'guard_name' => 'web',
                'created_at' => '2021-02-23 03:19:56',
                'updated_at' => '2021-02-23 03:19:56',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'builder',
                'label' => 'Pembina',
                'guard_name' => 'web',
                'created_at' => '2021-02-23 03:19:56',
                'updated_at' => '2021-02-23 03:19:56',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'dpo',
                'label' => 'Dewan Penasehat Organisasi',
                'guard_name' => 'web',
                'created_at' => '2021-02-23 03:19:56',
                'updated_at' => '2021-02-23 03:19:56',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'bpo',
                'label' => 'Badan Penasehat Organisasi',
                'guard_name' => 'web',
                'created_at' => '2021-02-23 03:19:56',
                'updated_at' => '2021-02-23 03:19:56',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'chairman',
                'label' => 'Ketua Umum',
                'guard_name' => 'web',
                'created_at' => '2021-02-23 03:19:56',
                'updated_at' => '2021-02-23 03:19:56',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'vice_chairman',
                'label' => 'Wakil Ketua Umum',
                'guard_name' => 'web',
                'created_at' => '2021-02-23 03:19:56',
                'updated_at' => '2021-02-23 03:19:56',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'secretary',
                'label' => 'Sekretaris',
                'guard_name' => 'web',
                'created_at' => '2021-02-23 03:19:56',
                'updated_at' => '2021-02-23 03:19:56',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'treasurer',
                'label' => 'Bendahara',
                'guard_name' => 'web',
                'created_at' => '2021-02-23 03:19:56',
                'updated_at' => '2021-02-23 03:19:56',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'head_of_division',
                'label' => 'Kepala Divisi',
                'guard_name' => 'web',
                'created_at' => '2021-02-23 03:19:56',
                'updated_at' => '2021-02-23 03:19:56',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'staff',
                'label' => 'Pengurus / Staff',
                'guard_name' => 'web',
                'created_at' => '2021-02-23 03:19:56',
                'updated_at' => '2021-02-23 03:19:56',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'member',
                'label' => 'Anggota',
                'guard_name' => 'web',
                'created_at' => '2021-02-23 03:19:56',
                'updated_at' => '2021-02-23 03:19:56',
            ),
        ));
        
        
    }
}