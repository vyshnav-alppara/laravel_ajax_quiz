<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SignUpController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\ResultsController;



//Login
Route::get('/',[LoginController::class,'index'])->name('login');
Route::post('signin', [LoginController::class, 'login'])->name('signin');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

//Category
Route::get('category',[CategoryController::class,'index'])->name('category');

//SignUp
Route::get('sign-up',[SignUpController::class,'index'])->name('sign-up');
Route::post('register', [SignUpController::class, 'register'])->name('register');

//Quiz page
Route::get('quiz',[QuizController::class,'index'])->name('quiz');

//Results Page
Route::get('results',[ResultsController::class,'index'])->name('results');

