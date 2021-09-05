<?php

namespace App\Imports;

use App\Models\Move;
use Maatwebsite\Excel\Concerns\ToModel;

class MovesImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Move([
            'resident_id' => $row[1],
            'date' => $row[1],
            'reason' => $row[1],
        ]);
    }
}
