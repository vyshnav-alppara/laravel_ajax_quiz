<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
   
    public function index()
    {
        if (Auth::check()) {
        return view('category');
    } else {
        return redirect()->route('login')->with('error', 'You need to log in first.');
    }
    }
}