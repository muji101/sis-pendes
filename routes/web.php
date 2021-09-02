<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MoveController;
use App\Http\Controllers\ResidentController;
use App\Http\Controllers\FamilyController;
use App\Http\Controllers\ComeController;
use App\Http\Controllers\BirthController;
use App\Http\Controllers\DeathController;
use App\Http\Controllers\FamilyMemberController;

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

    Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
    Route::get('/user', [AuthController::class, 'index'])->name('user.index');
    Route::post('/user', [AuthController::class, 'store'])->name('user.store');
    Route::get('/user/create', [AuthController::class, 'create'])->name('user.create');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::resource('residents', ResidentController::class);

    Route::resource('families', FamilyController::class);

    Route::resource('familyMember', FamilyMemberController::class);

    Route::resource('births', BirthController::class);

    Route::resource('deaths', DeathController::class);

    Route::resource('moves', MoveController::class);

    Route::resource('comes', ComeController::class);
    
});

Route::middleware(['guest'])->group(function () {
    Route::get('/', [AuthController::class, 'login'])->name('login');
    Route::post('/authenticate', [AuthController::class, 'authenticate'])->name('auth');
});


