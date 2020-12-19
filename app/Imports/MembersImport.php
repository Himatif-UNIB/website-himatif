<?php

namespace App\Imports;

use App\Models\Force;
use App\Models\Member;
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
            $checkIfNPMExist->delete();
        }

        return new Member([
            'name' => $row['nama'],
            'npm' => $row['npm'],
            'force_id' => $forceID
        ]);
    }
}
