<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\User;

class ExcelCSVController extends Controller
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function index()
    {
        return view('excel-csv-import');
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function importExcelCSV(Request $request) 
    {
        $validatedData = $request->validate([

            'file' => 'required',

        ]);

        Excel::import(new UsersImport,$request->file('file'));

            
        return redirect('excel-csv-file')->with('status', 'The file has been excel/csv imported to database in laravel 8');
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function exportExcelCSV($slug) 
    {
        return Excel::download(new UsersExport, 'users.'.$slug);
    }
}
