<?php

namespace App\Http\Controllers;

use App\Models\Squad;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\Classroom;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Ruangan Pengajar";
        $classrooms = Classroom::all();
        $teachers = Teacher::all();
        $subjects = Subject::all();
        $squads = Squad::all();
        return view('pages.admin.room', compact('title', 'classrooms', 'teachers', 'subjects', 'squads'));
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
        Squad::create([
            'teacher_id' => $request->teacher_id,
            'classroom_id' => $request->classroom_id,
            'subject_id' => $request->subject_id
        ]);
        return redirect()->back()->with("success", "Selamat data ruangan belajar guru berhasil ditambahkan.");
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
        // dd($squad);
        Squad::find($id)->update([
            'teacher_id' => $request->new_teacher_id,
            'subject_id' => $request->new_subject_id,
            'classroom_id' => $request->new_classroom_id
        ]);
        return redirect()->back()->with("success", "Selamat data ruangan pengajar berhasil diperbaharui.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Squad::find($id)->delete();
        return redirect()->back()->with("success", "Data ruangan guru berhasil dihapus.");
    }
}
