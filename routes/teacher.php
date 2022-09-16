<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth:teacher']
    ], function () {

    //==============================dashboard============================
    Route::get('/teacher/dashboard', function () {

        $ids = \App\Models\Teacher::findorFail(auth()->user()->id)->Sections()->pluck('section_id');
        $data['count_sections']= $ids->count();
        $data['count_students']= \App\Models\Student::whereIn('section_id',$ids)->count();
        return view('pages.Teachers.dashboard',$data);
    });
    Route::group(['namespace' => 'Teachers\dashboard'], function () {
        Route::get('student',[\App\Http\Controllers\Teacher\dashboard\StudentController::class,'index'])->name('student.index');
        Route::get('sections',[\App\Http\Controllers\Teacher\dashboard\StudentController::class,'section'])->name('sections');
        Route::post('attendance',[\App\Http\Controllers\Teacher\dashboard\StudentController::class,'attendance'])->name('attendance');
        Route::post('edit_attendance',[\App\Http\Controllers\Teacher\dashboard\StudentController::class,'editAttendance'])->name('attendance.edit');
        Route::get('attendance_report',[\App\Http\Controllers\Teacher\dashboard\StudentController::class,'attendanceReport'])->name('attendance.report');
        Route::post('attendance_report','StudentController@attendanceSearch')->name('attendance.search');
        Route::get('/Get_classrooms/{id}', [\App\Http\Controllers\Teacher\dashboard\QuizzController::class,'getClassrooms']);
        Route::get('/Get_Sections/{id}', [\App\Http\Controllers\Teacher\dashboard\QuizzController::class,'Get_Sections']);
        Route::resource('questions', \App\Http\Controllers\Teacher\dashboard\QuestionController::class);
        Route::resource('online_zoom_classes',\App\Http\Controllers\Teacher\dashboard\OnlineZoomController::class);
        Route::get('profile',[\App\Http\Controllers\Teacher\dashboard\ProfileController::class,'index'])->name('profile.show');
        Route::post('profile/{id}',[\App\Http\Controllers\Teacher\dashboard\ProfileController::class,'update'])->name('profile.update');
        Route::get('student_quizze/{id}',[\App\Http\Controllers\Teacher\dashboard\QuizzController::class,'student_quizze'])->name('student.quizze');
        Route::post('repeat_quizze',[\App\Http\Controllers\Teacher\dashboard\QuizzController::class,'repeat_quizze'])->name('repeat.quizze');

    });
    Route::resource('quizzes',\App\Http\Controllers\Teacher\dashboard\QuizzController::class);



});

