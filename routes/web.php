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
    Route::get('/jobs/{id}', [App\Http\Controllers\api\v1\JobController::class, 'show'])->name('singlejob');
    Route::post('/jobs/create_job', [App\Http\Controllers\api\v1\JobController::class, 'store'])->name('createjob');
    Route::post('/jobs/update_job/{job}', [App\Http\Controllers\api\v1\JobController::class, 'update'])->name('updatejob');
    Route::post('/jobs/delete_job/{job}', [App\Http\Controllers\api\v1\JobController::class, 'destroy'])->name('deletejob');

});
