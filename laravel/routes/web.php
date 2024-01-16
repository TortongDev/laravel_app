<?php

use App\Http\Controllers\ClassRoomController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;

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
    return view('home_page.home');
});

//Subject Process
Route::get('/addSubject', [SubjectController::class , 'addSubject' ])->name('addSubject');
Route::post('/saveSchool' , [SubjectController::class , 'saveSchool' ])->name('saveSchool');
Route::delete('subjectDelete/{id}/delete', [SubjectController::class , 'delete'])->name('subject.delete');
Route::get('/editSubject/{id}/edit', [SubjectController::class , 'edit' ])->name('editSubject');
Route::put('updateSubject/{id}/update',[SubjectController::class , 'update'])->name('updateSubject');

//Teacher Process
Route::get('/addTeacher', [TeacherController::class , 'addTeacher' ])->name('addTeacher');
Route::post('/saveTeacher' , [TeacherController::class , 'saveTeacher'])->name('saveTeacher');
Route::get('/editTeacher/{id}/edit', [TeacherController::class , 'edit'])->name('editTeacher');
Route::put('/updateTeacher/{id}/update', [TeacherController::class , 'update'])->name('updateTeacher');
Route::delete('deleteTeacher/{id}/delete' , [TeacherController::class , 'delete'])->name('deleteTeacher');


//Classroom Process
Route::get('/addClassroom' , [ClassRoomController::class , 'index'])->name('addClassroom');
Route::post('/saveClassroom' , [ClassRoomController::class , 'saveClassroom'])->name('saveClassroom');
Route::get('/editClassroom', [ClassRoomController::class , 'editClassroom'])->name('editClassroom');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
