<?php

namespace App\Exports;

use App\Models\Birth;
use Maatwebsite\Excel\Concerns\FromCollection;

class BirthsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Birth::all();
    }
}
