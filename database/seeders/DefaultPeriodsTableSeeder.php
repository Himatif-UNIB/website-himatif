<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DefaultPeriodsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('periods')->delete();
        
        \DB::table('periods')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => '2020 / 2021',
                'is_active' => 1,
            ),
        ));
        
        
    }
}