<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Midterm_controller;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// Default route that returns the 'welcome' view when accessing the root URL '/'
Route::get('/', function () {
    return view('welcome');
});
// Route that returns the 'midterm' view using the 'showMidterm' method from Midterm_controller
Route::get('midterm',[\App\Http\Controllers\Midterm_controller::class,'showMidterm']);

// Route that returns the 'midterm' view using the 'passingData' method from Midterm_controller
Route::get('/midterm', [Midterm_controller::class, 'passingData']);
