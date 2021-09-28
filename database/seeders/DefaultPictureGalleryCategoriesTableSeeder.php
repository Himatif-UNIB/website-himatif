<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DefaultPictureGalleryCategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('picture_gallery_categories')->delete();
        
        \DB::table('picture_gallery_categories')->insert(array (
            0 => 
            array (
                'id' => 1,
                'category_id' => 2,
                'gallery_id' => 1,
            ),
            1 => 
            array (
                'id' => 2,
                'category_id' => 2,
                'gallery_id' => 2,
            ),
        ));
        
        
    }
}