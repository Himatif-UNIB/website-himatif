<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DefaultForcesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('forces')->delete();
        
        \DB::table('forces')->insert(array (
            0 => 
            array (
                'id' => 1,
                'year' => 2021,
                'name' => 'Angkatan 2021',
            ),
            1 => 
            array (
                'id' => 2,
                'year' => 2020,
                'name' => '2020',
            ),
            2 => 
            array (
                'id' => 3,
                'year' => 2019,
                'name' => 'GEZNINE',
            ),
            3 => 
            array (
                'id' => 4,
                'year' => 2018,
                'name' => 'FORANDALS',
            ),
            4 => 
            array (
                'id' => 5,
                'year' => 2017,
                'name' => 'The Next Informatics',
            ),
        ));
        
        
    }
}