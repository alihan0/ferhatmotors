<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\UserController;
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


Route::controller(MainController::class)->middleware('auth')->group(function(){
    Route::get('/', 'home');
});

Route::controller(AuthController::class)->prefix('auth')->group(function(){
    Route::get('/login', 'showLogin')->name('login');
    Route::post('/login', 'login');
    Route::get('/register', 'showRegister');
});

Route::controller(UserController::class)->prefix('user')->middleware('auth')->group(function(){
    Route::get('/all', 'all');
    Route::get('/new', 'new');
    Route::post('/new', 'newUser');
    Route::post('/change-password', 'change_password');
    Route::post('/update', 'update');
    Route::post('/remove', 'remove');
}); 


Route::controller(CustomerController::class)->prefix('/customer')->middleware('auth')->group(function(){
    Route::get('/new' , 'new');
    Route::get('/all' , 'all');
    Route::get('/detail/{id}', 'detail');
    Route::post('/save', 'save');
    Route::post('/update', 'update');
});


Route::controller(UploadController::class)->prefix('upload')->middleware('auth')->group(function(){
    Route::post('/profile', 'profile');
});