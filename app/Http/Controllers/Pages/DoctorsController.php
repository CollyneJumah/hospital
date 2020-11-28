<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Doctors;
use App\Department;
use App\County;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\FuncCall;

class DoctorsController extends Controller
{
   
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        //
        $doctors= Doctors::latest()->get();
        $countDoctors=Doctors::count();

        return view('crud.doctors.index', compact('doctors','countDoctors'));
    }

    public function create()
    {
        //fetch all departments and display on doctors, select
        $depart =Department::all();
        $county = County::all();

        return view('crud.doctors.create', compact('depart','county'));
    }

  
    public function store(Request $request)
    {
        //
        $this->validate($request,
            [
                'name' => ['min:3','max:100','string'],
                'email' => ['required','min:11','max:256','string'],
                'phone' => ['required','min:10','max:13','string'],
                'gender' => ['required'],
                'county' =>['nullable','not_in:0'],
                'address' =>['required','min:3'],
                'postalcode' => ['required','min:4'],
                'profile' => ['nullable','image','mimes:png,jpg,jpeg,gif','max:1999'],
                'department_id' => ['required','not_in:0','numeric'],
            ]);
            
            //check if image profile uploaded
            if($request->has('profile'))
            {
                //get file name with extension
                $fileNameWithExt = $request->file('profile')->getClientOriginalName();
                //get jut filename
                $filename=pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                //get just extension
                $extension= $request->file('profile')->getClientOriginalExtension();
                //filename to store
                $filenameToStore= $filename.'_'.time().'.'.$extension;
                //upload image
                $path=$request->file('profile')->storeAs('public/doctor_images', $filenameToStore);
            }
            else
            {
                //if no image uploaded save this string
                $filenameToStore ='user.jpg';
            }

            //save images 
          $doctors= new Doctors;
          $doctors->name= $request->name;
        //   $doctors->doctor_id= $request->doctor_id;
          $doctors->email= $request->email;
          $doctors->phone= $request->phone;
          $doctors->gender= $request->gender;
          $doctors->county_id= $request->county_id;
          $doctors->address= $request->address;
          $doctors->postalcode= $request->postalcode;
          $doctors->profile= $filenameToStore;
          $doctors->department_id= $request->department_id;
          $doctors->created_by = Auth::user()->name;
        //   $doctors->department_id = $request->id;
          $doctors->save();
        
        // return view('crud.doctors.create');
        // return redirect('pages.doctors')->with('success', 'Doctor added successfully');
        return redirect( route('doctors.index') )->with('toast_success','Doctor added');
        
    }

    public function updateDoctorProfile(Request $request,Doctors $doctor)
    {
        //check if image profile uploaded
        if($request->has('profile'))
        {
            //get file name with extension
            $fileNameWithExt = $request->file('profile')->getClientOriginalName();
            //get jut filename
            $filename=pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            //get just extension
            $extension= $request->file('profile')->getClientOriginalExtension();
            //filename to store
            $filenameToStore= $filename.'_'.time().'.'.$extension;
            //upload image
            $path=$request->file('profile')->storeAs('public/doctor_images', $filenameToStore);

            $request['profile'] = $filenameToStore;
            $doctor->update($request->all());
            
            return back()->with('toast_success','profile picture updated');


        }
        
    }

    public function show($id)
    {
        //
        $showDoctors= Doctors::find($id);
        return view('crud.doctors.profile', compact('showDoctors'));

    }

    public function edit($id)
    {
        
        $editDoctor = Doctors::find($id);
        $county =County::all();
        $department =Department::all();

        return view('crud.doctors.edit', compact('editDoctor','county','department'));
    }

    public function update(Request $request, Doctors $doctor)
    {
        
        if($request->has('profile'))
            {
                //get file name with extension
                $fileNameWithExt = $request->file('profile')->getClientOriginalName();
                //get jut filename
                $filename=pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                //get just extension
                $extension= $request->file('profile')->getClientOriginalExtension();
                //filename to store
                $filenameToStore= $filename.'_'.time().'.'.$extension;
                //upload image
                $path=$request->file('profile')->storeAs('public/doctor_images', $filenameToStore);
               
                $request['profile'] = $filenameToStore;

            }
            
            $doctor->update($request->all());
            return redirect( route('doctors.index'))->with('toast_success','Doctor updated');
   
        
    }


    public function destroy($id)
    {
        //
        $doc=Doctors::find($id);
        //check for image
        if($doc->profile != 'noimage.jpg'){
            //delete image
            Storage::delete('public/user_images/'.$doc->profile);
        }
            $doc->delete();
            return redirect(route('doctors.index'))->with('success','Doctor deleted');
    

    }
}
