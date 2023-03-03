<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', [StudentController::class, 'index'])->name('main.index');

Route::get('student/{studentId}', [StudentController::class, 'show'])->name('main.show');
Route::get('edit/{studentId}', [StudentController::class, 'edit'])->name('main.edit');
Route::put('edit/{studentId}', [StudentController::class, 'update'])->name('main.update');