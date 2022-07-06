<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Teacher;
use App\Models\Classroom;
use App\Models\Classgroup;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClassgroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Data Ruangan Kelas Siswa";
        $classrooms = Classroom::all();
        $teachers = Teacher::all();
        $students = Student::all();
        $classgroups = Classgroup::all();
        return view('pages.admin.classgroup', compact('title', 'classrooms', 'teachers', 'students', 'classgroups'));
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
        for ($i=0; $i < count($request->student_id); $i++) { 
            Classgroup::create([
                'student_id' => $request->student_id[$i],
                'teacher_id' => $request->teacher_id,
                'classroom_id' => $request->classroom_id,
            ]);
        }
        return redirect()->back()->with("success", "Data rombongan kelas berhasil ditambahkan.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Classgroup  $classgroup
     * @return \Illuminate\Http\Response
     */
    public function show(Classgroup $classgroup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Classgroup  $classgroup
     * @return \Illuminate\Http\Response
     */
    public function edit(Classgroup $classgroup)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Classgroup  $classgroup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Classgroup $classgroup)
    {
        Classgroup::find($classgroup->id)->update([
            'student_id' => $request->new_student_id,
            'teacher_id' => $request->new_teacher_id,
            'classroom_id' => $request->new_classroom_id,
        ]);
        return redirect()->back()->with("success", "Data wali kelas berhasil diperbaharui.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Classgroup  $classgroup
     * @return \Illuminate\Http\Response
     */
    public function destroy(Classgroup $classgroup)
    {
        //
    }
}
