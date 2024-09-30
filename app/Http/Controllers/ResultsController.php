<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ResultsController extends Controller
{

    public function index()
    {
        if (Auth::check()) {
        return view('results');
    } else {
        return redirect()->route('login')->with('error', 'You need to log in first.');
    }
    }
}
