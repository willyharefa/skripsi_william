<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
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
        $title = "Data Siswa";
        $students = Student::all();
        return view('pages.admin.students', compact('title', 'students'));
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
        $validated = Validator::make($request->all(), [
            'name' => 'min:6',
            'nisn' => 'unique:students'
        ],
        [
            'nisn.unique' => 'NISN siswa sudah terdaftar !',
            'name.min' => 'Nama minimal 6 karakter',
        ]);

        if($validated->fails()) {
            return redirect()->back()->withErrors($validated->errors())->withInput();
        }
        Student::create([
            'name' => $request->name,
            'birthday' => $request->birthday,
            'gender' => $request->gender,
            'nisn' => $request->nisn
        ]);
        return redirect()->back()->with('success', 'Data siswa baru berhasil ditambahkan.');
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
        //
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
        Student::find($student->id)->update([
            'name' => $request->new_name,
            'birthday' => $request->new_birthday,
            'gender' => $request->new_gender,
            'nisn' => $request->new_nisn,
        ]);
        return redirect()->back()->with("success", "Data siswa $request->new_name berhasil diperbaharui.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        Student::destroy($student->id);
        return redirect()->back()->with("success", "Data berhasil dihapus.");
    }
}
