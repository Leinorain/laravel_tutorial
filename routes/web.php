<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\UserController;

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

Route::get('projects', function () {
    return view('projects');
})->name('projects');

Route::get('employees', [EmployeeController::class, 'index'])->name('employees.index');
Route::get('employees/{employee}', [EmployeeController::class, 'show'])->name('employees.show');

Route::get('users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/{user:id}', [UserController::class, 'show']) ->name('users.show');
