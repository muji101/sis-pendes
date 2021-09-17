<?php

namespace App\Exports;

use App\Models\Family;
use Maatwebsite\Excel\Concerns\FromCollection;

class FamiliesExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Family::all();
    }
}
