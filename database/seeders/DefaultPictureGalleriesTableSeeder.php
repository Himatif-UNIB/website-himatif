<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DefaultPictureGalleriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('picture_galleries')->delete();
        
        \DB::table('picture_galleries')->insert(array (
            0 => 
            array (
                'id' => 1,
                'user_id' => 77,
                'title' => 'Wallpaper',
                'slug' => 'wallpaper',
                'description' => NULL,
                'status' => 'publish',
                'created_at' => '2021-02-23 10:19:56',
                'updated_at' => '2021-02-23 10:22:13',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'user_id' => 3,
                'title' => 'Himatif Test',
                'slug' => 'himatif-test',
                'description' => '<p>Lorem ipsum dolor sit amet consectetur</p>',
                'status' => 'draft',
                'created_at' => '2021-02-27 01:50:39',
                'updated_at' => '2021-02-27 01:50:39',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}