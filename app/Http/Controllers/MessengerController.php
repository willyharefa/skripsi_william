<?php

namespace App\Http\Controllers;

use App\Models\Ortu;
use App\Models\Messenger;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessengerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Pesan";
        $ortus = Ortu::all();
        return view('pages.admin.messenger', compact('title', 'ortus'));
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
        // dd(Auth::user()->id);
        Messenger::create([
            'chat' => $request->chat,
            'ortu_id' => $request->recipent,
            'user_id' => Auth::user()->id,
        ]);

        return redirect()->back()->with("success", "Selamat pesan telah dikirim kepada orangtua murid");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Messenger  $messenger
     * @return \Illuminate\Http\Response
     */
    public function show(Messenger $messenger)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Messenger  $messenger
     * @return \Illuminate\Http\Response
     */
    public function edit(Messenger $messenger)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Messenger  $messenger
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Messenger $messenger)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Messenger  $messenger
     * @return \Illuminate\Http\Response
     */
    public function destroy(Messenger $messenger)
    {
        //
    }
}
