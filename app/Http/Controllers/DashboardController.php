<?php

namespace App\Http\Controllers;

use App\Models\Birth;
use App\Models\Come;
use App\Models\Death;
use App\Models\Family;
use App\Models\Move;
use App\Models\Resident;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class DashboardController extends Controller
{
    public function index()
    {
        $residents = Resident::where('status', 'ada')->get();
        $families = Family::get();
        $births = Birth::get();
        $deaths = Death::get();
        $comes = Come::get();
        $moves = Move::get();
        $deathMonth = Death::where('created_at')->get();
        $label  = ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"];
        for($bulan=1;$bulan < 13;$bulan++){
            $chartDeath     = collect(DB::SELECT("SELECT count(id) AS jumlah from deaths where month(created_at)='$bulan'"))->first();
            $chartBirth     = collect(DB::SELECT("SELECT count(id) AS jumlah from births where month(created_at)='$bulan'"))->first();
            $jumlah_death[] = $chartDeath->jumlah;
            $jumlah_birth[] = $chartBirth->jumlah;
        }
        // dd($jumlah_death);

        // $totalResidents = ($residents->count() + $births->count() + $comes->count())-($deaths->count() + $moves->count());
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
            // 'totalResidents' => $totalResidents
            'deathMonth' => $deathMonth,
            'label' => $label,
            'jumlah_death' => $jumlah_death,
            'jumlah_birth' => $jumlah_birth,
        ]);
    }
}
