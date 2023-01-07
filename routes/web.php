<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MapController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SectorController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\PartnerController;
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

/*
|--------------------------------------------------------------------------
| Routes for SiteController
|--------------------------------------------------------------------------
*/

// Public routes for SiteController
Route::controller(SiteController::class)->group(function(){
    Route::get('/', 'home')->name('home');
    Route::get('/terms', 'showTerms');
    Route::get('/privacy', 'showPrivacy');
    Route::get('/about', 'showAbout');
    Route::get('/contact', 'showContact');
    Route::post('/contact/send-message', 'contactSendMessage');
    Route::post('/subscribe/save', 'saveSubscriber');
    Route::get('/blog', 'showBlog');
    Route::get('/forum', 'showForum');
    
    // Route::get('/sandbox/{company}', 'showSandbox');
});


/*
|--------------------------------------------------------------------------
| Routes for ArticleController
|--------------------------------------------------------------------------
*/

// Auth routes for ArticleController
Route::controller(ArticleController::class)->middleware('auth')->group(function() {
    Route::get('/dashboard/articles', 'adminIndex');
    Route::get('/dashboard/articles/create', 'create');
    Route::post('/dashboard/articles/store', 'store');
    Route::get('/dashboard/articles/{article}/text/edit', 'editText');
    Route::put('/dashboard/articles/{article}/text/update', 'updateText');
    Route::get('/dashboard/articles/{article}/image/edit', 'editImage');
    Route::put('/dashboard/articles/{article}/image/update', 'updateImage');
    Route::get('/dashboard/articles/{article}/image/crop', 'cropImage');
    Route::post('/dashboard/articles/{article}/image/render', 'renderImage');    
    Route::get('/dashboard/articles/{article}/delete', 'deleteOptions');
    Route::delete('/dashboard/articles/{article}/delete', 'delete');
    Route::get('/dashboard/articles/{article}', 'adminShow');
});

// Public routes for ArticleController
Route::controller(ArticleController::class)->group(function(){
    Route::get('/news', 'index');
    Route::get('/news/search', 'searchResults');
    Route::get('/news/articles', 'articleIndex');
    Route::post('/news/articles/post-comment', 'postComment');
    Route::get('/news/articles/{article}/{slug}', 'show');
});


/*
|--------------------------------------------------------------------------
| Routes for CategoryController
|--------------------------------------------------------------------------
*/

// Auth routes for CategoryController
Route::controller(CategoryController::class)->middleware('auth')->group(function() {
    Route::get('/dashboard/categories', 'adminIndex');
    Route::get('/dashboard/categories/create', 'create');
    Route::post('/dashboard/categories/store', 'store');
    Route::get('/dashboard/categories/{category}/text/edit', 'editText');
    Route::put('/dashboard/categories/{category}/text/update', 'updateText');
    Route::get('/dashboard/categories/{category}/image/edit', 'editImage');
    Route::put('/dashboard/categories/{category}/image/update', 'updateImage');
    Route::get('/dashboard/categories/{category}/image/crop', 'cropImage');
    Route::post('/dashboard/categories/{category}/image/render', 'renderImage');
    Route::get('/dashboard/categories/{category}/delete', 'deleteOptions');
    Route::delete('/dashboard/categories/{category}/delete', 'delete');
    Route::get('/dashboard/categories/{category}', 'adminShow');
});

// Public routes for CategoryController
Route::controller(CategoryController::class)->group(function(){
    Route::get('/categories', 'index');
    Route::get('/news/categories/{category}/{slug}', 'show');
});


/*
|--------------------------------------------------------------------------
| Routes for CompanyController
|--------------------------------------------------------------------------
*/

// Auth routes for CompanyController
Route::controller(CompanyController::class)->middleware('auth')->group(function() {
    Route::get('/dashboard/companies', 'adminIndex');
    Route::get('/dashboard/companies/create', 'create');
    Route::post('/dashboard/companies/store', 'store');
    Route::get('/dashboard/companies/{company}/text/edit', 'editText');
    Route::put('/dashboard/companies/{company}/text/update', 'updateText');
    Route::get('/dashboard/companies/{company}/image/edit', 'editImage');
    Route::put('/dashboard/companies/{company}/image/update', 'updateImage');
    Route::get('/dashboard/companies/{company}/image/crop', 'cropImage');
    Route::post('/dashboard/companies/{company}/image/render', 'renderImage');
    Route::get('/dashboard/companies/{company}/delete', 'deleteOptions');
    Route::delete('/dashboard/companies/{company}/delete', 'delete');
    Route::get('/dashboard/companies/{company}', 'adminShow');
});

// Public routes for CompanyController
Route::controller(CompanyController::class)->group(function(){
    Route::get('/rankings', 'index');
    Route::post('/rankings/search', 'searchResults');
    Route::get('/companies/{company}/{slug}', 'show');
});


/*
|--------------------------------------------------------------------------
| Routes for SectorController
|--------------------------------------------------------------------------
*/

// Auth routes for SectorController
Route::controller(SectorController::class)->middleware('auth')->group(function() {
    Route::get('/dashboard/sectors', 'adminIndex');
    Route::get('/dashboard/sectors/create', 'create');
    Route::post('/dashboard/sectors/store', 'store');
    Route::get('/dashboard/sectors/{sector}/text/edit', 'editText');
    Route::put('/dashboard/sectors/{sector}/text/update', 'updateText');
    Route::get('/dashboard/sectors/{sector}/image/edit', 'editImage');
    Route::put('/dashboard/sectors/{sector}/image/update', 'updateImage');
    Route::get('/dashboard/sectors/{sector}/image/crop', 'cropImage');
    Route::post('/dashboard/sectors/{sector}/image/render', 'renderImage');
    Route::get('/dashboard/sectors/{sector}/delete', 'deleteOptions');
    Route::delete('/dashboard/sectors/{sector}/delete', 'delete');
    Route::post('/dashboard/sectors/{sector}/industries/store', 'storeIndustry');
    Route::put('/dashboard/sectors/{sector}/industries/with-selected', 'withSelected');
    Route::get('/dashboard/sectors/{sector}/industries/confirm-delete', 'confirmDeleteIndustry');
    Route::delete('/dashboard/sectors/{sector}/industries/delete', 'deleteIndustry');
    Route::get('/dashboard/sectors/{sector}', 'adminShow');
});

// Public routes for SectorController
Route::controller(SectorController::class)->group(function(){
    Route::get('/sectors', 'index');
    Route::get('/sectors/search', 'searchResults');
    Route::get('/sectors/{sector}/{slug}', 'show');
});


/*
|--------------------------------------------------------------------------
| Routes for IndustryController
|--------------------------------------------------------------------------
*/

// Auth routes for IndustryController
Route::controller(IndustryController::class)->middleware('auth')->group(function() {
    Route::get('/dashboard/industries', 'adminIndex');
    Route::get('/dashboard/industries/create', 'create');
    Route::post('/dashboard/industries/store', 'store');
    Route::get('/dashboard/industries/{industry}/text/edit', 'editText');
    Route::put('/dashboard/industries/{industry}/text/update', 'updateText');
    Route::get('/dashboard/industries/{industry}/image/edit', 'editImage');
    Route::put('/dashboard/industries/{industry}/image/update', 'updateImage');
    Route::get('/dashboard/industries/{industry}/image/crop', 'cropImage');
    Route::post('/dashboard/industries/{industry}/image/render', 'renderImage');
    Route::get('/dashboard/industries/{industry}/delete', 'deleteOptions');
    Route::delete('/dashboard/industries/{industry}/delete', 'delete');
    Route::put('/dashboard/industries/{industry}/companies/with-selected', 'withSelected'); 
    Route::get('/dashboard/industries/{industry}', 'adminShow');
    Route::get('/dashboard/sector-industries/{map}', 'showSectorIndustries');
});

// Public routes for IndustryController
Route::controller(IndustryController::class)->group(function(){
    Route::get('/industries', 'index');
    
});


/*
|--------------------------------------------------------------------------
| Routes for MapController
|--------------------------------------------------------------------------
*/

// Auth routes for MapController
Route::controller(MapController::class)->middleware('auth')->group(function() {
    Route::get('/dashboard/maps', 'adminIndex');
    Route::get('/dashboard/maps/sectors', 'adminSectors');
    Route::get('/dashboard/maps/sectors/{sector}', 'showSector');
    Route::get('/dashboard/maps/sectors/{sector}/industries/{map}', 'showSectorIndustryCompanies');
    Route::get('/dashboard/maps/industries', 'adminIndustries');
    Route::get('/dashboard/maps/industries/{industry}', 'showIndustry');
    Route::get('/dashboard/maps/companies', 'adminCompanies');
});

// Public routes for MapController
Route::controller(MapController::class)->group(function(){

});


/*
|--------------------------------------------------------------------------
| Routes for PartnerController
|--------------------------------------------------------------------------
*/

// Auth routes for PartnerController
Route::controller(PartnerController::class)->middleware('auth')->group(function() {

});

// Public routes for PartnerController
Route::controller(PartnerController::class)->group(function(){
    Route::get('/partners', 'index');
});


/*
|--------------------------------------------------------------------------
| Routes for UserController
|--------------------------------------------------------------------------
*/

// Auth routes for UserController
Route::controller(UserController::class)->middleware('auth')->group(function(){
    Route::post('/logout', 'logout');
    Route::get('/dashboard/users', 'adminIndex');
    Route::get('/dashboard/users/create', 'create');
    Route::post('/dashboard/users/store', 'store');
    Route::get('/dashboard/users/{user}/text/edit', 'editText');
    Route::put('/dashboard/users/{user}/text/update', 'updateText');
    Route::get('/dashboard/users/{user}/image/edit', 'editImage');
    Route::put('/dashboard/users/{user}/image/update', 'updateImage');
    Route::get('/dashboard/users/{user}/image/crop', 'cropImage');
    Route::post('/dashboard/users/{user}/image/render', 'renderImage');
    Route::get('/dashboard/users/{user}/delete', 'deleteOptions');
    Route::delete('/dashboard/users/{user}/delete', 'delete');
    Route::get('/dashboard/users/{user}', 'adminShow');
});

// Guest route for UserController
Route::controller(UserController::class)->middleware('guest')->group(function(){
    Route::get('/signup', 'showSignUp');
    Route::post('/users/store', 'storeSignUp');
    Route::get('/login', 'login')->name('login');
    Route::post('/users/authenticate', 'authenticateForLogin');
});

// Public routes for UserController
Route::controller(UserController::class)->group(function(){
    
});


/*
|--------------------------------------------------------------------------
| Routes for DashboardController
|--------------------------------------------------------------------------
*/

// Auth routes for DashboardController
Route::controller(DashboardController::class)->middleware('auth')->group(function() {
    Route::get('/dashboard', [DashboardController::class, 'index']);
});

// Public routes for ArticleController
Route::controller(DashboardController::class)->group(function(){

});


// /*
// |--------------------------------------------------------------------------
// | Routes for ArticleController
// |--------------------------------------------------------------------------
// */

// // Auth routes for ArticleController
// Route::controller(ArticleController::class)->middleware('auth')->group(function() {

// });

// // Public routes for ArticleController
// Route::controller(ArticleController::class)->group(function(){

// });