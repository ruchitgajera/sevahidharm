<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\FestivalController;
use App\Http\Controllers\HolidayController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/login', function () {
    return redirect('login');
});
Auth::routes();

Route::group(['prefix' => 'admin', 'middleware' => ['auth:sanctum']], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    
    Route::resource('/festival',FestivalController::class);
    Route::get('festival_delete/{id}',[FestivalController::class,'destroy']);
    
    Route::resource('/company',CompanyController::class);
    Route::get('company_delete/{id}',[CompanyController::class,'destroy']);
    
    Route::get('user',[FestivalController::class,'user'])->name('user');
    Route::get('user_delete/{id}', [HolidayController::class,'destroy']);
});

Route::get('/',[HolidayController::class,'index']);
Route::get('create/{id}',[HolidayController::class,'create'])->name('create');
Route::post('store_data/{id}',[HolidayController::class,'store'])->name('save_data');



