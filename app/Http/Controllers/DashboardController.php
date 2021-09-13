<?php

namespace App\Http\Controllers;

use App\Models\Birth;
use App\Models\Come;
use App\Models\Death;
use App\Models\Family;
use App\Models\Move;
use App\Models\Resident;
use App\Models\Village;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
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
        $labelUmur  = ["1-10 Tahun","11-20 Tahun","21-30 Tahun","31-40 Tahun","41-50 Tahun","51-60 Tahun", "61-70 Tahun"];
        
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

        $age = [
                'age1' => Resident::all()->where('status', 'ada')->whereBetween('age',[0,10])->count(),
                'age2' => Resident::all()->where('status', 'ada')->whereBetween('age',[11,20])->count(),
                'age3' => Resident::all()->where('status', 'ada')->whereBetween('age',[21,30])->count(),
                'age4' => Resident::all()->where('status', 'ada')->whereBetween('age',[31,40])->count(),
                'age5' => Resident::all()->where('status', 'ada')->whereBetween('age',[41,50])->count(),
                'age6' => Resident::all()->where('status', 'ada')->whereBetween('age',[51,60])->count(),
                'age7' => Resident::all()->where('status', 'ada')->whereBetween('age',[61,70])->count()
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
            'labelUmur' => $labelUmur,
            'jumlah_death' => $jumlah_death,
            'jumlah_birth' => $jumlah_birth,
            'jumlah_come' => $jumlah_come,
            'jumlah_move' => $jumlah_move,
            'age' => $age
        ]);
    }
}
