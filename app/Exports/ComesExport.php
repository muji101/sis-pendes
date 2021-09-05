<?php

namespace App\Exports;

use App\Models\Come;
use Maatwebsite\Excel\Concerns\FromCollection;

class ComesExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Come::all();
    }
}
