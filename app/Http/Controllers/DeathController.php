<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\DeathRequest;
use App\Models\Death;
use App\Models\Resident;
use Illuminate\Support\Carbon;

class DeathController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $deaths = Death::get();

        return view('pages.death.index', [
            'deaths' => $deaths,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $residents = Resident::get();
        
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
    public function store(DeathRequest $request)
    {
        $data = $request->all();

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
        $residents = Resident::get();

        $now = Carbon::now(); // Tanggal sekarang
        $b_day = Carbon::parse($residents->first()->birthdate); // Tanggal Lahir
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
}
