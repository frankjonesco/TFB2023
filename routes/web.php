<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SectorController;
use App\Http\Controllers\DashboardController;

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
    return view('home');
});

// SectorController
// Show all sectors
Route::get('sectors', [SectorController::class, 'index']);
    // Dashboard SectorController
    Route::get('dashboard/sectors', [SectorController::class, 'adminIndex']);

// DashboardController
// Dashboard index
Route::get('dashboard', [DashboardController::class, 'index']);


