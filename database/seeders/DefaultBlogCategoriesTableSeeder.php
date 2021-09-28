<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DefaultBlogCategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('blog_categories')->delete();
        
        \DB::table('blog_categories')->insert(array (
            0 => 
            array (
                'id' => 1,
                'slug' => 'kegiatan',
                'name' => 'Kegiatan',
                'display' => 1,
            ),
            1 => 
            array (
                'id' => 2,
                'slug' => 'pengumuman',
                'name' => 'Pengumuman',
                'display' => 1,
            ),
            2 => 
            array (
                'id' => 3,
                'slug' => 'artikel',
                'name' => 'Artikel',
                'display' => 1,
            ),
        ));
        
        
    }
}