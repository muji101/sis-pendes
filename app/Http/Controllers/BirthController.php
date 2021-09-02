<?php

namespace App\Http\Controllers;

use App\Models\Birth;
use App\Models\Resident;
use Illuminate\Http\Request;
use App\Http\Requests\BirthRequest;

class BirthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $births = Birth::get();

        return view('pages.birth.index', [
            'births' => $births
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
        
        return view('pages.birth.create', [
            'residents' => $residents
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BirthRequest $request)
    {
        $data = $request->all();

        Birth::create($data);

        return redirect()->route('births.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $births = Birth::findOrFail($id);
        return view('pages.birth.create', [
            'births' => $births,
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
    public function update(BirthRequest $request, $id)
    {
        $data = $request->all();

        Birth::FindOrfail($id)->update($data);

        return redirect()->route('births.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Birth::find($id);

        $data->delete();

        return back();
    }
}
