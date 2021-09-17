<?php

namespace App\Imports;

use App\Models\Family;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class FamiliesImport implements ToModel, WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function startRow():int
    {
        return 2;
    }

    public function model(array $row)
    {
        return new Family([
            'resident_id' => $row[1],
            'no_family' => $row[2],
            'village' => $row[3],
            'rw' => $row[4],
            'rt' => $row[5],
            'address' => $row[6]
        ]);
    }
}
