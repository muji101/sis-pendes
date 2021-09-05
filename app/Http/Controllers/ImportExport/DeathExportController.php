<?php

namespace App\Http\Controllers\ImportExport;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exports\DeathsExport;
use App\Imports\DeathsImport;
use Maatwebsite\Excel\Facades\Excel;

class DeathExportController extends Controller
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function index()
    {
        return view('pages.death.excel-import');
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function importExcelCSV(Request $request) 
    {
        $validatedData = $request->validate([

            'file' => 'required',

        ]);

        Excel::import(new DeathsImport,$request->file('file'));

            
        return redirect()->route('deaths.index')->with('success', 'Berhasil mengimport file excel');
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function exportExcelCSV($slug) 
    {
        return Excel::download(new DeathsExport, 'kematian.'.$slug);
    }
}
