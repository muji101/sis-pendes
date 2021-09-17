<?php

namespace App\Http\Controllers\ImportExport;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\FamiliesExport;
use App\Imports\FamiliesImport;

class FamilyExportController extends Controller
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function index()
    {
        return view('pages.family.excel-import');
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function importExcelCSV(Request $request) 
    {
        $validatedData = $request->validate([

            'file' => 'required',

        ]);

        Excel::import(new FamiliesImport,$request->file('file'));

            
        return redirect()->route('families.index')->with('success', 'Berhasil mengimport file excel');
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function exportExcelCSV($slug) 
    {
        return Excel::download(new FamiliesExport, 'keluarga.'.$slug);
    }
}
