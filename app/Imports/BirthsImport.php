<?php

namespace App\Imports;

use App\Models\Birth;
use Maatwebsite\Excel\Concerns\ToModel;

class BirthsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Birth([
            'name' => $row[1],
            'date' => $row[2],
            'place' => $row[3],
            'gender' => $row[4],
            'family_id' => $row[5],
        ]);
    }
}
