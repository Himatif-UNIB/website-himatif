<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DefaultDivisionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('divisions')->delete();
        
        \DB::table('divisions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Kerohanian',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Kewirausahaan',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Minat dan Bakat',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Information and Technology',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Pengabdian Masyarakat',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Pengembangan Sumber Daya Manusia',
            ),
        ));
        
        
    }
}