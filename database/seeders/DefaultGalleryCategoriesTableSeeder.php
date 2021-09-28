<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DefaultGalleryCategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('gallery_categories')->delete();
        
        \DB::table('gallery_categories')->insert(array (
            0 => 
            array (
                'id' => 1,
                'slug' => 'tak-berkategori',
                'name' => 'Tak Berkategori',
                'display' => 0,
            ),
            1 => 
            array (
                'id' => 2,
                'slug' => 'kegiatan-1',
                'name' => 'Kegiatan 1',
                'display' => 1,
            ),
        ));
        
        
    }
}