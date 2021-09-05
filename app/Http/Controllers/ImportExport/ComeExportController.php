<?php

namespace App\Http\Controllers\ImportExport;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exports\ComesExport;
use App\Imports\ComesImport;
use Maatwebsite\Excel\Facades\Excel;

class ComeExportController extends Controller
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function index()
    {
        return view('pages.come.excel-import');
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function importExcelCSV(Request $request) 
    {
        $validatedData = $request->validate([

            'file' => 'required',

        ]);

        Excel::import(new ComesImport,$request->file('file'));

            
        return redirect()->route('comes.index')->with('success', 'Berhasil mengimport file excel');
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function exportExcelCSV($slug) 
    {
        return Excel::download(new ComesExport, 'pendatang.'.$slug);
    }
}
