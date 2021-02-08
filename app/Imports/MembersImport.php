<?php

namespace App\Imports;

use App\Models\Force;
use App\Models\Member;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MembersImport implements ToModel, WithHeadingRow
{
    /**
     * @var   int $force_id
     * 
     * ID angkatan yang akan diimport
     */
    private $force_id;

    /**
     * @param   int $force  ID angkatan yang akan diimport
     */
    public function __construct($force_id) {
        $this->force_id = $force_id;
    }

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if ( ! Member::where('npm', $row['npm'])->exists()) {
            $userId = DB::table('users')->insertGetId(
                ['name' => $row['nama'], 'password' => Hash::make('12345678'), 'email' => $row['npm'] .'@default.test', 'created_at' => now()]
            );

            User::find($userId)->assignRole('member');

            DB::table('members')->insert([
                'user_id' => $userId,
                'name' => $row['nama'],
                'npm' => $row['npm'],
                'force_id' => $this->force_id,
                'created_at' => now()
            ]);
        }
    }
}
