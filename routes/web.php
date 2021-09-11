<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MoveController;
use App\Http\Controllers\ResidentController;
use App\Http\Controllers\FamilyController;
use App\Http\Controllers\ComeController;
use App\Http\Controllers\BirthController;
use App\Http\Controllers\DeathController;
use App\Http\Controllers\FamilyMemberController;
use App\Http\Controllers\ExcelCSVController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ImportExport\ResidentExportController;
use App\Http\Controllers\ImportExport\BirthExportController;
use App\Http\Controllers\ImportExport\ComeExportController;
use App\Http\Controllers\ImportExport\MoveExportController;
use App\Http\Controllers\ImportExport\DeathExportController;
use App\Http\Controllers\VillageController;
use App\Http\Controllers\RwController;
use App\Http\Controllers\RtController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('pages.dashboard');
// })->name('dashboard');

// Rotue::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    Route::get('/user', [AuthController::class, 'index'])->name('user.index');
    Route::post('/user', [AuthController::class, 'store'])->name('user.store');
    Route::get('/user/create', [AuthController::class, 'create'])->name('user.create');
    Route::get('/user/edit/{id}', [AuthController::class, 'edit'])->name('user.edit');
    Route::post('/user/update/{id}', [AuthController::class, 'update'])->name('user.update');
    Route::delete('/user/delete/{id}', [AuthController::class, 'delete'])->name('user.delete');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Route::get('excel-csv-file', [ExcelCSVController::class, 'index']);
    // Route::post('import-excel-csv-file', [ExcelCSVController::class, 'importExcelCSV']);
    // Route::get('export-excel-csv-file/{slug}', [ExcelCSVController::class, 'exportExcelCSV']);

    // Route::get('excel-csv-file', [ExcelCSVController::class, 'index']);
    Route::get('import-residents', [ResidentExportController::class, 'index'])->name('modal-resident');
    Route::post('import-residents', [ResidentExportController::class, 'importExcelCSV'])->name('importResident');
    Route::get('export-residents/{slug}', [ResidentExportController::class, 'exportExcelCSV'])->name('exportResident');

    Route::post('import-births', [BirthExportController::class, 'importExcelCSV'])->name('importBirth');
    Route::get('export-births/{slug}', [BirthExportController::class, 'exportExcelCSV'])->name('exportBirth');

    Route::post('import-comes', [ComeExportController::class, 'importExcelCSV'])->name('importCome');
    Route::get('export-comes/{slug}', [ComeExportController::class, 'exportExcelCSV'])->name('exportCome');

    Route::post('import-deaths', [DeathExportController::class, 'importExcelCSV'])->name('importDeath');
    Route::get('export-deaths/{slug}', [DeathExportController::class, 'exportExcelCSV'])->name('exportDeath');

    Route::post('import-moves', [MoveExportController::class, 'importExcelCSV'])->name('importMove');
    Route::get('export-moves/{slug}', [MoveExportController::class, 'exportExcelCSV'])->name('exportMove');

    // Route::post('import-families', [ResidentExportController::class, 'importExcelCSV'])->name('importResident');
    // Route::get('export-families/{slug}', [ResidentExportController::class, 'exportExcelCSV']);

    Route::resource('residents', ResidentController::class);
    Route::get('/download-template/residents', [ResidentController::class,'downloadtemplate'])->name('residents.template');
    Route::get('/reset-filter/residents', [ResidentController::class,'resetFilter'])->name('filter-reset');

    Route::resource('families', FamilyController::class);
    Route::get('families/createMember/{id}', [FamilyController::class, 'createMember'])->name('families.createMember');

    Route::resource('familyMember', FamilyMemberController::class);

    Route::resource('births', BirthController::class);
    Route::get('/download-template/births',[BirthController::class,'downloadtemplate'])->name('births.template');

    Route::resource('deaths', DeathController::class);
    Route::get('deaths/filter/data', [DeathController::class, 'filter'])->name('deaths.filter');
    Route::get('/download-template/deaths',[DeathController::class,'downloadtemplate'])->name('deaths.template');

    Route::resource('moves', MoveController::class);
    Route::get('/download-template/moves',[MoveController::class,'downloadtemplate'])->name('moves.template');

    Route::resource('comes', ComeController::class);
    Route::get('/download-template/comes',[ComeController::class,'downloadtemplate'])->name('comes.template');

    Route::resource('villages', VillageController::class);
    Route::resource('rws', RwController::class);
    Route::resource('rts', RtController::class);
});

// Route::middleware(['guest'])->group(function () {
    Route::get('/', [AuthController::class, 'login'])->name('login');
    Route::post('/authenticate', [AuthController::class, 'authenticate'])->name('auth');
// });


