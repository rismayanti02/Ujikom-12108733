<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('auth.login');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function auth(Request $request)
    {
        // Validasi input email dan password menggunakan fungsi validate()
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',

        ]);

        // Mengambil data pengguna berdasarkan email yang diberikan
        $user = User::where("email", $request->email)->first();

            //  Memeriksa apakah pengguna ada dan apakah password yang diberikan sama dengan password di database 
            //  jika sama maka akan di autentikasi  menggunakan Auth::login dan di arahkan ke halaman dashboard    
        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user);
            return redirect('/dashboard');
        }
            // Jika autentikasi gagal, kembalikan pengguna ke halaman sebelumnya dengan pesan kesalahan

        return back()->with('fail', 'Email or Password Invalid');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}