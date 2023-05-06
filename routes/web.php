<?php

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
    return view('welcome');
});


Route::prefix('api/v1')->group(function () {
    Route::get('/jobs', [App\Http\Controllers\api\v1\JobController::class, 'index'])->name('jobs');
    Route::get('/jobs/{job}', [App\Http\Controllers\api\v1\JobController::class, 'show'])->name('singlejob');

});
