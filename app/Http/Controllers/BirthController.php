<?php

namespace App\Http\Controllers;

use App\Models\Birth;
use App\Models\Resident;
use Illuminate\Http\Request;
use App\Http\Requests\BirthRequest;
use App\Models\FamilyMember;
use Illuminate\Support\Facades\Response as FacadeResponse;

class BirthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Birth::where('family_id', '!=', null );

        if (request()->get('gender') && request()->get('gender') != null ) {
            $data=$data->where('gender','=',request()->get('gender'));
        }

        $births=$data->get();

        return view('pages.birth.index',compact('births'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $residents = Resident::get();
        $residents = FamilyMember::where('family_relationship', 'Kepala Keluarga')->get();

        
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

        // Resident::create([
        //     ''
        // ]);

        // FamilyMember::create([
        //     'resident_id' => '',
        //     'family_id' => '',
        //     'family_relationship' => 'Anak Kandung'
        // ]);

        Birth::create($data);

        return redirect()->route('births.index')->with('success', 'Berhasil Membuat Data');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $births = Birth::find($id);

        return view('pages.birth.show', [
            'births' => $births
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

        return redirect()->route('births.index')->with('success', 'Berhasil Mengedit Data');
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

        return back()->with('delete', 'Berhasil Menghapus Data');
    }

    public function downloadtemplate()
    {
        $template="./template/kelahiran.xlsx";
        return FacadeResponse::download($template);
    }
}
