<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DefaultPositionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('positions')->delete();
        
        \DB::table('positions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'parent_id' => NULL,
                'division_id' => NULL,
                'order_level' => 1,
                'name' => 'Pembina',
                'role_name' => 'builder',
            ),
            1 => 
            array (
                'id' => 2,
                'parent_id' => NULL,
                'division_id' => NULL,
                'order_level' => 2,
                'name' => 'Ketua Umum',
                'role_name' => 'chairman',
            ),
            2 => 
            array (
                'id' => 3,
                'parent_id' => NULL,
                'division_id' => NULL,
                'order_level' => 2,
                'name' => 'Wakil Ketua Umum',
                'role_name' => 'vice_chairman',
            ),
            3 => 
            array (
                'id' => 4,
                'parent_id' => NULL,
                'division_id' => NULL,
                'order_level' => 3,
                'name' => 'Dewan Penasehat Organisasi',
                'role_name' => 'dpo',
            ),
            4 => 
            array (
                'id' => 5,
                'parent_id' => NULL,
                'division_id' => NULL,
                'order_level' => 4,
                'name' => 'Badan Pertimbangan Organisasi',
                'role_name' => 'bpo',
            ),
            5 => 
            array (
                'id' => 6,
                'parent_id' => NULL,
                'division_id' => NULL,
                'order_level' => 5,
                'name' => 'Sekretaris',
                'role_name' => 'secretary',
            ),
            6 => 
            array (
                'id' => 7,
                'parent_id' => NULL,
                'division_id' => NULL,
                'order_level' => 5,
                'name' => 'Bendahara',
                'role_name' => 'treasurer',
            ),
            7 => 
            array (
                'id' => 8,
                'parent_id' => NULL,
                'division_id' => NULL,
                'order_level' => 6,
                'name' => 'Biro Kestari',
                'role_name' => 'head_of_division',
            ),
            8 => 
            array (
                'id' => 9,
                'parent_id' => NULL,
                'division_id' => NULL,
                'order_level' => 6,
                'name' => 'Biro Dana Usaha',
                'role_name' => 'head_of_division',
            ),
            9 => 
            array (
                'id' => 10,
                'parent_id' => NULL,
                'division_id' => 1,
                'order_level' => 7,
                'name' => 'Kepala Bidang Kerohanian',
                'role_name' => 'head_of_division',
            ),
            10 => 
            array (
                'id' => 11,
                'parent_id' => NULL,
                'division_id' => 2,
                'order_level' => 7,
                'name' => 'Kepala Bidang Kewirausahaan',
                'role_name' => 'head_of_division',
            ),
            11 => 
            array (
                'id' => 12,
                'parent_id' => NULL,
                'division_id' => 3,
                'order_level' => 7,
                'name' => 'Kepala Bidang Minat dan Bakat',
                'role_name' => 'head_of_division',
            ),
            12 => 
            array (
                'id' => 13,
                'parent_id' => NULL,
                'division_id' => 4,
                'order_level' => 7,
                'name' => 'Kepala Bidang IT',
                'role_name' => 'head_of_division',
            ),
            13 => 
            array (
                'id' => 14,
                'parent_id' => NULL,
                'division_id' => 5,
                'order_level' => 7,
                'name' => 'Kepala Bidang Pengabdian Masyarakat',
                'role_name' => 'head_of_division',
            ),
            14 => 
            array (
                'id' => 15,
                'parent_id' => NULL,
                'division_id' => 6,
                'order_level' => 7,
                'name' => 'Kepala Bidang PSDM',
                'role_name' => 'head_of_division',
            ),
            15 => 
            array (
                'id' => 16,
                'parent_id' => 10,
                'division_id' => 1,
                'order_level' => 8,
                'name' => 'Anggota Bidang Kerohanian',
                'role_name' => 'staff',
            ),
            16 => 
            array (
                'id' => 17,
                'parent_id' => 11,
                'division_id' => 2,
                'order_level' => 8,
                'name' => 'Anggota Bidang Kewirausahaan',
                'role_name' => 'staff',
            ),
            17 => 
            array (
                'id' => 18,
                'parent_id' => 12,
                'division_id' => 3,
                'order_level' => 8,
                'name' => 'Anggota Bidang Minat dan Bakat',
                'role_name' => 'staff',
            ),
            18 => 
            array (
                'id' => 19,
                'parent_id' => 13,
                'division_id' => 4,
                'order_level' => 8,
                'name' => 'Anggota Bidang IT',
                'role_name' => 'staff',
            ),
            19 => 
            array (
                'id' => 20,
                'parent_id' => 14,
                'division_id' => 5,
                'order_level' => 8,
                'name' => 'Anggota Bidang Pengabdian Masyarakat',
                'role_name' => 'staff',
            ),
            20 => 
            array (
                'id' => 21,
                'parent_id' => 15,
                'division_id' => 6,
                'order_level' => 8,
                'name' => 'Anggota Bidang PSDM',
                'role_name' => 'staff',
            ),
        ));
        
        
    }
}