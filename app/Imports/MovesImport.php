<?php

namespace App\Imports;

use App\Models\Move;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class MovesImport implements ToModel,WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function startRow():int{
        return 2;
    }
    
    public function model(array $row)
    {
        return new Move([
            'resident_id' => $row[1],
            'date' => $row[2],
            'reason' => $row[3],
        ]);
    }
}
