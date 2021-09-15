<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ResidentRequest;
use App\Models\Death;
use App\Models\Family;
use App\Models\FamilyMember;
use App\Models\Resident;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Response as FacadeResponse;


class ResidentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Resident::where('status', 'ada');

        if (request()->get('religion') && request()->get('religion') != null ) {
            $data=$data->where('religion','=',request()->get('religion'));
        }   
        
        if (request()->get('gender') && request()->get('gender') != null ) {
            $data=$data->where('gender','=',request()->get('gender'));
        }

        if (request()->get('martial_status') && request()->get('martial_status') != null ) {
            $data=$data->where('martial_status','=',request()->get('martial_status'));
        }

        if (request()->get('citizenship') && request()->get('citizenship') != null ) {
            $data=$data->where('citizenship','=',request()->get('citizenship'));
        }

        if (request()->get('last_education') && request()->get('last_education') != null ) {
            $data=$data->where('last_education','=',request()->get('last_education'));
        }

        if (request()->get('blood_type') && request()->get('blood_type') != null ) {
            $data=$data->where('blood_type','=',request()->get('blood_type'));
        }
        

        $residents=$data->get();

        return view('pages.resident.index',compact('residents'));
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

        // $now = Carbon::now(); // Tanggal sekarang
        // $b_day = Carbon::parse($residents->birthdate); // Tanggal Lahir
        // $age = $b_day->diffInYears($now);  // Menghitung umur

        return view('pages.resident.show', [
            'residents' => $residents,
            // 'age' => $age
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
        $parentFather = Resident::where('gender', 'Laki-laki')->where('id','!=', $residents)->get();
        $parentMother = Resident::where('gender', 'Perempuan')->where('id','!=', $residents)->get();
        return view('pages.resident.create', [
            'residents' => $residents,
            'parentFather' => $parentFather,
            'parentMother' => $parentMother,
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
        $request->validate([
            'father' => 'required',
            'mother' => 'required'
        ]);

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

        familyMember::where('resident_id', $id)->delete();

        return back()->with('delete', 'Berhasil Menghapus Data');
    }

    public function downloadtemplate()
    {
        $template="./template/penduduk.xlsx";
        return FacadeResponse::download($template);
    }

    public function resetFilter()
    {
        return redirect()->route('residents.index');
    }
}
