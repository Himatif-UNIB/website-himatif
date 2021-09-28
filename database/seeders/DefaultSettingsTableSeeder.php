<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DefaultSettingsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('settings')->delete();
        
        \DB::table('settings')->insert(array (
            0 => 
            array (
                'id' => 1,
                'key' => 'siteName',
                'value' => 'Himatif UNIB Official',
            ),
            1 => 
            array (
                'id' => 2,
                'key' => 'siteDescription',
                'value' => 'Website profil resmi Himpunan Mahasiswa Teknik Informatika Universitas Bengkulu',
            ),
            2 => 
            array (
                'id' => 3,
                'key' => 'siteIcon',
                'value' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'key' => 'organizationLogo',
                'value' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'key' => 'organizationPhoneNumber',
                'value' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'key' => 'organizationEmail',
                'value' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'key' => 'organizationAddress',
                'value' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'key' => 'organizationSocialMedia',
                'value' => '[]',
            ),
            8 => 
            array (
                'id' => 9,
                'key' => 'organizationName',
                'value' => 'HIMATIF',
            ),
            9 => 
            array (
                'id' => 10,
                'key' => 'organizationUniversity',
                'value' => 'UNIVERSITAS BENGKULU',
            ),
            10 => 
            array (
                'id' => 11,
                'key' => 'organizationDesc',
            'value' => 'Himpunan Mahasiswa Teknik Informatika (HIMATIF) di bentuk di Bengkulu (Universitas Bengkulu) pada tanggal 22 september 2006 Himatif merupakan tempat bagi mahasiswa Teknik Informatika Universitas Bengkulu untuk berkarya serta mengabdi sebagai kewajiban seorang mahasiswa. Kepengurusan HIMATIF di bagi menjadi 6 devisi bidang, yaitu Bidang Kerohanian, Bidang IT, Bidang Pendidikan, Bidang Olahraga dan Kesenian, Bidang Pengabdian Masyarakat, Bidang Kewirausahaan',
            ),
            11 => 
            array (
                'id' => 12,
                'key' => 'organizationTagLine',
                'value' => 'Wadah bagi mahasiswa Teknik Informatika Universitas Bengkulu untuk berkarya dan mengabdi.',
            ),
            12 => 
            array (
                'id' => 13,
                'key' => 'allowComment',
                'value' => '1',
            ),
            13 => 
            array (
                'id' => 14,
                'key' => 'moderateComment',
                'value' => '0',
            ),
            14 => 
            array (
                'id' => 15,
                'key' => 'googleVerifyCode',
                'value' => NULL,
            ),
            15 => 
            array (
                'id' => 16,
                'key' => 'alexaVerifyCode',
                'value' => NULL,
            ),
            16 => 
            array (
                'id' => 17,
                'key' => 'bingVerifyCode',
                'value' => NULL,
            ),
            17 => 
            array (
                'id' => 18,
                'key' => 'yandexVerifyCode',
                'value' => NULL,
            ),
            18 => 
            array (
                'id' => 19,
                'key' => 'googleAnalyticsId',
                'value' => NULL,
            ),
            19 => 
            array (
                'id' => 20,
                'key' => 'facebookAuthorId',
                'value' => NULL,
            ),
            20 => 
            array (
                'id' => 21,
                'key' => 'facebookAppId',
                'value' => NULL,
            ),
            21 => 
            array (
                'id' => 22,
                'key' => 'facebookUrl',
                'value' => 'https://www.facebook.com/himatifunibofficial',
            ),
            22 => 
            array (
                'id' => 23,
                'key' => 'instagramUrl',
                'value' => 'https://www.instagram.com/himatifunib/',
            ),
            23 => 
            array (
                'id' => 24,
                'key' => 'youtubeUrl',
                'value' => 'https://www.youtube.com/channel/UC3qn66dHS-8-VCJ5FpBMoVw',
            ),
        ));
        
        
    }
}