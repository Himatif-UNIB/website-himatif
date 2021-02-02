<?php

namespace App\Imports;

use App\Models\Force;
use App\Models\Member;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MembersImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $forceID = now()->year;
        $givenForceYear = $row['angkatan'];

        $givenForceData = Force::where('year', $givenForceYear)->first();
        if ($givenForceData != NULL) {
            $forceID = $givenForceData->id;
        }

        $checkIfNPMExist = Member::where('npm', $row['npm'])->first();
        if ($checkIfNPMExist != null) {
            $user_id = $checkIfNPMExist->user_id;

            $checkIfNPMExist->delete();
            User::where('id', $user_id)->delete();
        }

        $user = new User();
        $user->name = $row['nama'];
        $user->password = Hash::make('12345678');
        $user->email = $row['npm'] .'@default.test';
        $user->save();

        $user_id = $user->id;

        $member = new Member();
        $member->user_id = $user_id;
        $member->name = $row['nama'];
        $member->npm = $row['npm'];
        $member->force_id = $forceID;
        $member->save();
    }
}
