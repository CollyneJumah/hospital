<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Department;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;


class DepartmentsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        //
        $departments= Department::latest()->get();
        $countDepartment=Department::count();
      

        return view('crud.departments.index', compact('departments','countDepartment'));
    }

    public function create()
    {
        //
        return view('crud.departments.create');
    }

    public function store(Request $request)
    {
        //
       $this->validate($request,[
            'name'=> ['required','min:3','max:100'],
            'description' => ['required','min:10','max:255'],
        ]);
        $request['created_by'] = Auth::user()->name;
        $department=Department::create($request->all());

        return redirect()->route('departments.index')->with('toast_success','Department Added');
    }

    public function show($id)
    {
        //
       

    }

    public function edit($id)
    {
        //
         $editDepartment=Department::find($id);

         return view('crud.departments.edit', compact('editDepartment'));
    }

    public function update(Request $request, Department $department)
    {
        //
        $request->validate([
            'name' => ['required'],
            'description' => ['required'],
        ]);
        
        $request['created_by'] = Auth::user()->name;
        $department->update($request->all());
        return redirect( route('departments.index'))->with('toast_success', 'Department updated.');

    }

    public function destroy($id)
    {
        //
        $deleteDepartment = Department::find($id);
        $deleteDepartment->delete();
        return back()->with('toast_success', 'Department deleted.');

    }
}
