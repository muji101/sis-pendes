<?php

namespace App\Imports;

use App\Models\Death;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class DeathsImport implements ToModel, WithStartRow
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
        return new Death([
            'resident_id' => $row[1],
            'date' => $row[2],
            'time' => $row[3],
            'age' => $row[4],
            'reason' => $row[5],
        ]);
    }
}
