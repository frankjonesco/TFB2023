<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MapController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SectorController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\IndustryController;
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

// UserController
// Show sign up form
Route::get('/signup', [UserController::class, 'showSignUp']);


// SectorController
// Show all sectors
Route::get('sectors', [SectorController::class, 'index']);
    // Dashboard SectorController
    // Show all sectors
    Route::get('dashboard/sectors', [SectorController::class, 'adminIndex']);

    // Show create form
    Route::get('dashboard/sectors/create', [SectorController::class, 'create']);

    // Store new sector
    Route::post('dashboard/sectors/store', [SectorController::class, 'store']);

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

    // Store industry for this sector
    Route::post('dashboard/sectors/{sector}/industries/store', [SectorController::class, 'storeIndustry']);

    // Execute with selected
    Route::put('dashboard/sectors/{sector}/industries/with-selected', [SectorController::class, 'withSelected']);

    // Confirm delete industry for this sector
    Route::get('dashboard/sectors/{sector}/industries/confirm-delete', [SectorController::class, 'confirmDeleteIndustry']);

    // Delete industry
    Route::delete('dashboard/sectors/{sector}/industries/delete', [SectorController::class, 'deleteIndustry']);
    

    // Show single sector   
    Route::get('dashboard/sectors/{sector}', [SectorController::class, 'adminShow']);



// IndustryController
// Show all industries
Route::get('industries', [IndustryController::class, 'index']);
    // Dashboard IndustryController
    // Show all industries
    Route::get('dashboard/industries', [IndustryController::class, 'adminIndex']);

    // Show create form
    Route::get('dashboard/industries/create', [IndustryController::class, 'create']);

    // Store new
    Route::post('dashboard/industries/store', [IndustryController::class, 'store']);

    // Show edit text
    Route::get('dashboard/industries/{industry}/text/edit', [IndustryController::class, 'editText']);
    // Update text
    Route::put('dashboard/industries/{industry}/text/update', [IndustryController::class, 'updateText']);
    
    // Show edit image
    Route::get('dashboard/industries/{industry}/image/edit', [IndustryController::class, 'editImage']);
    // Update image
    Route::put('dashboard/industries/{industry}/image/update', [IndustryController::class, 'updateImage']);
    // Crop image
    Route::get('dashboard/industries/{industry}/image/crop', [IndustryController::class, 'cropImage']);
    // Render image
    Route::post('dashboard/industries/{industry}/image/render', [IndustryController::class, 'renderImage']);
    
    // Show delete form
    Route::get('dashboard/industries/{industry}/delete', [IndustryController::class, 'deleteOptions']);
    // Delete industry
    Route::delete('dashboard/industries/{industry}/delete', [IndustryController::class, 'delete']);

    // Execute with selected
    Route::put('/dashboard/industries/{industry}/companies/with-selected', [IndustryController::class, 'withSelected']);
    

    // Show single   
    Route::get('dashboard/industries/{industry}', [IndustryController::class, 'adminShow']);






// CompanyController
// Show all companies
Route::get('companies', [CompanyController::class, 'index']);
    // Dashboard CompanyController
    // Show all companies
    Route::get('dashboard/companies', [CompanyController::class, 'adminIndex']);

    // Show create form
    Route::get('dashboard/companies/create', [CompanyController::class, 'create']);

    // Store new company
    Route::post('dashboard/companies/store', [CompanyController::class, 'store']);

    // Show edit text
    Route::get('dashboard/companies/{company}/text/edit', [CompanyController::class, 'editText']);
    // Update text
    Route::put('dashboard/companies/{company}/text/update', [CompanyController::class, 'updateText']);
    
    // Show edit image
    Route::get('dashboard/companies/{company}/image/edit', [CompanyController::class, 'editImage']);
    // Update image
    Route::put('dashboard/companies/{company}/image/update', [CompanyController::class, 'updateImage']);
    // Crop image
    Route::get('dashboard/companies/{company}/image/crop', [CompanyController::class, 'cropImage']);
    // Render image
    Route::post('dashboard/companies/{company}/image/render', [CompanyController::class, 'renderImage']);
    
    // Show delete form
    Route::get('dashboard/companies/{company}/delete', [CompanyController::class, 'deleteOptions']);
    // Delete company
    Route::delete('dashboard/companies/{company}/delete', [CompanyController::class, 'delete']);
    

    // Show single company   
    Route::get('dashboard/companies/{company}', [CompanyController::class, 'adminShow']);






// CategoryController
// Show all categories
Route::get('categories', [CategoryController::class, 'index']);
    // Dashboard CategoryController
    // Show all categories
    Route::get('dashboard/categories', [CategoryController::class, 'adminIndex']);

    // Show create form
    Route::get('dashboard/categories/create', [CategoryController::class, 'create']);

    // Store new category
    Route::post('dashboard/categories/store', [CategoryController::class, 'store']);

    // Show edit text
    Route::get('dashboard/categories/{category}/text/edit', [CategoryController::class, 'editText']);
    // Update text
    Route::put('dashboard/categories/{category}/text/update', [CategoryController::class, 'updateText']);
    
    // Show edit image
    Route::get('dashboard/categories/{category}/image/edit', [CategoryController::class, 'editImage']);
    // Update image
    Route::put('dashboard/categories/{category}/image/update', [CategoryController::class, 'updateImage']);
    // Crop image
    Route::get('dashboard/categories/{category}/image/crop', [CategoryController::class, 'cropImage']);
    // Render image
    Route::post('dashboard/categories/{category}/image/render', [CategoryController::class, 'renderImage']);
    
    // Show delete form
    Route::get('dashboard/categories/{category}/delete', [CategoryController::class, 'deleteOptions']);
    // Delete category
    Route::delete('dashboard/categories/{category}/delete', [CategoryController::class, 'delete']);
    

    // Show single category   
    Route::get('dashboard/categories/{category}', [CategoryController::class, 'adminShow']);






// ArticleController
// Show all articles
Route::get('articles', [ArticleController::class, 'index']);
    // Dashboard ArticleController
    // Show all articles
    Route::get('dashboard/articles', [ArticleController::class, 'adminIndex']);

    // Show create form
    Route::get('dashboard/articles/create', [ArticleController::class, 'create']);

    // Store new article
    Route::post('dashboard/articles/store', [ArticleController::class, 'store']);

    // Show edit text
    Route::get('dashboard/articles/{article}/text/edit', [ArticleController::class, 'editText']);
    // Update text
    Route::put('dashboard/articles/{article}/text/update', [ArticleController::class, 'updateText']);
    
    // Show edit image
    Route::get('dashboard/articles/{article}/image/edit', [ArticleController::class, 'editImage']);
    // Update image
    Route::put('dashboard/articles/{article}/image/update', [ArticleController::class, 'updateImage']);
    // Crop image
    Route::get('dashboard/articles/{article}/image/crop', [ArticleController::class, 'cropImage']);
    // Render image
    Route::post('dashboard/articles/{article}/image/render', [ArticleController::class, 'renderImage']);
    
    // Show delete form
    Route::get('dashboard/articles/{article}/delete', [ArticleController::class, 'deleteOptions']);
    // Delete article
    Route::delete('dashboard/articles/{article}/delete', [ArticleController::class, 'delete']);
    

    // Show single article   
    Route::get('dashboard/articles/{article}', [ArticleController::class, 'adminShow']);







// UserController
    // Dashboard UserController
    // Show all articles
    Route::get('dashboard/users', [UserController::class, 'adminIndex']);

    // Show create form
    Route::get('dashboard/users/create', [UserController::class, 'create']);

    // Store new user
    Route::post('dashboard/users/store', [UserController::class, 'store']);

    // Show edit text
    Route::get('dashboard/users/{user}/text/edit', [UserController::class, 'editText']);
    // Update text
    Route::put('dashboard/users/{user}/text/update', [UserController::class, 'updateText']);
    
    // Show edit image
    Route::get('dashboard/users/{user}/image/edit', [UserController::class, 'editImage']);
    // Update image
    Route::put('dashboard/users/{user}/image/update', [UserController::class, 'updateImage']);
    // Crop image
    Route::get('dashboard/users/{user}/image/crop', [UserController::class, 'cropImage']);
    // Render image
    Route::post('dashboard/users/{user}/image/render', [UserController::class, 'renderImage']);
    
    // Show delete form
    Route::get('dashboard/users/{user}/delete', [UserController::class, 'deleteOptions']);
    // Delete user
    Route::delete('dashboard/users/{user}/delete', [UserController::class, 'delete']);
    

    // Show single user   
    Route::get('dashboard/users/{user}', [UserController::class, 'adminShow']);




// MapController
    // Dashboard MapController
    // Show all maps
    Route::get('dashboard/maps', [MapController::class, 'adminIndex']);

    // Show map sectors
    Route::get('dashboard/maps/sectors', [MapController::class, 'adminSectors']);

    // Show single map sector
    Route::get('dashboard/maps/sectors/{sector}', [MapController::class, 'showSector']);

    // Show single sector's industry companies
    Route::get('/dashboard/maps/sectors/{sector}/industries/{map}', [MapController::class, 'showSectorIndustryCompanies']);

    // Show map industries
    Route::get('dashboard/maps/industries', [MapController::class, 'adminIndustries']);

    // Show single map industry
    Route::get('dashboard/maps/industries/{industry}', [MapController::class, 'showIndustry']);

    // Show map companies
    Route::get('dashboard/maps/companies', [MapController::class, 'adminCompanies']);


    


// DashboardController
// Dashboard index
Route::get('dashboard', [DashboardController::class, 'index']);


