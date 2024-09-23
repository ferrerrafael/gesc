<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginRegisterController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\RemisionesController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PdfRemisionController;

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

Route::controller(LoginRegisterController::class)->group(function() {
    Route::get('/register', 'register')->name('register');
    Route::post('/store', 'store')->name('store');
    Route::get('/login', 'login')->name('login');
    Route::post('/authenticate', 'authenticate')->name('authenticate');
    Route::get('/dashboard', 'dashboard')->name('dashboard');
    Route::post('/logout', 'logout')->name('logout');
});

Route::group(['middleware' => 'auth'], function () {
    Route::resource('customers', CustomerController::class);
    Route::resource('inventory', InventoryController::class);
    Route::resource('remisiones', RemisionesController::class);
    Route::resource('pdf', PdfController::class);
    Route::resource('pdfremision', PdfRemisionController::class);
});

Route::controller(PostController::class)->group(function(){
    Route::get('posts', 'index');
    Route::post('posts', 'store')->name('posts.store');
});

/*Route::controller(InventoryController::class)->group(function(){ 
    Route::post('inventory', 'save')->name('inventory.save');
});*/