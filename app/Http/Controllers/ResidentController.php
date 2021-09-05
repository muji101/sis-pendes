<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ResidentRequest;
use App\Models\Death;
use App\Models\Family;
use App\Models\FamilyMember;
use App\Models\Resident;
use Illuminate\Support\Carbon;

class ResidentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $residents = Resident::get();
        $deaths = Death::get();
        // $families = Family::get();

        // dd($residents);

        return view('pages.resident.index', [
            'residents' => $residents,
            'deaths' => $deaths
            // 'families' => $families,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.resident.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ResidentRequest $request)
    {
        $data = $request->all();

        Resident::create($data);

        return redirect()->route('residents.index')->with('success', 'Berhasil Membuat Data');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $residents = Resident::find($id);

        $now = Carbon::now(); // Tanggal sekarang
        $b_day = Carbon::parse($residents->birthdate); // Tanggal Lahir
        $age = $b_day->diffInYears($now);  // Menghitung umur

        return view('pages.resident.show', [
            'residents' => $residents,
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
        $residents = Resident::findOrFail($id);
        return view('pages.resident.create', [
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
    public function update(ResidentRequest $request, $id)
    {
        $data = $request->all();

        Resident::Find($id)->update($data);

        return redirect()->route('residents.index')->with('success', 'Berhasil Mengedit Data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Resident::findOrFail($id);

        $data->delete();

        return back()->with('delete', 'Berhasil Menghapus Data');
    }
}
