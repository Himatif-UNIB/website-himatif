<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DefaultUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //User default yang dibuat: (role)
        //1. super admin

        $adminUser = new User();
        $adminUser->name = 'Super Admin';
        $adminUser->email = 'super.admin@example.test';
        $adminUser->password = Hash::make('12345678');
        $adminUser->save();

        $adminId = $adminUser->id;
        $adminUser->assignRole('super_admin');

        //2. pembina
        $builderUser = new User();
        $builderUser->name = 'Pembina '. getSetting('organizationName');
        $builderUser->email = 'pembina@example.test';
        $builderUser->password = Hash::make('12345678');
        $builderUser->save();

        $builderId = $builderUser->id;
        $builderUser->assignRole('builder');

        //super admin dan pembina dibuat secara otomatis
        //karena keduanya terpisah dari user lain, artinya
        //super admin dan pembina tidak perlu mempunyai NPM sedangkan user lain perlu
    }
}
