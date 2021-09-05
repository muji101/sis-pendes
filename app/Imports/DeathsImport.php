<?php

namespace App\Imports;

use App\Models\Death;
use Maatwebsite\Excel\Concerns\ToModel;

class DeathsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Death([
            'resident_id' => $row[1],
            'date' => $row[1],
            'time' => $row[1],
            'age' => $row[1],
            'reason' => $row[1],
        ]);
    }
}
