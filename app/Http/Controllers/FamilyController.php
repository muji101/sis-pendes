<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\FamilyRequest;
use App\Models\Family;
use App\Models\FamilyMember;
use App\Models\Resident;

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
        
        return view('pages.family.index', [
            'families' => $families,
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
        
        return view('pages.family.create', [
            'residents' => $residents
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

        Family::create($data);

        return redirect()->route('families.index')->with('residents');

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

        return view('pages.family.detail', [
            'families' => $families,
            'residents' => $residents,
            'members' => $members
        ]);

        // $families = Family::findOrFail($id);

        // return view('pages.family.detail', [
        //     'families' => $families
        // ]);
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
        return view('pages.family.create', [
            'families' => $families
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

        return redirect()->route('families.index');
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

        return back();
    }
}
