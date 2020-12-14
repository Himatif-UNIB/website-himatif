<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'siteName' => 'Himatif UNIB Official',
            'siteDescription' => 'Website profil resmi Himpunan Mahasiswa Teknik Informatika Universitas Bengkulu',
            'siteIcon' => null,
            'organizationLogo' => null,
            'organizationPhoneNumber' => null,
            'organizationEmail' => null,
            'organizationAddress' => null,
            'organizationSocialMedia' => '[]'
        ];

        foreach ($data as $key => $value) {
            DB::table('settings')->insertOrIgnore([
                'key' => $key,
                'value' => $value
            ]);
        }
    }
}
