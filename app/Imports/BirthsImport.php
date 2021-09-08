<?php

namespace App\Imports;

use App\Models\Birth;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class BirthsImport implements ToModel,WithStartRow
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
        return new Birth([
            'name' => $row[1],
            'date' => $row[2],
            'place' => $row[3],
            'gender' => $row[4],
            'family_id' => $row[5],
        ]);
    }
}
