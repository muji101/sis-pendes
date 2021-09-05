<?php

namespace App\Http\Controllers;

use App\Models\Birth;
use App\Models\Come;
use App\Models\Death;
use App\Models\Family;
use App\Models\Move;
use App\Models\Resident;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $residents = Resident::get();
        $families = Family::get();
        $births = Birth::get();
        $deaths = Death::get();
        $comes = Come::get();
        $moves = Move::get();

        $totalResidents = ($residents->count() + $births->count() + $comes->count())-($deaths->count() + $moves->count());
        $pie = [
            'pria' => Resident::where('gender', 'Laki-laki')->count(),
            'wanita' => Resident::where('gender', 'Perempuan')->count(),
        ];

        return view('pages.dashboard', [
            'residents' => $residents,
            'families' => $families,
            'births' => $births,
            'deaths' => $deaths,
            'comes' => $comes,
            'moves' => $moves,
            'pie' => $pie,
            'totalResidents' => $totalResidents
        ]);
    }
}
