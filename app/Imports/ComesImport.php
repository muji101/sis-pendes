<?php

namespace App\Imports;

use App\Models\Come;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class ComesImport implements ToModel,WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function startRow(): int
    {
        return 2;
    }
    
    public function model(array $row)
    {
        return new Come([
            'nik'  => $row[1],
            'name' => $row[2],
            'birthplace' => $row[3],
            'birthdate' => $row[4],
            'gender' => $row[5],
            'religion' => $row[6],
            'last_education' => $row[7],
            'address' => $row[8],
            'work' => $row[9],
            'blood_type' => $row[10],
            'martial_status' => $row[11],
            'citizenship' => $row[12],
            'arrival_date' => $row[13],
            'resident_id' => $row[14]
        ]);
    }
}
