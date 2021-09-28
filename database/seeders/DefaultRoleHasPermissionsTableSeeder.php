<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DefaultRoleHasPermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('role_has_permissions')->delete();
        
        \DB::table('role_has_permissions')->insert(array (
            0 => 
            array (
                'permission_id' => 1,
                'role_id' => 1,
            ),
            1 => 
            array (
                'permission_id' => 2,
                'role_id' => 1,
            ),
            2 => 
            array (
                'permission_id' => 3,
                'role_id' => 1,
            ),
            3 => 
            array (
                'permission_id' => 4,
                'role_id' => 1,
            ),
            4 => 
            array (
                'permission_id' => 6,
                'role_id' => 1,
            ),
            5 => 
            array (
                'permission_id' => 7,
                'role_id' => 1,
            ),
            6 => 
            array (
                'permission_id' => 9,
                'role_id' => 1,
            ),
            7 => 
            array (
                'permission_id' => 10,
                'role_id' => 1,
            ),
            8 => 
            array (
                'permission_id' => 13,
                'role_id' => 1,
            ),
            9 => 
            array (
                'permission_id' => 14,
                'role_id' => 1,
            ),
            10 => 
            array (
                'permission_id' => 15,
                'role_id' => 1,
            ),
            11 => 
            array (
                'permission_id' => 16,
                'role_id' => 1,
            ),
            12 => 
            array (
                'permission_id' => 18,
                'role_id' => 1,
            ),
            13 => 
            array (
                'permission_id' => 22,
                'role_id' => 1,
            ),
            14 => 
            array (
                'permission_id' => 26,
                'role_id' => 1,
            ),
            15 => 
            array (
                'permission_id' => 30,
                'role_id' => 1,
            ),
            16 => 
            array (
                'permission_id' => 34,
                'role_id' => 1,
            ),
            17 => 
            array (
                'permission_id' => 38,
                'role_id' => 1,
            ),
            18 => 
            array (
                'permission_id' => 42,
                'role_id' => 1,
            ),
            19 => 
            array (
                'permission_id' => 46,
                'role_id' => 1,
            ),
            20 => 
            array (
                'permission_id' => 50,
                'role_id' => 1,
            ),
            21 => 
            array (
                'permission_id' => 54,
                'role_id' => 1,
            ),
            22 => 
            array (
                'permission_id' => 58,
                'role_id' => 1,
            ),
            23 => 
            array (
                'permission_id' => 62,
                'role_id' => 1,
            ),
            24 => 
            array (
                'permission_id' => 66,
                'role_id' => 1,
            ),
            25 => 
            array (
                'permission_id' => 9,
                'role_id' => 2,
            ),
            26 => 
            array (
                'permission_id' => 10,
                'role_id' => 2,
            ),
            27 => 
            array (
                'permission_id' => 11,
                'role_id' => 2,
            ),
            28 => 
            array (
                'permission_id' => 12,
                'role_id' => 2,
            ),
            29 => 
            array (
                'permission_id' => 14,
                'role_id' => 2,
            ),
            30 => 
            array (
                'permission_id' => 18,
                'role_id' => 2,
            ),
            31 => 
            array (
                'permission_id' => 22,
                'role_id' => 2,
            ),
            32 => 
            array (
                'permission_id' => 26,
                'role_id' => 2,
            ),
            33 => 
            array (
                'permission_id' => 30,
                'role_id' => 2,
            ),
            34 => 
            array (
                'permission_id' => 34,
                'role_id' => 2,
            ),
            35 => 
            array (
                'permission_id' => 38,
                'role_id' => 2,
            ),
            36 => 
            array (
                'permission_id' => 42,
                'role_id' => 2,
            ),
            37 => 
            array (
                'permission_id' => 46,
                'role_id' => 2,
            ),
            38 => 
            array (
                'permission_id' => 50,
                'role_id' => 2,
            ),
            39 => 
            array (
                'permission_id' => 54,
                'role_id' => 2,
            ),
            40 => 
            array (
                'permission_id' => 58,
                'role_id' => 2,
            ),
            41 => 
            array (
                'permission_id' => 62,
                'role_id' => 2,
            ),
            42 => 
            array (
                'permission_id' => 66,
                'role_id' => 2,
            ),
            43 => 
            array (
                'permission_id' => 9,
                'role_id' => 3,
            ),
            44 => 
            array (
                'permission_id' => 10,
                'role_id' => 3,
            ),
            45 => 
            array (
                'permission_id' => 11,
                'role_id' => 3,
            ),
            46 => 
            array (
                'permission_id' => 12,
                'role_id' => 3,
            ),
            47 => 
            array (
                'permission_id' => 22,
                'role_id' => 3,
            ),
            48 => 
            array (
                'permission_id' => 26,
                'role_id' => 3,
            ),
            49 => 
            array (
                'permission_id' => 30,
                'role_id' => 3,
            ),
            50 => 
            array (
                'permission_id' => 34,
                'role_id' => 3,
            ),
            51 => 
            array (
                'permission_id' => 38,
                'role_id' => 3,
            ),
            52 => 
            array (
                'permission_id' => 42,
                'role_id' => 3,
            ),
            53 => 
            array (
                'permission_id' => 46,
                'role_id' => 3,
            ),
            54 => 
            array (
                'permission_id' => 50,
                'role_id' => 3,
            ),
            55 => 
            array (
                'permission_id' => 54,
                'role_id' => 3,
            ),
            56 => 
            array (
                'permission_id' => 58,
                'role_id' => 3,
            ),
            57 => 
            array (
                'permission_id' => 62,
                'role_id' => 3,
            ),
            58 => 
            array (
                'permission_id' => 66,
                'role_id' => 3,
            ),
            59 => 
            array (
                'permission_id' => 9,
                'role_id' => 4,
            ),
            60 => 
            array (
                'permission_id' => 10,
                'role_id' => 4,
            ),
            61 => 
            array (
                'permission_id' => 11,
                'role_id' => 4,
            ),
            62 => 
            array (
                'permission_id' => 12,
                'role_id' => 4,
            ),
            63 => 
            array (
                'permission_id' => 22,
                'role_id' => 4,
            ),
            64 => 
            array (
                'permission_id' => 26,
                'role_id' => 4,
            ),
            65 => 
            array (
                'permission_id' => 30,
                'role_id' => 4,
            ),
            66 => 
            array (
                'permission_id' => 34,
                'role_id' => 4,
            ),
            67 => 
            array (
                'permission_id' => 38,
                'role_id' => 4,
            ),
            68 => 
            array (
                'permission_id' => 42,
                'role_id' => 4,
            ),
            69 => 
            array (
                'permission_id' => 46,
                'role_id' => 4,
            ),
            70 => 
            array (
                'permission_id' => 50,
                'role_id' => 4,
            ),
            71 => 
            array (
                'permission_id' => 54,
                'role_id' => 4,
            ),
            72 => 
            array (
                'permission_id' => 58,
                'role_id' => 4,
            ),
            73 => 
            array (
                'permission_id' => 62,
                'role_id' => 4,
            ),
            74 => 
            array (
                'permission_id' => 66,
                'role_id' => 4,
            ),
            75 => 
            array (
                'permission_id' => 6,
                'role_id' => 5,
            ),
            76 => 
            array (
                'permission_id' => 7,
                'role_id' => 5,
            ),
            77 => 
            array (
                'permission_id' => 9,
                'role_id' => 5,
            ),
            78 => 
            array (
                'permission_id' => 10,
                'role_id' => 5,
            ),
            79 => 
            array (
                'permission_id' => 11,
                'role_id' => 5,
            ),
            80 => 
            array (
                'permission_id' => 12,
                'role_id' => 5,
            ),
            81 => 
            array (
                'permission_id' => 14,
                'role_id' => 5,
            ),
            82 => 
            array (
                'permission_id' => 18,
                'role_id' => 5,
            ),
            83 => 
            array (
                'permission_id' => 22,
                'role_id' => 5,
            ),
            84 => 
            array (
                'permission_id' => 26,
                'role_id' => 5,
            ),
            85 => 
            array (
                'permission_id' => 30,
                'role_id' => 5,
            ),
            86 => 
            array (
                'permission_id' => 34,
                'role_id' => 5,
            ),
            87 => 
            array (
                'permission_id' => 38,
                'role_id' => 5,
            ),
            88 => 
            array (
                'permission_id' => 42,
                'role_id' => 5,
            ),
            89 => 
            array (
                'permission_id' => 46,
                'role_id' => 5,
            ),
            90 => 
            array (
                'permission_id' => 50,
                'role_id' => 5,
            ),
            91 => 
            array (
                'permission_id' => 54,
                'role_id' => 5,
            ),
            92 => 
            array (
                'permission_id' => 58,
                'role_id' => 5,
            ),
            93 => 
            array (
                'permission_id' => 61,
                'role_id' => 5,
            ),
            94 => 
            array (
                'permission_id' => 62,
                'role_id' => 5,
            ),
            95 => 
            array (
                'permission_id' => 63,
                'role_id' => 5,
            ),
            96 => 
            array (
                'permission_id' => 64,
                'role_id' => 5,
            ),
            97 => 
            array (
                'permission_id' => 66,
                'role_id' => 5,
            ),
            98 => 
            array (
                'permission_id' => 6,
                'role_id' => 6,
            ),
            99 => 
            array (
                'permission_id' => 7,
                'role_id' => 6,
            ),
            100 => 
            array (
                'permission_id' => 9,
                'role_id' => 6,
            ),
            101 => 
            array (
                'permission_id' => 10,
                'role_id' => 6,
            ),
            102 => 
            array (
                'permission_id' => 11,
                'role_id' => 6,
            ),
            103 => 
            array (
                'permission_id' => 12,
                'role_id' => 6,
            ),
            104 => 
            array (
                'permission_id' => 14,
                'role_id' => 6,
            ),
            105 => 
            array (
                'permission_id' => 18,
                'role_id' => 6,
            ),
            106 => 
            array (
                'permission_id' => 22,
                'role_id' => 6,
            ),
            107 => 
            array (
                'permission_id' => 26,
                'role_id' => 6,
            ),
            108 => 
            array (
                'permission_id' => 30,
                'role_id' => 6,
            ),
            109 => 
            array (
                'permission_id' => 34,
                'role_id' => 6,
            ),
            110 => 
            array (
                'permission_id' => 38,
                'role_id' => 6,
            ),
            111 => 
            array (
                'permission_id' => 42,
                'role_id' => 6,
            ),
            112 => 
            array (
                'permission_id' => 46,
                'role_id' => 6,
            ),
            113 => 
            array (
                'permission_id' => 50,
                'role_id' => 6,
            ),
            114 => 
            array (
                'permission_id' => 54,
                'role_id' => 6,
            ),
            115 => 
            array (
                'permission_id' => 58,
                'role_id' => 6,
            ),
            116 => 
            array (
                'permission_id' => 61,
                'role_id' => 6,
            ),
            117 => 
            array (
                'permission_id' => 62,
                'role_id' => 6,
            ),
            118 => 
            array (
                'permission_id' => 63,
                'role_id' => 6,
            ),
            119 => 
            array (
                'permission_id' => 64,
                'role_id' => 6,
            ),
            120 => 
            array (
                'permission_id' => 66,
                'role_id' => 6,
            ),
            121 => 
            array (
                'permission_id' => 6,
                'role_id' => 7,
            ),
            122 => 
            array (
                'permission_id' => 7,
                'role_id' => 7,
            ),
            123 => 
            array (
                'permission_id' => 9,
                'role_id' => 7,
            ),
            124 => 
            array (
                'permission_id' => 10,
                'role_id' => 7,
            ),
            125 => 
            array (
                'permission_id' => 11,
                'role_id' => 7,
            ),
            126 => 
            array (
                'permission_id' => 12,
                'role_id' => 7,
            ),
            127 => 
            array (
                'permission_id' => 13,
                'role_id' => 7,
            ),
            128 => 
            array (
                'permission_id' => 14,
                'role_id' => 7,
            ),
            129 => 
            array (
                'permission_id' => 15,
                'role_id' => 7,
            ),
            130 => 
            array (
                'permission_id' => 16,
                'role_id' => 7,
            ),
            131 => 
            array (
                'permission_id' => 18,
                'role_id' => 7,
            ),
            132 => 
            array (
                'permission_id' => 20,
                'role_id' => 7,
            ),
            133 => 
            array (
                'permission_id' => 21,
                'role_id' => 7,
            ),
            134 => 
            array (
                'permission_id' => 22,
                'role_id' => 7,
            ),
            135 => 
            array (
                'permission_id' => 23,
                'role_id' => 7,
            ),
            136 => 
            array (
                'permission_id' => 24,
                'role_id' => 7,
            ),
            137 => 
            array (
                'permission_id' => 25,
                'role_id' => 7,
            ),
            138 => 
            array (
                'permission_id' => 26,
                'role_id' => 7,
            ),
            139 => 
            array (
                'permission_id' => 27,
                'role_id' => 7,
            ),
            140 => 
            array (
                'permission_id' => 28,
                'role_id' => 7,
            ),
            141 => 
            array (
                'permission_id' => 29,
                'role_id' => 7,
            ),
            142 => 
            array (
                'permission_id' => 30,
                'role_id' => 7,
            ),
            143 => 
            array (
                'permission_id' => 31,
                'role_id' => 7,
            ),
            144 => 
            array (
                'permission_id' => 32,
                'role_id' => 7,
            ),
            145 => 
            array (
                'permission_id' => 33,
                'role_id' => 7,
            ),
            146 => 
            array (
                'permission_id' => 34,
                'role_id' => 7,
            ),
            147 => 
            array (
                'permission_id' => 35,
                'role_id' => 7,
            ),
            148 => 
            array (
                'permission_id' => 36,
                'role_id' => 7,
            ),
            149 => 
            array (
                'permission_id' => 37,
                'role_id' => 7,
            ),
            150 => 
            array (
                'permission_id' => 38,
                'role_id' => 7,
            ),
            151 => 
            array (
                'permission_id' => 39,
                'role_id' => 7,
            ),
            152 => 
            array (
                'permission_id' => 40,
                'role_id' => 7,
            ),
            153 => 
            array (
                'permission_id' => 41,
                'role_id' => 7,
            ),
            154 => 
            array (
                'permission_id' => 42,
                'role_id' => 7,
            ),
            155 => 
            array (
                'permission_id' => 43,
                'role_id' => 7,
            ),
            156 => 
            array (
                'permission_id' => 44,
                'role_id' => 7,
            ),
            157 => 
            array (
                'permission_id' => 45,
                'role_id' => 7,
            ),
            158 => 
            array (
                'permission_id' => 46,
                'role_id' => 7,
            ),
            159 => 
            array (
                'permission_id' => 47,
                'role_id' => 7,
            ),
            160 => 
            array (
                'permission_id' => 48,
                'role_id' => 7,
            ),
            161 => 
            array (
                'permission_id' => 49,
                'role_id' => 7,
            ),
            162 => 
            array (
                'permission_id' => 50,
                'role_id' => 7,
            ),
            163 => 
            array (
                'permission_id' => 51,
                'role_id' => 7,
            ),
            164 => 
            array (
                'permission_id' => 52,
                'role_id' => 7,
            ),
            165 => 
            array (
                'permission_id' => 57,
                'role_id' => 7,
            ),
            166 => 
            array (
                'permission_id' => 58,
                'role_id' => 7,
            ),
            167 => 
            array (
                'permission_id' => 59,
                'role_id' => 7,
            ),
            168 => 
            array (
                'permission_id' => 60,
                'role_id' => 7,
            ),
            169 => 
            array (
                'permission_id' => 61,
                'role_id' => 7,
            ),
            170 => 
            array (
                'permission_id' => 62,
                'role_id' => 7,
            ),
            171 => 
            array (
                'permission_id' => 63,
                'role_id' => 7,
            ),
            172 => 
            array (
                'permission_id' => 64,
                'role_id' => 7,
            ),
            173 => 
            array (
                'permission_id' => 65,
                'role_id' => 7,
            ),
            174 => 
            array (
                'permission_id' => 66,
                'role_id' => 7,
            ),
            175 => 
            array (
                'permission_id' => 67,
                'role_id' => 7,
            ),
            176 => 
            array (
                'permission_id' => 68,
                'role_id' => 7,
            ),
            177 => 
            array (
                'permission_id' => 9,
                'role_id' => 8,
            ),
            178 => 
            array (
                'permission_id' => 10,
                'role_id' => 8,
            ),
            179 => 
            array (
                'permission_id' => 11,
                'role_id' => 8,
            ),
            180 => 
            array (
                'permission_id' => 12,
                'role_id' => 8,
            ),
            181 => 
            array (
                'permission_id' => 14,
                'role_id' => 8,
            ),
            182 => 
            array (
                'permission_id' => 18,
                'role_id' => 8,
            ),
            183 => 
            array (
                'permission_id' => 50,
                'role_id' => 8,
            ),
            184 => 
            array (
                'permission_id' => 53,
                'role_id' => 8,
            ),
            185 => 
            array (
                'permission_id' => 54,
                'role_id' => 8,
            ),
            186 => 
            array (
                'permission_id' => 55,
                'role_id' => 8,
            ),
            187 => 
            array (
                'permission_id' => 56,
                'role_id' => 8,
            ),
            188 => 
            array (
                'permission_id' => 57,
                'role_id' => 8,
            ),
            189 => 
            array (
                'permission_id' => 58,
                'role_id' => 8,
            ),
            190 => 
            array (
                'permission_id' => 61,
                'role_id' => 8,
            ),
            191 => 
            array (
                'permission_id' => 62,
                'role_id' => 8,
            ),
            192 => 
            array (
                'permission_id' => 63,
                'role_id' => 8,
            ),
            193 => 
            array (
                'permission_id' => 64,
                'role_id' => 8,
            ),
            194 => 
            array (
                'permission_id' => 66,
                'role_id' => 8,
            ),
            195 => 
            array (
                'permission_id' => 9,
                'role_id' => 9,
            ),
            196 => 
            array (
                'permission_id' => 10,
                'role_id' => 9,
            ),
            197 => 
            array (
                'permission_id' => 11,
                'role_id' => 9,
            ),
            198 => 
            array (
                'permission_id' => 12,
                'role_id' => 9,
            ),
            199 => 
            array (
                'permission_id' => 14,
                'role_id' => 9,
            ),
            200 => 
            array (
                'permission_id' => 18,
                'role_id' => 9,
            ),
            201 => 
            array (
                'permission_id' => 22,
                'role_id' => 9,
            ),
            202 => 
            array (
                'permission_id' => 26,
                'role_id' => 9,
            ),
            203 => 
            array (
                'permission_id' => 30,
                'role_id' => 9,
            ),
            204 => 
            array (
                'permission_id' => 34,
                'role_id' => 9,
            ),
            205 => 
            array (
                'permission_id' => 38,
                'role_id' => 9,
            ),
            206 => 
            array (
                'permission_id' => 42,
                'role_id' => 9,
            ),
            207 => 
            array (
                'permission_id' => 50,
                'role_id' => 9,
            ),
            208 => 
            array (
                'permission_id' => 57,
                'role_id' => 9,
            ),
            209 => 
            array (
                'permission_id' => 58,
                'role_id' => 9,
            ),
            210 => 
            array (
                'permission_id' => 59,
                'role_id' => 9,
            ),
            211 => 
            array (
                'permission_id' => 60,
                'role_id' => 9,
            ),
            212 => 
            array (
                'permission_id' => 61,
                'role_id' => 9,
            ),
            213 => 
            array (
                'permission_id' => 62,
                'role_id' => 9,
            ),
            214 => 
            array (
                'permission_id' => 63,
                'role_id' => 9,
            ),
            215 => 
            array (
                'permission_id' => 64,
                'role_id' => 9,
            ),
            216 => 
            array (
                'permission_id' => 65,
                'role_id' => 9,
            ),
            217 => 
            array (
                'permission_id' => 66,
                'role_id' => 9,
            ),
            218 => 
            array (
                'permission_id' => 67,
                'role_id' => 9,
            ),
            219 => 
            array (
                'permission_id' => 68,
                'role_id' => 9,
            ),
            220 => 
            array (
                'permission_id' => 9,
                'role_id' => 10,
            ),
            221 => 
            array (
                'permission_id' => 10,
                'role_id' => 10,
            ),
            222 => 
            array (
                'permission_id' => 11,
                'role_id' => 10,
            ),
            223 => 
            array (
                'permission_id' => 12,
                'role_id' => 10,
            ),
            224 => 
            array (
                'permission_id' => 14,
                'role_id' => 10,
            ),
            225 => 
            array (
                'permission_id' => 18,
                'role_id' => 10,
            ),
            226 => 
            array (
                'permission_id' => 50,
                'role_id' => 10,
            ),
            227 => 
            array (
                'permission_id' => 61,
                'role_id' => 10,
            ),
            228 => 
            array (
                'permission_id' => 62,
                'role_id' => 10,
            ),
            229 => 
            array (
                'permission_id' => 63,
                'role_id' => 10,
            ),
            230 => 
            array (
                'permission_id' => 64,
                'role_id' => 10,
            ),
            231 => 
            array (
                'permission_id' => 66,
                'role_id' => 10,
            ),
            232 => 
            array (
                'permission_id' => 9,
                'role_id' => 11,
            ),
            233 => 
            array (
                'permission_id' => 10,
                'role_id' => 11,
            ),
            234 => 
            array (
                'permission_id' => 11,
                'role_id' => 11,
            ),
            235 => 
            array (
                'permission_id' => 12,
                'role_id' => 11,
            ),
            236 => 
            array (
                'permission_id' => 14,
                'role_id' => 11,
            ),
            237 => 
            array (
                'permission_id' => 18,
                'role_id' => 11,
            ),
            238 => 
            array (
                'permission_id' => 50,
                'role_id' => 11,
            ),
            239 => 
            array (
                'permission_id' => 66,
                'role_id' => 11,
            ),
        ));
        
        
    }
}