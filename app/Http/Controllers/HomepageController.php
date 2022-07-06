<?php

namespace App\Http\Controllers;

use App\Models\Ortu;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class HomepageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Selamat datang | SD IT Nurusalam Pekanbaru";
        return view('welcome', compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Regisrasi Akun";
        $students = Student::all();
        return view('home.create', compact('title','students'));
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
            'name' => 'required|min:6|max:32',
            'address' => 'required',
            'phone' => 'required|min:10',
            'username' => 'required|min:6|unique:ortus',
            'password' => 'required|confirmed|min:6',
            'student_id' => 'required',
        ],
        [
            'name.required' => 'Data nama masih kosong.',
            'name.min' => 'Field nama minimal 6 karakter.',
            'name.max' => 'Field nama maksimal 32 karakter.',
            'address.required' => 'Data alamat masih kosong',
            'phone.required' => 'No telepon masih kosong.',
            'username.min' => 'Username minimal 6 karakter.',
            'username.unique' => 'Username anda harus unik.',
            'password.confirmed' => 'Password konfirmasi anda tidak sesuai.',
            'password.min' => 'Password anda minimal 6 karakter.',
            'student_id.required' => 'Pilih nama anak anda terlebih dahulu',
        ]);
        if($validated->fails()) {
            return redirect()->back()->withErrors($validated->errors());
        }
        Ortu::create([
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'student_id' => $request->student_id,
        ]);
        return redirect()->route('login')->with('Selamat, Akun anda berhasil dibuat. Silahkan login ria :)');

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
        //
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
    }
    public function login()
    {
        $title = "Form Login";
        return view('home.login', compact('title'));
    }
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
        // if( Auth::attempt($credentials) ){
        if( Auth::guard('teacher')->attempt($credentials) ){
                return redirect()->route('dashboard.index');
        }
        if( Auth::guard('web')->attempt($credentials) ){
                return redirect()->route('dashboard.index');
        }
        if( Auth::guard('ortu')->attempt($credentials) ){
                return redirect()->route('ortu.index');
        }


        return back()->with('error', 'Login gagal, coba kembali.');
    }
    public function logout(Request $request)
    {
        Auth::logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/');
    }
}
