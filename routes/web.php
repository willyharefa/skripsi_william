<?php

use App\Http\Controllers\AbsenceController;
use App\Http\Controllers\AcademicYearController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AssestmentController;
use App\Http\Controllers\ClassgroupController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\MessengerController;
use App\Http\Controllers\OrtuController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use App\Models\AcademicYear;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use phpDocumentor\Reflection\Types\Resource_;

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
Route::get('/login', [HomepageController::class, 'login'])->name('login')->middleware('guest:teacher,web,ortu');
Route::post('/authenticate', [HomepageController::class, 'authenticate'])->name('authenticate');
Route::post('/logout', [HomepageController::class, 'logout'])->name('logout');
Route::resource('/', HomepageController::class);
Route::resource('student', StudentController::class);

Route::group(['middleware' => 'auth:teacher,web,ortu'], function() {
    Route::resource('dashboard', AdminController::class);

    Route::group(['middleware' => 'auth:teacher'], function() {
        Route::get('/teacher/assestment', [TeacherController::class, 'assestment'])->name('teacher.assestment');
        Route::get('/absence/{id}/{subject}', [AbsenceController::class, 'absence'])->name('absence.absence');
        Route::resource('absence', AbsenceController::class); //Route untuk absensi Kelas
        Route::resource('assestment', AssestmentController::class);
    });

    Route::group(['middleware' => 'auth:web'], function() {
        Route::resource('messenger', MessengerController::class);
        Route::resource('teacher', TeacherController::class);
        Route::resource('academic', AcademicYearController::class);
        Route::resource('teacher', TeacherController::class);
        Route::resource('subject', SubjectController::class);
        Route::resource('room', RoomController::class);
        Route::resource('classroom', ClassroomController::class);
        Route::resource('classgroup', ClassgroupController::class);
    });
    Route::group(['middleware' => 'auth:ortu'], function() {
        Route::get('/ortu/message', [OrtuController::class, 'Message'])->name('ortu.message');
        Route::resource('ortu', OrtuController::class);
    } );
});