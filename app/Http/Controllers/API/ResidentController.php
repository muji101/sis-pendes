<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Birth;
use App\Models\Come;
use App\Models\Death;
use App\Models\Family;
use App\Models\Move;
use App\Models\Resident;
use Illuminate\Http\Request;

class ResidentController extends Controller
{
    public function residents(Request $request)
    {
        $data = Resident::all();
        return $data;
    }

    public function families(Request $request)
    {
        $data = Family::all();
        return $data;
    }

    public function births(Request $request)
    {
        $data = Birth::all();
        return $data;
    }

    public function deaths(Request $request)
    {
        $data = Death::all();
        return $data;
    }

    public function comes(Request $request)
    {
        $data = Come::all();
        return $data;
    }

    public function moves(Request $request)
    {
        $data = Move::all();
        return $data;
    }
}
