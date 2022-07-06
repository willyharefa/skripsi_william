<?php

namespace App\Http\Controllers;

use App\Models\AcademicYear;
use App\Models\Assestment;
use Carbon\Carbon;
use App\Models\Squad;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\Attendance;
use App\Models\Classgroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // KETIKA GURU LOGIN AKAN MENYESUAIKAN MENCARI SESUAI ID NYA SI GURU
        $title = "List Kelas";
        $teachers = Teacher::all();
    return view('pages.admin.teachers', compact('title', 'teachers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        
    }

    public function absence($id, $subject)
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd(count($request->student_id));
        
        $validated = Validator::make($request->all(), [
            'name' => 'min:6',
            'phone' => 'min:7',
            'nuptk' => 'min:16|unique:teachers',
            'username' => 'min:6|unique:teachers',
            'password' => 'min:6|confirmed'
        ],
        [            
            'name.min' => 'Nama terlalu singkat.',
            'phone.min' => 'No. Telepon minimal 7 digit.',
            'nuptk.unique' => 'NUPTK guru sudah terdaftar sebelumnya',
            'nuptk.min' => 'NUPTK guru minimal 6 digit',
            'username.unique' => 'Username harus lebih unik.',
            'username.min' => 'Username terlalu singkat, minimal 6 digit.',
            'password.min' => 'Password minimal 6 digit.',
            'password.confirmed' => 'Password konfirmasi anda tidak sesuai.'
        ]);

        if($validated->fails()) {
            return redirect()->back()->withErrors($validated->errors())->withInput();
        }

        Teacher::create([
            'name' => $request->name,
            'birthday' => $request->birthday,
            'phone' => $request->phone,
            'address' => $request->address,
            'nuptk' => $request->nuptk,
            'username' => $request->username,
            'password' => Hash::make($request->password)
        ]);
        return redirect()->back()->with("success", "Data guru berhasil ditambahkan");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show(Teacher $teacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit(Teacher $teacher)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Teacher $teacher)
    {
        Teacher::find($teacher->id)->update([
            'name' => $request->new_name,
            'birthday' => $request->new_birthday,
            'nuptk' => $request->new_nuptk,
            'username' => $request->new_user,
        ]);
        return redirect()->back()->with("success", "Data guru $request->new_name berhasil diperbaharui.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teacher $teacher)
    {
        Teacher::destroy($teacher->id);
        return redirect()->back()->with("success", "Data berhasil dihapus.");
    }
    public function assestment()
    {
        $title = "Nilai Kelas";
        $academicYears = AcademicYear::all();
        $classgroups = Classgroup::where('teacher_id', Auth::user()->id)->get();
        $assestments = Assestment::where('teacher_id', Auth::user()->id)->get();
        return view('pages.teacher.assestment', compact('title', 'classgroups', 'academicYears', 'assestments'));
    }
}
