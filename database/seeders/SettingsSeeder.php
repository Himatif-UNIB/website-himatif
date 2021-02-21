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
            'organizationSocialMedia' => '[]',
            'organizationName' => 'HIMATIF',
            'organizationUniversity' => 'UNIVERSITAS BENGKULU',
            'organizationDesc' => 'Himpunan Mahasiswa Teknik Informatika (HIMATIF) di bentuk di Bengkulu (Universitas Bengkulu) pada tanggal 22 september 2006 Himatif merupakan tempat bagi mahasiswa Teknik Informatika Universitas Bengkulu untuk berkarya serta mengabdi sebagai kewajiban seorang mahasiswa. Kepengurusan HIMATIF di bagi menjadi 6 devisi bidang, yaitu Bidang Kerohanian, Bidang IT, Bidang Pendidikan, Bidang Olahraga dan Kesenian, Bidang Pengabdian Masyarakat, Bidang Kewirausahaan',
            'organizationTagLine' => 'Wadah bagi mahasiswa Teknik Informatika Universitas Bengkulu untuk berkarya dan mengabdi.',
            'allowComment' => true,
            'moderateComment' => false,
            'googleVerifyCode' => null,
            'alexaVerifyCode' => null,
            'bingVerifyCode' => null,
            'yandexVerifyCode' => null,
            'googleAnalyticsId' => null,
            'facebookAuthorId' => null,
            'facebookAppId' => null
        ];

        foreach ($data as $key => $value) {
            DB::table('settings')->insertOrIgnore([
                'key' => $key,
                'value' => $value
            ]);
        }
    }
}
