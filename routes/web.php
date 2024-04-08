<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\CoursesWeeksController;
use App\Http\Controllers\WeekToDaysController;
use App\Http\Controllers\DaysPdfController;
use App\Http\Controllers\DaysQuizController;

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
    return view('welcome');
});


Route::resources([
    'course' => CoursesController::class,
    'week' => CoursesWeeksController::class,
    'day' => WeekToDaysController::class,
    'pdf' => DaysPdfController::class,
    'quiz' => DaysQuizController::class,
]);

Route::get('main', function () {
    return view('index');
})->name('main');