<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DefaultFormsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('forms')->delete();
        
        \DB::table('forms')->insert(array (
            0 => 
            array (
                'id' => 1,
                'user_id' => 3,
                'title' => 'Pendaftaran IT Class',
                'slug' => 'pendaftaran-it-class',
                'bitly_link' => NULL,
                'description' => NULL,
                'post_message' => NULL,
                'max_fill_date' => NULL,
                'max_fill_answer' => NULL,
                'status' => 1,
                'publish_at' => NULL,
                'closed_at' => NULL,
                'created_at' => '2021-02-25 02:49:10',
                'updated_at' => '2021-02-25 02:49:10',
            ),
            1 => 
            array (
                'id' => 2,
                'user_id' => 3,
                'title' => 'Pendaftaran IT Class 2',
                'slug' => 'pendaftaran-it-class-2',
                'bitly_link' => NULL,
                'description' => NULL,
                'post_message' => NULL,
                'max_fill_date' => NULL,
                'max_fill_answer' => NULL,
                'status' => 1,
                'publish_at' => NULL,
                'closed_at' => NULL,
                'created_at' => '2021-02-25 02:51:13',
                'updated_at' => '2021-02-25 02:51:13',
            ),
        ));
        
        
    }
}