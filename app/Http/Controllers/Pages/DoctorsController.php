<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Doctors;

class DoctorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $doctors= Doctors::latest()->get();
        return view('pages.doctors', compact('doctors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('crud.doctors.create');
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
            'name' => ['required','min:3','max:100','string'],
            'doctor_id'=>['required','unique:doctors','numeric'],
            'email' => ['required','unique:doctors','min:11','max:256','string'],
            'phone' => ['required','unique:doctors','min:10','max:13','string'],
            'gender' => ['required'],
            'county' =>['required','not_in:0'],
            'address' =>['required','min:3'],
            'postalcode' => ['required','min:4'],
            'profile' => ['image','mime:png,jpg,jpeg,gif','max:2048'],
            'department' => ['required','not_in:0']
        ]);
        $doctor=Doctors::create($data);
        return view('crud.doctors.create');
        // return redirect('pages.doctors')->with('success', 'Doctor added successfully');
        return redirect()->route('doctors.index');
        
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
        $editDoctor = Doctors::find($id);
        return view('crud.doctors.edit', compact('editDoctor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Doctors $doctors)
    {
        $data= $request->validate([
            'name' => ['required','min:3','max:100','string'],
            'doctor_id'=>['required','unique:doctors','numeric'],
            'email' => ['required','unique:doctors','min:11','max:256','string'],
            'phone' => ['required','unique:doctors','min:10','max:13','string'],
            'gender' => ['required'],
            'county' =>['required'],
            'address' =>['required','min:3'],
            'postalcode' => ['required','min:4'],
            'profile' => ['image','mime:png,jpg,jpeg,gif','max:2048'],
            'department' => ['required']
        ]);

       $doctors->update($data);
       return redirect( route('doctors.index') )->with('success','Doctor updated');
        
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
