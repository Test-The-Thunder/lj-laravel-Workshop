<?php

use App\Http\Controllers\DemoController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () { return view('welcome');});
Route::get('/about', [DemoController::class,'index']);

Route::get('/student',[StudentController::class,'index'])->name('student');
Route::post('/student',[StudentController::class,'store']);
Route::delete('/student/{student}',[StudentController::class,'destroy'])->name('student.destory');