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
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth:parent']
    ], function () {

    //==============================dashboard============================
    Route::get('/parent/dashboard', function () {
        $sons = Student::where('parent_id',auth()->user()->id)->get();
        return view('pages.parents.dashboard',compact('sons'));
    })->name('dashboard.parents');

    Route::group(['namespace' => 'Parents\dashboard'], function () {
        Route::get('children',[\App\Http\Controllers\Parents\dashboard\ChildrenController::class,'index'])->name('sons.index');
        Route::get('results/{id}', [\App\Http\Controllers\Parents\dashboard\ChildrenController::class,'results'])->name('sons.results');
        Route::get('attendances',[\App\Http\Controllers\Parents\dashboard\ChildrenController::class,'attendances'])->name('sons.attendances');
        Route::post('attendances',[\App\Http\Controllers\Parents\dashboard\ChildrenController::class,'attendanceSearch'])->name('sons.attendance.search');
        Route::get('fees',[\App\Http\Controllers\Parents\dashboard\ChildrenController::class,'fees'])->name('sons.fees');
        Route::get('receipt/{id}',[\App\Http\Controllers\Parents\dashboard\ChildrenController::class,'receiptStudent'])->name('sons.receipt');
        Route::get('profile/parent', [\App\Http\Controllers\Parents\dashboard\ChildrenController::class,'profile'])->name('profile.show.parent');
        Route::post('profile/parent/{id}', [\App\Http\Controllers\Parents\dashboard\ChildrenController::class,'update'])->name('profile.update.parent');
    });

});
