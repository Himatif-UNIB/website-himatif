<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        //$this->call(SettingsSeeder::class);
        //$this->call(RolePermissionSeeder::class);
        //$this->call(GeneralSeeder::class);
        //$this->call(BlogCategoryRoleSeeder::class);
        $this->call(DefaultCategorySeeder::class);
    }
}
