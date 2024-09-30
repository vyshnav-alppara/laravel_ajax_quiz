<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    
    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);
       
        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();
            session(['name' => $user->name]);
            return redirect()->intended('category')->with('success', 'Logged in successfully!');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
    public function logout(Request $request)
    {
        $request->session()->forget('name');
        Auth::logout();
        
        return redirect('/')->with('success', 'You have been logged out.');
    }
   
}
