<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Doctors;
use App\Department;

class DoctorsController extends Controller
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
        $doctors= Doctors::latest()->get();
        $countDoctors=Doctors::count();

        return view('pages.doctors', compact('doctors','countDoctors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //fetch all departments and display on doctors, select
        $depart =Department::all();

        return view('crud.doctors.create', compact('depart'));
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
        $this->validate($request,
            [
                'name' => ['required','min:3','max:100','string'],
                'doctor_id'=>['required','unique:doctors','string'],
                'email' => ['required','unique:doctors','min:11','max:256','string'],
                'phone' => ['required','unique:doctors','min:10','max:13','string'],
                'gender' => ['required'],
                'county' =>['required','not_in:0'],
                'address' =>['required','min:3'],
                'postalcode' => ['required','min:4'],
                'profile' => ['required','image','mimes:png,jpg,jpeg,gif','max:1999'],
                'department' => ['required','not_in:0'],
                'department_id'=>['numeric'],
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
                $path=$request->file('profile')->storeAs('public/user_images', $filenameToStore);
            }
            else
            {
                //if no image uploaded save this string
                $filenameToStore ='noimage.jpg';
            }

            //save images 
          $doctors= new Doctors;
          $doctors->name= $request->name;
          $doctors->doctor_id= $request->doctor_id;
          $doctors->email= $request->email;
          $doctors->phone= $request->phone;
          $doctors->gender= $request->gender;
          $doctors->county= $request->county;
          $doctors->address= $request->address;
          $doctors->postalcode= $request->postalcode;
          $doctors->profile= $filenameToStore;
          $doctors->department= $request->department;
        //   $doctors->department_id = $request->id;
          $doctors->save();
        
        // return view('crud.doctors.create');
        // return redirect('pages.doctors')->with('success', 'Doctor added successfully');
        return back()->with('success','Doctor added');
        
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
        $showDoctors= Doctors::find($id);
        return view('crud.doctors.profile', compact('showDoctors'));

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
    public function update(Request $request, $id)
    {
        $find=Doctors::find($id);
        $find->update($request->except('docotor_id'));
        return back()->with('success','Doctor updated');
    //    return redirect( route('doctors.index') )
        
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
