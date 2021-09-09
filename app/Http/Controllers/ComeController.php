<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resident;
use App\Models\Come;
use App\Http\Requests\ComeRequest;
use Illuminate\Support\Facades\Response as FacadeResponse;



class ComeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Come::where('nik', '!=', null );

        if (request()->get('gender') && request()->get('gender') != null ) {
            $data=$data->where('gender','=',request()->get('gender'));
        }

        $comes=$data->get();

        return view('pages.come.index',compact('comes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $residents = Resident::get();
        
        return view('pages.come.create', [
            'residents' => $residents
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ComeRequest $request)
    {
        $data = $request->all();

        Resident::create([
            'nik' => $request->nik,
            'name' => $request->name,
            'birthplace' => $request->birthplace,
            'birthdate' => $request->birthdate,
            'gender' => $request->gender,
            'religion' => $request->religion,
            'last_education' => $request->last_education,
            'work' => $request->work,
            'blood_type' => $request->blood_type,
            'martial_status' => $request->martial_status,
            'citizenship' => $request->citizenship
        ]);

        Come::create($data);

        return redirect()->route('comes.index')->with('success', 'Berhasil Membuat Data');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comes = Come::find($id);

        return view('pages.come.show', [
            'comes' => $comes
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
        $comes = Come::findOrFail($id);
        return view('pages.come.create', [
            'comes' => $comes,
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
    public function update(ComeRequest $request, $id)
    {
        $data = $request->all();

        Come::FindOrfail($id)->update($data);

        return redirect()->route('comes.index')->with('success', 'Berhasil Mengedit Data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Come::find($id);

        $data->delete();

        return back()->with('delete', 'Berhasil Menghapus Data');
    }

    public function downloadtemplate()
    {
        $template="./template/pendatang.xlsx";
        return FacadeResponse::download($template);
    }
}
