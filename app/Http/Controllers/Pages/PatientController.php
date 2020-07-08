<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\County;
use App\Patients;
class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        //
        $showPatients= Patients::latest()->get();
        $countPatients = Patients::count();

        return view('crud.patients.index',compact('showPatients','countPatients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $showCounty = County::all();
        return view('crud.patients.create', compact('showCounty'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data= $request->validate([
            'patient_id' => ['required','unique:patients','max:7','min:7'],
            'first_name' => ['required','string'],
            'last_name' => ['required','string'],
            'phone' => ['required','min:10','max:13'],
            'email' => ['required','email','min:11'],
            'date_of_birth' => ['required','before:today'],
            'gender' => ['required'],
            'address' => ['required'],
            'county' => ['required'],
            'postal_code' => ['required'],
        ]);

        $patients= Patients::create($data);
        return back()->with('message','Patient added');


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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
