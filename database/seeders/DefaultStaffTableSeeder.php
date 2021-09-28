<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DefaultStaffTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('staff')->delete();
        
        \DB::table('staff')->insert(array (
            0 => 
            array (
                'id' => 324,
                'period_id' => 1,
                'position_id' => 1,
                'user_id' => 2,
            ),
            1 => 
            array (
                'id' => 325,
                'period_id' => 1,
                'position_id' => 2,
                'user_id' => 31,
            ),
            2 => 
            array (
                'id' => 326,
                'period_id' => 1,
                'position_id' => 3,
                'user_id' => 49,
            ),
            3 => 
            array (
                'id' => 327,
                'period_id' => 1,
                'position_id' => 6,
                'user_id' => 77,
            ),
            4 => 
            array (
                'id' => 328,
                'period_id' => 1,
                'position_id' => 7,
                'user_id' => 46,
            ),
            5 => 
            array (
                'id' => 329,
                'period_id' => 1,
                'position_id' => 8,
                'user_id' => 44,
            ),
            6 => 
            array (
                'id' => 330,
                'period_id' => 1,
                'position_id' => 9,
                'user_id' => 79,
            ),
            7 => 
            array (
                'id' => 331,
                'period_id' => 1,
                'position_id' => 10,
                'user_id' => 75,
            ),
            8 => 
            array (
                'id' => 332,
                'period_id' => 1,
                'position_id' => 11,
                'user_id' => 68,
            ),
            9 => 
            array (
                'id' => 333,
                'period_id' => 1,
                'position_id' => 12,
                'user_id' => 71,
            ),
            10 => 
            array (
                'id' => 334,
                'period_id' => 1,
                'position_id' => 13,
                'user_id' => 26,
            ),
            11 => 
            array (
                'id' => 335,
                'period_id' => 1,
                'position_id' => 14,
                'user_id' => 67,
            ),
            12 => 
            array (
                'id' => 336,
                'period_id' => 1,
                'position_id' => 15,
                'user_id' => 55,
            ),
            13 => 
            array (
                'id' => 337,
                'period_id' => 1,
                'position_id' => 16,
                'user_id' => 10,
            ),
            14 => 
            array (
                'id' => 338,
                'period_id' => 1,
                'position_id' => 16,
                'user_id' => 11,
            ),
            15 => 
            array (
                'id' => 339,
                'period_id' => 1,
                'position_id' => 16,
                'user_id' => 13,
            ),
            16 => 
            array (
                'id' => 340,
                'period_id' => 1,
                'position_id' => 16,
                'user_id' => 19,
            ),
            17 => 
            array (
                'id' => 341,
                'period_id' => 1,
                'position_id' => 16,
                'user_id' => 34,
            ),
            18 => 
            array (
                'id' => 342,
                'period_id' => 1,
                'position_id' => 16,
                'user_id' => 42,
            ),
            19 => 
            array (
                'id' => 343,
                'period_id' => 1,
                'position_id' => 16,
                'user_id' => 73,
            ),
            20 => 
            array (
                'id' => 344,
                'period_id' => 1,
                'position_id' => 16,
                'user_id' => 87,
            ),
            21 => 
            array (
                'id' => 345,
                'period_id' => 1,
                'position_id' => 16,
                'user_id' => 91,
            ),
            22 => 
            array (
                'id' => 346,
                'period_id' => 1,
                'position_id' => 16,
                'user_id' => 93,
            ),
            23 => 
            array (
                'id' => 347,
                'period_id' => 1,
                'position_id' => 16,
                'user_id' => 97,
            ),
            24 => 
            array (
                'id' => 348,
                'period_id' => 1,
                'position_id' => 16,
                'user_id' => 129,
            ),
            25 => 
            array (
                'id' => 349,
                'period_id' => 1,
                'position_id' => 16,
                'user_id' => 131,
            ),
            26 => 
            array (
                'id' => 350,
                'period_id' => 1,
                'position_id' => 16,
                'user_id' => 132,
            ),
            27 => 
            array (
                'id' => 351,
                'period_id' => 1,
                'position_id' => 16,
                'user_id' => 151,
            ),
            28 => 
            array (
                'id' => 352,
                'period_id' => 1,
                'position_id' => 16,
                'user_id' => 159,
            ),
            29 => 
            array (
                'id' => 353,
                'period_id' => 1,
                'position_id' => 17,
                'user_id' => 7,
            ),
            30 => 
            array (
                'id' => 354,
                'period_id' => 1,
                'position_id' => 17,
                'user_id' => 18,
            ),
            31 => 
            array (
                'id' => 355,
                'period_id' => 1,
                'position_id' => 17,
                'user_id' => 20,
            ),
            32 => 
            array (
                'id' => 356,
                'period_id' => 1,
                'position_id' => 17,
                'user_id' => 36,
            ),
            33 => 
            array (
                'id' => 357,
                'period_id' => 1,
                'position_id' => 17,
                'user_id' => 41,
            ),
            34 => 
            array (
                'id' => 358,
                'period_id' => 1,
                'position_id' => 17,
                'user_id' => 45,
            ),
            35 => 
            array (
                'id' => 359,
                'period_id' => 1,
                'position_id' => 17,
                'user_id' => 47,
            ),
            36 => 
            array (
                'id' => 360,
                'period_id' => 1,
                'position_id' => 17,
                'user_id' => 54,
            ),
            37 => 
            array (
                'id' => 361,
                'period_id' => 1,
                'position_id' => 17,
                'user_id' => 90,
            ),
            38 => 
            array (
                'id' => 362,
                'period_id' => 1,
                'position_id' => 17,
                'user_id' => 94,
            ),
            39 => 
            array (
                'id' => 363,
                'period_id' => 1,
                'position_id' => 17,
                'user_id' => 98,
            ),
            40 => 
            array (
                'id' => 364,
                'period_id' => 1,
                'position_id' => 17,
                'user_id' => 109,
            ),
            41 => 
            array (
                'id' => 365,
                'period_id' => 1,
                'position_id' => 17,
                'user_id' => 124,
            ),
            42 => 
            array (
                'id' => 366,
                'period_id' => 1,
                'position_id' => 17,
                'user_id' => 150,
            ),
            43 => 
            array (
                'id' => 367,
                'period_id' => 1,
                'position_id' => 17,
                'user_id' => 161,
            ),
            44 => 
            array (
                'id' => 368,
                'period_id' => 1,
                'position_id' => 18,
                'user_id' => 4,
            ),
            45 => 
            array (
                'id' => 369,
                'period_id' => 1,
                'position_id' => 18,
                'user_id' => 6,
            ),
            46 => 
            array (
                'id' => 370,
                'period_id' => 1,
                'position_id' => 18,
                'user_id' => 9,
            ),
            47 => 
            array (
                'id' => 371,
                'period_id' => 1,
                'position_id' => 18,
                'user_id' => 23,
            ),
            48 => 
            array (
                'id' => 372,
                'period_id' => 1,
                'position_id' => 18,
                'user_id' => 30,
            ),
            49 => 
            array (
                'id' => 373,
                'period_id' => 1,
                'position_id' => 18,
                'user_id' => 66,
            ),
            50 => 
            array (
                'id' => 374,
                'period_id' => 1,
                'position_id' => 18,
                'user_id' => 76,
            ),
            51 => 
            array (
                'id' => 375,
                'period_id' => 1,
                'position_id' => 18,
                'user_id' => 96,
            ),
            52 => 
            array (
                'id' => 376,
                'period_id' => 1,
                'position_id' => 18,
                'user_id' => 117,
            ),
            53 => 
            array (
                'id' => 377,
                'period_id' => 1,
                'position_id' => 18,
                'user_id' => 125,
            ),
            54 => 
            array (
                'id' => 378,
                'period_id' => 1,
                'position_id' => 18,
                'user_id' => 128,
            ),
            55 => 
            array (
                'id' => 379,
                'period_id' => 1,
                'position_id' => 18,
                'user_id' => 143,
            ),
            56 => 
            array (
                'id' => 380,
                'period_id' => 1,
                'position_id' => 18,
                'user_id' => 147,
            ),
            57 => 
            array (
                'id' => 381,
                'period_id' => 1,
                'position_id' => 19,
                'user_id' => 21,
            ),
            58 => 
            array (
                'id' => 382,
                'period_id' => 1,
                'position_id' => 19,
                'user_id' => 22,
            ),
            59 => 
            array (
                'id' => 383,
                'period_id' => 1,
                'position_id' => 19,
                'user_id' => 24,
            ),
            60 => 
            array (
                'id' => 384,
                'period_id' => 1,
                'position_id' => 19,
                'user_id' => 32,
            ),
            61 => 
            array (
                'id' => 385,
                'period_id' => 1,
                'position_id' => 19,
                'user_id' => 43,
            ),
            62 => 
            array (
                'id' => 386,
                'period_id' => 1,
                'position_id' => 19,
                'user_id' => 52,
            ),
            63 => 
            array (
                'id' => 387,
                'period_id' => 1,
                'position_id' => 19,
                'user_id' => 63,
            ),
            64 => 
            array (
                'id' => 388,
                'period_id' => 1,
                'position_id' => 19,
                'user_id' => 69,
            ),
            65 => 
            array (
                'id' => 389,
                'period_id' => 1,
                'position_id' => 19,
                'user_id' => 83,
            ),
            66 => 
            array (
                'id' => 390,
                'period_id' => 1,
                'position_id' => 19,
                'user_id' => 103,
            ),
            67 => 
            array (
                'id' => 391,
                'period_id' => 1,
                'position_id' => 19,
                'user_id' => 105,
            ),
            68 => 
            array (
                'id' => 392,
                'period_id' => 1,
                'position_id' => 19,
                'user_id' => 110,
            ),
            69 => 
            array (
                'id' => 393,
                'period_id' => 1,
                'position_id' => 19,
                'user_id' => 114,
            ),
            70 => 
            array (
                'id' => 394,
                'period_id' => 1,
                'position_id' => 19,
                'user_id' => 120,
            ),
            71 => 
            array (
                'id' => 395,
                'period_id' => 1,
                'position_id' => 19,
                'user_id' => 127,
            ),
            72 => 
            array (
                'id' => 396,
                'period_id' => 1,
                'position_id' => 19,
                'user_id' => 134,
            ),
            73 => 
            array (
                'id' => 397,
                'period_id' => 1,
                'position_id' => 19,
                'user_id' => 145,
            ),
            74 => 
            array (
                'id' => 398,
                'period_id' => 1,
                'position_id' => 20,
                'user_id' => 5,
            ),
            75 => 
            array (
                'id' => 399,
                'period_id' => 1,
                'position_id' => 20,
                'user_id' => 12,
            ),
            76 => 
            array (
                'id' => 400,
                'period_id' => 1,
                'position_id' => 20,
                'user_id' => 14,
            ),
            77 => 
            array (
                'id' => 401,
                'period_id' => 1,
                'position_id' => 20,
                'user_id' => 17,
            ),
            78 => 
            array (
                'id' => 402,
                'period_id' => 1,
                'position_id' => 20,
                'user_id' => 27,
            ),
            79 => 
            array (
                'id' => 403,
                'period_id' => 1,
                'position_id' => 20,
                'user_id' => 39,
            ),
            80 => 
            array (
                'id' => 404,
                'period_id' => 1,
                'position_id' => 20,
                'user_id' => 51,
            ),
            81 => 
            array (
                'id' => 405,
                'period_id' => 1,
                'position_id' => 20,
                'user_id' => 53,
            ),
            82 => 
            array (
                'id' => 406,
                'period_id' => 1,
                'position_id' => 20,
                'user_id' => 74,
            ),
            83 => 
            array (
                'id' => 407,
                'period_id' => 1,
                'position_id' => 20,
                'user_id' => 84,
            ),
            84 => 
            array (
                'id' => 408,
                'period_id' => 1,
                'position_id' => 20,
                'user_id' => 88,
            ),
            85 => 
            array (
                'id' => 409,
                'period_id' => 1,
                'position_id' => 20,
                'user_id' => 92,
            ),
            86 => 
            array (
                'id' => 410,
                'period_id' => 1,
                'position_id' => 20,
                'user_id' => 95,
            ),
            87 => 
            array (
                'id' => 411,
                'period_id' => 1,
                'position_id' => 20,
                'user_id' => 100,
            ),
            88 => 
            array (
                'id' => 412,
                'period_id' => 1,
                'position_id' => 20,
                'user_id' => 106,
            ),
            89 => 
            array (
                'id' => 413,
                'period_id' => 1,
                'position_id' => 20,
                'user_id' => 116,
            ),
            90 => 
            array (
                'id' => 414,
                'period_id' => 1,
                'position_id' => 20,
                'user_id' => 138,
            ),
            91 => 
            array (
                'id' => 415,
                'period_id' => 1,
                'position_id' => 20,
                'user_id' => 144,
            ),
            92 => 
            array (
                'id' => 416,
                'period_id' => 1,
                'position_id' => 20,
                'user_id' => 153,
            ),
            93 => 
            array (
                'id' => 417,
                'period_id' => 1,
                'position_id' => 21,
                'user_id' => 15,
            ),
            94 => 
            array (
                'id' => 418,
                'period_id' => 1,
                'position_id' => 21,
                'user_id' => 16,
            ),
            95 => 
            array (
                'id' => 419,
                'period_id' => 1,
                'position_id' => 21,
                'user_id' => 25,
            ),
            96 => 
            array (
                'id' => 420,
                'period_id' => 1,
                'position_id' => 21,
                'user_id' => 57,
            ),
            97 => 
            array (
                'id' => 421,
                'period_id' => 1,
                'position_id' => 21,
                'user_id' => 59,
            ),
            98 => 
            array (
                'id' => 422,
                'period_id' => 1,
                'position_id' => 21,
                'user_id' => 61,
            ),
            99 => 
            array (
                'id' => 423,
                'period_id' => 1,
                'position_id' => 21,
                'user_id' => 64,
            ),
            100 => 
            array (
                'id' => 424,
                'period_id' => 1,
                'position_id' => 21,
                'user_id' => 86,
            ),
            101 => 
            array (
                'id' => 425,
                'period_id' => 1,
                'position_id' => 21,
                'user_id' => 89,
            ),
            102 => 
            array (
                'id' => 426,
                'period_id' => 1,
                'position_id' => 21,
                'user_id' => 104,
            ),
            103 => 
            array (
                'id' => 427,
                'period_id' => 1,
                'position_id' => 21,
                'user_id' => 113,
            ),
            104 => 
            array (
                'id' => 428,
                'period_id' => 1,
                'position_id' => 21,
                'user_id' => 119,
            ),
            105 => 
            array (
                'id' => 429,
                'period_id' => 1,
                'position_id' => 21,
                'user_id' => 121,
            ),
            106 => 
            array (
                'id' => 430,
                'period_id' => 1,
                'position_id' => 21,
                'user_id' => 123,
            ),
            107 => 
            array (
                'id' => 431,
                'period_id' => 1,
                'position_id' => 21,
                'user_id' => 135,
            ),
            108 => 
            array (
                'id' => 432,
                'period_id' => 1,
                'position_id' => 21,
                'user_id' => 148,
            ),
            109 => 
            array (
                'id' => 433,
                'period_id' => 1,
                'position_id' => 21,
                'user_id' => 166,
            ),
        ));
        
        
    }
}