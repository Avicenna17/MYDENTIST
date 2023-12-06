<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    //
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);


        if (Auth::attempt($credentials)) {
            // Authentication successful
            if (Auth::user()->role=='dokter') {
                # code...
                return redirect()->route('dashboard'); // Replace 'dashboard' with your desired authenticated route
            }
            if (Auth::user()->role=='admin') {
                # code...
                return redirect()->route('dashboard'); // Replace 'dashboard' with your desired authenticated route
            }
        } else {
            // Authentication failed
            // custom kata kata hari ini
            return back()->withErrors(['Invalid credentials. Please try again.']);
        }
    }
    public function index()
    {
        return view('pages.login');
    }
    public function logout(Request $request)
    {
        Auth::logout();

        // If you want to flush the user's session data, you can use the following:
        // $request->session()->flush();

        // If you want to regenerate the session ID after logout, you can use the following:
        // $request->session()->regenerate();

        return redirect('/'); // Redirect to the desired page after logout
    }
}
