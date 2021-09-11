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
        $labelAgama  = ["Islam","Budha","Hindu","Katolik","Kristen","Konghucu"];
        
        for($bulan=1;$bulan < 13;$bulan++){
            $chartDeath     = collect(DB::SELECT("SELECT count(id) AS jumlah from deaths where month(created_at)='$bulan'"))->first();
            $chartBirth     = collect(DB::SELECT("SELECT count(id) AS jumlah from births where month(created_at)='$bulan'"))->first();
            $chartCome     = collect(DB::SELECT("SELECT count(id) AS jumlah from comes where month(created_at)='$bulan'"))->first();
            $chartMove    = collect(DB::SELECT("SELECT count(id) AS jumlah from moves where month(created_at)='$bulan'"))->first();
            $jumlah_death[] = $chartDeath->jumlah;
            $jumlah_birth[] = $chartBirth->jumlah;
            $jumlah_come[] = $chartCome->jumlah;
            $jumlah_move[] = $chartMove->jumlah;
        }
        // dd($jumlah_death);

        // $totalResidents = ($residents->count() + $births->count() + $comes->count())-($deaths->count() + $moves->count());
        $pie = [
            'pria' => Resident::where('status', 'ada')->where('gender', 'Laki-laki')->count(),
            'wanita' => Resident::where('status', 'ada')->where('gender', 'Perempuan')->count(),
        ];
        
        $bar = [
            'islam' => Resident::where('status', 'ada')->where('religion', 'Islam')->count(),
            'kristen' => Resident::where('status', 'ada')->where('religion', 'Kristen')->count(),
            'katolik' => Resident::where('status', 'ada')->where('religion', 'Katolik')->count(),
            'hindu' => Resident::where('status', 'ada')->where('religion', 'Hindu')->count(),
            'budha' => Resident::where('status', 'ada')->where('religion', 'Budha')->count(),
            'konghucu' => Resident::where('status', 'ada')->where('religion', 'Konghucu')->count(),
        ];

        $status = [
            'kawin' => Resident::where('status', 'ada')->where('martial_status', 'Kawin')->count(),
            'belum_kawin' => Resident::where('status', 'ada')->where('martial_status', 'Belum Kawin')->count()
        ];


        return view('pages.dashboard', [
            'residents' => $residents,
            'families' => $families,
            'births' => $births,
            'deaths' => $deaths,
            'comes' => $comes,
            'moves' => $moves,
            'pie' => $pie,
            'bar' => $bar,
            'status' => $status,
            // 'totalResidents' => $totalResidents
            'deathMonth' => $deathMonth,
            'label' => $label,
            'labelAgama' => $labelAgama,
            'jumlah_death' => $jumlah_death,
            'jumlah_birth' => $jumlah_birth,
            'jumlah_come' => $jumlah_come,
            'jumlah_move' => $jumlah_move,
        ]);
    }
}
