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
        // $this->call(SettingsSeeder::class);
        // $this->call(RolePermissionSeeder::class);
        // $this->call(GeneralSeeder::class);
        // $this->call(DefaultCategorySeeder::class);
        // $this->call(DefaultUsersTableSeeder::class);
        // $this->call(DefaultMediaTableSeeder::class);
        // $this->call(DefaultSettingsTableSeeder::class);
        // $this->call(DefaultDivisionsTableSeeder::class);
        // $this->call(DefaultPeriodsTableSeeder::class);
        // $this->call(DefaultForcesTableSeeder::class);
        // $this->call(DefaultPositionsTableSeeder::class);
        // $this->call(DefaultMembersTableSeeder::class);
        // $this->call(DefaultStaffTableSeeder::class);
        // $this->call(DefaultFormsTableSeeder::class);

        // $this->call(DefaultRolesTableSeeder::class);
        // $this->call(DefaultPermissionsTableSeeder::class);
        // $this->call(DefaultModelHasRolesTableSeeder::class);
        // $this->call(DefaultRoleHasPermissionsTableSeeder::class);

        // $this->call(DefaultBlogCategoriesTableSeeder::class);
        // $this->call(DefaultBlogPostsTableSeeder::class);
        // $this->call(DefaultBlogCommentsTableSeeder::class);
        // $this->call(DefaultPictureGalleriesTableSeeder::class);
        // $this->call(DefaultGalleryCategoriesTableSeeder::class);
        // $this->call(DefaultPictureGalleryCategoriesTableSeeder::class);

        // $this->call(DefaultOauthAccessTokensTableSeeder::class);

        $this->call(RolePermissionForShowcaseSeeder::class);
    }
}
