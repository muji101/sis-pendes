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
        // $residents = Resident::get();
        $current = Carbon::now()->toDateString();
        $matis = Carbon::now()->isoFormat('dddd, D MMMM Y');

        return view('pages.death.index', [
            'deaths' => $deaths,
            'current' => $current,
            'matis' => $matis
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

        return redirect()->route('deaths.index');
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

        return redirect()->route('deaths.index');
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

        return back();
    }
}
