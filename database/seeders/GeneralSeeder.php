<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GeneralSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $year = now()->year;
        
        DB::table('periods')->insertOrIgnore([
            'name' => $year,
            'is_active' => true
        ]);

        DB::table('forces')->insertOrIgnore([
            'name' => 'Angkatan '. $year,
            'year' => $year
        ]);
    }
}
