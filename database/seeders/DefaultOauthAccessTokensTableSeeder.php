<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DefaultOauthAccessTokensTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('oauth_access_tokens')->delete();
        
        \DB::table('oauth_access_tokens')->insert(array (
            0 => 
            array (
                'id' => '0cbcacc3b20d78dce8f8e1c853ac432e43edfc8eb64a65d0d2057eeea6341dbd7eac05d5776c2550',
                'user_id' => 3,
                'client_id' => 1,
                'name' => 'Personal Access Token',
                'scopes' => '[]',
                'revoked' => 0,
                'created_at' => '2021-02-25 02:48:34',
                'updated_at' => '2021-02-25 02:48:34',
                'expires_at' => '2022-02-25 02:48:34',
            ),
            1 => 
            array (
                'id' => '0e5e912b084a35f5f9401947d08c16628b546a44a66b5d900fd730c9fdc12020e9bc6797b7880ca6',
                'user_id' => 3,
                'client_id' => 1,
                'name' => 'Personal Access Token',
                'scopes' => '[]',
                'revoked' => 0,
                'created_at' => '2021-03-17 03:47:28',
                'updated_at' => '2021-03-17 03:47:28',
                'expires_at' => '2022-03-17 03:47:28',
            ),
            2 => 
            array (
                'id' => '205af1a79d73f6f8d9a5ed26a67a7e9591192b005119f376fbe15debd48a69a016b0973db8d059e4',
                'user_id' => 3,
                'client_id' => 1,
                'name' => 'Personal Access Token',
                'scopes' => '[]',
                'revoked' => 0,
                'created_at' => '2021-02-24 07:37:58',
                'updated_at' => '2021-02-24 07:37:58',
                'expires_at' => '2022-02-24 07:37:58',
            ),
            3 => 
            array (
                'id' => '2102f465186353da860ab191fa7b5d9ad38886853a9ab4e26d903fa813d88182d4dbfc528cf94046',
                'user_id' => 3,
                'client_id' => 1,
                'name' => 'Personal Access Token',
                'scopes' => '[]',
                'revoked' => 0,
                'created_at' => '2021-02-23 15:17:55',
                'updated_at' => '2021-02-23 15:17:55',
                'expires_at' => '2022-02-23 15:17:55',
            ),
            4 => 
            array (
                'id' => '2b91a7e241cb59f734a34019fddbc365d5133b553b1d9d0ccf9461c1d4f0eb6c5182b5792219eed8',
                'user_id' => 49,
                'client_id' => 1,
                'name' => 'Personal Access Token',
                'scopes' => '[]',
                'revoked' => 0,
                'created_at' => '2021-02-23 08:48:29',
                'updated_at' => '2021-02-23 08:48:29',
                'expires_at' => '2022-02-23 08:48:29',
            ),
            5 => 
            array (
                'id' => '4a65cab28b06c1e44db1a5d6db35ae4f9cc5fde541914267e759e025ceda97dcdc34c7960da05025',
                'user_id' => 2,
                'client_id' => 1,
                'name' => 'Personal Access Token',
                'scopes' => '[]',
                'revoked' => 0,
                'created_at' => '2021-02-23 08:45:33',
                'updated_at' => '2021-02-23 08:45:33',
                'expires_at' => '2022-02-23 08:45:33',
            ),
            6 => 
            array (
                'id' => '57ad5df9d7ed905738323c813a02533ef8bb23c2bc9b95c3844a165db05eb17c2ff864daff3cee39',
                'user_id' => 3,
                'client_id' => 1,
                'name' => 'Personal Access Token',
                'scopes' => '[]',
                'revoked' => 0,
                'created_at' => '2021-02-23 03:28:15',
                'updated_at' => '2021-02-23 03:28:15',
                'expires_at' => '2022-02-23 03:28:15',
            ),
            7 => 
            array (
                'id' => '627ccf7870ac3f69ca5d979c92cccfc908f80434e4dfbed886447e2fc2d3dafe9439469bf3bdca21',
                'user_id' => 3,
                'client_id' => 1,
                'name' => 'Personal Access Token',
                'scopes' => '[]',
                'revoked' => 0,
                'created_at' => '2021-02-24 02:40:20',
                'updated_at' => '2021-02-24 02:40:20',
                'expires_at' => '2022-02-24 02:40:20',
            ),
            8 => 
            array (
                'id' => '674d173fadbb354b64253acacd4b1dbd494912903c13c2aa854db490cc6e87f4a24f06b6f758ae36',
                'user_id' => 31,
                'client_id' => 1,
                'name' => 'Personal Access Token',
                'scopes' => '[]',
                'revoked' => 0,
                'created_at' => '2021-02-23 08:32:05',
                'updated_at' => '2021-02-23 08:32:05',
                'expires_at' => '2022-02-23 08:32:05',
            ),
            9 => 
            array (
                'id' => '74d97a53d1b678239eaeb566209375ef006eadbc142eb5d9891d867feab5400eb47447a237b2588e',
                'user_id' => 3,
                'client_id' => 1,
                'name' => 'Personal Access Token',
                'scopes' => '[]',
                'revoked' => 0,
                'created_at' => '2021-03-14 07:41:34',
                'updated_at' => '2021-03-14 07:41:34',
                'expires_at' => '2022-03-14 07:41:34',
            ),
            10 => 
            array (
                'id' => '7ab8a0f8c228e05e608a412464f7c697afb73dc72fb04f23b56943b8c7665d9c7797261d9deb2838',
                'user_id' => 3,
                'client_id' => 1,
                'name' => 'Personal Access Token',
                'scopes' => '[]',
                'revoked' => 0,
                'created_at' => '2021-02-23 08:29:15',
                'updated_at' => '2021-02-23 08:29:15',
                'expires_at' => '2022-02-23 08:29:15',
            ),
            11 => 
            array (
                'id' => '7e3ede39a5cb0bae756488c8046df9145161dcc852b61ae736121321355b64ab165d01ef28336c33',
                'user_id' => 77,
                'client_id' => 1,
                'name' => 'Personal Access Token',
                'scopes' => '[]',
                'revoked' => 0,
                'created_at' => '2021-02-23 09:31:22',
                'updated_at' => '2021-02-23 09:31:22',
                'expires_at' => '2022-02-23 09:31:22',
            ),
            12 => 
            array (
                'id' => '7f51456c82b8ec11c62290df69670977349c8fc93bcdbe8f3651878148429087e9b2d61ba6dab750',
                'user_id' => 71,
                'client_id' => 1,
                'name' => 'Personal Access Token',
                'scopes' => '[]',
                'revoked' => 0,
                'created_at' => '2021-02-23 08:52:09',
                'updated_at' => '2021-02-23 08:52:09',
                'expires_at' => '2022-02-23 08:52:09',
            ),
            13 => 
            array (
                'id' => '8999e5707747f9b2996d0749b8e1a4b6d5bbbf6cd53ee7b3f5241bb82ccd78555414e31ea7e15fde',
                'user_id' => 3,
                'client_id' => 1,
                'name' => 'Personal Access Token',
                'scopes' => '[]',
                'revoked' => 0,
                'created_at' => '2021-02-26 01:42:14',
                'updated_at' => '2021-02-26 01:42:14',
                'expires_at' => '2022-02-26 01:42:14',
            ),
            14 => 
            array (
                'id' => '9763b53b552f74aa1aa68525cf49e6937559d34d5b944aefe298be82bc5e95743316ec0b9eea6470',
                'user_id' => 3,
                'client_id' => 1,
                'name' => 'Personal Access Token',
                'scopes' => '[]',
                'revoked' => 0,
                'created_at' => '2021-02-23 03:20:25',
                'updated_at' => '2021-02-23 03:20:25',
                'expires_at' => '2022-02-23 03:20:25',
            ),
            15 => 
            array (
                'id' => 'b1c3a719e2303e797939c6cb2441930a6b48aa15d1d29b44a93e97f46e0ff112488f4242c64bfebb',
                'user_id' => 3,
                'client_id' => 1,
                'name' => 'Personal Access Token',
                'scopes' => '[]',
                'revoked' => 0,
                'created_at' => '2021-03-17 07:08:33',
                'updated_at' => '2021-03-17 07:08:33',
                'expires_at' => '2022-03-17 07:08:33',
            ),
            16 => 
            array (
                'id' => 'b990d50f96923039134e917785653504b09460fc5f2009709ed40c8557ef9c46954802864020b8b7',
                'user_id' => 46,
                'client_id' => 1,
                'name' => 'Personal Access Token',
                'scopes' => '[]',
                'revoked' => 0,
                'created_at' => '2021-02-23 08:49:32',
                'updated_at' => '2021-02-23 08:49:32',
                'expires_at' => '2022-02-23 08:49:32',
            ),
            17 => 
            array (
                'id' => 'cc053135c4977306011bbbcb8e7ae2e14422a7686ce1cb0ddf4c6ac309b33c42de066e6f2819dd66',
                'user_id' => 3,
                'client_id' => 1,
                'name' => 'Personal Access Token',
                'scopes' => '[]',
                'revoked' => 0,
                'created_at' => '2021-02-26 01:19:41',
                'updated_at' => '2021-02-26 01:19:41',
                'expires_at' => '2022-02-26 01:19:41',
            ),
            18 => 
            array (
                'id' => 'd8def20ee9626231ec034d7e37f6ef16ffb6453b5e1da561d7aebd7aef4f16128530146cba184107',
                'user_id' => 77,
                'client_id' => 1,
                'name' => 'Personal Access Token',
                'scopes' => '[]',
                'revoked' => 0,
                'created_at' => '2021-02-23 08:44:34',
                'updated_at' => '2021-02-23 08:44:34',
                'expires_at' => '2022-02-23 08:44:34',
            ),
            19 => 
            array (
                'id' => 'e32971d04efa0a78c2c588501464da2a25377d607b1331aff8693e3f391ec99aaa765b11eada3848',
                'user_id' => 3,
                'client_id' => 1,
                'name' => 'Personal Access Token',
                'scopes' => '[]',
                'revoked' => 0,
                'created_at' => '2021-02-25 14:16:40',
                'updated_at' => '2021-02-25 14:16:40',
                'expires_at' => '2022-02-25 14:16:40',
            ),
            20 => 
            array (
                'id' => 'fa5778b43d77d29a759199963a8ad827ffdda45ef6353e26db8a781c69bfe10e5c29c9fc20fcf233',
                'user_id' => 31,
                'client_id' => 1,
                'name' => 'Personal Access Token',
                'scopes' => '[]',
                'revoked' => 0,
                'created_at' => '2021-02-23 08:46:28',
                'updated_at' => '2021-02-23 08:46:28',
                'expires_at' => '2022-02-23 08:46:28',
            ),
            21 => 
            array (
                'id' => 'fbac938165aa917207bf086ca4b96edd9672d7c1182ef8496dd2f511fe1900b24f3097043256d262',
                'user_id' => 3,
                'client_id' => 1,
                'name' => 'Personal Access Token',
                'scopes' => '[]',
                'revoked' => 0,
                'created_at' => '2021-02-27 01:49:53',
                'updated_at' => '2021-02-27 01:49:53',
                'expires_at' => '2022-02-27 01:49:53',
            ),
        ));
        
        
    }
}