<?php
namespace App\Http\Controllers\ImportExport;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exports\ResidentsExport;
use App\Imports\ResidentsImport;
use Maatwebsite\Excel\Facades\Excel;

class ResidentExportController extends Controller
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function index()
    {
        return view('pages.resident.excel-import');
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function importExcelCSV(Request $request) 
    {
        $validatedData = $request->validate([

            'file' => 'required',

        ]);

        Excel::import(new ResidentsImport,$request->file('file'));

            
        return redirect()->route('residents.index')->with('success', 'Berhasil mengimport file excel');
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function exportExcelCSV($slug) 
    {
        return Excel::download(new ResidentsExport, 'penduduk.'.$slug);
    }

    public function showmodal()
    {
        return view('pages.resident.import');
    }
}
