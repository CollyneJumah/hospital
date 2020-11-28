<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\County;
use App\Patients;
class PatientController extends Controller
{
   
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

    public function create()
    {
        //
        $showCounty = County::all();
        return view('crud.patients.create', compact('showCounty'));
    }

    public function store(Request $request)
    {
        //
        $data= $request->validate([
            'first_name' => ['required','string'],
            'last_name' => ['required','string'],
            'phone' => ['required','min:10','max:13','unique:patients'],
            'email' => ['required','email','min:11','unique:patients'],
            'date_of_birth' => ['required','before:today'],
            'gender' => ['required'],
            'address' => ['required'],
            'county' => ['required'],
            'postal_code' => ['required'],
        ]);

        $patients= Patients::create($data);
        return redirect( route('patients.index'))->with('toast_success','Patient added');


    }

    public function show(Patients $patient)
    {

        return view('crud.patients.show', compact('patient'));
    }

    public function edit(Patients $patient)
    {
        //
        // $editPatient = Patients::find($id);
         return view('crud.patients.edit', compact('patient'));

    }

    public function update(Request $request, Patients $patient)
    {
        //
       
        $patient->update($request->all());
        return back()->with('toast_success','Patient data updated');
    }

    public function destroy(Patients $patient)
    {
        //
        $patient->delete();
        return redirect()->route('patients.index')->with('toast_success','Patient deleted');
    }
}
