<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DefaultCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('blog_categories')->insertOrIgnore([
            'name' => 'Tak Berkategori',
            'slug' => 'tak-berkategori',
            'display' => false
        ]);
        DB::table('gallery_categories')->insertOrIgnore([
            'name' => 'Tak Berkategori',
            'slug' => 'tak-berkategori',
            'display' => false
        ]);
    }
}
