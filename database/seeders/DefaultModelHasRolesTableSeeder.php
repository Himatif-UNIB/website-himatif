<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DefaultModelHasRolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('model_has_roles')->delete();
        
        \DB::table('model_has_roles')->insert(array (
            0 => 
            array (
                'role_id' => 1,
                'model_type' => 'App\\Models\\User',
                'model_id' => 1,
            ),
            1 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\User',
                'model_id' => 2,
            ),
            2 => 
            array (
                'role_id' => 7,
                'model_type' => 'App\\Models\\User',
                'model_id' => 3,
            ),
            3 => 
            array (
                'role_id' => 10,
                'model_type' => 'App\\Models\\User',
                'model_id' => 4,
            ),
            4 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 4,
            ),
            5 => 
            array (
                'role_id' => 10,
                'model_type' => 'App\\Models\\User',
                'model_id' => 5,
            ),
            6 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 5,
            ),
            7 => 
            array (
                'role_id' => 10,
                'model_type' => 'App\\Models\\User',
                'model_id' => 6,
            ),
            8 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 6,
            ),
            9 => 
            array (
                'role_id' => 10,
                'model_type' => 'App\\Models\\User',
                'model_id' => 7,
            ),
            10 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 7,
            ),
            11 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 8,
            ),
            12 => 
            array (
                'role_id' => 10,
                'model_type' => 'App\\Models\\User',
                'model_id' => 9,
            ),
            13 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 9,
            ),
            14 => 
            array (
                'role_id' => 10,
                'model_type' => 'App\\Models\\User',
                'model_id' => 10,
            ),
            15 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 10,
            ),
            16 => 
            array (
                'role_id' => 10,
                'model_type' => 'App\\Models\\User',
                'model_id' => 11,
            ),
            17 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 11,
            ),
            18 => 
            array (
                'role_id' => 10,
                'model_type' => 'App\\Models\\User',
                'model_id' => 12,
            ),
            19 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 12,
            ),
            20 => 
            array (
                'role_id' => 10,
                'model_type' => 'App\\Models\\User',
                'model_id' => 13,
            ),
            21 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 13,
            ),
            22 => 
            array (
                'role_id' => 10,
                'model_type' => 'App\\Models\\User',
                'model_id' => 14,
            ),
            23 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 14,
            ),
            24 => 
            array (
                'role_id' => 10,
                'model_type' => 'App\\Models\\User',
                'model_id' => 15,
            ),
            25 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 15,
            ),
            26 => 
            array (
                'role_id' => 10,
                'model_type' => 'App\\Models\\User',
                'model_id' => 16,
            ),
            27 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 16,
            ),
            28 => 
            array (
                'role_id' => 10,
                'model_type' => 'App\\Models\\User',
                'model_id' => 17,
            ),
            29 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 17,
            ),
            30 => 
            array (
                'role_id' => 10,
                'model_type' => 'App\\Models\\User',
                'model_id' => 18,
            ),
            31 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 18,
            ),
            32 => 
            array (
                'role_id' => 10,
                'model_type' => 'App\\Models\\User',
                'model_id' => 19,
            ),
            33 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 19,
            ),
            34 => 
            array (
                'role_id' => 10,
                'model_type' => 'App\\Models\\User',
                'model_id' => 20,
            ),
            35 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 20,
            ),
            36 => 
            array (
                'role_id' => 10,
                'model_type' => 'App\\Models\\User',
                'model_id' => 21,
            ),
            37 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 21,
            ),
            38 => 
            array (
                'role_id' => 10,
                'model_type' => 'App\\Models\\User',
                'model_id' => 22,
            ),
            39 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 22,
            ),
            40 => 
            array (
                'role_id' => 10,
                'model_type' => 'App\\Models\\User',
                'model_id' => 23,
            ),
            41 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 23,
            ),
            42 => 
            array (
                'role_id' => 10,
                'model_type' => 'App\\Models\\User',
                'model_id' => 24,
            ),
            43 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 24,
            ),
            44 => 
            array (
                'role_id' => 10,
                'model_type' => 'App\\Models\\User',
                'model_id' => 25,
            ),
            45 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 25,
            ),
            46 => 
            array (
                'role_id' => 9,
                'model_type' => 'App\\Models\\User',
                'model_id' => 26,
            ),
            47 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 26,
            ),
            48 => 
            array (
                'role_id' => 10,
                'model_type' => 'App\\Models\\User',
                'model_id' => 27,
            ),
            49 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 27,
            ),
            50 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 28,
            ),
            51 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 29,
            ),
            52 => 
            array (
                'role_id' => 10,
                'model_type' => 'App\\Models\\User',
                'model_id' => 30,
            ),
            53 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 30,
            ),
            54 => 
            array (
                'role_id' => 5,
                'model_type' => 'App\\Models\\User',
                'model_id' => 31,
            ),
            55 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 31,
            ),
            56 => 
            array (
                'role_id' => 10,
                'model_type' => 'App\\Models\\User',
                'model_id' => 32,
            ),
            57 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 32,
            ),
            58 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 33,
            ),
            59 => 
            array (
                'role_id' => 10,
                'model_type' => 'App\\Models\\User',
                'model_id' => 34,
            ),
            60 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 34,
            ),
            61 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 35,
            ),
            62 => 
            array (
                'role_id' => 10,
                'model_type' => 'App\\Models\\User',
                'model_id' => 36,
            ),
            63 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 36,
            ),
            64 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 37,
            ),
            65 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 38,
            ),
            66 => 
            array (
                'role_id' => 10,
                'model_type' => 'App\\Models\\User',
                'model_id' => 39,
            ),
            67 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 39,
            ),
            68 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 40,
            ),
            69 => 
            array (
                'role_id' => 10,
                'model_type' => 'App\\Models\\User',
                'model_id' => 41,
            ),
            70 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 41,
            ),
            71 => 
            array (
                'role_id' => 10,
                'model_type' => 'App\\Models\\User',
                'model_id' => 42,
            ),
            72 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 42,
            ),
            73 => 
            array (
                'role_id' => 10,
                'model_type' => 'App\\Models\\User',
                'model_id' => 43,
            ),
            74 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 43,
            ),
            75 => 
            array (
                'role_id' => 9,
                'model_type' => 'App\\Models\\User',
                'model_id' => 44,
            ),
            76 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 44,
            ),
            77 => 
            array (
                'role_id' => 10,
                'model_type' => 'App\\Models\\User',
                'model_id' => 45,
            ),
            78 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 45,
            ),
            79 => 
            array (
                'role_id' => 8,
                'model_type' => 'App\\Models\\User',
                'model_id' => 46,
            ),
            80 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 46,
            ),
            81 => 
            array (
                'role_id' => 10,
                'model_type' => 'App\\Models\\User',
                'model_id' => 47,
            ),
            82 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 47,
            ),
            83 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 48,
            ),
            84 => 
            array (
                'role_id' => 6,
                'model_type' => 'App\\Models\\User',
                'model_id' => 49,
            ),
            85 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 49,
            ),
            86 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 50,
            ),
            87 => 
            array (
                'role_id' => 10,
                'model_type' => 'App\\Models\\User',
                'model_id' => 51,
            ),
            88 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 51,
            ),
            89 => 
            array (
                'role_id' => 10,
                'model_type' => 'App\\Models\\User',
                'model_id' => 52,
            ),
            90 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 52,
            ),
            91 => 
            array (
                'role_id' => 10,
                'model_type' => 'App\\Models\\User',
                'model_id' => 53,
            ),
            92 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 53,
            ),
            93 => 
            array (
                'role_id' => 10,
                'model_type' => 'App\\Models\\User',
                'model_id' => 54,
            ),
            94 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 54,
            ),
            95 => 
            array (
                'role_id' => 9,
                'model_type' => 'App\\Models\\User',
                'model_id' => 55,
            ),
            96 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 55,
            ),
            97 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 56,
            ),
            98 => 
            array (
                'role_id' => 10,
                'model_type' => 'App\\Models\\User',
                'model_id' => 57,
            ),
            99 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 57,
            ),
            100 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 58,
            ),
            101 => 
            array (
                'role_id' => 10,
                'model_type' => 'App\\Models\\User',
                'model_id' => 59,
            ),
            102 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 59,
            ),
            103 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 60,
            ),
            104 => 
            array (
                'role_id' => 10,
                'model_type' => 'App\\Models\\User',
                'model_id' => 61,
            ),
            105 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 61,
            ),
            106 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 62,
            ),
            107 => 
            array (
                'role_id' => 10,
                'model_type' => 'App\\Models\\User',
                'model_id' => 63,
            ),
            108 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 63,
            ),
            109 => 
            array (
                'role_id' => 10,
                'model_type' => 'App\\Models\\User',
                'model_id' => 64,
            ),
            110 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 64,
            ),
            111 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 65,
            ),
            112 => 
            array (
                'role_id' => 10,
                'model_type' => 'App\\Models\\User',
                'model_id' => 66,
            ),
            113 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 66,
            ),
            114 => 
            array (
                'role_id' => 9,
                'model_type' => 'App\\Models\\User',
                'model_id' => 67,
            ),
            115 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 67,
            ),
            116 => 
            array (
                'role_id' => 9,
                'model_type' => 'App\\Models\\User',
                'model_id' => 68,
            ),
            117 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 68,
            ),
            118 => 
            array (
                'role_id' => 10,
                'model_type' => 'App\\Models\\User',
                'model_id' => 69,
            ),
            119 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 69,
            ),
            120 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 70,
            ),
            121 => 
            array (
                'role_id' => 9,
                'model_type' => 'App\\Models\\User',
                'model_id' => 71,
            ),
            122 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 71,
            ),
            123 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 72,
            ),
            124 => 
            array (
                'role_id' => 10,
                'model_type' => 'App\\Models\\User',
                'model_id' => 73,
            ),
            125 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 73,
            ),
            126 => 
            array (
                'role_id' => 10,
                'model_type' => 'App\\Models\\User',
                'model_id' => 74,
            ),
            127 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 74,
            ),
            128 => 
            array (
                'role_id' => 9,
                'model_type' => 'App\\Models\\User',
                'model_id' => 75,
            ),
            129 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 75,
            ),
            130 => 
            array (
                'role_id' => 10,
                'model_type' => 'App\\Models\\User',
                'model_id' => 76,
            ),
            131 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 76,
            ),
            132 => 
            array (
                'role_id' => 7,
                'model_type' => 'App\\Models\\User',
                'model_id' => 77,
            ),
            133 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 77,
            ),
            134 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 78,
            ),
            135 => 
            array (
                'role_id' => 9,
                'model_type' => 'App\\Models\\User',
                'model_id' => 79,
            ),
            136 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 79,
            ),
            137 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 80,
            ),
            138 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 81,
            ),
            139 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 82,
            ),
            140 => 
            array (
                'role_id' => 10,
                'model_type' => 'App\\Models\\User',
                'model_id' => 83,
            ),
            141 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 83,
            ),
            142 => 
            array (
                'role_id' => 10,
                'model_type' => 'App\\Models\\User',
                'model_id' => 84,
            ),
            143 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 84,
            ),
            144 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 85,
            ),
            145 => 
            array (
                'role_id' => 10,
                'model_type' => 'App\\Models\\User',
                'model_id' => 86,
            ),
            146 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 86,
            ),
            147 => 
            array (
                'role_id' => 10,
                'model_type' => 'App\\Models\\User',
                'model_id' => 87,
            ),
            148 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 87,
            ),
            149 => 
            array (
                'role_id' => 10,
                'model_type' => 'App\\Models\\User',
                'model_id' => 88,
            ),
            150 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 88,
            ),
            151 => 
            array (
                'role_id' => 10,
                'model_type' => 'App\\Models\\User',
                'model_id' => 89,
            ),
            152 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 89,
            ),
            153 => 
            array (
                'role_id' => 10,
                'model_type' => 'App\\Models\\User',
                'model_id' => 90,
            ),
            154 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 90,
            ),
            155 => 
            array (
                'role_id' => 10,
                'model_type' => 'App\\Models\\User',
                'model_id' => 91,
            ),
            156 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 91,
            ),
            157 => 
            array (
                'role_id' => 10,
                'model_type' => 'App\\Models\\User',
                'model_id' => 92,
            ),
            158 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 92,
            ),
            159 => 
            array (
                'role_id' => 10,
                'model_type' => 'App\\Models\\User',
                'model_id' => 93,
            ),
            160 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 93,
            ),
            161 => 
            array (
                'role_id' => 10,
                'model_type' => 'App\\Models\\User',
                'model_id' => 94,
            ),
            162 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 94,
            ),
            163 => 
            array (
                'role_id' => 10,
                'model_type' => 'App\\Models\\User',
                'model_id' => 95,
            ),
            164 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 95,
            ),
            165 => 
            array (
                'role_id' => 10,
                'model_type' => 'App\\Models\\User',
                'model_id' => 96,
            ),
            166 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 96,
            ),
            167 => 
            array (
                'role_id' => 10,
                'model_type' => 'App\\Models\\User',
                'model_id' => 97,
            ),
            168 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 97,
            ),
            169 => 
            array (
                'role_id' => 10,
                'model_type' => 'App\\Models\\User',
                'model_id' => 98,
            ),
            170 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 98,
            ),
            171 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 99,
            ),
            172 => 
            array (
                'role_id' => 10,
                'model_type' => 'App\\Models\\User',
                'model_id' => 100,
            ),
            173 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 100,
            ),
            174 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 101,
            ),
            175 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 102,
            ),
            176 => 
            array (
                'role_id' => 10,
                'model_type' => 'App\\Models\\User',
                'model_id' => 103,
            ),
            177 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 103,
            ),
            178 => 
            array (
                'role_id' => 10,
                'model_type' => 'App\\Models\\User',
                'model_id' => 104,
            ),
            179 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 104,
            ),
            180 => 
            array (
                'role_id' => 10,
                'model_type' => 'App\\Models\\User',
                'model_id' => 105,
            ),
            181 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 105,
            ),
            182 => 
            array (
                'role_id' => 10,
                'model_type' => 'App\\Models\\User',
                'model_id' => 106,
            ),
            183 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 106,
            ),
            184 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 107,
            ),
            185 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 108,
            ),
            186 => 
            array (
                'role_id' => 10,
                'model_type' => 'App\\Models\\User',
                'model_id' => 109,
            ),
            187 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 109,
            ),
            188 => 
            array (
                'role_id' => 10,
                'model_type' => 'App\\Models\\User',
                'model_id' => 110,
            ),
            189 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 110,
            ),
            190 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 111,
            ),
            191 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 112,
            ),
            192 => 
            array (
                'role_id' => 10,
                'model_type' => 'App\\Models\\User',
                'model_id' => 113,
            ),
            193 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 113,
            ),
            194 => 
            array (
                'role_id' => 10,
                'model_type' => 'App\\Models\\User',
                'model_id' => 114,
            ),
            195 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 114,
            ),
            196 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 115,
            ),
            197 => 
            array (
                'role_id' => 10,
                'model_type' => 'App\\Models\\User',
                'model_id' => 116,
            ),
            198 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 116,
            ),
            199 => 
            array (
                'role_id' => 10,
                'model_type' => 'App\\Models\\User',
                'model_id' => 117,
            ),
            200 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 117,
            ),
            201 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 118,
            ),
            202 => 
            array (
                'role_id' => 10,
                'model_type' => 'App\\Models\\User',
                'model_id' => 119,
            ),
            203 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 119,
            ),
            204 => 
            array (
                'role_id' => 10,
                'model_type' => 'App\\Models\\User',
                'model_id' => 120,
            ),
            205 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 120,
            ),
            206 => 
            array (
                'role_id' => 10,
                'model_type' => 'App\\Models\\User',
                'model_id' => 121,
            ),
            207 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 121,
            ),
            208 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 122,
            ),
            209 => 
            array (
                'role_id' => 10,
                'model_type' => 'App\\Models\\User',
                'model_id' => 123,
            ),
            210 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 123,
            ),
            211 => 
            array (
                'role_id' => 10,
                'model_type' => 'App\\Models\\User',
                'model_id' => 124,
            ),
            212 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 124,
            ),
            213 => 
            array (
                'role_id' => 10,
                'model_type' => 'App\\Models\\User',
                'model_id' => 125,
            ),
            214 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 125,
            ),
            215 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 126,
            ),
            216 => 
            array (
                'role_id' => 10,
                'model_type' => 'App\\Models\\User',
                'model_id' => 127,
            ),
            217 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 127,
            ),
            218 => 
            array (
                'role_id' => 10,
                'model_type' => 'App\\Models\\User',
                'model_id' => 128,
            ),
            219 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 128,
            ),
            220 => 
            array (
                'role_id' => 10,
                'model_type' => 'App\\Models\\User',
                'model_id' => 129,
            ),
            221 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 129,
            ),
            222 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 130,
            ),
            223 => 
            array (
                'role_id' => 10,
                'model_type' => 'App\\Models\\User',
                'model_id' => 131,
            ),
            224 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 131,
            ),
            225 => 
            array (
                'role_id' => 10,
                'model_type' => 'App\\Models\\User',
                'model_id' => 132,
            ),
            226 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 132,
            ),
            227 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 133,
            ),
            228 => 
            array (
                'role_id' => 10,
                'model_type' => 'App\\Models\\User',
                'model_id' => 134,
            ),
            229 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 134,
            ),
            230 => 
            array (
                'role_id' => 10,
                'model_type' => 'App\\Models\\User',
                'model_id' => 135,
            ),
            231 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 135,
            ),
            232 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 136,
            ),
            233 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 137,
            ),
            234 => 
            array (
                'role_id' => 10,
                'model_type' => 'App\\Models\\User',
                'model_id' => 138,
            ),
            235 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 138,
            ),
            236 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 139,
            ),
            237 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 140,
            ),
            238 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 141,
            ),
            239 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 142,
            ),
            240 => 
            array (
                'role_id' => 10,
                'model_type' => 'App\\Models\\User',
                'model_id' => 143,
            ),
            241 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 143,
            ),
            242 => 
            array (
                'role_id' => 10,
                'model_type' => 'App\\Models\\User',
                'model_id' => 144,
            ),
            243 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 144,
            ),
            244 => 
            array (
                'role_id' => 10,
                'model_type' => 'App\\Models\\User',
                'model_id' => 145,
            ),
            245 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 145,
            ),
            246 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 146,
            ),
            247 => 
            array (
                'role_id' => 10,
                'model_type' => 'App\\Models\\User',
                'model_id' => 147,
            ),
            248 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 147,
            ),
            249 => 
            array (
                'role_id' => 10,
                'model_type' => 'App\\Models\\User',
                'model_id' => 148,
            ),
            250 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 148,
            ),
            251 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 149,
            ),
            252 => 
            array (
                'role_id' => 10,
                'model_type' => 'App\\Models\\User',
                'model_id' => 150,
            ),
            253 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 150,
            ),
            254 => 
            array (
                'role_id' => 10,
                'model_type' => 'App\\Models\\User',
                'model_id' => 151,
            ),
            255 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 151,
            ),
            256 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 152,
            ),
            257 => 
            array (
                'role_id' => 10,
                'model_type' => 'App\\Models\\User',
                'model_id' => 153,
            ),
            258 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 153,
            ),
            259 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 154,
            ),
            260 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 155,
            ),
            261 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 156,
            ),
            262 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 157,
            ),
            263 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 158,
            ),
            264 => 
            array (
                'role_id' => 10,
                'model_type' => 'App\\Models\\User',
                'model_id' => 159,
            ),
            265 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 159,
            ),
            266 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 160,
            ),
            267 => 
            array (
                'role_id' => 10,
                'model_type' => 'App\\Models\\User',
                'model_id' => 161,
            ),
            268 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 161,
            ),
            269 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 162,
            ),
            270 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 163,
            ),
            271 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 164,
            ),
            272 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 165,
            ),
            273 => 
            array (
                'role_id' => 10,
                'model_type' => 'App\\Models\\User',
                'model_id' => 166,
            ),
            274 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 166,
            ),
            275 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 167,
            ),
            276 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 168,
            ),
            277 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 169,
            ),
            278 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 170,
            ),
            279 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 171,
            ),
            280 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 172,
            ),
            281 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 173,
            ),
            282 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 174,
            ),
            283 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 175,
            ),
            284 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 176,
            ),
            285 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 177,
            ),
            286 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 178,
            ),
            287 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 179,
            ),
            288 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 180,
            ),
            289 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 181,
            ),
            290 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 182,
            ),
            291 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 183,
            ),
            292 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 184,
            ),
            293 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 185,
            ),
            294 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 186,
            ),
            295 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 187,
            ),
            296 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 188,
            ),
            297 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 189,
            ),
            298 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 190,
            ),
            299 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 191,
            ),
            300 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 192,
            ),
            301 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 193,
            ),
            302 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 194,
            ),
            303 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 195,
            ),
            304 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 196,
            ),
            305 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 197,
            ),
            306 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 198,
            ),
            307 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 199,
            ),
            308 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 200,
            ),
            309 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 201,
            ),
            310 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 202,
            ),
            311 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 203,
            ),
            312 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 204,
            ),
            313 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 205,
            ),
            314 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 206,
            ),
            315 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 207,
            ),
            316 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 208,
            ),
            317 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 209,
            ),
            318 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 210,
            ),
            319 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 211,
            ),
            320 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 212,
            ),
            321 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 213,
            ),
            322 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 214,
            ),
            323 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 215,
            ),
            324 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 216,
            ),
            325 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 217,
            ),
            326 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 218,
            ),
            327 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 219,
            ),
            328 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 220,
            ),
            329 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 221,
            ),
            330 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 222,
            ),
            331 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 223,
            ),
            332 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 224,
            ),
            333 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 225,
            ),
            334 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 226,
            ),
            335 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 227,
            ),
            336 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 228,
            ),
            337 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 229,
            ),
            338 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 230,
            ),
            339 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 231,
            ),
            340 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 232,
            ),
            341 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 233,
            ),
            342 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 234,
            ),
            343 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 235,
            ),
            344 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 236,
            ),
            345 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 237,
            ),
            346 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 238,
            ),
            347 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 239,
            ),
            348 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 240,
            ),
            349 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 241,
            ),
            350 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 242,
            ),
            351 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 243,
            ),
            352 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 244,
            ),
            353 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 245,
            ),
            354 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 246,
            ),
            355 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 247,
            ),
            356 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 248,
            ),
            357 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 249,
            ),
            358 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 250,
            ),
            359 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 251,
            ),
            360 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 252,
            ),
            361 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 253,
            ),
            362 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 254,
            ),
            363 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 255,
            ),
            364 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 256,
            ),
            365 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 257,
            ),
            366 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 258,
            ),
            367 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\Models\\User',
                'model_id' => 259,
            ),
        ));
        
        
    }
}