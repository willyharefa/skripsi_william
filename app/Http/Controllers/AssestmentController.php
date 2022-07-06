<?php

namespace App\Http\Controllers;

use App\Models\Assestment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AssestmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        // dd(count($request->student_id));
        for ($i=0; $i < count($request->student_id); $i++) { 
            Assestment::create([
                'student_id' => $request->student_id[$i],
                'bindo' => $request->bindo[$i],
                'bingg' => $request->bingg[$i],
                'bdaer' => $request->bdaer[$i],
                'sbd' => $request->sbd[$i],
                'ppkn' => $request->ppkn[$i],
                'mtk' => $request->mtk[$i],
                'pjok' => $request->pjok[$i],
                'ipa' => $request->ipa[$i],
                'ips' => $request->ips[$i],
                'pd' => $request->pd[$i],
                'teacher_id' => Auth::user()->id,
                'academic_year_id' => $request->academic_year_id,
            ]);
        }
        return redirect()->back()->with("success", "Data nilai kelas berhasil ditambahkan.");
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Assestment  $assestment
     * @return \Illuminate\Http\Response
     */
    public function show(Assestment $assestment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Assestment  $assestment
     * @return \Illuminate\Http\Response
     */
    public function edit(Assestment $assestment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Assestment  $assestment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Assestment $assestment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Assestment  $assestment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Assestment $assestment)
    {
        //
    }
}
