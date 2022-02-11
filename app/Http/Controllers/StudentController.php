<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $student = Student::all();
        return view('student',compact('student'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'roll' => 'required|unique:students|numeric',
            'name' => 'required'
        ]);
        if($validator->fails()){
            return Redirect::back()->withErrors($validator)->withInput();
        }

        Student::create([
            'roll' => $request['roll'],
            'name' => $request['name']
        ]);

        return redirect()->route('student');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        return view('edit',compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        // $student->update($request->all());
        $validator = Validator::make($request->all(),[
            'roll' => 'required|unique:students,roll,' . $student->id.'|numeric',
            'name' => 'required'
        ]);
        if($validator->fails()){
            return Redirect::back()->withErrors($validator)->withInput();
        }

        Student::where('id',$student->id)->update([
            'roll' => $request['roll'],
            'name' => $request['name']
        ]);

        return redirect()->route('student');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //  dd($student);
        // Student::where('id','=',$id)->delete();
        // Student::where('id',$id)->delete();
        Student::where('id',$student->id)->delete();
        return redirect()->route('student');
    }
}
