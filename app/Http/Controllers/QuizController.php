<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function index(Request $request)
    {
        $category = $request->category;
        if (Auth::check()) {
        return view('quiz', compact('category'));
    } else {
        return redirect()->route('login')->with('error', 'You need to log in first.');
    }
    }

}
