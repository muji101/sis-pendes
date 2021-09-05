<?php

namespace App\Imports;

use App\Models\Resident;
use Maatwebsite\Excel\Concerns\ToModel;

class ResidentsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Resident([
            'nik' => $row[1],
            'name' => $row[2],
            'birthplace' => $row[3],
            'birthdate' => $row[4],
            'gender' => $row[5],
            'religion' => $row[6],
            'last_education' => $row[7],
            'work' => $row[8],
            'blood_type' => $row[9],
            'martial_status' => $row[10],
            'citizenship' => $row[11]
        ]);
    }
}
