<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\FamilyRequest;
use App\Models\Family;
use App\Models\FamilyMember;
use App\Models\Resident;
use App\Models\Village;
use App\Models\Rw;
use App\Models\Rt;

class FamilyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $families = Family::get();
        $residents = Resident::get();
        
        return view('pages.family.index', [
            'families' => $families,
            'residents' => $residents
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
        $villages = Village::get();
        $rws = Rw::get();
        $rts = Rt::get();
        
        return view('pages.family.create', [
            'residents' => $residents,
            'villages' => $villages,
            'rws' => $rws,
            'rts' => $rts
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FamilyRequest $request)
    {
        // $residents = Resident::get();

        $data = $request->all();

        
        // $item = FamilyMember::findOrFail($request->resident_id);
        // $item->status = 'meninggal';
        // $item->save();
        
        // membuat anggota otomatis dengan kepala keluarga
        $families = Family::get();
        // dd($families->last()->id+1);
        
        FamilyMember::create([
            'resident_id' => $request->resident_id,
            'family_id' => $families->count() <= 0 ? 1 : $families->last()->id + 1,
            'family_relationship' => 'Kepala Keluarga'
        ]);

        Family::create($data);

        return redirect()->route('families.index')->with('residents')->with('success', 'Berhasil Membuat Data');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $families = Family::findOrFail($id);
        $residents = Resident::get();
        $members = FamilyMember::where('family_id', $id)->get();
        // $families = Family::with('details.product')->findOrFail($id);

        // return view('pages.family.show')->with([
        //     'families' => $families
        // ]);

        return view('pages.family.show', [
            'families' => $families,
            'residents' => $residents,
            'members' => $members
        ]);

    }

    public function createMember($id)
    {
        $families = Family::findOrFail($id);
        $residents = Resident::get();
        // $residents = FamilyMember::where('family_relationship','!=', 'Kepala Keluarga')->get();


        return view('pages.family.createMember', [
            'families' => $families,
            'residents' => $residents,

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
        $families = Family::findOrFail($id);
        $residents = Resident::get();
        $villages = Village::get();
        $rws = Rw::get();
        $rts = Rt::get();

        return view('pages.family.create', [
            'families' => $families,
            'residents' => $residents,
            'villages' => $villages,
            'rws' => $rws,
            'rts' => $rts
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();

        Family::Find($id)->update($data);

        return redirect()->route('families.index')->with('success', 'Berhasil Membuat Data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Family::findOrFail($id);

        $data->delete();

        return back()->with('delete', 'Berhasil Menghapus Data');
    }
}
