<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DefaultBlogCommentsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('blog_comments')->delete();
        
        \DB::table('blog_comments')->insert(array (
            0 => 
            array (
                'id' => 1,
                'parent_id' => NULL,
                'user_id' => 77,
                'post_id' => 1,
                'name' => 'DWI LESTARI',
                'email' => 'G1A018087@default.test',
                'website' => NULL,
                'content' => 'gtest',
                'status' => 'approved',
                'created_at' => '2021-02-23 10:30:20',
                'updated_at' => '2021-02-23 10:30:20',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'parent_id' => NULL,
                'user_id' => 77,
                'post_id' => 1,
                'name' => 'DWI LESTARI',
                'email' => 'G1A018087@default.test',
                'website' => NULL,
                'content' => 'halo',
                'status' => 'approved',
                'created_at' => '2021-02-23 10:30:25',
                'updated_at' => '2021-02-23 10:30:25',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'parent_id' => 1,
                'user_id' => 77,
                'post_id' => 1,
                'name' => 'DWI LESTARI',
                'email' => 'G1A018087@default.test',
                'website' => NULL,
                'content' => 'baris baru',
                'status' => 'approved',
                'created_at' => '2021-02-23 10:30:32',
                'updated_at' => '2021-02-23 10:30:32',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'parent_id' => 1,
                'user_id' => 77,
                'post_id' => 1,
                'name' => 'DWI LESTARI',
                'email' => 'G1A018087@default.test',
                'website' => NULL,
                'content' => 'wkwk',
                'status' => 'approved',
                'created_at' => '2021-02-23 10:30:38',
                'updated_at' => '2021-02-23 10:30:38',
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'parent_id' => NULL,
                'user_id' => 71,
                'post_id' => 1,
                'name' => 'ELLEN THERESIA  NADEAK',
                'email' => 'G1A018080@default.test',
                'website' => NULL,
                'content' => 'why',
                'status' => 'approved',
                'created_at' => '2021-02-23 10:30:54',
                'updated_at' => '2021-02-23 10:30:54',
                'deleted_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'parent_id' => 2,
                'user_id' => 77,
                'post_id' => 1,
                'name' => 'DWI LESTARI',
                'email' => 'G1A018087@default.test',
                'website' => NULL,
                'content' => 'sd',
                'status' => 'approved',
                'created_at' => '2021-02-23 10:32:16',
                'updated_at' => '2021-02-23 10:32:16',
                'deleted_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'parent_id' => 5,
                'user_id' => 77,
                'post_id' => 1,
                'name' => 'DWI LESTARI',
                'email' => 'G1A018087@default.test',
                'website' => NULL,
                'content' => 'halo',
                'status' => 'approved',
                'created_at' => '2021-02-23 10:36:47',
                'updated_at' => '2021-02-23 10:36:47',
                'deleted_at' => NULL,
            ),
            7 => 
            array (
                'id' => 9,
                'parent_id' => NULL,
                'user_id' => NULL,
                'post_id' => 1,
                'name' => 'Wahyu',
                'email' => 'syahputrawahyu61@gmail.com',
                'website' => NULL,
                'content' => 'sapdokoasdkpda',
                'status' => 'approved',
                'created_at' => '2021-03-17 03:46:27',
                'updated_at' => '2021-03-17 03:46:27',
                'deleted_at' => NULL,
            ),
            8 => 
            array (
                'id' => 10,
                'parent_id' => 1,
                'user_id' => NULL,
                'post_id' => 1,
                'name' => 'Wahyu',
                'email' => 'syahputrawahyu61@gmail.com',
                'website' => NULL,
                'content' => 'bismillah',
                'status' => 'approved',
                'created_at' => '2021-03-17 03:46:53',
                'updated_at' => '2021-03-17 03:46:53',
                'deleted_at' => NULL,
            ),
            9 => 
            array (
                'id' => 12,
                'parent_id' => NULL,
                'user_id' => NULL,
                'post_id' => 1,
                'name' => 'Wahyu',
                'email' => 'syahputrawahyu61@gmail.com',
                'website' => NULL,
                'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum, reiciendis facere ad nihil sequi unde rerum assumenda est deleniti doloribus explicabo. Debitis placeat dolore tenetur dolor deleniti minima corporis commodi?',
                'status' => 'approved',
                'created_at' => '2021-03-17 14:11:59',
                'updated_at' => '2021-03-17 14:11:59',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}