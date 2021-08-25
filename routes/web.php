<?php

use App\Http\Controllers\StatusController;
use Illuminate\Support\Facades\Route;
use App\Models\Agency;
use App\Http\Controllers\AgencyController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->group(function () {

    Route::prefix('agency')->group(function () {
        Route::get('/list', [AgencyController::class, 'index'])->name('agency.list');
        Route::get('/create', [AgencyController::class, 'create'])->name('agency.create');
        Route::post('/create', [AgencyController::class, 'store']);
        Route::get('/edit/{id}', [AgencyController::class, 'edit'])->name('agency.edit');
        Route::post('/edit/{id}', [AgencyController::class, 'update']);
        Route::get('/destroy/{id}', [AgencyController::class, 'destroy'])->name('agency.destroy');
        Route::get('/search',[AgencyController::class,'search'])->name('agency.search');
    });


});

