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
    // Show all sectors
    Route::get('dashboard/sectors', [SectorController::class, 'adminIndex']);

    // Show edit text
    Route::get('dashboard/sectors/{sector}/text/edit', [SectorController::class, 'editText']);
    // Update text
    Route::put('dashboard/sectors/{sector}/text/update', [SectorController::class, 'updateText']);
    
    // Show edit image
    Route::get('dashboard/sectors/{sector}/image/edit', [SectorController::class, 'editImage']);
    // Update image
    Route::put('dashboard/sectors/{sector}/image/update', [SectorController::class, 'updateImage']);
    // Crop image
    Route::get('dashboard/sectors/{sector}/image/crop', [SectorController::class, 'cropImage']);
    // Render image
    Route::post('dashboard/sectors/{sector}/image/render', [SectorController::class, 'renderImage']);
    
    // Show delete form
    Route::get('dashboard/sectors/{sector}/delete', [SectorController::class, 'deleteOptions']);
    // Delete sector
    Route::delete('dashboard/sectors/{sector}/delete', [SectorController::class, 'delete']);
    

    // Show single sector   
    Route::get('dashboard/sectors/{sector}', [SectorController::class, 'adminShow']);

// DashboardController
// Dashboard index
Route::get('dashboard', [DashboardController::class, 'index']);


