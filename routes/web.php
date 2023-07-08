<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/', [HomeController::class, "index"])->name('dashboard');

Route::prefix('/student')->group(function () {
    Route::get('/', [StudentController::class, "index"])->name('student');
    Route::get('/show', [StudentController::class, "show"])->name('student.show');
    Route::get('/list', [StudentController::class, 'list'])->name('student.list');
    Route::post('/store', [StudentController::class, "store"])->name('student.store');
    Route::get('/{student_id}/status', [StudentController::class, "status"])->name('student.status');
    Route::delete('/{student_id}/delete', [StudentController::class, "delete"])->name('student.delete');
});

require __DIR__ . '/auth.php';
