<?php

namespace App\Http\Controllers\ImportExport;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exports\BirthsExport;
use App\Imports\BirthsImport;
use Maatwebsite\Excel\Facades\Excel;

class BirthExportController extends Controller
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function index()
    {
        return view('pages.birth.excel-import');
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function importExcelCSV(Request $request) 
    {
        $validatedData = $request->validate([

            'file' => 'required',

        ]);

        Excel::import(new BirthsImport,$request->file('file'));

        return redirect()->route('births.index')->with('success', 'Berhasil mengimport file excel');
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function exportExcelCSV($slug) 
    {
        return Excel::download(new BirthsExport, 'kelahiran.'.$slug);
    }
}
