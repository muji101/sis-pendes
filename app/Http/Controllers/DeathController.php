<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\DeathRequest;
use App\Models\Death;
use App\Models\Resident;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Response as FacadeResponse;


class DeathController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Death::where('resident_id', '!=', null );

        if (request()->get('gender') && request()->get('gender') != null ) {
            $data=$data->where('gender','=',request()->get('gender'));
        }

        $deaths= $data->get();

        return view('pages.death.index',compact('deaths'));
    }

    public function filter(Request $request){
        $month = $request->get('month');
        $year = $request->get('year');
            
        $deaths = Death::whereYear('created_at', '=', $year)
            ->whereMonth('created_at', '=', $month)
            ->get();
            
            return view('pages.death.index', ['deaths' => $deaths]);
        }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $residents = Resident::where('status', 'ada')->get();
        
        return view('pages.death.create', [
            'residents' => $residents
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $item = Resident::findOrFail($request->resident_id);
        $item->status = 'meninggal';
        $item->save();
        
        Death::create($data);

        return redirect()->route('deaths.index')->with('success', 'Berhasil Membuat Data');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $deaths = Death::find($id);
        
        $now = Carbon::now(); // Tanggal sekarang
        $b_day = Carbon::parse($deaths->resident->birthdate); // Tanggal Lahir

        $age = $b_day->diffInYears($now);  // Menghitung umur
        // echo 'Umurnya Adalah '.$age. ' Tahun'; 
        // dd($age);

        return view('pages.death.show', [
            'deaths' => $deaths,
            'age' => $age
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $residents = Resident::get();
        $deaths = Death::findOrFail($id);
        return view('pages.death.create', [
            'deaths' => $deaths,
            'residents' => $residents
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DeathRequest $request, $id)
    {
        $data = $request->all();

        Death::FindOrfail($id)->update($data);

        return redirect()->route('deaths.index')->with('success', 'Berhasil Mengedit Data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Death::find($id);

        $data->delete();

        return back()->with('delete', 'Berhasil Menghapus Data');
    }

    public function downloadtemplate()
    {
        $template="./template/kematian.xlsx";
        return FacadeResponse::download($template);
    }
}
