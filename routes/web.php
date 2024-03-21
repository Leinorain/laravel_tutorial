<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProjectController;

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

Route::get('/', function () {
    return view('index');
})->name('home');

Route::get('about', function () {
    return view('about');
})->name('about');

Route::get('projects', [ProjectController::class, 'index'])->name('projects.index');

Route::resource('users', UserController::class)->only([
    'index', 'show'
  ]);

Route::resource('employees', EmployeeController::class);
