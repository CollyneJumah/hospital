<?php

namespace App\Http\Controllers\Pages;

use App\Appointments;
use App\Department;
use App\Doctors;
use App\Http\Controllers\Controller;
use App\Patients;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentsController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        //
        $arrayAppointment = [
            'showAppointments' => Appointments::OrderBy('created_at','desc')->get(),
        ];
        return view('pages.appointments', compact('arrayAppointment'));
    }

   
    public function create()
    {
        //
        $arrayAll = [
            'showPatients' => Patients::all(),
            'showDepartments' => Department::all(),
            'showDoctors' => Doctors::all(),
        ];
        return view('crud.appointments.create',
            compact('arrayAll')
        );
    }

    
    public function store(Request $request, Appointments $appointment)
    {
        //
        $this->validate($request, [
            'patient_id' => ['required'],
            'department_id' => ['required'],
            'doctor_id' => ['required'],
            'appointment_date' => ['required'],
            'appointment_time' => ['required'],
            'email' => ['required','email'],
            'phone' => ['required'],
            'remark' => ['required'],
        ]);
        $request['created_by'] = Auth::user()->name;
        $appointment->create($request->all());
        return redirect( route('appointments.index') )->with('toast_success', 'Department deleted.');

    }

    public function getVendorEmailAndPhone(Request $request)
    {
        $fetchEmailAndPhone = Patients::select('email','phone', 'id')->where('id', $request->id)->first();
                return response()->json($fetchEmailAndPhone);
    }
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
