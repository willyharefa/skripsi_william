<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Squad;
use App\Models\Subject;
use App\Models\Attendance;
use App\Models\Classgroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AbsenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Ruangan Kelas";
        $squads = Squad::query()
            ->where('teacher_id', Auth::user()->id)
            ->get();
            // dd($squads);
        return view('pages.teacher.classgroups', compact('title', 'squads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id, $subject)
    {
        $title = "Absensi Kelas";
        $classgroup = Classgroup::where('classroom_id', $id)->get();
        $attendances = Attendance::where('date_absence', '=', Carbon::now()->format('Y-m-d'))
                                    ->where('classroom_id', $id)
                                    ->where('subject_id', $subject)
                                    ->get();
        $subjects = Subject::find($subject);
        return view('pages.teacher.absence', compact('title', 'classgroup', 'attendances','subjects'));
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
            Attendance::create([
                'student_id' => $request->student_id[$i],
                'subject_id' => $request->subject_id,
                'classroom_id' => $request->classroom_id[$i],
                'time_in' => $request->time_in[$i],
                'time_out' => $request->time_out[$i],
                'date_absence' => $request->date_absence[$i]
            ]);
        }
        return redirect()->back()->with("success", "Data absen berhasil diinput.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function show(Attendance $attendance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function edit(Attendance $attendance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Attendance $absence)
    {
        Attendance::find($absence->id)->update([
            'time_in' => $request->new_time_in,
            'time_out' => $request->new_time_out,
            'date_absence' => $request->new_date_absence
        ]);

        return redirect()->back()->with("success", "Data absensi berhasil diperbaharui.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attendance $attendance)
    {
        //
    }

    public function absence($id, $subject)
    {
        $title = "Absensi Kelas";
        $classgroup = Classgroup::where('classroom_id', $id)->get();
        $attendances = Attendance::where('date_absence', '=', Carbon::now()->format('Y-m-d'))
                                    ->where('classroom_id', $id)
                                    ->where('subject_id', $subject)
                                    ->get();
        $subjects = Subject::find($subject);
        return view('pages.teacher.absence', compact('title', 'classgroup', 'attendances','subjects'));
    }
}
