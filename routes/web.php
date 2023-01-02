<?php

use App\Http\Controllers\TeacherController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [TeacherController::class, 'index'])->name('index');
Route::get('/teacher/all', [TeacherController::class, 'teacherAll'])->name('teacher.all');
Route::post('/add/teacher', [TeacherController::class, 'teacherAdd'])->name('teacher.add');
Route::post('/edit/teacher', [TeacherController::class, 'teacherEdit'])->name('teacher.edit');
Route::post('/update/teacher', [TeacherController::class, 'teacherUpdate'])->name('teacher.update');
Route::delete('/teacher/delete/{id}', [TeacherController::class, 'teacherDelete'])->name('teacher.delete');
